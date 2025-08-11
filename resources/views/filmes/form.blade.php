@extends('layouts.app')

@section('title', 'Cadastrar filmes')

@section('content')

    <a href="{{route('filmes')}}"><x-hero-icon name="arrow-left" class="w-5 h-5 mr-2" />Voltar</a>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ isset($filme) ? route('filmes.update', $filme->id) : route('filmes.store') }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        @if (isset($filme))
            @method('PUT')
        @endif

        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" value="{{ isset($filme) ? $filme->nome : '' }}">

        <label for="sinopse">Sinopse:</label>
        <textarea id="sinopse" name="sinopse">{{ isset($filme) ? $filme->sinopse : '' }}</textarea>

        <label for="ano">Ano:</label>
        <input type="number" id="ano" name="ano" value="{{ isset($filme) ? $filme->ano : '' }}">

        <label for="imagem">Imagem:</label>
        @if (isset($filme) && $filme->imagem)
            <div style="margin-bottom: 10px;">
                <p>Imagem atual:</p>
                <img src="{{ asset('storage/' . $filme->imagem) }}" alt="Imagem do filme" width="150">
            </div>
        @endif
        <input type="file" id="imagem" name="imagem">

        <br>
        @foreach ($categorias as $cat)
            <input type="checkbox" name="categorias[]" id="" value="{{$cat->id}}" {{ isset($filme) && $filme->categorias->contains($cat->id) ? 'checked' : '' }}>
            <label for="">{{$cat->nome}}</label>
        @endforeach
        <br>

        <label for="link">Link:</label>
        <input type="text" id="link" name="link" value="{{ isset($filme) ? $filme->link : '' }}">


        <div class="col-12">
            <button type="submit">{{ isset($filme) ? 'Atualizar' : 'Cadastrar' }}</button>
        </div>
    </form>
@endsection