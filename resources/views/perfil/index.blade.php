@extends('layouts.app')

@section('title', 'Lista de Filmes')

@section('content')
    <div>
        Nome: {{$user->name}}
        E-mail: {{$user->email}}
        Favoritos: 
    </div>
@endsection