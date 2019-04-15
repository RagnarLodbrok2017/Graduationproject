<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "category";
    protected $timestamp = true;

    protected $fillable = [
        'name',	'description',	'created_at',	'updated_at'
    ];

}
