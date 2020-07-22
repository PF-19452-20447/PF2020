<?php

namespace App\Http\Controllers;

use App\Ficheiro;
use App\Imovel;
use App\Http\Requests\UploadRequest;

class MultipleUploadController extends Controller
{
    public function uploadForm()
    {
        return view('imoveis._form');
    }

    public function uploadSubmit(UploadRequest $request)
    {
        $imovel = Imovel::create($request->all());
        foreach ($request->photos as $photo) {
            $foto = $photo->store('photos');
            Ficheiro::create([
                'imovel_id' => $imovel->id,
                'foto' => $foto
            ]);
        }
        return 'Upload successful!';
    }
}
