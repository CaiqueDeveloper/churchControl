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

Route::redirect('/', '/church/dashboard');

Route::prefix('church')->group(function(){

    Route::get('/dashboard', function () {
        
        return view('dashboard');
    
    })->middleware(['auth'])->name('dashboard');
   
    Route::get('/typeTransaction', function () {
   
        return view('typeTransaction');

    })->middleware(['auth'])->name('typeTransaction');
   
    Route::get('/categories', function () {
        
        return view('categories');

    })->middleware(['auth'])->name('categories');
   
    Route::get('/transaction', function () {
        
        return view('transaction');

    })->middleware(['auth'])->name('transaction');
});


require __DIR__.'/auth.php';
