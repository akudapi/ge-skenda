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

// route nambah point(kg)
Route::post('/point-proses',[PeringkatController::class,'point_proses'])->name('point-proses');

// route detail program
Route::get('/pilah',[HomeController::class,'pilah'])->name('pilah');
Route::get('/beasiswa',[HomeController::class,'beasiswa'])->name('beasiswa');
Route::get('/minyak',[HomeController::class,'minyak'])->name('minyak');
Route::get('/pot',[HomeController::class,'pot'])->name('pot');


Route::middleware(['auth'])->group(function(){

    // Route untuk halaman admin
    Route::get('/admin/poin', [AdminController::class, 'peringkat'])->name('admin.poin');
    // Route untuk update data
    Route::post('/admin/poin/update/{id}', [AdminController::class, 'update'])->name('admin.poin.update');
    // Route untuk delete data
    Route::post('/admin/poin/delete/{id}', [AdminController::class, 'destroy'])->name('admin.poin.delete');
    
});