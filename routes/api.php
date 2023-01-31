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

Route::group([
    'namespace' => 'App\Http\Controllers\Api',
    //'middleware' => 'auth:web',
], function () {
    Route::group([
        'prefix' => 'article',
        'as' => 'article.',
        'namespace' => 'Article',
    ], function () {
        Route::get('/{article}', 'GetArticleController')->name('article');
    });
});
