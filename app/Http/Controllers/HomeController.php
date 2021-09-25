<?php

namespace App\Http\Controllers;
use App\Models\Handbag;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        return view('home.index');
    }

    public function home()
    {
        return redirect()->route('home.index');
    }
    public function portfolio()
    {
        $handbag = Handbag::all();
        $data["title"] = "Handbags";
        $data["handbags"] = $handbag;
        return view('admin.handbag.catalogue')->with("data", $data);
    }
}
