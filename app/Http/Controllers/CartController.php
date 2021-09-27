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
        $data = [];
        $ids = $request->session()->get("handbags");
        $quantify = $request->session()->get("quantifyHandbag");
        if ($ids) {
            $data["handbags"] = Handbag::find(array_values($ids));
            $data["quantifyHandbag"] = $quantify;
            $data["total"] = Handbag::totalValue($data);
        } else {
            $data["handbags"] = array();
            $data["quantifyHandbag"] = array();
            $data["total"] = 0;
        }
        return view('cart.index')->with("data", $data);
    }

    public function removeAll(Request $request)
    {
        $request->session()->forget('handbags');
        return back();
    }

    public function upQuantify($id, Request $request)
    {
        $data = [];
        $quantify = $request->session()->get("quantifyHandbag");
        $quantify[$id] += 1;
        $request->session()->put('quantifyHandbag', $quantify);
        return back();
    }

    public function downQuantify($id, Request $request)
    {
        $data = [];
        $quantify = $request->session()->get("quantifyHandbag");
        if ($quantify[$id] == 1) {
            return back();
        }
        $quantify[$id] -= 1;
        $request->session()->put('quantifyHandbag', $quantify);
        return back();
    }

    public function buy(Request $request)
    {
        $data = [];
        $request->validate(
            [
                "address" => "required",
            ]
        );
        $ids = $request->session()->get("handbags");
        $total = 0;
        if ($ids) {
            $order = new Order();
            $order->setTotalPrice(0);
            $order->setAdress($request->only(['address'])['address']);
            $order->setUserId(auth()->user()->getId());
            $order->save();
            $handbags = Handbag::find(array_values($ids));
            foreach ($handbags as $handbag) {
                $item = new Item();
                $item->setOrderId($order->getId());
                $item->setHandbagId($handbag->getId());
                $item->setQuantity($request->session()->get("quantifyHandbag")[$handbag->getId()]);
                $total = $total + $handbag->getPrice();
                $item->save();
            }
            $order->setTotalPrice($total);
            $order->save();
            dd($order->items()->get());
        } else {
            return back();
        }
    }
}
