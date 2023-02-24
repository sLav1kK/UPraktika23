<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $req)
    {
        if ($req->filter == null)
        {   
            $orderItem = OrderItem::join("orders", "orders.id", "=", "order_items.id_order")->latest()->where('id_user', Auth::user()->id)->orderBy('id_order', 'asc')->get()->toArray();
            // $Order = Order::where('id_user', Auth::user()->id)->where('status', '!=', 'Корзина')->get();
        }
        else
        {
            $orderItem = OrderItem::join("orders", "orders.id", "=", "order_items.id_order")->latest()->where('id_user', Auth::user()->id)->orderBy('id_order', 'asc')->/*where("id_order", $req->filter)->where("status", $req->status)->*/get()->toArray();
            // $Order = Order::where('id_user', Auth::user()->id)->where('status', '!=', 'Корзина')->where("order_items.id_order", $req->filter)->where("status", $req->status)->get();
        }
        // $orderItem = OrderItem::join("orders", "orders.id", "=", "order_items.id_order")->where('id_user', Auth::user()->id)->orderBy('id_order', 'asc')->get()->toArray();
        return view('home', [/*"Order" => $Order, */'orderItem'=>$orderItem, 'prev_id'=>0, 'prev_id2'=>0,]);
    }
    public function deleteorder($id)
    {
        $data = OrderItem::where('id_order', $id)->get();
        foreach ($data as $value)
        {
            $value->delete();
        }

        Order::find($id)->delete();
        return redirect()->route('home');
    }
}
