<style>
    * {
        list-style: none;
    }
    main {
        background-color: #FBF7ED;
        height: 95%;
    }
    .perfil__header h1 {
        color: #FF9E0B;
        font-size: 36px;
        font-weight: 500;
        letter-spacing: normal;
        line-height: 120%;
        padding: 20px 0px 0px 50px;
    }
    .perfil__wrapper {
        display: flex;
        overflow-x: hidden;
        width: 100%;
    }
    .perfil__container {
        background-color: #fff;
        border: 1px solid #FBF7ED;
        border-radius: 12px;
        display: flex;
        justify-content: space-between;
        margin: 0 auto;
        padding: 30px 20px;
        width: 100%;
    }
    .perfil__col {
        border-right: 1px solid rgba(234, 195, 157, .5);
        margin-right: 20px;
        min-width: 212px;
        width: 20vw;
    }
    .perfil__iten span {
        background-color: #FBF7ED;
        border: 1px solid #FF9E0B;
        border-radius: 8px;
        color: #FF9E0B;
        font-size: 14px;
        padding: 8px 16px;
    }
    .perfil__dados {
        padding: 8px 20px;
        width: 100%;
    }
</style>

@extends('components.base')

@section('title', 'Perfil')

@section('content')
    <div>
        <div class="perfil__header">
            <h1>Meu perfil</h1>
        </div>

        <div class="perfil__wrapper">
            <div class="perfil__container">
                <aside class="perfil__col">
                    <nav>
                        <ul class="perfil__list">
                            <li class="perfil__iten"><span>dados pessoais</span></li>
                        </ul>
                    </nav>
                </aside>
                <section class="perfil__dados">
                    <div>
                        <h2>dados</h2>
                        <div class="perfil__dados-info">
                            <form action="">
                                <div>
                                    <label>nome</label>
                                    <p>{{ $user->name }}</p>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <!-- <h1 class="perfil__title">Perfil</h1>

    <p>Nome: {{ $user->name }}</p>
    <p>E-mail: {{ $user->email }}</p>
    <p>Cargo: {{ App\Helpers\UserHelper::convertRoleName($user) }}</p>

    {{--! Inserir o restante das informações --}}


    @if(Auth::user()->id == $user->id)
        <a href="{{route('profile.edit')}}">Editar Perfil</a>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit">Logout</button>
        </form>
    @endif -->
@endsection

@section('style')
<style>

</style>
@endsection

@section('script')
<script>

</script>
@endsection
