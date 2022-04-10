<?php

use App\Http\Controllers\HomeController;
use App\Http\Middleware\Admin as MiddlewareAdmin;
use App\Models\Admin;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
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
/*

Route::get('sho',function()
{
    $use=Auth::user();
    return $use;
});

Route::get('home2',function()
{
   return view('auth.home2');
});

Route::get('accueil',function()
{
   return view('auth.accueil');
});

Route::get('app',function()
{
   return view('layouts.app');
});
*/

Auth::routes();

// Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');




Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
//categorie
Route::get('/show/{id}', [\App\Http\Controllers\HomeController::class, 'show'])->name('show2.product');

//cart
Route::get('/panier/{product}', [\App\Http\Controllers\CartController::class, 'panier'])->name('cart.index');
Route::post('/cart/{product}', [\App\Http\Controllers\CartController::class, 'add_product'])->name('cart.add');
Route::get('/cart/order', [\App\Http\Controllers\CartController::class, 'cart'])->name('cart.show');
Route::delete('/cart/delete/{product}', [\App\Http\Controllers\CartController::class, 'delete_order'])->name('cart.delete');
Route::put('/cart/update/{product}', [\App\Http\Controllers\CartController::class, 'update_order'])->name('cart.update');
//Activate Your Account
Route::get('/active/user/{code}', [\App\Http\Controllers\ActivateController::class, 'ActivateAccount'])->name('user.activate');
Route::get('/active/{id}', [\App\Http\Controllers\ActivateController::class, 'resendverification'])->name('code.resend');
//payer
Route::get('/payer', [\App\Http\Controllers\PayerController::class, 'payer'])->name('cart.payer');
Route::get('/payer/succes', [\App\Http\Controllers\PayerController::class, 'payer'])->name('payer.succes');
Route::get('/payer/cancel', [\App\Http\Controllers\PayerController::class, 'cancel'])->name('payer.cancel');
Route::get('/payer/livraison', [\App\Http\Controllers\PayerController::class, 'livr'])->name('cart.livr');
//search
Route::post('/search', [\App\Http\Controllers\SearchController::class, 'search'])->name('search1');

//product
Route::get('/product', [\App\Http\Controllers\ProductController::class, 'index'])->name('show.product');
Route::get('/product/delete/{id}', [\App\Http\Controllers\ProductController::class, 'delete'])->name('delete.product');
Route::get('/product/edit/{id}', [\App\Http\Controllers\ProductController::class, 'edit'])->name('edit.product');
Route::put('/product/update/{id}', [\App\Http\Controllers\ProductController::class, 'update'])->name('update.product');
Route::get('/product/add', [\App\Http\Controllers\ProductController::class, 'show_add'])->name('add1.product');
Route::post('/product/add', [\App\Http\Controllers\ProductController::class, 'add'])->name('add2.product');

//commande
Route::get('/commande', [\App\Http\Controllers\CommandesController::class, 'index'])->name('show.commande');
Route::get('/commande/edit/paid/{id}', [\App\Http\Controllers\CommandesController::class, 'edit1'])->name('edit1.commande');
Route::get('/commande/delete/{id}', [\App\Http\Controllers\CommandesController::class, 'delete'])->name('delete.commande');
Route::get('/commande/edit/livred/{id}', [\App\Http\Controllers\CommandesController::class, 'edit2'])->name('edit2.commande');

Route::get('/bmr', [\App\Http\Controllers\BmiController::class, 'bmi'])->name('bmi');


//Admin
Route::get('/admin', [\App\Http\Controllers\AdminController::class, 'index'])->name('admin.indexs');
Route::get('/admin/login', [\App\Http\Controllers\AdminController::class, 'showloginform'])->name('admin.login');
Route::post('/admin/login2', [\App\Http\Controllers\AdminController::class, 'store'])->name('admin.store');