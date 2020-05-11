<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImageDrop extends Model
{
    protected $fillable = [
        'name',
        'link',
        'product_id',
    ];
}
