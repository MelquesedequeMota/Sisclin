@extends('layouts.Menu')
@section('atalhoSuperior')@endsection
@section('menuLateral')@endsection
<!DOCTYPE html>
<html lang="en">
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
    <title>Relatório Adimplentes e Inadimplentes</title>
    <style>
      .resumodados {
        width: 100%;
      }
    </style>
</head>
<body>
    @section('Conteudo')
    <div class="divconteudo" id='divconteudo2' style='position: relative;'>
      <div class="container-fluid titulosuperior">Adimplentes e Inadimplentes</div>
      <div class="container-fluid resumo">
        <div class='tituloresumo'>
          <div class='traco'></div>
          <div>Resumo de Adimplentes e Inadimplentes</div>
        </div>
        <div class='rolagemdoresumo'>
          <div class='resumodados divresumomaior'>
            <div class='resumovalores'>
              <div>
                <img src="../imagens/dinheiroverde.svg" alt="" class='imgicon'>
              </div>
              <div id='qtdadimplentes'></div>
              <div>Adimplentes</div>
            </div>
            <div class='resumovalores' style=''>
              <div>
                <img src="../imagens/dinheirovermelho.svg" alt="" class='imgicon'>
              </div>
              <div id='qtdinadimplentes'></div>
              <div>Inadimplentes</div>
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
            <select class="form-select" id='selectfiltro' onchange='checarintervalofluxo()'>
              <option selected value=''>Todos</option>
              <option value="adimplentes">Adimplentes</option>
              <option value="inadimplentes">Inadimplentes</option>
            </select>
            
            <!-- <div style='width: 100%;'>
              <div id="lupa">
                <img src="../imagens/searchfluxo.svg" alt="" style='width:1.2rem'>
              </div>
              <input type="text" class="form-control" name='campopesquisa' id='campopesquisa' onchange=''>
            </div> -->
          </div>
          <div class="col-sm-3 col-md-3 col-lg-2 testee" style='align-self: end;'>
            <button type="submit" class="btn btdelete" value="Gerar PDF" onclick="gerarpdf()">
              <span class="fontebotao" style="font-size:15px">Gerar PDF</span>
            </button>
          </div>
          
        </div>
      </div>

      <div class="row d-flex justify-content-center"> <!-- class="container-fluid"> -->
      <div id='tabela' class="table-responsive-sm">
        <table id='adimplenteinadimplente' class="table" style='margin-bottom: 7rem;'>
          <thead class="table-active" id='adimplenteinadimplentehead'>
            <tr>
              <td scope="col">Pessoa</td>
              <td scope="col">Contrato</td>
              <td scope="col">Telefone</td>
              <td scope="col">Parcelas</td>
              <td scope="col">Situação</td>
            </tr>
          </thead>
          <tbody id='adimplenteinadimplentebody'>
          </tbody>
        </table>
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

    $('#intervalofluxo1').inputmask('99/99/9999');
    $('#intervalofluxo2').inputmask('99/99/9999');

    agendaTabelas();
    

    function agendaTabelas() {

        document.getElementById('intervalofluxo1').value = diaatual;
        document.getElementById('intervalofluxo2').value = ultimodia2;
        checarintervalofluxo();

    }

    function checarintervalofluxo() {
        if (document.getElementById('intervalofluxo1').value <= document.getElementById('intervalofluxo2').value) {
            checarfluxodecaixa();
        }
    }

    function gerarpdf() {
        window.open(window.location.href.substring(0, window.location.href.length - 27) + 'relatoriodespesasereceitaspdf?inicio=' + document.getElementById('intervalofluxo1').value + '&fim=' + document.getElementById('intervalofluxo2').value + '&filtro=' + document.getElementById('selectfiltro').value);
    }

    function checarfluxodecaixa() {
        var tableHeaderRowCount = 0;
        var table = document.getElementById('adimplenteinadimplentebody');
        var rowCount = table.rows.length;
        for (var i = tableHeaderRowCount; i < rowCount; i++) {
            table.deleteRow(tableHeaderRowCount);
        }
        $.ajax({
        type: "GET",
        url: "/relatorioadimplentesinadimplentesdados",
        data: {
            inicio: document.getElementById('intervalofluxo1').value,
            fim: document.getElementById('intervalofluxo2').value,
            filtro: document.getElementById('selectfiltro').value
        },
        dataType: "json",
        success: function(data) {
            // console.log(data);
            qtdinadimplentes = 0;
            qtdadimplentes = 0;
            if(data[0].length == 0){
              document.getElementById('adimplenteinadimplentehead').style.display = "none";
              document.getElementById('qtdadimplentes').innerHTML = qtdadimplentes;
              document.getElementById('qtdinadimplentes').innerHTML = qtdinadimplentes;
            }else{
              for (i = 0; i < data[0].length; i++) {
                if (data[4][i] == 'Adimplente') {
                    qtdadimplentes++;
                } else {
                    qtdinadimplentes++;
                }
                document.getElementById('adimplenteinadimplentehead').style.display = "block";
                var tabela = document.getElementById('adimplenteinadimplentebody');
                var numeroLinhas = tabela.rows.length;
                var linha = tabela.insertRow(numeroLinhas);
                var celula1 = linha.insertCell(0);
                var celula2 = linha.insertCell(1);
                var celula3 = linha.insertCell(2);
                var celula4 = linha.insertCell(3);
                var celula5 = linha.insertCell(4);
                celula1.innerHTML = data[0][i];
                celula2.innerHTML = data[1][i];
                celula3.innerHTML = data[2][i]
                celula4.innerHTML = data[3][i];
                celula5.innerHTML = data[4][i];
              }
                document.getElementById('qtdadimplentes').innerHTML = qtdadimplentes;
                document.getElementById('qtdinadimplentes').innerHTML = qtdinadimplentes;
             }
            }
            
        });
    }
</script>
@endsection
</html>
