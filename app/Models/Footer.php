<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Footer extends Model
{
    protected $fillable = [
        'phone',
        'desc',
        'address',
        'email',
        'copyright',
    ];
}
