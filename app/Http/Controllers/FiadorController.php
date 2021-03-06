<?php

namespace App\Http\Controllers;

use App\Fiador;
use Illuminate\Http\Request;
use App\DataTables\FiadorDatatable;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use App\IBAN;
use Illuminate\Validation\Rule;
use App\Http\Controllers\FormatsMessages;
use App\Http\Controllers\ValidatesAttributes;
use App\Inquilino;
use Validation\Validator;
use App\Proprietario;
use Illuminate\Support\Facades\Auth;


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
       // $this->validate($request, ['iban' => 'regex:/^[a-zA-Z0-9\s]+$/']);

        if(($model = Fiador::create($validatedAttributes)) ) {
            //utilizador corrente
            $user = Auth::user();
            //só associa ao proprietáro se nao for administrador
            if($user->hasRole("Landlord")){
                //procura o corrente o perfil do utilizador
                $proprietario = Proprietario::where('user_id', $user->id)->first();
                $proprietario->fiadores()->save($model);
            }
            Inquilino::find($validatedAttributes['inquilino_id'])->fiadores()->save($model);

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
            if($validatedAttributes['inquilino_id'] != $fiador->inquilino_id){
                $inquilino = Inquilino::find($validatedAttributes['inquilino_id']);
                $fiador->inquilino()->associate($inquilino);
                $fiador->save();
            }

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
        $fiador->contratos()->sync([]);
        $fiador->delete();
        return redirect(route('fiador.index'));
        //
    }

    public function validateFiador(Request $request, Fiador $model = null): array
    {

         //nullable -> optional fields

        $validate_array = [
            'nome' => 'required|regex:/^[a-zA-Z_.,áãàâÃÀÁÂÔÒÓÕòóôõÉÈÊéèêíìîÌÍÎúùûçÇ!-.? ]+$/|max:255',
            'dataNascimento' => 'required|date_format:Y-m-d|before:today|nullable',
            'nif' => ['required', 'alpha_num', 'max:32'],
            'cc' => ['required', 'alpha_num', 'max:16'],
            'email' => 'required|email|unique:users',
            'telefone' => 'nullable|regex:/^([0-9\s\-\+\(\)]*)$/|min:9',
            'morada' => 'required|string',
            'iban' => ['required', 'max:64','regex:/^(PT|pt|Pt|pT)(?:[ ]?[0-9]){23}$/'],
            'tipoParticularEmpresa' => 'required|integer',
            'cae' => 'required|integer',
            'setorActividade' => 'nullable|integer',
            'certidaoPermanente' => 'nullable|integer',
            'numFuncionarios' => 'nullable|integer|min:0',
            'inquilino_id' => 'nullable'
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


  /*  public function validateIban($iban) {

        $iban = new Iban('DE89 3704 0044 0532 0130 00');
        $validator = new Validator();

            if (!$validator->validate($iban)) {
                foreach ($validator->getViolations() as $violation) {
                     echo $violation;
                }
            }*/

         /*   $iban = new Iban('DE89 3704 0044 0532 0130 00');
            $iban->getCountryCode(); // 'DE'
            $iban->getChecksum(); // '89'
            $iban->getBban(); // '370400440532013000'
            $iban->getBbanBankIdentifier(); // '37040044'*/
           /* $iban->format(Iban::FORMAT_PRINT); // 'DE89 3704 0044 0532 0130 00'
            $iban->format(Iban::FORMAT_ELECTRONIC); // 'DE89370400440532013000'
            $iban->format(Iban::FORMAT_ANONYMIZED); // 'XXXXXXXXXXXXXXXXXX3000'*/

        /*    $countryInfo = new CountryInfo('DE');
            $countryInfo->getCountryName(); // 'Germany'
            $countryInfo->getIbanStructureSwift(); // 'DE2!n8!n10!n'
            $countryInfo->getBbanStructureSwift(); // '8!n10!n'
            $countryInfo->getIbanRegex(); // '/^DE\d{2}\d{8}\d{10}$/'
            $countryInfo->getBbanRegex(); // '/^\d{8}\d{10}$/'
            $countryInfo->getIbanLength(); // 22
            $countryInfo->getBbanLength(); // 18
            $countryInfo->getIbanPrintExample(); // 'DE89 3704 0044 0532 0130 00'
            $countryInfo->getIbanElectronicExample(); // 'DE89370400440532013000'
     }*/

 /*  function validateIBAN($iban)

    {
    echo $iban;

    if (\IBAN::validate($iban)) {
        echo 'is a valid IBAN';
    } else {
        echo 'is NOT valid IBAN';
    }

        echo "\r\n";
    }*/

    //date
    /*public function date()
{
    $rules = [
       'start_date'  => 'date_format:Y-m-d|after:today'
    ];

    if ($this->request->has('start_date') && $this->request->get('start_date') != $this->request->get('end_date')) {
       $rules['end_date'] = 'date_format:Y-m-d|after:start_date';
   } else {
       $rules['end_date'] = 'date_format:Y-m-d|after:today';
   }

   return $rules;
}*/


}
