<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Plano</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <script src="{{asset('jquery.min.js')}}"></script>
    <script src="{{asset('jquery-ui-1.12.1/jquery-ui.js')}}"></script>
    <script src="{{asset('inputmask/dist/jquery.inputmask.min.js')}}"></script>
    <script src="{{asset('inputmask/dist/bindings/inputmask.binding.js')}}"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>
    <div class='input' id='nome'>Nome do Plano: <input type='text' name='nome'id ='nomeinput'><br>
    <div class='input' id='desc'>Descrição do Plano: <textarea name='desc' id='descinput'></textarea><br>
    <div class='input' id='tipo'>Quantidade máxima de dependentes por titular: <input type='number' name='qtddep' id ='qtddepinput' min='1'></div><br>
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
    <input type='button' name='cadastrarplano' id='cadastrarplano' onclick='cadastrarplano()' value='Cadastrar Plano'>
</body>
</html>

<script>
    var contlinhas = 0;
    var contlinhas1 = 0;
    var linhas = [];
    var planoitens = "";
    var planoservicos = "";
    var planoitensval = [];
    var planoservicosval = [];
    var valor = 0;
    adicionaLinhaItem('planoitens');
    adicionaLinhaServico('planoservicos');
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
        calcularvalor();
        
    }

    function removeLinhaServico(linha) {
        var i=linha.parentNode.parentNode.rowIndex;
        document.getElementById('planoservicos').deleteRow(i);
        linhas.splice(linha.id -1, 1);
        calcularvalor();
        
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
        for(var o = 1; o<=contlinhas1; o++){
            if(planoservicosval[$("[name='produtoservico"+o+"']").val()]){
                valor += planoservicosval[$("[name='produtoservico"+o+"']").val()];
            }   
        }
        document.getElementById('valorinput').value = valor;
    }

    function cadastrarplano(){
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
            url: "/cadastro/cadastroplano",
            data: {
                nome:$("[name='nome']").val(),
                desc:$("[name='desc']").val(),
                qtddep:$("[name='qtddep']").val(),
                valor:$("[name='valor']").val(),
                servicos:planoservicos,
                itens:planoitens,
            },
            dataType: "json",
            success: function(data) {
                console.log('Plano cadastrado com sucesso');
                }
            });
}

</script>