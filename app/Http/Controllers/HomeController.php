<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
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
            $Carts = Cart::where('id_user', Auth::user()->id)->where('status', '!=', 'Корзина')->get();
        }
        else
        {
            $Carts = Cart::where('id_user', Auth::user()->id)->where('status', '!=', 'Корзина')->where("id_basket", $req->filter)->get();
        }
        return view('home', ["Carts" => $Carts]);
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
