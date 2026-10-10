@extends('layouts.app')
@section('content')

<h1>Categorie</h1>

<a href="{{ route('admin.categories.create') }}" class="btn btn-sm btn-primary">Crea Nuova Categoria</a>
{{-- creiamo la tabella per stampare le categorie con il loro nome, colore associato e descrizione --}}
<table class="table" >
    <thead>
        <tr>
            <th scope="col">Nome</th>
            <th scope="col">Colore</th>
            <th scope="col">Descrizione</th>
            <th scope="col">Azioni</th>
        </tr>
    </thead>
    <tbody>
         @foreach ($categories as $category)
            <tr>
                <td>{{ $category->name }}</td>
                <td><span class="d-inline-block rounded" style="background-color: {{ $category->color }};width: 24px; height: 24px;"></span></td>
                <td>{{ $category->description }}</td>
                <td><a class="btn btn-sm btn-primary" href="{{ route('admin.categories.show', $category) }}">Visualizza</a></td>
            </tr>
         @endforeach
    </tbody>
           
  
</table>
    

@endsection
