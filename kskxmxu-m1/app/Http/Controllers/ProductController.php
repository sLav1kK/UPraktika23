<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
	public function show(Request $req)
	{
		if ($req->filter == null)
		{
			$products = Product::where("count", "!=", null)->get();
		}
    	else
    	{
    		$products = Product::orderBy($req->filter, "desc")->where("id_cat", $req->category)->where("count", "!=", null)->get();
    	}
    	$category = Category::all();
    	return view('catalog', ["Product" => $products, "Category" => $category]);
	}
	public function onepageprod($id)
	{
		$product = Product::find($id);
		return view("oneprod", ['Product' => $product]);
	}
}
