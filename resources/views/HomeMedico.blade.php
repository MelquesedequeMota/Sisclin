@extends('layouts.Menu')
@section('atalhoSuperior')@endsection
@section('menuLateral')@endsection
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Home Medico</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="{{asset('../css/cssgeral.css')}}">
  <!-- <link rel="stylesheet" href="{{asset('../css/consultas.css')}}"> -->
  <link rel="stylesheet" href="{{asset('../css/homemedico.css')}}">
  <script src="{{asset('jquery.min.js')}}"></script>
  <script src="{{asset('shortcut.js')}}"></script>
  <script src="{{asset('jquery-ui-1.12.1/jquery-ui.js')}}"></script>
  <script src="{{asset('inputmask/dist/jquery.inputmask.min.js')}}"></script>
  <script src="{{asset('inputmask/dist/bindings/inputmask.binding.js')}}"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

  <style>
    .btnchamar{
      height: 32px;
      border: 2px solid #127A7A;
      border-radius: 4px;
      background: transparent;
      color: #127A7A;
      display: flex;
      align-items: center;
    }

    .form-control {
      border-color: gray;
    }

    .form-floating>.form-control:focus,
    .form-floating>.form-control:not(:placeholder-shown) {
      padding-top: 2rem;
      padding-bottom: 0.3rem;
    }

    .distcampos {
      margin-bottom: 0.5rem;
    }
    
    .divlistahpp {
      display: flex;
      align-items: center;
      justify-content: space-around;
      padding: 0.2rem 0.4rem;

      min-width: 5rem;
      width: max-content;
      height: 33px;
      border: 1px solid #000000;
      box-sizing: border-box;
      border-radius: 4px;
      margin-right: 0.6rem;
    }

    #hpplista {
      display: flex;
      align-items: center;
      justify-content: space-between;
      width: max-content;
      max-width: 100%;
      margin-top: 7px;
    }

    .textobtborda {
      font-size: 14px;
    }

    #dadoscliente2 {
      /* height: 8rem; */
      margin-bottom: 1.5rem;
      background: #fffefe;
      border-radius: 8px;
    }

    .tratamentos{
      width: 245px;
      height: 90px;

      background: #87BCAB;
      border:none;
      border-radius: 6px;
      overflow-y: auto;
    }

    .margindaimg{
        margin-right:0.4rem;
    }
  </style>
</head>

