<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $fillable = [
        'id',
        'name',
        'description',
        'price',
        'images',
        'categorie',
        'categ_id'
    ];


    public function images()
    {
        return $this->hasMany(Images::class, 'product_id');
    }
}
