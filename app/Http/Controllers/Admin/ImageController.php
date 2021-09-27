<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Interfaces\ImageStorage;
use App\Http\Controllers\Controller;

class ImageController extends Controller

{

    public function index()
    {

        return view("admin/handbag/image");
    }

    public function save(Request $request)
    {

        $storeInterface = app(ImageStorage::class);

        $storeInterface->store($request);

        return back()->with('success', 'Image uploaded successfully!');
    }
}
