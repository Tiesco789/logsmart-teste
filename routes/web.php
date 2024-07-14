<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PessoaController;
use App\Http\Controllers\SorteioController;

Route::get('/', [PessoaController::class, 'index']);

Route::get('/cadastro', [PessoaController::class, 'create']);

Route::post('/cadastro', [PessoaController::class, 'store'])->name('cadastro');

Route::get('/editar/{id}', [PessoaController::class, 'edit'])->name('editar');
Route::put('/editar/{id}', [PessoaController::class, 'update'])->name('editado');

Route::delete('/excluir/{id}', [PessoaController::class, 'destroy'])->name('excluir');

Route::post('/sorteio', [SorteioController::class, 'realizarSorteio'])->name('sorteio');
Route::get('/historico', [SorteioController::class, 'historico'])->name('historico');
