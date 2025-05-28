<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/piano',function(){
    return view('piano');
})->name('piano');
