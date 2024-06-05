@extends('components.base')

@section('title', 'Ingredientes')

@section('content')
    <h1>Ingredientes</h1>

    @if(session('error'))
        <p>{{session('error')}}</p>
    @endif

    @if(session('success'))
        <p>{{session('success')}}</p>
    @endif

    @foreach ($ingredients as $ingredient)
        <div class="d-flex">

            <form action="{{route('ingredient.update')}}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{$ingredient->id}}">
                <input type="text" name="name" id="name" class="form-control" value="{{$ingredient->name}}">
                <input type="text" name="description" id="description" class="form-control" value="{{$ingredient->description}}"
                    placeholder="{{$ingredient->description ?? 'Descrição do ingrediente'}}">
                <input type="submit" value="Salvar">
            </form>

            <form action="{{route('ingredient.delete')}}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{$ingredient->id}}">
                <button type="submit">Deletar</button>
            </form>

        </div>
    @endforeach

    <h1>Cadastrar ingrediente</h1>

    <form action="{{route('ingredient.store')}}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Nome do ingrediente">
        <input type="text" name="description" placeholder="Descrição do ingrediente">
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
