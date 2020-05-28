<?php

namespace App\Http\Controllers;

use App\Proprietario;
use Illuminate\Http\Request;
use App\DataTables\ProprietarioDataTable;
use App\Traits;
use Illuminate\Support\Facades\DB;

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
    public function create(Proprietario $proprietario)
    {
        $proprietario = new Proprietario();
        $proprietario->loadDefaultValues();
        return view('proprietarios.create');
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
            return redirect(route('propietarios.show', $model));
        }else{
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
        return view('proprietarios.show',compact('proprietario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Proprietario $proprietario
     * @return \Illuminate\Http\Response
     */
    public function edit(Proprietario $proprietario)
    {
        return view('proprietarios.edit',compact('proprietario'));
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
            'nome' => ['required', 'string', 'max:255'],
            'data_nascimento' => 'required|string',
            'idade' => 'required|integer',
            'NIF' => 'required|string',
            'CC' => 'required|string',
            'email' => 'required|string',
            'telefone' => 'required|string',
            'morada' => 'required|string',
            'IBAN' => 'required|string',
            'tipo_particular_empresa' => 'required|integer|min:0',
            'cae' => 'required|integer',
            'capital_social' => 'required|integer',
            'setor_actividade' => 'required|string',
            'certidao_permanente' => 'required|string',
            'num_funcionarios' => 'required|integer'
        ];

        return $request->validate($validate_array);
    }
}
