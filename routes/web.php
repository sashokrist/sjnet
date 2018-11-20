<?php

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
    return view('welcome');
});

Route::get('/profile', [
    'uses' => 'PostController@getDashboard',
    'as' => 'profile'
]);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/createpost', [
    'uses' => 'PostController@postCreatePost',
    'as' => 'post.create'
]);

Route::get('/delete-post/{post_id}', [
    'uses' => 'PostController@getDelete',
    'as' => 'post.delete'
]);

Route::post('/edit', function (\Illuminate\Http\Request $request){
   return response()->json(['message' => $request['body']]);
})->name('edit');

