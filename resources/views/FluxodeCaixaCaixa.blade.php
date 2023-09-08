@extends('layouts.Menu')
@section('atalhoSuperior')@endsection
@section('menuLateral')@endsection
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
    <title>Entradas e Saídas</title> 

    <style>
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

      .headdasinformacoes,.blocoinformacoes{
        display:flex;
      }
      .headdasinformacoes{
        flex-direction:row;
        justify-content: space-between;
        width: 75%;
      }
      .blocoinformacoes{
        flex-direction:column;
      }

      .btaddborder{
        border: 1px solid #0E6969;
        /* box-sizing: border-box; */
        border-radius: 5px;
        width: 110px;
        height: 34px;
      }

      .btredborder{
        border: 1px solid #CF343D;
        /* box-sizing: border-box; */
        border-radius: 5px;
        width: 110px;
        height: 34px;
      }

      .fontgreen{
        color:#0E6969;
      }

      .fontred{
        color:#CF343D;
      }

      .fonttitulo,.btaddborder{
        margin-right: 1.5rem;
      }

      .categoriasfluxo{
        font-family: 'Roboto', sans-serif;
        font-style: normal;
        font-weight: 300;
        font-size: 17px;
        line-height: 20px;
        color: #000000;
        margin-bottom:1.5rem;
      }

      .btblueborder{
        border: 1.5px solid #103AA7;
        box-sizing: border-box;
        border-radius: 5px;
        padding:0.4rem 0.8rem !important;
      }

      .tdcomborda{
        border-bottom-color: #cbc9c9 !important;
      }
    </style>
