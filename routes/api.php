<?php

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

Route::post('/getPostsByID', [\App\Http\Controllers\PostController::class, 'getPostByID'])->middleware(\App\Http\Middleware\Authenticate::class);
Route::post('/getPostsLastThreeDay', [\App\Http\Controllers\PostController::class, 'getPostsLastThreeDay'])->middleware(\App\Http\Middleware\Authenticate::class);
Route::post('/getPostsPagination', [\App\Http\Controllers\PostController::class, 'getPostsPagination'])/*->middleware(\App\Http\Middleware\Authenticate::class)*/->middleware(\App\Http\Middleware\checkPaginationMiddleware::class);
