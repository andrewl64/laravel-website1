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
        'portfolio_short_title',
        'portfolio_short_desc',
        'portfolio_list',
        'portfolio_img2',
        'portfolio_img3',
    ];
}
