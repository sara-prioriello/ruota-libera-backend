@extends('layouts.app')

@section("Title", $category->name)

@section('content')
    <h1>Categoria: {{ $category->name }}</h1>
    <p>Colore: <span class="d-inline-block rounded" style="background-color: {{ $category->color }}; width: 24px; height: 24px;"></span></p>
    <p>Descrizione: {{ $category->description }}</p>
    <a class="btn btn-primary" href="{{ route('admin.categories.index') }}">Torna alla lista delle categorie</a>

    <h2>Bici in questa categoria</h2>
    <ul>
        
        @forelse ($category->bikes as $bike)
            <li>{{ $bike->name }}</li>
        @empty
            <li>Nessuna bici in questa categoria</li>
        @endforelse
    </ul>
     
    
@endsection