<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function showCart(Request $request) {

        $userId = Auth::user()->id;

        $items = Cart::where('user_id', $userId)->get();

        $total = $items->sum(function($item){
            return $item->product->price;
        });

        return view('customer.cart', compact('items', 'total'));
    }

    public function addToCart($productId) {

        $cart = new Cart;
        $cart->user_id = Auth::user()->id;
        $cart->product_id = $productId;
        $cart->save();

        return redirect()->back();
    }

    public function delete(Cart $cart) {
        $cart->delete();

        return redirect()->back();
    }

    public function checkOut(Request $request) {

        $userId = Auth::user()->id;

        $items = Cart::where('user_id', $userId)->get();

        foreach($items as $item) {
            $item->delete();
        };

        return redirect()->back();
    }
}
