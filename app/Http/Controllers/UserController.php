<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Traits\Authorizable;
use App\Permission;
use App\Role;
use App\User;
use App\Proprietario;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use App\DataTables\UserDataTable;
use App\Inquilino;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Carbon\Carbon;

class UserController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(User::class, 'user');
    }

    // use Authorizable;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UserDataTable $dataTable)
    {
        return $dataTable->render('users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name', 'id');
        return view('users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedAttributes = $this->validateUser($request, null, true);
        $userAttributes = $request->except('roles', 'permissions');
        $userAttributes['password'] = Hash::make($userAttributes['password']);

        if($user = User::create($userAttributes)) {
            event(new Registered($user));

            $this->syncPermissions($request, $user);

            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $user->addMediaFromRequest('image')->toMediaCollection('avatar');
            }
            //Se o utilizador for do role proprietário crialhe um perfil base
            if($request['roles'][0] == '3'){
                if($landlord = Proprietario::create([
                    'nome' => $userAttributes['name'],
                    'email' => $userAttributes['email'],
                    'dataNascimento' => Carbon::now()->subDays(1),
                    'nif' => 123123123,
                    'morada' => 'Rua do '. $userAttributes['name'],
                    'user_id' => $user->id
                ])){
                    $user->proprietario()->save($landlord);
                }
            }
            return redirect(route('users.show', $user));
        }else{
            return redirect(route('users.index'));
        }
    }

    public function showProfile()
    {
       // $user = User::find($id);
        // return view('users.profile', compact('users') );
        return view('users.show', ['user' => auth()->user()]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show', ['user' => $user]);
    }

    public function editProfile($id)
    {
        $user = User::findOrFail(auth()->id());
        return view('users.profile',compact('user'));
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::pluck('name', 'id');
        $permissions = Permission::all('name', 'id');
        return view('users.edit', compact('user', 'roles', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validatedAttributes = $this->validateUser($request, $user);


        if(!empty($userAttributes['password'])){
            $userAttributes = $request->except('roles', 'permissions');
            $userAttributes['password'] = Hash::make($userAttributes['password']);
        }else{
            $userAttributes = $request->except('roles', 'permissions', 'password');
        }

        //$user->update($validatedAttributes);      // até posso meter isto tudo inline com o request()->validate
        $user->fill($userAttributes);      // até posso meter isto tudo inline com o request()->validate

        if(auth()->user()->can('adminApp') || auth()->user()->can('adminFullApp')) {
            // Handle the user roles
            $this->syncPermissions($request, $user);
        }
        $user->save();

        if($request->hasFile('image') && $request->file('image')->isValid()){
            $user->addMediaFromRequest('image')->toMediaCollection('avatar');
        }elseif($request->filled('delete_image')){ // if the image was replaced above it will automatically delete this so don't run again
            $user->getFirstMedia('avatar')->delete();
        }

            if($user->id !== auth()->user()->id){
                return redirect(route('users.show', $user));

            }else{
                return redirect(route('users.profile'));
            }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect(route('users.index'));
    }

    /**
     * Remove the specified resource from storage with a json
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function delete(User $user)
    {
        if($user->delete())
            return ['success' => true];
        else
            return ['success' => false];
    }

    /**
     * @return array
     */
    public function validateUser(Request $request, User $user = null, $request_password = false): array
    {
        if(auth()->user()->can('adminApp') || auth()->user()->can('adminFullApp')) {
            $validate_array = [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', $user === null ? 'unique:users' : Rule::unique('users')->ignore($user)], // 'email' => 'required|email|unique:users,email,' . $id,
                'roles' => 'required|min:1'
            ];
        }else{ // if is not an admin don't validate role
            $validate_array = [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', $user === null ? 'unique:users' : Rule::unique('users')->ignore($user)], // 'email' => 'required|email|unique:users,email,' . $id,
            ];
        }

        if($request_password || ($request->has('password') && !empty($request->get('password')))){
            $validate_array ['password']= ['string', 'min:8', 'confirmed'];
        }
        return $request->validate($validate_array);
    }

    private function syncPermissions(Request $request, $user)
    {
        // Get the submitted roles
        $roles = $request->get('roles', []);
        $permissions = $request->get('permissions', []);

        // Get the roles
        $roles = Role::find($roles);

        // check for current role changes
        if( ! $user->hasAllRoles( $roles ) ) {
            // reset all direct permissions for user
            $user->permissions()->sync([]);
        } else {
            // handle permissions
            $user->syncPermissions($permissions);
        }

        $user->syncRoles($roles);
        return $user;
    }




}
