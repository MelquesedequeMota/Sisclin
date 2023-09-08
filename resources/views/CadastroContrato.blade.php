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
  <link rel="stylesheet" href="{{asset('../css/estilo.css')}}">
  <!-- <link rel="stylesheet" href="{{asset('../css/cssgeral.css')}}"> -->
  <!-- <link rel="stylesheet" href="{{asset('../css/consultas.css')}}"> -->
  <!-- <link rel="stylesheet" href="{{asset('../css/cadastrocontrato.css')}}"> -->
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="{{asset('jquery.min.js')}}"></script>
  <script src="{{asset('jquery-ui-1.12.1/jquery-ui.js')}}"></script>
  <script src="{{asset('inputmask/dist/jquery.inputmask.min.js')}}"></script>
  <script src="{{asset('inputmask/dist/bindings/inputmask.binding.js')}}"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
  </script>
  <script src="{{asset('jSignature/jSignature.min.js')}}"></script>
  <title>Cadastro Contrato</title>

  <style>
    .table-responsive-sm {
        filter: none!important;
    }
    .container-fluid {
      margin-top: 2rem;
    }
    .distanciainterna{
            padding:0rem 1.5rem 3rem 1.5rem;
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
    .jSignature{
      border-bottom: 1px dashed #000000!important;
    }
    #apagarassinatura{
      width: 170px;
      height: 37px;
      background: #106FDF;
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin: 2rem auto auto;
    }
    .destaquegrupos{
        background: #FFFFFF;
        box-shadow: 0px 1px 10px rgba(0, 0, 0, 0.14);
        border-radius: 9px;
    }
    .titulogrupos{
        background: #E4E2E2;
        border-top-left-radius: 9px;
        border-top-right-radius: 9px;
        padding: 1rem;
    }
    
    .escrevaqui{
      font-family: 'IBM Plex Sans';
      font-style: normal;
      font-weight: 400;
      font-size: 14px;
      line-height: 16px;
      color: #7f8387;
      display: flex;
      justify-content: center;
    }
    .tituloassinatura{
      font-family: 'IBM Plex Sans';
      font-style: normal;
      font-weight: 500;
      font-size: 18.5px;
      line-height: 22px;
      color: #000000;
    }

    .subtituloassinatura{
      font-family: 'IBM Plex Sans';
      font-style: normal;
      font-weight: 400;
      font-size: 12.5px;
      line-height: 14px;
      color: #717478;
    }

    .rowteste{
      padding-right: 0px!important;
      padding-left: 0px!important;
    }

    .barraazul{
      width: 3px;
      height: 17px;
      background: #103AA7;
      border-radius: 3px;
      margin-right: 1rem;
    }
  </style>
</head>

