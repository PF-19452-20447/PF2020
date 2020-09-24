<?php

namespace App\Http\Controllers;

use App\Renda;
use App\DataTables\RendaDataTable;
use Illuminate\Http\Request;
use Spatie\Permission\Traits\HasRoles;
use App\Facades\Eupago;
use App\User;
use Notification;
use App\Contrato;
use App\Notifications\PaymentReceived;
use App\Notifications\PaymentReceived as NotificationsPaymentReceived;
use App\Proprietario;
use App\Inquilino;

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

        if($request->get('inquilino_id')){
            $inquilino = Inquilino::findOrfail($request->get('inquilino_id'));
        }

        if($request->get('proprietario_id')){
            $proprietario = Proprietario::findOrfail($request->get('proprietario_id'));
        }

        $renda = new Renda();
        $renda->loadDefaultValues();
        if(isset($contrato)){
            $renda->valorPagar = $contrato->valorRenda;
            $renda->contrato_id = $contrato->id;
        }

        if(isset($inquilino)){
            $renda->inquilino_id = $inquilino->id;
        }

        if(isset($proprietario)){
            $renda->proprietario_id = $proprietario->id;
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
                $model->estado= Renda::ESTADO_EM_ESPERA;
               // $model->estado= Renda::TYPE_PAGO;
                $model->metodoPagamento = Renda::PAGAMENTO_MULTIBANCO;
                $model->save();
            }

            //flash('Role Added');
            return redirect(route('rendas.show', $model));

        }else{

            return redirect()->back();
        }

    }

  /*  public function execute()
    {

        $response = $this->eupagoCallback();
        $JsonFactory = $this->_objectManager->get('Magento\Framework\Controller\Result\JsonFactory');
        $result = $JsonFactory->create();
        $result = $result->setData($response);
        if (!isset($response['success']))
            $result->setHttpResponseCode(403);
        return $result;
    }*/



    public function eupagoCallback (Request $request){

        //passar como parametro o request $request
        //ir buscar o identificador da renda
        //https://arrendamento-ipt.noop.pt/rendas/eupago-callback?valor=24.00000&canal=Arrendamento&referencia=000333823&transacao=10399510&identificador=68&mp=PC%3APT&chave_api=demo-a009-ce12-393c-d95&data=2020-09-15:15:57:55&entidade=82142&comissao=0.84&local=demo
        //nao é preciso transação
        //ler valor, referencia identificador, chave_api, data, entidade
        //valor pago = valor  .. o valor da divida = 0, data = data do pagamento ou a do dia now().
        //mudar estado de pagamento para pago.

        //dados da api para confirmar
       // $CallBack = $this->getRequest()->getParams();
      $CallBack_valorPagar = $request->get('valor');
      // dd($CallBack_valorPagar);
       $CallBack_referencia = $request->get('referencia');
       //dd($CallBack_referencia);
       $CallBack_chave_api = $request->get('chave_api');
       //dd($CallBack_chave_api);
        $CallBack_id = $request->get('identificador');
        //dd($CallBack_id);
        $CallBack_entidade = $request->get('entidade');
       // dd($CallBack_entidade);
        $CallBack_dataLimitePagamento = $request->get('data');
       // dd($CallBack_dataLimitePagamento);
       // $CallBack_valorPagar = $CallBack['valorPagar'];
        //dd($CallBack_valorPagar);
        //$CallBack_referencia = $CallBack['referencia'];
        //$CallBack_chave_api = $CallBack['chave_api'];
        //$CallBack_id = $CallBack['identificador'];
        //$CallBack_entidade = $CallBack['entidade'];
        //$CallBack_dataLimitePagamento = $CallBack['dataLimitePagamento'];


        //dados da renda
        $rendaId = $CallBack_id; //$CallBack_renda_id vem da api Eupago[renda-id]
        $renda = Renda::find($rendaId);
      //  dd($renda);
        $valor_renda = $renda->valorPagar; //retirado do valor total da renda

        //dados de pagamento

      /*  $pagamento = $renda->getPayment();
        $entidade = $pagamento->eupago_entidade;
        $referencia = $pagamento->eupago_referencia;
        $valorPagar = $pagamento->eupago_valorPagar;
        $dataLimitePagamento = $pagamento->eupago_dataLimitePagamento;
        $chave_api = $pagamento->eupago_chave_api;*/

        //confirmar dados

        $confere_valorPagar = (($valor_renda == $CallBack_valorPagar)  ? true : false);
        //dd($confere_valorPagar);
        $confere_entidade = ($renda->entidade == $CallBack_entidade ? true : false);
        //dd($confere_entidade);
        $confere_referencia = ($renda->referencia == $CallBack_referencia ? true : false);
       // dd($confere_referencia);
        $confere_chave_api = ($CallBack_chave_api == config('eupago.key') ? true : false);
        //dd($confere_chave_api);
       // $confere_dataLimitePagamento = ($renda->dataLimitePagamento == $CallBack_dataLimitePagamento ? true : false);

        // se tudo ok, faz o update do estado da renda e envia um email ao inquilino

        if($confere_valorPagar && $confere_chave_api && $confere_referencia && $confere_entidade ){ /*futuro upgrade -> $confere_autorizacao*/

            $renda->estado= Renda::ESTADO_PAGO;
            $renda->metodoPagamento = Renda::PAGAMENTO_MULTIBANCO;
            $renda->valorPago = $valor_renda;
            $renda->valorDivida= 0;
            //$renda->id = Renda::find($rendaId);
            $date = preg_replace('/:/', ' ', $CallBack_dataLimitePagamento, 1);
            $renda->dataPagamento = $date;
           // $renda->dataPagamento= now();
            //$renda->valorPagar= $valor_renda;
            //$renda->entidade= $entidade;
            //$renda->referencia = $referencia;
            $renda->save();

            //$user = User::where('proprietario_id', $renda->proprietario->id);
            //dd($renda->proprietario->id);
            $user = $renda->proprietario->user;
           //dd($renda->proprietario->user);
            $user->notify(new PaymentReceived($renda));

        }



       /* $user = User::first();
        $user->notify(new PaymentReceived($renda));
        dd($user->notify);*/
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
            'dataPagamento' => 'required|date_format:Y-m-d',
            'metodoPagamento' => 'required|integer',
            'valorPago' => 'nullable|regex:/^\d+(\.\d{1,2})?$/',
            'valorDivida' => 'nullable|regex:/^\d+(\.\d{1,2})?$/',
            'estado' => 'required|integer',
            'dataLimitePagamento' => 'nullable|date_format:Y-m-d',
            'notas' => 'nullable|regex:/^[a-zA-Z_.,áãàâÃÀÁÂÔÒÓÕòóôõÉÈÊéèêíìîÌÍÎúùûçÇ!-.? ]+$/',
            'dataRecibo' => 'nullable|date_format:Y-m-d',
            'entidade' => 'nullable|regex:/^\d+(\.\d{1,2})?$/',
            'referencia' => 'nullable|regex:/^\d+(\.\d{1,2})?$/',
            'contrato_id' => 'nullable|regex:/^\d+(\.\d{1,2})?$/',
            'inquilino_id' => 'nullable|regex:/^\d+(\.\d{1,2})?$/',
            'proprietario_id' => 'nullable|regex:/^\d+(\.\d{1,2})?$/'
        ];

        return $request->validate($validate_array);
    }


}
