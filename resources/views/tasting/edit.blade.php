@extends('components.base')

@section('title', 'Editar degustação')

@section('content')
<h1>Editar degustação</h1>

    @if(session('error'))
        <p>{{session('error')}}</p>
    @endif

    @if(Auth::user()->employee)
        <form action="{{route('tasting.update')}}" method="POST">
            @csrf
            @method('PATCH')

            <input type="hidden" name="employee_id" value="{{Auth::user()->employee->id}}">
            <input type="hidden" name="date" value="{{date('Y-m-d')}}">
            <input type="hidden" name="recipe_id" value="{{$tasting->recipe_id}}">
            <input type="hidden" name="id" value="{{$tasting->id}}">

            <label for="">Receita</label>
            <select name="" id="" disabled>
                @foreach ($recipes as $recipe)
                    <option value="{{$recipe->id}}" @if($tasting->recipe_id == $recipe->id) selected @endif>{{$recipe->name}}</option>
                @endforeach
            </select>

            <label for="rating">Nota</label>
            <input type="decimal" name="rating" id="rating" min="0" max="5" value="{{$tasting->rating}}">

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
