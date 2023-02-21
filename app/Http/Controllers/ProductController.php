<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $filters = $request->only(['search']);
        $products = Product::filter($filters)->paginate(5);
        return view('products', compact('products'));
    }

    public function showAll(Request $request)
    {
        $filters = $request->only(['search']);
        $products = Product::filter($filters)->get();

        return view('admin.dashboard', compact('products'));
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

        if ($image = $request->file('image_path')) {
            $destinationPath = 'images/productImages';
            $profileImage = $request->generic_name . '_' . $request->brand_name . '_' . date('Ymd') . '.' . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image_path'] = $profileImage;
        } else {
            $input['image_path'] = null;
        }

        Product::create($input);

        return redirect('admin/dashboard')->with('success', 'Product created successfully.');
    }

    public function addproduct()
    {
        return view('user.add-prod');
    }

    public function updateprod(Request $request)
    {
        $filters = $request->only(['search']);
        $products = Product::filter($filters)->get();

        return view('admin.update-prod', compact('products'));
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

        if ($image = $request->file('image_path')) {
            $destinationPath = 'images/productImages';
            $profileImage = $request->generic_name . '_' . $request->brand_name . '.' . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image_path'] = "$profileImage";
        } else {
            unset($input['image_path']);
        }

        $product->update($input);

        return redirect('admin/dashboard')->with('success', 'Product updated successfully.');
    }

    public function updatestock(Request $request, $id)
    {
        $status = $request->input('status');
        // $status = ($status == 'yes') ? 1 : 0;

        $record = Product::find($id);
        $record->status = $status;
        $record->save();

        return redirect('admin/update-prod')->with('success', 'Product updated successfully.');
    }

    public function singleprod($id)
    {
        // $filters = $id->only(['search']);

        $products = Product::where('product_ID', $id)->first();

        return view('admin.single-prod', compact('products'));
    }

    public function viewuser()
    {
        return view('admin.view-user');
    }
}
