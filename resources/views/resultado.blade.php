@extends('layouts.app')

@section('content')
    <x-page-heading>Resultado do Sorteio</x-page-heading>

    @foreach ($resultado as $item)
        <div class="d-inline-flex p-2 my-4 card bg-light bg-body-tertiary shadow-lg w-25 mx-2 border rounded-4 border-info-subtle"">
            <div class="d-flex flex-column align-items-center card-body">
                <h5 class="card-title">{{ $item['tirador'] }}</h5>
                <p class="card-subtitle mb-2 text-body-tertiary">tirou</p>
                <h5 class="card-title">{{ $item['amigo'] }}</h5>
            </div>
        </div>
    @endforeach
@endsection
