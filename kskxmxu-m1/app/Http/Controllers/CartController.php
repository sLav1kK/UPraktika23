<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
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
		$buffer = Cart::where('id_product', $id)->where('id_user', auth::user()->id)->get();
	}
}
