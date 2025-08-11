@extends('layouts.app')

@section('title', 'Cadastrar categorias')

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ isset($categoria) ? route('categorias.update', $categoria->id) : route('categorias.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if (isset($categoria))
        @method('PUT')
    @endif

    <label for="nome">Nome:</label>
    <input type="text" id="nome" name="nome" value="{{ isset($categoria) ? $categoria->nome : '' }}">

    <div class="col-12">
        <button type="submit">{{ isset($categoria) ? 'Atualizar' : 'Cadastrar' }}</button>
    </div>
</form>
@endsection
