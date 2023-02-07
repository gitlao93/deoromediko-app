<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index(Request $request) {
        

        $filters = $request->only(['search']);
        $products = Product::filter($filters)->get();

        return view('products', compact('products'));
       
    }

    public function showAll() {
        return view('products',['productLists' => Product::all()]);
    }

    
}
