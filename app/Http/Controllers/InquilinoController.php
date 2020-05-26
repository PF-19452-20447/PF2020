<?php

namespace App\Http\Controllers;

use App\DataTables\InquilinoDataTable;
use App\Inquilino;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Traits\Authorizable;
use App\Permission;
use App\Role;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\Http\Controllers\InquilinosDataTable;
use App\Http\Controllers\Session;
use App\Traits;
use App\Http\Controllers\Gate;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\VerifiesEmails;
use App\Http\Controllers\Auth\VerificationController;
use Illuminate\Support\Facades\Auth;


class InquilinoController extends Controller
{

    //use Authorizable;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(InquilinoDataTable $dataTable)
    {

        $this->authorize('index');
        return $dataTable->render('inquilinos.index');
        /*$inquilinos = Inquilino::latest()->paginate(5);
        return view('inquilinos.index',compact('inquilinos'))
            ->with('i', (request()->input('page', 1) - 1) * 5);*/
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Inquilino $inquilino)
    {
        // get current logged in user
    $user = Auth::user();

    if ($user->can('add_tenant', Inquilino::class)) {
      echo 'Current logged in user is allowed to create new tenants.';
    } else {
        $this->authorize('add_tenant',Inquilino::class);
      echo 'Not Authorized';
    }

        $inquilino = new Inquilino();
        $inquilino->loadDefaultValues();
         return view('inquilinos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Inquilino $inquilino)
    {
        $validatedAttributes = $this->validateTenant($request);

        if(($model = Inquilino::create($validatedAttributes)) ) {
            //flash('Role Added');
            return redirect(route('inquilinos.show', $model));
        }else{
            return redirect()->back();
        }

     /*   $request->validate([

            'nome' => 'required',
            'dataNascimento' => 'required',
            'idade' => 'required',
            'nif' => 'required',
            'cc' => 'required',
            'email' => 'required',
            'telefone' => 'required',
            'morada' => 'required',
            'iban' => 'required',
            'tipoParticular_empresa' => 'required',
            'profissao' => 'required',
            'vencimento' => 'required',
            'tipoContrato' => 'required',
            'notas' => 'required',
            'cae' => 'required',
            'capitalSocial' => 'required',
            'setorActividade' => 'required',
            'certidaoPermanente' => 'required',
            'numFuncionarios' => 'required',

        ]);*/

     /*   Inquilino::create($request->all());
        return redirect()->route('inquilinos.index')
             ->with('success','Inquilino created successfully.');*/
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Inquilino  $inquilino
     * @return \Illuminate\Http\Response
     */
    public function show(Inquilino $inquilino)
    {
        // get current logged in user
    $user = Auth::user();

    // load post
   // $inquilino = Inquilino::find(1);

    if ($user->can('view_tenant', Inquilino::class)) {

      echo "Current logged in user is allowed to update the Tenant: {$inquilino->id}";
    } else {
        $this->authorize('view_tenant', $inquilino);
        echo 'Not Authorized.';
    }

      /*  if(auth()->user()->can('Tenant')){
            $this->authorize('show', $inquilino);
        }*/

        //$inquilino = Inquilino::findOrfail($id);
        return view('inquilinos.show', compact('inquilino'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Inquilino  $inquilino
     * @return \Illuminate\Http\Response
     */
    public function edit(Inquilino $inquilino)
    {
       if(auth()->user()->can('edit_tenant')){
            $this->authorize('edit_tenant', $inquilino);
        }

        //$inquilino = Inquilino::findOrfail($id);
        return view('inquilinos.edit', compact('inquilino'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Inquilino  $inquilino
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inquilino $inquilino)
    {

// get current logged in user
$user = Auth::user();

// load post
//$inquilino = Inquilino::find(1);

if ($user->can('edit_tenant', $inquilino)) {
  echo "Current logged in user is allowed to update the tenant: {$inquilino->id}";
} else {
    $this->authorize('edit_tenant', $inquilino);
  echo 'Not Authorized.';
}

        $validatedAttributes = $this->validateTenant($request, $inquilino);
        $inquilino->fill($validatedAttributes);
        if($inquilino->save()) {
            $this->authorize('create', $inquilino);
            //flash('Role Added');
            return redirect(route('inquilinos.show', $inquilino));
        }else{
            return redirect()->back();
        }
      //  $inquilino = Inquilino::findOrfail($id);
      /*  $this->validate($request,[

            'nome' => 'required',
            'dataNascimento' => 'required',
            'idade' => 'required',
            'nif' => 'required',
            'cc' => 'required',
            'email' => 'required',
            'telefone' => 'required',
            'morada' => 'required',
            'iban' => 'required',
            'tipoParticular_empresa' => 'required',
            'profissao' => 'required',
            'vencimento' => 'required',
            'tipoContrato' => 'required',
            'notas' => 'required',
            'cae' => 'required',
            'capitalSocial' => 'required',
            'setorActividade' => 'required',
            'certidaoPermanente' => 'required',
            'numFuncionarios' => 'required',

        ]);*/

       /* $input = $request->all();
        $inquilino->fill($input)->save();

        $request->session()->flash('inquilinos', $input);

        return redirect()->route('inquilinos.index')
                ->with('success','Inquilino updated successfully.');*/

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Inquilino  $inquilino
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inquilino $inquilino)
    {
       /* if(auth()->user()->can('Tenant')){
            $this->authorize('destroy', $inquilino);
        }*/

         // get current logged in user
    $user = Auth::user();

    // load post
    //$inquilino = Inquilino::find(1);

    if ($user->can('delete_tenant', $inquilino)) {

      echo "Current logged in user is allowed to delete the Post: {$inquilino->id}";
    } else {
        $this->authorize('delete_tenant', $inquilino);
      echo 'Not Authorized.';
    }

       // $inquilino = Inquilino::findOrfail($id);
        $inquilino->delete();
        return redirect()->route('inquilinos.index')
                        ->with('success','Inquilino deleted successfully');
    }

    public function validateTenant(Request $request, Inquilino $model = null): array
    {

        $validate_array = [
            'nome' => ['required', 'string', 'max:255'],
            'dataNascimento' => 'required|string',
            'nif' => 'required|string',
            'cc' => 'required|string',
            'email' => 'required|string',
            'telefone' => 'required|string',
            'morada' => 'required|string',
            'iban' => 'required|string',
            'tipoParticularEmpresa' => 'required|integer|min:0',
            'profissao' => 'required|string',
            'vencimento' => 'required|integer',
            'tipoContrato' => 'required|string',
            'notas' => 'required|string',
            'cae' => 'required|integer',
            'capitalSocial' => 'required|integer',
            'setorActividade' => 'required|string',
            'certidaoPermanente' => 'required|string',
            'numFuncionarios' => 'required|integer'
        ];

        return $request->validate($validate_array);
    }

    public function gate()
    {
      //$inquilino = Inquilino::find(1);

      if (Gate::allows('add_tenant', $inquilino)) {
        echo 'Allowed';
      } else {
        echo 'Not Allowed';
      }

      exit;
    }

}
