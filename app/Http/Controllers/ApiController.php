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
        $stablishments = Stablishment::with('category')->get();
        return response()->json($stablishments);
    }

    public function getCategory()
    {
    	$categories = Category::all();
    	return response()->json($categories);
    }

    // Obtener las categoríasy mostrarlas en el mapa principal
    public function stablishmentCategory(Category $category)
    {
        $stablishments = Stablishment::with('Category')->where('category_id', $category->id)->latest()->get();
        return response()->json($stablishments);
    }

    // Obtener la categorías y mostrarlas en el mapa principal según su categoría. Ejm "Category One, Category Two"
    public function showCategory(Category $category)
    {
    	$stablishments = Stablishment::with('Category')->where('category_id', $category->id)->take(2)->latest()->get();
    	return response()->json($stablishments);
    }

    // public function show(Stablishment $stablishment)
    // {
    //     $photos = Photo::where('id_stablishment', $stablishment->uuid)->get();
    //     // Inyecta las fotos
    //     $stablishment->photos = $photos;

    //     return response()->json($stablishment);
    // }

    // showStablishment
    public function show(Stablishment $stablishment)
    {
        $photos = Photo::where('id_stablishment', $stablishment->uuid)->get();

        $stablishments = Stablishment::with('category')->where('category_id', $stablishment->category_id)->get();

        // Inyecta las fotos
        $stablishments->photos = $photos;

        return response()->json($stablishments);
    }
}
