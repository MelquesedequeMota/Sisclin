@extends('layouts.Menu')
@section('atalhoSuperior')@endsection
@section('menuLateral')@endsection

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <!-- Required meta tags -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- css da página  -->
  <link rel="stylesheet" href="{{asset('../css/pdv.css')}}">
  <link rel="stylesheet" href="{{asset('../css/estilo.css')}}">
  <!-- <link rel="stylesheet" href="{{asset('../css/cssgeral.css')}}">
  <link rel="stylesheet" href="{{asset('../css/consultas.css')}}"> -->

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="{{asset('jquery.min.js')}}"></script>
  <script src="{{asset('shortcut.js')}}"></script>
  <script src="{{asset('jquery-ui-1.12.1/jquery-ui.js')}}"></script>
  <script src="{{asset('inputmask/dist/jquery.inputmask.min.js')}}"></script>
  <script src="{{asset('inputmask/dist/bindings/inputmask.binding.js')}}"></script>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
  </script>

  <style>
    .tituloirn{
      font-family: 'IBM Plex Sans';
      font-style: normal;
      font-weight: 400;
      font-size: 20px;
      line-height: 20px;
      letter-spacing: 0.2px;
      color: #000000;
    }

    .divlogoirn{
      display: flex;
      align-items: center;
      justify-content: space-between;
      width: 70%;
      margin: 10px auto;
    }

    .barra{
      margin-right: 1.2rem;
      width: 4px;
      height: 18px;
      background: #1C4779;
      border-radius: 10px;
    }
  
    .f1{
      width: 23rem;
      display: flex;
      align-items: center;
      margin: auto;
    }

    .f1texto{
      font-family: 'Mulish';
      font-style: normal;
      font-weight: 400;
      font-size: 16px;
      line-height: 20px;
      letter-spacing: 0.2px;
      color: #000000;
    }

    .iconspdv{
      margin-left:1rem;
    }

    .novofornecedor{
        display: flex;
        align-items: center;
      }

      .inputscinza{
        /* background-color: #e2e1e1!important; */
        background-color:#e6e6e6!important;
        border:none!important;
        border-radius: 11px !important;
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
    
    .nsei {
      position: relative;
      width: 595px;
      height: 340px;
      /* left: 737px; */
      background: #FFFEFE;
      /* box-shadow: 0px 0px 10px #e5e5e5, 0px 0px 7px rgb(0 0 0 / 10%); */
      filter: drop-shadow(0px 2px 4px rgba(0, 0, 0, 0.25));
      border-radius: 12px;
      padding: 0rem 0.3rem;
    }

    .inputpdvcaixa {
      width: 6rem;
      text-align: center;
    }

    .tableresponsive {
      filter: none !important;
    }

    .theadtabelapreços {
      font-family: 'IBM Plex Mono', monospace;
      font-style: normal;
      font-weight: normal;
      font-size: 13px;
      line-height: 20px;
      color: #000000;
    }

    .tbodytabelapreços {
      font-family: 'Mulish', sans-serif;
      font-style: normal;
      font-weight: normal;
      font-size: 13px;
      line-height: 20px;
      color: #000000;
    }

    .inputtextpdv {
      width: 246px;
      border-radius: 4px;
      height: 35px;
      border: 0.6px solid rgba(0, 0, 0, 0.48);
      border-radius: 6px;
      margin-top: 0.3rem;
      margin-bottom: 0.5rem;
    }

    .fotoproduto {
      width: 406px;
      height: 267px;
      top: 103px;
      background: #FFFEFE;
      /* box-shadow: 0px 0px 10px #E5E5E5, 0px 0px 7px rgba(0, 0, 0, 0.1); */
      /* filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.25)); */
      filter: drop-shadow(0px 1px 4px rgba(0, 0, 0, 0.25));
      border-radius: 12px;
    }

    .spaninputs {
      font-family: 'Mulish', sans-serif;
      font-style: normal;
      font-weight: normal;
      font-size: 16px;
      line-height: 20px;
      letter-spacing: 0.2px;
      color: #000000;
    }

    .deppagdiv {
      width: 100%;
      max-width: 100%;
      margin-top: 3rem;
      margin-bottom:1.5rem;
    }

    .inputtextsmall {
      width: 5rem;
    }

    #totalapagardiv {
      width: 261px;
      margin-top: 2.3rem;
      height: 135px;
      left: 771px;
      border: 1px solid #858C94;
      box-sizing: border-box;
      border-radius: 12px;
      padding: 0.5rem;
      margin-bottom: 0.9rem;
    }

    #trocodiv {
      width: 291px;
      height: 105px;
      left: 1054px;
      top: 581px;
      border: 1px solid #858C94;
      box-sizing: border-box;
      filter: drop-shadow(0px 0px 7px rgba(0, 0, 0, 0.1));
      border-radius: 6px;
      padding: 0.5rem;
    }

    fieldset.scheduler-border {
      border: 1px solid #858C94 !important;
      padding: 0em 1em 1em 1em !important;
      margin: 0 0 0.8em 0 !important;
      -webkit-box-shadow: 0px 0px 0px 0px #000;
      box-shadow: 0px 0px 0px 0px #000;
      border-radius: 6px;
    }

    legend.scheduler-border {
      font-size: 1.3em !important;
      text-align: left !important;
      width: auto;
      padding: 0 10px;
      border-bottom: none;
      margin-top: -15px;
      background-color: white;

      font-family: 'Mulish', sans-serif;
      font-style: normal;
      font-weight: normal;
      color: #000000;
    }

    #pagoinput {
      width: 100%;
      height: 100%;
      border: none;
      /* font-size: 22px; */
    }

    .container {
      width: 30rem;
      padding-left: 0rem !important;
    }

    #pagoinput:focus {
      box-shadow: 0 0 0 0;
      border: 0 none;
      outline: 0;
    }

    /* .btmenor{
            padding: 0.10rem 0.2rem !important;
        } */

    .totalapagar {
      font-family: 'Mulish', sans-serif;
      font-style: normal;
      font-weight: normal;
      font-size: 22px;
      line-height: 20px;
      letter-spacing: 0.2px;
      color: #000000;
      text-align: center;
    }

    #caixaatual {
      margin-top: -0.5rem;
      margin-bottom: 0.9rem;
    }

    .textotroco {
      font-family: 'Mulish', sans-serif;
      font-style: normal;
      font-weight: normal;
      font-size: 22px;
      line-height: 20px;
      letter-spacing: 0.2px;
      color: #000000;
      text-align: center;
    }

    .fontblack {
      color: black !important;
    }

    .bordaverde {
      border: 1px solid #0e6969;
    }

    .bordaamarela {
      border: 1px solid #41464b;
    }

    .inputvalorpago::-webkit-input-placeholder {
      /* Edge */
      color: black;
    }

    .inputvalorpago:-ms-input-placeholder {
      /* Internet Explorer 10-11 */
      color: black;
    }

    .inputvalorpago::placeholder {
      color: black;
    }

    #valortotaldiv {
      font-family: "Source Sans Pro", sans-serif;
      font-style: normal;
      font-weight: normal;
      font-size: 35px;
      line-height: 20px;
      letter-spacing: 0.2px;
      color: #000000;
      margin-top: 2.9rem;
      text-align: center;
    }

    #valortroco {
      font-family: "Source Sans Pro", sans-serif;
      font-style: normal;
      font-weight: normal;
      font-size: 31px;
      line-height: 20px;
      letter-spacing: 0.2px;
      color: #000000;
      text-align: center;
      margin-top: 1.8rem;
    }

    .form-select {
      padding: .375rem 2.25rem .375rem .75rem !important;
    }

    .btn-add {
      font-family: 'Roboto', sans-serif;
      font-style: normal;
      font-weight: 500;
      font-size: 15px;
      line-height: 18px;
      color: #1B7804;

      width: 90px;
      height: 38px;
      border: 1.5px solid #2F980B;
      box-sizing: border-box;
      border-radius: 5px;
    }

    .btn-del {
      font-family: 'Roboto', sans-serif;
      font-style: normal;
      font-weight: 500;
      font-size: 15px;
      line-height: 18px;
      color: #D01E1E;

      width: 81px;
      height: 38px;
      border: 1.5px solid #EA1717;
      box-sizing: border-box;
      border-radius: 5px;
    }

    .totalerestante {
      font-family: 'Roboto', sans-serif;
      font-style: normal;
      font-weight: normal;
      font-size: 16px;
      line-height: 18px;
      color: #000000;

      /* justify-content: space-between;
      width: 15rem;
      margin-bottom: 0.8rem; */
    }

    .avisoresp{
      display:none;
    }

    @media (max-width: 960px) {
      .tudo {
        display:none;
      }

      .avisoresp{
        display:block;
      }
    }
  </style>
</head>

