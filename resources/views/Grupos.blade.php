@extends('layouts.Menu')
@section('atalhoSuperior')@endsection
@section('menuLateral')@endsection

<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- css da página  -->
  <link rel="stylesheet" href="{{asset('../css/estilo.css')}}">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <script src="{{asset('jquery.min.js')}}"></script>
  <script src="{{asset('jquery-ui-1.12.1/jquery-ui.js')}}"></script>
  <script src="{{asset('inputmask/dist/jquery.inputmask.min.js')}}"></script>
  <script src="{{asset('inputmask/dist/bindings/inputmask.binding.js')}}"></script>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  <title>Grupos</title>

  <style>
    .aligncenter {
      display: flex;
      align-items: center;
    }

    .areapermissao {
      margin-left: 0.5rem;
    }
  </style>
</head>

<body>
  @section('Conteudo')
  <div class="tituloprincipal container-fluid">Grupos</div>

  <div class='container-fluid'>
    <div class="row gx-3 gy-3">
      <div class="col-sm-4 col-md-4 col-lg-3">
        <div class="cor03">
          <select class="form-select" name="gruposselect" id="gruposselect" onchange='filtgrupo()'></select>
        </div>
      </div>
      <div class="col-sm-4 col-md-4 col-lg-4">
        <div class="cor03">
          <button type='submit' class='btn btn-success' onclick='novogrupo()'>
            <span class='fontebotao'>Novo Grupo</span>
          </button>
        </div>
      </div>
    </div>
  </div>

  <div class='container-fluid'>
    <div class="" id='divdadosgrupo'>
      <div class="row gx-3 gy-3">
        <div class="col-sm-5 col-md-4 col-lg-3">
          <div class="cor03">
            <input type="text" class="form-control" aria-describedby="grupotext" name='grupotext2' id='grupotext2' placeholder='Digite o nome do grupo' />
          </div>
        </div>
        <div class="col-sm-5 col-md-4 col-lg-3">
          <div class="cor03">
            <input type='text' class='form-control' name='pesquisarnomeusuario2' id='pesquisarnomeusuario2' placeholder='Digite o nome do usuário'>
          </div>
        </div>
        <div class="col-sm-3 col-md-3 col-lg-2" style='width:max-content'>
          <button type="submit" class="btn btamarelo" value='Pesquisar' onclick='pesquisaruser2()'>
            <span class="selectacoes">Pesquisar</span>
          </button>
        </div>
        <div class="col-sm-5 col-md-4 col-lg-2" style='width:max-content'>
          <div class="cor03">
            <button class="btn btn-primary" data-bs-target="#novopermissoes2Modal" data-bs-toggle="modal" data-bs-dismiss="modal" id='botaopermissoes2' style='display:none'>Permissões</button>
          </div>
        </div>
        <div class="col-sm-5 col-md-4 col-lg-2" style='width:max-content'>
          <div class="cor03">
            <button class="btn btn-success" onclick='editargrupo()' id='botaoeditar2' style='display:none'>Salvar</button>
          </div>
        </div>
      </div>
    </div>

    <br><br>
    <div class="row gx-3 gy-3" style='margin-bottom:1rem;margin-top:-3rem'>
      <div class='input' id='tabelaescolheruser2'>
        <div id='tabela' class="table-responsive-sm">
          <table id='' class="table">
            <thead class="table-active">
              <tr>
                <td>Nome</td>
                <td>Nome de Usuário</td>
                <td>Grupo Atual</td>
                <td>Adicionar</td>
              </tr>
            </thead>
            <tbody id='tabelapesquisanovouser2'>

            </tbody>
          </table>
        </div>
      </div>
    </div>

    <div class='row gx-3 gy-3' style='margin-bottom:1.5rem'>
      <div class='input' id='tabelanovouser2'>
        <div id='tabela' class="table-responsive-sm">
          <table id='' class="table">
            <thead class="table-active">
              <tr>
                <td>Nome</td>
                <td>Nome de Usuário</td>
                <td>Excluir</td>
              </tr>
            </thead>
            <tbody id='tabelanovouserbody2'>

            </tbody>
          </table>
        </div>
      </div>
    </div>

    <!-- <div class='container-fluid'>
      <div class='row gx-3 gy-3'>
        
      </div>
    </div> -->
  </div>

  <div class="modal fade" id="novogrupoModal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="exampleModalToggleLabel">Novo Grupo</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="">
            <div class="row gx-3 gy-3">
              <div class="col-sm-5 col-md-4 col-lg-4">
                <div class="cor03">
                  <input type="text" class="form-control" aria-describedby="grupotext" name='grupotext' id='grupotext' placeholder='Digite o nome do grupo' />
                </div>
              </div>
              <br><br>
              <div class="col-sm-5 col-md-4 col-lg-4">
                <div class="cor03">
                  <input type='text' class='form-control' name='pesquisarnomeusuario' id='pesquisarnomeusuario' placeholder='Digite o nome do usuário'>
                </div>
              </div>
              <div class="col-sm-3 col-md-3 col-lg-3">
                <button type="submit" class="btn btamarelo" value='Pesquisar' onclick='pesquisaruser()'>
                  <span class="selectacoes">Pesquisar</span>
                </button>
                <!-- <div class="cor03" id='tabelauserdiv'>
                </div> -->
              </div>
              <!-- <button type="submit" class="btn btamarelo" value='Permissões' onclick='novopermissoes()'>
                <span class="selectacoes">Permissões</span>
              </button> -->
            </div>
            <br>
            <div class='class="row gx-3 gy-3"'>
              <div class='input' id='tabelanovouser'>
                <div id='tabela' class="table-responsive-sm">
                  <table id='' class="table">
                    <thead class="table-active">
                      <tr>
                        <td>Nome</td>
                        <td>Nome de Usuário</td>
                        <td>Excluir</td>
                      </tr>
                    </thead>
                    <tbody id='tabelanovouserbody'>

                    </tbody>
                  </table>
                </div>
              </div>

              <div class='input' id='tabelaescolheruser'>
                <div id='tabela' class="table-responsive-sm">
                  <table id='' class="table">
                    <thead class="table-active">
                      <tr>
                        <td>Nome</td>
                        <td>Nome de Usuário</td>
                        <td>Grupo Atual</td>
                        <td>Adicionar</td>
                      </tr>
                    </thead>
                    <tbody id='tabelapesquisanovouser'>

                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-success" onclick='cadastrargrupo()'>Cadastrar Grupo</button>
          <button class="btn btn-primary" data-bs-target="#novopermissoesModal" data-bs-toggle="modal" data-bs-dismiss="modal">Permissões</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="novopermissoesModal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="exampleModalToggleLabel2">Permissões</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="container">
            <div class="row">
              <div class="col-sm" id='permissoesnovocheckbox1'>
                <div class='aligncenter'>
                  <input type='checkbox' name='permissoesnovocheckbox' id='cadastropessoa' value='1'>
                  <span class='areapermissao'>Cadastro Pessoa</span>
                </div>
                <div class='aligncenter'>
                  <input type='checkbox' name='permissoesnovocheckbox' id='cadastromedico' value='2'>
                  <span class='areapermissao'>Cadastro Medico</span>
                </div>
                <div class='aligncenter'>
                  <input type='checkbox' name='permissoesnovocheckbox' id='cadastroconsultorio' value='3'>
                  <span class='areapermissao'>Cadastro Consultório</span>
                </div>
                <div class='aligncenter'>
                  <input type='checkbox' name='permissoesnovocheckbox' id='cadastroplano' value='4'>
                  <span class='areapermissao'>Cadastro Plano</span>
                </div>
                <div class='aligncenter'>
                  <input type='checkbox' name='permissoesnovocheckbox' id='cadastrocontrato' value='5'>
                  <span class='areapermissao'>Cadastro Contrato</span>
                </div>
                <div class='aligncenter'>
                  <input type='checkbox' name='permissoesnovocheckbox' id='cadastroproduto' value='6'>
                  <span class='areapermissao'>Cadastro Produto</span>
                </div>
                <div class='aligncenter'>
                  <input type='checkbox' name='permissoesnovocheckbox' id='homecolaborador' value='9'>
                  <span class='areapermissao'>Home Colaborador</span>
                </div>
                <div class='aligncenter'>
                  <input type='checkbox' name='permissoesnovocheckbox' id='pdv' value='12'>
                  <span class='areapermissao'>Caixa</span>
                </div>
                <div class='aligncenter'>
                  <input type='checkbox' name='permissoesnovocheckbox' id='Aniversariantes' value='15'>
                  <span class='areapermissao'>Aniversariantes</span>
                </div>
                <div class='aligncenter'>
                  <input type='checkbox' name='permissoesnovocheckbox' id='financeiro' value='14'>
                  <span class='areapermissao'>Páginas Financeiro</span>
                </div>
              </div>
              <div class="col-sm" id='permissoesnovocheckbox2'>
                <div class='aligncenter'>
                  <input type='checkbox' name='permissoesnovocheckbox' id='consultapessoa' value='1.1'>
                  <span class='areapermissao'>Consulta Pessoa</span>
                </div>
                <div class='aligncenter'>
                  <input type='checkbox' name='permissoesnovocheckbox' id='consultamedico' value='2.1'>
                  <span class='areapermissao'>Consulta Medico</span>
                </div>
                <div class='aligncenter'>
                  <input type='checkbox' name='permissoesnovocheckbox' id='consultaconsultorio' value='3.1'>
                  <span class='areapermissao'>Consulta Consultório</span>
                </div>
                <div class='aligncenter'>
                  <input type='checkbox' name='permissoesnovocheckbox' id='consultaplano' value='4.1'>
                  <span class='areapermissao'>Consulta Plano</span>
                </div>
                <div class='aligncenter'>
                  <input type='checkbox' name='permissoesnovocheckbox' id='consultacontrato' value='5.1'>
                  <span class='areapermissao'>Consulta Contrato</span>
                </div>
                <div class='aligncenter'>
                  <input type='checkbox' name='permissoesnovocheckbox' id='consultaproduto' value='6.1'>
                  <span class='areapermissao'>Consulta Produto</span>
                </div>
                <div class='aligncenter'>
                  <input type='checkbox' name='permissoesnovocheckbox' id='consultaraiox' value='7.1'>
                  <span class='areapermissao'>Consulta Raio X</span>
                </div>
                <div class='aligncenter'>
                  <input type='checkbox' name='permissoesnovocheckbox' id='consultaultrassom' value='8.1'>
                  <span class='areapermissao'>Consulta Ultrassom</span>
                </div>
                <div class='aligncenter'>
                  <input type='checkbox' name='permissoesnovocheckbox' id='homemedico' value='10'>
                  <span class='areapermissao'>Home Medico</span>
                </div>
                <div class='aligncenter'>
                  <input type='checkbox' name='permissoesnovocheckbox' id='medico' value='13'>
                  <span class='areapermissao'>Páginas Médico</span>
                </div>
                <div class='aligncenter'>
                  <input type='checkbox' name='permissoesnovocheckbox' id='grupos' value='16'>
                  <span class='areapermissao'>Grupos</span>
                </div>
                <div class='aligncenter'>
                  <input type='checkbox' name='permissoesnovocheckbox' id='painel' value='17'>
                  <span class='areapermissao'>Painel</span>
                </div>
              </div>
              <div class="col-sm" id='permissoesnovocheckbox3'>
                <div class='aligncenter'>
                  <input type='checkbox' name='permissoesnovocheckbox' id='editarexcluirpessoa' value='1.2'>
                  <span>Editar/Excluir Pessoa</span>
                </div>
                <div class='aligncenter'>
                  <input type='checkbox' name='permissoesnovocheckbox' id='editarexcluirmedico' value='2.2'>
                  <span class='areapermissao'>Editar/Excluir Medico</span>
                </div>
                <div class='aligncenter'>
                  <input type='checkbox' name='permissoesnovocheckbox' id='editarexcluirconsultorio' value='3.2'>
                  <span class='areapermissao'>Editar/Excluir Consultório</span>
                </div>
                <div class='aligncenter'>
                  <input type='checkbox' name='permissoesnovocheckbox' id='editarexcluirplano' value='4.2'>
                  <span class='areapermissao'>Editar/Excluir Plano</span>
                </div>
                <div class='aligncenter'>
                  <input type='checkbox' name='permissoesnovocheckbox' id='editarexcluircontrato' value='5.2'>
                  <span class='areapermissao'>Editar/Excluir Contrato</span>
                </div>
                <div class='aligncenter'>
                  <input type='checkbox' name='permissoesnovocheckbox' id='editarexcluirproduto' value='6.2'>
                  <span class='areapermissao'>Editar/Excluir Produto</span>
                </div>
                <div class='aligncenter'>
                  <input type='checkbox' name='permissoesnovocheckbox' id='agenda' value='11'>
                  <span class='areapermissao'>Agenda</span>
                </div>
                <div class='aligncenter'>
                  <input type='checkbox' name='permissoesnovocheckbox' id='cobranca' value='18'>
                  <span class='areapermissao'>Cobrança</span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" data-bs-target="#novogrupoModal" data-bs-toggle="modal" data-bs-dismiss="modal">Voltar</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="novopermissoes2Modal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="exampleModalToggleLabel2">Permissões</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="container">
            <div class="row">
              <div class="col-sm" id='permissoesnovocheckbox1edit'>
                <div class='aligncenter'>
                  <input type='checkbox' name='permissoesnovocheckboxedit' id='cadastropessoaedit' value='1'>
                  <span class='areapermissao'>Cadastro Pessoa</span>
                </div>
                <div class='aligncenter'>
                  <input type='checkbox' name='permissoesnovocheckboxedit' id='cadastromedicoedit' value='2'>
                  <span class='areapermissao'>Cadastro Medico</span>
                </div>
                <div class='aligncenter'>
                  <input type='checkbox' name='permissoesnovocheckboxedit' id='cadastroconsultorioedit' value='3'>
                  <span class='areapermissao'>Cadastro Consultório</span>
                </div>
                <div class='aligncenter'>
                  <input type='checkbox' name='permissoesnovocheckboxedit' id='cadastroplanoedit' value='4'>
                  <span class='areapermissao'>Cadastro Plano</span>
                </div>
                <div class='aligncenter'>
                  <input type='checkbox' name='permissoesnovocheckboxedit' id='cadastrocontratoedit' value='5'>
                  <span class='areapermissao'>Cadastro Contrato</span>
                </div>
                <div class='aligncenter'>
                  <input type='checkbox' name='permissoesnovocheckboxedit' id='cadastroprodutoedit' value='6'>
                  <span class='areapermissao'>Cadastro Produto</span>
                </div>
                <div class='aligncenter'>
                  <input type='checkbox' name='permissoesnovocheckboxedit' id='homecolaboradoredit' value='9'>
                  <span class='areapermissao'>Home Colaborador</span>
                </div>
                <div class='aligncenter'>
                  <input type='checkbox' name='permissoesnovocheckboxedit' id='pdvedit' value='12'>
                  <span class='areapermissao'>Caixa</span>
                </div>
                <div class='aligncenter'>
                  <input type='checkbox' name='permissoesnovocheckboxedit' id='aniversariantesedit' value='15'>
                  <span class='areapermissao'>Aniversariantes</span>
                </div>
                <div class='aligncenter'>
                  <input type='checkbox' name='permissoesnovocheckboxedit' id='financeiroedit' value='14'>
                  <span class='areapermissao'>Páginas Financeiro</span>
                </div>
              </div>
              <div class="col-sm" id='permissoesnovocheckbox2edit'>
                <div class='aligncenter'>
                  <input type='checkbox' name='permissoesnovocheckboxedit' id='consultapessoaedit' value='1.1'>
                  <span class='areapermissao'>Consulta Pessoa</span>
                </div>
                <div class='aligncenter'>
                  <input type='checkbox' name='permissoesnovocheckboxedit' id='consultamedicoedit' value='2.1'>
                  <span class='areapermissao'>Consulta Medico</span>
                </div>
                <div class='aligncenter'>
                  <input type='checkbox' name='permissoesnovocheckboxedit' id='consultaconsultorioedit' value='3.1'>
                  <span class='areapermissao'>Consulta Consultório</span>
                </div>
                <div class='aligncenter'>
                  <input type='checkbox' name='permissoesnovocheckboxedit' id='consultaplanoedit' value='4.1'>
                  <span class='areapermissao'>Consulta Plano</span>
                </div>
                <div class='aligncenter'>
                  <input type='checkbox' name='permissoesnovocheckboxedit' id='consultacontratoedit' value='5.1'>
                  <span class='areapermissao'>Consulta Contrato</span>
                </div>
                <div class='aligncenter'>
                  <input type='checkbox' name='permissoesnovocheckboxedit' id='consultaprodutoedit' value='6.1'>
                  <span class='areapermissao'>Consulta Produto</span>
                </div>
                <div class='aligncenter'>
                  <input type='checkbox' name='permissoesnovocheckboxedit' id='homemedicoedit' value='10'>
                  <span class='areapermissao'>Home Medico</span>
                </div>
                <div class='aligncenter'>
                  <input type='checkbox' name='permissoesnovocheckboxedit' id='medicoedit' value='13'>
                  <span class='areapermissao'>Páginas Médico</span>
                </div>
                <div class='aligncenter'>
                  <input type='checkbox' name='permissoesnovocheckboxedit' id='gruposedit' value='16'>
                  <span class='areapermissao'>Grupos</span>
                </div>
                <div class='aligncenter'>
                  <input type='checkbox' name='permissoesnovocheckboxedit' id='paineledit' value='17'>
                  <span class='areapermissao'>Painel</span>
                </div>
              </div>
              <div class="col-sm" id='permissoesnovocheckbox3edit'>
                <div class='aligncenter'>
                  <input type='checkbox' name='permissoesnovocheckboxedit' id='editarexcluirpessoaedit' value='1.2'>
                  <span>Editar/Excluir Pessoa</span>
                </div>
                <div class='aligncenter'>
                  <input type='checkbox' name='permissoesnovocheckboxedit' id='editarexcluirmedicoedit' value='2.2'>
                  <span class='areapermissao'>Editar/Excluir Medico</span>
                </div>
                <div class='aligncenter'>
                  <input type='checkbox' name='permissoesnovocheckboxedit' id='editarexcluirconsultorioedit' value='3.2'>
                  <span class='areapermissao'>Editar/Excluir Consultório</span>
                </div>
                <div class='aligncenter'>
                  <input type='checkbox' name='permissoesnovocheckboxedit' id='editarexcluirplanoedit' value='4.2'>
                  <span class='areapermissao'>Editar/Excluir Plano</span>
                </div>
                <div class='aligncenter'>
                  <input type='checkbox' name='permissoesnovocheckboxedit' id='editarexcluircontratoedit' value='5.2'>
                  <span class='areapermissao'>Editar/Excluir Contrato</span>
                </div>
                <div class='aligncenter'>
                  <input type='checkbox' name='permissoesnovocheckboxedit' id='editarexcluirprodutoedit' value='6.2'>
                  <span class='areapermissao'>Editar/Excluir Produto</span>
                </div>
                <div class='aligncenter'>
                  <input type='checkbox' name='permissoesnovocheckboxedit' id='editarexcluirraioxedit' value='7.2'>
                  <span class='areapermissao'>Editar/Excluir Raio X</span>
                </div>
                <div class='aligncenter'>
                  <input type='checkbox' name='permissoesnovocheckboxedit' id='editarexcluirultrassomedit' value='8.2'>
                  <span class='areapermissao'>Editar/Excluir Ultrassom</span>
                </div>
                <div class='aligncenter'>
                  <input type='checkbox' name='permissoesnovocheckboxedit' id='agendaedit' value='11'>
                  <span class='areapermissao'>Agenda</span>
                </div>
                <div class='aligncenter'>
                  <input type='checkbox' name='permissoesnovocheckboxedit' id='cobrancaedit' value='18'>
                  <span class='areapermissao'>Cobrança</span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" data-bs-target="#novopermissoes2Modal" data-bs-toggle="modal" data-bs-dismiss="modal">Voltar</button>
        </div>
      </div>
    </div>
  </div>
  <!-- <a class="btn btn-primary" data-bs-toggle="modal" href="#novogrupoModal" role="button">Open first modal</a> -->
