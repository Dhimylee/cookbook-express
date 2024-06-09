<style>
    main {
        background-color: #FBF7ED;
        height: 95%;
    }

    .box-perfilUsuario{
        padding: 120px 100px;
    }
    .box-perfilUsuario__wrapper {
        background-color: #fff;
        border: 1px solid #FF9E0B;
        padding: 30px;
        border-radius: 16px;
    }

    .box-perfilUsuario__wrapper h1 {
        font-size: 28px;
        color: #8E3F1A;
    }

    .usuario__btn {
        background-color: #FBF7ED;
        border: 1px solid #FF9E0B;
        border-radius: 8px;
        color: #FF9E0B;
        font-size: 14px;
        padding: 8px 16px;
        margin-right: 40px;
    }
</style>
@extends('components.base')

@section('title', 'Perfil')

@section('content')
    <section class="box-perfilUsuario">
        <div class="box-perfilUsuario__wrapper">
            <h1>Dados do usuário</h1>

            <div>
                <p><strong>Nome:</strong> {{ $user->name }}</p>
                <p><strong>Email:</strong> {{ $user->email }}</p>
                <p><strong>ID:</strong> {{ $user->id }}</p>
                <p><strong>Perfil foi criado em:</strong> {{ $user->created_at->format('d/m/Y H:i:s') }}</p>
                <p style="padding-bottom: 10px;"><strong>Perfil foi atualizado em:</strong> {{ $user->updated_at->format('d/m/Y H:i:s') }}</p>
                <a class="usuario__btn" href="{{ route('user.edit', $user->id) }}">Editar</a>
                <a class="usuario__btn" href="{{ route('user.index') }}">Voltar</a>
            </div>

        </div>
    </section>
    <!-- <h1>Perfil</h1>
    <p>Olá, {{ $user->name }}</p>
    <p>Seu e-mail é: {{ $user->email }}</p>
    <p>Seu ID é: {{ $user->id }}</p>
    <p>Seu perfil foi criado em: {{ $user->created_at }}</p>
    <p>Seu perfil foi atualizado em: {{ $user->updated_at }}</p>
    <a href="{{ route('user.edit', $user->id) }}">Editar</a>
    <a href="{{ route('user.index') }}">Voltar</a> -->
@endsection

@section('script')
<!-- <script>
    console.log('Hello World');
</script> -->
@endsection

@section('style')
@endsection

