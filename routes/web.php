<?php
use App\Http\Controllers\MapsController;

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

Route::get('/', function () {
    return view('maps.index');
});

Route::get('/test', function () {
    return view('maps.test');
});

Route::get('storage/json/scenic_spot.json', [
    'uses' => 'MapsController@getJson'
]);

