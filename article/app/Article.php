<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'title', 'name', 'password', 'content',
    ];

    protected $hidden = [
        'password', 'remember_token', '',
    ];
}
