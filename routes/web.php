<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Livewire\Admin\Dashboard;
use App\Livewire\ProductComponent;
use App\Livewire\product\CreateProductComponent;
use App\Livewire\product\EditProductComponent;
use App\Livewire\product\ViewProductComponent;
use App\Livewire\TagComponent;
use App\Livewire\tag\CreateTagComponent;
use App\Livewire\tag\EditTagComponent;
use App\Livewire\tag\ViewTagComponent;

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
    Route::get('/product/create',CreateProductComponent::class)->name('product.create');
    Route::get('/product-edit/{id}',EditProductComponent::class)->name('product.edit');
    Route::get('/product/{id}',ViewProductComponent::class)->name('product.view');

    //                        Tages
    Route::get('/tag',TagComponent::class)->name('tag');
    Route::get('/tag/create',CreateTagComponent::class)->name('tag.create');
    Route::get('/tag-edit/{id}',EditTagComponent::class)->name('tag.edit');
    Route::get('/tag/{id}',ViewTagComponent::class)->name('tag.view');
});
Route::get('/test', [Controller::class, 'test']);
