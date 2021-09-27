<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Accesory;

class AccesoryController extends Controller
{

    public function catalogue()
    {
        $accesories = Accesory::all();
        $data["title"] = "Accesories";
        $data["accesories"] = $accesories;
        return view('accesory.catalogue')->with("data", $data);
    }

    public function add($id, Request $request)
    {
        $accesories = $request->session()->get("accesories");
        $accesories [$id] = $id;
        $request->session()->put('accesories', $accesories);
        $quantify = $request->session()->get("quantifyAccesory");
        $quantify[$id] = 1;
        $request->session()->put('quantifyAccesory', $quantify);
        return back();
    }
}
