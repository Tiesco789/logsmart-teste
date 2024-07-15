<?php

namespace App\Http\Controllers;

use App\Models\Pessoa;
use App\Models\Sorteio;
use Illuminate\Support\Facades\DB;

class SorteioController
{
    public function realizarSorteio()
    {
        try {
            DB::beginTransaction();

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
                    'amigo' => $pessoa->nome,
                ];
                $pessoaAnterior = $pessoa;
            }
            $resultado[] = [
                'tirador' => $pessoaAnterior->nome,
                'amigo' => $primeiraPessoa->nome,
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

            if ($pessoas->count() < 3) {
                return redirect('/')->with('erro', 'É necessário ter pelo menos 3 participantes para realizar o sorteio.');
            } else if ($pessoas->count() > 1) {
                return redirect('/')->with('mensagem','abaaa');
            }

            // Se tudo deu certo, confirma a transação
            DB::commit();

            return view('resultado', compact('resultado'));
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect('/')->with('erro', 'Erro ao realizar o sorteio');
        }
    }

    public function historico()
    {
        $sorteios = Sorteio::all(); // Busca todos os sorteios do banco de dados
        return view('historico', compact('sorteios'));
    }
}
