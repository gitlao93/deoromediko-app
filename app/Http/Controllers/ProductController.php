<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index(Request $request) {
        

        $filters = $request->only(['search']);
        $products = Product::filter($filters)->paginate(5);
        

        return view('products', compact('products'));
       
    }

    public function showAll(Request $request) {
        $filters = $request->only(['search']);
        // $products = Product::filter($filters)->get();
        $products = Product::filter($filters)->paginate(10);
        

        return view('dashboard', compact('products'));
 
    }


    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'generic_name' => 'required',
            'brand_name' => 'required',
            'product_form' => 'required',
            'market_price' => 'required',
            'image_path' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);
   
        $input = $request->all();
   
        // if ($image = $request->file('image_path')) {
        //     $destinationPath = 'images/productImages';
        //     $profileImage = $request->generic_name . "_" . $request->brand_name . "_" . date('Ymd') . "." . $image->getClientOriginalExtension();
        //     $image->move($destinationPath, $profileImage);
        //     $input['image_path'] = $profileImage;
            
        // }else {
        //     $input['image_path'] = null;
        // }
        if ($image = $request->file('image_path')) {
            $destinationPath = 'images/productImages';
            $genericName = str_replace('/', '_', $request->generic_name);
            $brandName = str_replace('/', '_', $request->brand_name);
            $profileImage = $genericName . '_' . $brandName . '.' . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image_path'] = $profileImage;
        } else {
            unset($input['image_path']);
        }
        Product::create($input);
      
        return redirect('/dashboard')
                        ->with('success','Product created successfully.');
    }

    public function addproduct() {
        return view('user.addproduct');
    }


    public function update(Request $request, Product $product)
    {
        // dd($request);
        $request->validate([
            'generic_name' => 'required',
            'brand_name' => 'required',
            'product_form' => 'required',
            'market_price' => 'required',
            'image_path' => '|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = $request->all();

        // if ($image = $request->file('image_path')) {
        //     $destinationPath = 'images/productImages';
        //     $profileImage = $request->generic_name . '_' . $request->brand_name . '.' . $image->getClientOriginalExtension();
        //     $image->move($destinationPath, $profileImage);
        //     $input['image_path'] = "$profileImage";
        // } else {
        //     unset($input['image_path']);
        // }

        if ($image = $request->file('image_path')) {
            $destinationPath = 'images/productImages';
            $genericName = str_replace('/', '_', $request->generic_name);
            $brandName = str_replace('/', '_', $request->brand_name);
            $profileImage = $genericName . '_' . $brandName . '.' . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image_path'] = $profileImage;
        } else {
            unset($input['image_path']);
        }

        $product->update($input);

        return redirect('dashboard')->with('success', 'Product updated successfully.');
    }

    
}
