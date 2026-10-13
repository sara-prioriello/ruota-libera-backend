@extends('layouts.app')
@section('content')

<h1>Brand</h1>

<a href="{{ route('admin.brands.create') }}" class="btn btn-sm btn-primary">Crea Nuovo Brand</a>
{{-- creiamo la tabella per stampare i brand --}}
<table class="table" >
    <thead>
        <tr>
            <th scope="col">Logo</th>
            <th scope="col">Nome</th>
            <th scope="col">Paese</th>
            <th scope="col">Anno di Fondazione</th>
            <th scope="col">Descrizione</th>
            <th scope="col">Azioni</th>
        </tr>
    </thead>
    <tbody>
         @foreach ($brands as $brand)
            <tr>
                <td>
                    @if ($brand->logo)
                        <img src="{{ asset('storage/' . $brand->logo) }}" alt="{{ $brand->name }}" style="max-width: 100px;">
                    @endif
                </td>
                <td>{{ $brand->name }}</td>
                <td>{{ $brand->country }}</td>
                <td>{{ $brand->founded_year }}</td>
                <td>{{ $brand->description }}</td>
                <td><a class="btn btn-sm btn-primary" href="{{ route('admin.brands.show', $brand) }}">Visualizza</a>
                    <a class="btn btn-sm btn-warning" href="{{ route('admin.brands.edit', $brand) }}">Modifica</a>
                    <form action="{{ route('admin.brands.destroy', $brand) }}" method="POST" class="d-inline" onsubmit="return confirm('Sei sicuro di voler eliminare questo brand?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Elimina</button>
                    </form>
                </td>
            </tr>
         @endforeach
    </tbody>
           
  
</table>
    

@endsection
