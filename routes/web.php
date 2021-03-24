<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});
Route::get('cadastro/pessoa', 'App\Http\Controllers\CadastroController@CadastroPessoa')->name('cadastropessoa');
Route::get('cadastro/medico', 'App\Http\Controllers\CadastroController@CadastrarMedico')->name('cadastrarmedico');
Route::get('cadastro/produto', 'App\Http\Controllers\CadastroController@CadastrarProduto')->name('cadastrarproduto');
Route::get('cadastro/plano', 'App\Http\Controllers\CadastroController@CadastrarPlano')->name('cadastrarplano');
Route::get('cadastro/cadastroespecialidade', 'App\Http\Controllers\CadastroController@CadastroEspecialidade')->name('cadastroespec');
Route::get('cadastro/cadastropaciente', 'App\Http\Controllers\CadastroController@CadastroPaciente')->name('cadastropaciente');
Route::get('cadastro/cadastrofornecedorfisico', 'App\Http\Controllers\CadastroController@CadastroFornecedorFisico')->name('cadastrofornecedorfisico');
Route::get('cadastro/cadastrofornecedorjuridico', 'App\Http\Controllers\CadastroController@CadastroFornecedorJuridico')->name('cadastrofornecedorjuridico');
Route::get('cadastro/cadastroclientejuridico', 'App\Http\Controllers\CadastroController@CadastroClienteJuridico')->name('cadastroclientejuridico');
Route::get('cadastro/cadastromedico', 'App\Http\Controllers\CadastroController@CadastroMedico')->name('cadastromedico');
Route::get('cadastro/cadastrofuncionario', 'App\Http\Controllers\CadastroController@CadastroFuncionario')->name('cadastrofuncionario');
Route::get('cadastro/cadastroproduto', 'App\Http\Controllers\CadastroController@CadastroProduto')->name('cadastroproduto');
Route::get('cadastro/cadastroplano', 'App\Http\Controllers\CadastroController@CadastroPlano')->name('cadastroplano');
Route::get('cadastro/cadastrodepartamento', 'App\Http\Controllers\CadastroController@CadastroDepartamento')->name('cadastrodepartamento');
Route::get('cadastro/cadastrosetor', 'App\Http\Controllers\CadastroController@CadastroSetor')->name('cadastrosetor');
Route::get('cadastro/cadastrofuncao', 'App\Http\Controllers\CadastroController@CadastroFuncao')->name('cadastrofuncao');
Route::get('cadastro/cadastroservico', 'App\Http\Controllers\CadastroController@CadastroServico')->name('cadastroservico');
Route::get('cadastro/cadastrocategoria', 'App\Http\Controllers\CadastroController@CadastroCategoria')->name('cadastrocategoria');

Route::get('consultacadastrodep', 'App\Http\Controllers\ConsultaController@ConsultaCadastroDepartamento')->name('consultacadastrodep');
Route::get('consultacadastroset', 'App\Http\Controllers\ConsultaController@ConsultaCadastroSetor')->name('consultacadastroset');
Route::get('consultacadastrofunc', 'App\Http\Controllers\ConsultaController@ConsultaCadastroFuncao')->name('consultacadastrofunc');
Route::get('consultacadastroespec', 'App\Http\Controllers\ConsultaController@ConsultaCadastroEspecialidade')->name('consultacadastroespec');
Route::get('consultacadastroservimed', 'App\Http\Controllers\ConsultaController@ConsultaCadastroServicoMedico')->name('consultacadastroservimed');
Route::get('consultacadastrocate', 'App\Http\Controllers\ConsultaController@ConsultaCadastroCategoria')->name('consultacadastrocate');
Route::get('consultacadastroitem', 'App\Http\Controllers\ConsultaController@ConsultaCadastroItem')->name('consultacadastroitem');
Route::get('consultacadastroservi', 'App\Http\Controllers\ConsultaController@ConsultaCadastroServico')->name('consultacadastroservi');

Route::get('consulta/pessoa', 'App\Http\Controllers\ConsultaController@ConsultaPessoa')->name('consultapessoa');
Route::get('consulta/medico', 'App\Http\Controllers\ConsultaController@ConsultaMedico')->name('consultamedico');
Route::get('consulta/pessoa/nome', 'App\Http\Controllers\ConsultaController@ConsultaPessoaNome')->name('consultapessoanome');
Route::get('consulta/pessoa/dados', 'App\Http\Controllers\ConsultaController@ConsultaPessoaDados')->name('consultapessoadados');
Route::get('consulta/pessoa/dadosedit', 'App\Http\Controllers\ConsultaController@ConsultaPessoaEditar')->name('consultapessoaeditar');
Route::get('consulta/medico/nome', 'App\Http\Controllers\ConsultaController@ConsultaMedicoNome')->name('consultamediconome');
Route::get('consulta/medico/dados', 'App\Http\Controllers\ConsultaController@ConsultaMedicoDados')->name('consultamedicodados');
Route::get('consulta/medico/dadosedit', 'App\Http\Controllers\ConsultaController@ConsultaMedicoEditar')->name('consultamedicoeditar');
Route::get('consulta/medico/agenda', 'App\Http\Controllers\ConsultaController@ConsultaAgendaMedico')->name('consultaagendamedico');
Route::get('consulta/fornecedores', 'App\Http\Controllers\ConsultaController@ConsultaPessoaFornecedores')->name('consultapessoafornecedores');
Route::get('consulta/fornecedores/dados', 'App\Http\Controllers\ConsultaController@ConsultaPessoaFornecedoresDados')->name('consultapessoafornecedoresdados');

Route::get('editar/editarpaciente', 'App\Http\Controllers\EditarController@EditarPaciente')->name('editarpaciente');
Route::get('editar/editarmedico', 'App\Http\Controllers\EditarController@EditarMedico')->name('editarmedico');
Route::get('editar/editarfornecedorfisico', 'App\Http\Controllers\EditarController@EditarFornecedorFisico')->name('editarfornecedorfisico');
Route::get('editar/editarfornecedorjuridico', 'App\Http\Controllers\EditarController@EditarFornecedorJuridico')->name('editarfornecedorjuridico');
Route::get('editar/editarclientejuridico', 'App\Http\Controllers\EditarController@EditarClienteJuridico')->name('editarclientejuridico');
Route::get('editar/editarfuncionario', 'App\Http\Controllers\EditarController@EditarFuncionario')->name('editarfuncionario');

Route::get('horaatendimento', 'App\Http\Controllers\CadastroController@HoraAtendimento')->name('horaatendimento');
Route::get('cadastro/cadastroagenda', 'App\Http\Controllers\CadastroController@CadastroAgenda')->name('cadastroagenda');
