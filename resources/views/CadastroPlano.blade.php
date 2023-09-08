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

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <script src="{{asset('jquery.min.js')}}"></script>
  <script src="{{asset('jquery-ui-1.12.1/jquery-ui.js')}}"></script>
  <script src="{{asset('inputmask/dist/jquery.inputmask.min.js')}}"></script>
  <script src="{{asset('inputmask/dist/bindings/inputmask.binding.js')}}"></script>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  <title>Cadastro Plano</title>

</head>

<body>
  @section('Conteudo')
  <div class="tituloprincipal">Cadastro Plano</div>
  <br>

  <div class="container-fluid" style='margin-top:1rem;'>
    <div class="row gx-3 gy-3">
      <div class="col-sm-5 col-md-4 col-lg-3 input" id='nome'>
        <div class="cor01">
          <label for="exampleInputEmail1" class="form-label">Nome do Plano</label>
          <input type="text" class="form-control" aria-describedby="emailHelp" name='nome' id='nomeinput' />
        </div>
      </div>
    </div>
    <div class="row gx-3 gy-3">
      <div class="col-sm-5 col-md-4 col-lg-3 input" id='desc'>
        <div class="cor01">
          <label for="descinput" class="form-label">Descrição do Plano</label>
          <textarea class="form-control" rows="3" name='desc' id='descinput' style='height:8rem'></textarea>
        </div>
      </div>
    </div>
    <div class="row gx-3 gy-3">
      <div class="col-sm-5 col-md-4 col-lg-3 input" id='qtddep'>
        <div class="cor01">
          <label for="exampleInputEmail1" class="form-label">Máximo de Dependentes</label>
          <input type="number" class="form-control" aria-describedby="emailHelp" name='qtddep' id='qtddepinput' min='1' />
        </div>
      </div>
    </div>
    <div class="row gx-3 gy-3">
      <div class="col-sm-5 col-md-4 col-lg-3 input" id='valor'>
        <div class="cor01">
          <label for="exampleInputEmail1" class="form-label">Valor do Plano (Boleto)</label>
          <input type="text" class="form-control" aria-describedby="emailHelp" name='valorboleto' id='valorinputboleto' value='0.00'/>
        </div>
        <div class="cor01">
          <label for="exampleInputEmail1" class="form-label">Valor do Plano (Cartão)</label>
          <input type="text" class="form-control" aria-describedby="emailHelp" name='valorcartao' id='valorinputcartao' value='0.00'/>
        </div>
        <div class="cor01">
          <label for="exampleInputEmail1" class="form-label">Valor da Adesão</label>
          <input type="text" class="form-control" aria-describedby="emailHelp" name='valoradesao' id='valorinputadesao' value='0.00'/>
        </div>
      </div>
    </div>
  </div>

  <div class="container-fluid" style='margin-top:4rem;'>
    <div class="row gx-3 gy-3">
      <div class="">
        <div class='input table-responsive-sm' id='tabelaprodutosservico'>
          <table class='table' id='planoservicostable'>
            <thead class="table-active">
              <tr>
                <td scope="col">Selecionar Serviço</td>
                <td scope="col">Valor Serviço</td>
                <td scope="col">Incluso</td>
                <td scope="col">Remover Serviço</td>
              </tr>
            </thead>
            <tbody id='planoservicos'>

            </tbody>
          </table>
          <button type="submit" class="btn btadd btadicionar" value="Adicionar" onclick="adicionaLinhaServico('planoservicos')">
            <span class="fontebotao">Adicionar</span>
          </button>
        </div>
      </div>
    </div>
    <div class="row gx-3 gy-3" style='margin-top: 2rem;'>
      <div class="">
        <div class='input table-responsive-sm' id='tabelaprodutositem'>
          <table class='table' id='planoitenstable'>
            <thead class="table-active">
              <tr>
                <td scope="col">Selecionar Item</td>
                <td scope="col">Qtd. Item</td>
                <td scope="col">Valor Item</td>
                <td scope="col">Incluso</td>
                <td scope="col">Remover Item</td>
              </tr>
            </thead>
            <tbody id='planoitens'>

            </tbody>
          </table>
          <button type="submit" class="btn btadd btadicionar" value="Adicionar" onclick="adicionaLinhaItem('planoitens')">
            <span class="fontebotao">Adicionar</span>
          </button>
        </div>
      </div>
    </div>
  </div>

  <div class="container-fluid" style='margin-top:4rem;'>
    <div class="row gx-3 gy-3">
      <div class="col-sm-3 col-md-2 col-lg-2">
        <div class="cor01">
          <button type='submit' name='cadastrarplano' class='input btn btamarelo' id='cadastrarplano' value='Cadastrar Plano' onclick='cadastrarplano()' style="margin-bottom: 3rem">
            <span class='selectacoes'>Cadastrar Plano</span>
          </button>
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
          <div id=''>Plano cadastrado com sucesso</div>
        </div>
        <div class="modal-footer">
          <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
          <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Ok</button>
        </div>
      </div>
    </div>
  </div>

