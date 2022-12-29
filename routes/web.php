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

Route::get('/', [
    'uses' => 'PostController@enteringGame',
    'as' => 'post.enteringGame'
]);

Route::get('/index', [
    'uses' => 'PostController@index',
    'as' => 'post.index'
]);

Route::get('/gameRule', [
    'uses' => 'PostController@gameRule',
    'as' => 'post.gameRule'
]);

Route::get('/gameDevelopment', [
    'uses' => 'PostController@gameDevelopment',
    'as' => 'post.gameDevelopment'
]);

Route::get('/constantinopolis', [
    'uses' => 'PostController@intro_constantinopolis',
    'as' => 'post.intro_constantinopolis'
]);

Route::get('/dunhuang', [
    'uses' => 'PostController@intro_dunhuang',
    'as' => 'post.intro_dunhuang'
]);

Route::get('/samarqand', [
    'uses' => 'PostController@intro_samarqand',
    'as' => 'post.intro_samarqand'
]);

Route::get('/changan', [
    'uses' => 'PostController@intro_changan',
    'as' => 'post.intro_changan'
]);

Route::get('/game/{roomid}', [
    'uses' => 'GameController@viewGame',
    'as' => 'game.game',
    'middleware' => 'auth',
]);

Route::get('/wait', [
    'uses' => 'GameController@connect',
    'as' => 'game.wait',
    'middleware' => 'auth',
]);

Route::get('/waiting/{roomid}', [
    'uses' => 'GameController@viewWait',
    'as' => 'game.waiting',
    'middleware' => 'auth',
]);

// 測試用 TODO: 刪除
Route::get('/demo', [
    'uses' => 'PostController@demo',
    'as' => 'game.demo'
]);
// 測試用 TODO: 刪除
Route::get('/test', [
    'uses' => 'PostController@test',
    'as' => 'post.test'
]);

Route::group(['prefix' => 'user'], function(){
    Route::middleware(['guest'])->group(function () {
        Route::get('/signup', [
            'uses' => 'UserController@getSignup',
            'as' => 'user.signup'
        ]);

        Route::post('/signup', [
            'uses' => 'UserController@postSignup',
            'as' => 'user.signup'
        ]);

        Route::get('/signin', [
            'uses' => 'UserController@getSignin',
            'as' => 'user.signin'
        ]);

        Route::post('/signin', [
            'uses' => 'UserController@postSignin',
            'as' => 'user.signin'
        ]);
    });

    Route::get('user/logout', [
        'uses' => 'UserController@getLogout',
        'as' => 'user.logout',
        'middleware' => 'auth'
    ]);
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
