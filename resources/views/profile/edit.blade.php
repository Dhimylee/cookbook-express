@extends('components.base')

@section('title', 'Perfil')

@section('content')
    <h1>Editar Perfil</h1>

    @if(session('error'))
        <p>{{ session('error') }}</p>
    @endif

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <h1>Informações Pessoais</h1>
    <h2>{{$user->name}}</h2>

    <form method="POST" action="{{ route('profile.update', $user->id) }}">
        @csrf

        <input type="hidden" name="id" value="{{$user->id}}">

        <label for="email">E-mail</label>
        <input type="email" name="email" id="email" value="{{ $user->email }}">

        <label for="oldPassword">Senha Antiga</label>
        <input type="password" name="oldPassword" id="oldPassword">

        <label for="password">Nova Senha</label>
        <input type="password" name="password" id="password">

        <label for="password_confirmation">Repita a nova senha</label>
        <input type="password" name="password_confirmation" id="password_confirmation">

        <button type="submit">Salvar</button>
    </form>

    @if($user->role->name == 'chef')

        <h1>Experiencia</h1>
        @foreach ($user->employee->experiences as $experience)

            <p>{{$experience->restaurant->name}}</p>
            <p>{{App\Helpers\GlobalHelper::convertDate($experience->start_date)}} -
                {{$experience->end_date ? App\Helpers\GlobalHelper::convertDate($experience->end_date) : 'Atual'}}
            </p>
            <form method="POST" action="{{ route('employee.removeExperience') }}">
                @csrf

                <input type="hidden" name="id" value="{{$experience->id}}">
                <input type="hidden" name="restaurant" value="{{$experience->restaurant->id}}">

                <button type="submit">Remover</button>
            </form

        @endforeach

        <h1>Adicionar experiencia</h1>

        <form method="POST" action="{{ route('employee.addExperience') }}">
            @csrf

            <input type="hidden" name="employee_id" value="{{$user->employee->id}}">

            <label for="restaurant">Restaurante</label>
            <select name="restaurant_id" id="restaurant_id">
            @foreach ($restaurants as $restaurant)
                <option value="{{$restaurant->id}}">{{$restaurant->name}}</option>
            @endforeach
            </select>

            <label for="start_date">Data de admissão</label>
            <input type="date" name="start_date" id="start_date">

            <label for="end_date">Data de demissão</label>
            <input type="date" name="end_date" id="end_date">

            <label for="current_job">Emprego atual</label>
            <input type="checkbox" name="current_job" id="current_job">


            <button type="submit">Adicionar</button>
    @endif


@endsection

@section('style')
<style>

</style>
@endsection

@section('script')
<script>

    $(document).ready(function() {
        $('#current_job').change(function() {
            if(this.checked) {
                $('#end_date').prop('disabled', true);
                $('#end_date').prop('value', null);

            } else {
                $('#end_date').prop('disabled', false);
            }
        });
    });

</script>
@endsection


{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}
