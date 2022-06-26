<?php

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
    return view('welcome');
});

Route::middleware([ 'auth:sanctum',config('jetstream.auth_session'),'verified' ,'XssSanitizer'])->group(function () {
    Route::get('/dashboard', function () { return view('dashboard'); })->name('dashboard');
    ////Category Route
    Route::get('showCategory', \App\Http\Livewire\Category\showCategory::class)->name('show.category');
    Route::get('showPodcast', \App\Http\Livewire\Podcast\showPodcast::class)->name('show.podcast');


});
