<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;

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

Route::get('/', function () {
    return view('welcome');
    // $user = Role::find(1);
    // $user->givePermissionTo('manage user', 'add');
});

// Permission
Route::group(['middleware' => ['can:add']], function () {
    //
    Route::get('/add', function () {
        return view('permission.add');
    });
});
Route::group(['middleware' => ['can:delete']], function () {
    //
    Route::get('/delete', function () {
        return view('permission.delete');
    });
});
Route::group(['middleware' => ['can:edit']], function () {
    //
    Route::get('/edit', function () {
        return view('permission.edit');
    });
});
Route::group(['middleware' => ['can:display']], function () {
    //
    Route::get('/display', function () {
        return view('permission.display');
    });
});


// Managing Permission
Route::group(['middleware' => ['can:manage user']], function () {
    //
    Route::get('/manage/{id}', [App\Http\Controllers\UserController::class, 'managePermission']);
    Route::post('/manage/{id}', [App\Http\Controllers\UserController::class, 'updatePermission']);
});


Route::resource('/users', UserController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
