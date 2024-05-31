@extends('components.base')

@section('title', 'Medidas')

@section('content')
    <h1>Medidas</h1>

    @if(session('error'))
        <p>{{session('error')}}</p>
    @endif

    @foreach ($measures as $measure)
        <div class="d-flex flex-row">
            <h3>{{ $measure->name }}</h3>

            <form action="{{route('measure.delete')}}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{$measure->id}}">
                <button type="submit">Deletar</button>
            </form>

        </div>
    @endforeach

    <h1>Cadastrar medida</h1>

    <form action="{{route('measure.store')}}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Nome da medida">
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
