@extends('layouts.Menu')
@section('atalhoSuperior')@endsection
@section('menuLateral')@endsection

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- css da página  -->
  <link rel="stylesheet" href="{{asset('../css/estilo.css')}}">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <script src="{{asset('jquery.min.js')}}"></script>
  <script src="{{asset('shortcut.js')}}"></script>
  <script src="{{asset('jquery-ui-1.12.1/jquery-ui.js')}}"></script>
  <script src="{{asset('inputmask/dist/jquery.inputmask.min.js')}}"></script>
  <script src="{{asset('inputmask/dist/bindings/inputmask.binding.js')}}"></script>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  <title>Consulta Raio X</title>

  <style>
    @media (max-width:575px) {

      .largurainput,
      .btnovaespec {
        width: 100% !important;
      }
    }
  </style>
</head>

<body>
  @section('Conteudo')
  <div class="tituloprincipal container-fluid">Consulta Raio X</div>

  <div class="container-fluid" style='margin-top:2.8rem;'>
    <div class="row gx-3 gy-3">
      <div class="col-sm-7 col-md-5 col-lg-4">
        <div class="cor01">
          <label for="raioxpesquisatext" class="form-label">Nome do Raio X</label>
          <div class="direction">
            <div class='mb-2 largurainput' style='width:80%'>
              <input type="text" name='raioxpesquisatext' id='raioxpesquisatext' class='form-control'>
            </div>
            <div class='btnovaespec' style='width:10%'>
              <button type="submit" class="btn btamarelo" name='raioxpesquisabutton' id='raioxpesquisabutton' value='Pesquisar' onclick='pesquisarraiox()'>
                <span class="selectacoes" style='font-size:15px'>Pesquisar</span>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class='container-fluid' style='margin-top:3.4rem!important'>
    <div id='tabela' class="table-responsive-sm">
      <table id='pesquisarraioxtable' class="table">
        <thead class="table-active">
          <tr>
            <td scope="col">Nome</td>
            <td scope="col">Ações</td>
          <tr>
        </thead>
        <tbody id='tbodytable'>

        </tbody>
      </table>
    </div>
  </div>


  <div id="editarraioxdiv">
    <div class="container-fluid" style='margin-top:0.8rem;'>
      <div class='input tituloeditar' id="titulo" style='margin-bottom:1rem'>Editar Dado</div>
      <br>
      <div class="row gx-3 gy-3">
        <div class="col-sm-7 col-md-5 col-lg-4">
          <div class="cor01">
            <label for="editarraioxtext" class="form-label">Nome do Raio X</label>
            <div class="direction">
              <div class='mb-2 largurainput' style='width:80%'>
                <input type="text" name='editarraioxtext' id='editarraioxtext' class='form-control'>
              </div>
              <div class='btnovaespec' style='width:10%'>
                <button type="submit" class="btn btn-success" name='editarraioxbutton' id='editarraioxbutton' value='Editar' onclick='editarraiox()'>
                  <span class="fontebotao" style='font-size:15px'>Editar</span>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

	<!-- Modal -->
	<div class="modal fade" id="edicao" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h4 class="modal-title" id="exampleModalLabel">Edição</h4>
	        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	      </div>
	      <div class="modal-body">
	        <div id=''>Raio X editado com sucesso</div>
	      </div>
	      <div class="modal-footer">
	        <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
	        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Ok</button>
	      </div>
	    </div>
	  </div>
	</div>

</body>

</html>

<script>
  reset();
  escondertabela();
  var dadoslinhas = [];

  function pesquisarraiox() {
    $.ajax({
      type: "GET",
      url: "/consulta/raiox/dados",
      data: {
        nomeraiox: document.getElementById('raioxpesquisatext').value
      },
      dataType: "json",
      success: function(data) {
        document.getElementById('pesquisarraioxtable').style.display = 'block';
        document.getElementById('editarraioxdiv').style.display = 'none';
        apagartabela();
        for (i = 0; i < data.length; i++) {
          var tabela = document.getElementById('tbodytable');
          var numeroLinhas = tabela.rows.length;
          var linha = tabela.insertRow(numeroLinhas);
          var celula1 = linha.insertCell(0);
          var celula2 = linha.insertCell(1);
          dadoslinhas.push(data[i]['raiox_nome']);
          celula1.innerHTML = data[i]['raiox_nome'];
          celula2.innerHTML = "<select id='selectraiox" + i + "' name='selectraiox" + i + "' class='form-select selectacoes' aria-label='Default select example' onchange='acoes(this)'><option value=''>Ações</option><option value='editar'>Editar</option><option value='excluir'>Excluir</option></select>";

        }
      }
    });
  }

  function apagartabela() {
    var tableHeaderRowCount = 1;
    var table = document.getElementById('pesquisarraioxtable');
    var rowCount = table.rows.length;
    for (var i = tableHeaderRowCount; i < rowCount; i++) {
      table.deleteRow(tableHeaderRowCount);
    }
  }

  function acoes(select) {
    var id = select.id.split('selectraiox');
    if (document.getElementById('selectraiox' + id[1]).value == 'editar') {
      editar(id[1]);
    }
  }

  function editar(linha) {
    linha = parseInt(linha);
    $.ajax({
      type: 'GET',
      url: 'raiox/dadosedit',
      data: {
        nomeraiox: dadoslinhas[linha]
      },
      dataType: "json",
      success: function(data) {
        esconder(data[0]);
      }
    });
  }

  function escondertabela() {
    $('#pesquisarraioxtable').css('display', 'none');
  }

  function esconder(dados) {
    escondertabela();

    raioxatual = dados['raiox_id'];
    document.getElementById('editarraioxdiv').style.display = 'block';

    document.querySelector("[name='editarraioxtext']").value = dados['raiox_nome'];
  }

  function reset() {
    $('#editarraioxdiv').css('display', 'none');
  }

  function editarraiox() {
    $.ajax({
      type: "GET",
      url: "/editar/editarraiox",
      data: {
        id: raioxatual,
        nome: $("[name='editarraioxtext']").val(),
      },
      dataType: "json",
      success: function(data) {
				$('#edicao').modal('show');
        console.log('raiox editado com sucesso');
      }
    });
  }
</script>
@endsection