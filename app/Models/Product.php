<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'description', 'price', 'image', 'extra_image_1', 'extra_image_2'];

    public function getExtraImagesAttribute()
    {
        return array_filter([
            $this->extra_image_1,
            $this->extra_image_2,
        ]);
    }
}
