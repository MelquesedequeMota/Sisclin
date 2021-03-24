<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produto</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <script src="{{asset('jquery.min.js')}}"></script>
    <script src="{{asset('inputmask/dist/jquery.inputmask.min.js')}}"></script>
    <script src="{{asset('inputmask/dist/bindings/inputmask.binding.js')}}"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>
    <div class='input' id='nome'>Nome do Produto: <input type='text' name='nome'id ='nomeinput'><br>
    <div class='input' id='desc'>Descrição do Produto: <textarea name='desc' id='descinput'></textarea><br>
    <div class='input' id='cate'>Categoria do Produto: <select name="cate" id='cateselect'>
        <option value=''>---</option>
    </select><button id='catenovobutton' onclick='novocate()'> Nova Categoria </button><br></div><div class='input' id='catenovo'></div>
    <div class='input' id='tipo'>Tipo de Produto: Item <input type='radio' value='Item' id='Item' name='tipo' onclick='tabelaserviitens()'> Serviço <input type='radio' value='Servico' id='Servico' name='tipo' onclick='tabelaserviitens()'><br>
    <div class='input' id='quant'>Quantidade Inicial: <input type='number' name='quant' id='quantinput'><br>
    <div class='input' id='estqmin'>Estoque Mínimo: <input type='number' name='estqmin' id='estqmininput' min='1'><br>
    <div class='input' id='valor'>Valor do Produto: <input type='number' name='valor' id='valorinput' min = '0' value='0.00'><br>
    <div class='input' id='tabelaitens'>
        <button onclick="adicionaLinha('serviitens')">Adicionar</button>
        <table border='1px' id='serviitens'>
        <tr>
            <th>Selecionar Item</th>
            <th>Quantidade</th>
            <th>Remover Item</th>
        </tr>
        </table>
    </div>
    <input type='button' name='cadastrarproduto' id='cadastrarproduto' onclick='cadastrarproduto()' value='Cadastrar Produto'>
</body>
</html>

<script>
    conscate();
    tabelaserviitens();
    var contlinhas = 0;
    var linhas = [];
    var serviitens = "";
    var serviitensval = [];
    var valor = 0;
    adicionaLinha('serviitens');
    function adicionaLinha(idTabela) {
        contlinhas++;
        linhas.push(contlinhas);
        var tabela = document.getElementById(idTabela);
        var numeroLinhas = tabela.rows.length;
        var linha = tabela.insertRow(numeroLinhas);
        var celula1 = linha.insertCell(0);
        var celula2 = linha.insertCell(1);   
        var celula3 = linha.insertCell(2); 
        celula1.innerHTML = "<select name='produto"+contlinhas+"' id='select"+contlinhas+"' onchange='calcularvalor()'><option value=''>Selecione um Produto</option></select>"; 
        celula2.innerHTML =  "<input type='number' name='quantidade"+contlinhas+"' min = '1' value = '1' onchange='calcularvalor()'>"; 
        celula3.innerHTML =  "<button onclick='removeLinha(this)' id='"+contlinhas+"'>Remover</button>";
        pegarprodutos(contlinhas);
    }
    
    // funcao remove uma linha da tabela
    function removeLinha(linha) {
        var i=linha.parentNode.parentNode.rowIndex;
        document.getElementById('serviitens').deleteRow(i);
        linhas.splice(linha.id -1, 1);
        
    }

    function pegarprodutos(linha){
        serviitensval = [];
        $.ajax({
                    type: "GET",
                    url: "/consultacadastroitem",
                    data: {},
                    dataType: "json",
                    success: function(data) {
                        var select = document.getElementById('select'+linha);
                        for(var i = 0; i<data['id'].length; i++){
                            var opt = document.createElement('option');
                            opt.appendChild(document.createTextNode(data['nome'][i]));
                            opt.value = data['id'][i];
                            select.appendChild(opt);
                            serviitensval[data['id'][i]] = data['valor'][i];
                        }
                    }
                });
    }

    function calcularvalor(){
        valor = 0;
        for(var i = 1; i<=contlinhas; i++){
            valor += serviitensval[$("[name='produto"+i+"']").val()] * $("[name='quantidade"+i+"']").val();
        }
        console.log(valor);
        document.getElementById('valorinput').value = valor;
    }

    function tabelaserviitens(){
        if($("input[name=tipo]:checked").val() == 'Servico'){
            $('#tabelaitens').css('display', 'block');
        }else{
            $('#tabelaitens').css('display', 'none');
        }
    }

    function checar(){
        serviitens = "";
        for(var i = 1; i<=contlinhas; i++){
            serviitens += $("[name='produto"+i+"']").val() +"x" + $("[name='quantidade"+i+"']").val() + ",";
        }
        serviitens = serviitens.slice(0,serviitens.length-1);
        console.log(serviitens);
    }

    function conscate(){
            $.ajax({
                    type: "GET",
                    url: "/consultacadastrocate",
                    data: {},
                    dataType: "json",
                    success: function(data) {
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

    function novocate(){
            document.getElementById('catenovo').innerHTML="Nova Categoria: <input type='text' id='catenovoinput' name='catenovoinput'> Descrição: <input type='text' id='catenovodescinput' name='catenovodescinput'><button onclick='cadastrocate()'>Cadastrar Categoria</button>";
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
                    conscate();
                    }
                });
    }

    function cadastrarproduto(){
        serviitens = "";
        for(var i = 1; i<=contlinhas; i++){
            serviitens += $("[name='produto"+i+"']").val() +"x" + $("[name='quantidade"+i+"']").val() + ",";
        }
        serviitens = serviitens.slice(0,serviitens.length-1);
        $.ajax({
            type: "GET",
            url: "/cadastro/cadastroproduto",
            data: {
                nome:$("[name='nome']").val(),
                desc:$("[name='desc']").val(),
                cate:$("[name='cate']").val(),
                tipo:$("input[name=tipo]:checked").val(),
                quant:$("[name='quant']").val(),
                estqmin:$("[name='estqmin']").val(),
                valor:$("[name='valor']").val(),
                serviitens:serviitens,
            },
            dataType: "json",
            success: function(data) {
                console.log('Produto cadastrado com sucesso');
                }
            });
}
</script>