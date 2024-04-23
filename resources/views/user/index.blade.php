@extends('components.base')

@section('title', 'Usuários')

@section('content')
    <h1>Usuários</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Criado em</th>
                <th>Atualizado em</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td>{{ $user->updated_at }}</td>
                    <td>
                        <a href="{{ route('user.show', ['user' => $user->id]) }}">Ver</a>
                        <a href="{{ route('user.edit', ['user' => $user->id]) }}">Editar</a>
                        <a href="{{ route('user.destroy', ['user' => $user->id]) }}">Deletar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{-- <a href="{{ route('user.create') }}">Criar</a> --}}
@endsection

@section('script')
@endsection

@section('style')
@endsection
