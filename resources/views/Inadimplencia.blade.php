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

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <script src="{{asset('jquery.min.js')}}"></script>
  <script src="{{asset('jquery-ui-1.12.1/jquery-ui.js')}}"></script>
  <script src="{{asset('inputmask/dist/jquery.inputmask.min.js')}}"></script>
  <script src="{{asset('inputmask/dist/bindings/inputmask.binding.js')}}"></script>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

  <title>Inadimplentes</title>

  <style>
    .row>* {
      padding-right: 0px!important;
      padding-left: 0px!important;
    }
    .tituloprincipal{
      margin-top:-0.8rem;
      margin-bottom:1.5rem;
    }
    .btn{
      width: max-content;
    }
    .iconscobranca{
      margin-right: 1.2rem;
      margin-left:0.5rem;
      width: 25px!important;
    }
    .valorpagamento{
      width:13rem!important;
    }
    .autopagamento,.cvpagamento{
      width:16rem!important;
    }
  </style>
</head>

<body>
  @section('Conteudo')
    <div class="tituloprincipal">Inadimplentes</div>
    
    <div class="row d-flex justify-content-center"> <!-- class="container-fluid"> -->
      <div id='tabela' class="table-responsive-sm">
        <table id='inadimplentes' class="table">
          <thead class="table-active">
            <tr>
              <td scope="col">Pessoa</td>
              <!-- <td scope="col">Contrato</td> -->
              <td scope="col">Telefone</td>
              <td scope="col">Parcelas</td>
              <td scope="col">Ação</td>
            </tr>
          </thead>
          <tbody id='inadimplentesbody'>
          </tbody>
        </table>
      </div>
    </div>


  <div class="modal fade" id="abrirloteModal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="exampleModalToggleLabel">Informações da Cobrança</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div id='tabela' class="table-responsive">
            <table id='' class="table">
                <div id='lotebotoes'></div>
                <thead class="table-active">
                    <tr>
                        <td scope="col">Lote</td>
                        <td scope="col">Cobrança</td>
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
        <!-- <div class="modal-footer">
          <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal">Open second modal</button>
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
          <div class="" id='informacao'>
            <span class='spaninputs'>Mensagem de Informar</span><br>
            <input type='text' name='informacaoinput' id='informacaoinput' class='inputtextpdv'><br>
          </div>
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
          <button type="button" class="btn btn-success" onclick='informarPagamentoConfirm()'>Pagar</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="abriragendamentosModal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="exampleModalToggleLabel">Cobranças Agendadas</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div id='tabela' class="table-responsive">
            <table id='' class="table">
                <thead class="table-active">
                    <tr>
                      <td scope="col">Informação</td>
                        <td scope="col">Lote</td>
                        <td scope="col">Cobrança</td>
                        <td scope="col">Responsável</td>
                        <td scope="col">Contrato</td>
                        <td scope="col">Data do Vencimento</td>
                        <td scope="col">Fechado</td>
                        <td scope="col">Pago</td>
                        <td scope="col">Valor</td>
                        <td scope="col">Ações</td>
                    </tr>
                </thead>
                <tbody id='agendamentosbody' style='text-align:center'>

                </tbody>
            </table>
          </div>
        </div>
        <!-- <div class="modal-footer">
          <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal">Open second modal</button>
        </div> -->
      </div>
    </div>
  </div>

  <div class="modal fade" id="agendarModal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="exampleModalToggleLabel2">Informe a data de agendamento da cobrança</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <span class='spaninputs'>Informação:</span><br>
          <input type='text' name='informacaoagendarinput' id='informacaoagendarinput' class='inputtextpdv'><br>
          <label for="dataagendar" class="form-label">Data</label>
          <input type='date' class="form-control" name='dataagendar' id='dataagendar'>
          
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" data-bs-target="#abrirloteModal" data-bs-toggle="modal" data-bs-dismiss="modal">Voltar</button>
          <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button> -->
          <button type="button" class="btn btn-success" onclick='agendarCobrancaConfirm()'>Agendar</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="reagendarModal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="exampleModalToggleLabel2">Informe a data de reagendamento da cobrança</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <span class='spaninputs'>Informação:</span><br>
          <input type='text' name='informacaoreagendarinput' id='informacaoreagendarinput' class='inputtextpdv'><br>
          <label for="datareagendar" class="form-label">Data</label>
          <input type='date' class="form-control" name='datareagendar' id='datareagendar'>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" data-bs-target="#abriragendamentosModal" data-bs-toggle="modal" data-bs-dismiss="modal">Voltar</button>
          <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button> -->
          <button type="button" class="btn btn-success" onclick='reagendarCobrancaConfirm()'>Reagendar</button>
        </div>
      </div>
    </div>
  </div>
  <!-- <a class="btn btn-primary" data-bs-toggle="modal" href="#exampleModalToggle" role="button">Open first modal</a> -->
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
  buscarAgendamentos();
  buscarInadimplentes();

  function buscarAgendamentos() {
      var tableHeaderRowCount = 0;
      var table = document.getElementById('agendamentosbody');
      var rowCount = table.rows.length;
      for (var i = tableHeaderRowCount; i < rowCount; i++) {
        table.deleteRow(tableHeaderRowCount);
      }
      $.ajax({
        type: "GET",
        url: "/agendamentoscobranca",
        data: {},
        dataType: "json",
        success: function(data) {
          if(data[0].length > 0){
            $('#abriragendamentosModal').modal('show');
            for (i = 0; i < data[0].length; i++) {
              var tabela = document.getElementById('agendamentosbody');
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
              celula1.innerHTML=data[8][i];
              celula2.innerHTML=data[0][i];
              celula3.innerHTML=data[1][i];
              celula4.innerHTML=data[2][i];
              celula5.innerHTML=data[3][i];
              celula6.innerHTML=data[4][i].split('-')[2] + '/' + data[4][i].split('-')[1] + '/' + data[4][i].split('-')[0];
              if(data[5][i] == 0){
                  celula7.innerHTML="<img src='../imagens/close.svg' style='width:30px; heigth: 30px;' class='iconscobranca'>";
              }else{
                  celula7.innerHTML="<img src='../imagens/check.svg' style='width:30px; heigth: 30px;' class='iconscobranca'>";
              }
              if(data[6][i] == 0){
                  celula8.innerHTML="<img src='../imagens/close.svg' style='width:30px; heigth: 30px;' class='iconscobranca'>";
              }else{
                  celula8.innerHTML="<img src='../imagens/check.svg' style='width:30px; heigth: 30px;' class='iconscobranca'>";
              }
              celula9.innerHTML=innerHTML=data[7][i].toLocaleString('pt-br', {
                  style: 'currency',
                  currency: 'BRL'
              });
              celula10.innerHTML="<button type='submit' class='btn btn-success' value='Reagendar Cobranca' onclick='reagendarCobranca(this)' id='"+data[1][i]+"' style='margin-right:4px;' data-bs-target='#reagendarModal' data-bs-toggle='modal' data-bs-dismiss='modal'><span class='fontebotao fontmenor'>REAGENDAR</span></button>"

            }
            
          }
          
        }
      });
  }

  function buscarInadimplentes() {
      var tableHeaderRowCount = 0;
      var table = document.getElementById('inadimplentesbody');
      var rowCount = table.rows.length;
      for (var i = tableHeaderRowCount; i < rowCount; i++) {
        table.deleteRow(tableHeaderRowCount);
      }
      $.ajax({
        type: "GET",
        url: "/inadimplentes",
        data: {

        },
        dataType: "json",
        success: function(data) {
          nomeaniversariantes = [];
          for (i = 0; i < data['0'].length; i++) {
            var tabela = document.getElementById('inadimplentesbody');
            var numeroLinhas = tabela.rows.length;
            var linha = tabela.insertRow(numeroLinhas);
            var celula1 = linha.insertCell(0);
            // var celula2 = linha.insertCell(1);
            var celula2 = linha.insertCell(1);
            var celula3 = linha.insertCell(2);
            var celula4 = linha.insertCell(3);
            celula1.innerHTML = data[0][i];
            // celula2.innerHTML = data[1][i];
            var telefones = data[2][i].split(',');
            for(var o = 0; o < telefones.length; o++){
                if(celula2.innerHTML == ''){
                    if(telefones[o].length == 15){
                        celula2.innerHTML = telefones[o] + "<img src='../imagens/whatsicon.svg' style='width:30px; heigth: 30px;' class='iconscobranca' id='"+telefones[o]+"' onclick='enviarMensagemWhatsapp(this)'>";
                    }else{
                        celula2.innerHTML = telefones[o];
                    }
                }else{
                    if(telefones[o].length == 15){
                        celula2.innerHTML += telefones[o] + "<img src='../imagens/whatsicon.svg' style='width:30px; heigth: 30px;' class='iconscobranca' id='"+telefones[o]+"' onclick='enviarMensagemWhatsapp(this)'>";
                    }else{
                        celula2.innerHTML += telefones[o];
                    }
                }
            }
            celula3.innerHTML = data[3][i];
            celula4.innerHTML = "<button type='submit' class='btn' value='Abrir Lote' onclick='abrirlote(this)' id='"+data[4][i]+"' style='background:#2d9067;width:max-content;'><span class='fontebotao'>INFORMAR</span></button>";
          }
        }
      });
  }

  function enviarMensagemWhatsapp(telefone){
    str = telefone.id;
    str = str.replace(/[ÀÁÂÃÄÅ]/g,"A");
    str = str.replace(/[àáâãäå]/g,"a");
    str = str.replace(/[ÈÉÊË]/g,"E");
    str = str.replace(/[ÈÉÊË]/g,"E");
    str = str.replace(/[^a-z0-9]/gi,'');
    var mensagem = 'Mensagem de Teste';
    mensagem = mensagem.replace(' ', '%20');
    window.open("https://api.whatsapp.com/send?phone=55"+str+"&text="+mensagem);
  }

  function apagartabelaabrirlote(){
        var tableHeaderRowCount = 0;
        var table = document.getElementById('cobrancasemlotetbody');
        var rowCount = table.rows.length;
        for (var i = tableHeaderRowCount; i < rowCount; i++) {
            table.deleteRow(tableHeaderRowCount);
        }
    }

  function abrirlote(input){
        $.ajax({
            type: "GET",
            url: "cobrancasdoloteinadimplentes",
            data: {
                idlote: input.id,
            },
            dataType: "json",
            success: function(data) {
                apagartabelaabrirlote();
                $('#abrirloteModal').modal('show');
                document.getElementById('lotebotoes').innerHTML = "ID do lote: "+data[0][0]+"<br>Nome e CPF: "+data[0][1]+"<br>Contrato: "+data[0][2];
                idcobrancalote= [];
                valorcobrancalote= [];
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
                        celula5.innerHTML="<img src='../imagens/close.svg' style='width:30px; heigth: 30px;' class='iconscobranca'>";
                    }else{
                        celula5.innerHTML="<img src='../imagens/check.svg' style='width:30px; heigth: 30px;' class='iconscobranca'>";
                    }
                    if(data[1][i]['pago'] == 0){
                        celula6.innerHTML="<img src='../imagens/close.svg' style='width:30px; heigth: 30px;' class='iconscobranca'>";
                    }else{
                        celula6.innerHTML="<img src='../imagens/check.svg' style='width:30px; heigth: 30px;' class='iconscobranca'>";
                    }
                    celula7.innerHTML=data[1][i]['valor'].toLocaleString('pt-br', {
                        style: 'currency',
                        currency: 'BRL'
                    });
                    celula8.innerHTML="<button type='submit' class='btn btn-success' value='Informar Pagamento' onclick='informarPagamento(this)' id='"+data[1][i]['idcobranca']+"' style='margin-right:4px;' data-bs-target='#pagamentoModal' data-bs-toggle='modal' data-bs-dismiss='modal'><span class='fontebotao fontmenor'>INFORMAR</span></button><button type='submit' class='btn btn-success' value='Agendar Cobranca' onclick='agendarCobranca(this)' id='"+data[1][i]['idcobranca']+"' style='margin-right:4px;' data-bs-target='#agendarModal' data-bs-toggle='modal' data-bs-dismiss='modal'><span class='fontebotao fontmenor'>AGENDAR</span></button>";
                    
                }
            }
        });
    }

    function informarPagamento(cobranca){
        pagamentoatual = cobranca.id;
        var indice = idcobrancalote.indexOf(parseInt(cobranca.id));
        valorpagamentoatual = valorcobrancalote[indice];
        calcularValorPagamento();
        $('#pagamentoModal').modal('show');

    }

    function agendarCobranca(cobranca){
        pagamentoatual = cobranca.id;
        var indice = idcobrancalote.indexOf(parseInt(cobranca.id));
        $('#agendarModal').modal('show');

    }

    function reagendarCobranca(cobranca){
        pagamentoatual = cobranca.id;
        var indice = idcobrancalote.indexOf(parseInt(cobranca.id));
        $('#reagendarModal').modal('show');

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
                valorpagamentosomado += parseFloat(pagamentovalor[i]);
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

    function informarPagamentoConfirm(){

        if(valorpagamentosomado != valorpagamentoatual){
            $('#avisoModal').modal('show');
            document.getElementById('avisoerro').innerHTML='Os valores do pagamento inseridos não batem com o valor do plano!';
        }else{
            
            $.ajax({
                type: "GET",
                url: "informarpagamentoinadimplente",
                data: {
                    cobrancaatual: pagamentoatual,
                    metodospagamentopagamento: pagamentometodo,
                    parcelapagamento: pagamentoparcela,
                    autopagamento: pagamentoauto,
                    cvpagamento: pagamentocv,
                    pagamentovalor: pagamentovalor,
                    informacao : document.getElementById('informacaoinput').value,
                },
                dataType: "json",
                success: function(data) {
                    $('#pagamentoModal').modal('hide');
                    console.log('Recebido sucesso!');
                }
            });
        }
    }

    function agendarCobrancaConfirm(){
          
          $.ajax({
              type: "GET",
              url: "agendarcobranca",
              data: {
                  cobrancaatual: pagamentoatual,
                  dataatual : document.getElementById('dataagendar').value,
                  informacao : document.getElementById('informacaoagendarinput').value
              },
              dataType: "json",
              success: function(data) {
                  $('#agendarModal').modal('hide');
                  console.log('Agendado com sucesso!');
              }
          });
    }

    function reagendarCobrancaConfirm(){
          
          $.ajax({
              type: "GET",
              url: "reagendarcobranca",
              data: {
                  cobrancaatual: pagamentoatual,
                  dataatual : document.getElementById('datareagendar').value,
                  informacao : document.getElementById('informacaoreagendarinput').value
              },
              dataType: "json",
              success: function(data) {
                  $('#reagendarModal').modal('hide');
                  console.log('Reagendado com sucesso!');
                  buscarAgendamentos();
              }
          });
    }

  
</script>
@endsection

</html>