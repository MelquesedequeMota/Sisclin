<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});
Route::get('cadastro/pessoa', 'App\Http\Controllers\CadastroController@CadastroPessoa')->name('cadastropessoa');
Route::get('cadastroespec', 'App\Http\Controllers\CadastroController@CadastroEspecialidade')->name('cadastroespec');
Route::get('cadastro/cadastropaciente', 'App\Http\Controllers\CadastroController@CadastroPaciente')->name('cadastropaciente');
Route::get('cadastro/cadastrofornecedorfisico', 'App\Http\Controllers\CadastroController@CadastroFornecedorFisico')->name('cadastrofornecedorfisisco');