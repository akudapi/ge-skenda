<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PeringkatController;
use Illuminate\Support\Facades\Route;

// route dashboard
Route::get('/',[HomeController::class,'index'])->name('index');

// route login logout
Route::post('/login-proses',[LoginController::class,'login_proses'])->name('login-proses');
Route::get('/logout',[LoginController::class,'logout'])->name('logout');


// route detail program
Route::get('/pilah',[HomeController::class,'pilah'])->name('pilah');
Route::get('/beasiswa',[HomeController::class,'beasiswa'])->name('beasiswa');
Route::get('/minyak',[HomeController::class,'minyak'])->name('minyak');
Route::get('/pot',[HomeController::class,'pot'])->name('pot');


Route::get('/poin-history', [App\Http\Controllers\HomeController::class, 'showPoinHistory'])->name('poin.history');



Route::middleware(['auth'])->group(function(){

    // route nambah point(kg)
    Route::post('/point-proses',[PeringkatController::class,'point_proses'])->name('point-proses');
    
    // Route untuk halaman admin
    Route::get('/admin/poin', [AdminController::class, 'peringkat'])->name('admin.poin');
    Route::get('/admin/dana', [AdminController::class, 'dana'])->name('admin.dana');
    // Route untuk update data
    Route::post('/admin/poin/update/{id}', [AdminController::class, 'update'])->name('admin.poin.update');
    Route::post('/update-dana', [AdminController::class, 'updateDana'])->name('updateDana')->middleware('auth');
    // Route untuk delete data
    Route::post('/admin/poin/delete/{id}', [AdminController::class, 'destroy'])->name('admin.poin.delete');
    
});