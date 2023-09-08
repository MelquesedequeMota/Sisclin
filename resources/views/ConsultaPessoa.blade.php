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
  <meta http-equiv="cache-control" content="max-age=0" />
  <meta http-equiv="cache-control" content="no-cache" />
  <meta http-equiv="expires" content="0" />
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

  <title>Pesquisa Pessoa</title>
  <style>
    /* body{
      background: #f9f9f9;
    }

    .form-control{
      background-color:transparent;
    } */

    .container-fluid{
      padding-left:0rem!important;
      margin-top:3.5rem!important;
    }

    .destaquegrupos{
        background: #FFFFFF;
        box-shadow: 0px 1px 10px rgba(0, 0, 0, 0.14);
        border-radius: 9px;
    }

    .titulogrupos{
        background: #E4E2E2;
        border-top-left-radius: 9px;
        border-top-right-radius: 9px;
        padding: 1rem;
    }

    .distanciainterna{
        padding:0rem 1.5rem 3rem 1.5rem;
    }

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
      /* min-width: 30rem!important; */
      /* width: auto!important;
      max-width:23vw;
      word-wrap: break-word; */
      position: absolute!important;
      /* bottom:8rem!important; */
    }

    .nav_tabs {
      height: 400px;
      background-color: transparent;
      position: relative;
    }

    .nav_tabs ul {
      list-style: none;
    }

    ol,
    ul {
      padding: 0 !important;
    }

    .nav_tabs ul li {
      float: left;
    }

    .tab_label {
      display: block;
      width: 17rem;
      font-size: 14px;
      color: #000;
      cursor: pointer;
      text-align: center;
      border-bottom: 1px solid gray;
    }

    .nav_tabs .rd_tab {
      display: none;
      position: absolute;
    }

    .nav_tabs .rd_tab:checked~label {
      color: #000;
      border-bottom: 2px solid blue;
    }

    .tab-content {
      /* border-top: solid 1px rgb(167, 166, 166); */
      width: 100%;
      display: none;
      position: absolute;
      height: 320px;
      left: 0;
    }

    .rd_tab:checked~.tab-content {
      display: block;
    }

    .tab-content h5 {
      padding: 10px;
    }

    .tab-content article {
      padding: 10px;
      color: #555;
    }

    .wrapper {
      max-height: 120px;
      display: flex;
      overflow: hidden;
      overflow-x: auto;
      white-space: nowrap;
      width: 72rem;
      /* margin-left: 2rem; */
    }

    .wrapper .itemm {
      /* min-width: 15rem; */
      height: 40px;
      /* text-align: center; */
      /* background-color: #ddd; */
      /* margin-right: 10px; */
      display: flex;
      justify-content: space-evenly;
      align-items: center;
      border-radius: 5px;
    }

    .wrapper::-webkit-scrollbar {
      width: 16px;
      display: none;
    }

    .divate {
    margin-top: 5.7rem !important;
    width: max-content !important;
    }

    .inputdist {
    margin-left: 1rem;
    }

    .form-floating>.form-control:focus,
    .form-floating>.form-control:not(:placeholder-shown) {
      padding-top: 3rem;
      padding-bottom: 0.3rem;
      background-color:transparent;
    }

    /* @media (min-width:576px) and (max-width:991px){
      .ui-menu{
        width:38vw!important;
        max-width:38vw;
      }
    } */

    /* @media (max-width: 575px){
      .ui-menu{
        width:85vw!important;
        max-width:85vw;
      }
    } */

    /* @media (max-width: 600px){
      .wrapper {
        width: 30rem;
      }
    } */

    .arquivo {
      display: none;
    }
    .file {
      line-height: 30px;
      height: 30px;
      border: 1px solid #A7A7A7;
      padding: 5px;
      box-sizing: border-box;
      font-size: 15px;
      vertical-align: middle;
      width: 300px;
    }
    .btnY {
      border: none;
      box-sizing: border-box;
      padding: 2px 10px;
      background-color: #4493c7;
      color: #FFF;
      /* height: 32px; */
      font-size: 15px;
      vertical-align: middle;
    }
  </style>
</head>

