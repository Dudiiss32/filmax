@extends('layouts.app')

@section('title', 'Lista de Filmes')

@section('content')
    <div>
       
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-12 mt-10 rounded-lg bg-[#1E0F2C]">
            @foreach ($filmesFavoritos as $fav)
                <div class="bg-white rounded-lg shadow-xl overflow-hidden flex flex-col hover:scale-105 transition">
                    <img src="{{ asset($fav->imagem) }}" alt="{{ $fav->nome }}" class="w-full object-cover bg-gray-200">
                    <div class="p-4 flex flex-col flex-grow gap-4">
                        <div class="flex justify-between items-center">
                            <h3 class="text-xl font-bold text-gray-800">{{ $fav->nome }}</h3>
                            <p class="text-lg text-gray-600 font-semibold">{{ $fav->ano }}</p>
                        </div>

                        <div class="flex flex-row justify-between">
                            <div class="flex flex-wrap gap-2">
                                @foreach ($fav->categorias as $categoria)
                                    <p class="text-white bg-[#0F0021] rounded-full px-2 py-1 w-fit">{{ $categoria->nome }}</p>
                                @endforeach
                            </div>
                            <form action="{{route('filmes.favoritar', $fav->id)}}" method="post">
                                @csrf
                                <button type="submit" class="flex items-center justify-center w-8 h-8 rounded-full hover:bg-gray-100 transition-colors">
                                    @php
                                        $isFavorito = auth()->user()->favoritos->contains($fav->id);
                                    @endphp
                                    <x-hero-icon name="heart" class="w-5 h-5 text-red-500 {{ $isFavorito ? 'fill-red-500' : 'fill-none' }} hover:fill-red-500 transition-colors"/>
                                </button>
                            </form>
                        </div>
                        
                        <a href="{{ route('filmes.verMais', $fav->id) }}"
                            class="mt-auto inline-block text-center bg-[#6000FD] hover:bg-[#4700ba] text-white py-2 rounded-full transition">
                            Ver mais
                        </a>
                    </div>
                </div>
       @endforeach
    </div>
@endsection