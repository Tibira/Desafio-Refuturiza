<div>
    <form action={{ route('site.login') }} method="POST">
        @csrf
        <input name="usuario" value="{{ old('usuario') }}" type="text" placeholder="Usuário">
        {{ $errors->has('usuario') ? $errors->first('usuario') : '' }}
        <input name="senha" value="{{ old('senha') }}" type="password" placeholder="Senha">
        {{ $errors->has('senha') ? $errors->first('senha') : '' }}
        <button type="submit"> Acessar </button>
    </form>
</div>
