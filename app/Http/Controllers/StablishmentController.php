<?php

namespace App\Http\Controllers;

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

        $stablishment = new Stablishment( $request->validated() );

        $stablishment->image = $request->file('image')->store('principales', 'public');

        $stablishment->user_id = auth()->id();

        $stablishment->save();

        StablismentSaved::dispatch($stablishment);

        return back()->with('estado', 'Tu información se guardo con éxito');
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
