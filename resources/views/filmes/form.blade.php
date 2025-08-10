<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Página inicial de filmes</title>
</head>

<body>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ isset($filme) ? route('filmes.update', $filme->id) : route('filmes.store') }}" method="POST">
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

        <label for="imagem">Imagem (URL):</label>
        <input type="text" id="imagem" name="imagem" value="{{ isset($filme) ? $filme->imagem : '' }}">

        <label for="link">Link:</label>
        <input type="text" id="link" name="link" value="{{ isset($filme) ? $filme->link : '' }}">


        <div class="col-12">
            <button type="submit">{{ isset($filme) ? 'Atualizar' : 'Cadastrar' }}</button>
        </div>
    </form>
</body>

</html>
