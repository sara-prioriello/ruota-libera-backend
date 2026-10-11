@extends('layouts.app');
@section('content')
    <h1>Crea una nuova bici</h1>
    <form action="{{ route('admin.bikes.store') }}" method='POST' >
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="brand_id" class="form-label">Brand</label>
            <select class="form-select" id="brand_id" name="brand_id">
                <option value="">Seleziona un brand</option>
                @foreach ($brands as $brand)
                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="category_id" class="form-label">Categoria</label>
            <select class="form-select" id="category_id" name="category_id">
                <option value="">Seleziona una categoria</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="year" class="form-label">Anno</label>
            <input type="number" class="form-control" id="year" name="year" required>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Prezzo</label>
            <input type="number" class="form-control" id="price" name="price" step="0.01" required>
        </div>
        <div class="mb-3">
            <label for="weight" class="form-label">Peso</label>
            <input type="number" class="form-control" id="weight" name="weight" step="0.01" required>
        </div>
        <div class="mb-3">
            <label for="frame_material" class="form-label">Materiale Telaio</label>
            <input type="text" class="form-control" id="frame_material" name="frame_material">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Caratteristiche</label>
            @foreach ($features as $feature)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="features[]" value="{{ $feature->id }}" id="feature{{ $feature->id }}">
                    <label class="form-check-label" for="feature{{ $feature->id }}">
                        {{ $feature->name }}
                    </label>
                </div>
            @endforeach

        </div>
        <button type="submit" class="btn btn-primary">Crea Bici</button>
    </form>
@endsection