<body>
  @section('Conteudo')
  <div class='divflexm'>
    <div class="menu-section scrollcss" id="menusect" style="display: flex;
    overflow-y: auto;">
      <div class=''>
        <div class="menu-toggle">
          <!-- <div class="one"></div>
          <div class="two"></div>
          <div class="three"></div> -->
          <div>
            <img src="../imagens/chamarpacientes.svg" alt="" id='iconchamarpacientes' class='iconchamarpacientes'>
          </div>
        </div>
        <div id='pacientes'>
          Consultório Atual: <select class="form-select" id='labatual' name='labatual'> </select>
          <!-- <table id='pacientestable' border='1px'>
                <tr>
                  <td>Paciente</td><td>Serviço</td><td>Hora</td><td>Ações</td>
                </tr>
              </table> -->
        </div>
        <div class='titulopacientes' id='titulopacientes'>Pacientes</div>
        <div id='listapacientes' class='listapacientes'></div>
      </div>
    </div>

    <div id='atendimentoatual'>
      <div class='transformdiv'>
        <div class='coluna'>
          <div id='dadoscliente'>
            <div>
              <div style='display:flex;justify-content: space-between;'>
                <span class='titulodados'>Dados do cliente</span>
                <div>
                  <button type='submit' class='btn btamarelo' onclick='abrirprontuario()'>
                    <span class='fontebotao2'>Ver prontuário</span>
                  </button>
                </div>
              </div>
            </div>

            <div style='margin-top: 3rem;'>
              <div class='divdadospaciente'>
                <!-- <img src="../imagens/nome.svg" alt="" class='icones'> -->
                &nbsp;
                <span class='infopacientes'>Nome:&nbsp;&nbsp;</span>
                <div id='pacienteatual' class='dados'></div>
              </div>
              <div class='divdadospaciente'>
                <!-- <img src="../imagens/idade.svg" alt="" class='icones'> -->
                &nbsp;
                <span class='infopacientes'>Idade:&nbsp;&nbsp;&nbsp;</span>
                <div id='idadeatual' class='dados'></div>
              </div>
              <div class='divdadospaciente'>
                <!-- <img src="https://img.icons8.com/ios/50/000000/compare-heights.png"/> -->
                &nbsp;
                <span class='infopacientes'>Altura:&nbsp;&nbsp;</span>
                <div id='alturaatual' class='dados'></div>
              </div>
              <div class='divdadospaciente'>
                <!-- <img src="../imagens/peso.svg" alt="" class='icones'> -->
                &nbsp;
                <span class='infopacientes'>Peso:&nbsp;&nbsp;&nbsp;&nbsp;</span>
                <div id='pesoatual' class='dados'></div>
              </div>
              <div class='divdadospaciente'>
                <!-- <img src="../imagens/pa.svg" alt="" class='icones'> -->
                &nbsp;
                <span class='infopacientes'>P.A.:</span>
                <div id='paatual' class='dados' style='margin-left: 1.5rem;'></div>
              </div>
              <div class='divdadospaciente'>
                &nbsp;
                <span class='infopacientes'>Sangue:&nbsp;&nbsp;&nbsp;</span>
                <div id='tiposangueatual' class='dados'></div>
              </div>
            </div>
          </div>

          <div style='margin-top:2rem;position:relative'>
            <div class='wrapper' id="elementos">
              <div class='item' onclick='atestadomedico()'>
                <div><img src="../imagens/atestados.svg" alt="" class='iconssaude'></div>
                <div class='fontssaude'>Atestados</div>
              </div>
              <div class='item' onclick='receituarios()'>
                <div><img src="../imagens/receituarios.svg" alt="" class='iconssaude'></div>
                <div class='fontssaude'>Receituários</div>
              </div>
              <div class='item' onclick='exames()'>
                <div><img src="../imagens/exames.svg" alt="" class='iconssaude'></div>
                <div class='fontssaude'>Exames</div>
              </div>
              <div class='item iconcomparecimento' onclick='atestadocomparecimento()'>
                <div><img src="../imagens/exames.svg" alt="" class='iconssaude'></div>
                <div class='fontssaude'>D. de Comparecimento</div>
              </div>
            </div>
            
            <div onclick='voltar()' class='voltar' style='position: absolute;left: 2.4rem;top: 37px;'>
              <img src='../imagens/setaleft.svg' alt='' style='width: 1.8rem;'>
            </div>
            <div onclick='avancar()' class='avancar' style='position: absolute;right: 2.4rem;top: 37px;'>
              <img src='../imagens/setaright.svg' alt='' style='width: 1.8rem;'>
            </div>
          </div>
        </div>
        <div class='coluna externapadraocores'>
          <div id='listaexamescliente' class='marginspadraocores'>
            <div id='tabela' class="table-responsive-sm">
              <table id='listexamestable' class="table">
                <thead class="table-active">
                  <tr>
                    <td scope="col">Exame</td>
                    <td scope="col">Quantidade</td>
                    <td scope="col">Situação</td>
                  </tr>
                </thead>
                <tbody id='listexamestablebody'>
                </tbody>
              </table>
            </div>
          </div>
          <!-- <div class='marginspadraocores'>
            <div class='condensed'>Padrão de cores</div>
            <div class='divflexm'>
              <div class='flexlinha'>
                <div class='bolas'></div>
                <span class='cores'>Prioridade</span>
              </div>
              <div class='flexlinha'>
                <div class='bolas' style='background:#af72e7!important'></div>
                <span class='cores'>Retorno</span>
              </div>
              <div class='flexlinha'>
                <div class='bolas' style='background:#127A7A!important'></div>
                <span class='cores'>Convencional</span>
              </div>
            </div>
          </div> -->
          <div>
            <div class='condensed'>Sobre esta consulta, deseja:</div>
            <div class='divflexbtns'>
              <button type='submit' name='cancelaratendimento' class='btn btbordared' id='cancelaratendimento' value='Cancelar Atendimento' onclick='cancelaratendimento()'>
                <span class='textobtborda'>Cancelar Atendimento</span>
              </button>
              &nbsp;&nbsp;&nbsp;
              <button type='submit' name='finalizaratendimento' class='btn btbordagreen' id='finalizaratendimento' value='Finalizar Atendimento' onclick='finalizaratendimento()'>
                <span class='textobtborda'>Finalizar Atendimento</span>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="iniciarAtendimentoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h6 class="modal-title" id="exampleModalLabel">Selecione o tipo de atendimento</h6>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input type='button' class="btn btnPesqTitu" value='Novo Atendimento' onclick='novoatendimento()' style='background: transparent;border: 2px solid #5045ab;color: #5045ab;'>
          <input type='button' class="btn btnPesqTitu" value='Retorno' onclick='retornoatendimento()' style='background:#5045ab'>
        </div>
        <div class="modal-footer">
          <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
          <button type="button" class="btn btn-primary">Save changes</button> -->
        </div>
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade bd-example-modal-lg" id="retornoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Selecionar Titular</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <table id='tabelaretorno'>
            <tr>
              <th>Nome</th>
              <th>Médico</th>
              <th>Ações</th>
            </tr>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        </div>
      </div>
    </div>
  </div>


  <!-- Modal Prontuario -->
  <div class="modal fade" id="prontuarioModal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalToggleLabel">Prontuário</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body fontreem">
          <div id='dadoscliente2'>
            <div class="row gx-7 gy-3">
              <div class="col-sm-7 col-md-6 col-lg-5">
                <div class='divdadospaciente'>
                  <span class=''>Nome:</span>
                  <div id='pacienteatual1' class='' style='margin-left: 1.5rem;'></div>
                </div>
              </div>
              <div class="col-sm-5 col-md-6 col-lg-5">
                <div class='divdadospaciente'>
                  <span class=''>Idade:</span>
                  <div id='idadeatual1' class='' style='margin-left: 1.7rem;'></div>
                </div>
              </div>
            </div>

            <div class="row gx-7 gy-3">
              <div class="col-sm-7 col-md-6 col-lg-5">
                <div class='divdadospaciente'>
                  <span class=''>Peso:</span>
                  <div id='pesoatual1' class='' style='margin-left: 2rem;'>
                    <input type='text' class="form-control tamanhoinput" name='pesoatualinput' id='pesoatualinput' placeholder='Sem Registro' onfocusout='attdadospac()'>
                  </div>
                </div>
              </div>
              <div class="col-sm-5 col-md-6 col-lg-5">
                <div class='divdadospaciente'>
                  <span class=''>Altura:</span>
                  <div id='alturaatual1' class='' style='margin-left: 1.2rem;'>
                    <input type='text' class="form-control tamanhoinput" name='alturaatualinput' id='alturaatualinput' placeholder='Sem Registro' onfocusout='attdadospac()'>
                  </div>
                </div>
              </div>
            </div>

            <div class="row gx-7 gy-3">
              <div class="col-sm-7 col-md-6 col-lg-5">
                <div class='divdadospaciente'>
                  <span class=''>P.A.:</span>
                  <div id='paatual1' class='' style='margin-left: 2.5rem;'>
                    <input type='text' class="form-control tamanhoinput" name='paatualinput' id='paatualinput' placeholder='Sem Registro' onfocusout='attdadospac()'> 
                  </div>
                </div>
              </div>
              <div class="col-sm-5 col-md-6 col-lg-5">
                <div class='divdadospaciente'>
                  <span class=''>Sangue:</span>
                  <div id='tiposangueatual1' class='' style='margin-left: 0.7rem;'>
                    <input type='text' class="form-control tamanhoinput" name='tiposangueatualinput' id='tiposangueatualinput' placeholder='Sem Registro' onfocusout='attdadospac()'>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div id='hpp' style='margin-bottom:1.5rem'>
            <!-- <button type='submit' name='novohpp' class='btn btbordagreen' id='novohpp' value='Novo HPP' onclick='novohpp()'>
              <span class='textobtborda'>Novo HPP</span>
            </button> -->
            <div>
              <div>Lista HPP</div>
            </div>
            <div id='hpplista'>
            </div>
          </div>
          <div id='histfamilia'>
            <!-- <div class="form-floating">
              <textarea class="form-control" placeholder="Histórico Familiar" id='histfamiliatext' onfocusout='salvarhistfamilia()' style="height: 100px;margin-bottom: 0.8rem;width:60%"></textarea>
              <label for="histfamiliatext">Histórico Familiar</label>
            </div> -->
            <label for="histfamiliatext" class="form-label">Histórico Familiar</label>
            <textarea class="form-control" id="histfamiliatext" rows="4" onfocusout='salvarhistfamilia()' style='width: 22rem;margin-bottom: 1.5rem;max-width:100%;'></textarea>
          </div>
          <div id='tratamentos'>
            <!-- <button type='submit' name='novotratamento' class='btn btbordagreen' id='novotratamento' value='Novo Tratamento' onclick='novotratamento()'>
              <span class='textobtborda'>Novo Tratamento</span>
            </button> -->
            <div id='tratamentoslista'>
              <h3>Lista Tratamentos</h3>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn" data-bs-target="#novohppModal" data-bs-toggle="modal" data-bs-dismiss="modal" style='background:#3AA97B'>Novo HPP</button>
          <button class="btn" data-bs-target="#novotratamentoModal" data-bs-toggle="modal" data-bs-dismiss="modal" style='background:#1853B4'>Novo Tratamento</button>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="novohppModal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalToggleLabel2">Novo HPP</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="container-fluid">
            <div class="row gx-3 gy-3">
              <div class="col-sm-8 col-md-8 col-lg-8">
                <div class="cor03">
                  <!-- <label for="hpptext" class="form-label">HPP</label> -->
                  <input type="text" class="form-control" aria-describedby="hpptext" name='hpptext' id='hpptext' placeholder='Digite o HPP do paciente' />
                </div>
              </div>
              <div class="col-sm-4 col-md-4 col-lg-4">
                <div class="cor03">
                  <button type="submit" class="btn btn-success" name='novohppbutton' id='novohppbutton' onclick='cadastrarhpp()' value='Cadastrar HPP' data-bs-target="#prontuarioModal" data-bs-toggle="modal" style='padding: 7px 8px!important;'>
                    <span class="fontebotao" style='font-size:15px'>Cadastrar HPP</span>
                  </button>
                </div>
              </div>
            </div>
          </div>
          <!-- <input type='text' name='hpptext' id='hpptext' placeholder='Digite o HPP do paciente'>
          <input type='button' name='novohppbutton' id='novohppbutton' onclick='cadastrarhpp()' value='Cadastrar Hpp'> -->
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" data-bs-target="#prontuarioModal" data-bs-toggle="modal" data-bs-dismiss="modal">Voltar</button>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="novotratamentoModal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalToggleLabel2">Novo Tratamento</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="">
            <div class="row gx-3 gy-3">
              <div class="col-sm-7 col-md-7 col-lg-7">
                <div class="cor03">
                  <!-- <label for="tratamentotext" class="form-label">Tratamento</label> -->
                  <input type="text" class="form-control" aria-describedby="tratamentotext" name='tratamentotext' id='tratamentotext' placeholder='Digite o nome do tratamento' />
                </div>
              </div>
              <div class="col-sm-5 col-md-5 col-lg-5">
                <div class="cor03">
                  <button type="submit" class="btn btn-success" name='novotratamentobutton' id='novotratamentobutton' onclick='cadastrartratamento()' value='Cadastrar Tratamento' data-bs-target="#prontuarioModal" data-bs-toggle="modal" style='padding: 7px 8px!important;'>
                    <span class="fontebotao" style='font-size:15px'>Cadastrar Tratamento</span>
                  </button>
                </div>
              </div>
            </div>
          </div>
          <!-- <input type='text' name='tratamentotext' id='tratamentotext' placeholder='Digite o nome do tratamento'>
          <input type='button' name='novotratamentobutton' id='novotratamentobutton' onclick='cadastrartratamento()' value='Cadastrar Tratamento'> -->
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" data-bs-target="#prontuarioModal" data-bs-toggle="modal" data-bs-dismiss="modal">Voltar</button>
        </div>
      </div>
    </div>
  </div>


  <!-- Modal Procedimento -->
  <div class="modal fade" id="tratamentoatualModal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalToggleLabel"><b id='titulotratamentomodal'></b></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="distcampos">
            <!-- <textarea class="form-control" placeholder="Queixa Principal" id="queixaprincipal" onfocusout='atttratamento()' style='width:25rem;max-width:100%;height:5rem'></textarea> -->
            <!-- <label for="queixaprincipal">Queixa Principal</label> -->

            <label for="queixaprincipal" class="form-label">Queixa Principal</label>
            <textarea class="form-control" id="queixaprincipal" rows="3" onfocusout='atttratamento()' style='width:25rem;max-width:100%;height:5rem;'></textarea>
          </div>
          <div class="distcampos">
            <!-- <textarea class="form-control" placeholder="História Doença Atual" id="historiadoencaatual" onfocusout='atttratamento()' style='width:25rem;max-width:100%;height:5rem'></textarea>
            <label for="historiadoencaatual">História Doença Atual</label> -->

            <label for="historiadoencaatual" class="form-label">História Doença Atual</label>
            <textarea class="form-control" id="historiadoencaatual" rows="3" onfocusout='atttratamento()' style='width:25rem;max-width:100%;height:5rem;'></textarea>
          </div>
          <div class="distcampos">
            <!-- <input type="text" class="form-control" name='examefisico' id="examefisico" placeholder="Exame Físico" onfocusout='atttratamento()' style=';margin-bottom:1rem;width:25rem;max-width:100%;height:4rem'>
            <label for="examefisico">Exame Físico</label> -->

            <label for="examefisico" class="form-label">Exame Físico</label>
            <input type="text" class="form-control" name='examefisico' id="examefisico" onfocusout='atttratamento()' style='width:25rem;max-width:100%;height:4rem;'>
          </div>
          <div class="distcampos">
            <!-- <input type="text" class="form-control" name='cid' id="cid" placeholder="CID" onfocusout='atttratamento()' style='margin-bottom:1rem;width:25rem;max-width:100%;height:4rem'>
            <label for="cid">CID</label> -->

            <label for="cid" class="form-label">CID</label>
            <input type="text" class="form-control" name='cid' id="cid" onfocusout='atttratamento()' style='width:25rem;max-width:100%;height:4rem;'>
          </div>
          <div class="distcampos">
            <!-- <input type="text" class="form-control" name='resultadoexames' id="resultadoexames" placeholder="Resultado de Exames" onfocusout='atttratamento()' style=';margin-bottom:1rem;width:25rem;max-width:100%;height:4rem'>
            <label for="resultadoexames">Resultado de Exames</label> -->

            <label for="resultadoexames" class="form-label">Resultado de Exames</label>
            <input type="text" class="form-control" name='resultadoexames' id="resultadoexames" onfocusout='atttratamento()' style='width:25rem;max-width:100%;height:4rem;'>
          </div>
          <div class="distcampos">
            <!-- <input type="text" class="form-control" name='recomendacoes' id="recomendacoes" placeholder="Recomendações" onfocusout='atttratamento()' style=';margin-bottom:1rem;width:25rem;max-width:100%;height:4rem'>
            <label for="recomendacoes">Recomendações</label> -->

            <label for="recomendacoes" class="form-label">Recomendações</label>
            <input type="text" class="form-control" name='recomendacoes' id="recomendacoes" onfocusout='atttratamento()' style='width:25rem;max-width:100%;height:4rem;'>
          </div>
          <div class="distcampos">
            <!-- <input type="text" class="form-control" name='evolucao' id="evolucao" placeholder="Evolução" onfocusout='atttratamento()' style=';margin-bottom:1rem;width:25rem;max-width:100%;height:4rem'>
            <label for="evolucao">Evolução</label> -->

            <label for="evolucao" class="form-label">Evolução</label>
            <input type="text" class="form-control" name='evolucao' id="evolucao" onfocusout='atttratamento()' style='width:25rem;max-width:100%;height:4rem;'>
          </div>
          <!-- <button type='submit' name='novaevolucao' class='btn btbordagreen' id='novaevolucao' value='Nova Evolução' onclick='novaevolucao()'>
            <span class='textobtborda'>Nova Evolução</span>
          </button> -->
          {{-- <div id='semevolucaodiv'> Não existem evoluções documentadas. </div>
          <div id='evolucaodiv'>
            <div id='tabela' class="table-responsive-sm">
              <table id='evolucaotable' class="table">
                <thead class="table-active">
                  <tr>
                    <td scope="col">Data</td>
                    <td scope="col">Médico</td>
                    <td scope="col">Título Evolução</td>
                    <td scope="col">Desc Evolução</td>
                    <td scope="col">Tratamento</td>
                    <td scope="col">Ações</td>
                  </tr>
                </thead>
                <tbody id='evolucaotablebody'>
                </tbody>
              </table>
            </div>
          </div> --}}
          <!-- <button type='submit' name='novoprocedimento' class='btn btbordagreen' id='novoprocedimento' value='Novo Procedimento' onclick='novoprocedimento()'>
            <span class='textobtborda'>Novo Procedimento</span>
          </button> -->
          <div id='semprocedimentodiv'> Não existem procedimentos documentados. </div>
          <div id='procedimentodiv'>
            <div id='tabela' class="table-responsive">
              <table id='procedimentotable' class="table">
                <thead class="table-active">
                  <tr>
                    <td scope="col">Data</td>
                    <td scope="col">Procedimento</td>
                    <td scope="col">Situação</td>
                    <td scope="col">Finalização</td>
                    <td scope="col">Ações</td>
                  </tr>
                </thead>
                <tbody id='procedimentotablebody'>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          {{-- <button class="btn btn-primary" data-bs-target="#novaevolucaoModal" data-bs-toggle="modal" data-bs-dismiss="modal" onclick='novaevolucao()' style='background:#1853B4'>Nova Evolução</button> --}}
          <button class="btn btn-primary" data-bs-target="#novoprocedimentoModal" data-bs-toggle="modal" data-bs-dismiss="modal" onclick='novoprocedimento()' style='background:#3AA97B'>Novo Procedimento</button>
          <button class="btn btn-primary"  onclick='finalizartratamento()'>Finalizar Tratamento</button>
          <button class="btn btn-secondary" data-bs-target="#prontuarioModal" data-bs-toggle="modal" data-bs-dismiss="modal">Voltar para Prontuário</button>
        </div>
      </div>
    </div>
  </div>
  {{-- <div class="modal fade" id="novaevolucaoModal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalToggleLabel2">Nova Evolução</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="container-fluid">
            <div class="row gx-3 gy-3">
              <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="cor03">
                  <div class="form-floating">
                    <textarea class="form-control" placeholder="Título da Evolução" id='tituloevolucaotext' style="height: 70px"></textarea>
                    <label for="tituloevolucaotext">Título da Evolução</label>
                  </div>
                </div>
              </div>
              <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="cor03">
                  <div class="form-floating">
                    <textarea class="form-control" placeholder="Descrição da Evolução" id='descevolucaotext' style="height: 100px"></textarea>
                    <label for="descevolucaotext">Descrição da Evolução</label>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- <textarea id='tituloevolucaotext' placeholder='Digite o título da evolução'></textarea><br>
          <textarea id='descevolucaotext' placeholder='Digite a descrição da evolução'></textarea><br>
          <input type='button' name='novaevolucaobutton' id='novaevolucaobutton' onclick='cadastrarevolucao()' value='Cadastrar Evolução'> -->
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success" name='novaevolucaobutton' id='novaevolucaobutton' onclick='cadastrarevolucao()' value='Cadastrar Evolução' data-bs-target="#tratamentoatualModal" data-bs-toggle="modal">
            <span class="fontebotao" style='font-size:15px'>Cadastrar Evolução</span>
          </button>
          <button class="btn btn-secondary" data-bs-target="#tratamentoatualModal" data-bs-toggle="modal" data-bs-dismiss="modal">Voltar</button>
        </div>
      </div>
    </div>
  </div> --}}
  <div class="modal fade" id="novoprocedimentoModal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalToggleLabel2">Novo Procedimento</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="container-fluid">
            <div class="row gx-3 gy-3">
              <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="cor03">
                  <label for="novoprocedimentoselect" class="form-label">Procedimento</label>
                  <select id='novoprocedimentoselect' class='form-select'></select>
                </div>
              </div>
              <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="cor03">
                  <label for="novoprocedimentosituacao" class="form-label">Situação</label>
                  <select class='form-select' id='novoprocedimentosituacao'>
                    <option value='realizar'>A Realizar</option>
                    <option value='observado'>Observado</option>
                    <option value='finalizado'>Finalizado</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <!-- Procedimento: <select id='novoprocedimentoselect'></select><br>
          Situação: <select id='novoprocedimentosituacao'>
            <option value=''>Selecione uma Situação</option>
            <option value='realizar'>A Realizar</option>
            <option value='observado'>Observado</option>
            <option value='finalizado'>Finalizado</option>
          </select><br>
          <input type='button' name='novoprocedimentobutton' id='novoprocedimentobutton' onclick='cadastrarprocedimento()' value='Cadastrar Procedimento'> -->
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success" name='novoprocedimentobutton' id='novoprocedimentobutton' onclick='cadastrarprocedimento()' value='Cadastrar Procedimento' data-bs-target="#tratamentoatualModal" data-bs-toggle="modal">
            <span class="fontebotao" style='font-size:15px'>Cadastrar Procedimento</span>
          </button>
          <button class="btn btn-secondary" data-bs-target="#tratamentoatualModal" data-bs-toggle="modal" data-bs-dismiss="modal">Voltar</button>
        </div>
      </div>
    </div>
  </div>


  <!-- Modal Excluir -->
  <div class="modal fade" id="removerevolucaoModal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalToggleLabel">Excluir Evolução</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Tem certeza que deseja excluir essa evolução?
        </div>
        <div class="modal-footer">
          <button class="btn btn-primary" data-bs-target="#tratamentoatualModal" data-bs-toggle="modal" data-bs-dismiss="modal" onclick='removerEvolucaoConfirm()'>Excluir</button>
          <button class="btn btn-secondary" data-bs-target="#tratamentoatualModal" data-bs-toggle="modal" data-bs-dismiss="modal">Cancelar</button>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="removerprocedimentoModal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalToggleLabel2">Excluir Procedimento</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Tem certeza que deseja excluir esse Procedimento?
        </div>
        <div class="modal-footer">
          <button class="btn btn-primary" data-bs-target="#tratamentoatualModal" data-bs-dismiss="modal" onclick='removerProcedimentoConfirm()'>Excluir</button>
          <button class="btn btn-secondary" data-bs-target="#tratamentoatualModal" data-bs-dismiss="modal">Cancelar</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="examesModal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalToggleLabel2">Solicitações</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <button class="btn btn-primary"  onclick='solicitarexame()' style='margin-bottom: 1rem;'>Solicitação de Exame</button>
          <button class="btn btn-primary"  onclick='solicitarraiox()' style='margin-bottom: 1rem;'>Solicitação de Raio X</button>
          <button class="btn btn-primary"  onclick='solicitarultrassom()' style='margin-bottom: 1rem;'>Solicitação de Ultrassom</button>
        </div>
        <div class="modal-footer">
          <!-- <button class="btn btn-primary" data-bs-target="#tratamentoatualModal" data-bs-dismiss="modal" onclick='removerProcedimentoConfirm()'>Excluir</button> -->
          <!-- <button class="btn btn-secondary" data-bs-target="#examesModal" data-bs-dismiss="modal">Cancelar</button> -->
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="receituariosModal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalToggleLabel2">Receitas</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <button class="btn btn-primary"  onclick='receitamedica()'>Receita Médica</button>
          <button class="btn btn-primary"  onclick='receituario()'>Receituário de Controle Especial</button>
        </div>
        <div class="modal-footer">
          <!-- <button class="btn btn-primary" data-bs-target="#tratamentoatualModal" data-bs-dismiss="modal" onclick='removerProcedimentoConfirm()'>Excluir</button> -->
          <!-- <button class="btn btn-secondary" data-bs-target="#receituariosModal" data-bs-dismiss="modal">Cancelar</button> -->
        </div>
      </div>
    </div>
  </div>

