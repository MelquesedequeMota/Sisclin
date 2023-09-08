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
  <title>Relatório Receitas e Despesas</title>
  <style>
    .divconteudo{
      width:90%;
    }
    .resumodados{
      width:100%;
    }
  </style>
</head>
<body>
    @section('Conteudo')
    <div class="divconteudo" id='divconteudo2' style='position: relative;'>
      <div class="container-fluid titulosuperior">Despesas e Receitas</div>
      <div class="container-fluid resumo">
        <div class='tituloresumo'>
          <div class='traco'></div>
          <div>Resumo do Despesas e Receitas</div>
        </div>
        <div class='rolagemdoresumo'>
          <div class='resumodados divresumomaior'>
            <div class='resumovalores'>
              <div>
                <img src="../imagens/dinheiroverde.svg" alt="" class='imgicon'>
              </div>
              <div id='parcelasrecebidasfluxo'></div>
              <div>Recebimentos</div>
            </div>
            <div class='resumovalores' style=''>
              <div>
                <img src="../imagens/dinheirovermelho.svg" alt="" class='imgicon'>
              </div>
              <div id='parcelaspagasfluxo'></div>
              <div>Pagamentos</div>
            </div>
            <div class='resumovalores' style='width: 13.5rem!important;'>
              <div>
                <img src="../imagens/dinheiroverde.svg" alt="" class='imgicon'>
              </div>
              <div id='totalrecebidofluxo'></div>
              <div>Total recebido</div>
            </div>
            <div class='resumovalores valormaior1' style=''>
              <div>
                <img src="../imagens/dinheirovermelho.svg" alt="" class='imgicon'>
              </div>
              <div id='totalpagofluxo'></div>
              <div>Total Pago</div>
            </div>
            <div class='resumovalores valormaior2' style=''>
              <div>
                <img src="../imagens/dinheirovermelho.svg" alt="" class='imgicon'>
              </div>
              <div id='resumofluxo'></div>
              <div>Resumo</div>
            </div>
          </div>
        </div>
      </div>
      <div class="container-fluid" style="margin-bottom: 1rem;">
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
              <option value="receitas">Receitas</option>
              <option value="despesas">Despesas</option>
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

      <div class="row d-flex justify-content-center">
        <div id='tabela' class="table-responsive-sm">
          <table id='fluxorecebidastable' class="table" style='display:inline-block;heigth:100vh'>
            <thead class="table-active">
              <tr>
                <!-- <td scope="col"><input type='checkbox' disabled></td> -->
                <td scope="col">Data</td>
                <td scope="col">Descrição</td>
                <td scope="col">Pagamento</td>
                <td scope="col">Valor</td>
                <td scope="col">Tipo</td>
              </tr>
            </thead>
            <tbody id='fluxorecebidastablebody'>
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
        var table = document.getElementById('fluxorecebidastablebody');
        var rowCount = table.rows.length;
        for (var i = tableHeaderRowCount; i < rowCount; i++) {
            table.deleteRow(tableHeaderRowCount);
        }
        $.ajax({
        type: "GET",
        url: "/consultadespesasereceitas",
        data: {
            inicio: document.getElementById('intervalofluxo1').value,
            fim: document.getElementById('intervalofluxo2').value,
            filtro: document.getElementById('selectfiltro').value
        },
        dataType: "json",
        success: function(data) {
            // console.log(data);
            parcelaspagasfluxo = 0;
            parcelasrecebidasfluxo = 0;
            totalpagofluxo = 0;
            totalrecebidofluxo = 0;
            resumofluxo = 0;
            for (i = 0; i < data['formapagamentoconta'].length; i++) {
                if (data['tipoconta'][i] == 'Receita') {
                    parcelasrecebidasfluxo++;
                    totalrecebidofluxo += data['valorconta'][i];
                } else {
                    parcelaspagasfluxo++;
                    totalpagofluxo += data['valorconta'][i];
                }
                var tabela = document.getElementById('fluxorecebidastablebody');
                var numeroLinhas = tabela.rows.length;
                var linha = tabela.insertRow(numeroLinhas);
                var celula1 = linha.insertCell(0);
                var celula2 = linha.insertCell(1);
                var celula3 = linha.insertCell(2);
                var celula4 = linha.insertCell(3);
                var celula5 = linha.insertCell(4);
                // celula1.innerHTML = "<input type='checkbox' name='checkboxreceitasapagar" + data['idcontareceber'][i] + "' id='checkboxreceitasapagar" + data['idcontareceber'][i] + "'>";
                var data0fluxo = data['datapagoconta'][i].split('-');
                celula1.innerHTML = data0fluxo[2] + '/' + data0fluxo[1] + '/' + data0fluxo[0];
                celula2.innerHTML = data['descconta'][i];
                switch (data['formapagamentoconta'][i]) {
                    case 1:
                    celula3.innerHTML = 'Dinheiro';
                    break;
                    case 2:
                    celula3.innerHTML = 'Cartão - Débito';
                    break;
                    case 3:
                    celula3.innerHTML = 'Cartão - Crédito';
                    break;
                    case 4:
                    celula3.innerHTML = 'Pix'
                    break;
                    case 5:
                    celula3.innerHTML = 'Cheque'
                    break;
                    default:
                    celula3.innerHTML = 'Boleto Bancário';
                }
                celula4.innerHTML = data['valorconta'][i].toLocaleString('pt-BR', {
                    minimumFractionDigits: 2,
                    style: 'currency',
                    currency: 'BRL'
                });
                celula5.innerHTML = data['tipoconta'][i];
                }
                document.getElementById('totalrecebidofluxo').innerHTML = totalrecebidofluxo.toLocaleString('pt-BR', {
                    minimumFractionDigits: 2,
                    style: 'currency',
                    currency: 'BRL'
                });
                document.getElementById('parcelasrecebidasfluxo').innerHTML = parcelasrecebidasfluxo;
                document.getElementById('totalpagofluxo').innerHTML = totalpagofluxo.toLocaleString('pt-BR', {
                    minimumFractionDigits: 2,
                    style: 'currency',
                    currency: 'BRL'
                });
                document.getElementById('parcelaspagasfluxo').innerHTML = parcelaspagasfluxo;
                resumofluxo = totalrecebidofluxo - totalpagofluxo;
                document.getElementById('resumofluxo').innerHTML = resumofluxo.toLocaleString('pt-BR', {
                    minimumFractionDigits: 2,
                    style: 'currency',
                    currency: 'BRL'
                });
            }
        });
    }
</script>
@endsection
</html>
