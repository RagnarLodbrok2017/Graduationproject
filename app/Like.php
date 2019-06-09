<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $table = 'like';
    public $timestamps = true;

    protected $fillable = [
        'like',	'created_at',	'updated_at', 'post_id', 'users_id'];


    public function post() {
        return $this->belongsTo('App\Post', 'post_id');
    }
    public function user() {
        return $this->belongsTo('App\User', 'users_id');
    }

}
