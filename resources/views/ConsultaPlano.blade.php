<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta do Plano</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <script src="{{asset('jquery.min.js')}}"></script>
    <script src="{{asset('jquery-ui-1.12.1/jquery-ui.js')}}"></script>
    <script src="{{asset('inputmask/dist/jquery.inputmask.min.js')}}"></script>
    <script src="{{asset('inputmask/dist/bindings/inputmask.binding.js')}}"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>
        Nome: <input type='text' name='pesquisarplanonome' id='pesquisarplanonome' >
        <input type='button' value='Pesquisar' onclick='pesquisarplano()'>
        <div id='tabela'><table border='1px'id='pesquisarplanotable'>
            <tr>
                <th>Nome do Plano</th>
                <th>Descrição do Plano</th>
                <th>Quantidade de Dependentes</th>
                <th>Valor do Plano</th>
                <th>Editar</th>
            </tr>
        </table></div>
    <div class='input' id='nome'>Nome do Plano: <input type='text' name='nome'id ='nomeinput'><br>
    <div class='input' id='desc'>Descrição do Plano: <textarea name='desc' id='descinput'></textarea><br>
    <div class='input' id='qtddep'>Quantidade máxima de dependentes por titular: <input type='number' name='qtddep' id ='qtddepinput' min='1'></div><br>
    <div class='input' id='tabelaprodutosservico'>
        <button onclick="adicionaLinhaServico('planoservicos')">Adicionar</button>
        <table border='1px' id='planoservicos'>
        <tr>
            <th>Selecionar Serviço</th>
            <th>Remover Serviço</th>
        </tr>
        </table>
    </div>
    <div class='input' id='tabelaprodutositem'>
        <button onclick="adicionaLinhaItem('planoitens')">Adicionar</button>
        <table border='1px' id='planoitens'>
        <tr>
            <th>Selecionar Item</th>
            <th>Quantidade</th>
            <th>Remover Item</th>
        </tr>
        </table>
    </div>
    <div class='input' id='valor'>Valor do Plano: <input type='number' name='valor' id='valorinput' min = '0' value='0.00'><br>
    <input type='button' name='editar' id='editar' onclick='editarplano()' value='Editar Plano'>
</body>
</html>

