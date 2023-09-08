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

    <!-- css da página -->
    <link rel="stylesheet" href="{{asset('../css/estilo.css')}}">
    <!-- <link rel="stylesheet" href="{{asset('../css/cssgeral.css')}}">
    <link rel="stylesheet" href="{{asset('../css/consultas.css')}}"> -->

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

   <script src="{{asset('jquery.min.js')}}"></script>
   <script src="{{asset('jquery-ui-1.12.1/jquery-ui.js')}}"></script>
   <script src="{{asset('inputmask/dist/jquery.inputmask.min.js')}}"></script>
   <script src="{{asset('inputmask/dist/bindings/inputmask.binding.js')}}"></script>

   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

   <title>Consulta Contrato</title>

   <style>
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

      .container-fluid {
        margin-top: 2rem;
      }
      .wrapper {
      /* max-height: 120px; */
      display: flex;
      overflow: hidden;
      overflow-x: auto;
      white-space: nowrap;
      width: 72rem;
      /* margin-left: 2rem; */
    }

    .wrapper .itemm {
      /* min-width: 15rem; */
      height: 40px;
      /* text-align: center; */
      /* background-color: #ddd; */
      /* margin-right: 10px; */
      display: flex;
      justify-content: space-evenly;
      align-items: center;
      border-radius: 5px;
    }

    .wrapper::-webkit-scrollbar {
      width: 16px;
      display: none;
    }

    .testinhoz .row{
      margin-bottom:2rem;
    }

    .teste{
      display: flex;
      align-items: center;
      justify-content: space-evenly;
    }
   </style>
</head>

