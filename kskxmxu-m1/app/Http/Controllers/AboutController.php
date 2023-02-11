<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class AboutController extends Controller
{
    public function index()
    {
    	$Products = Product::latest()->limit(5)->get();
    	return view("about", ["Products" => $Products]);
    }
}
