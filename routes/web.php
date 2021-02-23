<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});
Route::get('cadastro/pessoa', 'App\Http\Controllers\CadastroController@CadastroPessoa')->name('cadastropessoa');
Route::get('cadastroespec', 'App\Http\Controllers\CadastroController@CadastroEspecialidade')->name('cadastroespec');
Route::get('cadastro/cadastropaciente', 'App\Http\Controllers\CadastroController@CadastroPaciente')->name('cadastropaciente');
Route::get('cadastro/cadastrofornecedorfisico', 'App\Http\Controllers\CadastroController@CadastroFornecedorFisico')->name('cadastrofornecedorfisico');
Route::get('cadastro/cadastrofornecedorjuridico', 'App\Http\Controllers\CadastroController@CadastroFornecedorJuridico')->name('cadastrofornecedorjuridico');
Route::get('cadastro/cadastroclientejuridico', 'App\Http\Controllers\CadastroController@CadastroClienteJuridico')->name('cadastroclientejuridico');
Route::get('cadastro/cadastrofuncionario', 'App\Http\Controllers\CadastroController@CadastroFuncionario')->name('cadastrofuncionario');
Route::get('cadastro/cadastrodepartamento', 'App\Http\Controllers\CadastroController@CadastroDepartamento')->name('cadastrodepartamento');
Route::get('cadastro/cadastrosetor', 'App\Http\Controllers\CadastroController@CadastroSetor')->name('cadastrosetor');
Route::get('cadastro/cadastrofuncao', 'App\Http\Controllers\CadastroController@CadastroFuncao')->name('cadastrofuncao');
Route::get('consultacadastrodep', 'App\Http\Controllers\ConsultaController@ConsultaCadastroDepartamento')->name('consultacadastrodep');
Route::get('consultacadastroset', 'App\Http\Controllers\ConsultaController@ConsultaCadastroSetor')->name('consultacadastroset');
Route::get('consultacadastrofunc', 'App\Http\Controllers\ConsultaController@ConsultaCadastroFuncao')->name('consultacadastrofunc');