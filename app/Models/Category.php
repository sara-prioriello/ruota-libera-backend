<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function bikes()
    {
        return $this->hasMany(Bike::class); //una categoria ha molte bici
    }
}
