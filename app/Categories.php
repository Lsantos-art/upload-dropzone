<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $fillable = [
        'name',
        'slug'
    ];


    public function products()
    {
        return $this->hasMany(Products::class, 'categ_id');
    }
}
