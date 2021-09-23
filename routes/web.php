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
Route::get('/handbag/list', 'App\Http\Controllers\HandbagController@list')->name("handbag.list");
Route::get('/admin/', 'App\Http\Controllers\Admin\AdminHomeController@index')->name("admin.home.index");
Route::get('/admin/handbag/list', 'App\Http\Controllers\Admin\AdminHandbagController@list')->name("admin.handbag.list");
Route::get('/admin/accesory/catalogue', 'App\Http\Controllers\Admin\AdminAccesoryController@catalogue')->name("admin.accesory.catalogue");
Route::get('/admin/user/catalogue', 'App\Http\Controllers\Admin\AdminUserController@catalogue')->name("admin.user.catalogue");
Route::get('/admin/user/create', 'App\Http\Controllers\Admin\AdminUserController@createUser')->name("admin.user.create");
Route::post('/admin/user/delete', 'App\Http\Controllers\Admin\AdminUserController@deleteUser')->name("admin.user.delete");
Route::get('/admin/user/edit/{id}', 'App\Http\Controllers\Admin\AdminUserController@editUser')->name("admin.user.edit");
Route::post('/admin/user/save', 'App\Http\Controllers\Admin\AdminUserController@saveUser')->name("admin.user.save");
Route::post('/admin/user/saveEditUser', 'App\Http\Controllers\Admin\AdminUserController@saveEditUser')->name("admin.user.saveEditUser");
Auth::routes();
