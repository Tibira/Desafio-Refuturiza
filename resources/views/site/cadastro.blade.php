<form method="POST" action="{{ route('cadastro') }}">
    @csrf
    <x-input id="name" type="name" name="name" placeholder="Nome" :value="old('name')" required/>
    <x-input id="email" type="email" name="email" placeholder="E-mail" :value="old('email')" required/>
    <x-input id="password" type="password" name="password" placeholder="Senha" :value="old('password')" required/>
    <button>Cadastrar</button>
</form>