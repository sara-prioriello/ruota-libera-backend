<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    public function bikes()
    {
        return $this->belongsToMany(Bike::class); //una feature può appartenere a molte bici
    }
}
