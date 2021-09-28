<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Handbag;
use App\Models\Item;

class HandbagController extends Controller
{

    public function catalogue()
    {
        $handbag = Handbag::all();
        $data["title"] = "Handbags";
        $data["handbags"] = $handbag;
        $bestHandbag = Item::select('handbag_id')
            ->groupBy('handbag_id')
            ->orderByRaw('COUNT(*) DESC')
            ->limit(1)
            ->get();
        $data["best"] = Handbag::findOrFail($bestHandbag);
        return view('handbag.catalogue')->with("data", $data);
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $handbags = Handbag::query()
        ->where('name', 'LIKE', "%{$search}%")
        ->get();
        $data["handbags"] = $handbags;
        $bestHandbag = Item::select('handbag_id')
            ->groupBy('handbag_id')
            ->orderByRaw('COUNT(*) DESC')
            ->limit(1)
            ->get();
        $data["handbags"] = $handbags;
        return view('handbag.catalogue')->with("data", $data);
    }

    public function add($id, Request $request)
    {
        $handbags = $request->session()->get("handbags");
        $handbags[$id] = $id;
        $request->session()->put('handbags', $handbags);
        $quantify = $request->session()->get("quantifyHandbag");
        $quantify[$id] = 1;
        $request->session()->put('quantifyHandbag', $quantify);
        return back();
    }
}
