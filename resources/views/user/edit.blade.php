@extends('components.base')

@section('title', 'Editar Usuário')

@section('content')
    <h1>Editar Usuário</h1>
    <form action="{{ route('user.update') }}" method="post">
        @csrf
        @method('PATCH')
        <input type="hidden" name="userId" value="{{ $user->id }}">

        <label for="name">Nome</label>
        <input type="text" name="name" id="name" value="{{ $user->name }}">
        <label for="email">E-mail</label>
        <input type="email" name="email" id="email" value="{{ $user->email }}">

        <h1>Dados do funcionário</h1>
        <label for="role_id">Cargo</label>
        <select name="role_id" id="role_id">
            @foreach ($roles as $role)
                <option value="{{ $role->id }}" {{ $role->id == $user->role_id ? 'selected' : '' }}>{{ $role->name }}</option>
            @endforeach
        </select>

        <button type="submit">Salvar</button>
    </form>
    <a href="{{ route('user.show', $user->id) }}">Voltar</a>
@endsection

@section('script')
<script>
    console.log('Hello World');
</script>
@endsection

@section('style')
@endsection

