<?php

namespace App\Http\Controllers;

use App\Photo;
use App\Category;
use App\Stablishment;
use Illuminate\Http\Request;
use App\Events\StablismentSaved;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StablishmentRequest;

class StablishmentController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth'])->except('show');
        // $this->middleware('check')->only('create'); // Mira en middleware y el kernel
    }

    public function index()
    {
        //
    }

    public function create()
    {
        $categories = Category::all();
        return view('stablishments.create', compact('categories'));
    }

    public function store(StablishmentRequest $request)
    {

        $stablishment = new Stablishment( $request->validated() );

        $stablishment->image = $request->file('image')->store('principales', 'public');

        $stablishment->user_id = auth()->id();

        $stablishment->save();

        StablismentSaved::dispatch($stablishment);

        return back()->with('estado', 'Tu información se guardo con éxito');
    }

    public function show(Stablishment $stablishment, Photo $photo)
    {
        return view('stablishments.show', compact('stablishment'));
    }

    public function edit(Stablishment $stablishment)
    {
        $categories = Category::all();

        //  En algunos navegadores la hora sale "10:00:00" y en otros "10:00". Entonces con este código oblogamos a que sea "10:00"
        $stablishment->open = date('H:i', strtotime($stablishment->open));
        $stablishment->close = date('H:i', strtotime($stablishment->close));

        // Obtener imagenes establecimiento
        $images = Photo::where('id_stablishment', $stablishment->uuid)->get();

        return view('stablishments.edit', compact('categories', 'stablishment', 'images'));
    }

    public function update(StablishmentRequest $request, Stablishment $stablishment)
    {
        $this->authorize('update', $stablishment);

        if( $request->hasFile('image') ) {
            Storage::delete($stablishment->image);

            $stablishment->fill( $request->validated() );

            $stablishment->image = $request->file('image')->store('principales');

            $stablishment->save();

            // stablishmentSaved::dispatch($stablishment);
        } else {
            $stablishment->update( array_filter($request->validated()) );
        }

        return back()->with('estado', 'El establecimiento fue actualizaco con éxito!');
    }

    public function destroy(Stablishment $stablishment)
    {
        //
    }
}
