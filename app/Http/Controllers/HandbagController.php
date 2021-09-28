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
    public function search(Request $request){
        // Get the search value from the request
        $search = $request->input('search');
        // Search in the title and body columns from the posts table
        $handbags = Handbag::query()
            ->where('name', 'LIKE', "%{$search}%")
            ->get();
            $data["handbags"] = $handbags;
        // Return the search view with the resluts compacted
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
