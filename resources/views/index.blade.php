@extends('layouts.app')

@section('content')
    <x-page-heading>Lista de participantes</x-page-heading>

    @if(session('mensagem'))
        <div class="alert alert-success">
            {{ session('mensagem') }}
        </div>
    @endif

    @if(session('erro'))
        <div class="alert alert-danger">
            {{ session('erro') }}
        </div>
    @endif

    <table class="table table-striped mt-5">
        <thead>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Email</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pessoas as $pessoa)
                <tr>
                    <td>{{ $pessoa->nome }}</td>
                    <td>{{ $pessoa->email }}</td>
                    <td>
                        <a class="btn btn-primary mr-4" href="{{ route('editar', $pessoa->id) }}">Editar</a>
                        <form action="{{ route('excluir', $pessoa->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-outline-danger" type="submit">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <hr class="my-5">

    <form action="{{ route('sorteio') }}" method="POST">
        @csrf
        <button name="acao" value="sorteio" class="btn btn-primary btn-lg" type="submit">Realizar Sorteio</button>
    </form>
@endsection
