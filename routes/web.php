<?php

use App\Http\Controllers\BukuController;
use Illuminate\Database\Query\IndexHint;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/buku')->group(function(){
    Route::get('/', [BukuController::class, 'index'])->name('buku.index');
    Route::post('/simpan',[BukuController::class,'store'])->name('buku.simpan');

});