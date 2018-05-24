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

//Route::get('/', function () {
//    return view('welcome');
//});

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

// Route::resource('/posts', 'PostsController');

//Route::get('/post/{id}/{name}/{email}', 'PostsController@show_post');
//
//Route::get('/contact', 'PostsController@contact');

Route::get('stdClass', function (){

    function get_index($obj, $name, $test){
        echo $obj->$name;
        echo '<br>';
//        $var = ${$test.' Math and OOP'};
        echo $obj->test.' Math and OOP';
    }

    $obj = new stdClass();
    $obj->name = 'Ali';
    $obj->test = 'Test Math';
//    print_r($obj);
    get_index($obj, 'name', 'test');
});



/*
|--------------------------------------------------------------------------
| Database Raw SQL Queries
|-------------------------------------------------------------------------
*/

//use Illuminate\Support\Facades\DB;

Route::get('/insert', function(){

//    DB::insert('insert into posts (title, content) values (?, ?)', ['Second Post', 'Welcomre to the second posts contents here.....']);

//    named binding variables
    DB::insert('insert into posts (title, content) values (:title, :content)', ['title' => 'Third Post', 'content' => 'Welcomre to the third posts contents here.....']);


});

Route::get('/read', function (){
//stdClass is an empty class in php

    $results = DB::select('select * from posts where id=?', [1]);
//    print_r(json_encode($results));
    foreach ($results as $post){
        return $post->title;
    }



});

Route::get('/update', function (){

    $updated = DB::update('update posts set title=? where id=?', ['Updated first post', 1]);
   return $updated;
});

Route::get('/delete', function (){

    $result = DB::delete('delete from posts where id=?', [2]);
//    return $result;
    var_dump($result);
});