</body>
<script>
  let show = true
  const menuSection = document.querySelector('.menu-section')
  const menuToggle = menuSection.querySelector('.menu-toggle')

  menuToggle.addEventListener('click', () => {
    // if ternário
    // document.body.style.overflow = show ? 'hidden' : 'initial'
    if (document.body.style.overflow = show) {
      document.body.style.overflow = 'hidden';
      document.getElementById('iconchamarpacientes').setAttribute('src', '../imagens/fechar2.svg');
      document.getElementById('pacientes').style.display = 'block';
      document.getElementById('titulopacientes').style.display = 'block';
      document.getElementById('listapacientes').style.display = 'block';
    } else {
      document.body.style.overflow = 'initial';
      document.getElementById('iconchamarpacientes').setAttribute('src', '../imagens/chamarpacientes.svg');
      document.getElementById('pacientes').style.display = 'none';
      document.getElementById('titulopacientes').style.display = 'none';
      document.getElementById('listapacientes').style.display = 'none';
    }

    menuSection.classList.toggle('on', show)
    show = !show
  })

  function avancar() {
    document.getElementById('elementos').scrollLeft += 70;
  }

  function voltar() {
    document.getElementById('elementos').scrollLeft -= 70;
  }

  $('.input').css('display', 'block');
  var medid = {{Auth::user() -> user_id}};
  sessionStorage.setItem('medid', medid);
  var listapacconf = [];
  var listapacnome = [];
  var listapacservnome = [];
  var listapacserv = [];
  var listapachora = [];
  var listapacid = [];
  var listapacprioridade = [];
  var countlistapac = 0;
  var countlistapac2 = 0;
  var countlistapaccomparar = 0;
  var pesquisarserv = 0;
  var listapacidatual = 0;
  var dadoslinhas = [];
  var dadoslinhasretorno = [];
  var consultorioatual = 2;
  var tratamentoatual = 0;
  var removerEvolucaoAtual = 0;
  var removerProcedimentoAtual = 0;
  var editprocedimentoatual = 0;

  var ematendimento = 0;
  var idpacatual = 0;
  var nomepacatual = '';

  var listexamesid = [];
  var listexamessitu = [];
  check();
  laboratorios();

  function laboratorios() {
    $.ajax({
      type: "GET",
      url: "/laboratorioslivres",
      data: {},
      dataType: "json",
      success: function(data) {
        var select = document.getElementById('labatual');
        for (var i = 0; i < data.length; i++) {
          var opt = document.createElement('option');
          opt.appendChild(document.createTextNode(data[i]['lab_nome']));
          opt.value = data[i]['lab_id'];
          select.appendChild(opt);
        }
      }
    });
  }

  function check() {
    if (sessionStorage.getItem('pacatual') != null) {
      ematendimento = 1;
      dadoscliente(sessionStorage.getItem('pacatual'));
    }
    esconder();
  }

  function cancelaratendimento() {
    ematendimento = 0;
    sessionStorage.clear();
    check();
  }

  function finalizaratendimento() {
    listexamessitu = [];
    for(var i = 0; i < listexamesid.length; i++){
      listexamessitu.push(document.getElementById('selectexame'+ listexamesid[i]).value);
    }

    $.ajax({
      type: "GET",
      url: "/finalizaratendimento",
      data: {
        id: sessionStorage.getItem('idagenda'),
        lab: document.getElementById('labatual').value,
        listexamesid: listexamesid,
        listexamessitu: listexamessitu,
      },
      dataType: "json",
      success: function(data) {
        ematendimento = 0;
        sessionStorage.clear();
        check();
      }
    });

  }

  function abrirprontuario() {
    $('#prontuarioModal').modal('show');
  }

  setInterval(pesquisarlistapac, 1000);

  function pesquisarlistapac() {
    $.ajax({
      type: "GET",
      url: "/medicolistapac",
      data: {
        medid: medid
      },
      dataType: "json",
      success: function(data) {
        countlistapac = data.length;
        listapacconf = [];
        for (var i = 0; i < data.length; i++) {
          listapacconf.push(data[i]['age_id']);
        }
        if (listapacid.length != listapacconf.length) {
          // console.log('passou');
          listapacconf = [];
          listapacnome = [];
          listapachora = [];
          listapacid = [];
          listapacprioridade = [];
          countlistapac2 = 0;
          for (var i = 0; i < data.length; i++) {
            listapacid.push(data[i]['age_id']);
            listapacnome.push(data[i]['age_pessoa'].split(' - ')[0]);
            listapachora.push(data[i]['age_data'].split(' - ')[1]);
            listapacprioridade.push(data[i]['age_prioridade']);
            countlistapac2++;
          }
        } else {
          // console.log('passou2');
          countlistapaccomparar = 0;
          for (var i = 0; i < listapacid.length; i++) {
            if (listapacid[i] == listapacconf[i]) {
              countlistapaccomparar++;
            }
          }
          if (countlistapaccomparar != countlistapac) {
            listapacnome = [];
            listapacdata = [];
            listapacid = [];
            listapacprioridade = [];
            countlistapac2 = 0;
            for (var i = 0; i < data.length; i++) {
              listapacid.push(data[i]['age_id']);
              listapacnome.push(data[i]['age_pessoa'].split(' - ')[0]);
              listapachora.push(data[i]['age_data'].split(' - ')[1]);
              listapacprioridade.push(data[i]['age_prioridade']);
              countlistapac2++;
            }
          }
        }
        if (countlistapac == countlistapac2) {
          // console.log('passou3');
          atualizartabela();
        }
      }
    });
  }

  function esconder() {
    if (ematendimento == 1) {
      document.getElementById('atendimentoatual').style.display = 'block';
    } else {
      document.getElementById('atendimentoatual').style.display = 'none';
    }
  }

  function atualizartabela() {
    document.getElementById('listapacientes').innerHTML = '';

    for (i = 0; i < listapacid.length; i++) {
      if(listapacprioridade[i] == 'Normal'){
        document.getElementById('listapacientes').innerHTML += "<div style='display:flex'><div style='background: #fff7f7;border: 1px solid #FFFFFF;box-sizing: border-box;border-radius: 21px;width: 1rem;height: 1rem;margin-top: 0.7rem;'></div>&nbsp;<span id='nomepaciente" + i + "' class='nomepaciente'>" + listapacnome[i] + "</span></div><div class='servicopaciente'><span>Horário:&nbsp;<span id='hora" + i + "'>" + listapachora[i].substr(0, 5) + "</span></span></div><div style='display: flex;margin-top: 0.4rem;margin-bottom:1rem;' class='btnspainellateral'><button type='submit' class='btn btnchamar' value='Chamar Paciente' id='chamar" + i + "' onclick='chamar(this)'><span class='fontebotao' style='color:#127A7A'>Chamar</span></button><button type='submit' class='botaoverde' value='Iniciar Atendimento' id='iniciaratendimento" + i + "' onclick='iniciaratendimento(this)'><span class=''>Iniciar Atendimento</span></button></div>";
      }else if(listapacprioridade[i]=='Prioridade1'){
        document.getElementById('listapacientes').innerHTML += "<div style='display:flex'><div style='background: #fff7f7;border: 1px solid #FFFFFF;box-sizing: border-box;border-radius: 21px;width: 1rem;height: 1rem;margin-top: 0.7rem;'></div>&nbsp;<span id='nomepaciente" + i + "' class='nomepaciente'>" + listapacnome[i] + "</span></div><div class='servicopaciente'><span>Horário:&nbsp;<span id='hora" + i + "'>" + listapachora[i].substr(0, 5) + "</span></span></div><div style='display: flex;margin-top: 0.4rem;margin-bottom:1rem;' class='btnspainellateral'><button type='submit' class='btn btnchamar' value='Chamar Paciente' id='chamar" + i + "' onclick='chamar(this)'><span class='fontebotao' style='color:#127A7A'>Chamar</span></button><button type='submit' class='botaoverde' value='Iniciar Atendimento' id='iniciaratendimento" + i + "' onclick='iniciaratendimento(this)'><span class=''>Iniciar Atendimento</span></button></div>";
      }else if(listapacprioridade[i]=='Prioridade2'){
        document.getElementById('listapacientes').innerHTML += "<div style='display:flex'><div style='background: #fff7f7;border: 1px solid #FFFFFF;box-sizing: border-box;border-radius: 21px;width: 1rem;height: 1rem;margin-top: 0.7rem;'></div>&nbsp;<span id='nomepaciente" + i + "' class='nomepaciente'>" + listapacnome[i] + "</span></div><div class='servicopaciente'><span>Horário:&nbsp;<span id='hora" + i + "'>" + listapachora[i].substr(0, 5) + "</span></span></div><div style='display: flex;margin-top: 0.4rem;margin-bottom:1rem;' class='btnspainellateral'><button type='submit' class='btn btnchamar' value='Chamar Paciente' id='chamar" + i + "' onclick='chamar(this)'><span class='fontebotao' style='color:#127A7A'>Chamar</span></button><button type='submit' class='botaoverde' value='Iniciar Atendimento' id='iniciaratendimento" + i + "' onclick='iniciaratendimento(this)'><span class=''>Iniciar Atendimento</span></button></div>";
      }else if(listapacprioridade[i]=='Retorno'){
        document.getElementById('listapacientes').innerHTML += "<div style='display:flex'><div style='background: #fff7f7;border: 1px solid #FFFFFF;box-sizing: border-box;border-radius: 21px;width: 1rem;height: 1rem;margin-top: 0.7rem;'></div>&nbsp;<span id='nomepaciente" + i + "' class='nomepaciente'>" + listapacnome[i] + "</span></div><div class='servicopaciente'><span>Horário:&nbsp;<span id='hora" + i + "'>" + listapachora[i].substr(0, 5) + "</span></span></div><div style='display: flex;margin-top: 0.4rem;margin-bottom:1rem;' class='btnspainellateral'><button type='submit' class='btn btnchamar' value='Chamar Paciente' id='chamar" + i + "' onclick='chamar(this)'><span class='fontebotao' style='color:#127A7A'>Chamar</span></button><button type='submit' class='botaoverde' value='Iniciar Atendimento' id='iniciaratendimento" + i + "' onclick='iniciaratendimento(this)'><span class=''>Iniciar Atendimento</span></button></div>";
      }
      
    }
  }

  function iniciaratendimento(celula) {
    $('#iniciarAtendimentoModal').modal('show');
    idpacatual = listapacid[celula.id.substr(18, 1)];
    nomepacatual = listapacnome[celula.id.substr(18, 1)];
  }

  function novoatendimento(celula) {
    $.ajax({
      type: "GET",
      url: "/iniciaratendimento",
      data: {
        id: idpacatual,
        nome: nomepacatual,
        lab: document.getElementById('labatual').value
      },
      dataType: "json",
      success: function(data) {
        document.getElementById('pacienteatual').innerHTML = nomepacatual;
        ematendimento = 1;
        esconder();
        console.log(data);
        dadoscliente(data);
        $('#iniciarAtendimentoModal').modal('hide');
        sessionStorage.setItem('tipoatendimento', 1);
        sessionStorage.setItem('idagenda', idpacatual);
      }
    });
  }

  function listatendimentoexames(){
    $.ajax({
      type: "GET",
      url: "/listatendimentoexames",
      data: {
        idagenda: sessionStorage.getItem('idagenda'),
      },
      dataType: "json",
      success: function(data) {
        listexamesid = [];
        listexamessitu = [];
        var tableHeaderRowCount = 0;
        var table = document.getElementById('listexamestablebody');
        var rowCount = table.rows.length;
        for (var i = tableHeaderRowCount; i < rowCount; i++) {
          table.deleteRow(tableHeaderRowCount);
        }
          
        for(var i = 0; i < data['idagendamento'].length; i++){
          listexamesid.push(data['idagendamento'][i]);
          listexamessitu.push(data['situacao'][i]);
          var tabela = document.getElementById('listexamestablebody');
          var numeroLinhas = tabela.rows.length;
          var linha = tabela.insertRow(numeroLinhas);
          var celula1 = linha.insertCell(0);
          var celula2 = linha.insertCell(1);
          var celula3 = linha.insertCell(2);
          celula1.innerHTML = data['nomeexame'][i];
          celula2.innerHTML = data['qtdexame'][i];
          celula3.innerHTML = "<select id='selectexame" + data['idagendamento'][i] + "' name='selectexame" + data['idagendamento'][i] + "' class='form-select'><option value='realizar'>A Realizar</option><option value='observado'>Observado</option><option value='finalizado'>Finalizado</option></select>";
        }

        preenchersituacao();
      }
    });
  }

  function preenchersituacao(){
    for(var i = 0; i < listexamesid.length; i++){
      document.getElementById('selectexame'+listexamesid[i]).value = listexamessitu[i];
    }
  }

  function iniciarretornoatendimento(cedula) {
    $.ajax({
      type: "GET",
      url: "/iniciaratendimento",
      data: {
        id: dadoslinhasretorno[cedula.id.substr(25)],
        nome: nomepacatual,
        lab: document.getElementById('labatual').value
      },
      dataType: "json",
      success: function(data) {
        document.getElementById('pacienteatual').innerHTML = 'Paciente Atual: ' + nomepacatual;
        ematendimento = 1;
        esconder();
        dadoscliente(data);
        $('#retornoModal').modal('hide');
        sessionStorage.setItem('tipoatendimento', 2);
        sessionStorage.setItem('idagenda', dadoslinhasretorno[cedula.id.substr(25)]);
      }
    });
  }

  function retornoatendimento() {
    dadoslinhasretorno = [];
    $.ajax({
      type: "GET",
      url: "/retornoatendimento",
      data: {
        id: idpacatual,
        idmedico: medid
      },
      dataType: "json",
      success: function(data) {
        var tableHeaderRowCount = 1;
        var table = document.getElementById('tabelaretorno');
        var rowCount = table.rows.length;
        for (var i = tableHeaderRowCount; i < rowCount; i++) {
          table.deleteRow(tableHeaderRowCount);
        }

        console.log(data);

        for (i = 0; i < data[0].length; i++) {
          var tabela = document.getElementById('tabelaretorno');
          var numeroLinhas = tabela.rows.length;
          var linha = tabela.insertRow(numeroLinhas);
          var celula1 = linha.insertCell(0);
          var celula2 = linha.insertCell(1);
          var celula3 = linha.insertCell(2);
          var celula4 = linha.insertCell(3);
          dadoslinhasretorno.push(data[0][i]);
          celula1.innerHTML = data[1][i];
          celula2.innerHTML = data[2][i];
          celula3.innerHTML = data[3][i];
          celula4.innerHTML = "<input type='button' name='iniciarretornoatendimento" + i + "' id='iniciarretornoatendimento" + i + "' value='Iniciar Retorno' onclick='iniciarretornoatendimento(this)'>";
        }
        $('#iniciarAtendimentoModal').modal('hide');
        $('#retornoModal').modal('show');
      }
    });
  }

  function novohpp() {
    $('#novohppModal').modal('show');
  }

  function cadastrarhpp() {
    if (document.getElementById('hpptext').value != '') {
      $.ajax({
        type: "GET",
        url: "/novohpp",
        data: {
          idpessoa: sessionStorage.getItem('pacatual'),
          nomepatologia: document.getElementById('hpptext').value
        },
        dataType: "json",
        success: function(data) {
          $('#novohppModal').modal('hide');
          document.getElementById('hpptext').value = '';
          listhpp();
        }
      });
    }
  }

  function listhpp() {
    $.ajax({
      type: "GET",
      url: "/listhpp",
      data: {
        idpessoa: sessionStorage.getItem('pacatual')
      },
      dataType: "json",
      success: function(data) {
        document.getElementById('hpplista').innerHTML = "";
        if (data.length != 0) {
          for (var i = 0; i < data.length; i++) {
            document.getElementById('hpplista').innerHTML += "<div class='divlistahpp'><div>" + data[i]['nomepatologia'] + "</div><div type='button' onclick='apagarhpp(" + data[i]['idhpp'] + ")'><img src='../imagens/fechar3.svg' alt='' style='width:0.6rem;margin-left:0.6rem'></div></div>";
          }
        } else {
          document.getElementById('hpplista').innerHTML = 'Nenhuma HPP Inserida.';
        }

      }
    });
  }

  function apagarhpp(idhpp) {
    $.ajax({
      type: "GET",
      url: "/apagarhpp",
      data: {
        idhpp: idhpp
      },
      dataType: "json",
      success: function(data) {
        listhpp();
      }
    });
  }

  function salvarhistfamilia() {
    if (document.getElementById('histfamiliatext').value != '') {
      $.ajax({
        type: "GET",
        url: "/salvarhistfamilia",
        data: {
          idpessoa: sessionStorage.getItem('pacatual'),
          deschistfamilia: document.getElementById('histfamiliatext').value
        },
        dataType: "json",
        success: function(data) {
          console.log('Histórico salvo com sucesso!');
        }
      });
    }
  }

  function novotratamento() {
    $('#novotratamentoModal').modal('show');
  }

  function cadastrartratamento() {
    if (document.getElementById('tratamentotext').value != '') {
      $.ajax({
        type: "GET",
        url: "/novotratamento",
        data: {
          idpessoa: sessionStorage.getItem('pacatual'),
          nometratamento: document.getElementById('tratamentotext').value
        },
        dataType: "json",
        success: function(data) {
          $('#novotratamentoModal').modal('hide');
          document.getElementById('tratamentotext').value = '';
          listtratamento();
        }
      });
    }
  }

  function listtratamento() {
    $.ajax({
      type: "GET",
      url: "/listtratamento",
      data: {
        idpessoa: sessionStorage.getItem('pacatual')
      },
      dataType: "json",
      success: function(data) {
        document.getElementById('tratamentoslista').innerHTML = '';
        if (data.length != 0) {
          for (var i = 0; i < data.length; i++) {
            if(data[i]['datafim'] == null || data[i]['datafim'] == ''){
              var datatratamentoatual = data[i]['datainicio'].split('-')[2] + '/' + data[i]['datainicio'].split('-')[1] + '/' + data[i]['datainicio'].split('-')[0];
              document.getElementById('tratamentoslista').innerHTML += "<button type='submit' name='tratamento" + data[i][' idtratamento'] + "' class='tratamentos margensbox' data-bs-target=' #tratamentoatualModal' data-bs-dismiss='modal' id='tratamento" + data[i][' idtratamento'] + "' onclick='abrirtratamento(" + data[i]['idtratamento'] + ")'><div class='alinharitensbox'><div class='margindaimg'><img src='../imagens/calendario.svg'></div><div><div class='alinhartextos titulo'>" + data[i]['nometratamento'] + "</div><div class='alinhartextos'>Início: " + datatratamentoatual + "</div>" + "<div class='alinhartextos'>Situação: " + data[i]['situacao'] + "</div></div></div></button>"
            }else{
              var datatratamentoatual = data[i]['datafim'].split('-')[2] + '/' + data[i]['datafim'].split('-')[1] + '/' + data[i]['datafim'].split('-')[0];
              document.getElementById('tratamentoslista').innerHTML += "<button type='submit' name='tratamento" + data[i][' idtratamento'] + "' class='tratamentos margensbox' data-bs-target=' #tratamentoatualModal' data-bs-dismiss='modal' id='tratamento" + data[i][' idtratamento'] + "' onclick='abrirtratamento(" + data[i]['idtratamento'] + ")'><div class='alinharitensbox'><div class='margindaimg'><img src='../imagens/calendario.svg'></div><div><div class='alinhartextos titulo'>" + data[i]['nometratamento'] + "</div><div class='alinhartextos'>Fim: " + datatratamentoatual + "</div>" + "<div class='alinhartextos'>Situação: " + data[i]['situacao'] + "</div></div></div></button>"
            }
            
          }
        } else {
          document.getElementById('tratamentoslista').innerHTML = 'Nenhum Tratamento Inserido';
        }
      }
    });
  }

  function abrirtratamento(idtratamento) {
    tratamentoatual = idtratamento
    $.ajax({
      type: "GET",
      url: "/abrirtratamento",
      data: {
        idtratamento: idtratamento
      },
      dataType: "json",
      success: function(data) {
        document.getElementById('titulotratamentomodal').innerHTML = data['nometratamento'];
        document.getElementById('queixaprincipal').value = data['queixaprincipal'];
        document.getElementById('historiadoencaatual').value = data['historiadoencaatual'];
        document.getElementById('cid').value = data['cid'];
        document.getElementById('examefisico').value = data['examefisico'];
        document.getElementById('resultadoexames').value = data['resultadoexames'];
        document.getElementById('recomendacoes').value = data['recomendacoes'];
        document.getElementById('evolucao').value = data['evolucao'];

        $('#tratamentoatualModal').modal('show');
        // listevolucao();
        listprocedimento();
      }
    });
  }

  function atttratamento() {
    $.ajax({
      type: "GET",
      url: "/atttratamento",
      data: {
        idtratamento: tratamentoatual,
        queixaprincipal: document.getElementById('queixaprincipal').value,
        historiadoencaatual: document.getElementById('historiadoencaatual').value,
        cid: document.getElementById('cid').value,
        examefisico: document.getElementById('examefisico').value,
        resultadoexames: document.getElementById('resultadoexames').value,
        recomendacoes: document.getElementById('recomendacoes').value,
        evolucao: document.getElementById('evolucao').value
      },
      dataType: "json",
      success: function(data) {
        console.log('Tratamento atualizado com sucesso!');
      }
    });
  }

  function novaevolucao() {
    $('#novaevolucaoModal').modal('show');
  }

  function cadastrarevolucao() {
    if (document.getElementById('tituloevolucaotext').value != '') {
      $.ajax({
        type: "GET",
        url: "/novaevolucao",
        data: {
          idtratamento: tratamentoatual,
          medid: sessionStorage.getItem('medid'),
          tituloevolucao: document.getElementById('tituloevolucaotext').value,
          descevolucao: document.getElementById('descevolucaotext').value
        },
        dataType: "json",
        success: function(data) {
          $('#novaevolucaoModal').modal('hide');
          document.getElementById('tituloevolucaotext').value = '';
          document.getElementById('descevolucaotext').value = '';
          // listevolucao();
        }
      });
    }
  }

  // function listevolucao() {
  //   apagartabelaevolucao();
  //   document.getElementById('semevolucaodiv').style.display = 'none';
  //   document.getElementById('evolucaodiv').style.display = 'none';
  //   $.ajax({
  //     type: "GET",
  //     url: "/listevolucao",
  //     data: {
  //       idtratamento: tratamentoatual
  //     },
  //     dataType: "json",
  //     success: function(data) {
  //       console.log(data);
  //       if (data['dataevolucao'].length != 0) {

  //         document.getElementById('semevolucaodiv').style.display = 'none';
  //         document.getElementById('evolucaodiv').style.display = 'block';
  //         for (var i = 0; i < data['dataevolucao'].length; i++) {
  //           var tabela = document.getElementById('evolucaotablebody');
  //           var numeroLinhas = tabela.rows.length;
  //           var linha = tabela.insertRow(numeroLinhas);
  //           var celula1 = linha.insertCell(0);
  //           var celula2 = linha.insertCell(1);
  //           var celula3 = linha.insertCell(2);
  //           var celula4 = linha.insertCell(3);
  //           var celula5 = linha.insertCell(4);
  //           var celula6 = linha.insertCell(5);
  //           celula1.innerHTML = data['dataevolucao'][i];
  //           celula2.innerHTML = data['medico'][i];
  //           celula3.innerHTML = data['tituloevolucao'][i];
  //           celula4.innerHTML = data['descevolucao'][i];
  //           celula5.innerHTML = data['tratamento'][i];
  //           celula6.innerHTML = "<button type='submit' class='btn btdelete' value='Excluir' onclick='removerEvolucao(this)' id='" + data['idevolucao'][i] + "'><span class='fontebotao'>Excluir</span></button>";
  //         }

  //       } else {
  //         document.getElementById('semevolucaodiv').style.display = 'block';
  //         document.getElementById('evolucaodiv').style.display = 'none';
  //       }

  //     }
  //   });

  // }

  function removerEvolucao(evolucao) {
    removerEvolucaoAtual = evolucao.id;
    $('#removerevolucaoModal').modal('show');
  }

  function removerEvolucaoConfirm() {
    $.ajax({
      type: "GET",
      url: "/removerevolucao",
      data: {
        idevolucao: removerEvolucaoAtual
      },
      dataType: "json",
      success: function(data) {
        $('#removerevolucaoModal').modal('hide');
        // listevolucao();
      }
    });
  }

  function apagartabelaevolucao() {
    var tableHeaderRowCount = 0;
    var table = document.getElementById('evolucaotablebody');
    var rowCount = table.rows.length;
    for (var i = tableHeaderRowCount; i < rowCount; i++) {
      table.deleteRow(tableHeaderRowCount);
    }
  }

  function novoprocedimento() {
    $.ajax({
      type: "GET",
      url: "/listservicos",
      data: {},
      dataType: "json",
      success: function(data) {
        var select = document.getElementById('novoprocedimentoselect');
        var opt = document.createElement('option');
        opt.appendChild(document.createTextNode('Selecione um Procedimento'));
        opt.value = '';
        select.appendChild(opt);
        for (var i = 0; i < data.length; i++) {
          var opt = document.createElement('option');
          opt.appendChild(document.createTextNode(data[i]['prod_nome']));
          opt.value = data[i]['prod_id'];
          select.appendChild(opt);
        }
      }
    });
    document.getElementById('novoprocedimentosituacao').value = '';
    $('#novoprocedimentoModal').modal('show');
  }

  function cadastrarprocedimento() {
    if (document.getElementById('novoprocedimentoselect').value != '' && document.getElementById('novoprocedimentosituacao').value != '') {
      $.ajax({
        type: "GET",
        url: "/novoprocedimento",
        data: {
          idtratamento: tratamentoatual,
          idproduto: document.getElementById('novoprocedimentoselect').value,
          situacao: document.getElementById('novoprocedimentosituacao').value
        },
        dataType: "json",
        success: function(data) {
          var sel = document.getElementById('novoprocedimentoselect');
          for (i = sel.length - 1; i >= 0; i--) {
            sel.remove(i);
          }
          document.getElementById('novoprocedimentosituacao').value = '';
          $('#novoprocedimentoModal').modal('hide');
          listprocedimento();
        }
      });
    }
  }

  function listprocedimento() {
    apagartabelaprocedimento();
    document.getElementById('semprocedimentodiv').style.display = 'none';
    document.getElementById('procedimentodiv').style.display = 'none';
    $.ajax({
      type: "GET",
      url: "/listprocedimento",
      data: {
        idtratamento: tratamentoatual
      },
      dataType: "json",
      success: function(data) {
        if (data['idprocedimento'].length != 0) {

          document.getElementById('semprocedimentodiv').style.display = 'none';
          document.getElementById('procedimentodiv').style.display = 'block';
          for (var i = 0; i < data['idprocedimento'].length; i++) {
            var tabela = document.getElementById('procedimentotablebody');
            var numeroLinhas = tabela.rows.length;
            var linha = tabela.insertRow(numeroLinhas);
            var celula1 = linha.insertCell(0);
            var celula2 = linha.insertCell(1);
            var celula3 = linha.insertCell(2);
            var celula4 = linha.insertCell(3);
            var celula5 = linha.insertCell(4);
            celula1.innerHTML = data['datainicio'][i];
            celula2.innerHTML = data['procedimento'][i];
            celula3.innerHTML = "<select class='form-select' id='procedimentosituacao" + data['idprocedimento'][i] + "' onchange='editprocedimento(this)' style='padding:.375rem 2.25rem .375rem .75rem!important'><option value='realizar'>A Realizar</option><option value='observado'>Observado</option><option value='finalizado'>Finalizado</option></select>";
            celula4.innerHTML = "<input type='text' name='datafim" + data['idprocedimento'][i] + "' id='datafim" + data['idprocedimento'][i] + "' value='" + data['datafim'][i] + "' onchange='editprocedimento(this)' class='form-control' style='width: 7rem;'>";
            celula5.innerHTML = "<button type='submit' class='btn btdelete' value='Excluir' onclick='removerProcedimento(this)' id='" + data['idprocedimento'][i] + "'><span class='fontebotao'>Excluir</span></button>";
            $('#datafim' + data['idprocedimento'][i]).inputmask('99/99/9999');
            document.getElementById('procedimentosituacao' + data['idprocedimento'][i]).value = data['situacao'][i];
          }

        } else {
          document.getElementById('semprocedimentodiv').style.display = 'block';
          document.getElementById('procedimentodiv').style.display = 'none';
        }

      }
    });

  }

  function removerProcedimento(procedimento) {
    removerProcedimentoAtual = procedimento.id;
    $('#removerprocedimentoModal').modal('show');
  }

  function removerProcedimentoConfirm() {
    $.ajax({
      type: "GET",
      url: "/removerprocedimento",
      data: {
        idprocedimento: removerProcedimentoAtual
      },
      dataType: "json",
      success: function(data) {
        $('#removerprocedimentoModal').modal('hide');
        listprocedimento();
      }
    });
  }

  function editprocedimento(procedimento) {
    if (procedimento.id[0] == 'p') {
      editprocedimentoatual = procedimento.id.split('procedimentosituacao')[1];
    } else {
      editprocedimentoatual = procedimento.id.split('datafim')[1];
    }
    if (document.getElementById('datafim' + editprocedimentoatual).value.replace(/[^a-z0-9]/gi, '').length == 8 || document.getElementById('datafim' + editprocedimentoatual).value.replace(/[^a-z0-9]/gi, '').length == 0) {
      $.ajax({
        type: "GET",
        url: "/editprocedimento",
        data: {
          idprocedimento: editprocedimentoatual,
          datafim: document.getElementById('datafim' + editprocedimentoatual).value,
          situacao: document.getElementById('procedimentosituacao' + editprocedimentoatual).value
        },
        dataType: "json",
        success: function(data) {
          console.log('Editado com sucesso!');
        }
      });
    }

  }

  function apagartabelaprocedimento() {
    var tableHeaderRowCount = 0;
    var table = document.getElementById('procedimentotablebody');
    var rowCount = table.rows.length;
    for (var i = tableHeaderRowCount; i < rowCount; i++) {
      table.deleteRow(tableHeaderRowCount);
    }
  }

  function attdadospac(){
    $.ajax({
        type: "GET",
        url: "/attdadospac",
        data: {
          id: sessionStorage.getItem('pacatual'),
          alturaatualinput : document.getElementById('alturaatualinput').value,
          pesoatualinput : document.getElementById('pesoatualinput').value,
          paatualinput : document.getElementById('paatualinput').value,
          tiposangueatualinput : document.getElementById('tiposangueatualinput').value
        },
        dataType: "json",
        success: function(data) {
          dadoscliente(sessionStorage.getItem('pacatual'));
        }
      });
  }

  function atestadomedico(){
    window.location.href = "http://app.sisger.in/atestadomedico";
  }
  function atestadocomparecimento(){
    window.location.href = "http://app.sisger.in/atestadocomparecimento";
  }
  function solicitarexame(){
    window.location.href = "http://app.sisger.in/solicitacaoexame";
  }
  function solicitarraiox(){
    window.location.href = "http://app.sisger.in/solicitacaoraiox";
  }
  function solicitarultrassom(){
    window.location.href = "http://app.sisger.in/solicitacaoultrassom";
  }
  function receitamedica(){
    window.location.href = "http://app.sisger.in/receitamedica";
  }
  function receituario(){
    window.location.href = "http://app.sisger.in/receitcontespec";
  }
  function receituarios() {
    $('#receituariosModal').modal('show');
  }
  function exames() {
    $('#examesModal').modal('show');
  }

  function dadoscliente(idcliente) {
      $.ajax({
        type: "GET",
        url: "/medicodadoscliente",
        data: {
          id: idcliente
        },
        dataType: "json",
        success: function(data) {
          var d = new Date;
          ano_atual = d.getFullYear();
          mes_atual = d.getMonth() + 1;
          dia_atual = d.getDate();
          datahoje = dia_atual + "/" + mes_atual + "/" + ano_atual;
          switch (parseInt(idcliente.substring(idcliente.length - 1))) {
            case 1:
              document.getElementById('pacienteatual').innerHTML = data[0]['pac_nome'];
              document.getElementById('pacienteatual1').innerHTML = data[0]['pac_nome'];
              pac_datanasc = data[0]['pac_datanasc'].split('-');
              idade = ano_atual - pac_datanasc[0];
              if (mes_atual < pac_datanasc[1] || mes_atual == pac_datanasc[1] && dia_atual < pac_datanasc[0]) {
                idade--;
              }
              document.getElementById('idadeatual').innerHTML = idade + " Anos";
              document.getElementById('idadeatual1').innerHTML = idade + " Anos";
              if (data[0]['pac_altura'] != null) {
                document.getElementById('alturaatual').innerHTML = data[0]['pac_altura'] + " m";
                document.getElementById('alturaatualinput').value = data[0]['pac_altura'];
              } else {
                document.getElementById('alturaatual').innerHTML = 'Sem Registro';
                document.getElementById('alturaatualinput').value = '';
              }
              if (data[0]['pac_peso'] != null) {
                document.getElementById('pesoatual').innerHTML = data[0]['pac_peso'] + " kg";
                document.getElementById('pesoatualinput').value = data[0]['pac_peso'];
              } else {
                document.getElementById('pesoatual').innerHTML = 'Sem Registro';
                document.getElementById('pesoatualinput').value = '';
              }
              if (data[0]['pac_pa'] != null) {
                document.getElementById('paatual').innerHTML = data[0]['pac_pa'] + " mmHg";
                document.getElementById('paatualinput').value = data[0]['pac_pa'];
              } else {
                document.getElementById('paatual').innerHTML = 'Sem Registro';
                document.getElementById('paatualinput').value = '';
              }
              if (data[0]['pac_tiposangue'] != null) {
                document.getElementById('tiposangueatual').innerHTML = data[0]['pac_tiposangue'];
                document.getElementById('tiposangueatualinput').value = data[0]['pac_tiposangue'];
              } else {
                document.getElementById('tiposangueatual').innerHTML = 'Sem Registro';
                document.getElementById('tiposangueatualinput').value = '';
              }
              sessionStorage.setItem('pacatual', ("00000000" + data[0]['pac_id']).slice(-8) + "1");
              break;
            case 2:
              document.getElementById('pacienteatual').innerHTML = data[0]['forfis_nome'];
              document.getElementById('pacienteatual1').innerHTML = data[0]['forfis_nome'];
              forfis_datanasc = data[0]['forfis_datanasc'].split('/');
              idade = ano_atual - forfis_datanasc[2];
              if (mes_atual < forfis_datanasc[1] || mes_atual == forfis_datanasc[1] && dia_atual < forfis_datanasc[0]) {
                idade--;
              }
              document.getElementById('idadeatual').innerHTML = idade + " Anos";
              document.getElementById('idadeatual1').innerHTML = idade + " Anos";
              if (data[0]['forfis_altura'] != null) {
                document.getElementById('alturaatual').innerHTML = data[0]['forfis_altura'] + " m";
                document.getElementById('alturaatualinput').value = data[0]['forfis_altura'];
              } else {
                document.getElementById('alturaatual').innerHTML = 'Sem Registro';
                document.getElementById('alturaatualinput').value = '';
              }
              if (data[0]['forfis_peso'] != null) {
                document.getElementById('pesoatual').innerHTML = data[0]['forfis_peso'] + " kg";
                document.getElementById('pesoatualinput').value = data[0]['forfis_peso'];
              } else {
                document.getElementById('pesoatual').innerHTML = 'Sem Registro';
                document.getElementById('pesoatualinput').value = '';
              }
              if (data[0]['forfis_pa'] != null) {
                document.getElementById('paatual').innerHTML = data[0]['forfis_pa'] + " mmHg";
                document.getElementById('paatualinput').value = data[0]['forfis_pa'];
              } else {
                document.getElementById('paatual').innerHTML = 'Sem Registro';
                document.getElementById('paatualinput').value = '';
              }
              if (data[0]['forfis_tiposangue'] != null) {
                document.getElementById('tiposangueatual').innerHTML = data[0]['forfis_tiposangue'];
                document.getElementById('tiposangueatualinput').value = data[0]['forfis_tiposangue'];
              } else {
                document.getElementById('tiposangueatual').innerHTML = 'Sem Registro';
                document.getElementById('tiposangueatualinput').value = '';
              }
              sessionStorage.setItem('pacatual', ("00000000" + data[0]['forfis_id']).slice(-8) + "2");
              break;
            case 3:
              document.getElementById('pacienteatual').innerHTML = data[0]['func_nome'];
              document.getElementById('pacienteatual1').innerHTML = data[0]['func_nome'];
              func_datanasc = data[0]['func_datanasc'].split('/');
              idade = ano_atual - func_datanasc[2];
              if (mes_atual < func_datanasc[1] || mes_atual == func_datanasc[1] && dia_atual < func_datanasc[0]) {
                idade--;
              }
              document.getElementById('idadeatual').innerHTML = idade + " Anos";
              document.getElementById('idadeatual1').innerHTML = idade + " Anos";
              if (data[0]['func_altura'] != null) {
                document.getElementById('alturaatual').innerHTML = data[0]['func_altura'] + " m";
                document.getElementById('alturaatualinput').value = data[0]['func_altura'];
              } else {
                document.getElementById('alturaatual').innerHTML = 'Sem Registro';
                document.getElementById('alturaatualinput').value = '';
              }
              if (data[0]['func_peso'] != null) {
                document.getElementById('pesoatual').innerHTML = data[0]['func_peso'] + " kg";
                document.getElementById('pesoatualinput').value = data[0]['func_peso'];
              } else {
                document.getElementById('pesoatual').innerHTML = 'Sem Registro';
                document.getElementById('pesoatualinput').value = '';
              }
              if (data[0]['func_pa'] != null) {
                document.getElementById('paatual').innerHTML = data[0]['func_pa'] + " mmHg";
                document.getElementById('paatualinput').value = data[0]['func_pa'];
              } else {
                document.getElementById('paatual').innerHTML = 'Sem Registro';
                document.getElementById('paatualinput').value = '';
              }
              if (data[0]['func_tiposangue'] != null) {
                document.getElementById('tiposangueatual').innerHTML = data[0]['func_tiposangue'];
                document.getElementById('tiposangueatualinput').value = data[0]['func_tiposangue'];
              } else {
                document.getElementById('tiposangueatual').innerHTML = 'Sem Registro';
                document.getElementById('tiposangueatualinput').value = '';
              }
              sessionStorage.setItem('pacatual', ("00000000" + data[0]['func_id']).slice(-8) + "3");
              break;
          }
          listhpp();
          listtratamento();
          $.ajax({
            type: "GET",
            url: "/histfamilias",
            data: {
              idpessoa: sessionStorage.getItem('pacatual')
            },
            dataType: "json",
            success: function(data) {
              document.getElementById('histfamiliatext').value = data;
            }
          });
          listatendimentoexames();
        }
      });

  }

  function finalizartratamento(){
    $.ajax({
      type: "GET",
      url: "/finalizartratamento",
      data: {
        idtratamento: tratamentoatual
      },
      dataType: "json",
      success: function(data) {
        listtratamento();
        $('#tratamentoatualModal').modal('hide');
        abrirprontuario();
      }
    });
  }

  function chamar(celula) {
    $.ajax({
      type: "GET",
      url: "/medicochamar",
      data: {
        pessoa: listapacnome[celula.id.substr(6)],
        lugar: document.getElementById('labatual').value
      },
      dataType: "json",
      success: function(data) {
        console.log('Paciente Chamado');
      }
    });
  }
</script>
@endsection

</html>