<?php

use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProductController;
use GuzzleHttp\Promise\Create;
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

//Product Routes--------------------------------------------------------------------------------------- 
Route::get("/product" ,[ProductController::class, 'index']);
Route::get("product/create",[ProductController::class, 'create']);
Route::get("product/{id}/edit",[ProductController::class, 'edit']);
Route::get("product/{id}/view",[ProductController::class, 'view']);
Route::put('product/{id}/edit',[ProductController::class, 'update']);
Route::get('product/search',[ProductController::class,'search']);
Route::put('product/create',[ProductController::class, 'store']);
Route::get('/invoice',[InvoiceController::class,'index']);
Route::get('order/create',[InvoiceController::class,'create']);
Route::put('order/create',[InvoiceController::class,'store']);
//Dashboard Route---------------------------------------------------------------------------------------
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
