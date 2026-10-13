<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::all();
        return view('admin.brands.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //creazione di un nuovo brand
        return view('admin.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //salviamo i dati del nuovo brand
        $data = $request->all();
        $newBrand = new Brand();
        $newBrand->name = $data['name'];
        $newBrand->country = $data['country'];
        $newBrand->founded_year = $data['founded_year'];
        $newBrand->description = $data['description'];

        //faccio un controllo sull'immagine
            if(array_key_exists("logo",$data)) {
                // carica l'immagine nello storage 
                $img_url = Storage::putFile("brands", $data['logo']);
                $newBrand->logo = $img_url;
            }

        $newBrand->save();
        return redirect()->route('admin.brands.index')->with('message', 'Brand creato con successo');
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        return view('admin.brands.show', compact('brand'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        return view('admin.brands.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Brand $brand)
    {
        //salviamo i dati modificati del brand
        $data = $request->all();
        $brand->name = $data['name'];
        $brand->country = $data['country'];
        $brand->founded_year = $data['founded_year'];
        $brand->description = $data['description'];
        if(array_key_exists("logo",$data)) {
            // Elimina l'immagine precedente se esiste
            if ($brand->logo) {
                Storage::disk('public')->delete($brand->logo);
            }
             // carica l'immagine nello storage 
            $img_url = Storage::putFile("brands", $data['logo']);
            $brand->logo = $img_url;
        }
        $brand->save();
        return redirect()->route('admin.brands.index')->with('message', 'Brand modificato con successo');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        if($brand->logo){
            Storage::delete($brand->logo);
        }
        $brand->delete();
        return redirect()->route('admin.brands.index')->with('message', 'Brand eliminato con successo');
    }
}
