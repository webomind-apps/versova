<?php

use App\Http\Controllers\Sales\AuthController as SalesAuthController;
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
    return view('customer.Auth.login');
})->name('login');

Route::post('login', [SalesAuthController::class, 'login'])->name('login.store');


Route::middleware('auth:customer')->group(function () {
   
});
