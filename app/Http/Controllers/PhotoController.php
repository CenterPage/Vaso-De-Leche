<?php

namespace App\Http\Controllers;

use App\Photo;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PhotoController extends Controller
{
    public function __construct()
    {
        return $this->middleware(['auth', 'verified']);
    }

    public function store(Request $request)
    {
    	// Leer la imagen
    	$path = $request->file('file')->store('establecimientos', 'public');

		// Resize la imagen
    	$image = Image::make(public_path("storage/{$path}"))->fit(800, 450);
    	$image->save();

    	// Almacenar con modelo
    	$imageDB = new Photo;
    	$imageDB->id_stablishment = $request['uuid'];
    	$imageDB->url = $path;

    	$imageDB->save();

    	// Retorna respuesta
    	$respuesta = [ 'archivo' => $path ];

        return response()->json($respuesta);
        
    }
}
