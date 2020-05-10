<?php

namespace App\Http\Controllers;

use App\Proprietarios;
use Illuminate\Http\Request;

class ProprietariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proprietarios = Proprietarios::latest()->paginate(5);
        return view('proprietarios.index', compact('proprietarios'))
            ->with('i',(request()->input('page', 1) - 1) *5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('proprietarios.create');
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
            'cae' => 'required',
            'capital_social' => 'required',
            'setor_actividade' => 'required',
            'certidao_permanente' => 'required',
            'num_funcionarios' => 'required'
        ]);

        Proprietarios::create($request->all());

        return redirect()->route('proprietarios.index')
                        ->with('success','Proprietário criado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Proprietarios  $proprietarios
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $proprietarios = Proprietarios::findOrFail($id);
        return view('proprietarios.show',compact('proprietarios'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Proprietarios  $proprietarios
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $proprietarios = Proprietarios::findOrfail($id);
        return view('proprietarios.edit',compact('proprietarios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Proprietarios  $proprietarios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $proprietario = Proprietarios::findOrfail($id);
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
            'cae' => 'required',
            'capital_social' => 'required',
            'setor_actividade' => 'required',
            'certidao_permanente' => 'required',
            'num_funcionarios' => 'required'

        ]);

        $input = $request->all();

        $proprietario->fill($input)->save();

        $request->session()->flash('proprietarios', $input);

        return redirect()->route('proprietarios.index')
            ->with('success','Proprietário modificado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Proprietarios  $proprietarios
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $proprietario = Proprietarios::findOrfail($id);
        $proprietario->delete();

        return redirect()->route('proprietarios.index')
                        ->with('success','Proprietário eliminado com sucesso.');
    }
}
