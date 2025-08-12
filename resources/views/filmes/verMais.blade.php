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
        <div class="flex items-center gap-5">
            <a href="{{route('filmes')}}"
                class="flex border-2 border-[#6100FF] hover:bg-[#6100FF] px-4 py-2 w-fit rounded-full transition items-center">
                <x-hero-icon name="arrow-left" class="w-5 h-5 mr-2" />Voltar</a>
            <p class="font-bold text-2xl">Ver mais</p>
        </div>

        <div class="flex mt-6 gap-10">
            <div class="w-96">
                <img src="{{asset($filme->imagem)}}" alt="{{$filme->nome}}" class="w-96 rounded-xl">
            </div>
            <div class="flex-1 text-white space-y-5">
                <div class="flex gap-10 items-center">
                    <h1 class="font-bold text-4xl">{{ $filme->nome }}</h1>
                    @can('acesso-admin')
                        <div class="flex flex-row gap-2">
                            <a href="{{ route('filmes.edit', $filme->id) }} "
                                class="flex border-2 border-[#6100FF] hover:bg-[#6100FF] px-4 py-2 w-fit rounded-full transition items-center"><x-hero-icon
                                    name="pencil" class="w-5 h-5 mr-2" />Editar</a>
                            <form action="{{ route('filmes.delete', $filme->id) }}" method="POST" onsubmit="return confirm('Excluir este filme?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="flex cursor-pointer border-2 border-[#6100FF] hover:bg-[#6100FF] px-4 py-2 w-fit rounded-full transition items-center">
                                    <x-hero-icon name="trash" class="w-5 h-5 mr-2" />Excluir</button>
                            </form>
                        </div>
                    @endcan
                </div>
                <div>
                    <p class="font-semibold text-xl mb-2">Categorias</p>
                    <div class="flex gap-2">
                        @foreach ($filme->categorias as $categoria)
                            <p class="text-white bg-[#6100FF] rounded-full px-2 py-1 w-fit">{{ $categoria->nome }}</p>
                        @endforeach
                    </div>
                </div>
                <div>
                    <p class="font-semibold text-xl mb-1">Sinopse</p>
                    <p>{{ $filme->sinopse }}</p>
                </div>
                <div>
                    <p class="font-semibold text-xl mb-1">Data de lançamento</p>
                    <p>{{ $filme->ano }}</p>
                </div>
                <div>
                    <p class="font-semibold text-xl mb-1">Link para trailer</p>
                    <a target="_blank" href="{{$filme->link}}" class="underline hover:text-indigo-700 transition">{{$filme->link}}</a></p>
                </div>
            </div>
        </div>



@endsection