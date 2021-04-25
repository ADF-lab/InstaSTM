<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Home;
use App\Http\Livewire\Postpage;
use App\Http\Livewire\Otheruser;
use App\Http\Livewire\Explorepage;

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

Route::group(['middleware' => ['auth:sanctum', 'verified']],function(){
	Route::get('/', Home::class)->name('home');
	Route::post('image-upload', [ ImageUploadController::class, 'imageUploadPost' ])->name('image.upload.post');
	Route::get('postpage/{slug}', Postpage::class)->name('postpage');
	Route::get('user/{slug}', Otheruser::class)->name('user');
	Route::get('explore',Explorepage::class)->name('explore');
});
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});