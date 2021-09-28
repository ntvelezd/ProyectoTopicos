<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Handbag;
use App\Models\Review;
use App\Models\User;

class ReviewController extends Controller
{

    public function index($id)
    {
        $handbag = Handbag::findOrFail($id);
        $data["handbag"] = $handbag;
        return view('review.index')->with("data", $data);
    }

    public function save(Request $request)
    {
        Review::validate($request);
        Review::create([
            'score' => $request->only(["score"])["score"],
            'comentary' => $request->only(["comentary"])["comentary"],
            'handbag_id' => $request->only(["id"])["id"],
            'user_id' => auth()->user()->getId(),
        ]);
        $message = 'Accesorio editado satisfactoriamente';
        return view('review.save')->with("message", $message);
    }

    public function catalogue($id)
    {
        $handbag = Handbag::findOrFail($id);
        $data["review"] = $handbag->reviews()->get();
        $data["handbag"] = $handbag;
        return view('review.catalogue')->with("data", $data);
    }
}
