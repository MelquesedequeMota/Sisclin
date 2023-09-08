@extends('layouts.Menu')
@section('atalhoSuperior')@endsection
@section('menuLateral')@endsection
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- css da página -->
  <link rel="stylesheet" href="{{asset('../css/financeiro.css')}}">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <script src="{{asset('jquery.min.js')}}"></script>
  <script src="{{asset('jquery-ui-1.12.1/jquery-ui.js')}}"></script>
  <script src="{{asset('inputmask/dist/jquery.inputmask.min.js')}}"></script>
  <script src="{{asset('inputmask/dist/bindings/inputmask.binding.js')}}"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  <title>Financeiro</title>
  <style>
    #principal {
      padding: 8px !important;
    }

    .imgicon{
      width:1.8rem;
    }

    .ui-menu-item {
      padding: 0.3rem 0.5rem;
      background-color:#929597!important;
      color:black!important;
      cursor: pointer!important;
      list-style: none!important;
    }

    .ui-menu{
        position: absolute!important;
    }

    /* .campopesquisa{
      padding:5px 20px 5px 5px
    } */

    /* formatação do elemento */
    #lupa{
      margin: 0.5rem 0rem 0.5rem 11rem;
      position: absolute;
    }

    table {
      display: block;
      overflow-y: auto;
      height: 16rem;
    }

    .table>:not(caption)>*>* {
      padding: 0.3rem 0.5rem!important;
    }

    table>thead {
      vertical-align: middle!important;
    }

    .btnmapadosistema{
      background: transparent!important;
      color: #198754!important;
      border: 2px solid #198754!important;
      font-weight: 600;
    }

    .valormaior1{
      width: 13rem;
    }

    .valormaior2{
      width: 13rem;
    }

    .testee{
      width: max-content;
    }

    .rolagemdoresumo{
      overflow-x:auto;
    }

    @media(max-width:909px){
      .divexternafinan{
        flex-direction: column;
      }

      .divconteudo,.divmenu{
        width: 100%;
      }

      .divconteudo{
        margin-left:0rem;
        margin-top:1rem;
      }

      .resumovalores{
        font-size:14px;
        width: 11rem;
      }

      .valormaior1{
        width: 11rem;
      }

      .valormaior2{
        width: 12em;
      }

      .imgicon{
        width:2rem;
      }

      .divate{
        margin-top:1rem!important;
      }
    }

    @media (min-width: 768px){
      .container, .container-md, .container-sm {
        max-width: 100%!important;
      }
    }

    @media (max-width: 575px){
      .btdelete{
        width:100%;
      }

      .testee{
        width: 100%;
      }
    }
    
  </style>
</head>

