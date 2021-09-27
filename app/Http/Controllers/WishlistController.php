<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Handbag;
use App\Models\Review;
use App\Models\User;
use App\Models\WishList;

class WishlistController extends Controller
{

    public function index()
    {
        $wishlist=  WishList::findOrFail(1);
        dd($wishlist->handbags()->attach(5));
        return view('wishlist.index');
    }

   
}