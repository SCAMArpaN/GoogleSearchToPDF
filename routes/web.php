<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    //return view('welcome');
    return redirect(route('home'));
});

Auth::routes();

//middleware auth here is just example that you can put middleware like that on many route and in controller its self as well

Route::middleware(['auth'])->group(function(){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::post('/search_result', [App\Http\Controllers\HomeController::class, 'Search'])->name('search_result');
    Route::get('/result/{id}', [App\Http\Controllers\HomeController::class, 'ResultShow'])->name('result_show');
    Route::get('/old_result/{id}', [App\Http\Controllers\HomeController::class, 'ResultView'])->name('result_old');
});