<body>
  @section('Conteudo')
  <div class='avisoresp'>
    PDV NÃO FUNCIONA NO CELULAR OU TABLET, POR RAZÕES DE SEGURANÇA!
  </div>
  <div class='tudo'>
    <div id='avisocaixas'></div>

    <div id='caixas' style="none">
      <button type="submit" class="btn btamarelo" onclick='novocaixa()'>
        <span class="selectacoes">Abrir novo caixa</span>
      </button>
      <br><br>
      <input type='checkbox' id='verescondidos' name='verescondidos' onclick='pesquisarcaixas()'>
      <div id='tabela' class="table-responsive-sm">
        <table id='' class="table">
          <thead class="table-active">
            <tr>
              <td scope="col">Nome</td>
              <td scope="col">Aberto em</td>
              <td scope="col">Fechado em</td>
              <td scope="col">Valor</td>
              <td scope="col">Status</td>
              <td scope="col">Ações</td>
            </tr>
          </thead>
          <tbody id='caixastable'>

          </tbody>
        </table>
      </div>
    </div>

    
      <div class='transformdiv transformresponsive'>
        <div class='input coluna' style='max-width:53%'>
          <div class='transformdiv'>
            <div class='input coluna'>
              <div id='caixaatual' class=''></div>
              <!-- <div id='fotodiv' class='fotoproduto'>
                <div class='divlogoirn'>
                  <img src="imagens/logoirnpdv.png" alt="" style='width:4.5rem;margin-left:-1.3rem'>
                  <span class='tituloirn'>Instituto Raimundo Nobre</span>
                </div>
                <div class='f1' style='margin-top: 5rem;'>
                  <div class='barra'></div>
                  <span class='f1texto'>F1 - Adicionar Produto</span>
                  <img src="imagens/carrinhopdv.svg" alt="" class='iconspdv'>
                </div>
                <div class='f1' style='margin-top: 2rem;'>
                  <div class='barra' style='background: #C68311;'></div>
                  <span class='f1texto'>F2 - Nova Entrada</span>
                  <img src="imagens/novaentrada.svg" alt="" style='margin-left: 4.4rem;'>
                </div>
                <div class='f1' style='margin-top: 2rem;'>
                  <div class='barra' style='background: #DC1C26;'></div>
                  <span class='f1texto'>F3 - Nova Saída</span>
                  <img src="imagens/novasaida.svg" alt="" style='margin-left: 6rem;'>
                </div>
              </div> -->

              <div class="container-fluid">
                <div id='dadosgerais' class="table-responsive-sm" style='filter: none!important;'>
                  
                </div>
              </div>
            </div>
            {{-- <div style='margin-left: 2rem;margin-right: 1rem;margin-top: 3.6rem;'>
              <span class='spaninputs'>Código do Produto</span><br>
              <input type='text' name='codigoprodutoinput' id='codigoprodutoinput' class='inputtextpdv'><br>
              <span class='spaninputs'>Quantidade</span><br>
              <input type='text' name='quantidadeinput' id='quantidadeinput' class='inputtextpdv'><br>
              <span class='spaninputs'>Valor Unitário</span><br>
              <input type='text' name='valorunitinput' id='valorunitinput' class='inputtextpdv'><br>
              <span class='spaninputs'>Valor Total</span><br>
              <input type='text' name='valortotalinput' id='valortotalinput' class='inputtextpdv'><br>
            </div> --}}
          </div>
          <div id='deppagdiv' class='deppagdiv'>
            <div id='tabela' class="table-responsive-sm">
              <table id='' class="table">
                <thead class="table-active">
                  <tr>
                    <td scope="col">
                      Contrato
                    </td>
                    <td scope="col">
                      Cliente
                    </td>
                    <td scope="col">
                      Dt. do Serviço
                    </td>
                    <!-- <td scope="col">Serviço</td> -->
                    <td scope="col">
                      Médico
                    </td>
                    <td scope="col">Ações</td>
                  </tr>
                </thead>
                <tbody id='deppagtable'>

                </tbody>
              </table>
            </div>
          </div>
          <input type="text" class="form-control" name='pesquisanomeadesao' id='pesquisanomeadesao' placeholder='Digite o nome ou cpf da pessoa' autocomplete='off' onkeyup='filtraradesoes(this)'/>
          <div id='adesaodiv' class='adesaodiv'>
            <div id='tabela' class="table-responsive-sm">
              <table id='' class="table">
                <thead class="table-active">
                  <tr>
                    <td scope="col">
                      Pessoa
                    </td>
                    <td scope="col">
                      Descrição
                    </td>
                    <td scope="col">
                      Data
                    </td>
                    <td scope="col">
                      Valor
                    </td>
                    <td scope="col">
                      Pagamento
                    </td>
                    <!-- <td scope="col">Serviço</td> -->
                    <td scope="col">Ações</td>
                  </tr>
                </thead>
                <tbody id='adesaotable'>

                </tbody>
              </table>
            </div>
          </div>
        </div>

        <div class='input coluna'>
          <div class='nsei' style='display: block;overflow-y: auto;height: 36rem;'>
            <div id='carrinhodiv'>
              <div id='tabela' class="table-responsive tableresponsive" style='width:100%!important'>
                <table id='' class="table">
                  <thead class="theadtabelapreços">
                    <tr>
                      <td scope="col">Seq.</td>
                      <td scope="col">Cód.</td>
                      <td scope="col">Produto</td>
                      <td scope="col">Qtd.</td>
                      <td scope="col">Unidade</td>
                      <td scope="col">Total</td>
                      <td scope="col">Incluso</td>
                      <td scope="col">Excluir</td>
                    </tr>
                  </thead>
                  <tbody id='carrinhotable' class='tbodytabelapreços'>

                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class='transformdiv'>
            <div class='input coluna'>
              <div id='totalapagardiv'>
                <div class='totalapagar'>
                  Total a pagar
                </div>
                <div id='valortotaldiv'>

                </div>
              </div>
              <button type="submit" name='concluircompra' id='concluircompra' class="btn btadicionar" value='Concluir Compra' onclick='metodospagamentomodal()' style='display:none;width: 100%;border-radius: 6px;'>
                <span class="fontebotao">Finalizar Compra</span>
              </button>
            </div>
            <div class='coluna' style='margin-top:2.3rem;margin-left:0.5rem'>
              <div id='pagodiv'>
                <div class="container">
                  <fieldset class="scheduler-border">
                    <legend class="scheduler-border">Pago</legend>
                    <input type='text' placeholder='Digite o valor entregue pelo cliente' name='pagoinput' id='pagoinput' class='inputvalorpago' onfocusout='calculartroco()'>
                  </fieldset>
                </div>
              </div>
              <div id='trocodiv'>
                <div class='textotroco'>
                  Troco
                </div>
                <div id='valortroco'>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    <div id='pdv'></div>

    <!-- Modal -->
    <div class="modal fade" id="CancelarModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="CancelarModalLabel">Cancelar Produto</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div id='cancelarinputdiv'>
              <span class='nomesinputs' style='letter-spacing: 0.2px!important;'>Digite a senha para efetuar o
                cancelamento</span><br>
              <input type="password" class='inputstexttelas' name='cancelarinput' id='cancelarinput' placeholder="Digite a senha">
            </div>
          </div>
          <div class="modal-footer">
            <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
            <button type="button" class="btn btn-primary" value='Cancelar' onclick='verificarcancelar()'>Cancelar Produto</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="excluirpdvModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="CancelarModalLabel">Excluir Compra</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            Deseja cancelar essa compra?
          </div>
          <div class="modal-footer">
            <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
            <button type="button" class="btn btn-primary" value='Cancelar Compra' onclick='excluirpdv1()'>Cancelar Compra</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="ProcurarModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="ProcurarModalLabel">Consultar Produto</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

          <div class="modal-body">
            <div class='transformdiv' id='procurarinputdiv'>
              <div>
                <span class='nomesinputs'>Nome</span><br>
                <input type="text" name='procurarnomeinput' id='procurarnomeinput' class='inputstexttelas' placeholder="Digite o nome do produto">
              </div>
              &nbsp;&nbsp;&nbsp;
              <div>
                <span class='nomesinputs'>Tipo</span><br>
                <div class='transformdiv'>
                  <select id="procurarselectinput" name='procurarselectinput' class='form-select'>
                    <option value='Todos'>Todos</option>
                    <option value='Item'>Produto</option>
                    <option value='Servico'>Serviço</option>
                  </select>
                  &nbsp;&nbsp;&nbsp;
                  <button type="submit" class="btn btamarelo" value='Pesquisar' onclick='procurarproduto()'>
                    <span class="fontebotao">Pesquisar</span>
                  </button>
                </div>
              </div>
            </div>
            <br><br>

            <div id='procurartabeladiv'>
              <div id='tabela' class="table-responsive-sm">
                <table id='' class="table">
                  <thead class="table-active">
                    <tr>
                      <td scope="col">Cod.</td>
                      <td scope="col">Nome</td>
                      <td scope="col">Categoria</td>
                      <td scope="col">Tipo</td>
                      <td scope="col">Quant.</td>
                      <td scope="col">Vl. Unit.</td>
                      <td scope="col">Total</td>
                      <td scope="col">Incluso</td>
                      <td scope="col">Ações</td>
                    </tr>
                  </thead>
                  <tbody id='procurartabelatable'>

                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
            <button type="button" class="btn btn-primary" onclick='fecharconsulta()'>Cancelar</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="pagamentoConcluidoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="pagamentoConcluidoModalLabel">Pagamento concluído com Sucesso!</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            Pagamento Concluído com Sucesso!
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="metodopagModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Método de Pagamento</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class=''>
              <div style='display: flex;justify-content: center;width: 100%;margin-bottom: 1.5rem;'>
                <div style='width:57%;'>
                  <div class="row gx-3 gy-3 totalerestante" style='margin-bottom: 0.7rem;'>
                    <div class="col-sm-4 col-md-4 col-lg-4">
                      <div>Valor total</div>
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-4">
                      <div>
                        <div>. . . . . . . . . . </div>
                      </div>
                    </div>
                    <div class="col-sm-3 col-md-3 col-lg-3">
                      <div>
                        <div id='valortotalmodal'></div>
                      </div>
                    </div>
                  </div>

                  <div class="row gx-3 gy-3 totalerestante" style=''>
                    <div class="col-sm-4 col-md-4 col-lg-4">
                      <div>Restante</div>
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-4">
                      <div>
                        <div>. . . . . . . . . . </div>
                      </div>
                    </div>
                    <div class="col-sm-3 col-md-3 col-lg-3">
                      <div>
                        <div id='valorrestantemodal'></div>
                      </div>
                    </div>
                  </div>
                </div>

                <div>
                  <button type="button" class="btn btn-add" onclick='novometodopag()'>
                    <span>Adicionar</span>
                  </button>
                  &nbsp;&nbsp;
                  <button type="button" class="btn btn-del" onclick='excluirmetodopag()'>
                    <span>Excluir</span>
                  </button>
                </div>
              </div>

              <div id='errometodopag'></div>
              <div id='semmetodopag' style='text-align:center;margin-top:0.8rem'>Adicione um método de Pagamento!</div>

              <div id='metodopagtablediv' class="table-responsive-sm" style='margin:auto;filter:none!important;'>
                <table id='metodopagtable' class="table">
                  <thead class="table-active">
                    <tr>
                      <td scope="col"><input type='checkbox' disabled></td>
                      <td scope="col">Método de Pagamento</td>
                      <td scope="col">Quant. de Parcelas</td>
                      <td scope="col">Valor do Pagamento</td>
                      <td scope="col">Auto</td>
                      <td scope="col">CV</td>
                    </tr>
                  </thead>
                  <tbody id='metodopagtablebody'>
                  </tbody>
                </table>
              </div>

            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" id='concluircomprabutton' onclick='concluircompra()' disabled>Concluir Transação</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="novocaixaModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="novocaixaModalLabel">Abrir Novo Caixa</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            Valor inicial do caixa: <input type="text" name='valorinicialinput' id='valorinicialinput' class='inputstexttelas'>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" onclick='abrirnovocaixa()'>Abrir Caixa</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
          </div>
        </div>
      </div>
    </div>

  </div>

  <div class="modal fade" id="novaEntradaModal" tabindex="-1" aria-labelledby="novaEntradaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="novaEntradaModalLabel">Nova Entrada</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>                                           
        <div class="modal-body ui-front">
          <label for="datainicio" class="form-label">Data Competência</label>
          <input type="date" class="form-control bordainputs inputscinza" id='datacompetenciaentrada'/>
          <label for="exampleInputEmail1" class="form-label">Motivo da Entrada</label>
          <textarea class="form-control inputscinza" id="motivoentrada" rows="4" style='width: 22rem;max-width:100%;width: 100%;height: 8rem;'></textarea>
          <label for='exampleInputEmail1' class='form-label'>Pagador</label>
          <input type='text' name='pagadorentrada' id='pagadorentrada' class='form-control uldoinput inputscinza' onkeypress='pesquisarnome(this)'>
          <div class="row gx-3 gy-3">
            <div class="col-lg-6" id='valor'>
              <div class="">
                <label for="valorentrada" class="form-label">Valor da Entrada</label>
                <input
                type="text"
                class="form-control inputscinza"
                name='valor' 
                id='valorentrada'
                value='0.00'/>
              </div>
            </div>
            <div class="col-lg-6">
              <label for="metodopagentrada" class="form-label">Forma de Pagamento</label>
              <select name='metodopagentrada' id='metodopagentrada' class='form-select inputscinza' onchange='attmetodoentrada(this)'>
                <option value='1'>Dinheiro</option>
                <option value='2'>Cartão - Débito</option>
                <option value='3'>Cartão - Crédito</option>
                <option value='4'>Pix</option>
                <option value='5'>Cheque</option>
                <option value='6'>Boleto Bancário</option>
              </select>
            </div>
          </div>
          <div class="row gx-3 gy-3">
            <div class="col-lg-6">
              <label for="exampleInputEmail1" class="form-label">Auto</label>
              <input type='text' class='form-control inputscinza' style='' name='autoentrada' id='autoentrada' disabled>
            </div>
            <div class="col-lg-6">
              <label for="exampleInputEmail1" class="form-label">CV</label>
              <input type='text' class='form-control inputscinza' style='' name='cventrada' id='cventrada' disabled>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" data-bs-dismiss="modal" onclick='cadastrarnovaentrada()'>Confirmar Entrada</button>
          <!-- <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancelar</button> -->
        </div>
      </div>
    </div>
  </div>



<div class="modal fade" id="novaSaidaModal" tabindex="-1" aria-labelledby="novaSaidaModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="novaSaidaModalLabel">Nova Saída</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body ui-front">
        <label for="datainicio" class="form-label">Data Competência</label>
        <input type="date" class="form-control bordainputs inputscinza" id='datacompetenciasaida'/>
        <label for="exampleInputEmail1" class="form-label">Motivo da Saída</label>
        <textarea class="form-control inputscinza" id="motivosaida" rows="4" style='width: 22rem;margin-bottom: 1.5rem;max-width:100%;width: 100%;height: 8rem;'></textarea>
        <div class="row gx-3 gy-3">
          <div class="col-lg-2">
          <label for='exampleInputEmail1' class='form-label'>Pagador</label>
          </div>
          <div class="col-lg-4">
            <button type="button" class="btn btn-secondary novofornecedor" data-bs-dismiss="modal" onclick='novofornecedorfisico()' style='color:darkslategray;border-radius:6px!important;background: none;'>
            <!-- <img src="../imagens/plus2.svg" alt="" style='margin-right: 0.5rem;'> -->
            <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg" style='margin-right: 0.5rem;'>
                <circle cx="8.5" cy="8.5" r="8" stroke="darkslategray"/>
                <rect x="8.07422" y="3.40088" width="1.0795" height="10.2" rx="0.53975" fill="darkslategray"/>
                <path d="M3.93164 9.35059C3.63824 9.35059 3.40039 9.11274 3.40039 8.81934V8.81934C3.40039 8.52593 3.63824 8.28809 3.93164 8.28809H13.0691C13.3625 8.28809 13.6004 8.52593 13.6004 8.81934V8.81934C13.6004 9.11274 13.3625 9.35059 13.0691 9.35059H3.93164Z" fill="darkslategray"/>
            </svg>
            Fornecedor Físico
            </button>
            </div>
            <div class="col-lg-5">
            <button type="button" class="btn btn-secondary novofornecedor" data-bs-dismiss="modal" onclick='novofornecedorjuridico()' style='color:darkslategray;border-radius:6px!important;background: none;'>
            <!-- <img src="../imagens/plus2.svg" alt="" style='margin-right: 0.5rem;'> -->
            <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg" style='margin-right: 0.5rem;'>
                <circle cx="8.5" cy="8.5" r="8" stroke="darkslategray"/>
                <rect x="8.07422" y="3.40088" width="1.0795" height="10.2" rx="0.53975" fill="darkslategray"/>
                <path d="M3.93164 9.35059C3.63824 9.35059 3.40039 9.11274 3.40039 8.81934V8.81934C3.40039 8.52593 3.63824 8.28809 3.93164 8.28809H13.0691C13.3625 8.28809 13.6004 8.52593 13.6004 8.81934V8.81934C13.6004 9.11274 13.3625 9.35059 13.0691 9.35059H3.93164Z" fill="darkslategray"/>
            </svg>
            Fornecedor Jurídico
            </button>
            </div>
          </div>

          <input type='text' name='pagadorsaida' id='pagadorsaida' class='form-control uldoinput inputscinza' onkeypress='pesquisarnomefornecedores(this)'>

          <div class="row gx-3 gy-3">
            <div class="col-lg-6" id='valor'>
              <div class="">
                <label for="valorsaida" class="form-label">Valor da Saida</label>
                <input
                type="text"
                class="form-control inputscinza"
                name='valor' 
                id='valorsaida'
                value='0.00'/>
              </div>
            </div>
            <div class="col-lg-6">
              <label for="metodopagsaida" class="form-label">Forma de Pagamento</label>
              <select name='metodopagsaida' id='metodopagsaida' class='form-select inputscinza' onchange='attmetodosaida(this)'>
                  <option value='1'>Dinheiro</option>
                  <option value='2'>Pix</option>
                  <!-- <option value='3'>Cartão - Crédito</option>
                  <option value='4'>Cartão - Débito</option>
                  <option value='5'>Cheque</option>
                  <option value='6'>Boleto Bancário</option> -->
              </select>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-bs-dismiss="modal" onclick='cadastrarnovasaida()'>Confirmar Saida</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="novoFornecedorFisicoModal" tabindex="-1" aria-labelledby="novoFornecedorFisicoModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="novoFornecedorFisicoModalLabel">Novo Fornecedor Físico</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body ui-front">
          <div class="col-sm-5 col-md-4 col-lg-4" id='nome'>
            <div class="cor01">
                <label for="exampleInputEmail1" class="form-label">Nome<span style="color: red;">*</span></label>
                <input
                type="text"
                class="form-control"
                aria-describedby="emailHelp"
                name='nomefornecedorfisico'
                id='nomefornecedorfisico'/>
            </div>
          </div>
          <div class="col-sm-3 col-md-2 col-lg-2">
              <div class="cor01" id='cpf'>
                  <label for="exampleInputEmail1" class="form-label">CPF<span style="color: red;">*</span></label>
                  <input
                  type="text"
                  class="form-control"
                  aria-describedby="emailHelp"
                  name='cpffornecedorfisico' 
                  id='cpffornecedorfisico' 
                  onfocusout='checarcpf()'
                  data-inputmask="'mask': '999.999.999-99'"/>
              </div>
          </div>
          <div class="col-sm-3 col-md-2 col-lg-2" id='estadocivil'>
            <div class="cor01">
                <label for="exampleInputEmail1" class="form-label"
                >Estado Civil<span style="color: red;">*</span></label
                >
                <select class="form-select" name="estadocivilfornecedorfisico" id='estadocivilfornecedorfisico'>
                    <option value="solt">Solteiro</option>
                    <option value="cas">Casado</option>
                    <option value="outro">Outro</option>
                    <option value="n">Não Informado</option>
                </select>
            </div>
          </div>
          <div class="col-sm-3 col-md-2 col-lg-2" id='sexo'>
              <div class="cor01">
                  <label for="exampleInputEmail1" class="form-label">Sexo<span style="color: red;">*</span></label>
                  <select class="form-select" name="sexofornecedorfisico" id="sexofornecedorfisico">
                      <option value="M">Masculino</option>
                      <option value="F">Feminino</option>
                      <option value="N">Não Declarado</option>
                  </select>
              </div>
          </div>
          <div class="col-sm-2 col-md-2 col-lg-2" id='uf'>
            <div class="cor04">
                <label for="exampleInputEmail1" class="form-label">UF<span style="color: red;">*</span></label>
                <select class="form-select selectcategoria" name="uffornecedorfisico" id='uffornecedorfisico'>
                    <option value='AC'>AC</option>
                    <option value='AL'>AL</option>
                    <option value='AP'>AP</option>
                    <option value='AM'>AM</option>
                    <option value='BA'>BA</option>
                    <option value='CE'>CE</option>
                    <option value='DF'>DF</option>
                    <option value='ES'>ES</option>
                    <option value='GO'>GO</option>
                    <option value='MA'>MA</option>
                    <option value='MT'>MT</option>
                    <option value='MS'>MS</option>
                    <option value='MG'>MG</option>
                    <option value='PA'>PA</option>
                    <option value='PB'>PB</option>
                    <option value='PR'>PR</option>
                    <option value='PE'>PE</option>
                    <option value='PI'>PI</option>
                    <option value='RJ'>RJ</option>
                    <option value='RN'>RN</option>
                    <option value='RS'>RS</option>
                    <option value='RO'>RO</option>
                    <option value='RR'>RR</option>
                    <option value='SC'>SC</option>
                    <option value='SP'>SP</option>
                    <option value='SE'>SE</option>
                    <option value='TO'>TO</option>
                </select>
            </div>
          </div>
            <div class="col-sm-3 col-md-2 col-lg-2" id='datanasc'>
              <div class="cor01">
                  <label for="exampleInputEmail1" class="form-label"
                  >Data de Nasc.<span style="color: red;">*</span></label
                  >
                  <input type='date' class="form-control" name='datanascfornecedorfisico' id='datanascfornecedorfisico'>
              </div>
            </div>
            <div class="col-sm-3 col-md-2 col-lg-2" id='tel1'>
              <div class="cor03">
                  <label for="exampleInputEmail1" class="form-label"
                  >Telefone 1<span style="color: red;">*</span></label
                  >
                  <input
                  type="text"
                  class="form-control"
                  aria-describedby="emailHelp"
                  name='telfornecedorfisico' 
                  id='telfornecedorfisico'
                  />
              </div>
          </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick='cadastrarfornecedorfisico()'>Cadastrar Fornecedor Físico</button>
            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancelar</button>
        </div>
    </div>