</body>
<script>

$('#valorinputboleto').inputmask('decimal', {
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

  $('#valorinputcartao').inputmask('decimal', {
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

  $('#valorinputadesao').inputmask('decimal', {
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

  $('.input').css('display', 'block');
  var contlinhas = 0;
  var contlinhas1 = 0;
  var todosprodutos = [
    [],
    []
  ];
  var itens = [
    [],
    [],
    [],
    []
  ];
  var todosservicos = [
    [],
    []
  ];
  
  var servicosarray = [
    [],
    [],
    []
  ];
  var linhas = [];
  var planoitens = "";
  var planoservicos = "";
  var planoitensval = [];
  var planoservicosval = [];
  var planoitensvalorfinal = [];
  var planoitensincluso = [];
  var planoservicosvalorfinal = [];
  var planoservicosincluso = [];
  var valor = 0;
  pesquisarprodutos();
  pesquisarservicos();
  // setTimeout(function() {
  //   adicionaLinhaItem('planoitens');
  // }, 500);
  // setTimeout(function() {
  //   adicionaLinhaServico('planoservicos');
  // }, 500);

  function adicionaLinhaItem(idTabela) {
    contlinhas++;
    linhas.push(contlinhas);
    var tabela = document.getElementById(idTabela);
    var numeroLinhas = tabela.rows.length;
    var linha = tabela.insertRow(numeroLinhas);
    var celula1 = linha.insertCell(0);
    var celula2 = linha.insertCell(1);
    var celula3 = linha.insertCell(2);
    var celula4 = linha.insertCell(3);
    var celula5 = linha.insertCell(4);
    celula1.innerHTML = "<select name='produtoitem" + contlinhas + "' class='form-select selectcategoria' id='selectitem" + contlinhas + "' onchange='attprodid(this)'><option value='0'>Selecione um Item</option></select>";
    celula2.innerHTML = "<input type='number' name='quantidadeitem" + contlinhas + "' class='inputstexttelas inputtextcc' id='quantidadeitem" + contlinhas + "' min = '1' value = '1' onchange='attprodquant(this)'>";
    celula3.innerHTML = "<input type='text' name='valoritem" + contlinhas + "' class='inputstexttelas inputtextcc' id='valoritem" + contlinhas + "' onchange='attprodval(this)'>";
    celula4.innerHTML = "<input type='checkbox' name='inclusoitem" + contlinhas + "' id='inclusoitem" + contlinhas + "' onchange='tornarincluso(this)'>";
    celula5.innerHTML = "<button type='submit' class='btn btdelete' id='" + contlinhas + "' value='Excluir' onclick='removeLinhaItem(this)'><span class='fontebotao'>Excluir</span></button>";
    itens[3][contlinhas - 1] = 0;
    pegarprodutositem(contlinhas);
    $('#valoritem' + contlinhas).inputmask('decimal', {
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
  }

  function adicionaLinhaServico(idTabela) {
    contlinhas1++;
    linhas.push(contlinhas1);
    var tabela = document.getElementById(idTabela);
    var numeroLinhas = tabela.rows.length;
    var linha = tabela.insertRow(numeroLinhas);
    var celula1 = linha.insertCell(0);
    var celula2 = linha.insertCell(1);
    var celula3 = linha.insertCell(2);
    var celula4 = linha.insertCell(3);
    celula1.innerHTML = "<select name='produtoservico" + contlinhas1 + "' class='form-select selectcategoria' id='selectservico" + contlinhas1 + "' onchange='attservid(this)'><option value='0'>Selecione um Serviço</option></select>";
    celula2.innerHTML = "<input type='text' name='valorservico" + contlinhas1 + "' class='inputstexttelas inputtextcc' id='valorservico" + contlinhas1 + "' onchange='attservval(this)'>";
    celula3.innerHTML = "<input type='checkbox' name='inclusoservico" + contlinhas1 + "' id='inclusoservico" + contlinhas1 + "' onchange='tornarincluso(this)'>";
    celula4.innerHTML = "<button type='submit' class='btn btdelete' id='" + contlinhas1 + "' value='Excluir' onclick='removeLinhaServico(this)'><span class='fontebotao'>Excluir</span></button>";
    servicosarray[2][contlinhas1 - 1] = 0;
    pegarprodutosservico(contlinhas1);
    $('#valorservico' + contlinhas1).inputmask('decimal', {
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
  }

  // funcao remove uma linha da tabela
  function removeLinhaItem(linha) {
    var i = linha.parentNode.parentNode.rowIndex;
    document.getElementById('planoitenstable').deleteRow(i);
    linhas.splice(linha.id - 1, 1);
    itens[0].splice(linha.id - 1, 1);
    itens[1].splice(linha.id - 1, 1);
    itens[2].splice(linha.id - 1, 1);
    itens[3].splice(linha.id - 1, 1);
    contlinhas--;
    refazertabelaitem();

  }

  function removeLinhaServico(linha) {
    var i = linha.parentNode.parentNode.rowIndex;
    document.getElementById('planoservicostable').deleteRow(i);
    linhas.splice(linha.id - 1, 1);
    servicosarray[0].splice(linha.id - 1, 1);
    servicosarray[1].splice(linha.id - 1, 1);
    servicosarray[2].splice(linha.id - 1, 1);
    contlinhas1--;
    refazertabelaservico();

  }

  function apagartabelaitem() {
    var tableHeaderRowCount = 1;
    var table = document.getElementById('planoitenstable');
    var rowCount = table.rows.length;
    for (var i = tableHeaderRowCount; i < rowCount; i++) {
      table.deleteRow(tableHeaderRowCount);
    }
  }

  function apagartabelaservico() {
    var tableHeaderRowCount = 1;
    var table = document.getElementById('planoservicostable');
    var rowCount = table.rows.length;
    for (var i = tableHeaderRowCount; i < rowCount; i++) {
      table.deleteRow(tableHeaderRowCount);
    }
  }

  function refazertabelaitem() {
    apagartabelaitem();
    for (var i = 1; i <= contlinhas; i++) {
      var tabela = document.getElementById('planoitens');
      var numeroLinhas = tabela.rows.length;
      var linha = tabela.insertRow(numeroLinhas);
      var celula1 = linha.insertCell(0);
      var celula2 = linha.insertCell(1);
      var celula3 = linha.insertCell(2);
      var celula4 = linha.insertCell(3);
      var celula5 = linha.insertCell(4);
      celula1.innerHTML = "<select name='produtoitem" + i + "' class='form-select selectcategoria' id='selectitem" + i + "' onchange='attprodid(this)'><option value='0'>Selecione um Item</option></select>";
      celula2.innerHTML = "<input type='number' name='quantidadeitem" + i + "' class='inputstexttelas inputtextcc' id='quantidadeitem" + i + "' min = '1' value = '1' onchange='attprodquant(this)'>";
      celula3.innerHTML = "<input type='text' name='valoritem" + i + "' class='inputstexttelas inputtextcc' id='valoritem" + i + "' onchange='attprodval(this)'>";
      celula4.innerHTML = "<input type='checkbox' name='inclusoitem" + i + "' id='inclusoitem" + i + "' onchange='tornarincluso(this)'>";
      celula5.innerHTML = "<button type='submit' class='btn btdelete' id='" + i + "' value='Excluir' onclick='removeLinhaItem(this)'><span class='fontebotao'>Excluir</span></button>";
      pegarprodutositem(i);
      setTimeout(function() {
        preenchervaloresitem();
      }, 700);
      $('#valoritem' + i).inputmask('decimal', {
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
    }
  }

  function refazertabelaservico() {
    apagartabelaservico();
    for (var i = 1; i <= contlinhas1; i++) {
      var tabela = document.getElementById('planoservicos');
      var numeroLinhas = tabela.rows.length;
      var linha = tabela.insertRow(numeroLinhas);
      var celula1 = linha.insertCell(0);
      var celula2 = linha.insertCell(1);
      var celula3 = linha.insertCell(2);
      var celula4 = linha.insertCell(3);
      celula1.innerHTML = "<select name='produtoservico" + i + "' class='form-select selectcategoria' id='selectservico" + i + "' onchange='attservid(this)'><option value='0'>Selecione um Serviço</option></select>";
      celula2.innerHTML = "<input type='text' name='valorservico" + i + "' class='inputstexttelas inputtextcc' id='valorservico" + i + "' onchange='attservval()'>";
      celula3.innerHTML = "<input type='checkbox' name='inclusoservico" + i + "' id='inclusoservico" + i + "' onchange='tornarincluso(this)'>";
      celula4.innerHTML = "<button type='submit' class='btn btdelete' id='" + i + "' value='Excluir' onclick='removeLinhaServico(this)'><span class='fontebotao'>Excluir</span></button>";
      $('#valorservico' + i).inputmask('decimal', {
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
      pegarprodutosservico(i);
      setTimeout(function() {
        preenchervaloresservico();
      }, 700);

    }
  }

  function attprodid(celula) {
    itens[0][celula.id.substr(10) - 1] = celula.value;
    itens[1][celula.id.substr(10) - 1] = 1;
    itens[2][celula.id.substr(10) - 1] = undefined;
    checarvalor(celula);
  }

  function attprodquant(celula) {
    itens[1][celula.id.substr(14) - 1] = celula.value;
    calcularvaloritem(celula);
  }

  function attprodval(celula) {
    itens[2][celula.id.substr(9) - 1] = celula.value;
    calcularvalor();
  }

  function attservid(celula) {
    servicosarray[0][celula.id.substr(13) - 1] = celula.value;
    servicosarray[1][celula.id.substr(13) - 1] = undefined;
    checarvalor(celula);
  }

  function attservval(celula) {
    servicosarray[1][celula.id.substr(12) - 1] = celula.value;
    calcularvalor();
  }

  function tornarincluso(cedula) {
    if (cedula.id[7] == 's' && cedula.checked == true) {
      document.getElementById('valorservico' + cedula.id.substr(14)).disabled = true;
      servicosarray[2][cedula.id.substr(14) - 1] = 1;
    } else if (cedula.id[7] == 's' && cedula.checked == false) {
      document.getElementById('valorservico' + cedula.id.substr(14)).disabled = false;
      servicosarray[2][cedula.id.substr(14) - 1] = 0;
    } else if (cedula.id[7] == 'i' && cedula.checked == true) {
      document.getElementById('valoritem' + cedula.id.substr(11)).disabled = true;
      itens[3][cedula.id.substr(11) - 1] = 1;
    } else if (cedula.id[7] == 'i' && cedula.checked == false) {
      document.getElementById('valoritem' + cedula.id.substr(11)).disabled = false;
      itens[3][cedula.id.substr(11) - 1] = 0;
    }
    calcularvalor();
  }

  function preenchervaloresservico() {
    for (var i = 1; i <= contlinhas1; i++) {
      if (servicosarray[0][i - 1] == undefined) {
        document.getElementById('selectservico' + i).value = 0;
      } else {
        document.getElementById('selectservico' + i).value = servicosarray[0][i - 1];
        document.getElementById('valorservico' + i).value = servicosarray[1][i - 1];
        if (servicosarray[2][i - 1] == 1) {
          document.getElementById('inclusoservico' + i).checked = true;
        }
      }
    }
  }

  function preenchervaloresitem() {
    for (var i = 1; i <= contlinhas; i++) {
      document.getElementById('selectitem' + i).value = itens[0][i - 1];
      if (itens[0][i - 1] == undefined) {
        document.getElementById('selectitem' + i).value = 0;
      } else {
        document.getElementById('selectitem' + i).value = itens[0][i - 1];
        document.getElementById('quantidadeitem' + i).value = itens[1][i - 1];
        document.getElementById('valoritem' + i).value = itens[2][i - 1];
        if (itens[3][i - 1] == 1) {
          document.getElementById('inclusoitem' + i).checked = true;
        }
      }
    }
  }

  function checarvalor(celula) {
    if (celula.id[6] == 's') {
      if (servicosarray[1][celula.id.substr(13) - 1] == undefined) {
        document.getElementById('valorservico' + celula.id.substr(13)).value = todosservicos[2][todosservicos[0].indexOf(parseInt(celula.value))].toString().replace('.', ',');
        servicosarray[1][celula.id.substr(13) - 1] = todosservicos[2][todosservicos[0].indexOf(parseInt(celula.value))];
      }
    } else {
      document.getElementById('valoritem' + celula.id.substr(10)).value = todosprodutos[2][todosprodutos[0].indexOf(parseInt(celula.value))].toString().replace('.', ',');
      itens[2][celula.id.substr(10) - 1] = todosprodutos[2][todosprodutos[0].indexOf(parseInt(celula.value))];
    }
    calcularvalor();
  }

  function calcularvaloritem(celula) {
    var itematual = document.getElementById('selectitem' + celula.id.substr(14)).value
    var valorant = planoitensval[itematual];
    var valoratual = valorant * celula.value;
    document.getElementById('valoritem' + celula.id.substr(14)).value = valoratual;
    itens[2][celula.id.substr(14) - 1] = valoratual;
    calcularvalor();
  }

  function pesquisarprodutos() {
    todosprodutos = [
      [],
      [],
      []
    ];
    $.ajax({
      type: "GET",
      url: "/consultacadastroitem",
      data: {},
      dataType: "json",
      success: function(data) {
        for (var i = 0; i < data['id'].length; i++) {
          todosprodutos[0][i] = data['id'][i];
          todosprodutos[1][i] = data['nome'][i];
          todosprodutos[2][i] = data['valor'][i];
        }
      }
    });
  }

  function pesquisarservicos() {
    todosservicos = [
      [],
      [],
      []
    ];
    $.ajax({
      type: "GET",
      url: "/consultacadastroservi",
      data: {},
      dataType: "json",
      success: function(data) {
        for (var i = 0; i < data['id'].length; i++) {
          todosservicos[0][i] = data['id'][i];
          todosservicos[1][i] = data['nome'][i];
          todosservicos[2][i] = data['valor'][i];
        }
      }
    });
  }

  function pegarprodutositem(linha) {
    planoitensval = [];
    var select = document.getElementById('selectitem' + linha);
    for (var i = 0; i < todosprodutos[0].length; i++) {
      var opt = document.createElement('option');
      opt.appendChild(document.createTextNode(todosprodutos[1][i]));
      opt.value = todosprodutos[0][i];
      select.appendChild(opt);
      planoitensval[todosprodutos[0][i]] = todosprodutos[2][i].replace('.', ',');
    }
  }

  function pegarprodutosservico(linha) {
    planoservicosval = [];
    var select = document.getElementById('selectservico' + linha);
    for (var i = 0; i < todosservicos[0].length; i++) {
      var opt = document.createElement('option');
      opt.appendChild(document.createTextNode(todosservicos[1][i]));
      opt.value = todosservicos[0][i];
      select.appendChild(opt);
      if(todosservicos[2][i] == null){
        planoitensval[todosservicos[0][i]] = 0;
      }else{
        planoitensval[todosservicos[0][i]] = todosservicos[2][i].toString().replace('.', ',');
      }
      
    }
  }

  function calcularvalor() {
    valor = 0;
    for (var i = 1; i <= contlinhas; i++) {
      if (document.getElementById('valoritem' + i).value != '' && document.getElementById('valoritem' + i).disabled == false) {
        valor += parseFloat(document.getElementById('valoritem' + i).value);
      }

    }
    for (var o = 1; o <= contlinhas1; o++) {
      if (document.getElementById('valorservico' + o).value != '' && document.getElementById('valorservico' + o).disabled == false) {
        valor += parseFloat(document.getElementById('valorservico' + o).value);
      }

    }
    document.getElementById('valorinputboleto').value = valor;
    document.getElementById('valorinputcartao').value = valor;
  }

  function cadastrarplano() {
    $.ajax({
      type: "GET",
      url: "/cadastro/cadastroplano",
      data: {
        nome: $("[name='nome']").val(),
        desc: $("[name='desc']").val(),
        qtddep: $("[name='qtddep']").val(),
        valorboleto: $("[name='valorboleto']").val(),
        valorcartao: $("[name='valorcartao']").val(),
        valoradesao: $("[name='valoradesao']").val(),
        servicos: servicosarray,
        itens: itens,
      },
      dataType: "json",
      success: function(data) {
        $('#exampleModal').modal('show');
        console.log('Plano cadastrado com sucesso');
      }
    });

  }
</script>

</html>
@endsection