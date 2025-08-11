    <a href="{{route('login.index')}}">Voltar</a>
    <h1>cadastro</h1>
    <form action="{{ route('register') }}" method="POST">
        @csrf

        <label for="">Nome de usuário</label>
        <input type="text" name="name">
        <br>
        <label for="">Email</label>
        <input type="text" name="email">
        <br>
        <label for="">Senha</label>
        <input type="password" name="password">
        <br>
        <label for="">Confirme a senha</label>
        <input type="password" name="password_confirmation">
        <br>
        <button type="submit">cadastrar</button>
    </form>
