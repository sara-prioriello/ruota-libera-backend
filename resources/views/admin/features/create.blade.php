@extends('layouts.app')
@section('content')
    <h1>Crea una nuova caratteristica:</h1>
    <form action="{{ route('admin.features.store') }}" method='POST' >
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <button type="submit" class="btn btn-primary">Crea Caratteristica</button>
    </form>
@endsection