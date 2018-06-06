<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
//  one ot one relationship
    public function post(){

//        this will automatically go to the post table ans expects to use the user_id by default
        return $this->hasOne('App\Post');

//        but if we have a different foreign column name we should specify that hasOne('App\Post', 'the_user_ID')
//        and you can add third parameter if the post table has different primary key hasOne('App\Post', 'the_user_ID', 'post_id)

    }

//    one to many relationship
    public function posts(){

        return $this->hasMany('App\Post');

    }

    public function roles (){

        return $this->belongsToMany('App\Role');

    }
}
