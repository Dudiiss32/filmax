<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <ul>
        <li>{{ $filme->nome }}</li>
        <li>{{ $filme->imagem }}</li>
        <li>{{ $filme->sinopse }}</li>
        <li>{{ $filme->ano }}</li>
        <li>{{ $filme->link }}</li>
    </ul>
    @if (Auth::check() && Auth::user()->isAdmin)
        <a href="{{ route('filmes.edit', $filme->id) }}">Editar</a>
        <form action="{{ route('filmes.delete', $filme->id) }}" method="POST" style="display:inline">
            @csrf
            @method('DELETE')
            <button type="submit">Excluir</button>
        </form>
    @endif
</body>

</html>
