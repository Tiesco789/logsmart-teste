<?php

namespace App\Http\Controllers;

use App\Models\Pessoa;

class SorteioController
{
    public function realizarSorteio()
    {
        $pessoas = Pessoa::all()->shuffle(); // Embaralha as pessoas aleatoriamente
        $resultado = [];

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

        return view('resultado', compact('resultado'));
    }
}
