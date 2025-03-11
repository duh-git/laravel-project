<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
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

Route::get('/', [MainController::class, 'index'])->name('gallery.index');
Route::get('/gallery/{id}', [MainController::class, 'show'])->name('gallery.show');
Route::get('/about', function () {
  return view('main/about');
})->name('about');
Route::get('/contacts', function () {
  $contacts = [
    'name' => 'MosPolyTech',
    'address' => 'B. Semenovskaya',
    'phone' => '8(495) 423-32-32',
    'email' => '@mospolytech.ru'
  ];

  return view('main/contacts', ['contacts' => $contacts]);
})->name('contacts');

// Auth
Route::get('/auth/registration', [AuthController::class, 'registration'])->name('registration');
Route::post('/auth/registration', [AuthController::class, 'registrationHandler']);
Route::get('/auth/login', [AuthController::class, 'login'])->name('login');
Route::post('/auth/login', [AuthController::class, 'loginHandler']);
Route::get('/auth/logout', [AuthController::class, 'logout'])->name('logout');

// Articles
Route::resource('article', ArticleController::class)->middleware('auth:sanctum');
// Route::group(['prefix' => '/article'], function () {
//   Route::get('', [ArticleController::class, 'index']);
//   Route::get('/create', [ArticleController::class, 'create']);
//   Route::get('/store', [ArticleController::class, 'store']);
// });

// Comments
Route::post('/article/{article}/comments', [CommentController::class, 'store'])
  ->name('articles.comments.store');
Route::get('comments/{comment}/edit', [CommentController::class, 'edit'])
  ->name('comments.edit');
Route::patch('comments/{comment}', [CommentController::class, 'update'])
  ->name('comments.update');
Route::delete('comments/{comment}', [CommentController::class, 'destroy'])
  ->name('comments.destroy');