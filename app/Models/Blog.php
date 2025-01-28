<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'cat_id',
        'title',
        'img',
        'tags',
        'desc',
        'short_desc',
    ];

    public function category() {
        return $this->belongsTo(BlogCategory::class, 'cat_id', 'id');
    }
}
