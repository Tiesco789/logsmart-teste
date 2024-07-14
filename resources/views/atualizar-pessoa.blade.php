@extends('layouts.app')

@section('content')

<form class="my-5" action="{{ isset($pessoa) ? route('editar', $pessoa->id) : route('cadastro') }}" method="POST">
    @csrf

    @if(isset($pessoa))
        @method('PUT')
    @endif

    <div class="mb-3">
        <label for="nome" class="form-label">Nome</label>
        <input class="form-control" type="text" id="nome" name="nome" value="{{ old('nome', $pessoa->nome ?? '') }}" required>
        @error('nome')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input class="form-control" type="email" id="email" name="email" value="{{ old('email', $pessoa->email ?? '') }}" required>
        @error('email')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <button class="w-100 btn btn-primary mt-3" type="submit" id="botaoSalvar" disabled>Atualizar</button>
</form>
@endsection
