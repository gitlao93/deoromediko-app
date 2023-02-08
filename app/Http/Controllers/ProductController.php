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

    // public function create() {
    //     return view('add-prod');
    // }


    public function store(Request $request)
    {
        $request->validate([
            'generic_name' => 'required',
            'brand_name' => 'required',
            'product_form' => 'required',
            'market_price' => 'required',
            'image_path' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
   
        $input = $request->all();
   
        if ($image = $request->file('image_path')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image_path'] = "$profileImage";
        }
     
        Product::create($input);
      
        return redirect('user/dashboard')
                        ->with('success','Product created successfully.');
    }

    public function singleprod() {
        return view('user.single-prod');
    }

    public function updateprod(Request $request) {

        $filters = $request->only(['search']);
        $products = Product::filter($filters)->get();

        return view('user.update-prod', compact('products'));

    }

    public function addproduct() {
        return view('user.addproduct');
    }

    public function viewuser() {
        return view('user.view-user');
    }


    public function dashboard(Request $request) {

        $filters = $request->only(['search']);
        $products = Product::filter($filters)->get();

        return view('user.dashboard', compact('products'));

    }


    
}