</head>
<body>
  @section('Conteudo')
    <div class="" style='display:flex;align-items: center;margin-left:1rem'>
      <div class='fonttitulo'>
        Fluxo de Caixa
      </div>
      <div>
        <button type='submit' class='btn btaddborder btnsborderfluxo' name='novaentrada' id='novaentrada' value='Nova Entrada' onclick='novaentrada()' style='padding: 0.1rem 0.5rem !important;'>
          <span class='fontebotao fontgreen'>Entrada</span>
        </button>
      </div>
      <div style='margin-right:1.5rem'>
        <button type='submit' class='btn btredborder btnsborderfluxo' name='novasaida' id='novasaida' value='Nova Saida' onclick='novasaida()' style='padding: 0.1rem 0.5rem !important;'>
        <span class='fontebotao fontred'>Saída</span>
        </button>
      </div>
      <div>
        <button type='submit' class='btn btredborder btnsborderfluxo' name='novasangria' id='novasangria' value='Nova Sangria' onclick='novasangria()' style='padding: 0.1rem 0.5rem !important;'>
        <span class='fontebotao fontred'>Sangria</span>
        </button>
      </div>
    </div>

    <div id ='listacaixa'>
      <div class="container-fluid">
        <div id='tabela' class="table-responsive-sm">
          <table id='tabelalistacaixas' class="table">
            <thead class="table-active">
              <tr>
                <td scope="col">Nome</td>
                <td scope="col">Funcionário</td>
                <td scope="col">Aberto em</td>
                <td scope="col">Fechado em</td>
                <td scope="col">Valor do Caixa</td>
                <td scope="col">Status</td>
                <td scope="col">Ações</td>
              </tr>
            </thead>
            <tbody id='listacaixas'>

            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div id='semcompracaixaatualdiv'>Este caixa ainda não realizou nenhuma compra!</div>
    <div id='caixaatualdiv'>

      <div class="container-fluid">
        <div id='dadosgerais' class="table-responsive-sm" style='filter: none!important;'>
          
        </div>
      </div>
      
      <div class="container-fluid">
        <div id='tabela' class="table-responsive-sm" style='filter: none!important;'>
          <table id='' class="table" style='width: 96rem;max-width:100%'>
            <thead class="" style="font-family:'Roboto', sans-serif;font-style: normal;font-weight: 500;font-size: 14px;line-height: 16px;letter-spacing: 0.03em;color: #000000;">
              <tr>
                <td scope="col" class='tdcomborda' style='border-bottom-color: #cbc9c9 !important;'>Nome do Caixa</td>
                <td scope="col" class='tdcomborda' style='border-bottom-color: #cbc9c9 !important;'>Resp. p/ Abertura</td>
                <td scope="col" class='tdcomborda' style='border-bottom-color: #cbc9c9 !important;'>Abertura</td>
                <td scope="col" class='tdcomborda' style='border-bottom-color: #cbc9c9 !important;'>Fechamento</td>
                <td scope="col" class='tdcomborda' style='border-bottom-color: #cbc9c9 !important;'>Valor do Caixa</td>
                <td scope="col" class='tdcomborda' style='border-bottom-color: #cbc9c9 !important;'>Status</td>
              </tr>
            </thead>
            <tbody id='' style="font-family: 'IBM Plex Sans',sans-serif;font-style: normal;font-weight: 400;font-size: 14px;line-height: 18px;color: #000000;">
              <td scope="col tdbody" style='border-bottom: 0px!important;'><div id='nomecaixaatual'></div></td>
              <td scope="col tdbody" style='border-bottom: 0px!important;'><div id='respaberturaatual'></div></td>
              <td scope="col tdbody" style='border-bottom: 0px!important;'><div id='dataaberturaatual'></div></td>
              <td scope="col tdbody" style='border-bottom: 0px!important;'><div id='dataafechamentoatual'></div></td>
              <td scope="col tdbody" style='border-bottom: 0px!important;'><div id='valorcaixaatual'></div></td>
              <td scope="col tdbody" style='border-bottom: 0px!important;'><div id='statuscaixaatual'></div></td>
            </tbody>
          </table>
        </div>
      </div>

     
     
      <div class="container-fluid" style='margin-top: 3rem!important;'>
        <div class='categoriasfluxo'>
          Recebimentos
        </div>
        <div id='tabela' class="table-responsive-sm">
          <table id='tabelarecebimentosatual' class="table">
            <thead class="table-active">
              <tr>
                <td scope="col">Nome</td>
                <td scope="col">Data</td>
                <td scope="col">Hora</td>
                <td scope="col">Total</td>
                <td scope="col">Forma(s) de Pagamento(s)</td>
                <td scope="col">Ações</td>
              </tr>
            </thead>
            <tbody id='recebimentosatual'>

            </tbody>
          </table>
        </div>
      </div>
      
      <div class="container-fluid" style='margin-top: 2rem!important;'>
        <div class='categoriasfluxo'>
          Entradas
        </div>
        <div id='tabela' class="table-responsive-sm">
          <table id='tabelaentradasatual' class="table">
            <thead class="table-active">
              <tr>
                <td scope="col">Motivo</td>
                <td scope="col">Pagador</td>
                <td scope="col">Data</td>
                <td scope="col">Valor</td>
                <td scope="col">Forma de Pagamento</td>
                <td scope="col">Funcionário</td>
                <td scope="col">Ações</td>
              </tr>
            </thead>
            <tbody id='entradasatual'>

            </tbody>
          </table>
        </div>
      </div>
    
      <div class="container-fluid" style='margin-top: 2rem!important;'>
        <div class='categoriasfluxo'>
          Saídas
        </div>
        <div id='tabela' class="table-responsive-sm" style='margin-bottom: 4rem;'>
          <table id='tabelasaidaatual' class="table">
            <thead class="table-active">
              <tr>
                <td scope="col">Motivo</td>
                <td scope="col">Pagador</td>
                <td scope="col">Data</td>
                <td scope="col">Valor</td>
                <td scope="col">Forma de Pagamento</td>
                <td scope="col">Funcionário</td>
                <td scope="col">Ações</td>
              </tr>
            </thead>
            <tbody id='saidasatual'>

            </tbody>
          </table>
        </div>
      </div>

      <div class="container-fluid" style='margin-top: -1rem!important;'>
        <div class='categoriasfluxo'>
          Sangrias
        </div>
        <div id='tabela' class="table-responsive-sm" style='margin-bottom: 4rem;'>
          <table id='tabelasangriaatual' class="table">
            <thead class="table-active">
              <tr>
                <td scope="col">Data</td>
                <td scope="col">Valor</td>
                <td scope="col">Funcionário</td>
                <td scope="col">Ações</td>
              </tr>
            </thead>
            <tbody id='sangriasatual'>

            </tbody>
          </table>
        </div>
      </div>

      <div class="container-fluid" style='margin-top: -1rem!important;'>
        <div class='categoriasfluxo'>
          Adesões
        </div>
        <div id='tabela' class="table-responsive-sm" style='margin-bottom: 4rem;'>
          <table id='tabelaadesoesatual' class="table">
            <thead class="table-active">
              <tr>
                <td scope="col">Cliente</td>
                <td scope="col">Data</td>
                <td scope="col">Valor</td>
                <td scope="col">Pagamento</td>
                <td scope="col">Auto - CV</td>
                <td scope="col">Recebido</td>
                <td scope="col">Ações</td>
              </tr>
            </thead>
            <tbody id='adesoesatual'>

            </tbody>
          </table>
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
            <!-- <div class="row gx-3 gy-3">
              <div class="col-lg-6">
                <label for="exampleInputEmail1" class="form-label">Auto</label>
                <input type='text' class='form-control inputscinza' style='' name='autosaida' id='autosaida' disabled>
              </div>
              <div class="col-lg-6">
                <label for="exampleInputEmail1" class="form-label">CV</label>
                <input type='text' class='form-control inputscinza' style='' name='cvsaida' id='cvsaida' disabled>
              </div>
            </div> -->
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success" data-bs-dismiss="modal" onclick='cadastrarnovasaida()'>Confirmar Saida</button>
            <!-- <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancelar</button> -->
          </div>
        </div>
      </div>
    </div>

  <div class="modal fade" id="novaSangriaModal" tabindex="-1" aria-labelledby="novaSangriaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="novaSangriaModalLabel">Nova Sangria</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body ui-front">
              <div class="row gx-3 gy-3" style='margin-bottom: 3rem;'>
                <div class="col-sm-4 col-md-4 col-lg-7" id='valor'>
                  <label for="valorsangria" class="form-label">Valor da Sangria</label>
                    <input
                    type="text"
                    class="form-control inputscinza"
                    name='valor' 
                    id='valorsangria'
                    value='0.00'/>
                </div>
                <div class="col-sm-4 col-md-4 col-lg-4" style='display:flex;align-items:end;'>
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal" onclick='cadastrarnovasangria()'>Confirmar</button>
                </div>
              </div>
            </div>
            <!-- <div class="modal-footer"> -->
                <!-- <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancelar</button> -->
            <!-- </div> -->
        </div>
    </div>
