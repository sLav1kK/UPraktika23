<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class AdminController extends Controller
{
    public function admin(Request $req)
    {
        if ($req->isMethod('get'))
        {
            $Products = Product::all();
            $Category = Category::all();
            return view('admin', ["Products"=>$Products, "Category"=>$Category]);
        }
        if ($req->isMethod('post'))
        {
            $valid = $req->validate([
                'name' => 'required|min:1|max:255',
                'id_cat' => 'required|min:1|max:255',
                'urlphoto' => 'required|min:1|max:255',
                'price' => 'required|min:1|max:255',
                'year' => 'required|min:1|max:255',
                'country' => 'required|min:1|max:255',
                'model' => 'required|min:1|max:255',
            ]);

            $Product = new Product();
            $Product->name = $req->input('name');
            $Product->id_cat = $req->input('id_cat');
            $Product->urlphoto = $req->input('urlphoto');
            $Product->price = $req->input('price');
            $Product->year = $req->input('year');
            $Product->country = $req->input('country');
            $Product->model = $req->input('model');
            $Product->save();
            return redirect()->route('admin');
        }
    }
    public function addcategory(Request $req)
    {
        $valid = $req->validate([
            'name' => 'required|min:1|max:255',
        ]);

        $Category = new Category();
        $Category->name = $req->input('name');
        $Category->save();
        return redirect()->route('admin');
    }
    public function deletecategory($id)
    {
        Category::find($id)->delete();
        return redirect()->route('admin');
    }
    public function updateSubmit($id, Request $req)
    {
        $Product = Product::find($id);
        $Product->name = $req->input('name');
        $Product->id_cat = $req->input('id_cat');
        $Product->urlphoto = $req->input('urlphoto');
        $Product->price = $req->input('price');
        $Product->year = $req->input('year');
        $Product->country = $req->input('country');
        $Product->model = $req->input('model');
        $Product->save();

        return redirect()->route('edit', $id);
    }
    public function edit($id)
    {
        $product = Product::find($id);
        return view('edit', ["Product"=>$product]);
    }
    public function update($id)
    {
        $product = new Product;
        return view('updateproduct', ['Product'=>$product->find($id)]);
    }
    public function delete($id)
    {
        Product::find($id)->delete();
        return redirect()->route('admin');
    }
}
