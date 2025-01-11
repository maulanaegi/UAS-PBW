<?php

use App\Http\Controllers\VisitorApiController;
use Illuminate\Support\Facades\Route;

Route::apiResource('visitors', VisitorApiController::class);
