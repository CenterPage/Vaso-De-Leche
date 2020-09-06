<?php

namespace App\Http\Controllers;

use App\Stablishment;
use Illuminate\Http\Request;

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
        return view('stablishments.create');
    }

    public function store(Request $request)
    {
        //
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
