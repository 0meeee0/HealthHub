<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class adminController extends Controller
{
    
    public function dashboard()
    {
        $categories = Category::all();
        $products = Product::all();
        $users = User::where('role', 'user')->get();
        $orders = Order::all();
        return view('dashboard', compact('categories', 'products', 'users', 'orders'));
    }
    
    
    public function addProduct(Request $request)
    {
        // dd($request->category_id);
        $request->validate([
            'title' => 'required',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required',
            'quantity' => 'required|integer',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

          if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move('product', $imageName);
             }

        $product = new Product();
        $product->title = $request->title;
        $product->category_id = $request->category_id;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->description = $request->description;
        $product->image = $imageName;
        $product->save();

        return redirect()->back()->with('message', 'Product added successfully');
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

            $cart->user_id = $user->id;
            $cart->name = $user->username;
            $cart->email = $user->email;
            $cart->productTitle = $product->title;
            $cart->price= $product->price * $request->quantity;
            $cart->image= $product->image;
            $cart->product_id = $product->id;
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
        $cart = Cart::where('user_id', Auth::user()->id)->get();
        return view('cartPage', compact('cart'));
    }

    public function removeCart($id){
        $cart = Cart::find($id);
        $cart->delete();

        return redirect()->back();
    }

    public function checkout(Request $request){
    $user = Auth::user();
    // dd($user);
    $cartItems = Cart::where('user_id', $user->id)->get();

    foreach($cartItems as $cartItem)
    {
        $order = new Order;
        $order->name = $user->username;
        $order->email = $user->email;
        $order->user_id = $user->id;
        $order->product_name = $cartItem->productTitle;
        $order->quantity = $cartItem->quantity;
        $order->price = $cartItem->price;
        $order->image = $cartItem->image;
        $order->product_id = $cartItem->product_id;
        $order->address = $request->address;
        $order->payment_status = "Cash on Delivery";
        $order->dilevery_status = "Pending";

        $order->save();

        $cartItem->delete();
    }

    return redirect()->back()->with('message', 'Order received! Please wait for the order to be processed.');
}

}