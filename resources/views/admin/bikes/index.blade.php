@extends('layouts.app')
@section('content')

<h1>Bici</h1>

<a href="{{ route('admin.bikes.create') }}" class="btn btn-sm btn-primary">Crea Nuova Bici</a>
{{-- creiamo la tabella per stampare le categorie con il loro nome, colore associato e descrizione --}}
<table class="table" >
    <thead>
        <tr>
            <th scope="col">Immagine</th>
            <th scope="col">Nome</th>
            <th scope="col">Brand</th>
            <th scope="col">Categoria</th>
            <th scope="col">Anno</th>
            <th scope="col">Prezzo</th>
            <th scope="col">Peso</th>
            <th scope="col">Telaio</th>
            <th scope="col">Descrizione</th>
            <th scope="col">Azioni</th>
        </tr>
    </thead>
    <tbody>
         @foreach ($bikes as $bike)
            <tr>
                <td>
                    @if ($bike->image)
                        <img src="{{ asset('storage/' . $bike->image) }}" alt="{{ $bike->name }}" style="max-width: 100px;">
                    @endif
                </td>
                <td>{{ $bike->name }}</td>
                <td>{{ $bike->brand?->name ?? 'Nessun brand'  }}</td>
                <td>{{ $bike->category?->name ?? 'Nessuna categoria'}}</td>
                <td>{{ $bike->year }}</td>
                <td>{{ $bike->price }}</td>
                <td>{{ $bike->weight }}</td>
                <td>{{ $bike->frame_material }}</td>
                <td>{{ $bike->description }}</td>
                
                <td>
                    
                     <a class="btn btn-sm btn-primary" href="{{ route('admin.bikes.show', $bike) }}">Visualizza</a>
                    <a href="{{ route('admin.bikes.edit', $bike) }}" class="btn btn-sm btn-warning">Modifica</a>
                    <form action="{{ route('admin.bikes.destroy', $bike) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Sei sicuro di voler eliminare questa bici?')">Elimina</button>
                    </form>
                </td>
            </tr>
         @endforeach
    </tbody>
      
           
  
</table>
    

@endsection
