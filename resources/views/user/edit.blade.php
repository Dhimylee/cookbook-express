@extends('components.base')

@section('title', 'Editar Usuário')

@section('content')
    <h1>Editar Usuário</h1>
    <form action="{{ route('user.update', ['user' => $user->id]) }}" method="post">
        @csrf
        @method('PUT')
        <label for="name">Nome</label>
        <input type="text" name="name" id="name" value="{{ $user->name }}" disabled>
        <label for="email">E-mail</label>
        <input type="email" name="email" id="email" value="{{ $user->email }}">

        <h1>Dados do funcionário</h1>
        <label for="role">Cargo</label>
        <select name="" id=""></select>

        <button type="submit">Salvar</button>
    </form>
    <a href="{{ route('user.show', ['user' => $user->id]) }}">Voltar</a>
@endsection

@section('script')
<script>
    console.log('Hello World');
</script>
@endsection

@section('style')
@endsection

