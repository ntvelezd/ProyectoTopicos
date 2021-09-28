<?php

namespace App\Http\Controllers;

use Lang;
use App\Models\Handbag;
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

    public function portfolio()
    {
        $handbag = Handbag::all();
        $data["title"] = "Handbags";
        $data["handbags"] = $handbag;
        return view('admin.handbag.catalogue')->with("data", $data);
    }
}
