<?php

namespace App\Http\Controllers;

use App\DataTables\InquilinoDataTable;
use App\Inquilino;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Traits\Authorizable;
use App\Permission;
use App\Role;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\Http\Controllers\InquilinosDataTable;
use App\Http\Controllers\Session;
use App\Traits;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\VerifiesEmails;
use App\Http\Controllers\Auth\VerificationController;
use App\Policies\InquilinoPolicy;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Access\Response;
use Illuminate\Validation\Rules\In;
use pp\Http\Controllers\HandlesAuthorization;
use Spatie\Permission\Traits\HasRoles;
use Validation\Validator;

class InquilinoController extends Controller
{
    use HasRoles;
    //use HandlesAuthorization;
    //use Authorizable;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(InquilinoDataTable $dataTable)
    {

       // $this->authorize('viewAny');
        return $dataTable->render('inquilinos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Inquilino $inquilino)
    {
        // get current logged in user
    //$user = Auth::user();

   /* if ($user->can('add_tenant', Inquilino::class)) {
      echo 'Current logged in user is allowed to create new tenants.';
    } else {
        $this->authorize('add_tenant',Inquilino::class);
      echo 'Not Authorized';
    }*/

        $inquilino = new Inquilino();
        $inquilino->loadDefaultValues();
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
        $validatedAttributes = $this->validateTenant($request);

        if(($model = Inquilino::create($validatedAttributes)) ) {
            //flash('Role Added');
            return redirect(route('inquilinos.show', $model));
        }else{
            return redirect()->back();
        }

     /*   $request->validate([

            'nome' => 'required',
            'dataNascimento' => 'required',
            'idade' => 'required',
            'nif' => 'required',
            'cc' => 'required',
            'email' => 'required',
            'telefone' => 'required',
            'morada' => 'required',
            'iban' => 'required',
            'tipoParticular_empresa' => 'required',
            'profissao' => 'required',
            'vencimento' => 'required',
            'tipoContrato' => 'required',
            'notas' => 'required',
            'cae' => 'required',
            'capitalSocial' => 'required',
            'setorActividade' => 'required',
            'certidaoPermanente' => 'required',
            'numFuncionarios' => 'required',

        ]);*/

     /*   Inquilino::create($request->all());
        return redirect()->route('inquilinos.index')
             ->with('success','Inquilino created successfully.');*/
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Inquilino  $inquilino
     * @return \Illuminate\Http\Response
     */
    public function show(Inquilino $inquilino)
    {
        // get current logged in user
   // $user = Auth::user();

    // load post
   // $inquilino = Inquilino::find(1);

  /*  if ($user->can('view_tenant', Inquilino::class)) {

      echo "Current logged in user is allowed to update the Tenant: {$inquilino->id}";
    } else {
        $this->authorize('view_tenant', $inquilino);
        echo 'Not Authorized.';
    }

      /*  if(auth()->user()->can('Tenant')){
            $this->authorize('show', $inquilino);
        }*/

        //$inquilino = Inquilino::findOrfail($id);
        return view('inquilinos.show', compact('inquilino'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Inquilino  $inquilino
     * @return \Illuminate\Http\Response
     */
    public function edit(Inquilino $inquilino)
    {
      /* if(auth()->user()->can('edit_tenant')){
            $this->authorize('edit_tenant', $inquilino);
        }*/

        //$inquilino = Inquilino::findOrfail($id);
        return view('inquilinos.edit', compact('inquilino'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Inquilino  $inquilino
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inquilino $inquilino)
    {

// get current logged in user
//$user = Auth::user();

// load post
//$inquilino = Inquilino::find(1);

/*if ($user->can('edit_tenant', $inquilino)) {
  echo "Current logged in user is allowed to update the tenant: {$inquilino->id}";
} else {
    $this->authorize('edit_tenant', $inquilino);
  echo 'Not Authorized.';
}*/

        $validatedAttributes = $this->validateTenant($request, $inquilino);
        $inquilino->fill($validatedAttributes);
        if($inquilino->save()) {
            //$this->authorize('create', $inquilino);
            //flash('Role Added');
            return redirect(route('inquilinos.show', $inquilino));
        }else{
            return redirect()->back();
        }
      //  $inquilino = Inquilino::findOrfail($id);
      /*  $this->validate($request,[

            'nome' => 'required',
            'dataNascimento' => 'required',
            'idade' => 'required',
            'nif' => 'required',
            'cc' => 'required',
            'email' => 'required',
            'telefone' => 'required',
            'morada' => 'required',
            'iban' => 'required',
            'tipoParticular_empresa' => 'required',
            'profissao' => 'required',
            'vencimento' => 'required',
            'tipoContrato' => 'required',
            'notas' => 'required',
            'cae' => 'required',
            'capitalSocial' => 'required',
            'setorActividade' => 'required',
            'certidaoPermanente' => 'required',
            'numFuncionarios' => 'required',

        ]);*/

       /* $input = $request->all();
        $inquilino->fill($input)->save();

        $request->session()->flash('inquilinos', $input);

        return redirect()->route('inquilinos.index')
                ->with('success','Inquilino updated successfully.');*/

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Inquilino  $inquilino
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inquilino $inquilino)
    {
       /* if(auth()->user()->can('Tenant')){
            $this->authorize('destroy', $inquilino);
        }*/

         // get current logged in user
    //$user = Auth::user();

    // load post
    //$inquilino = Inquilino::find(1);

    /*if ($user->can('delete_tenant', $inquilino)) {

      echo "Current logged in user is allowed to delete the Post: {$inquilino->id}";
    } else {
        $this->authorize('delete_tenant', $inquilino);
      echo 'Not Authorized.';
    }*/

       // $inquilino = Inquilino::findOrfail($id);
        $inquilino->delete();
        return redirect()->route('inquilinos.index')
                        ->with('success','Inquilino deleted successfully');
    }

    public function validateTenant(Request $request, Inquilino $model = null): array
    {
        //nullable -> optional fields

        $validate_array = [
            'nome' => 'required|regex:/^[a-zA-Z_.,áãàâÃÀÁÂÔÒÓÕòóôõÉÈÊéèêíìîÌÍÎúùûçÇ!-.? ]+$/|max:255',
            'dataNascimento' => 'required|date_format:Y-m-d|before:today|nullable',
            'nif' => ['required', 'alpha_num', 'max:32'],
            'cc' => ['required', 'alpha_num', 'max:16'],
            'email' => 'required|email|unique:users',
            'telefone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:9',
            'morada' => 'required|string',
            'iban' => ['nullable', 'alpha_dash', 'max:64'],
            'tipoParticularEmpresa' => 'required|integer|min:0',
            'profissao' => 'required|regex:/^[a-zA-Z_.,áãàâÃÀÁÂÔÒÓÕòóôõÉÈÊéèêíìîÌÍÎúùûçÇ!-.? ]+$/',
            'vencimento' => 'required|integer',
            'tipoContrato' => 'required|regex:/^[a-zA-Z_.,áãàâÃÀÁÂÔÒÓÕòóôõÉÈÊéèêíìîÌÍÎúùûçÇ!-.? ]+$/',
            'notas' => 'nullable|regex:/^[a-zA-Z_.,áãàâÃÀÁÂÔÒÓÕòóôõÉÈÊéèêíìîÌÍÎúùûçÇ!-.? ]+$/',
            'cae' => 'nullable|integer',
            'capitalSocial' => 'nullable|integer',
            'setorActividade' => 'nullable|regex:/^[a-zA-Z_.,áãàâÃÀÁÂÔÒÓÕòóôõÉÈÊéèêíìîÌÍÎúùûçÇ!-.? ]+$/',
            'certidaoPermanente' => 'nullable|regex:/^[a-zA-Z_.,áãàâÃÀÁÂÔÒÓÕòóôõÉÈÊéèêíìîÌÍÎúùûçÇ!-.? ]+$/',
            'numFuncionarios' => 'nullable|integer|min:0'
        ];

        return $request->validate($validate_array);
    }

    function checkIBAN($iban)
    {
        $iban = strtolower(str_replace(' ','',$iban));
        $Countries = array('al'=>28,'ad'=>24,'at'=>20,'az'=>28,'bh'=>22,'be'=>16,'ba'=>20,'br'=>29,'bg'=>22,'cr'=>21,'hr'=>21,'cy'=>28,'cz'=>24,'dk'=>18,'do'=>28,'ee'=>20,'fo'=>18,'fi'=>18,'fr'=>27,'ge'=>22,'de'=>22,'gi'=>23,'gr'=>27,'gl'=>18,'gt'=>28,'hu'=>28,'is'=>26,'ie'=>22,'il'=>23,'it'=>27,'jo'=>30,'kz'=>20,'kw'=>30,'lv'=>21,'lb'=>28,'li'=>21,'lt'=>20,'lu'=>20,'mk'=>19,'mt'=>31,'mr'=>27,'mu'=>30,'mc'=>27,'md'=>24,'me'=>22,'nl'=>18,'no'=>15,'pk'=>24,'ps'=>29,'pl'=>28,'pt'=>25,'qa'=>29,'ro'=>24,'sm'=>27,'sa'=>24,'rs'=>22,'sk'=>24,'si'=>19,'es'=>24,'se'=>24,'ch'=>21,'tn'=>24,'tr'=>26,'ae'=>23,'gb'=>22,'vg'=>24);
        $Chars = array('a'=>10,'b'=>11,'c'=>12,'d'=>13,'e'=>14,'f'=>15,'g'=>16,'h'=>17,'i'=>18,'j'=>19,'k'=>20,'l'=>21,'m'=>22,'n'=>23,'o'=>24,'p'=>25,'q'=>26,'r'=>27,'s'=>28,'t'=>29,'u'=>30,'v'=>31,'w'=>32,'x'=>33,'y'=>34,'z'=>35);

        if(strlen($iban) == $Countries[substr($iban,0,2)]){

            $MovedChar = substr($iban, 4).substr($iban,0,4);
            $MovedCharArray = str_split($MovedChar);
            $NewString = "";

            foreach($MovedCharArray AS $key => $value){
                if(!is_numeric($MovedCharArray[$key])){
                    $MovedCharArray[$key] = $Chars[$MovedCharArray[$key]];
                }
                $NewString .= $MovedCharArray[$key];
            }

            if(bcmod($NewString, '97') == 1)
            {
                return true;
            }
        }
        return false;
    }

    public function validatePhoneNumber (){
        Validator::extend('telefone', function($attribute, $value, $parameters)
    {
        return substr($value, 0, 2) == '01';
    });
    }

    function validaNIF($nif, $ignoreFirst=true) {
        //Limpamos eventuais espaços a mais
        $nif=trim($nif);
        //Verificamos se é numérico e tem comprimento 9
        if (!is_numeric($nif) || strlen($nif)!=9) {
            return false;
        } else {
            $nifSplit=str_split($nif);
            //O primeiro digíto tem de ser 1, 2, 3, 5, 6, 8 ou 9
            //Ou não, se optarmos por ignorar esta "regra"
            if (
                in_array($nifSplit[0], array(1, 2, 3, 5, 6, 8, 9))
                ||
                $ignoreFirst
            ) {
                //Calculamos o dígito de controlo
                $checkDigit=0;
                for($i=0; $i<8; $i++) {
                    $checkDigit+=$nifSplit[$i]*(10-$i-1);
                }
                $checkDigit=11-($checkDigit % 11);
                //Se der 10 então o dígito de controlo tem de ser 0
                if($checkDigit>=10) $checkDigit=0;
                //Comparamos com o último dígito
                if ($checkDigit==$nifSplit[8]) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }

    }

}
