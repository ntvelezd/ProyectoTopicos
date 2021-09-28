<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
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
        $user = User::all();
        $data["title"] = "Users";
        $data["users"] = $user;
        return view('admin.user.catalogue')->with("data", $data);
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $users = User::query()
            ->where('name', 'LIKE', "%{$search}%")
            ->get();
            $data["users"] = $users;
        return view('admin.user.catalogue')->with("data", $data);
    }

    public function createUser()
    {
        return view('admin.user.create');
    }

    public function saveUser(Request $request)
    {
        User::validate(($request));
        $request['password'] = Hash::make($request['password']);
        User::create($request->only(["name","email","password","is_admin"]));
        $message = 'Usuario creado satisfactoriamente';
        return view('admin.user.save')->with("message", $message);
    }

    public function editUser($id)
    {
        $user = User::findOrFail($id);
        $data["title"] = $user->getName();
        $data["user"] = $user;
        return view('admin.user.edit')->with("data", $data);
    }

    public function saveEditUser(Request $request)
    {
        User::validateEdit(($request));
        $user = User::findOrFail($request['id']);
        $user->fill($request->only(["name","email","is_admin"]));
        $user->save();
        $message = 'Usuario editado satisfactoriamente';
        return view('admin.user.saveEditUser')->with("message", $message);
    }

    public function deleteUser(Request $request)
    {
        User::destroy($request->only(["id"]));
        $message = 'Usuario borrado satisfactoriamente';
        return view('admin.user.delete')->with("message", $message);
    }
}
