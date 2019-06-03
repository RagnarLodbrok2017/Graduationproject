<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sessions extends Model
{
    protected $table = "sessions";
    public $timestamps = true;
    protected $timestamp = true;
    protected $fillable = ['payload' , 'user_id', 'updated_at', 'created_at'];
}
