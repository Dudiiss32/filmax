@extends('layouts.app')

@section('title', 'Cadastrar filmes')

@section('content')


    <div class="flex items-center gap-5">
        <a href="{{route('filmes')}}"
            class="flex border-2 border-[#6100FF] hover:bg-[#6100FF] px-4 py-2 w-fit rounded-full transition items-center">
            <x-hero-icon name="arrow-left" class="w-5 h-5 mr-2" />Voltar</a>
        <p class="font-bold text-2xl">
            @if (isset($filme))
                Editar filme
            @else
                Cadastrar filme
            @endif
        </p>
    </div>

    <div class="w-full h-full justify-center items-center flex mt-6">
        <form action="{{ isset($filme) ? route('filmes.update', $filme->id) : route('filmes.store') }}" method="POST"
            enctype="multipart/form-data"
            class="bg-[#1E0F2C] w-full max-w-xl p-8 rounded-2xl shadow-2xl text-white border-2 border-white gap-4 flex flex-col">
            @csrf
            @if (isset($filme))
                @method('PUT')
            @endif

            <label for="nome" class=" mb-1 font-medium">Nome:</label>
            <input type="text" id="nome" name="nome" value="{{ old('nome', isset($filme) ? $filme->nome : '') }}"
                class="w-full px-4 py-2 rounded-lg bg-[#2B1A3D] focus:outline-none focus:ring-2 focus:ring-[#6000FD]">

            <label for="sinopse" class="mb-1 font-medium">Sinopse:</label>
            <textarea id="sinopse" name="sinopse" rows="5"
                class="w-full px-4 py-2 rounded-lg bg-[#2B1A3D] focus:outline-none focus:ring-2 focus:ring-[#6000FD]">{{old('sinopse', isset($filme) ? $filme->sinopse : '')}}</textarea>

            <label for="ano" class="mb-1 font-medium">Ano:</label>
            <input type="number" id="ano" name="ano" value="{{old('ano', isset($filme) ? $filme->ano : '')}}"
                class="w-full px-4 py-2 rounded-lg bg-[#2B1A3D] focus:outline-none focus:ring-2 focus:ring-[#6000FD]">

            <label for="imagem" class="mb-1 font-medium">Imagem:</label>

            <div class="flex items-center gap-10">

                <img id="preview-imagem" src="{{ isset($filme) && $filme->imagem ? asset($filme->imagem) : '' }}"
                    alt="Pré-visualização"
                    class="w-36 h-36 rounded-xl {{ isset($filme) && $filme->imagem ? '' : 'hidden' }}" />

                <div id="icone-imagem"
                    class="w-36 h-36 bg-gray-300 rounded-xl flex justify-center items-center {{ isset($filme) && $filme->imagem ? 'hidden' : '' }}">
                    <x-hero-icon name="image" class="w-12 h-12 text-gray-600" />
                </div>
                <label for="imagem"
                    class="text-center inline-block cursor-pointer bg-[#6100FF] text-white py-2 w-40 px-4 rounded-full hover:bg-[#4700ba] transition">
                    Escolher arquivo
                </label>
                <input type="file" id="imagem" name="imagem" class="hidden" accept="image/*" />
            </div>

            <p class=" mb-1 font-medium">Categorias:</label>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                @foreach ($categorias as $cat)
                    <div class="flex items-center space-x-2">
                        <input type="checkbox" name="categorias[]" id="cat-{{$cat->id}}" value="{{$cat->id}}" {{ in_array($cat->id, old('categorias', isset($filme) ? $filme->categorias->pluck('id')->toArray() : [])) ? 'checked' : '' }}>
                        <label for="cat-{{$cat->id}}" class="font-medium">{{$cat->nome}}</label>
                    </div>
                @endforeach
            </div>


            <label for="link" class="block mb-1 font-medium">Link:</label>
            <input type="text" id="link" name="link" value="{{ old('link', isset($filme) ? $filme->link : '')}}"
                class="w-full px-4 py-2 rounded-lg bg-[#2B1A3D] focus:outline-none focus:ring-2 focus:ring-[#6000FD]">

            <button type="submit"
                class="w-full bg-[#6000FD] hover:bg-[#4700ba] text-white py-2 rounded-lg font-semibold transition">{{ isset($filme) ? 'Atualizar' : 'Cadastrar' }}</button>

        </form>
    </div>

    <script>
        const inputImagem = document.getElementById('imagem');
        const previewImagem = document.getElementById('preview-imagem');
        const iconeImagem = document.getElementById('icone-imagem');

        inputImagem.addEventListener('change', function () {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();

                reader.onload = function (e) {
                    previewImagem.src = e.target.result;
                    previewImagem.classList.remove('hidden');
                    iconeImagem.classList.add('hidden');
                }

                reader.readAsDataURL(file);
            } else {
                previewImagem.src = '';
                previewImagem.classList.add('hidden');
                iconeImagem.classList.remove('hidden');
            }
        });
    </script>
@endsection