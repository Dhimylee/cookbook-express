@extends('components.base')

@section('title', 'Livros')

@section('content')
<section class="box-books">
    <div class="box-booksWrapper">
        <h1>Livros</h1>

        @if(session('error'))
            <p>{{session('error')}}</p>
        @endif

        @if(session('success'))
            <p>{{session('success')}}</p>
        @endif

        <div class="d-flex flex-row w-100 ms-3">
            @foreach ($books as $book)
                <a href="{{route('book.show', $book->id)}}" class="book-card ms-3">
                    <div class="card">
                        <div class="card-header" style="background-image: url('{{ asset('storage/recipe_images/'.$book->publications[0]->recipe->photos[0]->name) }}');"></div>
                        <div class="card-body">
                            <h3>{{$book->title}}</h3>
                            @if(!$book->published_at)
                                <span class="badge bg-danger">Não publicado</span>
                            @else
                                <p>Compilado por {{$book->employee->user->name}}</p>
                            @endif
                        </div>
                    </div>
                </a>
            @endforeach
        </div>

        @can('manageBooks', Auth::user())
            <a href="{{route('book.create')}}" class="btn btn-primary">Criar novo livro</a>
        @endcan
    </div>
</section>
@endsection

@section('style')
<style>
    main {
        background-color: #FBF7ED;
        height: 100vh;
    }

    .box-books {
        padding: 120px 100px;
    }

    .box-booksWrapper {
        background-color: #fff;
        border: 1px solid #FF9E0B;
        padding: 30px;
        border-radius: 16px;
    }

    h1 {
        color: #FF9E0B;
        font-size: 36px;
        font-weight: 500;
        margin-bottom: 20px;
    }

    .card-header {
        background-size: cover;
        background-position: center;
        height: 100px;
    }

    .book-card {
        text-decoration: none;
        transition: all 0.4s;
        overflow: hidden;
    }

    .book-card:hover {
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.11);
        transform: scale(1.03);
    }

    .btn {
        background-color: #FBF7ED;
        border: 1px solid #FF9E0B;
        border-radius: 8px;
        color: #FF9E0B;
        font-size: 14px;
        padding: 12px 18px;
        text-decoration: none;
        cursor: pointer;
        transition: all 0.3s ease-in-out;
        display: inline-block;
        margin-top: 20px;
    }

    .btn:hover {
        background-color: #FF9E0B;
        color: #FBF7ED;
    }

    .badge {
        display: inline-block;
        padding: 0.5em 0.75em;
        font-size: 75%;
        font-weight: 700;
        line-height: 1;
        color: #fff;
        text-align: center;
        white-space: nowrap;
        vertical-align: baseline;
        border-radius: 0.375rem;
    }

    .bg-danger {
        background-color: #e3342f;
    }

    .bg-success {
        background-color: #38c172;
    }

    .bg-warning {
        background-color: #ffed4a;
    }
</style>
@endsection

@section('script')
<script>
</script>
@endsection
