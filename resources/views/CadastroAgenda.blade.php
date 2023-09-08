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
  {{-- <!-- <link rel="stylesheet" href="{{asset('../css/cssgeral.css')}}"> --> --}}
  <link rel="stylesheet" href="{{asset('../css/estilo.css')}}">
  {{-- <!-- <link rel="stylesheet" href="{{asset('../css/responagenda.css')}}"> --> --}}

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <!-- scripts -->
  <script src="{{asset('jquery.min.js')}}"></script>
  <script src="{{asset('jquery-ui-1.12.1/jquery-ui.js')}}"></script>
  <script src="{{asset('inputmask/dist/jquery.inputmask.min.js')}}"></script>
  <script src="{{asset('inputmask/dist/bindings/inputmask.binding.js')}}"></script>

  <!-- bootstrap scripts -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

  <title>Agenda do Médico</title>

  <style>
    /* .form-select{
        padding: 0.175rem 2.30rem 0.175rem .75rem!important;
        border: 0.7px solid #7e848b;
        width:max-content;
    } */

    /* #ui {
      background-color: #003c77!important;
      width: max-content !important;
      color: white!important;
      cursor: pointer!important;
      list-style: none!important;
    } */

    .larguraresp{
      width:max-content;
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

    .card{
     border: 1px solid rgb(78 78 78)!important;
    }

    .card-body {
     padding: 0.7rem 1rem 1.5rem 1rem!important;
    }

    /* .ui-menu-item {
      padding: 0.3rem 0.5rem;
      background-color: #003c77!important;
      width: max-content !important;
      color: white!important;
      cursor: pointer!important;
      list-style: none!important;
    } */

    .bthorarios {
      color: #4f4f4f;
      background: #dfe0eb;
      border: 0.3px solid #858c94;
      box-sizing: border-box;
      border-radius: 5px;
      padding: 0.25rem 0.3rem;

      font-family: "Source Sans Pro", sans-serif;
      font-style: normal;
      font-weight: 600;
      font-size: 16px;
      line-height: 20px;
      letter-spacing: 0.7px;
      color: #4f4f4f;
    }

    .larguratotal {
      width: max-content;
    }

    @media(min-width:576px) and (max-width:592px){
      #principal {
        padding: 6px!important;
      }
    }

    @media (max-width:575px) {
      .larguratotal {
        width: 100% !important;
      }
      .tamanhobtresponsive{
        width: 100%;
      }
      .larguraresp{
        width:100%;
      }
    }

    .form-control {
      padding: 0.375rem 0.1rem 0.375rem 0.3rem!important;
    }
  </style>
</head>

<body>
  @section('Conteudo')
  <div class="tituloprincipal">Agenda</div>
  <br>

  <div class="" style='margin-top:1rem;width:110rem;max-width:100%;'>
    <div class="row gx-4 gy-3">
      <div class="col-sm-3 col-md-3 col-lg-3 larguratotal">
        <div class="cor01">
          <label for="pesquisarespecagenda" class="form-label">Especialidade</label>
          <select class="form-select" name="pesquisarespecagenda" id='pesquisarespecagenda' onchange="checar()">
            <!-- <option value=''>Selecione a especialidade</option> -->
          </select>
        </div>
      </div>
      <div class="col-sm-3 col-md-3 col-lg-3 larguratotal">
        <div class="cor01">
          <label for="pesquisarmedicoagenda" class="form-label">Médico</label>
          <select class="form-select" name="pesquisarmedicoagenda" id='pesquisarmedicoagenda'>
            <option value=''>Selecione o médico</option>
          </select>
        </div>
      </div>
      <div class="col-sm-3 col-md-3 col-lg-2">
        <div class="cor01">
          <label for="pesquisarmedicoagenda" class="form-label">Data</label>
          <input type='month' class="form-control" name='pesquisardataagenda' id='pesquisardataagenda'>
        </div>
      </div>
      <div class="col-sm-3 col-md-3 col-lg-1" style='display:flex;align-items:end;'>
        <button class='btn btamarelo' name='pesquisaragenda' id='pesquisaragenda' onclick='checar()'>
          <span class='fontebotao'>Pesquisar</span>
        </button>
        <!-- <input type='button' value='Pesquisar' class="btn form-control" name='pesquisaragenda' id='pesquisaragenda' onclick='checar()'> -->
      </div>
    </div>
  </div> 
 
  <br><br>

  <div id='atenmedico' style='margin-bottom:1rem'></div>
  <div id='datas' style='margin-bottom:1rem'>
    <div class="container-fluid" style='margin-top:-1rem'>
      <div id='avisotabela' class="table-responsive-sm">
        <b>Esse médico não possui agendas para este período.</b>
      </div>
      <div id='pesquisardatastablediv' class="table-responsive-sm">
        <table id='pesquisardatastable' class="table">
          <thead class="table-active">
              <tr>
                <td scope="col">Data</td>
                <td scope="col">Horas</td>
                <td scope="col">Médico</td>
                <td scope="col">Atendimentos</td>
                <td scope="col">Retornos</td>
                <td scope="col">Entrar</td>
              </tr>
          </thead>
          <tbody id='datastablebody'>

          </tbody>
        </table>
      </div>
    </div>
  </div>
  <div id='horarios' style='margin-bottom:1rem'></div>
  
  <div class="modal fade" id="maxatendimentoModal" tabindex="-1" aria-labelledby="maxatendimentoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="maxatendimentoModalLabel">Máximo Atendimento!</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">                       
                <div id='avisomaxatendimento'>Máximo de atendimentos já atingido.</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
  </div>


  <div class="modal fade" id="maxretornoModal" tabindex="-1" aria-labelledby="maxretornoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="maxretornoModalLabel">Máximo retorno!</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">                       
                <div id='avisomaxretorno'>Máximo de retornos já atingido.</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
  </div>

