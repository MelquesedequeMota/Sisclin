@extends('layouts.Menu')
@section('atalhoSuperior')@endsection
@section('menuLateral')@endsection

<!DOCTYPE html>
<html lang="pt-br">
<head> 
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- icons -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">  
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
    <title>Telecobrança</title>

    <style>
        .fontmenor{
            font-size:14px!important;
        }
        .lote,.avulsa{
            border: 2px solid #d1941a;
            background: transparent;
            color: #d1941a!important;
        }

        .gerarremessa{
            border: 2px solid #0846a1;
            background: transparent;
        }

        .validadoefechado{
            display: flex;
            width: 8rem;
            justify-content: space-between;
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

        .btnnovacobranca{
            width: 126px;
            height: 34px;    
            background: #3AA97B;
            border:none;
            border-radius: 6px;
            align-self:end;
            margin-left:1rem;

            display: flex;
            align-items: center;
            justify-content: space-around;
            padding: 5px;

            font-family: 'Source Sans Pro', sans-serif;
            font-style: normal;
            font-weight: 600;
            font-size: 15.3px;
            line-height: 20px;
            letter-spacing: -0.5px;
            color: #FFFFFF;
        }
        
        .bteditarcobranca{
            background: #1853B4;
            border-radius: 6px;
        }

        .table>:not(caption)>*>* {
            padding: 0.6rem 0.7rem!important;
        }

        .container-fluid {
            max-width: 1050px!important;
        }

        .iconscobranca{
            width:28px;
        }

        @media (max-width: 575px) {
            .teste{
                width:100%;
                margin-top: 2rem;
            }
        }


        /* .ui-autocomplete {
            position: absolute;
            top: 100%;
            left: 0;
            z-index: 1000;
            float: left;
            display: none;
            min-width: 160px;   
            padding: 4px 0;
            margin: 0 0 10px 25px;
            list-style: none;
            background-color: grey;
            border-color: #ccc;
            border-color: rgba(0, 0, 0, 0.2);
            border-style: solid;
            border-width: 1px;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;
            -webkit-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
            -moz-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
            -webkit-background-clip: padding-box;
            -moz-background-clip: padding;
            background-clip: padding-box;
            *border-right-width: 2px;
            *border-bottom-width: 2px;
        } */
    </style>
</head>
<body>
@section('Conteudo')
    <!-- <button type="button" class="btn btn-success" style='font-size:14px'>
        Remessa
    </button>

    <button type="button" class="btn btn-success" style='font-size:14px'>
        Cobrança
    </button>

    <button type="button" class="btn btn-success" style='font-size:14px'>
        Cobrança Recorrente
    </button> -->

    <div class='' style='display:flex'>
        <div class='tituloprincipal'>Telecobrança</div>
        <!-- <button class='btnnovacobranca' onclick='abrirnovacobranca()'><img src="../imagens/plus2.svg" alt="">Nova Cobrança</button> -->
    </div>

    <div class="container-fluid" style='margin-top:3rem;'>
        <div class="row gx-3 gy-3">
            <div class="col-sm-5 col-md-5 col-lg-4">
                <div class="teste3">
                    <label for="pessoatitular" class="form-label">Cliente</label>
                    <input type="text" class="form-control bordainputs" id='pessoatitular'/>
                </div>
            </div>
            <div class="col-sm-4 col-md-3 col-lg-2">
                <div class="teste1">
                    <label for="datainicio" class="form-label">Data Início</label>
                    <input type="date" class="form-control bordainputs" id='datainicio'/>
                </div>
            </div>
            <div class="col-sm-4 col-md-3 col-lg-2">
                <div class="teste3">
                    <label for="datafim" class="form-label">Data Fim</label>
                    <input type="date" class="form-control bordainputs" id='datafim'/>
                </div>
            </div>
            <div class="col-sm-3 col-md-2 col-lg-2">
                <div class="teste1">
                    <label for="parcelasatrasadas" class="form-label">Parcelas em atraso</label>
                    <select class="form-select bordainputs" name="parcelasatrasadas" id='parcelasatrasadas'>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                    </select>
                </div>
            </div>

            <div class="col-sm-5 col-md-3 col-lg-2">
                <div class="teste">
                    <label for="cidade" class="form-label">Cidade</label>
                    <select class="form-select bordainputs" id="cidade">
                        <option value="todas">Todas</option>
                        <option value="fortaleza">Fortaleza</option>
                        <option value="caucaia">Caucaia</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-5 col-md-4 col-lg-3">
                <div class="teste">
                    <label for="bairro" class="form-label">Bairro</label>
                    <select class="form-select bordainputs" id="bairro">
                        <option value="">b</option>
                        <option value="">c</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-3 col-md-2 col-lg-1" style="display: flex;align-self: end;">
                <div class="teste">
                <button type="submit" class="btn btamarelo" value='Pesquisar' onclick=''>
                    <span class="fontebotao" style='font-size:17px'>Pesquisar</span>
                </button>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid" style='max-width:1132px!important'>
        <div id='tabela' class="table-responsive-md" style='margin-bottom: 2.5rem;'>
            <table id='' class="table">
                <thead class="table-active">
                    <tr>
                    <td scope="col">Cliente</td>
                    <td scope="col">Contrato</td>
                    <td scope="col">Número</td>
                    <td scope="col">Atrasado</td>
                    <td scope="col">Valor</td>
                    <td scope="col">Ações</td>
                    </tr>
                </thead>
                <tbody id='cobrancatbody' style='text-align:center'>

                </tbody>
            </table>
        </div>
    </div>


    <div class="modal fade" id="novacobrancaModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered  modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Nova Cobrança</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <button type="button" class="btn lote" onclick='novacobrancalote()'>Cobrança em Lote</button>
                    <button type="button" class="btn avulsa" onclick='novacobrancaavulsa()'>Cobrança Avulsa</button>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button> -->
                    <button type="button" class="btn btn-success" onclick='novacobrancaConfirm()'>Cadastrar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="novacobrancaloteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered  modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Nova Cobrança em Lote</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body ui-front">
                    <div>
                        <div class="teste3">
                            <label for="cobradorresp" class="form-label">Responsável</label>
                            <input type="text" class="form-control bordainputs" id='resplote' onkeypress='pesquisarnome(this, "lote")' onfocusout='procurardadoslote(this)'/>
                        </div>
                    </div>
                    <div>
                        <div class="teste1">
                            <label for="datainicio" class="form-label">Data Requerimento(Cobrança)</label>
                            <input type="date" class="form-control bordainputs" id='datalote' onchange='calculardatas(this)'/>
                        </div>
                    </div>
                    <div>
                        <div class="teste1">
                            <label for="datainicio" class="form-label">Data Carência</label>
                            <input type="date" class="form-control bordainputs" id='datacarencialote'/>
                        </div>
                    </div>
                    <div>
                        <div class="teste1">
                            <label for="datainicio" class="form-label">Data Inicio</label>
                            <input type="date" class="form-control bordainputs" id='datainiciolote'/>
                        </div>
                    </div>
                    <div>
                        <div class="teste1">
                            <label for="datainicio" class="form-label">Data Regente</label>
                            <input type="date" class="form-control bordainputs" id='datareajustelote'/>
                        </div>
                    </div>
    
                    <div>
                        <div class="teste">
                            <label for="cidade" class="form-label">Cidade</label>
                            <select class="form-select bordainputs" id="cidadeslote">
                                <option value="">Selecionar uma Cidade</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <div class="teste">
                            <label for="cidade" class="form-label">Dia do Pagamento</label>
                            <input type="number" class="form-control bordainputs" id='diapaglote' min = '1' max = '31'/>
                        </div>
                    </div>

                    <div>
                        <div class="teste3">
                            <label for="cobradorresp" class="form-label">Valor</label>
                            <input type="text" class="form-control bordainputs" id='valorlote'/>
                        </div>
                    </div>

                    <div>
                        <div class="teste3">
                            <label for="cobradorresp" class="form-label">Vendedor</label>
                            <input type="text" class="form-control bordainputs" id='vendedorlote' onkeypress='pesquisarnomevendedor(this)'/>
                        </div>
                    </div>
    
                    <div>
                        <div class="validadoefechado" style='margin-top: 0.6rem;'>
                            <label for="cobradorresp" class="form-label">Validado</label>
                            <input type='checkbox' value='validadolote' id='validadolote'>
                        </div>
                    </div>
    
                    <div>
                        <div class="validadoefechado">
                            <label for="cobradorresp" class="form-label">Fechado</label>
                            <input type='checkbox' value='fechadolote' id='fechadolote'>
                        </div>
                    </div>
                </div>
                <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                </div> -->
            </div>
        </div>
    </div>

    <div class="modal fade" id="novacobrancaavulsaModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered  modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Nova Cobrança Avulsa</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body ui-front">
                    
                <div>
                    <div class="teste3">
                        <label for="cobradorresp" class="form-label">Responsável</label>
                        <input type="text" class="form-control bordainputs" id='respavulsa' onkeypress='pesquisarnome(this, "avulsa")'/>
                    </div>
                </div>
                <div>
                    <div class="teste1">
                        <label for="datainicio" class="form-label">Data Cobrança</label>
                        <input type="date" class="form-control bordainputs" id='dataavulsa'/>
                    </div>
                </div>

                <div>
                    <div class="teste">
                        <label for="cidade" class="form-label">Cidade</label>
                        <select class="form-select bordainputs" id="cidadesavulsa">
                            <option value="">Selecionar uma Cidade</option>
                        </select>
                    </div>
                </div>
                <div>
                    <div class="teste3">
                        <label for="cobradorresp" class="form-label">Valor</label>
                        <input type="text" class="form-control bordainputs" id='valoravulsa'/>
                    </div>
                </div>

                <div>
                    <div class="validadoefechado" style='margin-top: 0.6rem;'>
                        <label for="cobradorresp" class="form-label">Validado</label>
                        <input type='checkbox' value='validadoavulsa' id='validadoavulsa'>
                    </div>
                </div>

                <div>
                    <div class="validadoefechado">
                        <label for="cobradorresp" class="form-label">Fechado</label>
                        <input type='checkbox' value='fechadoavulsa' id='fechadoavulsa'>
                    </div>
                </div>

                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button> -->
                    <button type="button" class="btn btn-success" onclick='criarcobrancaavulsa()'>Criar Cobrança</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="novacobrancaavulsagerarModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered  modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cobrança Avulsa Criada com Sucesso!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Cobrança Avulsa Criada com Sucesso!
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-primary" onclick='gerarremessaavulsa()'>Gerar Remessa</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="abrirloteModal" tabindex="-1" aria-labelledby="abrirloteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="abrirloteModalLabel">Lote</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h2>Informações do Lote:</h2>
                        <div id='lotebotoes'></div>
                    <br>
                    <div class="container-fluid">
                        <div id='tabela' class="table-responsive">
                            <table id='' class="table">
                                <thead class="table-active">
                                    <tr>
                                        <td scope="col">ID Lote</td>
                                        <td scope="col">ID Cobrança</td>
                                        <td scope="col">Responsável</td>
                                        <td scope="col">Contrato</td>
                                        <td scope="col">Data do Vencimento</td>
                                        <td scope="col">Fechado</td>
                                        <td scope="col">Validado</td>
                                        <td scope="col">Valor</td>
                                        <td scope="col">Ação</td>
                                    </tr>
                                </thead>
                                <tbody id='cobrancasemlotetbody' style='text-align:center'>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Ok</button>
                </div> -->
            </div>
        </div>
  </div>
</body>

<!-- <form id='formteste' enctype="multipart/form-data" method='post'>
    {{ csrf_field() }}
    <div class='input' id='input'> Arquivo de Retorno: <input type='file' name='retornotxt' id='retornotxt'></div>
    <input type='button' id='retorno' value='Retorno' onclick='testarremessa()'>
</form> -->

<script>
    var cobrancaatual = 0;
    var cidades = ['ABAIARA','ACARAPE','ACARAÚ','ACOPIARA','AIUABA','ALCÂNTARAS','ALTANEIRA','ALTO SANTO','AMONTADA','ANTONINA DO NORTE','APUIARÉS','AQUIRAZ','ARACATI','ARACOIABA','ARARENDÁ','ARARIPE','ARATUBA','ARNEIROZ','ASSARÉ','AURORA','BAIXIO','BANABUIÚ','BARBALHA','BARREIRA','BARRO','BARROQUINHA','BATURITÉ','BEBERIBE','BELA CRUZ','BOA VIAGEM','BREJO SANTO','CAMOCIM','CAMPOS SALES','CANINDÉ','CAPISTRANO','CARIDADE','CARIRÉ','CARIRIAÇU','CARIÚS','CARNAUBAL','CASCAVEL','CATARINA','CATUNDA','CAUCAIA','CEDRO','CHAVAL','CHORÓ','CHOROZINHO','COREAÚ','CRATEÚS','CRATO','CROATÁ','CRUZ','DEP. IRAPUAN PINHEIRO','ERERÉ','EUSÉBIO','FARIAS BRITO','FORQUILHA','FORTALEZA','FORTIM','FRECHEIRINHA','GENERAL SAMPAIO','GRAÇA','GRANJA','GRANJEIRO','GROAÍRAS','GUAIÚBA','GUARACIABA DO NORTE','GUARAMIRANGA','HIDROLÂNDIA','HORIZONTE','IBARETAMA','IBIAPINA','IBICUITINGA','ICAPUÍ','ICO','IGUATU','INDEPENDÊNCIA','IPAPORANGA','IPAUMIRIM','IPU','IPUEIRAS','IRACEMA','IRAUÇUBA','ITAIÇABA','ITAITINGA','ITAPAJÉ','ITAPIPOCA','ITAPIÚNA','ITAREMA','ITATIRA','JAGUARETAMA','JAGUARIBARA','JAGUARIBE','JAGUARUANA','JARDIM','JATÍ','JIJOCA DE JERICOACOARA','JUAZEIRO DO NORTE','JUCÁS','LAVRAS DA MANGABEIRA','LIMOEIRO DO NORTE','MADALENA','MARACANAÚ','MARANGUAPE','MARCO','MARTINÓPOLE','MASSAPÊ','MAURITI','MERUOCA','MILAGRES','MILHÃ','MIRAÍMA','MISSÃO VELHA','MOMBAÇA','MONSENHOR TABOSA','MORADA NOVA','MORAÚJO','MORRINHOS','MUCAMBO','MULUNGU','NOVA OLINDA','NOVA RUSSAS','NOVO ORIENTE','OCARA','ORÓS','PACAJUS','PACATUBA','PACOTI','PACUJÁ','PALHANO','PALMÁCIA','PARACURU','PARAIPABA','PARAMBU','PARAMOTI','PEDRA BRANCA','PENAFORTE','PENTECOSTE','PEREIRO','PINDORETAMA','PIQUET CARNEIRO','PIRES FERREIRA','PORANGA','PORTEIRAS','POTENGI','POTIRETAMA','QUITERIANÓPOLIS','QUIXADÁ','QUIXELÔ','QUIXERAMOBIM','QUIXERÉ','REDENÇÃO','RERIUTABA','RUSSAS','SABOEIRO','SALITRE','SANTANA DO ACARAÚ','SANTA QUITERIA','SANTANA DO CARIRI','SÃO BENEDITO','SÃO GONÇALO DO AMARANTE','SÃO JOÃO DO JAGUARIBE','SÃO LUÍS DO CURU','SENADOR POMPEU','SENADOR SÁ','SOBRAL','SOLONÓPOLE','TABULEIRO DO NORTE','TAMBORIL','TARRAFAS','TAUÁ','TEJUÇUOCA','TIANGUÁ','TRAIRI','TURURU','UBAJARA','UMARI','UMIRIM','URUBURETAMA','URUOCA','VARJOTA','VÁRZEA ALEGRE','VIÇOSA DO CEARÁ'];
    var select = document.getElementById('cidadesavulsa');
    for (var i = 0; i < cidades.length; i++) {
        var opt = document.createElement('option');
        opt.appendChild(document.createTextNode(cidades[i]));
        opt.value = i;
        select.appendChild(opt);
    }
    select = document.getElementById('cidadeslote');
    for (var i = 0; i < cidades.length; i++) {
        var opt = document.createElement('option');
        opt.appendChild(document.createTextNode(cidades[i]));
        opt.value = i;
        select.appendChild(opt);
    }

    $. extend ( $. ui . autocomplete . prototype . options ,  { 
      open :  function ( event , ui )  { 
        $ ( this ) . autocomplete ( "widget" ) . css ( { 
                "width" :  ( $ ( this ) . width ( )  +  "px" ) 
            } ) ; 
        } 
    });

    $('#valoravulsa').inputmask('decimal', {
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

    $('#valorlote').inputmask('decimal', {
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

    function apagartabelaabrirlote(){
        var tableHeaderRowCount = 0;
        var table = document.getElementById('cobrancasemlotetbody');
        var rowCount = table.rows.length;
        for (var i = tableHeaderRowCount; i < rowCount; i++) {
            table.deleteRow(tableHeaderRowCount);
        }
    }

    ultimoslotes();

    function ultimoslotes(){
        $.ajax({
            type: "GET",
            url: "ultimoslotes",
            data: {},
            dataType: "json",
            success: function(data) {
                console.log(data);
                for(i=0; i<data[0].length; i++){
                    var tabela = document.getElementById('cobrancatbody');
                    var numeroLinhas = tabela.rows.length;
                    var linha = tabela.insertRow(numeroLinhas);
                    var celula1 = linha.insertCell(0);
                    var celula2 = linha.insertCell(1);   
                    var celula3 = linha.insertCell(2); 
                    var celula4 = linha.insertCell(3);
                    var celula5 = linha.insertCell(4);
                    var celula6 = linha.insertCell(5);   
                    var celula7 = linha.insertCell(6); 
                    var celula8 = linha.insertCell(7);
                    var celula9 = linha.insertCell(8);
                    var celula10 = linha.insertCell(9);
                    celula1.innerHTML=data[0][i];
                    celula3.innerHTML=data[1][i];
                    celula4.innerHTML=data[2][i];
                    celula5.innerHTML=data[3][i];
                    if(data[4][i] == 'Não'){
                        celula6.innerHTML= "<img src='../imagens/close.svg' class='iconscobranca'>";
                    }else{
                        celula6.innerHTML= "<img src='../imagens/check.svg' class='iconscobranca'>";
                    }
                    if(data[5][i] == 'Não'){
                        celula7.innerHTML= "<img src='../imagens/close.svg' class='iconscobranca'>";
                    }else{
                        celula7.innerHTML= "<img src='../imagens/check.svg' class='iconscobranca'>";
                    }
                    celula8.innerHTML=data[6][i].toLocaleString('pt-br', {
                        style: 'currency',
                        currency: 'BRL'
                    });
                    celula9.innerHTML=data[7][i];
                    celula10.innerHTML="<button type='submit' class='btn' value='Abrir Lote' onclick='abrirlote(this)' id='"+data[0][i]+"' style='background:#2d9067;width:max-content;'><span class='fontebotao'>Abrir Lote</span></button>";
                    
                }
            }
        });
    }

    function abrirlote(input){
        $.ajax({
            type: "GET",
            url: "cobrancasdolote",
            data: {
                idlote: input.id,
            },
            dataType: "json",
            success: function(data) {
                console.log(data, data[1][0]['idlote']);
                apagartabelaabrirlote();
                $('#abrirloteModal').modal('show');
                document.getElementById('lotebotoes').innerHTML = "ID do lote: "+data[0][0]+"<br>Nome e CPF: "+data[0][1]+"<br>Contrato: "+data[0][2]+"<br>Quantidade do lote: "+data[0][3]+"<br><br><button type='submit' class='btn lote' value='Gerar Remessa do Lote' onclick='gerarremessalote(this)' id='"+data[1][0]['idlote']+"' style='margin-right:6px'><span class='fontebotao' style='color: #d1941a;'>Gerar Remessa do Lote</span></button><button type='submit' class='btn' value='Gerar Boletos do Lote' onclick='gerarboletoslote(this)' id='"+data[1][0]['idlote']+"' style='background:#d1941a;border:2px solid #d1941a'><span class='fontebotao'>Gerar Boletos do Lote</span></button>";
                for(i=0; i<data[1].length; i++){
                    var tabela = document.getElementById('cobrancasemlotetbody');
                    var numeroLinhas = tabela.rows.length;
                    var linha = tabela.insertRow(numeroLinhas);
                    var celula1 = linha.insertCell(0);
                    var celula2 = linha.insertCell(1);   
                    var celula3 = linha.insertCell(2); 
                    var celula4 = linha.insertCell(3);
                    var celula5 = linha.insertCell(4);
                    var celula6 = linha.insertCell(5);   
                    var celula7 = linha.insertCell(6); 
                    var celula8 = linha.insertCell(7);
                    var celula9 = linha.insertCell(8);
                    celula1.innerHTML=data[1][i]['idlote'];
                    celula2.innerHTML=data[1][i]['idcobranca'];
                    celula3.innerHTML=data[1][i]['responsavel'];
                    celula4.innerHTML=data[1][i]['contrato'];
                    celula5.innerHTML=data[1][i]['data'].split('-')[2] + '/' + data[1][i]['data'].split('-')[1] + '/' + data[1][i]['data'].split('-')[0];
                    if(data[1][i]['fechado'] == 0){
                        celula6.innerHTML="<img src='../imagens/close.svg' class='iconscobranca'>";
                    }else{
                        celula6.innerHTML="<img src='../imagens/check.svg' class='iconscobranca'>";
                    }
                    if(data[1][i]['validado'] == 0){
                        celula7.innerHTML="<img src='../imagens/close.svg' class='iconscobranca'>";
                    }else{
                        celula7.innerHTML="<img src='../imagens/check.svg' class='iconscobranca'>";
                    }
                    celula8.innerHTML=data[1][i]['valor'].toLocaleString('pt-br', {
                        style: 'currency',
                        currency: 'BRL'
                    });
                    celula9.innerHTML="<button type='submit' class='btn gerarremessa' value='Gerar Remessa' onclick='gerarremessaindividual(this)' id='"+data[1][i]['idcobranca']+"' style='margin-right:4px;'><span class='fontebotao fontmenor' style='color: #0846a1;'>Gerar Remessa</span></button><button type='submit' class='btn' value='Gerar Boleto' onclick='gerarboletoindividual(this)' id='"+data[1][i]['idcobranca']+"' style='background:#0846a1;border:2px solid #0846a1'><span class='fontebotao fontmenor'>Gerar Boleto</span></button>";
                    
                }
            }
        });
    }

    function pesquisarnome(input, tipo) {
        // console.log(input.id);
        var nome = $('#' + input.id).val();
        var nomes = [];
        if (nome.length >= 2) {
        $.ajax({
            type: 'GET',
            url: '../consulta/agenda/nomecontrato',
            data: {
            nomepessoa: nome
            },
            dataType: "json",
            success: function(data) {
                // console.log(data);
            if(tipo == 'avulsa'){
                for (i = 0; i < data.length; i++) {
                    if(data[i][2] == 'Particular'){
                        nomes.push(data[i][0] + " - " + data[i][1] + " - " + data[i][2]);
                    }else{
                        nomes.push(data[i][0] + " - " + data[i][1] + " - " + data[i][2] + " - " + data[i][3] );
                    }
                    
                }
            }else{
                for (i = 0; i < data.length; i++) {
                    if(data[i][2] != 'Particular'){
                        nomes.push(data[i][0] + " - " + data[i][1] + " - " + data[i][2] + " - " + data[i][3] );
                    }
                    
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

    function calculardatas(input){
        var data =  input.value.split('-');
        var datacobranca = new Date(data[0], data[1], data[2]);
        var datacarencia = new Date(datacobranca);
        var datareajuste = new Date(datacobranca);
        datacarencia.setDate(datacobranca.getDate() + 1);
        if(checkLeapYear(datacarencia.getFullYear()) == false && datacarencia.getDate() == '29' && datacarencia.getMonth() == '2'){
            datacarencia.setDate(1);
            datacarencia.setMonth(datacobranca.getMonth() + 1);
        }else if(checkLeapYear(datacarencia.getFullYear()) == true && datacarencia.getDate() == '30' && datacarencia.getMonth() == '2'){
            datacarencia.setDate(1);
            datacarencia.setMonth(datacobranca.getMonth() + 1);
        }
        datareajuste.setMonth(datacobranca.getMonth() + 11);
        if(checkLeapYear(datareajuste.getFullYear()) == false && datareajuste.getDate() == '29' && datareajuste.getMonth() == '2'){
            datareajuste.setDate(1);
            datareajuste.setMonth(datacobranca.getMonth() + 1);
        }else if(datareajuste.getDate() == '30' && datareajuste.getMonth() == '2'){
            datareajuste.setDate(1);
            datareajuste.setMonth(datacobranca.getMonth() + 1);
        }
        console.log(input.value);
        console.log(datacobranca.getFullYear() + '-' + datacobranca.getMonth() + '-' + datacobranca.getDate());
        console.log(datacarencia.getFullYear() + '-' + datacarencia.getMonth() + '-' + datacarencia.getDate());
        console.log(datareajuste.getFullYear() + '-' + datareajuste.getMonth() + '-' + datareajuste.getDate());
        document.getElementById('datacarencialote').value = datacarencia.getFullYear() + '-' + ('00' + datacarencia.getMonth()).slice(-2) + '-' + ('00' + datacarencia.getDate()).slice(-2);
        document.getElementById('datareajustelote').value = datareajuste.getFullYear() + '-' + ('00' + datareajuste.getMonth()).slice(-2) + '-' + ('00' + datareajuste.getDate()).slice(-2);
        console.log();
    }

    function checkLeapYear(year) {
        return new Date(year, 1, 29).getMonth() == 1
    }

    function pesquisarnomevendedor(input) {
        // console.log(input.id);
        var nome = $('#' + input.id).val();
        var nomes = [];
        if (nome.length >= 2) {
        $.ajax({
            type: 'GET',
            url: '../consulta/agenda/nomevendedor',
            data: {
            nomepessoa: nome
            },
            dataType: "json",
            success: function(data) {
                // console.log(data);
                for (i = 0; i < data.length; i++) {
                    nomes.push(data[i]);
                }
                nomes = nomes.filter((este, i) => nomes.indexOf(este) === i);
                $("#" + input.id).autocomplete({
                    source: nomes,
                });
                }

            });
        }
    }

    function procurardadoslote(input){
        console.log(input.value);
        var quantidade = 0;

        for (var i = 0; i < input.value.length; i++) {
            if (input.value[i] == '-') {
                quantidade++;
            }
        }
        if(quantidade >= 3){
            $.ajax({
                type: "GET",
                url: "dadoslote",
                data: {
                    contrato: document.getElementById('resplote').value.split(' - ')[2],
                },
                dataType: "json",
                success: function(data) {
                    document.getElementById('diapaglote').value = data[0];
                    document.getElementById('valorlote').value = parseFloat(data[1]);
                    console.log(data[1]);
                }
            });
        }
    }

    function abrirnovacobranca(){
        $('#novacobrancaModal').modal('show');
    }
    function novacobrancaavulsa(){
        $('#novacobrancaavulsaModal').modal('show');
        $('#novacobrancaModal').modal('hide');
        
    }
    function novacobrancalote(){
        $('#novacobrancaloteModal').modal('show');
        $('#novacobrancaModal').modal('hide');
    }

    function gerarboletoindividual(input){
        window.open('https://app.sisger.in/gerarboletoavulso?cobrancaatual=' + input.id);
    }

    function gerarboletoslote(input){
        window.open('https://app.sisger.in/gerarboletolote?cobrancaatual=' + input.id);
    }

    function gerarremessalote(input){
        window.open('https://app.sisger.in/gerarremessalote?cobrancaatual=' + input.id);
    }

    function gerarremessaindividual(input){
        window.open('https://app.sisger.in/gerarremessaavulsa?cobrancaatual=' + input.id);
    }

    function gerarremessaavulsa(){
        window.open('https://app.sisger.in/gerarremessaavulsa?cobrancaatual=' + cobrancaatual);
    }

    function criarcobrancaavulsa(){
        $.ajax({
        type: "GET",
        url: "criarcobrancaavulsa",
        data: {
          respavulsa: document.getElementById('respavulsa').value,
          dataavulsa: document.getElementById('dataavulsa').value ,
          cidadesavulsa: document.getElementById('cidadesavulsa').value,
          valoravulsa: document.getElementById('valoravulsa').value,
          validadoavulsa: document.getElementById('validadoavulsa').checked,
          fechadoavulsa: document.getElementById('fechadoavulsa').checked,
          cobrador: {{Auth::user()->id}},
        },
        dataType: "json",
        success: function(data) {
          cobrancaatual = data;
          $('#novacobrancaavulsagerarModal').modal('show');
          $('#novacobrancaavulsaModal').modal('hide');
        }
      });
    }

    // function testarremessa(){
    //     var fd = new FormData(document.getElementById('formteste'));
    //     fd.append('file', $('#retornotxt'));
    //     $.ajax({
    //         headers: {
    //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         },
    //        url: "teste/retornoteste",
    //        type: "POST",
    //        data: fd,
    //        contentType: false,
    //        cache: false,
    //        processData: false,
    //        success: function(retorno){
    //            console.log(retorno);
    //            if(retorno == 1){
    //                console.log('Retorno Registrado com Sucesso!');
    //            }
    //           }
    //     });
    // }

</script>
@endsection
</html>