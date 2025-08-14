@extends('layouts.app')

@section('title', 'Lista de Filmes')

@section('content')
    <div class="flex items-center gap-5">
        <p class="font-bold text-2xl">Meu Perfil <span class="italic text-[#6100FF] text-4xl">!</span></p>
    </div>

    <div class="flex mt-6 gap-10">
        <div>
            <div class="w-64 h-64 bg-gray-300 rounded-full flex items-center justify-center">
                <x-hero-icon name="user" class="w-20 h-20 text-gray-600" />
            </div>
        </div>
        <div class="flex-1 text-white space-y-5">
            <div class="flex gap-5 items-center">
                <h1 class="font-bold text-4xl">{{$user->name}}</h1>
            </div>
            <div>
                <p class="font-semibold text-xl mb-1">Email</p>
                <p>{{$user->email}}</p>
            </div>
            <div>
                <p class="font-semibold text-xl mb-1">Favoritos</p>
                <p>{{count($user->favoritos)}} filmes favoritados</p>
            </div>
            <div>
                <p class="font-semibold text-xl mb-1">Plano</p>
                <p>Você possui o plano <span class="italic text-[#6100FF] font-bold">MAX!</span></p>
            </div>
        </div>
    </div>
@endsection