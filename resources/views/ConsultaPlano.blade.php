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
    <meta name="csrf-token" content="{{ csrf_token() }}">
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

   <title>Pesquisa Plano</title>

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
        <div class="tituloprincipal">Pesquisa Plano</div>
    </div>

    <div class="container-fluid" style='margin-top:2rem;'>
        <div class="row gx-3 gy-3">
            <div class="col-sm-12 col-md-10 col-lg-8" >
                <div class="cor01">
                    <label for="pesquisarplanonome" class="form-label">Nome do Produto</label>
                    <div class="direction">
                        <div class='mb-2' style='width:40%'>
                            <input
                            type="text"
                            class="form-control"
                            aria-describedby="emailHelp"
                             name='pesquisarplanonome' 
                             id='pesquisarplanonome'/>
                        </div>
                        <div class='btnovaespec'>
                            <button type="submit" class="btn btamarelo" value='Pesquisar' onclick='pesquisarplano()'>
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
                        <table id='pesquisarplanotable' class="table">
                            <thead class="table-active">
                                <tr>
                                    <td scope="col">Nome</td>
                                    <td scope="col">Descrição</td>
                                    <td scope="col">Dependentes</td>
                                    <td scope="col">Boleto</td>
                                    <td scope="col">Cartão</td>
                                    <td scope="col">Ações</td>
                                </tr>
                            </thead>
                            <tbody id='planotablebody'>

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
            <div class="col-sm-5 col-md-4 col-lg-3 input" id='nome'>
                <div class="cor01">
                    <label for="exampleInputEmail1" class="form-label">Nome do Plano</label>
                    <input
                    type="text"
                    class="form-control"
                    aria-describedby="emailHelp"
                    name='nome'
                    id ='nomeinput'/>
                </div>
            </div>
        </div>
        <div class="row gx-3 gy-3">
            <div class="col-sm-5 col-md-4 col-lg-3 input" id='desc'>
                <div class="cor01">
                    <label for="descinput" class="form-label">Descrição do Plano</label>
                    <textarea class="form-control" rows="3" name='desc' id='descinput' style='height:8rem'></textarea>
                </div>
            </div>
        </div>
        <div class="row gx-3 gy-3">
            <div class="col-sm-5 col-md-4 col-lg-3 input" id='qtddep'>
                <div class="cor01">
                    <label for="exampleInputEmail1" class="form-label">Máximo de Dependentes</label>
                    <input
                    type="number"
                    class="form-control"
                    aria-describedby="emailHelp"
                    name='qtddep' 
                    id ='qtddepinput' 
                    min='1'/>
                </div>
            </div>
        </div>
        <div class="row gx-3 gy-3">
            <div class="col-sm-5 col-md-4 col-lg-3 input" id='valor'>
                <div class="cor01">
                    <label for="exampleInputEmail1" class="form-label">Valor do Plano (Boleto)</label>
                    <input type="text" class="form-control" aria-describedby="emailHelp" name='valorboleto' id='valorinputboleto' value='0.00'/>
                </div>
                <div class="cor01">
                    <label for="exampleInputEmail1" class="form-label">Valor do Plano (Cartão)</label>
                    <input type="text" class="form-control" aria-describedby="emailHelp" name='valorcartao' id='valorinputcartao' value='0.00'/>
                </div>
                <div class="cor01">
                    <label for="exampleInputEmail1" class="form-label">Valor da Adesão</label>
                    <input type="text" class="form-control" aria-describedby="emailHelp" name='valoradesao' id='valorinputadesao' value='0.00'/>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid" style='margin-top:4rem;'>
        <div class="row gx-3 gy-3">
            <div class="">
                <div class='input table-responsive-sm' id='tabelaprodutosservico'>
                    <table class='table' id='planoservicostable'>
                        <thead class="table-active">
                            <tr>
                                <td scope="col">Selecionar Serviço</td>
                                <td scope="col">Valor Serviço</td>
                                <td scope="col">Incluso</td>
                                <td scope="col">Remover Serviço</td>
                            </tr>
                        </thead>
                        <tbody id='planoservicos'>
                
                        </tbody>
                    </table>
                    <button type="submit" class="btn btadd btadicionar" value="Adicionar" name='adicionarlinhaservico' onclick="adicionaLinhaServico('planoservicos')">
                        <span class="fontebotao">Adicionar</span>
                    </button>
                </div> 
            </div>
        </div>
        <div class="row gx-3 gy-3" style='margin-top: 2rem;'>
            <div class="">
                <div class='input table-responsive-sm' id='tabelaprodutositem'>
                    <table class='table' id='planoitenstable'>
                        <thead class="table-active">
                            <tr>
                                <td scope="col">Selecionar Item</td>
                                <td scope="col">Qtd. Item</td>
                                <td scope="col">Valor Item</td>
                                <td scope="col">Incluso</td>
                                <td scope="col">Remover Item</td>
                            </tr>
                        </thead>
                        <tbody id='planoitens'>
                
                        </tbody>
                    </table>
                    <button type="submit" class="btn btadd btadicionar" value="Adicionar" name='adicionarlinhaitem' onclick="adicionaLinhaItem('planoitens')">
                        <span class="fontebotao">Adicionar</span>
                    </button>
                </div> 
            </div>
        </div>
    </div>

    <div class="container-fluid input" id='editar' style='margin-top:4rem;'>
        <div style="margin-bottom: 3rem">
            <button type='submit' name='editar' class='btn btamarelo' id='editar' value='Editar Plano' name='editarplano' onclick='editarplano()'>
                <span class='selectacoes'>Salvar Alterações</span>
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
                    <div id=''>Plano editado com sucesso</div>
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
    $. extend ( $. ui . autocomplete . prototype . options ,  { 
      open :  function ( event , ui )  { 
        $ ( this ) . autocomplete ( "widget" ) . css ( { 
                "width" :  ( $ ( this ) . width ( )  +  "px" ) 
            } ) ; 
        } 
    });

    $('#valorinputboleto').inputmask('decimal', {
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

  $('#valorinputcartao').inputmask('decimal', {
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

  $('#valorinputadesao').inputmask('decimal', {
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
    reset();
    escondertabela();
    var planoatual = 0;
    var dadoslinhas = [];
    var todosprodutos = [[],[]];
    var itensarray = [[],[],[],[]];
    var todosservicos = [[],[]];
    var servicosarray = [[],[],[]];
    var contlinhas = 0;
    var contlinhas1 = 0;
    var planoitens = "";
    var planoservicos = "";
    var planoitensval = [];
    var planoservicosval = [];
    var planoitensvalorfinal = [];
    var planoitensincluso = [];
    var planoservicosvalorfinal = [];
    var planoservicosincluso = [];
    var valor = 0;
    var itens = [];
    var servicos = [];
    var produtosplanoatual = [];
    var permissaoeditarexcluir = 0;
    pesquisarprodutos();
    pesquisarservicos();
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
    
    if({{Auth::user()->user_tipo}} != 2){
        $.ajax({
        type: "GET",
        url: "/buscarpermissoes",
        data: {userid: {{Auth::user()->user_tipo}}},
        dataType: "json",
        success: function(data) {
          if(data.indexOf('4.2') != -1){
            permissaoeditarexcluir = 1;
          }
        }
      });
    }else{
        permissaoeditarexcluir = 1;
    }

    function pesquisarservicos(){
        todosservicos = [[],[],[]];
        $.ajax({
            type: "GET",
            url: "/consultacadastroservi",
            data: {},
            dataType: "json",
            success: function(data) {
                for(var i = 0; i<data['id'].length; i++){
                    todosservicos[0][i] = data['id'][i];
                    todosservicos[1][i] = data['nome'][i];
                    todosservicos[2][i] = data['valor'][i];
                }
            }
        });
    }

    function adicionaLinhaItem(idTabela, item) {
        contlinhas++;
        linhas.push(contlinhas);
        // console.log(linhas);
        var tabela = document.getElementById(idTabela);
        var numeroLinhas = tabela.rows.length;
        var linha = tabela.insertRow(numeroLinhas);
        var celula1 = linha.insertCell(0);
        var celula2 = linha.insertCell(1);   
        var celula3 = linha.insertCell(2); 
        var celula4 = linha.insertCell(3); 
        var celula5 = linha.insertCell(4); 
        celula1.innerHTML = "<select name='produtoitem"+contlinhas+"' class='form-select selectcategoria' id='selectitem"+contlinhas+"' onchange='attprodid(this)'><option value=''>Selecione um Item</option></select>"; 
        celula2.innerHTML =  "<input type='number' name='quantidadeitem"+contlinhas+"' class='inputstexttelas inputtextcc' id='quantidadeitem"+contlinhas+"' min = '1' value = '1' onchange='attprodquant(this)'>";
        celula3.innerHTML =  "<input type='text' name='valoritem"+contlinhas+"' class='inputstexttelas inputtextcc' id='valoritem"+contlinhas+"' onchange='attprodval()'>";
        celula4.innerHTML =  "<input type='checkbox' name='inclusoitem"+contlinhas+"' id='inclusoitem"+contlinhas+"' onchange='tornarincluso(this)'>"; 
        celula5.innerHTML =  "<button type='submit' class='btn btdelete' id='"+contlinhas+"' name='botaoexcluiritem"+contlinhas+"' value='Excluir' onclick='removeLinhaItem(this)'><span class='fontebotao'>Excluir</span></button>";
        pegarprodutositem(contlinhas);
        itensarray[3][contlinhas-1] = 0;
        if(item != undefined){
            document.getElementById('selectitem'+contlinhas).value = item[0];
            document.getElementById('quantidadeitem'+contlinhas).value = item[2];
            if(item[1] == null){
                document.getElementById('valoritem'+contlinhas).value = 0;
            }else{
                document.getElementById('valoritem'+contlinhas).value = item[1];
            }
            if(item[3] == 'Incluso'){
                document.getElementById('inclusoitem'+contlinhas).checked = true;
                itensarray[3][contlinhas-1] = 1;
            }else{
                document.getElementById('inclusoitem'+contlinhas).checked = false;
                itensarray[3][contlinhas-1] = 0;
            }
            itensarray[0][contlinhas-1] = item[0];
            itensarray[1][contlinhas-1] = item[2];
            itensarray[2][contlinhas-1] = item[1];
        }
        $('#valoritem'+contlinhas1).inputmask('decimal', {
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
    }

    function adicionaLinhaServico(idTabela, servicosplano) {
        contlinhas1++;
        linhas.push(contlinhas1);
        // console.log('passou');
        var tabela = document.getElementById(idTabela);
        var numeroLinhas = tabela.rows.length;
        var linha = tabela.insertRow(numeroLinhas);
        var celula1 = linha.insertCell(0);
        var celula2 = linha.insertCell(1);
        var celula3 = linha.insertCell(2);  
        var celula4 = linha.insertCell(3);
        celula1.innerHTML = "<select name='produtoservico"+contlinhas1+"' class='form-select selectcategoria' id='selectservico"+contlinhas1+"' onchange='attservid(this)'><option value=''>Selecione um Serviço</option></select>";
        celula2.innerHTML =  "<input type='text' name='valorservico"+contlinhas1+"' class='inputstexttelas inputtextcc' id='valorservico"+contlinhas1+"' onchange='attservval(this)'>";
        celula3.innerHTML =  "<input type='checkbox' name='inclusoservico"+contlinhas1+"' id='inclusoservico"+contlinhas1+"' onchange='tornarincluso(this)'>"; 
        celula4.innerHTML =  "<button type='submit' class='btn btdelete' id='"+contlinhas1+"' name='botaoexcluirservico"+contlinhas1+"' value='Excluir' onclick='removeLinhaServico(this)'><span class='fontebotao'>Excluir</span></button>";
        pegarprodutosservico(contlinhas1);
        servicosarray[2][contlinhas1-1] = 0;
        if(servicosplano!= undefined){
            document.getElementById('selectservico'+contlinhas1).value = servicosplano[0];
            if(servicosplano[1] == null){
                document.getElementById('valorservico'+contlinhas1).value = 0;
            }else{
                document.getElementById('valorservico'+contlinhas1).value = servicosplano[1].replace('.',',');
                // console.log(servicosplano[1]);
            }
            if(servicosplano[3] == 'Incluso'){
                document.getElementById('inclusoservico'+contlinhas1).checked = true;
                servicosarray[2][contlinhas1-1] = 1;
            }else{
                document.getElementById('inclusoservico'+contlinhas1).checked = false;
                servicosarray[2][contlinhas1-1] = 0;
            }
            servicosarray[0][contlinhas1-1] = servicosplano[0];
            servicosarray[1][contlinhas1-1] = servicosplano[1];
            
        }
        $('#valorservico'+contlinhas1).inputmask('decimal', {
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
        
    }
    
    // funcao remove uma linha da tabela
    function removeLinhaItem(linha) {
        // console.log(itensarray);
        var i=linha.parentNode.parentNode.rowIndex;
        document.getElementById('planoitenstable').deleteRow(i);
        linhas.splice(linha.id -1, 1);
        itensarray[0].splice(linha.id -1, 1);
        itensarray[1].splice(linha.id -1, 1);
        itensarray[2].splice(linha.id -1, 1);
        itensarray[3].splice(linha.id -1, 1);
        contlinhas--;
        refazertabelaitem();
        
    }

    function removeLinhaServico(linha) {
        // console.log(servicosarray);
        var i=linha.parentNode.parentNode.rowIndex;
        document.getElementById('planoservicostable').deleteRow(i);
        linhas.splice(linha.id -1, 1);
        servicosarray[0].splice(linha.id -1, 1);
        servicosarray[1].splice(linha.id -1, 1);
        servicosarray[2].splice(linha.id -1, 1);
        contlinhas1--;
        refazertabelaservico();
        
    }

    function acoes(select){
        var id = select.id.split('selectplano');
        if(document.getElementById('selectplano'+id[1]).value == 'editar'){
            editar(id[1]);
        }
    }

    function pegarprodutositem(linha){
        planoitensval = [];
        var select = document.getElementById('selectitem'+linha);
        for(var i = 0; i<todosprodutos[0].length; i++){
            var opt = document.createElement('option');
            opt.appendChild(document.createTextNode(todosprodutos[1][i]));
            opt.value = todosprodutos[0][i];
            select.appendChild(opt);
            planoitensval[todosprodutos[0][i]] = todosprodutos[2][i];
        }
    }

    function pegarprodutosservico(linha){
        planoservicosval = [];
        var select = document.getElementById('selectservico'+linha);
        for(var i = 0; i<todosservicos[0].length; i++){
            var opt = document.createElement('option');
            opt.appendChild(document.createTextNode(todosservicos[1][i]));
            opt.value = todosservicos[0][i];
            select.appendChild(opt);
        }
    }

    function tornarincluso(cedula){
        if(cedula.id[7] == 's' && cedula.checked == true){
            document.getElementById('valorservico'+cedula.id.substr(14)).disabled = true;
            servicosarray[2][cedula.id.substr(14) - 1] = 1;
        }else if(cedula.id[7] == 's' && cedula.checked == false){
            document.getElementById('valorservico'+cedula.id.substr(14)).disabled = false;
            servicosarray[2][cedula.id.substr(14) - 1] = 0;
        }else if(cedula.id[7] == 'i' && cedula.checked == true){
            document.getElementById('valoritem'+cedula.id.substr(11)).disabled = true;
            itensarray[3][cedula.id.substr(11) - 1] = 1;
        }else if(cedula.id[7] == 'i' && cedula.checked == false){
            document.getElementById('valoritem'+cedula.id.substr(11)).disabled = false;
            itensarray[3][cedula.id.substr(11) - 1] = 0;
        }
        // calcularvalor();
    }

    function checarvalor(celula){
        if(celula.id[6] == 's'){
            if(servicosarray[1][celula.id.substr(13)-1] == undefined){
                if(todosservicos[2][todosservicos[0].indexOf(parseInt(celula.value))] == null){
                    document.getElementById('valorservico'+celula.id.substr(13)).value = 0;
                    servicosarray[1][celula.id.substr(13)-1] = 0;
                }else{
                    document.getElementById('valorservico'+celula.id.substr(13)).value = todosservicos[2][todosservicos[0].indexOf(parseInt(celula.value))].toString().replace('.', ',');
                    servicosarray[1][celula.id.substr(13)-1] = todosservicos[2][todosservicos[0].indexOf(parseInt(celula.value))];
                }
            }
        }else{
            document.getElementById('valoritem'+celula.id.substr(10)).value = todosprodutos[2][todosprodutos[0].indexOf(parseInt(celula.value))].toString().replace('.', ',');
            itensarray[2][celula.id.substr(10)-1] = todosprodutos[2][todosprodutos[0].indexOf(parseInt(celula.value))];
        }
        // calcularvalor();
    }

    function preenchervaloresservico(){
        // console.log(servicosarray);
        // console.log(contlinhas1);
        for(var i = 1; i<=contlinhas1; i++){
            if(servicosarray[0][i-1] == undefined){
                document.getElementById('selectservico' + i).value = 0;
            }else{
                document.getElementById('selectservico' + i).value = servicosarray[0][i-1];
                document.getElementById('valorservico' + i).value = servicosarray[1][i-1].replace('.',',');
                if(servicosarray[2][i-1] == 1){
                    document.getElementById('inclusoservico' + i).checked = true;
                }
            }
        }
    }

    function preenchervaloresitem(){
        for(var i = 1; i<=contlinhas; i++){
            document.getElementById('selectitem' + i).value = itensarray[0][i-1];
            if(itensarray[0][i-1] == undefined){
                document.getElementById('selectitem' + i).value = 0;
            }else{
                document.getElementById('selectitem' + i).value = itensarray[0][i-1];
                document.getElementById('quantidadeitem' + i).value = itensarray[1][i-1];
                document.getElementById('valoritem' + i).value = itensarray[2][i-1];
                if(itensarray[3][i-1] == 1){
                    document.getElementById('inclusoitem' + i).checked = true;
                }
            }
        }
    }

    function apagartabelaitem(){
        var tableHeaderRowCount = 0;
        var table = document.getElementById('planoitenstable');
        var rowCount = table.rows.length;
        for (var i = tableHeaderRowCount; i < rowCount; i++) {
            table.deleteRow(tableHeaderRowCount);
        }
    }

    function apagartabelaservico(){
        var tableHeaderRowCount = 0;
        var table = document.getElementById('planoservicostable');
        var rowCount = table.rows.length;
        for (var i = tableHeaderRowCount; i < rowCount; i++) {
            table.deleteRow(tableHeaderRowCount);
        }
    }

    function refazertabelaitem(){
        apagartabelaitem();
        for(var i = 1; i<=contlinhas; i++){
            var tabela = document.getElementById('planoitens');
            var numeroLinhas = tabela.rows.length;
            var linha = tabela.insertRow(numeroLinhas);
            var celula1 = linha.insertCell(0);
            var celula2 = linha.insertCell(1);   
            var celula3 = linha.insertCell(2); 
            var celula4 = linha.insertCell(3); 
            var celula5 = linha.insertCell(4); 
            celula1.innerHTML = "<select name='produtoitem"+i+"' class='form-select selectcategoria' id='selectitem"+i+"' onchange='attprodid(this)'><option value='0'>Selecione um Item</option></select>"; 
            celula2.innerHTML =  "<input type='number' name='quantidadeitem"+i+"' class='inputstexttelas inputtextcc' id='quantidadeitem"+i+"' min = '1' value = '1' onchange='attprodquant(this)'>";
            celula3.innerHTML =  "<input type='text' name='valoritem"+i+"' class='inputstexttelas inputtextcc' id='valoritem"+i+"' min = '1' onchange='attprodval(this)'>";
            celula4.innerHTML =  "<input type='checkbox' name='inclusoitem"+i+"' id='inclusoitem"+i+"' onchange='tornarincluso(this)'>"; 
            celula5.innerHTML =  "<button type='submit' class='btn btdelete' id='"+i+"' value='Excluir' onclick='removeLinhaItem(this)'><span class='fontebotao'>Excluir</span></button>";
            pegarprodutositem(i);
            setTimeout(function(){ preenchervaloresitem(); }, 700);
            $('#valorservico'+i).inputmask('decimal', {
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
        }
    }

    function refazertabelaservico(){
        apagartabelaservico();
        for(var i = 1; i<=contlinhas1; i++){
            var tabela = document.getElementById('planoservicos');
            var numeroLinhas = tabela.rows.length;
            var linha = tabela.insertRow(numeroLinhas);
            var celula1 = linha.insertCell(0);
            var celula2 = linha.insertCell(1);
            var celula3 = linha.insertCell(2);  
            var celula4 = linha.insertCell(3);
            celula1.innerHTML = "<select name='produtoservico"+i+"' class='form-select selectcategoria' id='selectservico"+i+"' onchange='attservid(this)'><option value='0'>Selecione um Serviço</option></select>";
            celula2.innerHTML =  "<input type='text' name='valorservico"+i+"' class='inputstexttelas inputtextcc' id='valorservico"+i+"'onchange='attservval(this)'>";
            celula3.innerHTML =  "<input type='checkbox' name='inclusoservico"+i+"' id='inclusoservico"+i+"' onchange='tornarincluso(this)'>"; 
            celula4.innerHTML =  "<button type='submit' class='btn btdelete' id='"+i+"' value='Excluir' onclick='removeLinhaServico(this)'><span class='fontebotao'>Excluir</span></button>";
            pegarprodutosservico(i);
            setTimeout(function(){ preenchervaloresservico(); }, 700);
            $('#valorservico'+i).inputmask('decimal', {
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
        }
    }

    function attprodid(celula){
        itensarray[0][celula.id.substr(10) - 1] = celula.value;
        itensarray[1][celula.id.substr(10) - 1] = 1;
        itensarray[2][celula.id.substr(10) - 1] = undefined;
        checarvalor(celula);
    }

    function attprodquant(celula){
        itensarray[1][celula.id.substr(14) - 1] = celula.value;
        calcularvaloritem(celula);
    }

    function attprodval(celula){
        itensarray[2][celula.id.substr(9) - 1] = celula.value;
        // calcularvalor();
    }

    function attservid(celula){
        servicosarray[0][celula.id.substr(13) - 1] = celula.value;
        servicosarray[1][celula.id.substr(13) - 1] = undefined;
        // console.log(servicosarray);
        checarvalor(celula);
    }

    function attservval(celula){
        servicosarray[1][celula.id.substr(12) - 1] = celula.value;
        // calcularvalor();
    }

    function calcularvaloritem(celula){
        var itematual = document.getElementById('selectitem'+celula.id.substr(14)).value
        var valorant = planoitensval[itematual];
        var valoratual = valorant * celula.value;
        document.getElementById('valoritem'+celula.id.substr(14)).value = valoratual;
        // calcularvalor();
    }

    // function calcularvalor(){
    //     valor = 0;
    //     for(var i = 1; i<=contlinhas; i++){
    //         if(document.getElementById('valoritem'+i).value != '' && document.getElementById('valoritem'+i).disabled == false){
    //             valor += parseFloat(document.getElementById('valoritem'+i).value);
    //         }
             
    //     }
    //     for(var o = 1; o<=contlinhas1; o++){
    //         if(document.getElementById('valorservico'+o).value != '' && document.getElementById('valorservico'+o).disabled == false){
    //             valor += parseFloat(document.getElementById('valorservico'+o).value);
    //         }
              
    //     }
    //     document.getElementById('valorinputboleto').value = parseFloat(valor);
    //     document.getElementById('valorinputcartao').value = parseFloat(valor);
    //     console.log()
    // }

    function editarplano(){
        // console.log(servicosarray);
        $.ajax({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            url: "/editar/editarplano",
            data: {
                id:planoatual,
                nome:$("[name='nome']").val(),
                desc:$("[name='desc']").val(),
                qtddep:$("[name='qtddep']").val(),
                valorboleto: $("[name='valorboleto']").val(),
                valorcartao: $("[name='valorcartao']").val(),
                adesao: $("[name='valoradesao']").val(),
                servicos:servicosarray,
                itens:itensarray,
            },
            dataType: 'json',
            success: function(data) {
                $('#exampleModal').modal('show');
                console.log('Plano editado com sucesso');
            }
            });
}


    function escondertabela(){
        $('#tabela').css('display', 'none');
    }

    $('#pesquisarplanonome').keyup(function(){

        var nome = $('#pesquisarplanonome').val();
        var nomes = [];
        if(nome.length >= 2){
            $.ajax({
                type:'GET',
                url:'plano/nome',
                data: {nomeplano:nome},
                dataType: "json",
                success: function(data){
                    for(i=0; i<data.length; i++){
                        nomes.push(data[i]['plan_nome']);
                    }
                    nomes = nomes.filter((este, i) => nomes.indexOf(este) === i);
                    $("#pesquisarplanonome").autocomplete({
                        source: nomes
                        });
                }

            });

        }

    });

    function buscarnome(){
        var nome = document.getElementById('pesquisarplanonome').value;
    }

    function pesquisarplano(){
        apagartabela();
        apagartabelaservicos();
        apagartabelaitens();
        contlinhas = 0;
        contlinhas1 = 0;
        linhas = [];
        planoitens = "";
        planoservicos = "";
        planoitensval = [];
        planoservicosval = [];
        planoitensvalorfinal = [];
        planoitensincluso = [];
        planoservicosvalorfinal = [];
        planoservicosincluso = [];
        valor = 0;
        itens = [];
        servicos = [];
        dadoslinhas = [];
        $.ajax({
                type: "GET",
                url: "/consulta/plano/dados",
                data: {nomeplano: document.getElementById('pesquisarplanonome').value},
                dataType: "json",
                success: function(data) {
                    document.getElementById('tabela').style.display = 'block';
                    apagartabela();
                    for(i=0; i<data.length; i++){
                        var tabela = document.getElementById('planotablebody');
                        var numeroLinhas = tabela.rows.length;
                        var linha = tabela.insertRow(numeroLinhas);
                        var celula1 = linha.insertCell(0);
                        var celula2 = linha.insertCell(1);   
                        var celula3 = linha.insertCell(2);
                        var celula4 = linha.insertCell(3);
                        var celula5 = linha.insertCell(4);
                        var celula6 = linha.insertCell(5);
                        dadoslinhas.push(data[i]['plan_nome']);
                        celula1.innerHTML=data[i]['plan_nome'];
                        celula2.innerHTML=data[i]['plan_desc'];
                        celula3.innerHTML=data[i]['plan_qtddep'];
                        celula4.innerHTML=data[i]['plan_valorboleto'];
                        celula5.innerHTML=data[i]['plan_valorcartao'];
                        if(permissaoeditarexcluir == 1){
                            celula6.innerHTML="<select id='selectplano"+i+"' name='selectplano"+i+"' class='form-select selectacoes' aria-label='Default select example' onchange='acoes(this)'><option value=''>Ações</option><option value='editar'>Editar</option><option value='excluir'>Excluir</option></select>";
                        }else{
                            celula6.innerHTML="<select id='selectplano"+i+"' name='selectplano"+i+"' class='form-select selectacoes' aria-label='Default select example' onchange='acoes(this)'><option value=''>Ações</option><option value='editar'>Editar</option></select>";
                        }
                    }
                }
            }); 
    }

    function editar(linha){
        linha = parseInt(linha);
        // console.log(linha);
        $.ajax({
            type:'GET',
            url:'plano/dadosedit',
            data: {nomeplano: dadoslinhas[linha]},
            dataType: "json",
            success: function(data){
                produtosplanoatual = data[1];
                // console.log(produtosplanoatual);
                apagartabelaservicos();
                apagartabelaitens();
                esconder(data[0]);
            }
        });
    }

    function apagartabela(){
        var tableHeaderRowCount = 1;
        var table = document.getElementById('pesquisarplanotable');
        var rowCount = table.rows.length;
        for (var i = tableHeaderRowCount; i < rowCount; i++) {
            table.deleteRow(tableHeaderRowCount);
        }
        reset();
    }


    function apagartabelaservicos(){
        var tableHeaderRowCount = 0;
        var table = document.getElementById('planoservicos');
        var rowCount = table.rows.length;
        for (var i = tableHeaderRowCount; i < rowCount; i++) {
            table.deleteRow(tableHeaderRowCount);
        }
    }

    function apagartabelaitens(){
        var tableHeaderRowCount = 0;
        var table = document.getElementById('planoitens');
        var rowCount = table.rows.length;
        for (var i = tableHeaderRowCount; i < rowCount; i++) {
            table.deleteRow(tableHeaderRowCount);
        }
    }

    
    function reset(){
        $('.input').css('display', 'none');
    }

    function esconder(dados) {
        escondertabela();
        document.getElementById('editar').style.display = 'block'; 
        document.getElementById('titulo').style.display = 'block';
        
        document.getElementById('nome').style.display = 'block';
        document.getElementById('desc').style.display = 'block';
        document.getElementById('qtddep').style.display = 'block';
        document.getElementById('tabelaprodutosservico').style.display = 'block';
        document.getElementById('tabelaprodutositem').style.display = 'block';
        document.getElementById('valor').style.display = 'block';


        planoatual = dados['plan_id'];
        document.querySelector("[name='nome']").value = dados['plan_nome'];
        document.querySelector("[name='desc']").value = dados['plan_desc'];
        document.querySelector("[name='qtddep']").value = dados['plan_qtddep'];
        // console.log(produtosplanoatual);
        for(i = 0; i < produtosplanoatual.length; i++){
            // console.log(produtosplanoatual);
            if(produtosplanoatual[i][2] != null){
                adicionaLinhaItem('planoitens', produtosplanoatual[i]);
            }else{
                adicionaLinhaServico('planoservicos', produtosplanoatual[i]);
            }
        }
        if(dados['plan_valorboleto'] != null){
            document.querySelector("[name='valorboleto']").value = dados['plan_valorboleto'].toString().replace('.', ',');
        }
        if(dados['plan_valorcartao'] != null){
            document.querySelector("[name='valorcartao']").value = dados['plan_valorcartao'].toString().replace('.', ',');
        }
        if(dados['plan_adesao'] != null){
            document.querySelector("[name='valoradesao']").value = dados['plan_adesao'].toString().replace('.', ',');
        }
        // console.log(dados['plan_valorboleto'], dados['plan_valorcartao'], dados['plan_adesao'].toString().replace('.', ','));
        if(permissaoeditarexcluir == 1){
            $('[name="nome"]').prop( "disabled", false );
            $('[name="desc"]').prop( "disabled", false );
            $('[name="qtddep"]').prop( "disabled", false );
            $('[name="tabelaprodutosservico"]').prop( "disabled", false );
            $('[name="tabelaprodutositem"]').prop( "disabled", false );
            $('[name="valor"]').prop( "disabled", false );
            $('[name="adicionarlinhaservico"]').prop( "disabled", false );
            $('[name="adicionarlinhaitem"]').prop( "disabled", false );
            $('[name="editar"]').prop( "disabled", false );
            $('[name*="produtoservico"]').prop( "disabled", false );
            $('[name*="valorservico"]').prop( "disabled", false );
            $('[name*="inclusoservico"]').prop( "disabled", false );
            $('[name*="botaoexcluirservico"]').prop( "disabled", false );
            $('[name*="produtoitem"]').prop( "disabled", false );
            $('[name*="quantidadeitem"]').prop( "disabled", false );
            $('[name*="valoritem"]').prop( "disabled", false );
            $('[name*="inclusoitem"]').prop( "disabled", false );
            $('[name*="produtoitem"]').prop( "disabled", false );
            $('[name*="botaoexcluiritem"]').prop( "disabled", false );
        }else{
            $('[name="nome"]').prop( "disabled", true );
            $('[name="desc"]').prop( "disabled", true );
            $('[name="qtddep"]').prop( "disabled", true );
            $('[name="tabelaprodutosservico"]').prop( "disabled", true );
            $('[name="tabelaprodutositem"]').prop( "disabled", true );
            $('[name="valor"]').prop( "disabled", true );
            $('[name="adicionarlinhaservico"]').prop( "disabled", true );
            $('[name="adicionarlinhaitem"]').prop( "disabled", true );
            $('[name="editar"]').prop( "disabled", true );
            $('[name*="produtoservico"]').prop( "disabled", true );
            $('[name*="valorservico"]').prop( "disabled", true );
            $('[name*="inclusoservico"]').prop( "disabled", true );
            $('[name*="botaoexcluirservico"]').prop( "disabled", true );
            $('[name*="produtoitem"]').prop( "disabled", true );
            $('[name*="quantidadeitem"]').prop( "disabled", true );
            $('[name*="valoritem"]').prop( "disabled", true );
            $('[name*="inclusoitem"]').prop( "disabled", true );
            $('[name*="produtoitem"]').prop( "disabled", true );
            $('[name*="botaoexcluiritem"]').prop( "disabled", true );
        }
    }
    

</script>
@endsection
</html>