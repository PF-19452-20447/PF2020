<?php

namespace App\Http\Controllers;

use App\Imovel;
use Illuminate\Http\Request;
use App\DataTables\ImovelDatatable;

class ImovelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ImovelDatatable $dataTable)
    {
        return $dataTable->render('imoveis.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $imovel = new Imovel();
        $imovel->loadDefaultValues();
        return view('imoveis.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedAttributes = $this->validateImovel($request);

        if(($model = Imovel::create($validatedAttributes)) ) {
            return redirect(route('imoveis.show', $model));
        }else{
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Imovel  $imovel
     * @return \Illuminate\Http\Response
     */
    public function show(Imovel $imovel)
    {
        return view('imoveis.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Imovel  $imovel
     * @return \Illuminate\Http\Response
     */
    public function edit(Imovel $imovel)
    {
        return view('imoveis.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Imovel  $imovel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Imovel $imovel)
    {
        $validatedAttributes = $this->validateImovel($request, $imovel);
        $imovel->fill($validatedAttributes);
        if($imovel->save()) {
            return redirect(route('imoveis.show', $imovel));
        }else{
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Imovel  $imovel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Imovel $imovel)
    {
        //
    }


    /**
     * validateImovel
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Imovel  $imovel
     * @return array
     */
    public function validateImovel(Request $request, Imovel $model = null): array
    {
        $validate_array = [
        'tipo' => 'required|string',
        'tipologia' => 'required|string',
        'area' => 'required|integer',
        'morada' => 'required|string',
        'numQuartos' => 'required|integer',
        'numCasaBanho' => 'required|integer',
        'descricao' => 'required|string',
        'estado' => 'required|boolean',
        'mobilado' => 'required|boolean',
        'fumar' => 'required|boolean',
        'animaisEstimacao' => 'required|boolean',
        'outrosEquipamentos' => 'required|string',
        'certificadoEnergetico' => 'required|string',
        'licencaHabitacao' => 'required|string',
        'notas' => 'required|string',
        'televisao' => 'required|boolean',
        'frigorifico' => 'required|boolean',
        'piscina' => 'required|boolean',
        'varanda' => 'required|boolean',
        'terraco' => 'required|boolean',
        'churrasqueira' => 'required|boolean',
        'arCondicionado' => 'required|boolean'
        ];
        return $request->validate($validate_array);


    }
}
