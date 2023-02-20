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
	public function saveOrder(){

        $data = Cart::join('products', 'products.id', '=', 'carts.id_product')->select('*', 'carts.id as id_carts', 'carts.count as count')->where('id_user', Auth::user()->id)->get()->toArray();
        // return dd($data);
        if($data == null)
        {
        	return redirect('/cart');
        }
        else
        {
        	$sumprice = array_sum(array_column($data, 'price'));
        	Order::create(['id_user'=>$data[0]['id_user'], 'price'=>$sumprice]);
	        $dataOrder = Order::latest()->first();

	        foreach($data as $key=>$elem){
	            OrderItem::create(['name'=>$elem['name'], 'id_order'=>$dataOrder['id'], 'id_product'=>$elem['id_product'], 'price'=>$elem['price'], 'quantity'=>$elem['count']]);
	            Cart::where('id', $elem['id_carts'])->delete();
	        }
	        return redirect('/cart');
        }
    }
}
