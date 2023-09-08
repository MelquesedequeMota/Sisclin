<!DOCTYPE html>
<html lang="pt-br">

<head>
  <!-- required meta tags -->
  <meta http-equiv='cache-control' content='no-cache'>
  <meta http-equiv='expires' content='0'>
  <meta http-equiv='pragma' content='no-cache'>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- css da página -->
  <link rel="stylesheet" href="{{asset('../css/painel.css')}}">

  <!-- bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <!-- js -->
  <script src="{{asset('jquery.min.js')}}"></script>
  <script src="{{asset('jquery-ui-1.12.1/jquery-ui.js')}}"></script>
  <script src="{{asset('inputmask/dist/jquery.inputmask.min.js')}}"></script>
  <script src="{{asset('inputmask/dist/bindings/inputmask.binding.js')}}"></script>

  <!-- bootstrap js -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

  <title>Painel de Atendimento</title>
</head>

<body>
  <div class='titulopainel'>
    <div>Painel de atendimento</div>
    <div class='flexr'>
      <div style='margin-right:0.5rem'>
        <img src="../imagens/relogio.svg" alt="">
      </div>
      <div>13:36</div>
    </div>
  </div>
  <div class='divisaopainel'>
    <div class='divpropagandas'>Propagandas</div>
    <div class='pessoaatendimento'>
      <div style='margin-bottom: 2rem;'>
        <img src="../imagens/logoirnpainel.svg" alt="" style='height:6rem'>
      </div>
      <div id='pacatual1'>
        <div style='display:flex;flex-direction:row;justify-content: center;align-items:center;margin-bottom: 4rem;'>
          <div class='corbolas'></div>
          <div class='nomepaciente'>
            <div id='nomeatual'></div>
          </div>
        </div>
        <div style='display:flex;flex-direction:row;justify-content: center;width: 30rem;'>
          <div class='sala'>
            <div id='salaatual'></div>
          </div>
          <div class='flexr' style=''>
            <div style='margin-right:1rem'>
              <img src="../imagens/local.svg" alt="">
            </div>
            <div class='area'>
              <div id='especatual'></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class='ordempacientes'>
    <div class='titleultimoschamados'>Últimos chamados</div>
    <div class="container-fluid">
      <div class="row listapacientes">
        <div class="col-sm" id='paciente1'>
          <!-- <div class='flexr'> -->
            <div id='painel0'>
            </div>
          <!-- </div> -->

          <!-- <div class='flexr'> -->
            <div id='painel2'>
            </div>
          <!-- </div> -->

          <!-- <div class='flexr'> -->
            <div id='painel4'>
            </div>
          <!-- </div> -->

          <!-- <div class='flexr'> -->
            <div id='painel6'>
            </div>
          <!-- </div> -->

          <!-- <div class='flexr'> -->
            <div id='painel8'>
            </div>
          <!-- </div> -->
        </div>

        <div class="col-sm" id='paciente2'>
          <div class='flexr'>
            <div id='painel1'>
            </div>
          </div>

          <div class='flexr'>
            <div id='painel3'>
            </div>
          </div>

          <div class='flexr'>
            <div id='painel5'>
            </div>
          </div>

          <div class='flexr'>
            <div id='painel7'>
            </div>
          </div>

          <div class='flexr'>
            <div id='painel9'>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <br><br><br>
  <button type="submit" class="btn btamarelo" value='Começar' onclick='iniciar()' style='margin-left:2rem;margin-top:-3rem'>
    <span class="fontebotao" style='font-size:15px'>Começar</span>
  </button>
  <!-- <input type='button' value='começar' onclick='iniciar()'> -->
  <div id='audiodiv'></div>

  <div id='painelatual'>
  </div>
  <br><br><br>

  


</body>

