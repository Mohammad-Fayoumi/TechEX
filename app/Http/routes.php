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

//Route::get('stdClass', function (){
//
//    function get_index($obj, $name, $test){
//        echo $obj->$name;
//        echo '<br>';
////        $var = ${$test.' Math and OOP'};
//        echo $obj->test.' Math and OOP';
//    }
//
//    $obj = new stdClass();
//    $obj->name = 'Ali';
//    $obj->test = 'Test Math';
////    print_r($obj);
//    get_index($obj, 'name', 'test');
//});
//
//
//
///*
//|--------------------------------------------------------------------------
//| Database Raw SQL Queries
//|-------------------------------------------------------------------------
//*/
//
////use Illuminate\Support\Facades\DB;

Route::get('/insert', function(){

    DB::insert('insert into posts (title, content, created_at) values (?, ?, ?)',
        ['timed post', 'Welcome to the timed post\'s contents here.....',  Date("Y-m-d h:i:s", time())]);

//    named binding variables
//    DB::insert('insert into posts (title, content) values (:title, :content)', ['title' => 'ELOQUENT ORM', 'content' => 'ORM is awesome ????????????????']);


});
//
//Route::get('/read', function (){
////stdClass is an empty class in php
//
//    $results = DB::select('select * from posts where id=?', [1]);
////    print_r(json_encode($results));
//    foreach ($results as $post){
//        return $post->title;
//    }
//
//
//
//});
//
//Route::get('/update', function (){
//
//    $updated = DB::update('update posts set title=? where id=?', ['Updated first post', 1]);
//   return $updated;
//});

//Route::get('/delete', function (){
//
//    $result = DB::delete('delete from posts where id=?', [2]);
////    return $result;
//    var_dump($result);
//});


/*
|--------------------------------------------------------------------------
| ELOQUENT ORM
|--------------------------------------------------------------------------
|*/

use App\Post;

//Route::get('/find', function (){
//
//    $posts = Post::all(); // === select * from posts;
////    var_dump($posts);
//
//    foreach ($posts as $post)
//    {
//        return $post->title;
//    }
//});

//Route::get('/find', function (){
//
//    $post = Post::find(3);
//
//    return $post->title;
//
//});

Route::get('/findWhere', function (){

    $posts = Post::where('id', '>', 1)->orderBy('id', 'desc')->get();
//    return $posts;
//    $time = 'created_at';
    foreach ($posts as $post)
    {
        echo $post.'<br/>';
    }
});

Route::get('/findMore', function (){

//    $posts = Post::findOrFail(55);
    $posts = Post::where('id', '>', 1)->firstOrFail()->get();
//    $posts = Post::withTrashed()->where('id', '>', 1)->get();
//    $posts = Post::onlyTrashed()->where('id', '>', 1)->get();
//    $posts = Post::where('id', 4)->restore();
    return $posts;
//    return view('post', compact('posts'));
});

// Insert Data Using ELOQUENT ORM

Route::get('/basicInsert', function (){

    $post = new Post();

    // access into Post's property
//    $post->id = 9;
    $post->title = 'Title 101010101010 after increased the auto-increment';
    $post->content = 'Auto-increment update';
//    $post->created_at = Date("Y-m-d h:i:s", time());
//    Eloquent by default will give you timestamp for created_at and updated_at
    $post->save();

});

Route::get('/updateORM', function (){

    $post = Post::find(1);

    // access into Post's property
    $post->title = 'First Post Updated Title for ORM Eloquent insert data.';
    $post->content = 'Wow inserting data ';
//    $post->created_at = Date("Y-m-d h:i:s", time());
//    Eloquent by default will give you timestamp for created_at and updated_at
    $post->save();

});


/*A mass-assignment vulnerability occurs when a user passes an unexpected HTTP parameter through a request,
and that parameter changes a column in your database you did not expect.
For example, a malicious user might send an is_admin parameter through an HTTP request,
which is then passed into your model's create method, allowing the user to escalate themselves to an administrator.
*/

Route::get('/create', function (){

//  this create function will make a {MassAssignmentException}
//  because the Post model will think that the the inserted data with create function will not be safe.
//  we should specify the safe columns inside the Post model.
    Post::create(['title' => 'Title with create method',
        'content' => 'Hey its is gone good with laravel to me .this is after using fillable method']);

});

Route::get('/update', function (){

    Post::where('id', 3)->where('is_admin', 0)->update(['title'=>'updated title', 'content'=>'New updated content']);

});

//
//Route::get('/delete', function (){
//
//    $post = Post::find(3);
//    $post->delete();
//
//});

Route::get('/delete2', function (){

// delete multiple records by tow methods:

//    1. using destroy method // Deleting An Existing Model By Key => destroy()
//    Post::destroy(1);
//    Post::destroy([5,6]);

//    2. using where and delete function  // Deleting Models By Query
    Post::where('id', '>=', 46)->delete();
});

//visit ---> (https://laravel.com/docs/5.6/eloquent#deleting-models).
Route::get('/softDelete', function (){
// soft Deleting
    return Post::where('id', 9)->delete();

//    permanently deleting a model use the non-static method forceDeleting method
//    $posts = Post::where('id', 4);
//    return $posts->forceDelete();

});

Route::get('/findSoftDelete', function (){

//    return Post::withTrashed()->where('id', '>', 1)->get();

//    Find only soft deleted items
    return Post::onlyTrashed()->get();

});

Route::get('/restore', function (){

//    return Post::where('id', 46)->restore();

//    restore all trashed items
    return Post::withTrashed()->restore();

});

Route::get('/forceDelete', function (){

//    return Post::where('id', 47)->forceDelete();

//    Delete all trashed items
    Post::onlyTrashed()->forceDelete();
});






