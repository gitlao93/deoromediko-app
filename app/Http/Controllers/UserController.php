<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\User;
use App\Models\Note;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $filters = $request->only(['search']);
        $products = Product::filter($filters)->get();
        $notes = Note::all();
        return view('users.dashboard', compact('products', 'notes'));

        // return view('users.dashboard', compact('products'));
    }

     // USERS CONTROLLER

     public function userupdateprod(Request $request)
     {
         $filters = $request->only(['search']);
         $products = Product::filter($filters)->get();
 
         return view('users.update-prod', compact('products'));
     }
 
     public function usersupdate(Request $request)
     {
         $filters = $request->only(['search']);
         $products = Product::filter($filters)->get();
 
         return view('users.update-prod', compact('products'));
     }
 
     public function userupdate(Request $request, Product $product)
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
 
         return redirect('users/dashboard')->with('success', 'Product updated successfully.');
     }
 
     public function usersupdatestock(Request $request, $id)
     {
         $status = $request->input('status');
         // $status = ($status == 'yes') ? 1 : 0;
 
         $record = Product::find($id);
         $record->status = $status;
         $record->save();
 
         return redirect('users/update-prod')->with('success', 'Product updated successfully.');
     }

     public function singleprod($id)
     {
         // $filters = $id->only(['search']);
 
         $products = Product::where('product_ID', $id)->first();
 
         return view('users.single-prod', compact('products'));
     }



  
  

}
