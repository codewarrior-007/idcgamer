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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('create', ['uses' => 'AccountController@create']);

Route::post('viewform', ['uses' => 'FormController@view']);

Route::post('field/options', ['uses' => 'FieldController@getOptions']);
Route::post('field/save', ['uses' => 'FieldController@saveField']);
Route::post('file/upload', ['uses' => 'FieldController@fileUpload']);

Route::get('sign/view', ['uses' => 'HelloSignController@viewform']);
Route::post('sign/save', ['uses' => 'HelloSignController@callback']);

