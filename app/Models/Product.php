<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    function category() {
        return $this->belongsTo(Category::class)->withDefault();

    }
    function image() {
        return $this->morphOne(Image::class,'imageable')->where('type','main');

    }
    function gallery() {
        return $this->morphMany(Image::class,'imageable')->where('type','gallery');

    }
    function reviews()  {
        return $this->hasMany(Review::class);

    }
    function order_details()  {
        return $this->hasMany(OrderDetail::class);

    }

}
