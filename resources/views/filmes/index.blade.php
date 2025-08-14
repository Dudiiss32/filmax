@extends('layouts.app')

@section('title', 'Lista de Filmes')

@section('content')
    <div class="flex gap-5 items-center">
        @can('acesso-admin')
            <a href="{{route('filmes.form')}}"
                class="flex items-center w-fit py-2 px-4 rounded-full bg-[#6100FF] hover:bg-[#4700ba]">
                <x-hero-icon name="plus" class="w-5 h-5 mr-2" />Adicionar filme</a>
        @endcan
        <div>
            <p class="font-bold text-2xl">Explorar Filmes <span class="italic text-[#6100FF] text-4xl">!</span></p>
        </div>
    </div>
    <div class="flex flex-col gap-3 mt-6">

        <div class="flex flex-row gap-5 items-center">
            <a href="{{ route('filmes') }}"
                class="flex items-center w-fit py-2 px-4 rounded-full bg-[#6100FF] hover:bg-[#4700ba]">
                Todos os Filmes
            </a>
            <form method="GET" action="{{ route('filmes') }}" class="flex items-center gap-2">
                <label for="ano" class=" mb-1 font-medium">Ano:</label>
                <input type="number" name="ano" value="{{ request('ano') }}" placeholder="Ex: 2024"
                    class="w-40 px-4 py-2 rounded-lg bg-[#2B1A3D] focus:outline-none focus:ring-2 focus:ring-[#6000FD]">

                <label for="categoria_id" class=" mb-1 font-medium">Categoria:</label>
                <select name="categoria_id"
                    class="w-40 px-4 py-2 rounded-lg bg-[#2B1A3D] text-white cursor-pointer focus:outline-none focus:ring-2 focus:ring-[#6000FD] transition disabled:opacity-50">
                    <option value="">Todas</option>
                    @foreach($categorias as $categoria)
                        <option value="{{ $categoria->id }}" {{ request('categoria_id') == $categoria->id ? 'selected' : '' }}>
                            {{ $categoria->nome }}
                        </option>
                    @endforeach
                </select>

                <button type="submit"
                    class="ml-4 flex items-center w-fit py-2 px-4 rounded-full bg-[#6100FF] hover:bg-[#4700ba]"><x-hero-icon
                        name="search" class="w-5 h-5 mr-2" />Filtrar</button>
            </form>
        </div>

    </div>
    @if ($filmes->isNotEmpty())
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-12 mt-10 rounded-lg">
            @foreach ($filmes as $filme)
                <a href="{{ route('filmes.verMais', $filme->id) }}">
                    <div class="relative rounded-lg shadow-xl overflow-hidden flex flex-col hover:scale-105 transition">
                        <div class="absolute top-2 left-2 flex flex-row">
                            <div class="flex flex-wrap gap-2">
                                @foreach ($filme->categorias as $categoria)
                                    <p class="text-white bg-[#1E0F2C] border-2 border-[#6100FF] rounded-full px-2 py-1 w-fit shadow-2xl">{{ $categoria->nome }}
                                    </p>
                                @endforeach
                            </div>
                        </div>
                        <img src="{{ asset($filme->imagem) }}" alt="{{ $filme->nome }}" class="w-full object-cover bg-gray-200">
                        <div
                            class="text-white absolute bottom-0 p-4 pt-12 flex flex-col w-full bg-gradient-to-t from-black via-black/70 to-transparent">
                            <div class="flex justify-between">
                                <div>
                                    <h3 class="text-xl font-bold">{{ $filme->nome }}</h3>
                                    <p class="text-sm font-semibold">{{ $filme->ano }}</p>
                                </div>
                                <form action="{{route('filmes.favoritar', $filme->id)}}" method="post">
                                    @csrf
                                    <button type="submit"
                                        class="flex items-center justify-center w-8 h-8 rounded-full hover:bg-black/60 transition-colors">
                                        @php
                                            $isFavorito = auth()->user()->favoritos->contains($filme->id);
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
            <x-hero-icon name="tape" class="w-12 h-12 mx-auto" />
            <p class="text-lg">Nenhum filme encontrado para a pesquisa.</p>
            <p class="text-sm text-gray-500 mt-2">Tente usar outros filtros.</p>
        </div>
    @endif


@endsection