<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Handbag;
use App\Models\Item;
use App\Models\Order;
use App\Models\Accesory;

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
        $ids = $request->session()->get("accesories");
        $quantify = $request->session()->get("quantifyAccesory");
        if ($ids) {
            $data["accesories"] = Accesory::find(array_values($ids));
            $data["quantifyAccesory"] = $quantify;
            $data["total"] += Accesory::totalValue($data);
        } else {
            $data["accesories"] = array();
            $data["quantifyAccesory"] = array();
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
        if (str_starts_with($id, 'a')) {
            $data = [];
            $quantify = $request->session()->get("quantifyAccesory");
            $quantify[substr($id, 1)] += 1;
            $request->session()->put('quantifyAccesory', $quantify);
            return back();
        } else {
            $data = [];
            $quantify = $request->session()->get("quantifyHandbag");
            $quantify[substr($id, 1)] += 1;
            $request->session()->put('quantifyHandbag', $quantify);
            return back();
        }
    }

    public function downQuantify($id, Request $request)
    {
        if (str_starts_with($id, 'a')) {
            $data = [];
            $quantify = $request->session()->get("quantifyAccesory");
            if ($quantify[substr($id, 1)] == 1) {
                return back();
            }
            $quantify[substr($id, 1)] -= 1;
            $request->session()->put('quantifyAccesory', $quantify);
            return back();
        } else {
            $data = [];
            $quantify = $request->session()->get("quantifyHandbag");
            if ($quantify[substr($id, 1)] == 1) {
                return back();
            }
            $quantify[substr($id, 1)] -= 1;
            $request->session()->put('quantifyHandbag', $quantify);
            return back();
        }
    }

    public function buy(Request $request)
    {
        $data = [];
        $request->validate(
            [
                "address" => "required",
            ]
        );
        $idshandbag = $request->session()->get("handbags");
        $idsaccesory = $request->session()->get("accesories");
        $total = 0;
        if ($idshandbag or $idsaccesory) {
            $order = new Order();
            $order->setTotalPrice(0);
            $order->setAdress($request->only(['address'])['address']);
            $order->setUserId(auth()->user()->getId());
            $order->save();
            if ($idshandbag) {
                $handbags = Handbag::find(array_values($idshandbag));
                foreach ($handbags as $handbag) {
                    $item = new Item();
                    $item->setOrderId($order->getId());
                    $item->setHandbagId($handbag->getId());
                    $item->setQuantity($request->session()->get("quantifyHandbag")[$handbag->getId()]);
                    $total = $total + ($handbag->getPrice() * $item->getQuantity());
                    $item->save();
                }
            }
            if ($idsaccesory) {
                $accesories = Accesory::find(array_values($idsaccesory));
                foreach ($accesories as $accesory) {
                    $item = new Item();
                    $item->setOrderId($order->getId());
                    $item->setAccesoryId($accesory->getId());
                    $item->setQuantity($request->session()->get("quantifyAccesory")[$accesory->getId()]);
                    $total = $total + ($accesory->getPrice() * $item->getQuantity());
                    $item->save();
                }
            }
            $order->setTotalPrice($total);
            $order->save();
            dd($order->items()->get());
        } else {
            return back();
        }
    }
}
