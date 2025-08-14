@extends('layouts.app')

@section('title', 'Ver mais')

@section('content')

    <div class="flex items-center gap-5">
        <a href="{{route('filmes')}}"
            class="flex border-2 border-[#6100FF] hover:bg-[#6100FF] px-4 py-2 w-fit rounded-full transition items-center">
            <x-hero-icon name="arrow-left" class="w-5 h-5 mr-2" />Voltar</a>
        <p class="font-bold text-2xl">Ver Mais <span class="italic text-[#6100FF] text-4xl">!</span></p>
    </div>

    <div class="flex mt-6 gap-10">
        <div class="w-96">
            <img src="{{asset($filme->imagem)}}" alt="{{$filme->nome}}" class="w-96 rounded-xl">
        </div>
        <div class="flex-1 text-white space-y-5">
            <div class="flex gap-5 items-center">
                <h1 class="font-bold text-4xl">{{ $filme->nome }}</h1>
                <form action="{{route('filmes.favoritar', $filme->id)}}" method="post">
                    @csrf
                    <button type="submit"
                        class="flex items-center justify-center w-10 h-10 rounded-full hover:bg-black/60 transition-colors">
                        @php
                            $isFavorito = auth()->user()->favoritos->contains($filme->id);
                        @endphp
                        <x-hero-icon name="heart"
                            class="w-8 h-8 text-[#6100FF] {{ $isFavorito ? 'fill-[#6100FF]' : 'fill-none' }} hover:fill-[#6100FF] transition-colors duration-300" />
                    </button>
                </form>
                @can('acesso-admin')
                    <div class="flex flex-row gap-2">
                        <a href="{{ route('filmes.edit', $filme->id) }} "
                            class="flex border-2 border-[#6100FF] hover:bg-[#6100FF] px-4 py-2 w-fit rounded-full transition items-center"><x-hero-icon
                                name="pencil" class="w-5 h-5 mr-2" />Editar</a>
                        <form action="{{ route('filmes.delete', $filme->id) }}" method="POST"
                            onsubmit="return confirm('Excluir este filme?')">
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
        </div>
    </div>
    <div class="mt-10 mb-6 flex flex-col items-center">
        <h2 class="text-3xl font-bold text-center mb-6">Assista ao trailer <span
                class="italic text-[#6100FF] text-4xl">!</span></h2>
        <div class="w-[800px] p-1 bg-[#6100FF] rounded-xl">
            <x-embed url="{{ $filme->link }}" class="w-full h-full" />
        </div>
    </div>


@endsection