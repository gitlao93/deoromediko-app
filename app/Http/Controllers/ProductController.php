<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    // ADMIN CONTROLLER
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

            // Resize the image using Intervention Image
            $image = Image::make($image);
            $image->resize(800, 600);
            $image->save($destinationPath . '/' . $profileImage, 60);

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

    public function viewuser(Request $request)
    {
        $filters = $request->only(['search']);
        $users = User::filter($filters)->get();

        return view('admin.view-user', compact('users'));
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect('admin/dashboard')->with('success', 'Product deleted successfully.');
    }

    //  ADD NEW USER
    public function storeuser(Request $request)
    {
        //  dd($request);
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'user_type' => 'required|in:user,admin',
        ]);

        $input = $request->only(['name', 'email', 'user_type']);
        $input['password'] = Hash::make($request->input('password'));
        User::create($input);

        return redirect('admin/view-user')->with('success', 'User added successfully.');
    }

    // UPDATE USER
    public function updateuser(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,
            'user_type' => 'required|in:user,admin',
            'password' => 'required|nullable|string|min:8|confirmed',
        ]);

        $user = User::findOrFail($id);
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->user_type = $validatedData['user_type'];
        if ($request->filled('password')) {
            $user->password = Hash::make($validatedData['password']);
        }
        $user->save();

        return redirect('admin/view-user')->with('success', 'User updated successfully.');
    }

    // DELETE USER
    public function deleteuser($id)
    {
        $users = User::findOrFail($id);
        $users->delete();
        return redirect('admin/view-user')->with('success', 'User deleted successfully.');
    }
}
