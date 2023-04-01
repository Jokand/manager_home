<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\AuthController;

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

Route::controller(IndexController::class)->group(function () {
    Route::get('/', 'index')->name("home");
});


Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::get('/register', 'register')->name('register');

    Route::post('/login', 'signinPost')->name('login');
    Route::post('/register', 'signupPost')->name('register');

    Route::get('/logout', 'logout')->name('logout');
});

Route::get('/create', function () {
    return view('create');
});
Route::get('/task', function () {
    return view('task');
});
Route::get('/edit', function () {
    return view('edit');
});


Route::controller(TaskController::class)
    ->prefix('/posts')
    ->as('posts.')
    ->group(function () {

        Route::middleware(['auth', AdminMiddleware::class])
            ->group(function () {

                Route::get('/create', 'createForm')->name('create');

                Route::get('/{article:id}/delete', 'delete')->name('delete');
            });
    });

Route::controller(CommentController::class)->prefix('/comments')->group(function () {
    Route::post('/create', 'store')->name('comments.create');
});


Route::middleware(['auth', AdminMiddleware::class])
    ->controller(AdminController::class)
    ->as('admin.')
    ->prefix('/admin')
    ->group(function () {
        Route::get('/', 'index')->name('index'); // admin.index
    });
