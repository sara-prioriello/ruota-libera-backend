<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bike extends Model
{
    public function category()
    {
        return $this->belongsTo(Category::class); //una bici appartiene a una categoria
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class); //una bici appartiene a un brand
    }   

    public function features()
    {
        return $this->belongsToMany(Feature::class); //una bici può avere molte features
    }
}
