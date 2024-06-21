@extends('components.base')

@section('title', 'Degustações')

@section('content')
<h1>Desgustações</h1>

<form action="{{route('tasting.index')}}">
    <input type="text" name="filter">
</form>

<ul>
    @foreach ($tastings as $tasting )
        <li>
            <a href="{{route('recipe.show', $tasting->recipe->id)}}">{{$tasting->recipe->name}}</a> -
            {{$tasting->rating}} - {{$tasting->employee->user->name}}
            @if($tasting->employee->user->id == Auth::user()->id) -
                <a href="{{route('tasting.edit', $tasting->id)}}">Editar</a> -
                <a href="{{route('tasting.delete', $tasting->id)}}">Apagar</a>
            @endif
        </li>
    @endforeach
</ul>

@if (Auth::user()->employee && (Auth::user()->role->name == 'taster' || Auth::user()->role->name == 'admin') )
    <a href="{{route('tasting.create')}}" class="btn btn-primary">Nova degustação</a>
@endif

@endsection

@section('style')
@endsection

@section('script')
@endsection
