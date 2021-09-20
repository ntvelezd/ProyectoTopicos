<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        return view('admin.accesory.catalogue');
    }
    
}
