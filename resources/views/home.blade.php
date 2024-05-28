@extends('components.base')

@section('title', 'Home')

@section('content')
    <h1>Home</h1>

    @can('viewUsers', Auth::user())
        <a href="{{ route('user.index') }}">Usuários</a>
    @endcan

    @can('viewRoles', Auth::user())
        <a href="{{ route('role.index') }}">Cargos</a>
    @endcan

    @can('manageRestaurants', Auth::user())
        <a href="{{ route('restaurant.index') }}">Restaurantes</a>
    @endcan

    <a href="{{ route('profile.show', Auth::user()->id) }}">Perfil</a>

    {{-- logout button --}}
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Logout</button>
    </form>

@endsection

@section('style')
<style>

</style>
@endsection

@section('script')
<script>
    console.log('Home');
</script>
@endsection
