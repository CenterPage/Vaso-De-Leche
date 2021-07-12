<?php

namespace App\Http\Controllers\search;

use App\Http\Controllers\Controller;
use App\Stablishment;
use Illuminate\Http\Request;

class SearchStablishment extends Controller
{
    public function search(Request $request)
    {
        $stablishments = Stablishment::where('name', 'LIKE', '%'. $request->search. '%')->latest()->paginate(6);

        return view('stablishments.search', compact('stablishments'));
    }
}