<body>
  @section('Conteudo')
  <div class="container-fluid" style='margin-top:0rem!important;'>
    <div class="tituloprincipal">Pesquisa Pessoa</div>
  </div>
    <br>
  <div class="container-fluid" style=''>
    <div class="row gx-3 gy-3">
      <div class="col-sm-5 col-md-5 col-lg-4" style='position: relative!important;'>
        <div class="cor01">
          <label for="pesquisarpessoanome" class="form-label">Nome</label>
          <input type="text" class="form-control" aria-describedby="emailHelp" name='pesquisarpessoanome' id='pesquisarpessoanome' style='width:100%;'/>
        </div>
      </div>
      <div class="col-sm-5 col-md-3 col-lg-4 divexternaespec">
        <div class="cor01">
          <label for="pesquisarpessoacpfcnpj" class="form-label">CPF ou CNPJ</label>
          <div class="direction">
            <div class='mb-2'>
              <input type="text" class="form-control" aria-describedby="emailHelp" name='pesquisarpessoacpfcnpj' id='pesquisarpessoacpfcnpj' />
            </div>
            <div class='btnovaespec'>
              <button type="submit" class="btn btamarelo" value='Pesquisar' onclick='pesquisarpessoa()'>
                <span class="selectacoes" style='font-size:17px'>Pesquisar</span>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container-fluid" style='margin-top:3.2rem;'>
    <div class="row gx-3 gy-3">
      <div class="" id=''>
        <div class="">
          <div id='tabela' class="table-responsive-sm">
            <table id='pesquisarpessoatable' class="table">
              <thead class="table-active">
                <tr>
                  <td scope="col">Nome</td>
                  <td scope="col">CPF/CNPJ</td>
                  <td scope="col">Telefone de Contato</td>
                  <td scope="col">Tipo de Pessoa</td>
                  <td scope="col">Ações</td>
                </tr>
              </thead>
              <tbody id='pessoatablebody'>

              </tbody>
            </table>
            {{-- <div id='paginasatuais'></div> --}}
          </div> 
        </div>
      </div>
    </div>
  </div>

  <div class="container-fluid" style='margin-top:1rem;'>
    <div class="input divconteudo" id='divconteudo'>
      <div class="" style='margin-top: 1rem;'>
        <nav class="nav_tabs">
          <ul style='display:flex;align-items:center'>
            <div>
              <li style='margin-right:4rem'>
                <h3>Dados</h5>
              </li>
            </div>
            <div class='wrapper' id="elementos">
              <div class='itemm'>
                <li>
                  <input type="radio" name="tabs" class="rd_tab" id="tab1" checked />
                  <label for="tab1" class="tab_label">Informações Pessoais</label>
                  <div class="tab-content">
                    <div class='input tituloeditar' id="titulo" style='margin-bottom:1rem'></div>

                    <div class="container-fluid" style='margin-top:1rem;'>
                      <div class='input destaquegrupos' id='destaquegrupos'>
                          <div class='input nomesblocos titulogrupos' id='nomesblocos'>
                              <span>Informações Pessoais</span>
                          </div>
                          <div class="row gx-3 gy-3 distanciainterna">
                              <div class="col-sm-5 col-md-4 col-lg-4 input" id='nome'>
                                  <div class="cor01">
                                      <label for="exampleInputEmail1" class="form-label">Nome<span style="color: red;">*</span></label>
                                      <input
                                      type="text"
                                      class="form-control"
                                      aria-describedby="emailHelp"
                                      name='nome'/>
                                  </div>
                              </div>
                              <div class="col-sm-3 col-md-2 col-lg-2">
                                  <div class="input cor01" id='cpf'>
                                      <label for="exampleInputEmail1" class="form-label">CPF<span style="color: red;">*</span></label>
                                      <input
                                      type="text"
                                      class="form-control"
                                      aria-describedby="emailHelp"
                                      name='cpf' 
                                      onfocusout='checarcpf()'
                                      data-inputmask="'mask': '999.999.999-99'"/>
                                  </div>

                                  <div class="input cor01" id='cnpj'>
                                      <label for="exampleInputEmail1" class="form-label">CNPJ<span style="color: red;">*</span></label>
                                      <input
                                      type="text"
                                      class="form-control"
                                      aria-describedby="emailHelp"
                                      name='cnpj' 
                                      data-inputmask="'mask': '99.999.999/9999-99'"/>
                                  </div>
                              </div>
                              <div class="col-sm-3 col-md-2 col-lg-2 input" id='rg'>
                                  <div class="cor01">
                                      <label for="exampleInputEmail1" class="form-label">RG</label>
                                      <input 
                                      type="text"
                                      class="form-control"
                                      aria-describedby="emailHelp"
                                      name='rg' 
                                      data-inputmask="'mask': '9999999999-9'"/>
                                  </div>
                              </div>
                              <div class="col-sm-3 col-md-2 col-lg-2 input" id='estadocivil'>
                                  <div class="cor01">
                                      <label for="exampleInputEmail1" class="form-label"
                                      >Estado Civil<span style="color: red;">*</span></label
                                      >
                                      <select class="form-select" name="estadocivil">
                                          <option value="solt">Solteiro(a)</option>
                                          <option value="cas">Casado(a)</option>
                                          <option value="div">Divorciado(a)</option>
                                          <option value="n">Não Informado</option>
                                      </select>
                                  </div>
                              </div>
                              <div class="col-sm-3 col-md-2 col-lg-2 input" id='sexo'>
                                  <div class="cor01">
                                      <label for="exampleInputEmail1" class="form-label">Sexo<span style="color: red;">*</span></label>
                                      <select class="form-select" name="sexo">
                                          <option value="M">Masculino</option>
                                          <option value="F">Feminino</option>
                                          <option value="N">Não Declarado</option>
                                      </select>
                                  </div>
                              </div>
                              <div class="col-sm-3 col-md-3 col-lg-2 input" id='contatorep2'>
                                  <div class="cor01">
                                      <label for="exampleInputEmail1" class="form-label">Tel. do Contato</label>
                                      <input
                                      type="text"
                                      class="form-control"
                                      aria-describedby="emailHelp"
                                      name='contatorep2' 
                                      id='contatorepinput2' 
                                      onkeypress='contatorep()'/>
                                  </div>
                              </div>
                              <div class="col-sm-5 col-md-4 col-lg-4 input" id='email'>
                                  <div class="cor01">
                                      <label for="exampleInputEmail1" class="form-label">Email</label>
                                      <input
                                      type="text"
                                      class="form-control"
                                      aria-describedby="emailHelp"
                                      name='email'/>
                                  </div>
                              </div>
                              <div class="col-sm-3 col-md-2 col-lg-2 input" id='datanasc'>
                                  <div class="cor01">
                                      <label for="exampleInputEmail1" class="form-label"
                                      >Data de Nasc.<span style="color: red;">*</span></label
                                      >
                                      <input type='date' class="form-control" name='datanasc' id='datanasc'>
                                  </div>
                              </div>
                              <div class="col-sm-4 col-md-3 col-lg-3 input" id='prof'>
                                  <div class="cor01">
                                      <label for="exampleInputEmail1" class="form-label">Profissão</label>
                                      <input
                                      type="text"
                                      class="form-control"
                                      aria-describedby="emailHelp"
                                      name='prof'/>
                                  </div>
                              </div>
                          </div>
                      

                          <div class="row gx-3 gy-3 distanciainterna" style="margin-top: 0.1rem">
                              <div class="col-sm-4 col-md-4 col-lg-3 input" id='website2'>
                                  <div class="cor01">
                                      <label for="exampleInputEmail1" class="form-label">WebSite</label>
                                      <input
                                      type="text"
                                      class="form-control"
                                      aria-describedby="emailHelp"
                                      name='website2'/>
                                  </div>
                              </div>
                              <div class="col-sm-4 col-md-3 col-lg-3 input" id='razaosocial2'>
                                  <div class="cor01">
                                      <label for="exampleInputEmail1" class="form-label">Razão Social</label>
                                      <input
                                      type="text"
                                      class="form-control"
                                      aria-describedby="emailHelp"
                                      name='razaosocial2'/>
                                  </div>
                              </div>
                              <div class="col-sm-3 col-md-4 col-lg-3 input" id='areaatuacao2'>
                                  <div class="cor01">
                                      <label for="exampleInputEmail1" class="form-label">Área de Atuação</label>
                                      <input
                                      type="text"
                                      class="form-control"
                                      aria-describedby="emailHelp"
                                      name='areaatuacao2'/>
                                  </div>
                              </div>
                              <div class="col-sm-3 col-md-3 col-lg-2 input" id='inscest2'>
                                  <div class="cor01">
                                      <label for="exampleInputEmail1" class="form-label">Inscrição Estadual</label>
                                      <input
                                      type="text"
                                      class="form-control"
                                      aria-describedby="emailHelp"
                                      name='inscest2' 
                                      data-inputmask="'mask': '99.999.9999-9'"/>
                                  </div>
                              </div>
                              <div class="col-sm-5 col-md-4 col-lg-4 input" id='nomerep2'>
                                  <div class="cor01">
                                      <label for="exampleInputEmail1" class="form-label">Nome da pessoa p/ contato</label>
                                      <input
                                      type="text"
                                      class="form-control"
                                      aria-describedby="emailHelp"
                                      name='nomerep2'/>
                                  </div>
                              </div>
                              <div class="col-sm-5 col-md-4 col-lg-4 input" id='emailrep2'>
                                  <div class="cor01">
                                      <label for="exampleInputEmail1" class="form-label">Email do Contato</label>
                                      <input
                                      type="text"
                                      class="form-control"
                                      aria-describedby="emailHelp"
                                      name='emailrep2'/>
                                  </div>
                              </div>
                          </div>
                      </div>
                    </div>

                    <div class="container-fluid">
                      <div class='input destaquegrupos' id='destaquegrupos1'>
                          <div class='input nomesblocos1 titulogrupos' id='nomesblocos1'>
                              <span>Contatos</span>
                          </div>
                          <div class="row gx-3 gy-3 distanciainterna">
                              <div class="col-sm-3 col-md-2 col-lg-2 input" id='tel1'>
                                  <div class="cor03">
                                      <label for="exampleInputEmail1" class="form-label"
                                      >Telefone 1<span style="color: red;">*</span></label
                                      >
                                      <input
                                      type="text"
                                      class="form-control"
                                      aria-describedby="emailHelp"
                                      name='tel1' 
                                      id='tel1input'  
                                      onkeypress='tel1()'
                                      />
                                  </div>
                              </div>
                              <div class="col-sm-3 col-md-2 col-lg-2 input" id='tel2'>
                                  <div class="cor03">
                                      <label for="exampleInputEmail1" class="form-label">Whatsapp</label>
                                      <input
                                      type="text"
                                      class="form-control"
                                      aria-describedby="emailHelp"
                                      name='tel2' 
                                      id='tel2input'  
                                      onkeypress='tel2()'/>
                                  </div>
                              </div>
                              <div class="col-sm-3 col-md-2 col-lg-2 input" id='celular'>
                                  <div class="cor03">
                                      <label for="exampleInputEmail1" class="form-label">Celular</label>
                                      <input
                                      type="text"
                                      class="form-control"
                                      aria-describedby="emailHelp"
                                      name='celular' 
                                      data-inputmask="'mask': '(99) 99999-9999'"/>
                                  </div>
                              </div>
                              <div class="col-sm-6 col-md-3 col-lg-4 input" id='nomeres'>
                                  <div class='cor03'></div>
                              </div>
                              <div class="col-sm-3 col-md-2 col-lg-2 input" id='telres'>
                                  <div class='cor03'></div>
                              </div>
                          </div>
                      </div>
                    </div>

                    <div class="container-fluid">
                      <div class='input destaquegrupos' id='destaquegrupos2'>
                          <div class='input nomesblocos2 titulogrupos' id='nomesblocos2'>
                              <span>Endereço</span>
                          </div>
                          <div class="row gx-3 gy-3 distanciainterna">
                              <div class="col-sm-2 col-md-2 col-lg-2 input" id='cep'>
                                  <div class="cor04">
                                      <label for="exampleInputEmail1" class="form-label">CEP</label>
                                      <input
                                      type="text"
                                      class="form-control"
                                      aria-describedby="emailHelp"
                                      name='cep' 
                                      id='cepinput' 
                                      onfocusout="pesquisacep(this.value);" 
                                      data-inputmask="'mask': '99999-999'"/>
                                  </div>
                              </div>
                              <div class="col-sm-2 col-md-2 col-lg-2 input" id='uf'>
                                  <div class="cor04">
                                      <label for="exampleInputEmail1" class="form-label">UF<span style="color: red;">*</span></label>
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
                                      <input
                                      type="text"
                                      class="form-control"
                                      aria-describedby="emailHelp"
                                      name='cidade' 
                                      id='cidadeinput'/>
                                  </div>
                              </div>
                              <div class="col-sm-4 col-md-3 col-lg-4 input" id='logradouro'>
                                  <div class="cor04">
                                      <label for="exampleInputEmail1" class="form-label"
                                      >Logradouro</label
                                      >
                                      <input
                                      type="text"
                                      class="form-control"
                                      aria-describedby="emailHelp"
                                      name='logradouro' 
                                      id='logradouroinput'/>
                                  </div>
                              </div>
                                  <div class="col-sm-2 col-md-2 col-lg-2 input" id='num'>
                                  <div class="cor04" >
                                      <label for="exampleInputEmail1" class="form-label">Número</label>
                                      <input
                                      type="text"
                                      class="form-control"
                                      aria-describedby="emailHelp"
                                      name='num' />
                                  </div>
                              </div>
                              <div class="col-sm-4 col-md-3 col-lg-3 input" id='bairro'>
                                  <div class="cor04" >
                                      <label for="exampleInputEmail1" class="form-label">Bairro</label>
                                      <input
                                      type="text"
                                      class="form-control"
                                      aria-describedby="emailHelp"
                                      name='bairro' 
                                      id='bairroinput'/>
                                  </div>
                              </div>
                              <div class="col-sm-4 col-md-3 col-lg-4 input" id='complemento'>
                                  <div class="cor04">
                                      <label for="exampleInputEmail1" class="form-label"
                                      >Complemento</label
                                      >
                                      <input
                                      type="text"
                                      class="form-control"
                                      aria-describedby="emailHelp"
                                      name='complemento'/>
                                  </div>
                              </div>
                          </div>                          
                      </div>
                    </div>

                    <div class="container-fluid">
                      <div class='input destaquegrupos' id='destaquegrupos3'>
                          <div class='input nomesblocos3 titulogrupos' id='nomesblocos3'>
                              <span>Outras Infomações</span>
                          </div>
                          <div class="row gx-3 gy-3 distanciainterna">
                              <div class="col-sm-3 col-md-3 col-lg-2 input" id='dep'>
                                  <div class='cor02'>
                                      <label for="exampleInputEmail1" class="form-label"
                                      >Departamento</label>
                                      <div style="display: flex; flex-direction:column;">
                                          <div class='maxespaco'>
                                              <select name="dep" class="form-select selectcategoria espacototal" id='depselect' onchange='filtset()'>
                                                  <option value=''>---</option>
                                              </select>
                                          </div>
                                          <div class='maxespaco'>
                                              <button type="submit" class="btn btamarelo pdbotao espacototal" id='depnovobutton' value='Novo Departamento' onclick='novodep()' data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                  <span class="selectacoes s02" style="display: flex; flex-direction:row;">
                                                      <img src="../imagens/plus.svg" alt="">
                                                      &nbsp;&nbsp;Novo Depart.
                                                  </span>
                                              </button>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-sm-3 col-md-3 col-lg-2 input" id='setor'>
                                  <div class='cor02'>
                                      <label for="exampleInputEmail1" class="form-label"
                                      >Setor</label>
                                      <div style="display: flex; flex-direction:column;">
                                          <div class='maxespaco'>
                                              <select name="setor" class="form-select selectcategoria espacototal" id='setselect' onchange='filtfunc()'>
                                                  <option value=''>---</option>
                                              </select>
                                          </div>
                                          <div class='maxespaco'>
                                              <button type="submit" class="btn btamarelo pdbotao espacototal" id='setnovobutton' value='Novo Setor' onclick='novoset()' data-bs-toggle="modal" data-bs-target="#exampleModal3">
                                                  <span class="selectacoes s02" style="display: flex; flex-direction:row;">
                                                      <img src="../imagens/plus.svg" alt="">
                                                      &nbsp;&nbsp;Novo Setor
                                                  </span>
                                              </button>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-sm-5 col-md-4 col-lg-3 input" id='func'>
                                  <div class='cor02'>
                                      <label for="exampleInputEmail1" class="form-label"
                                      >Função</label>
                                      <div style="display: flex; flex-direction:column;">
                                          <div class='maxespaco'>
                                              <select name="func" class="form-select selectcategoria espacototal" id='funcselect'>
                                                  <option value=''>---</option>
                                              </select>
                                          </div>
                                          <div class='maxespaco'>
                                              <button type="submit" class="btn btamarelo pdbotao espacototal" id='funcnovobutton' value='Novo Departamento' onclick='novofunc()' data-bs-toggle="modal" data-bs-target="#exampleModal2">
                                                  <span class="selectacoes s02" style="display: flex; flex-direction:row;">
                                                      <img src="../imagens/plus.svg" alt="">
                                                      &nbsp;&nbsp;Nova Função
                                                  </span>
                                              </button>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-sm-3 col-md-2 col-lg-2 input" id='ctps'>
                                  <div class='cor02'>
                                      <label for="exampleInputEmail1" class="form-label"
                                      >CTPS</label
                                      >
                                      <input
                                      type="text"
                                      class="form-control"
                                      aria-describedby="emailHelp"
                                      name='ctps' 
                                      data-inputmask="'mask': '9999999'"/>
                                  </div>
                              </div>
                              <div class="col-sm-3 col-md-2 col-lg-2 input" id='serie'>
                                  <div class='cor02'>
                                      <label for="exampleInputEmail1" class="form-label"
                                      >Série</label
                                      >
                                      <input
                                      type="text"
                                      class="form-control"
                                      aria-describedby="emailHelp"
                                      name='serie' 
                                      data-inputmask="'mask': '999-9'"/>
                                  </div>
                              </div>
                              <div class="col-sm-2 col-md-2 col-lg-2 input"  id='ufctps'>
                                  <div class='cor02'>
                                      <label for="exampleInputEmail1" class="form-label"
                                      >UF</label
                                      >
                                      <select name="ufctps" class="form-select">
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
                              <div class="col-sm-3 col-md-2 col-lg-2 input" id='pis'>
                                  <div class='cor02'>
                                      <label for="exampleInputEmail1" class="form-label"
                                      >PIS</label
                                      >
                                      <input
                                      type="text"
                                      class="form-control"
                                      aria-describedby="emailHelp"
                                      name='pis' 
                                      data-inputmask="'mask': '999.99999.99-9'"/>
                                  </div>
                              </div>
                              <div class="col-sm-3 col-md-2 col-lg-2 input" id='salario'>
                                  <div class='cor02'>
                                      <label for="exampleInputEmail1" class="form-label"
                                      >Salário</label
                                      >
                                      <input
                                      type="text"
                                      class="form-control"
                                      aria-describedby="emailHelp"
                                      name='salario' 
                                      id='salarioinput'
                                      />
                                  </div>
                              </div>
                              <div class="col-sm-4 col-md-3 col-lg-5 input" id='conjugue'>
                                  <div class='cor02'>
                                      <label for="exampleInputEmail1" class="form-label"
                                      >Cônjuge</label
                                      >
                                      <input
                                      type="text"
                                      class="form-control"
                                      aria-describedby="emailHelp"
                                      name='conjugue'/>
                                  </div>
                              </div>
                              <div class="col-sm-4 col-md-3 col-lg-4 input" id='pai'>
                                  <div class='cor02'>
                                      <label for="exampleInputEmail1" class="form-label"
                                      >Pai</label
                                      >
                                      <input
                                      type="text"
                                      class="form-control"
                                      aria-describedby="emailHelp"
                                      name='pai'/>
                                  </div>
                              </div>
                              <div class="col-sm-4 col-md-3 col-lg-4 input" id='mae'>
                                  <div class='cor02'>
                                      <label for="exampleInputEmail1" class="form-label"
                                      >Mãe</label
                                      >
                                      <input
                                      type="text"
                                      class="form-control"
                                      aria-describedby="emailHelp"
                                      name='mae'/>
                                  </div>
                              </div>
                              <div class="col-sm-4 col-md-3 col-lg-3">
                                  <div class="input cor02" id='obs'>
                                      <label for="exampleFormControlTextarea1" class="form-label">Observações</label>
                                      <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name='obs'></textarea>
                                  </div>
                              </div>
                              <div class="col-sm-3 col-md-3 col-lg-2 input" id='razaosocial'>
                                  <div class='cor02'>
                                      <label for="exampleInputEmail1" class="form-label"
                                      >Razão Social</label
                                      >
                                      <input
                                      type="text"
                                      class="form-control"
                                      aria-describedby="emailHelp"
                                      name='razaosocial'/>
                                  </div>
                              </div>
                              <div class="col-sm-4 col-md-4 col-lg-3 input" id='website'>
                                  <div class="cor02">
                                      <label for="exampleInputEmail1" class="form-label">WebSite</label>
                                      <input
                                      type="text"
                                      class="form-control"
                                      aria-describedby="emailHelp"
                                      name='website'/>
                                  </div>
                              </div>
                              <div class="col-sm-4 col-md-4 col-lg-2 input" id='areaatuacao'>
                                  <div class='cor02' >
                                      <label for="exampleInputEmail1" class="form-label"
                                      >Área de Atuação</label
                                      >
                                      <input
                                      type="text"
                                      class="form-control"
                                      aria-describedby="emailHelp"
                                      name='areaatuacao'/>
                                  </div>
                              </div>
                              <div class="col-sm-4 col-md-3 col-lg-4 input" id='nomerep'>
                                  <div class='cor02' >
                                      <label for="exampleInputEmail1" class="form-label"
                                      >Nome do Representante (Pessoa p/ contato)</label
                                      >
                                      <input
                                      type="text"
                                      class="form-control"
                                      aria-describedby="emailHelp"
                                      name='nomerep'/>
                                  </div>
                              </div>
                              <div class="col-sm-5 col-md-3 col-lg-4 input" id='emailrep'>
                                  <div class='cor02'>
                                      <label for="exampleInputEmail1" class="form-label"
                                      >Email do Contato</label
                                      >
                                      <input
                                      type="text"
                                      class="form-control"
                                      aria-describedby="emailHelp"
                                      name='emailrep'/>
                                  </div>
                              </div>
                              <div class="col-sm-5 col-md-3 col-lg-2 input" id='contatorep'>
                                  <div class='cor02'>
                                      <label for="exampleInputEmail1" class="form-label"
                                      >Tel. do Contato</label
                                      >
                                      <input
                                      type="text"
                                      class="form-control"
                                      aria-describedby="emailHelp"
                                      name='contatorep'
                                      id='contatorepinput' 
                                      onkeypress='contatorep()'/>
                                  </div>
                              </div>
                              <div class="col-sm-5 col-md-3 col-lg-2 input" id='inscest'>
                                  <div class='cor02'>
                                      <label for="exampleInputEmail1" class="form-label"
                                      >Inscrição Estadual</label
                                      >
                                      <input
                                      type="text"
                                      class="form-control"
                                      aria-describedby="emailHelp"
                                      name='inscest'
                                      data-inputmask="'mask': '99.999.9999-9'"/>
                                  </div>
                              </div>
                          </div>
                      </div>
                    </div>

                    <div class="container-fluid">
                      <div class='input destaquegrupos' id='destaquegrupos4'>
                          <div class='input nomesblocos4 titulogrupos' id='nomesblocos4'>
                              <span>Informações de Login</span>
                          </div>
                          <div class="row gx-3 gy-3 distanciainterna">
                              <div class="col-sm-4 col-md-3 col-lg-3">
                                  <div class='input cor01' id='user_name'>
                                      <label for="exampleInputEmail1" class="form-label"
                                      >Nome de Usuário</label
                                      >
                                      <input
                                      type="text"
                                      class="form-control"
                                      aria-describedby="emailHelp"
                                      name='user_name'/>
                                  </div>
                              </div>
                              <div class="col-sm-3 col-md-3 col-lg-3">
                                  <div class='input cor01' id='user_senha'>
                                      <label for="exampleInputEmail1" class="form-label"
                                      >Senha do Usuário</label
                                      >
                                      <input
                                      type="password"
                                      class="form-control"
                                      aria-describedby="emailHelp"
                                      name='user_senha'/>
                                  </div>
                              </div> 
                              <div class="col-sm-4 col-md-3 col-lg-3">
                                  <div class='input cor01' id='user_tipo'>
                                      <label for="exampleInputEmail1" class="form-label"
                                      >Tipo de usuário</label
                                      >
                                      <select name="user_tipo" class="form-select" id='user_tipo'>
                                          <option selected>Selecione o tipo de Usuário</option>
                                          <option value="1">Colaborador(a)</option>
                                          <option value="2">Administrador(a)</option>
                                      </select>
                                  </div>
                              </div>
                          </div>  
                      </div>
                    </div>

                    <div class="container-fluid" style='margin-top:0.5rem!important;'>
                      <div class="row gx-3 gy-3 distanciainterna">
                        <div class="input col-sm-4 col-md-3 col-lg-2"  id='editar'>
                          <button type="submit" class="btn btn-success" name='editarpessoa' value='Salvar Alterações' id='editarpessoa' onclick='editarPessoa()'>
                            <span class="fontebotao">Salvar Alterações</span>
                          </button>
                        </div>
                        <div class="input col-sm-4 col-md-3 col-lg-3" id='excluir'>
                          <button type="submit" class="btn btdelete" name='excluirpessoa' value='Excluir Pessoa' id='excluirpessoa' onclick='excluirPessoa()'>
                            <span class="fontebotao">Excluir Pessoa</span>
                          </button>
                        </div>
                      </div>
                    </div>

                  </div>
                </li>
              </div>
              
              <!-- <div class='itemm'>
                <li>
                  <input type="radio" name="tabs" class="rd_tab" id="tab2" />
                  <label for="tab2" class="tab_label" style='width: 9rem;'>Prontuário</label>
                  <div class="tab-content">
                    <div id='dadoscliente' style='margin-bottom:2rem;margin-top:2rem'>
                        <div>
                          <div style='display:flex;justify-content: space-between;'>
                            <span class='titulodados'>Dados do cliente</span>
                          </div>
                        </div>

                        <div style='margin-top: 1rem;'>
                          <div class='divdadospaciente'> -->
                            <!-- <img src="../imagens/nome.svg" alt="" class='icones'> -->
                            <!-- &nbsp;
                            <span class='infopacientes'>Nome:&nbsp;&nbsp;</span>
                            <div id='pacienteatual1' class='dados'></div>
                          </div>
                          <div class='divdadospaciente'> -->
                            <!-- <img src="../imagens/idade.svg" alt="" class='icones'> -->
                            <!-- &nbsp;
                            <span class='infopacientes'>Idade:&nbsp;&nbsp;&nbsp;</span>
                            <div id='idadeatual1' class='dados'></div>
                          </div>
                          <div class='divdadospaciente'> -->
                            <!-- <img src="https://img.icons8.com/ios/50/000000/compare-heights.png"/> -->
                            <!-- &nbsp;
                            <span class='infopacientes'>Altura:&nbsp;&nbsp;</span>
                            <div id='alturaatual1' class='dados'>
                              <input type='text' class="form-control tamanhoinput" name='alturaatualinput' id='alturaatualinput' placeholder='Sem Registro' onfocusout='attdadospac()'>
                              <div>m</div>
                            </div>
                          </div>
                          <div class='divdadospaciente'> -->
                            <!-- <img src="../imagens/peso.svg" alt="" class='icones'> -->
                            <!-- &nbsp;
                            <span class='infopacientes'>Peso:&nbsp;&nbsp;&nbsp;&nbsp;</span>
                            <div id='pesoatual1' class='dados'>
                              <input type='text' class="form-control tamanhoinput" name='pesoatualinput' id='pesoatualinput' placeholder='Sem Registro' onfocusout='attdadospac()'>
                              <div>Kg</div>
                            </div>
                          </div>
                          <div class='divdadospaciente'> -->
                            <!-- <img src="../imagens/pa.svg" alt="" class='icones'> -->
                            <!-- &nbsp;
                            <span class='infopacientes'>P.A.:</span>
                            <div id='paatual1' class='dados' style='margin-left: 2rem;'>
                            <input type='text' class="form-control tamanhoinput" name='paatualinput' id='paatualinput' placeholder='Sem Registro' onfocusout='attdadospac()'>
                            <div>mmHg</div>
                          </div>
                          </div>
                          <div class='divdadospaciente'> -->
                            <!-- &nbsp;
                            <span class='infopacientes'>Sangue:&nbsp;&nbsp;&nbsp;</span>
                            <div id='tiposangueatual1' class='dados'>
                              <input type='text' class="form-control tamanhoinput" name='tiposangueatualinput' id='tiposangueatualinput' placeholder='Sem Registro' onfocusout='attdadospac()'>
                            </div>
                          </div>
                        </div>
                      </div>
                    <div id='hpp' style='margin-bottom:1rem'> -->
                      <!-- <button type='submit' name='novohpp' class='btn btbordagreen' id='novohpp' value='Novo HPP' onclick='novohpp()'>
                        <span class='textobtborda'>Novo HPP</span>
                      </button> -->
                      <!-- <div>
                        <h4>Lista HPP:</h4>
                      </div>
                      <div id='hpplista'>
                      </div>
                      <br>
                      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#novohppModal" style='margin-bottom:1rem'>
                        Novo HPP
                      </button>
                    </div>
                    <div id='histfamilia'>
                      <div class="form-floating">
                        <textarea class="form-control" placeholder="Histórico Familiar" id='histfamiliatext' onfocusout='salvarhistfamilia()' style="height: 100px;margin-bottom: 1.5rem;width:47%"></textarea>
                        <label for="histfamiliatext">Histórico Familiar</label>
                      </div>
                    </div>
                    <div id='tratamentos'> -->
                      <!-- <button type='submit' name='novotratamento' class='btn btbordagreen' id='novotratamento' value='Novo Tratamento' onclick='novotratamento()'>
                        <span class='textobtborda'>Novo Tratamento</span>
                      </button> -->
                      <!-- <div id='tratamentoslista'>
                        <h3>Lista Tratamentos</h3>
                      </div>
                      <br>
                      <button class="btn btn-primary" data-bs-target="#novotratamentoModal" data-bs-toggle="modal" data-bs-dismiss="modal">Novo Tratamento</button> -->
                      <!-- <button class="btn btn-primary" data-bs-target="#novohppModal" data-bs-toggle="modal" data-bs-dismiss="modal">Novo HPP</button> -->
                    <!-- </div>
                  </div>
                </li>
              </div> -->

              <div class='itemm'>
                <li>
                  <input type="radio" name="tabs" class="rd_tab" id="tab3" />
                  <label for="tab3" class="tab_label" style='width: 8rem;'>Contrato</label>
                  <div class="tab-content">
                    <div id='contratosdiv'>Contrato</div>
                  </div>
                </li>
              </div>

              <div class='itemm'>
                <li>
                  <input type="radio" name="tabs" class="rd_tab" id="tab4" />
                  <label for="tab4" class="tab_label" style='width: 8rem;'>Agenda</label>
                  <div class="tab-content" style='height:max-content;margin-bottom:3rem'>
                    <div class=''>
                      <div id='diverrointervaloagenda'></div>
                      <div class="row gx-3 gy-3" style=''>
                          <div id='erroagendacliente'></div>
                          <div class="col-sm-4 col-md-4 col-lg-3">
                              <div>
                              <label for="intervalo1" class="form-label">Data inicial</label>
                              <input type="date" class="form-control" name='intervalo1' id='intervalo1'>
                              </div>
                          </div>
                          <div class="col-sm-1 col-md-3 col-lg-2 divate">
                              <div>
                                  <span>até</span>
                              </div>
                          </div>
                          <div class="col-sm-4 col-md-4 col-lg-4">
                              <div>
                                  <label for="intervalo2" class="form-label">Data Final</label>
                                  <div class='direction'>
                                      <div style='width: 100%;'>
                                      <input type="date" class="form-control" name='intervalo2' id='intervalo2'>
                                      </div>
                                      <div class='inputdist'>
                                      <button type='submit' class='btn btamarelo' onclick='listagendacliente()' value='Pesquisar'>
                                          <span class='fontebotao' style='font-size:15px'>Pesquisar</span>
                                      </button>
                                      </div>
                                      <!-- <div class='inputdist'>
                                      <button type='submit' class='btn btdelete' onclick='excluiragendacliente()' value='Excluir'>
                                          <span class='fontebotao' style='font-size:15px'>Excluir</span>
                                      </button>
                                      </div> -->
                                  </div>
                              </div>
                          </div>
                      </div>
                    </div>
                    
                    <div class="" style='margin-top:3.4rem'>
                      <div id='tabelasemagendacliente'>Nenhum agendamento na(s) data(s) especificada(s).</div>
                        <div id='tabelaagendacliente' class="table-responsive-sm" style='margin-bottom:3rem'>
                          <table id='agendaclientetable' class="table">
                            <thead class="table-active">
                              <tr>
                                <td scope="col">Data</td>
                                <td scope="col">Horario</td>
                                <td scope="col">Médico</td>
                                <td scope="col">Contrato</td>
                                <td scope="col">Status</td>
                                <td scope="col">Ações</td>
                              </tr>
                            </thead>
                            <tbody id='agendaclientetablebody'>
                            </tbody>
                          </table>    
                        </div>
                    </div>

                  </div>
                </li>
              </div>
              

              <div class='itemm'>
                <li>
                  <input type="radio" name="tabs" class="rd_tab" id="tab5" />
                  <label for="tab5" class="tab_label" style='width: 8rem;'>Pacotes</label>
                  <div class="tab-content">
                    Pacote de consultas
                  </div>
                </li>
              </div>


              <div class='itemm'>
                <li>
                  <input type="radio" name="tabs" class="rd_tab" id="tab6" />
                  <label for="tab6" class="tab_label" style='width: 9rem;'>Financeiro</label>
                  <div class="tab-content">
                    Financeiro
                  </div>
                </li>
              </div>

              <div class='itemm'>
                <li>
                  <input type="radio" name="tabs" class="rd_tab" id="tab7" />
                  <label for="tab7" class="tab_label" style='width: 10rem;'>Prontuário</label>
                  <div class="tab-content">
                    <div class="container-fluid" style=''>
                      <div class="row gx-3 gy-3">
                        <div class="col-sm-4 col-md-3 col-lg-2" style='position: relative!important;'>
                          <div class="cor01">
                            <label for="dataprontuario" class="form-label">Data do Prontuário</label>
                            <input type="date" class="form-control" aria-describedby="Data do prontuário" name='dataprontuario' id='dataprontuario' style='width:100%;'/>
                          </div>
                        </div>
                        <div class="col-sm-5 col-md-4 col-lg-4" style='position: relative!important;'>
                          <div class="cor01">
                            <label for="dataprontuario" class="form-label">Nome do Médico</label>
                            <select class="form-select">
                              <option selected>...</option>
                              <option value="1">..</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-sm-5 col-md-3 col-lg-3" style='position: relative!important;'>
                          <div class="cor01">
                            <label for="dataprontuario" class="form-label">Especialidade</label>
                            <select class="form-select">
                              <option selected>...</option>
                              <option value="1">..</option>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="container-fluid" style=''>
                      <div class="row gx-3 gy-3">
                        <div class="col-sm-5 col-md-5 col-lg-3" style='position: relative!important;'>
                          <div class="cor01">
                            <!-- <span class="">Enviar a Foto</span><br><br> -->
                            <!-- <button type="submit" class="btn" value='INSERIR FOTO' onclick='' style='background:#164EA3'>
                                <span class="fontebotao" style='font-size:17px'>Inserir Foto</span>
                            </button> -->
                            <div class='' id='input' style='display:flex'> 
                                <!-- <span>TESSTE</span>
                                <label for="ftprontuario" class='labeluploadft'>Enviar arquivo</label>
                                <input type='file' name='ftprontuario' id='ftprontuario'> -->
                                <input type="file" name="arquivo" id="arquivo" class="arquivo">
                                <input type="text" class='form-control' name="file" id="file" class="file" placeholder="Arquivo" readonly="readonly" style='width:20rem;margin-right: 1rem;'>
                                <input type="button" class="btnY btn" value="SELECIONAR">
                            </div>
                            <!-- <input type='button' id='retorno' value='Retorno' onclick='testarremessa()'> -->
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="container-fluid">
                      <div style="margin-bottom: 1rem">
                          <button type="submit" class="btn mb-5" value='Cadastrar Prontuário' id='cadastrarprontuariobutton' onclick='' style='background:#0E6969'>
                              <span class="fontebotao">Cadastrar Prontuário</span>
                          </button>
                      </form>
                    </div>
                  </div>
                </li>
              </div>

              <div class='itemm'>
                <li>
                  <input type="radio" name="tabs" class="rd_tab" id="tab8" />
                  <label for="tab8" class="tab_label" style='width: 10rem;'>Observações</label>
                  <div class="tab-content">
                    Observações sobre a pessoa(ex: n apertar a campanhia)
                  </div>
                </li>
              </div>

              <!-- <div class='itemm'>
                <li>
                  <input type="radio" name="tabs" class="rd_tab" id="tab6" />
                  <label for="tab6" class="tab_label" style='width: 10rem;'>Orçamentos</label>
                  <div class="tab-content">
                    Orçamento de exames
                  </div>
                </li>
              </div> -->
            </div>
          </ul>
        </nav>
      </div>
    </div>
  </div>

  <!-- Modal do Novo Departamento -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Novo Departamento</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class='input' id='depnovo'></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
          <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
        </div>
      </div>
    </div>
  </div>

  <!-- Modal da Nova Função -->
  <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Nova Função</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class='input' id='funcnovo'></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
          <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
        </div>
      </div>
    </div>
  </div>

  <!-- Modal do Novo Setor -->
  <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Novo Setor</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class='input' id='setnovo'></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
          <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
        </div>
      </div>
    </div>
  </div>


  <div class="modal fade" id="exampleModal4" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edição</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div id='pacientecad'>Cliente editado com sucesso</div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Ok</button>
          <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="exampleModal5" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edição</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div id=''>Fornecedor editado com sucesso</div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Ok</button>
          <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="exampleModal6" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edição</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div id=''>Funcionário editado com sucesso</div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Ok</button>
          <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="exampleModal7" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edição</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div id=''>Fornecedor Jurídico editado com sucesso</div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Ok</button>
          <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="exampleModal8" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edição</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div id=''>Cliente Jurídico editado com sucesso</div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Ok</button>
          <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
        </div>
      </div>
    </div>
  </div>

  <!-- <div class="modal fade" id="agendaclienteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Agenda</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
        </div>
      </div>
    </div>
  </div> -->

  <div class="modal fade" id="exameclienteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="exampleModalLabel">Serviços</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div style="display: flex;justify-content: center;margin-bottom: 1.5rem;">
            <div id='erroexamecliente'></div>
            
            <button type="button" class="btn btn-success" onclick='novoexamecliente()'>
              Adicionar
            </button>
            &nbsp;&nbsp;
            <button type='submit' class='btn btdelete' value='Excluir' onclick='excluirexamescliente()'>
              <span class='fontebotao' style='font-size:15px'>Excluir</span>
            </button> 
          </div>
          <div id='semexamecliente' style='text-align:center'>Não existem serviços marcados pra esta Agenda!</div>
          <div id='exameclientetablediv'  style='margin:auto'>
            <table id='exameclientetable' class="table">
              <thead class="table-active">
                <tr>
                  <td scope="col"><input type='checkbox' disabled></td>
                  <td scope="col">Exame</td>
                  <td scope="col">Quantidade</td>
                  <td scope="col">Situação</td>
                </tr>
              </thead>
              <tbody id='exameclientetablebody'>
              </tbody>
            </table>
            <div id='valortotalexamecliente'></div>
          </div>
        </div>
        <div class="modal-footer">
          <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button> -->
          <button type="button" class="btn btn-primary" onclick='salvarexamecliente()'>Salvar</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="excluiragendaclienteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Excluir Agenda</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Tem certeza que deseja excluir essa agenda?
        </div>
        <div class="modal-footer">
          <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button> -->
          <button type="button" class="btn btdelete" onclick='excluirAgendaConfirm()' style='color:white'>Excluir Agenda</button>
        </div>
      </div>
    </div>
  </div>
  

  <!-- Modal Procedimento -->
  <div class="modal fade" id="tratamentoatualModal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalToggleLabel"><b id='titulotratamentomodal'></b></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="form-floating distcampos">
            <textarea class="form-control" placeholder="Queixa Principal" id="queixaprincipal" onfocusout='atttratamento()' style='width:25rem;max-width:100%;height:5rem'></textarea>
            <label for="queixaprincipal">Queixa Principal</label>
          </div>
          <div class="form-floating distcampos">
            <textarea class="form-control" placeholder="História Doença Atual" id="historiadoencaatual" onfocusout='atttratamento()' style='width:25rem;max-width:100%;height:5rem'></textarea>
            <label for="historiadoencaatual">História Doença Atual</label>
          </div>
          <div class="form-floating distcampos">
            <input type="text" class="form-control" name='examefisico' id="examefisico" placeholder="Exame Físico" onfocusout='atttratamento()' style=';margin-bottom:1rem;width:25rem;max-width:100%;height:4rem'>
            <label for="examefisico">Exame Físico</label>
          </div>
          <div class="form-floating distcampos">
            <input type="text" class="form-control" name='cid' id="cid" placeholder="CID" onfocusout='atttratamento()' style=';margin-bottom:1rem;width:25rem;max-width:100%;height:4rem'>
            <label for="cid">CID</label>
          </div>
          <div class="form-floating distcampos">
            <input type="text" class="form-control" name='resultadoexames' id="resultadoexames" placeholder="Resultado de Exames" onfocusout='atttratamento()' style=';margin-bottom:1rem;width:25rem;max-width:100%;height:4rem'>
            <label for="resultadoexames">Resultado de Exames</label>
          </div>
          <div class="form-floating distcampos">
            <input type="text" class="form-control" name='recomendacoes' id="recomendacoes" placeholder="Recomendações" onfocusout='atttratamento()' style=';margin-bottom:1rem;width:25rem;max-width:100%;height:4rem'>
            <label for="recomendacoes">Recomendações</label>
          </div>
          <!-- <button type='submit' name='novaevolucao' class='btn btbordagreen' id='novaevolucao' value='Nova Evolução' onclick='novaevolucao()'>
            <span class='textobtborda'>Nova Evolução</span>
          </button> -->
          <div class="form-floating distcampos">
            <input type="text" class="form-control" name='evolucao' id="evolucao" placeholder="Evolução" onfocusout='atttratamento()' style=';margin-bottom:1rem;width:25rem;max-width:100%;height:4rem'>
            <label for="evolucao">Evolução</label>
          </div>
          
          <!-- <button type='submit' name='novoprocedimento' class='btn btbordagreen' id='novoprocedimento' value='Novo Procedimento' onclick='novoprocedimento()'>
            <span class='textobtborda'>Novo Procedimento</span>
          </button> -->
          <div id='semprocedimentodiv'> Não existem procedimentos documentados. </div>
          <div id='procedimentodiv'>
            <div id='tabela' class="table-responsive-sm">
              <table id='procedimentotable' class="table">
                <thead class="table-active">
                  <tr>
                    <td scope="col">Data</td>
                    <td scope="col">Procedimento</td>
                    <td scope="col">Situação</td>
                    <td scope="col">Finalização</td>
                  </tr>
                </thead>
                <tbody id='procedimentotablebody'>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-primary" data-bs-target="#prontuarioModal" data-bs-toggle="modal" data-bs-dismiss="modal">Voltar para Prontuário</button>
        </div>
      </div>
    </div>
  </div>

  <!-- <div class="modal fade" id="novohppModal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalToggleLabel2">Novo HPP</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="container-fluid">
            <div class="row gx-3 gy-3">
              <div class="col-sm-8 col-md-8 col-lg-8">
                <div class="cor03"> -->
                  <!-- <label for="hpptext" class="form-label">HPP</label> -->
                  <!-- <input type="text" class="form-control" aria-describedby="hpptext" name='hpptext' id='hpptext' placeholder='Digite o HPP do paciente' />
                </div>
              </div>
              <div class="col-sm-4 col-md-4 col-lg-4">
                <div class="cor03">
                  <button type="submit" class="btn btn-success" name='novohppbutton' id='novohppbutton' onclick='cadastrarhpp()' value='Cadastrar HPP' data-bs-target="#prontuarioModal" data-bs-toggle="modal" style='padding: 7px 8px!important;'>
                    <span class="fontebotao" style='font-size:15px'>Cadastrar HPP</span>
                  </button>
                </div>
              </div>
            </div>
          </div> -->
          <!-- <input type='text' name='hpptext' id='hpptext' placeholder='Digite o HPP do paciente'>
          <input type='button' name='novohppbutton' id='novohppbutton' onclick='cadastrarhpp()' value='Cadastrar Hpp'> -->
        <!-- </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" data-bs-target="#prontuarioModal" data-bs-toggle="modal" data-bs-dismiss="modal">Voltar</button>
        </div>
      </div>
    </div>
  </div> -->

  <div class="modal fade" id="novohppModal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="exampleModalToggleLabel2">Novo HPP</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="">
            <div class="row gx-3 gy-3">
              <div class="col-sm-8 col-md-8 col-lg-8">
                <div class="cor03">
                  <!-- <label for="hpptext" class="form-label">HPP</label> -->
                  <input type="text" class="form-control" aria-describedby="hpptext" name='hpptext' id='hpptext' placeholder='Digite o HPP do paciente' />
                </div>
              </div>
              <div class="col-sm-4 col-md-4 col-lg-4">
                <div class="cor03">
                  <button type="submit" class="btn btn-success" name='novohppbutton' id='novohppbutton' onclick='cadastrarhpp()' value='Cadastrar HPP' data-bs-target="#prontuarioModal" data-bs-toggle="modal" style='padding: 7px 8px!important;'>
                    <span class="fontebotao" style='font-size:15px'>Cadastrar HPP</span>
                  </button>
                </div>
              </div>
            </div>
          </div>
          <!-- <input type='text' name='hpptext' id='hpptext' placeholder='Digite o HPP do paciente'>
          <input type='button' name='novohppbutton' id='novohppbutton' onclick='cadastrarhpp()' value='Cadastrar Hpp'> -->
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" data-bs-target="#prontuarioModal" data-bs-toggle="modal" data-bs-dismiss="modal">Voltar</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="novotratamentoModal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalToggleLabel2">Novo Tratamento</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="">
            <div class="row gx-3 gy-3">
              <div class="col-sm-7 col-md-7 col-lg-7">
                <div class="cor03">
                  <!-- <label for="tratamentotext" class="form-label">Tratamento</label> -->
                  <input type="text" class="form-control" aria-describedby="tratamentotext" name='tratamentotext' id='tratamentotext' placeholder='Digite o nome do tratamento' />
                </div>
              </div>
              <div class="col-sm-5 col-md-5 col-lg-5">
                <div class="cor03">
                  <button type="submit" class="btn btn-success" name='novotratamentobutton' id='novotratamentobutton' onclick='cadastrartratamento()' value='Cadastrar Tratamento' data-bs-target="#prontuarioModal" data-bs-toggle="modal" style='padding: 7px 8px!important;'>
                    <span class="fontebotao" style='font-size:15px'>Cadastrar Tratamento</span>
                  </button>
                </div>
              </div>
            </div>
          </div>
          <!-- <input type='text' name='tratamentotext' id='tratamentotext' placeholder='Digite o nome do tratamento'>
          <input type='button' name='novotratamentobutton' id='novotratamentobutton' onclick='cadastrartratamento()' value='Cadastrar Tratamento'> -->
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" data-bs-target="#prontuarioModal" data-bs-toggle="modal" data-bs-dismiss="modal">Voltar</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="novaevolucaoModal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalToggleLabel2">Nova Evolução</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="container-fluid">
            <div class="row gx-3 gy-3">
              <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="cor03">
                  <div class="form-floating">
                    <textarea class="form-control" placeholder="Título da Evolução" id='tituloevolucaotext' style="height: 70px"></textarea>
                    <label for="tituloevolucaotext">Título da Evolução</label>
                  </div>
                </div>
              </div>
              <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="cor03">
                  <div class="form-floating">
                    <textarea class="form-control" placeholder="Descrição da Evolução" id='descevolucaotext' style="height: 100px"></textarea>
                    <label for="descevolucaotext">Descrição da Evolução</label>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- <textarea id='tituloevolucaotext' placeholder='Digite o título da evolução'></textarea><br>
          <textarea id='descevolucaotext' placeholder='Digite a descrição da evolução'></textarea><br>
          <input type='button' name='novaevolucaobutton' id='novaevolucaobutton' onclick='cadastrarevolucao()' value='Cadastrar Evolução'> -->
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success" name='novaevolucaobutton' id='novaevolucaobutton' onclick='cadastrarevolucao()' value='Cadastrar Evolução' data-bs-target="#tratamentoatualModal" data-bs-toggle="modal">
            <span class="fontebotao" style='font-size:15px'>Cadastrar Evolução</span>
          </button>
          <button class="btn btn-secondary" data-bs-target="#tratamentoatualModal" data-bs-toggle="modal" data-bs-dismiss="modal">Voltar</button>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="novoprocedimentoModal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalToggleLabel2">Novo Procedimento</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="container-fluid">
            <div class="row gx-3 gy-3">
              <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="cor03">
                  <label for="novoprocedimentoselect" class="form-label">Procedimento</label>
                  <select id='novoprocedimentoselect' class='form-select'></select>
                </div>
              </div>
              <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="cor03">
                  <label for="novoprocedimentosituacao" class="form-label">Situação</label>
                  <select class='form-select' id='novoprocedimentosituacao'>
                    <option value='realizar'>A Realizar</option>
                    <option value='observado'>Observado</option>
                    <option value='finalizado'>Finalizado</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <!-- Procedimento: <select id='novoprocedimentoselect'></select><br>
          Situação: <select id='novoprocedimentosituacao'>
            <option value=''>Selecione uma Situação</option>
            <option value='realizar'>A Realizar</option>
            <option value='observado'>Observado</option>
            <option value='finalizado'>Finalizado</option>
          </select><br>
          <input type='button' name='novoprocedimentobutton' id='novoprocedimentobutton' onclick='cadastrarprocedimento()' value='Cadastrar Procedimento'> -->
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success" name='novoprocedimentobutton' id='novoprocedimentobutton' onclick='cadastrarprocedimento()' value='Cadastrar Procedimento' data-bs-target="#tratamentoatualModal" data-bs-toggle="modal">
            <span class="fontebotao" style='font-size:15px'>Cadastrar Procedimento</span>
          </button>
          <button class="btn btn-secondary" data-bs-target="#tratamentoatualModal" data-bs-toggle="modal" data-bs-dismiss="modal">Voltar</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="excluirpessoaModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered  modal-dialog-scrollable">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Excluir Pessoa</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <b>Tem certeza que deseja excluir essa pessoa permanentemente? Esse processo não pode ser revertido.</b>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                  <button type="button" class="btn btn-primary" onclick='excluirPessoaConfirm()'>Excluir Pessoa</button>
              </div>
          </div>
      </div>
  </div>

  <div class="modal fade" id="excluirSucessoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Excluido com Sucesso!</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div id='pacientecad'>Pessoa excluida com sucesso!</div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="refresh()">Fechar</button>
          <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="excluirFalhaContratoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Pessoa não pode ser excluida!</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div >Esta pessoa é titular de um contrato!</div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
          <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
        </div>
      </div>
    </div>
  </div>

  <div id="loader"></div>

