<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css'])
    <title>Login</title>
</head>

<body class="bg-[#0F0021] min-h-screen flex justify-center items-center flex-col">
    @if ($errors->any())
        <div class="absolute top-4 w-full max-w-md mx-auto px-4">
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg">
                <ul class="list-none list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif
    <h1 class="text-3xl font-bold text-center mb-6 text-white">Bem-vindo ao <span class="italic">FIL<span
                class="text-[#6000FD] text-4xl">MAX!</span></span></h1>
    <div class="bg-[#1E0F2C] w-full max-w-md p-8 rounded-2xl shadow-2xl text-white">
        <h1 class="text-3xl font-bold text-center mb-6">Cadastro</h1>

        <form action="{{ route('register') }}" method="POST" class="space-y-5">
            @csrf
            <div>
                <label for="name" class="block mb-1 font-medium">Nome</label>
                <input type="text" name="name" id="name"
                    class="w-full px-4 py-2 rounded-lg bg-[#2B1A3D] focus:outline-none focus:ring-2 focus:ring-[#6000FD]">
            </div>

            <div>
                <label for="email" class="block mb-1 font-medium">Email</label>
                <input type="text" name="email" id="email"
                    class="w-full px-4 py-2 rounded-lg bg-[#2B1A3D] focus:outline-none focus:ring-2 focus:ring-[#6000FD]">
            </div>

            <div>
                <label for="password" class="block mb-1 font-medium">Senha</label>
                <input type="password" name="password" id="password"
                    class="w-full px-4 py-2 rounded-lg bg-[#2B1A3D] focus:outline-none focus:ring-2 focus:ring-[#6000FD]">
            </div>

            <div>
                <label for="password_confirmation" class="block mb-1 font-medium">Confirme sua senha</label>
                <input type="password" name="password_confirmation" id="password_confirmation"
                    class="w-full px-4 py-2 rounded-lg bg-[#2B1A3D] focus:outline-none focus:ring-2 focus:ring-[#6000FD]">
            </div>

            <button type="submit"
                class="w-full bg-[#6000FD] hover:bg-[#4700ba] text-white py-2 rounded-lg font-semibold transition">
                Cadastrar-se
            </button>
        </form>

        <p class="text-center mt-4 text-sm text-gray-400">
            Já possui conta?
            <a href="{{ route('login') }}" class="text-[#6000FD] hover:underline">Fazer login</a>
        </p>
    </div>

</body>

</html>