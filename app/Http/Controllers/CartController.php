<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Handbag;
use App\Models\Item;
use App\Models\Order;

class CartController extends Controller
{

    public function index(Request $request)
    {
        $data = []; //to be sent to the view
        $listHandbags = Handbag::all();
        $listHandbagsInCart = array();
        $ids = $request->session()->get("handbags"); //obtenemos ids de productos guardados en session
        if ($ids) {
            foreach ($listHandbags as $key => $handbag) {
                if (in_array($key, array_keys($ids))) {
                    $listHandbagsInCart[$key] = $handbag;
                }
            }
        }
        $data["title"] = "Cart";
        $data["handbagsInCart"] = $listHandbagsInCart;
        return view('cart.index')->with("data", $data);
    }

    public function add($idHandbag, Request $request)
    {
        if (is_null(auth()->user())) {
            $message = 'you have to login to add products to the cart';
            return redirect()->route('home.index')->with(['data' => $message ]);
        }
        $order = Order::where('user_id', auth()->user()->getId())->where('status', '=', 'in-process')->first();
        //si no existe una orden que este en proceso, se crea una nueva orden.
        if (is_null($order)) {
            $order = Order::create([
                'adress' => '',
                'totalPrice' => 0,
                'user_id' => auth()->user()->getId(),
                'status' => 'in-process',
            ]);
        }
        dd($order);
        Item::create([
            'adress' => '',
            'totalPrice' => 0,
            'user_id' => auth()->user()->getId(),
            'status' => 'in-process',
        ]);
        $handbags = $request->session()->get("handbags");
        $handbags[$idItem] = $idItem;
        $request->session()->put('handbags', $handbags);
        return back();
    }

    public function removeAll(Request $request)
    {
        $request->session()->forget('handbags');
        return back();
    }
}