<body>
  @section('Conteudo')
  <div class="divexternafinan">
    <div class="divmenu">
      <ul class="dropdown-menu">
        <div class="divmudar" id='divmudar'>

          <div class="divmudar" id='divmudar0'>
            <div style="margin-bottom: 0.5rem">Contas a Pagar</div>
            <div style="text-align: left;padding: 0.2rem;font-size: 12px;margin-bottom: 0.5rem;">
              O Contas a Pagar é onde você consegue visualizar todas as transações que geram gasto no sistema.
            </div>
            <div style="display: flex; align-self: center; justify-content: center">
              <button type="button" class="btn btn-success" onclick='novaconta()' style='font-size:14px'>
                Adicionar nova despesa
              </button>
            </div>
          </div>

          <div class="divmudar" id='divmudar1'>
            <div style="margin-bottom: 0.5rem">Contas a Receber</div>
            <div style="text-align: left;padding: 0.2rem;font-size: 12px;margin-bottom: 0.5rem;">
              O Contas a Receber é onde você consegue visualizar todas as transações que geram lucro no sistema.
            </div>
          </div>

          <div class="divmudar" id='divmudar2'>
            <div style="margin-bottom: 0.5rem">Fluxo de Caixa</div>
            <div style="text-align: left;padding: 0.2rem;font-size: 12px;margin-bottom: 0.5rem;">
              O Fluxo de Caixa é onde você conxegue visualizar o resumo das transações que geram ambos lucros e gastos no sistema.
            </div>
          </div>

          <div class="divmudar" id='divmudar3'>
            <div style="margin-bottom: 0.5rem">Tesouraria</div>
            <div style="text-align: left;padding: 0.2rem;font-size: 12px;margin-bottom: 0.5rem;">
              A tesouraria é responsável por confirmar o recebimento do dinheiro entrado no caixa, mantendo a organização dos rendimentos.
            </div>
          </div>
        </div>
        <li>
          <hr class="dropdown-divider" />
        </li>
        <li><a class="dropdown-item" href="#" id='receitas' onclick='checarpagina(this)'>Contas a Receber</a></li>
        <li>
          <hr class="dropdown-divider" />
        </li>
        <li><a class="dropdown-item" href="#" id='despesas' onclick='checarpagina(this)'>Contas a Pagar</a></li>
        <li>
          <hr class="dropdown-divider" />
        </li>
        <li><a class="dropdown-item" href="#" id='fluxodecaixa' onclick='checarpagina(this)'>Fluxo de caixa</a></li>
        <li>
          <hr class="dropdown-divider" />
        </li>
        <li><a class="dropdown-item" href="#" id='tesouraria' onclick='checarpagina(this)'>Tesouraria</a></li>
      </ul>
    </div>
    <div class="divconteudo" id='divconteudo'>
      <div class="container-fluid titulosuperior">Contas a Pagar</div>
      <div class="container-fluid">
        <div class="row gx-3 gy-3">
          <div id='diverrointervalodespesas'></div>
          <div class="col-sm-3 col-md-3 col-lg-2">
            <div>
              <label for="intervalodespesas1" class="form-label">Data inicial</label>
              <input type="date" class="form-control" name='intervalodespesas1' id='intervalodespesas1' onchange='checarintervalodespesas()'>
            </div>
          </div>
          <!-- <div class="col-sm-1 col-md-3 col-lg-2 divate" style='align-self: end;'>
            <div>
              <span>até</span>
            </div>
          </div> -->
          <div class="col-sm-3 col-md-3 col-lg-2">
            <div>
              <label for="intervalodespesas2" class="form-label">Data Final</label>
              <div style='width: 100%;'>
                  <input type="date" class="form-control" name='intervalodespesas2' id='intervalodespesas2' onchange='checarintervalodespesas()'>
              </div>
              <!-- <div class='direction'>
                <div class='inputdist'></div>
                <div class='inputdist'></div>
              </div> -->
            </div>
          </div>
          <div class="col-sm-3 col-md-3 col-lg-2 testee" style='align-self: end;'>
            <!-- <select class="form-select">
              <option selected>Ações</option>
              <option value="1">One</option>
              <option value="2">Two</option>
              <option value="3">Three</option>
            </select> -->
            <div style='width: 100%;'>
              <div id="lupa">
                <img src="../imagens/searchfluxo.svg" alt="" style='width:1.2rem'>
              </div>
              <input type="text" class="form-control" name='campopesquisa' id='campopesquisa' onchange=''>
            </div>
          </div>
          <div class="col-sm-3 col-md-3 col-lg-2 testee" style='align-self: end;'>
            <button type="submit" class="btn btdelete" value='Excluir' onclick='excluirdespesas()'>
              <span class="fontebotao" style='font-size:15px'>Excluir</span>
            </button>
          </div>
        </div>
      </div>
      <div class="container-fluid" style='margin-top: 2rem;'>
        <nav class="nav_tabs">
          <ul>
            <li>
              <input type="radio" id="tab1" class="rd_tab" name="tabs" checked />
              <label for="tab1" class="tab_label">Contas Pagas</label>
              <div class="tab-content">
                <!-- <h5>Contas Pagas</h5> -->
                <div id='tabela' class="table-responsive-sm">
                  <table id='despesasrecebidastable' class="table">
                    <thead class="table-active">
                      <tr>
                        <td scope="col"><input type='checkbox' class='checkboxtodos' disabled></td>
                        <td scope="col">Pagamento</td>
                        <td scope="col">Categoria</td>
                        <td scope="col">Descrição</td>
                        <td scope="col">Pagamento</td>
                        <td scope="col">Valor</td>
                        <td scope="col">Editar</td>
                      </tr>
                    </thead>
                    <tbody id='despesasrecebidastablebody'>
                    </tbody>
                  </table>
                </div>
              </div>
            </li>
            <li>
              <input type="radio" name="tabs" class="rd_tab" id="tab2" />
              <label for="tab2" class="tab_label">Contas a Pagar</label>
              <div class="tab-content">
                <!-- <h5>Contas a Pagar</h5> -->
                <div id='tabela' class="table-responsive-sm">
                  <table id='despesasarecebertable' class="table">
                    <thead class="table-active">
                      <tr>
                        <td scope="col"><input type='checkbox' disabled></td>
                        <td scope="col">Vencimento</td>
                        <td scope="col">Categoria</td>
                        <td scope="col">Descrição</td>
                        <td scope="col">Valor</td>
                        <td scope="col">Editar</td>
                      </tr>
                    </thead>
                    <tbody id='despesasarecebertablebody'>
                    </tbody>
                  </table>
                </div>
              </div>
            </li>
          </ul>
          <div class="resumo">
            <div class='tituloresumo'>
              <div class='traco'></div>
              <div>Resumo do Contas a Pagar</div>
            </div>
            <div class='rolagemdoresumo'>
              <div class='resumodados'>
                <div class='resumovalores'>
                  <div>
                    <img src="../imagens/dinheiroverde.svg" alt="" class='imgicon' >
                  </div>
                  <div id='parcelaspagas'></div>
                  <div>Parcelas pagas</div>
                </div>
                <div class='resumovalores'>
                  <div>
                    <img src="../imagens/dinheirovermelho.svg" alt="" class='imgicon'>
                  </div>
                  <div id='parcelasapagar'></div>
                  <div>Parcelas a pagar</div>
                </div>
                <div class='resumovalores valormaior1' style=''>
                  <div>
                    <img src="../imagens/dinheiroverde.svg" alt="" class='imgicon'>
                  </div>
                  <div id='totalpago'></div>
                  <div>Pago</div>
                </div>
                <div class='resumovalores valormaior2' style=''>
                  <div>
                    <img src="../imagens/dinheirovermelho.svg" alt="" class='imgicon'>
                  </div>
                  <div id='totalapagar'></div>
                  <div>Falta pagar</div>
                </div>
              </div>
            </div>
          </div>
        </nav>
      </div>
    </div>


    <div class="divconteudo" id='divconteudo1'>
      <div class="container-fluid titulosuperior">Contas a Receber</div>

      <div class="container-fluid">
        <div class="row gx-3 gy-3">
          <div id='diverrointervaloreceitas'></div>
          <div class="col-sm-4 col-md-4 col-lg-2">
            <div>
              <label for="intervaloreceitas1" class="form-label">Data inicial</label>
              <input type="date" class="form-control" name='intervaloreceitas1' id='intervaloreceitas1' onchange='checarintervaloreceitas()'>
            </div>
          </div>
          <!-- <div class="col-sm-1 col-md-3 col-lg-2 divate">
            <div>
              <span>até</span>
            </div>
          </div> -->
          <div class="col-sm-4 col-md-4 col-lg-2">
            <div>
              <label for="intervaloreceitas2" class="form-label">Data Final</label>
              <div class='direction'>
                <div style='width: 100%;'>
                  <input type="date" class="form-control" name='intervaloreceitas2' id='intervaloreceitas2' onchange='checarintervaloreceitas()'>
                </div>
                <div id='erroreceitas'></div>
              </div>
            </div>
          </div>
          <div class="col-sm-3 col-md-3 col-lg-2 testee" style='align-self: end;'>
            <!-- <select class="form-select">
              <option selected>Ações</option>
              <option value="1">One</option>
              <option value="2">Two</option>
              <option value="3">Three</option>
            </select> -->
            <div style='width: 100%;'>
              <div id="lupa">
                <img src="../imagens/searchfluxo.svg" alt="" style='width:1.2rem'>
              </div>
              <input type="text" class="form-control" name='campopesquisa' id='campopesquisa' onchange=''>
            </div>
          </div>
          <div class="col-sm-3 col-md-3 col-lg-2 testee" style='align-self: end;'>
            <button type="submit" class="btn btdelete" value='Excluir' onclick='excluirreceitas()'>
              <span class="fontebotao" style='font-size:15px'>Excluir</span>
            </button>
          </div>
        </div>
      </div>

      <div class="container-fluid" style='margin-top: 2rem;'>
        <nav class="nav_tabs2">
          <ul>
            <li>
              <input type="radio" id="tab3" class="rd_tab2" name="tabs2" checked />
              <label for="tab3" class="tab_label2">Contas Recebidas</label>
              <div class="tab-content2">
                <!-- <h5>Contas Pagas</h5> -->
                <div id='tabela' class="table-responsive-sm">
                  <table id='receitasrecebidastable' class="table">
                    <thead class="table-active">
                      <tr>
                        <td scope="col"><input type='checkbox' disabled></td>
                        <td scope="col">Pagamento</td>
                        <td scope="col">Cliente</td>
                        <td scope="col">Descrição</td>
                        <td scope="col">Pagamento</td>
                        <td scope="col">Valor</td>
                        <td scope="col">Estornar</td>
                      </tr>
                    </thead>
                    <tbody id='receitasrecebidastablebody'>
                    </tbody>
                  </table>
                </div>
              </div>
            </li>
            <li>
              <input type="radio" name="tabs2" class="rd_tab2" id="tab4" />
              <label for="tab4" class="tab_label2">Contas a Receber</label>
              <div class="tab-content2">
                <!-- <h5>Contas a Pagar</h5> -->
                <div id='tabela' class="table-responsive-sm">
                  <table id='receitasarecebertable' class="table">
                    <thead class="table-active">
                      <tr>
                        <td scope="col"><input type='checkbox' disabled></td>
                        <td scope="col">Vencimento</td>
                        <td scope="col">Cliente</td>
                        <td scope="col">Descrição</td>
                        <td scope="col">Pagamento</td>
                        <td scope="col">Valor</td>
                        <td scope="col">Receber</td>
                      </tr>
                    </thead>
                    <tbody id='receitasarecebertablebody'>
                    </tbody>
                  </table>
                </div>
              </div>
            </li>
          </ul>
          <div class="resumo">
            <div class='tituloresumo'>
              <div class='traco'></div>
              <div>Resumo do Contas a Receber</div>
            </div>
            <div class='rolagemdoresumo'>
              <div class='resumodados'>
                <div class='resumovalores'>
                  <div>
                    <img src="../imagens/dinheiroverde.svg" alt="" class='imgicon'>
                  </div>
                  <div id='parcelasrecebidas'></div>
                  <div>Parcelas recebidas</div>
                </div>
                <div class='resumovalores'>
                  <div>
                    <img src="../imagens/dinheirovermelho.svg" alt="" class='imgicon'>
                  </div>
                  <div id='parcelasareceber'></div>
                  <div>Parcelas a receber</div>
                </div>
                <div class='resumovalores valormaior1' style=''>
                  <div>
                    <img src="../imagens/dinheiroverde.svg" alt="" class='imgicon'>
                  </div>
                  <div id='totalrecebido'></div>
                  <div>Recebido</div>
                </div>
                <div class='resumovalores valormaior2' style=''>
                  <div>
                    <img src="../imagens/dinheirovermelho.svg" alt="" class='imgicon'>
                  </div>
                  <div id='totalareceber'></div>
                  <div> p/ receber</div>
                </div>
              </div>                            
            </div>
          </div>
        </nav>
      </div>
    </div>

    <div class="divconteudo" id='divconteudo2' style='position: relative;'>
      <div class="container-fluid titulosuperior">Fluxo de Caixa</div>
      <div class="container-fluid resumo">
        <div class='tituloresumo'>
          <div class='traco'></div>
          <div>Resumo do Fluxo de Caixa</div>
        </div>
        <div class='rolagemdoresumo'>
          <div class='resumodados divresumomaior'>
            <div class='resumovalores'>
              <div>
                <img src="../imagens/dinheiroverde.svg" alt="" class='imgicon'>
              </div>
              <div id='parcelasrecebidasfluxo'></div>
              <div>Parcelas recebidas</div>
            </div>
            <div class='resumovalores' style=''>
              <div>
                <img src="../imagens/dinheirovermelho.svg" alt="" class='imgicon'>
              </div>
              <div id='parcelaspagasfluxo'></div>
              <div>Parcelas pagas</div>
            </div>
            <div class='resumovalores' style='width: 13.5rem!important;'>
              <div>
                <img src="../imagens/dinheiroverde.svg" alt="" class='imgicon'>
              </div>
              <div id='totalrecebidofluxo'></div>
              <div>Total recebido</div>
            </div>
            <div class='resumovalores valormaior1' style=''>
              <div>
                <img src="../imagens/dinheirovermelho.svg" alt="" class='imgicon'>
              </div>
              <div id='totalpagofluxo'></div>
              <div>Total Pago</div>
            </div>
            <div class='resumovalores valormaior2' style=''>
              <div>
                <img src="../imagens/dinheirovermelho.svg" alt="" class='imgicon'>
              </div>
              <div id='resumofluxo'></div>
              <div>Resumo</div>
            </div>
          </div>
        </div>
      </div>
      <div class="container-fluid">
        <div class="row gx-3 gy-3">
          <div id='diverrointervalofluxo'></div>
          <div class="col-sm-4 col-md-4 col-lg-2">
            <div>
              <label for="intervalofluxo1" class="form-label">Data inicial</label>
              <input type="date" class="form-control" name='intervalofluxo1' id='intervalofluxo1' onchange='checarintervalofluxo()'>
            </div>
          </div>
          <!-- <div class="col-sm-1 col-md-3 col-lg-2 divate">
            <div>
              <span>até</span>
            </div>
          </div> -->
          <div class="col-sm-4 col-md-4 col-lg-2">
            <div>
              <label for="intervalofluxo2" class="form-label">Data Final</label>
              <div class='direction'>
                <div style='width: 100%;'>
                  <input type="date" class="form-control" name='intervalofluxo2' id='intervalofluxo2' onchange='checarintervalofluxo()'>
                </div>
                <!-- <div class='inputdist'> 
                </div> -->
                <!-- <button type="submit" class="btn btdelete" value='Excluir' onclick='excluirfluxo()'>
                  <span class="fontebotao" style='font-size:15px'>Excluir</span>
                </button>
                <div id='errofluxo'></div> -->
              </div>
            </div>
          </div>
          <div class="col-sm-3 col-md-3 col-lg-2 testee" style='align-self: end;'>
            <!-- <select class="form-select">
              <option selected>Ações</option>
              <option value="1">One</option>
              <option value="2">Two</option>
              <option value="3">Three</option>
            </select> -->
            <div style='width: 100%;'>
              <div id="lupa">
                <img src="../imagens/searchfluxo.svg" alt="" style='width:1.2rem'>
              </div>
              <input type="text" class="form-control" name='campopesquisa' id='campopesquisa' onchange=''>
            </div>
          </div>
        </div>
      </div>

      <div class="container-fluid" style='margin-top: 2rem;height:22rem'>
        <div id='tabela' class="table-responsive-sm">
          <table id='fluxorecebidastable' class="table">
            <thead class="table-active">
              <tr>
                <!-- <td scope="col"><input type='checkbox' disabled></td> -->
                <td scope="col">Data</td>
                <td scope="col">Descrição</td>
                <td scope="col">Pagamento</td>
                <td scope="col">Valor</td>
                <td scope="col">Tipo</td>
              </tr>
            </thead>
            <tbody id='fluxorecebidastablebody'>
            </tbody>
          </table>
        </div>
      </div>
      
    </div>

    <div class="divconteudo" id='divconteudo3'>
      <div class="container-fluid titulosuperior">Tesouraria</div>

      <div class="container-fluid">
        <div class="row gx-3 gy-3">
          <div id='diverrointervalofluxo'></div>
          <div class="col-sm-4 col-md-4 col-lg-2">
            <div>
              <label for="intervalofluxo1" class="form-label">Data inicial</label>
              <input type="date" class="form-control" name='intervalofluxo1' id='intervalofluxo1' onchange='checarintervalofluxo()'>
            </div>
          </div>
          <!-- <div class="col-sm-1 col-md-2 col-lg-2 divate">
            <div>
              <span>até</span>
            </div>
          </div> -->
          <div class="col-sm-4 col-md-4 col-lg-2">
            <div>
              <label for="intervalofluxo2" class="form-label">Data Final</label>
              <div class='direction'>
                <div style='width: 100%;'>
                  <input type="date" class="form-control" name='intervalofluxo2' id='intervalofluxo2' onchange='checarintervalofluxo()'>
                </div>
                <!-- <div class='inputdist'></div> -->
                <!-- <button type="submit" class="btn btdelete" value='Excluir' onclick='excluirfluxo()'>
                  <span class="fontebotao" style='font-size:15px'>Excluir</span>
                </button>
                <div id='errofluxo'></div> -->
              </div>
            </div>
          </div>
          <div class="col-sm-3 col-md-3 col-lg-2 testee" style='align-self: end;'>
            <!-- <select class="form-select">
              <option selected>Ações</option>
              <option value="1">One</option>
              <option value="2">Two</option>
              <option value="3">Three</option>
            </select> -->
          </div>
        </div>
      </div>

      <div class="container-fluid" style='margin-top: 2rem;'>
        <div id='tabela' class="table-responsive-sm">
          <table id='tesourariatable' class="table" style='height: 20rem!important;'>
            <thead class="table-active">
              <tr>
                <td scope="col">Nome</td>
                <td scope="col">Operador</td>
                <td scope="col">Aberto</td>
                <td scope="col">Fechado</td>
                <td scope="col">Valor</td>
                <td scope="col">Status</td>
                <td scope="col">Receber</td>
                <td scope="col">Detalhes</td>
              </tr>
            </thead>
            <tbody id='tesourariatablebody'>
              <tr>
                <td scope="col">02/03/2022</td>
                <td scope="col">DEILANE MORAIS FEITOSA</td>
                <td scope="col">Aberto</td>
                <td scope="col"><button type="button" class="btn btn-success">Receber</button></td>
                <td scope="col"><button type="button" class="btn btnmapadosistema" style='width: max-content;'>Mapa do Caixa</button></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>

  <!-- Modal -->
  <div class="modal fade" id="novacontaModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered  modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Nova Despesa</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class='distbottom'>
            <label for="desccontainput" class="form-label">Descrição</label>
            <input type="text" class="form-control" name='desccontainput' id='desccontainput' placeholder='Descrição da despesa'>
          </div>
          <div class='distbottom'>
            <label for="categoriacontainput" class="form-label">Categoria</label>
            <select id='categoriacontainput' class="form-select" style="max-width:100%">
            </select>
          </div>
          <div style='display:flex;justify-content:space-between;width:100%' class='distbottom'>
            <div style='width:48%'>
              <label for="vencimentocontainput" class="form-label">Vencimento</label>
              <input type='date' class="form-control" name='vencimentocontainput' id='vencimentocontainput'>
            </div>
            <div style='width:48%'>
              <label for="categoriacontainput" class="form-label">Valor Total</label>
              <input type='text' class="form-control" name='valortotalcontainput' id='valortotalcontainput' min='0'>
            </div>
          </div>
          <div style='display:flex;justify-content:space-between;width:100%' class='distbottom'>
            <div style='width:48%'>
              <label for="quantidadecontainput" class="form-label">Quantidade</label>
              <input type='number' class="form-control" name='quantidadecontainput' id='quantidadecontainput' min='1'>
            </div>
            <div style='width:48%'>
              <label for="periodocontainput" class="form-label">Peridiocidade</label>
              <select id='periodocontainput' class="form-select" style="max-width:100%">
                <option value='1'>Mensal</option>
                <option value='2'>Bimestral</option>
                <option value='3'>Trimestral</option>
                <option value='4'>Semestral</option>
                <option value='5'>Anual</option>
              </select>
            </div>
          </div>
          <div class='distbottom'>
            <label for="fornecedorcontainput" class="form-label">Fornecedor</label>
            <select id='fornecedorcontainput' class="form-select" onchange='checarfornecedorinput()' style="max-width:100%">
            </select>
          </div>
          <div class='distbottom'>
            <div id='cpfcnpjfornecedorcontainput'>CPF/CNPJ do Fornecedor:</div>
          </div>
          <div class='distbottom'>
            <label for="pagoconta" class="form-label">Pago</label>
            <input type='checkbox' name='pagoconta' id='pagoconta' onchange='checarpagoinput()'>
          </div>
          <div id='divpagoconta'>
            <div class='distbottom'>
              <label for="datapagocontainput" class="form-label">Data do Pagamento</label>
              <input type='date' class="form-control" name='datapagocontainput' id='datapagocontainput'>
            </div>
            <div class='distbottom'>
              <label for="formapagamentoinput" class="form-label">Forma de Pagamento</label>
              <select id='formapagamentoinput' class="form-select" style="max-width:100%">
                <option value=''>Selecione a Forma de Pagamento</option>
                <option value='1'>Dinheiro</option>
                <option value='2'>Cartão - Débito</option>
                <option value='3'>Cartão - Crédito</option>
                <option value='4'>Pix</option>
                <option value='5'>Cheque</option>
                <option value='6'>Boleto Bancário</option>
              </select>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
          <button type="button" class="btn btn-primary" onclick='novaContaConfirm()'>Cadastrar</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="novacontaeditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered  modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Editar Despesa</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class='distbottom'>
            <label for="desccontainputedit" class="form-label">Descrição</label>
            <input type="text" class="form-control" name='desccontainputedit' id='desccontainputedit' placeholder='Descrição da despesa'>
          </div>
          <div class='distbottom'>
            <label for="categoriacontainputedit" class="form-label">Categoria</label>
            <select id='categoriacontainputedit' class="form-select" style="max-width:100%">
            </select>
          </div>
          <div style='display:flex;justify-content:space-between;width:100%' class='distbottom'>
            <div style='width:48%'>
              <label for="vencimentocontainputedit" class="form-label">Vencimento</label>
              <input type='date' class="form-control" name='vencimentocontainputedit' id='vencimentocontainputedit'>
            </div>
            <div style='width:48%'>
              <label for="categoriacontainputedit" class="form-label">Valor Total</label>
              <input type='text' class="form-control" name='valortotalcontainputedit' id='valortotalcontainputedit' min='0'>
            </div>
          </div>
          <div style='display:flex;justify-content:space-between;width:100%' class='distbottom'>
            <div style='width:48%'>
              <label for="quantidadecontainputedit" class="form-label">Quantidade</label>
              <input type='number' class="form-control" name='quantidadecontainputedit' id='quantidadecontainputedit' min='1'>
            </div>
            <div style='width:48%'>
              <label for="periodocontainputedit" class="form-label">Peridiocidade</label>
              <select id='periodocontainputedit' class="form-select" style="max-width:100%">
                <option value='1'>Mensal</option>
                <option value='2'>Bimestral</option>
                <option value='3'>Trimestral</option>
                <option value='4'>Semestral</option>
                <option value='5'>Anual</option>
              </select>
            </div>
          </div>
          <div class='distbottom'>
            <label for="fornecedorcontainputedit" class="form-label">Fornecedor</label>
            <select id='fornecedorcontainputedit' class="form-select" onchange='checarfornecedorinputedit()' style="max-width:100%">
            </select>
          </div>
          <div class='distbottom'>
            <div id='cpfcnpjfornecedorcontainputedit'>CPF/CNPJ do Fornecedor:</div>
          </div>
          <div class='distbottom'>
            <label for="pagocontaedit" class="form-label">Pago</label>
            <input type='checkbox' name='pagocontaedit' id='pagocontaedit' onchange='checarpagoinputedit()'>
          </div>
          <div id='divpagocontaedit'>
            <div class='distbottom'>
              <label for="datapagocontainputedit" class="form-label">Data do Pagamento</label>
              <input type='date' class="form-control" name='datapagocontainputedit' id='datapagocontainputedit'>
            </div>
            <div class='distbottom'>
              <label for="formapagamentoinputedit" class="form-label">Forma de Pagamento</label>
              <select id='formapagamentoinputedit' class="form-select" style="max-width:100%">
                <option value=''>Selecione a Forma de Pagamento</option>
                <option value='1'>Dinheiro</option>
                <option value='2'>Cartão - Débito</option>
                <option value='3'>Cartão - Crédito</option>
                <option value='4'>Pix</option>
                <option value='5'>Cheque</option>
                <option value='6'>Boleto Bancário</option>
              </select>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
          <button type="button" class="btn btn-primary" onclick='novaContaeditConfirm()'>Editar</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="excluircontasModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Excluir Contas</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Tem certeza que deseja excluir essas contas?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="button" class="btn btn-primary" onclick='excluircontasConfirm()'>Excluir Contas</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="pagarcontasModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Pagar Conta</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div id='divpagoconta'>
            <div class='distbottom'>
              <label for="datapagocontainputpagar" class="form-label">Data do Pagamento</label>
              <input type='date' class="form-control" name='datapagocontainputpagar' id='datapagocontainputpagar'>
            </div>
            <div class='distbottom'>
              <label for="formapagamentoinputpagar" class="form-label">Forma de Pagamento</label>
              <select id='formapagamentoinputpagar' class="form-select" style="max-width:100%">
                <option value=''>Selecione a Forma de Pagamento</option>
                <option value='1'>Dinheiro</option>
                <option value='2'>Cartão - Débito</option>
                <option value='3'>Cartão - Crédito</option>
                <option value='4'>Pix</option>
                <option value='5'>Cheque</option>
                <option value='6'>Boleto Bancário</option>
              </select>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="button" class="btn btn-primary" onclick='pagarcontasConfirm()'>Pagar Conta</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="recebercaixaModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Receber</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class='distbottom' id='valortotalreceber'></div>
            <div class='distbottom' id='valorrecebidoreceber'>
              Confirmar Valor Dinheiro <input type='text' class="form-control" name='valorrecebidodinheiroinput' id='valorrecebidodinheiroinput' onfocusout='attvalordinheirorecebidoatual(this)'>
              <input type='checkbox' name='dinheirocheckbox' id='dinheirocheckbox' checked onclick='attconfirmarrecebido(this)'> Confirmar
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="button" class="btn btn-primary" onclick='recebercaixaConfirm()'>Confirmar Recebimento</button>
        </div>
      </div>
    </div>
  </div>

