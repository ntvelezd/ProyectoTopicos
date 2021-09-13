<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class HandbagController extends Controller
{

    public function list()
    {
        return view('handbag.list');
    }

}
