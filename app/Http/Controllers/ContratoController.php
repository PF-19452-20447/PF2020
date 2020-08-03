<?php

namespace App\Http\Controllers;

use App\Contrato;
use App\DataTables\ContratoDataTable;
use App\Imovel;
use Illuminate\Http\Request;
use Spatie\Permission\Traits\HasRoles;

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
    public function create(Contrato $contrato)
    {

        $contrato = new Contrato();
        $contrato->loadDefaultValues();
         return view('contratos.create', compact('contrato'));
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

        if(($imodel = Contrato::create($validatedAttributes)) ) {
            if($request->hasFile('ficheiro_contrato')){
                    $imodel->addMedia($request->file('ficheiro_contrato'))->toMediaCollection('contract_files');
            }
            return redirect(route('contratos.show', $imodel));
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
        return view('contratos.edit', compact('contrato'));
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

        $validatedAttributes = $this->validateContract($request, $contrato);
        $contrato->fill($validatedAttributes);

        if($contrato->save()){

            //remove the images from server, this should be called before the code to save the images
             foreach ($request->input('cont_delete') as $file_id) {
                 $contrato->getMedia('contract_files')->where('id', $file_id)->first()->delete();
            }
            if ($request->hasFile('ficheiro_contrato')) {
                foreach ($request->file('ficheiro_contrato') as $cont) {
                    $contrato->addMedia($cont)->toMediaCollection('contract_files');
                }
            }
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
            'estado' => 'required|integer|min:0|max:6',
            'encargos' => 'required|regex:/^[a-zA-Z_.,áãàâÃÀÁÂÔÒÓÕòóôõÉÈÊéèêíìîÌÍÎúùûçÇ!-.? ]+$/',
            'caucao' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'metodoPagamento' => 'required|integer|min:0|max:6',
            'rendasAvanco' => 'nullable|regex:/^[a-zA-Z_.,áãàâÃÀÁÂÔÒÓÕòóôõÉÈÊéèêíìîÌÍÎúùûçÇ!-.? ]+$/',
            'ficheiro_contrato'=>'nullable|file',
            'cont_delete'=>'nullable',
        ];

        return $request->validate($validate_array);
    }

}
