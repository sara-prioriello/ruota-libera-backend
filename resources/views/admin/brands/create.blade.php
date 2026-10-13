@extends('layouts.app')
@section('content')
    <h1>Crea un nuovo brand</h1>
    <form action="{{ route('admin.brands.store') }}" method='POST' >
        @csrf
        @method('PUT')
        @if ($brand->logo)
            <div class="mb-3">
                <label for="current_logo" class="form-label">Logo attuale</label>
                <div>
                    <img src="{{ asset('storage/' . $brand->logo) }}" alt="{{ $brand->name }}" style="max-width: 200px;">
                </div>
            </div>
        @endif
         <div class="mb-3">
            <label for="logo" class="form-label">Logo</label>
            <input type="file" class="form-control" id="logo" name="logo" >

        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="country" class="form-label">Paese</label>
            <input type="text" class="form-control" id="country" name="country" required>
        </div>
        <div class="mb-3">
            <label for="founded_year" class="form-label">Anno di Fondazione</label>
            <input type="number" class="form-control" id="founded_year" name="founded_year" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Crea Brand</button>
    </form>
@endsection