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
    <div  class="flex items-center gap-5">
        <a href="{{route('filmes')}}" class="flex border-2 border-[#6100FF] hover:bg-[#6100FF] px-4 py-2 w-fit rounded-full transition items-center">
        <x-hero-icon name="arrow-left" class="w-5 h-5 mr-2" />Voltar</a>
        <p class="font-bold text-2xl">Ver mais</p>
    </div>
        
    <div class="flex flex-col gap-5">
        {{ $filme->nome }}
        <img src="{{asset('storage/'. $filme->imagem)}}" alt="{{$filme->nome}}" style="width: 500px">
        <p>Sinopse: {{ $filme->sinopse }}</p>
        <p>Data de lançamento: {{ $filme->ano }}</p>
        <p>Link para trailer: <a href="{{$filme->link}}" class="underline hover:text-indigo-700 transition">{{$filme->link}}</a></p>
        <p>Categorias: 
            @foreach ($filme->categorias as $categoria)
                {{$categoria->nome}}
            @endforeach</p>

        @can('acesso-admin')
            <div class="flex flex-row gap-2">
                <a href="{{ route('filmes.edit', $filme->id) }} " class="text-yellow-500 hover:text-yellow-600"><x-hero-icon name="pencil" class="w-5 h-5" /></a>
                <form action="{{ route('filmes.delete', $filme->id) }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-500 hover:text-red-600 cursor-pointer"> <x-hero-icon name="trash" class="w-5 h-5" /></button>
                </form>
            </div>
        @endcan
    </div>
        
 
   
@endsection
