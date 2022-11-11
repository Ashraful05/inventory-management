<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\AdminController;
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
});

Route::get('/dashboard', function () {
//    return view('dashboard');
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';

Route::controller(AdminController::class)->group(function(){
    Route::prefix('admin')->group(function(){
        Route::get('logout','adminLogout')->name('admin.logout');
        Route::get('profile','adminProfile')->name('admin_profile');
        Route::get('profile/edit/{id}','adminEditProfile')->name('edit_profile');
    });

});
