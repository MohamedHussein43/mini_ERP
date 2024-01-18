<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Livewire\Admin\Dashboard;
use App\Livewire\ProductComponent;
use App\Livewire\product\CreateProductComponent;
use App\Livewire\TagComponent;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/',Dashboard::class);
    Route::get('/dashboard',Dashboard::class)->name('dashboard');
    Route::get('/product',ProductComponent::class)->name('product');
    Route::get('/product/create',CreateProductComponent::class)->name('product/create');
    Route::get('/tag',TagComponent::class)->name('tag');
});
Route::get('/test', [Controller::class, 'test']);
