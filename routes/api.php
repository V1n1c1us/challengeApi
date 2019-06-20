<?php

use Illuminate\Http\Request;
use App\Api\BreedController;
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

Route::namespace('API')->group(function(){
        Route::get('/', 'BreedController@index');
        Route::get('/breed/search/{name}', 'BreedControllerApi@search');
        Route::get('/breed/insert', 'BreedControllerApi@create');
});

