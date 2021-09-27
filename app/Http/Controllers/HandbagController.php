<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Handbag;

class HandbagController extends Controller
{

    public function catalogue()
    {
        $handbag = Handbag::all();
        $data["title"] = "Handbags";
        $data["handbags"] = $handbag;
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
