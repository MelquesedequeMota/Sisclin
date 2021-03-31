<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <script src="{{asset('jquery.min.js')}}"></script>
    <script src="{{asset('jquery-ui-1.12.1/jquery-ui.js')}}"></script>
    <script src="{{asset('inputmask/dist/jquery.inputmask.min.js')}}"></script>
    <script src="{{asset('inputmask/dist/bindings/inputmask.binding.js')}}"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <title>Consulta do Produto</title>
        Nome: <input type='text' name='pesquisarprodutonome' id='pesquisarprodutonome' > Categoria:<select name="pesquisarprodutocate" id='pesquisarprodutocate'>
        <option value=''>---</option>
        </select><input type='button' value='Pesquisar' onclick='pesquisarproduto()'>
        <div id='tabela'><table border='1px'id='pesquisarprodutotable'>
            <tr>
                <th>Nome do Produto</th>
                <th>Tipo do produto</th>
                <th>Categoria do Produto</th>
                <th>Editar</th>
            </tr>
        </table></div>
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
        <div class='input' id='editar'><input type='button' name='editarproduto' value='Editar Produto' id='editarproduto' onclick='editarProduto()'></div>
</head>
<body>
    
</body>
<script>
    reset();
    escondertabela();
    conscatepesquisa();
    var dadoslinhas = [];
    var contlinhas = 0;
    var linhas = [];
    var serviitens = "";
    var serviitensval = [];
    var valor = 0;

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

    function conscatepesquisa(){
        $.ajax({
                type: "GET",
                url: "/consultacadastrocate",
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

    function pesquisarproduto(){
        apagartabela();
        $.ajax({
                type: "GET",
                url: "/consulta/produto/dados",
                data: {nomeproduto: document.getElementById('pesquisarprodutonome').value, cateproduto: document.getElementById('pesquisarprodutocate').value},
                dataType: "json",
                success: function(data) {
                    document.getElementById('tabela').style.display = 'block';
                    for(i=0; i<data.length; i++){
                        var tabela = document.getElementById('pesquisarprodutotable');
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
                        celula4.innerHTML="<input type='button' name='editareste' id='"+i+"' value='Editar' onclick='editar(this)'>";
                        
                    }
                }
            });
    }

    function editar(linha){
        linha = parseInt(linha.id);
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
        conscate();
        document.getElementById('editar').style.display = 'block';

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
        setTimeout(function(){ document.querySelector("[name='cate']").value = dados['prod_cate'];}, 500);
        if(dados['prod_tipo'] == "Item"){
            document.getElementById("Item").checked = true;
        }else{
            document.getElementById("Servico").checked = true;
            var itens = dados['prod_serviitens'].split(',');
            for(var i = 0; i<itens.length; i++){
                adicionaLinha('serviitens');
            }
            setTimeout(function(){ preencherItens(itens);}, 500);
        }
        document.querySelector("[name='quant']").value = dados['prod_quant'];
        document.querySelector("[name='estqmin']").value = dados['prod_estqmin'];
        document.querySelector("[name='valor']").value = dados['prod_valor'];
    }

    function preencherItens(itens){
        for(var i = 0; i<itens.length; i++){
            var item = itens[i].split('x');
            document.querySelector("[name='produto"+(i+1)+"']").value = item[0];
            document.querySelector("[name='quantidade"+(i+1)+"']").value = item[1];
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
            serviitens += $("[name='produto"+i+"']").val() +"x" + $("[name='quantidade"+i+"']").val() + ",";
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
                valor:$("[name='valor']").val(),
                serviitens: serviitens,
            },
            dataType: "json",
            success: function(data) {
                console.log('Produto editado com sucesso');
                }
            });
    }
</script>
</html>