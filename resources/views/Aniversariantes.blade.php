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

  <title>Aniversariantes</title>
</head>

<body>
  @section('Conteudo')
  <div id='diverrointervaloaniversario'></div>

	<div class="tituloprincipal container-fluid" style='margin-bottom: 2.7rem;'>Aniversariantes</div>
	<br><br>

  <div class="container-fluid" style='margin-top:1rem;'>
    <div class="row gx-3 gy-3">
      <div class="col-sm-3 col-md-3 col-lg-2">
        <div>
          <label for="intervaloaniversario1" class="form-label">Data inicial</label>
          <input type="text" class="form-control" aria-describedby="emailHelp" name='intervaloaniversario1' id='intervaloaniversario1' data-inputmask="'mask': '99/99'" />
        </div>
      </div>
      <div class="col-sm-1 col-md-1 col-lg-1" style='display: flex;justify-content: center;margin-top: 5.5rem !important;width: 5rem'>
        <div>
          <span>até</span>
        </div>
      </div>
      <div class="col-sm-3 col-md-3 col-lg-3">
        <div>
          <label for="intervaloaniversario2" class="form-label">Data Final</label>
          <div class='direction'>
            <div style='width: 100%;'>
              <input type="text" class="form-control" aria-describedby="emailHelp" name='intervaloaniversario2' id='intervaloaniversario2' data-inputmask="'mask': '99/99'" />
            </div>
						&nbsp;&nbsp;
            <div>
              <button type="button" class="btn btn-primary" id='pesquisarintervalobutton' onclick='checarintervaloaniversario()'>
                Pesquisar
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- <div class="col-sm-1 col-md-3 col-lg-2">
      <div>

      </div>
    </div> -->

    <div class="container-fluid">
      <div id='tabela' class="table-responsive-sm">
        <table id='aniversariotable' class="table">
          <thead class="table-active">
            <tr>
              <td scope="col"><input type='checkbox' class='checkboxtodos' disabled></td>
              <td scope="col">Pessoa</td>
              <td scope="col">Data Aniversário</td>
              <td scope="col">Idade</td>
              <td scope="col">Telefone</td>
              <td scope="col">E-mail</td>
            </tr>
          </thead>
          <tbody id='aniversariotablebody'>
          </tbody>
        </table>
      </div>
    </div>
</body>
<script>
  var nomeaniversariantes = [];
  var dataaniversariantes = [];
  var telaniversariantes = [];
  var emailaniversariantes = [];

  var mesatual = new Date().getMonth();
  var anoatual = new Date().getFullYear();
  var ultimodia = new Date(anoatual, mesatual + 1, 0).toLocaleDateString().split('/');
  var ultimodia2 = ultimodia[0] + "/" + ultimodia[1];
  var diaatual = String(new Date().getDate()).padStart(2, '0') + "/" + String((mesatual + 1)).padStart(2, '0');
  document.getElementById('intervaloaniversario2').value = ultimodia2;
  document.getElementById('intervaloaniversario1').value = diaatual;
  checarintervaloaniversario();

  function checarintervaloaniversario() {
    if (document.getElementById('intervaloaniversario1').value <= document.getElementById('intervaloaniversario2').value) {
      var tableHeaderRowCount = 0;
      var table = document.getElementById('aniversariotablebody');
      var rowCount = table.rows.length;
      for (var i = tableHeaderRowCount; i < rowCount; i++) {
        table.deleteRow(tableHeaderRowCount);
      }
      $.ajax({
        type: "GET",
        url: "/consultaraniversariantes",
        data: {
          inicio: document.getElementById('intervaloaniversario1').value,
          fim: document.getElementById('intervaloaniversario2').value
        },
        dataType: "json",
        success: function(data) {
          nomeaniversariantes = [];
          dataaniversariantes = [];
          telaniversariantes = [];
          emailaniversariantes = [];
          for (i = 0; i < data['nome'].length; i++) {
            nomeaniversariantes.push(data['nome'][i]);
            dataaniversariantes.push(data['datanasc'][i]);
            telaniversariantes.push(data['tel'][i]);
            emailaniversariantes.push(data['email'][i]);
            var tabela = document.getElementById('aniversariotablebody');
            var numeroLinhas = tabela.rows.length;
            var linha = tabela.insertRow(numeroLinhas);
            var celula1 = linha.insertCell(0);
            var celula2 = linha.insertCell(1);
            var celula3 = linha.insertCell(2);
            var celula4 = linha.insertCell(3);
            var celula5 = linha.insertCell(4);
            var celula6 = linha.insertCell(5);
            celula1.innerHTML = "<input type='checkbox' name='checkboxreceitaspagas" + numeroLinhas + "' id='checkboxreceitaspagas" + numeroLinhas + "'>";
            celula2.innerHTML = data['nome'][i];
            celula3.innerHTML = data['datanasc'][i].split('-')[2] + '/' + data['datanasc'][i].split('-')[1] + '/' + data['datanasc'][i].split('-')[0];
            celula4.innerHTML = idade(data['datanasc'][i].split('-')[0], data['datanasc'][i].split('-')[1], data['datanasc'][i].split('-')[2]);
            celula5.innerHTML = data['tel'][i];
            celula6.innerHTML = data['email'][i];
          }
        }
      });
    }
  }

  function idade(ano_aniversario, mes_aniversario, dia_aniversario) {
    var d = new Date,
      ano_atual = d.getFullYear(),
      mes_atual = d.getMonth() + 1,
      dia_atual = d.getDate(),

      ano_aniversario = +ano_aniversario,
      mes_aniversario = +mes_aniversario,
      dia_aniversario = +dia_aniversario,

      quantos_anos = ano_atual - ano_aniversario;

    if (mes_atual < mes_aniversario || mes_atual == mes_aniversario && dia_atual < dia_aniversario) {
      quantos_anos--;
    }

    return quantos_anos < 0 ? 0 : quantos_anos;
  }
</script>
@endsection

</html>