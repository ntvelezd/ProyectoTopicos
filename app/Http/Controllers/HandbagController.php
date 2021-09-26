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
}
