<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Termwind\Components\Raw;

class searchController extends Controller
{
    function search(Request $request){
        $search = $request->title;
        // dd($search);
        $products = Product::where('title', 'like', '%'.$search.'%')->get();
        $categories = Category::all();
        return view('store', ['products' => $products, 'categories' => $categories]);
    }

    
public function filterCategory(Request $request)
{
    $category = $request->input('category');
    // dd($request->input('category'));

    if ($category === 'All') {
        $products = Product::all();
    } else {
        $products = Product::where('category_id', $category)->get();
    }
    $categories = Category::all();

    return view('store', ['products' => $products, 'categories' => $categories]);
}
}
