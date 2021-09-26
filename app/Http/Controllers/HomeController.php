<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $data['message'] = '';
        return view('home.index')->with("data", $data);
    }

    public function home()
    {
        $data['message'] = '';
        return redirect()->route('home.index')->with("data", $data);
    }
}
