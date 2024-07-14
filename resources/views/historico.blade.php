@extends('layouts.app')

@section('content')
    <x-page-heading>Histórico de Sorteios</x-page-heading>

    <div class="row mb-3 flex-wrap">
    @foreach ($sorteios as $sorteio)
        <div class="card text-center d-flex align-self-stretch m-1" style="width: 300px">
            <span class="card-header">Sorteio realizado em
                <br>
                <h5>{{ $sorteio->data_sorteio }}</h5>

            </span>
            <div class="card-body">
                <h5 class="card-title">Resultado</h5>
                @foreach (json_decode($sorteio->resultado) as $item)
                    <p class="card-text">{{ $item->tirador }} tirou {{ $item->amigo }}</p>
                @endforeach
            </div>
        </div>
    @endforeach
</div>
@endsection
