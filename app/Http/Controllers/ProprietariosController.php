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
            'name' => 'required',
            'detail' => 'required',
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
    public function show(Proprietarios $proprietarios)
    {
        return view('proprietarios.show',compact('proprietarios'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Proprietarios  $proprietarios
     * @return \Illuminate\Http\Response
     */
    public function edit(Proprietarios $proprietarios)
    {
        return view('proprietarios.edit',compact('proprietarios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Proprietarios  $proprietarios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proprietarios $proprietarios)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);

        $proprietarios->update($request->all());

        return redirect()->route('proprietarios.index')
                        ->with('success','Proprietário modificado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Proprietarios  $proprietarios
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proprietarios $proprietarios)
    {
        $proprietarios->delete();

        return redirect()->route('proprietarios.index')
                        ->with('success','Proprietário eliminado com sucesso.');
    }
}
