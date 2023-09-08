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
  <title>Pesquisa Médico</title>

  <style>
    .ui-menu-item {
      padding: 0.3rem 0.5rem;
      /* background-color: #003c77!important; */
      background-color:#929597!important;
      /* color: white!important; */
      color:black!important;
      cursor: pointer!important;
      list-style: none!important;
    }

    .ui-menu{
      position: absolute!important;
    }

    .table td,
    .table th {
      text-align: left;
    }
    
    .table> :not(:last-child)> :last-child>* {
      text-align: left;
    }
    
    @media (min-width:576px) and (max-width:767px){
      .ui-menu{
        width:30vw!important;
        max-width:30vw;
      }
    }
  </style>
</head>

<body>
  @section('Conteudo')
  <div class="container-fluid" style='margin-top:1.5rem;'>
    <div class="tituloprincipal">Pesquisa Médico</div>
  </div>
  <div class="container-fluid" style='margin-top:1rem;'>
    <div class="row gx-3 gy-3">
      <div class="col-sm-5 col-md-4 col-lg-3">
        <div class="cor01">
          <label for="pesquisarmediconome" class="form-label">Nome</label>
          <input type="text" class="form-control" aria-describedby="emailHelp" name='pesquisarmediconome' id='pesquisarmediconome' style='width:100%'/>
        </div>
      </div>
      <div class="col-sm-1 col-md-1 col-lg-1 divOU">
        <div class="cor01">
          <span>OU</span>
        </div>
      </div>
      <div class="col-sm-3 col-md-2 col-lg-2">
        <div class="cor01">
          <label for="pesquisarmediconome" class="form-label">CPF/CNPJ</label>
          <input type="text" class="form-control" aria-describedby="emailHelp" name='pesquisarmedicocpf' id='pesquisarmedicocpf' />
        </div>
      </div>
      <div class="col-sm-1 col-md-1 col-lg-1 divOU">
        <div class="cor01">
          <span>OU</span>
        </div>
      </div>
      <div class="col-sm-3 col-md-2 col-lg-2">
        <div class="cor01">
          <label for="pesquisarmediconome" class="form-label">CRM</label>
          <input type="text" class="form-control" aria-describedby="emailHelp" name='pesquisarmedicocrn' id='pesquisarmedicocrn' />
        </div>
      </div>
      <div class="col-sm-1 col-md-1 col-lg-1 divOU">
        <div class="cor01">
          <span>OU</span>
        </div>
      </div>
      <div class="col-sm-5 col-md-4 col-lg-3 divexternaespec">
        <div class="cor01">
          <label for="pesquisarmedicoespec" class="form-label">Especialidade</label>
          <div class='direction'>
            <div>
              <select class='form-select selectcategoria' aria-label='Default select example' name="pesquisarmedicoespec" id='pesquisarmedicoespec'>
                <option value=''>Selecione a especialidade</option>
              </select>
            </div>
            <div class='btnovaespec'>
              <button type="submit" class="btn" value='Pesquisar' onclick='pesquisarmedico()' style='background-color: #D1941A!important;margin-bottom: 1rem;'>
                <span class="selectacoes">Pesquisar</span>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container-fluid" style='margin-top:4rem;'>
    <div class="row gx-3 gy-3">
      <div class="">
        <div class="cor01">
          <div id='tabela' class="table-responsive-sm">
            <table id='pesquisarmedicotable' class="table">
              <thead class="table-active">
                <tr>
                  <td scope="col">CPF/CNPJ</td>
                  <!-- <td scope="col">CRM</td> -->
                  <td scope="col">Nome</td>
                  <td scope="col">Telefone</td>
                  <td scope="col">Especialidade</td>
                  <td scope="col">Ações</td>
                </tr>
              </thead>
              <tbody id='medicotablebody'>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container-fluid" style='margin-top:1rem;'>
    <div class='input tituloeditar' id="titulo" style='margin-bottom:1rem'>Editar Dados</div>
    <br>
    <div class="row gx-3 gy-3">
      <div class='input nomesblocos' id='nomesblocos'>
        <span class="icon-bola" style="color: grey">•</span>
        &nbsp;&nbsp;
        <span>Informações Pessoais</span>
      </div>
      <div class="col-sm-7 col-md-6 col-lg-5 input" id='nome'>
        <div class="cor01">
          <label for="exampleInputEmail1" class="form-label">Nome</label>
          <input type="text" class="form-control" aria-describedby="emailHelp" name='nome' />
        </div>
      </div>
      <div class="col-sm-3 col-md-2 col-lg-2 input" id='cpf'>
        <div class="cor01">
          <label for="exampleInputEmail1" class="form-label">CPF/CNPJ</label>
          <input type="text" class="form-control" aria-describedby="emailHelp" id='cpfinput' name='cpf' />
        </div>
      </div>
      <div class="col-sm-3 col-md-2 col-lg-2 input" id='crn'>
        <div class="cor01">
          <label for="exampleInputEmail1" class="form-label">CRM</label>
          <input type="text" class="form-control" aria-describedby="emailHelp" name='crn' data-inputmask="'mask': '999.999.999-99'" />
        </div>
      </div>
      <div class="col-sm-3 col-md-2 col-lg-2 input" id='cnpj'>
        <div class="cor01">
          <label for="exampleInputEmail1" class="form-label">CNPJ</label>
          <input type="text" class="form-control" aria-describedby="emailHelp" name='cnpj' data-inputmask="'mask': '99.999.999/9999-99'" />
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
      <div class="col-sm-3 col-md-3 col-lg-2 input" id='sexo'>
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
      <div class="col-sm-5 col-md-4 col-lg-4 input" id='email'>
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
      <div class="col-sm-3 col-md-2 col-lg-2 input" id='cep'>
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
    <!-- <div class="row gx-3 gy-3" style="margin-top: 0.1rem">
      
    </div> -->
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
      <div class="col-sm-4 col-md-3 col-lg-3 input" id='espec'>
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
              <button type="button" class="btn btn-primary" id='especnovobutton' name='especnovobutton' data-bs-toggle="modal" data-bs-target="#exampleModal" onclick='novoespec()'>
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
            <a class="btn btn-primary" data-bs-toggle="modal" href="#exampleModalToggle" role="button" name='servicosofertados'>Serviços Ofertados</a>
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
      <div class="col-sm-4 col-md-3 col-lg-3">
        <div class='input cor01' id='user_tipo'>
          <label for="exampleInputEmail1" class="form-label">Tipo de usuário</label>
          <select name="user_tipo" class="form-select" id='user_tipo'>
            <option selected>Selecione o tipo de Usuário</option>
            <option value="1">Colaborador(a)</option>
            <option value="2">Administrador(a)</option>
          </select>
        </div>
      </div>
    </div>
  </div>
  <div class="container-fluid  input" style="margin-bottom: 3rem" id='tabelaagenda'>
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
  <div class="container-fluid" style='margin-top:2rem;'>
    <div class='input' id='agendabotao'>
      <button type="submit" class="btn btn-primary" id='agendamedico' name='agendamedico' value='Agenda do médico' onclick='agendaMedico()' style='margin-bottom: 2rem;'>
        <span class="fontebotao">Agenda do médico</span>
      </button>
    </div>
  </div>
  <div class="container-fluid" style='margin-top:3rem;'>
    <div class='input' id='editar'>
      <button type="submit" class="btn" id='editarmedico' name='editarmedico' value='Editar Médico' onclick='editarMedico()' style='background-color: #D1941A!important;margin-bottom: 3rem;'>
        <span class="selectacoes">Salvar Alterações</span>
      </button>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edição</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div id=''>Médico editado com sucesso</div>
        </div>
        <div class="modal-footer">
          <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
          <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Ok</button>
        </div>
      </div>
    </div>
  </div>


  <div class="modal fade" id="agendamedicoModal" aria-hidden="true" aria-labelledby="exampleModalagendamedicoModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalagendamedicoModal">Agenda</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row gx-3 gy-3">
            <div class="col-sm-4 col-md-4 col-lg-4">
              <div>
                <input type="date" class="form-control" aria-describedby="intervalo1" name='intervalo1' id='intervalo1' />
              </div>
            </div>
            <div class="col-sm-1 col-md-1 col-lg-1" style='width:max-content'>
              <div>
                <span>-</span>
              </div>
            </div>
            <div class="col-sm-4 col-md-4 col-lg-4">
              <div>
                <input type="date" class="form-control" aria-describedby="intervalo2" name='intervalo2' id='intervalo2' />
              </div>
            </div>
            <div class="col-sm-2 col-md-2 col-lg-2">
              <div>
                <button type="submit" class="btn btamarelo" value='Pesquisar' onclick='listagendamedico()'>
                  <span class="fontebotao" style='font-size:15px'>Pesquisar</span>
                </button>
              </div>
            </div>
          </div>

          <div class="row gx-3 gy-3">
            <div class="col-sm-12 col-md-12 col-lg-12">
              <div>
                <div id='erroagendamedico'></div>
              </div>
            </div>
          </div>

          <div class="row gx-3 gy-3" style='margin-top:2rem'>
            <div class="col-sm-12 col-md-12 col-lg-12">
              <div>
                <table id='agendamedicotable' class="table">
                  <thead class="table-active">
                    <tr>
                      <td scope="col"><input type='checkbox' disabled></td>
                      <td scope="col">Data</td>
                      <td scope="col">Horario</td>
                      <td scope="col">Ações</td>
                    </tr>
                  </thead>
                  <tbody id='agendamedicotablebody'>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class='btn btverde' value='Adicionar' onclick='novaagendamedico()' data-bs-target="#novaagendamedicoModal" data-bs-toggle="modal" data-bs-dismiss="modal" style='background: #127a7a;'>
            <span class="fontebotao" style='font-size:15px'>Adicionar</span>
          </button>
          <button type="submit" class="btn btdelete" value='Excluir' onclick='excluiragendamedico()'>
            <span class="fontebotao" style='font-size:15px'>Excluir</span>
          </button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="novaagendamedicoModal" aria-hidden="true" aria-labelledby="exampleModalnovaagendamedicoModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalnovaagendamedicoModal">Nova Agenda</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body novaagendab">
          <div id='previewhorario'></div>
          <div>
            <label for="datanovaagendas1" class="form-label">Data do agendamento</label>
            <input type="date" class="form-control" aria-describedby="data" name='datanovaagendas1' id='datanovaagendas1' onchange='datanovaagenda()'/>
          </div>
          <br>
          <div style='display:flex'>
            <div class='alinharitens'>
              <input type="radio" name="options" id="integral" autocomplete="off" checked onclick='datanovaagenda()'>
              <span class='distitens'>Horário Comercial</span>
            </div>
            
            <div class='alinharitens'>
              <input type="radio" name="options" id="personalizar" autocomplete="off" onclick='datanovaagenda()'>
              <span class='distitens'>Personalizar</span>
            </div>
          </div>
          <br>
          <div style='display:flex'>
            <div style='margin-right:1.3rem'>
              <label for="inicioagendamedico" class="form-label">Hora Inicial</label>
              <input type="text" class="form-control" aria-describedby="iniciohr" name='inicioagendamedico' id='inicioagendamedico' data-inputmask="'mask': '99:99'" />
            </div>
            <div>
              <label for="fimagendamedico" class="form-label">Hora Final</label>
              <input type="text" class="form-control" aria-describedby="iniciofim" name='fimagendamedico' id='fimagendamedico' data-inputmask="'mask': '99:99'" />
            </div>
          </div>
          <br>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn" onclick='novohorarioConfirm()' data-bs-target="#agendamedicoModal" data-bs-toggle="modal" data-bs-dismiss="modal" style='background:#127a7a;color:white'>Cadastrar Horario</button>
          <button class="btn btn-secondary" data-bs-target="#agendamedicoModal" data-bs-toggle="modal" data-bs-dismiss="modal">Voltar</button>
        </div>
      </div>
    </div>
  </div>
  
  
  <div class="modal fade" id="editagendamedicoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Editar Agenda</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body novaagendab">
          <div id='previewhorarioedit'></div>
          <div>
            <label for="datanovaagendas1edit" class="form-label">Data do agendamento</label>
            <input type="date" class="form-control" aria-describedby="data" name='datanovaagendas1edit' id='datanovaagendas1edit' onchange='datanovaagendaedit()' />
          </div>
          <br>
          <div style='display:flex'>
            <div class='alinharitens'>
              <input type="radio" name="options" id="integraledit" autocomplete="off" checked onclick='datanovaagendaedit()'>
              <span class='distitens'>Horário Comercial</span>
            </div>
            <div class='alinharitens'>
              <input type="radio" name="options" id="personalizaredit" autocomplete="off" onclick='datanovaagendaedit()'>
              <span class='distitens'>Personalizar</span>
            </div>
          </div>
          <br>
          <div style='display:flex'>
            <div style='margin-right:1.3rem'>
              <label for="inicioagendamedicoedit" class="form-label">Hora Inicial</label>
              <input type="text" class="form-control" aria-describedby="iniciohr" name='inicioagendamedicoedit' id='inicioagendamedicoedit' data-inputmask="'mask': '99:99'" />
            </div>
            <div>
              <label for="fimagendamedico" class="form-label">Hora Final</label>
              <input type="text" class="form-control" aria-describedby="iniciofim" name='fimagendamedicoedit' id='fimagendamedicoedit' data-inputmask="'mask': '99:99'" />
            </div>
          </div>
          <br>
        </div>
        <div class="modal-footer">
          <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button> -->
          <button type="button" class="btn btn-primary" onclick='edithorarioConfirm()' data-bs-target="#agendamedicoModal" data-bs-toggle="modal" data-bs-dismiss="modal">Editar Horario</button>
          <button class="btn btn-secondary" data-bs-target="#agendamedicoModal" data-bs-toggle="modal" data-bs-dismiss="modal">Voltar</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="excluiragendamedicoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Excluir Agenda</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Tem certeza que deseja excluir esse horário?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="button" class="btn btn-primary" onclick='excluirhorarioConfirm()'>Excluir Horario</button>
        </div>
      </div>
    </div>
  </div>
