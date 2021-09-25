<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Handbag;

class AdminHandbagController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if (Auth::user()->getAdmin() == 0) {
                return redirect()->route('home.index');
            }
            return $next($request);
        });
    }

    public function catalogue()
    {
        $handbag = Handbag::all();
        $data["title"] = "Handbags";
        $data["handbags"] = $handbag;
        return view('admin.handbag.catalogue')->with("data", $data);
    }
    public function createHandbag()
    {
        return view('admin.handbag.create');
    }

    public function saveHandbag(Request $request)
    {
        Handbag::create($request->only(['name', 'price', 'style', 'color', 'score', 'texture', 'image']));
        $message = 'Bolso creado satisfactoriamente';
        return view('admin.handbag.save')->with("message", $message);
    }
    public function listHandbag()
    {
        $handbag = Handbag::all();
        $data["title"] = "Handbags";
        $data["handbags"] = $handbag;
        return view('admin.handbag.list')->with("data", $data);
    }

    public function editHandbag($name)
    {
        $handbag = Handbag::findOrFail($name);
        $data["title"] = $handbag->getName();
        $data["handbag"] = $handbag;
        return view('admin.handbag.edit')->with("data", $data);
    }

    public function saveEditHandbag(Request $request)
    {
        Handbag::validateEdit(($request));
        $handbag = Handbag::findOrFail($request['id']);
        $handbag->fill($request->only(['name', 'price', 'style', 'color', 'score', 'texture', 'image']));
        $handbag->save();
        $message = 'Bolso editado satisfactoriamente';
        return view('admin.handbag.saveEditUser')->with("message", $message);
    }
    public function deleteHandbag(Request $request)
    {
        Handbag::destroy($request->only(["id"]));
        return view('admin.handbag.delete');
    }
}