</div>

  <div class="modal fade" id="novoFornecedorFisicoModal" tabindex="-1" aria-labelledby="novoFornecedorFisicoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="novoFornecedorFisicoModalLabel">Novo Fornecedor Físico</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body ui-front">
              <div class="row gx-3 gy-3">
                <div class="col-sm-5 col-md-4 col-lg-12" id='nome'>
                  <label for="exampleInputEmail1" class="form-label">Nome<span style="color: red;">*</span></label>
                  <input
                  type="text"
                  class="form-control inputscinza"
                  name='nomefornecedorfisico'
                  id='nomefornecedorfisico'/>
                </div>
              </div>
              <div class="row gx-3 gy-3">
                <div class="col-sm-3 col-md-2 col-lg-6" id='cpf'>
                  <label for="cpffornecedorfisico" class="form-label">CPF<span style="color: red;">*</span></label>
                  <input
                  type="text"
                  class="form-control inputscinza"
                  name='cpffornecedorfisico' 
                  id='cpffornecedorfisico' 
                  onfocusout='checarcpf()'
                  data-inputmask="'mask': '999.999.999-99'"/>
                </div>
                <div class="col-sm-3 col-md-2 col-lg-6" id='datanasc'>
                  <label for="exampleInputEmail1" class="form-label">
                    Data de Nasc.<span style="color: red;">*</span>
                  </label>
                  <input type='date' class="form-control inputscinza" name='datanascfornecedorfisico' id='datanascfornecedorfisico'>
                </div>
              </div>
              <div class="row gx-3 gy-3">
                <div class="col-sm-3 col-md-2 col-lg-6" id='sexo'>
                  <label for="exampleInputEmail1" class="form-label">Sexo<span style="color: red;">*</span></label>
                  <select class="form-select inputscinza" name="sexofornecedorfisico" id="sexofornecedorfisico">
                      <option value="M">Masculino</option>
                      <option value="F">Feminino</option>
                      <option value="N">Não Declarado</option>
                  </select>
                </div>
                <div class="col-sm-3 col-md-2 col-lg-6" id='estadocivil'>
                  <label for="exampleInputEmail1" class="form-label">
                    Estado Civil<span style="color: red;">*</span>
                  </label>
                  <select class="form-select inputscinza" name="estadocivilfornecedorfisico" id='estadocivilfornecedorfisico'>
                    <option value="solt">Solteiro</option>
                    <option value="cas">Casado</option>
                    <option value="outro">Outro</option>
                    <option value="n">Não Informado</option>
                  </select>
                </div>
              </div>
              <div class="row gx-3 gy-3">
                <div class="col-sm-2 col-md-2 col-lg-6" id='uf'>
                  <label for="exampleInputEmail1" class="form-label">UF<span style="color: red;">*</span></label>
                  <select class="form-select selectcategoria inputscinza" name="uffornecedorfisico" id='uffornecedorfisico'>
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
                <div class="col-sm-3 col-md-2 col-lg-6" id='tel1'>
                  <label for="exampleInputEmail1" class="form-label">
                    Telefone 1<span style="color: red;">*</span>
                  </label>
                  <input type="text" class="form-control inputscinza" name='telfornecedorfisico' id='telfornecedorfisico'/>
                </div>
              </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-bs-dismiss="modal" onclick='cadastrarfornecedorfisico()'>Cadastrar</button>
                <!-- <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancelar</button> -->
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
            <div class="col-sm-5 col-md-4 col-lg-12" id='nome'>
              <label for="exampleInputEmail1" class="form-label">Nome<span style="color: red;">*</span></label>
              <input
              type="text"
              class="form-control"
              aria-describedby="emailHelp"
              name='nomefornecedorjuridico'
              id='nomefornecedorjuridico'/>
            </div>
                        <div class="col-sm-3 col-md-2 col-lg-2">
                            <div class="input cor01" id='cpf'>
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
                        <div class="col-sm-2 col-md-2 col-lg-2 input" id='uf'>
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
                        <div class="col-sm-3 col-md-2 col-lg-2 input" id='tel1'>
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


