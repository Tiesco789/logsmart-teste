<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pessoa;

class PessoaController
{
    protected $pessoa;

    public function __construct(Pessoa $pessoa)
    {
        $this->pessoa = $pessoa;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pessoas = Pessoa::all(); // Obtém todos os registros do modelo Pessoa
        return view('index', compact('pessoas')); // Passa o array $pessoas para a view
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cadastro');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate(
            [
                'nome' => 'required|string|regex:/^[A-Za-z\s]+$/|max:255', // Apenas letras e espaços
                'email' => 'required|email|unique:pessoas,email',
            ],
            [
                'nome.regex' => 'O nome deve conter apenas letras e espaços.',
            ],
        );

        try {
            $this->pessoa->create($validatedData);
            return redirect('/')->with('mensagem', 'Participante salvo com sucesso!');
        } catch (\Exception $e) {
            return redirect('/')->with('erro', 'Erro ao salvar participante: ' . $e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pessoa = $this->pessoa->findOrFail($id);
        return view('atualizar-pessoa', compact('pessoa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'nome'=> 'required|string|regex:/^[A-Za-z\s]+$/|max:255',
            'email'=> 'required|email|unique:pessoas,email',
        ],
        [
            'nome.required' => 'O campo nome é obrigatório.',
            'nome.regex' => 'O nome deve conter apenas letras e espaços.',
            'email.required' => 'O campo email é obrigatório.',
            'email.email' => 'O email informado não é válido.',
            'email.unique' => 'Este email já está cadastrado.',
        ]
    );

        try {
            $pessoa = $this->pessoa->findOrFail($id);
            $pessoa->update($validatedData);

            return redirect('/')->with('mensagem', 'Participante atualizado com sucesso!');
        } catch (\Exception $e) {
            return redirect('/editar/' . $id)->with('erro', 'Erro ao atualizar participante: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $pessoa = $this->pessoa->findOrFail($id);
            $pessoa->delete();

            return redirect('/')->with('mensagem', 'Participante excluído com sucesso!');
        } catch (\Exception $e) {
            return redirect('/')->with('erro', 'Erro ao excluir participante: ' . $e->getMessage());
        }
    }
}
