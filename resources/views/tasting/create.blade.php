@extends('components.base')

@section('title', 'Nova degustação')

@section('content')
<h1>Cadastrar nova degustação</h1>

    @if(session('error'))
        <p>{{session('error')}}</p>
    @endif

    @if(Auth::user()->employee)
        <form action="{{route('tasting.store')}}" method="POST">
            @csrf

            <input type="hidden" name="employee_id" value="{{Auth::user()->employee->id}}">
            <input type="hidden" name="date" value="{{date('Y-m-d')}}">

            <label for="recipe_id">Receita</label>
            <select name="recipe_id" id="recipe_id">
                @foreach ($recipes as $recipe)
                    <option value="{{$recipe->id}}">{{$recipe->name}}</option>
                @endforeach
            </select>

            <label for="rating">Nota</label>
            <input type="decimal" name="rating" id="rating" min="0" max="5">

            <button type="submit">Salvar</button>

        </form>
    @else
        <p>Você não possui um perfil de funcionário e não pode cadastrar degustações</p>
    @endif

@endsection

@section('style')
@endsection

@section('script')
@endsection
