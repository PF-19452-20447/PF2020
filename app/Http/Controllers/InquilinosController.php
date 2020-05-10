<?php

namespace App\Http\Controllers;

use App\Inquilinos;
use Illuminate\Http\Request;
use App\Http\Controllers\Traits\Authorizable;
use App\Permission;
use App\Role;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\Http\Controllers\InquilinosDataTable;
use App\Http\Controllers\Session;

class InquilinosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inquilinos = Inquilinos::latest()->paginate(5);
        return view('inquilinos.index',compact('inquilinos'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        $request->validate([

            'nome' => 'required',
            'data_nascimento' => 'required',
            'idade' => 'required',
            'NIF' => 'required',
            'CC' => 'required',
            'email' => 'required',
            'telefone' => 'required',
            'morada' => 'required',
            'IBAN' => 'required',
            'tipo_particular_empresa' => 'required',
            'profissao' => 'required',
            'vencimento' => 'required',
            'tipo_contrato' => 'required',
            'notas' => 'required',
            'cae' => 'required',
            'capital_social' => 'required',
            'setor_actividade' => 'required',
            'certidao_permanente' => 'required',
            'num_funcionarios' => 'required',

        ]);

        Inquilinos::create($request->all());
        return redirect()->route('inquilinos.index')
             ->with('success','Inquilino created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Inquilinos  $inquilinos
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $inquilinos = Inquilinos::findOrfail($id);
        return view('inquilinos.show', compact('inquilinos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Inquilinos  $inquilinos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $inquilinos = Inquilinos::findOrfail($id);
        return view('inquilinos.edit', compact('inquilinos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Inquilinos  $inquilinos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $inquilinos = Inquilinos::findOrfail($id);
        $this->validate($request,[

            'nome' => 'required',
            'data_nascimento' => 'required',
            'idade' => 'required',
            'NIF' => 'required',
            'CC' => 'required',
            'email' => 'required',
            'telefone' => 'required',
            'morada' => 'required',
            'IBAN' => 'required',
            'tipo_particular_empresa' => 'required',
            'profissao' => 'required',
            'vencimento' => 'required',
            'tipo_contrato' => 'required',
            'notas' => 'required',
            'cae' => 'required',
            'capital_social' => 'required',
            'setor_actividade' => 'required',
            'certidao_permanente' => 'required',
            'num_funcionarios' => 'required',

        ]);

        $input = $request->all();
        $inquilinos->fill($input)->save();



        $request->session()->flash('inquilinos', $input);

        return redirect()->route('inquilinos.index')
                ->with('success','Inquilino updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Inquilinos  $inquilinos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $inquilinos = Inquilinos::findOrfail($id);
        $inquilinos->delete();
        return redirect()->route('inquilinos.index')
                        ->with('success','Inquilino deleted successfully');
    }
}
