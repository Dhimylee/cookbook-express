@extends('components.base')

@section('title', 'Perfil')

@section('content')
    <h1>Perfil</h1>
    <p>Olá, {{ $user->name }}</p>
    <p>Seu e-mail é: {{ $user->email }}</p>
    <p>Seu ID é: {{ $user->id }}</p>
    <p>Seu perfil foi criado em: {{ $user->created_at }}</p>
    <p>Seu perfil foi atualizado em: {{ $user->updated_at }}</p>
    <a href="{{ route('user.edit', $user->id) }}">Editar</a>
    <a href="{{ route('user.index') }}">Voltar</a>
@endsection

@section('script')
<script>
    console.log('Hello World');
</script>
@endsection

@section('style')
@endsection

