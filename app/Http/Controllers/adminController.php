<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class adminController extends Controller
{
    
    public function dashboard()
    {
        $categories = Category::all();
        $products = Product::all();
        return view('dashboard', compact('categories', 'products'));
    }
    
    public function addCategory(Request $request)
    {
        // dd($request);
        $data = new Category();
        $data->catName = $request->catName;
        $data->save();

        return redirect()->back()->with('message','Category added succesfully');
    }
    
    public function deleteCat($category)
    {
        $categories = Category::find($category);
        $categories->delete();
        return redirect()->back()->with('message2','Category deleted succesfully');
    }
    
    public function addProduct(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'price' => 'required',
            'quantity' => 'required|integer',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move('product', $imageName);

            $product = new Product();
            $product->title = $request->title;
            $product->category = $request->category;
            $product->price = $request->price;
            $product->quantity = $request->quantity;
            $product->description = $request->description;
            $product->image = $imageName;
            $product->save();

            return redirect()->back()->with('message', 'Product added successfully');
        } else {
            return redirect()->back()->with('error', 'Image upload failed');
        }
    }

    public function deleteProduct($id){
        $data = Product::find($id);
        $data->delete();
        return redirect()->back()->with('message4','Product deleted succesfully');
    }

    public function editProduct($id)
    {
        $product = Product::find($id);

        return view('editProduct', compact('product'));
    }

    public function productStore(){
        $products = Product::all();
        $categories = Category::all();
        return view('store', compact('products', 'categories'));
    }

    public function addCart(Request $request, $id){
        // dd(Auth::user()->username);
        if(Auth::user()->id){
            $product=Product::find($id);
            $cart = new Cart;

            $user = Auth::user();

            $cart->userId = $user->id;
            $cart->name = $user->username;
            $cart->email = $user->email;
            $cart->productTitle = $product->title;
            $cart->price= $product->price * $request->quantity;
            $cart->image= $product->image;
            $cart->productId = $product->id;
            $cart->quantity= $request->quantity;

            $cart->save();

            return redirect()->back();
            
            
        }else{
            dd('user not connected');
        }
    }

    public function showCart(Request $request) {
        $user = Auth::user();
        // dd($user->id);
        $cart = Cart::where('userId', Auth::user()->id)->get();
        return view('cartPage', compact('cart'));
    }

    public function removeCart($id){
        $cart = Cart::find($id);
        $cart->delete();
        
        return redirect()->back();
    }
}
