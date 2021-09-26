<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', 'App\Http\Controllers\HomeController@index')->name("home.index");
Route::get('/home', 'App\Http\Controllers\HomeController@index')->name("home.index");
Route::get('/handbag/catalogue', 'App\Http\Controllers\HandbagController@catalogue')->name("handbag.catalogue");
Route::get('/admin/', 'App\Http\Controllers\Admin\AdminHomeController@index')->name("admin.home.index");
Route::get('/admin/handbag/list', 'App\Http\Controllers\Admin\AdminHandbagController@listHandbag')->name("admin.handbag.list");
Route::get('/admin/handbag/catalogue', 'App\Http\Controllers\Admin\AdminHandbagController@catalogue')->name("admin.handbag.catalogue");
Route::get('/admin/handbag/create', 'App\Http\Controllers\Admin\AdminHandbagController@createHandbag')->name("admin.handbag.create");
Route::post('/admin/handbag/delete', 'App\Http\Controllers\Admin\AdminHandbagController@deleteHandbag')->name("admin.handbag.delete");
Route::get('/admin/handbag/edit/{name}', 'App\Http\Controllers\Admin\AdminHandbagController@editHandbag')->name("admin.handbag.edit");
Route::post('/admin/handbag/save', 'App\Http\Controllers\Admin\AdminHandbagController@saveHandbag')->name("admin.handbag.save");
Route::post('/admin/hanbag/saveEditUser', 'App\Http\Controllers\Admin\AdminHandbagController@saveEditUser')->name("admin.handbag.saveEditUser");
Route::get('/admin/accesory/catalogue', 'App\Http\Controllers\Admin\AdminAccesoryController@catalogue')->name("admin.accesory.catalogue");
Route::get('/admin/user/catalogue', 'App\Http\Controllers\Admin\AdminUserController@catalogue')->name("admin.user.catalogue");
Route::get('/admin/user/create', 'App\Http\Controllers\Admin\AdminUserController@createUser')->name("admin.user.create");
Route::post('/admin/user/delete', 'App\Http\Controllers\Admin\AdminUserController@deleteUser')->name("admin.user.delete");
Route::get('/admin/user/edit/{id}', 'App\Http\Controllers\Admin\AdminUserController@editUser')->name("admin.user.edit");
Route::post('/admin/user/save', 'App\Http\Controllers\Admin\AdminUserController@saveUser')->name("admin.user.save");
Route::post('/admin/user/saveEditUser', 'App\Http\Controllers\Admin\AdminUserController@saveEditUser')->name("admin.user.saveEditUser");
Route::get('/cart/index', 'App\Http\Controllers\CartController@index')->name("cart.index");
Route::get('/cart/add/{id}', 'App\Http\Controllers\CartController@add')->name("cart.add");
Route::get('/cart/removeAll/', 'App\Http\Controllers\CartController@removeAll')->name("cart.removeAll");
Auth::routes();
