@extends('layouts.app')
@section('content')
    <h1>Modifica bici</h1>
    <form action="{{ route('admin.bikes.update', $bike->id) }}" method='POST' >
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" class="form-control" id="name" name="name" value = "{{$bike->name}}" required>
        </div>
        <div class="mb-3">
            <label for="brand_id" class="form-label">Brand</label>
            <select class="form-select" id="brand_id" name="brand_id"  >
                <option value="">Seleziona un brand</option>
                @foreach ($brands as $brand)
                    <option value = "{{$brand->id}}" {{$bike->brand_id == $brand->id ? 'selected' : ''}}>{{ $brand->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="category_id" class="form-label">Categoria</label>
            <select class="form-select" id="category_id" name="category_id"  >
                <option value="">Seleziona una categoria</option>
                @foreach ($categories as $category)
                    <option value = "{{$category->id}}" {{$bike->category_id == $category->id ? 'selected' : ''}}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="year" class="form-label">Anno</label>
            <input type="number" class="form-control" id="year" name="year" value = "{{$bike->year}}" required>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Prezzo</label>
            <input type="number" class="form-control" id="price" name="price" step="0.01" value = "{{$bike->price}}" required>
        </div>
        <div class="mb-3">
            <label for="weight" class="form-label">Peso</label>
            <input type="number" class="form-control" id="weight" name="weight" step="0.01" value = "{{$bike->weight}}" required>
        </div>
        <div class="mb-3">
            <label for="frame_material" class="form-label">Materiale Telaio</label>
            <input type="text" class="form-control" id="frame_material" name="frame_material" value = "{{$bike->frame_material}}">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea class="form-control" id="description" name="description" rows="3">{{$bike->description}}</textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Caratteristiche</label>
            @foreach ($features as $feature)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="features[]" value="{{ $feature->id }}" id="feature{{ $feature->id }}" {{ $bike->features->contains($feature) ? 'checked' : '' }}>
                    <label class="form-check-label" for="feature{{ $feature->id }}">
                        {{ $feature->name }}
                    </label>
                </div>
            @endforeach

        </div>
        <button type="submit" class="btn btn-primary">Crea Bici</button>
    </form>
@endsection