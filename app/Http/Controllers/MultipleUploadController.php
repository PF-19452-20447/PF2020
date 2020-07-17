<?php

namespace App\Http\Controllers;

use App\Imovel;
use Illuminate\Http\Request;

class MultipleUploadController extends Controller
{
    function indexFiles()
    {
     return view('multiple-file-upload');
    }

    function uploadFiles(Request $request)
    {
     $image_code = '';
     $images = $request->file('file');
     foreach($images as $image)
     {
      $new_name = rand() . '.' . $image->getClientOriginalExtension();
      $image->move(public_path('images'), $new_name);
      $image_code .= '<div class="col-md-3" style="margin-bottom:24px;"><img src="/images/'.$new_name.'" class="img-thumbnail" /></div>';
     }

     $output = array(
      'success'  => 'Images uploaded successfully',
      'image'   => $image_code
     );

     return response()->json($output);
    }

   
}
