<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Category;
use App\Models\Cart;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function admin(Request $req)
    {
        if ($req->isMethod('get'))
        {
            $info_user = User::all();
            $Products = Product::all();
            $Category = Category::all();
            $Carts = \App\Models\Cart::where('status', 'Новая')->get();

            if ($req->status == null)
                {
                    $orderItem = OrderItem::join("orders", "orders.id", "=", "order_items.id_order")->where('status', '!=', 'Корзина')->orderBy('id_order', 'asc')->get()->toArray();
                }
                else
                {
                    $orderItem = OrderItem::join("orders", "orders.id", "=", "order_items.id_order")->orderBy('id_order', 'asc')->where('status', $req->status)->get()->toArray();
                }
            // $orderItem = OrderItem::join("orders", "orders.id", "=", "order_items.id_order")->orderBy('id_order', 'asc')->get()->toArray();

            return view('admin', ["Products"=>$Products, "Category"=>$Category, "Carts"=>$Carts, /*"Order" => $Order, */'orderItem'=>$orderItem, 'prev_id'=>0, 'info_user'=>$info_user]);
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

    public function confirmorder($id)
    {
        Order::find($id)->update(['status' => 'Подтвержденная']);
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
    public function cancelSubmitorder($id, Request $req)
    {
        $Order = Order::find($id);
        $Order->status = 'Отмененная';
        $Order->comment = $req->input('comment');
        $Order->save();

        return redirect()->route('admin');
    }
    public function cancelorder($id)
    {
        $Order = new Order;
        return view('cancelorder', ['Order'=>$Order->find($id)]);
    }
}
