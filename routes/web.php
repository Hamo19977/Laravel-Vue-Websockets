<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\RoomController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\Admin\UserController as AdminUser;
use App\Http\Controllers\Admin\RoomController as AdminRoom;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/contacts', [ContactController::class, 'get']);
Route::get('/conversation/{id}', [ContactController::class, 'getMessagesFor']);
Route::get('/conversationRoom/{id}', [ContactController::class, 'getMessagesForRoom']);
Route::post('/conversation/send', [ContactController::class, 'send']);
Route::post('/conversation/sendRoom', [ContactController::class, 'store']);
Route::get('/rooms', [RoomController::class, 'rooms']);

Route::get('posts/{post}/comments', [CommentController::class, 'index']);
Route::post('posts/{post}/comment', [CommentController::class, 'store']);


Route::prefix("/dashboard")->middleware(["auth","admin"])->group(function () {
    Route::get('/', [AdminController::class, 'index']);
    Route::get('/users', [AdminController::class, 'users']);
    Route::get('/rooms', [AdminController::class, 'rooms']);
    Route::post('/edit-room/{id}', [AdminRoom::class, 'edit']);

});

Route::get('dashboard/{vue?}', function () {
    return view('dashboard');
})->where('vue','.*?');

Route::get('room/{vue?}', function () {
    return view('home');
})->where('vue','.*?');

Route::get('posts/{post}/comments', [CommentController::class, 'index']);
Route::post('posts/{post}/comment', [CommentController::class, 'store']);

