<?php

namespace App\Http\Controllers;

use App\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
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

    public function destroy(Request $request)
    {
        // Policy
        // Lo cogemos de dropzone.js > removedfile > params
        // las 3 líneas son solo para pasarle la instancia al policy
        $photo = $request->get('uuid');
        $establecimiento = Stablishment::where('uuid', $uuid)->first();
        $this->authorize('delete', $establecimiento);

        // Delete Photos
        // Lo cogemos de dropzone.js > removedfile > params
        $photo = $request->get('photo'); 

        // $respuesta = [
        //     'delete-photo' => $photo
        // ];

        if (File::exists('storage/' . $photo)) {
            // Elimina del servidor
            File::delete('storage/' . $photo);
            // Elimina de la DB
            Photo::where('url', $photo)->delete();

            $response = [
                'message' => 'Foto eliminada',
                'Photo'   => $photo,
            ];
        }

        Photo::where('url', $photo)->delete();

    /***
    *
    *   Otra forma de eliminar
    *
    *   $deletePhoto = Photo::where('url', $photo)->firstOrFail();
    *   Photo::destroy($deletePhoto->id);
    *
    ***/

        return response()->json($response);
    }
}
