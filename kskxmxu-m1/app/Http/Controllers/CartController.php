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
		$carts = \App\Models\Cart::where('id_user', Auth::user()->id)->where('status', 'Корзина')->get();
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
	public function saveOrder()
	{
			$cart = Cart::where("id_user", Auth::user()->id)->get();
			foreach ($cart as $c) 
			{
				$c->increment('id_basket');
            	$c->update(['status'=>'Новая']);
        	}
			return redirect('/cart');
	}
	/*public function saveOrder($id)
	{
		$cart = Cart::find($id);
		$buffer = Order::where("id_user", Auth::user()->id)->get();
		$bufferItem = OrderItem::where("id_user", Auth::user()->id)->get();
		$sumpriceorder = OrderItem::where("id_order", Auth::user()->id)->sum('price');
		/*$cart = Cart::where("id_user", Auth::user()->id)->get();
		$order = Order::where("id_user", Auth::user()->id)->get();
		$orderitem = OrderItem::where("id_user", Auth::user()->id)->get();*/

		/*if($buffer -> price() == 0)
		{*/
			/*$new_order = new Order;
			$new_order->id_user = Auth::user()->id;
			$new_order->status="Новая";
			$new_order->save();

			$new_orderitems = new OrderItem;
			$new_orderitems->id_order = increment('id_order');
			$new_orderitems->id_product = $id;
			$new_orderitems->price = $cart->product->price;
			$new_orderitems->count = $cart->product->count;
			$new_orderitems->save();

			return redirect('/cart');
		//}
	}*/
}
