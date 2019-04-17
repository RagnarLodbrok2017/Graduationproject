<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Post
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $image
 * @property string|null $video
 * @property int|null $status
 * @property string|null $about
 * @property string|null $color
 * @property string|null $keyword
 * @property string|null $search
 * @property int|null $like_count
 * @property int|null $comment_count
 * @property string|null $type
 * @property string|null $image_url
 * @property string|null $video_url
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $banned_at
 * @property int $users_id
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Category[] $category
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereAbout($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereBannedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereCommentCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereImageUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereKeyword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereLikeCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereSearch($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereUsersId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereVideo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Post whereVideoUrl($value)
 * @mixin \Eloquent
 */


class Post extends Model
{
    protected $table = 'post';
    public $timestamps = true;

    protected $fillable = [
        'title',	'description', 'image',	'video',	'status',	'about',	'color',	'keyword',	'search', 'like_count',
        'comment_count',	'type',	'image_url',	'video_url',	'created_at',	'updated_at',	'banned_at',	'users_id'];


    public function user() {
        return $this->belongsTo('App\User', 'users_id');
    }
    public function category() {
        return $this->belongsToMany('App\Category', 'post_category', 'post_id', 'category_id');
    }
}
