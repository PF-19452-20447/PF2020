<?php

namespace App\Http\Controllers;

use App\Renda;
use App\DataTables\RendaDataTable;
use Illuminate\Http\Request;
use Spatie\Permission\Traits\HasRoles;
use App\Facades\Eupago;

use App\Contrato;
use \Magento\Framework\App\Action\Action;

class RendaController extends Controller
{
    use HasRoles;
    //use HandlesAuthorization;
    //use Authorizable;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(RendaDataTable $dataTable)
    {
       // $this->authorize('viewAny');
        return $dataTable->render('rendas.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if($request->get('contrato_id')){
            $contrato = Contrato::findOrfail($request->get('contrato_id'));
        }



        $renda = new Renda();
        $renda->loadDefaultValues();
        if(isset($contrato)){
            $renda->valorPagar = $contrato->valorRenda;
            $renda->contrato_id = $contrato->id;
        }


       // $response = Eupago::generateReferenceMB($renda->id, $renda->valorPagar);
      /*  if(Eupago::checkValidResponse($response)){
            echo "correu bem ";
            $response; //tem os dados devolvidos para eupago
            dd($response);
        }*/

         return view('rendas.create', compact('renda'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Eupago::setApiKey(config('eupago.key'));
        $validatedAttributes = $this->validateIncome($request);


        if(($model = Renda::create($validatedAttributes)) ) {

            //$renda = new Renda();
            $response = Eupago::generateReferenceMB($model->id, $model->valorPagar);
            if(Eupago::checkValidResponse($response)){
               // echo "correu bem ";
               // $response; //tem os dados devolvidos para eupago
               // dd($response);
               //On left field name in DB and on right field name in Form/view
               $model->referencia = $response->referencia;
                $model->entidade = $response->entidade;
                $model->save();
            }

            //flash('Role Added');
            return redirect(route('rendas.show', $model));

        }else{

            return redirect()->back();
        }

    }

    public function eupagoCallback (Request $request){

//ir buscar o identificador da renda
//https://arrendamento-ipt.noop.pt/rendas/eupago-callback?valor=24.00000&canal=Arrendamento&referencia=000333823&transacao=10399510&identificador=68&mp=PC%3APT&chave_api=demo-a009-ce12-393c-d95&data=2020-09-15:15:57:55&entidade=82142&comissao=0.84&local=demo
//nao é preciso transação
//ler valor, referencia identificador, chave_api, data, entidade
//valor pago = valor  .. o valor da divida = 0, data = data do pagamento ou a do dia now().
//mudar estado de pagamento para pago.



    }

    public function notificationMail(Renda $renda)
    {

        //enviar notificação depois de criar a renda com a entidade, referencia e valor no mail.
        return view('rendas.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Renda  $renda
     * @return \Illuminate\Http\Response
     */
    public function show(Renda $renda)
    {

        return view('rendas.show', compact('renda'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Renda  $renda
     * @return \Illuminate\Http\Response
     */
    public function edit(Renda $renda)
    {
        return view('rendas.edit', compact('renda'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Renda  $renda
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Renda $renda)
    {

        $validatedAttributes = $this->validateIncome($request, $renda);
        $renda->fill($validatedAttributes);
        if($renda->save()) {
            //$this->authorize('create', $inquilino);
            //flash('Role Added');
            return redirect(route('rendas.show', $renda));
        }else{
            return redirect()->back();
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Renda  $renda
     * @return \Illuminate\Http\Response
     */
    public function destroy(Renda $renda)
    {
        $renda->delete();
        return redirect()->route('rendas.index')
                        ->with('success','Income deleted successfully');
    }

    public function validateIncome(Request $request, Renda $model = null): array
    {
         //nullable -> optional fields

        $validate_array = [
            'valorPagar' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'dataPagamento' => 'required|date_format:Y-m-d|after:tomorrow',
            'metodoPagamento' => 'required|integer',
            'valorPago' => 'nullable|regex:/^\d+(\.\d{1,2})?$/',
            'valorDivida' => 'nullable|regex:/^\d+(\.\d{1,2})?$/',
            'estado' => 'required|integer',
            'dataLimitePagamento' => 'required|date_format:Y-m-d|after:dataPagamento',
            'notas' => 'nullable|regex:/^[a-zA-Z_.,áãàâÃÀÁÂÔÒÓÕòóôõÉÈÊéèêíìîÌÍÎúùûçÇ!-.? ]+$/',
            'dataRecibo' => 'required|date_format:Y-m-d|after:dataLimitePagamento',
            'entidade' => 'nullable|regex:/^\d+(\.\d{1,2})?$/',
            'referencia' => 'nullable|regex:/^\d+(\.\d{1,2})?$/'
        ];

        return $request->validate($validate_array);
    }

   
}
