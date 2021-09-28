<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Handbag;
use App\Models\Item;
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
        $data["title"] = "Save Handbag";
        return view('admin.handbag.create')->with("data", $data);
    }

    public function saveHandbag(Request $request)
    {
        $storeInterface = app(ImageStorage::class);
        $storeInterface->store($request);
        Handbag::validate($request);
        Handbag::create([
            'name' => $request->only(["name"])["name"],
            'price' => $request->only(["price"])["price"],
            'style' => $request->only(["style"])["style"],
            'color' => $request->only(["color"])["color"],
            'score' => $request->only(["score"])["score"],
            'texture' => $request->only(["texture"])["texture"],
            'image' => $request->only(["profile_image"])["profile_image"]->getClientOriginalName(),
        ]);
        $data["title"] = "Save Handbag";
        return view('admin.handbag.save')->with("data", $data);
    }

    public function listHandbag()
    {
        $handbag = Handbag::all();
        $data["title"] = "Handbags";
        $data["handbags"] = $handbag;
        return view('admin.handbag.list')->with("data", $data);
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $handbags = Handbag::query()
        ->where('name', 'LIKE', "%{$search}%")
        ->get();
        $data["handbags"] = $handbags;
        $bestHandbag = Item::select('handbag_id')
            ->groupBy('handbag_id')
            ->orderByRaw('COUNT(*) DESC')
            ->limit(1)
            ->get();
        $data["handbags"] = $handbags;
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
        $storeInterface = app(ImageStorage::class);
        $storeInterface->store($request);
        Handbag::validate($request);
        $handbag = Handbag::findOrFail($request['id']);
        $handbag->fill($request->only(['name', 'price', 'style', 'color', 'score', 'texture']));
        $handbag->setImage($request->only(["profile_image"])["profile_image"]->getClientOriginalName());
        $handbag->save();
        $data['title'] = 'Save Handbag';
        return view('admin.handbag.saveEditHandbag')->with("data", $data);
    }

    public function deleteHandbag(Request $request)
    {
        $reviews = Handbag::findOrFail($request['id'])->reviews()->get();
        foreach ($reviews as $review) {
            $review -> delete();
        }
        Handbag::destroy($request->only(["id"]));
        $data['title'] = 'Delete Handbag';
        return view('admin.handbag.delete')->with("data", $data);
    }
}
