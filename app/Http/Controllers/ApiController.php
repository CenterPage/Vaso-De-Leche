<?php

namespace App\Http\Controllers;

use App\photo;
use App\Category;
use App\Stablishment;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function index()
    {
        $stablishments = Stablishment::all();
        return response()->json($stablishments);
    }

    public function getCategory()
    {
    	$categories = Category::all();
    	return response()->json($categories);
    }

    public function showCategory(Category $category)
    {
    	$stablishments = Stablishment::with('Category')->where('category_id', $category->id)->take(2)->latest()->get();
    	return response()->json($stablishments);
    }

    public function show(Stablishment $stablishment)
    {
        $photos = Photo::where('id_stablishment', $stablishment->uuid)->get();
        // Inyecta las fotos
        $stablishment->photos = $photos;

        return response()->json($stablishment);
    }
}
