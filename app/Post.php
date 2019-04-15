<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'post';
    protected $timestamps = true;

    protected $fillable = [
        'title',	'description', 'image',	'video',	'status',	'about',	'color',	'keyword',	'search', 'like_count',
        'comment_count',	'type',	'image_url',	'video_url',	'created_at',	'updated_at',	'banned_at',	'users_id'];


    public function user(){
        return $this->belongsTo('App\User');
    }
    public function category(){
        return $this->belongsToMany('App\Category', 'post_category', 'post_id', 'category_id');
    }
}
