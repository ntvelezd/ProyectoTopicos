<?php

namespace App\Util;

use App\Interfaces\ImageStorage;
use Illuminate\Support\Facades\Storage;

class ImageLocalStorage implements ImageStorage
{

    public function store($request)
    {
        if ($request->hasFile('profile_image')) {
            Storage::disk('public')->put("handbags/" . $request->file('profile_image')->getClientOriginalName(), file_get_contents($request->file('profile_image')->getRealPath()));
        }
    }

    public function storeAccesory($request)
    {
        if ($request->hasFile('profile_image')) {
            Storage::disk('public')->put("accesories/" . $request->file('profile_image')->getClientOriginalName(), file_get_contents($request->file('profile_image')->getRealPath()));
        }
    }
}
