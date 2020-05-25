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
    public function create()
    {
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
    public function store(Request $request)
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
        $validatedAttributes = $this->validateTenant($request, $inquilino);
        $inquilino->fill($validatedAttributes);
        if($inquilino->save()) {
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



}
