<?php

use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\CommentController;

Route::apiResource('posts', PostController::class);
Route::apiResource('posts.comments', CommentController::class);