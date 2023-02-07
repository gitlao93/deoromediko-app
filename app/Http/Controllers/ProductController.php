<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() {
        return view('products',['productLists' => Product::all()]);
    }


    public function dashboard() {
        return view('user.dashboard');
    }

    public function addproduct() {
        return view('user.addproduct');
    }
}
