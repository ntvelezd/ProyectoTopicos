<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Handbag;
use App\Models\Review;
use App\Models\User;
use App\Models\WishList;

use function PHPUnit\Framework\isNull;

class WishlistController extends Controller
{

    public function index()
    {
        $wishlist =  WishList::find(auth()->user()->getWishlist());
        if ($wishlist) {
            $data["handbags"] = $wishlist->handbags()->get();
            return view('wishlist.index')->with('data', $data);
        }
        $data["handbags"] = array();
        return view('wishlist.index')->with('data', $data);
    }

    public function add($id)
    {
        $wishlistid = auth()->user()->getWishlist();
        $wishlist = WishList::find($wishlistid);
        if (is_null($wishlist)) {
            $wishlist = new Wishlist();
            $wishlist->setUserId(auth()->user()->getId());
            $wishlist->save();
            $wishlist->handbags()->attach($id);
            auth()->user()->setWishlist($wishlist->getId());
            auth()->user()->save();
            return back();
        }
        foreach ($wishlist->handbags()->get() as $handbag) {
            if ($handbag->getId() == $id) {
                return back();
            }
        }
        $wishlist->handbags()->attach($id);
        $wishlist->save();
        return back();
    }

    public function addCart(Request $request)
    {
        $wishlistid = auth()->user()->getWishlist();
        $wishlist = WishList::find($wishlistid);
        if (is_null($wishlist)) {
            return back();
        }
        $handbags = $request->session()->get("handbags");
        $quantify = $request->session()->get("quantifyHandbag");
        foreach ($wishlist->handbags()->get() as $handbag) {
            $handbags[$handbag->getId()] = $handbag->getId();
            $quantify[$handbag->getId()] = 1;
        }
        $request->session()->put('handbags', $handbags);
        $request->session()->put('quantifyHandbag', $quantify);
        return back();
    }
}
