@extends('layouts.app')



@section('content')
    <h1>Bici: {{ $bike->name }}</h1>
    @if ($bike->image)
        <img src="{{ asset('storage/' . $bike->image) }}" alt="{{ $bike->name }}" style="max-width: 300px;">
    @endif
    <p>Nome: {{ $bike->name }}</p>
    <p>Brand: {{ $bike->brand?->name ?? 'Nessun brand' }}</p>
    <p>Categoria: {{ $bike->category?->name ?? 'Nessuna categoria' }}</p>
    <p>Anno: {{ $bike->year }}</p>
    <p>Prezzo: {{ $bike->price }}</p>
    <p>Peso: {{ $bike->weight }}</p>
    <p>Telaio: {{ $bike->frame_material }}</p>
    <p>Descrizione: {{ $bike->description }}</p>

    <h2>Caratteristiche:</h2>
    <ul>
        @forelse ($bike->features as $feature)
            <li>{{ $feature->name }}</li>
        @empty
            <li>Nessuna caratteristica associata a questa bici</li>
        @endforelse
    </ul>
    <a class="btn btn-primary" href="{{ route('admin.bikes.index') }}">Torna alla lista delle bici</a>

    
     
    
@endsection