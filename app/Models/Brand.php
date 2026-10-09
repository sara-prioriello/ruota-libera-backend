<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    public function bikes()
        {
            return $this->hasMany(Bike::class); //un brand ha molte bici
        }
}