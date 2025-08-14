@extends('layouts.app')

@section('title', 'Lista de Filmes')

@section('content')
    <div class="flex items-center gap-5">
        <p class="font-bold text-2xl">Meus Favoritos <span class="italic text-[#6100FF] text-4xl">!</span></p>
    </div>


    @if ($filmesFavoritos->isNotEmpty())
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-12 mt-10 rounded-lg">
            @foreach ($filmesFavoritos as $fav)
                <a href="{{ route('filmes.verMais', $fav->id) }}">
                    <div class="relative rounded-lg shadow-xl overflow-hidden flex flex-col hover:scale-105 transition">
                        <img src="{{ asset($fav->imagem) }}" alt="{{ $fav->nome }}" class="w-full object-cover bg-gray-200">
                        <div
                            class="text-white absolute bottom-0 p-4 pt-12 flex flex-col w-full bg-gradient-to-t from-black via-black/70 to-transparent">
                            <div class="flex justify-between">
                                <div>
                                    <h3 class="text-xl font-bold">{{ $fav->nome }}</h3>
                                    <p class="text-sm font-semibold">{{ $fav->ano }}</p>
                                </div>
                                <form action="{{route('filmes.favoritar', $fav->id)}}" method="post">
                                    @csrf
                                    <button type="submit"
                                        class="flex items-center justify-center w-8 h-8 rounded-full hover:bg-black/60 transition-colors">
                                        @php
                                            $isFavorito = auth()->user()->favoritos->contains($fav->id);
                                        @endphp
                                        <x-hero-icon name="heart"
                                            class="w-6 h-6 text-[#6100FF] {{ $isFavorito ? 'fill-[#6100FF]' : 'fill-none' }} hover:fill-[#6100FF] transition-colors duration-300" />
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    @else
        <div class="text-center py-20 text-gray-400">
            <x-hero-icon name="heart" class="w-12 h-12 mx-auto" />
            <p class="text-lg">Nenhum filme favoritado.</p>
            <p class="text-sm text-gray-500 mt-2">Tente favoritar seu preferidos.</p>
        </div>

    @endif
@endsection