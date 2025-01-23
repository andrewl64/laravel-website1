<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $fillable = [
        'portfolio_name',
        'portfolio_title',
        'portfolio_img',
        'portfolio_desc',
    ];
}
