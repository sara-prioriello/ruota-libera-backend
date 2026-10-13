@extends('layouts.app')



@section('content')
    <h1>Caratteristica: </h1>
    <p>{{ $feature->name }}</p>
    <a class="btn btn-primary" href="{{ route('admin.features.index') }}">Torna alla lista delle caratteristiche:</a>

    <h2>Bici con questa caratteristica</h2>
    <ul>
        
        @forelse ($feature->bikes as $bike)
            <li>{{ $bike->name }}</li>
        @empty
            <li>Nessuna bici con questa caratteristica</li>
        @endforelse
    </ul>
     
    
@endsection