</html>
<script>
  var listaid = [];
  var listapessoa = [];
  var listasala = [];
  var listaespec = [];
  var idatual = 0;
  var checklista = 0;
  var pacar = [];
  var countpacdiv = 1;
  var piscar = 1;

  function iniciar() {
    bolinha();
    setInterval(pesquisar, 1000);
  }
  function bolinha(){
    $('.bolalistapacientes').css('display', 'block');
  }

  // function filtpac() {
  //   pacar = [];
  //   document.getElementById('paciente1').innerHTML = '';
  //   document.getElementById('paciente2').innerHTML = '';
  //   countpacdiv = 1;

  //   if ($("[name='espec']").val() != '') {
  //     $.ajax({
  //       type: "GET",
  //       url: "/consultacadastroservimed",
  //       data: {
  //         espec: $("[name='espec']").val()
  //       },
  //       dataType: "json",
  //       success: function(data) {
  //         for (var i = 0; i < data['nome'].length; i++) {
  //           document.getElementById('servicheckbox' + contservicheckboxcolumn).innerHTML += data['nome'][i] + ": <input type='checkbox' name='servibox" + data['id'][i] + "' value='" + data['id'][i] + "'> <br>";
  //           serviar.push(data['id'][i]);
  //           if (contservicheckboxcolumn == 1) {
  //             contservicheckboxcolumn = 2;
  //           } else if (contservicheckboxcolumn == 2) {
  //             contservicheckboxcolumn = 3;
  //           } else {
  //             contservicheckboxcolumn = 1;
  //           }
  //         }
  //       }
  //     });
  //   }
  // }

  function pesquisar() {
    $.ajax({
      type: 'get',
      dataType: 'json',
      url: 'consulta/atendimento',
      success: function(dados) {
        checklista = 0;
        // if(listaid.length < 4){
        for (var i = 0; i <= listaid.length; i++) {
          if (dados['pessoa'][0] == listapessoa[i] && dados['sala'][0] == listasala[i] && dados['espec'][0] == listaespec[i]) {
            checklista = 1;
          }
        }
        if (checklista == 0) {
          if (listaid.length == 10) {
            listaid.pop();
            listapessoa.pop();
            listasala.pop();
            listaespec.pop();
          }
          listaid.unshift(dados['id'][0]);
          listapessoa.unshift(dados['pessoa'][0]);
          listasala.unshift(dados['sala'][0]);
          listaespec.unshift(dados['espec'][0]);
        }
        if (dados['id'][0] != idatual) {
          resetpainel();
          console.log(dados);
          if (dados['sala'][0][0] == 'b') {
            document.getElementById('nomeatual').innerHTML = dados['pessoa'][0];
            document.getElementById('salaatual').innerHTML = "Bancada " + dados['sala'][0].substring(1);
          } else if (dados['sala'][0] == 'Caixa') {
            document.getElementById('nomeatual').innerHTML = dados['pessoa'][0];
            document.getElementById('salaatual').innerHTML = "Caixa";
          } else {
            document.getElementById('nomeatual').innerHTML = dados['pessoa'][0];
            document.getElementById('salaatual').innerHTML = dados['sala'][0];
            document.getElementById('especatual').innerHTML = dados['espec'][0];
          }

          // }
          // if(sessionStorage.getItem('idatual') != dados['id'][0]){
          var text = new SpeechSynthesisUtterance();
          text.lang = "pt-BR";
          if (dados['sala'][0][0] == 'b') {
            text.text = dados['pessoa'][0] + ", Comparecer à bancada " + dados['sala'][0].substring(1);
          } else if (dados['sala'][0] == 'Caixa') {
            text.text = dados['pessoa'][0] + ", Comparecer ao Caixa";
          } else {
            text.text = dados['pessoa'][0] + ", comparecer à " + dados['sala'][0];
          }
          //voices = window.speechSynthesis.getVoices();
          text['voiceURI'] = 'Google português do Brasil'; //discovered after dumping getVoices()
          text.lang = "pt-BR";
          text['localService'] = true;

          speechSynthesis.speak(text);
          idatual = dados['id'][0];

          setTimeout(function(){ 
            document.getElementById('pacatual1').style.display='block';
            setTimeout(function(){ 
              document.getElementById('pacatual1').style.display='none';
              setTimeout(function(){ 
                document.getElementById('pacatual1').style.display='block';
                setTimeout(function(){ 
                  document.getElementById('pacatual1').style.display='none';
                  setTimeout(function(){ 
                    document.getElementById('pacatual1').style.display='block';
                    setTimeout(function(){ 
                      document.getElementById('pacatual1').style.display='none';
                      setTimeout(function(){ 
                        document.getElementById('pacatual1').style.display='block';
                        }, 500);
                      }, 500);
                    }, 500);
                  }, 500);
                }, 500);
              }, 500);
            }, 500);

          // }
        }
      }
    });
  }

  function resetpainel() {
    for (var i = 0; i <= 9; i++) {
      document.getElementById('painel' + i).innerHTML = '';

      if (listaid[i] != null) {
        if (listasala[i][0] == 'b') {
          document.getElementById('painel' + i).innerHTML = " <div class='flexr'><div class='bolalistapacientes'></div><div>" + listapessoa[i] + ' - Bancada ' + listasala[i].substring(1) +"</div></div>";
        } else if (listasala[i] == 'Caixa') {
          document.getElementById('painel' + i).innerHTML = " <div class='flexr'><div class='bolalistapacientes'></div><div>"+  listapessoa[i] + ' - Caixa' +"</div></div>";
        } else {
          document.getElementById('painel' + i).innerHTML = " <div class='flexr'><div class='bolalistapacientes'></div><div>"+  listapessoa[i] + ' - ' + listasala[i] + ' - ' + listaespec[i] + "</div></div>" ;
        }

      }
    }
    bolinha();

  }
</script>