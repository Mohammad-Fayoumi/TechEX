<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

// // The parameters will be pass to cluser function in order not by name
// Route::get('/posts/{id}/{name}', function ($ids, $name) {
// 	return 'About page '.$ids.' '.$name;
// });

// // Two ways to name as routes
// Route::get('category/subCategory/terms/PHP', array('as' => 'parent.child', function () {
// 	$url = route('uu');
// 	return $url;
// }));

// Route::get('/url', function (){
// 	return route('parent.child');
// })->name('uu');

// Route::get('/posts/{id}', 'PostsController@index');

Route::resource('/posts', 'PostsController');