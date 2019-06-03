<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $table = "history";
    protected $timestamp = true;
    protected $fillable = ['about' ,	'action' ,	'users_id' ,	'post_id' , 'post_title' , 'user_name'];

    public function user() {
        return $this->belongsTo('App\User', 'users_id');
    }
    public function post() {
        return $this->belongsTo('App\Post', 'post_id');
    }
}
