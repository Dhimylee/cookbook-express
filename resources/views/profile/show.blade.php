@extends('components.base')

@section('title', 'Perfil')

@section('content')
    <h1>Perfil</h1>

    <p>Nome: {{ $user->name }}</p>
    <p>E-mail: {{ $user->email }}</p>
    <p>Cargo: {{ App\Helpers\UserHelper::convertRoleName($user) }}</p>

    {{--! Inserir o restante das informações --}}


    @if(Auth::user()->id == $user->id)
        <a href="{{route('profile.edit')}}">Editar Perfil</a>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit">Logout</button>
        </form>
    @endif
@endsection

@section('style')
<style>

</style>
@endsection

@section('script')
<script>

</script>
@endsection
