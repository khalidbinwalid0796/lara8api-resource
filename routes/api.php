<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//using resource route
Route::apiResource('/post',PostController::class);

//using resource route with model binding
Route::apiResource('/category',CategoryController::class);

//using resource route with model binding & CommentResource(php artisan make:resource CommentResource)
Route::apiResource('/comment',CommentController::class);
