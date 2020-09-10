<?php

namespace App\Http\Controllers;

use App\Category;
use App\Stablishment;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Http\Requests\StablishmentRequest;

class StablishmentController extends Controller
{
    public function __construct()
    {
        return $this->middleware(['auth', 'verified']);
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
        // // Validación
        // $data = $request->validate([
        //     'name' => 'required',
        //     'category_id' => 'required|exists:App\Category,id',
        //     'image' => 'required',
        //     'location' => 'required',
        //     'address' => 'required',
        //     'latitud' => 'required',
        //     'longitud' => 'required',
        //     'phone' => 'required|numeric',
        //     'description' => 'required|min:50',
        //     'open' => 'date_format:H:i',
        //     'close' => 'date_format:H:i|after:open',
        //     'uuid' => 'required|uuid'
        // ]);

        // Guardar la imagen
        // $ruta_imagen = $request['image']->store('principales', 'public');

        // Resize a la imagen
        // $img = Image::make( public_path("storage/{$ruta_imagen}") )->fit(800, 600);
        // $img->save();

        // $stablishment = new Stablishment($data);
        // $stablishment->image = $ruta_imagen;
        // $stablishment->user_id = auth()->user()->id;
        // $stablishment->save();
        // $path = $request['image']->store('principales', 'public');

        // $img = Image::make(public_path("storage/{$path}"))            ->widen(800)
        //     ->limitColors(255)
        //     ->encode();

        // $img->save();

        $stablishment = new Stablishment( $request->validated() );

        $stablishment->image = $request->file('image')->store('principales', 'public');

        $stablishment->user_id = auth()->id();

        $stablishment->save();
        // $request['image']->store('principales', 'public');
        // $request->user_id = auth()->id();
        // dd($request->all());
        // Stablishment::create($request->all());
        // dd($stablishment);
    }

    public function show(Stablishment $stablishment)
    {
        //
    }

    public function edit(Stablishment $stablishment)
    {
        return view('stablishments.edit');
    }

    public function update(Request $request, Stablishment $stablishment)
    {
        //
    }

    public function destroy(Stablishment $stablishment)
    {
        //
    }
}