</body>

<script>
  // stoploading();
  reset();
  escondertabela();
  
  consdep();
  

  $('#tel1input').inputmask('(99) 9999[9]-9999');
  $('#tel2input').inputmask('(99) 9999[9]-9999');
  $('#contatorepinput').inputmask('(99) 9999[9]-9999');
  $("input[id*='pesquisarpessoacpfcnpj']").inputmask({
    mask: ['999.999.999-99', '99.999.999/9999-99'],
    keepStatic: true
  });

  $('.btnY').on('click', function() {
    $('.arquivo').trigger('click');
  });
 
  $('.arquivo').on('change', function() {
    var fileName = $(this)[0].files[0].name;
    $('#file').val(fileName);
  });

  var dadoslinhas = [];
  var sessao = '';
  var idatual = '';
  var idagenda = [];
  var idmedico = [];
  var idagendaatual = 0;

  var idagendamento = [];
  var exameagendamento = [];
  var quantidadeagendamento = [];
  var situacaoagendamento = [];
  var exames = [];

  var contlinhas = 0;
  var linhas = [];
  var todosexamesid = [];
  var todosexamesnome = [];
  var todosexamesvalor = [];

  var paginastotais = 0;
  var numeropaginaatual = 1;
  
  var permissaoeditarexcluir = 0;

  if({{Auth::user()->user_tipo}} != 2){
        $.ajax({
        type: "GET",
        url: "/buscarpermissoes",
        data: {userid: {{Auth::user()->user_tipo}}},
        dataType: "json",
        success: function(data) {
          if(data.indexOf('1.2') != -1){
            permissaoeditarexcluir = 1;
          }
        }
      });
    }else{
      permissaoeditarexcluir = 1;
    }

  

  $('#salarioinput').inputmask('decimal', {
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

    
  $. extend ( $. ui . autocomplete . prototype . options ,  { 
    open :  function ( event , ui )  { 
      $ ( this ) . autocomplete ( "widget" ) . css ( { 
              "width" :  ( $ ( this ) . width ( )  +  "px" ) 
          } ) ; 
      } 
  }); 

  var query = location.search.slice(1);
  var partes = query.split('&');
  var data = {};
  partes.forEach(function(parte) {
    var chaveValor = parte.split('=');
    var chave = chaveValor[0];
    var valor = chaveValor[1];
    data[chave] = valor;
  });
  if (data['cpfcliente']) {
    editar2(data['cpfcliente'], data['nome'].replace('%20', ' '));
  }

  function escondertabela() {
    $('#tabela').css('display', 'none');
  }

  function refresh(){
    window.location.reload();
  }

  $('#pesquisarpessoanome').keyup(function() {

    var nome = $('#pesquisarpessoanome').val();
    var nomes = [];
    if (nome.length >= 2) {
      $.ajax({
        type: 'GET',
        url: 'pessoa/nome',
        data: {
          nomepessoa: nome
        },
        dataType: "json",
        success: function(data) {
          for (i = 0; i < data.length; i++) {
            if (data[i]['pac_nome']) {
              nomes.push(data[i]['pac_nome']);
            } else if (data[i]['forfis_nome']) {
              nomes.push(data[i]['forfis_nome']);
            } else if (data[i]['func_nome']) {
              nomes.push(data[i]['func_nome']);
            } else if (data[i]['forjur_nome']) {
              nomes.push(data[i]['forjur_nome']);
            } else if (data[i]['clijur_nome']) {
              nomes.push(data[i]['clijur_nome']);
            }
          }
          nomes = nomes.filter((este, i) => nomes.indexOf(este) === i);
          $("#pesquisarpessoanome").autocomplete({
            source: nomes
          });
        }

      });

    }

  });

  // function startloading(){
  //   document.getElementById("loader").style.display = "block";
  // }

  // function stoploading(){
  //   document.getElementById("loader").style.display = "none";
  // }

  function acoes(select) {
    var id = select.id.split('selectpessoa');
    if (document.getElementById('selectpessoa' + id[1]).value == 'editar') {
      editar(id[1]);
    }
  }

  function buscarnome() {
    var nome = document.getElementById('pesquisarpessoanome').value;

  }

  // function pesquisarpessoacount(){
  //   if (document.getElementById('pesquisarpessoacpfcnpj').value.length == 14 || document.getElementById('pesquisarpessoacpfcnpj').value.length == 18 || document.getElementById('pesquisarpessoacpfcnpj').value == '') {
  //       $.ajax({
  //         type: "GET",
  //         url: "/consulta/pessoa/dadoscount",
  //         data: {
  //           cpfcnpj: document.getElementById('pesquisarpessoacpfcnpj').value,
  //           nomepessoa: document.getElementById('pesquisarpessoanome').value
  //         },
  //         dataType: "json",
  //         success: function(data) {
  //           // console.log(data);
  //           paginastotais = Math.ceil(data / 50);
  //           console.log(paginastotais);
  //           document.getElementById('paginasatuais').innerHTML = "<input type='button' name='paginaanterior' id='paginaanterior' value='<' onclick='passarpaginaanterior("+i+")'>";
  //           if(paginastotais == 1){
  //             document.getElementById('paginasatuais').innerHTML += "<input type='button' id='pagina1' name='pagina1' value='1'>";
  //           }else if(paginastotais == 2){
  //             for(var i = 1; i <= 2; i++){
  //               document.getElementById('paginasatuais').innerHTML += "<input type='button' id='pagina"+i+"' name='pagina"+i+"' value='"+i+"' onclick='passarpagina("+i+")'>";
  //             }
  //           }else{
  //             for(var i = 1; i <= 3; i++){
  //               document.getElementById('paginasatuais').innerHTML += "<input type='button' id='pagina"+i+"' name='pagina"+i+"' value='"+i+"' onclick='passarpagina("+i+")'>";
  //             }
  //           }
  //           document.getElementById('paginasatuais').innerHTML += "<input type='button' name='proximapagina' id='proximapagina' value='>' onclick='passarproximapagina("+i+")'>";
  //         }
  //       });
  //       pesquisarpessoa();
  //   }
  // }

  // function passarproximapagina(pagina){

  // }

  // function passarpagina(pagina){
  //   numeropaginaatual = pagina;
  //   attpaginas();
  //   pesquisarpessoa();
  // }

  // function passarpaginaanterior(pagina){

  // }

  // function attpaginas(){
  //   if(numeropaginaatual == 1){
  //     if(paginastotais == 1){
  //       document.getElementById('paginasatuais').innerHTML = "<input type='button' name='paginaanterior' id='paginaanterior' value='<' onclick='passarpaginaanterior("+i+")'>";
  //     }
  //   }
  // }

  // function pesquisarpessoanovo(){
  //   numeropaginaatual = 1;
  //   pesquisarpessoa();
  // }
  function pesquisarpessoa() {
    apagartabela();
    if (document.getElementById('pesquisarpessoacpfcnpj').value.length == 14 || document.getElementById('pesquisarpessoacpfcnpj').value.length == 18 || document.getElementById('pesquisarpessoacpfcnpj').value == '') {
        $.ajax({
          type: "GET",
          url: "/consulta/pessoa/dados",
          data: {
            cpfcnpj: document.getElementById('pesquisarpessoacpfcnpj').value,
            nomepessoa: document.getElementById('pesquisarpessoanome').value,
            // paginaatual: numeropaginaatual
          },
          dataType: "json",
          success: function(data) {
            // console.log(data);
            dadoslinhas = [];
            document.getElementById('tabela').style.display = 'block';
            for (i = 0; i < data.length; i++) {
              var tabela = document.getElementById('pessoatablebody');
              var numeroLinhas = tabela.rows.length;
              var linha = tabela.insertRow(numeroLinhas);
              var celula1 = linha.insertCell(0);
              var celula2 = linha.insertCell(1);
              var celula3 = linha.insertCell(2);
              var celula4 = linha.insertCell(3);
              var celula5 = linha.insertCell(4);
              if (document.getElementById('pesquisarpessoacpfcnpj').value.length == 14) {
                if (data[i]['pac_cpf'] != undefined) {
                  dadoslinhas.push([data[i]['pac_id'], "pac"]);
                  celula1.innerHTML = data[i]['pac_nome'];
                  celula2.innerHTML = data[i]['pac_cpf'];
                  celula3.innerHTML = data[i]['pac_tel1'];
                  celula4.innerHTML = 'Cliente Físico';
                  if(permissaoeditarexcluir == 1){
                    celula5.innerHTML = "<button type='submit' class='btn border border-secondary corbtedit' value='Editar' onclick='editar(this)' id='selectpessoa" + i + "' name='selectpessoa" + i + "'><span class='fontebotao edit'>Editar</span></button>";
                  }else{
                    celula5.innerHTML = "<button type='submit' class='btn border border-secondary corbtedit' value='Editar' onclick='editar(this)' id='selectpessoa" + i + "' name='selectpessoa" + i + "'><span class='fontebotao edit'>Editar</span></button>";
                  }
                } else if (data[i]['forfis_cpf'] != undefined) {
                  dadoslinhas.push([data[i]['forfis_id'], "forfis"]);
                  celula1.innerHTML = data[i]['forfis_nome'];
                  celula2.innerHTML = data[i]['forfis_cpf'];
                  celula3.innerHTML = data[i]['forfis_tel1'];
                  celula4.innerHTML = 'Fornecedor Físico';
                  if(permissaoeditarexcluir == 1){
                    celula5.innerHTML = "<button type='submit' class='btn border border-secondary corbtedit' value='Editar' onclick='editar(this)' id='selectpessoa" + i + "' name='selectpessoa" + i + "'><span class='fontebotao edit'>Editar</span></button>";
                  }else{
                    celula5.innerHTML = "<button type='submit' class='btn border border-secondary corbtedit' value='Editar' onclick='editar(this)' id='selectpessoa" + i + "' name='selectpessoa" + i + "'><span class='fontebotao edit'>Editar</span></button>";
                  }
                } else {
                  dadoslinhas.push([data[i]['func_id'], "func"]);
                  celula1.innerHTML = data[i]['func_nome'];
                  celula2.innerHTML = data[i]['func_cpf'];
                  celula3.innerHTML = data[i]['func_tel1'];
                  celula4.innerHTML = 'Funcionário';
                  celula4.innerHTML = 'Cliente Físico';
                  if(permissaoeditarexcluir == 1){
                    celula5.innerHTML = "<button type='submit' class='btn border border-secondary corbtedit' value='Editar' onclick='editar(this)' id='selectpessoa" + i + "' name='selectpessoa" + i + "'><span class='fontebotao edit'>Editar</span></button>";
                  }else{
                    celula5.innerHTML = "<button type='submit' class='btn border border-secondary corbtedit' value='Editar' onclick='editar(this)' id='selectpessoa" + i + "' name='selectpessoa" + i + "'><span class='fontebotao edit'>Editar</span></button>";
                  }
                }
              } else if (document.getElementById('pesquisarpessoacpfcnpj').value.length == 18) {
                if (data[i]['forjur_cnpj'] != undefined) {
                  dadoslinhas.push([data[i]['forjur_id'], "forjur"]);
                  celula1.innerHTML = data[i]['forjur_nome'];
                  celula2.innerHTML = data[i]['forjur_cnpj'];
                  celula3.innerHTML = data[i]['forjur_tel1'];
                  celula4.innerHTML = 'Fornecedor Jurídico';
                  if(permissaoeditarexcluir == 1){
                    celula5.innerHTML = "<button type='submit' class='btn border border-secondary corbtedit' value='Editar' onclick='editar(this)' id='selectpessoa" + i + "' name='selectpessoa" + i + "'><span class='fontebotao edit'>Editar</span></button>";
                  }else{
                    celula5.innerHTML = "<button type='submit' class='btn border border-secondary corbtedit' value='Editar' onclick='editar(this)' id='selectpessoa" + i + "' name='selectpessoa" + i + "'><span class='fontebotao edit'>Editar</span></button>";
                  }
                } else {
                  dadoslinhas.push([data[i]['clijur_id'], "clijur"]);
                  celula1.innerHTML = data[i]['clijur_nome'];
                  celula2.innerHTML = data[i]['clijur_cnpj'];
                  celula3.innerHTML = data[i]['clijur_tel1'];
                  celula4.innerHTML = 'Cliente Jurídico';
                  if(permissaoeditarexcluir == 1){
                    celula5.innerHTML = "<button type='submit' class='btn border border-secondary corbtedit' value='Editar' onclick='editar(this)' id='selectpessoa" + i + "' name='selectpessoa" + i + "'><span class='fontebotao edit'>Editar</span></button>";
                  }else{
                    celula5.innerHTML = "<button type='submit' class='btn border border-secondary corbtedit' value='Editar' onclick='editar(this)' id='selectpessoa" + i + "' name='selectpessoa" + i + "'><span class='fontebotao edit'>Editar</span></button>";
                  }
                }
              } else {
                if (data[i]['pac_cpf'] != undefined) {
                  dadoslinhas.push([data[i]['pac_id'], "pac"]);
                  celula1.innerHTML = data[i]['pac_nome'];
                  celula2.innerHTML = data[i]['pac_cpf'];
                  celula3.innerHTML = data[i]['pac_tel1'];
                  celula4.innerHTML = 'Cliente Físico';
                  if(permissaoeditarexcluir == 1){
                    celula5.innerHTML = "<button type='submit' class='btn border border-secondary corbtedit' value='Editar' onclick='editar(this)' id='selectpessoa" + i + "' name='selectpessoa" + i + "'><span class='fontebotao edit'>Editar</span></button>";
                  }else{
                    celula5.innerHTML = "<button type='submit' class='btn border border-secondary corbtedit' value='Editar' onclick='editar(this)' id='selectpessoa" + i + "' name='selectpessoa" + i + "'><span class='fontebotao edit'>Editar</span></button>";
                  }
                } else if (data[i]['forfis_cpf'] != undefined) {
                  dadoslinhas.push([data[i]['forfis_id'], "forfis"]);
                  celula1.innerHTML = data[i]['forfis_nome'];
                  celula2.innerHTML = data[i]['forfis_cpf'];
                  celula3.innerHTML = data[i]['forfis_tel1'];
                  celula4.innerHTML = 'Fornecedor Físico';
                  if(permissaoeditarexcluir == 1){
                    celula5.innerHTML = "<button type='submit' class='btn border border-secondary corbtedit' value='Editar' onclick='editar(this)' id='selectpessoa" + i + "' name='selectpessoa" + i + "'><span class='fontebotao edit'>Editar</span></button>";
                  }else{
                    celula5.innerHTML = "<button type='submit' class='btn border border-secondary corbtedit' value='Editar' onclick='editar(this)' id='selectpessoa" + i + "' name='selectpessoa" + i + "'><span class='fontebotao edit'>Editar</span></button>";
                  }
                } else if (data[i]['func_cpf'] != undefined) {
                  dadoslinhas.push([data[i]['func_id'], "func"]);
                  celula1.innerHTML = data[i]['func_nome'];
                  celula2.innerHTML = data[i]['func_cpf'];
                  celula3.innerHTML = data[i]['func_tel1'];
                  celula4.innerHTML = 'Funcionário';
                  if(permissaoeditarexcluir == 1){
                    celula5.innerHTML = "<button type='submit' class='btn border border-secondary corbtedit' value='Editar' onclick='editar(this)' id='selectpessoa" + i + "' name='selectpessoa" + i + "'><span class='fontebotao edit'>Editar</span></button>";
                  }else{
                    celula5.innerHTML = "<button type='submit' class='btn border border-secondary corbtedit' value='Editar' onclick='editar(this)' id='selectpessoa" + i + "' name='selectpessoa" + i + "'><span class='fontebotao edit'>Editar</span></button>";
                  }
                } else if (data[i]['forjur_cnpj'] != undefined) {
                  dadoslinhas.push([data[i]['forjur_id'], "forjur"]);
                  celula1.innerHTML = data[i]['forjur_nome'];
                  celula2.innerHTML = data[i]['forjur_cnpj'];
                  celula3.innerHTML = data[i]['forjur_tel1'];
                  celula4.innerHTML = 'Fornecedor Jurídico';
                  if(permissaoeditarexcluir == 1){
                    celula5.innerHTML = "<button type='submit' class='btn border border-secondary corbtedit' value='Editar' onclick='editar(this)' id='selectpessoa" + i + "' name='selectpessoa" + i + "'><span class='fontebotao edit'>Editar</span></button>";
                  }else{
                    celula5.innerHTML = "<button type='submit' class='btn border border-secondary corbtedit' value='Editar' onclick='editar(this)' id='selectpessoa" + i + "' name='selectpessoa" + i + "'><span class='fontebotao edit'>Editar</span></button>";
                  }
                } else {
                  dadoslinhas.push([data[i]['clijur_id'], "clijur"]);
                  celula1.innerHTML = data[i]['clijur_nome'];
                  celula2.innerHTML = data[i]['clijur_cnpj'];
                  celula3.innerHTML = data[i]['clijur_tel1'];
                  celula4.innerHTML = 'Cliente Jurídico';
                  if(permissaoeditarexcluir == 1){
                    celula5.innerHTML = "<button type='submit' class='btn border border-secondary corbtedit' value='Editar' onclick='editar(this)' id='selectpessoa" + i + "' name='selectpessoa" + i + "'><span class='fontebotao edit'>Editar</span></button>";
                  }else{
                    celula5.innerHTML = "<button type='submit' class='btn border border-secondary corbtedit' value='Editar' onclick='editar(this)' id='selectpessoa" + i + "' name='selectpessoa" + i + "'><span class='fontebotao edit'>Editar</span></button>";
                  }
                }
              }

            }
          }
        });
    }
    
  }

  function editar(linha) {
    var id = linha.id.split('selectpessoa');
    linha = id[1];
    console.log(linha);
    $.ajax({
      type: 'GET',
      url: 'pessoa/dadosedit',
      data: {
        id: dadoslinhas[linha][0],
        pessoa: dadoslinhas[linha][1]
      },
      dataType: "json",
      success: function(data) {
        idatual = dadoslinhas[linha][0];
        if (data[0]['pac_nome']) {
          esconder('fis', 'pac', data[0]);
          sessao = 'pac';
        } else if (data[0]['forfis_nome']) {
          esconder('fis', 'forfis', data[0]);
          sessao = 'forfis';
        } else if (data[0]['func_nome']) {
          esconder('fis', 'func', data[0]);
          sessao = 'func';
        } else if (data[0]['forjur_nome']) {
          esconder('jur', 'forjur', data[0]);
          sessao = 'forjur';
        } else if (data[0]['clijur_nome']) {
          esconder('jur', 'clijur', data[0]);
          sessao = 'clijur';
        }
      }
    });
  }

  function editar2(cpf,nome) {
    $.ajax({
      type: 'GET',
      url: 'pessoa/dadosedit2',
      data: {
        cpfcnpj: cpf,
        nome:nome,
        pessoa: 'else'
      },
      dataType: "json",
      success: function(data) {
        idatual = data[0]['pac_id'];
        if (data[0]['pac_nome']) {
          esconder('fis', 'pac', data[0]);
          sessao = 'pac';
        } else if (data[0]['forfis_nome']) {
          esconder('fis', 'forfis', data[0]);
          sessao = 'forfis';
        } else if (data[0]['func_nome']) {
          esconder('fis', 'func', data[0]);
          sessao = 'func';
        }
      }
    });
  }

  function mostrarsessao() {
    console.log(sessao);
  }

  function apagartabela() {
    var tableHeaderRowCount = 1;
    var table = document.getElementById('pesquisarpessoatable');
    var rowCount = table.rows.length;
    for (var i = tableHeaderRowCount; i < rowCount; i++) {
      table.deleteRow(tableHeaderRowCount);
    }
    reset();
  }

  function consdep() {
    $("#depselect").empty();
        var select = document.getElementById('depselect');
        var opt = document.createElement('option');
        opt.appendChild(document.createTextNode('---'));
        opt.value = '';
        select.appendChild(opt);
    $.ajax({
      type: "GET",
      url: "/consultacadastrodep",
      data: {},
      dataType: "json",
      success: function(data) {
        var select = document.getElementById('depselect');
        for (var i = 0; i < data['id'].length; i++) {
          var opt = document.createElement('option');
          opt.appendChild(document.createTextNode(data['nome'][i]));
          opt.value = data['id'][i];
          select.appendChild(opt);
        }
      }
    });
  }

  function filtset() {
    $("#setselect").empty();
    var select = document.getElementById('setselect');
    var opt = document.createElement('option');
    opt.appendChild(document.createTextNode('---'));
    opt.value = '';
    select.appendChild(opt);
    $.ajax({
      type: "GET",
      url: "/consultacadastroset",
      data: {
        dep: $("[name='dep']").val(),
      },
      dataType: "json",
      success: function(data) {
        for (var i = 0; i < data['id'].length; i++) {
          var opt = document.createElement('option');
          opt.appendChild(document.createTextNode(data['nome'][i]));
          opt.value = data['id'][i];
          select.appendChild(opt);
        }
      }
    });
  }

  function filtfunc() {
    $("#funcselect").empty();
    var select = document.getElementById('funcselect');
    var opt = document.createElement('option');
    opt.appendChild(document.createTextNode('---'));
    opt.value = '';
    select.appendChild(opt);
    $.ajax({
      type: "GET",
      url: "/consultacadastrofunc",
      data: {
        set: $("[name='setor']").val(),
      },
      dataType: "json",
      success: function(data) {
        for (var i = 0; i < data['id'].length; i++) {
          var opt = document.createElement('option');
          opt.appendChild(document.createTextNode(data['nome'][i]));
          opt.value = data['id'][i];
          select.appendChild(opt);
        }
      }
    });
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

  function telres() {
    if (document.getElementById('telresinput').value[5] != '9') {
      $('#telresinput').inputmask('(99) 9999-9999');
    } else {
      $('#telresinput').inputmask('(99) 9999[9]-9999');
    }
  }

  function contatorep() {
    if (document.getElementById('contatorepinput').value[5] != '9') {
      $('#contatorepinput').inputmask('(99) 9999-9999');
    } else {
      $('#contatorepinput').inputmask('(99) 9999[9]-9999');
    }
  }


  function reset() {
    $('.input').css('display', 'none');
  }

  function novodep() {
    document.getElementById('depnovo').innerHTML = "<span class='nomesinputs'>Novo Departamento</span><br><input type='text' class='inputstexttelas inputtextmedio' id='depnovoinput' name='depnovoinput'><br><br><button type='submit' class='btn btamarelo' value='Cadastrar Departamento' onclick='cadastrodep()'><span class='selectacoes'>Cadastrar Departamento</span></button>";
    document.getElementById('depnovo').style.display = 'block';
  }

  function novoset() {
    document.getElementById('setnovo').innerHTML = "<span class='nomesinputs'>Novo Setor</span><br><input type='text' class='inputstexttelas inputtextcc' id='setnovoinput' name='setnovoinput'><br><span class='nomesinputs'>Departamento</span><br><select name='setnovodep' id='setnovodep' class='form-select selectcategoria'></select><br><br><button type='submit' class='btn btamarelo' value='Cadastrar Setor' onclick='cadastroset()'><span class='selectacoes'>Cadastrar Setor</span></button>";
    document.getElementById('setnovo').style.display = 'block';
    $.ajax({
      type: "GET",
      url: "/consultacadastrodep",
      data: {},
      dataType: "json",
      success: function(data) {
        var select = document.getElementById('setnovodep');
        for (var i = 0; i < data['id'].length; i++) {
          var opt = document.createElement('option');
          opt.appendChild(document.createTextNode(data['nome'][i]));
          opt.value = data['id'][i];
          select.appendChild(opt);
        }
        filtset();
      }
    });
  }

  function novofunc() {
    document.getElementById('funcnovo').innerHTML = "<span class='nomesinputs'>Nova Função</span><br><input type='text' class='inputstexttelas inputtextcc' id='funcnovoinput' name='funcnovoinput'><br><span class='nomesinputs'>Setor</span><br><select name='funcnovoset' id='funcnovoset' class='form-select selectcategoria'></select><br><br><button type='submit' class='btn btamarelo' value='Cadastrar Função' onclick='cadastrofunc()'><span class='selectacoes'>Cadastrar Função</span></button>";
    document.getElementById('funcnovo').style.display = 'block';
    $.ajax({
      type: "GET",
      url: "/consultacadastroset",
      data: {},
      dataType: "json",
      success: function(data) {
        var select = document.getElementById('funcnovoset');
        for (var i = 0; i < data['id'].length; i++) {
          var opt = document.createElement('option');
          opt.appendChild(document.createTextNode(data['nome'][i]));
          opt.value = data['id'][i];
          select.appendChild(opt);
        }
        filtfunc();
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

  function agendaCliente() {
    $('#agendaclienteModal').modal('show');
    var mesatual = new Date().getMonth();
    var anoatual = new Date().getFullYear();
    var ultimodia = new Date(anoatual, mesatual + 1, 0).toLocaleDateString().split('/');
    var ultimodia2 = ultimodia[2] + "-" + ultimodia[1] + "-" + ultimodia[0]
    var diaatual = anoatual + "-" + (mesatual + 1) + "-" + String(new Date().getDate()).padStart(2, '0');;
    // console.log(ultimodia2, diaatual);

    document.getElementById('intervalo1').value = diaatual;
    document.getElementById('intervalo2').value = ultimodia2;
    listagendacliente();
  }

  function listagendacliente() {
    idagendacliente = [];
    datacliente = [];
    horarioscliente = [];
    apagartabelaagendacliente();
    $.ajax({
      type: "GET",
      url: "/consulta/listagendacliente",
      data: {
        cpfatual: $("[name='cpf']").val(),
        datainicio: document.getElementById('intervalo1').value,
        datafim: document.getElementById('intervalo2').value
      },
      dataType: "json",
      success: function(data) {
        document.getElementById('tabelasemagendacliente').style.display = 'none';
        document.getElementById('tabelaagendacliente').style.display = 'none';
        if(data['idagenda'].length == 0){
          document.getElementById('tabelasemagendacliente').style.display = 'block';
        }else{
          for (i = 0; i < data['idagenda'].length; i++) {
            var tabela = document.getElementById('agendaclientetablebody');
            var numeroLinhas = tabela.rows.length;
            var linha = tabela.insertRow(numeroLinhas);
            var celula1 = linha.insertCell(0);
            var celula2 = linha.insertCell(1);
            var celula3 = linha.insertCell(2);
            var celula4 = linha.insertCell(3);
            var celula5 = linha.insertCell(4);
            var celula6 = linha.insertCell(5);
            idagenda.push(data['idagenda'][i]);
            idmedico.push(data['idmedico'][i]);
            celula1.innerHTML = data['data'][i];
            celula2.innerHTML = data['hora'][i];
            celula3.innerHTML = data['nomemedico'][i];
            celula4.innerHTML = data['contrato'][i];
            celula5.innerHTML = data['status'][i];
            celula6.innerHTML = "<button type='submit' class='btn btn-primary' name='examecliente" + data['idagenda'][i] + "' id='examecliente" + data['idagenda'][i] + "' value='Serviços' onclick='examesCliente(" + data['idagenda'][i] + ")'><span class='fontebotao' style='font-size:15px'>Serviços</span></button>&nbsp&nbsp<button type='submit' class='btn btdelete' name='excluirexamecliente" + data['idagenda'][i] + "' id='excluirexamecliente" + data['idagenda'][i] + "' value='Excluir' onclick='excluirexameCliente(" + data['idagenda'][i] + ")'><span class='fontebotao' style='font-size:15px'>Excluir</span></button>";
          }
          document.getElementById('tabelaagendacliente').style.display = 'block';
        }
        
      }
    });
  }

  function listexamescliente(idagenda) {
    idagendamento = [];
    exameagendamento = [];
    quantidadeagendamento = [];
    situacaoagendamento = [];
    todosexamesid = [];
    todosexamesnome = [];
    todosexamesvalor = [];
    contlinhas = 0;
    apagartabelaexamescliente();


    $.ajax({
      type: "GET",
      url: "/consulta/listexamespossiveis",
      data: {
        idagenda: idagenda,
      },
      dataType: "json",
      success: function(data) {
        console.log(data);
        for (var i = 0; i < data.length; i++) {
          todosexamesid.push(data[i]['prod_id']);
          todosexamesnome.push(data[i]['prod_nome']);
          todosexamesvalor.push(data[i]['prod_valor']);
        }
        $.ajax({
          type: "GET",
          url: "/consulta/listexamescliente",
          data: {
            idagenda: idagenda,
          },
          dataType: "json",
          success: function(data) {
            // console.log(data);
            if (data != 1) {
              document.getElementById('semexamecliente').style.display = 'none';
              document.getElementById('exameclientetablediv').style.display = 'block';
              for (i = 0; i < data['agenda'][0].length; i++) {
                contlinhas++;
                linhas.push(contlinhas);
                var tabela = document.getElementById('exameclientetablebody');
                var numeroLinhas = tabela.rows.length;
                var linha = tabela.insertRow(numeroLinhas);
                var celula1 = linha.insertCell(0);
                var celula2 = linha.insertCell(1);
                var celula3 = linha.insertCell(2);
                var celula4 = linha.insertCell(3);
                // console.log(data['agenda'][0][i]);
                if(data['agenda'][0][i]['servico'] == 0){
                  celula1.innerHTML = "<input type='checkbox' name='checkboxexamecliente" + (numeroLinhas + 1) + "' id='checkboxexamecliente" + (numeroLinhas + 1) + "' disabled>";
                  celula2.innerHTML = "<select disabled name='exame" + (numeroLinhas + 1) + "' id='select" + (numeroLinhas + 1) + "' class='form-select selectcategoria' onchange='attexame(this)'><option value=''>Selecione um Exame</option></select>";
                  celula3.innerHTML = "<input disabled type='number' name='qtdexame" + (numeroLinhas + 1) + "' id='qtdexame" + (numeroLinhas + 1) + "' min='1' value='1' onchange='attexame(this)' class='form-control' style='width:100%'>";
                  celula4.innerHTML = "<select id = 'examesituacao" + (numeroLinhas + 1) + "' class='form-select selectcategoria' onchange='attexame(this)'><option value=''>Selecione uma Situação</option><option value='realizar'>A Realizar</option><option value='observado'>Observado</option><option value='finalizado'>Finalizado</option></select>";
                }else{
                  celula1.innerHTML = "<input type='checkbox' name='checkboxexamecliente" + (numeroLinhas + 1) + "' id='checkboxexamecliente" + (numeroLinhas + 1) + "'>";
                  celula2.innerHTML = "<select name='exame" + (numeroLinhas + 1) + "' id='select" + (numeroLinhas + 1) + "' class='form-select selectcategoria' onchange='attexame(this)'><option value=''>Selecione um Exame</option></select>";
                  celula3.innerHTML = "<input type='number' name='qtdexame" + (numeroLinhas + 1) + "' id='qtdexame" + (numeroLinhas + 1) + "' min='1' value='1' onchange='attexame(this)' class='form-control' style='width:100%'>";
                  celula4.innerHTML = "<select id = 'examesituacao" + (numeroLinhas + 1) + "' class='form-select selectcategoria' onchange='attexame(this)'><option value=''>Selecione uma Situação</option><option value='realizar'>A Realizar</option><option value='observado'>Observado</option><option value='finalizado'>Finalizado</option></select>";
                }

                idagendamento.push(data['agenda'][0][i][
                  ['idagendamento']
                ]);
                exameagendamento.push(data['agenda'][0][i][
                  ['servico']
                ]);
                situacaoagendamento.push(data['agenda'][0][i][
                  ['situacao']
                ]);
                quantidadeagendamento.push(data['agenda'][0][i][
                  ['quantidade']
                ]);
                pegarexames(contlinhas);
              }

              //  console.log(idagendamento, exameagendamento, situacaoagendamento);

              // setTimeout(function() {
              //   preencheragendamentos()
              // }, 1000);
            } else {
              document.getElementById('semexamecliente').style.display = 'block';
              document.getElementById('exameclientetablediv').style.display = 'none';
            }


          }
        });
      }
    });
  }

  function novoexamecliente() {
    contlinhas++;
    linhas.push(contlinhas);
    var tabela = document.getElementById('exameclientetablebody');
    var numeroLinhas = tabela.rows.length;
    var linha = tabela.insertRow(numeroLinhas);
    var celula1 = linha.insertCell(0);
    var celula2 = linha.insertCell(1);
    var celula3 = linha.insertCell(2);
    var celula4 = linha.insertCell(3);
    celula1.innerHTML = "<input type='checkbox' name='checkboxexamecliente" + (numeroLinhas + 1) + "' id='checkboxexamecliente" + (numeroLinhas + 1) + "'>";
    celula2.innerHTML = "<select name='exame" + (numeroLinhas + 1) + "' id='select" + (numeroLinhas + 1) + "' class='form-select selectcategoria' onchange='attexame(this)'><option value=''>Selecione um Exame</option></select>";
    celula3.innerHTML = "<input type='number' name='qtdexame" + (numeroLinhas + 1) + "' id='qtdexame" + (numeroLinhas + 1) + "' min='1' value='1' onchange='attexame(this)' class='form-control' style='width:100%'>";
    celula4.innerHTML = "<select id = 'examesituacao" + (numeroLinhas + 1) + "' class='form-select selectcategoria' onchange='attexame(this)'><option value=''>Selecione uma Situação</option><option value='realizar'>A Realizar</option><option value='observado'>Observado</option><option value='finalizado'>Finalizado</option></select>";
    exameagendamento[contlinhas - 1] = 'i';
    quantidadeagendamento[contlinhas - 1] = 1;
    situacaoagendamento[contlinhas - 1] = 'i';
    pegarexames(contlinhas);
    checarlistexame();
  }

  function pegarexames(linha) {
    // var select = document.getElementById('select' + linha);
    // var length = select.options.length;
    // for (i = length - 1; i >= 0; i--) {
    //   select.options[i] = null;
    // }
    if(exameagendamento[linha-1] == 0){
      var select = document.getElementById('select' + linha);
      var opt = document.createElement('option');
        opt.appendChild(document.createTextNode('Retorno'));
        opt.value = 0;
        opt.disabled = true;
        select.appendChild(opt);
    }
    if(exameagendamento[linha-1] == 'i'){
      exameagendamento[linha-1] = '';
      quantidadeagendamento[linha - 1] = 1;
      situacaoagendamento[linha-1] = '';
    }

    for (var i = 0; i < todosexamesid.length; i++) {
      // console.log(todosexamesid[i], todosexamesnome[i]);
      var select = document.getElementById('select' + linha);
      var opt = document.createElement('option');
      opt.appendChild(document.createTextNode(todosexamesnome[i]));
      opt.value = todosexamesid[i];
      select.appendChild(opt);
      if(i == todosexamesid.length - 1){
        preencheragendamentos();
      }
    }
    
  }

  function attexame(select) {
    if (select.id[0] == 's') {
      var idselect = select.id.split('select')[1];
    } else if (select.id[0] == 'q') {
      var idselect = select.id.split('qtdexame')[1];
    }else{
      var idselect = select.id.split('examesituacao')[1];
    }
    // dsakjdaskj
    exameagendamento[idselect - 1] = document.getElementById('select' + idselect).value;
    quantidadeagendamento[idselect - 1] = document.getElementById('qtdexame' + idselect).value;
    situacaoagendamento[idselect - 1] = document.getElementById('examesituacao' + idselect).value;

    calcularValorAgendamento();
    // console.log(exameagendamento, situacaoagendamento);
  }

  function calcularValorAgendamento(){
    var valortotalagendamento = parseFloat(0);
    for(var i = 0; i < exameagendamento.length; i++){
      var indiceagendamentoatual = todosexamesid.indexOf(parseInt(exameagendamento[i]));
      valortotalagendamento += parseFloat(todosexamesvalor[indiceagendamentoatual] * quantidadeagendamento[i]);
    }
    document.getElementById('valortotalexamecliente').innerHTML = 'Valor Total: ' + valortotalagendamento.toLocaleString('pt-BR', {
      minimumFractionDigits: 2,
      style: 'currency',
      currency: 'BRL'
    });
    
  }

  function excluirexamescliente() {
    var qtdexcluircontlinhas = 0;
    for (var o = 1; o <= contlinhas; o++) {
      if (document.getElementById('checkboxexamecliente' + o).checked == true) {
        var i = document.getElementById('checkboxexamecliente' + o).parentNode.parentNode.rowIndex;
        document.getElementById('exameclientetablebody').deleteRow(i - 1);
        linhas.splice(o - 1, 1);
        exameagendamento.splice(o - 1, 1);
        quantidadeagendamento.splice(o - 1, 1);
        situacaoagendamento.splice(o - 1, 1);
        qtdexcluircontlinhas++;
      }
    }
    contlinhas = contlinhas - qtdexcluircontlinhas;
    refazertabelaexame();
  }

  function refazertabelaexame() {
    apagartabelaexamescliente();
    if (contlinhas > 0) {
      document.getElementById('semexamecliente').style.display = 'none';
      document.getElementById('exameclientetablediv').style.display = 'block';
      for (i = 0; i < contlinhas; i++) {
        linhas.push(contlinhas);
        var tabela = document.getElementById('exameclientetablebody');
        var numeroLinhas = tabela.rows.length;
        var linha = tabela.insertRow(numeroLinhas);
        var celula1 = linha.insertCell(0);
        var celula2 = linha.insertCell(1);
        var celula3 = linha.insertCell(2);
        celula1.innerHTML = "<input type='checkbox' name='checkboxexamecliente" + (numeroLinhas + 1) + "' id='checkboxexamecliente" + (numeroLinhas + 1) + "'>";
        celula2.innerHTML = "<select name='exame" + (numeroLinhas + 1) + "' id='select" + (numeroLinhas + 1) + "' class='form-select selectcategoria' onchange='attexame(this)'><option value=''>Selecione um Exame</option></select>";
        celula3.innerHTML = "<select id = 'examesituacao" + (numeroLinhas + 1) + "' onchange='attexame(this)'><option value=''>Selecione uma Situação</option><option value='realizar'>A Realizar</option><option value='observado'>Observado</option><option value='finalizado'>Finalizado</option></select>";
        pegarexames((numeroLinhas + 1));

      }

      //  console.log(idagendamento, exameagendamento, situacaoagendamento);

      // setTimeout(function() {
      //   preencheragendamentos()
      // }, 1000);
    } else {
      document.getElementById('semexamecliente').style.display = 'block';
      document.getElementById('exameclientetablediv').style.display = 'none';
    }
  }

  function preencheragendamentos() {
    // console.log(exameagendamento, situacaoagendamento);
    for (var i = 0; i < exameagendamento.length; i++) {
      // console.log(exameagendamento, situacaoagendamento, quantidadeagendamento);
      document.getElementById('select' + (i + 1)).value = exameagendamento[i];
      document.getElementById('qtdexame' + (i + 1)).value = quantidadeagendamento[i];
      document.getElementById('examesituacao' + (i + 1)).value = situacaoagendamento[i];
    }
  }

  function examesCliente(idagenda) {
    $('#exameclienteModal').modal('show');
    idagendaatual = idagenda;
    listexamescliente(idagenda);
  }

  function checarlistexame() {
    if (contlinhas == 0) {
      document.getElementById('semexamecliente').style.display = 'block';
      document.getElementById('exameclientetablediv').style.display = 'none';
    } else {
      document.getElementById('semexamecliente').style.display = 'none';
      document.getElementById('exameclientetablediv').style.display = 'block';
    }
  }

  function salvarexamecliente() {
    $.ajax({
      type: "GET",
      url: "/cadastro/salvarlistaexames",
      data: {
        idagenda: idagendaatual,
        exames: exameagendamento,
        quantidade: quantidadeagendamento,
        situacao: situacaoagendamento
      },
      dataType: "json",
      success: function(data) {
        $('#exameclienteModal').modal('hide');
      }
    });
  }

  function excluirexameCliente(id) {
    idagendaatual = id;
    $('#excluiragendaclienteModal').modal('show');
  }

  function excluirAgendaConfirm() {
    $.ajax({
      type: "GET",
      url: "/apagar/excluiragendacliente",
      data: {
        idagenda: idagendaatual,
      },
      dataType: "json",
      success: function(data) {
        $('#excluiragendaclienteModal').modal('hide');
        agendaCliente();
      }
    });

  }

  function apagartabelaagendacliente() {
    var tableHeaderRowCount = 0;
    var table = document.getElementById('agendaclientetablebody');
    var rowCount = table.rows.length;
    for (var i = tableHeaderRowCount; i < rowCount; i++) {
      table.deleteRow(tableHeaderRowCount);
    }
  }

  function apagartabelaexamescliente() {
    var tableHeaderRowCount = 0;
    var table = document.getElementById('exameclientetablebody');
    var rowCount = table.rows.length;
    for (var i = tableHeaderRowCount; i < rowCount; i++) {
      table.deleteRow(tableHeaderRowCount);
    }
  }

  function esconder(tipo, pessoa, dados) {
    
    escondertabela();
    // console.log(dados);
    document.getElementById('editar').style.display = 'block';
    document.getElementById('excluir').style.display = 'block';
    document.getElementById('agenda').style.display = 'block';
    document.getElementById('nomesblocos').style.display = 'block';
    document.getElementById('nomesblocos1').style.display = 'block';
    document.getElementById('nomesblocos2').style.display = 'block';
    document.getElementById('nomesblocos3').style.display = 'block';
    document.getElementById('destaquegrupos').style.display = 'block';
    document.getElementById('destaquegrupos1').style.display = 'block';
    document.getElementById('destaquegrupos2').style.display = 'block';
    document.getElementById('destaquegrupos3').style.display = 'block';
    document.getElementById('titulo').style.display = 'block';
    document.getElementById('divconteudo').style.display = 'block';

    if (tipo == 'fis') {
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
      document.getElementById('obs').style.display = 'block';
      if (pessoa == 'pac') {
        sessionStorage.setItem('idatual', dados['pac_id']);
        document.getElementById('estadocivil').style.display = 'block';
        document.getElementById('sexo').style.display = 'block';
        document.getElementById('prof').style.display = 'block';
        document.getElementById('nomeres').style.display = 'block';
        document.getElementById('telres').style.display = 'block';
        document.getElementById('nomeres').innerHTML = "<label for='nomeresinput' class='form-label'>Nome do responsável</label><input type='text' class='form-control' name='nomeres' id='nomeresinput' aria-describedby='nomeresponsavel'/>";
        document.getElementById('telres').innerHTML = "<label for='telresinput' class='form-label'>Tel. do responsável</label><input type='text' class='form-control' name='telres' id='telresinput'  onkeypress='telres()' aria-describedby='telresponsavel'/>";
        $('#telresinput').inputmask('(99) 9999[9]-9999');

        document.querySelector("[name='cpf']").value = dados['pac_cpf'];
        document.querySelector("[name='nome']").value = dados['pac_nome'];
        document.querySelector("[name='datanasc']").value = dados['pac_datanasc'];
        if (dados['pac_cep'] != null) {
          document.querySelector("[name='cep']").value = dados['pac_cep'];
        }
        if (dados['pac_rg'] != null) {
          document.querySelector("[name='rg']").value = dados['pac_rg'];
        }
        document.querySelector("[name='logradouro']").value = dados['pac_logradouro'];
        document.querySelector("[name='num']").value = dados['pac_num'];
        document.querySelector("[name='complemento']").value = dados['pac_complemento'];
        document.querySelector("[name='bairro']").value = dados['pac_bairro'];
        document.querySelector("[name='cidade']").value = dados['pac_cidade'];
        document.querySelector("[name='uf']").value = dados['pac_uf'];
        if (dados['pac_celular'] != null) {
          document.querySelector("[name='celular']").value = dados['pac_celular'];
        }
        document.querySelector("[name='tel1']").value = dados['pac_tel1'];
        if (dados['pac_tel2'] != null) {
          document.querySelector("[name='tel2']").value = dados['pac_tel2'];
        }
        document.querySelector("[name='email']").value = dados['pac_email'];
        document.querySelector("[name='obs']").value = dados['pac_obs'];
        document.querySelector("[name='estadocivil']").value = dados['pac_estadocivil'];
        document.querySelector("[name='sexo']").value = dados['pac_sexo'];
        document.querySelector("[name='prof']").value = dados['pac_profissao'];
        document.querySelector("[name='nomeres']").value = dados['pac_nomeres'];
        if (dados['pac_telres'] != null) {
          document.querySelector("[name='telres']").value = dados['pac_telres'];
        }
        // console.log(dados['pac_id']);
        sessionStorage.setItem('pacatual', ("00000000" + dados['pac_id']).slice(-8) + "1");

      } else if (pessoa == 'forfis') {
        sessionStorage.setItem('idatual', dados['forfis_id']);
        document.getElementById('estadocivil').style.display = 'block';
        document.getElementById('sexo').style.display = 'block';
        document.getElementById('razaosocial').style.display = 'block';
        document.getElementById('website').style.display = 'block';
        document.getElementById('areaatuacao').style.display = 'block';

        document.querySelector("[name='cpf']").value = dados['forfis_cpf'];
        document.querySelector("[name='nome']").value = dados['forfis_nome'];
        document.querySelector("[name='datanasc']").value = dados['forfis_datanasc'];
        if (dados['forfis_cep'] != null) {
          document.querySelector("[name='cep']").value = dados['forfis_cep'];
        }
        if (dados['forfis_rg'] != null) {
          document.querySelector("[name='rg']").value = dados['forfis_rg'];
        }
        document.querySelector("[name='logradouro']").value = dados['forfis_logradouro'];
        document.querySelector("[name='num']").value = dados['forfis_num'];
        document.querySelector("[name='complemento']").value = dados['forfis_complemento'];
        document.querySelector("[name='bairro']").value = dados['forfis_bairro'];
        document.querySelector("[name='cidade']").value = dados['forfis_cidade'];
        document.querySelector("[name='uf']").value = dados['forfis_uf'];
        if (dados['forfis_celular'] != null) {
          document.querySelector("[name='celular']").value = dados['forfis_celular'];
        }
        document.querySelector("[name='tel1']").value = dados['forfis_tel1'];
        if (dados['forfis_tel2'] != null) {
          document.querySelector("[name='tel2']").value = dados['forfis_tel2'];
        }
        document.querySelector("[name='email']").value = dados['forfis_email'];
        document.querySelector("[name='obs']").value = dados['forfis_obs'];
        document.querySelector("[name='estadocivil']").value = dados['forfis_estadocivil'];
        document.querySelector("[name='sexo']").value = dados['forfis_sexo'];
        document.querySelector("[name='razaosocial']").value = dados['forfis_razaosocial'];
        document.querySelector("[name='website']").value = dados['forfis_website'];
        document.querySelector("[name='areaatuacao']").value = dados['forfis_areaatuacao'];

        sessionStorage.setItem('pacatual', ("00000000" + dados['forfis_id']).slice(-8) + "2");

      } else {
        sessionStorage.setItem('idatual', dados['func_id']);
        document.getElementById('estadocivil').style.display = 'block';
        document.getElementById('sexo').style.display = 'block';
        document.getElementById('func').style.display = 'block';
        document.getElementById('dep').style.display = 'block';
        document.getElementById('setor').style.display = 'block';
        document.getElementById('ctps').style.display = 'block';
        document.getElementById('serie').style.display = 'block';
        document.getElementById('pis').style.display = 'block';
        document.getElementById('ufctps').style.display = 'block';
        document.getElementById('salario').style.display = 'block';
        document.getElementById('conjugue').style.display = 'block';
        document.getElementById('pai').style.display = 'block';
        document.getElementById('mae').style.display = 'block'; 
        document.getElementById('destaquegrupos4').style.display = 'block';
        document.getElementById('user_name').style.display = 'block';
        document.getElementById('user_senha').style.display = 'block';
        document.getElementById('user_tipo').style.display = 'block';
        document.getElementById('nomesblocos4').style.display = 'block';

        document.querySelector("[name='cpf']").value = dados['func_cpf'];
        document.querySelector("[name='nome']").value = dados['func_nome'];
        document.querySelector("[name='datanasc']").value = dados['func_datanasc'];
        if (dados['func_cep'] != null) {
          document.querySelector("[name='cep']").value = dados['func_cep'];
        }
        if (dados['func_rg'] != null) {
          document.querySelector("[name='rg']").value = dados['func_rg'];
        }
        document.querySelector("[name='logradouro']").value = dados['func_logradouro'];
        document.querySelector("[name='num']").value = dados['func_num'];
        document.querySelector("[name='complemento']").value = dados['func_complemento'];
        document.querySelector("[name='bairro']").value = dados['func_bairro'];
        document.querySelector("[name='cidade']").value = dados['func_cidade'];
        document.querySelector("[name='uf']").value = dados['func_uf'];
        if (dados['func_celular'] != null) {
          document.querySelector("[name='celular']").value = dados['func_celular'];
        }
        document.querySelector("[name='tel1']").value = dados['func_tel1'];
        if (dados['func_tel2'] != null) {
          document.querySelector("[name='tel2']").value = dados['func_tel2'];
        }
        document.querySelector("[name='email']").value = dados['func_email'];
        document.querySelector("[name='obs']").value = dados['func_obs'];
        document.querySelector("[name='estadocivil']").value = dados['func_estadocivil'];
        document.querySelector("[name='sexo']").value = dados['func_sexo'];
        document.querySelector("[name='dep']").value = dados['func_dep'];
        filtset();
        setTimeout(function() {
          document.querySelector("[name='setor']").value = dados['func_setor'];
        }, 500);
        setTimeout(function() {
          filtfunc();
        }, 1000);
        setTimeout(function() {
          document.querySelector("[name='func']").value = dados['func_func'];
        }, 1500);
        console.log(dados['func_ctps']);
        if(dados['func_ctps'] != null){
          document.querySelector("[name='ctps']").value = dados['func_ctps'];
        }
        if(dados['func_serie'] != null){
          document.querySelector("[name='serie']").value = dados['func_serie'];
        }
        if(dados['func_pis'] != null){
          document.querySelector("[name='pis']").value = dados['func_pis'];
        }
        if(dados['func_ufctps'] != null){
          document.querySelector("[name='ufctps']").value = dados['func_ufctps'];
        }
        if(dados['func_salario'] != null){
          document.querySelector("[name='salario']").value = dados['func_salario'];
        }
        
        
        document.querySelector("[name='conjugue']").value = dados['func_conjugue'];
        document.querySelector("[name='pai']").value = dados['func_nomepai'];
        document.querySelector("[name='mae']").value = dados['func_nomemae'];

        $.ajax({
          type: "GET",
          url: "/consultapessoausuario",
          data: {
            func: dados['func_id']
          },
          dataType: "json",
          success: function(data) {
            document.querySelector("[name='user_name']").value = data[0];
            document.querySelector("[name='user_tipo']").value = data[1];
          }
        });

        sessionStorage.setItem('pacatual', ("00000000" + dados['func_id']).slice(-8) + "3");

      }
      agendaCliente();
      dadoscliente(sessionStorage.getItem('pacatual'));
      dadoscontratos(sessionStorage.getItem('pacatual'));
    } else {
      if (pessoa == 'forjur') {
        sessionStorage.setItem('idatual', dados['forjur_id']);
        document.getElementById('nome').style.display = 'block';
        document.getElementById('cnpj').style.display = 'block';
        document.getElementById('cep').style.display = 'block';
        document.getElementById('logradouro').style.display = 'block';
        document.getElementById('num').style.display = 'block';
        document.getElementById('uf').style.display = 'block';
        document.getElementById('complemento').style.display = 'block';
        document.getElementById('bairro').style.display = 'block';
        document.getElementById('cidade').style.display = 'block';
        document.getElementById('celular').style.display = 'block';
        document.getElementById('tel1').style.display = 'block';
        document.getElementById('tel2').style.display = 'block';
        document.getElementById('email').style.display = 'block';
        document.getElementById('obs').style.display = 'block';
        document.getElementById('razaosocial2').style.display = 'block';
        document.getElementById('inscest2').style.display = 'block';
        document.getElementById('website2').style.display = 'block';
        document.getElementById('areaatuacao2').style.display = 'block';
        document.getElementById('nomerep2').style.display = 'block';
        document.getElementById('emailrep2').style.display = 'block';
        document.getElementById('contatorep2').style.display = 'block';
        document.getElementById('obs').style.display = 'block';

        document.querySelector("[name='nome']").value = dados['forjur_nome'];
        document.querySelector("[name='cnpj']").value = dados['forjur_cnpj'];
        if (dados['forjur_cep'] != null) {
          document.querySelector("[name='cep']").value = dados['forjur_cep'];
        }
        document.querySelector("[name='logradouro']").value = dados['forjur_logradouro'];
        document.querySelector("[name='num']").value = dados['forjur_num'];
        document.querySelector("[name='uf']").value = dados['forjur_uf'];
        document.querySelector("[name='complemento']").value = dados['forjur_complemento'];
        document.querySelector("[name='bairro']").value = dados['forjur_bairro'];
        document.querySelector("[name='cidade']").value = dados['forjur_cidade'];
        document.querySelector("[name='tel1']").value = dados['forjur_tel1'];
        if (dados['forjur_celular'] != null) {
          document.querySelector("[name='celular']").value = dados['forjur_celular'];
        }
        if (dados['forjur_tel2'] != null) {
          document.querySelector("[name='tel2']").value = dados['forjur_tel2'];
        }
        document.querySelector("[name='email']").value = dados['forjur_email'];
        document.querySelector("[name='obs']").value = dados['forjur_obs'];
        document.querySelector("[name='razaosocial2']").value = dados['forjur_razaosocial'];
        document.querySelector("[name='inscest2']").value = dados['forjur_inscest'];
        document.querySelector("[name='website2']").value = dados['forjur_website'];
        document.querySelector("[name='areaatuacao2']").value = dados['forjur_areaatuacao'];
        document.querySelector("[name='nomerep2']").value = dados['forjur_nomerep'];
        document.querySelector("[name='emailrep2']").value = dados['forjur_emailrep'];
        if (dados['forjur_contatorep'] != null) {
          document.querySelector("[name='contatorep2']").value = dados['forjur_contatorep'];
        }
        document.querySelector("[name='obs']").value = dados['forjur_obs'];
      } else {
        sessionStorage.setItem('idatual', dados['clijur_id']);
        document.getElementById('nome').style.display = 'block';
        document.getElementById('cnpj').style.display = 'block';
        document.getElementById('cep').style.display = 'block';
        document.getElementById('logradouro').style.display = 'block';
        document.getElementById('num').style.display = 'block';
        document.getElementById('uf').style.display = 'block';
        document.getElementById('complemento').style.display = 'block';
        document.getElementById('bairro').style.display = 'block';
        document.getElementById('cidade').style.display = 'block';
        document.getElementById('celular').style.display = 'block';
        document.getElementById('tel1').style.display = 'block';
        document.getElementById('tel2').style.display = 'block';
        document.getElementById('email').style.display = 'block';
        document.getElementById('obs').style.display = 'block';
        document.getElementById('razaosocial2').style.display = 'block';
        document.getElementById('inscest2').style.display = 'block';
        document.getElementById('website2').style.display = 'block';
        document.getElementById('areaatuacao2').style.display = 'block';
        document.getElementById('nomerep2').style.display = 'block';
        document.getElementById('emailrep2').style.display = 'block';
        document.getElementById('contatorep2').style.display = 'block';
        document.getElementById('obs').style.display = 'block';

        document.querySelector("[name='nome']").value = dados['clijur_nome'];
        document.querySelector("[name='cnpj']").value = dados['clijur_cnpj'];
        if (dados['clijur_cep'] != null) {
          document.querySelector("[name='cep']").value = dados['clijur_cep'];
        }
        document.querySelector("[name='logradouro']").value = dados['clijur_logradouro'];
        document.querySelector("[name='num']").value = dados['clijur_num'];
        document.querySelector("[name='uf']").value = dados['clijur_uf'];
        document.querySelector("[name='complemento']").value = dados['clijur_complemento'];
        document.querySelector("[name='bairro']").value = dados['clijur_bairro'];
        document.querySelector("[name='cidade']").value = dados['clijur_cidade'];
        document.querySelector("[name='tel1']").value = dados['clijur_tel1'];
        if (dados['clijur_celular'] != null) {
          document.querySelector("[name='celular']").value = dados['clijur_celular'];
        }
        if (dados['clijur_tel2'] != null) {
          document.querySelector("[name='tel2']").value = dados['clijur_tel2'];
        }
        document.querySelector("[name='email']").value = dados['clijur_email'];
        document.querySelector("[name='obs']").value = dados['clijur_obs'];
        document.querySelector("[name='razaosocial2']").value = dados['clijur_razaosocial'];
        document.querySelector("[name='inscest2']").value = dados['clijur_inscest'];
        document.querySelector("[name='website2']").value = dados['clijur_website'];
        document.querySelector("[name='areaatuacao2']").value = dados['clijur_areaatuacao'];
        document.querySelector("[name='nomerep2']").value = dados['clijur_nomerep'];
        document.querySelector("[name='emailrep2']").value = dados['clijur_emailrep'];
        if (dados['clijur_contatorep'] != null) {
          document.querySelector("[name='contatorep2']").value = dados['clijur_contatorep'];
        }
        document.querySelector("[name='obs']").value = dados['clijur_obs'];
      }
    }
    if(permissaoeditarexcluir == 1){
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
      $('[name="obs"]').prop( "disabled", false );
      $('[name="estadocivil"]').prop( "disabled", false );
      $('[name="sexo"]').prop( "disabled", false );
      $('[name="prof"]').prop( "disabled", false );
      $('[name="nomeres"]').prop( "disabled", false );
      $('[name="telres"]').prop( "disabled", false );
      $('[name="razaosocial"]').prop( "disabled", false );
      $('[name="website"]').prop( "disabled", false );
      $('[name="areaatuacao"]').prop( "disabled", false );
      $('[name="func"]').prop( "disabled", false );
      $('[name="dep"]').prop( "disabled", false );
      $('[name="setor"]').prop( "disabled", false );
      $('[name="ctps"]').prop( "disabled", false );
      $('[name="serie"]').prop( "disabled", false );
      $('[name="pis"]').prop( "disabled", false );
      $('[name="ufctps"]').prop( "disabled", false );
      $('[name="salario"]').prop( "disabled", false );
      $('[name="conjugue"]').prop( "disabled", false );
      $('[name="pai"]').prop( "disabled", false );
      $('[name="mae"]').prop( "disabled", false );
      $('[name="user_name"]').prop( "disabled", false );
      $('[name="user_senha"]').prop( "disabled", false );
      $('[name="user_tipo"]').prop( "disabled", false );
      $('[name="razaosocial2"]').prop( "disabled", false );
      $('[name="cnpj"]').prop( "disabled", false );
      $('[name="incest2"]').prop( "disabled", false );
      $('[name="website2"]').prop( "disabled", false );
      $('[name="areaatuacao2"]').prop( "disabled", false );
      $('[name="nomerep2"]').prop( "disabled", false );
      $('[name="emailrep2"]').prop( "disabled", false );
      $('[name="contatorep2"]').prop( "disabled", false );
      $('[name="editarpessoa"]').prop( "disabled", false );
      $('[name="excluirpessoa"]').prop( "disabled", false );
    }else{
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
      $('[name="obs"]').prop( "disabled", true );
      $('[name="estadocivil"]').prop( "disabled", true );
      $('[name="sexo"]').prop( "disabled", true );
      $('[name="prof"]').prop( "disabled", true );
      $('[name="nomeres"]').prop( "disabled", true );
      $('[name="telres"]').prop( "disabled", true );
      $('[name="razaosocial"]').prop( "disabled", true );
      $('[name="website"]').prop( "disabled", true );
      $('[name="areaatuacao"]').prop( "disabled", true );
      $('[name="func"]').prop( "disabled", true );
      $('[name="dep"]').prop( "disabled", true );
      $('[name="setor"]').prop( "disabled", true );
      $('[name="ctps"]').prop( "disabled", true );
      $('[name="serie"]').prop( "disabled", true );
      $('[name="pis"]').prop( "disabled", true );
      $('[name="ufctps"]').prop( "disabled", true );
      $('[name="salario"]').prop( "disabled", true );
      $('[name="conjugue"]').prop( "disabled", true );
      $('[name="pai"]').prop( "disabled", true );
      $('[name="mae"]').prop( "disabled", true );
      $('[name="user_name"]').prop( "disabled", true );
      $('[name="user_senha"]').prop( "disabled", true );
      $('[name="user_tipo"]').prop( "disabled", true );
      $('[name="razaosocial2"]').prop( "disabled", true );
      $('[name="cnpj"]').prop( "disabled", true );
      $('[name="incest2"]').prop( "disabled", true );
      $('[name="website2"]').prop( "disabled", true );
      $('[name="areaatuacao2"]').prop( "disabled", true );
      $('[name="nomerep2"]').prop( "disabled", true );
      $('[name="emailrep2"]').prop( "disabled", true );
      $('[name="contatorep2"]').prop( "disabled", true );
      $('[name="editarpessoa"]').prop( "disabled", true );
      $('[name="excluirpessoa"]').prop( "disabled", true );
    }
  }

  function dadoscontratos(idpessoa){
    document.getElementById('contratosdiv').innerHTML = '';
    $.ajax({
      type: "GET",
      url: "/dadoscontrato",
      data: {
        idpessoa: idpessoa
      },
      dataType: "json",
      success: function(data) {
        var checkcontrato = '';
        console.log(data);
        for(var i = 0; i < data['contratosid'].length; i++){    
          if(checkcontrato == data['contratosid'][i]){
            if(data['contratosdados']['contratopessoa'][i] != null){
              if(typeof data['contratosdados']['contratopessoa'][i] ==='string'){
                document.getElementById('collapse-'+checkcontrato).innerHTML += "<div>"+data['contratosdados']['contratopessoa'][i]+" - "+data['contratosdados']['contratotipo'][i]+"</div>";
              }else{
                if(data['contratosdados']['contratopessoa'][i].pac_nome){
                  document.getElementById('collapse-'+checkcontrato).innerHTML += "<div>"+data['contratosdados']['contratopessoa'][i].pac_nome+" - "+data['contratosdados']['contratotipo'][i]+"</div>";
                }else if(data['contratosdados']['contratopessoa'][i].forfis_nome && data['contratosdados']['contratopessoa'][i].forfis_nome != null){
                  document.getElementById('collapse-'+checkcontrato).innerHTML += "<div>"+data['contratosdados']['contratopessoa'][i].forfis_nome+" - "+data['contratosdados']['contratotipo'][i]+"</div>";
                }else{
                  document.getElementById('collapse-'+checkcontrato).innerHTML += "<div>"+data['contratosdados']['contratopessoa'][i].func_nome+" - "+data['contratosdados']['contratotipo'][i]+"</div>";
                }
              }
            }
          }else{
            checkcontrato = data['contratosid'][i];
            if(typeof data['contratosdados']['contratopessoa'][i] ==='string'){
              document.getElementById('contratosdiv').innerHTML += "<div name='idcontrato"+data['contratosid'][i]+"' id='idcontrato"+data['contratosid'][i]+"' data-bs-toggle='collapse' data-bs-target='#collapse-"+data['contratosid'][i]+"')'><h3><span class='textobtborda'>"+data['contratosid'][i]+" - "+data['contratoplano'][i]+"</span></h3> </div> <div class='collapse' id='collapse-"+data['contratosid'][i]+"'><div><b>"+data['contratosdados']['contratopessoa'][i]+" - "+data['contratosdados']['contratotipo'][i]+"</b></div></div>";
            }else{
              if(data['contratosdados']['contratopessoa'][i] != null){
                if(data['contratosdados']['contratopessoa'][i].pac_nome){
                document.getElementById('contratosdiv').innerHTML += "<div name='idcontrato"+data['contratosid'][i]+"' id='idcontrato"+data['contratosid'][i]+"' data-bs-toggle='collapse' data-bs-target='#collapse-"+data['contratosid'][i]+"')'><h3><span class='textobtborda'>"+data['contratosid'][i]+" - "+data['contratoplano'][i]+"</span></h3> </div> <div class='collapse' id='collapse-"+data['contratosid'][i]+"'><div><b>"+data['contratosdados']['contratopessoa'][i].pac_nome+" - "+data['contratosdados']['contratotipo'][i]+"</b></div></div>";
                }else if(data['contratosdados']['contratopessoa'][i].forfis_nome && data['contratosdados']['contratopessoa'][i].forfis_nome != null){
                  document.getElementById('contratosdiv').innerHTML += "<div name='idcontrato"+data['contratosid'][i]+"' id='idcontrato"+data['contratosid'][i]+"' data-bs-toggle='collapse' data-bs-target='#collapse-"+data['contratosid'][i]+"')'><h3><span class='textobtborda'>"+data['contratosid'][i]+" - "+data['contratoplano'][i]+"</span></h3> </div> <div class='collapse' id='collapse-"+data['contratosid'][i]+"'><div><b>"+data['contratosdados']['contratopessoa'][i].forfis_nome+" - "+data['contratosdados']['contratotipo'][i]+"</b></div></div>";
                }else{
                  document.getElementById('contratosdiv').innerHTML += "<div name='idcontrato"+data['contratosid'][i]+"' id='idcontrato"+data['contratosid'][i]+"' data-bs-toggle='collapse' data-bs-target='#collapse-"+data['contratosid'][i]+"')'><h3><span class='textobtborda'>"+data['contratosid'][i]+" - "+data['contratoplano'][i]+"</span></h3> </div> <div class='collapse' id='collapse-"+data['contratosid'][i]+"'><div><b>"+data['contratosdados']['contratopessoa'][i].func_nome+" - "+data['contratosdados']['contratotipo'][i]+"</b></div></div>";
                }
              }
            }
          }
        }
      }
    });
  }

  function dadoscliente(idcliente) {
      $.ajax({
        type: "GET",
        url: "/medicodadoscliente",
        data: {
          id: idcliente
        },
        dataType: "json",
        success: function(data) {
          console.log(data);
          var d = new Date;
          ano_atual = d.getFullYear();
          mes_atual = d.getMonth() + 1;
          dia_atual = d.getDate();
          datahoje = dia_atual + "/" + mes_atual + "/" + ano_atual;
          if(data.length != 0){
            switch (parseInt(idcliente.substring(idcliente.length - 1))) {
              case 1:
                // document.getElementById('pacienteatual1').innerHTML = data[0]['pac_nome'];
                pac_datanasc = data[0]['pac_datanasc'].split('/');
                idade = ano_atual - pac_datanasc[2];
                if (mes_atual < pac_datanasc[1] || mes_atual == pac_datanasc[1] && dia_atual < pac_datanasc[0]) {
                  idade--;
                }
                // document.getElementById('idadeatual1').innerHTML = idade + " Anos";
                if (data[0]['pac_altura'] != null) {
                  // document.getElementById('alturaatualinput').value = data[0]['pac_altura'];
                } else {
                  // document.getElementById('alturaatualinput').value = '';
                }
                if (data[0]['pac_peso'] != null) {
                  // document.getElementById('pesoatualinput').value = data[0]['pac_peso'];
                } else {
                  // document.getElementById('pesoatualinput').value = '';
                }
                if (data[0]['pac_pa'] != null) {
                  // document.getElementById('paatualinput').value = data[0]['pac_pa'];
                } else {
                  // document.getElementById('paatualinput').value = '';
                }
                if (data[0]['pac_tiposangue'] != null) {
                  // document.getElementById('tiposangueatualinput').value = data[0]['pac_tiposangue'];
                } else {
                  // document.getElementById('tiposangueatualinput').value = '';
                }
                sessionStorage.setItem('pacatual', ("0000" + data[0]['pac_id']).slice(-4) + "1");
                break;
              case 2:
                // document.getElementById('pacienteatual1').innerHTML = data[0]['forfis_nome'];
                forfis_datanasc = data[0]['forfis_datanasc'].split('/');
                idade = ano_atual - forfis_datanasc[2];
                if (mes_atual < forfis_datanasc[1] || mes_atual == forfis_datanasc[1] && dia_atual < forfis_datanasc[0]) {
                  idade--;
                }
                document.getElementById('idadeatual1').innerHTML = idade + " Anos";
                if (data[0]['forfis_altura'] != null) {
                  document.getElementById('alturaatualinput').value = data[0]['forfis_altura'];
                } else {
                  document.getElementById('alturaatualinput').value = '';
                }
                if (data[0]['forfis_peso'] != null) {
                  document.getElementById('pesoatualinput').value = data[0]['forfis_peso'];
                } else {
                  document.getElementById('pesoatualinput').value = '';
                }
                if (data[0]['forfis_pa'] != null) {
                  document.getElementById('paatualinput').value = data[0]['forfis_pa'];
                } else {
                  document.getElementById('paatualinput').value = '';
                }
                if (data[0]['forfis_tiposangue'] != null) {
                  document.getElementById('tiposangueatualinput').value = data[0]['forfis_tiposangue'];
                } else {
                  document.getElementById('tiposangueatualinput').value = '';
                }
                sessionStorage.setItem('pacatual', ("0000" + data[0]['forfis_id']).slice(-4) + "2");
                break;
              case 3:
                // document.getElementById('pacienteatual1').innerHTML = data[0]['func_nome'];
                func_datanasc = data[0]['func_datanasc'].split('/');
                idade = ano_atual - func_datanasc[2];
                if (mes_atual < func_datanasc[1] || mes_atual == func_datanasc[1] && dia_atual < func_datanasc[0]) {
                  idade--;
                }
                document.getElementById('idadeatual1').innerHTML = idade + " Anos";
                if (data[0]['func_altura'] != null) {
                  document.getElementById('alturaatualinput').value = data[0]['func_altura'];
                } else {
                  document.getElementById('alturaatualinput').value = '';
                }
                if (data[0]['func_peso'] != null) {
                  document.getElementById('pesoatualinput').value = data[0]['func_peso'];
                } else {
                  document.getElementById('pesoatualinput').value = '';
                }
                if (data[0]['func_pa'] != null) {
                  document.getElementById('paatualinput').value = data[0]['func_pa'];
                } else {
                  document.getElementById('paatualinput').value = '';
                }
                if (data[0]['func_tiposangue'] != null) {
                  document.getElementById('tiposangueatualinput').value = data[0]['func_tiposangue'];
                } else {
                  document.getElementById('tiposangueatualinput').value = '';
                }
                sessionStorage.setItem('pacatual', ("0000" + data[0]['func_id']).slice(-4) + "3");
                break;
            }
            // listhpp();
            // listtratamento();
            // $.ajax({
            //   type: "GET",
            //   url: "/histfamilias",
            //   data: {
            //     idpessoa: sessionStorage.getItem('pacatual')
            //   },
            //   dataType: "json",
            //   success: function(data) {
            //     document.getElementById('histfamiliatext').value = data;
            //   }
            // });
          }
        }
      });

  }

  function listhpp() {
    $.ajax({
      type: "GET",
      url: "/listhpp",
      data: {
        idpessoa: sessionStorage.getItem('pacatual')
      },
      dataType: "json",
      success: function(data) {
        document.getElementById('hpplista').innerHTML = "";
        if (data.length != 0) {
          for (var i = 0; i < data.length; i++) {
            document.getElementById('hpplista').innerHTML += "<div class='divlistahpp'><div>" + data[i]['nomepatologia'] + "</div><div type='button' onclick='apagarhpp(" + data[i]['idhpp'] + ")'><img src='../imagens/fechar3.svg' alt='' style='width:1rem;margin-left:0.6rem'></div></div>";
          }
        } else {
          document.getElementById('hpplista').innerHTML = 'Nenhuma HPP Inserida.';
        }

      }
    });
  }

  function listtratamento() {
    $.ajax({
      type: "GET",
      url: "/listtratamento",
      data: {
        idpessoa: sessionStorage.getItem('pacatual')
      },
      dataType: "json",
      success: function(data) {
        document.getElementById('tratamentoslista').innerHTML = '';
        if (data.length != 0) {
          for (var i = 0; i < data.length; i++) {
            if(data[i]['datafim'] == null || data[i]['datafim'] == ''){
              var datatratamentoatual = data[i]['datainicio'].split('-')[2] + '/' + data[i]['datainicio'].split('-')[1] + '/' + data[i]['datainicio'].split('-')[0];
              document.getElementById('tratamentoslista').innerHTML += "<button type='submit' name='tratamento" + data[i][' idtratamento'] + "' class='btn btbordagreen' style='margin-right: 1rem;' data-bs-target=' #tratamentoatualModal' data-bs-dismiss='modal' id='tratamento" + data[i][' idtratamento'] + "' onclick='abrirtratamento(" + data[i]['idtratamento'] + ")'><h3><span class='textobtborda'>" + data[i]['nometratamento'] + "</span></h3><div class='textobtborda'>Data Início: " + datatratamentoatual + "</div>" + "<div class='textobtborda'>Situação: " + data[i]['situacao'] + "</div></button>"
            }else{
              var datatratamentoatual = data[i]['datafim'].split('-')[2] + '/' + data[i]['datafim'].split('-')[1] + '/' + data[i]['datafim'].split('-')[0];
              document.getElementById('tratamentoslista').innerHTML += "<button type='submit' name='tratamento" + data[i][' idtratamento'] + "' class='btn btbordagreen' style='margin-right: 1rem;' data-bs-target=' #tratamentoatualModal' data-bs-dismiss='modal' id='tratamento" + data[i][' idtratamento'] + "' onclick='abrirtratamento(" + data[i]['idtratamento'] + ")'><h3><span class='textobtborda'>" + data[i]['nometratamento'] + "</span></h3><div class='textobtborda'>Data Fim: " + datatratamentoatual + "</div>" + "<div class='textobtborda'>Situação: " + data[i]['situacao'] + "</div></button>"
            }
            
          }
        } else {
          document.getElementById('tratamentoslista').innerHTML = 'Nenhum Tratamento Inserido';
        }
      }
    });
  }

  function abrirtratamento(idtratamento) {
    tratamentoatual = idtratamento
    $.ajax({
      type: "GET",
      url: "/abrirtratamento",
      data: {
        idtratamento: idtratamento
      },
      dataType: "json",
      success: function(data) {
        document.getElementById('titulotratamentomodal').value = data['nometratamento'];
        document.getElementById('queixaprincipal').value = data['queixaprincipal'];
        document.getElementById('historiadoencaatual').value = data['historiadoencaatual'];
        document.getElementById('cid').value = data['cid'];
        document.getElementById('examefisico').value = data['examefisico'];
        document.getElementById('resultadoexames').value = data['resultadoexames'];
        document.getElementById('recomendacoes').value = data['recomendacoes'];
        document.getElementById('evolucao').value = data['evolucao'];

        $('#tratamentoatualModal').modal('show');
        // listevolucao();
        listprocedimento();
      }
    });
  }

  // function listevolucao() {
  //   apagartabelaevolucao();
  //   document.getElementById('semevolucaodiv').style.display = 'none';
  //   document.getElementById('evolucaodiv').style.display = 'none';
  //   $.ajax({
  //     type: "GET",
  //     url: "/listevolucao",
  //     data: {
  //       idtratamento: tratamentoatual
  //     },
  //     dataType: "json",
  //     success: function(data) {
  //       // console.log(data);
  //       if (data['dataevolucao'].length != 0) {

  //         document.getElementById('semevolucaodiv').style.display = 'none';
  //         document.getElementById('evolucaodiv').style.display = 'block';
  //         for (var i = 0; i < data['dataevolucao'].length; i++) {
  //           var tabela = document.getElementById('evolucaotablebody');
  //           var numeroLinhas = tabela.rows.length;
  //           var linha = tabela.insertRow(numeroLinhas);
  //           var celula1 = linha.insertCell(0);
  //           var celula2 = linha.insertCell(1);
  //           var celula3 = linha.insertCell(2);
  //           var celula4 = linha.insertCell(3);
  //           var celula5 = linha.insertCell(4);
  //           var celula6 = linha.insertCell(5);
  //           celula1.innerHTML = data['dataevolucao'][i];
  //           celula2.innerHTML = data['medico'][i];
  //           celula3.innerHTML = data['tituloevolucao'][i];
  //           celula4.innerHTML = data['descevolucao'][i];
  //           celula5.innerHTML = data['tratamento'][i];
  //           celula6.innerHTML= "<button type='submit' class='btn btdelete' value='Excluir' onclick='removerEvolucao(this)' id='" + data['idevolucao'][i] + "'><span class='fontebotao'>Excluir</span></button>";
  //          }

  //       } else {
  //         document.getElementById('semevolucaodiv').style.display = 'block';
  //         document.getElementById('evolucaodiv').style.display = 'none';
  //       }

  //     }
  //   });

  // }

  // function novaevolucao() {
  //   $('#novaevolucaoModal').modal('show');
  // }

  // function cadastrarevolucao() {
  //   if (document.getElementById('tituloevolucaotext').value != '') {
  //     $.ajax({
  //       type: "GET",
  //       url: "/novaevolucao",
  //       data: {
  //         idtratamento: tratamentoatual,
  //         medid: 1,
  //         tituloevolucao: document.getElementById('tituloevolucaotext').value,
  //         descevolucao: document.getElementById('descevolucaotext').value
  //       },
  //       dataType: "json",
  //       success: function(data) {
  //         $('#novaevolucaoModal').modal('hide');
  //         document.getElementById('tituloevolucaotext').value = '';
  //         document.getElementById('descevolucaotext').value = '';
  //         listevolucao();
  //       }
  //     });
  //   }
  // }

  // function apagartabelaevolucao() {
  //   var tableHeaderRowCount = 0;
  //   var table = document.getElementById('evolucaotablebody');
  //   var rowCount = table.rows.length;
  //   for (var i = tableHeaderRowCount; i < rowCount; i++) {
  //     table.deleteRow(tableHeaderRowCount);
  //   }
  // }

  function listprocedimento() {
    apagartabelaprocedimento();
    document.getElementById('semprocedimentodiv').style.display = 'none';
    document.getElementById('procedimentodiv').style.display = 'none';
    $.ajax({
      type: "GET",
      url: "/listprocedimento",
      data: {
        idtratamento: tratamentoatual
      },
      dataType: "json",
      success: function(data) {
        if (data['idprocedimento'].length != 0) {

          document.getElementById('semprocedimentodiv').style.display = 'none';
          document.getElementById('procedimentodiv').style.display = 'block';
          for (var i = 0; i < data['idprocedimento'].length; i++) {
            var tabela = document.getElementById('procedimentotablebody');
            var numeroLinhas = tabela.rows.length;
            var linha = tabela.insertRow(numeroLinhas);
            var celula1 = linha.insertCell(0);
            var celula2 = linha.insertCell(1);
            var celula3 = linha.insertCell(2);
            var celula4 = linha.insertCell(3);
            celula1.innerHTML = data['datainicio'][i];
            celula2.innerHTML = data['procedimento'][i];
            if(data['situacao'][i] == 'realizar'){
              celula3.innerHTML = "<div id='procedimentosituacao" + data['idprocedimento'][i] + "'>A Realizar</div>";
            }else if(data['situacao'][i] == 'observado'){
              celula3.innerHTML = "<div id='procedimentosituacao" + data['idprocedimento'][i] + "'>Observado</div>";
            }else{
              celula3.innerHTML = "<div id='procedimentosituacao" + data['idprocedimento'][i] + "'>Finalizado</div>";
            }
            celula4.innerHTML = "<div name='datafim" + data['idprocedimento'][i] + "' id='datafim" + data['idprocedimento'][i] + "'>"+data['datafim'][i]+"</div>";
          }

        } else {
          document.getElementById('semprocedimentodiv').style.display = 'block';
          document.getElementById('procedimentodiv').style.display = 'none';
        }

      }
    });

  }

  function apagartabelaprocedimento() {
    var tableHeaderRowCount = 0;
    var table = document.getElementById('procedimentotablebody');
    var rowCount = table.rows.length;
    for (var i = tableHeaderRowCount; i < rowCount; i++) {
      table.deleteRow(tableHeaderRowCount);
    }
  }

  function attdadospac(){
    $.ajax({
        type: "GET",
        url: "/attdadospac",
        data: {
          id: sessionStorage.getItem('pacatual'),
          alturaatualinput : document.getElementById('alturaatualinput').value,
          pesoatualinput : document.getElementById('pesoatualinput').value,
          paatualinput : document.getElementById('paatualinput').value,
          tiposangueatualinput : document.getElementById('tiposangueatualinput').value
        },
        dataType: "json",
        success: function(data) {
        }
      });
  }

  function salvarhistfamilia() {
    if (document.getElementById('histfamiliatext').value != '') {
      $.ajax({
        type: "GET",
        url: "/salvarhistfamilia",
        data: {
          idpessoa: sessionStorage.getItem('pacatual'),
          deschistfamilia: document.getElementById('histfamiliatext').value
        },
        dataType: "json",
        success: function(data) {
          console.log('Histórico salvo com sucesso!');
        }
      });
    }
  }
  function novohpp() {
    $('#novohppModal').modal('show');
  }

  function cadastrarhpp() {
    if (document.getElementById('hpptext').value != '') {
      $.ajax({
        type: "GET",
        url: "/novohpp",
        data: {
          idpessoa: sessionStorage.getItem('pacatual'),
          nomepatologia: document.getElementById('hpptext').value
        },
        dataType: "json",
        success: function(data) {
          $('#novohppModal').modal('hide');
          document.getElementById('hpptext').value = '';
          listhpp();
        }
      });
    }
  }

  function apagarhpp(idhpp) {
    $.ajax({
      type: "GET",
      url: "/apagarhpp",
      data: {
        idhpp: idhpp
      },
      dataType: "json",
      success: function(data) {
        listhpp();
      }
    });
  }

  function cadastrartratamento() {
    if (document.getElementById('tratamentotext').value != '') {
      $.ajax({
        type: "GET",
        url: "/novotratamento",
        data: {
          idpessoa: sessionStorage.getItem('pacatual'),
          nometratamento: document.getElementById('tratamentotext').value
        },
        dataType: "json",
        success: function(data) {
          $('#novotratamentoModal').modal('hide');
          document.getElementById('tratamentotext').value = '';
          listtratamento();
        }
      });
    }
  }

  function atttratamento() {
    $.ajax({
      type: "GET",
      url: "/atttratamento",
      data: {
        idtratamento: tratamentoatual,
        queixaprincipal: document.getElementById('queixaprincipal').value,
        historiadoencaatual: document.getElementById('historiadoencaatual').value,
        cid: document.getElementById('cid').value,
        examefisico: document.getElementById('examefisico').value,
        resultadoexames: document.getElementById('resultadoexames').value,
        recomendacoes: document.getElementById('recomendacoes').value,
        evolucao: document.getElementById('evolucao').value
      },
      dataType: "json",
      success: function(data) {
        console.log('Tratamento atualizado com sucesso!');
      }
    });
  }

  function excluirPessoa() {
    if (sessao == 'pac') {
        $.ajax({
          type: "GET",
          url: "/excluir/checarpessoa",
          data: {
            id: idatual + '1',
          },
          dataType: "json",
          success: function(data) {
            if(data == 1){
              $('#excluirpessoaModal').modal('show');
            }else{
              $('#excluirFalhaContratoModal').modal('show');
            }
          }
        });
      }
      if (sessao == 'forfis') {
        $.ajax({
          type: "GET",
          url: "/excluir/checarpessoa",
          data: {
            id: idatual + '2',
          },
          dataType: "json",
          success: function(data) {
            if(data == 1){
              $('#excluirpessoaModal').modal('show');
            }else{
              $('#excluirFalhaContratoModal').modal('show');
            }
          }
        });
      }
      if (sessao == 'func') {
        $.ajax({
          type: "GET",
          url: "/excluir/checarpessoa",
          data: {
            id: idatual + '3',
          },
          dataType: "json",
          success: function(data) {
            if(data == 1){
              $('#excluirpessoaModal').modal('show');
            }else{
              $('#excluirFalhaContratoModal').modal('show');
            }
          }
        });
      }
      if (sessao == 'forjur') {
        $.ajax({
          type: "GET",
          url: "/excluir/checarpessoa",
          data: {
            id: idatual + '4',
          },
          dataType: "json",
          success: function(data) {
            if(data == 1){
              $('#excluirpessoaModal').modal('show');
            }else{
              $('#excluirFalhaContratoModal').modal('show');
            }
          }
        });
      }

      if (sessao == 'clijur') {
        $.ajax({
          type: "GET",
          url: "/excluir/checarpessoa",
          data: {
            id: idatual + '5',
          },
          dataType: "json",
          success: function(data) {
            if(data == 1){
              $('#excluirpessoaModal').modal('show');
            }else{
              $('#excluirFalhaContratoModal').modal('show');
            }
          }
        });
      }
  }


  function excluirPessoaConfirm() {
    if (sessao == 'pac') {
      $.ajax({
        type: "GET",
        url: "/excluir/excluirpaciente",
        data: {
          id: idatual + '1',
        },
        dataType: "json",
        success: function(data) {
          $('#excluirpessoaModal').modal('hide');
          $('#excluirSucessoModal').modal('show');
          console.log('Cliente excluido com sucesso');
        }
      });
    }
    if (sessao == 'forfis') {
      $.ajax({
        type: "GET",
        url: "/excluir/excluirfornecedorfisico",
        data: {
          id: idatual + '2',
        },
        dataType: "json",
        success: function(data) {
          $('#excluirpessoaModal').modal('hide');
          $('#excluirSucessoModal').modal('show');
          console.log('Fornecedor Físico excluido com sucesso!');
        }
      });
    }
    if (sessao == 'func') {
      $.ajax({
        type: "GET",
        url: "/excluir/excluirfuncionario",
        data: {
          id: idatual + '3',
        },
        dataType: "json",
        success: function(data) {
          $('#excluirpessoaModal').modal('hide');
          $('#excluirSucessoModal').modal('show');
          console.log('Funcionário excluido com sucesso!');
        }
      });
    }
    if (sessao == 'forjur') {
      $.ajax({
        type: "GET",
        url: "/excluir/excluirfornecedorjuridico",
        data: {
          id: idatual + '4',
        },
        dataType: "json",
        success: function(data) {
          $('#excluirpessoaModal').modal('hide');
          $('#excluirSucessoModal').modal('show');
          console.log('Fornecedor Jurídico excluido com sucesso!');
        }
      });
    }

    if (sessao == 'clijur') {
      $.ajax({
        type: "GET",
        url: "/excluir/excluirclientejuridico",
        data: {
          id: idatual + '5',
        },
        dataType: "json",
        success: function(data) {
          $('#excluirpessoaModal').modal('hide');
          $('#excluirSucessoModal').modal('show');
          console.log('Cliente editado com sucesso!');
        }
      });
    }
  }

  function editarPessoa() {
    if (sessao == 'pac') {
      $.ajax({
        type: "GET",
        url: "/editar/editarpaciente",
        data: {
          nome: $("[name='nome']").val(),
          cpf: $("[name='cpf']").val(),
          rg: $("[name='rg']").val(),
          email: $("[name='email']").val(),
          datanasc: $("[name='datanasc']").val(),
          estadocivil: $("[name='estadocivil']").val(),
          sexo: $("[name='sexo']").val(),
          prof: $("[name='prof']").val(),
          cep: $("[name='cep']").val(),
          logradouro: $("[name='logradouro']").val(),
          num: $("[name='num']").val(),
          complemento: $("[name='complemento']").val(),
          bairro: $("[name='bairro']").val(),
          cidade: $("[name='cidade']").val(),
          uf: $("[name='uf']").val(),
          tel1: $("[name='tel1']").val(),
          tel2: $("[name='tel2']").val(),
          celular: $("[name='celular']").val(),
          nomeres: $("[name='nomeres']").val(),
          telres: $("[name='telres']").val(),
          situpac: $("[name='situpac']").val(),
          obj: $("[name='obj']").val(),
          obs: $("[name='obs']").val(),
          id: idatual + '1',
        },
        dataType: "json",
        success: function(data) {
          $('#exampleModal4').modal('show');
          console.log('Cliente editado com sucesso');
        }
      });
    }
    if (sessao == 'forfis') {
      $.ajax({
        type: "GET",
        url: "/editar/editarfornecedorfisico",
        data: {
          nome: $("[name='nome']").val(),
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
          obs: $("[name='obs']").val(),
          empresa: $("[name='empresa']").val(),
          razaosocial: $("[name='razaosocial']").val(),
          inscest: $("[name='inscest']").val(),
          website: $("[name='website']").val(),
          areaatuacao: $("[name='areaatuacao']").val(),
          obs: $("[name='obs']").val(),

        },
        dataType: "json",
        success: function(data) {
          $('#exampleModal5').modal('show');
          console.log('Fornecedor Físico editado com sucesso!');
        }
      });
    }
    if (sessao == 'func') {
      $.ajax({
        type: "GET",
        url: "/editar/editarfuncionario",
        data: {
          nome: $("[name='nome']").val(),
          cpf: $("[name='cpf']").val(),
          rg: $("[name='rg']").val(),
          email: $("[name='email']").val(),
          datanasc: $("[name='datanasc']").val(),
          estadocivil: $("[name='estadocivil']").val(),
          sexo: $("[name='sexo']").val(),
          cep: $("[name='cep']").val(),
          logradouro: $("[name='logradouro']").val(),
          num: $("[name='num']").val(),
          complemento: $("[name='complemento']").val(),
          bairro: $("[name='bairro']").val(),
          cidade: $("[name='cidade']").val(),
          uf: $("[name='uf']").val(),
          tel1: $("[name='tel1']").val(),
          tel2: $("[name='tel2']").val(),
          celular: $("[name='celular']").val(),
          dep: $("[name='dep']").val(),
          setor: $("[name='setor']").val(),
          func: $("[name='func']").val(),
          ctps: $("[name='ctps']").val(),
          serie: $("[name='serie']").val(),
          ufctps: $("[name='ufctps']").val(),
          pis: $("[name='pis']").val(),
          salario: $("[name='salario']").val(),
          conjugue: $("[name='conjugue']").val(),
          nomepai: $("[name='pai']").val(),
          nomemae: $("[name='mae']").val(),
          obs: $("[name='obs']").val(),
          user_name: $("[name='user_name']").val(),
          user_senha: $("[name='user_senha']").val(),
          user_tipo: $("[name='user_tipo']").val(),

        },
        dataType: "json",
        success: function(data) {
          $('#exampleModal6').modal('show');
          console.log('Funcionário editado com sucesso!');
        }
      });
    }
    if (sessao == 'forjur') {
      $.ajax({
        type: "GET",
        url: "/editar/editarfornecedorjuridico",
        data: {
          nome: $("[name='nome']").val(),
          cnpj: $("[name='cnpj']").val(),
          email: $("[name='email']").val(),
          cep: $("[name='cep']").val(),
          logradouro: $("[name='logradouro']").val(),
          num: $("[name='num']").val(),
          complemento: $("[name='complemento']").val(),
          bairro: $("[name='bairro']").val(),
          cidade: $("[name='cidade']").val(),
          uf: $("[name='uf']").val(),
          tel1: $("[name='tel1']").val(),
          tel2: $("[name='tel2']").val(),
          celular: $("[name='celular']").val(),
          website: $("[name='website2']").val(),
          inscest: $("[name='inscest2']").val(),
          razaosocial: $("[name='razaosocial2']").val(),
          areaatuacao: $("[name='areaatuacao2']").val(),
          nomerep: $("[name='nomerep2']").val(),
          emailrep: $("[name='emailrep2']").val(),
          contatorep: $("[name='contatorep2']").val(),
          obs: $("[name='obs']").val(),

        },
        dataType: "json",
        success: function(data) {
          $('#exampleModal7').modal('show');
          console.log('Fornecedor Jurídico editado com sucesso!');
        }
      });
    }

    if (sessao == 'clijur') {
      $.ajax({
        type: "GET",
        url: "/editar/editarclientejuridico",
        data: {
          nome: $("[name='nome']").val(),
          cnpj: $("[name='cnpj']").val(),
          email: $("[name='email']").val(),
          cep: $("[name='cep']").val(),
          logradouro: $("[name='logradouro']").val(),
          num: $("[name='num']").val(),
          complemento: $("[name='complemento']").val(),
          bairro: $("[name='bairro']").val(),
          cidade: $("[name='cidade']").val(),
          uf: $("[name='uf']").val(),
          tel1: $("[name='tel1']").val(),
          tel2: $("[name='tel2']").val(),
          celular: $("[name='celular']").val(),
          website: $("[name='website2']").val(),
          inscest: $("[name='inscest2']").val(),
          razaosocial: $("[name='razaosocial2']").val(),
          areaatuacao: $("[name='areaatuacao2']").val(),
          nomerep: $("[name='nomerep2']").val(),
          emailrep: $("[name='emailrep2']").val(),
          contatorep: $("[name='contatorep2']").val(),
          obs: $("[name='obs']").val(),

        },
        dataType: "json",
        success: function(data) {
          $('#exampleModal8').modal('show');
          console.log('Cliente editado com sucesso!');
        }
      });
    }
  }

  function cadastrodep() {
    $.ajax({
      type: "GET",
      url: "/cadastro/cadastrodepartamento",
      data: {
        nome: $("[name='depnovoinput']").val(),
      },
      dataType: "json",
      success: function(data) {
        console.log('Departamento cadastrado com sucesso');
        document.getElementById('depnovo').style.display = 'none'
        consdep();
      }
    });
  }

  function cadastroset() {
    $.ajax({
      type: "GET",
      url: "/cadastro/cadastrosetor",
      data: {
        nome: $("[name='setnovoinput']").val(),
        dep: $("[name='setnovodep']").val(),
      },
      dataType: "json",
      success: function(data) {
        console.log('Setor cadastrado com sucesso');
        document.getElementById('setnovo').style.display = 'none'
      }
    });
  }

  function cadastrofunc() {
    $.ajax({
      type: "GET",
      url: "/cadastro/cadastrofuncao",
      data: {
        nome: $("[name='funcnovoinput']").val(),
        set: $("[name='funcnovoset']").val(),
      },
      dataType: "json",
      success: function(data) {
        console.log('Função cadastrada com sucesso');
        document.getElementById('funcnovo').style.display = 'none'
      }
    });
  }
</script>
@endsection

</html>