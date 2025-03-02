<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/login', function () {
//     return view ('loginin');
// });

Route::get('/',[AuthController::class, 'index']);

Route::get('/forgot-password' , [AuthController::class , 'forget_password']);

Route::get('/register', [AuthController::class , 'register']);

Route::post('/register_post', [AuthController::class, 'register_post']);

Route::post('/login_post', [AuthController::class, 'login_post']);
