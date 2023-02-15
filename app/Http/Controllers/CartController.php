<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
	public function index()
	{
		$carts = \App\Models\Cart::where('id_user', Auth::user()->id)->get();
		return view('cart', ["carts"=>$carts]);
	}
	public function add($id)
	{
		$product = Product::find($id);
		$buffer = Cart::where('id_product', $id)->where('id_user', Auth::user()->id)->get();

		if($buffer -> count() == 0)
		{
			$new_cart = new Cart;
			$new_cart->id_user = Auth::user()->id;
			$new_cart->id_product=$id;
			$new_cart->count = 1;
			$new_cart->id_basket = 1;
			$new_cart->save();
		}
		else
		{
			$buffer[0] -> count++;
			if($product->count < $buffer[0] -> count)
			{
				$buffer[0] -> count--;	
			}
			$buffer[0] -> save();
		}
		return redirect('/catalog/'.$id);
	}
	public function plus($id)
	{
			$cart = Cart::find($id);
			$product = Product::find($cart->id_product);
			$cart->count++;
			if($product->count < $cart->count)
			{
				$cart->count--;
			}
			$cart->save();
			return redirect('/cart');
	}
	public function minus($id)
	{
			$cart = Cart::find($id);
			$cart->count--;
			if($cart->count == 0)
			{
				$cart->delete();
			}
			else
			{
				$cart->save();
			}
			return redirect('/cart');
	}
	public function saveOrder(Request $req) {
        $this->validate($req, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|max:255',
            'address' => 'required|max:255',
        ])
        $cart = Cart::getCart();
        $user_id = auth()->check() ? auth()->user()->id : null;
        $order = Order::create(
            $req->all() + ['amount' => $cart->getAmount(), 'user_id' => $user_id]
        );

        foreach ($cart->products as $product) {
            $order->items()->create([
                'product_id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => $product->cart->count,
                'cost' => $product->price * $product->cart->count,
            ]);
        }
        $cart->delete();

        return redirect()
            ->route('cart');
    }
}
