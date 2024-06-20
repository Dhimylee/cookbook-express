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

    <div class="d-flex flex-row flex-wrap w-100 ms-3">
        @foreach ($recipes as $recipe)

            <a href="{{route('recipe.show', $recipe->id)}}" class="recipe-card ms-3">

                <div class="card">

                    <div class="card-header" style="background-image: url('{{ asset('storage/recipe_images/'.$recipe->photos[0]->name) }}');">
                    </div>

                    <div class="card-body">
                        <h3>{{$recipe->name}}</h3>
                        <p>Criada por {{$recipe->employee->user->name}}</p>
                        <p>Status:
                            <span class="badge
                                {{$recipe->published ? 'text-bg-warning' : 'text-bg-success'}}">
                                {{$recipe->published ? 'Publicada' : 'Inédita'}}
                            </span>
                        </p>

                    </div>
                </div>

            </a>

        @endforeach
    </div>

    @can('manageRecipes', Auth::user())
        <a href="{{route('recipe.create')}}" class="btn btn-primary salvar">Criar nova receita</a>
    @endcan

@endsection

@section('style')
<style>
    .salvar, .deletar {
        background-color: #FBF7ED;
        border: 1px solid #FF9E0B;
        border-radius: 8px;
        color: #FF9E0B;
        font-size: 14px;
        padding: 12px 18px;
        margin-left: 45px; /* Espaçamento entre os botões */
    }
    .deletar {
        background-color: #fbeded;
        border: 1px solid #a2363b;
        color: #e41313;
        padding: 12px 16px;
    }
    main {
        background-color: #FBF7ED;
        height: 100vh;
    }
    .box-categorias {
        padding: 120px 100px;
    }
    .box-categoriasWrapper {
        background-color: #fff;
        border: 1px solid #FF9E0B;
        padding: 30px;
        border-radius: 16px;
    }
    .box-categoriasWrapper h1 {
        font-size: 28px;
        color: #8E3F1A;
    }
    .box-categoriasWrapper table {
        width: 100%;
    }
    .box-categoriasWrapper thead {
        background-color: #FF9E0B;
    }
    .box-categoriasWrapper th {
        padding: 8px;
        color: #FBF7ED;
    }
    .box-categoriasWrapper td {
        padding: 10px;
        border-bottom: 1px solid #FF9E0B;
    }
    .formulario form > input, .form-inline > input {
        background-color: #fff;
        border-radius: 4px;
        height: 48px;
        transition: border .2s ease-in-out;
        width: 200px;
        color: rgba(0, 0, 0, .4);
        font-weight: 400;
        margin-bottom: 15px;
        border: 1px solid rgba(234, 195, 157, .5);
        font-size: 15px;
    }
    .formulario {
        display: grid;
        grid-template-columns: 1fr 1fr;
        padding: 20px;
    }
    h1 {
        color: #FF9E0B;
        font-size: 36px;
        font-weight: 500;
        letter-spacing: normal;
        line-height: 120%;
        padding: 20px 0px 20px 50px;
    }
    h3 {
        font-size: 1.3rem;
        display: inline-block; /* Mantém o título na mesma linha */
        margin-right: 10px;
    }
    .listagem {
        margin-bottom: 50px;
    }
    .d-flex {
        display: flex;
    }
    .align-items-center {
        align-items: center;
    }
    .form-inline {
        display: flex;
        align-items: center;
        margin-left: 10px;
    }

    .card {
        border: 1px solid #FF9E0B;
        border-radius: 16px;
        overflow: hidden;
        background-color: #fff;
        width: 300px;
        margin-bottom: 20px;
        transition: all 0.3s ease-in-out;
    }
    .card:hover {
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .card-header {
        background-size: cover;
        background-position: center;
        height: 200px;
    }
    .card-body {
        padding: 20px;
    }
    .card-body h3 {
        font-size: 20px;
        color: #FF9E0B;
        margin-bottom: 10px;
    }
    .card-body p {
        margin: 5px 0;
        color: #8E3F1A;
    }
    .badge {
        font-size: 12px;
        padding: 5px 10px;
        border-radius: 4px;
    }
    .text-bg-warning {
        background-color: #FFD700;
        color: #fff;
    }
    .text-bg-success {
        background-color: #28a745;
        color: #fff;
    }
</style>
@endsection

@section('script')
<script>
</script>
@endsection
