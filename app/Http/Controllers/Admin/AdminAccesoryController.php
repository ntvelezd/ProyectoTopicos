<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Accesory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Interfaces\ImageStorage;
use App\Models\User;

class AdminAccesoryController extends Controller
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
        $accesory = Accesory::all();
        $data["title"] = "Accesory";
        $data["Accesory"] = $accesory;
        return view('admin.accesory.catalogue')->with("data", $data);
    }
    public function createAccesory()
    {
        return view('admin.accesory.create');
    }

    public function saveAccesory(Request $request)
    {
        $storeInterface = app(ImageStorage::class);
        $storeInterface->storeAccesory($request);
        Accesory::validate($request);
        Accesory::create([
            'name' => $request->only(["name"])["name"],
            'price' => $request->only(["price"])["price"],
            'image' => $request->only(["profile_image"])["profile_image"]->getClientOriginalName(),
        ]);
        $message = 'Accesorio creado satisfactoriamente';
        return view('admin.accesory.save')->with("message", $message);
    }

    public function editAccesory($id)
    {
        $accesory = Accesory::findOrFail($id);
        $data["title"] = $accesory->getName();
        $data["Accesory"] = $accesory;
        return view('admin.accesory.edit')->with("data", $data);
    }

    public function saveEditAccesory(Request $request)
    {
        $storeInterface = app(ImageStorage::class);
        $storeInterface->storeAccesory($request);
        Accesory::validate($request);
        $accesory = Accesory::findOrFail($request['id']);
        $accesory->fill($request->only(["name","price"]));
        $accesory->setImage($request->only(["profile_image"])["profile_image"]->getClientOriginalName());
        $accesory->save();
        $message = 'Accesorio editado satisfactoriamente';
        return view('admin.accesory.saveEditAccesory')->with("message", $message);
    }

    public function deleteAccesory(Request $request)
    {
        Accesory::destroy($request->only(["id"]));
        $message = 'Accesorio borrado satisfactoriamente';
        return view('admin.accesory.delete')->with("message", $message);
    }
}