</body>
<script>
  consespec();
  var horariosatuais = [];
  var especialidadeatual = '';
  var medicoatual = '';
  var dataatual = '';
  var checkinterval = false;

  var idagendas = [];
  var idmediconovo = '';
  var verificador = 0;

  var horaatual = '';
  var counthoraatual = 0;

  var arraycollapse = [];
  var dataatualhoje = '';

  var maxaten = 0;
  var maxret = 0;

  var mesatual = new Date().getMonth();
  var anoatual = new Date().getFullYear();
  var meshoje = (anoatual + "-" + ('00'+(mesatual + 1)).slice(-2)).toString();

  document.getElementById('pesquisardataagenda').value = meshoje;

  var dataescolhida = '';

  document.getElementById('datas').style.display = 'none';

  function pesquisarnome(input) {
    // console.log(input.id);
    var nome = $('#' + input.id).val();
    var nomes = [];
    if (nome.length >= 4) {
      $.ajax({
        type: 'GET',
        url: '../consulta/agenda/nomecontrato',
        data: {
          nomepessoa: nome
        },
        dataType: "json",
        success: function(data) {
          for (i = 0; i < data.length; i++) {
            if(data[i][2] == 'Particular'){
              nomes.push(data[i][0] + " - " + data[i][1] + " - " + data[i][2]);
            }else{
              nomes.push(data[i][0] + " - " + data[i][1] + " - " + data[i][2] + " - " + data[i][3] );
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

  setInterval(function() {
    if (checkinterval == true) {
      checaragenda();
    }
  }, 1000);


  function checaragenda() {
    $.ajax({
      type: 'GET',
      url: '../consulta/agenda/checaragenda',
      data: {},
      dataType: "json",
      success: function(data) {
        verificador = 0;
        for (var i = 0; i < data['id'].length; i++) {
          if (data['id'][i] != idagendas[i]) {
            verificador++;
            idmediconovo = data['med'][i];
          }
        }
        if (verificador != 0) {
          idagendas = data['id'];
          if (idmediconovo == medicoatual) {
            pesquisarhorarios();
            setTimeout(function() {
              dataatualhoje = document.getElementById('pesquisardataagenda').value;
            }, 1000);

          }
        }
      }
    });
  }

  $. extend ( $. ui . autocomplete . prototype . options ,  { 
    open :  function ( event , ui )  { 
      $ ( this ) . autocomplete ( "widget" ) . css ( { 
              "width" :  ( $ ( this ) . width ( )  +  "px" ) 
          } ) ; 
      } 
  });

  function checar() {
    // console.log(document.getElementById('pesquisarespecagenda').value, especialidadeatual);
    if (document.getElementById('pesquisarespecagenda').value != especialidadeatual) {
      especialidadeatual = document.getElementById('pesquisarespecagenda').value;
      document.getElementById('pesquisardataagenda').value = meshoje;
      document.getElementById('horarios').innerHTML = '';
      filtmedico();
    }

    if (medicoatual != document.getElementById('pesquisarmedicoagenda').value) {
      medicoatual = document.getElementById('pesquisarmedicoagenda').value;
    }

    if (dataatual != document.getElementById('pesquisardataagenda').value) {
      dataatual = document.getElementById('pesquisardataagenda').value;
    }
    // console.log(medicoatual, especialidadeatual, dataatual);
    if (medicoatual != '' && especialidadeatual != '' && dataatual != '') {
      // checkinterval = true;
      // pesquisarhorarios();
      pesquisardias();
      setTimeout(function() {
        dataatualhoje = document.getElementById('pesquisardataagenda').value;
      }, 1000);
    } else {
      checkinterval = false;
    }

  }


  function consespec() {
    var select = document.getElementById('pesquisarespecagenda');
    var opt = document.createElement('option');
        opt.appendChild(document.createTextNode('Todos'));
        opt.value = 'todos';
        select.appendChild(opt);
    $.ajax({
      type: "GET",
      url: "/consultacadastroespec",
      data: {},
      dataType: "json",
      success: function(data) {

        var select = document.getElementById('pesquisarespecagenda');
        for (var i = 0; i < data['id'].length; i++) {
          var opt = document.createElement('option');
          opt.appendChild(document.createTextNode(data['nome'][i]));
          opt.value = data['id'][i];
          select.appendChild(opt);
        }
        checar();
      }
    });
    
  }

  function maximoatendimento(){
    $('#maxatendimentoModal').modal('show');
  }

  function maximoretorno(){
    $('#maxretornoModal').modal('show');
  }

  function filtmedico() {
    var i, L = document.getElementById('pesquisarmedicoagenda').options.length - 1;
    for (i = L; i >= 0; i--) {
      document.getElementById('pesquisarmedicoagenda').remove(i);
    }
    $.ajax({
      type: "GET",
      url: "/consultaespecmedico",
      data: {
        espec: document.getElementById('pesquisarespecagenda').value
      },
      dataType: "json",
      success: function(data) {
        var select = document.getElementById('pesquisarmedicoagenda');
        var opt = document.createElement('option');
          opt.appendChild(document.createTextNode('Todos'));
          opt.value = 'todos';
          select.appendChild(opt);
        for (var i = 0; i < data['id'].length; i++) {
          var opt = document.createElement('option');
          opt.appendChild(document.createTextNode(data['nome'][i]));
          opt.value = data['id'][i];
          select.appendChild(opt);
        }
      }
    });
  }

  // function pesquisarhorarios() {
  //   $.ajax({
  //     type: "GET",
  //     url: "/consultaagendamedico",
  //     data: {
  //       medico: document.getElementById('pesquisarmedicoagenda').value,
  //       dia: document.getElementById('pesquisardataagenda').value
  //     },
  //     dataType: "json",
  //     success: function(data) {
  //       horaatual = '';
  //       counthoraatual = 0;
  //       horariosatuais = data[2];
  //       maxaten = data[3];
  //       maxret = data[4];
  //       document.getElementById('horarios').innerHTML = '';
  //       if (data == 2) {
  //         document.getElementById('horarios').innerHTML = 'Médico não disponível nesse dia';
  //       } else {
  //         for (var counthorarios = 0; counthorarios < data[2].length; counthorarios++) {
  //           if (data[2][counthorarios].substr(0, 2) != horaatual) {
  //             counthoraatual++;
  //             horaatual = data[2][counthorarios].substr(0, 2);
  //             document.getElementById('horarios').innerHTML += "<div id='" + data[2][counthorarios] + "' style='margin-top:1rem;'><div class='row gx-3 gy-3'><div class='col-sm-2 col-md-1 col-lg-1'><label for='horario' class='form-label'>Horário</label><input type='button' class='form-control bthorarios' value='" + data[2][counthorarios].substr(0, 5) + "' disabled></div><div class='col-sm-6 col-md-5 col-lg-4'><label for='cliente' class='form-label'>Cliente</label><input type='text' name='pessoa" + counthorarios + "' id='pessoa" + counthorarios + "' placeholder='Selecione o Cliente' class='form-control uldoinput' onkeypress='pesquisarnome(this)' onfocusout='salvaragenda(this)'></div><div class='col-sm-4 col-md-4 col-lg-3 larguraresp'><div class='cor01 tamanhobtresponsive'><label for='statusselect' class='form-label'>Status</label><select name='statusselect" + counthorarios + "' class='form-select' id='statusselect" + counthorarios + "' onchange='salvaragenda(this)'><option value='Livre'>Livre</option><option value='Ocupado'>Ocupado</option><option>Dependente Cadastro</option><option>Dependente Pagamento</option><option>Retorno</option><option>Pagamento Concluído</option><option>Atendimento Concluído</option><option>Cancelado</option><option>Não Comparecido</option></select></div></div><div class='col-sm-4 col-md-4 col-lg-3 larguraresp'><div class='cor01 tamanhobtresponsive'><label for='prioridadeselect' class='form-label'>Categoria</label><select name='prioridadeselect" + counthorarios + "' class='form-select' id='prioridadeselect" + counthorarios + "' onchange='salvaragenda(this)'><option value=''>---</option><option value='Normal'>Normal</option><option value='Prioridade1'>Prioridade Especial</option><option value='Prioridade2'>Prioridade Simples</option><option value='Retorno'>Retorno</option></select></div></div><div class='col-sm-5 col-md-2 col-lg-2 larguraresp' style='display:flex;align-items: end;'><div class='cor01 disttop tamanhobtresponsive'><button class='btn btamarelo' type='button' onclick='ircliente(this)' id='ircliente" + counthorarios + "'> Ir para o Cliente </button></div></div><div class='col-sm-5 col-md-3 col-lg-3 larguraresp' style='display:flex;align-items: end;'><div class='cor01 disttophorarios tamanhobtresponsive'><button class='btn btamarelo' type='button' data-bs-toggle='collapse' data-bs-target='#collapse-" + counthoraatual + "' aria-expanded='false' aria-controls='collapse-" + counthoraatual + "' onclick='mudarcollapse(this)' id='collapsebutton-" + counthoraatual + "'>Ver mais horários - " + data[2][counthorarios].substr(0, 5) + "</button></div></div></div></div>";

  //             if (document.getElementById('pesquisardataagenda').value != dataatualhoje) {
  //               document.getElementById('horarios').innerHTML += "<div class='collapse' id='collapse-" + counthoraatual + "'><div class='card card-body'><span id='horarios-" + counthoraatual + "'></span></div></div>";
  //               arraycollapse.push(0);
  //             } else {
  //               if (arraycollapse[counthorarios] == 1) {
  //                 document.getElementById('horarios').innerHTML += "<div class='collapse show' id='collapse-" + counthoraatual + "'><div class='card card-body'><span id='horarios-" + counthoraatual + "'></span></div></div>";
  //               } else {
  //                 document.getElementById('horarios').innerHTML += "<div class='collapse' id='collapse-" + counthoraatual + "'><div class='card card-body'><span id='horarios-" + counthoraatual + "'></span></div></div>";
  //               }
  //             }
  //           } else {
  //             document.getElementById('horarios-' + counthoraatual).innerHTML += "<div id='" + data[2][counthorarios] + "' style='margin-top:1rem;'><div class='row gx-3 gy-3'><div class='col-sm-2 col-md-1 col-lg-1'><label for='horario' class='form-label'>Horário</label><input type='button' class='form-control bthorarios' value='" + data[2][counthorarios].substr(0, 5) + "' disabled></div><div class='col-sm-6 col-md-5 col-lg-4'><label for='cliente' class='form-label'>Cliente</label><input type='text' name='pessoa" + counthorarios + "' id='pessoa" + counthorarios + "' placeholder='Selecione o Cliente' class='form-control uldoinput' onkeypress='pesquisarnome(this)' onfocusout='salvaragenda(this)'></div><div class='col-sm-4 col-md-4 col-lg-3 larguraresp'><div class='cor01 tamanhobtresponsive'><label for='statusselect' class='form-label'>Status</label><select name='statusselect" + counthorarios + "' class='form-select' id='statusselect" + counthorarios + "' onchange='salvaragenda(this)'><option value='Livre'>Livre</option><option value='Ocupado'>Ocupado</option><option>Dependente Cadastro</option><option>Dependente Pagamento</option><option>Retorno</option><option>Pagamento Concluído</option><option>Atendimento Concluído</option><option>Cancelado</option><option>Não Comparecido</option></select></div></div><div class='col-sm-4 col-md-4 col-lg-3 larguraresp'><div class='cor01 tamanhobtresponsive'><label for='prioridadeselect' class='form-label'>Categoria</label><select name='prioridadeselect" + counthorarios + "' class='form-select' id='prioridadeselect" + counthorarios + "' onchange='salvaragenda(this)'><option value=''>---</option><option value='Normal'>Normal</option><option value='Prioridade1'>Prioridade Especial</option><option value='Prioridade2'>Prioridade Simples</option><option value='Retorno'>Retorno</option></select></div></div><div class='col-sm-5 col-md-2 col-lg-2 larguraresp' style='display:flex;align-items: end;'><div class='cor01 disttop tamanhobtresponsive'><button class='btn btamarelo' type='button' onclick='ircliente(this)' id='ircliente" + counthorarios + "'> Ir para o Cliente </button></div></div></div></div>";
  //           }

  //           // var select = document.getElementById('servicoselect'+counthorarios);
  //           // for(var i = 0; i<data[1]['id'].length; i++){
  //           //     var opt = document.createElement('option');
  //           //     opt.appendChild(document.createTextNode(data[1]['nome'][i]));
  //           //     opt.value = data[1]['id'][i];
  //           //     select.appendChild(opt);
  //           // }
  //         }

  //         preencherhoras(data[0], document.getElementById('pesquisardataagenda').value);
  //       }
  //     }
  //   });

  // }

  function entrar(dia) {
    $.ajax({
      type: "GET",
      url: "/consultaagendamedico",
      data: {
        idagendamedico: dia.id
      },
      dataType: "json",
      success: function(data) {
        // console.log(data);
        document.getElementById('datas').style.display = 'none';
        horaatual = '';
        counthoraatual = 0;
        horariosatuais = data[1];
        document.getElementById('horarios').innerHTML = '';
        if (data == 2) {
          document.getElementById('horarios').innerHTML = 'Médico não disponível nesse dia';
        } else {
          for (var counthorarios = 0; counthorarios < data[1].length; counthorarios++) {
            if (data[1][counthorarios].substr(0, 2) != horaatual) {
              counthoraatual++;
              horaatual = data[1][counthorarios].substr(0, 2);
              document.getElementById('horarios').innerHTML += "<div id='" + data[1][counthorarios] + "' style='margin-top:1rem;'><div class='row gx-3 gy-3'><div class='col-sm-2 col-md-1 col-lg-1'><label for='horario' class='form-label'>Horário</label><input type='button' class='form-control bthorarios' value='" + data[1][counthorarios].substr(0, 5) + "' disabled></div><div class='col-sm-6 col-md-5 col-lg-4'><label for='cliente' class='form-label'>Cliente</label><input type='text' name='pessoa" + counthorarios + "' id='pessoa" + counthorarios + "' placeholder='Selecione o Cliente' class='form-control uldoinput' onkeypress='pesquisarnome(this)' onfocusout='salvaragenda(this)'></div><div class='col-sm-4 col-md-4 col-lg-3 larguraresp'><div class='cor01 tamanhobtresponsive'><label for='statusselect' class='form-label'>Status</label><select name='statusselect" + counthorarios + "' class='form-select' id='statusselect" + counthorarios + "' onchange='salvaragenda(this)'><option value='Livre'>Livre</option><option value='Ocupado'>Ocupado</option><option>Dependente Cadastro</option><option>Dependente Pagamento</option><option>Retorno</option><option>Pagamento Concluído</option><option>Atendimento Concluído</option><option>Cancelado</option><option>Não Comparecido</option></select></div></div><div class='col-sm-4 col-md-4 col-lg-3 larguraresp'><div class='cor01 tamanhobtresponsive'><label for='prioridadeselect' class='form-label'>Categoria</label><select name='prioridadeselect" + counthorarios + "' class='form-select' id='prioridadeselect" + counthorarios + "' onchange='salvaragenda(this)'><option value=''>---</option><option value='Normal'>Normal</option><option value='Prioridade1'>Prioridade Especial</option><option value='Prioridade2'>Prioridade Simples</option><option value='Retorno'>Retorno</option></select></div></div><div class='col-sm-5 col-md-2 col-lg-2 larguraresp' style='display:flex;align-items: end;'><div class='cor01 disttop tamanhobtresponsive'><button class='btn btamarelo' type='button' onclick='ircliente(this)' id='ircliente" + counthorarios + "'> Ir para o Cliente </button></div></div><div class='col-sm-5 col-md-3 col-lg-3 larguraresp' style='display:flex;align-items: end;'><div class='cor01 disttophorarios tamanhobtresponsive'><button class='btn btamarelo' type='button' data-bs-toggle='collapse' data-bs-target='#collapse-" + counthoraatual + "' aria-expanded='false' aria-controls='collapse-" + counthoraatual + "' onclick='mudarcollapse(this)' id='collapsebutton-" + counthoraatual + "'>Ver mais horários - " + data[1][counthorarios].substr(0, 5) + "</button></div></div></div></div>";

              if (data[2] != dataatualhoje) {
                document.getElementById('horarios').innerHTML += "<div class='collapse' id='collapse-" + counthoraatual + "'><div class='card card-body'><span id='horarios-" + counthoraatual + "'></span></div></div>";
                arraycollapse.push(0);
              } else {
                if (arraycollapse[counthorarios] == 1) {
                  document.getElementById('horarios').innerHTML += "<div class='collapse show' id='collapse-" + counthoraatual + "'><div class='card card-body'><span id='horarios-" + counthoraatual + "'></span></div></div>";
                } else {
                  document.getElementById('horarios').innerHTML += "<div class='collapse' id='collapse-" + counthoraatual + "'><div class='card card-body'><span id='horarios-" + counthoraatual + "'></span></div></div>";
                }
              }
            } else {
              document.getElementById('horarios-' + counthoraatual).innerHTML += "<div id='" + data[1][counthorarios] + "' style='margin-top:1rem;'><div class='row gx-3 gy-3'><div class='col-sm-2 col-md-1 col-lg-1'><label for='horario' class='form-label'>Horário</label><input type='button' class='form-control bthorarios' value='" + data[1][counthorarios].substr(0, 5) + "' disabled></div><div class='col-sm-6 col-md-5 col-lg-4'><label for='cliente' class='form-label'>Cliente</label><input type='text' name='pessoa" + counthorarios + "' id='pessoa" + counthorarios + "' placeholder='Selecione o Cliente' class='form-control uldoinput' onkeypress='pesquisarnome(this)' onfocusout='salvaragenda(this)'></div><div class='col-sm-4 col-md-4 col-lg-3 larguraresp'><div class='cor01 tamanhobtresponsive'><label for='statusselect' class='form-label'>Status</label><select name='statusselect" + counthorarios + "' class='form-select' id='statusselect" + counthorarios + "' onchange='salvaragenda(this)'><option value='Livre'>Livre</option><option value='Ocupado'>Ocupado</option><option>Dependente Cadastro</option><option>Dependente Pagamento</option><option>Retorno</option><option>Pagamento Concluído</option><option>Atendimento Concluído</option><option>Cancelado</option><option>Não Comparecido</option></select></div></div><div class='col-sm-4 col-md-4 col-lg-3 larguraresp'><div class='cor01 tamanhobtresponsive'><label for='prioridadeselect' class='form-label'>Categoria</label><select name='prioridadeselect" + counthorarios + "' class='form-select' id='prioridadeselect" + counthorarios + "' onchange='salvaragenda(this)'><option value=''>---</option><option value='Normal'>Normal</option><option value='Prioridade1'>Prioridade Especial</option><option value='Prioridade2'>Prioridade Simples</option><option value='Retorno'>Retorno</option></select></div></div><div class='col-sm-5 col-md-2 col-lg-2 larguraresp' style='display:flex;align-items: end;'><div class='cor01 disttop tamanhobtresponsive'><button class='btn btamarelo' type='button' onclick='ircliente(this)' id='ircliente" + counthorarios + "'> Ir para o Cliente </button></div></div></div></div>";
            }

            // var select = document.getElementById('servicoselect'+counthorarios);
            // for(var i = 0; i<data[1]['id'].length; i++){
            //     var opt = document.createElement('option');
            //     opt.appendChild(document.createTextNode(data[1]['nome'][i]));
            //     opt.value = data[1]['id'][i];
            //     select.appendChild(opt);
            // }
          }

          medicoatual = data[0];
          dataescolhida = data[2];
          preencherhoras(data[0], data[2]);
        }
      }
    });

  }

  function pesquisardias() {
    $.ajax({
      type: "GET",
      url: "/consultaagendamedicos",
      data: {
        espec: document.getElementById('pesquisarespecagenda').value,
        medico: document.getElementById('pesquisarmedicoagenda').value,
        data: document.getElementById('pesquisardataagenda').value
      },
      dataType: "json",
      success: function(data) {
        var tableHeaderRowCount = 0;
        var table = document.getElementById('datastablebody');
        var rowCount = table.rows.length;
        for (var i = tableHeaderRowCount; i < rowCount; i++) {
            table.deleteRow(tableHeaderRowCount);
        }
        document.getElementById('horarios').innerHTML = '';
        document.getElementById('atenmedico').innerHTML = '';
        document.getElementById('datas').style.display = 'block';
        if(data[0].length == 0){
          document.getElementById('avisotabela').style.display = 'block';
          document.getElementById('pesquisardatastablediv').style.display = 'none';
        }else{
          document.getElementById('avisotabela').style.display = 'none';
          document.getElementById('pesquisardatastablediv').style.display = 'block';
          for(i=0; i<data[0].length; i++){
            var tabela = document.getElementById('datastablebody');
            var numeroLinhas = tabela.rows.length;
            var linha = tabela.insertRow(numeroLinhas);
            var celula1 = linha.insertCell(0);
            var celula2 = linha.insertCell(1);   
            var celula3 = linha.insertCell(2); 
            var celula4 = linha.insertCell(3);
            var celula5 = linha.insertCell(4);
            var celula6 = linha.insertCell(5);
            celula1.innerHTML=data[2][i].split('-')[2] + '/' + data[2][i].split('-')[1] + '/' + data[2][i].split('-')[0];
            celula2.innerHTML=data[3][i];
            celula3.innerHTML=data[1][i];
            celula4.innerHTML=data[4][i];
            celula5.innerHTML=data[5][i];
            celula6.innerHTML="<button type='submit' class='btn border border-secondary corbtedit' value='Entrar' onclick='entrar(this)' name='entrareste' id='"+data[0][i]+"'><span class='fontebotao edit'>Entrar</span></button>";
              
          }
        }
        
      }
    });

  }

  function mudarcollapse(collapse) {
    if (arraycollapse[collapse.id.split('-')[1] - 1] == 0) {
      arraycollapse[collapse.id.split('-')[1] - 1] = 1;
    } else {
      arraycollapse[collapse.id.split('-')[1] - 1] = 0;
    }
  }

  function preencherhoras(medico, data) {
    $.ajax({
      type: "GET",
      url: "/consultaagendahorario",
      data: {
        med_id: medico,
        data: data
      },
      dataType: "json",
      success: function(data) {
        for (var i = 0; i < data.length; i++) {
          var index = horariosatuais.indexOf(data[i][2]);
          document.getElementById('pessoa' + index).value = data[i][0];
          document.getElementById('statusselect' + index).value = data[i][1];
          document.getElementById('prioridadeselect' + index).value = data[i][3];
          if(maxret < 0){
            maxret=0;
          }
          if(maxaten < 0){
            maxaten = 0;
          }
        }
        mostraratendimentosatuais();
      }
    });
  }

  function mostraratendimentosatuais(){
    // console.log(document.getElementById('pesquisardataagenda').value);
    // console.log(medico);
    $.ajax({
      type: "GET",
      url: "/consultaagendaatendimentos",
      data: {
        med_id: medicoatual,
        data: dataescolhida,
      },
      dataType: "json",
      success: function(data) {
        maxaten = data[0];
        maxret = data[1];
        document.getElementById('atenmedico').innerHTML = "Atendimentos Restantes: <b>" + data[0] + "</b> Retornos Restantes: <b>" + data[1] + "</b>";
      }
    });
    
  }

  function ircliente(cliente) {
    var caixa = cliente.id.split('ircliente')[1];
    var url1 = window.location.href.split('/');
    var dadosclienteatual = document.getElementById('pessoa' + caixa).value;
    if (dadosclienteatual.split(' - ').length == 1 || dadosclienteatual.split(' - ').length == 2) {
      window.open('https://' + url1[2] + '/cadastro/pessoa?nomecliente=' + dadosclienteatual.split(' - ')[0]);
      // window.location.href = ;
    } else {
      cpfclienteatual = dadosclienteatual.split(' - ')[1];
      window.open('https://' + url1[2] + '/consulta/pessoa?cpfcliente=' + cpfclienteatual + '&nome=' + dadosclienteatual.split(' - ')[0]);
      // window.location.href = ;
    }
  }

  function salvaragenda(input) {
    if (input.id.substr(0, 6) == 'pessoa') {
      var idinputatual = input.id.split('pessoa');
    } else if(input.id.substr(0, 6) == 'status') {
      var idinputatual = input.id.split('statusselect');
    }else{
      var idinputatual = input.id.split('prioridadeselect');
    }
    
    if(document.getElementById('statusselect' + idinputatual[1]).value == 'Retorno'){
    document.getElementById('prioridadeselect' + idinputatual[1]).value = 'Retorno';
    }else if(document.getElementById('prioridadeselect' + idinputatual[1]).value == 'Retorno'){
      document.getElementById('statusselect' + idinputatual[1]).value == 'Retorno';
    }
    if (document.getElementById('pessoa' + idinputatual[1]).value != '' && document.getElementById('prioridadeselect' + idinputatual[1]).value != '') {
      if(document.getElementById('statusselect' + idinputatual[1]).value != 'Retorno' && maxaten == 0){
        maximoatendimento();
      }else if(document.getElementById('statusselect' + idinputatual[1]).value == 'Retorno' && maxret == 0){
        maximoretorno();
      }else{
        var dados = [document.getElementById('pessoa' + idinputatual[1]).value, document.getElementById('statusselect' + idinputatual[1]).value, horariosatuais[idinputatual[1]], dataescolhida, medicoatual, document.getElementById('prioridadeselect' + idinputatual[1]).value];
        $.ajax({
          type: "GET",
          url: "cadastroagendamedico",
          data: {
            dados: dados
          },
          dataType: "json",
          success: function(data) {
            if (data == 1) {
              console.log('Agenda Atualualizada com Sucesso!');
              if (document.getElementById('pessoa' + idinputatual[1]).value.includes(' - ')) {
                if(document.getElementById('prioridadeselect' + idinputatual[1]).value == 'Retorno'){
                  maxret--;
                }else{
                  maxaten--;
                }
                mostraratendimentosatuais();
              } else {
                var ant = document.getElementById('pessoa' + idinputatual[1]).value;
                document.getElementById('pessoa' + idinputatual[1]).value = ant + ' - Não Cadastrado(a)';
                document.getElementById('statusselect' + idinputatual[1]).value = 'Dependente Cadastro';
              }
            }
          }
        });
      }
      
    } else if (document.getElementById('pessoa' + idinputatual[1]).value == '') {
      var dados = [horariosatuais[idinputatual[1]], document.getElementById('pesquisardataagenda').value];
      $.ajax({
        type: "GET",
        url: "/apagaragendamedico",
        data: {
          dados: dados
        },
        dataType: "json",
        success: function(data) {
          if (data == 1) {
            console.log('Agenda Atualualizada com Sucesso!');
            if(document.getElementById('prioridadeselect' + idinputatual[1]).value == 'Retorno'){
              maxret++;
            }else{
              maxaten++;
            }
            mostraratendimentosatuais();
            document.getElementById('pessoa' + idinputatual[1]).value = '';
            document.getElementById('statusselect' + idinputatual[1]).value = 'Livre';
            document.getElementById('prioridadeselect' + idinputatual[1]).value = '';
          }
        }
      });
    }
    
  }
</script>

</html>
@endsection