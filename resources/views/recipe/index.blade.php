@extends('components.base')

@section('title', 'Receitas')

@section('content')
    <h1>Receitas</h1>

    @if(session('error'))
        <p>{{session('error')}}</p>
    @endif

    @if(session('success'))
        <p>{{session('success')}}</p>
    @endif

    @foreach ($recipes as $recipe)
        <div class="d-flex">

            <a href="{{route('recipe.show', $recipe->id)}}" class="recipe-card">

                <div class="card">
                    <div class="card-body">

                        <h3>{{$recipe->name}}</h3>
                        <p>Criada por {{$recipe->employee->user->name}}</p>
                        <p>Status:
                            <span class="badge
                                {{$recipe->published ? 'text-bg-success' : 'text-bg-danger'}}">
                                {{$recipe->published ? 'Publicada' : 'Não publicada'}}
                            </span>
                        </p>

                    </div>
                </div>

            </a>

        </div>
    @endforeach

    @can('manageRecipes', Auth::user())
        <a href="{{route('recipe.create')}}" class="btn btn-primary">Criar nova receita</a>
    @endcan

@endsection

@section('style')
<style>
    .recipe-card {
        text-decoration: none;
        transition: all 0.3s;
    }

    .recipe-card::hover {
        transform: scale(1.1);
    }
</style>
@endsection

@section('script')
<script>
</script>
@endsection
