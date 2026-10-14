<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bike;

class BikeController extends Controller
{
    //motodo index
    public function index()
    {
        //ritorniamo tutte le bici in formato json
        $bikes = Bike::with('category', 'brand', 'features')->get();
        return response()->json($bikes);
    }

    public function show(Bike $bike)
    {
        //ritorniamo la bici selezionata in formato json
        $bike->load('category', 'brand', 'features');
        return response()->json($bike);
    }
}