<body>
  @section('Conteudo')
  <div class="tituloprincipal container-fluid">Pesquisa Contrato</div>
  <br><br>

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
      <div class="col-sm-3 col-md-2 col-lg-2">
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
   
  <div class="container-fluid testinhoz" style='margin-top:1rem;'>
    
    <div class="row gx-3 gy-3" id='opcoescontratocobranca'>
      <div class="col-sm-5 col-md-4 col-lg-1">
        <div><h3>Dados</h3></div>
      </div>
      <div class="col-sm-5 col-md-4 col-lg-2 teste">
        <input type="radio" name="tabs" class="rd_tab" id="tab1" value='tab1' onclick="vercontratocobranca('tab1')"/>
        <label for="tab1" class="tab_label" style='width: 8rem;'>Contrato</label>
      </div>
      <div class="col-sm-5 col-md-4 col-lg-2 teste">
        <input type="radio" name="tabs" class="rd_tab" id="tab2" value='tab2' onclick="vercontratocobranca('tab2')"/>
        <label for="tab2" class="tab_label" style='width: 8rem;'>Cobrança</label>
      </div>
      <div class="col-sm-5 col-md-4 col-lg-2 teste">
        <input type="radio" name="tabs" class="rd_tab" id="tab3" value='tab3' onclick="vercontratocobranca('tab3')"/>
        <label for="tab3" class="tab_label" style='width: 8rem;'>Pessoas</label>
      </div>
    </div>

    <div class='input abacobranca' id='abacobranca'>
      <div class="container-fluid">
        <div id='tabela' class="table-responsive">
            <table id='' class="table">
                <thead class="table-active">
                    <tr>
                        <td scope="col">ID Lote</td>
                        <td scope="col">ID Cobrança</td>
                        <td scope="col">Responsável</td>
                        <td scope="col">Vencimento</td>
                        <td scope="col">Fechado</td>
                        <td scope="col">Pago</td>
                        <td scope="col">Valor</td>
                        <td scope="col">Ação</td>
                    </tr>
                </thead>
                <tbody id='cobrancascontratotbody' style='text-align:center'>

                </tbody>
            </table>
        </div>
      </div>
    </div>

    <div class='input abapessoas' id='abapessoas'>
      <div class="container-fluid">
        <div class="row gx-3 gy-3">
          <div class="col-sm-5 col-md-4 col-lg-4">
            <label for="pesquisatitunome" class="form-label">Nome</label>
            <input type="text" class="form-control" name='pesquisatitunome' id='pesquisatitunome'/>
          </div>
          <div class="col-sm-3 col-md-2 col-lg-2">
            <label for="pesquisatitucpfcnpj" class="form-label">CPF/CNPJ</label>
            <input type="text" class="form-control" name='pesquisatitucpfcnpj' id='pesquisatitucpfcnpj' />  
          </div>
          <div class="col-sm-3 col-md-2 col-lg-2" style='display: flex;align-self: end;'>
            <button type="submit" class="btn btamarelo" value='Pesquisar' onclick='pesquisartitu()'>
              <span class="fontebotao">Pesquisar</span>
            </button>
          </div>
        </div>
        <div class="row gx-3 gy-3">
          <div class='input' id='tabelaescolhertitular'>
            <div id='tabela' class="table-responsive-sm">
              <table id='' class="table">
                <thead class="table-active">
                  <tr>
                    <td>CPF/CNPJ</td>
                    <td>Nome</td>
                    <td>Tipo de Pessoa</td>
                    <td>Adicionar</td>
                  </tr>
                </thead>
                <tbody id='tabelapesquisatitular'>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        
        <div class="row gx-3 gy-3">
          <div id='tabela' class="table-responsive-sm">
            <table id='tabelatitular' class="table">
              <thead class="table-active">
                <tr>
                  <td>CPF/CNPJ</td>
                  <td>Nome</td>
                  <td>Tipo de Pessoa</td>
                  <td>Editar</td>
                </tr>
                </thead>
                <tbody id='tabelatitularbody'>
                </tbody>
            </table>
          </div>
        </div>

        <div class="row gx-3 gy-3">
          <div class="col-sm-5 col-md-4 col-lg-3">
            <label for="pesquisadepnome" class="form-label">Nome do Dependente</label>
            <input type="text" class="form-control" name='pesquisadepnome' id='pesquisadepnome'/>
          </div>
          <div class="col-sm-3 col-md-2 col-lg-2">
            <label for="pesquisadepcpfcnpj" class="form-label">CPF/CNPJ</label>
            <input type="text" class="form-control" name='pesquisadepcpfcnpj' id='pesquisadepcpfcnpj' />
          </div>
          <div class="col-sm-3 col-md-2 col-lg-2" style='display: flex;align-self: end;'>
            <button type="submit" class="btn btamarelo" value='Pesquisar' onclick='pesquisardep()'>
              <span class="fontebotao">Pesquisar</span>
            </button>
          </div>
        </div>  

        <div class="row gx-3 gy-3">
          <div class="col-sm-3 col-md-2 col-lg-2">
            <div id='tabela' class="table-responsive-sm">
              <table id='tabelapesquisadependentes' class="table">
                <thead class="table-active">
                  <tr>
                    <td>CPF/CNPJ</td>
                    <td>Nome</td>
                    <td>Tipo de Pessoa</td>
                    <td>Adicionar</td>
                  </tr>
                  </thead>
                  <tbody id='tabelapesquisadependentesbody'>
                  </tbody>
              </table>
            </div>
          </div>
        </div>
      
        <div class="row gx-3 gy-3">
          <div id='alertamaximodep' class='container-fluid'></div>
        </div>

        <div class="row gx-3 gy-3">
          <div class="col-sm-3 col-md-2 col-lg-4">
            <div id='tabela' class="table-responsive-sm">
              <table id='tabeladependentes' class="table">
                <thead class="table-active">
                  <tr>
                    <td>CPF/CNPJ</td>
                    <td>Nome</td>
                    <td>Tipo de Pessoa</td>
                    <td>Ações</td>
                  </tr>
                </thead>
                <tbody id='tabeladependentesbody'>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div id='tudo'>

      <div class="row gx-3 gy-3">
        <div class="col-sm-5 col-md-4 col-lg-3">
          <label for="pesquisarplannome" class="form-label">Nome do Plano</label>
          <input type="text" class="form-control" name='pesquisarplannome' id='pesquisarplannome'/>
        </div>
        <div class="col-sm-3 col-md-2 col-lg-2" style='display: flex;align-self: end;'>
          <button type="submit" class="btn btamarelo" value='Pesquisar' onclick='pesquisarplano()'>
            <span class="fontebotao">Pesquisar</span>
          </button>
        </div>

        <div class="col-sm-5 col-md-4 col-lg-3">
          <div class="input" id='tabelaescolherplano'>
            <div id='tabela' class="table-responsive-sm">
              <table id='' class="table">
                <thead class="table-active">
                  <tr>
                    <td>Nome</td>
                    <td>Descrição</td>
                    <td>Dependentes</td>
                    <td>Boleto</td>
                    <td>Cartão</td>
                    <td>Adesao</td>
                    <td>Adicionar</td>
                  </tr>
                </thead>
                <tbody id='tabelapesquisaplanos'>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

      <div class="row gx-3 gy-3">
        <div id="planoselecionado">
          <div id='tabela' class="table-responsive-sm">
            <table id='tabelaplanoselecionado' class="table">
              <thead class="table-active">
                <tr>
                  <td>Nome</td>
                  <td>Descrição</td>
                  <td>Dependentes</td>
                  <td>Boleto</td>
                  <td>Cartão</td>
                  <td>Adesao</td>
                  <td>Editar</td>
                  </tr>
              </thead>
              <tbody id='tabelaplanoselecionadobody'>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <div class="row gx-3 gy-3" id="diapag">
        <div class="col-sm-3 col-md-2 col-lg-3">
          <label for="diapaginput" class="form-label">Dia do Pagamento</label>
          <input type="number" class="form-control" name='diapag' id='diapaginput'/>
        </div>
      </div>

      <div class="row gx-3 gy-3" id="datainicio">
        <div class="col-sm-3 col-md-2 col-lg-3">
          <label for="datainicioinput" class="form-label">Data Inicio</label>
          <input type="date" class="form-control" name='datainicio' id='datainicioinput'/>
        </div>
      </div>

      <div class="row gx-3 gy-3" id="assinatura">
        <div class="col-sm-3 col-md-2 col-lg-4">
          <img id='assinaturadigital'></img>
          <div id='semassinatura'>Este contrato não possui assinatura digital.</div>
        </div>
      </div>

      <div class="row gx-3 gy-3">
        <div class='' id="editarbotao">
          <div class="col-sm-4 col-md-3 col-lg-2"  id='editar'>
            <button type="submit" name='editar' id='editar' class='input btn btn-success' value='Editar Contrato' onclick='editarcontrato()'  style="margin-bottom: 1rem">
              <span class="fontebotao">Salvar Alterações</span>
            </button>
          </div>
          <div class="col-sm-4 col-md-3 col-lg-3" id='excluir'>
            <button type="submit" class="btn btdelete" name='excluircontrato' value='Excluir Contrato' id='excluircontrato' onclick='excluirContrato()'>
              <span class="fontebotao">Excluir Contrato</span>
            </button>
          </div>
        <!-- </div> -->
      </div>
    </div>
    
  </div>

  <!-- Modal -->
  <div class="modal fade" id="addTitularModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Selecionar Titular</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="transformdiv">
            <div class="coluna divexternanome">
              <span class="nomesinputs">Nome do Titular</span>
              <input type="text" class="inputstexttelas" name='pesquisatitunomemodal' id='pesquisatitunomemodal'>
            </div>
        
            <div class="coluna">
              <span class="nomesinputs">CPF ou CNPJ</span>
              <div class="transformdiv">
                <input type='text' class='inputstexttelas inputtextcc' name='pesquisatitucpfcnpjmodal' id='pesquisatitucpfcnpjmodal'>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <button type="submit" class="btn btamarelo" value='Pesquisar' onclick='pesquisartitumodal()'>
                    <span class="selectacoes">Pesquisar</span>
                </button>
              </div>
            </div>   
          </div>
          <br><br>
          <div id='tabelaedittitular' class="input">
            <div id='tabela' class='table-responsive-sm'>
              <table id='' class="table">
                <thead class="table-active">
                  <tr>
                    <td>CPF/CNPJ</td>
                    <td>Nome</td>
                    <td>Tipo de Pessoa</td>
                    <td>Adicionar</td>
                  </tr>
                </thead>
                <tbody id='tabelapesquisatitularmodal'>
          
                </tbody>
              </table>
            </div> 
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
          <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Salvar</button>
        </div>
      </div>
    </div>
  </div>
  
    <!-- Modal -->
  <div class="modal fade" id="selecPlanModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Selecionar Plano</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="coluna divexternanome">
            <span class="nomesinputs">Nome do Plano</span>
            <div class="transformdiv">
              <input type="text" class="inputstexttelas" name='pesquisarplannomemodal' id='pesquisarplannomemodal'>
              &nbsp;&nbsp;&nbsp;&nbsp;
              <button type="submit" class="btn btamarelo" value='Pesquisar' onclick='pesquisarplanomodal()'>
                <span class="selectacoes">Pesquisar</span>
              </button>
            </div>
          </div>
          <br><br> 
          <div class='input' id='tabelaeditplano'>
            <div id='tabela' class='table-responsive-sm'>
              <table id='' class="table">
                <thead class="table-active">
                  <tr>
                    <td>Nome</td>
                    <td>Descrição</td>
                    <td>Dependentes</td>
                    <td>Valor</td>
                    <td>Adicionar</td>
                  </tr>
                </thead>
                <tbody id='tabelapesquisaplanosmodal'>
          
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
          <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Salvar</button>
        </div>
      </div>
    </div>
  </div>
  
    <!-- Modal -->
  <div class="modal fade" id="DepEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Selecionar Dependentes</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class='transformdiv'>
            <div class="coluna divexternanome">
              <span class="nomesinputs">Nome do Dependente</span>
              <input type="text" class="inputstexttelas" name='pesquisadepeditnome' id='pesquisadepeditnome'>
            </div>
            <div class="coluna">
              <span class="nomesinputs">CPF ou CNPJ</span>
              <div class="transformdiv">
                <input type='text' class='inputstexttelas inputtextcc' name='pesquisadepeditcpfcnpj' id='pesquisadepeditcpfcnpj'>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <button type="submit" class="btn btamarelo" value='Pesquisar' onclick='pesquisardepedit()'>
                    <span class="selectacoes">Pesquisar</span>
                </button>
              </div>
            </div>
          </div>
          <br><br>
          <div class='input' id=''>
            <div id='tabela' class='table-responsive-sm'>
              <table id='tabelaeditdependente' class="table">
                <thead class="table-active">
                  <tr>
                    <td>CPF/CNPJ</td>
                    <td>Nome</td>
                    <td>Tipo de Pessoa</td>
                    <td>Adicionar</td>
                  </tr>
                </thead>
                <tbody id='tabelapesquisaeditdependentes'>
          
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
          <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Salvar</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edição</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <div id=''> Contrato editado com sucesso</div>
          </div>
          <div class="modal-footer">
              <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
              <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Ok</button>
          </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="excluirContratoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered  modal-dialog-scrollable">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Excluir Contrato</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <b>Tem certeza que deseja excluir esse contrato e suas cobranças restantes?(OBS: Este processo é irreversível)</b>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                  <button type="button" class="btn btn-primary" onclick='excluirContratoConfirm()'>Excluir Contrato</button>
              </div>
          </div>
      </div>
  </div>

  <div class="modal fade" id="excluirSucessoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Excluido com Sucesso!</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div id='pacientecad'>Contrato excluida com sucesso!</div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="refresh()">Fechar</button>
          <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
        </div>
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
  
