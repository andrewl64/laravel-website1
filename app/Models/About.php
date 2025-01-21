<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $fillable = [
        'title',
        'short_title',
        'short_desc',
        'long_desc',
        'about_img',
        'btn_link',
    ];
}
