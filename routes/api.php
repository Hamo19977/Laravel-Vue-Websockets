<?php

use App\Http\Controllers\CommentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController as AdminUser;
use App\Http\Controllers\Admin\RoomController as AdminRoom;

Route::prefix("/dashboard/")->group(function () {
    Route::post('create-room', [AdminRoom::class, 'store']);
    Route::post('edit-room/{id}', [AdminRoom::class, 'edit']);
    Route::get('view-user/{id}', [AdminUser::class, 'viewUser']);
    Route::post('edit-user/{id}', [AdminUser::class, 'editUser']);
    Route::get('view-room/{id}', [AdminRoom::class, 'viewRoom']);
    Route::post('delete-user/{id}', [AdminUser::class, 'deleteUser']);
    Route::post('delete-room/{id}', [AdminRoom::class, 'delete']);
});

Route::get('room/users/{id}', [CommentController::class, 'getRoomUsers']);


