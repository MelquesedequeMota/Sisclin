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
    <title>Cadastro Pessoa</title>

    <script>
        $('.input').css('display', 'none');

    </script>

    <style>
        /* body{
            background: #f9f9f9;
        }
        .form-select{
            background-color:transparent;
        } */
        .btnnovoplano{
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
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

        @media (max-width: 365px) {
            .flexdiv {
                align-items:start;
            }
            .f02{
                margin-left:0rem;
            }

            .respflexdiv{
                flex-direction:column;
            }
        } 
    </style>
</head> 

<body>
    @section('Conteudo')
    <div class="coluna">
        <div class="tituloprincipal">Cadastro Pessoa</div> 
        <br>

        <label for="exampleInputEmail1" class="form-label">Tipo de Pessoa</label>
        <select name="tipo_pessoa" class="form-select selecttipopessoa" id='tipo_pessoa' onchange='subTipo()'>
            <option selected value=''>Selecione a pessoa</option>
            <option value="fis">Física</option>
            <option value="jur">Jurídica</option>
        </select>
        <br> 

        <div id='subtipo' class="subtipo"></div>
        <br>

        <div class="container-fluid" style='margin-top:1rem;'>
            <div class='input destaquegrupos' id='destaquegrupos'>
                <div class='input nomesblocos titulogrupos' id='nomesblocos'>
                    <span>Informações Pessoais</span>
                </div>
                <div class="row gx-3 gy-3 distanciainterna">
                    <div class="col-sm-5 col-md-5 col-lg-4 input" id='nome'>
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
                    <div class="col-sm-3 col-md-3 col-lg-2 input" id='estadocivil'>
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
                    <div class="col-sm-3 col-md-3 col-lg-2 input" id='sexo'>
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
            <div class='input destaquegrupos' id='destaquegrupos5'>
                <div class='input nomesblocos5 titulogrupos' id='nomesblocos5'>
                    <span>Plano</span>
                </div>
                <div class="row gx-3 gy-3 distanciainterna">
                    <div class="col-sm-4 col-md-4 col-lg-3" id=''>
                        <select name="planos" class="form-select selectcategoria espacototal" id='selectplanos'>
                            <option value=''>Selecione o Plano</option>
                        </select>
                    </div>
                    <div class="col-sm-3 col-md-3 col-lg-2">
                        <button class='btn btamarelo btnnovoplano' onclick='adicionarplano()' style='padding: 0.66rem 0.75rem !important;'><img src="../imagens/plus2.svg" alt="" style='margin-right:0.5rem'><span class='fontebotao'>Adicionar Plano</span></button>
                    </div>
                    <!-- <div class='maxespaco'></div> -->
                    <div class="container-fluid" id="planoselecionado">
                        <div id='tabela' class="table-responsive-sm">
                        <table id='tabelaplanoselecionado' class="table">
                            <thead class="table-active">
                            <tr>
                                <td>Nome</td>
                                <td>Descrição</td>
                                <td>Dependentes</td>
                                <td>Boleto</td>
                                <td>Cartão</td>
                                <td>Adesao</td>
                            </tr>
                            </thead>
                            <tbody id='tabelaplanoselecionadobody' style='text-align: center;'>
                            </tbody>
                        </table>
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

    </div>

    <div class="container-fluid" style='margin-top:0rem;'>
        <div class='input' id='cadastrarpessoabutton' style="margin-bottom: 1rem">
            <button type="submit" class="btn btn-success mb-5" value='Cadastrar Pessoa' id='cadastrarpessoasbutton' onclick='cadastrarPessoa()'>
                <span class="fontebotao">Cadastrar Pessoa</span>
            </button>
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
                    <h5 class="modal-title" id="exampleModalLabel">Cadastro</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">                       
                    <div id='pacientecad'>Cliente cadastrado com sucesso!</div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick='iragendamento()'>Ir para Agendamento</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Continuar na Página</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="errocpfmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Erro!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">                       
                    <div id='pacientecad'>CPF já existe no Sistema</div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick='editarcpfexistente()'>Editar pessoa já existente</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal5" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cadastro</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">                       
                    <div id=''>Fornecedor cadastrado com sucesso</div>
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
                    <h5 class="modal-title" id="exampleModalLabel">Cadastro</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">                       
                    <div id=''>Funcionário cadastrado com sucesso</div>
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
                    <h5 class="modal-title" id="exampleModalLabel">Cadastro</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">                       
                    <div id=''>Fornecedor Jurídico cadastrado com sucesso</div>
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
                    <h5 class="modal-title" id="exampleModalLabel">Cadastro</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">                       
                    <div id=''>Cliente Jurídico cadastrado com sucesso</div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Ok</button>
                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                </div>
            </div>
        </div>
    </div>
</body>

<div class="modal fade" id="cpfigualModal" tabindex="-1" aria-labelledby="cpfigualModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cpfigualModalLabel">Aviso!</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">                       
                <div id='avisocpfigual'>CPF Digitado Já Registrado no Sistema!</div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-primary" onclick='editarcpfexistente()'>Editar pessoa já existente</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>


<script>
    reset();
    var cpfchecar = 0;
    var cpfcheck = 0;
    var planoatual = '';
    $('#tel1input').inputmask('(99) 9999[9]-9999');
    $('#tel2input').inputmask('(99) 9999[9]-9999');
    $('#contatorepinput').inputmask('(99) 9999[9]-9999');
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

    $('#tabelaplanoselecionado').css('display', 'none');

    consdep();
    consplanos();

    var query = location.search.slice(1);
    var partes = query.split('&');
    var data = {};
    partes.forEach(function (parte) {
        var chaveValor = parte.split('=');
        var chave = chaveValor[0];
        var valor = chaveValor[1];
        data[chave] = valor;
    });
    if(data['nomecliente']){
        document.getElementById('tipo_pessoa').value = 'fis';
        subTipo();
        setTimeout(function(){ document.getElementById('Paciente').checked = true; esconder();}, 100);
        // document.querySelector('input[name="nome"]').value = 'Whatever you want!';
        $("[name='nome']").val(data['nomecliente']);
    }

    function consdep(){
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
                    for(var i = 0; i<data['id'].length; i++){
                        var opt = document.createElement('option');
                        opt.appendChild(document.createTextNode(data['nome'][i]));
                        opt.value = data['id'][i];
                        select.appendChild(opt);
                    }
                }
            });
    }

    function consplanos(){
        $("#selectplanos").empty();
        var select = document.getElementById('selectplanos');
        var opt = document.createElement('option');
        opt.appendChild(document.createTextNode('Selecione o Plano'));
        opt.value = '';
        select.appendChild(opt);
        $.ajax({
                type: "GET",
                url: "/consultatodosplanos",
                data: {},
                dataType: "json",
                success: function(data) {
                    console.log(data);
                    var select = document.getElementById('selectplanos');
                    for(var i = 0; i<data['id'].length; i++){
                        var opt = document.createElement('option');
                        opt.appendChild(document.createTextNode(data['nome'][i]));
                        opt.value = data['id'][i];
                        select.appendChild(opt);
                    }
                }
            });
    }

    function checarcpf(){
        cpfchecar = $("[name='cpf']").val().replace(/[^a-z0-9]/gi,'');
        if(cpfchecar.length == 11){
            $.ajax({
                type: "GET",
                url: "/cpfchecar",
                data: {cpf:cpfchecar},
                dataType: "json",
                success: function(data) {
                    if(data == 1){
                        cpfcheck = 0;
                        $('#cpfigualModal').modal('show');
                    }else{
                        cpfcheck = 1;
                    }
                }
            });
        }
    }

    function editarcpfexistente(){
        window.location.href = window.location.href.replace('cadastro','consulta') + '?cpfcliente=' + $("[name='cpf']").val()+'&nome=';
    }

    function reset(){
        document.getElementById('tipo_pessoa').value = '';
        $('.input').css('display', 'none');
    }

    function apagartabelaplanoselecionado() {
        var tableHeaderRowCount = 0;
        var table = document.getElementById('tabelaplanoselecionado');
        var rowCount = table.rows.length;
        for (var i = tableHeaderRowCount; i < rowCount; i++) {
        table.deleteRow(tableHeaderRowCount);
        }
    }
        
    
    function filtset(){
        $("#setselect").empty();
        var select = document.getElementById('setselect');
        var opt = document.createElement('option');
        opt.appendChild(document.createTextNode('---'));
        opt.value = '';
        select.appendChild(opt);
        $.ajax({
                type: "GET",
                url: "/consultacadastroset",
                data: {dep:$("[name='dep']").val(),},
                dataType: "json",
                success: function(data) {
                    for(var i = 0; i<data['id'].length; i++){
                        var opt = document.createElement('option');
                        opt.appendChild(document.createTextNode(data['nome'][i]));
                        opt.value = data['id'][i];
                        select.appendChild(opt);
                    }
                }
            });
    }
    function filtfunc(){
        $("#funcselect").empty();
        var select = document.getElementById('funcselect');
        var opt = document.createElement('option');
        opt.appendChild(document.createTextNode('---'));
        opt.value = '';
        select.appendChild(opt);
        $.ajax({
                type: "GET",
                url: "/consultacadastrofunc",
                data: {set:$("[name='setor']").val(),},
                dataType: "json",
                success: function(data) {
                    for(var i = 0; i<data['id'].length; i++){
                        var opt = document.createElement('option');
                        opt.appendChild(document.createTextNode(data['nome'][i]));
                        opt.value = data['id'][i];
                        select.appendChild(opt);
                    }
                }
            });
    }
    function tel1(){
        if(document.getElementById('tel1input').value[5] != '9'){
            $('#tel1input').inputmask('(99) 9999-9999');
        }else{
            $('#tel1input').inputmask('(99) 9999[9]-9999');
        }
    }
    function tel2(){
        if(document.getElementById('tel2input').value[5] != '9'){
            $('#tel2input').inputmask('(99) 9999-9999');
        }else{
            $('#tel2input').inputmask('(99) 9999[9]-9999');
        }
    }
    function telres(){
        if(document.getElementById('telresinput').value[5] != '9'){
            $('#telresinput').inputmask('(99) 9999-9999');
        }else{
            $('#telresinput').inputmask('(99) 9999[9]-9999');
        }
    }
    function contatorep(){
        if(document.getElementById('contatorepinput').value[5] != '9'){
            $('#contatorepinput').inputmask('(99) 9999-9999');
        }else{
            $('#contatorepinput').inputmask('(99) 9999[9]-9999');
        }
    }
    function subTipo(){
        $('.input').css('display', 'none');
        if(document.getElementById('tipo_pessoa').value == 'fis'){
            document.getElementById('subtipo').innerHTML = "<div class='flexdiv respflexdiv'><div class='flexdiv'><input type='checkbox' value='Paciente' id='Paciente' onclick='esconder()'>&nbsp;&nbsp;<span>Cliente</span></div><div class='flexdiv f02'><input type='checkbox' value='Fornecedor' id='Fornecedor' onclick='esconder()'>&nbsp;&nbsp;<span>Fornecedor</span></div><div class='flexdiv f02'><input type='checkbox' value='Funcionario' id='Funcionario' onclick='esconder()'>&nbsp;&nbsp;<span>Funcionário</span></div></div>";
        }else if(document.getElementById('tipo_pessoa').value == 'jur'){
            document.getElementById('subtipo').innerHTML = "<div class='flexdiv respflexdiv'><div class='flexdiv'><input type='checkbox' value='Fornecedor' id='Fornecedor' onclick='esconder()'>&nbsp;&nbsp;<span>Fornecedor</span></div></div><div class='flexdiv f02'><input type='checkbox' value='Cliente' id='Cliente' onclick='esconder()'>&nbsp;&nbsp;<span>Cliente</span></div>";
        }else{
            document.getElementById('subtipo').innerHTML="";
        }
    }
    function novodep(){
        document.getElementById('depnovo').innerHTML="<span class='nomesinputs'>Novo Departamento</span><br><input type='text' class='inputstexttelas inputtextmedio' id='depnovoinput' name='depnovoinput'><br><br><button type='submit' class='btn btamarelo' value='Cadastrar Departamento' onclick='cadastrodep()'><span class='selectacoes'>Cadastrar Departamento</span></button>";
        document.getElementById('depnovo').style.display='block';
    }
    function novoset(){
        document.getElementById('setnovo').innerHTML="<span class='nomesinputs'>Novo Setor</span><br><input type='text' class='inputstexttelas inputtextcc' id='setnovoinput' name='setnovoinput'><br><span class='nomesinputs'>Departamento</span><br><select name='setnovodep' id='setnovodep' class='form-select selectcategoria'></select><br><br><button type='submit' class='btn btamarelo' value='Cadastrar Setor' onclick='cadastroset()'><span class='selectacoes'>Cadastrar Setor</span></button>";
        document.getElementById('setnovo').style.display='block';
        $.ajax({
                type: "GET",
                url: "/consultacadastrodep",
                data: {},
                dataType: "json",
                success: function(data) {
                    var select = document.getElementById('setnovodep');
                    for(var i = 0; i<data['id'].length; i++){
                        var opt = document.createElement('option');
                        opt.appendChild(document.createTextNode(data['nome'][i]));
                        opt.value = data['id'][i];
                        select.appendChild(opt);
                    }         
                filtset();
                }
            });
    }
    function novofunc(){
        document.getElementById('funcnovo').innerHTML="<span class='nomesinputs'>Nova Função</span><br><input type='text' class='inputstexttelas inputtextcc' id='funcnovoinput' name='funcnovoinput'><br><span class='nomesinputs'>Setor</span><br><select name='funcnovoset' id='funcnovoset' class='form-select selectcategoria'></select><br><br><button type='submit' class='btn btamarelo' value='Cadastrar Função' onclick='cadastrofunc()'><span class='selectacoes'>Cadastrar Função</span></button>";
        document.getElementById('funcnovo').style.display='block';
        $.ajax({
                type: "GET",
                url: "/consultacadastroset",
                data: {},
                dataType: "json",
                success: function(data) {
                    console.log(data);
                    var select = document.getElementById('funcnovoset');
                    for(var i = 0; i<data['id'].length; i++){
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
            document.getElementById('logradouroinput').value=("");
            document.getElementById('bairroinput').value=("");
            document.getElementById('cidadeinput').value=("");
            document.getElementById('ufinput').value=("");
    }
    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('logradouroinput').value=(conteudo.logradouro);
            document.getElementById('bairroinput').value=(conteudo.bairro);
            document.getElementById('cidadeinput').value=(conteudo.localidade);
            document.getElementById('ufinput').value=(conteudo.uf);
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
                if(validacep.test(cep)) {
                    //Preenche os campos com "..." enquanto consulta webservice.
                    document.getElementById('logradouro').value="...";
                    document.getElementById('bairro').value="...";
                    document.getElementById('cidade').value="...";
                    document.getElementById('uf').value="...";
                    //Cria um elemento javascript.
                    var script = document.createElement('script');
                    //Sincroniza com o callback.
                    script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';
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

    function adicionarplano(dado) {
        $('#tabelaplanoselecionado').css('display', 'block');
        var tableHeaderRowCount = 1;
        var table = document.getElementById('tabelaplanoselecionado');
        var rowCount = table.rows.length;
        for (var i = tableHeaderRowCount; i < rowCount; i++) {
        table.deleteRow(tableHeaderRowCount);
        }

        $.ajax({
            type: "GET",
            url: "/consultarplano",
            data: {
                plano: document.getElementById('selectplanos').value
            },
            dataType: "json",
            success: function(data) {
                planoatual = document.getElementById('selectplanos').value;
                var tabela = document.getElementById('tabelaplanoselecionadobody');
                var numeroLinhas = tabela.rows.length;
                var linha = tabela.insertRow(numeroLinhas);
                var celula1 = linha.insertCell(0);
                var celula2 = linha.insertCell(1);
                var celula3 = linha.insertCell(2);
                var celula4 = linha.insertCell(3);
                var celula5 = linha.insertCell(4);
                var celula6 = linha.insertCell(5);
                celula1.innerHTML = data['plan_nome'];
                celula2.innerHTML = data['plan_desc'];
                celula3.innerHTML = data['plan_qtddep'];
                // celula4.innerHTML = data['plan_'][3];
                // celula5.innerHTML = data['plan_'][4];
                // celula6.innerHTML = data['plan_'][5];
                celula4.innerHTML = data['plan_valorboleto'].toLocaleString('pt-br', {
                style: 'currency',
                currency: 'BRL'
                });
                celula5.innerHTML = data['plan_valorcartao'].toLocaleString('pt-br', {
                style: 'currency',
                currency: 'BRL'
                });
                celula6.innerHTML = data['plan_adesao'].toLocaleString('pt-br', {
                style: 'currency',
                currency: 'BRL'
                });
            }
        });
    }
    function esconder() {
        if(document.getElementById('tipo_pessoa').value=='fis'){
            if(document.getElementById('Paciente').checked==true || document.getElementById('Funcionario').checked==true || document.getElementById('Fornecedor').checked==true){
                
                document.getElementById('cadastrarpessoabutton').style.display = 'block';
                document.getElementById('cadastrarpessoasbutton').style.display = 'block';
                document.getElementById('nomesblocos').style.display = 'block';
                document.getElementById('nomesblocos1').style.display = 'block';
                document.getElementById('nomesblocos2').style.display = 'block';
                document.getElementById('nomesblocos3').style.display = 'block';
                document.getElementById('nomesblocos5').style.display = 'block';
                document.getElementById('destaquegrupos').style.display = 'block';
                document.getElementById('destaquegrupos1').style.display = 'block';
                document.getElementById('destaquegrupos2').style.display = 'block';
                document.getElementById('destaquegrupos3').style.display = 'block';
                document.getElementById('destaquegrupos4').style.display = 'block';
                document.getElementById('destaquegrupos5').style.display = 'block';


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
                if(document.getElementById('Paciente').checked==true){
                    document.getElementById('cadastrarpessoabutton').style.display = 'block';
                    document.getElementById('cadastrarpessoasbutton').style.display = 'block';
                    document.getElementById('nome').style.display = 'block';
                    document.getElementById('estadocivil').style.display = 'block';
                    document.getElementById('sexo').style.display = 'block';
                    document.getElementById('prof').style.display = 'block';
                    document.getElementById('nomeres').style.display = 'block';
                    document.getElementById('telres').style.display = 'block';
                    document.getElementById('nomeres').innerHTML = "<label for='nomeresinput' class='form-label'>Nome do responsável</label><input type='text' class='form-control' name='nomeres' id='nomeresinput' aria-describedby='nomeresponsavel'/>";
                    document.getElementById('telres').innerHTML = "<label for='telresinput' class='form-label'>Tel. do responsável</label><input type='text' class='form-control' name='telres' id='telresinput'  onkeypress='telres()' aria-describedby='telresponsavel'/>";
                    $('#telresinput').inputmask('(99) 9999[9]-9999');
                }
                if(document.getElementById('Paciente').checked==false){
                    document.getElementById('prof').style.display = 'none';
                    document.getElementById('nomeres').style.display = 'none';
                    document.getElementById('telres').style.display = 'none';
                }
                if(document.getElementById('Funcionario').checked==true){
                    document.getElementById('nomesblocos4').style.display = 'block';
                    document.getElementById('cadastrarpessoabutton').style.display = 'block';
                    document.getElementById('cadastrarpessoasbutton').style.display = 'block';
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
                    document.getElementById('user_name').style.display = 'block';
                    document.getElementById('user_senha').style.display = 'block';
                    document.getElementById('user_tipo').style.display = 'block';
                }
                if(document.getElementById('Funcionario').checked==false){
                    document.getElementById('destaquegrupos4').style.display = 'none';
                    document.getElementById('nomesblocos4').style.display = 'none';
                    document.getElementById('dep').style.display = 'none';
                    document.getElementById('setor').style.display = 'none';
                    document.getElementById('func').style.display = 'none';
                    document.getElementById('ctps').style.display = 'none';
                    document.getElementById('serie').style.display = 'none';
                    document.getElementById('pis').style.display = 'none';
                    document.getElementById('ufctps').style.display = 'none';
                    document.getElementById('salario').style.display = 'none';
                    document.getElementById('conjugue').style.display = 'none';
                    document.getElementById('pai').style.display = 'none';
                    document.getElementById('mae').style.display = 'none';
                    document.getElementById('user_name').style.display = 'none';
                    document.getElementById('user_senha').style.display = 'none';
                    document.getElementById('user_tipo').style.display = 'none';
                } 
            }
            if(document.getElementById('Fornecedor').checked==true){
                document.getElementById('cadastrarpessoabutton').style.display = 'block';
                document.getElementById('cadastrarpessoasbutton').style.display = 'block';
                document.getElementById('estadocivil').style.display = 'block';
                document.getElementById('sexo').style.display = 'block';
                document.getElementById('razaosocial').style.display = 'block';
                document.getElementById('website').style.display = 'block';
                document.getElementById('areaatuacao').style.display = 'block';
            }
            if(document.getElementById('Fornecedor').checked==false){
                document.getElementById('razaosocial').style.display = 'none';
                document.getElementById('website').style.display = 'none';
                document.getElementById('areaatuacao').style.display = 'none';
            }
            if(document.getElementById('Paciente').checked==false && document.getElementById('Funcionario').checked==false && document.getElementById('Fornecedor').checked==false){
                $('.input').css('display', 'none');
            }
            
        }
        if(document.getElementById('tipo_pessoa').value=='jur'){
            if(document.getElementById('Fornecedor').checked==true || document.getElementById('Cliente').checked==true){
                document.getElementById('cadastrarpessoabutton').style.display = 'block';
                document.getElementById('cadastrarpessoasbutton').style.display = 'block';
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
                
                if(document.getElementById('Fornecedor').checked==true){
                    document.getElementById('cadastrarpessoabutton').style.display = 'block';
                    document.getElementById('cadastrarpessoasbutton').style.display = 'block';
                }
                if(document.getElementById('Fornecedor').checked==false){
                }
                if(document.getElementById('Cliente').checked==true){
                    document.getElementById('cadastrarpessoabutton').style.display = 'block';
                    document.getElementById('cadastrarpessoasbutton').style.display = 'block';
                }
                if(document.getElementById('Cliente').checked==false){
                }
            }else{
                $('.input').css('display', 'none');
            }
            
        }
        
        
        
    }
    
    function cadastrarPessoa(){
        if(document.getElementById('tipo_pessoa').value == 'fis'){
            if(document.getElementById('Paciente').checked==true){
                var checartel = 0;
                if($("[name='tel1']").val().replace(/[^a-z0-9]/gi,'').length == 11 || $("[name='tel1']").val().replace(/[^a-z0-9]/gi,'').length == 10){
                    checartel = 1
                }
                if(cpfcheck == 1){
                    if($("[name='nome']").val() != '' && checartel == 1 && $("[name='datanasc']").val() != ''){
                        $.ajax({
                        type: "GET",
                        url: "/cadastro/cadastropaciente",
                        data: {
                            nome:$("[name='nome']").val(),
                            cpf:$("[name='cpf']").val(),
                            rg:$("[name='rg']").val(),
                            email:$("[name='email']").val(),
                            datanasc:$("[name='datanasc']").val(),
                            estadocivil:$("[name='estadocivil']").val(),
                            sexo:$("[name='sexo']").val(),
                            prof:$("[name='prof']").val(),
                            cep:$("[name='cep']").val(),
                            logradouro:$("[name='logradouro']").val(),
                            num:$("[name='num']").val(),
                            complemento:$("[name='complemento']").val(),
                            bairro:$("[name='bairro']").val(),
                            cidade:$("[name='cidade']").val(),
                            uf:$("[name='uf']").val(),
                            tel1:$("[name='tel1']").val(),
                            tel2:$("[name='tel2']").val(),
                            celular:$("[name='celular']").val(),
                            nomeres:$("[name='nomeres']").val(),
                            telres:$("[name='telres']").val(),
                            obs:$("[name='obs']").val(),
                            altura:$("[name='altura']").val(),
                            peso:$("[name='peso']").val(),
                            pa:$("[name='pa']").val(),
                            tiposangue:$("[name='tiposangue']").val(),
                            planoatual: planoatual,
                        },
                        dataType: "json",
                        success: function(data) {
                            $('#exampleModal4').modal('show');
                            console.log("Cliente cadastrado com sucesso!");
                        }
                        });
                    }
                }else{
                    $('#errocpfmodal').modal('show');
                }
                
            }
            if(document.getElementById('Fornecedor').checked==true){
                $.ajax({
                type: "GET",
                url: "/cadastro/cadastrofornecedorfisico",
                data: {
                    nome:$("[name='nome']").val(),
                    cpf:$("[name='cpf']").val(),
                    rg:$("[name='rg']").val(),
                    cep:$("[name='cep']").val(),
                    datanasc:$("[name='datanasc']").val(),
                    estadocivil:$("[name='estadocivil']").val(),
                    sexo:$("[name='sexo']").val(),
                    logradouro:$("[name='logradouro']").val(),
                    num:$("[name='num']").val(),
                    complemento:$("[name='complemento']").val(),
                    bairro:$("[name='bairro']").val(),
                    cidade:$("[name='cidade']").val(),
                    uf:$("[name='uf']").val(),
                    celular:$("[name='celular']").val(),
                    tel1:$("[name='tel1']").val(),
                    tel2:$("[name='tel2']").val(),
                    email:$("[name='email']").val(),
                    obs:$("[name='obs']").val(),
                    empresa:$("[name='empresa']").val(),
                    razaosocial:$("[name='razaosocial']").val(),
                    website:$("[name='website']").val(),
                    areaatuacao:$("[name='areaatuacao']").val(),
                    obs:$("[name='obs']").val(),
                    altura:$("[name='altura']").val(),
                    peso:$("[name='peso']").val(),
                    pa:$("[name='pa']").val(),
                    tiposangue:$("[name='tiposangue']").val(),
                    planoatual: planoatual,
                },
                dataType: "json",
                success: function(data) {
                    $('#exampleModal5').modal('show');
                    console.log('Fornecedor Físico cadastrado com sucesso!');
                    }
                });
            }
            if(document.getElementById('Funcionario').checked==true){
                $.ajax({
                type: "GET",
                url: "/cadastro/cadastrofuncionario",
                data: {
                    nome:$("[name='nome']").val(),
                    cpf:$("[name='cpf']").val(),
                    rg:$("[name='rg']").val(),
                    email:$("[name='email']").val(),
                    datanasc:$("[name='datanasc']").val(),
                    estadocivil:$("[name='estadocivil']").val(),
                    sexo:$("[name='sexo']").val(),
                    cep:$("[name='cep']").val(),
                    logradouro:$("[name='logradouro']").val(),
                    num:$("[name='num']").val(),
                    complemento:$("[name='complemento']").val(),
                    bairro:$("[name='bairro']").val(),
                    cidade:$("[name='cidade']").val(),
                    uf:$("[name='uf']").val(),
                    tel1:$("[name='tel1']").val(),
                    tel2:$("[name='tel2']").val(),
                    celular:$("[name='celular']").val(),
                    dep:$("[name='dep']").val(),
                    setor:$("[name='setor']").val(),
                    func:$("[name='func']").val(),
                    ctps:$("[name='ctps']").val(),
                    serie:$("[name='serie']").val(),
                    ufctps:$("[name='ufctps']").val(),
                    pis:$("[name='pis']").val(),
                    salario:$("[name='salario']").val(),
                    conjugue:$("[name='conjugue']").val(),
                    nomepai:$("[name='pai']").val(),
                    nomemae:$("[name='mae']").val(),
                    obs:$("[name='obs']").val(),
                    altura:$("[name='altura']").val(),
                    peso:$("[name='peso']").val(),
                    pa:$("[name='pa']").val(),
                    tiposangue:$("[name='tiposangue']").val(),
                    planoatual: planoatual,
                },
                dataType: "json",
                success: function(data) {
                    $('#exampleModal6').modal('show');
                    console.log('Funcionário cadastrado com sucesso!');
                    }
                });

                if($("[name='user_name']").val() != ''){
                    setTimeout(function(){ 

                        $.ajax({
                        type: "GET",
                        url: "/cadastro/cadastrousuario",
                        data: {
                            name:$("[name='nome']").val(),
                            email:$("[name='email']").val(),
                            user_name:$("[name='user_name']").val(),
                            user_senha:$("[name='user_senha']").val(),
                            user_tipo:$("[name='user_tipo']").val(),
                        },
                        dataType: "json",
                        success: function(data) {
                            console.log('Usuário cadastrado com sucesso!');
                            }
                        });
                        
                    }, 1000);
                    
                }
            }
        }
        if(document.getElementById('tipo_pessoa').value == 'jur'){
            if(document.getElementById('Fornecedor').checked==true){
                $.ajax({
                type: "GET",
                url: "/cadastro/cadastrofornecedorjuridico",
                data: {
                    nome:$("[name='nome']").val(),
                    cnpj:$("[name='cnpj']").val(),
                    email:$("[name='email']").val(),
                    cep:$("[name='cep']").val(),
                    logradouro:$("[name='logradouro']").val(),
                    num:$("[name='num']").val(),
                    complemento:$("[name='complemento']").val(),
                    bairro:$("[name='bairro']").val(),
                    cidade:$("[name='cidade']").val(),
                    uf:$("[name='uf']").val(),
                    tel1:$("[name='tel1']").val(),
                    tel2:$("[name='tel2']").val(),
                    celular:$("[name='celular']").val(),
                    website:$("[name='website2']").val(),
                    inscest:$("[name='inscest2']").val(),
                    razaosocial:$("[name='razaosocial2']").val(),
                    areaatuacao:$("[name='areaatuacao2']").val(),
                    nomerep:$("[name='nomerep2']").val(),
                    emailrep:$("[name='emailrep2']").val(),
                    contatorep:$("[name='contatorep2']").val(),
                    obs:$("[name='obs']").val(),
                },
                dataType: "json",
                success: function(data) {
                    $('#exampleModal7').modal('show');
                    console.log('Fornecedor Jurídico cadastrado com sucesso!');
                    }
                });
            }
            if(document.getElementById('Cliente').checked==true){
                $.ajax({
                type: "GET",
                url: "/cadastro/cadastroclientejuridico",
                data: {
                    nome:$("[name='nome']").val(),
                    cnpj:$("[name='cnpj']").val(),
                    email:$("[name='email']").val(),
                    cep:$("[name='cep']").val(),
                    logradouro:$("[name='logradouro']").val(),
                    num:$("[name='num']").val(),
                    complemento:$("[name='complemento']").val(),
                    bairro:$("[name='bairro']").val(),
                    cidade:$("[name='cidade']").val(),
                    uf:$("[name='uf']").val(),
                    tel1:$("[name='tel1']").val(),
                    tel2:$("[name='tel2']").val(),
                    celular:$("[name='celular']").val(),
                    website:$("[name='website2']").val(),
                    inscest:$("[name='inscest2']").val(),
                    razaosocial:$("[name='razaosocial2']").val(),
                    areaatuacao:$("[name='areaatuacao2']").val(),
                    nomerep:$("[name='nomerep2']").val(),
                    emailrep:$("[name='emailrep2']").val(),
                    contatorep:$("[name='contatorep2']").val(),
                    obs:$("[name='obs']").val(),
                },
                dataType: "json",
                success: function(data) {
                    $('#exampleModal8').modal('show');
                    console.log('Cliente Jurídico cadastrado com sucesso!');
                }
                });
            }
        }
        
    }
    function cadastrodep(){
        $.ajax({
                type: "GET",
                url: "/cadastro/cadastrodepartamento",
                data: {
                    nome:$("[name='depnovoinput']").val(),
                },
                dataType: "json",
                success: function(data) {
                    console.log('Departamento cadastrado com sucesso');
                    document.getElementById('depnovo').style.display='none'
                    consdep();
                    }
                });
    }
    function cadastroset(){
        $.ajax({
                type: "GET",
                url: "/cadastro/cadastrosetor",
                data: {
                    nome:$("[name='setnovoinput']").val(),
                    dep:$("[name='setnovodep']").val(),
                },
                dataType: "json",
                success: function(data) {
                    console.log('Setor cadastrado com sucesso');
                    document.getElementById('setnovo').style.display='none';
                    filtset();
                    }
                });
    }
    function cadastrofunc(){
        $.ajax({
                type: "GET",
                url: "/cadastro/cadastrofuncao",
                data: {
                    nome:$("[name='funcnovoinput']").val(),
                    set:$("[name='funcnovoset']").val(),
                },
                dataType: "json",
                success: function(data) {
                    console.log('Função cadastrada com sucesso');
                    document.getElementById('funcnovo').style.display='none';
                    filtfunc();
                    }
                });
    }

    function iragendamento(){
        var url1 = window.location.href.split('/');
        window.location.href = ('https://' + url1[2] + '/cadastro/agenda');
    }
</script>
@endsection
</html>