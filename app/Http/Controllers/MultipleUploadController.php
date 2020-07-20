<?php

namespace App\Http\Controllers;

use App\Ficheiro;
use App\Imovel;
use Illuminate\Http\Request;

class MultipleUploadController extends Controller
{
        /**

     * success response method.

     *

     * @return \Illuminate\Http\Response

     */

    public function index()

    {

    	return view('imoveis.image-view');

    }


    /**

     * success response method.

     *

     * @return \Illuminate\Http\Response

     */

    public function store(Request $request)

    {

    	$imageName = request()->file->getClientOriginalName();

        request()->file->move(public_path('upload'), $imageName);


    	return response()->json(['uploaded' => '/upload/'.$imageName]);

    }

    public function update(Request $request, $id)
    {
        $update = $request->all();
        $product = Imovel::find($id);

        $picture = '';
        $images = [];
        if ($request->hasFile('images')) {
          $files = $request->file('images');
          foreach($files as $file){
            if (isset($file)){
              $filename = $file->getClientOriginalName();
              $extension = $file->getClientOriginalExtension();
              $picture = date('His').$filename;
              $destinationPath = base_path() . '\public\upload/';
              $file->move($destinationPath, $picture);
              array_push($images, $picture);
            }
          }
        }

        if (!empty($product['images']) && isset($images[0])) {
          $update['images'] = $images[0];
        }
        if (!empty($product['images2']) && isset($images[1])) {
          $update['images2'] = $images[1];
        }
        if (!empty($product['images3']) && isset($images[2])) {
          $update['images3'] = $images[2];
        }
        if (!empty($product['images4']) && isset($images[3])) {
          $update['images4'] = $images[3];
        }
        unset($update['images']);
        $product->update($update);
        return redirect('imoveis.show');
    }

}
