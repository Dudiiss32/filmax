<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
    <form action="{{route('login')}}" method="POST">
        @csrf

        <label for="">Nome de usuário</label>
        <input type="text" name="name">
        <br>
        <label for="">Email</label>
        <input type="text" name="email">
        <br>
        <label for="">Senha</label>
        <input type="text" name="password">
        <br>
        <button type="submit">Logar</button>
    </form>
</body>
</html>