</div>
</div>

<div class="modal fade" id="novoFornecedorJuridicoModal" tabindex="-1" aria-labelledby="novoFornecedorJuridicoModalLabel" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title" id="novoFornecedorJuridicoModalLabel">Novo Fornecedor Jurídico</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body ui-front">
        <div class="col-sm-5 col-md-4 col-lg-4" id='nome'>
                      <div class="cor01">
                          <label for="exampleInputEmail1" class="form-label">Nome<span style="color: red;">*</span></label>
                          <input
                          type="text"
                          class="form-control"
                          aria-describedby="emailHelp"
                          name='nomefornecedorjuridico'
                          id='nomefornecedorjuridico'/>
                      </div>
                    </div>
                    <div class="col-sm-3 col-md-2 col-lg-2">
                        <div class="cor01" id='cpf'>
                            <label for="exampleInputEmail1" class="form-label">CNPJ<span style="color: red;">*</span></label>
                            <input
                            type="text"
                            class="form-control"
                            aria-describedby="emailHelp"
                            name='cnpjfornecedorjuridico' 
                            id='cnpjfornecedorjuridico' 
                            onfocusout='checarcnpj()'
                            data-inputmask="'mask': '99.999.999/9999-99'"/>
                        </div>
                    </div>
                    <div class="col-sm-2 col-md-2 col-lg-2" id='uf'>
                      <div class="cor04">
                          <label for="exampleInputEmail1" class="form-label">UF<span style="color: red;">*</span></label>
                          <select class="form-select selectcategoria" name="uffornecedorjuridico" id='uffornecedorjuridico'>
                              <option value='AC'>AC</option>
                              <option value='AL'>AL</option>
                              <option value='AP'>AP</option>
                              <option value='AM'>AM</option>
                              <option value='BA'>BA</option>
                              <option value='CE'>CE</option>
                              <option value='DF'>DF</option>
                              <option value='ES'>ES</option>
                              <option value='GO'>GO</option>
                              <option value='MA'>MA</option>
                              <option value='MT'>MT</option>
                              <option value='MS'>MS</option>
                              <option value='MG'>MG</option>
                              <option value='PA'>PA</option>
                              <option value='PB'>PB</option>
                              <option value='PR'>PR</option>
                              <option value='PE'>PE</option>
                              <option value='PI'>PI</option>
                              <option value='RJ'>RJ</option>
                              <option value='RN'>RN</option>
                              <option value='RS'>RS</option>
                              <option value='RO'>RO</option>
                              <option value='RR'>RR</option>
                              <option value='SC'>SC</option>
                              <option value='SP'>SP</option>
                              <option value='SE'>SE</option>
                              <option value='TO'>TO</option>
                          </select>
                      </div>
                    </div>
                    <div class="col-sm-3 col-md-2 col-lg-2" id='tel1'>
                      <div class="cor03">
                          <label for="exampleInputEmail1" class="form-label"
                          >Telefone<span style="color: red;">*</span></label
                          >
                          <input
                          type="text"
                          class="form-control"
                          aria-describedby="emailHelp"
                          name='telfornecedorjuridico' 
                          id='telfornecedorjuridico'
                          />
                      </div>
                  </div>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick='cadastrarfornecedorjuridico()'>Cadastrar Fornecedor Juridico</button>
          <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancelar</button>
      </div>
  </div>
</div>
</div>

<div class="modal fade" id="reabrircaixaModal" tabindex="-1" aria-labelledby="reabrircaixaModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="reabrircaixaModalLabel">Reabrir Caixa</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body ui-front">
          <label for="exampleInputEmail1" class="form-label"
          >Senha</label
          >
          <input
          type="text"
          class="form-control"
          aria-describedby="emailHelp"
          name='reabrircaixainput' 
          id='reabrircaixainput'
          />
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick='reabrircaixaconfirm()'>Reabrir Caixa</button>
            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancelar</button>
        </div>
    </div>
  </div>
</div>

<div class="modal fade" id="senhaerradaModal" tabindex="-1" aria-labelledby="senhaerradaModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="senhaerradaModalLabel">Erro!</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body ui-front">
          Senha Incorreta!
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancelar</button>
        </div>
    </div>
  </div>
</div>

<div class="modal fade .modal-xl" id="pesquisarmensalidadesModal" tabindex="-1" aria-labelledby="pesquisarmensalidadesModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h3 class="modal-title" id="pesquisarmensalidadesModalLabel">Mensalidades</h3>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body ui-front">
          <div class="container-fluid">
            <div class="row gx-3 gy-3">
              <div class="col-sm-5 col-md-4 col-lg-4">
                <label for="pesquisarcontratonome" class="form-label">Nome do Titular</label>
                <input type="text" class="form-control" name='pesquisarcontratonome' id='pesquisarcontratonome'/>
              </div>
              <div class="col-sm-5 col-md-4 col-lg-2">
                <label for="pesquisarcontratocpf" class="form-label">CPF do Titular</label>
                <input type="text" class="form-control" name='pesquisarcontratocpf' id='pesquisarcontratocpf' data-inputmask="'mask': '999.999.999-99'"/>
              </div>
              <div class="col-sm-3 col-md-3 col-lg-3">
                  <label for="pesquisarcontratonumero" class="form-label">Número do Contrato</label>
                  <input type="text" class="form-control" name='pesquisarcontratonumero' id='pesquisarcontratonumero' />  
              </div>
              <div class="col-sm-3 col-md-2 col-lg-2" style='display: flex;align-self: end;'>
                <button type="submit" class="btn btamarelo" value='Pesquisar' onclick='pesquisarcontrato()'>
                  <span class="fontebotao">Pesquisar</span>
                </button>
              </div>
            </div>
          </div>
          <div class="container-fluid">
            <div id='tabela' class="table-responsive-sm">
              <table id='pesquisarcontratotable' class="table">
                <thead class="table-active">
                    <tr>
                      <td scope="col">Número do Contrato</td>
                      <td scope="col">Nome do Titular</td>
                      <td scope="col">Nome do Plano</td>
                      <td scope="col">Ação</td>
                    </tr>
                </thead>
                <tbody id='contratotablebody'>

                </tbody>
              </table>
            </div> 
          </div>
          <div class='input abacobranca' id='abacobranca'>
            <div class="container-fluid">
              <div id='tabela' class="table-responsive">
                  <table id='' class="table">
                      <thead class="table-active">
                          <tr>
                              <td scope="col"><input type='checkbox' disabled></td>
                              <td scope="col">ID Lote</td>
                              <td scope="col">ID Cobrança</td>
                              <td scope="col">Vencimento</td>
                              <td scope="col">Fechado</td>
                              <td scope="col">Pago</td>
                              <td scope="col">Valor</td>
                          </tr>
                      </thead>
                      <tbody id='cobrancascontratotbody' style='text-align:center'>

                      </tbody>
                  </table>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-success" onclick='adicionarmensalidades()'>Pagar Mensalidades</button>
            <!-- <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancelar</button> -->
        </div>
    </div>
  </div>
</div>


  
</body>

