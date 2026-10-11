<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //prendiamo tutte le categorie e le mettiamo in una variabile
        $categories = Category::all();
        //ritorniamo la view con le categorie
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //non serve passare dati
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //inserisco i dati della request in un array
        $data = $request->all();
        //creo una nuova categoria con i dati della request
        $newCategory = new Category();
        $newCategory->name = $data['name'];
        $newCategory->color = $data['color'];
        $newCategory->description = $data['description'];
        $newCategory->save();
        //ritorno alla pagina delle categorie con un messaggio di successo
        return redirect()->route('admin.categories.index')->with('message', 'Categoria creata con successo');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //mostriamo la categoria selezionata
        return view('admin.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $data = $request->all();
        $category->name = $data['name'];
        $category->color = $data['color'];
        $category->description = $data['description'];
        $category->save();
        return redirect()->route('admin.categories.index')->with('message', 'Categoria modificata con successo');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
