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
    <title>Relatório Planos</title>
    <style>
      .resumodados {
        width: 100%;
      }
      .divconteudo{
        width:90%;
      }
      /* .resumovalores{
        width:17rem;
      } */
    </style>
</head>
<body>
    @section('Conteudo')
    <div class="divconteudo" id='divconteudo2' style='position: relative;'>
      <div class="container-fluid titulosuperior">Planos</div>
      <div class="container-fluid resumo">
        <div class='tituloresumo'>
          <div class='traco'></div>
          <div>Resumo dos Planos</div>
        </div>
        <div class='rolagemdoresumo'>
          <div class='resumodados divresumomaior'>
            <div class='resumovalores' style='width:12rem'>
              <div>
                <img src="../imagens/dinheiroverde.svg" alt="" class='imgicon'>
              </div>
              <div>Qtd de Planos</div>
              <div id='qtdplanos'></div>
            </div>
            <div class='resumovalores' style='width:15rem'>
              <div>
                <img src="../imagens/dinheirovermelho.svg" alt="" class='imgicon'>
              </div>
              <div>Total Adesões</div>
              <div id='qtdadesao'></div>
            </div>
            <div class='resumovalores' style='width:18rem'>
              <div>
                <img src="../imagens/dinheirovermelho.svg" alt="" class='imgicon'>
              </div>
              <div>Total Mensalidades</div>
              <div id='qtdmensalidade'></div>
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
              <option selected value=''>Selecione um Plano</option>
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
        <table id='planostable' class="table" style="margin-bottom:7rem">
          <thead class="table-active">
            <tr>
              <td scope="col">Contrato</td>
              <td scope="col">Titular</td>
              <td scope="col">Método de Pagamento</td>
              <td scope="col">Adesão</td>
              <td scope="col">Mensalidade</td>
              <td scope="col">Pago</td>
            </tr>
          </thead>
          <tbody id='planostablebody'>
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
        preencherplanos();

    }

    function checarintervalofluxo() {
        if (document.getElementById('intervalofluxo1').value <= document.getElementById('intervalofluxo2').value && document.getElementById('selectfiltro').value != '') {
            checarfluxodecaixa();
        }
    }

    function gerarpdf() {
        window.open(window.location.href.substring(0, window.location.href.length - 27) + 'relatoriodespesasereceitaspdf?inicio=' + document.getElementById('intervalofluxo1').value + '&fim=' + document.getElementById('intervalofluxo2').value + '&filtro=' + document.getElementById('selectfiltro').value);
    }

    function preencherplanos(){
        $.ajax({
        type: "GET",
        url: "/relatorioplanostodos",
        data: {},
        dataType: "json",
        success: function(data) {
            var sel = document.getElementById('selectfiltro');
            for (i = sel.length - 1; i >= 0; i--) {
                sel.remove(i);
            }
            var select = document.getElementById('selectfiltro');
                var opt = document.createElement('option');
                    opt.appendChild(document.createTextNode('Selecione um Plano'));
                    opt.value = '';
                    select.appendChild(opt);
            for(var i = 0; i<data[0].length; i++){
                    var opt = document.createElement('option');
                    opt.appendChild(document.createTextNode(data[1][i]));
                    opt.value = data[0][i];
                    select.appendChild(opt);
                }
            }
        });
    }

    function checarfluxodecaixa() {
        var tableHeaderRowCount = 0;
        var table = document.getElementById('planostablebody');
        var rowCount = table.rows.length;
        for (var i = tableHeaderRowCount; i < rowCount; i++) {
            table.deleteRow(tableHeaderRowCount);
        }
        $.ajax({
        type: "GET",
        url: "/relatorioplanosdados",
        data: {
            inicio: document.getElementById('intervalofluxo1').value,
            fim: document.getElementById('intervalofluxo2').value,
            filtro: document.getElementById('selectfiltro').value
        },
        dataType: "json",
        success: function(data) {
            // console.log(data);
            qtdplanos = 0;
            qtdadesao = 0;
            qtdmensalidade = 0;
            for (i = 0; i < data[0].length; i++) {
                var tabela = document.getElementById('planostablebody');
                var numeroLinhas = tabela.rows.length;
                var linha = tabela.insertRow(numeroLinhas);
                var celula1 = linha.insertCell(0);
                var celula2 = linha.insertCell(1);
                var celula3 = linha.insertCell(2);
                var celula4 = linha.insertCell(3);
                var celula5 = linha.insertCell(4);
                celula1.innerHTML = data[0][i];
                celula2.innerHTML = data[1][i];
                switch (data[2][i]) {
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
                celula4.innerHTML = data[3][i].toLocaleString('pt-br', {
                    style: 'currency',
                    currency: 'BRL'
                    });
                celula5.innerHTML = data[4][i].toLocaleString('pt-br', {
                    style: 'currency',
                    currency: 'BRL'
                    });
                qtdplanos++;
                qtdadesao+= parseFloat(data[3][i]);
                qtdmensalidade+= parseFloat(data[4][i]);
            }
                document.getElementById('qtdplanos').innerHTML = qtdplanos;
                document.getElementById('qtdadesao').innerHTML = qtdadesao.toLocaleString('pt-br', {
                    style: 'currency',
                    currency: 'BRL'
                    });
                document.getElementById('qtdmensalidade').innerHTML = qtdmensalidade.toLocaleString('pt-br', {
                    style: 'currency',
                    currency: 'BRL'
                    });
            }
        });
    }
</script>
@endsection
</html>
