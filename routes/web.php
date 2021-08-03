<?php

use Illuminate\Support\Facades\Route;

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

require __DIR__ .'/local_only.php';

Route::get('/', function () {
    return view('welcome');
});

Route::get('{vueRoutes}', function () {
    return view('webapp');
})->where('vueRoutes', '^((?!api).)*$'); // except 'api' word