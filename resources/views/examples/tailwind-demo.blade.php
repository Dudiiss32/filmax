<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tailwind CSS + Heroicons Demo</title>
    @vite(['resources/css/app.css'])
</head>
<body class="bg-gray-100 min-h-screen">
    <!-- Header -->
    <header class="bg-white shadow-sm border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <h1 class="text-xl font-semibold text-blue-500">Filmax</h1>
                </div>
                
                <nav class="hidden md:flex space-x-8">
                    <a href="#" class="text-gray-500 hover:text-gray-900 px-3 py-2 rounded-md text-sm font-medium flex items-center">
                        <x-hero-icon name="home" class="w-4 h-4 mr-2" />
                        Início
                    </a>
                    <a href="#" class="text-gray-500 hover:text-gray-900 px-3 py-2 rounded-md text-sm font-medium flex items-center">
                        <x-hero-icon name="search" class="w-4 h-4 mr-2" />
                        Buscar
                    </a>
                    <a href="#" class="text-gray-500 hover:text-gray-900 px-3 py-2 rounded-md text-sm font-medium flex items-center">
                        <x-hero-icon name="user" class="w-4 h-4 mr-2" />
                        Perfil
                    </a>
                </nav>

                <!-- Mobile menu button -->
                <div class="md:hidden">
                    <button class="text-gray-500 hover:text-gray-900 p-2">
                        <x-hero-icon name="menu" class="w-6 h-6" />
                    </button>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <!-- Hero Section -->
        <div class="bg-white overflow-hidden shadow rounded-lg">
            <div class="px-4 py-5 sm:p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <x-hero-icon name="star" class="w-12 h-12 text-yellow-400" />
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <h3 class="text-lg font-medium text-gray-900">
                            Bem-vindo ao Filmax
                        </h3>
                        <p class="mt-1 text-sm text-gray-500">
                            Sua plataforma de filmes com Tailwind CSS e Heroicons integrados.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Grid de Cards -->
        <div class="mt-8 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
            <!-- Card 1 -->
            <div class="bg-white overflow-hidden shadow rounded-lg hover:shadow-lg transition-shadow duration-300">
                <div class="p-6">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <x-hero-icon name="heart" class="w-8 h-8 text-red-500" />
                        </div>
                        <div class="ml-4">
                            <h4 class="text-lg font-medium text-gray-900">Favoritos</h4>
                            <p class="text-sm text-gray-500">Gerencie seus filmes favoritos</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="bg-white overflow-hidden shadow rounded-lg hover:shadow-lg transition-shadow duration-300">
                <div class="p-6">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <x-hero-icon name="play" class="w-8 h-8 text-blue-500" />
                        </div>
                        <div class="ml-4">
                            <h4 class="text-lg font-medium text-gray-900">Assistir</h4>
                            <p class="text-sm text-gray-500">Comece a assistir agora</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="bg-white overflow-hidden shadow rounded-lg hover:shadow-lg transition-shadow duration-300">
                <div class="p-6">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <x-hero-icon name="search" class="w-8 h-8 text-green-500" />
                        </div>
                        <div class="ml-4">
                            <h4 class="text-lg font-medium text-gray-900">Descobrir</h4>
                            <p class="text-sm text-gray-500">Encontre novos filmes</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Botões de Ação -->
        <div class="mt-8 flex flex-col sm:flex-row gap-4">
            <button class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                <x-hero-icon name="play" class="w-4 h-4 mr-2" />
                Começar
            </button>
            
            <button class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                <x-hero-icon name="heart" class="w-4 h-4 mr-2" />
                Favoritar
            </button>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t border-gray-200 mt-12">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <div class="text-center text-sm text-gray-500">
                <p>&copy; 2024 Filmax. Todos os direitos reservados.</p>
            </div>
        </div>
    </footer>
</body>
</html>
