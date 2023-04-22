<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;

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
    return view('Welcome');
});
// Registration Routes
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']); /* ->middleware('checkAge'); */

Route::get('/not-allowed', function () {
    return 'Sorry, you are not allowed to view this page!';
})->name('not-allowed');

// Login Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Logout Route
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// auth user only getting access to dashboard
Route::get('/dashboard', function () {
    $posts = App\Models\Post::all();
    return view('dashboard', ['posts' => $posts]);
})->middleware(['auth']);

//Post

Route::resource("/posts", PostController::class);


Route::post('/posts/{post_id}/comments', [CommentController::class, 'store'])->name('comments.store');


/* Route::post('/comments', [CommentController::class, 'store'])->name('comments.store'); */





