@extends('layouts.Menu')
@section('atalhoSuperior')@endsection
@section('menuLateral')@endsection

<!DOCTYPE html>
<html lang="pt-br">
<head> 
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- icons -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">  
    <!-- css da página -->
    <link rel="stylesheet" href="{{asset('../css/estilo.css')}}">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="{{asset('jquery.min.js')}}"></script>
    <script src="{{asset('jquery-ui-1.12.1/jquery-ui.js')}}"></script>
    <script src="{{asset('inputmask/dist/jquery.inputmask.min.js')}}"></script>
    <script src="{{asset('inputmask/dist/bindings/inputmask.binding.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <title>Cobrança</title>

    <style>
        .fontmenor{
            font-size:14px!important;
        }
        .lote,.avulsa{
            border: 2px solid #d1941a;
            background: transparent;
            color: #d1941a!important;
        }

        .gerarremessa{
            border: 2px solid #0846a1;
            background: transparent;
        }

        .validadoefechado{
            display: flex;
            width: 8rem;
            justify-content: space-between;
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

        .btnnovacobranca{
            width: 126px;
            height: 34px;    
            background: #3AA97B;
            border:none;
            border-radius: 6px;
            align-self:end;
            margin-left:1rem;

            display: flex;
            align-items: center;
            justify-content: space-around;
            padding: 5px;

            font-family: 'Source Sans Pro', sans-serif;
            font-style: normal;
            font-weight: 600;
            font-size: 15.3px;
            line-height: 20px;
            letter-spacing: -0.5px;
            color: #FFFFFF;
        }
        
        .bteditarcobranca{
            background: #1853B4;
            border-radius: 6px;
        }

        .validadoefechado{
            /* display: flex; */
            /* align-items: end; */
            /* justify-content: space-between; */
            width: 18rem;
            margin-top: 0.5rem;
        }

        .vef{
            display: flex;
            justify-content: space-between;
            width: 8rem;
        }

        .table>:not(caption)>*>* {
            padding: 0.6rem 0.7rem!important;
        }

        .container-fluid {
            max-width: 1050px!important;
        }

        .iconscobranca{
            width:28px;
        }

        @media (max-width: 575px) {
            .teste{
                width:100%;
                margin-top: 2rem;
            }
        }


        /* .ui-autocomplete {
            position: absolute;
            top: 100%;
            left: 0;
            z-index: 1000;
            float: left;
            display: none;
            min-width: 160px;   
            padding: 4px 0;
            margin: 0 0 10px 25px;
            list-style: none;
            background-color: grey;
            border-color: #ccc;
            border-color: rgba(0, 0, 0, 0.2);
            border-style: solid;
            border-width: 1px;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;
            -webkit-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
            -moz-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
            -webkit-background-clip: padding-box;
            -moz-background-clip: padding;
            background-clip: padding-box;
            *border-right-width: 2px;
            *border-bottom-width: 2px;
        } */
    </style>
</head>
<body>
@section('Conteudo')
    <!-- <button type="button" class="btn btn-success" style='font-size:14px'>
        Remessa
    </button>

    <button type="button" class="btn btn-success" style='font-size:14px'>
        Cobrança
    </button>

    <button type="button" class="btn btn-success" style='font-size:14px'>
        Cobrança Recorrente
    </button> -->

    <div class='' style='display:flex'>
        <div class='tituloprincipal'>Cobrança</div>
        <button class='btnnovacobranca' onclick='abrirnovacobranca()'><img src="../imagens/plus2.svg" alt="">Nova Cobrança</button>
    </div>
    <form id='formteste' enctype="multipart/form-data" method='post'>
        {{ csrf_field() }}
    </br>
    <div class='input' id='input'> Arquivo de Retorno: <input type='file' name='retornotxt' id='retornotxt'> <input type='button' class="btn btn-success" id='retorno' value='PROCESSAR' onclick='processarRetorno()'></div>
        
    </form>
            <!-- Layout abaixo alterdo para tomar toda a tela -->
    <div class="row d-flex justify-content-center"> <!-- class="container-fluid" style='margin-top:5rem;'> -->
        <div class="row gx-3 gy-3">
            <div class="col-sm-3 col-md-2 col-lg-2">
                <div class="teste1">
                    <label for="idlote" class="form-label">ID Lote</label>
                    <input type="text" class="form-control bordainputs" id='idlote'/>
                </div>
            </div>
            <div class="col-sm-5 col-md-5 col-lg-4">
                <div class="teste3">
                    <label for="cobradorresp" class="form-label">Cobrador / Resp.</label>
                    <input type="text" class="form-control bordainputs" id='cobradorresp'/>
                </div>
            </div>
            <div class="col-sm-4 col-md-3 col-lg-2">
                <div class="teste1">
                    <label for="datainicio" class="form-label">Data Início</label>
                    <input type="date" class="form-control bordainputs" id='datainicio'/>
                </div>
            </div>
            <div class="col-sm-4 col-md-3 col-lg-2">
                <div class="teste3">
                    <label for="datafim" class="form-label">Data Fim</label>
                    <input type="date" class="form-control bordainputs" id='datafim'/>
                </div>
            </div>
            <div class="col-sm-3 col-md-2 col-lg-2">
                <div class="teste">
                    <label for="fechado" class="form-label">Fechado</label>
                    <select class="form-select bordainputs" name="fechado" id='fechado'>
                        <option value="">---</option>
                        <option value="1">Sim</option>
                        <option value="0">Não</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-3 col-md-2 col-lg-2">
                <div class="teste">
                    <label for="pago" class="form-label">Pago</label>
                    <select class="form-select bordainputs" name="pago" id='pago'>
                        <option value="">---</option>
                        <option value="1">Sim</option>
                        <option value="0">Não</option>
                    </select>
                </div>
            </div>

            {{-- <div class="col-sm-5 col-md-3 col-lg-2">
                <div class="teste">
                    <label for="cidade" class="form-label">Cidade</label>
                    <select class="form-select bordainputs" id="cidade">
                        <option value="todas">Todas</option>
                        <option value="">a</option>
                        <option value="">b</option>
                        <option value="">c</option>
                    </select>
                </div>
            </div> --}}
            {{-- <div class="col-sm-5 col-md-4 col-lg-3">
                <div class="teste">
                    <label for="bairro" class="form-label">Bairro</label>
                    <select class="form-select bordainputs" id="bairro">
                        <option value="sim">Sim</option>
                        <option value="">a</option>
                        <option value="">b</option>
                        <option value="">c</option>
                    </select>
                </div>
            </div> --}}
            <div class="col-sm-3 col-md-2 col-lg-1" style="display: flex;align-self: end;">
                <div class="teste">
                <button type="submit" class="btn btamarelo" value='Pesquisar' onclick='pesquisarcobrancas()'>
                    <span class="fontebotao" style='font-size:17px'>Pesquisar</span>
                </button>
                </div>
            </div>
        </div>
    </div>
                <!-- Layout abaixo alterdo para tomar toda a tela -->
    <div class="row d-flex justify-content-center"> <!-- class="container-fluid" style='max-width:1132px!important'> -->
        <div id='tabela' class="table-responsive-md" style='margin-bottom: 2.5rem;'>
            <table id='' class="table">
                <thead class="table-active">
                    <tr>
                    <td scope="col">Lote</td>
                    <td scope="col">Responsável</td>
                    <td scope="col">Contrato</td>
                    <td scope="col">Data</td>
                    <td scope="col">Gerado</td>
                    <td scope="col">Pago</td>
                    <td scope="col">Valor</td>
                    <td scope="col">Pagamento</td>
                    <td scope="col">Atrasado</td>
                    <td scope="col">Ação</td>
                    </tr>
                </thead>
                <tbody id='cobrancatbody' style='text-align:center'>

                </tbody>
            </table>
        </div>
    </div>


    <div class="modal fade" id="novacobrancaModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered  modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Nova Cobrança</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <button type="button" class="btn lote" onclick='novacobrancalote()'>Cobrança em Lote</button>
                    <button type="button" class="btn avulsa" onclick='novacobrancaavulsa()'>Cobrança Avulsa</button>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button> -->
                    <button type="button" class="btn btn-success" onclick='novacobrancaConfirm()'>Cadastrar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="relatorioretornoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered  modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Relatório do Retorno</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id='tabela' class="table-responsive-md" style='margin-bottom: 2.5rem;'>
                        <table id='' class="table">
                            <thead class="table-active">
                                <tr>
                                <td scope="col">Lote</td>
                                <td scope="col">Cobrança</td>
                                <td scope="col">Responsável</td>
                                <td scope="col">Data</td>
                                <td scope="col">Mensagem</td>
                                </tr>
                            </thead>
                            <tbody id='relatorioretornotbody' style='text-align:center'>
            
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="novacobrancaloteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered  modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Nova Cobrança em Lote</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body ui-front">
                    <div>
                        <div class="teste3">
                            <label for="cobradorresp" class="form-label">Responsável</label>
                            <input type="text" class="form-control bordainputs" id='resplote' onkeypress='pesquisarnome(this, "lote")' onfocusout='procurardadoslote(this)'/>
                        </div>
                    </div>
                    <div>
                        <div class="teste1">
                            <label for="datainicio" class="form-label">Data Requerimento(Cobrança)</label>
                            <input type="date" class="form-control bordainputs" id='datalote' onchange='calculardatas(this)'/>
                        </div>
                    </div>
                    <div>
                        <div class="teste1">
                            <label for="datainicio" class="form-label">Data Carência</label>
                            <input type="date" class="form-control bordainputs" id='datacarencialote'/>
                        </div>
                    </div>
                    <div>
                        <div class="teste1">
                            <label for="datainicio" class="form-label">Data Inicio</label>
                            <input type="date" class="form-control bordainputs" id='datainiciolote'/>
                        </div>
                    </div>
                    <div>
                        <div class="teste1">
                            <label for="datainicio" class="form-label">Data Regente</label>
                            <input type="date" class="form-control bordainputs" id='datareajustelote'/>
                        </div>
                    </div>
    
                    <div>
                        <div class="teste">
                            <label for="cidade" class="form-label">Cidade</label>
                            <select class="form-select bordainputs" id="cidadeslote">
                                <option value="">Selecionar uma Cidade</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <div class="teste">
                            <label for="cidade" class="form-label">Dia do Pagamento</label>
                            <input type="number" class="form-control bordainputs" id='diapaglote' min = '1' max = '31'/>
                        </div>
                    </div>

                    <div>
                        <div class="teste3">
                            <label for="cobradorresp" class="form-label">Valor</label>
                            <input type="text" class="form-control bordainputs" id='valorlote'/>
                        </div>
                    </div>

                    <div>
                        <div class="teste3">
                            <label for="cobradorresp" class="form-label">Vendedor</label>
                            <input type="text" class="form-control bordainputs" id='vendedorlote' onkeypress='pesquisarnomevendedor(this)'/>
                        </div>
                    </div>
    
                    <div class="validadoefechado">
                        <div class="vef">
                            <label for="cobradorresp" class="form-label">Validado</label>
                            <input type='checkbox' value='validadolote' id='validadolote'>
                        </div>
                        <div class="vef">
                            <label for="cobradorresp" class="form-label">Fechado</label>
                            <input type='checkbox' value='fechadolote' id='fechadolote'>
                        </div>
                    </div>
                </div>
                 <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="criarcobrancalote()">Gerar lote</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                </div> 
            </div>
        </div>
    </div>

    <div class="modal fade" id="novacobrancaavulsaModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered  modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Nova Cobrança Avulsa</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body ui-front">    
                    <div>
                        <div class="teste3">
                            <label for="cobradorresp" class="form-label">Responsável</label>
                            <input type="text" class="form-control bordainputs" id='respavulsa' onkeypress='pesquisarnome(this, "avulsa")'/>
                        </div>
                    </div>
                    <div>
                        <div class="teste1">
                            <label for="datainicio" class="form-label">Data Cobrança</label>
                            <input type="date" class="form-control bordainputs" id='dataavulsa'/>
                        </div>
                    </div>

                    <div>
                        <div class="teste">
                            <label for="cidade" class="form-label">Cidade</label>
                            <select class="form-select bordainputs" id="cidadesavulsa">
                                <option value="">Selecionar uma Cidade</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <div class="teste3">
                            <label for="cobradorresp" class="form-label">Valor</label>
                            <input type="text" class="form-control bordainputs" id='valoravulsa'/>
                        </div>
                    </div>

                    <div class='validadoefechado'>
                        <div class="vef">
                            <label for="cobradorresp" class="form-label">Validado</label>
                            <input type='checkbox' value='validadoavulsa' id='validadoavulsa'>
                        </div>

                        <div class="vef">
                            <label for="cobradorresp" class="form-label">Fechado</label>
                            <input type='checkbox' value='fechadoavulsa' id='fechadoavulsa'>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button> -->
                    <button type="button" class="btn btn-success" onclick='criarcobrancaavulsa()'>Criar Cobrança</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="novacobrancaavulsagerarModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered  modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cobrança Avulsa Criada com Sucesso!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Cobrança Avulsa Criada com Sucesso!
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-primary" onclick='gerarremessaavulsa()'>GERAR REMESSA</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="abrirloteModal" tabindex="-1" aria-labelledby="abrirloteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="abrirloteModalLabel">Lote</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h2>Informações do Lote:</h2>
                        <div id='lotebotoes'></div>
                    <br>
                    <div class="container-fluid">
                        <div id='tabela' class="table-responsive">
                            <table id='' class="table">
                                <thead class="table-active">
                                    <tr>
                                        <td scope="col">ID Lote</td>
                                        <td scope="col">ID Cobrança</td>
                                        <td scope="col">Responsável</td>
                                        <td scope="col">Data do Vencimento</td>
                                        <td scope="col">Fechado</td>
                                        <td scope="col">Pago</td>
                                        <td scope="col">Valor</td>
                                        <td scope="col">Ação</td>
                                    </tr>
                                </thead>
                                <tbody id='cobrancasemlotetbody' style='text-align:center'>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Ok</button>
                </div> -->
            </div>
        </div>
  </div>

  <div class="modal fade" id="pagamentoModal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="exampleModalToggleLabel2">Informe a forma de pagamento da cobrança</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="" id='pagamentovalor'></div>
          <div class='input table-responsive' id='tabelapagamento' style='margin-top:2rem'>
            <table class='table' id='pagamentotable'>
              <thead class="table-active">
                <tr>
                  <td scope="col">Método</td>
                  <td scope="col">Valor</td>
                  <td scope="col">Parcelas</td>
                  <td scope="col">Auto</td>
                  <td scope="col">CV</td>
                  <td scope="col">Remover</td>
                </tr>
              </thead>
              <tbody id='pagamentotbody'>

              </tbody>
            </table>
            <button type="submit" class="btn btadd btadicionar" value="Adicionar" onclick="adicionaLinhaPagamento()">
              <span class="fontebotao">Adicionar</span>
            </button>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" data-bs-target="#abrirloteModal" data-bs-toggle="modal" data-bs-dismiss="modal">Voltar</button>
          <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button> -->
          <button type="button" class="btn btn-success" onclick='receberPagamentoConfirm()'>Pagar</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="avisoModal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="exampleModalToggleLabel2">Erro!</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div id='avisoerro'></div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
        </div>
      </div>
    </div>
  </div>
</body>



<script>
    var idcobrancalote = [];
    var valorcobrancalote = [];
    var pagamentometodo = [];
    var pagamentovalor = [];
    var pagamentoparcela = [];
    var pagamentoauto = [];
    var pagamentocv = [];
    var pagamentoatual = 0;
    var valorpagamentoatual = 0;
    var valorpagamentosomado = 0;

    var mesatual = new Date().getMonth();
    var anoatual = new Date().getFullYear();
    var ultimodia = new Date(anoatual, mesatual + 1, 0).toLocaleDateString().split('/');
    var ultimodia2 = ultimodia[2] + "-" + ultimodia[1] + "-" + ultimodia[0];
    var diaatual = anoatual + "-" + ('00'+(mesatual + 1)).slice(-2) + "-" + String(new Date().getDate()).padStart(2, '0');
    document.getElementById('datainicio').value = diaatual;
    document.getElementById('datafim').value = ultimodia2;
    var cobrancaatual = 0;
    var cidades = ['ABAIARA','ACARAPE','ACARAÚ','ACOPIARA','AIUABA','ALCÂNTARAS','ALTANEIRA','ALTO SANTO','AMONTADA','ANTONINA DO NORTE','APUIARÉS','AQUIRAZ','ARACATI','ARACOIABA','ARARENDÁ','ARARIPE','ARATUBA','ARNEIROZ','ASSARÉ','AURORA','BAIXIO','BANABUIÚ','BARBALHA','BARREIRA','BARRO','BARROQUINHA','BATURITÉ','BEBERIBE','BELA CRUZ','BOA VIAGEM','BREJO SANTO','CAMOCIM','CAMPOS SALES','CANINDÉ','CAPISTRANO','CARIDADE','CARIRÉ','CARIRIAÇU','CARIÚS','CARNAUBAL','CASCAVEL','CATARINA','CATUNDA','CAUCAIA','CEDRO','CHAVAL','CHORÓ','CHOROZINHO','COREAÚ','CRATEÚS','CRATO','CROATÁ','CRUZ','DEP. IRAPUAN PINHEIRO','ERERÉ','EUSÉBIO','FARIAS BRITO','FORQUILHA','FORTALEZA','FORTIM','FRECHEIRINHA','GENERAL SAMPAIO','GRAÇA','GRANJA','GRANJEIRO','GROAÍRAS','GUAIÚBA','GUARACIABA DO NORTE','GUARAMIRANGA','HIDROLÂNDIA','HORIZONTE','IBARETAMA','IBIAPINA','IBICUITINGA','ICAPUÍ','ICO','IGUATU','INDEPENDÊNCIA','IPAPORANGA','IPAUMIRIM','IPU','IPUEIRAS','IRACEMA','IRAUÇUBA','ITAIÇABA','ITAITINGA','ITAPAJÉ','ITAPIPOCA','ITAPIÚNA','ITAREMA','ITATIRA','JAGUARETAMA','JAGUARIBARA','JAGUARIBE','JAGUARUANA','JARDIM','JATÍ','JIJOCA DE JERICOACOARA','JUAZEIRO DO NORTE','JUCÁS','LAVRAS DA MANGABEIRA','LIMOEIRO DO NORTE','MADALENA','MARACANAÚ','MARANGUAPE','MARCO','MARTINÓPOLE','MASSAPÊ','MAURITI','MERUOCA','MILAGRES','MILHÃ','MIRAÍMA','MISSÃO VELHA','MOMBAÇA','MONSENHOR TABOSA','MORADA NOVA','MORAÚJO','MORRINHOS','MUCAMBO','MULUNGU','NOVA OLINDA','NOVA RUSSAS','NOVO ORIENTE','OCARA','ORÓS','PACAJUS','PACATUBA','PACOTI','PACUJÁ','PALHANO','PALMÁCIA','PARACURU','PARAIPABA','PARAMBU','PARAMOTI','PEDRA BRANCA','PENAFORTE','PENTECOSTE','PEREIRO','PINDORETAMA','PIQUET CARNEIRO','PIRES FERREIRA','PORANGA','PORTEIRAS','POTENGI','POTIRETAMA','QUITERIANÓPOLIS','QUIXADÁ','QUIXELÔ','QUIXERAMOBIM','QUIXERÉ','REDENÇÃO','RERIUTABA','RUSSAS','SABOEIRO','SALITRE','SANTANA DO ACARAÚ','SANTA QUITERIA','SANTANA DO CARIRI','SÃO BENEDITO','SÃO GONÇALO DO AMARANTE','SÃO JOÃO DO JAGUARIBE','SÃO LUÍS DO CURU','SENADOR POMPEU','SENADOR SÁ','SOBRAL','SOLONÓPOLE','TABULEIRO DO NORTE','TAMBORIL','TARRAFAS','TAUÁ','TEJUÇUOCA','TIANGUÁ','TRAIRI','TURURU','UBAJARA','UMARI','UMIRIM','URUBURETAMA','URUOCA','VARJOTA','VÁRZEA ALEGRE','VIÇOSA DO CEARÁ'];
    var select = document.getElementById('cidadesavulsa');
    for (var i = 0; i < cidades.length; i++) {
        var opt = document.createElement('option');
        opt.appendChild(document.createTextNode(cidades[i]));
        opt.value = i;
        select.appendChild(opt);
    }
    select = document.getElementById('cidadeslote');
    for (var i = 0; i < cidades.length; i++) {
        var opt = document.createElement('option');
        opt.appendChild(document.createTextNode(cidades[i]));
        opt.value = i;
        select.appendChild(opt);
    }

    $. extend ( $. ui . autocomplete . prototype . options ,  { 
      open :  function ( event , ui )  { 
        $ ( this ) . autocomplete ( "widget" ) . css ( { 
                "width" :  ( $ ( this ) . width ( )  +  "px" ) 
            } ) ; 
        } 
    });

    $('#valoravulsa').inputmask('decimal', {
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

    $('#valorlote').inputmask('decimal', {
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

    function apagartabelaabrirlote(){
        var tableHeaderRowCount = 0;
        var table = document.getElementById('cobrancasemlotetbody');
        var rowCount = table.rows.length;
        for (var i = tableHeaderRowCount; i < rowCount; i++) {
            table.deleteRow(tableHeaderRowCount);
        }
    }
    function apagartabelarelatorio(){
        var tableHeaderRowCount = 0;
        var table = document.getElementById('relatorioretornotbody');
        var rowCount = table.rows.length;
        for (var i = tableHeaderRowCount; i < rowCount; i++) {
            table.deleteRow(tableHeaderRowCount);
        }
    }

    ultimoslotes();

    function ultimoslotes(){
        $.ajax({
            type: "GET",
            url: "ultimoslotes",
            data: {},
            dataType: "json",
            success: function(data) {
                console.log(data);
                for(i=0; i<data[0].length; i++){
                    var tabela = document.getElementById('cobrancatbody');
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
                    var celula9 = linha.insertCell(8);
                    var celula10 = linha.insertCell(9);
                    celula1.innerHTML=data[0][i];
                    celula2.innerHTML=data[1][i];
                    celula3.innerHTML=data[2][i];
                    celula4.innerHTML=data[3][i].split('-')[2] + '/' + ('00' + (data[3][i].split('-')[1] - 1)).slice('-2') + '/' + data[3][i].split('-')[0];
                    if(data[4][i] == 'Não'){
                        celula5.innerHTML= "<img src='../imagens/close.svg' class='iconscobranca'>";
                    }else{
                        celula5.innerHTML= "<img src='../imagens/check.svg' class='iconscobranca'>";
                    }
                    if(data[5][i] == 'Não'){
                        celula6.innerHTML= "<img src='../imagens/close.svg' class='iconscobranca'>";
                    }else{
                        celula6.innerHTML= "<img src='../imagens/check.svg' class='iconscobranca'>";
                    }
                    celula7.innerHTML=data[6][i].toLocaleString('pt-br', {
                        style: 'currency',
                        currency: 'BRL'
                    });
                    var formapagamentostring = '';
                    var metododividido = data[9][i].split(',');
                    for(var o = 0; o < metododividido.length; o++){
                        if(metododividido[o] == '1'){
                            formapagamentostring += 'Dinheiro,';
                        }else if(metododividido[o] == '2'){
                            formapagamentostring += 'Débito,';
                        }else if(metododividido[o] == '3'){
                            formapagamentostring += 'Crédito,';
                        }else if(metododividido[o] == '4'){
                            formapagamentostring += 'Pix,';
                        }else{
                            formapagamentostring += 'Boleto,';
                        }
                    }
                    celula8.innerHTML= formapagamentostring.substring(0, formapagamentostring.length - 1);
                    celula9.innerHTML=data[7][i];
                    celula10.innerHTML="<button type='submit' class='btn' value='Abrir Lote' onclick='abrirlote(this)' id='"+data[0][i]+"' style='background:#2d9067;width:max-content;'><span class='fontebotao'>ABRIR LOTE</span></button>";
                    
                }
            }
        });
    }

    function pesquisarcobrancas(){
        apagartabela();
        $.ajax({
            type: "GET",
            url: "pesquisarcobrancas",
            data: {
                idlote : document.getElementById('idlote').value,
                cobradorresp : document.getElementById('cobradorresp').value,
                datainicio : document.getElementById('datainicio').value,
                datafim : document.getElementById('datafim').value,
                fechado : document.getElementById('fechado').value,
                pago : document.getElementById('pago').value,
            },
            dataType: "json",
            success: function(data) {
                console.log(data);
                for(i=0; i<data[0].length; i++){
                    var tabela = document.getElementById('cobrancatbody');
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
                    var celula9 = linha.insertCell(8);
                    var celula10 = linha.insertCell(9);
                    celula1.innerHTML=data[0][i];
                    celula2.innerHTML=data[1][i];
                    celula3.innerHTML=data[2][i];
                    celula4.innerHTML=data[3][i].split('-')[2] + '/' + ('00' + (data[3][i].split('-')[1] - 1)).slice('-2') + '/' + data[3][i].split('-')[0];
                    if(data[4][i] == 'Não'){
                        celula5.innerHTML= "<img src='../imagens/close.svg' class='iconscobranca'>";
                    }else{
                        celula5.innerHTML= "<img src='../imagens/check.svg' class='iconscobranca'>";
                    }
                    if(data[5][i] == 'Não'){
                        celula6.innerHTML= "<img src='../imagens/close.svg' class='iconscobranca'>";
                    }else{
                        celula6.innerHTML= "<img src='../imagens/check.svg' class='iconscobranca'>";
                    }
                    celula7.innerHTML=data[6][i].toLocaleString('pt-br', {
                        style: 'currency',
                        currency: 'BRL'
                    });
                    var formapagamentostring = '';
                    var metododividido = data[9][i].split(',');
                    for(var o = 0; o < metododividido.length; o++){
                        if(metododividido[o] == '1'){
                            formapagamentostring += 'Dinheiro,';
                        }else if(metododividido[o] == '2'){
                            formapagamentostring += 'Débito,';
                        }else if(metododividido[o] == '3'){
                            formapagamentostring += 'Crédito,';
                        }else if(metododividido[o] == '4'){
                            formapagamentostring += 'Pix,';
                        }else{
                            formapagamentostring += 'Boleto,';
                        }
                    }
                    celula8.innerHTML= formapagamentostring.substring(0, formapagamentostring.length - 1);
                    celula9.innerHTML=data[7][i];
                    celula10.innerHTML="<button type='submit' class='btn' value='Abrir Lote' onclick='abrirlote(this)' id='"+data[0][i]+"' style='background:#2d9067;width:max-content;'><span class='fontebotao'>Abrir Lote</span></button>";
                    
                }
            }
        });
    }

    function apagartabela() {
        var tableHeaderRowCount = 0;
        var table = document.getElementById('cobrancatbody');
        var rowCount = table.rows.length;
        for (var i = tableHeaderRowCount; i < rowCount; i++) {
        table.deleteRow(tableHeaderRowCount);
        }
    }

    function abrirlote(input){
        
        $.ajax({
            type: "GET",
            url: "cobrancasdolote",
            data: {
                idlote: input.id,
            },
            dataType: "json",
            success: function(data) {
                console.log(data, data[1][0]['idlote']);
                idcobrancalote= [];
                valorcobrancalote= [];
                apagartabelaabrirlote();
                $('#abrirloteModal').modal('show');
                document.getElementById('lotebotoes').innerHTML = "ID do lote: "+data[0][0]+"<br>Nome e CPF: "+data[0][1]+"<br>Contrato: "+data[0][2]+"<br>Quantidade do lote: "+data[0][3]+"<br><br><button type='submit' class='btn lote' value='Remessa do Lote' onclick='gerarremessalote(this)' id='"+data[1][0]['idlote']+"' style='margin-right:6px'><span class='fontebotao' style='color: #d1941a;'>REMESSA DO LOTE</span></button><button type='submit' class='btn' value='GERAR CARNE' onclick='gerarboletoslote(this)' id='"+data[1][0]['idlote']+"' style='background:#d1941a;border:2px solid #d1941a'><span class='fontebotao'>BOLETOS LOTE</span></button>";
                for(i=0; i<data[1].length; i++){

                    idcobrancalote.push(data[1][i]['idcobranca']);
                    valorcobrancalote.push(parseFloat(data[1][i]['valor']));
                    var tabela = document.getElementById('cobrancasemlotetbody');
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
                    celula1.innerHTML=data[1][i]['idlote'];
                    celula2.innerHTML=data[1][i]['idcobranca'];
                    celula3.innerHTML=data[1][i]['responsavel'];
                    celula4.innerHTML=data[1][i]['data'].split('-')[2] + '/' + data[1][i]['data'].split('-')[1] + '/' + data[1][i]['data'].split('-')[0];
                    if(data[1][i]['fechado'] == 0){
                        celula5.innerHTML="<img src='../imagens/close.svg' class='iconscobranca'>";
                    }else{
                        celula5.innerHTML="<img src='../imagens/check.svg' class='iconscobranca'>";
                    }
                    if(data[1][i]['pago'] == 0){
                        celula6.innerHTML="<img src='../imagens/close.svg' class='iconscobranca'>";
                    }else{
                        celula6.innerHTML="<img src='../imagens/check.svg' class='iconscobranca'>";
                    }
                    celula7.innerHTML=data[1][i]['valor'].toLocaleString('pt-br', {
                        style: 'currency',
                        currency: 'BRL'
                    });
                    celula8.innerHTML="<button type='submit' class='btn gerarremessa' value='REMESSA' onclick='gerarremessaindividual(this)' id='"+data[1][i]['idcobranca']+"' style='margin-right:4px;'><span class='fontebotao fontmenor' style='color: #0846a1;'>REMESSA</span></button><button type='submit' class='btn' value='BOLETO' onclick='gerarboletoindividual(this)' id='"+data[1][i]['idcobranca']+"' style='background:#0846a1;border:2px solid #0846a1'><span class='fontebotao fontmenor'>BOLETO</span></button><button type='submit' class='btn btn-success' value='Receber Pagamento' onclick='receberPagamento(this)' id='"+data[1][i]['idcobranca']+"' style='margin-right:4px;' data-bs-target='#pagamentoModal' data-bs-toggle='modal' data-bs-dismiss='modal'><span class='fontebotao fontmenor'>PAGAMENTO</span></button>";
                    
                }
            }
        });
    }

    function pesquisarnome(input, tipo) {
        // console.log(input.id);
        var nome = $('#' + input.id).val();
        var nomes = [];
        if (nome.length >= 2) {
        $.ajax({
            type: 'GET',
            url: '../consulta/agenda/nomecontrato',
            data: {
            nomepessoa: nome
            },
            dataType: "json",
            success: function(data) {
                // console.log(data);
            if(tipo == 'avulsa'){
                for (i = 0; i < data.length; i++) {
                    if(data[i][2] == 'Particular'){
                        nomes.push(data[i][0] + " - " + data[i][1] + " - " + data[i][2]);
                    }else{
                        nomes.push(data[i][0] + " - " + data[i][1] + " - " + data[i][2] + " - " + data[i][3] );
                    }
                    
                }
            }else{
                for (i = 0; i < data.length; i++) {
                    if(data[i][2] != 'Particular'){
                        nomes.push(data[i][0] + " - " + data[i][1] + " - " + data[i][2] + " - " + data[i][3] );
                    }
                    
                }
            }
            
            nomes = nomes.filter((este, i) => nomes.indexOf(este) === i);
            $("#" + input.id).autocomplete({
                source: nomes,
            });
            }

        });
        }
    }

    $('#cobradorresp').keyup(function() {

        var nome = $('#cobradorresp').val();
        var nomes = [];
        if (nome.length >= 2) {
        $.ajax({
            type: 'GET',
            url: '/consulta/pessoa/nomecpf',
            data: {
            nomepessoa: nome
            },
            dataType: "json",
            success: function(data) {
            for (i = 0; i < data.length; i++) {
                if (data[i]['pac_nome']) {
                nomes.push(data[i]['pac_nome'] + ' - ' + data[i]['pac_cpf']);
                } else if (data[i]['forfis_nome']) {
                nomes.push(data[i]['forfis_nome'] + ' - ' + data[i]['forfis_cpf']);
                } else if (data[i]['func_nome']) {
                nomes.push(data[i]['func_nome'] + ' - ' + data[i]['func_cpf']);
                } else if (data[i]['forjur_nome']) {
                nomes.push(data[i]['forjur_nome'] + ' - ' + data[i]['forjur_cnpj']);
                } else if (data[i]['clijur_nome']) {
                nomes.push(data[i]['clijur_nome'] + ' - ' + data[i]['clijur_cnpj']);
                }
            }
            nomes = nomes.filter((este, i) => nomes.indexOf(este) === i);
            $("#cobradorresp").autocomplete({
                source: nomes
            });
            }

        });

        }

    });

    function calculardatas(input){
        var data =  input.value.split('-');
        var datacobranca = new Date(data[0], data[1], data[2]);
        var datacarencia = new Date(datacobranca);
        var datareajuste = new Date(datacobranca);
        datacarencia.setDate(datacobranca.getDate() + 1);
        if(checkLeapYear(datacarencia.getFullYear()) == false && datacarencia.getDate() == '29' && datacarencia.getMonth() == '2'){
            datacarencia.setDate(1);
            datacarencia.setMonth(datacobranca.getMonth() + 1);
        }else if(checkLeapYear(datacarencia.getFullYear()) == true && datacarencia.getDate() == '30' && datacarencia.getMonth() == '2'){
            datacarencia.setDate(1);
            datacarencia.setMonth(datacobranca.getMonth() + 1);
        }
        datareajuste.setMonth(datacobranca.getMonth() + 11);
        if(checkLeapYear(datareajuste.getFullYear()) == false && datareajuste.getDate() == '29' && datareajuste.getMonth() == '2'){
            datareajuste.setDate(1);
            datareajuste.setMonth(datacobranca.getMonth() + 1);
        }else if(datareajuste.getDate() == '30' && datareajuste.getMonth() == '2'){
            datareajuste.setDate(1);
            datareajuste.setMonth(datacobranca.getMonth() + 1);
        }
        console.log(input.value);
        console.log(datacobranca.getFullYear() + '-' + datacobranca.getMonth() + '-' + datacobranca.getDate());
        console.log(datacarencia.getFullYear() + '-' + datacarencia.getMonth() + '-' + datacarencia.getDate());
        console.log(datareajuste.getFullYear() + '-' + datareajuste.getMonth() + '-' + datareajuste.getDate());
        document.getElementById('datacarencialote').value = datacarencia.getFullYear() + '-' + ('00' + datacarencia.getMonth()).slice(-2) + '-' + ('00' + datacarencia.getDate()).slice(-2);
        document.getElementById('datareajustelote').value = datareajuste.getFullYear() + '-' + ('00' + datareajuste.getMonth()).slice(-2) + '-' + ('00' + datareajuste.getDate()).slice(-2);
        console.log();
    }

    function checkLeapYear(year) {
        return new Date(year, 1, 29).getMonth() == 1
    }

    function pesquisarnomevendedor(input) {
        // console.log(input.id);
        var nome = $('#' + input.id).val();
        var nomes = [];
        if (nome.length >= 2) {
        $.ajax({
            type: 'GET',
            url: '../consulta/agenda/nomevendedor',
            data: {
            nomepessoa: nome
            },
            dataType: "json",
            success: function(data) {
                // console.log(data);
                for (i = 0; i < data.length; i++) {
                    nomes.push(data[i]);
                }
                nomes = nomes.filter((este, i) => nomes.indexOf(este) === i);
                $("#" + input.id).autocomplete({
                    source: nomes,
                });
                }

            });
        }
    }

    function procurardadoslote(input){
        console.log(input.value);
        var quantidade = 0;

        for (var i = 0; i < input.value.length; i++) {
            if (input.value[i] == '-') {
                quantidade++;
            }
        }
        if(quantidade >= 3){
            $.ajax({
                type: "GET",
                url: "dadoslote",
                data: {
                    contrato: document.getElementById('resplote').value.split(' - ')[2],
                },
                dataType: "json",
                success: function(data) {
                    document.getElementById('diapaglote').value = data[0];
                    document.getElementById('valorlote').value = parseFloat(data[1]);
                    console.log(data[1]);
                }
            });
        }
    }

    function abrirnovacobranca(){
        $('#novacobrancaModal').modal('show');
    }
    function novacobrancaavulsa(){
        $('#novacobrancaavulsaModal').modal('show');
        $('#novacobrancaModal').modal('hide');
        
    }
    function novacobrancalote(){
        $('#novacobrancaloteModal').modal('show');
        $('#novacobrancaModal').modal('hide');
    }

    function gerarboletoindividual(input){
        window.open(window.location.href.substring(0, window.location.href.length - 8) + 'gerarboletoavulso?cobrancaatual=' + input.id);
    }

    function gerarboletoslote(input){
        // window.location.href.substring(0, window.location.href.length - 8) + 'gerarboletolote?cobrancaatual=' + input.id
        window.open(window.location.href.substring(0, window.location.href.length - 8) + 'gerarboletolote?cobrancaatual=' + input.id);
    }

    function gerarremessalote(input){
        // window.location.href.substring(0, window.location.href.length - 8) + 'gerarremessalote?cobrancaatual=' + input.id
        window.open(window.location.href.substring(0, window.location.href.length - 8) + 'gerarremessalote?cobrancaatual=' + input.id);
    }

    function gerarremessaindividual(input){
        // window.location.href.substring(0, window.location.href.length - 8) + 'gerarremessaavulsa?cobrancaatual=' + input.id
        window.open(window.location.href.substring(0, window.location.href.length - 8) + 'gerarremessaavulsa?cobrancaatual=' + input.id);
    }

    function gerarremessaavulsa(){
        // window.location.href.substring(0, window.location.href.length - 8) + 'gerarremessaavulsa?cobrancaatual=' + input.id
        window.open(window.location.href.substring(0, window.location.href.length - 8) + 'gerarremessaavulsa?cobrancaatual=' + cobrancaatual);
    }

    function criarcobrancaavulsa(){
        $.ajax({
        type: "GET",
        url: "criarcobrancaavulsa",
        data: {
          respavulsa: document.getElementById('respavulsa').value,
          dataavulsa: document.getElementById('dataavulsa').value ,
          cidadesavulsa: document.getElementById('cidadesavulsa').value,
          valoravulsa: document.getElementById('valoravulsa').value,
          validadoavulsa: document.getElementById('validadoavulsa').checked,
          fechadoavulsa: document.getElementById('fechadoavulsa').checked,
          cobrador: {{Auth::user()->id}},
        },
        dataType: "json",
        success: function(data) {
          cobrancaatual = data;
          $('#novacobrancaavulsagerarModal').modal('show');
          $('#novacobrancaavulsaModal').modal('hide');
        }
      });
    }

    function criarcobrancalote(){
        $.ajax({
        type: "GET",
        url: "criarcobrancalote",
        data: {
          respavulsa: document.getElementById('respavulsa').value,
          dataavulsa: document.getElementById('dataavulsa').value ,
          cidadesavulsa: document.getElementById('cidadesavulsa').value,
          valoravulsa: document.getElementById('valoravulsa').value,
          validadoavulsa: document.getElementById('validadoavulsa').checked,
          fechadoavulsa: document.getElementById('fechadoavulsa').checked,
          cobrador: {{Auth::user()->id}},
        },
        dataType: "json",
        success: function(data) {
          cobrancaatual = data;
          $('#novacobrancaavulsagerarModal').modal('show');
          $('#novacobrancaavulsaModal').modal('hide');
        }
      });
    }

    function processarRetorno(){
        var fd = new FormData(document.getElementById('formteste'));
        fd.append('file', $('#retornotxt'));
        $.ajax({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
           url: "retorno/processar",
           type: "POST",
           data: fd,
           contentType: false,
           cache: false,
           processData: false,
           success: function(retorno){
               console.log(retorno);
               apagartabelarelatorio();
               for(i=0; i<retorno[0].length; i++){
                    var tabela = document.getElementById('relatorioretornotbody');
                    var numeroLinhas = tabela.rows.length;
                    var linha = tabela.insertRow(numeroLinhas);
                    var celula1 = linha.insertCell(0);
                    var celula2 = linha.insertCell(1);   
                    var celula3 = linha.insertCell(2); 
                    var celula4 = linha.insertCell(3);
                    var celula5 = linha.insertCell(4);
                    celula1.innerHTML=retorno[0][i];
                    celula2.innerHTML=retorno[1][i];
                    celula3.innerHTML=retorno[2][i];
                    celula4.innerHTML=retorno[3][i].split('-')[2] + '/' + ('00' + (retorno[3][i].split('-')[1] - 1)).slice('-2') + '/' + retorno[3][i].split('-')[0];
                    celula5.innerHTML=retorno[4][i];
                }
                $('#relatorioretornoModal').modal('show');
              }
        });
    }

    function receberPagamento(cobranca){
        pagamentoatual = cobranca.id;
        var indice = idcobrancalote.indexOf(parseInt(cobranca.id));
        valorpagamentoatual = valorcobrancalote[indice];
        calcularValorPagamento();
        $('#pagamentoModal').modal('show');

    }

    function adicionaLinhaPagamento() {
        var tabela = document.getElementById('pagamentotbody');
        var numeroLinhas = tabela.rows.length;
        var linha = tabela.insertRow(numeroLinhas);
        var celula1 = linha.insertCell(0);
        var celula2 = linha.insertCell(1);
        var celula3 = linha.insertCell(2);
        var celula4 = linha.insertCell(3);
        var celula5 = linha.insertCell(4);
        var celula6 = linha.insertCell(5);
        celula1.innerHTML = "<select name='metodopagamentopagamento" + (numeroLinhas + 1) + "' id='metodopagamentopagamento" + (numeroLinhas + 1) + "' class='form-select' onchange='attdadospagamento(this)'><option value='1'>Dinheiro</option><option value='2'>Cartão - Débito</option><option value='3'>Cartão - Crédito</option><option value='4'>Pix</option><option value='5'>Cheque</option><option value='7'>Boleto Bancário</option></select>";
        celula2.innerHTML = "<input type='text' name='valorpagamento" + (numeroLinhas + 1) + "' id='valorpagamento" + (numeroLinhas + 1) + "' onchange='attdadospagamento(this)' class='form-control valorpagamento'>";
        $('#valorpagamento' + (numeroLinhas + 1)).inputmask('decimal', {
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
        celula3.innerHTML = "<input type='number' class='form-control' min='1' max='12' name='parcelapagamento" + (numeroLinhas + 1) + "' id='parcelapagamento" + (numeroLinhas + 1) + "' onchange='attdadospagamento(this)' value='1'>";
        celula4.innerHTML = "<input type='text' class='form-control autopagamento' style='' name='autopagamento" + (numeroLinhas + 1) + "' id='autopagamento" + (numeroLinhas + 1) + "' onchange='attdadospagamento(this)' disabled>";
        celula5.innerHTML = "<input type='text' class='form-control cvpagamento' style='' name='cvpagamento" + (numeroLinhas + 1) + "' id='cvpagamento" + (numeroLinhas + 1) + "' onchange='attdadospagamento(this)' disabled>";
        celula6.innerHTML = "<button type='submit' class='btn btdelete' id='" + (numeroLinhas + 1) + "' value='Excluir' onclick='removeLinhaPagamento(this)'><span class='fontebotao'>Excluir</span></button>";
        pagamentometodo[numeroLinhas] = "1";
        pagamentoparcela[numeroLinhas] = "1";
        pagamentovalor[numeroLinhas] = "0";
        pagamentoauto[numeroLinhas] = "";
        pagamentocv[numeroLinhas] = "";
        document.getElementById('parcelapagamento'+ (numeroLinhas + 1)).disabled= true;
    }

  function attdadospagamento(select) {
    if (select.id[0] == 'm') {
      var idselect = select.id.split('metodopagamentopagamento')[1];
    }else if(select.id[0] == 'p') {
      var idselect = select.id.split('parcelapagamento')[1];
    }else if(select.id[0] == 'a'){
      var idselect = select.id.split('autopagamento')[1];
    }else if(select.id[0] == 'v'){
      var idselect = select.id.split('valorpagamento')[1];
    }else{
      var idselect = select.id.split('cvpagamento')[1];
    }
    if (document.getElementById('metodopagamentopagamento' + idselect).value == 3) {
      document.getElementById('parcelapagamento' + idselect).disabled = false;
      document.getElementById('autopagamento' + idselect).disabled = false;
      document.getElementById('cvpagamento' + idselect).disabled = false;
    } else if(document.getElementById('metodopagamentopagamento' + idselect).value == 2) {
      document.getElementById('parcelapagamento' + idselect).disabled = true;
      document.getElementById('parcelapagamento' + idselect).value = 1;
      document.getElementById('autopagamento' + idselect).disabled = false;
      document.getElementById('cvpagamento' + idselect).disabled = false;
    }else{
      document.getElementById('autopagamento' + idselect).disabled = true;
      document.getElementById('cvpagamento' + idselect).disabled = true;
      document.getElementById('parcelapagamento' + idselect).disabled = true;
      document.getElementById('parcelapagamento' + idselect).value = 1;
      document.getElementById('autopagamento' + idselect).value = null;
      document.getElementById('cvpagamento' + idselect).value = null;
    }
    pagamentometodo[idselect - 1] = document.getElementById('metodopagamentopagamento' + idselect).value;
    pagamentoparcela[idselect - 1] = document.getElementById('parcelapagamento' + idselect).value;
    pagamentovalor[idselect - 1] = document.getElementById('valorpagamento' + idselect).value;
    pagamentoauto[idselect - 1] = document.getElementById('autopagamento' + idselect).value;
    pagamentocv[idselect - 1] = document.getElementById('cvpagamento' + idselect).value;
    // console.log(pagamentometodo, pagamentoparcela, pagamentoauto, pagamentocv);
    calcularValorPagamento();
  }

  function removeLinhaPagamento(linha) {
    var i = linha.parentNode.parentNode.rowIndex;
    console.log(linha, i, linha.id - 1);
    document.getElementById('pagamentotbody').deleteRow(i-1);
    pagamentometodo.splice(linha.id - 1, 1);
    pagamentoparcela.splice(linha.id - 1, 1);
    pagamentovalor.splice(linha.id - 1, 1);
    pagamentoauto.splice(linha.id - 1, 1);
    pagamentocv.splice(linha.id - 1, 1);
    refazerTabelaPagamento();
  }

  function refazerTabelaPagamento() {
    apagarTabelaPagamento();
    console.log(pagamentometodo, pagamentoparcela, pagamentoauto, pagamentocv);
    for(var i = 0; i < pagamentometodo.length; i++){

      var tabela = document.getElementById('pagamentotbody');
      var numeroLinhas = tabela.rows.length;
      var linha = tabela.insertRow(numeroLinhas);
      var celula1 = linha.insertCell(0);
      var celula2 = linha.insertCell(1);
      var celula3 = linha.insertCell(2);
      var celula4 = linha.insertCell(3);
      var celula5 = linha.insertCell(4);
      var celula6 = linha.insertCell(5);
      celula1.innerHTML = "<select name='metodopagamentopagamento" + (numeroLinhas + 1) + "' id='metodopagamentopagamento" + (numeroLinhas + 1) + "' class='form-select' onchange='attdadospagamento(this)'><option value='1'>Dinheiro</option><option value='2'>Cartão - Débito</option><option value='3'>Cartão - Crédito</option><option value='4'>Pix</option><option value='5'>Cheque</option><option value='7'>Boleto Bancário</option></select>";
      celula2.innerHTML = "<input type='text' name='valorpagamento" + (numeroLinhas + 1) + "' id='valorpagamento" + (numeroLinhas + 1) + "' onchange='attdadospagamento(this)' class='form-control valorpagamento'>";
      $('#valorpagamento' + (numeroLinhas + 1)).inputmask('decimal', {
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
      celula3.innerHTML = "<input type='number' class='form-control' min='1' max='12' name='parcelapagamento" + (numeroLinhas + 1) + "' id='parcelapagamento" + (numeroLinhas + 1) + "' onchange='attdadospagamento(this)' value='1'>";
      celula4.innerHTML = "<input type='text' class='form-control autopagamento' name='autopagamento" + (numeroLinhas + 1) + "' id='autopagamento" + (numeroLinhas + 1) + "' onchange='attdadospagamento(this)' disabled>";
      celula5.innerHTML = "<input type='text' class='form-control cvpagamento' style='' name='cvpagamento" + (numeroLinhas + 1) + "' id='cvpagamento" + (numeroLinhas + 1) + "' onchange='attdadospagamento(this)' disabled>";
      celula6.innerHTML = "<button type='submit' class='btn btdelete' id='" + (numeroLinhas + 1) + "' value='Excluir' onclick='removeLinhaPagamento(this)'><span class='fontebotao'>Excluir</span></button>";

      // console.log(i, pagamentometodo[i]);
      document.getElementById('metodopagamentopagamento'+(numeroLinhas + 1)).value = pagamentometodo[i];
      document.getElementById('parcelapagamento'+(numeroLinhas + 1)).value = pagamentoparcela[i];
      document.getElementById('valorpagamento'+(numeroLinhas + 1)).value = pagamentovalor[i];
      document.getElementById('autopagamento'+(numeroLinhas + 1)).value = pagamentoauto[i];
      document.getElementById('cvpagamento'+(numeroLinhas + 1)).value = pagamentocv[i];
    }
  }

    function calcularValorPagamento(){
        valorpagamentosomado = 0;
        for(var i = 0; i < pagamentovalor.length; i++){
            if(pagamentovalor[i] != ''){
                valorpagamentosomado += parseFloat(pagamentovalor[i].toString().replace(",", "."));
            }
        }
        document.getElementById('pagamentovalor').innerHTML='Valor total do pagamento: ' + valorpagamentoatual.toLocaleString('pt-br', {
        style: 'currency',
        currency: 'BRL'
        });
        document.getElementById('pagamentovalor').innerHTML+='Valor total inserido : ' + valorpagamentosomado.toLocaleString('pt-br', {
        style: 'currency',
        currency: 'BRL'
        });
    }

    function apagarTabelaPagamento() {
        var tableHeaderRowCount = 0;
        var table = document.getElementById('pagamentotbody');
        var rowCount = table.rows.length;
        for (var i = tableHeaderRowCount; i < rowCount; i++) {
        table.deleteRow(tableHeaderRowCount);
        }
    }

    function receberPagamentoConfirm(){

        if(valorpagamentosomado != valorpagamentoatual){
            $('#avisoModal').modal('show');
            document.getElementById('avisoerro').innerHTML = 'Os valores do pagamento inseridos não batem com o valor do plano!';
        }else{
            
            $.ajax({
                type: "GET",
                url: "receberpagamentoinadimplente",
                data: {
                    cobrancaatual: pagamentoatual,
                    metodospagamentopagamento: pagamentometodo,
                    parcelapagamento: pagamentoparcela,
                    autopagamento: pagamentoauto,
                    cvpagamento: pagamentocv,
                    pagamentovalor: pagamentovalor,
                },
                dataType: "json",
                success: function(data) {
                    $('#pagamentoModal').modal('hide');
                    console.log('Recebido sucesso!');
                }
            });
        }
    }

</script>
@endsection
</html>