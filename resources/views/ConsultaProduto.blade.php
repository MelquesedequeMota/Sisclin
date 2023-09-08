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
    <link rel="stylesheet" href="{{asset('../css/estilo.css')}}">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="{{asset('jquery.min.js')}}"></script>
    <script src="{{asset('jquery-ui-1.12.1/jquery-ui.js')}}"></script>
    <script src="{{asset('inputmask/dist/jquery.inputmask.min.js')}}"></script>
    <script src="{{asset('inputmask/dist/bindings/inputmask.binding.js')}}"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    <title>Pesquisa Produto</title>

    <style>
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
    </style>
</head>

<body>
    @section('Conteudo')
    <div class="container-fluid" style='margin-top:0rem;'>
        <div class="tituloprincipal">Pesquisa Produto</div>
    </div>

    <div class="container-fluid" style='margin-top:2rem;'>
        <div class="row gx-3 gy-3">
             <div class="col-sm-5 col-md-4 col-lg-4" >
                <div class="cor01">
                    <label for="exampleInputEmail1" class="form-label">Nome do Produto</label>
                    <input
                    type="text"
                    class="form-control"
                    aria-describedby="emailHelp"
                    name='pesquisarprodutonome' 
                    id='pesquisarprodutonome'/>
                </div>
            </div>
            <div class="col-sm-6 col-md-5 col-lg-4" >
                <div class="cor01">
                    <label for="exampleInputEmail2" class="form-label">Categoria</label>
                    <div class="direction">
                        <div class='mb-2'>
                            <select class="form-select selectcategoria" aria-label="Default select example" name="pesquisarprodutocate" id='pesquisarprodutocate'>
                                <option value=''>Selecione a categoria</option>
                            </select>
                        </div>
                        <div class='btnovaespec'>
                            <button type="submit" class="btn btamarelo" value='Pesquisar' onclick='pesquisarproduto()'>
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
                        <table id='pesquisarprodutotable' class="table">
                            <thead class="table-active">
                                <tr>
                                    <td scope="col">Nome do Produto</td>
                                    <td scope="col">Tipo</td>
                                    <td scope="col">Categoria</td>
                                    <td scope="col">Ações</td>
                                </tr>
                            </thead>
                            <tbody id='produtotablebody'>

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
            <div class="col-sm-7 col-md-5 col-lg-4 input" id='nome'>
                <div class="cor01">
                    <!-- <label for="exampleInputEmail1" class="form-label">Nome do Produto</label>
                    <input
                    type="text"
                    class="form-control"
                    aria-describedby="emailHelp"
                    name='nome'
                    id ='nomeinput'/> -->
                    <label for="nomeinput" class="form-label">Nome do Produto</label>
                    <textarea class="form-control" id="nomeinput" rows="3" name='nome' style='height:6rem'></textarea>
                </div>
            </div>
        </div>
        <div class="row gx-3 gy-3">
            <div class="col-sm-7 col-md-5 col-lg-4 input" id='desc'>
                <div class="cor01">
                    <label for="descinput" class="form-label">Descrição do Produto</label>
                    <textarea class="form-control" rows="3" name='desc' id='descinput' style='height:8rem'></textarea>
                </div>
            </div>
        </div>
        
        <div class="row gx-3 gy-3">
            <div class="col-sm-7 col-md-5 col-lg-4 input" id='tipo'>
                <div class="cor01">
                    <label for="descinput" class="form-label">Tipo do Produto</label>
                    <div style='display:flex'>
                        <div style='display:flex;align-items:center;'>
                            <input type='radio' value='Item' id='Item' name='tipo' onclick='tabelaserviitens()'>&nbsp;
                            <span>Item</span>
                        </div>
                        <div style='display:flex;align-items:center;margin-left:1.5rem'>
                            <input type='radio' value='Servico' id='Servico' name='tipo' onclick='tabelaserviitens()'>&nbsp;
                            <span>Serviço</span>
                        </div>

                        <div style='display:flex;align-items:center;margin-left:1.5rem'>
                            <input type='radio' value='Exame' id='Exame' name='tipo' onclick='tabelaserviitens()'>&nbsp;
                            <span>Exame</span>
                        </div>
                        <div style='display:flex;align-items:center;margin-left:1.5rem'>
                            <input type='radio' value='Ultrassom' id='Ultrassom' name='tipo' onclick='tabelaserviitens()'>&nbsp;
                            <span>Ultrassom</span>
                        </div>
                        <div style='display:flex;align-items:center;margin-left:1.5rem'>
                            <input type='radio' value='Raiox' id='Raiox' name='tipo' onclick='tabelaserviitens()'>&nbsp;
                            <span>RaioX</span>
                        </div>
                    </div>     
                </div>
            </div>
        </div>

        <div class="row gx-3 gy-3">
            <div class="col-sm-9 col-md-6 col-lg-5 input" id='cate'>
                <div class="cor01">
                    <label for="cateselect" class="form-label">Categoria do Produto</label>
                    <div class='direction'>
                        <select class="form-select" aria-label="Default select example" name="cate" id='cateselect'>
                            <option value=''>Selecione a categoria</option>
                        </select>
                        <button type="submit" class="btn btcategoria btamarelo" value='Pesquisar' id='catenovobutton' name='catenovobutton' onclick='novocate()' style='width: 48%;'>
                            <span class="selectacoes">Nova Categoria</span>
                        </button>
                    </div>
                    <div class='input responselect' id='catenovo'></div>
                </div>
            </div>
        </div>

        <div class="row gx-3 gy-3">
            <div class="col-sm-7 col-md-5 col-lg-3 input" id='quant'>
                <div class="cor01">
                    <label for="exampleInputEmail1" class="form-label">Quantidade Inicial</label>
                    <input
                    type="text"
                    class="form-control"
                    aria-describedby="emailHelp"
                    name='quant' 
                    id='quantinput'/>
                </div>
            </div>
        </div>
        <div class="row gx-3 gy-3">
            <div class="col-sm-7 col-md-5 col-lg-3 input" id='estqmin'>
                <div class="cor01">
                    <label for="exampleInputEmail1" class="form-label">Estoque Mínimo</label>
                    <input
                    type="number"
                    class="form-control"
                    aria-describedby="emailHelp"
                    name='estqmin' 
                    id='estqmininput' 
                    min='1'/>
                </div>
            </div>
        </div>
        <div class="row gx-3 gy-3">
            <div class="col-sm-7 col-md-5 col-lg-3 input" id='valor'>
                <div class="cor01" style='margin-top: 2.3rem;'>
                    <label for="exampleInputEmail1" class="form-label">Valor do Produto</label>
                    <input
                    type="text"
                    class="form-control"
                    aria-describedby="emailHelp"
                    name='valor' 
                    id='valorinput'
                    value='0.00'/>
                </div>
            </div>
        </div>
        <div class="row gx-3 gy-3">
            <div class="col-sm-7 col-md-5 col-lg-3 input" id='valorlabdiv'>
                <div class="cor01" style='margin-top: 2.3rem;'>
                    <label for="exampleInputEmail1" class="form-label">Valor do Laboratório</label>
                    <input
                    type="text"
                    class="form-control"
                    aria-describedby="emailHelp"
                    name='valorlab' 
                    id='valorlabinput'
                    value='0.00'/>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid" style='margin-top:2.5rem;margin-bottom:2rem;'>
        <div class="row gx-3 gy-3">
            <div class="">
                <div class="cor01">
                    <div class="input table-responsive-sm" id='tabelaitens' >
                        <table id='serviitens' class="table">
                            <thead class="table-active">
                                <tr>
                                    <td scope="col">Selecionar Item</td>
                                    <td scope="col">Quantidade</td>
                                    <td scope="col">Remover Item</td>
                                </tr>
                            </thead>
                            <tbody id='produtotablebody2'>
                    
                            </tbody>
                        </table> 
                        <button type="submit" class="btn btadd btadicionar" value='Adicionar' onclick="adicionaLinha('produtotablebody2')" id="buttonadicionarlinha" name='buttonadicionarlinha'>
                            <span class="fontebotao">Adicionar</span>
                        </button>   
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid input" id='editar' style='margin-top:2.5rem;'>
        <div style="margin-bottom: 3rem">
            <button type="submit" class="btn btamarelo" name='editarproduto' value='Editar Produto' id='editarproduto' onclick='editarProduto()'>
                <span class="selectacoes">Salvar Alterações</span>
            </button>
        </div>   
    </div>
    
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edição</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id=''>Produto editado com sucesso</div>
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
    reset();
    escondertabela();
    conscatepesquisa();
    var dadoslinhas = [];
    var contlinhas = 0;
    var todosprodutos = [[],[]];
    var itens = [[],[]];
    var linhas = [];
    var serviitens = "";
    var serviitensval = [];
    var valor = 0;
    var itens = [];
    var permissaoeditarexcluir = 0;
    var prodatual = 0;

    if({{Auth::user()->user_tipo}} != 2){
        $.ajax({
        type: "GET",
        url: "/buscarpermissoes",
        data: {userid: {{Auth::user()->user_tipo}}},
        dataType: "json",
        success: function(data) {
          if(data.indexOf('6.2') != -1){
            permissaoeditarexcluir = 1;
          }
        }
      });
    }else{
      permissaoeditarexcluir = 1;
    }

    $('#valorinput').inputmask('numeric', {
        radixPoint: ".",
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

    $('#valorlabinput').inputmask('decimal', {
        radixPoint: ".",
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

    $.ajax({
        type: "GET",
        url: "/consultacadastroitem",
        data: {},
        dataType: "json",
        success: function(data) {
            for(var i = 0; i<data['id'].length; i++){
                itens.push([data['id'][i], data['nome'][i],data['valor'][i]]);
            }
        }
    });

    $. extend ( $. ui . autocomplete . prototype . options ,  { 
      open :  function ( event , ui )  { 
        $ ( this ) . autocomplete ( "widget" ) . css ( { 
                "width" :  ( $ ( this ) . width ( )  +  "px" ) 
            } ) ; 
        } 
    });

    function pesquisarproduto(){
        apagartabela();
        apagartabelaitens();
        dadoslinhas = [];
        $.ajax({
                type: "GET",
                url: "/consulta/produto/dados",
                data: {nomeproduto: document.getElementById('pesquisarprodutonome').value, cateproduto: document.getElementById('pesquisarprodutocate').value},
                dataType: "json",
                success: function(data) {
                    document.getElementById('tabela').style.display = 'block';
                    for(i=0; i<data.length; i++){
                        var tabela = document.getElementById('produtotablebody');
                        var numeroLinhas = tabela.rows.length;
                        var linha = tabela.insertRow(numeroLinhas);
                        var celula1 = linha.insertCell(0);
                        var celula2 = linha.insertCell(1);   
                        var celula3 = linha.insertCell(2);
                        var celula4 = linha.insertCell(3);
                        dadoslinhas.push(data[i][0]);
                        celula1.innerHTML=data[i][0];
                        celula2.innerHTML=data[i][1];
                        celula3.innerHTML=data[i][2];
                        if(permissaoeditarexcluir == 1){
                            celula4.innerHTML="<select id='selectmedico"+i+"' name='selectmedico"+i+"' class='form-select selectacoes' aria-label='Default select example' onchange='acoes(this)'><option value=''>Ações</option><option value='editar'>Editar</option><option value='excluir'>Excluir</option></select>";
                        }else{
                            celula4.innerHTML="<select id='selectmedico"+i+"' name='selectmedico"+i+"' class='form-select selectacoes' aria-label='Default select example' onchange='acoes(this)'><option value=''>Ações</option><option value='editar'>Editar</option></select>";
                        }
                    }
                }
            });
    }

    function adicionaLinha(idTabela, item) {
        contlinhas++;
        linhas.push(contlinhas);
        var tabela = document.getElementById(idTabela);
        var numeroLinhas = tabela.rows.length;
        var linha = tabela.insertRow(numeroLinhas);
        var celula1 = linha.insertCell(0);
        var celula2 = linha.insertCell(1);   
        var celula3 = linha.insertCell(2); 
        celula1.innerHTML = "<select name='produto"+contlinhas+"' id='select"+contlinhas+"' name='select"+contlinhas+"' class='form-select selectcategoria' onchange='attprodid(this)'><option value=''>Selecione um Produto</option></select>"; 
        celula2.innerHTML =  "<input type='number' name='quantidade"+contlinhas+"' class='inputstexttelas inputtextcc' id='quantidade"+contlinhas+"' min = '1' value = '1' onchange='attprodquant(this)'>"; 
        celula3.innerHTML =  "<button type='submit' class='btn btdelete' value='Excluir' onclick='removeLinha(this)' id='"+contlinhas+"' name='excluirbotao"+contlinhas+"'><span class='fontebotao'>Excluir</span></button>";
        if(itens.length != 0){
            itens[0][contlinhas-1] = "";
            itens[1][contlinhas-1] = 1;
        }
        pegarprodutos(contlinhas);
        if(item != undefined){
            var item = item.split('x');
            document.getElementById("select"+contlinhas).value = item[0];
            document.getElementById("quantidade"+contlinhas).value = item[1];
            itens[0][contlinhas-1] = item[0];
            itens[1][contlinhas-1] = item[1];
        }
    }

    function removeLinha(linha) {
        var i=linha.parentNode.parentNode.rowIndex;
        document.getElementById('produtotablebody2').deleteRow(i-1);
        linhas.splice(linha.id -1, 1);
        itens[0].splice(linha.id -1, 1);
        itens[1].splice(linha.id -1, 1);
        contlinhas--;
        refazertabela();
    }
    function refazertabela(){
        apagartabelaitens();
        for(var i = 1; i<=contlinhas; i++){
            var tabela = document.getElementById('produtotablebody2');
            var numeroLinhas = tabela.rows.length;
            var linha = tabela.insertRow(numeroLinhas);
            var celula1 = linha.insertCell(0);
            var celula2 = linha.insertCell(1);   
            var celula3 = linha.insertCell(2); 
            celula1.innerHTML = "<select name='produto"+i+"' id='select"+i+"' class='form-select selectcategoria' onchange='attprodid(this)'><option value=''>Selecione um Produto</option></select>"; 
            celula2.innerHTML =  "<input type='number' name='quantidade"+i+"' class='inputstexttelas inputtextcc' id='quantidade"+i+"' min = '1' value = '1' onchange='attprodquant(this)'>"; 
            celula3.innerHTML =  "<button type='submit' class='btn btdelete' value='Excluir' onclick='removeLinha(this)' id='"+i+"'><span class='fontebotao'>Excluir</span></button>";
            pegarprodutos(i);
            setTimeout(function(){ preenchervalores(); }, 700);
            
        }
    }

    function preenchervalores(){
        for(var i = 1; i<=contlinhas; i++){
            document.getElementById('select' + i).value = itens[0][i-1];
            document.getElementById('quantidade' + i).value = itens[1][i-1];
        }
    }

    function attprodid(celula){
        itens[0][celula.id.substr(6) - 1] = celula.value;
        calcularvalor();
    }

    function attprodquant(celula){
        itens[1][celula.id.substr(10) - 1] = celula.value;
        calcularvalor();
    }

    function apagartabela(){
        var tableHeaderRowCount = 1;
        var table = document.getElementById('serviitens');
        var rowCount = table.rows.length;
        for (var i = tableHeaderRowCount; i < rowCount; i++) {
            table.deleteRow(tableHeaderRowCount);
        }
    }

    function calcularvalor(){
        valor = 0;
        for(var i = 1; i<=contlinhas; i++){
            valor += serviitensval[$("[name='produto"+i+"']").val()] * $("[name='quantidade"+i+"']").val();
        }
        document.getElementById('valorinput').value = valor;
    }

    function tabelaserviitens(){
        if($("input[name=tipo]:checked").val() == 'Servico' || $("input[name=tipo]:checked").val() == 'Exame'|| $("input[name=tipo]:checked").val() == 'Ultrassom' || $("input[name=tipo]:checked").val() == 'Raiox'){
            $('#tabelaitens').css('display', 'block');
            $('#quant').css('display', 'none');
            $('#estqmin').css('display', 'none');
            $('#cate').css('display', 'block');
            $('#valorlabdiv').css('display', 'block');
            pesquisarprodutos();
            conscate($("input[name=tipo]:checked").val());
            // setTimeout(function(){ adicionaLinha('produtotablebodycad'); }, 500);
        }else if($("input[name=tipo]:checked").val() == 'Item'){
            $('#tabelaitens').css('display', 'none');
            $('#quant').css('display', 'block');
            $('#estqmin').css('display', 'block');
            $('#cate').css('display', 'block');
            $('#valorlabdiv').css('display', 'none');
            conscate($("input[name=tipo]:checked").val());
        }else{
            $('#tabelaitens').css('display', 'none');
            $('#quant').css('display', 'none');
            $('#estqmin').css('display', 'none');
            $('#cate').css('display', 'none');
        }
        if($("input[name=tipo]:checked").val() == 'Item'){
            $('#imagemiteminput').css('display', 'block'); 
        }else{
            $('#imagemiteminput').css('display', 'none');
        }
    }

    function pesquisarprodutos(){
        todosprodutos = [[],[],[]];
        $.ajax({
            type: "GET",
            url: "/consultacadastroitem",
            data: {},
            dataType: "json",
            success: function(data) {
                for(var i = 0; i<data['id'].length; i++){
                    todosprodutos[0][i] = data['id'][i];
                    todosprodutos[1][i] = data['nome'][i];
                    todosprodutos[2][i] = data['valor'][i];
                }
            }
        });
    }

    function checar(){
        serviitens = "";
        for(var i = 1; i<=contlinhas; i++){
            serviitens += $("[name='produto"+i+"']").val() +"x" + $("[name='quantidade"+i+"']").val() + ",";
        }
        serviitens = serviitens.slice(0,serviitens.length-1);
    }

    function novocate(){
            document.getElementById('catenovo').innerHTML="<div class='novacategoria'><div><br><span class='nomesinputs'>Nova Categoria</span><br><input type='text' id='catenovoinput' name='catenovoinput' class='inputstexttelas'></div><br><div><span class='nomesinputs'>Descrição</span><br><input type='text' id='catenovodescinput' name='catenovodescinput' class='catendescinput inputstexttelas'></div> <div><br><button class='btn btamarelo' onclick='cadastrocate()'><span class='selectacoes'>Cadastrar Categoria</span></button></div></div><br>";
            document.getElementById('catenovo').style.display='block';
    }

    function cadastrocate(){
        $.ajax({
                type: "GET",
                url: "/cadastro/cadastrocategoria",
                data: {
                    nome:$("[name='catenovoinput']").val(),
                    desc:$("[name='catenovodescinput']").val(),
                },
                dataType: "json",
                success: function(data) {
                    console.log('Categoria cadastrada com sucesso');
                    document.getElementById('catenovo').style.display='none'
                    conscate($("input[name=tipo]:checked").val());
                    }
                });
    }

    function conscate(tipo){
        $.ajax({
                type: "GET",
                url: "/consultacadastrocate",
                data: {
                    tipo:tipo
                },
                dataType: "json",
                success: function(data) {
                    $("#cateselect").html('');
                    var select = document.getElementById('cateselect');
                    for(var i = 0; i<data['id'].length; i++){
                        var opt = document.createElement('option');
                        opt.appendChild(document.createTextNode(data['nome'][i]));
                        opt.value = data['id'][i];
                        select.appendChild(opt);
                    }
                }
            });
    }

    function conscatepesquisa(){
        $.ajax({
                type: "GET",
                url: "/consultacate",
                data: {},
                dataType: "json",
                success: function(data) {
                    var select = document.getElementById('pesquisarprodutocate');
                    for(var i = 0; i<data['id'].length; i++){
                        var opt = document.createElement('option');
                        opt.appendChild(document.createTextNode(data['nome'][i]));
                        opt.value = data['id'][i];
                        select.appendChild(opt);
                    }
                }
            });
    }

    function escondertabela(){
        $('#tabela').css('display', 'none');
    }

    $('#pesquisarprodutonome').keyup(function(){

        var nome = $('#pesquisarprodutonome').val();
        var nomes = [];
        if(nome.length >= 2){
            $.ajax({
                type:'GET',
                url:'produto/nome',
                data: {nomeproduto:nome},
                dataType: "json",
                success: function(data){
                    for(i=0; i<data.length; i++){
                        nomes.push(data[i]['prod_nome']);
                    }
                    nomes = nomes.filter((este, i) => nomes.indexOf(este) === i);
                    $("#pesquisarprodutonome").autocomplete({
                        source: nomes
                        });
                }

            });

        }

    });

    function buscarnome(){
        var nome = document.getElementById('pesquisarprodutonome').value;
    }

    function pegarprodutos(linha){
        serviitensval = [];
        var select = document.getElementById('select'+linha);
        for(var i = 0; i<todosprodutos[0].length; i++){
            var opt = document.createElement('option');
            opt.appendChild(document.createTextNode(todosprodutos[1][i]));
            opt.value = todosprodutos[0][i];
            select.appendChild(opt);
            serviitensval[todosprodutos[0][i]] = todosprodutos[2][i];
        }
    }

    

    function acoes(select){
        var id = select.id.split('selectmedico');
        prodatual = dadoslinhas[select.id.split('selectmedico')[1]];
        if(document.getElementById('selectmedico'+id[1]).value == 'editar'){
            editar(id[1]);
        }
    }

    function editar(linha){
        linha = parseInt(linha);
        $.ajax({
            type:'GET',
            url:'produto/dadosedit',
            data: {nomeproduto: dadoslinhas[linha]},
            dataType: "json",
            success: function(data){
                esconder(data[0]);
            }
        });
    }

    function apagartabela(){
        var tableHeaderRowCount = 1;
        var table = document.getElementById('pesquisarprodutotable');
        var rowCount = table.rows.length;
        for (var i = tableHeaderRowCount; i < rowCount; i++) {
            table.deleteRow(tableHeaderRowCount);
        }
        reset();
    }

    function apagartabelaitens(){
        var tableHeaderRowCount = 1;
        var table = document.getElementById('serviitens');
        var rowCount = table.rows.length;
        for (var i = tableHeaderRowCount; i < rowCount; i++) {
            table.deleteRow(tableHeaderRowCount);
        }
    }

    
    function reset(){
        $('.input').css('display', 'none');
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
        
    }

    function esconder(dados) {
        escondertabela();
        contlinhas = 0;
        document.getElementById('editar').style.display = 'block';
        document.getElementById('titulo').style.display = 'block';
        document.getElementById('nome').style.display = 'block';
        document.getElementById('desc').style.display = 'block';
        document.getElementById('cate').style.display = 'block';
        document.getElementById('tipo').style.display = 'block';
        document.getElementById('quant').style.display = 'block';
        document.getElementById('estqmin').style.display = 'block';
        document.getElementById('valor').style.display = 'block';
        document.getElementById('tabelaitens').style.display = 'block';


        document.querySelector("[name='nome']").value = dados['prod_nome'];
        document.querySelector("[name='desc']").value = dados['prod_desc'];
        if(dados['prod_tipo'] == "Item"){
            document.getElementById("Item").checked = true;
            document.getElementById("serviitens").style.display = "none";
            document.getElementById("buttonadicionarlinha").style.display = "none";
        }else{
            if(dados['prod_tipo'] == "Servico"){
                document.getElementById("Servico").checked = true;
            }else if(dados['prod_tipo'] == "Exame"){
                document.getElementById("Exame").checked = true;
            }else if(dados['prod_tipo'] == "Ultrassom"){
                document.getElementById("Ultrassom").checked = true;
            }else if(dados['prod_tipo'] == "Raiox"){
                document.getElementById("Raiox").checked = true;
            }
            pesquisarprodutos();
            setTimeout(function(){
                if(dados['prod_serviitens'] != null){
                    var itens = dados['prod_serviitens'].split(',');
                    for(var i = 0; i<itens.length; i++){
                        adicionaLinha('produtotablebody2', itens[i]);
                    }
                }else{
                    adicionaLinha('produtotablebody2');
                }
            }, 500);
            document.getElementById("serviitens").style.display = "block";
            document.getElementById("buttonadicionarlinha").style.display = " ";
            document.getElementById('valorlabdiv').style.display = 'block';
            if(dados['prod_valorlab'] != null){
                document.querySelector("[name='valorlab']").value = dados['prod_valorlab'];
            }else{
                document.querySelector("[name='valorlab']").value = '';
            }
        }
        document.querySelector("[name='quant']").value = dados['prod_quant'];
        document.querySelector("[name='estqmin']").value = dados['prod_estqmin'];
        if(dados['prod_valor'] != null){
            document.querySelector("[name='valor']").value = dados['prod_valor'];
        }else{
            document.querySelector("[name='valor']").value = 0;
        }
        var conscatecheck = tabelaserviitens();
        // conscate($("input[name=tipo]:checked").val());
        // setTimeout(function(){ document.querySelector("[name='cate']").value = dados['prod_cate'];}, 1000);
        $.when( conscatecheck ).then(function(){
            setTimeout(function(){ document.querySelector("[name='cate']").value = dados['prod_cate'];}, 1000);
        });
        // tabelaserviitens();

        if(permissaoeditarexcluir == 1){
            $('[name="editar"]').prop( "disabled", false );
            $('[name="titulo"]').prop( "disabled", false );
            $('[name="nome"]').prop( "disabled", false );
            $('[name="desc"]').prop( "disabled", false );
            $('[name="cate"]').prop( "disabled", false );
            $('[name="tipo"]').prop( "disabled", false );
            $('[name="quant"]').prop( "disabled", false );
            $('[name="estqmin"]').prop( "disabled", false );
            $('[name="valor"]').prop( "disabled", false );
            $('[name="tabelaitens"]').prop( "disabled", false );
            $('[name="catenovobutton"]').prop( "disabled", false );
            $('[name="editarproduto"]').prop( "disabled", false );
            $('[name="buttonadicionarlinha"]').prop( "disabled", false );
            setTimeout(function(){
                $('[name^="quantidade"]').prop( "disabled", false );
                $('[name^="produto"]').prop( "disabled", false );
                $('[name^="excluirbotao"]').prop( "disabled", false );
            }, 1000);
        }else{
            $('[name="editar"]').prop( "disabled", true );
            $('[name="titulo"]').prop( "disabled", true );
            $('[name="nome"]').prop( "disabled", true );
            $('[name="desc"]').prop( "disabled", true );
            $('[name="cate"]').prop( "disabled", true );
            $('[name="tipo"]').prop( "disabled", true );
            $('[name="quant"]').prop( "disabled", true );
            $('[name="estqmin"]').prop( "disabled", true );
            $('[name="valor"]').prop( "disabled", true );
            $('[name="tabelaitens"]').prop( "disabled", true );
            $('[name="catenovobutton"]').prop( "disabled", true );
            $('[name="editarproduto"]').prop( "disabled", true );
            $('[name="buttonadicionarlinha"]').prop( "disabled", true );
            setTimeout(function(){
                $('[name^="quantidade"]').prop( "disabled", true );
                $('[name^="produto"]').prop( "disabled", true );
                $('[name^="excluirbotao"]').prop( "disabled", true );
            }, 1000);
            
        }
    }

    function preencherServi(dados){
        dados = dados.split(',');
        for(var i = 0; i<dados.length; i++){
            var nome = 'servibox'+dados[i];
            $("[name='"+nome+"']").attr('checked', true);
        }
    }

    function editarProduto(){
        serviitens = "";
        for(var i = 1; i<=contlinhas; i++){
            if($("[name='produto"+i+"']").val() != ''){
                console.log($("[name='produto"+i+"']").val());
                serviitens += $("[name='produto"+i+"']").val() +"x" + $("[name='quantidade"+i+"']").val() + ",";
            }
        }
        serviitens = serviitens.slice(0,serviitens.length-1);
        $.ajax({
            type: "GET",
            url: "/editar/editarproduto",
            data: {
                nome:$("[name='nome']").val(),
                desc:$("[name='desc']").val(),
                cate:$("[name='cate']").val(),
                tipo:$("input[name=tipo]:checked").val(),
                quant:$("[name='quant']").val(),
                estqmin:$("[name='estqmin']").val(),
                valor: $("[name='valor']").val(),
                valorlab: $("[name='valorlab']").val(),
                serviitens: serviitens,
                nomeantigo: prodatual,
            },
            dataType: "json",
            success: function(data) {
                $('#exampleModal').modal('show');
                console.log('Produto editado com sucesso');
            }
            });
    }
</script>
@endsection
</html>