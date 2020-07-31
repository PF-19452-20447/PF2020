<?php

namespace App\Http\Controllers;

use App\Renda;
use App\DataTables\RendaDataTable;
use Illuminate\Http\Request;
use Spatie\Permission\Traits\HasRoles;

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
    public function create(Renda $renda)
    {

        $renda = new Renda();
        $renda->loadDefaultValues();
         return view('rendas.create');
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

        if(($model = Renda::create($validatedAttributes)) ) {
            //flash('Role Added');
            return redirect(route('rendas.show', $model));
        }else{
            return redirect()->back();
        }

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

        $validatedAttributes = $this->validateContract($request, $renda);
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

    public function validateContract(Request $request, Renda $model = null): array
    {
         //nullable -> optional fields

        $validate_array = [
            'valorPagar' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'dataPagamento' => 'required|date_format:Y-m-d|after:tomorrow',
            'metodoPagamento' => 'required|integer|min:0|max:6',
            'valorPago' => 'nullable|regex:/^\d+(\.\d{1,2})?$/',
            'valorDivida' => 'nullable|regex:/^\d+(\.\d{1,2})?$/',
            'estado' => 'required|integer|min:0|max:6',
            'dataLimitePagamento' => 'required|date_format:Y-m-d|after:dataPagamento',
            'notas' => 'nullable|regex:/^[a-zA-Z_.,áãàâÃÀÁÂÔÒÓÕòóôõÉÈÊéèêíìîÌÍÎúùûçÇ!-.? ]+$/',
            'dataRecibo' => 'required|date_format:Y-m-d|after:dataLimitePagamento'
        ];

        return $request->validate($validate_array);
    }
}
