@extends('layouts.app')

@section('title', 'Cadastrar filmes')

@section('content')


    <div  class="flex items-center gap-5">
        <a href="{{route('filmes')}}" class="flex border-2 border-[#6100FF] hover:bg-[#6100FF] px-4 py-2 w-fit rounded-full transition items-center">
        <x-hero-icon name="arrow-left" class="w-5 h-5 mr-2" />Voltar</a>
        <p class="font-bold text-2xl">Cadastrar filme</p>
    </div>
    
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="w-full h-full justify-center items-center flex mt-6">
        <form action="{{ isset($filme) ? route('filmes.update', $filme->id) : route('filmes.store') }}" method="POST"
            enctype="multipart/form-data" class="bg-[#1E0F2C] w-full max-w-xl p-8 rounded-2xl shadow-2xl text-white border-2 border-white gap-4 flex flex-col">
            @csrf
            @if (isset($filme))
                @method('PUT')
            @endif

            <label for="nome" class=" mb-1 font-medium">Nome:</label>
            <input type="text" id="nome" name="nome" value="{{ isset($filme) ? $filme->nome : '' }}" class="w-full px-4 py-2 rounded-lg bg-[#2B1A3D] focus:outline-none focus:ring-2 focus:ring-[#6000FD]">

            <label for="sinopse" class="mb-1 font-medium">Sinopse:</label>
            <textarea id="sinopse" name="sinopse" class="w-full px-4 py-2 rounded-lg bg-[#2B1A3D] focus:outline-none focus:ring-2 focus:ring-[#6000FD]">{{ isset($filme) ? $filme->sinopse : '' }}</textarea>

            <label for="ano" class="mb-1 font-medium">Ano:</label>
            <input type="number" id="ano" name="ano" value="{{ isset($filme) ? $filme->ano : '' }}" class="w-full px-4 py-2 rounded-lg bg-[#2B1A3D] focus:outline-none focus:ring-2 focus:ring-[#6000FD]">

           <label for="imagem" class="mb-1 font-medium">Imagem:</label>

            @if (isset($filme) && $filme->imagem)
                <div class="mb-2">
                    <p>Imagem atual:</p>
                    <img src="{{ asset('storage/' . $filme->imagem) }}" alt="Imagem do filme" width="150">
                </div>
            @endif

            <input type="file" id="imagem" name="imagem" class="hidden" />

            <label for="imagem"
                class="inline-block cursor-pointer bg-[#6100FF] text-white py-2 w-40 px-4 rounded-full hover:bg-[#4700ba] transition">
                Escolher arquivo
            </label>


            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                @foreach ($categorias as $cat)
                    <div class="flex items-center space-x-2">
                        <input type="checkbox" name="categorias[]" id="cat-{{$cat->id}}" value="{{$cat->id}}" {{ isset($filme) && $filme->categorias->contains($cat->id) ? 'checked' : '' }}>
                        <label for="cat-{{$cat->id}}" class="font-medium">{{$cat->nome}}</label>
                    </div>
                @endforeach
            </div>
            

            <label for="link" class="block mb-1 font-medium">Link:</label>
            <input type="text" id="link" name="link" value="{{ isset($filme) ? $filme->link : '' }}" class="w-full px-4 py-2 rounded-lg bg-[#2B1A3D] focus:outline-none focus:ring-2 focus:ring-[#6000FD]">

            <button type="submit" class="w-full bg-[#6000FD] hover:bg-[#4700ba] text-white py-2 rounded-lg font-semibold transition">{{ isset($filme) ? 'Atualizar' : 'Cadastrar' }}</button>
       
        </form>
    </div>
@endsection