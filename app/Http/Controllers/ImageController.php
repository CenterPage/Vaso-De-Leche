<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function __construct()
    {
        return $this->middleware(['auth', 'verified']);
    }

    public function store(Request $request)
    {
        return $request->all();
        // return $request->file('file');
    }
}