<body>
  @section('Conteudo')
  <div class="tituloprincipal container-fluid">Cadastro Contrato</div>
  <br><br>

  <div class="container-fluid" >
    <div class="row gx-3 gy-3">
      <div class="col-sm-5 col-md-4 col-lg-4">
        <label for="pesquisatitunome" class="form-label">Nome do Titular</label>
        <input type="text" class="form-control" name='pesquisatitunome' id='pesquisatitunome'/>
      </div>
      <div class="col-sm-3 col-md-2 col-lg-2">
          <label for="pesquisatitucpfcnpj" class="form-label">CPF/CNPJ do Titular</label>
          <input type="text" class="form-control" name='pesquisatitucpfcnpj' id='pesquisatitucpfcnpj' />  
      </div>
      <div class="col-sm-3 col-md-2 col-lg-2" style='display: flex;align-self: end;'>
        <button type="submit" class="btn btamarelo" value='Pesquisar' onclick='pesquisartitu()'>
          <span class="fontebotao">Pesquisar</span>
        </button>
      </div>
    </div>
  </div>

  <div class='container-fluid input' id='tabelaescolhertitular'>
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

  <div class="container-fluid">
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

  <div class="container-fluid">
    <div class="row gx-3 gy-3" id='divplano' style='margin-top: -2rem;'>
      <div class="col-sm-5 col-md-4 col-lg-3">
        <label for="pesquisarplannome" class="form-label">Nome do Plano</label>
        <input type="text" class="form-control" name='pesquisarplannome' id='pesquisarplannome'/>
      </div>
      <div class="col-sm-3 col-md-2 col-lg-2" style='display: flex;align-self: end;'>
        <button type="submit" class="btn btamarelo" value='Pesquisar' onclick='pesquisarplano()'>
          <span class="fontebotao">Pesquisar</span>
        </button>
      </div>
    </div>
  </div>
 
  <div class="container-fluid input" id='tabelaescolherplano'>
    <div id='tabela' class="table-responsive-sm">
      <table id='' class="table">
        <thead class="table-active">
          <tr>
            <td>Nome</td>
            <td>Descrição</td>
            <td>Máx. de Dependentes</td>
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

  <div class="container-fluid" id="planoselecionado">
    <div id='tabela' class="table-responsive-sm">
      <table id='tabelaplanoselecionado' class="table">
        <thead class="table-active">
          <tr>
            <td>Nome</td>
            <td>Descrição</td>
            <td>Máximo de Dependentes</td>
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

  <div class="container-fluid input" id='tabelaescolherdependente'>
    <div class="row gx-3 gy-3" style='margin-top: -2rem;'>
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

    <div class="container-fluid">
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

  <div class= 'container-fluid' id='alertamaximodep'></div>

  <div class="container-fluid" style='margin-top: -2rem'>
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
  
  <div class="container-fluid input" id="diapag">
    <div class='input destaquegrupos rowteste' id='destaquegrupos'>
      <div class='input nomesblocos titulogrupos' id='nomesblocos'>
        <span>Dados da compra</span>
      </div>
      <div class="row gx-3 gy-3 distanciainterna">

        <div class="col-sm-6 col-md-4 col-lg-3">
          <input type="checkbox" name='adesaocheckbox' id='adesaocheckbox' onclick='semAdesaoCheck()'/> Insenção de Adesão
        </div>

        <div class="row gx-3 gy-3">
          <div class="">
            <div class='input table-responsive-sm' id='tabelaadesoes'>
              <div id='adesoesvalores'></div>
              <table class='table' id='adesoestable'>
                <thead class="table-active">
                  <tr>
                    <td scope="col">Método</td>
                    <td scope="col">Valor</td>
                    <td scope="col">Auto</td>
                    <td scope="col">CV</td>
                    <td scope="col">Remover Método</td>
                  </tr>
                </thead>
                <tbody id='adesoestbody'>

                </tbody>
              </table>
              <button type="submit" class="btn btadd btadicionar" value="Adicionar" onclick="adicionaLinhaAdesao()">
                <span class="fontebotao">Adicionar</span>
              </button>
            </div>
          </div>
        </div>
        <div class="col-sm-3 col-md-2 col-lg-2" id='divdiavencimento'>
          <label for="diapaginput" class="form-label">Dia do Vencimento</label>
          Boleto: <input type="number" class="form-control" name='diapag' id='diapaginput'/>
        </div>
        <!-- <div class="col-sm-3 col-md-2 col-lg-2">
          <label for="diapaginput" class="form-label">Dia do Vencimento</label>
          <input type="number" class="form-control" name='diapag' id='diapaginput'/>
        </div>
        <div class="col-sm-3 col-md-2 col-lg-2">
          <label for="autoadesao" class="form-label">Auto Adesão</label>
          <input type="text" class="form-control" name='autoadesao' id='autoadesao'/>
        </div>
        <div class="col-sm-3 col-md-2 col-lg-2">
          <label for="cvadesao" class="form-label">CV Adesão</label>
          <input type="text" class="form-control" name='cvadesao' id='cvadesao'/>
        </div>
        <div class="col-sm-5 col-md-4 col-lg-3">
          <label for="metodospagamentoadesao" class="form-label">Pagamento da Adesão</label>
          <select id="metodospagamentoadesao" name='metodospagamentoadesao' class='form-select'>
            <option value='1'>Dinheiro</option>
            <option value='2'>Cartão - Débito</option>
            <option value='3'>Cartão - Crédito</option>
            <option value='4'>Pix</option>
            <option value='7'>Transferência Bancária</option>
          </select>
        </div>
      </div> -->

      <div class="col-sm-6 col-md-4 col-lg-3">
        <input type="checkbox" name='pagamentoanualcheckbox' id='pagamentoanualcheckbox' onclick='pagamentoAnualCheck()'/> Pagamento do Anual
      </div>
      
      <div class="row gx-3 gy-3">
        <div class="">
          <div class='input table-responsive-sm' id='tabelaanual'>
            <div id='anualvalor'></div>
            <table class='table' id='anualtable'>
              <thead class="table-active">
                <tr>
                  <td scope="col">Método</td>
                  <td scope="col">Valor</td>
                  <td scope="col">Parcelas</td>
                  <td scope="col">Auto</td>
                  <td scope="col">CV</td>
                  <td scope="col">Remover Método</td>
                </tr>
              </thead>
              <tbody id='anualtbody'>

              </tbody>
            </table>
            <button type="submit" class="btn btadd btadicionar" value="Adicionar" onclick="adicionaLinhaAnual()">
              <span class="fontebotao">Adicionar</span>
            </button>
          </div>
        </div>
      </div>
      <div class="row gx-3 gy-3 distanciainterna">
        <!-- <div class="col-sm-3 col-md-2 col-lg-2">
          <label for="autolote" class="form-label">Auto Mensalidades</label>
          <input type="text" class="form-control" name='autolote' id='autolote'/>
        </div>
        <div class="col-sm-3 col-md-2 col-lg-2">
          <label for="cvlote" class="form-label">CV Mensalidades</label>
          <input type="text" class="form-control" name='cvlote' id='cvlote'/>
        </div>
        <div class="col-sm-3 col-md-4 col-lg-3">
          <label for="metodospagamento" class="form-label">Pagamento das Mensalidades</label>
          <select id="metodospagamento" name='metodospagamento' class='form-select'>
            <option value='6'>Boleto</option>
            <option value='3'>Cartão</option>
          </select>
        </div> -->
        <div class="col-sm-6 col-md-4 col-lg-3">
          <label for="vendedorlote" class="form-label">Vendedor</label>
          <select class="form-select" name="vendedorlote" id='vendedorlote'>
            <option value=''>Selecione o Vendedor</option>
          </select>
        </div>
      </div>
    </div>


    <div class="row gx-3 gy-3" style='margin-top: 2rem;'>
      <div class='input destaquegrupos rowteste' id='destaquegrupos'>
        <div class='input nomesblocos titulogrupos' id='nomesblocos'>
          <span>Assinatura do Titular</span>
        </div>
        <div class="col-sm-5 col-md-5 col-lg-5" style='margin-top: 2rem;margin-bottom: 2rem;margin-left:4rem'>
          <div style='display: flex;flex-direction: column;align-items: center;'>
            <div style='display: flex;align-items: center;'>
              <div class='barraazul'></div>
              <span class='tituloassinatura'>Assinatura do(a) Cliente</span>
            </div>
            <span class='subtituloassinatura'>Assinatura Digital para validar o contrato</span>
          </div>
          <div id = 'assinaturadigital'></div>
          <div class='escrevaqui'>
            Escreva o nome aqui
          </div>
          <button id = 'apagarassinatura' class='btn' onclick = 'resetsvg()' value='Apagar Assinatura'><img src='../imagens/refazer.svg'>
          <span class='fontebotao'>Refazer Assinatura</span></button>
        </div>
      </div>
    </div>
  </div>

  <div class='container-fluid'>
    <div class="row gx-3 gy-3">

    <div class="col-sm-3 col-md-2 col-lg-2" style='margin-top: 4rem;margin-bottom: 2rem;'>
        <button type="submit" name='verificarcadastro' id='verificarcadastro' class='input btn btn-success' value='Verificar Cadastro' onclick='verificarcadastro()'  style="margin-bottom: 1rem">
          <span class="fontebotao">Verificar</span>
        </button>
      </div>

      <div class="col-sm-3 col-md-2 col-lg-2" style='margin-top: 4rem;margin-bottom: 2rem;'>
        <button type="submit" name='cadastrar' id='cadastrar' class='input btn btn-success' value='Cadastrar Contrato' onclick='cadastrarcontrato()'  style="margin-bottom: 1rem" disabled>
          <span class="fontebotao">Cadastrar</span>
        </button>
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
              <input type="text" class="inputstexttelas02" name='pesquisatitunomemodal' id='pesquisatitunomemodal'>
            </div>
            <div class="coluna coluna02">
              <span class="nomesinputs">CPF ou CNPJ</span>
              <div class="transformdiv">
                <input type='text' class='inputstexttelas02 inputtextcc02' name='pesquisatitucpfcnpjmodal' id='pesquisatitucpfcnpjmodal'>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <button type="submit" class="btn btamarelo" value='Pesquisar' onclick='pesquisartitumodal()'>
                  <span class="selectacoes">Pesquisar</span>
                </button>
              </div>
            </div>
          </div>
          <br><br>
          <div id='tabelaedittitular' style='' class="input">
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
              <input type="text" class="inputstexttelas02" name='pesquisarplannomemodal' id='pesquisarplannomemodal'>
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
                    <td>Máximo de Dependentes</td>
                    <td>Boleto</td>
                    <td>Cartão</td>
                    <td>Adesao</td>
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
              <input type="text" class="inputstexttelas02" name='pesquisadepeditnome' id='pesquisadepeditnome'>
            </div>
            <div class="coluna coluna02">
              <span class="nomesinputs">CPF ou CNPJ</span>
              <div class="transformdiv">
                <input type='text' class='inputstexttelas02 inputtextcc02' name='pesquisadepeditcpfcnpj' id='pesquisadepeditcpfcnpj'>
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
          <h5 class="modal-title" id="exampleModalLabel">Cadastro</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div id=''>Contrato cadastrado com sucesso</div>
        </div>
        <div class="modal-footer">
          <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
          <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Ok</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="erroenderecoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Erro!</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div id=''>Faltam informações de endereço do titular, por favor preenchê-las!</div>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick='editarinformacoespessoa()'>Editar informações da pessoa</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Ok</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="avisoModal" tabindex="-1" aria-labelledby="avisoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="avisoModalLabel">Erro!</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div id='avisoerrodiv'></div>
        </div>
        <div class="modal-footer">
          <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
          <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Fechar</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="verificarModal" tabindex="-1" aria-labelledby="verificarModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="verificarModalLabel">Verificação de cadastro</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Verificação realizada com sucesso! <br> <b>Agora clique em cadastrar.</b>
        </div>
        <div class="modal-footer">
          <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
          <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Fechar</button>
        </div>
      </div>
    </div>
  </div>

