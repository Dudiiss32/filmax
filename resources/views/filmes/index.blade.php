@extends('layouts.app')

@section('title', 'Lista de Filmes')

@section('content')
    <header>
        @can('acesso-admin')
        <a href="{{route('filmes.form')}}">Adicionar filme</a>
        @endcan
    </header>
    <div class="filtros">
    <h2>Filtrar</h2>
    <a href="{{ route('filmes') }}">
        Todos os Filmes
    </a>
    <form method="GET" action="{{ route('filmes') }}">
        <label for="ano">Ano:</label>
        <input type="number" name="ano" value="{{ request('ano') }}" placeholder="Ex: 2024">

        <label for="categoria_id">Categoria:</label>
        <select name="categoria_id">
            <option value="">Todas</option>
            @foreach($categorias as $categoria)
                <option value="{{ $categoria->id }}" {{ request('categoria_id') == $categoria->id ? 'selected' : '' }}>
                    {{ $categoria->nome }}
                </option>
            @endforeach
        </select>

        <button type="submit">Filtrar</button>
    </form>
</div>
    <div class="filmes">
        <ul>
            @foreach ($filmes as $filme)
                <li><img src="{{asset('storage/'. $filme->imagem)}}" alt="{{$filme->nome}}" style="width: 100px"></li>
                <li><a href="{{route('filmes.verMais', $filme->id)}}">Ver mais</a></li>
            @endforeach
        </ul>
    </div>
@endsection
