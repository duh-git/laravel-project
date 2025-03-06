<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use Database\Seeders\ArticleSeeder;
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

Route::get('/weclome', function () {
  return view('welcome');
});

Route::get('/', [MainController::class, 'index']);
Route::get('/gallery/{id}', [MainController::class, 'show']);

Route::get('/about', function () {
  return view('main/about');
});

Route::get('/contact', function () {
  $contact = [
    'name' => 'MosPolyTech',
    'address' => 'B. Semenovskaya',
    'phone' => '8(495) 423-32-32',
    'email' => '@mospolytech.ru'
  ];

  return view('main/contact', ['contact' => $contact]);
});


Route::get('/register', [AuthController::class, 'create']);
Route::post('/auth/login', [AuthController::class, 'registration']);

Route::resource('article', ArticleController::class);
// Route::group(['prefix' => '/article'], function () {
//   Route::get('', [ArticleController::class, 'index']);
//   Route::get('/create', [ArticleController::class, 'create']);
//   Route::get('/store', [ArticleController::class, 'store']);
// });