</body>
<script>
  var mesatual = new Date().getMonth();
  var anoatual = new Date().getFullYear();
  var ultimodia = new Date(anoatual, mesatual + 1, 0).toLocaleDateString().split('/');
  var ultimodia2 = ultimodia[2] + "-" + ultimodia[1] + "-" + ultimodia[0];
  var diaatual = anoatual + "-" + ('00'+(mesatual + 1)).slice(-2) + "-" + String(new Date().getDate()).padStart(2, '0');
  checarpagina();
  agendaTabelas();
  buscarfornecedores();
  buscarplanocontas();
  var planocontasnumero = [];
  var planocontasnome = [];
  var fornecedorescpfcnpj = [];
  var fornecedoresid = [];
  var fornecedoresnome = [];
  var planocontasnumero = [];
  var planoscontanome = [];
  var subcategoriasnumero = [];
  var subcategoriasnome = [];
  var divatual = 1;
  var despesaspagasid = [];
  var despesasapagarid = [];
  var receitaspagasid = [];
  var receitasapagarid = [];
  var despesasexcluir = [];
  var receitasexcluir = [];
  var editatual = 0;

  var parcelasrecebidas = 0;
  var parcelasareceber = 0;
  var totalrecebido = 0;
  var totalareceber = 0;

  var parcelaspagas = 0;
  var parcelasapagar = 0;
  var totalpago = 0;
  var totalapagar = 0;

  var parcelaspagasfluxo = 0;
  var parcelasrecebidasfluxo = 0;
  var totalpagofluxo = 0;
  var totalrecebidofluxo = 0;
  var resumofluxo = 0;

  var valordinheirorecebidototal = 0;
  var caixareceberatual = 0;

  $('#intervaloreceitas1').inputmask('99/99/9999');
  $('#intervaloreceitas2').inputmask('99/99/9999');
  $('#intervalodespesas1').inputmask('99/99/9999');
  $('#intervalodespesas2').inputmask('99/99/9999');
  $('#intervalofluxo1').inputmask('99/99/9999');
  $('#intervalofluxo2').inputmask('99/99/9999');
  $('#vencimentocontainput').inputmask('99/99/9999');


  // console.log(ultimodia2, diaatual);


  $('#valortotalcontainput').inputmask('decimal', {
    radixPoint: ",",
    groupSeparator: ".",
    autoGroup: true,
    digits: 2,
    digitsOptional: false,
    placeholder: '0',
    rightAlign: false,
    onBeforeMask: function(value, opts) {
      return value;
    }
  });

  $('#valortotalcontainputedit').inputmask('decimal', {
    radixPoint: ",",
    groupSeparator: ".",
    autoGroup: true,
    digits: 2,
    digitsOptional: false,
    placeholder: '0',
    rightAlign: false,
    onBeforeMask: function(value, opts) {
      return value;
    }
  });
  $('#valorrecebidodinheiroinput').inputmask('decimal', {
    radixPoint: ",",
    groupSeparator: ".",
    autoGroup: true,
    digits: 2,
    digitsOptional: false,
    placeholder: '0',
    rightAlign: false,
    onBeforeMask: function(value, opts) {
      return value;
    }
  });
  $('#valorrecebidocartaoinput').inputmask('decimal', {
    radixPoint: ",",
    groupSeparator: ".",
    autoGroup: true,
    digits: 2,
    digitsOptional: false,
    placeholder: '0',
    rightAlign: false,
    onBeforeMask: function(value, opts) {
      return value;
    }
  });
  $('#valorrecebidotransfinput').inputmask('decimal', {
    radixPoint: ",",
    groupSeparator: ".",
    autoGroup: true,
    digits: 2,
    digitsOptional: false,
    placeholder: '0',
    rightAlign: false,
    onBeforeMask: function(value, opts) {
      return value;
    }
  });


  function buscarfornecedores() {
    $.ajax({
      type: "GET",
      url: "/buscarfornecedores",
      data: {},
      dataType: "json",
      success: function(data) {
        for (var i = 0; i < data['cpfcnpjfornecedor'].length; i++) {
          fornecedorescpfcnpj.push(data['cpfcnpjfornecedor'][i]);
          fornecedoresnome.push(data['nomefornecedor'][i]);
          fornecedoresid.push(data['idfornecedor'][i]);
        }
        preencherfornecedores();
      }
    });
  }

  function preencherfornecedores() {
    var select = document.getElementById('fornecedorcontainput');
    var opt = document.createElement('option');
    opt.appendChild(document.createTextNode('Selecione um Fornecedor'));
    opt.value = '';
    select.appendChild(opt);
    for (var i = 0; i < fornecedorescpfcnpj.length; i++) {
      var opt = document.createElement('option');
      opt.appendChild(document.createTextNode(fornecedoresnome[i]));
      opt.value = fornecedoresid[i];
      select.appendChild(opt);
    }
  }

  $. extend ( $. ui . autocomplete . prototype . options ,  { 
    open :  function ( event , ui )  { 
      $ ( this ) . autocomplete ( "widget" ) . css ( { 
              "width" :  ( $ ( this ) . width ( )  +  "px" ) 
          } ) ; 
      } 
  }); 

  function preencherfornecedoresedit() {
    var select = document.getElementById('fornecedorcontainputedit');
    var opt = document.createElement('option');
    opt.appendChild(document.createTextNode('Selecione um Fornecedor'));
    opt.value = '';
    select.appendChild(opt);
    for (var i = 0; i < fornecedorescpfcnpj.length; i++) {
      var opt = document.createElement('option');
      opt.appendChild(document.createTextNode(fornecedoresnome[i]));
      opt.value = fornecedoresid[i];
      select.appendChild(opt);
    }
  }

  function attconfirmarrecebido(input){
    if(input.checked == true){
      document.getElementById('valorrecebidodinheiroinput').disabled = true;
      document.getElementById('valorrecebidodinheiroinput').value = valordinheirorecebidototal;
    }else{
      document.getElementById('valorrecebidodinheiroinput').disabled = false;
    }
  }

  function recebercaixa(input){
    caixareceberatual = input.id;
    $.ajax({
      type: "GET",
      url: "/valorescaixa",
      data: {
        caixa_id : input.id
      },
      dataType: "json",
      success: function(data) {
        console.log(data);
        if(data['caixa_valordinheiro'] != null){
          document.getElementById('valortotalreceber').innerHTML= 'Dinheiro: ' + data['caixa_valordinheiro'].toLocaleString('pt-BR', {
            minimumFractionDigits: 2,
            style: 'currency',
            currency: 'BRL'
          });
        }else{
          document.getElementById('valortotalreceber').innerHTML += 'Dinheiro: R$0,00';
        }
        if(data['caixa_valorcartao'] != null){
          document.getElementById('valortotalreceber').innerHTML += ' Cartão: ' + data['caixa_valorcartao'].toLocaleString('pt-BR', {
            minimumFractionDigits: 2,
            style: 'currency',
            currency: 'BRL'
          });
        }else{
          document.getElementById('valortotalreceber').innerHTML += ' Cartão: R$0,00';
        }
        if(data['caixa_valortransf'] != null){
        document.getElementById('valortotalreceber').innerHTML += ' Transferência: ' + data['caixa_valortransf'].toLocaleString('pt-BR', {
          minimumFractionDigits: 2,
          style: 'currency',
          currency: 'BRL'
        });
        }else{
          document.getElementById('valortotalreceber').innerHTML += ' Transferência: R$0,00';
        }
        document.getElementById('valorrecebidodinheiroinput').value= data['caixa_valordinheiro'].toLocaleString('pt-BR', {
            minimumFractionDigits: 2,
            style: 'currency',
            currency: 'BRL'
          });
          document.getElementById('valorrecebidodinheiroinput').disabled = true;
          document.getElementById('dinheirocheckbox').checked = true;
          valordinheirorecebidototal = parseFloat(data['caixa_valordinheiro']);
      }
    });
    $('#recebercaixaModal').modal('show');
  }

  function buscarplanocontas() {
    $.ajax({
      type: "GET",
      url: "/buscarplanocontas",
      data: {},
      dataType: "json",
      success: function(data) {
        for (var i = 0; i < data['numeroplano'].length; i++) {
          var check = 0;
          for (var o = 0; o < data['numeroplano'].length; o++) {
            if (data['numeroplano'][o].includes(data['numeroplano'][i] + '.')) {
              check = 1;
            }
          }
          if (check == 0) {
            subcategoriasnome.push(data['nomeplano'][i]);
            subcategoriasnumero.push(data['idplano'][i]);
          }
        }
        preenchercategorias();
        checardespesaspagas();
        checardespesasapagar();
        checarreceitaspagas();
        checarreceitasapagar();
        checarfluxodecaixa();
        listatesouraria();
      }
    });
  }

  function listatesouraria(){
            var tableHeaderRowCount = 0;
            var table = document.getElementById('tesourariatablebody');
            var rowCount = table.rows.length;
            for (var i = tableHeaderRowCount; i < rowCount; i++) {
              table.deleteRow(tableHeaderRowCount);
            }
            $.ajax({
            type: "GET",
            url: "/fluxocaixas",
            data: {},
            dataType: "json",
            success: function(data) {
                for (var i = 0; i < data[i].length; i++) {
                  var valortotaldinheirocartaotransf = 0;
                if(data[4][i] != null){
                  valortotaldinheirocartaotransf += data[4][i];
                }
                if(data[7][i] != null){
                  valortotaldinheirocartaotransf += data[7][i];
                }if(data[8][i] != null){
                  valortotaldinheirocartaotransf += data[8][i];
                }

                var tabela = document.getElementById('tesourariatablebody');
                var numeroLinhas = tabela.rows.length;
                var linha = tabela.insertRow(numeroLinhas);
                var celula1 = linha.insertCell(0);
                var celula2 = linha.insertCell(1);
                var celula3 = linha.insertCell(2);
                var celula4 = linha.insertCell(3);
                var celula5 = linha.insertCell(4);
                var celula6 = linha.insertCell(5);
                var celula7 = linha.insertCell(6);
                var celula8 = linha.insertCell(7);
                celula1.innerHTML = data[0][i];
                celula2.innerHTML = data[1][i];
                if (data[2][i] == '' || data[2][i] == null) {
                    celula3.innerHTML = 'Nunca Aberto';
                } else {
                    celula3.innerHTML = data[2][i].split(' ')[0].split('-')[2] + '/' + data[2][i].split(' ')[0].split('-')[1] + '/' + data[2][i].split(' ')[0].split('-')[0] + ' ' + data[2][i].split(' ')[1].split(':')[0] + ':' + data[2][i].split(' ')[1].split(':')[1];
                }
                if (data[3][i] == '' || data[3][i] == null) {
                    celula4.innerHTML = 'Nunca Fechado';
                } else {
                    celula4.innerHTML = data[3][i].split(' ')[0].split('-')[2] + '/' + data[3][i].split(' ')[0].split('-')[1] + '/' + data[3][i].split(' ')[0].split('-')[0] + ' ' + data[3][i].split(' ')[1].split(':')[0] + ':' + data[3][i].split(' ')[1].split(':')[1];
                }
                celula5.innerHTML = valortotaldinheirocartaotransf.toLocaleString('pt-BR', {
                  minimumFractionDigits: 2,
                  style: 'currency',
                  currency: 'BRL'
                });
                celula6.innerHTML = data[5][i];
                if(data[5][i] == 'Aberto'){
                  celula7.innerHTML =
                    "<button type='button' class='btn btn-success' name='recebercaixa" + data[6][i] + "' id='" + data[6][i] +
                    "' value='Receber' onclick='recebercaixa(this)' disabled>Receber</button>";
                }else{
                  celula7.innerHTML =
                    "<button type='button' class='btn btn-success' name='recebercaixa" + data[6][i] + "' id='" + data[6][i] +
                    "' value='Receber' onclick='recebercaixa(this)'>Receber</button>";
                }
                celula8.innerHTML =
                    "<button type='button' class='btn btnmapadosistema' style='width: max-content;' name='vermapa" + data[6][i] + "' id='" + data[6][i] +
                    "' value='Mapa do Caixa' onclick='mapacaixa(this)'>Mapa do Caixa</button>";
                }
            }
        });
    }

  function preenchercategorias() {
    var select = document.getElementById('categoriacontainput');
    var opt = document.createElement('option');
    opt.appendChild(document.createTextNode('Selecione uma Categoria'));
    opt.value = '';
    select.appendChild(opt);
    for (var i = 0; i < subcategoriasnumero.length; i++) {
      var opt = document.createElement('option');
      opt.appendChild(document.createTextNode(subcategoriasnome[i]));
      opt.value = subcategoriasnumero[i];
      select.appendChild(opt);
    }
  }

  function preenchercategoriasedit() {
    var select = document.getElementById('categoriacontainputedit');
    var opt = document.createElement('option');
    opt.appendChild(document.createTextNode('Selecione uma Categoria'));
    opt.value = '';
    select.appendChild(opt);
    for (var i = 0; i < subcategoriasnumero.length; i++) {
      var opt = document.createElement('option');
      opt.appendChild(document.createTextNode(subcategoriasnome[i]));
      opt.value = subcategoriasnumero[i];
      select.appendChild(opt);
    }
  }

  function agendaTabelas() {

    document.getElementById('intervaloreceitas1').value = diaatual;
    document.getElementById('intervaloreceitas2').value = ultimodia2;

    document.getElementById('intervalodespesas1').value = diaatual;
    document.getElementById('intervalodespesas2').value = ultimodia2;

    document.getElementById('intervalofluxo1').value = diaatual;
    document.getElementById('intervalofluxo2').value = ultimodia2;

  }

  function checarpagina(botao) {

    if (botao != undefined) {

      if (botao.id == 'receitas') {
        divatual = 'receitas';
        document.getElementById('divconteudo1').style.display = 'block';
        document.getElementById('divconteudo').style.display = 'none';
        document.getElementById('divconteudo2').style.display = 'none';
        document.getElementById('divconteudo3').style.display = 'none';

        document.getElementById('divmudar0').style.display = 'none';
        document.getElementById('divmudar1').style.display = 'block';
        document.getElementById('divmudar2').style.display = 'none';
        document.getElementById('divmudar3').style.display = 'none';

        // if(document.getElementById('receitasrecebidas').checked == true){
        //     document.getElementById('receitasrecebidasdiv').style.display = 'block';
        //     document.getElementById('receitasareceberdiv').style.display = 'none';
        // }else{
        //     document.getElementById('receitasrecebidasdiv').style.display = 'none';
        //     document.getElementById('receitasareceberdiv').style.display = 'block';
        //     document.getElementById('receitasareceber').checked = true;
        // }

      } else if (botao.id == 'despesas') {
        divatual = 'despesas';
        document.getElementById('divconteudo1').style.display = 'none';
        document.getElementById('divconteudo').style.display = 'block';
        document.getElementById('divconteudo2').style.display = 'none';
        document.getElementById('divconteudo3').style.display = 'none';

        document.getElementById('divmudar0').style.display = 'block';
        document.getElementById('divmudar1').style.display = 'none';
        document.getElementById('divmudar2').style.display = 'none';
        document.getElementById('divmudar3').style.display = 'none';

        // if(document.getElementById('despesasrecebidas').checked == true){
        //     document.getElementById('divconteudodiv').style.display = 'block';
        //     document.getElementById('divconteudodiv').style.display = 'none';
        // }else{
        //     document.getElementById('divconteudodiv').style.display = 'none';
        //     document.getElementById('divconteudodiv').style.display = 'block';
        //     document.getElementById('despesasareceber').checked = true;
        // }

      } else if (botao.id == 'fluxodecaixa'){
        divatual = 'fluxodecaixa';
        document.getElementById('divconteudo1').style.display = 'none';
        document.getElementById('divconteudo').style.display = 'none';
        document.getElementById('divconteudo2').style.display = 'block';
        document.getElementById('divconteudo3').style.display = 'none';

        document.getElementById('divmudar0').style.display = 'none';
        document.getElementById('divmudar1').style.display = 'none';
        document.getElementById('divmudar2').style.display = 'block';
        document.getElementById('divmudar3').style.display = 'none';
      }

      else {
        divatual = 'tesouraria';
        document.getElementById('divconteudo1').style.display = 'none';
        document.getElementById('divconteudo').style.display = 'none';
        document.getElementById('divconteudo2').style.display = 'none';
        document.getElementById('divconteudo3').style.display = 'block';

        document.getElementById('divmudar0').style.display = 'none';
        document.getElementById('divmudar1').style.display = 'none';
        document.getElementById('divmudar2').style.display = 'none';
        document.getElementById('divmudar3').style.display = 'block';

      }
    } else {
      divatual = 'receitas';
      document.getElementById('divconteudo2').style.display = 'none';
      document.getElementById('divconteudo').style.display = 'none';
      document.getElementById('divconteudo1').style.display = 'block';
      document.getElementById('divconteudo3').style.display = 'none';

      document.getElementById('divmudar0').style.display = 'none';
      document.getElementById('divmudar1').style.display = 'block';
      document.getElementById('divmudar2').style.display = 'none';
      document.getElementById('divmudar3').style.display = 'none';
    }
  }

  function checarintervalodespesas() {
    document.getElementById('diverrointervalodespesas').innerHTML = '';
    document.getElementById('diverrointervaloreceitas').innerHTML = '';

    if (document.getElementById('intervalodespesas1').value.replace(/[^a-z0-9]/gi, '').length == 8 && document.getElementById('intervalodespesas2').value.replace(/[^a-z0-9]/gi, '').length == 8) {
      if (document.getElementById('intervalodespesas2').value > document.getElementById('intervalodespesas1').value) {
        document.getElementById('diverrointervalodespesas').innerHTML = 'A data final não pode ser maior que a data inicial.';
      } else {

      }
    }

    if (document.getElementById('intervaloreceitas1').value.replace(/[^a-z0-9]/gi, '').length == 8 && document.getElementById('intervaloreceitas2').value.replace(/[^a-z0-9]/gi, '').length == 8) {
      if (document.getElementById('intervaloreceitas2').value > document.getElementById('intervaloreceitas1').value) {
        document.getElementById('diverrointervaloreceitas').innerHTML = 'A data final não pode ser maior que a data inicial.';
      } else {

      }
    }
  }

  function checardespesaspagas() {
    // console.log(subcategoriasnome, subcategoriasnumero);
    despesaspagasid = [];
    var tableHeaderRowCount = 0;
    var table = document.getElementById('despesasrecebidastablebody');
    var rowCount = table.rows.length;
    for (var i = tableHeaderRowCount; i < rowCount; i++) {
      table.deleteRow(tableHeaderRowCount);
    }
    $.ajax({
      type: "GET",
      url: "/consultadespesaspagas",
      data: {
        inicio: document.getElementById('intervalodespesas1').value,
        fim: document.getElementById('intervalodespesas2').value
      },
      dataType: "json",
      success: function(data) {
        console.log(data);
        parcelaspagas = 0;
        totalpago = 0;
        for (i = 0; i < data['idcontapagar'].length; i++) {
          despesaspagasid.push(data['idcontapagar'][i]);
          parcelaspagas++;
          totalpago += data['valortotalconta'][i];
          var tabela = document.getElementById('despesasrecebidastablebody');
          var numeroLinhas = tabela.rows.length;
          var linha = tabela.insertRow(numeroLinhas);
          var celula1 = linha.insertCell(0);
          var celula2 = linha.insertCell(1);
          var celula3 = linha.insertCell(2);
          var celula4 = linha.insertCell(3);
          var celula5 = linha.insertCell(4);
          var celula6 = linha.insertCell(5);
          var celula7 = linha.insertCell(6);
          celula1.innerHTML = "<input type='checkbox' name='checkboxdespesaspagas" + data['idcontapagar'][i] + "' id='checkboxdespesaspagas" + data['idcontapagar'][i] + "'>";
          celula2.innerHTML = data['datapagoconta'][i];
          if(data['categoriaconta'][i] == 0){
            celula3.innerHTML = 'Saída';
          }else{
            celula3.innerHTML = subcategoriasnome[subcategoriasnumero.indexOf(parseInt(data['categoriaconta'][i]))];
          }
          
          celula4.innerHTML = data['descconta'][i];
          switch (data['formapagamentoconta'][i]) {
            case 1:
              celula5.innerHTML = 'Dinheiro';
              break;
            case 2:
              celula5.innerHTML = 'Cartão - Débito (Auto:'+data['autoconta'][i]+', CV:'+data['cvconta'][i]+')';
              break;
            case 3:
              celula5.innerHTML = 'Cartão - Crédito (Auto:'+data['autoconta'][i]+', CV:'+data['cvconta'][i]+')';
              break;
            case 4:
              celula5.innerHTML = 'Pix'
              break;
            case 5:
              celula5.innerHTML = 'Cheque'
              break;
            default:
              celula5.innerHTML = 'Boleto Bancário';
          }
          celula6.innerHTML = data['valortotalconta'][i].toLocaleString('pt-BR', {
            minimumFractionDigits: 2,
            style: 'currency',
            currency: 'BRL'
          });
          celula7.innerHTML = "<button type='submit' class='btn border border-secondary corbtedit' name='editardespesa" + data["idcontapagar"][i] + "' id='editardespesa" + data["idcontapagar"][i] + "' onclick='editardespesa(" + data["idcontapagar"][i] + ")' value='Editar'><span class='edit'>Editar</span></button>";
        }
        document.getElementById('totalpago').innerHTML = totalpago.toLocaleString('pt-BR', {
          minimumFractionDigits: 2,
          style: 'currency',
          currency: 'BRL'
        });
        document.getElementById('parcelaspagas').innerHTML = parcelaspagas;
      }
    });
  }

  function checardespesasapagar() {
    despesasapagarid = [];
    var tableHeaderRowCount = 0;
    var table = document.getElementById('despesasarecebertablebody');
    var rowCount = table.rows.length;
    for (var i = tableHeaderRowCount; i < rowCount; i++) {
      table.deleteRow(tableHeaderRowCount);
    }
    $.ajax({
      type: "GET",
      url: "/consultadespesasapagar",
      data: {
        inicio: document.getElementById('intervalodespesas1').value,
        fim: document.getElementById('intervalodespesas2').value
      },
      dataType: "json",
      success: function(data) {
        parcelasapagar = 0;
        totalapagar = 0;
        for (i = 0; i < data['idcontapagar'].length; i++) {
          despesasapagarid.push(data['idcontapagar'][i]);
          parcelasapagar++;
          totalapagar += data['valortotalconta'][i];
          var tabela = document.getElementById('despesasarecebertablebody');
          var numeroLinhas = tabela.rows.length;
          var linha = tabela.insertRow(numeroLinhas);
          var celula1 = linha.insertCell(0);
          var celula2 = linha.insertCell(1);
          var celula3 = linha.insertCell(2);
          var celula4 = linha.insertCell(3);
          var celula5 = linha.insertCell(4);
          var celula6 = linha.insertCell(5);
          celula1.innerHTML = "<input type='checkbox' name='checkboxdespesasapagar" + data['idcontapagar'][i] + "' id='checkboxdespesasapagar" + data['idcontapagar'][i] + "'>";
          celula2.innerHTML = data['vencimentoconta'][i];
          celula3.innerHTML = subcategoriasnome[subcategoriasnumero.indexOf(parseInt(data['categoriaconta'][i]))];
          celula4.innerHTML = data['descconta'][i];
          celula5.innerHTML = data['valortotalconta'][i].toLocaleString('pt-BR', {
            minimumFractionDigits: 2,
            style: 'currency',
            currency: 'BRL'
          });
          celula6.innerHTML = "<input type='button' name='editardespesa" + data["idcontapagar"][i] + "' id='editardespesa" + data["idcontapagar"][i] + "' onclick='editardespesa(" + data["idcontapagar"][i] + ")' value='Editar'>";
        }
        document.getElementById('totalapagar').innerHTML = totalapagar.toLocaleString('pt-BR', {
          minimumFractionDigits: 2,
          style: 'currency',
          currency: 'BRL'
        });
        document.getElementById('parcelasapagar').innerHTML = parcelasapagar;
      }
    });
  }

  function editardespesa(idcontapagar) {
    $.ajax({
      type: "GET",
      url: "editcontapagar",
      data: {
        idcontapagar: idcontapagar,
      },
      dataType: "json",
      success: function(data) {
        $('#novacontaeditModal').modal('show');
        preenchercategoriasedit();
        preencherfornecedoresedit();
        checarpagoinputedit();
        editatual = idcontapagar;
        document.getElementById('datapagocontainputedit').value = data['datapagoconta'];
        document.getElementById('desccontainputedit').value = data['descconta'];
        document.getElementById('formapagamentoinputedit').value = data['formapagamentoconta'];
        document.getElementById('periodocontainputedit').value = data['periodoconta'];
        document.getElementById('quantidadecontainputedit').value = data['quantidadeconta'];
        document.getElementById('valortotalcontainputedit').value = data['valortotalconta'];
        document.getElementById('vencimentocontainputedit').value = data['vencimentoconta'];
        if (data['pagoconta'] == 1) {
          document.getElementById('pagocontaedit').checked = true;
        } else {
          document.getElementById('pagocontaedit').checked = false;
        }
        setTimeout(function() {
          if (data['categoriaconta'] != null) {
            document.getElementById('categoriacontainputedit').value = data['categoriaconta'];
          } else {
            document.getElementById('categoriacontainputedit').value = '';
          }

          if (data['fornecedorconta'] != null) {
            document.getElementById('fornecedorcontainputedit').value = data['fornecedorconta'];
          } else {
            document.getElementById('fornecedorcontainputedit').value = '';
          }
        }, 500);
      }
    });
  }

  function checarreceitaspagas() {
    receitaspagasid = [];
    // console.log(subcategoriasnome, subcategoriasnumero);
    var tableHeaderRowCount = 0;
    var table = document.getElementById('receitasrecebidastablebody');
    var rowCount = table.rows.length;
    for (var i = tableHeaderRowCount; i < rowCount; i++) {
      table.deleteRow(tableHeaderRowCount);
    }
    $.ajax({
      type: "GET",
      url: "/consultareceitaspagas",
      data: {
        inicio: document.getElementById('intervaloreceitas1').value,
        fim: document.getElementById('intervaloreceitas2').value
      },
      dataType: "json",
      success: function(data) {
        // console.log(data);
        parcelasrecebidas = 0;
        totalrecebido = 0;
        for (i = 0; i < data['idcontareceber'].length; i++) {
          receitaspagasid.push(data['idcontareceber'][i]);
          parcelasrecebidas++;
          totalrecebido += data['valorconta'][i];
          var tabela = document.getElementById('receitasrecebidastablebody');
          var numeroLinhas = tabela.rows.length;
          var linha = tabela.insertRow(numeroLinhas);
          var celula1 = linha.insertCell(0);
          var celula2 = linha.insertCell(1);
          var celula3 = linha.insertCell(2);
          var celula4 = linha.insertCell(3);
          var celula5 = linha.insertCell(4);
          var celula6 = linha.insertCell(5);
          var celula7 = linha.insertCell(6);
          celula1.innerHTML = "<input type='checkbox' name='checkboxreceitaspagas" + data['idcontareceber'][i] + "' id='checkboxreceitaspagas" + data['idcontareceber'][i] + "'>";
          celula2.innerHTML = data['datapagoconta'][i];
          celula3.innerHTML = data['clienteconta'][i];
          celula4.innerHTML = data['descconta'][i];
          switch (data['formapagamento'][i]) {
            case 1:
              celula5.innerHTML = 'Dinheiro';
              break;
            case 2:
              celula5.innerHTML = 'Cartão - Débito (Auto:'+data['autoconta'][i]+', CV:'+data['cvconta'][i]+')';
              break;
            case 3:
              celula5.innerHTML = 'Cartão - Crédito (Auto:'+data['autoconta'][i]+', CV:'+data['cvconta'][i]+')';
              break;
            case 4:
              celula5.innerHTML = 'Pix'
              break;
            case 5:
              celula5.innerHTML = 'Cheque'
              break;
            default:
              celula5.innerHTML = 'Boleto Bancário';
          }
          celula6.innerHTML = data['valorconta'][i].toLocaleString('pt-BR', {
            minimumFractionDigits: 2,
            style: 'currency',
            currency: 'BRL'
          });
          celula7.innerHTML = "<button type='submit' class='btn btadicionar' name='estornar" + data["idcontareceber"][i] + "' id='estornar" + data["idcontareceber"][i] + "' onclick='estornar(" + data["idcontareceber"][i] + ")' value='Estornar'><span class='fontebotao'>Estornar</span></button>";
        }
        document.getElementById('totalrecebido').innerHTML = totalrecebido.toLocaleString('pt-BR', {
          minimumFractionDigits: 2,
          style: 'currency',
          currency: 'BRL'
        });
        document.getElementById('parcelasrecebidas').innerHTML = parcelasrecebidas;
      }
    });

  }

  function checarreceitasapagar() {
    receitasapagarid = [];
    var tableHeaderRowCount = 0;
    var table = document.getElementById('receitasarecebertablebody');
    var rowCount = table.rows.length;
    for (var i = tableHeaderRowCount; i < rowCount; i++) {
      table.deleteRow(tableHeaderRowCount);
    }
    $.ajax({
      type: "GET",
      url: "/consultareceitasapagar",
      data: {
        inicio: document.getElementById('intervaloreceitas1').value,
        fim: document.getElementById('intervaloreceitas2').value
      },
      dataType: "json",
      success: function(data) {
        parcelasareceber = 0;
        totalareceber = 0;
        for (i = 0; i < data['idcontareceber'].length; i++) {
          receitasapagarid.push(data['idcontareceber'][i]);
          parcelasareceber++;
          totalareceber += data['valorconta'][i];
          var tabela = document.getElementById('receitasarecebertablebody');
          var numeroLinhas = tabela.rows.length;
          var linha = tabela.insertRow(numeroLinhas);
          var celula1 = linha.insertCell(0);
          var celula2 = linha.insertCell(1);
          var celula3 = linha.insertCell(2);
          var celula4 = linha.insertCell(3);
          var celula5 = linha.insertCell(4);
          var celula6 = linha.insertCell(5);
          var celula7 = linha.insertCell(6);
          celula1.innerHTML = "<input type='checkbox' name='checkboxreceitasapagar" + data['idcontareceber'][i] + "' id='checkboxreceitasapagar" + data['idcontareceber'][i] + "'>";
          celula2.innerHTML = data['vencimentoconta'][i];
          celula3.innerHTML = data['clienteconta'][i];
          celula4.innerHTML = data['descconta'][i];
          switch (data['formapagamento'][i]) {
            case 1:
              celula5.innerHTML = 'Dinheiro';
              break;
            case 2:
              celula5.innerHTML = 'Cartão - Débito';
              break;
            case 3:
              celula5.innerHTML = 'Cartão - Crédito';
              break;
            case 4:
              celula5.innerHTML = 'Pix'
              break;
            case 5:
              celula5.innerHTML = 'Cheque'
              break;
            default:
              celula5.innerHTML = 'Boleto Bancário';
          }
          celula6.innerHTML = data['valorconta'][i].toLocaleString('pt-BR', {
            minimumFractionDigits: 2,
            style: 'currency',
            currency: 'BRL'
          });
          celula7.innerHTML = "<button type='submit' class='btn btadicionar' name='pagar" + data["idcontareceber"][i] + "' id='pagar" + data["idcontareceber"][i] + "' onclick='pagar(" + data["idcontareceber"][i] + ")' value='Pagar'><span class='fontebotao' style='font-size:15px'>Pagar</span></button>";
        }
        document.getElementById('totalareceber').innerHTML = totalareceber.toLocaleString('pt-BR', {
          minimumFractionDigits: 2,
          style: 'currency',
          currency: 'BRL'
        });
        document.getElementById('parcelasareceber').innerHTML = parcelasareceber;
      }
    });
  }

  function checarfluxodecaixa() {
    var tableHeaderRowCount = 0;
    var table = document.getElementById('fluxorecebidastablebody');
    var rowCount = table.rows.length;
    for (var i = tableHeaderRowCount; i < rowCount; i++) {
      table.deleteRow(tableHeaderRowCount);
    }
    $.ajax({
      type: "GET",
      url: "/consultafluxocaixa",
      data: {
        inicio: document.getElementById('intervalofluxo1').value,
        fim: document.getElementById('intervalofluxo2').value
      },
      dataType: "json",
      success: function(data) {
        // console.log(data);
        parcelaspagasfluxo = 0;
        parcelasrecebidasfluxo = 0;
        totalpagofluxo = 0;
        totalrecebidofluxo = 0;
        resumofluxo = 0;
        for (i = 0; i < data['formapagamentoconta'].length; i++) {
          if (data['tipoconta'][i] == 'Receita') {
            parcelasrecebidasfluxo++;
            totalrecebidofluxo += data['valorconta'][i];
          } else {
            parcelaspagasfluxo++;
            totalpagofluxo += data['valorconta'][i];
          }
          var tabela = document.getElementById('fluxorecebidastablebody');
          var numeroLinhas = tabela.rows.length;
          var linha = tabela.insertRow(numeroLinhas);
          var celula1 = linha.insertCell(0);
          var celula2 = linha.insertCell(1);
          var celula3 = linha.insertCell(2);
          var celula4 = linha.insertCell(3);
          var celula5 = linha.insertCell(4);
          // celula1.innerHTML = "<input type='checkbox' name='checkboxreceitasapagar" + data['idcontareceber'][i] + "' id='checkboxreceitasapagar" + data['idcontareceber'][i] + "'>";
          var data0fluxo = data['datapagoconta'][i].split('-');
          celula1.innerHTML = data0fluxo[2] + '/' + data0fluxo[1] + '/' + data0fluxo[0];
          celula2.innerHTML = data['descconta'][i];
          switch (data['formapagamentoconta'][i]) {
            case 1:
              celula3.innerHTML = 'Dinheiro';
              break;
            case 2:
              celula3.innerHTML = 'Cartão - Débito';
              break;
            case 3:
              celula3.innerHTML = 'Cartão - Crédito';
              break;
            case 4:
              celula3.innerHTML = 'Pix'
              break;
            case 5:
              celula3.innerHTML = 'Cheque'
              break;
            default:
              celula3.innerHTML = 'Boleto Bancário';
          }
          celula4.innerHTML = data['valorconta'][i].toLocaleString('pt-BR', {
            minimumFractionDigits: 2,
            style: 'currency',
            currency: 'BRL'
          });
          celula5.innerHTML = data['tipoconta'][i];
        }
        document.getElementById('totalrecebidofluxo').innerHTML = totalrecebidofluxo.toLocaleString('pt-BR', {
          minimumFractionDigits: 2,
          style: 'currency',
          currency: 'BRL'
        });
        document.getElementById('parcelasrecebidasfluxo').innerHTML = parcelasrecebidasfluxo;
        document.getElementById('totalpagofluxo').innerHTML = totalpagofluxo.toLocaleString('pt-BR', {
          minimumFractionDigits: 2,
          style: 'currency',
          currency: 'BRL'
        });
        document.getElementById('parcelaspagasfluxo').innerHTML = parcelaspagasfluxo;
        resumofluxo = totalrecebidofluxo - totalpagofluxo;
        document.getElementById('resumofluxo').innerHTML = resumofluxo.toLocaleString('pt-BR', {
          minimumFractionDigits: 2,
          style: 'currency',
          currency: 'BRL'
        });
      }
    });
  }

  function excluirdespesas() {
    despesasexcluir = [];
    document.getElementById('diverrointervalodespesas').innerHTML = '';
    for (var i = 0; i < despesasapagarid.length; i++) {
      if (document.getElementById('checkboxdespesasapagar' + despesasapagarid[i]).checked == true) {
        despesasexcluir.push(despesasapagarid[i]);
      }
    }

    for (var i = 0; i < despesaspagasid.length; i++) {
      if (document.getElementById('checkboxdespesaspagas' + despesaspagasid[i]).checked == true) {
        despesasexcluir.push(despesaspagasid[i]);
      }
    }

    if (despesasexcluir.length != 0) {
      $('#excluircontasModal').modal('show');
    } else {
      document.getElementById('diverrointervalodespesas').innerHTML = 'Nenhuma conta selecionada para excluir!';
    }
  }

  function excluirreceitas() {
    receitasexcluir = [];
    document.getElementById('diverrointervaloreceitas').innerHTML = '';
    for (var i = 0; i < receitasapagarid.length; i++) {
      if (document.getElementById('checkboxreceitasapagar' + receitasapagarid[i]).checked == true) {
        receitasexcluir.push(receitasapagarid[i]);
      }
    }

    for (var i = 0; i < receitaspagasid.length; i++) {
      if (document.getElementById('checkboxreceitaspagas' + receitaspagasid[i]).checked == true) {
        receitasexcluir.push(receitaspagasid[i]);
      }
    }

    if (receitasexcluir.length != 0) {
      $('#excluircontasModal').modal('show');
    } else {
      document.getElementById('diverrointervaloreceitas').innerHTML = 'Nenhuma conta selecionada para excluir!';
    }
  }

  function novaconta() {
    $('#novacontaModal').modal('show');
    checarfornecedorinput();
    checarpagoinput();
  }

  function pagar(id) {
    editatual = id
    $('#pagarcontasModal').modal('show');
    document.getElementById('datapagocontainputpagar').value = diaatual;
    document.getElementById('formapagamentoinputpagar').value = '';
  }

  function novaContaConfirm() {
    $.ajax({
      type: "GET",
      url: "/novacontapagar",
      data: {
        descconta: document.getElementById('desccontainput').value,
        categoriaconta: document.getElementById('categoriacontainput').value,
        vencimentoconta: document.getElementById('vencimentocontainput').value,
        valortotalconta: document.getElementById('valortotalcontainput').value,
        quantidadeconta: document.getElementById('quantidadecontainput').value,
        periodoconta: document.getElementById('periodocontainput').value,
        fornecedorconta: document.getElementById('fornecedorcontainput').value,
        pagoconta: document.getElementById('pagoconta').checked,
        datapagoconta: document.getElementById('datapagocontainput').value,
        formapagamento: document.getElementById('formapagamentoinput').value,

      },
      dataType: "json",
      success: function(data) {
        $('#novacontaModal').modal('hide');
        checardespesaspagas();
        checardespesasapagar();
      }
    });
  }

  function novaContaeditConfirm() {
    $.ajax({
      type: "GET",
      url: "/editcontapagar",
      data: {
        idcontapagar: editatual,
        descconta: document.getElementById('desccontainputedit').value,
        categoriaconta: document.getElementById('categoriacontainputedit').value,
        vencimentoconta: document.getElementById('vencimentocontainputedit').value,
        valortotalconta: document.getElementById('valortotalcontainputedit').value,
        quantidadeconta: document.getElementById('quantidadecontainputedit').value,
        periodoconta: document.getElementById('periodocontainputedit').value,
        fornecedorconta: document.getElementById('fornecedorcontainputedit').value,
        pagoconta: document.getElementById('pagocontaedit').checked,
        datapagoconta: document.getElementById('datapagocontainputedit').value,
        formapagamento: document.getElementById('formapagamentoinputedit').value,

      },
      dataType: "json",
      success: function(data) {
        $('#novacontaeditModal').modal('hide');
        checardespesaspagas();
        checardespesasapagar();
      }
    });
  }

  function pagarcontasConfirm() {
    $.ajax({
      type: "GET",
      url: "/pagarcontareceber",
      data: {
        idcontareceber: editatual,
        datapagoconta: document.getElementById('datapagocontainputpagar').value,
        formapagamento: document.getElementById('formapagamentoinputpagar').value,
      },
      dataType: "json",
      success: function(data) {
        $('#pagarcontasModal').modal('hide');
        checarreceitaspagas();
        checarreceitasapagar();
      }
    });
  }

  function estornar(idcontareceber) {
    $.ajax({
      type: "GET",
      url: "/estornarcontareceber",
      data: {
        idcontareceber: idcontareceber,

      },
      dataType: "json",
      success: function(data) {
        checarreceitaspagas();
        checarreceitasapagar();
      }
    });
  }

  function recebercaixaConfirm(input) {
    $.ajax({
      type: "GET",
      url: "/recebercaixaconfirm",
      data: {
        caixa_id: caixareceberatual,
        caixa_valorrecebido: document.getElementById('valorrecebidodinheiroinput').value,
      },
      dataType: "json",
      success: function(data) {
        listatesouraria();
        $('#recebercaixaModal').modal('hide');
      }
    });
  }

  function excluircontasConfirm() {
    if (divatual == 'receitas') {
      $.ajax({
        type: "GET",
        url: "excluirreceitas",
        data: {
          receitasexcluir: receitasexcluir,
        },
        dataType: "json",
        success: function(data) {
          $('#excluircontasModal').modal('hide');
          checarreceitaspagas();
          checarreceitasapagar();
        }
      });
    } else if (divatual == 'despesas') {
      $.ajax({
        type: "GET",
        url: "excluirdespesas",
        data: {
          despesasexcluir: despesasexcluir,
        },
        dataType: "json",
        success: function(data) {
          $('#excluircontasModal').modal('hide');
          checardespesaspagas();
          checardespesasapagar();
        }
      });
    } else {

    }


  }


  function checarfornecedorinput() {
    if (document.getElementById('fornecedorcontainput').value != '') {
      var indexfornecedoratual = fornecedoresid.indexOf(document.getElementById('fornecedorcontainput').value);
      document.getElementById('cpfcnpjfornecedorcontainput').innerHTML = 'CPF/CNPJ do Fornecedor: ' + fornecedorescpfcnpj[indexfornecedoratual];
      document.getElementById('cpfcnpjfornecedorcontainput').style.display = 'block';
    } else {
      document.getElementById('cpfcnpjfornecedorcontainput').style.display = 'none';
    }
  }

  function checarpagoinput() {
    if (document.getElementById('pagoconta').checked == true) {
      document.getElementById('divpagoconta').style.display = 'block';
    } else {
      document.getElementById('divpagoconta').style.display = 'none';
    }
  }

  function checarpagoinputedit() {
    if (document.getElementById('pagocontaedit').checked == true) {
      document.getElementById('divpagocontaedit').style.display = 'block';
    } else {
      document.getElementById('divpagocontaedit').style.display = 'none';
    }
  }

  function checarintervaloreceitas() {
    if (document.getElementById('intervaloreceitas1').value <= document.getElementById('intervaloreceitas2').value) {
      checarreceitasapagar();
      checarreceitaspagas();
    }
  }

  function checarintervalodespesas() {
    if (document.getElementById('intervalodespesas1').value <= document.getElementById('intervalodespesas2').value) {
      checardespesasapagar();
      checardespesaspagas();
    }
  }

  function checarintervalofluxo() {
    if (document.getElementById('intervalofluxo1').value <= document.getElementById('intervalofluxo2').value) {
      checarfluxodecaixa();
    }
  }
</script>
@endsection

</html>