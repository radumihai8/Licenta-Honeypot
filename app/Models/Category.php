<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    //products() is a method that returns a collection of products
    public function products(){
        return $this->hasMany(Product::class);
    }
}
