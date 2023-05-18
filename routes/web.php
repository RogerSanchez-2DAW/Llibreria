<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;

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

Route::get('/', function () {
    $response = Http::get('https://priceless-jemison.212-227-147-154.plesk.page/api/libros/');
    return view('welcome',['libros' =>$response->json()]);
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/api', function(){
    $response = Http::get('https://priceless-jemison.212-227-147-154.plesk.page/api/libros/');
    return view('llibres/index',['libros' =>$response->json()]);
})->name('store');

Route::get('/api/{id}', function(int $id){
    $response = Http::get('https://priceless-jemison.212-227-147-154.plesk.page/api/libros/' . $id);
    return view('llibres/show',['libros' =>$response->json()]);
})->name('show');


Route::get('/cart', function(){
    return view('cart/cart');
})->name('cart');
Route::get('/add-to-cart/{id}', [CartController::class, 'addToCart'])->name('addCart');
Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::put('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');




require __DIR__.'/auth.php';