</body>
<script>
  $('.input').css('display', 'block');
  reset();
  var checkdep = 0;
  var qtddepplano = 0;
  var idplanoselec = 0;
  var dadoslinhasdep = [];
  var dadoslinhastitu = [];
  var dadoslinhasplan = [];
  var contlinhas = 0;
  var contlinhas1 = 0;
  var contlinhas2 = 0;
  var contlinhas3 = 0;
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
  var adesaometodo = [];
  var adesaovalor = [];
  var adesaoauto = [];
  var adesaocv = [];
  var anualmetodo = [];
  var anualvalor = [];
  var anualparcela = [];
  var anualauto = [];
  var anualcv = [];
  var adesaocheck = 0;
  var pagamentocheck = 0;
  var valoradesaoatual = 0;
  var valoranualatual = 0;
  var valoradesaosomado = 0;
  var valoranualsomado = 0;

  pegarvendedores();
  adicionaLinhaAdesao();
  adicionaLinhaAnual();
  pagamentoAnualCheck();
  calcularValorAnual();
  $("input[id*='pesquisadepcpfcnpj']").inputmask({
    mask: ['999.999.999-99', '99.999.999/9999-99'],
    keepStatic: true
  });
  $("input[id*='pesquisatitucpfcnpj']").inputmask({
    mask: ['999.999.999-99', '99.999.999/9999-99'],
    keepStatic: true
  });

  function reset() {
    checkdep = 0;
    $('#tabelaedittitular').css('display', 'none');
    $('#tabelaeditdependente').css('display', 'none');
    $('#tabelaeditplano').css('display', 'none');
    $('#tabelaescolhertitular').css('display', 'none');
    $('#tabelaescolherplano').css('display', 'none');
    $('#tabelaescolherdependente').css('display', 'none');
    $('#divplano').css('display', 'none');
    $('#tabelapesquisadependentes').css('display', 'none');
    $('#tabelatitular').css('display', 'none');
    $('#tabeladependentes').css('display', 'none');
    $('#planoselecionado').css('display', 'none');
    $('#diapag').css('display', 'none');
    $('#cadastrar').css('display', 'none');
    $('#verificarcadastro').css('display', 'none');
    $('#assinaturadigital').css('display', 'none');
    check();
  }

  function check() {
    if (checkdep > 0) {
      $('#tabeladependentes').css('display', 'block');
    } else {
      $('#tabeladependentes').css('display', 'none');
    }
  }
  function puxarsvg(){
    
    var assinatura = $('#assinaturadigital').jSignature("getData", "svgbase64");
    console.log("data:" + assinatura[0] + "," + assinatura[1]);

  }

  function resetsvg(){
    
    $('#assinaturadigital').jSignature("reset");

  }

  // $. extend ( $. ui . autocomplete . prototype . options ,  { 
  //   open :  function ( event , ui )  { 
  //     $ ( this ) . autocomplete ( "widget" ) . css ( { 
  //             "width" :  ( $ ( this ) . width ( )  +  "px" ) 
  //         } ) ; 
  //     } 
  // });

  function apagartabeladep() {
    var tableHeaderRowCount = 1;
    var table = document.getElementById('tabelapesquisadependentes');
    var rowCount = table.rows.length;
    for (var i = tableHeaderRowCount; i < rowCount; i++) {
      table.deleteRow(tableHeaderRowCount);
    }
  }

  function apagartabeladependentes() {
    var tableHeaderRowCount = 0;
    var table = document.getElementById('tabeladependentes');
    var rowCount = table.rows.length;
    for (var i = tableHeaderRowCount; i < rowCount; i++) {
      table.deleteRow(tableHeaderRowCount);
    }
  }

  function apagartabeladepedit() {
    var tableHeaderRowCount = 0;
    var table = document.getElementById('tabelapesquisaeditdependentes');
    var rowCount = table.rows.length;
    for (var i = tableHeaderRowCount; i < rowCount; i++) {
      table.deleteRow(tableHeaderRowCount);
    }
  }

  function apagartabelatitu() {
    var tableHeaderRowCount = 0;
    var table = document.getElementById('tabelapesquisatitular');
    var rowCount = table.rows.length;
    for (var i = tableHeaderRowCount; i < rowCount; i++) {
      table.deleteRow(tableHeaderRowCount);
    }
  }

  function apagartabelaplano() {
    var tableHeaderRowCount = 0;
    var table = document.getElementById('tabelapesquisaplanos');
    var rowCount = table.rows.length;
    for (var i = tableHeaderRowCount; i < rowCount; i++) {
      table.deleteRow(tableHeaderRowCount);
    }
  }

  function apagartabelaplanomodal() {
    var tableHeaderRowCount = 0;
    var table = document.getElementById('tabelapesquisaplanosmodal');
    var rowCount = table.rows.length;
    for (var i = tableHeaderRowCount; i < rowCount; i++) {
      table.deleteRow(tableHeaderRowCount);
    }
  }

  function apagartabelatitumodal() {
    var tableHeaderRowCount = 0;
    var table = document.getElementById('tabelapesquisatitularmodal');
    var rowCount = table.rows.length;
    for (var i = tableHeaderRowCount; i < rowCount; i++) {
      table.deleteRow(tableHeaderRowCount);
    }
  }

  function apagartabelaplanoselecionado() {
    var tableHeaderRowCount = 0;
    var table = document.getElementById('tabelaplanoselecionado');
    var rowCount = table.rows.length;
    for (var i = tableHeaderRowCount; i < rowCount; i++) {
      table.deleteRow(tableHeaderRowCount);
    }
  }

  function semAdesaoCheck(){
    if($("#adesaocheckbox").is(":checked")){
      adesaocheck = 1;
      document.getElementById('tabelaadesoes').style.display = 'none';
    }else{
      adesaocheck = 0;
      document.getElementById('tabelaadesoes').style.display = 'block';
      calcularValorAdesao();
    }
  }

  function pagamentoAnualCheck(){
    if($("#pagamentoanualcheckbox").is(":checked")){
      pagamentoanualcheck = 1;
      calcularValorAnual();
      document.getElementById('tabelaanual').style.display = 'block';
      document.getElementById('divdiavencimento').style.display = 'none';
    }else{
      pagamentoanualcheck = 0;
      document.getElementById('tabelaanual').style.display = 'none';
      document.getElementById('divdiavencimento').style.display = 'block';
    }
  }

  function pesquisarplano() {
    apagartabelaplano();
    $.ajax({
      type: "GET",
      url: "/consulta/plano/dados",
      data: {
        nomeplano: document.getElementById('pesquisarplannome').value
      },
      dataType: "json",
      success: function(data) {
        for (i = 0; i < data.length; i++) {
          var tabela = document.getElementById('tabelapesquisaplanos');
          var numeroLinhas = tabela.rows.length;
          var linha = tabela.insertRow(numeroLinhas);
          var celula1 = linha.insertCell(0);
          var celula2 = linha.insertCell(1);
          var celula3 = linha.insertCell(2);
          var celula4 = linha.insertCell(3);
          var celula5 = linha.insertCell(4);
          var celula6 = linha.insertCell(5);
          var celula7 = linha.insertCell(6);
          dadoslinhasplan.push([data[i]['plan_id'], data[i]['plan_nome'], data[i]['plan_qtddep'],
            data[i]['plan_valorboleto'], data[i]['plan_valorcartao'], data[i]['plan_adesao']
          ]);
          celula1.innerHTML = data[i]['plan_nome'];
          celula2.innerHTML = data[i]['plan_desc'];
          celula3.innerHTML = data[i]['plan_qtddep'];
          celula4.innerHTML = data[i]['plan_valorboleto'].toLocaleString('pt-br', {
            style: 'currency',
            currency: 'BRL'
          });
          celula5.innerHTML = data[i]['plan_valorcartao'].toLocaleString('pt-br', {
            style: 'currency',
            currency: 'BRL'
          });
          celula6.innerHTML = data[i]['plan_adesao'].toLocaleString('pt-br', {
            style: 'currency',
            currency: 'BRL'
          });
          celula7.innerHTML =
            "<button type='submit' class='btn btadicionar' value='Adicionar' onclick='selecionarplan(this)' name='selecionareste' id='" +
            i + "'><span class='fontebotao'>Adicionar</span></button>";

        }
      }
    });
    $('#tabelaescolherplano').css('display', 'block');
  }
  function adicionaLinhaAdesao() {
    var tabela = document.getElementById('adesoestbody');
    var numeroLinhas = tabela.rows.length;
    var linha = tabela.insertRow(numeroLinhas);
    var celula1 = linha.insertCell(0);
    var celula2 = linha.insertCell(1);
    var celula3 = linha.insertCell(2);
    var celula4 = linha.insertCell(3);
    var celula5 = linha.insertCell(4);
    celula1.innerHTML = "<select name='metodopagamentoadesao" + (numeroLinhas + 1) + "' id='metodopagamentoadesao" + (numeroLinhas + 1) + "' class='form-select' onchange='attdadosadesao(this)'><option value='1'>Dinheiro</option><option value='2'>Cartão - Débito</option><option value='3'>Cartão - Crédito</option><option value='4'>Pix</option></select>";
    celula2.innerHTML = "<div style='display:flex'><input type='text' class='form-control' style='' id='valoradesao" + (numeroLinhas + 1) + "' onchange='attdadosadesao(this)'></div>";
    $('#valoradesao' + (numeroLinhas + 1)).inputmask('decimal', {
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
    celula3.innerHTML = "<input type='text' class='form-control' style='' name='autoadesao" + (numeroLinhas + 1) + "' id='autoadesao" + (numeroLinhas + 1) + "' onchange='attdadosadesao(this)' disabled>";
    celula4.innerHTML = "<input type='text' class='form-control' style='' name='cvadesao" + (numeroLinhas + 1) + "' id='cvadesao" + (numeroLinhas + 1) + "' onchange='attdadosadesao(this)' disabled>";
    celula5.innerHTML = "<button type='submit' class='btn btdelete' id='" + (numeroLinhas + 1) + "' value='Excluir' onclick='removeLinhaAdesao(this)'><span class='fontebotao'>Excluir</span></button>";
    adesaometodo[numeroLinhas] = "1";
    adesaovalor[numeroLinhas] = "";
    adesaoauto[numeroLinhas] = "";
    adesaocv[numeroLinhas] = "";
  }

  function attdadosadesao(select) {
    if (select.id[0] == 'm') {
      var idselect = select.id.split('metodopagamentoadesao')[1];
    }else if(select.id[0] == 'v') {
      var idselect = select.id.split('valoradesao')[1];
    }else if(select.id[0] == 'a'){
      var idselect = select.id.split('autoadesao')[1];
    }else{
      var idselect = select.id.split('cvadesao')[1];
    }
    if (document.getElementById('metodopagamentoadesao' + idselect).value == 3) {
      document.getElementById('autoadesao' + idselect).disabled = false;
      document.getElementById('cvadesao' + idselect).disabled = false;
    } else if(document.getElementById('metodopagamentoadesao' + idselect).value == 2) {
      document.getElementById('autoadesao' + idselect).disabled = false;
      document.getElementById('cvadesao' + idselect).disabled = false;
    }else{
      document.getElementById('autoadesao' + idselect).disabled = true;
      document.getElementById('cvadesao' + idselect).disabled = true;
      document.getElementById('autoadesao' + idselect).value = null;
      document.getElementById('cvadesao' + idselect).value = null;
    }
    adesaometodo[idselect - 1] = document.getElementById('metodopagamentoadesao' + idselect).value;
    adesaovalor[idselect - 1] = document.getElementById('valoradesao' + idselect).value;
    adesaoauto[idselect - 1] = document.getElementById('autoadesao' + idselect).value;
    adesaocv[idselect - 1] = document.getElementById('cvadesao' + idselect).value;
    console.log(adesaometodo, adesaovalor, adesaoauto, adesaocv)
    calcularValorAdesao();
  }

  function removeLinhaAdesao(linha) {
    var i = linha.parentNode.parentNode.rowIndex;
    console.log(linha, i, linha.id - 1);
    document.getElementById('adesoestbody').deleteRow(i-1);
    adesaometodo.splice(linha.id - 1, 1);
    adesaovalor.splice(linha.id - 1, 1);
    adesaoauto.splice(linha.id - 1, 1);
    adesaocv.splice(linha.id - 1, 1);
    refazerTabelaAdesao();
  }

  function refazerTabelaAdesao() {
    apagarTabelaAdesao();
    console.log(adesaometodo, adesaovalor, adesaoauto, adesaocv);
    for(var i = 0; i < adesaometodo.length; i++){

      var tabela = document.getElementById('adesoestbody');
      var numeroLinhas = tabela.rows.length;
      var linha = tabela.insertRow(numeroLinhas);
      var celula1 = linha.insertCell(0);
      var celula2 = linha.insertCell(1);
      var celula3 = linha.insertCell(2);
      var celula4 = linha.insertCell(3);
      var celula5 = linha.insertCell(4);
      celula1.innerHTML = "<select name='metodopagamentoadesao" + (numeroLinhas + 1) + "' id='metodopagamentoadesao" + (numeroLinhas + 1) + "' class='form-select' onchange='attdadosadesao(this)'><option value='1'>Dinheiro</option><option value='2'>Cartão - Débito</option><option value='3'>Cartão - Crédito</option><option value='4'>Pix</option><option value='7'>Transferência Bancária</option></select>";
      celula2.innerHTML = "<div style='display:flex'><input type='text' class='form-control' style='' id='valoradesao" + (numeroLinhas + 1) + "' onchange='attdadosadesao(this)'></div>";
      $('#valoradesao' + (numeroLinhas + 1)).inputmask('decimal', {
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
      celula3.innerHTML = "<input type='text' class='form-control' style='' name='autoadesao" + (numeroLinhas + 1) + "' id='autoadesao" + (numeroLinhas + 1) + "' onchange='attdadosadesao(this)' disabled>";
      celula4.innerHTML = "<input type='text' class='form-control' style='' name='cvadesao" + (numeroLinhas + 1) + "' id='cvadesao" + (numeroLinhas + 1) + "' onchange='attdadosadesao(this)' disabled>";
      celula5.innerHTML = "<button type='submit' class='btn btdelete' id='" + (numeroLinhas + 1) + "' value='Excluir' onclick='removeLinhaAdesao(this)'><span class='fontebotao'>Excluir</span></button>";

      console.log(i, adesaometodo[i]);
      document.getElementById('metodopagamentoadesao'+(numeroLinhas + 1)).value = adesaometodo[i];
      document.getElementById('valoradesao'+(numeroLinhas + 1)).value = adesaovalor[i];
      document.getElementById('autoadesao'+(numeroLinhas + 1)).value = adesaoauto[i];
      document.getElementById('cvadesao'+(numeroLinhas + 1)).value = adesaocv[i];
    }
  }

  function calcularValorAdesao(){
    valoradesaosomado = 0;
    for(var i = 0; i < adesaovalor.length; i++){
      if(adesaovalor[i] != ''){
        valoradesaosomado += parseFloat(adesaovalor[i]);
      }
    }
    document.getElementById('adesoesvalores').innerHTML='Valor total da Adesão: ' + valoradesaoatual.toLocaleString('pt-br', {
      style: 'currency',
      currency: 'BRL'
    });
    document.getElementById('adesoesvalores').innerHTML+='<br>Valor da Adesão inserido: ' + valoradesaosomado.toLocaleString('pt-br', {
      style: 'currency',
      currency: 'BRL'
    });
  }

  function apagarTabelaAdesao() {
    var tableHeaderRowCount = 0;
    var table = document.getElementById('adesoestbody');
    var rowCount = table.rows.length;
    for (var i = tableHeaderRowCount; i < rowCount; i++) {
      table.deleteRow(tableHeaderRowCount);
    }
  }

  function adicionaLinhaAnual() {
    var tabela = document.getElementById('anualtbody');
    var numeroLinhas = tabela.rows.length;
    var linha = tabela.insertRow(numeroLinhas);
    var celula1 = linha.insertCell(0);
    var celula2 = linha.insertCell(1);
    var celula3 = linha.insertCell(2);
    var celula4 = linha.insertCell(3);
    var celula5 = linha.insertCell(4);
    var celula6 = linha.insertCell(5);
    celula1.innerHTML = "<select name='metodopagamentoanual" + (numeroLinhas + 1) + "' id='metodopagamentoanual" + (numeroLinhas + 1) + "' class='form-select' onchange='attdadosanual(this)'><option value='1'>Dinheiro</option><option value='2'>Cartão - Débito</option><option value='3'>Cartão - Crédito</option><option value='4'>Pix</option></select>";
    celula2.innerHTML = "<input type='text' name='valoranual" + (numeroLinhas + 1) + "' id='valoranual" + (numeroLinhas + 1) + "' onchange='attdadosanual(this)'>";
    $('#valoranual' + (numeroLinhas + 1)).inputmask('decimal', {
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
    celula3.innerHTML = "<input type='number' min='1' max='12' name='parcelaanual" + (numeroLinhas + 1) + "' id='parcelaanual" + (numeroLinhas + 1) + "' onchange='attdadosanual(this)' value='1'>";
    celula4.innerHTML = "<input type='text' class='form-control' style='' name='autoanual" + (numeroLinhas + 1) + "' id='autoanual" + (numeroLinhas + 1) + "' onchange='attdadosanual(this)' disabled>";
    celula5.innerHTML = "<input type='text' class='form-control' style='' name='cvanual" + (numeroLinhas + 1) + "' id='cvanual" + (numeroLinhas + 1) + "' onchange='attdadosanual(this)' disabled>";
    celula6.innerHTML = "<button type='submit' class='btn btdelete' id='" + (numeroLinhas + 1) + "' value='Excluir' onclick='removeLinhaAnual(this)'><span class='fontebotao'>Excluir</span></button>";
    anualmetodo[numeroLinhas] = "1";
    anualparcela[numeroLinhas] = "1";
    anualvalor[numeroLinhas] = "0";
    anualauto[numeroLinhas] = "";
    anualcv[numeroLinhas] = "";
    document.getElementById('parcelaanual'+ (numeroLinhas + 1)).disabled= true;
  }

  function attdadosanual(select) {
    if (select.id[0] == 'm') {
      var idselect = select.id.split('metodopagamentoanual')[1];
    }else if(select.id[0] == 'p') {
      var idselect = select.id.split('parcelaanual')[1];
    }else if(select.id[0] == 'a'){
      var idselect = select.id.split('autoanual')[1];
    }else if(select.id[0] == 'v'){
      var idselect = select.id.split('valoranual')[1];
    }else{
      var idselect = select.id.split('cvanual')[1];
    }
    if (document.getElementById('metodopagamentoanual' + idselect).value == 3) {
      document.getElementById('parcelaanual' + idselect).disabled = false;
      document.getElementById('autoanual' + idselect).disabled = false;
      document.getElementById('cvanual' + idselect).disabled = false;
    } else if(document.getElementById('metodopagamentoanual' + idselect).value == 2) {
      document.getElementById('parcelaanual' + idselect).disabled = true;
      document.getElementById('parcelaanual' + idselect).value = 1;
      document.getElementById('autoanual' + idselect).disabled = false;
      document.getElementById('cvanual' + idselect).disabled = false;
    }else{
      document.getElementById('autoanual' + idselect).disabled = true;
      document.getElementById('cvanual' + idselect).disabled = true;
      document.getElementById('parcelaanual' + idselect).disabled = true;
      document.getElementById('parcelaanual' + idselect).value = 1;
      document.getElementById('autoanual' + idselect).value = null;
      document.getElementById('cvanual' + idselect).value = null;
    }
    anualmetodo[idselect - 1] = document.getElementById('metodopagamentoanual' + idselect).value;
    anualparcela[idselect - 1] = document.getElementById('parcelaanual' + idselect).value;
    anualvalor[idselect - 1] = document.getElementById('valoranual' + idselect).value;
    anualauto[idselect - 1] = document.getElementById('autoanual' + idselect).value;
    anualcv[idselect - 1] = document.getElementById('cvanual' + idselect).value;
    // console.log(anualmetodo, anualparcela, anualauto, anualcv);
    calcularValorAnual();
  }

  function removeLinhaAnual(linha) {
    var i = linha.parentNode.parentNode.rowIndex;
    console.log(linha, i, linha.id - 1);
    document.getElementById('anualtbody').deleteRow(i-1);
    anualmetodo.splice(linha.id - 1, 1);
    anualparcela.splice(linha.id - 1, 1);
    anualvalor.splice(linha.id - 1, 1);
    anualauto.splice(linha.id - 1, 1);
    anualcv.splice(linha.id - 1, 1);
    refazerTabelaAnual();
  }

  function refazerTabelaAnual() {
    apagarTabelaAnual();
    console.log(anualmetodo, anualparcela, anualauto, anualcv);
    for(var i = 0; i < anualmetodo.length; i++){

      var tabela = document.getElementById('anualtbody');
      var numeroLinhas = tabela.rows.length;
      var linha = tabela.insertRow(numeroLinhas);
      var celula1 = linha.insertCell(0);
      var celula2 = linha.insertCell(1);
      var celula3 = linha.insertCell(2);
      var celula4 = linha.insertCell(3);
      var celula5 = linha.insertCell(4);
      var celula6 = linha.insertCell(5);
      celula1.innerHTML = "<select name='metodopagamentoanual" + (numeroLinhas + 1) + "' id='metodopagamentoanual" + (numeroLinhas + 1) + "' class='form-select' onchange='attdadosanual(this)'><option value='1'>Dinheiro</option><option value='2'>Cartão - Débito</option><option value='3'>Cartão - Crédito</option><option value='4'>Pix</option></select>";
      celula2.innerHTML = "<input type='text' name='valoranual" + (numeroLinhas + 1) + "' id='valoranual" + (numeroLinhas + 1) + "' onchange='attdadosanual(this)'>";
      $('#valoranual' + (numeroLinhas + 1)).inputmask('decimal', {
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
      celula3.innerHTML = "<input type='number' min='1' max='12' name='parcelaanual" + (numeroLinhas + 1) + "' id='parcelaanual" + (numeroLinhas + 1) + "' onchange='attdadosanual(this)' value='1'>";
      celula4.innerHTML = "<input type='text' class='form-control' style='' name='autoanual" + (numeroLinhas + 1) + "' id='autoanual" + (numeroLinhas + 1) + "' onchange='attdadosanual(this)' disabled>";
      celula5.innerHTML = "<input type='text' class='form-control' style='' name='cvanual" + (numeroLinhas + 1) + "' id='cvanual" + (numeroLinhas + 1) + "' onchange='attdadosanual(this)' disabled>";
      celula6.innerHTML = "<button type='submit' class='btn btdelete' id='" + (numeroLinhas + 1) + "' value='Excluir' onclick='removeLinhaAnual(this)'><span class='fontebotao'>Excluir</span></button>";

      // console.log(i, anualmetodo[i]);
      document.getElementById('metodopagamentoanual'+(numeroLinhas + 1)).value = anualmetodo[i];
      document.getElementById('parcelaanual'+(numeroLinhas + 1)).value = anualparcela[i];
      document.getElementById('valoranual'+(numeroLinhas + 1)).value = anualvalor[i];
      document.getElementById('autoanual'+(numeroLinhas + 1)).value = anualauto[i];
      document.getElementById('cvanual'+(numeroLinhas + 1)).value = anualcv[i];
    }
  }

  function apagarTabelaAnual() {
    var tableHeaderRowCount = 0;
    var table = document.getElementById('anualtbody');
    var rowCount = table.rows.length;
    for (var i = tableHeaderRowCount; i < rowCount; i++) {
      table.deleteRow(tableHeaderRowCount);
    }
  }

  function calcularValorAnual(){
    valoranualsomado = 0;
    for(var i = 0; i < anualvalor.length; i++){
      if(anualvalor[i] != ''){
        valoranualsomado += parseFloat(anualvalor[i]);
      }
    }
    document.getElementById('anualvalor').innerHTML='Valor total do anual: ' + valoranualatual.toLocaleString('pt-br', {
      style: 'currency',
      currency: 'BRL'
    });
    document.getElementById('anualvalor').innerHTML+='Valor total inserido : ' + valoranualsomado.toLocaleString('pt-br', {
      style: 'currency',
      currency: 'BRL'
    });
  }

  function pesquisarplanomodal() {
    apagartabelaplanomodal();
    $.ajax({
      type: "GET",
      url: "/consulta/plano/dados",
      data: {
        nomeplano: document.getElementById('pesquisarplannomemodal').value
      },
      dataType: "json",
      success: function(data) {
        for (i = 0; i < data.length; i++) {
          var tabela = document.getElementById('tabelapesquisaplanosmodal');
          var numeroLinhas = tabela.rows.length;
          var linha = tabela.insertRow(numeroLinhas);
          var celula1 = linha.insertCell(0);
          var celula2 = linha.insertCell(1);
          var celula3 = linha.insertCell(2);
          var celula4 = linha.insertCell(3);
          var celula5 = linha.insertCell(4);
          var celula6 = linha.insertCell(5);
          var celula7 = linha.insertCell(6);
          dadoslinhasplan.push([data[i]['plan_id'], data[i]['plan_nome'], data[i]['plan_qtddep'],
            data[i]['plan_valorboleto'], data[i]['plan_valorcartao'], data[i]['plan_adesao']
          ]);
          celula1.innerHTML = data[i]['plan_nome'];
          celula2.innerHTML = data[i]['plan_desc'];
          celula3.innerHTML = data[i]['plan_qtddep'];
          celula4.innerHTML = data[i]['plan_valorboleto'].toLocaleString('pt-br', {
            style: 'currency',
            currency: 'BRL'
          });
          celula5.innerHTML = data[i]['plan_valorcartao'].toLocaleString('pt-br', {
            style: 'currency',
            currency: 'BRL'
          });
          celula6.innerHTML = data[i]['plan_adesao'].toLocaleString('pt-br', {
            style: 'currency',
            currency: 'BRL'
          });
          celula7.innerHTML =
            "<button type='submit' class='btn btadicionar' value='Adicionar' onclick='selecionarplan(this)' name='selecionareste' id='" +
            i + "'><span class='fontebotao'>Adicionar</span></button>";

        }
      }
    });

    $('#tabelaeditplano').css('display', 'block');

  }

  function pesquisardep() {
    apagartabeladep();
    dadoslinhasdep =[];
    dadosdep = [];
    $.ajax({
      type: "GET",
      url: "/consulta/pessoa/dados",
      data: {
        cpfcnpj: document.getElementById('pesquisadepcpfcnpj').value,
        nomepessoa: document.getElementById('pesquisadepnome').value
      },
      dataType: "json",
      success: function(data) {
        for (o = 0; o < data.length; o++) {
          if (data[o]['pac_cpf']) {
            dadosdep.push([data[o]['pac_cpf'], data[o]['pac_nome'], "Física"]);
          } else if (data[o]['forfis_cpf']) {
            dadosdep.push([data[o]['forfis_cpf'], data[o]['forfis_nome'], "Física"]);
          } else if (data[o]['func_cpf']) {
            dadosdep.push([data[o]['func_cpf'], data[o]['func_nome'], "Física"]);
          } else if (data[o]['forjur_cnpj']) {
            dadosdep.push([data[o]['forjur_cnpj'], data[o]['forjur_nome'], "Jurídica"]);
          } else if (data[o]['clijur_cnpj']) {
            dadosdep.push([data[o]['clijur_cnpj'], data[o]['clijur_nome'], "Jurídica"]);
          }
        }
        dadosdep2 = dadosdep.filter(([cpfcnpj, nome, tipopessoa], i) => {
          return !dadosdep.some(
            ([_cpfcnpj, _nome, _tipopessoa], j) => j > i && nome === _nome &&
            cpfcnpj === _cpfcnpj
          );
        });
        for (i = 0; i < dadosdep2.length; i++) {
          var tabela = document.getElementById('tabelapesquisadependentesbody');
          var numeroLinhas = tabela.rows.length;
          var linha = tabela.insertRow(numeroLinhas);
          var celula1 = linha.insertCell(0);
          var celula2 = linha.insertCell(1);
          var celula3 = linha.insertCell(2);
          var celula4 = linha.insertCell(3);
          dadoslinhasdep.push([dadosdep2[i][0], dadosdep2[i][1], dadosdep2[i][2]]);
          celula1.innerHTML = dadosdep2[i][0];
          celula2.innerHTML = dadosdep2[i][1];
          celula3.innerHTML = dadosdep2[i][2];
          celula4.innerHTML =
            "<button type='submit' class='btn btadicionar' value='Adicionar' onclick='selecionardep(this)' name='selecionareste' id='" +
            i + "'><span class='fontebotao'>Adicionar</span></button>";

        }
      }
    });
    $('#tabelapesquisadependentes').css('display', 'block');
  }

  function pesquisardepedit() {
    apagartabeladepedit();
    dadoseditdep = [];
    $.ajax({
      type: "GET",
      url: "/consulta/pessoa/dados",
      data: {
        cpfcnpj: document.getElementById('pesquisadepeditcpfcnpj').value,
        nomepessoa: document.getElementById('pesquisadepeditnome').value
      },
      dataType: "json",
      success: function(data) {
        for (o = 0; o < data.length; o++) {
          if (data[o]['pac_cpf']) {
            dadoseditdep.push([data[o]['pac_cpf'], data[o]['pac_nome'], "Física"]);
          } else if (data[o]['forfis_cpf']) {
            dadoseditdep.push([data[o]['forfis_cpf'], data[o]['forfis_nome'], "Física"]);
          } else if (data[o]['func_cpf']) {
            dadoseditdep.push([data[o]['func_cpf'], data[o]['func_nome'], "Física"]);
          } else if (data[o]['forjur_cnpj']) {
            dadoseditdep.push([data[o]['forjur_cnpj'], data[o]['forjur_nome'], "Jurídica"]);
          } else if (data[o]['clijur_cnpj']) {
            dadoseditdep.push([data[o]['clijur_cnpj'], data[o]['clijur_nome'], "Jurídica"]);
          }
        }
        dadoseditdep2 = dadoseditdep.filter(([cpfcnpj, nome, tipopessoa], i) => {
          return !dadoseditdep.some(
            ([_cpfcnpj, _nome, _tipopessoa], j) => j > i && nome === _nome &&
            cpfcnpj === _cpfcnpj
          );
        });
        for (i = 0; i < dadoseditdep2.length; i++) {
          var tabela = document.getElementById('tabelapesquisaeditdependentes');
          var numeroLinhas = tabela.rows.length;
          var linha = tabela.insertRow(numeroLinhas);
          var celula1 = linha.insertCell(0);
          var celula2 = linha.insertCell(1);
          var celula3 = linha.insertCell(2);
          var celula4 = linha.insertCell(3);
          dadoslinhaseditdep.push([dadoseditdep2[i][0], dadoseditdep2[i][1], dadoseditdep2[i][
            2
          ]]);
          celula1.innerHTML = dadoseditdep2[i][0];
          celula2.innerHTML = dadoseditdep2[i][1];
          celula3.innerHTML = dadoseditdep2[i][2];
          celula4.innerHTML =
            "<button type='submit' class='btn btadicionar' value='Adicionar' onclick='selecionareditdep(this)' name='selecionaresteedit' id='" +
            i + "'><span class='fontebotao'>Adicionar</span></button>";

        }
      }
    });

    $('#tabelaeditdependente').css('display', 'block');

  }

  function pesquisartitu() {
    apagartabelatitu();
    dadostitu = [];
    dadoslinhastitu = [];
    $.ajax({
      type: "GET",
      url: "/consulta/pessoa/dados",
      data: {
        cpfcnpj: document.getElementById('pesquisatitucpfcnpj').value,
        nomepessoa: document.getElementById('pesquisatitunome').value
      },
      dataType: "json",
      success: function(data) {
        for (o = 0; o < data.length; o++) {
          if (data[o]['pac_cpf']) {
            dadostitu.push([data[o]['pac_cpf'], data[o]['pac_nome'], "Física"]);
          } else if (data[o]['forfis_cpf']) {
            dadostitu.push([data[o]['forfis_cpf'], data[o]['forfis_nome'], "Física"]);
          } else if (data[o]['func_cpf']) {
            dadostitu.push([data[o]['func_cpf'], data[o]['func_nome'], "Física"]);
          } else if (data[o]['forjur_cnpj']) {
            dadostitu.push([data[o]['forjur_cnpj'], data[o]['forjur_nome'], "Jurídica"]);
          } else if (data[o]['clijur_cnpj']) {
            dadostitu.push([data[o]['clijur_cnpj'], data[o]['clijur_nome'], "Jurídica"]);
          }
        }
        dadostitu2 = dadostitu.filter(([cpfcnpj, nome, tipopessoa], i) => {
          return !dadostitu.some(
            ([_cpfcnpj, _nome, _tipopessoa], j) => j > i && nome === _nome &&
            cpfcnpj === _cpfcnpj
          );
        });
        for (i = 0; i < dadostitu2.length; i++) {
          var tabela = document.getElementById('tabelapesquisatitular');
          var numeroLinhas = tabela.rows.length;
          var linha = tabela.insertRow(numeroLinhas);
          var celula1 = linha.insertCell(0);
          var celula2 = linha.insertCell(1);
          var celula3 = linha.insertCell(2);
          var celula4 = linha.insertCell(3);
          dadoslinhastitu.push([dadostitu2[i][0], dadostitu2[i][1], dadostitu2[i][2]]);
          celula1.innerHTML = dadostitu2[i][0];
          celula2.innerHTML = dadostitu2[i][1];
          celula3.innerHTML = dadostitu2[i][2];
          celula4.innerHTML =
            "<button type='submit' class='btn btadicionar' value='Adicionar' onclick='selecionartitu(this)' name='selecionareste' id='" +
            i + "'><span class='fontebotao'>Adicionar</span></button>";

        }
      }
    });
    $('#tabelaescolhertitular').css('display', 'block');
  }

  function pesquisartitumodal() {
    apagartabelatitumodal();
    dadostitu = [];
    dadoslinhastitu = [];
    $.ajax({
      type: "GET",
      url: "/consulta/pessoa/dados",
      data: {
        cpfcnpj: document.getElementById('pesquisatitucpfcnpjmodal').value,
        nomepessoa: document.getElementById('pesquisatitunomemodal').value
      },
      dataType: "json",
      success: function(data) {
        for (o = 0; o < data.length; o++) {
          if (data[o]['pac_cpf']) {
            dadostitu.push([data[o]['pac_cpf'], data[o]['pac_nome'], "Física"]);
          } else if (data[o]['forfis_cpf']) {
            dadostitu.push([data[o]['forfis_cpf'], data[o]['forfis_nome'], "Física"]);
          } else if (data[o]['func_cpf']) {
            dadostitu.push([data[o]['func_cpf'], data[o]['func_nome'], "Física"]);
          } else if (data[o]['forjur_cnpj']) {
            dadostitu.push([data[o]['forjur_cnpj'], data[o]['forjur_nome'], "Jurídica"]);
          } else if (data[o]['clijur_cnpj']) {
            dadostitu.push([data[o]['clijur_cnpj'], data[o]['clijur_nome'], "Jurídica"]);
          }
        }
        dadostitu2 = dadostitu.filter(([cpfcnpj, nome, tipopessoa], i) => {
          return !dadostitu.some(
            ([_cpfcnpj, _nome, _tipopessoa], j) => j > i && nome === _nome &&
            cpfcnpj === _cpfcnpj
          );
        });
        for (i = 0; i < dadostitu2.length; i++) {
          var tabela = document.getElementById('tabelapesquisatitularmodal');
          var numeroLinhas = tabela.rows.length;
          var linha = tabela.insertRow(numeroLinhas);
          var celula1 = linha.insertCell(0);
          var celula2 = linha.insertCell(1);
          var celula3 = linha.insertCell(2);
          var celula4 = linha.insertCell(3);
          dadoslinhastitu.push([dadostitu2[i][0], dadostitu2[i][1], dadostitu2[i][2]]);
          celula1.innerHTML = dadostitu2[i][0];
          celula2.innerHTML = dadostitu2[i][1];
          celula3.innerHTML = dadostitu2[i][2];
          celula4.innerHTML =
            "<button type='submit' class='btn btadicionar' value='Adicionar' onclick='selecionartitu(this)' name='selecionareste' id='" +
            i + "'><span class='fontebotao'>Adicionar</span></button>";

        }
      }
    });

    $('#tabelaedittitular').css('display', 'block');

  }

  function selecionarplan(dado) {
    var tableHeaderRowCount = 1;
    var table = document.getElementById('tabelaplanoselecionado');
    var rowCount = table.rows.length;
    for (var i = tableHeaderRowCount; i < rowCount; i++) {
      table.deleteRow(tableHeaderRowCount);
    }

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
    celula1.innerHTML = dadoslinhasplan[dado.id][0];
    celula2.innerHTML = dadoslinhasplan[dado.id][1];
    celula3.innerHTML = dadoslinhasplan[dado.id][2];
    celula4.innerHTML = dadoslinhasplan[dado.id][3];
    celula5.innerHTML = dadoslinhasplan[dado.id][4];
    celula6.innerHTML = dadoslinhasplan[dado.id][5];
    celula7.innerHTML =
      "<button type='submit' class='btn border border-secondary corbtedit' value='Editar' onclick='editarplan()' name='selecionareste' id='" +
      i + "'><span class='fontebotao edit'>Editar</span></button>";
    celula4.innerHTML = dadoslinhasplan[dado.id][3].toLocaleString('pt-br', {
      style: 'currency',
      currency: 'BRL'
    });
    celula5.innerHTML = dadoslinhasplan[dado.id][4].toLocaleString('pt-br', {
      style: 'currency',
      currency: 'BRL'
    });
    celula6.innerHTML = dadoslinhasplan[dado.id][5].toLocaleString('pt-br', {
      style: 'currency',
      currency: 'BRL'
    });
    qtddepplano = dadoslinhasplan[dado.id][2];
    idplanoselec = dadoslinhasplan[dado.id][0];
    $('#PlanoModal').modal('hide');
    apagartabelaplano();
    $('#tabelaescolherplano').css('display', 'none');
    $('#planoselecionado').css('display', 'block');
    $('#tabelaescolherdependente').css('display', 'block');
    $('#diapag').css('display', 'block');
    $('#cadastrar').css('display', 'block');
    $('#verificarcadastro').css('display', 'block');
    $('#assinaturadigital').css('display', 'block');
    $("#assinaturadigital").jSignature({ 'width': 400, 'height': 100, 'background-color': '#808080', 'lineWidth':1,'decor-color': 'transparent'});
    document.getElementById('alertamaximodep').innerHTML = "";
    valoradesaoatual = dadoslinhasplan[dado.id][5];
    valoranualatual = parseFloat(dadoslinhasplan[dado.id][4] * 12);
    semAdesaoCheck();
  }

  function selecionartitu(dado) {
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
    celula1.innerHTML = dadoslinhastitu[dado.id][0];
    celula2.innerHTML = dadoslinhastitu[dado.id][1];
    celula3.innerHTML = dadoslinhastitu[dado.id][2];
    celula4.innerHTML =
      "<button type='submit' class='btn border border-secondary corbtedit' value='Editar' onclick='editartitu()' name='selecionareste' id='" +
      i + "'><span class='fontebotao edit'>Editar</span></button>";
    $('#TitularModal').modal('hide');
    apagartabelatitu();
    selectitu = [dadoslinhastitu[dado.id][0], dadoslinhastitu[dado.id][1], dadoslinhastitu[dado.id][2]];
    $('#tabelaescolhertitular').css('display', 'none');
    $('#tabelatitular').css('display', 'block');
    $('#divplano').css('display', 'flex');
  }

  function selecionardep(dado) {
    var tabela = document.getElementById('tabeladependentesbody');
    var numeroLinhas = tabela.rows.length;
    var linha = tabela.insertRow(numeroLinhas);
    var celula1 = linha.insertCell(0);
    var celula2 = linha.insertCell(1);
    var celula3 = linha.insertCell(2);
    var celula4 = linha.insertCell(3);
    celula1.innerHTML = dadoslinhasdep[dado.id][0];
    celula2.innerHTML = dadoslinhasdep[dado.id][1];
    celula3.innerHTML = dadoslinhasdep[dado.id][2];
    celula4.innerHTML =
      "<button type='submit' class='btn border border-secondary corbtedit' value='Editar' onclick='editardep(this)' name='selecionareste' id='" +
      numeroLinhas +
      "'><span class='fontebotao edit'>Editar</span></button>&nbsp&nbsp<button type='submit' class='btn btdelete' value='Remover' onclick='deletarlinhadep(this)' name='remover' id='" +
      numeroLinhas + "'><span class='fontebotao' style='font-weight:400!important;'>Remover</span></button>";
    selecdep.push([dadoslinhasdep[dado.id][0], dadoslinhasdep[dado.id][1], dadoslinhasdep[dado.id][2]]);
    $('#DepModal').modal('hide');
    $('#tabelapesquisadependentes').css('display', 'none');
    checkdep++;
    check();
    apagartabeladep();
    $('#diapag').css('display', 'block');
    $('#cadastrar').css('display', 'block');
    $('#verificarcadastro').css('display', 'block');
  }

  function selecionareditdep(dado) {
    apagartabeladependentes();
    apagartabeladepedit();
    selecdep[linhaeditdep][0] = dadoslinhaseditdep[dado.id][0];
    selecdep[linhaeditdep][1] = dadoslinhaseditdep[dado.id][1];
    selecdep[linhaeditdep][2] = dadoslinhaseditdep[dado.id][2];
    dadoslinhaseditdep = [];
    for (var i = 0; i < selecdep.length; i++) {
      var tabela = document.getElementById('tabeladependentesbody');
      var numeroLinhas = tabela.rows.length;
      var linha = tabela.insertRow(numeroLinhas);
      var celula1 = linha.insertCell(0);
      var celula2 = linha.insertCell(1);
      var celula3 = linha.insertCell(2);
      var celula4 = linha.insertCell(3);
      celula1.innerHTML = selecdep[i][0];
      celula2.innerHTML = selecdep[i][1];
      celula3.innerHTML = selecdep[i][2];
      celula4.innerHTML =
        "<button type='submit' class='btn border border-secondary corbtedit' value='Editar' onclick='editardep(this)' name='selecionareste' id='" +
        numeroLinhas +
        "'><span class='fontebotao edit'>Editar</span></button>&nbsp&nbsp<button type='submit' class='btn btdelete' value='Remover' onclick='deletarlinhadep(this)' name='remover' id='" +
        numeroLinhas + "'><span class='fontebotao' style='font-weight:400!important;'>Remover</span></button>";
    }
    $('#tabelaeditdependente').css('display', 'none');
    $('#DepEditModal').modal('hide');
  }

  function editartitu() {
    $('#addTitularModal').modal('show');
  }

  function editarplan() {
    $('#selecPlanModal').modal('show');
  }

  function editardep(linha) {
    linhaeditdep = linha.id;
    $('#DepEditModal').modal('show');
  }

  function deletarlinhadep(linha) {
    selecdep.splice(linha.id, 1);
    apagartabeladependentes();
    checkdep--;
    check();
    for (var i = 0; i < selecdep.length; i++) {
      var tabela = document.getElementById('tabeladependentesbody');
      var numeroLinhas = tabela.rows.length;
      var linha = tabela.insertRow(numeroLinhas);
      var celula1 = linha.insertCell(0);
      var celula2 = linha.insertCell(1);
      var celula3 = linha.insertCell(2);
      var celula4 = linha.insertCell(3);
      celula1.innerHTML = selecdep[i][0];
      celula2.innerHTML = selecdep[i][1];
      celula3.innerHTML = selecdep[i][2];
      celula4.innerHTML =
        "<button type='submit' class='btn border border-secondary corbtedit' value='Editar' onclick='editardep(this)' name='selecionareste' id='" +
        numeroLinhas +
        "'><span class='fontebotao edit'>Editar</span></button>&nbsp&nbsp<button type='submit' class='btn btdelete' value='Remover' onclick='deletarlinhadep(this)' name='remover' id='" +
        numeroLinhas + "'><span class='fontebotao' style='font-weight:400!important;'>Remover</span></button>";
    }
  }

  function checarmaxdep() {
    if (idplanoselec != 0) {
      var tabela = document.getElementById('tabeladependentesbody');
      var numeroLinhas = tabela.rows.length - 1;
      if (numeroLinhas < qtddepplano) {
        $('#DepModal').modal('show');
      } else {
        document.getElementById('alertamaximodep').innerHTML =
          "<b>O número máximo de dependentes já foi atingido.</b>";
      }
    } else {
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
    celula1.innerHTML = "<select name='produtoservico" + contlinhas1 + "' id='selectservico" + contlinhas1 +
      "' onchange='calcularvalor()'><option value=''>Selecione um Dependente</option></select>";
    celula2.innerHTML = "<button onclick='removeLinhaServico(this)' id='" + contlinhas1 + "'>Remover</button>";
  }

  // function pesquisarnomevendedor(input) {
  //       // console.log(input.id);
  //       var nome = $('#' + input.id).val();
  //       var nomes = [];
  //       if (nome.length >= 2) {
  //       $.ajax({
  //           type: 'GET',
  //           url: '../consulta/agenda/nomevendedor',
  //           data: {
  //           nomepessoa: nome
  //           },
  //           dataType: "json",
  //           success: function(data) {
  //               // console.log(data);
  //               for (i = 0; i < data.length; i++) {
  //                   nomes.push(data[i]);
  //               }
  //               nomes = nomes.filter((este, i) => nomes.indexOf(este) === i);
  //               $("#" + input.id).autocomplete({
  //                   source: nomes,
  //               });
  //               }

  //           });
  //       }
  //   }

  function pegarvendedores() {
    $.ajax({
      type: "GET",
      url: "/pegarvendedores",
      data: {},
      dataType: "json",
      success: function(data) {
        var select = document.getElementById('vendedorlote');
        for (var i = 0; i < data.length; i++) {
          var opt = document.createElement('option');
          opt.appendChild(document.createTextNode(data[i]));
          opt.value = data[i];
          select.appendChild(opt);
        }
      }
    });
  }

  function editarinformacoespessoa(){
      window.location.href = window.location.href.replace('cadastro','consulta').replace('contrato','pessoa') + '?cpfcliente=' + selectitu[0]+'&nome='+selectitu[1];
  }

  function verificarcadastro(){
    if(valoradesaoatual != valoradesaosomado && adesaocheck == 0){
      $('#avisoModal').modal('show');
      document.getElementById('avisoerrodiv').innerHTML='Os valores da adesão inseridos não batem com o valor do plano!';
    }else if(valoranualsomado != valoranualatual && pagamentoanualcheck == 1){
      $('#avisoModal').modal('show');
      document.getElementById('avisoerrodiv').innerHTML='Os valores do anual inseridos não batem com o valor do plano!';
    }else{
      $.ajax({
        type: "GET",
        url: "/verificarcadastrocontrato",
        data: {
          titu: selectitu[0]
        },
        dataType: "json",
        success: function(data) {
          if(data == 99){
            $('#erroenderecoModal').modal('show');
          }else{
            $('#verificarModal').modal('show');
            document.getElementById('cadastrar').disabled= false;
          }
        }
      });
    }
    
  }

  function cadastrarcontrato() {
      // console.log('passou', valoradesaoatual, valoradesaosomado, valoranualsomado);
      var assinatura = $('#assinaturadigital').jSignature("getData", "svgbase64");
      document.getElementById('cadastrar').disabled= true;
      $.ajax({
        type: "GET",
        url: "/cadastro/cadastrocontrato",
        data: {
          plano: idplanoselec,
          titu: selectitu[0],
          dep: selecdep,
          diapag: $("[name='diapag']").val(),
          vendedor: document.getElementById('vendedorlote').value,
          metodospagamentoanual: anualmetodo,
          parcelaanual: anualparcela,
          autoanual: anualauto,
          cvanual: anualcv,
          anualvalor: anualvalor,
          metodospagamentoadesao: adesaometodo,
          valoradesao: adesaovalor,
          autoadesao: adesaoauto,
          cvadesao: adesaocv,
          adesaocheck: adesaocheck,
          pagamentoanualcheck: pagamentoanualcheck,
          assinatura: "data:" + assinatura[0] + "," + assinatura[1],
        },
        dataType: "json",
        success: function(data) {
          $('#exampleModal').modal('show');
          console.log('Contrato cadastrado com sucesso');
        }
      });
    }
</script>
@endsection

</html>