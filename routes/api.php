<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\API\CarsController;

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

Route::post('/register', 'App\Http\Controllers\API\AuthController@register');
Route::post('/login', 'App\Http\Controllers\API\AuthController@login');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/cars', 'App\Http\Controllers\API\CarsController@index');
    Route::get('/cars/restore/{id}', 'App\Http\Controllers\API\CarsController@restore');
    
    Route::apiResources([
        'cars' => 'App\Http\Controllers\API\CarsController',
        'products' => 'App\Http\Controllers\API\ProductsController',
    ]);
    Route::get('/products/restore/{id}', 'App\Http\Controllers\API\ProductsController@restore');

});

/* Route::get('/cars', 'App\Http\Controllers\API\CarsController@index');
//Route::get('/cars', [CarsController::class, 'index']);
Route::apiResources([
    'cars' => 'App\Http\Controllers\API\CarsController',
    'products' => 'App\Http\Controllers\API\ProductsController',
]);
Route::get('/cars/restore/{id}', 'App\Http\Controllers\API\CarsController@restore'); */
