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
Route::get('/handbag/add/{id}', 'App\Http\Controllers\HandbagController@add')->name("handbag.add");
Route::get('/handbag/search', 'App\Http\Controllers\HandbagController@search')->name('handbag.search');
Route::get('/accesory/catalogue', 'App\Http\Controllers\AccesoryController@catalogue')->name("accesory.catalogue");
Route::get('/accesory/add/{id}', 'App\Http\Controllers\AccesoryController@add')->name("accesory.add");
Route::get('/admin/', 'App\Http\Controllers\Admin\AdminHomeController@index')->name("admin.home.index");
Route::get('/admin/handbag/list', 'App\Http\Controllers\Admin\AdminHandbagController@listHandbag')->name("admin.handbag.list");
Route::get('/admin/handbag/catalogue', 'App\Http\Controllers\Admin\AdminHandbagController@catalogue')->name("admin.handbag.catalogue");
Route::get('/admin/handbag/create', 'App\Http\Controllers\Admin\AdminHandbagController@createHandbag')->name("admin.handbag.create");
Route::post('/admin/handbag/delete', 'App\Http\Controllers\Admin\AdminHandbagController@deleteHandbag')->name("admin.handbag.delete");
Route::get('/admin/handbag/edit/{id}', 'App\Http\Controllers\Admin\AdminHandbagController@editHandbag')->name("admin.handbag.edit");
Route::post('/admin/handbag/save', 'App\Http\Controllers\Admin\AdminHandbagController@saveHandbag')->name("admin.handbag.save");
Route::post('/admin/handbag/saveEditHandbag', 'App\Http\Controllers\Admin\AdminHandbagController@saveEditHandbag')->name("admin.handbag.saveEditHandbag");
Route::get('/admin/handbag/search', 'App\Http\Controllers\Admin\AdminHandbagController@search')->name('admin.handbag.search');
Route::get('/admin/accesory/catalogue', 'App\Http\Controllers\Admin\AdminAccesoryController@catalogue')->name("admin.accesory.catalogue");
Route::get('/admin/user/catalogue', 'App\Http\Controllers\Admin\AdminUserController@catalogue')->name("admin.user.catalogue");
Route::get('/admin/user/create', 'App\Http\Controllers\Admin\AdminUserController@createUser')->name("admin.user.create");
Route::post('/admin/user/delete', 'App\Http\Controllers\Admin\AdminUserController@deleteUser')->name("admin.user.delete");
Route::get('/admin/user/edit/{id}', 'App\Http\Controllers\Admin\AdminUserController@editUser')->name("admin.user.edit");
Route::post('/admin/user/save', 'App\Http\Controllers\Admin\AdminUserController@saveUser')->name("admin.user.save");
Route::get('/admin/user/search', 'App\Http\Controllers\Admin\AdminUserController@search')->name('admin.user.search');
Route::post('/admin/user/saveEditUser', 'App\Http\Controllers\Admin\AdminUserController@saveEditUser')->name("admin.user.saveEditUser");
Route::get('/cart/up/{id}', 'App\Http\Controllers\CartController@upQuantify')->name("cart.up");
Route::get('/cart/down/{id}', 'App\Http\Controllers\CartController@downQuantify')->name("cart.down");
Route::get('/cart/index', 'App\Http\Controllers\CartController@index')->name("cart.index");
Route::get('/cart/removeAll/', 'App\Http\Controllers\CartController@removeAll')->name("cart.removeAll");
Route::post('/cart/buy', 'App\Http\Controllers\CartController@buy')->name("cart.buy");
Route::post('/cart/pdf', 'App\Http\Controllers\CartController@createPDF')->name("cart.pdf");
Route::get('/admin/accesory/catalogue', 'App\Http\Controllers\Admin\AdminAccesoryController@catalogue')->name("admin.accesory.catalogue");
Route::get('/admin/accesory/create', 'App\Http\Controllers\Admin\AdminAccesoryController@createAccesory')->name("admin.accesory.create");
Route::post('/admin/accesory/delete', 'App\Http\Controllers\Admin\AdminAccesoryController@deleteAccesory')->name("admin.accesory.delete");
Route::get('/admin/accesory/edit/{id}', 'App\Http\Controllers\Admin\AdminAccesoryController@editAccesory')->name("admin.accesory.edit");
Route::post('/admin/accesory/save', 'App\Http\Controllers\Admin\AdminAccesoryController@saveAccesory')->name("admin.accesory.save");
Route::post('/admin/accesory/saveEditAccesory', 'App\Http\Controllers\Admin\AdminAccesoryController@saveEditAccesory')->name("admin.accesory.saveEditAccesory");
Route::get('/review/{id}', 'App\Http\Controllers\ReviewController@index')->name("review.index");
Route::post('/review/save', 'App\Http\Controllers\ReviewController@save')->name("review.save");
Route::get('/review/catalogue/{id}', 'App\Http\Controllers\ReviewController@catalogue')->name("review.catalogue");
Route::get('/wishlist', 'App\Http\Controllers\WishlistController@index')->name("wishlist.index");
Route::get('/wishlist/add/{id}', 'App\Http\Controllers\WishlistController@add')->name("wishlist.add");
Route::get('/wishlist/addCart', 'App\Http\Controllers\WishlistController@addCart')->name("wishlist.addCart");
Auth::routes();
