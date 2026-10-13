@extends('layouts.app')
@section('content')

<h1>Caratteristiche:</h1>

<a href="{{ route('admin.features.create') }}" class="btn btn-sm btn-primary">Crea Nuova Caratteristica</a>

<table class="table" >
    <thead>
        <tr>
            <th scope="col">Nome</th>
            <th scope="col">Azioni</th>
        </tr>
    </thead>
    <tbody>
         @foreach ($features as $feature)
            <tr>
                <td>{{ $feature->name }}</td>
                <td>
                    
                    <a class="btn btn-sm btn-primary" href="{{ route('admin.features.show', $feature) }}">Visualizza</a>
                    <a href="{{ route('admin.features.edit', $feature) }}" class="btn btn-sm btn-warning">Modifica</a>
                    <form action="{{ route('admin.features.destroy', $feature) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Sei sicuro di voler eliminare questa feature?')">Elimina</button>
                    </form>
                </td>
            </tr>
         @endforeach
    </tbody>
    
           
  
</table>
    

@endsection
