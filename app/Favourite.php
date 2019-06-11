<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favourite extends Model
{
    protected $table = 'favourite';
    public $timestamps = true;

    protected $fillable = [
        'created_at',	'updated_at', 'post_id', 'users_id'];


    public function post() {
        return $this->belongsTo('App\Post', 'post_id');
    }
    public function user() {
        return $this->belongsTo('App\User', 'users_id');
    }

}
