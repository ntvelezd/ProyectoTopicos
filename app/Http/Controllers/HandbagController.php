<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HandbagController extends Controller
{

    public function catalogue()
    {
        return view('handbag.catalogue');
    }
}
