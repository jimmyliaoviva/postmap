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

Route::get('/storage/json/scenic_spot.json', [
    'uses' => 'MapsController@getJson',
    'as' => 'json.scenic_spot'
    ]);

Route::get('/storage/json/test.json', [
    'uses' => 'MapsController@getTest',
    'as' => 'json.test'    
    ]);

Route::get('/storage/json/scenic.json', [
    'uses' => 'MapsController@getScenic',
    'as' => 'json.scenic'    
    ]);

Route::get('/postcard', [
    'uses' => 'MapsController@postPostcard',
    'as' => 'postcard.writecard'    
    ]);


Route::get('storage/{name}', function ($name) {

    $path = storage_path($name);
    
    $mime = \File::mimeType($path);
    
    header('Content-type: ' . $mime);
    
    return readfile($path);
    
})->where('name', '(.*)');