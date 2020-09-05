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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Stablishment  $stablishment
     * @return \Illuminate\Http\Response
     */
    public function show(Stablishment $stablishment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Stablishment  $stablishment
     * @return \Illuminate\Http\Response
     */
    public function edit(Stablishment $stablishment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Stablishment  $stablishment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stablishment $stablishment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Stablishment  $stablishment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stablishment $stablishment)
    {
        //
    }
}
