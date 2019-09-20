<?php

use App\Http\Controllers\MapsController;
use Illuminate\Http\Request;
//use Illuminate\Routing\Route;
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

Route::get('/', [
    'uses' => 'MapsController@getIndex',
    'as' => 'maps.index'
]);

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



Route::group(['prefix' => 'user'], function () {
    //the pages only authenticate user can access
    Route::group(['middleware' => 'auth'], function () {

        Route::get('/postcard/{spotName}', [
            'uses' => 'MapsController@getPostcard',
            'as' => 'postcard.writecard'
        ]);

        Route::post('/postcard', [
            'uses' => 'MapsController@postPostcard',
        ]);

        Route::get('/mailbox/{spotName}', [
            'uses' => 'MapsController@getMailbox',
            'as' => 'postcard.mailbox'
        ]);

        Route::get('/mycard', [
            'uses' => 'MapsController@getMycard',
            'as' => 'postcard.mycard'
        ]);

        Route::get('/logout', [
            'uses'=>'UserController@getLogout',
            'as'=>'user.logout'
            ]
        );
    });
    //the pages guest can access
    Route::group(['middleware' => 'guest'], function () {

    });
    Route::get('/signup',[
        'uses'=>'UserController@getSignup',
        'as'=> 'user.signup'
    ]);

    Route::post('/signup', [
        'uses' =>'UserController@postSignup',
        'as' => 'user.signup'
    ]);

    Route::get('/signin',[
        'uses'=> 'UserController@getSignin',
        'as'=> 'user.signin'
        //the authencation user cannot sign in (because he is already sign in)
        ]
    );

    Route::post('/signin', [
        'uses'=>'UserController@postSignin',
        'as'=>'user.signin']
    );


});



Route::get('storage/{name}', function ($name) {

    $path = storage_path($name);

    $mime = \File::mimeType($path);

    header('Content-type: ' . $mime);

    return readfile($path);
})->where('name', '(.*)');
