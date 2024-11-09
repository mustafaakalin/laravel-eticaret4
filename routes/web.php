<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\ProductList;
use App\Livewire\ProductDetail;
use App\Livewire\Auth\Login;
use App\Livewire\Dashboard;

// Route::get('/', function () {
//     return view('welcome');
// });




Route::get('/login', Login::class)->name('login');
Route::get('/dashboard', Dashboard::class)->middleware('auth')->name('dashboard');

// Product routes
Route::get('/', ProductList::class)->name('product.list');

Route::get('/product/{slug}', ProductDetail::class)->name('product.detail');

