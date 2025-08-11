@extends('layouts.app')

@section('title', 'Ver mais')

@section('content')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <a href="{{route('filmes')}}">Voltar</a>
    <ul>
        <li>{{ $filme->nome }}</li>
        <li><img src="{{asset('storage/'. $filme->imagem)}}" alt="{{$filme->nome}}" style="width: 500px"></li>
        <li>{{ $filme->sinopse }}</li>
        <li>{{ $filme->ano }}</li>
        <li>{{ $filme->link }}</li>
        <li>
            @foreach ($filme->categorias as $categoria)
                {{$categoria->nome}}
            @endforeach
        </li>
    </ul>
    @can('acesso-admin')
        <a href="{{ route('filmes.edit', $filme->id) }}">Editar</a>
        <form action="{{ route('filmes.delete', $filme->id) }}" method="POST" style="display:inline">
            @csrf
            @method('DELETE')
            <button type="submit">Excluir</button>
        </form>
    @endcan
@endsection
