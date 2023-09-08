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
  <title>Cadastro Médico</title>

  <style>
    #servicheckbox1,#servicheckbox2,#servicheckbox3{
      /* display: flex;
      align-items: center;
      justify-content: space-evenly; */
    }
  </style>
</head>

<body>
  @section('Conteudo')
  <div class="coluna">
    <div class="tituloprincipal">Cadastro Médico</div>
    <br><br>
    <div class="container-fluid" style='margin-top:1rem;'>
      <div class="row gx-3 gy-3">
        <div class='input nomesblocos' id='nomesblocos'>
          <span class="icon-bola" style="color: grey">•</span>
          &nbsp;&nbsp;
          <span>Informações Pessoais</span>
        </div>
        <div class="col-sm-5 col-md-4 col-lg-4 input" id='nome'>
          <div class="cor01">
            <label for="exampleInputEmail1" class="form-label">Nome</label>
            <input type="text" class="form-control" aria-describedby="emailHelp" name='nome' />
          </div>
        </div>
        <div class="col-sm-3 col-md-2 col-lg-2">
          <div class="input cor01" id='cpf'>
            <label for="exampleInputEmail1" class="form-label">CPF/CNPJ</label>
            <input type="text" class="form-control" aria-describedby="emailHelp" id='cpfinput' name='cpf'/>
          </div>
        </div>
        <div class="col-sm-3 col-md-2 col-lg-2">
          <div class="input cor01" id='crn'>
            <label for="exampleInputEmail1" class="form-label">CRM</label>
            <input type="text" class="form-control" aria-describedby="emailHelp" name='crn' data-inputmask="'mask': '999.999.999-99'" />
          </div>
        </div>
        <div class="col-sm-3 col-md-2 col-lg-2 input" id='rg'>
          <div class="cor01">
            <label for="exampleInputEmail1" class="form-label">RG</label>
            <input type="text" class="form-control" aria-describedby="emailHelp" name='rg' data-inputmask="'mask': '9999999999-9'" />
          </div>
        </div>
        <div class="col-sm-3 col-md-2 col-lg-2 input" id='estadocivil'>
          <div class="cor01">
            <label for="exampleInputEmail1" class="form-label">Estado Civil</label>
            <select class="form-select" name="estadocivil">
              <option value="solt">Solteiro</option>
              <option value="cas">Casado</option>
              <option value="outro">Outro</option>
            </select>
          </div>
        </div>
        <div class="col-sm-3 col-md-2 col-lg-2 input" id='sexo'>
          <div class="cor01">
            <label for="exampleInputEmail1" class="form-label">Sexo</label>
            <select class="form-select" name="sexo">
              <option value="masc">Masculino</option>
              <option value="fem">Feminino</option>
              <option value="naodeclarado">Não Declarado</option>
            </select>
          </div>
        </div>
        <div class="col-sm-3 col-md-2 col-lg-2 input" id='datanasc'>
          <div class="cor01">
            <label for="exampleInputEmail1" class="form-label">Data de Nasc.</label>
            <input type="text" class="form-control" aria-describedby="emailHelp" name='datanasc' data-inputmask="'mask': '99/99/9999'" />
          </div>
        </div>
        <div class="col-sm-4 col-md-4 col-lg-4 input" id='email'>
          <div class="cor01">
            <label for="exampleInputEmail1" class="form-label">Email</label>
            <input type="text" class="form-control" aria-describedby="emailHelp" name='email' />
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row gx-3 gy-3">
        <div>
          <div class='input nomesblocos2' id='nomesblocos2'>
            <span class="icon-bola" style="color: grey">•</span>
            &nbsp;&nbsp;
            <span>Endereço</span>
          </div>
        </div>
        <div class="col-sm-2 col-md-2 col-lg-2 input" id='cep'>
          <div class="cor04">
            <label for="exampleInputEmail1" class="form-label">CEP</label>
            <input type="text" class="form-control" aria-describedby="emailHelp" name='cep' id='cepinput' onfocusout="pesquisacep(this.value);" data-inputmask="'mask': '99999-999'" />
          </div>
        </div>
        <div class="col-sm-2 col-md-2 col-lg-2 input" id='uf'>
          <div class="cor04">
            <label for="exampleInputEmail1" class="form-label">UF</label>
            <select class="form-select selectcategoria" name="uf" id='ufinput'>
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
        
        <div class="col-sm-3 col-md-2 col-lg-2 input" id='cidade'>
          <div class="cor04">
            <label for="exampleInputEmail1" class="form-label">Cidade</label>
            <input type="text" class="form-control" aria-describedby="emailHelp" name='cidade' id='cidadeinput' />
          </div>
        </div>
        <div class="col-sm-4 col-md-3 col-lg-4 input" id='logradouro'>
          <div class="cor04">
            <label for="exampleInputEmail1" class="form-label">Logradouro</label>
            <input type="text" class="form-control" aria-describedby="emailHelp" name='logradouro' id='logradouroinput' />
          </div>
        </div>
        <div class="col-sm-2 col-md-2 col-lg-2 input" id='num'>
          <div class="cor04">
            <label for="exampleInputEmail1" class="form-label">Número</label>
            <input type="text" class="form-control" aria-describedby="emailHelp" name='num' />
          </div>
        </div>
      </div>
      <div class="row gx-3 gy-3" style="margin-top: 0.1rem">
        <div class="col-sm-4 col-md-3 col-lg-3 input" id='bairro'>
          <div class="cor04">
            <label for="exampleInputEmail1" class="form-label">Bairro</label>
            <input type="text" class="form-control" aria-describedby="emailHelp" name='bairro' id='bairroinput' />
          </div>
        </div>
        <div class="col-sm-4 col-md-3 col-lg-4 input" id='complemento'>
          <div class="cor04">
            <label for="exampleInputEmail1" class="form-label">Complemento</label>
            <input type="text" class="form-control" aria-describedby="emailHelp" name='complemento' />
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row gx-3 gy-3">
        <div>
          <div class='input nomesblocos1' id='nomesblocos1'>
            <span class="icon-bola" style="color: grey">•</span>
            &nbsp;&nbsp;
            <span>Contatos</span>
          </div>
        </div>
        <div class="col-sm-3 col-md-2 col-lg-2 input" id='tel1'>
          <div class="cor03">
            <label for="exampleInputEmail1" class="form-label">Telefone 1</label>
            <input type="text" class="form-control" aria-describedby="emailHelp" name='tel1' id='tel1input' onkeypress='tel1()' />
          </div>
        </div>
        <div class="col-sm-3 col-md-2 col-lg-2 input" id='tel2'>
          <div class="cor03">
            <label for="exampleInputEmail1" class="form-label">Whatsapp</label>
            <input type="text" class="form-control" aria-describedby="emailHelp" name='tel2' id='tel2input' onkeypress='tel2()' />
          </div>
        </div>
        <div class="col-sm-3 col-md-2 col-lg-2 input" id='celular'>
          <div class="cor03">
            <label for="exampleInputEmail1" class="form-label">Celular</label>
            <input type="text" class="form-control" aria-describedby="emailHelp" name='celular' data-inputmask="'mask': '(99) 99999-9999'" />
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row gx-3 gy-3" style="margin-bottom: 1rem">
        <div>
          <div class='input nomesblocos3' id='nomesblocos3'>
            <span class="icon-bola" style="color: grey">•</span>
            &nbsp;&nbsp;
            <span>Outras Infomações</span>
          </div>
        </div>
        <div class="col-sm-2 col-md-2 col-lg-2 input" id='comissao'>
          <div class='cor02'>
            <label for="exampleInputEmail1" class="form-label">Comissão(%)</label>
            <input type="number" class="form-control" aria-describedby="emailHelp" name='comissao' min='1' max='100' value='1' />
          </div>
        </div>
        <div class="col-sm-3 col-md-3 col-lg-3 input" id=''>
          <div class='cor02'>
            <label for="exampleInputEmail1" class="form-label">Especialidade</label>
            <div style='display:flex;flex-direction:column'>
              <div class='mb-2'>
                <select class="form-select" name="espec" id='especselect' onchange='filtservi()'>
                  <option value=''>---</option>
                </select>
              </div>
              <div class='mb-2'>
                <select class="form-select" name="espec2" id='especselect2' onchange='filtservi()'>
                  <option value=''>---</option>
                </select>
              </div>
              <div>
                <button type="button" class="btn btn-primary" id='especnovobutton' data-bs-toggle="modal" data-bs-target="#exampleModal" onclick='novoespec()'>
                  Nova especialidade
                </button>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Cadastrar Nova Especialidade</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <div class='input' id='especnovo'></div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick='cadastroespec()'>Cadastrar</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-3 col-md-2 col-lg-2 input" id='pagamento'>
          <div class='cor02'>
            <label for="exampleInputEmail1" class="form-label">Dia do Pagamento</label>
            <input type="number" class="form-control" aria-describedby="emailHelp" name='pagamento' value='1' min='1' max='100' />
          </div>
        </div>
        <div class="col-sm-3 col-md-3 col-lg-2 input" id='servicheckbox'>
          <div class='cor02'>
            <label for="exampleInputEmail1" class="form-label">Selecione os serviços</label>
            <div>
              <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalToggleLabel">Serviços Ofertados</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <div class="container">
                        <div class="row">
                          <div class="col-sm" id='servicheckbox1'></div>
                          <div class="col-sm" id='servicheckbox2'></div>
                          <div class="col-sm" id='servicheckbox3'></div>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal" onclick='novaservi()'>Criar novo serviço</button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalToggleLabel2">Novo Serviço</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <div class='input' id='servinovo'></div>
                    </div>
                    <div class="modal-footer">
                      <button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal" data-bs-dismiss="modal" onclick='cadastroservi()'>Cadastrar Serviço</button>
                      <button class="btn btn-secondary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal" data-bs-dismiss="modal">Cancelar</button>
                    </div>
                  </div>
                </div>
              </div>
              <a class="btn btn-primary" data-bs-toggle="modal" href="#exampleModalToggle" role="button">Serviços Ofertados</a>
            </div>
          </div>
        </div>
      </div>
      <div class="row gx-3 gy-3" style="margin-bottom: 2rem">
        <div class="col-sm-2 col-md-2 col-lg-2 input" id='status'>
          <div class='cor02'>
            <label for="exampleInputEmail1" class="form-label">Status</label>
            <select name='status' class="form-select selectcategoria">
              <option value='Ativo'>Ativo</option>
              <option value='Inativo'>Inativo</option>
            </select>
          </div>
        </div>
        <div class="col-sm-3 col-md-3 col-lg-2 input" id='maximoatendimento'>
          <div class='cor02'>
            <label for="exampleInputEmail1" class="form-label">Máx. de atendimentos</label>
            <input type="number" class="form-control" aria-describedby="emailHelp" name='maximoatendimento' value='1' min='1' max='100' />
          </div>
        </div>
        <div class="col-sm-3 col-md-2 col-lg-2 input" id='maximoretorno'>
          <div class='cor02'>
            <label for="exampleInputEmail1" class="form-label">Máx. de retornos</label>
            <input type="number" class="form-control" aria-describedby="emailHelp" name='maximoretorno' value='1' min='1' max='100' />
          </div>
        </div>
        <div class="col-sm-4 col-md-3 col-lg-3 input" id='tempoconsulta'>
          <div class='cor02'>
            <label for="exampleInputEmail1" class="form-label">Tempo mínimo da consulta</label>
            <select class="form-select selectcategoria" name="tempoconsulta" id='tempoconsultainput'>
              <option value='5'>5 min</option>
              <option value='10'>10 min</option>
              <option value='15'>15 min</option>
              <option value='20'>20 min</option>
              <option value='30'>30 min</option>
              <option value='60'>60 min</option>
            </select>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid" style="margin-bottom: 2rem">
      <div class="row gx-3 gy-3">
        <div>
          <div class='input nomesblocos4' id='nomesblocos4'>
            <span class="icon-bola" style="color: grey">•</span>
            &nbsp;&nbsp;
            <span>Informações de Login</span>
          </div>
        </div>
        <div class="col-sm-4 col-md-3 col-lg-3">
          <div class='input cor01' id='user_name'>
            <label for="exampleInputEmail1" class="form-label">Nome de Usuário</label>
            <input type="text" class="form-control" aria-describedby="emailHelp" name='user_name' />
          </div>
        </div>
        <div class="col-sm-4 col-md-3 col-lg-3">
          <div class='input cor01' id='user_senha'>
            <label for="exampleInputEmail1" class="form-label">Senha do Usuário</label>
            <input type="password" class="form-control" aria-describedby="emailHelp" name='user_senha' />
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid" style="margin-bottom: 3rem">
      <div class="row gx-3 gy-3">
        <div>
          <div id='tabela' class="table-responsive-sm">
            <table id='horaatendimentotable' class="table">
              <thead class="table-active">
                <tr>
                  <td scope="col">Domingo</td>
                  <td scope="col">Segunda</td>
                  <td scope="col">Terça</td>
                  <td scope="col">Quarta</td>
                  <td scope="col">Quinta</td>
                  <td scope="col">Sexta</td>
                  <td scope="col">Sábado</td>
                </tr>
              </thead>
              <tbody id=''>
                <tr>
                  <td><input type='checkbox' name='domingocheckbox' id='domingocheckbox' checked></td>
                  <td><input type='checkbox' name='segundacheckbox' id='segundacheckbox' checked></td>
                  <td><input type='checkbox' name='tercacheckbox' id='tercacheckbox' checked></td>
                  <td><input type='checkbox' name='quartacheckbox' id='quartacheckbox' checked></td>
                  <td><input type='checkbox' name='quintacheckbox' id='quintacheckbox' checked></td>
                  <td><input type='checkbox' name='sextacheckbox' id='sextacheckbox' checked></td>
                  <td><input type='checkbox' name='sabadocheckbox' id='sabadocheckbox' checked></td>
                </tr>
                <tr>
                  <td><select name='domingoselect1' class='form-select selectcategoria' id='domingoselect1'></select></td>
                  <td><select name='segundaselect1' class='form-select selectcategoria' id='segundaselect1'></select></td>
                  <td><select name='tercaselect1' class='form-select selectcategoria' id='tercaselect1'></select></td>
                  <td><select name='quartaselect1' class='form-select selectcategoria' id='quartaselect1'></select></td>
                  <td><select name='quintaselect1' class='form-select selectcategoria' id='quintaselect1'></select></td>
                  <td><select name='sextaselect1' class='form-select selectcategoria' id='sextaselect1'></select></td>
                  <td><select name='sabadoselect1' class='form-select selectcategoria' id='sabadoselect1'></select></td>
                </tr>
                <tr>
                  <td><select name='domingoselect2' class='form-select selectcategoria' id='domingoselect2'></select></td>
                  <td><select name='segundaselect2' class='form-select selectcategoria' id='segundaselect2'></select></td>
                  <td><select name='tercaselect2' class='form-select selectcategoria' id='tercaselect2'></select></td>
                  <td><select name='quartaselect2' class='form-select selectcategoria' id='quartaselect2'></select></td>
                  <td><select name='quintaselect2' class='form-select selectcategoria' id='quintaselect2'></select></td>
                  <td><select name='sextaselect2' class='form-select selectcategoria' id='sextaselect2'></select></td>
                  <td><select name='sabadoselect2' class='form-select selectcategoria' id='sabadoselect2'></select></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container-fluid" style='margin-top:3rem;'>
    <button type="submit" class="btn" id='cadastrarmedico' name='cadastrarmedico' value='Cadastrar Médico' onclick='cadastrarmedico()' style='background-color: #D1941A!important;margin-bottom: 2rem;'>
      <span class="selectacoes">Cadastrar Médico</span>
    </button>
  </div>
  <!-- Modal -->
  <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Cadastro</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div id=''>Médico cadastrado com sucesso</div>
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
  $('.input').css('display', 'block');
  var contservicheckboxcolumn = 1;
  consespec();
  preencherSelects();
  $('#tel1input').inputmask('(99) 9999[9]-9999');
  $('#tel2input').inputmask('(99) 9999[9]-9999');
  $('#cpfinput').inputmask({
    mask: ['999.999.999-99', '99.999.999/9999-99'],
    keepStatic: true
  });
  
  var serviar = [];
  var serviaresc = [];

  function tel1() {
    if (document.getElementById('tel1input').value[5] != '9') {
      $('#tel1input').inputmask('(99) 9999-9999');
    } else {
      $('#tel1input').inputmask('(99) 9999[9]-9999');
    }
  }

  function tel2() {
    if (document.getElementById('tel2input').value[5] != '9') {
      $('#tel2input').inputmask('(99) 9999-9999');
    } else {
      $('#tel2input').inputmask('(99) 9999[9]-9999');
    }
  }

  function filtservi() {
    serviar = [];
    document.getElementById('servicheckbox1').innerHTML = '';
    document.getElementById('servicheckbox2').innerHTML = '';
    document.getElementById('servicheckbox3').innerHTML = '';
    contservicheckboxcolumn = 1;

    if ($("[name='espec']").val() != '') {
      $.ajax({
        type: "GET",
        url: "/consultacadastroservimed",
        data: {
          espec: $("[name='espec']").val(),
          espec2: $("[name='espec2']").val()
        },
        dataType: "json",
        success: function(data) {
          for (var i = 0; i < data['nome'].length; i++) {
            document.getElementById('servicheckbox' + contservicheckboxcolumn).innerHTML += data['nome'][i] + ": <input type='checkbox' name='servibox" + data['id'][i] + "' value='" + data['id'][i] + "'> <br>";
            serviar.push(data['id'][i]);
            if (contservicheckboxcolumn == 1) {
              contservicheckboxcolumn = 2;
            } else if (contservicheckboxcolumn == 2) {
              contservicheckboxcolumn = 3;
            } else {
              contservicheckboxcolumn = 1;
            }
          }
        }
      });
    }
  }

  function consespec() {
    var select = document.getElementById("especselect");
    var length = select.options.length;
    for (i = length - 1; i >= 0; i--) {
      select.options[i] = null;
    }

    $.ajax({
      type: "GET",
      url: "/consultacadastroespec",
      data: {},
      dataType: "json",
      success: function(data) {
        var select = document.getElementById('especselect');
        for (var i = 0; i < data['id'].length; i++) {
          var opt = document.createElement('option');
          opt.appendChild(document.createTextNode(data['nome'][i]));
          opt.value = data['id'][i];
          select.appendChild(opt);
        }
        var select = document.getElementById("especselect2");
        var length = select.options.length;
        for (i = length - 1; i >= 0; i--) {
          select.options[i] = null;
        }
        var select = document.getElementById('especselect2');
        for (var i = 0; i < data['id'].length; i++) {
          var opt = document.createElement('option');
          opt.appendChild(document.createTextNode(data['nome'][i]));
          opt.value = data['id'][i];
          select.appendChild(opt);
        }
      }
    });
    setTimeout(function() {
      filtservi();
    }, 500);
  }

  function novoespec() {
    document.getElementById('especnovo').innerHTML = "<span class='nomesinputs'>Nova Especialidade</span><br><input type='text' class='inputstexttelas inputtextmedio' id='especnovoinput' name='especnovoinput'><br><br><span class='nomesinputs'>Descrição</span><br><input type='text' class='inputstexttelas inputtextmedio' id='especnovodescinput' name='especnovodescinput'><span class='nomesinputs'>Letra da Ordem</span><br><input type='text' class='inputstexttelas inputtextmedio' id='letraordem' name='letraordem' onfocusout='checarletraordem()'>";
    document.getElementById('especnovo').style.display = 'block';
  }

  function cancelarespec() {
    document.getElementById('especnovo').style.display = 'none'
  }

  function novaservi() {
    document.getElementById('servinovo').innerHTML = "<span class='nomesinputs'>Novo Serviço</span><br><input type='text' class='inputstexttelas inputtextmedio' id='servinovoinput' name='servinovoinput'><br><br><span class='nomesinputs'>Serviço</span>&nbsp&nbsp<select name='servinovoespec' class='form-select selectcategoria' id='servinovoespec'>";
    document.getElementById('servinovo').style.display = 'block';
    $.ajax({
      type: "GET",
      url: "/consultacadastroespec",
      data: {},
      dataType: "json",
      success: function(data) {
        var select = document.getElementById('servinovoespec');
        for (var i = 0; i < data['id'].length; i++) {
          var opt = document.createElement('option');
          opt.appendChild(document.createTextNode(data['nome'][i]));
          opt.value = data['id'][i];
          select.appendChild(opt);
        }
      }
    });
  }

  function cancelarservi() {
    document.getElementById('servinovo').style.display = 'none'
  }

  var checkletraordem = 0;
    function checarletraordem(){
        $.ajax({
            type: "GET",
            url: "/consultaletraordem",
            data: {letraordem: document.getElementById('letraordem').value},
            dataType: "json",
            success: function(data) {
                if(data == 1){
                    checkletraordem = 1;
                }else{
                    checkletraordem = 0;
                    console.log('Letra já existe!');
                }
            }
        });
    }

  function cadastroespec() {
    $.ajax({
      type: "GET",
      url: "/cadastro/cadastroespecialidade",
      data: {
        nome: $("[name='especnovoinput']").val(),
        desc: $("[name='especnovodescinput']").val(),
        letraordem: $("[name='letraordem']").val(),
      },
      dataType: "json",
      success: function(data) {
        console.log('Especialidade cadastrado com sucesso');
        document.getElementById('especnovo').style.display = 'none'
        consespec();
      }
    });
  }

  function cadastroservi() {
    $.ajax({
      type: "GET",
      url: "/cadastro/cadastroservico",
      data: {
        nome: $("[name='servinovoinput']").val(),
        espec: $("[name='servinovoespec']").val(),
      },
      dataType: "json",
      success: function(data) {
        console.log('Serviço cadastrado com sucesso');
        document.getElementById('servinovo').style.display = 'none'
        filtservi();
      }
    });

  }

  function limpa_formulário_cep() {
    //Limpa valores do formulário de cep.
    document.getElementById('logradouroinput').value = ("");
    document.getElementById('bairroinput').value = ("");
    document.getElementById('cidadeinput').value = ("");
    document.getElementById('ufinput').value = ("");
  }

  function meu_callback(conteudo) {
    if (!("erro" in conteudo)) {
      //Atualiza os campos com os valores.
      document.getElementById('logradouroinput').value = (conteudo.logradouro);
      document.getElementById('bairroinput').value = (conteudo.bairro);
      document.getElementById('cidadeinput').value = (conteudo.localidade);
      document.getElementById('ufinput').value = (conteudo.uf);
    } //end if.
    else {
      //CEP não Encontrado.
      limpa_formulário_cep();
      alert("CEP não encontrado.");
    }
  }

  function pesquisacep(valor) {
    //Nova variável "cep" somente com dígitos.
    var cep = valor.replace(/\D/g, '');

    //Verifica se campo cep possui valor informado.
    if (cep != "") {

      //Expressão regular para validar o CEP.
      var validacep = /^[0-9]{8}$/;

      //Valida o formato do CEP.
      if (validacep.test(cep)) {

        //Preenche os campos com "..." enquanto consulta webservice.
        document.getElementById('logradouro').value = "...";
        document.getElementById('bairro').value = "...";
        document.getElementById('cidade').value = "...";
        document.getElementById('uf').value = "...";

        //Cria um elemento javascript.
        var script = document.createElement('script');

        //Sincroniza com o callback.
        script.src = 'https://viacep.com.br/ws/' + cep + '/json/?callback=meu_callback';

        //Insere script no documento e carrega o conteúdo.
        document.body.appendChild(script);

      } //end if.
      else {
        //cep é inválido.
        limpa_formulário_cep();
        alert("Formato de CEP inválido.");
      }
    } //end if.
    else {
      //cep sem valor, limpa formulário.
      limpa_formulário_cep();
    }

  };

  function preencherSelects() {
    var dias = ['domingoselect1', 'segundaselect1', 'tercaselect1', 'quartaselect1', 'quintaselect1', 'sextaselect1', 'sabadoselect1', 'domingoselect2', 'segundaselect2', 'tercaselect2', 'quartaselect2', 'quintaselect2', 'sextaselect2', 'sabadoselect2'];
    var horas = ['07:00', '07:15', '07:30', '07:45', '08:00', '08:15', '08:30', '08:45', '09:00', '09:15', '09:30', '09:45', '10:00', '10:15', '10:30', '10:45', '11:00', '11:15', '11:30', '11:45', '12:00', '12:15', '12:30', '12:45', '13:00', '13:15', '13:30', '13:45', '14:00', '14:15', '14:30', '14:45', '15:00', '15:15', '15:30', '15:45', '16:00', '16:15', '16:30', '16:45', '17:00'];
    for (var o = 0; o < dias.length; o++) {
      var select = document.getElementById(dias[o]);
      for (var i = 0; i < horas.length; i++) {
        var opt = document.createElement('option');
        opt.appendChild(document.createTextNode(horas[i]));
        opt.value = horas[i];
        select.appendChild(opt);
      }
      if (o > 6) {
        document.getElementById(dias[o]).value = '17:00';
      } else {
        document.getElementById(dias[o]).value = '07:00';
      }

    }

  }

  function cadastrarmedico() {
    for (var o = 0; o < serviar.length; o++) {
      var sla = 'servibox' + serviar[o];
      if ($("[name='" + sla + "']").prop('checked') == true) {
        serviaresc.push($("[name='" + sla + "']").val());
      }
    }
    var especatuais = $("[name='espec']").val() + ',' + $("[name='espec2']").val();
    $.ajax({
      type: "GET",
      url: "/cadastro/cadastromedico",
      data: {
        nome: $("[name='nome']").val(),
        crn: $("[name='crn']").val(),
        cpf: $("[name='cpf']").val(),
        rg: $("[name='rg']").val(),
        cep: $("[name='cep']").val(),
        datanasc: $("[name='datanasc']").val(),
        estadocivil: $("[name='estadocivil']").val(),
        sexo: $("[name='sexo']").val(),
        logradouro: $("[name='logradouro']").val(),
        num: $("[name='num']").val(),
        complemento: $("[name='complemento']").val(),
        bairro: $("[name='bairro']").val(),
        cidade: $("[name='cidade']").val(),
        uf: $("[name='uf']").val(),
        celular: $("[name='celular']").val(),
        tel1: $("[name='tel1']").val(),
        tel2: $("[name='tel2']").val(),
        email: $("[name='email']").val(),
        comissao: $("[name='comissao']").val(),
        espec: especatuais,
        servi: serviaresc,
        pagamento: $("[name='pagamento']").val(),
        status: $("[name='status']").val(),
        domingocheckbox: $("[name='domingocheckbox']").prop('checked'),
        domingoselect1: $("[name='domingoselect1']").val(),
        domingoselect2: $("[name='domingoselect2']").val(),
        segundacheckbox: $("[name='segundacheckbox']").prop('checked'),
        segundaselect1: $("[name='segundaselect1']").val(),
        segundaselect2: $("[name='segundaselect2']").val(),
        tercacheckbox: $("[name='tercacheckbox']").prop('checked'),
        tercaselect1: $("[name='tercaselect1']").val(),
        tercaselect2: $("[name='tercaselect2']").val(),
        quartacheckbox: $("[name='quartacheckbox']").prop('checked'),
        quartaselect1: $("[name='quartaselect1']").val(),
        quartaselect2: $("[name='quartaselect2']").val(),
        quintacheckbox: $("[name='quintacheckbox']").prop('checked'),
        quintaselect1: $("[name='quintaselect1']").val(),
        quintaselect2: $("[name='quintaselect2']").val(),
        sextacheckbox: $("[name='sextacheckbox']").prop('checked'),
        sextaselect1: $("[name='sextaselect1']").val(),
        sextaselect2: $("[name='sextaselect2']").val(),
        sabadocheckbox: $("[name='sabadocheckbox']").prop('checked'),
        sabadoselect1: $("[name='sabadoselect1']").val(),
        sabadoselect2: $("[name='sabadoselect2']").val(),
        maximoatendimento: $("[name='maximoatendimento']").val(),
        maximoretorno: $("[name='maximoretorno']").val(),
        tempoconsulta: $("[name='tempoconsulta']").val(),
      },
      dataType: "json",
      success: function(data) {
        $('#exampleModal1').modal('show');
        console.log('Médico cadastrado com sucesso');
        if ($("[name='user_name']").val() != '') {

          setTimeout(function() {

            $.ajax({
              type: "GET",
              url: "/cadastro/cadastrousuario",
              data: {
                name: $("[name='nome']").val(),
                email: $("[name='email']").val(),
                user_name: $("[name='user_name']").val(),
                user_senha: $("[name='user_senha']").val(),
                user_tipo: '3',
              },
              dataType: "json",
              success: function(data) {
                console.log('Usuário cadastrado com sucesso!');
              }
            });

          }, 1000);


        }
      }
    });
    serviaresc = [];
  }
</script>
@endsection

</html>