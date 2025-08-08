<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Página inicial de filmes</title>
</head>
<body>
    <header>
        <a href="{{route('filmes')}}">🏚</a>
    </header>
    <div class="filtros">
        <a href="#">Todos</a>
        <a href="#">Por ano</a>
        <a href="#">Por categoria</a>
    </div>
    <div class="filmes">
        <ul>
            @foreach ($filmes as $filme)
                <li><img src="{{$filme->imagem}}" alt="" style="width: 100px"></li>
                <li><a href="{{route('filmes.verMais', $filme->id)}}">Ver mais</a></li>
            @endforeach
        </ul>
    </div>
</body>
</html>
