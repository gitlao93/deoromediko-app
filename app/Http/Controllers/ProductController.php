<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use App\Models\Note;
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
        $users = User::filter($filters);
        
        
        return view('products', compact('products'));
    }

    public function showAll(Request $request)
    {
        $filters = $request->only(['search']);
        $products = Product::filter($filters)->paginate(9);
        
        $notes = Note::all();
        return view('admin.dashboard', compact('products', 'notes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'generic_name' => 'required',
            'brand_name' => 'required',
            'product_form' => 'required',
            'market_price' => ['required', 'regex:/^\d{1,3}(,\d{3})*(\.\d+)?$/'],
            'image_path' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $input = $request->all();
        // Remove comma from market_price
        $input['market_price'] = str_replace(',', '', $input['market_price']);

        if ($image = $request->file('image_path')) {
            $destinationPath = 'images/productImages';
            $genericName = preg_replace('/[^a-zA-Z0-9]/', '_', $request->generic_name);
            $brandName = preg_replace('/[^a-zA-Z0-9]/', '_', $request->brand_name);
            $profileImage = $genericName . '_' . $brandName . '_' . date('Ymd') . '.' . $image->getClientOriginalExtension();

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
        $notes = Note::all();
        return view('admin.add-prod', compact('notes'));
       
    }

    public function updateprod(Request $request)
    {
        $filters = $request->only(['search']);
        $products = Product::filter($filters)->get();

        return view('admin.update-prod', compact('products'));
    }

    public function update(Request $request, Product $product)
    {
        // Validate the form data
        $request->validate([
            'generic_name' => 'required',
            'brand_name' => 'required',
            'product_form' => 'required',
            'market_price' => ['required', 'regex:/^\d{1,3}(,\d{3})*(\.\d+)?$/'],
            'image_path' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Define the input array
        $input = $request->all();
             // Remove comma from market_price
             $input['market_price'] = str_replace(',', '', $input['market_price']);

        // Handle the image upload
        if ($request->hasFile('image_path')) {
            $destinationPath = 'images/productImages';
            $genericName = preg_replace('/[^a-zA-Z0-9]/', '_', $request->generic_name);
            $brandName = preg_replace('/[^a-zA-Z0-9]/', '_', $request->brand_name);
            $profileImage = $genericName . '_' . $brandName . '.' . $request->file('image_path')->getClientOriginalExtension();
            $request->file('image_path')->move($destinationPath, $profileImage);
            $input['image_path'] = $profileImage;

            // Compress the uploaded image
            $compressedImage = $genericName . '_' . $brandName . '_compressed.jpg';
            $image = Image::make(public_path($destinationPath . '/' . $profileImage));
            $image->encode('jpg', 60);
            $image->save(public_path($destinationPath . '/compressed/' . $compressedImage));
        } else {
            unset($input['image_path']);
        }

        // Update the product
        $product->update($input);

        // Redirect back to the dashboard
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
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'user_type' => 'required|in:user,admin',
            'profile_image' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $input = $request->only(['name', 'email', 'user_type']);
        $input['password'] = Hash::make($request->input('password'));
        $user = User::create($input);

        // Handle profile image upload
        if ($request->hasFile('profile_image')) {
            $destinationPath = 'images/profileImgs';
            $file = $request->file('profile_image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path($destinationPath), $filename);

            // Resize the image to a smaller size
            $image = Image::make(public_path($destinationPath . '/' . $filename));
            $image->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $image->save(public_path($destinationPath . '/' . $filename));

            // Update user record with profile image filename
            $user->profile_image = $filename;
            $user->save();
        }

        return redirect('admin/view-user')->with('success', 'User added successfully.');
    }

    // UPDATE USER
    public function updateuser(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'user_type' => 'required|in:user,admin',
            'password' => 'nullable|string|min:8|confirmed',
            'profile_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = User::findOrFail($id);
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->user_type = $validatedData['user_type'];
        if ($request->filled('password')) {
            $user->password = Hash::make($validatedData['password']);
        }
        $user->save();

        // Handle profile image upload
        if ($request->hasFile('profile_image')) {
            $destinationPath = 'images/profileImgs';
            $file = $request->file('profile_image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path($destinationPath), $filename);

            // Update user record with profile image filename
            $user->profile_image = $filename;
            $user->save();
        }

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
