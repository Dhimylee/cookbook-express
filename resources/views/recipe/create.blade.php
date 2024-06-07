@extends('components.base')

@section('title', 'Cadastrar receita')

@section('content')
    <h1>Cadastrar receita</h1>

    @if(session('error'))
        <p>{{session('error')}}</p>
    @endif

    @if(session('success'))
        <p>{{session('success')}}</p>
    @endif

    <form action="{{route('recipe.store')}}" method="post">
        @csrf

        <div class="form-group">
            <label for="name">Nome da receita</label>
            <input type="text" name="name" id="name" class="form-control">
        </div>

        <div class="form-group">
            <label for="portions">Porções</label>
            <input type="number" name="portions" id="portions" class="form-control">
        </div>

        <div class="form-group">
            <label for="category_id">Categoria</label>
            <select name="category_id" id="category_id" class="form-control">
                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="ingredients">Ingredientes</label>
            
        </div>


    </form>

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
