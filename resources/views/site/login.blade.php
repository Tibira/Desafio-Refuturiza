<div>
    <form action={{ route('site.login') }} method="POST">
        @csrf
        <input name="usuario" type="text" placeholder="Usuário">
        <input name="senha" type="password" placeholder="Senha">
        <button type="submit"> Acessar </button>
    </form>
</div>
