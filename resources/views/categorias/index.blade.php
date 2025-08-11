@extends('layouts.app')

@section('title', 'Lista de categorias')

@section('content')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <a href="{{route('filmes')}}">Voltar</a>
    <a href="{{route('categorias.form')}}">Nova categoria</a>
    <div class="categorias">
        <ul>
            @foreach ($categorias as $cat)
                <li>{{$cat->nome}}</li>
                <a href="{{ route('categorias.edit', $cat->id) }}">Editar</a>
                <form action="{{ route('categorias.delete', $cat->id) }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Excluir</button>
                </form>
            @endforeach
        </ul>
    </div>
@endsection