<?php

namespace App\Http\Controllers;

use App\Models\Pessoa;
use App\Models\Sorteio;

class SorteioController
{
    public function realizarSorteio()
    {
        $pessoas = Pessoa::all()->shuffle(); // Embaralha as pessoas
        $resultado = []; // Colocoa os resultados em um array

        $sorteios = new Sorteio();
        $sorteios->data_sorteio = now(); // Data e hora atual
        $sorteios->participantes = $pessoas->pluck('nome')->toJson(); // JSON com os nomes dos participantes
        $sorteios->resultado = json_encode($resultado); // JSON com os pares do sorteio
        $sorteios->save();

        // Lógica do sorteio para garantir que ninguém se tire
        $primeiraPessoa = $pessoas->shift();
        $pessoaAnterior = $primeiraPessoa;
        foreach ($pessoas as $pessoa) {
            $resultado[] = [
                'tirador' => $pessoaAnterior->nome,
                'amigo' => $pessoa->nome
            ];
            $pessoaAnterior = $pessoa;
        }
        $resultado[] = [
            'tirador' => $pessoaAnterior->nome,
            'amigo' => $primeiraPessoa->nome
        ];

        $sorteios = Sorteio::latest()->first(); // Obtém o último sorteio cadastrado
        if ($sorteios) {
            $sorteios->update([
                'participantes' => $pessoas->pluck('nome')->toJson(),
                'resultado' => json_encode($resultado),
            ]);
        } else {
            Sorteio::create([
                'data_sorteio' => now(),
                'participantes' => $pessoas->pluck('nome')->toJson(),
                'resultado' => json_encode($resultado),
            ]);
        }

        return view('resultado', compact('resultado'));
    }

    public function historico()
    {
        $sorteios = Sorteio::all(); // Busca todos os sorteios do banco de dados
        return view('historico', compact('sorteios'));
    }
}