<script>
    reset();
    escondertabela();
    var planoatual = 0;
    var dadoslinhas = [];
    var contlinhas = 0;
    var contlinhas1 = 0;
    var linhas = [];
    var planoitens = "";
    var planoservicos = "";
    var planoitensval = [];
    var planoservicosval = [];
    var valor = 0;
    function adicionaLinhaItem(idTabela) {
        contlinhas++;
        linhas.push(contlinhas);
        var tabela = document.getElementById(idTabela);
        var numeroLinhas = tabela.rows.length;
        var linha = tabela.insertRow(numeroLinhas);
        var celula1 = linha.insertCell(0);
        var celula2 = linha.insertCell(1);   
        var celula3 = linha.insertCell(2); 
        celula1.innerHTML = "<select name='produtoitem"+contlinhas+"' id='selectitem"+contlinhas+"' onchange='calcularvalor()'><option value=''>Selecione um Item</option></select>"; 
        celula2.innerHTML =  "<input type='number' name='quantidadeitem"+contlinhas+"' min = '1' value = '1' onchange='calcularvalor()'>"; 
        celula3.innerHTML =  "<button onclick='removeLinhaItem(this)' id='"+contlinhas+"'>Remover</button>";
        pegarprodutositem(contlinhas);
    }

    function adicionaLinhaServico(idTabela) {
        contlinhas1++;
        linhas.push(contlinhas1);
        var tabela = document.getElementById(idTabela);
        var numeroLinhas = tabela.rows.length;
        var linha = tabela.insertRow(numeroLinhas);
        var celula1 = linha.insertCell(0);
        var celula2 = linha.insertCell(1);  
        celula1.innerHTML = "<select name='produtoservico"+contlinhas1+"' id='selectservico"+contlinhas1+"' onchange='calcularvalor()'><option value=''>Selecione um Serviço</option></select>"; 
        celula2.innerHTML =  "<button onclick='removeLinhaServico(this)' id='"+contlinhas1+"'>Remover</button>";
        pegarprodutosservico(contlinhas1);
    }
    
    // funcao remove uma linha da tabela
    function removeLinhaItem(linha) {
        var i=linha.parentNode.parentNode.rowIndex;
        document.getElementById('planoitens').deleteRow(i);
        linhas.splice(linha.id -1, 1);
        
    }

    function removeLinhaServico(linha) {
        var i=linha.parentNode.parentNode.rowIndex;
        document.getElementById('planoservico').deleteRow(i);
        linhas.splice(linha.id -1, 1);
        
    }

    function pegarprodutositem(linha){
        planoitensval = [];
        $.ajax({
                    type: "GET",
                    url: "/consultacadastroitem",
                    data: {},
                    dataType: "json",
                    success: function(data) {
                        var select = document.getElementById('selectitem'+linha);
                        for(var i = 0; i<data['id'].length; i++){
                            var opt = document.createElement('option');
                            opt.appendChild(document.createTextNode(data['nome'][i]));
                            opt.value = data['id'][i];
                            select.appendChild(opt);
                            planoitensval[data['id'][i]] = data['valor'][i];
                        }
                    }
                });
    }

    function pegarprodutosservico(linha){
        planoservicosval = [];
        $.ajax({
                    type: "GET",
                    url: "/consultacadastroservi",
                    data: {},
                    dataType: "json",
                    success: function(data) {
                        var select = document.getElementById('selectservico'+linha);
                        for(var i = 0; i<data['id'].length; i++){
                            var opt = document.createElement('option');
                            opt.appendChild(document.createTextNode(data['nome'][i]));
                            opt.value = data['id'][i];
                            select.appendChild(opt);
                            planoservicosval[data['id'][i]] = data['valor'][i];
                        }
                    }
                });
    }

    function calcularvalor(){
        valor = 0;
        for(var i = 1; i<=contlinhas; i++){
            if(planoitensval[$("[name='produtoitem"+i+"']").val()]){
                valor += planoitensval[$("[name='produtoitem"+i+"']").val()] * $("[name='quantidadeitem"+i+"']").val();
            }    
        }
        for(var o = 1; o<=contlinhas; o++){
            if(planoservicosval[$("[name='produtoservico"+i+"']").val()]){
                valor += planoservicosval[$("[name='produtoservico"+i+"']").val()];
            }   
        }
        document.getElementById('valorinput').value = valor;
    }

    function editarplano(){
        planoitens = "";
        for(var i = 1; i<=contlinhas; i++){
            planoitens += $("[name='produtoitem"+i+"']").val() +"x" + $("[name='quantidadeitem"+i+"']").val() + ",";
        }
        planoitens = planoitens.slice(0,planoitens.length-1);

        planoservicos = "";
        for(var i = 1; i<=contlinhas1; i++){
            planoservicos += $("[name='produtoservico"+i+"']").val()+",";
        }
        planoservicos = planoservicos.slice(0, planoservicos.length-1);
        $.ajax({
            type: "GET",
            url: "/editar/editarplano",
            data: {
                id:planoatual,
                nome:$("[name='nome']").val(),
                desc:$("[name='desc']").val(),
                qtddep:$("[name='qtddep']").val(),
                valor:$("[name='valor']").val(),
                servicos:planoservicos,
                itens:planoitens,
            },
            dataType: "json",
            success: function(data) {
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
        $.ajax({
                type: "GET",
                url: "/consulta/plano/dados",
                data: {nomeplano: document.getElementById('pesquisarplanonome').value},
                dataType: "json",
                success: function(data) {
                    document.getElementById('tabela').style.display = 'block';
                    for(i=0; i<data.length; i++){
                        var tabela = document.getElementById('pesquisarplanotable');
                        var numeroLinhas = tabela.rows.length;
                        var linha = tabela.insertRow(numeroLinhas);
                        var celula1 = linha.insertCell(0);
                        var celula2 = linha.insertCell(1);   
                        var celula3 = linha.insertCell(2);
                        var celula4 = linha.insertCell(3);
                        var celula5 = linha.insertCell(3);
                        dadoslinhas.push(data[i]['plan_nome']);
                        celula1.innerHTML=data[i]['plan_nome'];
                        celula2.innerHTML=data[i]['plan_desc'];
                        celula2.innerHTML=data[i]['plan_qtddep'];
                        celula4.innerHTML=data[i]['plan_valor'];
                        celula5.innerHTML="<input type='button' name='editareste' id='"+i+"' value='Editar' onclick='editar(this)'>";
                        
                    }
                }
            });
    }

    function editar(linha){
        linha = parseInt(linha.id);
        $.ajax({
            type:'GET',
            url:'plano/dadosedit',
            data: {nomeplano: dadoslinhas[linha]},
            dataType: "json",
            success: function(data){
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

    
    function reset(){
        $('.input').css('display', 'none');
    }

    function esconder(dados) {
        escondertabela();
        document.getElementById('editar').style.display = 'block';

        document.getElementById('nome').style.display = 'block';
        document.getElementById('desc').style.display = 'block';
        document.getElementById('qtdtitu').style.display = 'block';
        document.getElementById('qtddep').style.display = 'block';
        document.getElementById('tabelaprodutosservico').style.display = 'block';
        document.getElementById('tabelaprodutositem').style.display = 'block';
        document.getElementById('valor').style.display = 'block';


        planoatual = dados['plan_id'];
        document.querySelector("[name='nome']").value = dados['plan_nome'];
        document.querySelector("[name='desc']").value = dados['plan_desc'];
        document.querySelector("[name='qtdtitu']").value = dados['plan_qtdtitu'];
        document.querySelector("[name='qtddep']").value = dados['plan_qtddep'];
        document.querySelector("[name='valor']").value = dados['plan_valor'];
        var servicos = dados['plan_servicos'].split(',');
        for(var i = 0; i<servicos.length; i++){
            adicionaLinhaServico('planoservicos');
        }
        var itens = dados['plan_itens'].split(',');
        for(var i = 0; i<itens.length; i++){
            adicionaLinhaItem('planoitens');
        }
        setTimeout(function(){ preencherTabelas(itens, servicos);}, 500);
    }
    function preencherTabelas(itens, servicos){
        for(var i = 0; i<itens.length; i++){
            var item = itens[i].split('x');
            document.querySelector("[name='produtoitem"+(i+1)+"']").value = item[0];
            document.querySelector("[name='quantidadeitem"+(i+1)+"']").value = item[1];
        }
        for(var o = 0; o<servicos.length; o++ ){
            document.querySelector("[name='produtoservico"+(o+1)+"']").value = servicos[o]
        }
    }

</script>