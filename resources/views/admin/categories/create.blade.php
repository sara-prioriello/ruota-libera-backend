@extends('layouts.app');
@section('content')
    <h1>Crea una nuova categoria</h1>
    <form action="{{ route('admin.categories.store') }}" method='POST' >
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="color" class="form-label">Colore</label>
            <input type="color" class="form-control form-control-color" id="color" name="color" value="#563d7c" title="Scegli un colore">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Crea Categoria</button>
    </form>
@endsection