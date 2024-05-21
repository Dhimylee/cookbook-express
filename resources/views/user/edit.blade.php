@extends('components.base')

@section('title', 'Editar Usuário')

@section('content')
    <h1>Editar Usuário</h1>
    <form action="{{ route('user.update') }}" method="post">
        @csrf
        @method('PATCH')
        <input type="hidden" name="userId" value="{{ $user->id }}">

        <h1>Dados de usuário</h1>

        <label for="name">Nome</label>
        <input type="text" name="name" id="name" value="{{ $user->name }}">

        <label for="email">E-mail</label>
        <input type="email" name="email" id="email" value="{{ $user->email }}">

        <label for="role_id">Cargo</label>
        <select name="role_id" id="role_id">
            @foreach ($roles as $role)
                <option value="{{ $role->id }}" {{ $role->id == $user->role_id ? 'selected' : '' }}>{{ $role->name }}</option>
            @endforeach
        </select>

        <h1>Dados de funcionário</h1>
        @if(!$user->employee()->exists())
            <p class=" text-danger ">O usuário não possui perfil de funcionário!</p>
        @endif

        <label for="rg">RG</label>
        <input type="number" name="rg" id="rg" value="{{ $user->employee->rg ?? '' }}">

        <label for="admission_date">Data de admissão</label>
        <input type="date" name="admission_date" id="admission_date" value="{{ $user->employee->admission_date ?? '' }}">

        <label for="demission_date">Data de demissão</label>
        <input type="date" name="demission_date" id="demission_date" value="{{ $user->employee->demission_date ?? '' }}">

        <label for="salary">Salário</label>
        <input type="number" name="salary" id="salary" value="{{ $user->employee->salary ?? '' }}">

        <label for="fantasy_name">Nome fantasia</label>
        <input type="text" name="fantasy_name" id="fantasy_name" value="{{ $user->employee->fantasy_name ?? '' }}">

        <button type="submit">Salvar</button>
    </form>
    <a href="{{ route('user.index') }}">Voltar</a>
@endsection

@section('script')
<script>
    console.log('Hello World');
</script>
@endsection

@section('style')
@endsection

