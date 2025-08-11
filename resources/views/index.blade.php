<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
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

    <h1>login</h1>
    <form action="{{ route('login') }}" method="POST">
        @csrf

        <label for="">Email</label>
        <input type="text" name="email">
        <br>
        <label for="">Senha</label>
        <input type="password" name="password">
        <br>
        <button type="submit">Logar</button>
    </form>
    <a href="{{route('cadastro')}}">Não possuo conta</a>
    
</body>

</html>