</body>
<script>
    var caixaabertoatual = 0;
    var valorentradadinheiro = 0;
    var valorentradacartao = 0;
    var valorentradatransferencia = 0;
    var valorsaidadinheiro = 0;
    var valorsaidacartao = 0;
    var valorsaidatransferencia = 0;
    $('#telfornecedorfisico').inputmask('(99) 9999[9]-9999');
    $('#telfornecedorjuridico').inputmask('(99) 9999[9]-9999');
    checarcaixaaberto();
    $('#valorentrada').inputmask('numeric', {
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
    $('#valorsaida').inputmask('numeric', {
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

    $('#valorsangria').inputmask('numeric', {
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

    function pesquisarnome(input) {
      // console.log(input.id);
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
      // console.log(input.id);
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
    function pesquisarnomefornecedores(input) {
      // console.log(input.id);
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
    function apagarlistacaixas() {
      var tableHeaderRowCount = 0;
      var table = document.getElementById('listacaixas');
      var rowCount = table.rows.length;
      for (var i = tableHeaderRowCount; i < rowCount; i++) {
        table.deleteRow(tableHeaderRowCount);
      }
    }
    function apagarrecebimentosatual() {
      var tableHeaderRowCount = 0;
      var table = document.getElementById('recebimentosatual');
      var rowCount = table.rows.length;
      for (var i = tableHeaderRowCount; i < rowCount; i++) {
        table.deleteRow(tableHeaderRowCount);
      }
    }
    function apagarentradasatual() {
      var tableHeaderRowCount = 0;
      var table = document.getElementById('entradasatual');
      var rowCount = table.rows.length;
      for (var i = tableHeaderRowCount; i < rowCount; i++) {
        table.deleteRow(tableHeaderRowCount);
      }
    }
    function apagarsaidasatual() {
      var tableHeaderRowCount = 0;
      var table = document.getElementById('saidasatual');
      var rowCount = table.rows.length;
      for (var i = tableHeaderRowCount; i < rowCount; i++) {
        table.deleteRow(tableHeaderRowCount);
      }
    }
    function apagarsangriasatual() {
      var tableHeaderRowCount = 0;
      var table = document.getElementById('sangriasatual');
      var rowCount = table.rows.length;
      for (var i = tableHeaderRowCount; i < rowCount; i++) {
        table.deleteRow(tableHeaderRowCount);
      }
    }
    function apagaradesoesatual(){
      var tableHeaderRowCount = 0;
      var table = document.getElementById('adesoesatual');
      var rowCount = table.rows.length;
      for (var i = tableHeaderRowCount; i < rowCount; i++) {
        table.deleteRow(tableHeaderRowCount);
      }
    }
    function checarcaixaaberto() {
      if (caixaabertoatual != 0) {
        $('#listacaixa').css('display', 'none');
        $('#caixaatualdiv').css('display', 'block');
        $('.btnsborderfluxo').css('display', 'block');
      } else {
        $('#listacaixa').css('display', 'block');
        $('#caixaatualdiv').css('display', 'none');
        $('#semcompracaixaatualdiv').css('display', 'none');
        $('.btnsborderfluxo').css('display', 'none');
        listacaixas();
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
      var datacompetencia = new Date();
      document.getElementById('datacompetenciaentrada').value = datacompetencia.getFullYear() + '-' + ('00' + datacompetencia.getMonth()).slice(-2) + '-' + ('00' + datacompetencia.getDate()).slice(-2);
    }
    function novasaida(){
      $('#novaSaidaModal').modal('show');
      var datacompetencia = new Date();
      document.getElementById('datacompetenciasaida').value = datacompetencia.getFullYear() + '-' + ('00' + datacompetencia.getMonth()).slice(-2) + '-' + ('00' + datacompetencia.getDate()).slice(-2);
    }
    function novasangria(){
      $('#novaSangriaModal').modal('show');
    }
    function novofornecedorfisico(){
      $('#novoFornecedorFisicoModal').modal('show');
    }
    function novofornecedorjuridico(){
      $('#novoFornecedorJuridicoModal').modal('show');
    }
    

    function listacaixas(){
            $.ajax({
            type: "GET",
            url: "/fluxocaixas",
            data: {},
            dataType: "json",
            success: function(data) {
                apagarlistacaixas();
                for (var i = 0; i < data[0].length; i++) {
                  var valortotaldinheirocartaotransf = 0;
                if(data[4][i] != null){
                  valortotaldinheirocartaotransf += data[4][i];
                }
                if(data[7][i] != null){
                  valortotaldinheirocartaotransf += data[7][i];
                }if(data[8][i] != null){
                  valortotaldinheirocartaotransf += data[8][i];
                }

                var tabela = document.getElementById('listacaixas');
                var numeroLinhas = tabela.rows.length;
                var linha = tabela.insertRow(numeroLinhas);
                var celula1 = linha.insertCell(0);
                var celula2 = linha.insertCell(1);
                var celula3 = linha.insertCell(2);
                var celula4 = linha.insertCell(3);
                var celula5 = linha.insertCell(4);
                var celula6 = linha.insertCell(5);
                var celula7 = linha.insertCell(6);
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
                celula7.innerHTML =
                    "<button type='submit' class='btn btadicionar' name='visualizarcaixa" + data[6][i] + "' id='" + data[6][i] +
                    "' value='Visualizar' onclick='visualizarcaixa(this)'><span class='fontebotao'>Visualizar</span></button>";

                }
            }
        });
    }
    function cadastrarnovaentrada(){
            $.ajax({
            type: "GET",
            url: "/novaentrada",
            data: {
              entrada_caixa: caixaabertoatual,
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
                visualizarcaixa(caixaabertoatual);
            }
        });
    }

    function cadastrarnovasaida(){
            $.ajax({
            type: "GET",
            url: "/novasaida",
            data: {
              saida_caixa: caixaabertoatual,
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
                visualizarcaixa(caixaabertoatual);
            }
        });
    }

    function cadastrarnovasangria(){
            $.ajax({
            type: "GET",
            url: "/novasangria",
            data: {
              sangria_caixa: caixaabertoatual,
              sangria_valor: document.getElementById('valorsangria').value,
              sangria_funcionario: {{Auth::user()->id}},
            },
            dataType: "json",
            success: function(data) {
                visualizarcaixa(caixaabertoatual);
            }
        });
    }

    function visualizarcaixa(input){
      $.ajax({
            type: "GET",
            url: "/buscardadoscaixa",
            data: {
              caixa_id : input.id
            },
            dataType: "json",
            success: function(data) {
              // console.log(data);
              // if(data[1][0].length > 0){
                caixaabertoatual = data[0][6];
                apagarrecebimentosatual();
                if(data[0][2] == null || data[0][2] == 'null'){
                  document.getElementById('dataaberturaatual').innerHTML='Nunca Aberto';
                }else{
                  document.getElementById('dataaberturaatual').innerHTML=data[0][2].split(' ')[0].split('-')[2] + '/' +data[0][2].split(' ')[0].split('-')[1] + '/' + data[0][2].split(' ')[0].split('-')[0] + ' ' + data[0][2].split(' ')[1];
                }
                if(data[0][3] == null || data[0][3] == 'null'){
                  document.getElementById('dataafechamentoatual').innerHTML='Nunca Fechado';
                }else{
                  document.getElementById('dataafechamentoatual').innerHTML=data[0][3].split(' ')[0].split('-')[2] + '/' +data[0][3].split(' ')[0].split('-')[1] + '/' + data[0][3].split(' ')[0].split('-')[0] + ' ' + data[0][3].split(' ')[1];
                }

                if(data[0][4] == null || data[0][4] == 'null' || data[0][4] == 0){
                  var valordinheiroatual = 0;
                }else{
                  var valordinheiroatual = parseFloat(data[0][4]);
                }

                if(data[0][7] == null || data[0][7] == 'null' || data[0][7] == 0){
                  var valorcartaoatual = 0;
                }else{
                  var valorcartaoatual = parseFloat(data[0][7]);
                }

                if(data[0][8] == null || data[0][8] == 'null' || data[0][8] == 0){
                  var valortransfatual = 0;
                }else{
                  var valortransfatual = parseFloat(data[0][8]);
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

                document.getElementById('nomecaixaatual').innerHTML=data[0][0];
                document.getElementById('respaberturaatual').innerHTML=data[0][1];
                if(data[0][2] == null || data[0][2] == 'null'){
                  document.getElementById('dataaberturaatual').innerHTML= 'Nunca Aberto';
                }else{
                  document.getElementById('dataaberturaatual').innerHTML=data[0][2].split(' ')[0].split('-')[2] + '/' +data[0][2].split(' ')[0].split('-')[1] + '/' + data[0][2].split(' ')[0].split('-')[0] + ' ' + data[0][2].split(' ')[1];
                }
                if(data[0][3] == null || data[0][3] == 'null'){
                  document.getElementById('dataafechamentoatual').innerHTML= 'Nunca Fechado';
                }else{
                  document.getElementById('dataafechamentoatual').innerHTML=data[0][3].split(' ')[0].split('-')[2] + '/' +data[0][3].split(' ')[0].split('-')[1] + '/' + data[0][3].split(' ')[0].split('-')[0] + ' ' + data[0][3].split(' ')[1];
                }
                document.getElementById('statuscaixaatual').innerHTML=data[0][5];

                for (var i = 0; i < data[1][0].length; i++) {
                var tabela = document.getElementById('recebimentosatual');
                var numeroLinhas = tabela.rows.length;
                var linha = tabela.insertRow(numeroLinhas);
                var celula1 = linha.insertCell(0);
                var celula2 = linha.insertCell(1);
                var celula3 = linha.insertCell(2);
                var celula4 = linha.insertCell(3);
                var celula5 = linha.insertCell(4);
                var celula6 = linha.insertCell(5);
                celula1.innerHTML = data[1][1][i];
                if (data[1][2][i] == '' || data[1][2][i] == null) {
                    celula2.innerHTML = 'Nunca Aberto';
                    celula3.innerHTML = 'Nunca Fechado';
                } else {
                    celula2.innerHTML = data[1][2][i].split(' ')[0].split('-')[2] + '/' + data[1][2][i].split(' ')[0].split('-')[1] + '/' + data[1][2][i].split(' ')[0].split('-')[0];
                    celula3.innerHTML = data[1][3][i];
                }
                celula4.innerHTML = data[1][4][i].toLocaleString('pt-BR', {
                  minimumFractionDigits: 2,
                  style: 'currency',
                  currency: 'BRL'
                });
                var metodospagamento = '';
                var autos = data[1][5][i].split(',');
                var cvs = data[1][6][i].split(',');
                var parcelas = data[1][7][i].split(',');
                var valoresdivididos = data[1][8][i].split('/');
                var metodospagamentos = data[1][9][i].split(',');
                for(var o = 0; o < metodospagamentos.length; o++){
                  if(o == 0){
                    if(metodospagamentos[o] == '1'){
                      metodospagamento += 'Dinheiro - '+data[1][8][o].toLocaleString('pt-BR', {minimumFractionDigits: 2,style: 'currency',currency: 'BRL'});
                      valorentradadinheiro = valorentradadinheiro + data[1][8][o];
                      // console.log(data[1][8][o]);
                    }else if(metodospagamentos[o] == '2'){
                      metodospagamento += 'Cartão de Débito('+parcelas[o]+'x, Auto:'+autos[o]+', CV:'+cvs[o]+') - '+parseFloat(valoresdivididos[o]).toLocaleString('pt-BR', {minimumFractionDigits: 2,style: 'currency',currency: 'BRL'});
                      valorentradacartao = valorentradacartao + parseFloat(valoresdivididos[o]);
                    }
                    else if(metodospagamentos[o] == '3'){
                      metodospagamento += 'Cartão de Crédito('+parcelas[o]+'x, Auto:'+autos[o]+', CV:'+cvs[o]+') - '+parseFloat(valoresdivididos[o]).toLocaleString('pt-BR', {minimumFractionDigits: 2,style: 'currency',currency: 'BRL'});
                      valorentradacartao = valorentradacartao + parseFloat(valoresdivididos[o]);
                    }
                    else if(metodospagamentos[o] == '4'){
                      metodospagamento += 'Pix - '+parseFloat(valoresdivididos[o]).toLocaleString('pt-BR', {minimumFractionDigits: 2,style: 'currency',currency: 'BRL'});
                      valorentradatransferencia = valorentradatransferencia + parseFloat(valoresdivididos[o]);
                    }
                    else if(metodospagamentos[o] == '5'){
                      metodospagamento += 'Cheque - '+parseFloat(valoresdivididos[o]).toLocaleString('pt-BR', {minimumFractionDigits: 2,style: 'currency',currency: 'BRL'});
                      valorentradatransferencia = valorentradatransferencia + parseFloat(valoresdivididos[o]);
                    }
                    else if(metodospagamentos[o] == '6'){
                      metodospagamento += 'Boleto Bancário - '+parseFloat(valoresdivididos[o]).toLocaleString('pt-BR', {minimumFractionDigits: 2,style: 'currency',currency: 'BRL'});
                      valorentradatransferencia = valorentradatransferencia + parseFloat(valoresdivididos[o]);
                    }
                  }else{
                    if(metodospagamentos[o] == '1'){
                      metodospagamento += '<br>Dinheiro - '+parseFloat(valoresdivididos[o]).toLocaleString('pt-BR', {minimumFractionDigits: 2,style: 'currency',currency: 'BRL'});
                      valorentradadinheiro = valorentradadinheiro + parseFloat(valoresdivididos[o]);
                      // console.log(valoresdivididos[o]);
                    }else if(metodospagamentos[o] == '2'){
                      metodospagamento += '<br>Cartão de Débito('+parcelas[o]+'x, Auto:'+autos[o]+', CV:'+cvs[o]+') - '+parseFloat(valoresdivididos[o]).toLocaleString('pt-BR', {minimumFractionDigits: 2,style: 'currency',currency: 'BRL'});
                      valorentradacartao = valorentradacartao + parseFloat(valoresdivididos[o]);
                    }
                    else if(metodospagamentos[o] == '3'){
                      metodospagamento += '<br>Cartão de Crédito('+parcelas[o]+'x, Auto:'+autos[o]+', CV:'+cvs[o]+') - '+parseFloat(valoresdivididos[o]).toLocaleString('pt-BR', {minimumFractionDigits: 2,style: 'currency',currency: 'BRL'});
                      valorentradacartao = valorentradacartao + parseFloat(valoresdivididos[o]);
                    }
                    else if(metodospagamentos[o] == '4'){
                      metodospagamento += '<br>Pix - '+parseFloat(valoresdivididos[o]).toLocaleString('pt-BR', {minimumFractionDigits: 2,style: 'currency',currency: 'BRL'});
                      valorentradatransferencia = valorentradatransferencia + parseFloat(valoresdivididos[o]);
                    }
                    else if(metodospagamentos[o] == '5'){
                      metodospagamento += '<br>Cheque - '+parseFloat(valoresdivididos[o]).toLocaleString('pt-BR', {minimumFractionDigits: 2,style: 'currency',currency: 'BRL'});
                      valorentradatransferencia = valorentradatransferencia + parseFloat(valoresdivididos[o]);
                    }
                    else if(metodospagamentos[o] == '6'){
                      metodospagamento += '<br>Boleto Bancário - '+parseFloat(valoresdivididos[o]).toLocaleString('pt-BR', {minimumFractionDigits: 2,style: 'currency',currency: 'BRL'});
                      valorentradatransferencia = valorentradatransferencia + parseFloat(valoresdivididos[o]);
                    }
                  }
                  
                }
                celula5.innerHTML = metodospagamento;
                celula6.innerHTML =
                    "<button type='submit' class='btn btblueborder' name='visualizarcompra" + data[1][0][i] + "' id='" + data[1][0][i] +
                    "' value='Visualizar' onclick='visualizarcompra(this)' style='padding: 0.5rem 0.8rem !important;'><span class='fontebotao' style='color:#103AA7!important'>Visualizar</span></button>";
                }
              // }
              var visuentradas = visualizarentradas(input.id);
              var visusaidas = visualizarsaidas(input.id);
              var visusangrias = visualizarsangrias(input.id);
              var visuadesoes = visualizaradesoes(input.id);
              $.when( visuentradas, visuadesoes,  visusaidas, visusangrias).then(function(){
                setTimeout(function(){
                  document.getElementById('dadosgerais').innerHTML = "<b><font size='8'>Valor Total: " + ((valorentradadinheiro - valorsaidadinheiro) + (valorentradacartao - valorsaidacartao) + (valorentradatransferencia - valorsaidatransferencia)).toLocaleString('pt-BR', {minimumFractionDigits: 2,style: 'currency',currency: 'BRL'}) + '</font></b><br>';
                  document.getElementById('valorcaixaatual').innerHTML = ((valorentradadinheiro - valorsaidadinheiro) + (valorentradacartao - valorsaidacartao) + (valorentradatransferencia - valorsaidatransferencia)).toLocaleString('pt-BR', {minimumFractionDigits: 2,style: 'currency',currency: 'BRL'});
                  document.getElementById('dadosgerais').innerHTML += "Valor em Dinheiro: " + (valorentradadinheiro - valorsaidadinheiro).toLocaleString('pt-BR', {minimumFractionDigits: 2,style: 'currency',currency: 'BRL'})
                  + " (<b style='color:blue'>" + valorentradadinheiro.toLocaleString('pt-BR', {minimumFractionDigits: 2,style: 'currency',currency: 'BRL'})
                  + "</b> - <b style='color:red'>" + valorsaidadinheiro.toLocaleString('pt-BR', {minimumFractionDigits: 2,style: 'currency',currency: 'BRL'})
                  + "</b>)<br>";
                  document.getElementById('dadosgerais').innerHTML += "Valor em Cartão: " + (valorentradacartao - valorsaidacartao).toLocaleString('pt-BR', {minimumFractionDigits: 2,style: 'currency',currency: 'BRL'})
                  + " (<b style='color:blue'>" + valorentradacartao.toLocaleString('pt-BR', {minimumFractionDigits: 2,style: 'currency',currency: 'BRL'})
                  + "</b> - <b style='color:red'>" + valorsaidacartao.toLocaleString('pt-BR', {minimumFractionDigits: 2,style: 'currency',currency: 'BRL'})
                  + "</b>)<br>";
                  document.getElementById('dadosgerais').innerHTML += "Valor em Tranferência: " + (valorentradatransferencia - valorsaidatransferencia).toLocaleString('pt-BR', {minimumFractionDigits: 2,style: 'currency',currency: 'BRL'})
                  + " (<b style='color:blue'>" + valorentradatransferencia.toLocaleString('pt-BR', {minimumFractionDigits: 2,style: 'currency',currency: 'BRL'})
                  + "</b> - <b style='color:red'>" + valorsaidatransferencia.toLocaleString('pt-BR', {minimumFractionDigits: 2,style: 'currency',currency: 'BRL'})
                  + "</b>)";
                  // console.log(valorentradadinheiro, valorsaidadinheiro);
                  // console.log(valorentradacartao, valorsaidacartao);
                  // console.log(valorentradatransferencia, valorsaidatransferencia);
                }, 2000);
              });
              checarcaixaaberto();
            }
        });
    }

    function visualizarentradas(idcaixa){
      $.ajax({
            type: "GET",
            url: "/buscarentradascaixa",
            data: {
              caixa_id : idcaixa
            },
            dataType: "json",
            success: function(data) {
              if(data[0].length > 0){
                apagarentradasatual();
                for (var i = 0; i < data[0].length; i++) {
                var tabela = document.getElementById('entradasatual');
                var numeroLinhas = tabela.rows.length;
                var linha = tabela.insertRow(numeroLinhas);
                var celula1 = linha.insertCell(0);
                var celula2 = linha.insertCell(1);
                var celula3 = linha.insertCell(2);
                var celula4 = linha.insertCell(3);
                var celula5 = linha.insertCell(4);
                var celula6 = linha.insertCell(5);
                var celula7 = linha.insertCell(6);
                celula1.innerHTML = data[1][i];
                celula2.innerHTML = data[8][i];
                celula3.innerHTML = data[6][i].split(' ')[0].split('-')[2] + '/' + data[6][i].split(' ')[0].split('-')[1] + '/' + data[6][i].split(' ')[0].split('-')[0];
                celula4.innerHTML = data[2][i].toLocaleString('pt-BR', {
                  minimumFractionDigits: 2,
                  style: 'currency',
                  currency: 'BRL'
                });
                if(data[3][i] == '1'){
                  celula5.innerHTML = 'Dinheiro';
                  valorentradadinheiro = valorentradadinheiro + parseFloat(data[2][i]);
                  // console.log(data[2][i]);
                }else if(data[3][i] == '2'){
                  celula5.innerHTML = 'Cartão de Débito(Auto:'+data[4][i]+', CV:'+data[5][i]+')';
                  valorentradacartao = valorentradacartao + data[2][i];
                }
                else if(data[3][i] == '3'){
                  celula5.innerHTML = 'Cartão de Crédito(Auto:'+data[4][i]+', CV:'+data[5][i]+')';
                  valorentradacartao = valorentradacartao + data[2][i];
                }
                else if(data[3][i] == '4'){
                  celula5.innerHTML = 'Pix';
                  valorentradatransferencia = valorentradatransferencia + data[2][i];
                }
                else if(data[3][i] == '5'){
                  celula5.innerHTML = 'Cheque';
                  valorentradatransferencia = valorentradatransferencia + data[2][i];
                }
                else if(data[3][i] == '6' || data[3][i] == '7'){
                  celula5.innerHTML = 'Boleto Bancário';
                  valorentradatransferencia = valorentradatransferencia + data[2][i];
                }
                celula6.innerHTML = data[7][i];
                celula7.innerHTML =
                    "<button type='submit' class='btn btblueborder' name='editarentrada" + data[0][i] + "' id='" + data[0][i] +
                    "' value='Editar' onclick='editarentrada(this)'><span class='fontebotao' style='color:#103AA7!important'>Editar</span></button>";
                }
              }
            }
        });
    }

    function visualizarsaidas(idcaixa){
      $.ajax({
            type: "GET",
            url: "/buscarsaidascaixa",
            data: {
              caixa_id : idcaixa
            },
            dataType: "json",
            success: function(data) {
              if(data[0].length > 0){
                apagarsaidasatual();
                for (var i = 0; i < data[0].length; i++) {
                var tabela = document.getElementById('saidasatual');
                var numeroLinhas = tabela.rows.length;
                var linha = tabela.insertRow(numeroLinhas);
                var celula1 = linha.insertCell(0);
                var celula2 = linha.insertCell(1);
                var celula3 = linha.insertCell(2);
                var celula4 = linha.insertCell(3);
                var celula5 = linha.insertCell(4);
                var celula6 = linha.insertCell(5);
                var celula7 = linha.insertCell(6);
                celula1.innerHTML = data[1][i];
                celula2.innerHTML = data[8][i];
                celula3.innerHTML = data[6][i].split(' ')[0].split('-')[2] + '/' + data[6][i].split(' ')[0].split('-')[1] + '/' + data[6][i].split(' ')[0].split('-')[0];
                celula4.innerHTML = data[2][i].toLocaleString('pt-BR', {
                  minimumFractionDigits: 2,
                  style: 'currency',
                  currency: 'BRL'
                });
                if(data[3][i] == '1'){
                  celula5.innerHTML = 'Dinheiro';
                  valorsaidadinheiro = valorsaidadinheiro + data[2][i];
                }else if(data[3][i] == '2'){
                  celula5.innerHTML = 'Cartão de Débito(Auto:'+data[4][i]+', CV:'+data[5][i]+')';
                  valorsaidacartao = valorsaidacartao + data[2][i];
                }
                else if(data[3][i] == '3'){
                  celula5.innerHTML = 'Cartão de Crédito(Auto:'+data[4][i]+', CV:'+data[5][i]+')';
                  valorsaidacartao = valorsaidacartao + data[2][i];
                }
                else if(data[3][i] == '4'){
                  celula5.innerHTML = 'Pix';
                  valorsaidatransferencia = valorsaidatransferencia + data[2][i];
                }
                else if(data[3][i] == '5'){
                  celula5.innerHTML = 'Cheque';
                  valorsaidatransferencia = valorsaidatransferencia + data[2][i];
                }
                else if(data[3][i] == '6'){
                  celula5.innerHTML = 'Boleto Bancário';
                  valorsaidatransferencia = valorsaidatransferencia + data[2][i];
                }
                celula6.innerHTML = data[7][i];
                celula7.innerHTML =
                    "<button type='submit' class='btn btblueborder' name='editarsaida" + data[0][i] + "' id='" + data[0][i] +
                    "' value='Editar' onclick='editarsaida(this)'><span class='fontebotao' style='color:#103AA7!important'>Editar</span></button>";
                  }
              }
            }
        });
    }

    function visualizarsangrias(idcaixa){
      $.ajax({
            type: "GET",
            url: "/buscarsangriascaixa",
            data: {
              caixa_id : idcaixa
            },
            dataType: "json",
            success: function(data) {
              if(data[0].length > 0){
                apagarsangriasatual();
                for (var i = 0; i < data[0].length; i++) {
                var tabela = document.getElementById('sangriasatual');
                var numeroLinhas = tabela.rows.length;
                var linha = tabela.insertRow(numeroLinhas);
                var celula1 = linha.insertCell(0);
                var celula2 = linha.insertCell(1);
                var celula3 = linha.insertCell(2);
                var celula4 = linha.insertCell(3);
                celula1.innerHTML = data[1][i].split(' ')[0].split('-')[2] + '/' + data[1][i].split(' ')[0].split('-')[1] + '/' + data[1][i].split(' ')[0].split('-')[0];
                celula2.innerHTML = data[2][i].toLocaleString('pt-BR', {
                  minimumFractionDigits: 2,
                  style: 'currency',
                  currency: 'BRL'
                });
                valorsaidadinheiro = valorsaidadinheiro + data[2][i];
                celula3.innerHTML = data[3][i];
                celula4.innerHTML =
                    "<button type='submit' class='btn btblueborder' name='editarsangria" + data[0][i] + "' id='" + data[0][i] +
                    "' value='Editar' onclick='editarsangria(this)'><span class='fontebotao' style='color:#103AA7!important'>Editar</span></button>";
                  }
              }
            }
        });
    }

    function visualizaradesoes(idcaixa){
      $.ajax({
            type: "GET",
            url: "/buscaradesoescaixa",
            data: {
              caixa_id : idcaixa
            },
            dataType: "json",
            success: function(data) {
              if(data[0].length > 0){
                apagaradesoesatual();
                for (var i = 0; i < data[0].length; i++) {
                var tabela = document.getElementById('adesoesatual');
                var numeroLinhas = tabela.rows.length;
                var linha = tabela.insertRow(numeroLinhas);
                var celula1 = linha.insertCell(0);
                var celula2 = linha.insertCell(1);
                var celula3 = linha.insertCell(2);
                var celula4 = linha.insertCell(3);
                var celula5 = linha.insertCell(4);
                var celula6 = linha.insertCell(5);
                var celula7 = linha.insertCell(6);
                celula1.innerHTML = data[1][i];
                celula2.innerHTML = data[2][i].split(' ')[0].split('-')[2] + '/' + data[2][i].split(' ')[0].split('-')[1] + '/' + data[2][i].split(' ')[0].split('-')[0];
                celula3.innerHTML = data[3][i].toLocaleString('pt-BR', {
                  minimumFractionDigits: 2,
                  style: 'currency',
                  currency: 'BRL'
                });
                if(data[4][i] == '1'){
                  valorentradadinheiro = valorentradadinheiro + data[3][i];
                  celula4.innerHTML = 'Dinheiro';
                  celula5.innerHTML = 'N/A';
                }else if(data[4][i] == '2'){
                  valorentradacartao = valorentradacartao + data[3][i];
                  celula4.innerHTML = 'Cartão';
                  celula5.innerHTML = data[5][i] + ' - ' + data[6][i];
                }else if(data[4][i] == '3'){
                  valorentradacartao = valorentradacartao + data[3][i];
                  celula4.innerHTML = 'Cartão';
                  celula5.innerHTML = data[5][i] + ' - ' + data[6][i];
                }else if(data[4][i] == '4'){
                  valorentradatransferencia = valorentradatransferencia + data[3][i];
                  celula4.innerHTML = 'Pix';
                  celula5.innerHTML = 'N/A';
                }
                
                if(data[7][i] == '1'){
                  celula6.innerHTML = 'Recebido';
                }else{
                  celula6.innerHTML = 'Pendente';
                }
                celula7.innerHTML =
                    "<button type='submit' class='btn btblueborder' name='editaradesao" + data[0][i] + "' id='" + data[0][i] +
                    "' value='Editar' onclick='editaradesao(this)'><span class='fontebotao' style='color:#103AA7!important'>Editar</span></button>";
                  }
              }
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
    function visualizarcompra(input){
      // console.log(input.id);
    }
</script>
@endsection
</html>