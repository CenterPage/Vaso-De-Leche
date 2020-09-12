<?php

namespace App\Http\Controllers;

use App\Category;
use App\Stablishment;
use Illuminate\Http\Request;

class ApiController extends Controller
{
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
        return response()->json($stablishment);
    }
}
