<?php

namespace App\Http\Controllers;

use App\Fiador;
use Illuminate\Http\Request;
use App\DataTables\FiadorDatatable;
use App\Http\Controllers\Controller;

class FiadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(FiadorDatatable $dataTable)
    {
        return $dataTable->render('fiador.index');
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fiador = new Fiador();
        $fiador->loadDefaultValues();
        return view('fiador.create', compact('fiador'));
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedAttributes = $this->validateFiador($request);

        if(($model = Fiador::create($validatedAttributes)) ) {
            //flash('Role Added');
            return redirect(route('fiador.show', $model));
        }else
            return redirect()->back();
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Fiador  $fiador
     * @return \Illuminate\Http\Response
     */
    public function show(Fiador $fiador)
    {
        return view('fiador.show', compact('fiador'));
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Fiador  $fiador
     * @return \Illuminate\Http\Response
     */
    public function edit(Fiador $fiador)
    {
        return view('fiador.edit', compact('fiador'));

        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Fiador  $fiador
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fiador $fiador)
    {
        $validatedAttributes = $this->validateFiador($request, $fiador);
        $fiador->fill($validatedAttributes);
        if($fiador->save()) {
            //flash('Role Added');
            return redirect(route('fiador.show', $fiador));
        }else{
            return redirect()->back();
        }
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Fiador  $fiador
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fiador $fiador)
    {
        $fiador->delete();
        return redirect(route('fiador.index'));
        //
    }

    public function validateFiador(Request $request, Fiador $model = null): array
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
            'cae' => 'required|integer',
            'capitalSocial' => 'required|integer',
            'setorActividade' => 'required|string',
            'certidaoPermanente' => 'required|string',
            'numFuncionarios' => 'required|integer'
        ];
        return $request->validate($validate_array);


    }
}
