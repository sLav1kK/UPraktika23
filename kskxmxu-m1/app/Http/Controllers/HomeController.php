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
            $Order = Order::where('id_user', Auth::user()->id)->where('status', '!=', 'Корзина')->get();
        }
        else
        {
            $Order = Order::where('id_user', Auth::user()->id)->where('status', '!=', 'Корзина')->orderBy($req->filter, "desc")->where("status", $req->status)->get();
        }
        // $BuffOr = Order::where('id_user', Auth::user()->id)->where('status', '!=', 'Корзина')->get()->toArray();
        // return dd($BuffOr);
        // $OrderItem=[];
        // dd($Order[0]->items()[0]->product());
        dd($Order[0]->items()[0]);
        // foreach ($Order as $key => $order) {
        //     $OrderItem[$key] = OrderItem::where("id_order", $order->id)->get();
        // }
        
        return view('home', ["Order" => $Order, "OrderItem" => $OrderItem]);
    }
    public function deleteorder(Request $req, $id)
    {
            /*if ($req->filter == null)
            {
                $Cart = Cart::where('id_user', Auth::user()->id)->get();
                $Cart->delete();
            }
            else
            {
                $Carts = Cart::where('id_user', Auth::user()->id)->where("id_basket", $req->id_basket)->get();
                foreach ($Carts as $c) 
                    {
                        $c->delete();
                    }
            }
            return redirect('/home');*/
            Cart::find($id)->delete();
            return redirect()->route('home');
    }
}
