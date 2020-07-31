<?php

namespace App\Http\Controllers;

use App\Imovel;
use Illuminate\Http\Request;
use App\DataTables\ImovelDatatable;
use Illuminate\Support\Facades\Storage;

class ImovelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ImovelDatatable $dataTable)
    {
        return $dataTable->render('imoveis.index');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $imovel = new Imovel();
        $imovel->loadDefaultValues();
        return view('imoveis.create', compact('imovel'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedAttributes = $this->validateImovel($request);

        if(($imodel = Imovel::create($validatedAttributes)) ) {
            if ($request->hasFile('photos')) {
                foreach ($request->file('photos') as $photo) {
                    // $foto = $photo->store('photos');
                    $imodel->addMedia($photo)->toMediaCollection('images');
                 }
            }
            return redirect(route('imoveis.show', $imodel));
        }else
            return redirect()->back();
    }

   /* public function uploadSubmit(Request $request)
    {
        $imovel = Imovel::create($request->all());
        foreach ($request->photos as $photo) {
           // $foto = $photo->store('photos');
           $imovel->addMedia($photo)->toMediaCollection('images');
           dd('olá');
        }
        return 'Upload successful!';
    }*/

    /**
     * Display the specified resource.
     *
     * @param  \App\Imovel  $imovel
     * @return \Illuminate\Http\Response
     */
    public function show(Imovel $imovel)
    {
        return view('imoveis.show', compact('imovel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Imovel  $imovel
     * @return \Illuminate\Http\Response
     */
    public function edit(Imovel $imovel)
    {
        return view('imoveis.edit', compact("imovel"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Imovel  $imovel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Imovel $imovel)
    {

        $validatedAttributes = $this->validateImovel($request, $imovel);
        $imovel->fill($validatedAttributes);

        if($imovel->save()) {
            //remove the images from server, this should be called before the code to save the images
            foreach ($request->input('img_delete', []) as $file_id) {
                $imovel->getMedia('images')->where('id', $file_id)->first()->delete();
            }
            if ($request->hasFile('photos')) {
                foreach ($request->file('photos') as $photo) {
                    $imovel->addMedia($photo)->toMediaCollection('images');
                }
            }
            return redirect(route('imoveis.show', $imovel));
        }else{
            return redirect()->back();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Imovel  $imovel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Imovel $imovel)
    {
        $imovel->delete();

        return redirect()->route('imoveis.index')
                        ->with('success','Property successfully deleted!');
    }


    /**
     * validateImovel
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Imovel  $imovel
     * @return array
     */
    public function validateImovel(Request $request, Imovel $model = null): array
    {

         //nullable -> optional fields

        $validate_array = [
            'tipo' => 'required|string|nullable',
            'tipologia' => 'required|string',
            'area' => 'nullable|integer',
            'morada' => 'required|string',
            'numQuartos' => 'required|integer',
            'numCasaBanho' => 'required|integer',
            'descricao' => 'nullable|string',
            'estado' => 'required|boolean',
            'mobilado' => 'nullable|boolean',
            'fumar' => 'nullable|boolean',
            'animaisEstimacao' => 'nullable|boolean',
            'outrosEquipamentos' => 'nullable|string',
            'certificadoEnergetico' => 'nullable|string',
            'licencaHabitacao' => 'nullable|string',
            'notas' => 'nullable|string',
            'televisao' => 'nullable|boolean',
            'frigorifico' => 'nullable|boolean',
            'piscina' => 'nullable|boolean',
            'varanda' => 'nullable|boolean',
            'terraco' => 'nullable|boolean',
            'churrasqueira' => 'nullable|boolean',
            'arCondicionado' => 'nullable|boolean',
            'photos.*'=>'nullable|file',
            'img_delete'=>'nullable',
        ];
        return $request->validate($validate_array);


    }
}
