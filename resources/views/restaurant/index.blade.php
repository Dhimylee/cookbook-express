@extends('components.base')

@section('title', 'Home')

@section('content')
    <h1>Restaurantes</h1>

    @if(session('error'))
        <p>{{session('error')}}</p>
    @endif

    @foreach ($restaurants as $restaurant)
        <div class="d-flex flex-row">
            <h3>{{ $restaurant->name }}</h3>

            <form action="{{route('restaurant.delete')}}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{$restaurant->id}}">
                <button type="submit">Deletar</button>
            </form>

        </div>
    @endforeach

    <h1>Cadastrar restaurante</h1>

    <form action="{{route('restaurant.store')}}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Nome do restaurante">
        <button type="submit">Criar</button>
    </form>

@endsection

@section('style')
<style>
</style>
@endsection

@section('script')
<script>
</script>
@endsection
