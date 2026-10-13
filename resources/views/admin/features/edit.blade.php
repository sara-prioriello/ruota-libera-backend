@extends('layouts.app')
@section('content')
    <h1>Modifica Caratteristica</h1>
    <form action="{{ route('admin.features.update', $feature) }}" method='POST' >
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" class="form-control" id="name" name="name" value = "{{$feature->name }}" required>
        </div>
      
        <button type="submit" class="btn btn-primary">Modifica Caratteristica</button>
    </form>
@endsection