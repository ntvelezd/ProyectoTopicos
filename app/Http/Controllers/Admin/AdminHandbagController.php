<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Handbag;
use App\Models\Post;
use App\Interfaces\ImageStorage;

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
        $storeInterface = app(ImageStorage::class);
        $storeInterface->store($request);
        Handbag::create([
            'name' => $request->only(["name"])["name"],
            'price' => $request->only(["price"])["price"],
            'style' => $request->only(["style"])["style"],
            'color' => $request->only(["color"])["color"],
            'score' => $request->only(["score"])["score"],
            'texture' => $request->only(["texture"])["texture"],
            'image' => $request->only(["profile_image"])["profile_image"]->getClientOriginalName(),
        ]);
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

    public function search(Request $request){
        // Get the search value from the request
        $search = $request->input('search');
        // Search in the title and body columns from the posts table
        $handbags = Handbag::query()
            ->where('name', 'LIKE', "%{$search}%")
            ->get();
            $data["handbags"] = $handbags;
        // Return the search view with the resluts compacted
        return view('admin.handbag.catalogue')->with("data", $data);
    }

    public function editHandbag($id)
    {
        $handbag = Handbag::findOrFail($id);
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
        return view('admin.handbag.saveEditHandbag')->with("message", $message);
    }
    public function deleteHandbag(Request $request)
    {
        Handbag::destroy($request->only(["id"]));
        return view('admin.handbag.delete');
    }
}