</html>
<script>
  var deppagconf = [];
  var deppagnome = [];
  var deppagcontrato = [];
  var deppagservnome = [];
  var deppagdata = [];
  var deppagmednome = [];
  var deppagid = [];
  var countdeppag = 0;
  var countdeppag2 = 0;
  var countdeppagcomparar = 0;
  var pesquisarservmed = 0;
  var deppagidatual = 0;
  var dadoslinhas = [];
  var dadoslinhascontrato = [];

  var senhaabrircaixas = '0025';
  var caixareabrir = '';

  var adesaonome = [];
  var adesaodesc = [];
  var adesaodata = [];
  var adesaovalor = [];
  var adesaoformapagamento = [];
  var adesaoid = [];
  var adesaotipo = [];
  var adesaoconf = []
  var countadesao = 0;
  var countadesao2 = 0;
  var countadesaocomparar = 0;
  var pesquisaradesaocheck = 0;

  var seqtable = 0;
  var valortotal = 0;
  var nomeprod = [];
  var qtdprod = [];
  var valorunitprod = [];
  var valortotprod = [];
  var tipoprod = [];
  var inclusoprod = [];
  var dadoslinhas1 = [];
  var trocoatual = 0;
  var metodospagamento = [];
  var qtdmetodospagamento = [];
  var valormetodospagamento = [];
  var autometodospagamento = [];
  var cvmetodospagamento = [];

  var contlinhas = 0;
  var linhas = [];
  var verificadinheiro = 0;

  var cancelaratual = 0;
  var dinheirocaixa = 0;
  var idexcluirpdv = 0;

  var valorentradadinheiro = 0;
  var valorentradacartao = 0;
  var valorentradatransferencia = 0;
  var valorsaidadinheiro = 0;
  var valorsaidacartao = 0;
  var valorsaidatransferencia = 0;

  var idcobrancalote= [];
  var nomecobrancalote= [];
  var contratocobrancalote= [];
  var datacobrancalote= [];
  var valorcobrancalote= [];
  var contlinhasmensalidade = 0;
  
  checarcaixaaberto();
  checarlistmetodopag();

  $('#telfornecedorfisico').inputmask('(99) 9999[9]-9999');
  $('#telfornecedorjuridico').inputmask('(99) 9999[9]-9999');

  function checarcaixaaberto() {

    if (sessionStorage.getItem('caixaaberto')) {
      $('#avisocaixas').css('display', 'none');
      $('#caixas').css('display', 'none');
      $('#pdv').css('display', 'block');
      $('#concluircompra').css('display', 'block');
      $('.coluna').css('display', 'flex');
      $('#caixaatual').css('display', 'block');
      document.getElementById('caixaatual').innerHTML = sessionStorage.getItem("caixaaberto") +
        "&nbsp;&nbsp;<button type='submit'  value='Fechar Caixa' name='fecharcaixabutton' id='fecharcaixabutton' class='btn btdelete' onclick='fecharcaixa()'><span class='fontebotao'>Fechar Caixa</span></button><button type='submit'  value='Sair' name='saircaixabutton' id='saircaixabutton' class='btn' onclick='saircaixa()' style='margin-left:1rem;border: 2px solid #af1221;background: transparent;'><span class='fontebotao'  style='color:#af1221!important'>Sair</span></button>";
      visualizarcaixa();
    } else {
      $('#avisocaixas').css('display', 'block');
      $('#caixas').css('display', 'block');
      $('#pdv').css('display', 'none');
      pesquisarcaixas();
    }
  }


  function abrirpdv() {
    $('#pdv').css('display', 'show');
  }

  function fecharpdv() {
    $('#pdv').css('display', 'none');
  }


  function abrirconsulta() {
    apagartabelaprocurar();
    $('#ProcurarModal').modal('show');
  }

  $. extend ( $. ui . autocomplete . prototype . options ,  { 
    open :  function ( event , ui )  { 
      $ ( this ) . autocomplete ( "widget" ) . css ( { 
              "width" :  ( $ ( this ) . width ( )  +  "px" ) 
          } ) ; 
      } 
  });

  function fecharconsulta() {
    $('#ProcurarModal').modal('hide');
    apagartabelaprocurar();
  }

  $('#pagoinput').inputmask('decimal', {
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
  $('#valorinicialinput').inputmask('decimal', {
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

  $('#valorentrada').inputmask('numeric', {
        radixPoint: ".",
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
    $('#valorsaida').inputmask('numeric', {
        radixPoint: ".",
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

    function pesquisarnome(input) {
      console.log(input.id);
      var nome = $('#' + input.id).val();
      var nomes = [];
      if (nome.length >= 4) {
        $.ajax({
          type: 'GET',
          url: '../consultanomecpf',
          data: {
            nomepessoa: nome
          },
          dataType: "json",
          success: function(data) {
            for (i = 0; i < data.length; i++) {
              if(data[i][2] == 'Particular'){
                nomes.push(data[i][0] + " - " + data[i][1]);
              }else{
                nomes.push(data[i][0] + " - " + data[i][1]);
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

    function pesquisarnomefornecedores(input) {
      console.log(input.id);
      var nome = $('#' + input.id).val();
      var nomes = [];
      if (nome.length >= 4) {
        $.ajax({
          type: 'GET',
          url: '../consultanomefornecedores',
          data: {
            nomepessoa: nome
          },
          dataType: "json",
          success: function(data) {
            for (i = 0; i < data.length; i++) {
              nomes.push(data[i][0] + " - " + data[i][1]);
            }
            nomes = nomes.filter((este, i) => nomes.indexOf(este) === i);
            $("#" + input.id).autocomplete({
              source: nomes,
            });
          }

        });


      }
    }

    function attmetodoentrada(input){
      if(input.value == 2 || input.value == 3){
        document.getElementById('autoentrada').disabled = false;
        document.getElementById('cventrada').disabled = false;
      }else{
        document.getElementById('autoentrada').disabled = true;
        document.getElementById('cventrada').disabled = true;
        document.getElementById('autoentrada').value = '';
        document.getElementById('cventrada').value = '';
      }
    }

    function attmetodosaida(input){
      if(input.value == 2 || input.value == 3){
        document.getElementById('autosaida').disabled = false;
        document.getElementById('cvsaida').disabled = false;
      }else{
        document.getElementById('autosaida').disabled = true;
        document.getElementById('cvsaida').disabled = true;
        document.getElementById('autosaida').value = '';
        document.getElementById('cvsaida').value = '';
      }
    }

    function novaentrada(){
      $('#novaEntradaModal').modal('show');
      $('#valorentrada').css('display', 'block');
      var datacompetencia = new Date();
      document.getElementById('datacompetenciaentrada').value = datacompetencia.getFullYear() + '-' + ('00' + datacompetencia.getMonth()).slice(-2) + '-' + ('00' + datacompetencia.getDate()).slice(-2);
    }
    function novasaida(){
      $('#novaSaidaModal').modal('show');
      $('#valorsaida').css('display', 'block');
      var datacompetencia = new Date();
      document.getElementById('datacompetenciasaida').value = datacompetencia.getFullYear() + '-' + ('00' + datacompetencia.getMonth()).slice(-2) + '-' + ('00' + datacompetencia.getDate()).slice(-2);
    }
    function novofornecedorfisico(){
      $('#novoFornecedorFisicoModal').modal('show');
    }
    function novofornecedorjuridico(){
      $('#novoFornecedorJuridicoModal').modal('show');
    }

    function cadastrarnovaentrada(){
            $.ajax({
            type: "GET",
            url: "/novaentradapdv",
            data: {
              entrada_caixa: sessionStorage.getItem("caixaaberto"),
              entrada_motivo: document.getElementById('motivoentrada').value,
              entrada_valor: document.getElementById('valorentrada').value,
              entrada_formapagamento: document.getElementById('metodopagentrada').value,
              entrada_auto: document.getElementById('autoentrada').value,
              entrada_datacompetencia: document.getElementById('datacompetenciaentrada').value,
              entrada_pagador: document.getElementById('pagadorentrada').value,
              entrada_cv: document.getElementById('cventrada').value,
              entrada_funcionario: {{Auth::user()->id}},
            },
            dataType: "json",
            success: function(data) {
              $('#novaEntradaModal').modal('hide');
            }
        });
    }

    function cadastrarnovasaida(){
            $.ajax({
            type: "GET",
            url: "/novasaidapdv",
            data: {
              saida_caixa: sessionStorage.getItem("caixaaberto"),
              saida_motivo: document.getElementById('motivosaida').value,
              saida_valor: document.getElementById('valorsaida').value,
              saida_formapagamento: document.getElementById('metodopagsaida').value,
              saida_auto: document.getElementById('autosaida').value,
              saida_cv: document.getElementById('cvsaida').value,
              saida_pagador: document.getElementById('pagadorsaida').value,
              saida_datacompetencia: document.getElementById('datacompetenciasaida').value,
              saida_funcionario: {{Auth::user()->id}},
            },
            dataType: "json",
            success: function(data) {
              $('#novaSaidaModal').modal('hide');
            }
        });
    }

    function cadastrarfornecedorfisico(){
      $.ajax({
        type: "GET",
        url: "/cadastro/cadastrofornecedorfisico",
        data: {
            nome:$("[name='nomefornecedorfisico']").val(),
            cpf:$("[name='cpffornecedorfisico']").val(),
            datanasc:$("[name='datanascfornecedorfisico']").val(),
            estadocivil:$("[name='estadocivilfornecedorfisico']").val(),
            sexo:$("[name='sexofornecedorfisico']").val(),
            uf:$("[name='uffornecedorfisico']").val(),
            tel1:$("[name='telfornecedorfisico']").val(),
        },
        dataType: "json",
        success: function(data) {
            $('#novoFornecedorFisicoModal').modal('hide');
            $('#novaSaidaModal').modal('show');
          } 
        });
    }
    function cadastrarfornecedorjuridico(){
      $.ajax({
        type: "GET",
        url: "/cadastro/cadastrofornecedorjuridico",
        data: {
            nome:$("[name='nomefornecedorjuridico']").val(),
            cnpj:$("[name='cnpjfornecedorjuridico']").val(),
            uf:$("[name='uffornecedorjuridico']").val(),
            tel1:$("[name='telfornecedorjuridico']").val(),
        },
        dataType: "json",
        success: function(data) {
          $('#novoFornecedorJuridicoModal').modal('hide');
          $('#novaSaidaModal').modal('show');
        }
      });
    }

  function pesquisarcaixas() {
    $.ajax({
      type: "GET",
      url: "/pdvcaixas",
      data: {},
      dataType: "json",
      success: function(data) {
        apagartabelacaixas();
        document.getElementById('avisocaixas').innerHTML = '';
        if (data.length == 0) {
          document.getElementById('avisocaixas').innerHTML = "Não existem caixas criados.";
        } else {
          for (var i = 0; i < data.length; i++) {
              var valordinheirolista = data[i]['caixa_valordinheiro'] || 0;
              var valortransflista = data[i]['caixa_valortransf'] || 0;
              var valorcartaolista = data[i]['caixa_valorcartao'] || 0;
              var valortotalcaixaatuallista = (parseFloat(valordinheirolista) + parseFloat(valorcartaolista) + parseFloat(valortransflista));
            if(document.getElementById('verescondidos').checked){
              var tabela = document.getElementById('caixastable');
              var numeroLinhas = tabela.rows.length;
              var linha = tabela.insertRow(numeroLinhas);
              var celula1 = linha.insertCell(0);
              var celula2 = linha.insertCell(1);
              var celula3 = linha.insertCell(2);
              var celula4 = linha.insertCell(3);
              var celula5 = linha.insertCell(4);
              var celula6 = linha.insertCell(5);
              celula1.innerHTML = data[i]['caixa_nome'];
              if (data[i]['caixa_abriu'] == '' || data[i]['caixa_abriu'] == null) {
                celula2.innerHTML = 'Nunca Aberto';
              } else {
                celula2.innerHTML = data[i]['caixa_abriu'].split(' ')[0].split('-')[2] + '/' + data[i]['caixa_abriu'].split(' ')[0].split('-')[1] + '/' + data[i]['caixa_abriu'].split(' ')[0].split('-')[0] + ' ' + data[i]['caixa_abriu'].split(' ')[1].split(':')[0] + ':' + data[i]['caixa_abriu'].split(' ')[1].split(':')[1];
              }
              if (data[i]['caixa_fechou'] == '' || data[i]['caixa_fechou'] == null) {
                celula3.innerHTML = 'Nunca Fechado';
              } else {
                celula3.innerHTML = data[i]['caixa_fechou'].split(' ')[0].split('-')[2] + '/' + data[i]['caixa_fechou'].split(' ')[0].split('-')[1] + '/' + data[i]['caixa_fechou'].split(' ')[0].split('-')[0] + ' ' + data[i]['caixa_fechou'].split(' ')[1].split(':')[0] + ':' + data[i]['caixa_fechou'].split(' ')[1].split(':')[1];
              }
              celula4.innerHTML = valortotalcaixaatuallista.toLocaleString('pt-BR', {
                              minimumFractionDigits: 2,
                              style: 'currency',
                              currency: 'BRL'
                            });
              celula5.innerHTML = data[i]['caixa_status'];
              celula6.innerHTML =
                "<button type='submit' class='btn btadicionar' name='reabrircaixa" + (
                  numeroLinhas - 1) + "' id='reabrircaixa" + (numeroLinhas - 1) +
                "' value='Reabrir' onclick='reabrircaixa(this)' style='padding: 0.1rem 0.5rem !important;'><span class='fontebotao'>Reabrir</span></button>";

            }else if(data[i]['caixa_status'] == 'Aberto' || data[i]['caixa_abriu'] == null){
              var tabela = document.getElementById('caixastable');
              var numeroLinhas = tabela.rows.length;
              var linha = tabela.insertRow(numeroLinhas);
              var celula1 = linha.insertCell(0);
              var celula2 = linha.insertCell(1);
              var celula3 = linha.insertCell(2);
              var celula4 = linha.insertCell(3);
              var celula5 = linha.insertCell(4);
              var celula6 = linha.insertCell(5);
              celula1.innerHTML = data[i]['caixa_nome'];
              if (data[i]['caixa_abriu'] == '' || data[i]['caixa_abriu'] == null) {
                celula2.innerHTML = 'Nunca Aberto';
              } else {
                celula2.innerHTML = data[i]['caixa_abriu'].split(' ')[0].split('-')[2] + '/' + data[i]['caixa_abriu'].split(' ')[0].split('-')[1] + '/' + data[i]['caixa_abriu'].split(' ')[0].split('-')[0] + ' ' + data[i]['caixa_abriu'].split(' ')[1].split(':')[0] + ':' + data[i]['caixa_abriu'].split(' ')[1].split(':')[1];
              }
              if (data[i]['caixa_fechou'] == '' || data[i]['caixa_fechou'] == null) {
                celula3.innerHTML = 'Nunca Fechado';
              } else {
                celula3.innerHTML = data[i]['caixa_fechou'].split(' ')[0].split('-')[2] + '/' + data[i]['caixa_fechou'].split(' ')[0].split('-')[1] + '/' + data[i]['caixa_fechou'].split(' ')[0].split('-')[0] + ' ' + data[i]['caixa_fechou'].split(' ')[1].split(':')[0] + ':' + data[i]['caixa_fechou'].split(' ')[1].split(':')[1];
              }
              celula4.innerHTML = valortotalcaixaatuallista.toLocaleString('pt-BR', {
                              minimumFractionDigits: 2,
                              style: 'currency',
                              currency: 'BRL'
                            });
              celula5.innerHTML = data[i]['caixa_status'];
              celula6.innerHTML =
                "<button type='submit' class='btn btadicionar' name='abrircaixa" + (
                  numeroLinhas - 1) + "' id='abrircaixa" + (numeroLinhas - 1) +
                "' value='Abrir' onclick='abrircaixa(this)' style='padding: 0.1rem 0.5rem !important;'><span class='fontebotao'>Entrar</span></button>";

            }
            
          }
        }
      }
    });
  }

  function novocaixa() {
    $('#novocaixaModal').modal('show');
  }

  function abrirnovocaixa() {
    $.ajax({
      type: "GET",
      url: "/pdvcaixanovo",
      data: {
        valorinicial: document.getElementById('valorinicialinput').value
      },
      dataType: "json",
      success: function(data) {
        console.log('Caixa Criado com Sucesso!');
        $('#novocaixaModal').modal('hide');
        apagartabelacaixas();
        pesquisarcaixas();
      }
    });
  }

  function abrircaixa(cedula) {
    $thatRow = $(cedula);
    var caixaabrir = $thatRow.closest('tr').find('td').eq(0).text();
    console.log(caixaabrir);
    $.ajax({
      type: "GET",
      url: "/pdvabrircaixa",
      data: {
        caixa: caixaabrir
      },
      dataType: "json",
      success: function(data) {
        console.log('Caixa Aberto com Sucesso!');
        sessionStorage.setItem('caixaaberto', caixaabrir);
        checarcaixaaberto();
        pesquisarcaixas();
      }
    });
  }

  function reabrircaixaconfirm() {
    if(document.getElementById('reabrircaixainput').value == senhaabrircaixas){
        $.ajax({
        type: "GET",
        url: "/pdvabrircaixa",
        data: {
          caixa: caixareabrir
        },
        dataType: "json",
        success: function(data) {
          $('#reabrircaixaModal').modal('hide');
          console.log('Caixa Aberto com Sucesso!');
          sessionStorage.setItem('caixaaberto', caixareabrir);
          checarcaixaaberto();
          pesquisarcaixas();
        }
      });
    }else{
      $('#senhaerradaModal').modal('show');
    }
    
  }

  function reabrircaixa(cedula) {
    $thatRow = $(cedula);
    caixareabrir = $thatRow.closest('tr').find('td').eq(0).text();
    document.getElementById('reabrircaixainput').value = '';
    $('#reabrircaixaModal').modal('show');
  }

  function fecharcaixa() {
    $.ajax({
      type: "GET",
      url: "/pdvfecharcaixa",
      data: {
        caixa: sessionStorage.getItem('caixaaberto')
      },
      dataType: "json",
      success: function(data) {
        console.log('Caixa Fechado com Sucesso!');
        sessionStorage.removeItem('caixaaberto');
        checarcaixaaberto();
      }
    });
    $('#concluircompra').css('display', 'none');
    $('.coluna').css('display', 'none');
    $('#caixaatual').css('display', 'none');
  }

  function saircaixa() {
    sessionStorage.removeItem('caixaaberto');
    checarcaixaaberto();
    $('#concluircompra').css('display', 'none');
    $('.coluna').css('display', 'none');
    $('#caixaatual').css('display', 'none');
  }

  setInterval(pesquisardeppag, 2000);
  setInterval(pesquisaradesao, 2000);

  function pesquisardeppag() {
    $.ajax({
      type: "GET",
      url: "/pdvdeppag",
      data: {},
      dataType: "json",
      success: function(data) {
        countdeppag = data.length;
        deppagconf = [];
        pesquisarservmed = 0;
        for (var i = 0; i < data.length; i++) {
          deppagconf.push(data[i]['age_id']);
        }
        if (deppagid.length != deppagconf.length) {
          deppagnome = [];
          deppagcontrato = [];
          deppagnome = [];
          deppagdata = [];
          deppagmed = [];
          deppagmednome = [];
          deppagid = [];
          countdeppag2 = 0;
          for (var i = 0; i < data.length; i++) {
            deppagid.push(data[i]['age_id']);
            deppagnome.push(data[i]['age_pessoa']);
            deppagcontrato.push(data[i]['age_contrato']);
            deppagdata.push(data[i]['age_data']);
            deppagmed.push(data[i]['age_med']);
          }
          pesquisarservmed = 1;
        } else {
          countdeppagcomparar = 0;
          for (var i = 0; i < deppagid.length; i++) {
            if (deppagid[i] == deppagconf[i]) {
              countdeppagcomparar++;
            }
          }
          if (countdeppagcomparar != countdeppag) {
            deppagnome = [];
            deppagcontrato = [];
            deppagdata = [];
            deppagmed = [];
            deppagid = [];
            countdeppag2 = 0;
            for (var i = 0; i < data.length; i++) {
              deppagid.push(data[i]['age_id']);
              deppagnome.push(data[i]['age_pessoa']);
              deppagcontrato.push(data[i]['age_contrato']);
              deppagdata.push(data[i]['age_data']);
              deppagmed.push(data[i]['age_med']);
            }
            pesquisarservmed = 1;
          }
        }
        if (pesquisarservmed == 1) {
          pesquisardeppgadservmed();
        }
      }
    });
  }

  function pesquisaradesao(){
    $.ajax({
      type: "GET",
      url: "/pdvadesao",
      data: {},
      dataType: "json",
      success: function(data) {
        countadesao = data[0].length;
        adesaoconf = [];
        pesquisaradesaocheck = 0;
        for (var i = 0; i < data[0].length; i++) {
          adesaoconf.push(data[0][i]);
        }
        if(adesaoconf.length == 0){
          checkadesao(0);
        }else{
          checkadesao(1);
        }
        if (adesaoid.length != adesaoconf.length) {
          adesaonome = [];
          adesaodesc = [];
          adesaodata = [];
          adesaovalor = [];
          adesaoformapagamento = [];
          adesaoid = [];
          adesaotipo = [];
          countadesao2 = 0;
          for (var i = 0; i < data[0].length; i++) {
            adesaoid.push(data[0][i]);
            adesaonome.push(data[1][i]);
            adesaodesc.push(data[2][i]);
            adesaovalor.push(data[3][i]);
            adesaoformapagamento.push(data[4][i])
            adesaodata.push(data[5][i]);
            adesaotipo.push(data[6][i]);
          }
          pesquisaradesaocheck = 1;
        } else {
          countadesaocomparar = 0;
          for (var i = 0; i < adesaoid.length; i++) {
            if (adesaoid[i] == adesaoconf[i]) {
              countadesaocomparar++;
            }
          }
          if (countadesaocomparar != countadesao) {
            adesaonome = [];
            adesaodesc = [];
            adesaovalor = [];
            adesaoformapagamento = [];
            adesaodata = [];
            adesaoid = [];
            adesaotipo = [];
            countadesao2 = 0;
            for (var i = 0; i < data[0].length; i++) {
              adesaoid.push(data[0][i]);
              adesaonome.push(data[1][i]);
              adesaodesc.push(data[2][i]);
              adesaovalor.push(data[3][i]);
              adesaoformapagamento.push(data[4][i])
              adesaodata.push(data[5][i]);
              adesaotipo.push(data[6][i]);
            }
            pesquisaradesaocheck = 1;
          }
        }
        if (pesquisaradesaocheck == 1) {
          
          atualizartabelaadesao();
        }
      }
    });
  }

  // shortcut.add("Enter", function() {
  //   if (document.getElementById('codigoprodutoinput').value != '') {
  //     $.ajax({
  //       type: "GET",
  //       url: "/pdvaddproduto",
  //       data: {
  //         cod: document.getElementById('codigoprodutoinput').value,
  //         idatual: deppagidatual
  //       },
  //       dataType: "json",
  //       success: function(data) {
  //         valoratual = 0;
  //         if (data[2] != null) {
  //           valoratual = data[2];
  //         }
  //         var tabela = document.getElementById('carrinhotable');
  //         var numeroLinhas = tabela.rows.length;
  //         var linha = tabela.insertRow(numeroLinhas);
  //         var celula1 = linha.insertCell(0);
  //         var celula2 = linha.insertCell(1);
  //         var celula3 = linha.insertCell(2);
  //         var celula4 = linha.insertCell(3);
  //         var celula5 = linha.insertCell(4);
  //         var celula6 = linha.insertCell(5);
  //         var celula7 = linha.insertCell(6);
  //         var celula8 = linha.insertCell(7);
  //         dadoslinhas1.push(data[0]);
  //         nomeprod.push(data[1]);
  //         if (document.getElementById('quantidadeinput').value != '') {
  //           qtdprod.push(document.getElementById('quantidadeinput').value);
  //           document.getElementById('quantidadeinput').value = '';
  //         } else {
  //           qtdprod.push(1);
  //           document.getElementById('quantidadeinput').value = '';
  //         }
  //         valorunitprod.push(valoratual);
  //         celula1.innerHTML = ("0000" + numeroLinhas).slice(-4);
  //         celula2.innerHTML = ("0000" + data[0]).slice(-4);
  //         celula3.innerHTML = data[1];
  //         if (data[3] == "Item") {
  //           tipoprod.push("Item");
  //           celula4.innerHTML = "<input type='number' name='qtdprodinput" + (
  //               numeroLinhas - 1) + "' id='qtdprodinput" + (numeroLinhas - 1) +
  //             "' min = '1' value='" + 1 + "' onchange='calcularvalortotal()'>";
  //         } else {
  //           tipoprod.push("Servico");
  //           celula4.innerHTML = "<input type='number' name='qtdprodinput" + (
  //               numeroLinhas - 1) + "' id='qtdprodinput" + (numeroLinhas - 1) +
  //             "' onchange='calcularvalortotal()' min = '1' value='" + 1 + "' disabled >";
  //         }
  //         celula5.innerHTML = valoratual;
  //         celula6.innerHTML = "<input type='text' name='valortotalprod' id='valortotalprod" + (numeroLinhas -
  //           1) + "' value='" + parseFloat(valoratual).toFixed(2) + "' disabled >";
  //         inclusoprod.push(data[4]);
  //         if (data[4] == 1) {
  //           valortotprod.push(0);
  //           celula7.innerHTML = "<input type='checkbox' name='inclusocheckbox" + (
  //               numeroLinhas - 1) + "' id='inclusocheckbox" + (numeroLinhas - 1) +
  //             "' checked>";
  //         } else {
  //           valortotprod.push(valoratual);
  //           celula7.innerHTML = "<input type='checkbox' name='inclusocheckbox" + (
  //               numeroLinhas - 1) + "' id='inclusocheckbox" + (numeroLinhas - 1) +
  //             "'>";
  //         }
  //         celula8.innerHTML = "<input type='button' name='apagar" + (numeroLinhas - 1) +
  //           "' id='apagar" + (numeroLinhas - 1) +
  //           "' value='Apagar' onclick='apagarcarrinho(this)'>";
  //         if (data[3] == "Item") {
  //           document.getElementById('qtdprodinput' + (numeroLinhas - 1)).value =
  //             qtdprod[numeroLinhas - 1];
  //         }
  //         calcularvalortotal();
  //       }
  //     });
  //     document.getElementById('codigoprodutoinput').value = '';
  //   }
  // });

  shortcut.add("F1", function() {
    $('#procurartabeladiv').css('display', 'none');
    abrirconsulta();
  });

  shortcut.remove("F2");

  shortcut.add("F2", function() {
    novaentrada();
  });

  shortcut.remove("F3");
  shortcut.add("F3", function() {
    novasaida();
  });

  shortcut.remove("F4");
  shortcut.add("F4", function() {
    selecionarmensalidades();
  });

  function pesquisardeppgadservmed() {
    $.ajax({
      type: "GET",
      url: "/pdvdeppagservmed",
      data: {
        med: deppagmed
      },
      dataType: "json",
      success: function(data) {
        for (var i = 0; i < data['med'].length; i++) {
          deppagmednome.push(data['med'][i]);
          countdeppag2++
        }
        if (countdeppag == countdeppag2) {
          atualizartabela();
        }
      }
    });
  }

  function apagarcarrinho(cedula) {
    cancelaratual = cedula.id.split('apagar')[1];
    $('#CancelarModal').modal('show');
  }

  function cancelarcancelamento() {
    cancelaratual = 0;
    $('#CancelarModal').modal('hide');
  }

  function verificarcancelar() {
    if (document.getElementById('cancelarinput').value == '0025') {
      nomeprod.splice(cancelaratual, 1);
      qtdprod.splice(cancelaratual, 1);
      valorunitprod.splice(cancelaratual, 1);
      valortotprod.splice(cancelaratual, 1);
      inclusoprod.splice(cancelaratual, 1);
      dadoslinhas1.splice(cancelaratual, 1);
      apagartabelapdv();
      refazertabelapdv();
      calculartroco();
    } else {
      console.log('Senha Incorreta, Tente Novamente!');
    }
    document.getElementById('cancelarinput').value = '';
  }

  function atualizartabela() {
    var tableHeaderRowCount = 0;
    var table = document.getElementById('deppagtable');
    var rowCount = table.rows.length;
    for (var i = tableHeaderRowCount; i < rowCount; i++) {
      table.deleteRow(tableHeaderRowCount);
    }

    for (i = 0; i < deppagid.length; i++) {
      var tabela = document.getElementById('deppagtable');
      var numeroLinhas = tabela.rows.length;
      var linha = tabela.insertRow(numeroLinhas);
      var celula1 = linha.insertCell(0);
      var celula2 = linha.insertCell(1);
      var celula3 = linha.insertCell(2);
      var celula4 = linha.insertCell(3);
      var celula5 = linha.insertCell(4);
      dadoslinhas.push(deppagid[i]);
      celula1.innerHTML = '<a onclick="visualizar(this)" type="submit" name="visualizarpdv' + i + '" id="visualizarpdv' + i + '">' + deppagcontrato[i] + '</a>';
      celula2.innerHTML = '<a onclick="visualizar(this)" type="submit" name="visualizarpdv' + i + '" id="visualizarpdv' + i + '">' + deppagnome[i] + '</a>';
      celula3.innerHTML = '<a onclick="visualizar(this)" type="submit" name="visualizarpdv' + i + '" id="visualizarpdv' + i + '">' + deppagdata[i] + '</a>';
      celula4.innerHTML = '<a onclick="visualizar(this)" type="submit" name="visualizarpdv' + i + '" id="visualizarpdv' + i + '">' + deppagmednome[i] + '</a>';
      celula5.innerHTML = "<div style='display:flex'><button type='submit' name='chamarpdv" +
        i + "' id='chamarpdv" + i +
        "' class='btn btmenor' value='Chamar' onclick='chamar(this)'><span class='fontebotao fontblack' style='font-weight:400!important;'><img src='imagens/volumepdv3.svg'></span></button><button type='submit' name='chamarpdv" +
        i + "' id='excluirpdv" + i +
        "' class='btn btmenor' value='Excluir' onclick='excluirpdv(this)'><span class='fontebotao fontblack' style='font-weight:400!important;'><img src='imagens/lixo.svg'></span></button></div>";
    }
  }

  function atualizartabelaadesao() {
    var tableHeaderRowCount = 0;
    var table = document.getElementById('adesaotable');
    var rowCount = table.rows.length;
    for (var i = tableHeaderRowCount; i < rowCount; i++) {
      table.deleteRow(tableHeaderRowCount);
    }
    for (i = 0; i < adesaoid.length; i++) {
      var tabela = document.getElementById('adesaotable');
      var numeroLinhas = tabela.rows.length;
      var linha = tabela.insertRow(numeroLinhas);
      var celula1 = linha.insertCell(0);
      var celula2 = linha.insertCell(1);
      var celula3 = linha.insertCell(2);
      var celula4 = linha.insertCell(3);
      var celula5 = linha.insertCell(4);
      var celula6 = linha.insertCell(5);
      if(adesaotipo[i] == 'Adesão'){
        celula1.innerHTML = adesaonome[i];
        celula2.innerHTML = adesaodesc[i];
        celula3.innerHTML = adesaodata[i].split('-')[2]+ '/' + adesaodata[i].split('-')[1]+ '/' + adesaodata[i].split('-')[0];
        celula4.innerHTML = adesaovalor[i].toLocaleString('pt-BR', {
                              minimumFractionDigits: 2,
                              style: 'currency',
                              currency: 'BRL'
                            });
        celula5.innerHTML = adesaoformapagamento[i];
        celula6.innerHTML = "<button type='submit' name='" +
          adesaoid[i] + "' id='" + adesaoid[i] +
          "' class='btn btmenor' value='Confirmar Pagamento' onclick='confirmarpagamendoadesao(this)' style='border:1px solid #198754'><span class='fontebotao' style='font-weight:600!important;color:#198754;font-size:15px!important'>Confirmar</span></button>";
      }else if(adesaotipo[i] == 'Anual'){
        celula1.innerHTML = adesaonome[i];
        celula2.innerHTML = adesaodesc[i];
        celula3.innerHTML = adesaodata[i].split('-')[2]+ '/' + adesaodata[i].split('-')[1]+ '/' + adesaodata[i].split('-')[0];
        celula4.innerHTML = adesaovalor[i].toLocaleString('pt-BR', {
                              minimumFractionDigits: 2,
                              style: 'currency',
                              currency: 'BRL'
                            });
        celula5.innerHTML = adesaoformapagamento[i];
        celula6.innerHTML = "<button type='submit' name='anual" +
          adesaoid[i] + "' id='anual" + adesaoid[i] +
          "' class='btn btmenor' value='Confirmar Pagamento' onclick='confirmarpagamendoadesao(this)' style='border:1px solid #198754'><span class='fontebotao' style='font-weight:600!important;color:#198754;font-size:15px!important'>Confirmar</span></button>";
      }else{
        celula1.innerHTML = adesaonome[i];
        celula2.innerHTML = adesaodesc[i];
        celula3.innerHTML = adesaodata[i].split('-')[2]+ '/' + adesaodata[i].split('-')[1]+ '/' + adesaodata[i].split('-')[0];
        celula4.innerHTML = adesaovalor[i].toLocaleString('pt-BR', {
                              minimumFractionDigits: 2,
                              style: 'currency',
                              currency: 'BRL'
                            });
        celula5.innerHTML = adesaoformapagamento[i];
        celula6.innerHTML = "<button type='submit' name='anual" +
          adesaoid[i] + "' id='mensa" + adesaoid[i] +
          "' class='btn btmenor' value='Confirmar Pagamento' onclick='confirmarpagamendoadesao(this)' style='border:1px solid #198754'><span class='fontebotao' style='font-weight:600!important;color:#198754;font-size:15px!important'>Confirmar</span></button>";
      }
      
    }
  }

  function confirmarpagamendoadesao(input){
    $.ajax({
      type: "GET",
      url: "/confirmarpagamentoadesao",
      data: {
        id: input.id,
        caixaatual: sessionStorage.getItem("caixaaberto"),
      },
      dataType: "json",
      success: function(data) {
        adesaonome = [];
        adesaodesc = [];
        adesaodata = [];
        adesaovalor = [];
        adesaoformapagamento = [];
        adesaoid = [];
        adesaotipo = [];
        console.log('Adesão Confirmada com Sucesso!');
      }
    });
  }

  function checkadesao(check){
    if(check == 1){
      document.getElementById('adesaodiv').style.display = 'block';
    }else{
      document.getElementById('adesaodiv').style.display = 'none';
    }
  }

  function calcularvalortotal() {
    valortotal = 0;
    for (var i = 0; i < dadoslinhas1.length; i++) {
      console.log(document.getElementById('qtdprodinput-' + (i)).value);
      qtdprod[i] = document.getElementById('qtdprodinput-' + (i)).value;
      if (inclusoprod[i] == 1) {
        document.getElementById('valortotalprod-' + (i)).value = 0;
      } else {
        valortotalatual = parseFloat(valorunitprod[i]).toFixed(2) * qtdprod[i];
        valortotal += valortotalatual;
        document.getElementById('valortotalprod-' + (i)).value = parseFloat(valortotalatual).toFixed(2);
        valortotprod[i] = valortotalatual;
      }
    }
    document.getElementById('valortotaldiv').innerHTML = valortotal.toLocaleString('pt-BR', {
      minimumFractionDigits: 2,
      style: 'currency',
      currency: 'BRL'
    });
  }

  function calcularvalortotalconsulta(cedula) {
    valortotal = 0;
    var consultaatual = cedula.id.split('qtdconsultainput')[1];
    if (document.getElementById('inclusocheckboxconsulta' + consultaatual).checked) {
      document.getElementById('valortotalconsulta' + cedula.id.split('qtdconsultainput')[1]).value = 0;
    } else {
      valortotal = document.getElementById('valorunitconsulta' + consultaatual).innerHTML * document
        .getElementById('qtdconsultainput' + consultaatual).value;
      document.getElementById('valortotalconsulta' + cedula.id.split('qtdconsultainput')[1]).value = valortotal;
    }
  }

  function calculartroco() {
    verificadinheiro = 0;
    if (document.getElementById('pagoinput').value != '' && parseFloat(document.getElementById('pagoinput').value) != 0) {
      trocoatual = parseFloat(document.getElementById('pagoinput').value.replace(',', '.')) - parseFloat(valortotal).toFixed(2);
      document.getElementById('valortroco').innerHTML = trocoatual.toLocaleString('pt-BR', {
        minimumFractionDigits: 2,
        style: 'currency',
        currency: 'BRL'
      });
      if (trocoatual < 0) {
        document.getElementById('valortroco').style.color = 'red';
      } else {
        document.getElementById('valortroco').style.color = 'black';
      }
      for (var i = 1; i <= contlinhas; i++) {
        if (document.getElementById('metodopagselect' + i).value == 1) {
          verificadinheiro = i;
        }
      }
      if (verificadinheiro != 0) {
        document.getElementById('valormetodopag' + verificadinheiro).value = document.getElementById('pagoinput').value;
        attmetodopag(document.getElementById('valormetodopag' + verificadinheiro));
      } else {
        novometodopag();
        console.log('contlinhas:' + contlinhas);
        // setTimeout(function() {
        console.log(document.getElementById('valormetodopag' + contlinhas));
        document.getElementById('metodopagselect' + contlinhas).value = 1;
        document.getElementById('valormetodopag' + contlinhas).value = document.getElementById('pagoinput').value;
        // }, 500);
        attmetodopag(document.getElementById('valormetodopag' + contlinhas));
      }
    } else {
      document.getElementById('valortroco').innerHTML = '';
      for (var i = 1; i <= contlinhas; i++) {
        if (document.getElementById('metodopagselect' + i).value == 1) {
          verificadinheiro = i;
        }
      }
      if (verificadinheiro != 0) {
        document.getElementById('checkboxmetodopag' + verificadinheiro).checked = true;
        excluirmetodopag();
      }
    }
  }

  function apagartabelapdv() {
    var tableHeaderRowCount = 0;
    var table = document.getElementById('carrinhotable');
    var rowCount = table.rows.length;
    for (var i = tableHeaderRowCount; i < rowCount; i++) {
      table.deleteRow(tableHeaderRowCount);
    }
  }

  function apagartabelacaixas() {
    var tableHeaderRowCount = 0;
    var table = document.getElementById('caixastable');
    var rowCount = table.rows.length;
    for (var i = tableHeaderRowCount; i < rowCount; i++) {
      table.deleteRow(tableHeaderRowCount);
    }
  }

  function apagartabelaprocurar() {
    var tableHeaderRowCount = 0;
    var table = document.getElementById('procurartabelatable');
    var rowCount = table.rows.length;
    for (var i = tableHeaderRowCount; i < rowCount; i++) {
      table.deleteRow(tableHeaderRowCount);
    }
  }

  function refazertabelapdv() {
    console.log(dadoslinhas1);
    for (var i = 0; i < dadoslinhas1.length; i++) {
      console.log(dadoslinhas1[i], nomeprod[i]);
      var tabela = document.getElementById('carrinhotable');
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
      celula1.innerHTML = ("0000" + numeroLinhas).slice(-4);
      celula2.innerHTML = ("0000" + dadoslinhas1[i]).slice(-4);
      celula3.innerHTML = nomeprod[i];
      if (tipoprod[i] == "Item") {
        celula4.innerHTML = "<input type='number' name='qtdprodinput-" + (numeroLinhas) +
          "' id='qtdprodinput-" + (numeroLinhas) + "' min = '1' value='" + qtdprod[i] +
          "' onchange='calcularvalortotal()' class='inputpdvcaixa'>";
      } else {
        celula4.innerHTML = "<input type='number' name='qtdprodinput-" + (numeroLinhas) +
          "' id='qtdprodinput-" + (numeroLinhas) + "' min = '1' value='" + qtdprod[i] +
          "' onchange='calcularvalortotal()' class='inputpdvcaixa'>";
      }
      celula5.innerHTML = valorunitprod[i];
      celula6.innerHTML = "<input type='text' name='valortotalprod' id='valortotalprod-" + (numeroLinhas) + "' value='" + parseFloat(valortotprod[
        i]).toFixed(2) + "' disabled class='inputpdvcaixa'>";
      if (inclusoprod[i] == 1) {
        celula7.innerHTML = "<input type='checkbox' name='inclusocheckbox-" + (numeroLinhas) +
          "' id='inclusocheckbox-" + (numeroLinhas) + "' checked>";
      } else {
        celula7.innerHTML = "<input type='checkbox' name='inclusocheckbox-" + (numeroLinhas) +
          "' id='inclusocheckbox-" + (numeroLinhas) + "'>";
      }
      celula8.innerHTML = "<button type='submit'  name='apagar-" + (numeroLinhas) + "' id='apagar-" + (
          numeroLinhas) +
        "' value='Apagar' class='btn btdelete' onclick='apagarcarrinho(this)'><span class='fontebotao'>Apagar</span></button>";
      if (tipoprod[i] == "Item") {
        document.getElementById('qtdprodinput-' + (numeroLinhas)).value = qtdprod[i];
      }
    }
    $('#CancelarModal').modal('hide');
    calcularvalortotal();
  }

  function visualizar(cedula) {
    var id = cedula.id.split('visualizarpdv')[1];
    $.ajax({
      type: "GET",
      url: "/pdvdeppagpreencher",
      data: {
        idagenda: deppagid[id]
      },
      dataType: "json",
      success: function(data) {
        console.log(data);
        deppagidatual = deppagid[id];
        apagartabelapdv();
        nomeprod = [];
        qtdprod = [];
        valorunitprod = [];
        valortotprod = [];
        inclusoprod = [];
        dadoslinhas1 = [];
        valoratual = 0;
        for (var i = 0; i < data['id'].length; i++) {
          if (data['preco'][i] != null) {
            valoratual = data['preco'][i];
            // console.log(valoratual);
          }
          // console.log(data['id'][i]);
          var tabela = document.getElementById('carrinhotable');
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
          dadoslinhas1.push(data['id'][i]);
          nomeprod.push(data['nome'][i]);
          qtdprod.push(1);
          valorunitprod.push(valoratual);
          tipoprod.push('Servico');
          celula1.innerHTML = ("0000" + 1).slice(-4);
          celula2.innerHTML = ("0000" + data['id'][i]).slice(-4);
          celula3.innerHTML = data['nome'][i];
          if (data['id'][i] == 0) {
            celula4.innerHTML = "<input disabled type='number' name='qtdprodinput-" + (numeroLinhas) +
              "' id='qtdprodinput-" + (numeroLinhas) + "' min = '1' value='" + data['quantidade'][i] +
              "' class='inputpdvcaixa' onchange='calcularvalortotal()'>";
          } else {
            celula4.innerHTML = "<input type='number' name='qtdprodinput-" + (numeroLinhas) +
              "' id='qtdprodinput-" + (numeroLinhas) + "' min = '1' value='" + data['quantidade'][i] +
              "' class='inputpdvcaixa' onchange='calcularvalortotal()'>";
          }
          celula5.innerHTML = valoratual;
          celula6.innerHTML = "<input type='text' name='valortotalprod' id='valortotalprod-" + (numeroLinhas) +
            "' value='" + parseFloat(valoratual).toFixed(2) + "' disabled class='inputpdvcaixa'>";
          if (data['preco'][i] == 0 || data['preco'][i] == null) {
            inclusoprod.push(1);
            valortotprod.push(0);
            if (data['id'][i] == 0) {
              celula7.innerHTML = "<input disabled type='checkbox' name='inclusocheckbox-" + (numeroLinhas) +
                "' id='inclusocheckbox-" + (numeroLinhas) + "' checked>";
            } else {
              celula7.innerHTML = "<input type='checkbox' name='inclusocheckbox-" + (numeroLinhas) +
                "' id='inclusocheckbox-" + (numeroLinhas) + "' checked>";
            }

          } else {
            inclusoprod.push(0);
            valortotprod.push(valoratual);
            celula7.innerHTML = "<input type='checkbox' name='inclusocheckbox-" + (numeroLinhas) +
              "' id='inclusocheckbox-" + (numeroLinhas) + "'>";
          }
          celula8.innerHTML = "<button type='submit'  name='apagar-" + (numeroLinhas) +
            "' id='apagar-" + (numeroLinhas) +
            "' value='Apagar' class='btn' onclick='apagarcarrinho(this)'><span class='fontebotao'><img src='imagens/lixo.svg'></span></button>";

        }
        calcularvalortotal();
      }
    });
  }

  function excluirpdv(cedula) {
    idexcluirpdv = cedula.id.split('excluirpdv')[1];
    $('#excluirpdvModal').modal('show');

  }

  function excluirpdv1() {
    $.ajax({
      type: "GET",
      url: "/pdvdeppagexcluir",
      data: {
        idagenda: deppagid[idexcluirpdv]
      },
      dataType: "json",
      success: function(data) {
        console.log('Cancelado com Sucesso!');
        $('#excluirpdvModal').modal('hide');
      }
    });
  }

  function procurarproduto() {
    $('#procurartabeladiv').css('display', 'block');
    $.ajax({
      type: "GET",
      url: "/pdvconsultaproduto",
      data: {
        nome: document.getElementById('procurarnomeinput').value,
        tipo: document.getElementById('procurarselectinput').value,
        idatual: deppagidatual
      },
      dataType: "json",
      success: function(data) {
        apagartabelaprocurar();
        console.log(data);
        for (var i = 0; i < data['id'].length; i++) {
          var tabela = document.getElementById('procurartabelatable');
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
          celula1.innerHTML = ("0000" + data['id'][i]).slice(-4);
          celula2.innerHTML = data['nome'][i];
          celula3.innerHTML = data['cate'][i];
          if (data['tipo'][i] == "Item") {
            celula4.innerHTML = data['tipo'][i];
          } else {
            celula4.innerHTML = 'Exame';
          }
          if (data['tipo'][i] == "Item") {
            celula5.innerHTML = "<input type='number' name='qtdconsultainput" + (numeroLinhas -
                1) + "' id='qtdconsultainput" + (numeroLinhas - 1) + "' min = '1' value='" +
              1 +
              "' class='inputstexttelas inputtextsmall' onchange='calcularvalortotalconsulta(this)'>";
          } else {
            celula5.innerHTML = "<input type='number' name='qtdconsultainput" + (numeroLinhas -
                1) + "' id='qtdconsultainput" + (numeroLinhas - 1) + "' min = '1' value='" +
              1 + "' calcularvalortotalconsulta(this) class='inputstexttelas inputtextsmall' disabled>";
          }
          if (data['valor'][i] == null || data['valor'][i] == '') {
            celula6.innerHTML = "<div id='valorunitconsulta" + (numeroLinhas - 1) + "'>0</div>";
            celula7.innerHTML = "<input type='text' id='valortotalconsulta" + (numeroLinhas -
              1) + "' value='0' class='inputstexttelas inputtextsmall' disabled>";
          } else {
            if (data['incluso'][i] == 1) {
              celula6.innerHTML = "<div id='valorunitconsulta" + (numeroLinhas - 1) + "'>" +
                data['valor'][i] + "</div>";
              celula7.innerHTML = "<input type='text' id='valortotalconsulta" + (
                  numeroLinhas - 1) +
                "' value='0' class='inputstexttelas inputtextsmall' disabled>";
            } else {
              celula6.innerHTML = "<div id='valorunitconsulta" + (numeroLinhas - 1) + "'>" +
                data['valor'][i] + "</div>";
              celula7.innerHTML = "<input type='text' id='valortotalconsulta" + (
                  numeroLinhas - 1) + "' value='" + data['valor'][i] +
                "' class='inputstexttelas inputtextsmall' disabled>";
            }
          }
          if (data['incluso'][i] == 1) {
            celula8.innerHTML = "<input type='checkbox' name='inclusocheckboxconsulta" + (
                numeroLinhas - 1) + "' id='inclusocheckboxconsulta" + (numeroLinhas - 1) +
              "' checked>";
          } else {
            celula8.innerHTML = "<input type='checkbox' name='inclusocheckboxconsulta" + (
                numeroLinhas - 1) + "' id='inclusocheckboxconsulta" + (numeroLinhas - 1) +
              "'>";
          }
          celula9.innerHTML =
            "<button type='submit' class='btn btadicionar' name='adicionarcarrinho" + (
              numeroLinhas - 1) + "' id='adicionarcarrinho" + (numeroLinhas - 1) +
            "' value='Adicionar' onclick='adicionarcarrinho(this)'><span class='fontebotao'>Adicionar</span></button>";
        }
      }
    });
  }

  function adicionarcarrinho(cedula) {
    var consultaatual = cedula.id.split('adicionarcarrinho')[1];
    $thatRow = $(cedula);

    dadoslinhas1.push($thatRow.closest('tr').find('td').eq(0).text());
    nomeprod.push($thatRow.closest('tr').find('td').eq(1).text());
    qtdprod.push(document.getElementById('qtdconsultainput' + consultaatual).value);
    valorunitprod.push($thatRow.closest('tr').find('td').eq(5).text());
    valortotprod.push(document.getElementById('valortotalconsulta' + consultaatual).value);
    if ($thatRow.closest('tr').find('input[type=checkbox]').is(':checked')) {
      inclusoprod.push(1);
    } else {
      inclusoprod.push(0);
    }
    if ($thatRow.closest('tr').find('td').eq(3).text() == 'Item') {
      tipoprod.push('Item');
    } else {
      tipoprod.push('Servico');
    }
    apagartabelapdv();
    refazertabelapdv();
    calculartroco();
  }

  function metodospagamentomodal() {
    $('#metodopagModal').modal('show');
    document.getElementById('valortotalmodal').innerHTML = valortotal.toLocaleString('pt-BR', {
      minimumFractionDigits: 2,
      style: 'currency',
      currency: 'BRL'
    });
    calcularrestante();
  }

  function novometodopag() {
    contlinhas++;
    linhas.push(contlinhas);
    var tabela = document.getElementById('metodopagtablebody');
    var numeroLinhas = tabela.rows.length;
    var linha = tabela.insertRow(numeroLinhas);
    var celula1 = linha.insertCell(0);
    var celula2 = linha.insertCell(1);
    var celula3 = linha.insertCell(2);
    var celula4 = linha.insertCell(3);
    var celula5 = linha.insertCell(4);
    var celula6 = linha.insertCell(5);
    celula1.innerHTML = "<input type='checkbox' name='checkboxmetodopag" + (numeroLinhas + 1) + "' id='checkboxmetodopag" + (numeroLinhas + 1) + "'>";
    celula2.innerHTML = "<select name='metodopagselect" + (numeroLinhas + 1) + "' id='metodopagselect" + (numeroLinhas + 1) + "' class='form-select' onchange='attmetodopag(this)'><option value='1' selected >Dinheiro</option><option value='2'>Cartão - Débito</option><option value='3'>Cartão - Crédito</option><option value='4'>Pix</option><option value='5'>Cheque</option><option value='6'>Boleto Bancário</option></select>";
    celula3.innerHTML = "<input type='number' class='form-control' style='' min='1' name='qtdpagselect" + (numeroLinhas + 1) + "' id='qtdpagselect" + (numeroLinhas + 1) + "' disabled value='1'>";
    celula4.innerHTML = "<div style='display:flex'><input type='text' class='form-control' style='' id='valormetodopag" + (numeroLinhas + 1) + "' onkeyup='attmetodopag(this)'></div>";
    $('#valormetodopag' + (numeroLinhas + 1)).inputmask('decimal', {
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
    celula5.innerHTML = "<input type='text' class='form-control' style='' name='autopagselect" + (numeroLinhas + 1) + "' id='autopagselect" + (numeroLinhas + 1) + "' onchange='attmetodopag(this)' disabled>";
    celula6.innerHTML = "<input type='text' class='form-control' style='' name='cvpagselect" + (numeroLinhas + 1) + "' id='cvpagselect" + (numeroLinhas + 1) + "' onchange='attmetodopag(this)' disabled>";
    metodospagamento[contlinhas - 1] = "";
    qtdmetodospagamento[contlinhas - 1] = "";
    valormetodospagamento[contlinhas - 1] = "";
    autometodospagamento[contlinhas - 1] = "";
    cvmetodospagamento[contlinhas - 1] = "";
    checarlistmetodopag();
  }

  function excluirmetodopag() {
    var qtdexcluircontlinhas = 0;
    for (var o = 1; o <= contlinhas; o++) {
      if (document.getElementById('checkboxmetodopag' + o).checked == true) {
        var i = document.getElementById('checkboxmetodopag' + o).parentNode.parentNode.rowIndex;
        document.getElementById('metodopagtablebody').deleteRow(i - 1);
        linhas.splice(o - 1, 1);
        metodospagamento.splice(o - 1, 1);
        qtdmetodospagamento.splice(o - 1, 1);
        valormetodospagamento.splice(o - 1, 1);
        autometodospagamento.splice(o - 1, 1);
        cvmetodospagamento.splice(o - 1, 1);
        qtdexcluircontlinhas++;
      }
    }
    contlinhas = contlinhas - qtdexcluircontlinhas;
    refazertabelametodopag();
  }

  function checarlistmetodopag() {
    if (contlinhas == 0) {
      document.getElementById('semmetodopag').style.display = 'block';
      document.getElementById('metodopagtablediv').style.display = 'none';
    } else {
      document.getElementById('semmetodopag').style.display = 'none';
      document.getElementById('metodopagtablediv').style.display = 'block';
    }
  }

  function refazertabelametodopag() {
    apagartabelametodopag();
    if (contlinhas > 0) {
      document.getElementById('semmetodopag').style.display = 'none';
      document.getElementById('metodopagtablediv').style.display = 'block';
      for (i = 0; i < contlinhas; i++) {
        linhas.push(contlinhas);
        var tabela = document.getElementById('metodopagtablebody');
        var numeroLinhas = tabela.rows.length;
        var linha = tabela.insertRow(numeroLinhas);
        var celula1 = linha.insertCell(0);
        var celula2 = linha.insertCell(1);
        var celula3 = linha.insertCell(2);
        var celula4 = linha.insertCell(3);
        celula1.innerHTML = "<input type='checkbox' name='checkboxmetodopag" + (numeroLinhas + 1) + "' id='checkboxmetodopag" + (numeroLinhas + 1) + "'>";
        celula2.innerHTML = "<select name='metodopagselect" + (numeroLinhas + 1) + "' id='metodopagselect" + (numeroLinhas + 1) + "' class='form-select' onchange='attmetodopag(this)'><option value='1' selected>Dinheiro</option><option value='2'>Cartão - Débito</option><option value='3'>Cartão - Crédito</option><option value='4'>Pix</option><option value='5'>Cheque</option><option value='6'>Boleto Bancário</option></select>";
        celula3.innerHTML = "<input type='number' min='1' name='qtdpagselect" + (numeroLinhas + 1) + "' id='qtdpagselect" + (numeroLinhas + 1) + "' disabled value='1'>";
        celula4.innerHTML = "<div style='display:flex'><span>R$</span>&nbsp;<input type='text' class='form-control' id='valormetodopag" + (numeroLinhas + 1) + "' onkeyup='attmetodopag(this)' style='padding: 0.15rem 0.75rem!important;'></div>";
        $('#valormetodopag' + (numeroLinhas + 1)).inputmask('decimal', {
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
        celula5.innerHTML = "<input type='text' class='form-control' style='' name='autopagselect" + (numeroLinhas + 1) + "' id='autopagselect" + (numeroLinhas + 1) + "' onchange='attmetodopag(this)' disabled>";
        celula6.innerHTML = "<input type='text' class='form-control' style='' name='cvpagselect" + (numeroLinhas + 1) + "' id='cvpagselect" + (numeroLinhas + 1) + "' onchange='attmetodopag(this)' disabled>";
      }

      //  console.log(idagendamento, exameagendamento, situacaoagendamento);

      setTimeout(function() {
        preenchermetodopag()
      }, 300);
    } else {
      document.getElementById('semmetodopag').style.display = 'block';
      document.getElementById('metodopagtablediv').style.display = 'none';
    }
  }

  function attmetodopag(select) {
    if (select.id[0] == 'm') {
      var idselect = select.id.split('metodopagselect')[1];
    } else if (select.id[0] == 'q') {
      var idselect = select.id.split('qtdpagselect')[1];
    } else if(select.id[0] == 'v') {
      var idselect = select.id.split('valormetodopag')[1];
    }else if(select.id[0] == 'a'){
      var idselect = select.id.split('autopagselect')[1];
    }else{
      var idselect = select.id.split('cvpagselect')[1];
    }
    console.log(document.getElementById('metodopagselect' + idselect).value);
    console.log(document.getElementById('autopagselect' + idselect).value);
    console.log(document.getElementById('cvpagselect' + idselect).value);
    if (document.getElementById('metodopagselect' + idselect).value == 3) {
      document.getElementById('qtdpagselect' + idselect).disabled = false;
      document.getElementById('autopagselect' + idselect).disabled = false;
      document.getElementById('cvpagselect' + idselect).disabled = false;
    } else if(document.getElementById('metodopagselect' + idselect).value == 2) {
      document.getElementById('qtdpagselect' + idselect).disabled = true;
      document.getElementById('qtdpagselect' + idselect).value = 1;
      document.getElementById('autopagselect' + idselect).disabled = false;
      document.getElementById('cvpagselect' + idselect).disabled = false;
    }else{
      document.getElementById('qtdpagselect' + idselect).disabled = true;
      document.getElementById('autopagselect' + idselect).disabled = true;
      document.getElementById('cvpagselect' + idselect).disabled = true;
      document.getElementById('qtdpagselect' + idselect).value = 1;
      document.getElementById('autopagselect' + idselect).value = null;
      document.getElementById('cvpagselect' + idselect).value = null;
    }
    metodospagamento[idselect - 1] = document.getElementById('metodopagselect' + idselect).value;
    qtdmetodospagamento[idselect - 1] = document.getElementById('qtdpagselect' + idselect).value;
    valormetodospagamento[idselect - 1] = document.getElementById('valormetodopag' + idselect).value;
    autometodospagamento[idselect - 1] = document.getElementById('autopagselect' + idselect).value;
    cvmetodospagamento[idselect - 1] = document.getElementById('cvpagselect' + idselect).value;
    calcularrestante();
  }

  function calcularrestante() {
    var calculovalorrestante = 0;
    for (var i = 0; i < valormetodospagamento.length; i++) {
      if (valormetodospagamento[i] != '') {
        calculovalorrestante += parseFloat(valormetodospagamento[i].replace(',','.')).toFixed(2);
        // console.log(valormetodospagamento[i], parseFloat(valormetodospagamento[i]).toFixed(2), parseFloat(valormetodospagamento[i].replace(',','.')).toFixed(2));
      }
    }
    calculovalorrestante -= parseFloat(valortotal).toFixed(2);
    // console.log(calculovalorrestante, valortotal);
    if (calculovalorrestante != 0) {
      $("#concluircomprabutton").prop("disabled",true);
      calculovalorrestante = -calculovalorrestante;
    }else{
      $("#concluircomprabutton").prop("disabled",false);

    }
    document.getElementById('valorrestantemodal').innerHTML = calculovalorrestante.toLocaleString('pt-br', {
      style: 'currency',
      currency: 'BRL'
    });;
  }

  function preenchermetodopag() {
    for (var i = 0; i < metodospagamento.length; i++) {
      document.getElementById('metodopagselect' + (i + 1)).value = metodospagamento[i];
      document.getElementById('qtdpagselect' + (i + 1)).value = qtdmetodospagamento[i];
      document.getElementById('valormetodopag' + (i + 1)).value = valormetodospagamento[i];
      document.getElementById('autopagselect' + (i + 1)).value = autometodospagamento[i];
      document.getElementById('cvpagselect' + (i + 1)).value = cvmetodospagamento[i];
    }
  }

  function apagartabelametodopag() {
    var tableHeaderRowCount = 0;
    var table = document.getElementById('metodopagtablebody');
    var rowCount = table.rows.length;
    for (var i = tableHeaderRowCount; i < rowCount; i++) {
      table.deleteRow(tableHeaderRowCount);
    }
  }

  function visualizarcaixa(){
    $.ajax({
          type: "GET",
          url: "/buscardadoscaixapdv",
          data: {
            caixa_nome : sessionStorage.getItem('caixaaberto')
          },
          dataType: "json",
          success: function(data) {

              if(data[0] == null || data[0] == 'null' || data[0] == 0){
                var valordinheiroatual = 0;
              }else{
                var valordinheiroatual = parseFloat(data[0]);
              }

              if(data[1] == null || data[1] == 'null' || data[1] == 0){
                var valorcartaoatual = 0;
              }else{
                var valorcartaoatual = parseFloat(data[1]);
              }

              if(data[2] == null || data[2] == 'null' || data[2] == 0){
                var valortransfatual = 0;
              }else{
                var valortransfatual = parseFloat(data[2]);
              }

              var valortotalatual = (valorcartaoatual + valordinheiroatual + valortransfatual).toLocaleString('pt-BR', {
                minimumFractionDigits: 2,
                style: 'currency',
                currency: 'BRL'
              });

              valorcartaoatual = valorcartaoatual.toLocaleString('pt-BR', {
                minimumFractionDigits: 2,
                style: 'currency',
                currency: 'BRL'
              });

              valordinheiroatual = valordinheiroatual.toLocaleString('pt-BR', {
                minimumFractionDigits: 2,
                style: 'currency',
                currency: 'BRL'
              });

              valortransfatual = valortransfatual.toLocaleString('pt-BR', {
                minimumFractionDigits: 2,
                style: 'currency',
                currency: 'BRL'
              });

                document.getElementById('dadosgerais').innerHTML = "<b><font size='6'>Valor Total: " + valortotalatual + '</font></b><br>';
                document.getElementById('dadosgerais').innerHTML += "Valor em Dinheiro: " + valordinheiroatual + "<br>";
                document.getElementById('dadosgerais').innerHTML += "Valor em Cartão: " + valorcartaoatual + "<br>";
                document.getElementById('dadosgerais').innerHTML += "Valor em Tranferência: " + valortransfatual + "<br>";
          }
      });
  }

  function filtraradesoes(input){
    if(input.value != ''){
      var tableHeaderRowCount = 0;
      var table = document.getElementById('adesaotable');
      var rowCount = table.rows.length;
      for (var i = tableHeaderRowCount; i < rowCount; i++) {
        table.deleteRow(tableHeaderRowCount);
      }
      for (i = 0; i < adesaoid.length; i++) {
        if(adesaonome[i].toUpperCase().includes(input.value.toUpperCase())){

          var tabela = document.getElementById('adesaotable');
          var numeroLinhas = tabela.rows.length;
          var linha = tabela.insertRow(numeroLinhas);
          var celula1 = linha.insertCell(0);
          var celula2 = linha.insertCell(1);
          var celula3 = linha.insertCell(2);
          var celula4 = linha.insertCell(3);
          var celula5 = linha.insertCell(4);
          var celula6 = linha.insertCell(5);
          if(adesaotipo[i] == 'Adesão'){
            celula1.innerHTML = adesaonome[i];
            celula2.innerHTML = adesaodesc[i];
            celula3.innerHTML = adesaodata[i].split('-')[2]+ '/' + adesaodata[i].split('-')[1]+ '/' + adesaodata[i].split('-')[0];
            celula4.innerHTML = adesaovalor[i].toLocaleString('pt-BR', {
                                  minimumFractionDigits: 2,
                                  style: 'currency',
                                  currency: 'BRL'
                                });
            celula5.innerHTML = adesaoformapagamento[i];
            celula6.innerHTML = "<button type='submit' name='" +
              adesaoid[i] + "' id='" + adesaoid[i] +
              "' class='btn btmenor' value='Confirmar Pagamento' onclick='confirmarpagamendoadesao(this)' style='border:1px solid #198754'><span class='fontebotao' style='font-weight:600!important;color:#198754;font-size:15px!important'>Confirmar</span></button>";
          }else if(adesaotipo[i] == 'Anual'){
            celula1.innerHTML = adesaonome[i];
            celula2.innerHTML = adesaodesc[i];
            celula3.innerHTML = adesaodata[i].split('-')[2]+ '/' + adesaodata[i].split('-')[1]+ '/' + adesaodata[i].split('-')[0];
            celula4.innerHTML = adesaovalor[i].toLocaleString('pt-BR', {
                                  minimumFractionDigits: 2,
                                  style: 'currency',
                                  currency: 'BRL'
                                });
            celula5.innerHTML = adesaoformapagamento[i];
            celula6.innerHTML = "<button type='submit' name='anual" +
              adesaoid[i] + "' id='anual" + adesaoid[i] +
              "' class='btn btmenor' value='Confirmar Pagamento' onclick='confirmarpagamendoadesao(this)' style='border:1px solid #198754'><span class='fontebotao' style='font-weight:600!important;color:#198754;font-size:15px!important'>Confirmar</span></button>";
          }else{
            celula1.innerHTML = adesaonome[i];
            celula2.innerHTML = adesaodesc[i];
            celula3.innerHTML = adesaodata[i].split('-')[2]+ '/' + adesaodata[i].split('-')[1]+ '/' + adesaodata[i].split('-')[0];
            celula4.innerHTML = adesaovalor[i].toLocaleString('pt-BR', {
                                  minimumFractionDigits: 2,
                                  style: 'currency',
                                  currency: 'BRL'
                                });
            celula5.innerHTML = adesaoformapagamento[i];
            celula6.innerHTML = "<button type='submit' name='anual" +
              adesaoid[i] + "' id='mensa" + adesaoid[i] +
              "' class='btn btmenor' value='Confirmar Pagamento' onclick='confirmarpagamendoadesao(this)' style='border:1px solid #198754'><span class='fontebotao' style='font-weight:600!important;color:#198754;font-size:15px!important'>Confirmar</span></button>";
          }
        } 
      }
    }else{
      atualizartabelaadesao();
    }
    
  }

  function selecionarmensalidades(){
    resetmensalidade();
    $('#pesquisarmensalidadesModal').modal('show');
  }
  

  function pesquisarcontrato(){
    dadoslinhascontrato = [];
    apagartabelapesquisarcontrato();
    $.ajax({
      type: "GET",
      url: "/consulta/contrato/dados",
      data: {nometitular: document.getElementById('pesquisarcontratonome').value, cpftitular: document.getElementById('pesquisarcontratocpf').value, cont_id: document.getElementById('pesquisarcontratonumero').value},
      dataType: "json",
      success: function(data) {
        document.getElementById('pesquisarcontratotable').style.display = 'block';
        for(i=0; i<data.length; i++){
          var tabela = document.getElementById('contratotablebody');
          var numeroLinhas = tabela.rows.length;
          var linha = tabela.insertRow(numeroLinhas);
          var celula1 = linha.insertCell(0);
          var celula2 = linha.insertCell(1);   
          var celula3 = linha.insertCell(2); 
          var celula4 = linha.insertCell(3);
          dadoslinhascontrato.push(data[i][0]);
          celula1.innerHTML=data[i][0];
          celula2.innerHTML=data[i][1];
          celula3.innerHTML=data[i][2];
          celula4.innerHTML="<button type='submit' class='btn border border-secondary corbtedit' value='Editar' onclick='editar(this)' name='editareste' id='"+i+"'><span class='fontebotao edit'>Editar</span></button>";
            
        }
      }
    });
  }

  function apagartabelapesquisarcontrato(){
      var tableHeaderRowCount = 1;
      var table = document.getElementById('pesquisarcontratotable');
      var rowCount = table.rows.length;
      for (var i = tableHeaderRowCount; i < rowCount; i++) {
          table.deleteRow(tableHeaderRowCount);
      }
      resetmensalidade();
  }
  
  function apagartabelacobrancascontrato(){
        var tableHeaderRowCount = 0;
        var table = document.getElementById('cobrancascontratotbody');
        var rowCount = table.rows.length;
        for (var i = tableHeaderRowCount; i < rowCount; i++) {
            table.deleteRow(tableHeaderRowCount);
        }
    }

  function editar(linha){
      linha = parseInt(linha.id);
      $.ajax({
          type:'GET',
          url:'/consulta/contrato/dadosedit',
          data: {cont_id: dadoslinhascontrato[linha]},
          dataType: "json",
          success: function(data){
            resetmensalidade();
            cobrancascontrato(data[0]['cont_id']);
          }
      });
  }

  function cobrancascontrato(contratoatual){
        
        $.ajax({
            type: "GET",
            url: "/cobrancascontrato",
            data: {
                contratoatual: contratoatual,
            },
            dataType: "json",
            success: function(data) {
                idcobrancalote= [];
                nomecobrancalote= [];
                contratocobrancalote= [];
                datacobrancalote= [];
                valorcobrancalote= [];
                contlinhasmensalidade = 0;
                apagartabelacobrancascontrato();
                $('#abacobranca').css('display', 'block');

                for(i=0; i<data[1].length; i++){
                    contlinhasmensalidade++;
                    idcobrancalote.push(data[1][i]['idcobranca']);
                    nomecobrancalote.push(data[0][1]);
                    contratocobrancalote.push(data[0][2]);
                    datacobrancalote.push(data[1][i]['data'].split('-')[2] + '/' + data[1][i]['data'].split('-')[1] + '/' + data[1][i]['data'].split('-')[0]);
                    valorcobrancalote.push(parseFloat(data[1][i]['valor']));
                    var tabela = document.getElementById('cobrancascontratotbody');
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
                    celula1.innerHTML="<input type='checkbox' name='checkboxmensalidades' id='checkboxmensalidades" + (numeroLinhas + 1) + "' value='" + (numeroLinhas + 1) + "'>";
                    celula2.innerHTML=data[1][i]['idlote'];
                    celula3.innerHTML=data[1][i]['idcobranca'];
                    celula4.innerHTML=data[1][i]['data'].split('-')[2] + '/' + data[1][i]['data'].split('-')[1] + '/' + data[1][i]['data'].split('-')[0];
                    if(data[1][i]['fechado'] == 0){
                        celula5.innerHTML="<img src='../imagens/close.svg' class='iconscobranca' style='width: 43px;'>";
                    }else{
                        celula5.innerHTML="<img src='../imagens/check.svg' class='iconscobranca' style='width: 43px;'>";
                    }
                    if(data[1][i]['pago'] == 0){
                        celula7.innerHTML="<img src='../imagens/close.svg' class='iconscobranca'>";
                    }else{
                        celula7.innerHTML="<img src='../imagens/check.svg' class='iconscobranca'>";
                    }
                    celula7.innerHTML=data[1][i]['valor'].toLocaleString('pt-br', {
                        style: 'currency',
                        currency: 'BRL'
                    });
                }
            }
        });
    }

  function resetmensalidade(){
    $('#pesquisarcontratotable').css('display', 'none');
    $('#abacobranca').css('display', 'none');
  }

  function adicionarmensalidades(){
    document.querySelectorAll("[name='checkboxmensalidades']")
    .forEach((elemento) => {
      if(elemento.checked == true){
            dadoslinhas1.push('m'+idcobrancalote[elemento.value - 1]);
            nomeprod.push('Mensalidade ' + datacobrancalote[elemento.value - 1] + ' - ' + nomecobrancalote[elemento.value - 1] + ' - ' + contratocobrancalote[elemento.value - 1]);
            qtdprod.push(1);
            valorunitprod.push(valorcobrancalote[elemento.value - 1]);
            valortotprod.push(valorcobrancalote[elemento.value - 1]);
          }
        });
    refazertabelapdv();
  }

  function concluircompra() {
    var valoresunicos = [];
    document.querySelectorAll("[name='valortotalprod']")
    .forEach((elemento) => {
        valoresunicos.push(elemento.value);
    });
    // console.log($("[name='valortotalprod']").val());
    // console.log(valoresunicos);
    $.ajax({
      type: "GET",
      url: "/pdvconcluirpagamento",
      data: {
        qtd: qtdprod,
        deppagid: deppagidatual,
        caixaatual: sessionStorage.getItem("caixaaberto"),
        iditems: dadoslinhas1,
        valoresunicos: valoresunicos,
        valortotal: valortotal,
        metodospagamento: metodospagamento,
        qtdmetodospagamento: qtdmetodospagamento,
        valormetodospagamento: valormetodospagamento,
        autometodospagamento: autometodospagamento,
        cvmetodospagamento: cvmetodospagamento,
      },
      dataType: "json",
      success: function(data) {
          window.open(window.location.href + '/recibo');
          seqtable = 0;
          valortotal = 0;
          nomeprod = [];
          qtdprod = [];
          valorunitprod = [];
          valortotprod = [];
          tipoprod = [];
          inclusoprod = [];
          dadoslinhas1 = [];
          metodospagamento = [];
          qtdmetodospagamento = [];
          valormetodospagamento = [];
          autometodospagamento = [];
          cvmetodospagamento = [];
          contlinhas = 0;
          linhas = [];
          apagartabelapdv();
          apagartabelametodopag();
          checarlistmetodopag();
          document.getElementById('valortotaldiv').innerHTML = "R$0,00";
          document.getElementById('valortroco').innerHTML = "";
          document.getElementById('pagoinput').value = '';
          $('#metodopagModal').modal('hide');
          $('#pagamentoConcluidoModal').modal('show');
          visualizarcaixa();
      }
    });
  }

  function chamar(celula) {
    // console.log(deppagnome[celula.id.substr(9)]);
    $.ajax({
      type: "GET",
      url: "/pdvchamar",
      data: {
        pessoa: deppagnome[celula.id.substr(9)].split(' - ')[0],
        lugar: 'Caixa'
      },
      dataType: "json",
      success: function(data) {
        console.log('Pessoa Chamada');
      }
    });
  }
</script>
@endsection