</body>
<script>
  var dadoslinhas = [];
  var sessao = '';
  reset();
  escondertabela();
  consespecpesquisa();
  $('#tel1input').inputmask('(99) 9999[9]-9999');
  $('#tel2input').inputmask('(99) 9999[9]-9999');
  $('#contatorepinput').inputmask('(99) 9999[9]-9999');
  $('#salarioinput').inputmask('R$[9]9.999,99');
  $("input[id*='pesquisarmedicocpf']").inputmask({
    mask: ['999.999.999-99', '99.999.999/9999-99'],
    keepStatic: true
  });
  $('#cpfinput').inputmask({
    mask: ['999.999.999-99', '99.999.999/9999-99'],
    keepStatic: true
  });

  var serviar = [];
  var serviaresc = [];

  var inicioagendamedico = '';
  var fimagendamedico = '';

  var cpfatual = '';
  var idagendamedico = [];
  var datamedico = [];
  var horariosmedico = [];
  var idagendamedicoatual = '';
  var idagendamedicoexcluir = [];
  var permissaoeditarexcluir = 0;

  if({{Auth::user()->user_tipo}} != 2){
        $.ajax({
        type: "GET",
        url: "/buscarpermissoes",
        data: {userid: {{Auth::user()->user_tipo}}},
        dataType: "json",
        success: function(data) {
          if(data.indexOf('2.2') != -1){
            permissaoeditarexcluir = 1;
          }
        }
      });
    }else{
      permissaoeditarexcluir = 1;
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
          espec2: $("[name='espec2']").val(),
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
        var select = document.getElementById('especselect2');
        for (var i = 0; i < data['id'].length; i++) {
          var opt = document.createElement('option');
          opt.appendChild(document.createTextNode(data['nome'][i]));
          opt.value = data['id'][i];
          select.appendChild(opt);
        }
      }
    });
  }

  function consespecpesquisa() {
    $.ajax({
      type: "GET",
      url: "/consultacadastroespec",
      data: {},
      dataType: "json",
      success: function(data) {
        var select = document.getElementById('pesquisarmedicoespec');
        for (var i = 0; i < data['id'].length; i++) {
          var opt = document.createElement('option');
          opt.appendChild(document.createTextNode(data['nome'][i]));
          opt.value = data['id'][i];
          select.appendChild(opt);
        }
      }
    });
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

  function acoes(select) {
    var id = select.id.split('selectmedico');
    if (document.getElementById('selectmedico' + id[1]).value == 'editar') {
      editar(id[1]);
    }
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

  function preencherSelects() {
    var dias = ['domingoselect1', 'segundaselect1', 'tercaselect1', 'quartaselect1', 'quintaselect1', 'sextaselect1', 'sabadoselect1', 'domingoselect2', 'segundaselect2', 'tercaselect2', 'quartaselect2', 'quintaselect2', 'sextaselect2', 'sabadoselect2'];
    var horas = ['00:00', '00:15', '00:30', '00:45', '01:00', '01:15', '01:30', '01:45', '02:00', '02:15', '02:30', '02:45', '03:00', '03:15', '03:30', '03:45', '04:00', '04:15', '04:30', '04:45', '05:00', '05:15', '05:30', '05:45', '06:00', '06:15', '06:30', '06:45', '07:00', '07:15', '07:30', '07:45', '08:00', '08:15', '08:30', '08:45', '09:00', '09:15', '09:30', '09:45', '10:00', '10:15', '10:30', '10:45', '11:00', '11:15', '11:30', '11:45', '12:00', '12:15', '12:30', '12:45', '13:00', '13:15', '13:30', '13:45', '14:00', '14:15', '14:30', '14:45', '15:00', '15:15', '15:30', '15:45', '16:00', '16:15', '16:30', '16:45', '17:00', '17:15', '17:30', '17:45', '18:00', '18:15', '18:30', '18:45', '19:00', '19:15', '19:30', '19:45', '20:00', '20:15', '20:30', '20:45', '21:00', '21:15', '21:30', '21:45', '22:00', '22:15', '22:30', '22:45', '23:00', '23:15', '23:30', '23:45'];
    for (var o = 0; o < dias.length; o++) {
      var select = document.getElementById(dias[o]);
      for (var i = 0; i < horas.length; i++) {
        var opt = document.createElement('option');
        opt.appendChild(document.createTextNode(horas[i]));
        opt.value = horas[i];
        select.appendChild(opt);
      }
      document.getElementById(dias[o]).value = '00:00';
    }

  }

  function escondertabela() {
    $('#tabela').css('display', 'none');
  }

  $('#pesquisarmediconome').keyup(function() {

    var nome = $('#pesquisarmediconome').val();
    var nomes = [];
    if (nome.length >= 2) {
      $.ajax({
        type: 'GET',
        url: 'medico/nome',
        data: {
          nomemedico: nome
        },
        dataType: "json",
        success: function(data) {
          for (i = 0; i < data.length; i++) {
            nomes.push(data[i]['med_nome']);
          }
          nomes = nomes.filter((este, i) => nomes.indexOf(este) === i);
          $("#pesquisarmediconome").autocomplete({
            source: nomes
          });
        }

      });

    }

  });

  function buscarnome() {
    var nome = document.getElementById('pesquisarmediconome').value;
  }

  function pesquisarmedico() {
    apagartabela();
    $.ajax({
      type: "GET",
      url: "/consulta/medico/dados",
      data: {
        cpf: document.getElementById('pesquisarmedicocpf').value,
        nomemedico: document.getElementById('pesquisarmediconome').value,
        crnmedico: document.getElementById('pesquisarmedicocrn').value,
        especmedico: document.getElementById('pesquisarmedicoespec').value
      },
      dataType: "json",
      success: function(data) {
        document.getElementById('tabela').style.display = 'block';
        for (i = 0; i < data.length; i++) {
          var tabela = document.getElementById('medicotablebody');
          var numeroLinhas = tabela.rows.length;
          var linha = tabela.insertRow(numeroLinhas);
          var celula1 = linha.insertCell(0);
          var celula2 = linha.insertCell(1);
          var celula3 = linha.insertCell(2);
          var celula4 = linha.insertCell(3);
          var celula5 = linha.insertCell(4);
          dadoslinhas.push(data[i][0]);
          celula1.innerHTML = data[i][0];
          celula2.innerHTML = data[i][2];
          celula3.innerHTML = data[i][3];
          celula4.innerHTML = data[i][4];
          if(permissaoeditarexcluir == 1){
            celula5.innerHTML = "<select id='selectmedico" + i + "' name='selectmedico" + i + "' class='form-select selectacoes' aria-label='Default select example' onchange='acoes(this)'><option value=''>Ações</option><option value='editar'>Editar</option><option value='excluir'>Excluir</option></select>";
          }else{
            celula5.innerHTML = "<select id='selectmedico" + i + "' name='selectmedico" + i + "' class='form-select selectacoes' aria-label='Default select example' onchange='acoes(this)'><option value=''>Ações</option><option value='editar'>Editar</option></select>";
          }
          

        }
      }
    });
  }

  function editar(linha) {
    linha = parseInt(linha);
    $.ajax({
      type: 'GET',
      url: 'medico/dadosedit',
      data: {
        cpf: dadoslinhas[linha]
      },
      dataType: "json",
      success: function(data) {
        cpfatual = dadoslinhas[linha];
        esconder(data[0]);
      }
    });
  }

  function apagartabela() {
    var tableHeaderRowCount = 1;
    var table = document.getElementById('pesquisarmedicotable');
    var rowCount = table.rows.length;
    for (var i = tableHeaderRowCount; i < rowCount; i++) {
      table.deleteRow(tableHeaderRowCount);
    }
    reset();
  }

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

  function salario() {
    if (document.getElementById('salarioinput').value[10] = '_') {
      $('#salarioinput').inputmask('R$9.999,99');
    } else {
      $('#salarioinput').inputmask('R$[9]9.999,99');
    }
  }

  function reset() {
    $('.input').css('display', 'none');
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

  }

  function esconder(dados) {
    escondertabela();
    preencherSelects();
    consespec();
    document.getElementById('editar').style.display = 'block';
    document.getElementById('nomesblocos').style.display = 'block';
    document.getElementById('nomesblocos1').style.display = 'block';
    document.getElementById('nomesblocos2').style.display = 'block';
    document.getElementById('nomesblocos3').style.display = 'block';
    document.getElementById('titulo').style.display = 'block';

    document.getElementById('crn').style.display = 'block';
    document.getElementById('cpf').style.display = 'block';
    document.getElementById('nome').style.display = 'block';
    document.getElementById('datanasc').style.display = 'block';
    document.getElementById('cep').style.display = 'block';
    document.getElementById('rg').style.display = 'block';
    document.getElementById('logradouro').style.display = 'block';
    document.getElementById('num').style.display = 'block';
    document.getElementById('complemento').style.display = 'block';
    document.getElementById('bairro').style.display = 'block';
    document.getElementById('cidade').style.display = 'block';
    document.getElementById('uf').style.display = 'block';
    document.getElementById('celular').style.display = 'block';
    document.getElementById('tel1').style.display = 'block';
    document.getElementById('tel2').style.display = 'block';
    document.getElementById('email').style.display = 'block';
    document.getElementById('estadocivil').style.display = 'block';
    document.getElementById('sexo').style.display = 'block';
    document.getElementById('comissao').style.display = 'block';
    document.getElementById('pagamento').style.display = 'block';
    document.getElementById('espec').style.display = 'block';
    document.getElementById('especselect2').style.display = 'block';
    document.getElementById('tabelaagenda').style.display = 'block';
    document.getElementById('status').style.display = 'block';
    document.getElementById('servicheckbox').style.display = 'block';
    document.getElementById('tempoconsulta').style.display = 'block';
    document.getElementById('maximoatendimento').style.display = 'block';
    document.getElementById('maximoretorno').style.display = 'block';
    document.getElementById('user_name').style.display = 'block';
    document.getElementById('user_senha').style.display = 'block';
    document.getElementById('agendabotao').style.display = 'block';

    if(dados['med_crn'] != null){
      document.querySelector("[name='crn']").value = dados['med_crn'];
    }
    document.querySelector("[name='cpf']").value = dados['med_cpfcnpj'];
    document.querySelector("[name='nome']").value = dados['med_nome'];
    if(dados['med_datanasc'] != null){
      document.querySelector("[name='datanasc']").value = dados['med_datanasc'];
    }
    
    if (dados['med_cep'] != null) {
      document.querySelector("[name='cep']").value = dados['med_cep'];
    }
    if (dados['med_rg'] != null) {
      document.querySelector("[name='rg']").value = dados['med_rg'];
    }
    document.querySelector("[name='logradouro']").value = dados['med_logradouro'];
    document.querySelector("[name='num']").value = dados['med_num'];
    document.querySelector("[name='complemento']").value = dados['med_complemento'];
    document.querySelector("[name='bairro']").value = dados['med_bairro'];
    document.querySelector("[name='cidade']").value = dados['med_cidade'];
    document.querySelector("[name='uf']").value = dados['med_uf'];
    if (dados['med_celular'] != null) {
      document.querySelector("[name='celular']").value = dados['med_celular'];
    }
    document.querySelector("[name='tel1']").value = dados['med_tel1'];
    if (dados['med_tel2'] != null) {
      document.querySelector("[name='tel2']").value = dados['med_tel2'];
    }
    document.querySelector("[name='email']").value = dados['med_email'];
    document.querySelector("[name='estadocivil']").value = dados['med_estadocivil'];
    document.querySelector("[name='sexo']").value = dados['med_sexo'];
    document.querySelector("[name='comissao']").value = dados['med_comissao'];
    document.querySelector("[name='pagamento']").value = dados['med_diapag'];
    document.querySelector("[name='status']").value = dados['med_status'];
    document.querySelector("[name='maximoretorno']").value = dados['med_maxret'];
    document.querySelector("[name='maximoatendimento']").value = dados['med_maxaten'];
    $.ajax({
      type: "GET",
      url: "/consultamedicousuario",
      data: {
        med: dados['med_id']
      },
      dataType: "json",
      success: function(data) {
        document.querySelector("[name='user_name']").value = data[0];
      }
    });
    preencherAgenda(dados['med_id']);
    setTimeout(function() {
      document.querySelector("[name='espec']").value = dados['med_espec'].split(',')[0];
      document.querySelector("[name='espec2']").value = dados['med_espec'].split(',')[1];
      filtservi();
    }, 500);
    setTimeout(function() {
      preencherServi(dados['med_servi'])
    }, 1000);

    if(permissaoeditarexcluir == 1){
      $('[name="crn"]').prop( "disabled", false );
      $('[name="cpf"]').prop( "disabled", false );
      $('[name="nome"]').prop( "disabled", false );
      $('[name="datanasc"]').prop( "disabled", false );
      $('[name="cep"]').prop( "disabled", false );
      $('[name="rg"]').prop( "disabled", false );
      $('[name="logradouro"]').prop( "disabled", false );
      $('[name="num"]').prop( "disabled", false );
      $('[name="complemento"]').prop( "disabled", false );
      $('[name="bairro"]').prop( "disabled", false );
      $('[name="cidade"]').prop( "disabled", false );
      $('[name="uf"]').prop( "disabled", false );
      $('[name="celular"]').prop( "disabled", false );
      $('[name="tel1"]').prop( "disabled", false );
      $('[name="tel2"]').prop( "disabled", false );
      $('[name="email"]').prop( "disabled", false );
      $('[name="estadocivil"]').prop( "disabled", false );
      $('[name="sexo"]').prop( "disabled", false );
      $('[name="comissao"]').prop( "disabled", false );
      $('[name="pagamento"]').prop( "disabled", false );
      $('[name="espec"]').prop( "disabled", false );
      $('[name="espec2"]').prop( "disabled", false );
      $('[name="tabelaagenda"]').prop( "disabled", false );
      $('[name="status"]').prop( "disabled", false );
      $('[name="servicheckbox"]').prop( "disabled", false );
      $('[name="tempoconsulta"]').prop( "disabled", false );
      $('[name="maximoatendimento"]').prop( "disabled", false );
      $('[name="maximoretorno"]').prop( "disabled", false );
      $('[name="user_name"]').prop( "disabled", false );
      $('[name="user_senha"]').prop( "disabled", false );
      $('[name="agendabotao"]').prop( "disabled", false );
      $('[name="servicosofertados"]').prop( "disabled", false );
      $('[name="especnovobutton"]').prop( "disabled", false );
      $('[name="editarmedico"]').prop( "disabled", false );
    }else{
      $('[name="crn"]').prop( "disabled", true );
      $('[name="cpf"]').prop( "disabled", true );
      $('[name="nome"]').prop( "disabled", true );
      $('[name="datanasc"]').prop( "disabled", true );
      $('[name="cep"]').prop( "disabled", true );
      $('[name="rg"]').prop( "disabled", true );
      $('[name="logradouro"]').prop( "disabled", true );
      $('[name="num"]').prop( "disabled", true );
      $('[name="complemento"]').prop( "disabled", true );
      $('[name="bairro"]').prop( "disabled", true );
      $('[name="cidade"]').prop( "disabled", true );
      $('[name="uf"]').prop( "disabled", true );
      $('[name="celular"]').prop( "disabled", true );
      $('[name="tel1"]').prop( "disabled", true );
      $('[name="tel2"]').prop( "disabled", true );
      $('[name="email"]').prop( "disabled", true );
      $('[name="estadocivil"]').prop( "disabled", true );
      $('[name="sexo"]').prop( "disabled", true );
      $('[name="comissao"]').prop( "disabled", true );
      $('[name="pagamento"]').prop( "disabled", true );
      $('[name="espec"]').prop( "disabled", true );
      $('[name="espec2"]').prop( "disabled", true );
      $('[name="tabelaagenda"]').prop( "disabled", true );
      $('[name="status"]').prop( "disabled", true );
      $('[name="servicheckbox"]').prop( "disabled", true );
      $('[name="tempoconsulta"]').prop( "disabled", true );
      $('[name="maximoatendimento"]').prop( "disabled", true );
      $('[name="maximoretorno"]').prop( "disabled", true );
      $('[name="user_name"]').prop( "disabled", true );
      $('[name="user_senha"]').prop( "disabled", true );
      $('[name="agendabotao"]').prop( "disabled", true );
      $('[name="servicosofertados"]').prop( "disabled", true );
      $('[name="especnovobutton"]').prop( "disabled", true );
      $('[name="editarmedico"]').prop( "disabled", true );
    }
  }

  function preencherServi(dados) {
    dados = dados.split(',');
    for (var i = 0; i < dados.length; i++) {
      var nome = 'servibox' + dados[i];
      $("[name='" + nome + "']").attr('checked', true);
    }
  }

  function preencherAgenda(id) {
    $.ajax({
      type: "GET",
      url: "/consulta/medico/agenda",
      data: {
        med_id: id,
      },
      dataType: "json",
      success: function(data) {
        var dias = ['medat_domingo', 'medat_segunda', 'medat_terca', 'medat_quarta', 'medat_quinta', 'medat_sexta', 'medat_sabado'];
        for (var i = 0; i < dias.length; i++) {
          // console.log(data[0]);
          if (data[0][dias[i]]) {
            var horas = data[0][dias[i]].split(' - ');
            document.getElementById(dias[i].substr(6) + 'select1').value = horas[0];
            document.getElementById(dias[i].substr(6) + 'select2').value = horas[1];
          } else {
            $("[name='" + dias[i].substr(6) + "checkbox']").attr('checked', false);
          }
        }
        document.getElementById('tempoconsultainput').value = data[0]['medat_tempoconsulta'];
      }
    });
  }

  function agendaMedico() {
    $('#agendamedicoModal').modal('show');
    var mesatual = new Date().getMonth();
    var anoatual = new Date().getFullYear();
    var ultimodia = new Date(anoatual, mesatual + 1, 0).toLocaleDateString().split('/');
    var ultimodia2 = ultimodia[2] + "-" + ultimodia[1] + "-" + ultimodia[0]
    var diaatual = anoatual + "-" + String((mesatual + 1)).padStart(2, '0') + "-" + String(new Date().getDate()).padStart(2, '0');
    // console.log(ultimodia2, diaatual);

    document.getElementById('intervalo1').value = diaatual;
    document.getElementById('intervalo2').value = ultimodia2;
    listagendamedico();
  }

  function novaagendamedico() {
    $('#novaagendamedicoModal').modal('show');
  }

  function editagendamedico(idagenda) {
    idagendamedicoatual = idagenda;
    console.log(idagendamedicoatual, horariosmedico);
    var indexdados = idagendamedico.indexOf(idagenda);
    var horarios = horariosmedico[indexdados].split('-');

    document.getElementById('personalizaredit').checked = true;

    document.getElementById('inicioagendamedicoedit').disabled = false;
    document.getElementById('fimagendamedicoedit').disabled = false;

    document.getElementById('datanovaagendas1edit').value = datamedico[indexdados];
    document.getElementById('inicioagendamedicoedit').value = horarios[0];
    document.getElementById('fimagendamedicoedit').value = horarios[1];

    // $('#novaagendamedicoModal').modal('hide');
    $('#editagendamedicoModal').modal('show');
  }

  function excluiragendamedico(idagenda) {
    document.getElementById('erroagendamedico').innerHTML = '';
    idagendamedicoexcluir = [];
    for (var i = 0; i < idagendamedico.length; i++) {
      if (document.getElementById('checkboxagendamedico' + idagendamedico[i]).checked == true) {
        idagendamedicoexcluir.push(idagendamedico[i]);
      }
    }

    if (idagendamedicoexcluir.length != 0) {
      $('#excluiragendamedicoModal').modal('show');
    } else {
      document.getElementById('erroagendamedico').innerHTML = 'Nenhum horário selecionado para excluir!';
    }
  }

  function datanovaagenda() {
    document.getElementById('previewhorario').innerHTML = '';
    var dt = new Date(document.getElementById('datanovaagendas1').value);
    switch (dt.getDay()) {
      case 0:
        var diaextenso = 'segunda';
        break;

      case 1:
        var diaextenso = 'terca';
        break;

      case 2:
        var diaextenso = 'quarta';
        break;

      case 3:
        var diaextenso = 'quinta';
        break;

      case 4:
        var diaextenso = 'sexta';
        break;

      case 5:
        var diaextenso = 'sabado';
        break;

      case 6:
        var diaextenso = 'domingo';
        break;
    }

    if (document.getElementById(diaextenso + 'checkbox').checked == true) {
      if (document.getElementById('integral').checked == true) {

        document.getElementById('inicioagendamedico').disabled = true;
        document.getElementById('fimagendamedico').disabled = true;

        document.getElementById('inicioagendamedico').value = document.getElementById(diaextenso + 'select1').value;
        document.getElementById('fimagendamedico').value = document.getElementById(diaextenso + 'select2').value;

      } else {

        document.getElementById('personalizar').checked = true;

        document.getElementById('inicioagendamedico').disabled = false;
        document.getElementById('fimagendamedico').disabled = false;

        document.getElementById('inicioagendamedico').value = document.getElementById(diaextenso + 'select1').value;
        document.getElementById('fimagendamedico').value = document.getElementById(diaextenso + 'select2').value

      }
    } else {

      document.getElementById('integral').checked = false;
      document.getElementById('personalizar').checked = false;

      document.getElementById('inicioagendamedico').disabled = true;
      document.getElementById('fimagendamedico').disabled = true;

      document.getElementById('inicioagendamedico').value = '';
      document.getElementById('fimagendamedico').value = '';

      document.getElementById('previewhorario').innerHTML = 'Data inválida - Dia não registrado';

    }

  }

  function datanovaagendaedit() {
    document.getElementById('previewhorarioedit').innerHTML = '';
    var dt = new Date(document.getElementById('datanovaagendas1edit').value);
    switch (dt.getDay()) {
      case 0:
        var diaextenso = 'segunda';
        break;

      case 1:
        var diaextenso = 'terca';
        break;

      case 2:
        var diaextenso = 'quarta';
        break;

      case 3:
        var diaextenso = 'quinta';
        break;

      case 4:
        var diaextenso = 'sexta';
        break;

      case 5:
        var diaextenso = 'sabado';
        break;

      case 6:
        var diaextenso = 'domingo';
        break;
    }

    if (document.getElementById(diaextenso + 'checkbox').checked == true) {
      if (document.getElementById('integraledit').checked == true) {

        document.getElementById('inicioagendamedicoedit').disabled = true;
        document.getElementById('fimagendamedicoedit').disabled = true;

        document.getElementById('inicioagendamedicoedit').value = document.getElementById(diaextenso + 'select1').value;
        document.getElementById('fimagendamedicoedit').value = document.getElementById(diaextenso + 'select2').value;

      }  else {

        document.getElementById('personalizaredit').checked = true;

        document.getElementById('inicioagendamedicoedit').disabled = false;
        document.getElementById('fimagendamedicoedit').disabled = false;

        document.getElementById('inicioagendamedicoedit').value = document.getElementById(diaextenso + 'select1').value;
        document.getElementById('fimagendamedicoedit').value = document.getElementById(diaextenso + 'select2').value

      }
    } else {

      document.getElementById('integraledit').checked = false;
      document.getElementById('personalizaredit').checked = false;

      document.getElementById('inicioagendamedicoedit').disabled = true;
      document.getElementById('fimagendamedicoedit').disabled = true;

      document.getElementById('inicioagendamedicoedit').value = '';
      document.getElementById('fimagendamedicoedit').value = '';

      document.getElementById('previewhorarioedit').innerHTML = 'Data inválida - Dia não registrado';

    }

  }

  function novohorarioConfirm() {
    if (document.getElementById('inicioagendamedico').value != '' && document.getElementById('fimagendamedico').value != '') {
      $.ajax({
        type: "GET",
        url: "/cadastro/novohorariomedico",
        data: {
          cpfatual: cpfatual,
          datamedico: document.getElementById('datanovaagendas1').value,
          inicioagendamedico: document.getElementById('inicioagendamedico').value,
          fimagendamedico: document.getElementById('fimagendamedico').value
        },
        dataType: "json",
        success: function(data) {
          $('#novaagendamedicoModal').modal('hide');
          listagendamedico();
        }
      });
    } else {
      document.getElementById('previewhorario').innerHTML = 'Início e/ou Fim do(s) horário(s) não preenchido(s)';
    }

  }

  function edithorarioConfirm() {
    if (document.getElementById('inicioagendamedicoedit').value != '' && document.getElementById('fimagendamedicoedit').value != '') {
      $.ajax({
        type: "GET",
        url: "/editar/edithorariomedico",
        data: {
          idagendamedicoatual: idagendamedicoatual,
          datamedico: document.getElementById('datanovaagendas1edit').value,
          inicioagendamedico: document.getElementById('inicioagendamedicoedit').value,
          fimagendamedico: document.getElementById('fimagendamedicoedit').value
        },
        dataType: "json",
        success: function(data) {
          $('#editagendamedicoModal').modal('hide');
          listagendamedico();
        }
      });
    } else {
      document.getElementById('previewhorarioedit').innerHTML = 'Início e/ou Fim do(s) horário(s) não preenchido(s)';
    }

  }

  function excluirhorarioConfirm() {
    $.ajax({
      type: "GET",
      url: "/apagar/excluirhorariomedico",
      data: {
        idagendamedicoexcluir: idagendamedicoexcluir,
      },
      dataType: "json",
      success: function(data) {
        $('#excluiragendamedicoModal').modal('hide');
        listagendamedico();
      }
    });

  }

  function listagendamedico() {
    idagendamedico = [];
    datamedico = [];
    horariosmedico = [];
    apagartabelaagendamedico();
    $.ajax({
      type: "GET",
      url: "/consulta/listagendamedico",
      data: {
        cpfatual: cpfatual,
        datainicio: document.getElementById('intervalo1').value,
        datafim: document.getElementById('intervalo2').value
      },
      dataType: "json",
      success: function(data) {
        console.log(data);
        for (i = 0; i < data.length; i++) {
          var tabela = document.getElementById('agendamedicotablebody');
          var numeroLinhas = tabela.rows.length;
          var linha = tabela.insertRow(numeroLinhas);
          var celula1 = linha.insertCell(0);
          var celula2 = linha.insertCell(1);
          var celula3 = linha.insertCell(2);
          var celula4 = linha.insertCell(3);
          idagendamedico.push(data[i]['idagendamedico']);
          datamedico.push(data[i]['datamedico']);
          horariosmedico.push(data[i]['horariosmedico']);
          celula1.innerHTML = "<input type='checkbox' name='checkboxagendamedico" + data[i]['idagendamedico'] + "' id='checkboxagendamedico" + data[i]['idagendamedico'] + "'>";

          var datacelula = data[i]['datamedico'].split('-');
          datacelula = datacelula[2] + '/' + datacelula[1] + '/' + datacelula[0];

          celula2.innerHTML = datacelula;
          celula3.innerHTML = data[i]['horariosmedico'];
          celula4.innerHTML = "<button type='submit' class='btn border border-secondary corbtedit' name='editaragendamedico' id='editaragendamedico' value='Editar' onclick='editagendamedico(" + data[i]['idagendamedico'] + ")' data-bs-target='#editagendamedicoModal' data-bs-toggle='modal' data-bs-dismiss='modal'><span class='fontebotao edit'>Editar</span></button>" ;

        }
      }
    });
  }

  function apagartabelaagendamedico() {
    var tableHeaderRowCount = 0;
    var table = document.getElementById('agendamedicotablebody');
    var rowCount = table.rows.length;
    for (var i = tableHeaderRowCount; i < rowCount; i++) {
      table.deleteRow(tableHeaderRowCount);
    }
  }

  function editarMedico() {
    for (var o = 0; o < serviar.length; o++) {
      var sla = 'servibox' + serviar[o];
      if ($("[name='" + sla + "']").prop('checked') == true) {
        serviaresc.push($("[name='" + sla + "']").val());
      }
    }
    var especatuais = $("[name='espec']").val() + ',' + $("[name='espec2']").val();
    $.ajax({
      type: "GET",
      url: "/editar/editarmedico",
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
        user_name: $("[name='user_name']").val(),
        user_senha: $("[name='user_senha']").val(),
        user_tipo: 3,
      },
      dataType: "json",
      success: function(data) {
        $('#exampleModal1').modal('show');
        console.log('Medico editado com sucesso');
      }
    });
    serviaresc = [];
  }
</script>
@endsection

</html>