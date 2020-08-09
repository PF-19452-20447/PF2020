<?php

namespace App\Http\Controllers;

use App\Contrato;
use App\DataTables\ContratoDataTable;
use App\Imovel;
use App\Inquilino;
use Illuminate\Http\Request;
use Spatie\Permission\Traits\HasRoles;
use DB;

class ContratoController extends Controller
{


    use HasRoles;
    //use HandlesAuthorization;
    //use Authorizable;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ContratoDataTable $dataTable)
    {

       // $this->authorize('viewAny');
        return $dataTable->render('contratos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$inquilino = Inquilino::pluck('nome', 'id');
       // $inquilino = DB::table('inquilinos')->groupBy('nome')->get();
        $contrato = new Contrato();
        $contrato->loadDefaultValues();
        $selectedTenantes = [];
        //$selectedProperty = [];
         return view('contratos.create', compact('contrato', 'selectedTenantes'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validatedAttributes = $this->validateContract($request);
         //$validatedAttributes = $request->except('inquilino');

        if(($model = Contrato::create($validatedAttributes)) ) {
            $model->inquilinos()->attach($validatedAttributes['inquilinos_list']);
         //  $model->imovel()->attach($validatedAttributes['imovel_id']);
         //$imovel_id = $request->imovel_id;
            //flash('Role Added');
            return redirect(route('contratos.show', $model));
        }else{
            return redirect()->back();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contrato  $contrato
     * @return \Illuminate\Http\Response
     */
    public function show(Contrato $contrato)
    {
        return view('contratos.show', compact('contrato'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contrato  $contrato
     * @return \Illuminate\Http\Response
     */
    public function edit(Contrato $contrato)
    {
        $selectedTenantes = $contrato->inquilinos->pluck('id')->toArray();
        //$selectedProperty = $contrato->imovel->pluck('id')->toArray();
        return view('contratos.edit', compact('contrato', 'selectedTenantes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contrato  $contrato
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contrato $contrato)
    {
        /*if(!empty($validatedAttributes['inquilinos_list'])){
            $validatedAttributes = $request->except('inquilinos_list');
        }else{
            $validatedAttributes = $request->except('inquilinos_list');
        }*/

        $validatedAttributes = $this->validateContract($request, $contrato);
        $contrato->fill($validatedAttributes);
        if($contrato->save()) {
            $contrato->inquilinos()->sync($validatedAttributes['inquilinos_list']);
            //$contrato->imovel()->sync($validatedAttributes['imovel_id']);
            //$this->authorize('create', $inquilino);
            //flash('Role Added');
            return redirect(route('contratos.show', $contrato));
        }else{
            return redirect()->back();
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contrato  $contrato
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contrato $contrato)
    {
        $contrato->delete();
        return redirect()->route('contratos.index')
                        ->with('success','Contract deleted successfully');
    }

     /**
     * Remove the specified resource from storage with a json
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function delete(Contrato $contrato)
    {
        if($contrato->delete())
            return ['success' => true];
        else
            return ['success' => false];
    }



    public function validateContract(Request $request, Contrato $model = null): array
    {

         //nullable -> optional fields

        $validate_array = [
            'valorRenda' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'tipoContrato' => 'required|regex:/^[a-zA-Z_.,áãàâÃÀÁÂÔÒÓÕòóôõÉÈÊéèêíìîÌÍÎúùûçÇ!-.? ]+$/',
            'inicioContrato' => 'required|date_format:Y-m-d H:i:s|after:tomorrow',
            'fimContrato' => 'required|date_format:Y-m-d H:i:s|after:inicioContrato',
            'renovavel' => 'nullable|boolean',
            'isencaoBeneficio' => 'nullable|regex:/^[a-zA-Z_.,áãàâÃÀÁÂÔÒÓÕòóôõÉÈÊéèêíìîÌÍÎúùûçÇ!-.? ]+$/',
            'retencaoFonte' => 'nullable|regex:/^[a-zA-Z_.,áãàâÃÀÁÂÔÒÓÕòóôõÉÈÊéèêíìîÌÍÎúùûçÇ!-.? ]+$/',
            'dataLimitePagamento' => 'required|date_format:Y-m-d H:i:s|after:inicioContrato',
            'estado' => 'required|integer',
            'encargos' => 'required|regex:/^[a-zA-Z_.,áãàâÃÀÁÂÔÒÓÕòóôõÉÈÊéèêíìîÌÍÎúùûçÇ!-.? ]+$/',
            'caucao' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'metodoPagamento' => 'required|integer|min:0|max:6',
            'rendasAvanco' => 'nullable|regex:/^[a-zA-Z_.,áãàâÃÀÁÂÔÒÓÕòóôõÉÈÊéèêíìîÌÍÎúùûçÇ!-.? ]+$/',
            'inquilinos_list' => 'required|min:1',
            'imovel_id' => 'required'
        ];

        return $request->validate($validate_array);
    }




}
