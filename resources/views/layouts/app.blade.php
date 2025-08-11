<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title') - Filmax</title>
</head>
<body>
    <header>
        <nav>
            <!-- menu -->
            <a href="{{route('logout')}}">Logout</a>
            <a href="{{route('filmes')}}">Filmes</a>
            @can('acesso-admin')
                <a href="{{route('categorias')}}">Categorias</a>
            @endcan
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

</body>
</html>
