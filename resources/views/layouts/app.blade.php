<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <x-embed-styles />
    <title>@yield('title') - Filmax</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="select-none">
    @if($errors->any())
        <script>
            @foreach($errors->all() as $error)
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'error',
                    title: @json($error),
                    showConfirmButton: false,
                    timer: 3000
                });
            @endforeach
        </script>
    @endif
    <div class="flex min-h-screen select-none">
        <header class="bg-[#0F0021] h-screen w-40 flex items-center justify-center fixed flex-col select-none">
            <h1 class="text-2xl font-bold text-center mt-6 mb-6 text-white italic select-none">
                FIL<span class="text-[#6000FD] text-3xl">MAX</span>
            </h1>
            <nav class="flex flex-col text-white space-y-10 flex-grow justify-center w-full px-6 select-none">

                <a href="{{ route('perfil') }}"
                    class="flex items-center hover:text-[#6000FD] hover:scale-107 transition">
                    <x-hero-icon name="user" class="w-5 h-5 mr-2" />
                    Perfil
                </a>

                <a href="{{ route('filmes.favoritos') }}"
                    class="flex items-center hover:text-[#6000FD] hover:scale-107 transition">
                    <x-hero-icon name="user" class="w-5 h-5 mr-2" />
                    Favoritos
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

        <main class="flex-1 bg-[#1E0F2C] p-8 text-white ml-40 min-h-screen h-full select-none">
            <!-- Teste: este texto não deve ser selecionável -->
            @yield('content')
        </main>
</body>

</html>