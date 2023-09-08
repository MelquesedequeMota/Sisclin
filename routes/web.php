<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
   // return view('layouts.Menu');
   return view('Login');
});
Route::get('/1', function () {
    return view('layouts.atalhos');
});



Route::get('login', 'App\Http\Controllers\LoginController@Login')->name('login');
Route::get('logar', 'App\Http\Controllers\LoginController@Logar')->name('logar');
Route::get('loginpass', 'App\Http\Controllers\LoginController@LoginPass')->name('loginpass');
Route::get('logout', 'App\Http\Controllers\LoginController@LogOut')->name('logout');
// ## Rotas de teste
// Route::get('/menu', function(){
    
// });r@Logar')->name('logar');
Route::get('logout', 'App\Http\Controllers\LoginController@LogOut')->name('logout');
// ## Rotas de teste
// Route::get('/menu', function(){
    
// });r@Logar')->name('logar');
Route::get('logout', 'App\Http\Controllers\LoginController@LogOut')->name('logout');
// ## Rotas de teste
// Route::get('/menu', function(){
    
// });

Route::get('consulta/produto/dados/{nomeproduto}', 'App\Http\Controllers\ConsultaController@ConsultaProdutoDados2')->name('consultaprodutodados2');
Route::get('passarirnducash', 'App\Http\Controllers\CadastroController@PassarIRNDucash')->name('passarirnducash');
Route::get('transflotes', 'App\Http\Controllers\CadastroController@TransfLotes')->name('transflotes');



