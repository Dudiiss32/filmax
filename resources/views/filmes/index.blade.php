@extends('layouts.app')

@section('title', 'Lista de Filmes')

@section('content')
    <header>
        @can('acesso-admin')
        <a href="{{route('filmes.form')}}"  class="flex items-center w-fit py-2 px-4 rounded-full bg-[#6100FF] hover:bg-[#4700ba]">
            <x-hero-icon name="plus" class="w-5 h-5 mr-2" />Adicionar filme</a>
        @endcan
    </header>
    <div class="flex flex-col gap-3">

        <h2 class="font-bold text-3xl">Filtrar</h2>

        <div class="flex flex-row gap-5 items-center">
            <a href="{{ route('filmes') }}" class="w-48 bg-[#6000FD] hover:bg-[#4700ba] text-white p-2 text-center rounded-lg font-semibold transition">
                Todos os Filmes
            </a>
            <form method="GET" action="{{ route('filmes') }}" >
                <label for="ano" class=" mb-1 font-medium">Ano:</label>
                <input type="number" name="ano" value="{{ request('ano') }}" placeholder="Ex: 2024" class="w-40 px-4 py-2 rounded-lg bg-[#2B1A3D] focus:outline-none focus:ring-2 focus:ring-[#6000FD]">

                <label for="categoria_id" class=" mb-1 font-medium">Categoria:</label>
                <select name="categoria_id" class="w-40 px-4 py-2 rounded-lg bg-[#2B1A3D] text-white cursor-pointer focus:outline-none focus:ring-2 focus:ring-[#6000FD] transition disabled:opacity-50">
                    <option value="">Todas</option>
                    @foreach($categorias as $categoria)
                        <option value="{{ $categoria->id }}" {{ request('categoria_id') == $categoria->id ? 'selected' : '' }}>
                            {{ $categoria->nome }}
                        </option>
                    @endforeach
                </select>

                <button type="submit" class="w-48 bg-[#6000FD] hover:bg-[#4700ba] text-white p-2 text-center rounded-lg font-semibold transition">Filtrar</button>
            </form>
        </div>
    
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 mt-6 border-white border-2 p-4 rounded-lg bg-[#1E0F2C]">
    @foreach ($filmes as $filme)
    <div class="bg-white rounded-lg shadow-md overflow-hidden flex flex-col">
        <img src="{{ asset('storage/'. $filme->imagem) }}" alt="{{ $filme->nome }}" class="w-full h-48 object-cover">
        <div class="p-4 flex flex-col flex-grow">
            <h3 class="text-lg font-semibold text-gray-800 mb-2">{{ $filme->nome }}</h3>
            <a href="{{ route('filmes.verMais', $filme->id) }}" 
               class="mt-auto inline-block text-center bg-[#6000FD] hover:bg-[#4700ba] text-white py-2 rounded-md transition">
               Ver mais
            </a>
        </div>
    </div>
    @endforeach
</div>

@endsection
