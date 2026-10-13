@extends('layouts.app')



@section('content')
    <h1>Brand: {{ $brand->name }}</h1>
    @if ($brand->logo)
        <img src="{{ asset('storage/' . $brand->logo) }}" alt="{{ $brand->name }}" style="max-width: 300px;">
    @endif
    <p>Paese: {{ $brand->country }}</p>
    <p>Anno di Fondazione: {{ $brand->founded_year }}</p>
    <p>Descrizione: {{ $brand->description }}</p>

    <a class="btn btn-primary" href="{{ route('admin.bikes.index') }}">Torna alla lista delle bici</a>

    
     
    
@endsection