</body>

<script>
  $('.input').css('display', 'block');
    reset();
    escondertabela();
    var contratoatual = 0;
    var dadoslinhas = [];
    var qtddepplano = 0;
    var idplanoselec = 0;
    var dadoslinhasdep = [];
    var dadoslinhastitu = [];
    var dadoslinhasplan = [];
    var contlinhas = 0;
    var contlinhas1 = 0;
    var dadosdep = [];
    var dadosdep2 = [];
    var dadostitu = [];
    var dadostitu2 = [];
    var selectitu = [];
    var selecdep = [];
    var dadoslinhaseditdep = [];
    var linhaeditdep = 0;
    var dadoseditdep = [];
    var dadoseditdep2 = [];
    var permissaoeditarexcluir = 0;

    var idcobrancalote= [];
    var valorcobrancalote= [];
    var pagamentometodo = [];
    var pagamentovalor = [];
    var pagamentoparcela = [];
    var pagamentoauto = [];
    var pagamentocv = [];
    var pagamentoatual = 0;
    var valorpagamentoatual = 0;
    var valorpagamentosomado = 0;

    if({{Auth::user()->user_tipo}} != 2){
        $.ajax({
        type: "GET",
        url: "/buscarpermissoes",
        data: {userid: {{Auth::user()->user_tipo}}},
        dataType: "json",
        success: function(data) {
          if(data.indexOf('5.2') != -1){
            permissaoeditarexcluir = 1;
          }
        }
      });
    }else{
      permissaoeditarexcluir = 1;
    }

    $("input[id*='pesquisadepcpfcnpj']").inputmask({
        mask: ['999.999.999-99', '99.999.999/9999-99'],
        keepStatic: true
    });
    $("input[id*='pesquisatitucpfcnpj']").inputmask({
        mask: ['999.999.999-99', '99.999.999/9999-99'],
        keepStatic: true
    });

    function reset(){
      $('#tabelaedittitular').css('display', 'none');
      $('#tabelaeditdependente').css('display', 'none');
      $('#tabelaeditplano').css('display', 'none');
      $('#tudo').css('display', 'none');
      $('#tabelaescolhertitular').css('display', 'none');
      $('#tabelaescolherplano').css('display', 'none');
      $('#tabelapesquisadependentes').css('display', 'none');
      $('#diapag').css('display', 'none');
      $('#datainicio').css('display', 'none');
      $('#opcoescontratocobranca').css('display', 'none');
      $('#abacobranca').css('display', 'none');
      $('#abapessoas').css('display', 'none');
    }

    function escondertabela(){
        $('#tabela').css('display', 'none');
    }

    $. extend ( $. ui . autocomplete . prototype . options ,  { 
      open :  function ( event , ui )  { 
        $ ( this ) . autocomplete ( "widget" ) . css ( { 
                "width" :  ( $ ( this ) . width ( )  +  "px" ) 
            } ) ; 
        } 
    });

    $('#pesquisarcontratonome').keyup(function(){
    var nome = $('#pesquisarcontratonome').val();
    var nomes = [];
    if(nome.length >= 2){
        $.ajax({
            type:'GET',
            url:'pessoa/nome',
            data: {nomepessoa:nome},
            dataType: "json",
            success: function(data){
                for(i=0; i<data.length; i++){
                    if(data[i]['pac_nome']){
                        nomes.push(data[i]['pac_nome']);
                    }else if(data[i]['forfis_nome']){
                        nomes.push(data[i]['forfis_nome']);
                    }else if(data[i]['func_nome']){
                        nomes.push(data[i]['func_nome']);
                    }else if(data[i]['forjur_nome']){
                        nomes.push(data[i]['forjur_nome']);
                    }else if(data[i]['clijur_nome']){
                        nomes.push(data[i]['clijur_nome']);
                    }
                }
                nomes = nomes.filter((este, i) => nomes.indexOf(este) === i);
                $("#pesquisarcontratonome").autocomplete({
                    source: nomes
                    });
            }

        });

    }

    });

    function refresh(){
      window.location.reload();
    }

    function pesquisarcontrato(){
      apagartabela();
      $.ajax({
        type: "GET",
        url: "/consulta/contrato/dados",
        data: {nometitular: document.getElementById('pesquisarcontratonome').value, cpftitular: document.getElementById('pesquisarcontratocpf').value, cont_id: document.getElementById('pesquisarcontratonumero').value},
        dataType: "json",
        success: function(data) {
          document.getElementById('tabela').style.display = 'block';
          for(i=0; i<data.length; i++){
            var tabela = document.getElementById('contratotablebody');
            var numeroLinhas = tabela.rows.length;
            var linha = tabela.insertRow(numeroLinhas);
            var celula1 = linha.insertCell(0);
            var celula2 = linha.insertCell(1);   
            var celula3 = linha.insertCell(2); 
            var celula4 = linha.insertCell(3);
            dadoslinhas.push(data[i][0]);
            celula1.innerHTML=data[i][0];
            celula2.innerHTML=data[i][1];
            celula3.innerHTML=data[i][2];
            celula4.innerHTML="<button type='submit' class='btn border border-secondary corbtedit' value='Editar' onclick='editar(this)' name='editareste' id='"+i+"'><span class='fontebotao edit'>Editar</span></button>";
              
          }
        }
      });
    }

    function editar(linha){
        linha = parseInt(linha.id);
        $.ajax({
            type:'GET',
            url:'contrato/dadosedit',
            data: {cont_id: dadoslinhas[linha]},
            dataType: "json",
            success: function(data){
                esconder(data[0]);
            }
        });
    }

    function vercontratocobranca(opcao){

      if(opcao == 'tab1' || opcao == undefined){

        document.getElementById('abacobranca').style.display = 'none';
        document.getElementById('abapessoas').style.display = 'none';
        document.getElementById('tudo').style.display = 'block';

      }else if(opcao == 'tab2'){

        document.getElementById('abacobranca').style.display = 'block';
        document.getElementById('abapessoas').style.display = 'none';
        document.getElementById('tudo').style.display = 'none';

      }

      else if(opcao == 'tab3'){

        document.getElementById('abacobranca').style.display = 'none';
        document.getElementById('abapessoas').style.display = 'block';
        document.getElementById('tudo').style.display = 'none';

      }

    }

    function esconder(dados) {
        contratoatual = dados['cont_id'];
        escondertabela();
        cobrancascontrato();
        vercontratocobranca();

        document.getElementById('opcoescontratocobranca').style.display = 'block';

        document.getElementById('tab1').checked = true;

        document.getElementById('diapag').style.display = 'block';

        document.getElementById('datainicio').style.display = 'block';
        
        document.getElementById('editarbotao').style.display = 'block';
        if(dados['cont_assinatura'] != '' && dados['cont_assinatura'] != null){
          document.getElementById('assinaturadigital').style.display = 'block';
          document.getElementById('semassinatura').style.display = 'none';
        }else{
          document.getElementById('semassinatura').style.display = 'block';
          document.getElementById('assinaturadigital').style.display = 'none';
        }
        document.getElementById('assinaturadigital').src = dados['cont_assinatura'];
        document.querySelector("[name='diapag']").value = dados['cont_diapag'];
        document.querySelector("[name='datainicio']").value = dados['cont_datainicio'];
        $.ajax({
                type: "GET",
                url: "/consulta/contrato/plano",
                data: {plan_id: dados['cont_plano']},
                dataType: "json",
                success: function(data) {

                  var tableHeaderRowCount = 1;
                  var table = document.getElementById('tabelaplanoselecionado');
                  var rowCount = table.rows.length;
                  for (var i = tableHeaderRowCount; i < rowCount; i++) {
                      table.deleteRow(tableHeaderRowCount);
                  }
                  console.log(data);
                  var tabela = document.getElementById('tabelaplanoselecionadobody');
                  var numeroLinhas = tabela.rows.length;
                  var linha = tabela.insertRow(numeroLinhas);
                  var celula1 = linha.insertCell(0);
                  var celula2 = linha.insertCell(1);   
                  var celula3 = linha.insertCell(2); 
                  var celula4 = linha.insertCell(3);
                  var celula5 = linha.insertCell(4);
                  var celula6 = linha.insertCell(5);
                  var celula7 = linha.insertCell(6);
                  celula1.innerHTML=data[0]['plan_nome'];
                  celula2.innerHTML=data[0]['plan_desc'];
                  celula3.innerHTML=data[0]['plan_qtddep'];
                  celula4.innerHTML=data[0]['plan_valorboleto'].toLocaleString('pt-br', {
                    style: 'currency',
                    currency: 'BRL'
                  });
                  celula5.innerHTML=data[0]['plan_valorcartao'].toLocaleString('pt-br', {
                    style: 'currency',
                    currency: 'BRL'
                  });
                  celula6.innerHTML=data[0]['plan_adesao'].toLocaleString('pt-br', {
                    style: 'currency',
                    currency: 'BRL'
                  });
                  celula7.innerHTML="<button type='submit' class='btn border border-secondary corbtedit' value='Editar' onclick='editarplan()' name='selecionaresteplan' id='"+i+"'><span class='fontebotao edit'>Editar</span></button>";
 
                  // document.getElementById("planoselecionado").innerHTML = "O plano selecionado foi: <b>" +data[0]['plan_nome']+"</b><br>A quantidade máxima de dependentes é: <b>"+data[0]['plan_qtddep']+"</b>.";
                  qtddepplano = data[0]['plan_qtddep'];
                  idplanoselec = data[0]['plan_id'];
                  $('#PlanoModal').modal('hide');
                  apagartabelaplano();
                  document.getElementById('alertamaximodep').innerHTML = "";
                }
          });

          $.ajax({
            type: "GET",
            url: "/consulta/contratotitu/dados",
            data: {cont_id: dados['cont_id']},
            dataType: "json",
            success: function(data) {
              if(data[0]['pac_nome']){
                var nomepessoadados = data[0]['pac_nome'];
                var cpfcnpjpessoadados = data[0]['pac_cpf'];
                var tipopessoadados = 'Física';
              }else if(data[0]['forfis_nome']){
                var nomepessoadados = data[0]['forfis_nome'];
                var cpfcnpjpessoadados = data[0]['forfis_cpf'];
                var tipopessoadados = 'Física';
              }else if(data[0]['func_nome']){
                var nomepessoadados = data[0]['func_nome'];
                var cpfcnpjpessoadados = data[0]['func_cpf'];
                var tipopessoadados = 'Física';
              }else if(data[0]['forjur_nome']){
                var nomepessoadados = data[0]['forjur_nome'];
                var cpfcnpjpessoadados = data[0]['forjur_cnpj'];
                var tipopessoadados = 'Jurídica';
              }else if(data[0]['clijur_nome']){
                var nomepessoadados = data[0]['clijur_nome'];
                var cpfcnpjpessoadados = data[0]['clijur_cnpj'];
                var tipopessoadados = 'Jurídica';
              }

              var tableHeaderRowCount = 1;
              var table = document.getElementById('tabelatitular');
              var rowCount = table.rows.length;
              for (var i = tableHeaderRowCount; i < rowCount; i++) {
                  table.deleteRow(tableHeaderRowCount);
              }
              
              var tabela = document.getElementById('tabelatitularbody');
              var numeroLinhas = tabela.rows.length;
              var linha = tabela.insertRow(numeroLinhas);
              var celula1 = linha.insertCell(0);
              var celula2 = linha.insertCell(1);   
              var celula3 = linha.insertCell(2); 
              var celula4 = linha.insertCell(3);
              celula1.innerHTML=cpfcnpjpessoadados;
              celula2.innerHTML=nomepessoadados;
              celula3.innerHTML=tipopessoadados;
              celula4.innerHTML="<button type='submit' class='btn border border-secondary corbtedit' value='Editar' onclick='editartitu()' name='selecionarestetitu' id='"+i+"'><span class='fontebotao edit'>Editar</span></button>";
              $('#addTitularModal').modal('hide');
              apagartabelatitu();
              selectitu = [cpfcnpjpessoadados, nomepessoadados, tipopessoadados];

            }
          });

          apagartabeladepdados();
              $.ajax({
                type: "GET",
                url: "/consulta/contratodep/dados",
                data: {cont_id: dados['cont_id']},
                dataType: "json",
                success: function(data) {
                  console.log(data);
                  for(var i = 0; i<data.length; i++){
                    if(data[i][0]['pac_nome']){
                    var nomepessoadados = data[i][0]['pac_nome'];
                    var cpfcnpjpessoadados = data[i][0]['pac_cpf'];
                    var tipopessoadados = 'Física';
                    }else if(data[i][0]['forfis_nome']){
                      var nomepessoadados = data[i][0]['forfis_nome'];
                      var cpfcnpjpessoadados = data[i][0]['forfis_cpf'];
                      var tipopessoadados = 'Física';
                    }else if(data[i][0]['func_nome']){
                      var nomepessoadados = data[i][0]['func_nome'];
                      var cpfcnpjpessoadados = data[i][0]['func_cpf'];
                      var tipopessoadados = 'Física';
                    }else if(data[i][0]['forjur_nome']){
                      var nomepessoadados = data[i][0]['forjur_nome'];
                      var cpfcnpjpessoadados = data[i][0]['forjur_cnpj'];
                      var tipopessoadados = 'Jurídica';
                    }else if(data[i][0]['clijur_nome']){
                      var nomepessoadados = data[i][0]['clijur_nome'];
                      var cpfcnpjpessoadados = data[i][0]['clijur_cnpj'];
                      var tipopessoadados = 'Jurídica';
                    }
                    var tabela = document.getElementById('tabeladependentesbody');
                    var numeroLinhas = tabela.rows.length;
                    var linha = tabela.insertRow(numeroLinhas);
                    var celula1 = linha.insertCell(0);
                    var celula2 = linha.insertCell(1);   
                    var celula3 = linha.insertCell(2); 
                    var celula4 = linha.insertCell(3);
                    celula1.innerHTML=cpfcnpjpessoadados;
                    celula2.innerHTML=nomepessoadados;
                    celula3.innerHTML=tipopessoadados;
                    celula4.innerHTML="<button type='submit' class='btn border border-secondary corbtedit' value='Editar' onclick='editardep(this)' name='selecionareste"+numeroLinhas+"' id='"+numeroLinhas+"'><span class='fontebotao edit'>Editar</span></button>&nbsp&nbsp<button type='submit' class='btn btdelete' value='Remover' onclick='deletarlinhadep(this)' name='remover"+numeroLinhas+"' id='"+numeroLinhas+"'><span class='fontebotao' style='font-weight:400!important;'>Remover</span></button>";
                    selecdep.push([cpfcnpjpessoadados, nomepessoadados, tipopessoadados]);
                  }
                  
                  $('#DepModal').modal('hide');
                  apagartabeladep();

                }
            });
          
        if(permissaoeditarexcluir == 1){
          $('[name*="remover"]').prop( "disabled", false );
          $('[name*="selecionareste"]').prop( "disabled", false );
          $('[name="selecionarestetitu"]').prop( "disabled", false );
          $('[name="selecionaresteplan"]').prop( "disabled", false );
          $('[name="diapag"]').prop( "disabled", false );
          $('[name="datainicio"]').prop( "disabled", false );
          $('[name="pesquisatitunome"]').prop( "disabled", false );
          $('[name="pesquisatitucpfcnpj"]').prop( "disabled", false );
          $('[name="pesquisartitu"]').prop( "disabled", false );
          $('[name="pesquisarplan"]').prop( "disabled", false );
          $('[name="pesquisarplannome"]').prop( "disabled", false );
          $('[name="pesquisardep"]').prop( "disabled", false );
          $('[name="pesquisardepnome"]').prop( "disabled", false );
          $('[name="pesquisardepcpfcnpj"]').prop( "disabled", false );
          $('[name="editar"]').prop( "disabled", false );
          $('[name="excluircontrato"]').prop( "disabled", false );
        }else{
          $('[name*="remover"]').prop( "disabled", true );
          $('[name*="selecionareste"]').prop( "disabled", true );
          $('[name="selecionaresteplan"]').prop( "disabled", true );
          $('[name="selecionarestetitu"]').prop( "disabled", true );
          $('[name="diapag"]').prop( "disabled", true );
          $('[name="datainicio"]').prop( "disabled", true );
          $('[name="pesquisatitunome"]').prop( "disabled", true );
          $('[name="pesquisatitucpfcnpj"]').prop( "disabled", true );
          $('[name="pesquisartitu"]').prop( "disabled", true );
          $('[name="pesquisarplan"]').prop( "disabled", true );
          $('[name="pesquisarplannome"]').prop( "disabled", true );
          $('[name="pesquisardep"]').prop( "disabled", true );
          $('[name="pesquisadepnome"]').prop( "disabled", true );
          $('[name="pesquisadepcpfcnpj"]').prop( "disabled", true );
          $('[name="editar"]').prop( "disabled", true );
          $('[name="excluircontrato"]').prop( "disabled", true );
        }
    }

    function apagartabela(){
        var tableHeaderRowCount = 1;
        var table = document.getElementById('pesquisarcontratotable');
        var rowCount = table.rows.length;
        for (var i = tableHeaderRowCount; i < rowCount; i++) {
            table.deleteRow(tableHeaderRowCount);
        }
        reset();
    }

    function apagartabelacobrancascontrato(){
        var tableHeaderRowCount = 0;
        var table = document.getElementById('cobrancascontratotbody');
        var rowCount = table.rows.length;
        for (var i = tableHeaderRowCount; i < rowCount; i++) {
            table.deleteRow(tableHeaderRowCount);
        }
    }
    

    function apagartabeladep(){
        var tableHeaderRowCount = 1;
        var table = document.getElementById('tabelapesquisadependentes');
        var rowCount = table.rows.length;
        for (var i = tableHeaderRowCount; i < rowCount; i++) {
            table.deleteRow(tableHeaderRowCount);
        }
    }

    function apagartabeladepdados(){
        var tableHeaderRowCount = 1;
        var table = document.getElementById('tabeladependentes');
        var rowCount = table.rows.length;
        for (var i = tableHeaderRowCount; i < rowCount; i++) {
            table.deleteRow(tableHeaderRowCount);
        }
        selecdep = [];
    }

    function apagartabeladependentes(){
        var tableHeaderRowCount = 1;
        var table = document.getElementById('tabeladependentes');
        var rowCount = table.rows.length;
        for (var i = tableHeaderRowCount; i < rowCount; i++) {
            table.deleteRow(tableHeaderRowCount);
        }
    }

    function apagartabeladepedit(){
        var tableHeaderRowCount = 0;
        var table = document.getElementById('tabelapesquisaeditdependentes');
        var rowCount = table.rows.length;
        for (var i = tableHeaderRowCount; i < rowCount; i++) {
            table.deleteRow(tableHeaderRowCount);
        }
    }

    function apagartabelatitu(){
        var tableHeaderRowCount = 0;
        var table = document.getElementById('tabelapesquisatitular');
        var rowCount = table.rows.length;
        for (var i = tableHeaderRowCount; i < rowCount; i++) {
            table.deleteRow(tableHeaderRowCount);
        }
    }

    function apagartabelaplano(){
        var tableHeaderRowCount = 0;
        var table = document.getElementById('tabelapesquisaplanos');
        var rowCount = table.rows.length;
        for (var i = tableHeaderRowCount; i < rowCount; i++) {
            table.deleteRow(tableHeaderRowCount);
        }
    }

    function apagartabelaplanomodal(){
        var tableHeaderRowCount = 0;
        var table = document.getElementById('tabelapesquisaplanosmodal');
        var rowCount = table.rows.length;
        for (var i = tableHeaderRowCount; i < rowCount; i++) {
            table.deleteRow(tableHeaderRowCount);
        }
    }
    function apagartabelatitumodal(){
        var tableHeaderRowCount = 0;
        var table = document.getElementById('tabelapesquisatitularmodal');
        var rowCount = table.rows.length;
        for (var i = tableHeaderRowCount; i < rowCount; i++) {
            table.deleteRow(tableHeaderRowCount);
        }
    }
    function apagartabelaplanoselecionado(){
      var tableHeaderRowCount = 0;
        var table = document.getElementById('tabelaplanoselecionado');
        var rowCount = table.rows.length;
        for (var i = tableHeaderRowCount; i < rowCount; i++) {
            table.deleteRow(tableHeaderRowCount);
        }
    }

    function pesquisarplano(){
        apagartabelaplano();
        dadoslinhasplan = [];
        $.ajax({
                type: "GET",
                url: "/consulta/plano/dados",
                data: {nomeplano: document.getElementById('pesquisarplannome').value},
                dataType: "json",
                success: function(data) {
                    for(i=0; i<data.length; i++){
                        var tabela = document.getElementById('tabelapesquisaplanos');
                        var numeroLinhas = tabela.rows.length;
                        var linha = tabela.insertRow(numeroLinhas);
                        var celula1 = linha.insertCell(0);
                        var celula2 = linha.insertCell(1);   
                        var celula3 = linha.insertCell(2);
                        var celula4 = linha.insertCell(3);
                        var celula5 = linha.insertCell(4);
                        dadoslinhasplan.push([data[i]['plan_id'], data[i]['plan_nome'], data[i]['plan_desc'] , data[i]['plan_qtddep'], data[i]['plan_valor']]);
                        celula1.innerHTML=data[i]['plan_nome'];
                        celula2.innerHTML=data[i]['plan_desc'];
                        celula3.innerHTML=data[i]['plan_qtddep'];
                        celula4.innerHTML=data[i]['plan_valor'];
                        celula5.innerHTML="<button type='submit' class='btn btadicionar' value='Adicionar' onclick='selecionarplan(this)' name='selecionareste' id='"+i+"'><span class='fontebotao'>Adicionar</span></button>";
                        
                    }
                }
            });
            $('#tabelaescolherplano').css('display', 'block');
    }

    function pesquisarplanomodal(){
      apagartabelaplanomodal();
      $.ajax({
        type: "GET",
        url: "/consulta/plano/dados",
        data: {nomeplano: document.getElementById('pesquisarplannomemodal').value},
        dataType: "json",
        success: function(data) {
            for(i=0; i<data.length; i++){
                var tabela = document.getElementById('tabelapesquisaplanosmodal');
                var numeroLinhas = tabela.rows.length;
                var linha = tabela.insertRow(numeroLinhas);
                var celula1 = linha.insertCell(0);
                var celula2 = linha.insertCell(1);   
                var celula3 = linha.insertCell(2);
                var celula4 = linha.insertCell(3);
                var celula5 = linha.insertCell(4);
                dadoslinhasplan.push([data[i]['plan_id'], data[i]['plan_nome'], data[i]['plan_desc'] , data[i]['plan_qtddep'], data[i]['plan_valor']]);
                celula1.innerHTML=data[i]['plan_nome'];
                celula2.innerHTML=data[i]['plan_desc'];
                celula3.innerHTML=data[i]['plan_qtddep'];
                celula4.innerHTML=data[i]['plan_valor'].toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});;
                celula5.innerHTML="<button type='submit' class='btn btadicionar' value='Adicionar' onclick='selecionarplan(this)' name='selecionareste' id='"+i+"'><span class='fontebotao'>Adicionar</span></button>";
                
            }
        }
    });

    $('#tabelaeditplano').css('display', 'block');

  }

    function pesquisardep(){
        apagartabeladep();
        dadosdep = [];
        dadoslinhasdep = [];
        $.ajax({
                type: "GET",
                url: "/consulta/pessoa/dados",
                data: {cpfcnpj: document.getElementById('pesquisadepcpfcnpj').value, nomepessoa: document.getElementById('pesquisadepnome').value},
                dataType: "json",
                success: function(data) {
                    for(o=0; o<data.length; o++){
                        if(data[o]['pac_cpf']){
                            dadosdep.push([data[o]['pac_cpf'], data[o]['pac_nome'], "Física"]);
                        }else if(data[o]['forfis_cpf']){
                            dadosdep.push([data[o]['forfis_cpf'], data[o]['forfis_nome'], "Física"]);
                        }else if(data[o]['func_cpf']){
                            dadosdep.push([data[o]['func_cpf'], data[o]['func_nome'], "Física"]);
                        }else if(data[o]['forjur_cnpj']){
                            dadosdep.push([data[o]['forjur_cnpj'], data[o]['forjur_nome'], "Jurídica"]);
                        }else if(data[o]['clijur_cnpj']){
                            dadosdep.push([data[o]['clijur_cnpj'], data[o]['clijur_nome'], "Jurídica"]);
                        }
                    }
                    dadosdep2 = dadosdep.filter(([cpfcnpj, nome, tipopessoa], i) => {
                    return !dadosdep.some(
                            ([_cpfcnpj, _nome, _tipopessoa], j) => j > i && nome === _nome && cpfcnpj === _cpfcnpj
                        );
                    });
                    for(i=0; i<dadosdep2.length; i++){
                        var tabela = document.getElementById('tabelapesquisadependentesbody');
                        var numeroLinhas = tabela.rows.length;
                        var linha = tabela.insertRow(numeroLinhas);
                        var celula1 = linha.insertCell(0);
                        var celula2 = linha.insertCell(1);   
                        var celula3 = linha.insertCell(2); 
                        var celula4 = linha.insertCell(3);
                        dadoslinhasdep.push([dadosdep2[i][0], dadosdep2[i][1], dadosdep2[i][2]]);
                        celula1.innerHTML=dadosdep2[i][0];
                        celula2.innerHTML=dadosdep2[i][1];
                        celula3.innerHTML=dadosdep2[i][2];
                        celula4.innerHTML="<button type='submit' class='btn btadicionar' value='Adicionar' onclick='selecionardep(this)' name='selecionareste' id='"+i+"'><span class='fontebotao'>Adicionar</span></button>";
                        
                    }
                }
            });
            $('#tabelapesquisadependentes').css('display', 'block');
    }

    function pesquisardepedit(){
        apagartabeladepedit();
        dadoseditdep = [];
        $.ajax({
          type: "GET",
          url: "/consulta/pessoa/dados",
          data: {cpfcnpj: document.getElementById('pesquisadepeditcpfcnpj').value, nomepessoa: document.getElementById('pesquisadepeditnome').value},
          dataType: "json",
          success: function(data) {
              for(o=0; o<data.length; o++){
                if(data[o]['pac_cpf']){
                    dadoseditdep.push([data[o]['pac_cpf'], data[o]['pac_nome'], "Física"]);
                }else if(data[o]['forfis_cpf']){
                    dadoseditdep.push([data[o]['forfis_cpf'], data[o]['forfis_nome'], "Física"]);
                }else if(data[o]['func_cpf']){
                    dadoseditdep.push([data[o]['func_cpf'], data[o]['func_nome'], "Física"]);
                }else if(data[o]['forjur_cnpj']){
                    dadoseditdep.push([data[o]['forjur_cnpj'], data[o]['forjur_nome'], "Jurídica"]);
                }else if(data[o]['clijur_cnpj']){
                    dadoseditdep.push([data[o]['clijur_cnpj'], data[o]['clijur_nome'], "Jurídica"]);
                }
              }
              dadoseditdep2 = dadoseditdep.filter(([cpfcnpj, nome, tipopessoa], i) => {
              return !dadoseditdep.some(
                      ([_cpfcnpj, _nome, _tipopessoa], j) => j > i && nome === _nome && cpfcnpj === _cpfcnpj
                  );
              });
              for(i=0; i<dadoseditdep2.length; i++){
                var tabela = document.getElementById('tabelapesquisaeditdependentes');
                var numeroLinhas = tabela.rows.length;
                var linha = tabela.insertRow(numeroLinhas);
                var celula1 = linha.insertCell(0);
                var celula2 = linha.insertCell(1);   
                var celula3 = linha.insertCell(2); 
                var celula4 = linha.insertCell(3);
                dadoslinhaseditdep.push([dadoseditdep2[i][0], dadoseditdep2[i][1], dadoseditdep2[i][2]]);
                celula1.innerHTML=dadoseditdep2[i][0];
                celula2.innerHTML=dadoseditdep2[i][1];
                celula3.innerHTML=dadoseditdep2[i][2];
                celula4.innerHTML="<button type='submit' class='btn btadicionar' value='Adicionar' onclick='selecionareditdep(this)' name='selecionaresteedit' id='"+i+"'><span class='fontebotao'>Adicionar</span></button>";
                  
              }
          }
      });

      $('#tabelaeditdependente').css('display', 'block');
    }

    function pesquisartitu(){
        apagartabelatitu();
        dadostitu = [];
        $.ajax({
                type: "GET",
                url: "/consulta/pessoa/dados",
                data: {cpfcnpj: document.getElementById('pesquisatitucpfcnpj').value, nomepessoa: document.getElementById('pesquisatitunome').value},
                dataType: "json",
                success: function(data) {
                    for(o=0; o<data.length; o++){
                        if(data[o]['pac_cpf']){
                            dadostitu.push([data[o]['pac_cpf'], data[o]['pac_nome'], "Física"]);
                        }else if(data[o]['forfis_cpf']){
                            dadostitu.push([data[o]['forfis_cpf'], data[o]['forfis_nome'], "Física"]);
                        }else if(data[o]['func_cpf']){
                            dadostitu.push([data[o]['func_cpf'], data[o]['func_nome'], "Física"]);
                        }else if(data[o]['forjur_cnpj']){
                            dadostitu.push([data[o]['forjur_cnpj'], data[o]['forjur_nome'], "Jurídica"]);
                        }else if(data[o]['clijur_cnpj']){
                            dadostitu.push([data[o]['clijur_cnpj'], data[o]['clijur_nome'], "Jurídica"]);
                        }
                    }
                    dadostitu2 = dadostitu.filter(([cpfcnpj, nome, tipopessoa], i) => {
                    return !dadostitu.some(
                            ([_cpfcnpj, _nome, _tipopessoa], j) => j > i && nome === _nome && cpfcnpj === _cpfcnpj
                        );
                    });
                    for(i=0; i<dadostitu2.length; i++){
                        var tabela = document.getElementById('tabelapesquisatitular');
                        var numeroLinhas = tabela.rows.length;
                        var linha = tabela.insertRow(numeroLinhas);
                        var celula1 = linha.insertCell(0);
                        var celula2 = linha.insertCell(1);   
                        var celula3 = linha.insertCell(2); 
                        var celula4 = linha.insertCell(3);
                        dadoslinhastitu.push([dadostitu2[i][0], dadostitu2[i][1], dadostitu2[i][2]]);
                        celula1.innerHTML=dadostitu2[i][0];
                        celula2.innerHTML=dadostitu2[i][1];
                        celula3.innerHTML=dadostitu2[i][2];
                        celula4.innerHTML="<button type='submit' class='btn btadicionar' value='Adicionar' onclick='selecionartitu(this)' name='selecionareste' id='"+i+"'><span class='fontebotao'>Adicionar</span></button>";
                        
                    }
                }
            });
            $('#tabelaescolhertitular').css('display', 'block');
    }

    function pesquisartitumodal(){
        apagartabelatitumodal();
        dadostitu = [];
        dadoslinhastitu = [];
        $.ajax({
          type: "GET",
          url: "/consulta/pessoa/dados",
          data: {cpfcnpj: document.getElementById('pesquisatitucpfcnpjmodal').value, nomepessoa: document.getElementById('pesquisatitunomemodal').value},
          dataType: "json",
          success: function(data) {
              for(o=0; o<data.length; o++){
                  if(data[o]['pac_cpf']){
                      dadostitu.push([data[o]['pac_cpf'], data[o]['pac_nome'], "Física"]);
                  }else if(data[o]['forfis_cpf']){
                      dadostitu.push([data[o]['forfis_cpf'], data[o]['forfis_nome'], "Física"]);
                  }else if(data[o]['func_cpf']){
                      dadostitu.push([data[o]['func_cpf'], data[o]['func_nome'], "Física"]);
                  }else if(data[o]['forjur_cnpj']){
                      dadostitu.push([data[o]['forjur_cnpj'], data[o]['forjur_nome'], "Jurídica"]);
                  }else if(data[o]['clijur_cnpj']){
                      dadostitu.push([data[o]['clijur_cnpj'], data[o]['clijur_nome'], "Jurídica"]);
                  }
              }
              dadostitu2 = dadostitu.filter(([cpfcnpj, nome, tipopessoa], i) => {
              return !dadostitu.some(
                      ([_cpfcnpj, _nome, _tipopessoa], j) => j > i && nome === _nome && cpfcnpj === _cpfcnpj
                  );
              });
              for(i=0; i<dadostitu2.length; i++){
                  var tabela = document.getElementById('tabelapesquisatitularmodal');
                  var numeroLinhas = tabela.rows.length;
                  var linha = tabela.insertRow(numeroLinhas);
                  var celula1 = linha.insertCell(0);
                  var celula2 = linha.insertCell(1);   
                  var celula3 = linha.insertCell(2); 
                  var celula4 = linha.insertCell(3);
                  dadoslinhastitu.push([dadostitu2[i][0], dadostitu2[i][1], dadostitu2[i][2]]);
                  celula1.innerHTML=dadostitu2[i][0];
                  celula2.innerHTML=dadostitu2[i][1];
                  celula3.innerHTML=dadostitu2[i][2];
                  celula4.innerHTML="<button type='submit' class='btn btadicionar' value='Adicionar' onclick='selecionartitu(this)' name='selecionareste' id='"+i+"'><span class='fontebotao'>Adicionar</span></button>";
                  
              }
            }
      });
 
      $('#tabelaedittitular').css('display', 'block');
      
    }

    function selecionarplan(dado){
      var tableHeaderRowCount = 1;
      var table = document.getElementById('tabelaplanoselecionado');
      var rowCount = table.rows.length;
      for (var i = tableHeaderRowCount; i < rowCount; i++) {
          table.deleteRow(tableHeaderRowCount);
      }

      console.log(dadoslinhasplan);
      
      var tabela = document.getElementById('tabelaplanoselecionadobody');
      var numeroLinhas = tabela.rows.length;
      var linha = tabela.insertRow(numeroLinhas);
      var celula1 = linha.insertCell(0);
      var celula2 = linha.insertCell(1);   
      var celula3 = linha.insertCell(2); 
      var celula4 = linha.insertCell(3);
      var celula5 = linha.insertCell(4);
      celula1.innerHTML=dadoslinhasplan[dado.id][1];
      celula2.innerHTML=dadoslinhasplan[dado.id][2];
      celula3.innerHTML=dadoslinhasplan[dado.id][3];
      celula4.innerHTML=dadoslinhasplan[dado.id][4];
      celula5.innerHTML="<button type='submit' class='btn border border-secondary corbtedit' value='Editar' onclick='editarplan()' name='selecionaresteplan' id='"+i+"'><span class='fontebotao edit'>Editar</span></button>";
      qtddepplano = dadoslinhasplan[dado.id][3];
      idplanoselec = dadoslinhasplan[dado.id][0];
      $('#PlanoModal').modal('hide');
      apagartabelaplano();
      document.getElementById('alertamaximodep').innerHTML = "";

      $('#tabelaescolherplano').css('display', 'none');
    }
    function selecionartitu(dado){

      var tableHeaderRowCount = 1;
      var table = document.getElementById('tabelatitular');
      var rowCount = table.rows.length;
      for (var i = tableHeaderRowCount; i < rowCount; i++) {
          table.deleteRow(tableHeaderRowCount);
      }
      
      var tabela = document.getElementById('tabelatitularbody');
      var numeroLinhas = tabela.rows.length;
      var linha = tabela.insertRow(numeroLinhas);
      var celula1 = linha.insertCell(0);
      var celula2 = linha.insertCell(1);   
      var celula3 = linha.insertCell(2); 
      var celula4 = linha.insertCell(3);
      celula1.innerHTML=dadoslinhastitu[dado.id][0];
      celula2.innerHTML=dadoslinhastitu[dado.id][1];
      celula3.innerHTML=dadoslinhastitu[dado.id][2];
      celula4.innerHTML="<button type='submit' class='btn border border-secondary corbtedit' value='Editar' onclick='editartitu()' name='selecionarestetitu' id='"+i+"'><span class='fontebotao edit'>Editar</span></button>";
      $('#addTitularModal').modal('hide');
      $('#tabelaescolhertitular').css('display', 'none');
      apagartabelatitu();
      selectitu = [dadoslinhastitu[dado.id][0], dadoslinhastitu[dado.id][2], dadoslinhastitu[dado.id][2]];
      dadoslinhastitu = [];

    }

    function selecionardep(dado){
      
      var tabela = document.getElementById('tabeladependentesbody');
      var numeroLinhas = tabela.rows.length;
      var linha = tabela.insertRow(numeroLinhas);
      var celula1 = linha.insertCell(0);
      var celula2 = linha.insertCell(1);   
      var celula3 = linha.insertCell(2); 
      var celula4 = linha.insertCell(3);
      celula1.innerHTML=dadoslinhasdep[dado.id][0];
      celula2.innerHTML=dadoslinhasdep[dado.id][1];
      celula3.innerHTML=dadoslinhasdep[dado.id][2];
      celula4.innerHTML="<button type='submit' class='btn border border-secondary corbtedit' value='Editar' onclick='editardep(this)' name='selecionareste' id='"+numeroLinhas+"'><span class='fontebotao edit'>Editar</span></button>&nbsp&nbsp<button type='submit' class='btn btdelete' value='Remover' onclick='deletarlinhadep(this)' name='remover' id='"+numeroLinhas+"'><span class='fontebotao' style='font-weight:400!important;'>Remover</span></button>";
      selecdep.push([dadoslinhasdep[dado.id][0], dadoslinhasdep[dado.id][1], dadoslinhasdep[dado.id][2]]);
      $('#DepModal').modal('hide');
      $('#tabelapesquisadependentes').css('display', 'none');
      apagartabeladep();
      
    }

    function selecionareditdep(dado){
      apagartabeladependentes();
      apagartabeladepedit();
      selecdep[linhaeditdep][0] = dadoslinhaseditdep[dado.id][0];
      selecdep[linhaeditdep][1] = dadoslinhaseditdep[dado.id][1];
      selecdep[linhaeditdep][2] = dadoslinhaseditdep[dado.id][2];
      dadoslinhaseditdep = [];
      for( var i  = 0; i < selecdep.length; i++){
        var tabela = document.getElementById('tabeladependentesbody');
        var numeroLinhas = tabela.rows.length;
        var linha = tabela.insertRow(numeroLinhas);
        var celula1 = linha.insertCell(0);
        var celula2 = linha.insertCell(1);   
        var celula3 = linha.insertCell(2); 
        var celula4 = linha.insertCell(3);
        celula1.innerHTML=selecdep[i][0];
        celula2.innerHTML=selecdep[i][1];
        celula3.innerHTML=selecdep[i][2];
        celula4.innerHTML="<button type='submit' class='btn border border-secondary corbtedit' value='Editar' onclick='editardep(this)' name='selecionareste"+numeroLinhas+"' id='"+ numeroLinhas +"'><span class='fontebotao edit'>Editar</span></button>&nbsp&nbsp<button type='submit' class='btn btdelete' value='Remover' onclick='deletarlinhadep(this)' name='remover' id='"+numeroLinhas+"'><span class='fontebotao' style='font-weight:400!important;'>Remover</span></button>";
      }
      $('#tabelaeditdependente').css('display', 'none');
      $('#DepEditModal').modal('hide');
    } 

    function editartitu(){
      apagartabelatitu();
      $('#addTitularModal').modal('show');
    }
    function editarplan(){
      $('#selecPlanModal').modal('show');
    }
    function editardep(linha){
      linhaeditdep = linha.id;
      $('#DepEditModal').modal('show');
    }

    function deletarlinhadep(linha){
      selecdep.splice(linha.id, 1);
      apagartabeladependentes();
      for( var i  = 0; i < selecdep.length; i++){
        var tabela = document.getElementById('tabeladependentesbody');
        var numeroLinhas = tabela.rows.length;
        var linha = tabela.insertRow(numeroLinhas);
        var celula1 = linha.insertCell(0);
        var celula2 = linha.insertCell(1);   
        var celula3 = linha.insertCell(2); 
        var celula4 = linha.insertCell(3);
        celula1.innerHTML=selecdep[i][0];
        celula2.innerHTML=selecdep[i][1];
        celula3.innerHTML=selecdep[i][2];
        celula4.innerHTML="<button type='submit' class='btn border border-secondary corbtedit' value='Editar' onclick='editardep(this)' name='selecionareste"+numeroLinhas+"' id='"+ numeroLinhas +"'><span class='fontebotao edit'>Editar</span></button>&nbsp&nbsp<button type='submit' class='btn btdelete' value='Remover' onclick='deletarlinhadep(this)' name='remover' id='"+numeroLinhas+"'><span class='fontebotao' style='font-weight:400!important;'>Remover</span></button>";
      }
    }

    function checarmaxdep(){
      if(idplanoselec != 0){
        var tabela = document.getElementById('tabeladependentes');
        var numeroLinhas = tabela.rows.length - 1;
        if(numeroLinhas < qtddepplano){
          $('#DepModal').modal('show');
        }else{
          document.getElementById('alertamaximodep').innerHTML = "<b>O número máximo de dependentes já foi atingido.</b>";
        }
      }else{
        document.getElementById('alertamaximodep').innerHTML = "<b>Selecione um plano primeiro.</b>";
      }
      
    }

    function adicionaLinhaServico(idTabela) {
        contlinhas1++;
        linhas.push(contlinhas1);
        var tabela = document.getElementById(idTabela);
        var numeroLinhas = tabela.rows.length;
        var linha = tabela.insertRow(numeroLinhas);
        var celula1 = linha.insertCell(0);
        var celula2 = linha.insertCell(1);  
        celula1.innerHTML = "<select name='produtoservico"+contlinhas1+"' id='selectservico"+contlinhas1+"' onchange='calcularvalor()'><option value=''>Selecione um Dependente</option></select>"; 
        celula2.innerHTML =  "<button onclick='removeLinhaServico(this)' id='"+contlinhas1+"'>Remover</button>";
    }

    function cobrancascontrato(){
        
        $.ajax({
            type: "GET",
            url: "/cobrancascontrato",
            data: {
                contratoatual: contratoatual,
            },
            dataType: "json",
            success: function(data) {
                console.log(data, data[1][0]['idlote']);
                idcobrancalote= [];
                valorcobrancalote= [];
                apagartabelacobrancascontrato();
                
                for(i=0; i<data[1].length; i++){

                    idcobrancalote.push(data[1][i]['idcobranca']);
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
                    celula1.innerHTML=data[1][i]['idlote'];
                    celula2.innerHTML=data[1][i]['idcobranca'];
                    celula3.innerHTML=data[1][i]['responsavel'];
                    celula4.innerHTML=data[1][i]['data'].split('-')[2] + '/' + data[1][i]['data'].split('-')[1] + '/' + data[1][i]['data'].split('-')[0];
                    if(data[1][i]['fechado'] == 0){
                        celula5.innerHTML="<img src='../imagens/close.svg' class='iconscobranca' style='width: 43px;'>";
                    }else{
                        celula5.innerHTML="<img src='../imagens/check.svg' class='iconscobranca' style='width: 43px;'>";
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

    function gerarremessaindividual(input){
        // window.location.href.substring(0, window.location.href.length - 8) + 'gerarremessaavulsa?cobrancaatual=' + input.id
        window.open(window.location.href.substring(0, window.location.href.length - 17) + 'gerarremessaavulsa?cobrancaatual=' + input.id);
    }

    function gerarboletoindividual(input){
        window.open(window.location.href.substring(0, window.location.href.length - 17) + 'gerarboletoavulso?cobrancaatual=' + input.id);
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
            document.getElementById('avisoerrodiv').innerHTML='Os valores do pagamento inseridos não batem com o valor do plano!';
        }else{
            
            $.ajax({
                type: "GET",
                url: "/receberpagamentoinadimplente",
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

    function editarcontrato(){
      $.ajax({
            type: "GET",
            url: "/editar/editarcontrato",
            data: {
                contratoatual: contratoatual,
                plano:idplanoselec,
                titu:selectitu[0],
                dep:selecdep,
                diapag:$("[name='diapag']").val(),
            },
            dataType: "json",
            success: function(data) {
              $('#exampleModal').modal('show');
              console.log('Contrato editado com sucesso');
            }
            });
    }

    function excluirContrato(){
      $('#excluirContratoModal').modal('show');
    }

    function excluirContratoConfirm() {
      $.ajax({
        type: "GET",
        url: "/excluir/excluircontrato",
        data: {
          id: contratoatual,
        },
        dataType: "json",
        success: function(data) {
          $('#excluirContratoModal').modal('hide');
          $('#excluirSucessoModal').modal('show');
          console.log('Contrato excluido com sucesso');
        }
      });
    }
</script>
@endsection
</html>