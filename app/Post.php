<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    /*
     This model think we have a tables inside database called postsadmins BY DEFAULT.
     protected $table = 'posts';
     And by default if your table has a primary key this model will think the primary key is "id"
     protected $primaryKey = 'post_id';
     Allow some columns in posts table to be created with create function using fillable function
    */

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'title',
        'content'
    ];
    
}