Route::middleware(['middleware' => 'auth'])->group(function () {

    Route::get('home/colaborador', 'App\Http\Controllers\HomeController@HomeColaborador')->name('homecolaborador');
    Route::get('prontuario', 'App\Http\Controllers\CadastroController@CadastroProntuario')->name('prontuario');
    Route::get('cadastro/pessoa', 'App\Http\Controllers\CadastroController@CadastroPessoa')->name('cadastropessoa');
    Route::get('cadastro/medico', 'App\Http\Controllers\CadastroController@CadastrarMedico')->name('cadastrarmedico');
    Route::get('cadastro/produto', 'App\Http\Controllers\CadastroController@CadastrarProduto')->name('cadastrarproduto');
    Route::get('cadastro/plano', 'App\Http\Controllers\CadastroController@CadastrarPlano')->name('cadastrarplano');
    Route::get('cadastro/contrato', 'App\Http\Controllers\CadastroController@CadastrarContrato')->name('cadastrarcontrato');
    Route::get('cadastro/agenda', 'App\Http\Controllers\CadastroController@CadastrarAgenda')->name('cadastraragenda');
    Route::get('cadastro/laboratorio', 'App\Http\Controllers\CadastroController@CadastrarLaboratorio')->name('cadastrolaboratorio');
    Route::get('cadastro/ultrassom', 'App\Http\Controllers\CadastroController@CadastrarUltrassom')->name('cadastroultrassom');
    Route::get('cadastro/raiox', 'App\Http\Controllers\CadastroController@CadastrarRaioX')->name('cadastroraiox');
    Route::get('cadastro/especialidades', 'App\Http\Controllers\CadastroController@CadastrarEspecialidades')->name('cadastroespecialidades');
    // Route::get('cadastro/exame', 'App\Http\Controllers\CadastroController@CadastrarExames')->name('cadastroexames');
    Route::get('cadastro/cadastroespecialidade', 'App\Http\Controllers\CadastroController@CadastroEspecialidade')->name('cadastroespec');
    Route::get('cadastro/cadastropaciente', 'App\Http\Controllers\CadastroController@CadastroPaciente')->name('cadastropaciente');
    Route::get('cadastro/cadastrofornecedorfisico', 'App\Http\Controllers\CadastroController@CadastroFornecedorFisico')->name('cadastrofornecedorfisico');
    Route::get('cadastro/cadastrofornecedorjuridico', 'App\Http\Controllers\CadastroController@CadastroFornecedorJuridico')->name('cadastrofornecedorjuridico');
    Route::get('cadastro/cadastroclientejuridico', 'App\Http\Controllers\CadastroController@CadastroClienteJuridico')->name('cadastroclientejuridico');
    Route::get('cadastro/cadastromedico', 'App\Http\Controllers\CadastroController@CadastroMedico')->name('cadastromedico');
    Route::get('cadastro/cadastrofuncionario', 'App\Http\Controllers\CadastroController@CadastroFuncionario')->name('cadastrofuncionario');
    Route::get('cadastro/cadastrousuario', 'App\Http\Controllers\CadastroController@CadastroUsuario')->name('cadastrousuario');
    Route::get('cadastro/cadastroproduto', 'App\Http\Controllers\CadastroController@CadastroProduto')->name('cadastroproduto');
    Route::get('cadastro/cadastroplano', 'App\Http\Controllers\CadastroController@CadastroPlano')->name('cadastroplano');
    Route::get('cadastro/cadastrocontrato', 'App\Http\Controllers\CadastroController@CadastroContrato')->name('cadastrocontrato');
    Route::get('cadastro/cadastrodepartamento', 'App\Http\Controllers\CadastroController@CadastroDepartamento')->name('cadastrodepartamento');
    Route::get('cadastro/cadastrosetor', 'App\Http\Controllers\CadastroController@CadastroSetor')->name('cadastrosetor');
    Route::get('cadastro/cadastrofuncao', 'App\Http\Controllers\CadastroController@CadastroFuncao')->name('cadastrofuncao');
    Route::get('cadastro/cadastroservico', 'App\Http\Controllers\CadastroController@CadastroServico')->name('cadastroservico');
    Route::get('cadastro/cadastrocategoria', 'App\Http\Controllers\CadastroController@CadastroCategoria')->name('cadastrocategoria');
    Route::get('cadastro/cadastroagendamedico', 'App\Http\Controllers\CadastroController@CadastroAgendaMedico')->name('cadastroagendamedico');
    Route::get('cadastro/cadastrolaboratorio', 'App\Http\Controllers\CadastroController@CadastroLaboratorio')->name('cadastrarlaboratorio');
    Route::get('cadastro/cadastroagenda', 'App\Http\Controllers\CadastroController@CadastroAgenda')->name('cadastroagenda');
    Route::get('cadastro/cadastroeventocalendario', 'App\Http\Controllers\CadastroController@CadastroEventoCalendario')->name('cadastroeventocalendario');
    Route::get('cadastro/cadastroatendimento', 'App\Http\Controllers\CadastroController@CadastroAtendimento')->name('cadastroatendimento');
    Route::get('cadastro/cadastronovoultrassom', 'App\Http\Controllers\CadastroController@CadastroNovoUltrassom')->name('cadastronovoultrassom');
    Route::get('cadastro/cadastroraiox', 'App\Http\Controllers\CadastroController@CadastroRaioX')->name('cadastronovoraiox');
    Route::get('cadastro/cadastroexame', 'App\Http\Controllers\CadastroController@CadastroExame')->name('cadastroexame');
    Route::get('cadastro/cadastrocategoriaexame', 'App\Http\Controllers\CadastroController@CadastroCategoriaExame')->name('cadastronovocategoriaexame');
    Route::get('cadastro/novohorariomedico', 'App\Http\Controllers\CadastroController@CadastroNovoHorarioMedico')->name('novohorariomedico');
    Route::get('cadastro/salvarlistaexames', 'App\Http\Controllers\CadastroController@CadastroSalvarListExames')->name('salvarlistaexames');

    Route::get('consultapessoausuario', 'App\Http\Controllers\ConsultaController@ConsultaPessoaUsuario')->name('consultapessoausuario');
    Route::get('consultamedicousuario', 'App\Http\Controllers\ConsultaController@ConsultaMedicoUsuario')->name('consultamedicousuario');
    Route::get('consultacadastrodep', 'App\Http\Controllers\ConsultaController@ConsultaCadastroDepartamento')->name('consultacadastrodep');
    Route::get('consultatodosplanos', 'App\Http\Controllers\ConsultaController@ConsultaTodosPlanos')->name('consultatodosplanos');
    Route::get('consultarplano', 'App\Http\Controllers\ConsultaController@ConsultarPlano')->name('consultarplano');
    Route::get('consultacadastroset', 'App\Http\Controllers\ConsultaController@ConsultaCadastroSetor')->name('consultacadastroset');
    Route::get('consultacadastrofunc', 'App\Http\Controllers\ConsultaController@ConsultaCadastroFuncao')->name('consultacadastrofunc');
    Route::get('consultacadastroespec', 'App\Http\Controllers\ConsultaController@ConsultaCadastroEspecialidade')->name('consultacadastroespec');
    Route::get('consultacadastroservimed', 'App\Http\Controllers\ConsultaController@ConsultaCadastroServicoMedico')->name('consultacadastroservimed');
    Route::get('consultacadastrocate', 'App\Http\Controllers\ConsultaController@ConsultaCadastroCategoria')->name('consultacadastrocate');
    Route::get('consultacate', 'App\Http\Controllers\ConsultaController@ConsultaCategoria')->name('consultacate');
    Route::get('consultacadastrocateexame', 'App\Http\Controllers\ConsultaController@ConsultaCadastroCategoriaExame')->name('consultacadastrocateexame');
    Route::get('consultacadastroitem', 'App\Http\Controllers\ConsultaController@ConsultaCadastroItem')->name('consultacadastroitem');
    Route::get('consultacadastroservi', 'App\Http\Controllers\ConsultaController@ConsultaCadastroServico')->name('consultacadastroservi');
    Route::get('consultaespecmedico', 'App\Http\Controllers\ConsultaController@ConsultaEspecialidadeMedico')->name('consultaespecmedico');
    Route::get('consultaagendamedico', 'App\Http\Controllers\ConsultaController@ConsultaAgendadeMedico')->name('consultaagendamedico');
    Route::get('consultaagendamedicos', 'App\Http\Controllers\ConsultaController@ConsultaAgendadeMedicos')->name('consultaagendamedicos');
    Route::get('consultaagendaatendimentos', 'App\Http\Controllers\ConsultaController@ConsultaAgendaAtendimentos')->name('consultaagendaatendimentos');
    Route::get('consultaagendamedicodia', 'App\Http\Controllers\ConsultaController@ConsultaAgendadeMedicoDia')->name('consultaagendamedicodia');
    Route::get('consultaagendahorario', 'App\Http\Controllers\ConsultaController@ConsultaAgendaHorario')->name('consultaagendahorario');
    Route::get('consultaagendacolaborador', 'App\Http\Controllers\ConsultaController@ConsultaAgendaColaborador')->name('consultaagendacolaborador');
    Route::get('consultaletraordem', 'App\Http\Controllers\ConsultaController@ConsultaLetraOrdem')->name('consultaletraordem');

    //FIGMA
    Route::get('consulta/pessoa', 'App\Http\Controllers\ConsultaController@ConsultaPessoa')->name('consultapessoa');
    Route::get('consulta/medico', 'App\Http\Controllers\ConsultaController@ConsultaMedico')->name('consultamedico');
    Route::get('consulta/produto', 'App\Http\Controllers\ConsultaController@ConsultaProduto')->name('consultaproduto');
    Route::get('consulta/plano', 'App\Http\Controllers\ConsultaController@ConsultaPlano')->name('consultaplano');
    Route::get('consulta/contrato', 'App\Http\Controllers\ConsultaController@ConsultaContrato')->name('consultacontrato');
    Route::get('consulta/laboratorio', 'App\Http\Controllers\ConsultaController@ConsultaLaboratorio')->name('consultalaboratorio');
    Route::get('consulta/ultrassom', 'App\Http\Controllers\ConsultaController@ConsultaUltrassom')->name('consultaultrassom');
    Route::get('consulta/raiox', 'App\Http\Controllers\ConsultaController@ConsultaRaioX')->name('consultaraiox');
    Route::get('consulta/exame', 'App\Http\Controllers\ConsultaController@ConsultaExame')->name('consultaexame');
    //FIM FIGMA

    Route::get('consulta/laboratorio/dados', 'App\Http\Controllers\ConsultaController@ConsultaLaboratorioDados')->name('consultalaboratoriodados');
    Route::get('consulta/laboratorio/dadosedit', 'App\Http\Controllers\ConsultaController@ConsultaLaboratorioDadosEditar')->name('consultalaboratoriodadosedit');
    Route::get('consulta/pessoa/nome', 'App\Http\Controllers\ConsultaController@ConsultaPessoaNome')->name('consultapessoanome');
    Route::get('consulta/pessoa/nomecpf', 'App\Http\Controllers\ConsultaController@ConsultaPessoaNomeCPF')->name('consultapessoanomecpf');
    Route::get('consulta/pessoa/dados', 'App\Http\Controllers\ConsultaController@ConsultaPessoaDados')->name('consultapessoadados');
    Route::get('consulta/pessoa/dadoscount', 'App\Http\Controllers\ConsultaController@ConsultaPessoaDadosCount')->name('consultapessoadadoscount');
    Route::get('consulta/pessoa/dadosedit', 'App\Http\Controllers\ConsultaController@ConsultaPessoaEditar')->name('consultapessoaeditar');
    Route::get('consulta/pessoa/dadosedit2', 'App\Http\Controllers\ConsultaController@ConsultaPessoaEditar2')->name('consultapessoaeditar2');
    Route::get('dadoscontrato', 'App\Http\Controllers\ConsultaController@ConsultaDadosContrato')->name('dadoscontrato');

    Route::get('consulta/medico/nome', 'App\Http\Controllers\ConsultaController@ConsultaMedicoNome')->name('consultamediconome');
    Route::get('consulta/medico/dados', 'App\Http\Controllers\ConsultaController@ConsultaMedicoDados')->name('consultamedicodados');
    Route::get('consulta/medico/dadosedit', 'App\Http\Controllers\ConsultaController@ConsultaMedicoEditar')->name('consultamedicoeditar');
    Route::get('consulta/medico/agenda', 'App\Http\Controllers\ConsultaController@ConsultaAgendaMedico')->name('consultaragendamedico');
    Route::get('consulta/fornecedores', 'App\Http\Controllers\ConsultaController@ConsultaPessoaFornecedores')->name('consultapessoafornecedores');
    Route::get('consulta/fornecedores/dados', 'App\Http\Controllers\ConsultaController@ConsultaPessoaFornecedoresDados')->name('consultapessoafornecedoresdados');
    Route::get('consulta/produto/nome', 'App\Http\Controllers\ConsultaController@ConsultaProdutoNome')->name('consultaprodutonome');
    Route::get('consulta/produto/dados', 'App\Http\Controllers\ConsultaController@ConsultaProdutoDados')->name('consultaprodutodados');
    Route::get('consulta/produto/dadosedit', 'App\Http\Controllers\ConsultaController@ConsultaProdutoEditar')->name('consultaprodutoeditar');
    Route::get('consulta/plano/nome', 'App\Http\Controllers\ConsultaController@ConsultaPlanoNome')->name('consultaplanonome');
    Route::get('consulta/plano/dados', 'App\Http\Controllers\ConsultaController@ConsultaPlanoDados')->name('consultaplanodados');
    Route::get('consulta/plano/dadosedit', 'App\Http\Controllers\ConsultaController@ConsultaPlanoEditar')->name('consultaplanoeditar');
    Route::get('consulta/ultrassom/nome', 'App\Http\Controllers\ConsultaController@ConsultaUltrassomNome')->name('consultaultrassomnome');
    Route::get('consulta/ultrassom/dados', 'App\Http\Controllers\ConsultaController@ConsultaUltrassomDados')->name('consultaultrassomdados');
    Route::get('consulta/ultrassom/dadosedit', 'App\Http\Controllers\ConsultaController@ConsultaUltrassomEditar')->name('consultaultrassomeditar');
    Route::get('consulta/raiox/nome', 'App\Http\Controllers\ConsultaController@ConsultaRaioXNome')->name('consultaraioxnome');
    Route::get('consulta/raiox/dados', 'App\Http\Controllers\ConsultaController@ConsultaRaioXDados')->name('consultaraioxdados');
    Route::get('consulta/raiox/dadosedit', 'App\Http\Controllers\ConsultaController@ConsultaRaioXEditar')->name('consultaraioxeditar');
    Route::get('consulta/exame/nome', 'App\Http\Controllers\ConsultaController@ConsultaExameNome')->name('consultaexamenome');
    Route::get('consulta/exame/dados', 'App\Http\Controllers\ConsultaController@ConsultaExameDados')->name('consultaexamedados');
    Route::get('consulta/exame/dadosedit', 'App\Http\Controllers\ConsultaController@ConsultaExameEditar')->name('consultaexameeditar');
    Route::get('consulta/contrato/nome', 'App\Http\Controllers\ConsultaController@ConsultaContratoNome')->name('consultacontratonome');
    Route::get('consulta/contrato/dados', 'App\Http\Controllers\ConsultaController@ConsultaContratoDados')->name('consultacontratodados');
    Route::get('consulta/cateexame/dados', 'App\Http\Controllers\ConsultaController@ConsultaCategoriasExameDados')->name('consultacateexamedados');
    Route::get('consulta/contratotitu/dados', 'App\Http\Controllers\ConsultaController@ConsultaContratoTitularDados')->name('consultacontratotitudados');
    Route::get('consulta/contratodep/dados', 'App\Http\Controllers\ConsultaController@ConsultaContratoDependenteDados')->name('consultacontratodepdados');
    Route::get('consulta/contrato/plano', 'App\Http\Controllers\ConsultaController@ConsultaPlanoContrato')->name('consultaplanocontrato');
    Route::get('consulta/contrato/dadosedit', 'App\Http\Controllers\ConsultaController@ConsultaContratoEditar')->name('consultacontratoeditar');
    Route::get('consulta/agenda/nomecontrato', 'App\Http\Controllers\ConsultaController@ConsultaAgendaNomeContrato')->name('consultaagendanomecontrato');
    Route::get('consultanomecpf', 'App\Http\Controllers\ConsultaController@ConsultaNomeCPF')->name('consultanomecpf');
    Route::get('consultanomefornecedores', 'App\Http\Controllers\ConsultaController@ConsultaNomeFornecedores')->name('consultanomefornecedores');
    Route::get('consulta/agenda/nomevendedor', 'App\Http\Controllers\ConsultaController@ConsultaAgendaNomeVendedor')->name('consultaagendanomevendedor');
    Route::get('consulta/agenda/checaragenda', 'App\Http\Controllers\ConsultaController@ConsultaAgendaChegarAgenda')->name('consultaagendachecaragenda');
    Route::get('consulta/atendimento', 'App\Http\Controllers\ConsultaController@ConsultaAtendimento')->name('consultaatendimento');
    Route::get('consulta/listagendamedico', 'App\Http\Controllers\ConsultaController@ConsultaListAgendaMedico')->name('consultalistagendamedico');
    Route::get('consulta/listagendacliente', 'App\Http\Controllers\ConsultaController@ConsultaListAgendaCliente')->name('consultalistagendacliente');
    Route::get('consulta/listexamescliente', 'App\Http\Controllers\ConsultaController@ConsultaListExamesCliente')->name('consultalistexamescliente');
    Route::get('consulta/listexamespossiveis', 'App\Http\Controllers\ConsultaController@ConsultaListExamesPossiveis')->name('consultalistexamespossiveis');

    Route::get('editar/editarpaciente', 'App\Http\Controllers\EditarController@EditarPaciente')->name('editarpaciente');
    Route::get('editar/editarmedico', 'App\Http\Controllers\EditarController@EditarMedico')->name('editarmedico');
    Route::get('editar/editarproduto', 'App\Http\Controllers\EditarController@EditarProduto')->name('editarproduto');
    Route::post('editar/editarplano', 'App\Http\Controllers\EditarController@EditarPlano')->name('editarplano');
    Route::get('editar/editarcontrato', 'App\Http\Controllers\EditarController@EditarContrato')->name('editarcontrato');
    Route::get('editar/editarultrassom', 'App\Http\Controllers\EditarController@EditarUltrassom')->name('editarultrassom');
    Route::get('editar/editarraiox', 'App\Http\Controllers\EditarController@EditarRaioX')->name('editarraiox');
    Route::get('editar/editarexame', 'App\Http\Controllers\EditarController@EditarExame')->name('editarexame');
    Route::get('editar/editarfornecedorfisico', 'App\Http\Controllers\EditarController@EditarFornecedorFisico')->name('editarfornecedorfisico');
    Route::get('editar/editarfornecedorjuridico', 'App\Http\Controllers\EditarController@EditarFornecedorJuridico')->name('editarfornecedorjuridico');
    Route::get('editar/editarclientejuridico', 'App\Http\Controllers\EditarController@EditarClienteJuridico')->name('editarclientejuridico');
    Route::get('editar/editarfuncionario', 'App\Http\Controllers\EditarController@EditarFuncionario')->name('editarfuncionario');
    Route::get('editar/editarlaboratorio', 'App\Http\Controllers\EditarController@EditarLaboratorio')->name('editarlaboratorio');
    Route::get('editar/editareventocalendario', 'App\Http\Controllers\EditarController@EditarEventoCalendario')->name('editareventocalendario');
    Route::get('editar/edithorariomedico', 'App\Http\Controllers\EditarController@EditHorarioMedico')->name('editaredithorariomedico');

    Route::get('excluir/excluirpaciente', 'App\Http\Controllers\ApagarController@ExcluirPaciente')->name('excluirpaciente');
    Route::get('excluir/checarpessoa', 'App\Http\Controllers\ApagarController@ChecarPessoa')->name('checarpessoa');
    Route::get('excluir/excluircontrato', 'App\Http\Controllers\ApagarController@ExcluirContrato')->name('excluircontrato');

    Route::get('apagar/apagareventocalendario', 'App\Http\Controllers\ApagarController@ApagarEventoCalendario')->name('apagareventocalendario');
    Route::get('apagar/excluirhorariomedico', 'App\Http\Controllers\ApagarController@ExcluirHorarioMedico')->name('excluirhorariomedico');
    Route::get('horaatendimento', 'App\Http\Controllers\CadastroController@HoraAtendimento')->name('horaatendimento');
    
    Route::get('pdv', 'App\Http\Controllers\PDVController@PDVMain')->name('pdv');
    Route::get('pdvcaixas', 'App\Http\Controllers\PDVController@PDVCaixas')->name('pdvcaixas');
    Route::get('pdvcaixanovo', 'App\Http\Controllers\PDVController@PDVCaixaNovo')->name('pdvcaixanovo');
    Route::get('pdvabrircaixa', 'App\Http\Controllers\PDVController@PDVAbrirCaixa')->name('pdvabrircaixa');
    Route::get('pdvdeppagexcluir', 'App\Http\Controllers\PDVController@PdvDepPagExcluir')->name('pdvdeppagexcluir');
    Route::get('pdvfecharcaixa', 'App\Http\Controllers\PDVController@PDVFecharCaixa')->name('pdvfecharcaixa');
    Route::get('pdvchamar', 'App\Http\Controllers\PDVController@PDVChamar')->name('pdvchamar');
    Route::get('pdvdeppag', 'App\Http\Controllers\PDVController@PDVDepPag')->name('pdvdeppag');
    Route::get('pdvconsultaproduto', 'App\Http\Controllers\PDVController@PDVConsultaProduto')->name('pdvconsultaproduto');
    Route::get('pdvconcluirpagamento', 'App\Http\Controllers\PDVController@PDVConcluirPagamento')->name('pdvconcluirpagamento');
    Route::get('fluxodecaixa', 'App\Http\Controllers\PDVController@FluxoDeCaixa')->name('fluxodecaixacaixa');
    Route::get('tesouraria', 'App\Http\Controllers\PDVController@Tesouraria')->name('tesourariacaixa');
    Route::get('fluxocaixas', 'App\Http\Controllers\PDVController@FluxoCaixas')->name('fluxocaixas');
    Route::get('novaentrada', 'App\Http\Controllers\PDVController@NovaEntrada')->name('novaentrada');
    Route::get('novasaida', 'App\Http\Controllers\PDVController@NovaSaida')->name('novasaida');
    Route::get('novasangria', 'App\Http\Controllers\PDVController@NovaSangria')->name('novasangria');
    Route::get('novaentradapdv', 'App\Http\Controllers\PDVController@NovaEntradaPDV')->name('novaentradapdv');
    Route::get('novasaidapdv', 'App\Http\Controllers\PDVController@NovaSaidaPDV')->name('novasaidapdv');
    Route::get('novasangriapdv', 'App\Http\Controllers\PDVController@NovaSangriaPDV')->name('novasangriapdv');
    Route::get('buscardadoscaixa', 'App\Http\Controllers\PDVController@BuscarDadosCaixa')->name('buscardadoscaixa');
    Route::get('buscardadoscaixapdv', 'App\Http\Controllers\PDVController@BuscarDadosCaixaPDV')->name('buscardadoscaixapdv');
    Route::get('buscarentradascaixa', 'App\Http\Controllers\PDVController@BuscarEntradasCaixa')->name('buscarentradascaixa');
    Route::get('buscarsaidascaixa', 'App\Http\Controllers\PDVController@BuscarSaidasCaixa')->name('buscarsaidascaixa');
    Route::get('buscarsangriascaixa', 'App\Http\Controllers\PDVController@BuscarSangriasCaixa')->name('buscarsangriascaixa');
    Route::get('buscaradesoescaixa', 'App\Http\Controllers\PDVController@BuscarAdesoesCaixa')->name('buscaradesoescaixa');
    Route::get('valorescaixa', 'App\Http\Controllers\PDVController@ValoresCaixa')->name('valorescaixa');
    Route::get('recebercaixaconfirm', 'App\Http\Controllers\PDVController@ReceberCaixaConfirm')->name('recebercaixaconfirm');

    Route::get('pdvaddproduto', 'App\Http\Controllers\PDVController@PDVAddProduto')->name('pdvaddproduto');
    Route::get('pdvdeppagpreencher', 'App\Http\Controllers\PDVController@PDVDepPagPreencher')->name('pdvdeppagpreencher');
    Route::get('pdvdeppagservmed', 'App\Http\Controllers\PDVController@PDVDepPagServMed')->name('pdvdeppagservmed');
    Route::get('pdvadesao', 'App\Http\Controllers\PDVController@PDVAdesao')->name('pdvadesao');
    Route::get('confirmarpagamentoadesao', 'App\Http\Controllers\PDVController@ConfirmarPagamentoAdesao')->name('confirmarpagamentoadesao');

    Route::get('atendimento', 'App\Http\Controllers\HomeController@Atendimento')->name('atendimento');
    Route::get('totem', 'App\Http\Controllers\TotemController@Totem')->name('totem');
    Route::get('totem/novonormal', 'App\Http\Controllers\TotemController@TotemNovoNormal')->name('totemnovonormal');
    Route::get('totem/novopreferencial', 'App\Http\Controllers\TotemController@TotemNovopreferencial')->name('totemnovopreferencial');
    Route::get('home/salvaraudio', 'App\Http\Controllers\HomeController@SalvarAudio')->name('salvaraudio');
    Route::get('home/pegartotems', 'App\Http\Controllers\TotemController@PegarTotems')->name('pegartotems');
    Route::get('home/fechartotem', 'App\Http\Controllers\TotemController@FecharTotem')->name('fechartotem');
    Route::get('painelatendimento', 'App\Http\Controllers\HomeController@PainelAtendimento')->name('painelatendimento');
    Route::get('cadastraraviso', 'App\Http\Controllers\CadastroController@CadastrarAviso')->name('cadastraraviso');
    Route::get('editaraviso', 'App\Http\Controllers\EditarController@EditarAviso')->name('editaraviso');
    Route::get('excluiraviso', 'App\Http\Controllers\ApagarController@ExcluirAviso')->name('excluiraviso');
    Route::get('consultaraviso', 'App\Http\Controllers\ConsultaController@ConsultarAviso')->name('consultaraviso');
    Route::post('cadastro/produto/imagem', 'App\Http\Controllers\CadastroController@CadastrarProdutoImagem')->name('cadastrarprodutoimagem');
    

    Route::get('home/medico', 'App\Http\Controllers\MedicoController@MedicoMain')->name('homemedico');
    Route::get('laboratorioslivres', 'App\Http\Controllers\MedicoController@MedicoLaboratoriosLivres')->name('laboratorioslivres');
    Route::get('medicolistapac', 'App\Http\Controllers\MedicoController@MedicoListaPac')->name('medicolistapac');
    Route::get('listapacserv', 'App\Http\Controllers\MedicoController@MedicoListaPacServ')->name('listapacserv');
    Route::get('iniciaratendimento', 'App\Http\Controllers\MedicoController@MedicoIniciarAtendimento')->name('iniciaratendimento');
    Route::get('retornoatendimento', 'App\Http\Controllers\MedicoController@MedicoRetornoAtendimento')->name('retornoatendimento');
    Route::get('finalizaratendimento', 'App\Http\Controllers\MedicoController@MedicoFinalizarAtendimento')->name('finalizaratendimento');
    Route::get('medicochamar', 'App\Http\Controllers\MedicoController@MedicoChamar')->name('medicochamar');
    Route::get('medicodadoscliente', 'App\Http\Controllers\MedicoController@MedicoDadosCliente')->name('medicodadoscliente');
    Route::get('novohpp', 'App\Http\Controllers\MedicoController@NovoHpp')->name('novohpp');
    Route::get('listhpp', 'App\Http\Controllers\MedicoController@ListHpp')->name('listhpp');
    Route::get('apagarhpp', 'App\Http\Controllers\MedicoController@ApagarHpp')->name('apagarhpp');
    Route::get('salvarhistfamilia', 'App\Http\Controllers\MedicoController@SalvarHistFamilia')->name('salvarhistfamilia');
    Route::get('histfamilias', 'App\Http\Controllers\MedicoController@HistFamilias')->name('histfamilias');
    Route::get('novotratamento', 'App\Http\Controllers\MedicoController@NovoTratamento')->name('novotratamento');
    Route::get('listtratamento', 'App\Http\Controllers\MedicoController@ListTratamento')->name('listtratamento');
    Route::get('abrirtratamento', 'App\Http\Controllers\MedicoController@AbrirTratamento')->name('abrirtratamento');
    Route::get('atttratamento', 'App\Http\Controllers\MedicoController@AttTratamento')->name('atttratamento');
    Route::get('novaevolucao', 'App\Http\Controllers\MedicoController@NovaEvolucao')->name('novaevolucao');
    Route::get('listevolucao', 'App\Http\Controllers\MedicoController@ListEvolucao')->name('listevolucao');
    Route::get('removerevolucao', 'App\Http\Controllers\MedicoController@RemoverEvolucao')->name('removerevolucao');
    Route::get('listservicos', 'App\Http\Controllers\MedicoController@ListServicos')->name('listservicos');
    Route::get('novoprocedimento', 'App\Http\Controllers\MedicoController@NovoProcedimento')->name('novoprocedimento');
    Route::get('listprocedimento', 'App\Http\Controllers\MedicoController@ListProcedimento')->name('listprocedimento');
    Route::get('listatendimentoexames', 'App\Http\Controllers\MedicoController@ListAtendimentoExames')->name('listatendimentoexames');
    Route::get('removerprocedimento', 'App\Http\Controllers\MedicoController@RemoverProcedimento')->name('removerprocedimento');
    Route::get('editprocedimento', 'App\Http\Controllers\MedicoController@EditProcedimento')->name('editprocedimento');
    Route::get('attdadospac', 'App\Http\Controllers\MedicoController@AttDadosPac')->name('attdadospac');
    Route::get('finalizartratamento', 'App\Http\Controllers\MedicoController@FinalizarTratamento')->name('finalizartratamento');

    Route::get('pdv/recibo', 'App\Http\Controllers\PDVController@Recibo')->name('recibo');
    Route::get('financeiro/planodecontas', 'App\Http\Controllers\FinanceiroController@PlanoDeContas')->name('planodecontas');
    Route::get('financeiro/fluxodecaixa', 'App\Http\Controllers\FinanceiroController@FluxoDeCaixa')->name('fluxodecaixa');
    Route::get('financeiro/reajuste', 'App\Http\Controllers\FinanceiroController@Reajuste')->name('reajuste');
    Route::get('cadastrarplanocontas', 'App\Http\Controllers\FinanceiroController@CadastrarPlanoContas')->name('cadastrarplanocontas');
    Route::get('editarplanocontas', 'App\Http\Controllers\FinanceiroController@EditarPlanoContas')->name('editarplanocontas');
    Route::get('removerplanocontas', 'App\Http\Controllers\FinanceiroController@RemoverPlanoContas')->name('removerplanocontas');
    Route::get('listplanocontas', 'App\Http\Controllers\FinanceiroController@ListPlanoContas')->name('listplanocontas');
    Route::get('listplanocontascategoria', 'App\Http\Controllers\FinanceiroController@ListPlanoContasCategoria')->name('listplanocontascategoria');
    Route::get('consultadespesasapagar', 'App\Http\Controllers\FinanceiroController@ConsultaDespesasaPagar')->name('consultadespesasapagar');
    Route::get('consultadespesaspagas', 'App\Http\Controllers\FinanceiroController@ConsultaDespesasPagas')->name('consultadespesaspagas');
    Route::get('consultareceitasapagar', 'App\Http\Controllers\FinanceiroController@ConsultaReceitasaPagar')->name('consultareceitasapagar');
    Route::get('consultareceitaspagas', 'App\Http\Controllers\FinanceiroController@ConsultaReceitasPagas')->name('consultareceitaspagas');
    Route::get('consultafluxocaixa', 'App\Http\Controllers\FinanceiroController@ConsultaFluxoCaixa')->name('consultafluxocaixa');
    Route::get('consultadespesasereceitas', 'App\Http\Controllers\FinanceiroController@ConsultaDespesasEReceitas')->name('consultadespesasereceitas');
    Route::get('consultaplanocontas', 'App\Http\Controllers\FinanceiroController@ConsultaPlanoContas')->name('consultaplanocontas');
    Route::get('buscarfornecedores', 'App\Http\Controllers\FinanceiroController@BuscarFornecedores')->name('buscarfornecedores');
    Route::get('buscarplanocontas', 'App\Http\Controllers\FinanceiroController@BuscarPlanoContas')->name('buscarplanocontas');
    Route::get('novacontapagar', 'App\Http\Controllers\FinanceiroController@NovaContaPagar')->name('novacontapagar');
    Route::get('editcontapagar', 'App\Http\Controllers\FinanceiroController@EditContaPagar')->name('editcontapagar');
    Route::get('estornarcontareceber', 'App\Http\Controllers\FinanceiroController@EstornarContaReceber')->name('estornarcontareceber');
    Route::get('pagarcontareceber', 'App\Http\Controllers\FinanceiroController@PagarContaReceber')->name('pagarcontareceber');
    Route::get('financeiro/excluirdespesas', 'App\Http\Controllers\FinanceiroController@ExcluirDespesas')->name('excluirdespesas');
    Route::get('financeiro/excluirreceitas', 'App\Http\Controllers\FinanceiroController@ExcluirReceitas')->name('excluirreceitas');
    Route::get('financeiro/editcontapagar', 'App\Http\Controllers\FinanceiroController@EditarDespesas')->name('editardespesas');

    Route::get('solicitacaoultrassom', 'App\Http\Controllers\MedicoController@MedicoSolicitacaoUltrassom')->name('solicitacaoultrassom');
    Route::get('cadastrarsoliciult', 'App\Http\Controllers\MedicoController@MedicoCadastrarSolicitacaoUltrassom')->name('cadastrarsoliciult');
    Route::get('solicitacaoraiox', 'App\Http\Controllers\MedicoController@MedicoSolicitacaoRaiox')->name('solicitacaoraiox');
    Route::get('cadastrarsoliciraiox', 'App\Http\Controllers\MedicoController@MedicoCadastrarSolicitacaoRaioX')->name('cadastrarsoliciraiox');
    Route::get('solicitacaoexame', 'App\Http\Controllers\MedicoController@MedicoSolicitacaoExames')->name('solicitacaoexame');
    Route::get('cadastrarsoliciexame', 'App\Http\Controllers\MedicoController@MedicoCadastrarSolicitacaoExames')->name('cadastrarsoliciexame');
    Route::get('receitamedica', 'App\Http\Controllers\MedicoController@MedicoReceitaMedica')->name('receitamedica');
    Route::get('cadastrarreceitamedica', 'App\Http\Controllers\MedicoController@MedicoCadastrarReceitaMedica')->name('cadastrarreceitamedica');
    Route::get('atestadomedico', 'App\Http\Controllers\MedicoController@MedicoAtestadoMedico')->name('atestadomedico');
    Route::get('cadastraratestadomedico', 'App\Http\Controllers\MedicoController@MedicoCadastrarAtestadoMedico')->name('cadastraratestadomedico');
    Route::get('atestadocomparecimento', 'App\Http\Controllers\MedicoController@MedicoAtestadoComparecimento')->name('atestadocomparecimento');
    Route::get('cadastraratestadocomparecimento', 'App\Http\Controllers\MedicoController@MedicoCadastrarAtestadoComparecimento')->name('cadastraratestadocomparecimento');
    Route::get('receitcontespec', 'App\Http\Controllers\MedicoController@MedicoReceituarioControleEspecial')->name('receitcontespec');
    Route::get('cadastrarreceitcontespec', 'App\Http\Controllers\MedicoController@MedicoCadastrarReceituarioControleEspecial')->name('cadastrarreceitcontespec');
    
    Route::get('grupos', 'App\Http\Controllers\GrupoController@Grupos')->name('grupos');
    Route::get('buscarpermissoes', 'App\Http\Controllers\GrupoController@BuscarPermissoes')->name('buscarpermissoes');
    Route::get('consultagrupos', 'App\Http\Controllers\GrupoController@ConsultaGrupos')->name('consultagrupos');
    Route::get('consulta/user/dados', 'App\Http\Controllers\GrupoController@ConsultaUserDados')->name('consultauserdados');
    Route::get('cadastrar/grupo', 'App\Http\Controllers\GrupoController@CadastrarGrupo')->name('cadastrargrupo');
    Route::get('editar/grupo', 'App\Http\Controllers\GrupoController@EditarGrupo')->name('editargrupo');
    Route::get('consulta/grupos/dados', 'App\Http\Controllers\GrupoController@ConsultaGruposDados')->name('consultagruposdados');
    Route::get('consulta/grupos/permissoes', 'App\Http\Controllers\GrupoController@ConsultaGruposPermissoes')->name('consultagrupospermissoes');

    Route::get('aniversariantes', 'App\Http\Controllers\ConsultaController@Aniversariantes')->name('aniversariantes');
    Route::get('consultaraniversariantes', 'App\Http\Controllers\ConsultaController@ConsultarAniversariantes')->name('consultaraniversariantes');
    
    Route::get('cobranca', 'App\Http\Controllers\CobrancaController@Cobranca')->name('cobranca');
    Route::get('inadimplencia', 'App\Http\Controllers\CobrancaController@Inadimplencia')->name('inadimplencia');
    Route::get('pesquisarcobrancas', 'App\Http\Controllers\CobrancaController@PesquisarCobrancas')->name('pesquisarcobrancas');
    Route::get('cobrancasdolote', 'App\Http\Controllers\CobrancaController@CobrancasDoLote')->name('cobrancasdolote');
    Route::get('cobrancasdoloteinadimplentes', 'App\Http\Controllers\CobrancaController@CobrancasDoLoteInadimplentes')->name('cobrancasdoloteinadimplentes');
    Route::get('cobrancascontrato', 'App\Http\Controllers\CobrancaController@CobrancasContrato')->name('cobrancascontrato');
    Route::get('ultimoslotes', 'App\Http\Controllers\CobrancaController@UltimosLotes')->name('ultimoslotes');
    Route::get('dadoslote', 'App\Http\Controllers\CobrancaController@DadosLote')->name('dadoslote');
    Route::get('inadimplentes', 'App\Http\Controllers\CobrancaController@BuscarInadimplentes')->name('inadimplentes');
    Route::get('informarpagamentoinadimplente', 'App\Http\Controllers\CobrancaController@InformarPagamentoInadimplente')->name('informarpagamentoinadimplente');
    Route::get('receberpagamentoinadimplente', 'App\Http\Controllers\CobrancaController@ReceberPagamentoInadimplente')->name('receberpagamentoinadimplente');
    Route::get('agendarcobranca', 'App\Http\Controllers\CobrancaController@AgendarCobranca')->name('agendarcobranca');
    Route::get('reagendarcobranca', 'App\Http\Controllers\CobrancaController@ReagendarCobranca')->name('reagendarcobranca');
    Route::get('agendamentoscobranca', 'App\Http\Controllers\CobrancaController@AgendamentosCobranca')->name('agendamentoscobranca');
    Route::get('criarcobrancaavulsa', 'App\Http\Controllers\CobrancaController@CriarCobrancaAvulsa')->name('criarcobrancaavulsa');
    Route::get('gerarremessaavulsa', 'App\Http\Controllers\CobrancaController@GerarRemessaAvulsa')->name('gerarremessaavulsa');
    Route::get('gerarremessalote', 'App\Http\Controllers\CobrancaController@GerarRemessaLote')->name('gerarremessalote');
    Route::get('gerarboletoavulso', 'App\Http\Controllers\CobrancaController@GerarBoletoAvulso')->name('gerarboletoavulso');
    Route::get('gerarboletolote', 'App\Http\Controllers\CobrancaController@GerarBoletoLote')->name('gerarboletolote');

    Route::get('apagaragendamedico', 'App\Http\Controllers\ApagarController@ApagarAgendaMedico')->name('apagaragendamedico');
    Route::get('apagar/excluiragendacliente', 'App\Http\Controllers\ApagarController@ApagarExcluirAgendaCliente')->name('excluiragendacliente');

    Route::get('cpfchecar', 'App\Http\Controllers\ConsultaController@CPFChecar')->name('cpfchecar');
    Route::get('passarcontratos', 'App\Http\Controllers\CadastroController@PassarContratos')->name('passarcontratos');
    Route::get('teste/remessateste', 'App\Http\Controllers\FinanceiroController@RemessaTeste')->name('remessateste');
    Route::post('retorno/processar', 'App\Http\Controllers\CobrancaController@ProcessarRetorno')->name('processarretorno');
    Route::get('passarpacientes', 'App\Http\Controllers\CobrancaController@PassarPacientes')->name('passarpacientes');
    Route::get('passarcategorias', 'App\Http\Controllers\CadastroController@PassarCategorias')->name('passarcategorias');
    Route::get('verificarcadastrocontrato', 'App\Http\Controllers\CadastroController@VerificarCadastroContrato')->name('verificarcadastrocontrato');

    Route::get('pegarvendedores', 'App\Http\Controllers\ConsultaController@PegarVendedores')->name('pegarvendedores');
    Route::get('relatoriovendedores', 'App\Http\Controllers\RelatorioController@RelatorioVendedores')->name('relatoriovendedores');
    Route::get('relatoriovendedoresdados', 'App\Http\Controllers\RelatorioController@RelatorioVendedoresDados')->name('relatoriovendedoresdados');
    Route::get('relatorio/despesasereceitas', 'App\Http\Controllers\RelatorioController@RelatorioDespesasEReceitas')->name('relatoriodespesasereceitas');
    Route::get('relatoriodespesasereceitaspdf', 'App\Http\Controllers\RelatorioController@RelatorioDespesasEReceitasPDF')->name('relatoriodespesasereceitaspdf');
    Route::get('relatorio/adimplentesinadimplentes', 'App\Http\Controllers\RelatorioController@RelatorioAdimplentesInadimplentes')->name('relatorioadimplentesinadimplentes');
    Route::get('relatorioadimplentesinadimplentesdados', 'App\Http\Controllers\RelatorioController@RelatorioAdimplentesInadimplentesDados')->name('relatorioadimplentesinadimplentesdados');
    Route::get('relatorioadimplentesinadimplentespdf', 'App\Http\Controllers\RelatorioController@RelatorioAdimplentesInadimplentesPDF')->name('relatorioadimplentesinadimplentespdf');
    Route::get('relatorio/planos', 'App\Http\Controllers\RelatorioController@RelatorioPlanos')->name('relatorioplanos');
    Route::get('relatorioplanosdados', 'App\Http\Controllers\RelatorioController@RelatorioPlanosDados')->name('relatorioplanosdados');
    Route::get('relatorioplanospdf', 'App\Http\Controllers\RelatorioController@RelatorioPlanosPDF')->name('relatorioplanospdf');
    Route::get('relatorio/atendimentos', 'App\Http\Controllers\RelatorioController@RelatorioAtendimentos')->name('relatorioatendimentos');
    Route::get('relatorioatendimentosdados', 'App\Http\Controllers\RelatorioController@RelatorioAtendimentosDados')->name('relatorioatendimentosdados');
    Route::get('relatorioatendimentospdf', 'App\Http\Controllers\RelatorioController@RelatorioAtendimentosPDF')->name('relatorioatendimentospdf');
    Route::get('relatorioplanostodos', 'App\Http\Controllers\RelatorioController@RelatorioPlanosTodos')->name('relatorioplanostodos');
    Route::get('relatorioespecialidadestodos', 'App\Http\Controllers\RelatorioController@RelatorioEspecialidadesTodos')->name('relatorioespecialidadestodos');
    Route::get('relatorioexamestodos', 'App\Http\Controllers\RelatorioController@RelatorioExamesTodos')->name('relatorioexamestodos');

    Route::get('empresa', 'App\Http\Controllers\EmpresaController@Empresa')->name('empresa');
    Route::get('buscardadosempresa', 'App\Http\Controllers\EmpresaController@BuscarDadosEmpresa')->name('buscardadosempresa');
    Route::get('atualizarempresa', 'App\Http\Controllers\EmpresaController@AtualizarEmpresa')->name('atualizarempresa');

    Route::get('telecobrancas', 'App\Http\Controllers\ConsultaController@Telecobrancas')->name('telecobrancas');
    Route::get('gerarsenhahash/{id}', 'App\Http\Controllers\ConsultaController@GerarSenhaHash')->name('gerarsenhahash');

});