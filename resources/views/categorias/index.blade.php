@extends('layouts.app')

@section('title', 'Lista de categorias')

@section('content')
    <div>
        <a href="{{route('categorias.form')}}"
            class="flex items-center w-fit py-2 px-4 rounded-full bg-[#6100FF] hover:bg-[#4700ba]"><x-hero-icon name="plus"
                class="w-5 h-5 mr-2" />Nova categoria</a>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 mt-6">
        @foreach ($categorias as $cat)
            <div class="bg-white rounded-full shadow-xl p-4 flex items-center justify-between text-[#6000FD]">
                <p class="font-bold">{{ $cat->nome }}</p>
                <div class="flex gap-3">
                    <a href="{{ route('categorias.edit', $cat->id) }}" class="flex border-2 border-[#6100FF] hover:bg-[#6100FF] p-2 w-fit rounded-full transition items-center cursor-pointer hover:text-white">
                        <x-hero-icon name="pencil" class="w-5 h-5" />
                    </a>
                    <form action="{{ route('categorias.delete', $cat->id) }}" method="POST" onsubmit="return confirm('Excluir esta categoria?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="flex border-2 border-[#6100FF] hover:bg-[#6100FF] p-2 w-fit rounded-full transition items-center cursor-pointer hover:text-white">
                            <x-hero-icon name="trash" class="w-5 h-5" />
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>

@endsection