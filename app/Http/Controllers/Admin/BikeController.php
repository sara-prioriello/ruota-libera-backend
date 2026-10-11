<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bike;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Feature;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BikeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bikes = Bike::all();
        //ritorniamo la view con le bike
        return view('admin.bikes.index', compact('bikes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        $features = Feature::all();
        return view('admin.bikes.create', compact('categories', 'brands', 'features'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $newBike = new Bike();
        $newBike->name = $data['name'];
        $newBike->slug = Str::slug($data['name']);
        $newBike->year = $data['year'];
        $newBike->price = $data['price'];
        $newBike->weight = $data['weight'];
        $newBike->frame_material = $data['frame_material'];
        $newBike->description = $data['description'];
        $newBike->category_id = $data['category_id'];
        $newBike->brand_id = $data['brand_id'];

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('uploads', 'public');
            $newBike->image = $path;
        }

        //salviamo la nuova bici
        $newBike->save();

        //associamo le features selezionate alla bici
        if (isset($data['features'])) {
            $newBike->features()->attach($data['features']);
        }

        return redirect()->route('admin.bikes.index')->with('message', 'Bici creata con successo');
    }

    /**
     * Display the specified resource.
     */
    public function show(Bike $bike)
    {
        return view('admin.bikes.show', compact('bike'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bike $bike)
    {
        $categories = Category::all();
        $brands = Brand::all();
        $features = Feature::all();
        return view('admin.bikes.edit', compact('bike', 'categories', 'brands', 'features'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bike $bike)
    {
        $data = $request->all();
        $bike->name = $data['name'];
        $bike->slug = Str::slug($data['name']);
        $bike->year = $data['year'];
        $bike->price = $data['price'];
        $bike->weight = $data['weight'];
        $bike->frame_material = $data['frame_material'];
        $bike->description = $data['description'];
        $bike->category_id = $data['category_id'];
        $bike->brand_id = $data['brand_id'];

        if ($request->hasFile('image')) {
            // Elimina l'immagine precedente se esiste
            if ($bike->image) {
                Storage::disk('public')->delete($bike->image);
            }
            // Salva la nuova immagine
            $path = $request->file('image')->store('uploads', 'public');
            $bike->image = $path;
        }

        //salviamo la bici aggiornata
        $bike->save();

        //aggiorniamo le features associate alla bici
        if (isset($data['features'])) {
            $bike->features()->sync($data['features']);
        } else {
            // Se nessuna feature è selezionata, rimuoviamo tutte le associazioni
            $bike->features()->detach();
        }

        return redirect()->route('admin.bikes.index')->with('message', 'Bici modificata con successo');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bike $bike)
    {
        $bike->delete();
        return redirect()->route('admin.bikes.index')->with('message', 'Bici eliminata con successo');
    }
}
