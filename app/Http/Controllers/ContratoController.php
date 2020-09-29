<?php

namespace App\Http\Controllers;

use App\Contrato;
use App\DataTables\ContratoDataTable;
use App\Imovel;
use App\Inquilino;
use Illuminate\Http\Request;
use Spatie\Permission\Traits\HasRoles;
use DB;
use App\Renda;

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
     /*   if($request->get('contrato_id')){
            $renda = Renda::findOrfail($request->get('renda_id'));
        }*/
        //$inquilino = Inquilino::pluck('nome', 'id');
       // $inquilino = DB::table('inquilinos')->groupBy('nome')->get();
        $contrato = new Contrato();
        $contrato->loadDefaultValues();
        $selectedTenantes = [];
        $selectedGuarantors = [];

       /* if(isset($renda)){
            $contrato->valorRenda = $renda->valorPagar;
            $contrato->renda_id = $renda->id;
        }*/

         return view('contratos.create', compact('contrato', 'selectedTenantes', 'selectedGuarantors'));

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
            $model->metodoPagamento = Contrato::PAGAMENTO_MULTIBANCO;
            $model->estado= Contrato::ESTADO_ATIVO;
            $model->save();
            $model->inquilinos()->attach($validatedAttributes['inquilinos_list']);
            $model->fiadores()->attach($validatedAttributes['fiadores_list']);
            if($request->hasFile('ficheiro_contrato')){
                $model->addMedia($request->file('ficheiro_contrato'))->toMediaCollection('contract_files');
        }

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
        $selectedGuarantors = $contrato->fiadores->pluck('id')->toArray();
        //$selectedProperty = $contrato->imovel->pluck('id')->toArray();
        return view('contratos.edit', compact('contrato', 'selectedTenantes', 'selectedGuarantors'));
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

            $contrato->fiadores()->sync($validatedAttributes['fiadores_list']);

            foreach ($request->input('cont_delete', []) as $file_id) {
                $contrato->getMedia('contract_files')->where('id', $file_id)->first()->delete();
           }

           if ($request->hasFile('ficheiro_contrato')) {
                $contrato->addMedia($request->file('ficheiro_contrato'))->toMediaCollection('contract_files');
           }
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
            'valorRenda' => 'nullable|integer',
            'tipoContrato' => 'required|integer',
            'inicioContrato' => 'required|date_format:Y-m-d',
            'fimContrato' => 'nullable|date_format:Y-m-d|after:inicioContrato',
            'renovavel' => 'required|integer',
            'isencaoBeneficio' => 'nullable|regex:/^[a-zA-Z_.,áãàâÃÀÁÂÔÒÓÕòóôõÉÈÊéèêíìîÌÍÎúùûçÇ!-.? ]+$/',
            'retencaoFonte' => 'required|integer',
            'diaLimitePagamento' => 'required|integer',
            'estado' => 'required|integer',
            'encargos' => 'nullable|regex:/^[a-zA-Z_.,áãàâÃÀÁÂÔÒÓÕòóôõÉÈÊéèêíìîÌÍÎúùûçÇ!-.? ]+$/',
            'caucao' => 'nullable|integer',
            'metodoPagamento' => 'required|integer',
            'rendasAvanco' => 'nullable|integer',
            'inquilinos_list' => 'required|min:1',
            'fiadores_list' => 'required|min:1',
            'imovel_id' => 'required',
            'ficheiro_contrato'=>'nullable|file|max:5000',
            'cont_delete'=>'nullable'
        ];

        return $request->validate($validate_array);
    }




}
