@extends('layouts.app')

@section('title', 'Cadastrar categorias')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="flex items-center gap-5">
        <a href="{{route('categorias')}}"
            class="flex border-2 border-[#6100FF] hover:bg-[#6100FF] px-4 py-2 w-fit rounded-full transition items-center">
            <x-hero-icon name="arrow-left" class="w-5 h-5 mr-2" />Voltar</a>
                <p class="font-bold text-2xl">
            @if (isset($categoria))
                Editar categoria
            @else
                Cadastrar categoria
            @endif
        </p>
    </div>
    <div class="w-full h-full justify-center items-center flex mt-6">
        <form class="bg-[#1E0F2C] w-full max-w-md p-8 rounded-2xl shadow-2xl text-white border-2 border-white space-y-3"
            action="{{ isset($categoria) ? route('categorias.update', $categoria->id) : route('categorias.store') }}"
            method="POST" enctype="multipart/form-data">
            @csrf
            @if (isset($categoria))
                @method('PUT')
            @endif

            <label for="nome" class="block font-medium">Nome:</label>
            <input class="w-full px-4 py-2 rounded-lg bg-[#2B1A3D] focus:outline-none focus:ring-2 focus:ring-[#6000FD]"
                type="text" id="nome" name="nome" value="{{ isset($categoria) ? $categoria->nome : '' }}">

            <button class="w-full bg-[#6000FD] hover:bg-[#4700ba] text-white py-2 rounded-lg font-semibold transition"
                type="submit">{{ isset($categoria) ? 'Atualizar' : 'Cadastrar' }}</button>
        </form>
    </div>
@endsection