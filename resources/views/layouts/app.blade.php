<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>@yield('title') - Filmax</title>
</head>

<body>
    <div class="flex min-h-screen">
        <header class="bg-[#0F0021] h-screen w-40 flex items-center justify-center fixed flex-col">
            <h1 class="text-2xl font-bold text-center mt-6 mb-6 text-white italic">
                FIL<span class="text-[#6000FD] text-3xl">MAX</span>
            </h1>
            <nav class="flex flex-col text-white space-y-10 flex-grow justify-center w-full px-6">

                <a href="{{ route('filmes') }}"
                    class="flex items-center hover:text-[#6000FD] hover:scale-107 transition">
                    <x-hero-icon name="user" class="w-5 h-5 mr-2" />
                    Perfil
                </a>

                <a href="{{ route('filmes') }}"
                    class="flex items-center hover:text-[#6000FD] hover:scale-107 transition">
                    <x-hero-icon name="film" class="w-5 h-5 mr-2" />
                    Filmes
                </a>

                @can('acesso-admin')
                    <a href="{{ route('categorias') }}"
                        class="flex items-center hover:text-[#6000FD] hover:scale-107 transition">
                        <x-hero-icon name="categories" class="w-5 h-5 mr-2" />
                        Categorias
                    </a>
                @endcan

                <a href="{{ route('logout') }}" class="flex items-center hover:text-red-500 hover:scale-107 transition">
                    <x-hero-icon name="logout" class="w-5 h-5 mr-2" />
                    Logout
                </a>
            </nav>
        </header>

        <main class="flex-1 bg-[#1E0F2C] p-8 text-white ml-40 min-h-screen h-full">
            @yield('content')
        </main>

    </div>

    <footer>

    </footer>
</body>

</html>