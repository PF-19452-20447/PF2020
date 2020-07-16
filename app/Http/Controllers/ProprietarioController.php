<?php

namespace App\Http\Controllers;

use App\Proprietario;
use Illuminate\Http\Request;
use App\DataTables\ProprietarioDataTable;
use App\Traits;
use Illuminate\Support\Facades\DB;
use Validation\Validator;
use App\Http\Controllers\Controller;
use Auth;
use App\Http\Controllers\General_news;

class ProprietarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ProprietarioDataTable $datatable)
    {

        return $datatable->render('proprietarios.index');
        // $proprietarios = Proprietario::latest()->paginate(5);
        // return view('proprietarios.index', compact('proprietarios'))
        //     ->with('i',(request()->input('page', 1) - 1) *5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Proprietario $proprietario, $proprietario_id = null)
    {
        $proprietario = new Proprietario();
        $proprietario->loadDefaultValues();

        $proprietario_list = DB::table('proprietarios')->groupBy('nome')->get();

/*
        //select box
        $proprietario = null;
        if(!$proprietario_id){
            $proprietario = Proprietario::where('user_id', Auth::user()->id)->get();
        }
*/
        return view('proprietarios.create')->with('proprietario_list', $proprietario_list); //, ['id' => $proprietario_id, 'proprietario' => $proprietario]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {




        $validatedAttributes = $this->validateProprietario($request);

        if(($model = Proprietario::create($validatedAttributes)) ) {
            //flash('Role Added');
            return redirect(route('proprietarios.show', $model));
        }else{

            $proprietario = $request->input('proprietario_list');
            $proprietario = implode(',', $proprietario);

            $input = $request->except('proprietario_list');
            //Assign the "mutated" news value to $input
            $input['proprietario_list'] = $proprietario;

            Proprietario::create($input);

            return redirect()->back();
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Proprietario  $proprietarios
     * @return \Illuminate\Http\Response
     */
    public function show(Proprietario $proprietario)
    {
        $proprietario_list = DB::table('proprietarios')->groupBy('nome')->get();

        return view('proprietarios.show',compact('proprietario'))->with('proprietario_list', $proprietario_list);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Proprietario $proprietario
     * @return \Illuminate\Http\Response
     */
    public function edit(Proprietario $proprietario)
    {
        $proprietario_list = DB::table('proprietarios')->groupBy('nome')->get();
        return view('proprietarios.edit',compact('proprietario'))->with('proprietario_list', $proprietario_list);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Proprietario  $proprietario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proprietario $proprietario)
    {
        $validatedAttributes = $this->validateProprietario($request, $proprietario);
        $proprietario->fill($validatedAttributes);
        if($proprietario->save()) {
            //flash('Role Added');
            return redirect(route('proprietarios.show', $proprietario));
        }else{
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Proprietarios  $proprietarios
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proprietario $proprietario)
    {
        $proprietario->delete();

        return redirect()->route('proprietarios.index')
                        ->with('success','Proprietário eliminado com sucesso.');
    }

    public function validateProprietario(Request $request, Proprietario $model = null): array
    {

        $validate_array = [
            'nome' => 'required|regex:/^[a-zA-Z_.,áãàâÃÀÁÂÔÒÓÕòóôõÉÈÊéèêíìîÌÍÎúùûçÇ!-.? ]+$/|max:255',
            'dataNascimento' => 'required|date_format:Y-m-d|before:today|nullable',
            'nif' => ['required', 'alpha_num', 'max:32'],
            'cc' => ['required', 'alpha_num', 'max:16'],
            'email' => 'required|email|unique:users',
            'telefone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:9',
            'morada' => 'required|string',
            'iban' => ['required', 'alpha_dash', 'max:64'],
            'tipoParticularEmpresa' => 'required|integer|min:0',
            'cae' => 'required|integer',
            'capitalSocial' => 'required|integer',
            'setorActividade' => 'required|regex:/^[a-zA-Z_.,áãàâÃÀÁÂÔÒÓÕòóôõÉÈÊéèêíìîÌÍÎúùûçÇ!-.? ]+$/',
            'certidaoPermanente' => 'required|regex:/^[a-zA-Z_.,áãàâÃÀÁÂÔÒÓÕòóôõÉÈÊéèêíìîÌÍÎúùûçÇ!-.? ]+$/',
            'numFuncionarios' => 'required|integer'
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

  /*  private function syncLandlord(Request $request, $proprietario)
    {
         // Get the submitted proprietarios
        $prop = $request->get('proprietarios', []);
        $permissions = $request->get('permissions', []);

        // Get the roles
        $prop = Proprietario::find($prop);

        // check for current role changes
         if( ! $proprietario->hasAllRoles( $prop ) ) {
             // reset all direct permissions for user
            $proprietario->permissions()->sync([]);
         } else {
            // handle permissions
            $proprietario->syncPermissions($permissions);
        }

      $proprietario->syncRoles($prop);
      return $proprietario;
    }*/


}