</body>

<script>
  var idgrupos = [];
  var nomegrupos = [];
  var permissaogrupos = [];

  var dadosusernome = [];
  var dadosuserid = [];
  var dadosusername = [];

  var dadosusernome2 = [];
  var dadosuserid2 = [];
  var dadosusername2 = [];

  var dadosusernomenovo = [];
  var dadosuseridnovo = [];
  var dadosusernamenovo = [];
  var permissoesnovo = [];

  var dadosusernomeedit = [];
  var dadosuseridedit = [];
  var dadosusernameedit = [];
  var permissoesedit = [];
  filtgrupos();
  $('.input').css('display', 'none');
  $('#divdadosgrupo').css('display', 'none');
  
  function filtgrupos() {
    $('#divdadosgrupo').css('display', 'none');
    $('#tabelanovouser2').css('display', 'none');
    $('#tabelaescolheruser2').css('display', 'none');
    $("#gruposselect").empty();
    var select = document.getElementById('gruposselect');
    var opt = document.createElement('option');
    opt.appendChild(document.createTextNode('Selecione um grupo'));
    opt.value = '';
    select.appendChild(opt);
    $.ajax({
      type: "GET",
      url: "/consultagrupos",
      data: {},
      dataType: "json",
      success: function(data) {
        for (var i = 0; i < data.length; i++) {
          var opt = document.createElement('option');
          opt.appendChild(document.createTextNode(data[i]['nomegrupo']));
          opt.value = data[i]['idgrupo'];
          select.appendChild(opt);
          idgrupos.push(data[i]['idgrupo']);
          nomegrupos.push(data[i]['nomegrupo']);
          permissaogrupos.push(data[i]['permissaogrupo']);
        }

      }
    });
  }

  function filtgrupo() {
    $('#tabelanovouser2').css('display', 'none');
    $('#tabelaescolheruser2').css('display', 'none');
    $('#botaopermissoes2').css('display', 'none');
    $('#botaoeditar2').css('display', 'none');
    apagartabelanovouser2();
    dadosusernomeedit = [];
    dadosuseridedit = [];
    dadosusernameedit = [];
    $.ajax({
      type: "GET",
      url: "/consulta/grupos/dados",
      data: {
        grupo: document.getElementById('gruposselect').value
      },
      dataType: "json",
      success: function(data) {
        console.log(data);
        for (i = 0; i < data['name'].length; i++) {
          dadosusernomeedit.push(data['name'][i]);
          dadosuseridedit.push(data['id'][i]);
          dadosusernameedit.push(data['username'][i]);
          var tabela = document.getElementById('tabelanovouserbody2');
          var numeroLinhas = tabela.rows.length;
          var linha = tabela.insertRow(numeroLinhas);
          var celula1 = linha.insertCell(0);
          var celula2 = linha.insertCell(1);
          var celula3 = linha.insertCell(2);
          celula1.innerHTML = dadosusernomeedit[i];
          celula2.innerHTML = dadosusernameedit[i];
          celula3.innerHTML = "<button type='submit' class='btn btdelete' value='Remover' onclick='deletarlinhagrupo2(this)' name='remover' id='" + numeroLinhas + "'><span class='fontebotao' style='font-weight:400!important;'>Remover</span></button>";
          apagartabelapesquisanovouser2();
        }
        document.getElementById('grupotext2').value = data['nomegrupo'][0];
        $('#divdadosgrupo').css('display', 'block');
        $('#tabelanovouser2').css('display', 'block');
      }
    });

    filtpermissoes();

  }

  function filtpermissoes() {
    permissoesedit = [];
    $('#botaopermissoes2').css('display', 'block');
    $('#botaoeditar2').css('display', 'block');
    $.ajax({
      type: "GET",
      url: "/consulta/grupos/permissoes",
      data: {
        grupo: document.getElementById('gruposselect').value
      },
      dataType: "json",
      success: function(data) {
        $('#cadastropessoaedit').prop('checked', false);
        $('#consultapessoaedit').prop('checked', false);
        $('#editarexcluirpessoaedit').prop('checked', false);
        $('#cadastromedicoedit').prop('checked', false);
        $('#consultamedicoedit').prop('checked', false);
        $('#editarexcluirmedicoedit').prop('checked', false);
        $('#cadastroconsultorioedit').prop('checked', false);
        $('#consultaconsultorioedit').prop('checked', false);
        $('#editarexcluirconsultorioedit').prop('checked', false);
        $('#cadastroplanoedit').prop('checked', false);
        $('#consultaplanoedit').prop('checked', false);
        $('#editarexcluirplanoedit').prop('checked', false);
        $('#cadastrocontratoedit').prop('checked', false);
        $('#consultacontratoedit').prop('checked', false);
        $('#editarexcluircontratoedit').prop('checked', false);
        $('#cadastroprodutoedit').prop('checked', false);
        $('#consultaprodutoedit').prop('checked', false);
        $('#editarexcluirprodutoedit').prop('checked', false);
        $('#cadastroraioxedit').prop('checked', false);
        $('#consultaraioxedit').prop('checked', false);
        $('#editarexcluirraioxedit').prop('checked', false);
        $('#cadastroultrassomedit').prop('checked', false);
        $('#consultaultrassomedit').prop('checked', false);
        $('#editarexcluirultrassomedit').prop('checked', false);
        $('#homecolaboradoredit').prop('checked', false);
        $('#homemedicoedit').prop('checked', false);
        $('#agendaedit').prop('checked', false);
        $('#pdvedit').prop('checked', false);
        $('#medicoedit').prop('checked', false);
        $('#financeiroedit').prop('checked', false);
        $('#aniversariantesedit').prop('checked', false);
        $('#gruposedit').prop('checked', false);
        $('#paineledit').prop('checked', false);
        for (i = 0; i < data.length; i++) {
          // console.log(data[i])
          permissoesedit.push(data[i]['permissaogrupo']);

          if (data[i] == '1') {
            $('#cadastropessoaedit').prop('checked', true);
          }
          if (data[i] == '1.1') {
            $('#consultapessoaedit').prop('checked', true);
          }
          if (data[i] == '1.2') {
            $('#editarexcluirpessoaedit').prop('checked', true);
          }
          if (data[i] == '2') {
            $('#cadastromedicoedit').prop('checked', true);
          }
          if (data[i] == '2.1') {
            $('#consultamedicoedit').prop('checked', true);
          }
          if (data[i] == '2.2') {
            $('#editarexcluirmedicoedit').prop('checked', true);
          }
          if (data[i] == '3') {
            $('#cadastroconsultorioedit').prop('checked', true);
          }
          if (data[i] == '3.1') {
            $('#consultaconsultorioedit').prop('checked', true);
          }
          if (data[i] == '3.2') {
            $('#editarexcluirconsultorioedit').prop('checked', true);
          }
          if (data[i] == '4') {
            $('#cadastroplanoedit').prop('checked', true);
          }
          if (data[i] == '4.1') {
            $('#consultaplanoedit').prop('checked', true);
          }
          if (data[i] == '4.2') {
            $('#editarexcluirplanoedit').prop('checked', true);
          }
          if (data[i] == '5') {
            $('#cadastrocontratoedit').prop('checked', true);
          }
          if (data[i] == '5.1') {
            $('#consultacontratoedit').prop('checked', true);
          }
          if (data[i] == '5.2') {
            $('#editarexcluircontratoedit').prop('checked', true);
          }
          if (data[i] == '6') {
            $('#cadastroprodutoedit').prop('checked', true);
          }
          if (data[i] == '6.1') {
            $('#consultaprodutoedit').prop('checked', true);
          }
          if (data[i] == '6.2') {
            $('#editarexcluirprodutoedit').prop('checked', true);
          }
          if (data[i] == '7') {
            $('#cadastroraioxedit').prop('checked', true);
          }
          if (data[i] == '7.1') {
            $('#consultaraioxedit').prop('checked', true);
          }
          if (data[i] == '7.2') {
            $('#editarexcluirraioxedit').prop('checked', true);
          }
          if (data[i] == '8') {
            $('#cadastroultrassomedit').prop('checked', true);
          }
          if (data[i] == '8.1') {
            $('#consultaultrassomedit').prop('checked', true);
          }
          if (data[i] == '8.2') {
            $('#editarexcluirultrassomedit').prop('checked', true);
          }
          if (data[i] == '9') {
            $('#homecolaboradoredit').prop('checked', true);
          }
          if (data[i] == '10') {
            $('#homemedicoedit').prop('checked', true);
          }
          if (data[i] == '11') {
            $('#agendaedit').prop('checked', true);
          }
          if (data[i] == '12') {
            $('#pdvedit').prop('checked', true);
          }
          if (data[i] == '13') {
            $('#medicoedit').prop('checked', true);
          }
          if (data[i] == '14') {
            $('#financeiroedit').prop('checked', true);
          }
          if (data[i] == '15') {
            $('#aniversariantesedit').prop('checked', true);
          }
          if (data[i] == '16') {
            $('#gruposedit').prop('checked', true);
          }
          if (data[i] == '17') {
            $('#paineledit').prop('checked', true);
          }
        }
      }
    });

  }

  function novogrupo() {
    dadosusernomenovo = [];
    dadosuseridnovo = [];
    dadosusernamenovo = [];
    $('#novogrupoModal').modal('show');
  }

  function novopermissoes() {
    $('#novopermissoesModal').modal('show');
  }


  function apagartabelapesquisanovouser() {
    var tableHeaderRowCount = 0;
    var table = document.getElementById('tabelapesquisanovouser');
    var rowCount = table.rows.length;
    for (var i = tableHeaderRowCount; i < rowCount; i++) {
      table.deleteRow(tableHeaderRowCount);
    }
  }

  function apagartabelanovouser() {
    var tableHeaderRowCount = 0;
    var table = document.getElementById('tabelanovouserbody');
    var rowCount = table.rows.length;
    for (var i = tableHeaderRowCount; i < rowCount; i++) {
      table.deleteRow(tableHeaderRowCount);
    }
  }

  function apagartabelapesquisanovouser2() {
    var tableHeaderRowCount = 0;
    var table = document.getElementById('tabelapesquisanovouser2');
    var rowCount = table.rows.length;
    for (var i = tableHeaderRowCount; i < rowCount; i++) {
      table.deleteRow(tableHeaderRowCount);
    }
  }

  function apagartabelanovouser2() {
    var tableHeaderRowCount = 0;
    var table = document.getElementById('tabelanovouserbody2');
    var rowCount = table.rows.length;
    for (var i = tableHeaderRowCount; i < rowCount; i++) {
      table.deleteRow(tableHeaderRowCount);
    }
  }

  function pesquisaruser() {
    apagartabelapesquisanovouser();
    dadosusernome = [];
    dadosuserid = [];
    dadosusername = [];
    $.ajax({
      type: "GET",
      url: "/consulta/user/dados",
      data: {
        nome: document.getElementById('pesquisarnomeusuario').value
      },
      dataType: "json",
      success: function(data) {
        for (i = 0; i < data['name'].length; i++) {
          dadosusernome.push(data['name'][i]);
          dadosuserid.push(data['id'][i]);
          dadosusername.push(data['username'][i]);
          var tabela = document.getElementById('tabelapesquisanovouser');
          var numeroLinhas = tabela.rows.length;
          var linha = tabela.insertRow(numeroLinhas);
          var celula1 = linha.insertCell(0);
          var celula2 = linha.insertCell(1);
          var celula3 = linha.insertCell(2);
          var celula4 = linha.insertCell(3);
          celula1.innerHTML = data['name'][i];
          celula2.innerHTML = data['username'][i];
          celula3.innerHTML = data['nomegrupo'][i];
          celula4.innerHTML = "<button type='submit' class='btn btadicionar' value='Adicionar' onclick='selecionaruser(this)' name='selecionareste' id='" + i + "'><span class='fontebotao'>Adicionar</span></button>";

        }
      }
    });
    $('#tabelaescolheruser').css('display', 'block');
  }

  function pesquisaruser2() {
    apagartabelapesquisanovouser2();
    dadosusernome2 = [];
    dadosuserid2 = [];
    dadosusername2 = [];
    $.ajax({
      type: "GET",
      url: "/consulta/user/dados",
      data: {
        nome: document.getElementById('pesquisarnomeusuario2').value
      },
      dataType: "json",
      success: function(data) {
        for (i = 0; i < data['name'].length; i++) {
          dadosusernome2.push(data['name'][i]);
          dadosuserid2.push(data['id'][i]);
          dadosusername2.push(data['username'][i]);
          var tabela = document.getElementById('tabelapesquisanovouser2');
          var numeroLinhas = tabela.rows.length;
          var linha = tabela.insertRow(numeroLinhas);
          var celula1 = linha.insertCell(0);
          var celula2 = linha.insertCell(1);
          var celula3 = linha.insertCell(2);
          var celula4 = linha.insertCell(3);
          celula1.innerHTML = data['name'][i];
          celula2.innerHTML = data['username'][i];
          celula3.innerHTML = data['nomegrupo'][i];
          celula4.innerHTML = "<button type='submit' class='btn btadicionar' value='Adicionar' onclick='selecionaruser2(this)' name='selecionareste' id='" + i + "'><span class='fontebotao'>Adicionar</span></button>";

        }
      }
    });
    $('#tabelaescolheruser2').css('display', 'block');
  }

  function selecionaruser(dado) {
    $('#tabelaescolheruser').css('display', 'none');
    console.log(dado.id);
    dadosusernomenovo.push(dadosusernome[dado.id]);
    dadosusernamenovo.push(dadosusername[dado.id]);
    dadosuseridnovo.push(dadosuserid[dado.id]);
    var tabela = document.getElementById('tabelanovouserbody');
    var numeroLinhas = tabela.rows.length;
    var linha = tabela.insertRow(numeroLinhas);
    var celula1 = linha.insertCell(0);
    var celula2 = linha.insertCell(1);
    var celula3 = linha.insertCell(2);
    celula1.innerHTML = dadosusernome[dado.id];
    celula2.innerHTML = dadosusername[dado.id];
    celula3.innerHTML = "<button type='submit' class='btn btdelete' value='Remover' onclick='deletarlinhagrupo(this)' name='remover' id='" + numeroLinhas + "'><span class='fontebotao' style='font-weight:400!important;'>Remover</span></button>";
    apagartabelapesquisanovouser();
    $('#tabelanovouser').css('display', 'block');
  }

  function selecionaruser2(dado) {
    $('#tabelaescolheruser2').css('display', 'none');
    console.log(dado.id);
    dadosusernomeedit.push(dadosusernome2[dado.id]);
    dadosusernameedit.push(dadosusername2[dado.id]);
    dadosuseridedit.push(dadosuserid2[dado.id]);
    var tabela = document.getElementById('tabelanovouserbody2');
    var numeroLinhas = tabela.rows.length;
    var linha = tabela.insertRow(numeroLinhas);
    var celula1 = linha.insertCell(0);
    var celula2 = linha.insertCell(1);
    var celula3 = linha.insertCell(2);
    celula1.innerHTML = dadosusernome2[dado.id];
    celula2.innerHTML = dadosusername2[dado.id];
    celula3.innerHTML = "<button type='submit' class='btn btdelete' value='Remover' onclick='deletarlinhagrupo2(this)' name='remover' id='" + numeroLinhas + "'><span class='fontebotao' style='font-weight:400!important;'>Remover</span></button>";
    apagartabelapesquisanovouser2();
    $('#tabelanovouser2').css('display', 'block');
  }

  function deletarlinhagrupo(linha) {
    dadosusernomenovo.splice(linha.id, 1);
    dadosusernamenovo.splice(linha.id, 1);
    dadosuseridnovo.splice(linha.id, 1);
    apagartabelanovouser();
    for (var i = 0; i < dadosuseridnovo.length; i++) {
      var tabela = document.getElementById('tabelanovouserbody');
      var numeroLinhas = tabela.rows.length;
      var linha = tabela.insertRow(numeroLinhas);
      var celula1 = linha.insertCell(0);
      var celula2 = linha.insertCell(1);
      var celula3 = linha.insertCell(2);
      celula1.innerHTML = dadosusernomenovo[i];
      celula2.innerHTML = dadosusernamenovo[i];
      celula3.innerHTML = "<button type='submit' class='btn btdelete' value='Remover' onclick='deletarlinhagrupo(this)' name='remover' id='" + numeroLinhas + "'><span class='fontebotao' style='font-weight:400!important;'>Remover</span></button>";
    }

    if (document.getElementById('tabelanovouserbody').getElementsByTagName('tr').length == 0) {
      $('#tabelanovouser').css('display', 'none');
      alert('oi');
    } else {
      $('#tabelanovouser').css('display', 'block');
    }
  }

  function deletarlinhagrupo2(linha) {
    dadosusernomeedit.splice(linha.id, 1);
    dadosusernameedit.splice(linha.id, 1);
    dadosuseridedit.splice(linha.id, 1);
    apagartabelanovouser2();
    for (var i = 0; i < dadosuseridedit.length; i++) {
      var tabela = document.getElementById('tabelanovouserbody2');
      var numeroLinhas = tabela.rows.length;
      var linha = tabela.insertRow(numeroLinhas);
      var celula1 = linha.insertCell(0);
      var celula2 = linha.insertCell(1);
      var celula3 = linha.insertCell(2);
      celula1.innerHTML = dadosusernomeedit[i];
      celula2.innerHTML = dadosusernameedit[i];
      celula3.innerHTML = "<button type='submit' class='btn btdelete' value='Remover' onclick='deletarlinhagrupo2(this)' name='remover' id='" + numeroLinhas + "'><span class='fontebotao' style='font-weight:400!important;'>Remover</span></button>";
    }

    if (document.getElementById('tabelanovouserbody2').getElementsByTagName('tr').length == 0) {
      $('#tabelanovouser2').css('display', 'none');
    } else {
      $('#tabelanovouser2').css('display', 'block');
    }
  }

  function cadastrargrupo() {
    permissoesnovo = [];
    $('input[name="permissoesnovocheckbox"]:checked').each(function() {
      permissoesnovo.push(this.value);
    });
    console.log(permissoesnovo);
    $.ajax({
      type: "GET",
      url: "/cadastrar/grupo",
      data: {
        nomegrupo: document.getElementById('grupotext').value,
        userid: dadosuseridnovo,
        permissoesgrupo: permissoesnovo
      },
      dataType: "json",
      success: function(data) {
        dadosusernomenovo = [];
        dadosuseridnovo = [];
        dadosusernamenovo = [];
        $('#novogrupoModal').modal('hide');
        filtgrupos();
      }
    });
  }

  function editargrupo() {
    permissoesedit = [];
    $('input[name="permissoesnovocheckboxedit"]:checked').each(function() {
      permissoesedit.push(this.value);
    });
    $.ajax({
      type: "GET",
      url: "/editar/grupo",
      data: {
        grupoatual: document.getElementById('gruposselect').value,
        nomegrupo: document.getElementById('grupotext2').value,
        userid: dadosuseridedit,
        permissoesgrupo: permissoesedit
      },
      dataType: "json",
      success: function(data) {
        dadosusernomeedit = [];
        dadosuseridedit = [];
        dadosusernameedit = [];
        $('#divdadosgrupo').css('display', 'none');
        filtgrupos();
      }
    });
  }
</script>
@endsection

</html>