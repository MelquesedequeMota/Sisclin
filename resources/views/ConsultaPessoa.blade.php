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
    <title>Consulta de Pessoa</title>
        Nome: <input type='text' name='pesquisarpessoanome' id='pesquisarpessoanome' > CPF/CNPJ: <input type='text' name='pesquisarpessoacpfcnpj' id='pesquisarpessoacpfcnpj'><input type='button' value='Pesquisar' onclick='pesquisarpessoa()'><input type='button' value='Mostrar Sessao' onclick='mostrarsessao()'>
        <div id='tabela'><table border='1px'id='pesquisarpessoatable'>
            <tr>
                <th>CPF/CNPJ</th>
                <th>Nome da Empresa</th>
                <th>Telefone de Contato</th>
                <th>Tipo de Pessoa</th>
                <th>Editar</th>
            </tr>
        </table></div>
        <div class='input' id='cpf'>*CPF:<input type='text' class='valores' name='cpf' data-inputmask="'mask': '999.999.999-99'"><br></div>
        <div class='input' id='cnpj'>*CNPJ:<input type='text' class='valores' name='cnpj' data-inputmask="'mask': '99.999.999/9999-99'"><br></div>
        <div class='input' id='nome'>*Nome:<input type='text' class='valores' name='nome'><br></div>
        <div class='input' id='rg'>*RG:<input type='text' class='valores' name='rg' data-inputmask="'mask': '9999999999-9'"><br></div>
        <div class='input' id='datanasc'>*Data de Nascimento:<input type='text' class='valores' name='datanasc'data-inputmask="'mask': '99/99/9999'"><br></div>
        <div class='input' id='estadocivil'>Estado Civil<select name="estadocivil">
            <option value="solt">Solteiro</option>
            <option value="cas">Casado</option>
            <option value="outro">Outro</option>
        </select><br></div>
        <div class='input' id='sexo'>Sexo:<select name="sexo">
            <option value="masc">Masculino</option>
            <option value="fem">Feminino</option>
            <option value="outro">Outro</option>
        </select><br></div>
        <div class='input' id='cep'>CEP:<input type='text' class='valores' name='cep' id='cepinput' onblur="pesquisacep(this.value);" data-inputmask="'mask': '99999-999'"><br></div>
        <div class='input' id='logradouro'>Logradouro:<input type='text' class='valores' name='logradouro' id='logradouroinput'><br></div>
        <div class='input' id='num'>Nº:<input type='text' class='valores' name='num' ><br></div>
        <div class='input' id='complemento'>Complemento:<input type='text' class='valores' name='complemento'><br></div>
        <div class='input' id='bairro'>Bairro:<input type='text' class='valores' name='bairro' id='bairroinput'><br></div>
        <div class='input' id='cidade'>Cidade:<input type='text' class='valores' name='cidade' id='cidadeinput'><br></div>
        <div class='input' id='uf'>UF:<select name="uf" id='ufinput'>
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
        </select><br></div>
        <div class='input' id='tel1'>*Telefone 1:<input type='text' class='valores' name='tel1' id='tel1input'  onkeypress='tel1()'><br></div>
        <div class='input' id='tel2'>Telefone 2:<input type='text' class='valores' name='tel2' id='tel2input'  onkeypress='tel2()'><br></div>
        <div class='input' id='celular'>Celular:<input type='text' class='valores' name='celular' data-inputmask="'mask': '(99) 99999-9999'"><br></div>
        <div class='input' id='inscest'>Inscrição Estadual: <input type='text' class='valores' name='inscest' data-inputmask="'mask': '99.999.9999-9'"><br></div>
        <div class='input' id='website'>Web Site: <input type='text' class='valores' name='website'><br></div>
        <div class='input' id='email'>E-mail:<input type='text' class='valores' name='email' ><br></div>
        <div class='input' id='prof'>Profissão:<input type='text' class='valores' name='prof' ><br></div>
        <div class='input' id='razaosocial'>Razão Social: <input type='text' class='valores' name='razaosocial'><br></div>
        <div class='input' id='areaatuacao'>Área de Atuação: <input type='text' class='valores' name='areaatuacao'><br></div>
        <div class='input' id='obseti'>Observações para etiqueta:<input type='text' class='valores' name='obseti' ><br></div>
        <div class='input' id='nomeres'></div><br>
        <div class='input' id='telres'></div><br>
        <div class='input' id='endcom'>Endereço Completo(em caso de ser diferente do pessoal):<input type='text' class='valores' name='endcom' ><br></div>
        <div class='input' id='dep'>Departamento:<select name="dep" id='depselect' onchange='filtset()'>
        <option value=''>---</option>
        </select><button id='depnovobutton' onclick='novodep()'> Novo Departamento </button><br></div><div class='input' id='depnovo'></div>
        <div class='input' id='setor'>Setor:<select name="setor" id='setselect' onchange='filtfunc()'>
        <option value=''>---</option>
        </select><button id='setnovobutton' onclick='novoset()'> Novo Setor </button><br></div><div class='input' id='setnovo'></div>
        <div class='input' id='func'>Função:<select name="func" id='funcselect'>
        <option value=''>---</option>
        </select><button id='funcnovobutton' onclick='novofunc()'> Nova Função </button><br></div><div class='input' id='funcnovo'></div>
        <div class='input' id='ctps'>CTPS:<input type='text' class='valores' name='ctps' data-inputmask="'mask': '9999999'"><br></div>
        <div class='input' id='serie'>Série:<input type='text' class='valores' name='serie' data-inputmask="'mask': '999-9'"><br></div>
        <div class='input' id='ufctps'>UF:<select name="ufctps">
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
        </select><br></div>
        <div class='input' id='pis'>PIS:<input type='text' class='valores' name='pis' data-inputmask="'mask': '999.99999.99-9'"><br></div>
        <div class='input' id='salario'>Salário:<input type='text' class='valores' name='salario' id='salarioinput' onblur='salario()'><br></div>
        <div class='input' id='conjugue'>Cônjugue<input type='text' class='valores' name='conjugue'><br></div>
        <div class='input' id='pai'>Pai<input type='text' class='valores' name='pai'><br></div>
        <div class='input' id='mae'>Mãe<input type='text' class='valores' name='mae'></div>
        <div class='input' id='datareg'>Data do Registro:<input type='text' class='valores' name='datareg' ><br></div>
        <div class='input' id='ultatt'>Última Atualização:<input type='text' class='valores' name='ultatt' ><br></div>
        <div class='input' id='situpac'>Situação do Paciente:<select name="situpac" >
            <option value="ava">Avaliação</option>
            <option value="trat">Em tratamento</option>
            <option value="rev">Em revisão</option>
            <option value="conc">Concluído</option>
        </select><br></div>
        <div class='input' id='obj'>Objetivo da Consulta:<textarea name='obj' ></textarea><br></div>
        <div class='input' id='nomerep'>Nome do Representante - Pessoa de Contato: <input type='text' class='valores' name='nomerep'><br></div>
        <div class='input' id='emailrep'>E-mail: <input type='text' class='valores' name='emailrep'><br></div>
        <div class='input' id='contatorep'>Telefone de Contato: <input type='text' class='valores' name='contatorep' id='contatorepinput' onkeypress='contatorep()'><br></div>
        <div class='input' id='obs'>Observações<textarea name='obs' ></textarea><br></div>
        <div class='input' id='editar'><input type='button' name='editarpessoa' value='Editar Pessoa' id='editarpessoa' onclick='editarPessoa()'></div>
</head>
<body>
    
</body>
<script>
    var dadoslinhas = [];
    var sessao = '';
    reset();
    escondertabela();
    $('#tel1input').inputmask('(99) 9999[9]-9999');
    $('#tel2input').inputmask('(99) 9999[9]-9999');
    $('#contatorepinput').inputmask('(99) 9999[9]-9999');
    $('#salarioinput').inputmask('R$[9]9.999,99');
    $("input[id*='pesquisarpessoacpfcnpj']").inputmask({
        mask: ['999.999.999-99', '99.999.999/9999-99'],
        keepStatic: true
    });
    consdep();

    function escondertabela(){
        $('#tabela').css('display', 'none');
    }

    $('#pesquisarpessoanome').keyup(function(){

        var nome = $('#pesquisarpessoanome').val();
        var nomes = [];
        if(nome.length >= 2){
            $.ajax({
                type:'GET',
                url:'pessoa/nome',
                data: {nomepessoa:nome},
                dataType: "json",
                success: function(data){
                    for(i=0; i<data.length; i++){
                        if(data[i]['pac_nome']){
                            nomes.push(data[i]['pac_nome']);
                        }else if(data[i]['forfis_nome']){
                            nomes.push(data[i]['forfis_nome']);
                        }else if(data[i]['func_nome']){
                            nomes.push(data[i]['func_nome']);
                        }else if(data[i]['forjur_nome']){
                            nomes.push(data[i]['forjur_nome']);
                        }else if(data[i]['clijur_nome']){
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

    function buscarnome(){
        var nome = document.getElementById('pesquisarpessoanome').value;
        console.log(nome);

    }

    function pesquisarpessoa(){
        apagartabela();
        if(document.getElementById('pesquisarpessoacpfcnpj').value.length == 14 || document.getElementById('pesquisarpessoacpfcnpj').value.length == 18 || document.getElementById('pesquisarpessoanome').value.length >=2){
            $.ajax({
                type: "GET",
                url: "/consulta/pessoa/dados",
                data: {cpfcnpj: document.getElementById('pesquisarpessoacpfcnpj').value, nomepessoa: document.getElementById('pesquisarpessoanome').value},
                dataType: "json",
                success: function(data) {
                    document.getElementById('tabela').style.display = 'block';
                    for(i=0; i<data.length; i++){
                        var tabela = document.getElementById('pesquisarpessoatable');
                        var numeroLinhas = tabela.rows.length;
                        var linha = tabela.insertRow(numeroLinhas);
                        var celula1 = linha.insertCell(0);
                        var celula2 = linha.insertCell(1);   
                        var celula3 = linha.insertCell(2); 
                        var celula4 = linha.insertCell(3);
                        var celula5 = linha.insertCell(4);
                        if(document.getElementById('pesquisarpessoacpfcnpj').value.length == 14){
                            if(data[i]['pac_cpf'] != undefined){
                                dadoslinhas.push([data[i]['pac_cpf'], "pac"]);
                                celula1.innerHTML=data[i]['pac_cpf'];
                                celula2.innerHTML=data[i]['pac_nome'];
                                celula3.innerHTML=data[i]['pac_tel1'];
                                celula4.innerHTML='Cliente Físico';
                                celula5.innerHTML="<input type='button' name='editareste' id='"+i+"' value='Editar' onclick='editar(this)'>";
                            }else if(data[i]['forfis_cpf'] != undefined){
                                dadoslinhas.push([data[i]['forfis_cpf'], "forfis"]);
                                celula1.innerHTML=data[i]['forfis_cpf'];
                                celula2.innerHTML=data[i]['forfis_nome'];
                                celula3.innerHTML=data[i]['forfis_tel1'];
                                celula4.innerHTML='Fornecedor Físico';
                                celula5.innerHTML="<input type='button' name='editareste' id='"+i+"' value='Editar' onclick='editar(this)'>";
                            }else{
                                dadoslinhas.push([data[i]['func_cpf'], "func"]);
                                celula1.innerHTML=data[i]['func_cpf'];
                                celula2.innerHTML=data[i]['func_nome'];
                                celula3.innerHTML=data[i]['func_tel1'];
                                celula4.innerHTML='Funcionário';
                                celula4.innerHTML='Cliente Físico';
                                celula5.innerHTML="<input type='button' name='editareste' id='"+i+"' value='Editar' onclick='editar(this)'>";
                            }
                        }else if(document.getElementById('pesquisarpessoacpfcnpj').value.length == 18){
                            if(data[i]['forjur_cnpj'] != undefined){
                                dadoslinhas.push([data[i]['forjur_cnpj'], "forjur"]);
                                celula1.innerHTML=data[i]['forjur_cnpj'];
                                celula2.innerHTML=data[i]['forjur_nome'];
                                celula3.innerHTML=data[i]['forjur_tel1'];
                                celula4.innerHTML='Fornecedor Jurídico';
                                celula5.innerHTML="<input type='button' name='editareste' id='"+i+"' value='Editar' onclick='editar(this)'>";
                            }else{
                                dadoslinhas.push([data[i]['clijur_cnpj'], "clijur"]);
                                celula1.innerHTML=data[i]['clijur_cnpj'];
                                celula2.innerHTML=data[i]['clijur_nome'];
                                celula3.innerHTML=data[i]['clijur_tel1'];
                                celula4.innerHTML='Cliente Jurídico';
                                celula5.innerHTML="<input type='button' name='editareste' id='"+i+"' value='Editar' onclick='editar(this)'>";
                            }
                        }else{
                            if(data[i]['pac_cpf'] != undefined){
                                dadoslinhas.push([data[i]['pac_cpf'], "pac"]);
                                celula1.innerHTML=data[i]['pac_cpf'];
                                celula2.innerHTML=data[i]['pac_nome'];
                                celula3.innerHTML=data[i]['pac_tel1'];
                                celula4.innerHTML='Cliente Físico';
                                celula5.innerHTML="<input type='button' name='editareste' id='"+i+"' value='Editar' onclick='editar(this)'>";
                            }else if(data[i]['forfis_cpf'] != undefined){
                                dadoslinhas.push([data[i]['forfis_cpf'], "forfis"]);
                                celula1.innerHTML=data[i]['forfis_cpf'];
                                celula2.innerHTML=data[i]['forfis_nome'];
                                celula3.innerHTML=data[i]['forfis_tel1'];
                                celula4.innerHTML='Fornecedor Físico';
                                celula5.innerHTML="<input type='button' name='editareste' id='"+i+"' value='Editar' onclick='editar(this)'>";
                            }else if(data[i]['func_cpf'] != undefined){
                                dadoslinhas.push([data[i]['func_cpf'], "func"]);
                                celula1.innerHTML=data[i]['func_cpf'];
                                celula2.innerHTML=data[i]['func_nome'];
                                celula3.innerHTML=data[i]['func_tel1'];
                                celula4.innerHTML='Funcionário';
                                celula5.innerHTML="<input type='button' name='editareste' id='"+i+"' value='Editar' onclick='editar(this)'>";
                            }else if(data[i]['forjur_cnpj'] != undefined){
                                dadoslinhas.push([data[i]['forjur_cnpj'], "forjur"]);
                                celula1.innerHTML=data[i]['forjur_cnpj'];
                                celula2.innerHTML=data[i]['forjur_nome'];
                                celula3.innerHTML=data[i]['forjur_tel1'];
                                celula4.innerHTML='Fornecedor Jurídico';
                                celula5.innerHTML="<input type='button' name='editareste' id='"+i+"' value='Editar' onclick='editar(this)'>";
                            }else{
                                dadoslinhas.push([data[i]['clijur_cnpj'], "clijur"]);
                                celula1.innerHTML=data[i]['clijur_cnpj'];
                                celula2.innerHTML=data[i]['clijur_nome'];
                                celula3.innerHTML=data[i]['clijur_tel1'];
                                celula4.innerHTML='Cliente Jurídico';
                                celula5.innerHTML="<input type='button' name='editareste' id='"+i+"' value='Editar' onclick='editar(this)'>";
                            }
                        }
                        
                    }
                }
            });
        }
    }

    function editar(linha){
        linha = parseInt(linha.id);
        $.ajax({
                type:'GET',
                url:'pessoa/dadosedit',
                data: {cpfcnpj: dadoslinhas[linha][0] ,pessoa: dadoslinhas[linha][1]},
                dataType: "json",
                success: function(data){
                    if(data[0]['pac_nome']){
                        esconder('fis', 'pac', data[0]);
                        sessao = 'pac';
                    }else if(data[0]['forfis_nome']){
                        esconder('fis', 'forfis', data[0]);
                        sessao = 'forfis';
                    }else if(data[0]['func_nome']){
                        esconder('fis', 'func', data[0]);
                        sessao = 'func';
                    }else if(data[0]['forjur_nome']){
                        esconder('jur', 'forjur', data[0]);
                        sessao = 'forjur';
                    }else if(data[0]['clijur_nome']){
                        esconder('jur', 'clijur', data[0]);
                        sessao = 'clijur';
                    }
                }
            });
    }

    function mostrarsessao(){
        console.log(sessao);
    }
    function apagartabela(){
        var tableHeaderRowCount = 1;
        var table = document.getElementById('pesquisarpessoatable');
        var rowCount = table.rows.length;
        for (var i = tableHeaderRowCount; i < rowCount; i++) {
            table.deleteRow(tableHeaderRowCount);
        }
        reset();
    }

    function consdep(){
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
    function salario(){
        if(document.getElementById('salarioinput').value[10] = '_'){
            $('#salarioinput').inputmask('R$9.999,99');
        }else{
            $('#salarioinput').inputmask('R$[9]9.999,99');
        }
    }
    function reset(){
        $('.input').css('display', 'none');
    }

    function novodep(){
        document.getElementById('depnovo').innerHTML="Novo Departamento: <input type='text' id='depnovoinput' name='depnovoinput'><button onclick='cadastrodep()'>Cadastrar Departamento</button>";
        document.getElementById('depnovo').style.display='block';
    }

    function novoset(){
        document.getElementById('setnovo').innerHTML="Novo Setor: <input type='text' id='setnovoinput' name='setnovoinput'> Departamento:<select name='setnovodep' id='setnovodep'></select><button onclick='cadastroset()'>Cadastrar Setor</button>";
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
        document.getElementById('funcnovo').innerHTML="Nova Função: <input type='text' id='funcnovoinput' name='funcnovoinput'> Setor:<select name='funcnovoset' id='funcnovoset'></select><button onclick='cadastrofunc()'>Cadastrar Função</button>";
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

    function esconder(tipo, pessoa, dados) {
        escondertabela();
        document.getElementById('editar').style.display = 'block';
        if(tipo == 'fis'){
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
            if(pessoa == 'pac'){
                document.getElementById('estadocivil').style.display = 'block';
                document.getElementById('sexo').style.display = 'block';
                document.getElementById('prof').style.display = 'block';
                document.getElementById('obseti').style.display = 'block';
                document.getElementById('situpac').style.display = 'block';
                document.getElementById('obj').style.display = 'block';
                document.getElementById('nomeres').style.display = 'block';
                document.getElementById('telres').style.display = 'block';
                document.getElementById('nomeres').innerHTML = "Nome da mãe ou responsável:<input type='text' class='valores' name='nomeres' id='nomeresinput'>";
                document.getElementById('telres').innerHTML = "Telefone da mãe ou responsável:<input type='text' class='valores' name='telres' id='telresinput' onkeypress='telres()'>";
                $('#telresinput').inputmask('(99) 9999[9]-9999');

                document.querySelector("[name='cpf']").value = dados['pac_cpf'];
                document.querySelector("[name='nome']").value = dados['pac_nome'];
                document.querySelector("[name='datanasc']").value = dados['pac_datanasc'];
                if(dados['pac_cep'] != null){
                    document.querySelector("[name='cep']").value = dados['pac_cep'];
                }
                if(dados['pac_rg'] != null){
                    document.querySelector("[name='rg']").value = dados['pac_rg'];
                }
                document.querySelector("[name='logradouro']").value = dados['pac_logradouro'];
                document.querySelector("[name='num']").value = dados['pac_num'];
                document.querySelector("[name='complemento']").value = dados['pac_complemento'];
                document.querySelector("[name='bairro']").value = dados['pac_bairro'];
                document.querySelector("[name='cidade']").value = dados['pac_cidade'];
                document.querySelector("[name='uf']").value = dados['pac_uf'];
                if(dados['pac_celular'] != null){
                    document.querySelector("[name='celular']").value = dados['pac_celular'];
                }
                document.querySelector("[name='tel1']").value = dados['pac_tel1'];
                if(dados['pac_tel2'] != null){
                    document.querySelector("[name='tel2']").value = dados['pac_tel2'];
                }
                document.querySelector("[name='email']").value = dados['pac_email'];
                document.querySelector("[name='obs']").value = dados['pac_obs'];
                document.querySelector("[name='estadocivil']").value = dados['pac_estadocivil'];
                document.querySelector("[name='sexo']").value = dados['pac_sexo'];
                document.querySelector("[name='prof']").value = dados['pac_profissao'];
                document.querySelector("[name='obseti']").value = dados['pac_obseti'];
                document.querySelector("[name='situpac']").value = dados['pac_situ'];
                document.querySelector("[name='obj']").value = dados['pac_obj'];
                document.querySelector("[name='nomeres']").value = dados['pac_nomeres'];
                if(dados['pac_telres'] != null){
                    document.querySelector("[name='telres']").value = dados['pac_telres'];
                }

            }else if(pessoa == 'forfis'){
                document.getElementById('estadocivil').style.display = 'block';
                document.getElementById('sexo').style.display = 'block';
                document.getElementById('razaosocial').style.display = 'block';
                document.getElementById('website').style.display = 'block';
                document.getElementById('areaatuacao').style.display = 'block';

                document.querySelector("[name='cpf']").value = dados['forfis_cpf'];
                document.querySelector("[name='nome']").value = dados['forfis_nome'];
                document.querySelector("[name='datanasc']").value = dados['forfis_datanasc'];
                if(dados['forfis_cep'] != null){
                    document.querySelector("[name='cep']").value = dados['forfis_cep'];
                }
                if(dados['forfis_rg'] != null){
                    document.querySelector("[name='rg']").value = dados['forfis_rg'];
                }
                document.querySelector("[name='logradouro']").value = dados['forfis_logradouro'];
                document.querySelector("[name='num']").value = dados['forfis_num'];
                document.querySelector("[name='complemento']").value = dados['forfis_complemento'];
                document.querySelector("[name='bairro']").value = dados['forfis_bairro'];
                document.querySelector("[name='cidade']").value = dados['forfis_cidade'];
                document.querySelector("[name='uf']").value = dados['forfis_uf'];
                if(dados['forfis_celular'] != null){
                    document.querySelector("[name='celular']").value = dados['forfis_celular'];
                }
                document.querySelector("[name='tel1']").value = dados['forfis_tel1'];
                if(dados['forfis_tel2'] != null){
                    document.querySelector("[name='tel2']").value = dados['forfis_tel2'];
                }
                document.querySelector("[name='email']").value = dados['forfis_email'];
                document.querySelector("[name='obs']").value = dados['forfis_obs'];
                document.querySelector("[name='estadocivil']").value = dados['forfis_estadocivil'];
                document.querySelector("[name='sexo']").value = dados['forfis_sexo'];
                document.querySelector("[name='razaosocial']").value = dados['forfis_razaosocial'];
                document.querySelector("[name='website']").value = dados['forfis_website'];
                document.querySelector("[name='areaatuacao']").value = dados['forfis_areaatuacao'];

            }else{
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
                
                document.querySelector("[name='cpf']").value = dados['func_cpf'];
                document.querySelector("[name='nome']").value = dados['func_nome'];
                document.querySelector("[name='datanasc']").value = dados['func_datanasc'];
                if(dados['func_cep'] != null){
                    document.querySelector("[name='cep']").value = dados['func_cep'];
                }
                if(dados['func_rg'] != null){
                    document.querySelector("[name='rg']").value = dados['func_rg'];
                }
                document.querySelector("[name='logradouro']").value = dados['func_logradouro'];
                document.querySelector("[name='num']").value = dados['func_num'];
                document.querySelector("[name='complemento']").value = dados['func_complemento'];
                document.querySelector("[name='bairro']").value = dados['func_bairro'];
                document.querySelector("[name='cidade']").value = dados['func_cidade'];
                document.querySelector("[name='uf']").value = dados['func_uf'];
                if(dados['func_celular'] != null){
                    document.querySelector("[name='celular']").value = dados['func_celular'];
                }
                document.querySelector("[name='tel1']").value = dados['func_tel1'];
                if(dados['func_tel2'] != null){
                    document.querySelector("[name='tel2']").value = dados['func_tel2'];
                }
                document.querySelector("[name='email']").value = dados['func_email'];
                document.querySelector("[name='obs']").value = dados['func_obs'];
                document.querySelector("[name='estadocivil']").value = dados['func_estadocivil'];
                document.querySelector("[name='sexo']").value = dados['func_sexo'];
                document.querySelector("[name='dep']").value = dados['func_dep'];
                filtset();
                setTimeout(function(){ document.querySelector("[name='setor']").value = dados['func_setor'];}, 500);
                setTimeout(function(){ filtfunc();}, 1000);
                setTimeout(function(){ document.querySelector("[name='func']").value = dados['func_func'];}, 1500);
                document.querySelector("[name='ctps']").value = dados['func_ctps'];
                document.querySelector("[name='serie']").value = dados['func_serie'];
                document.querySelector("[name='pis']").value = dados['func_pis'];
                document.querySelector("[name='ufctps']").value = dados['func_ufctps'];
                document.querySelector("[name='salario']").value = dados['func_salario'];
                document.querySelector("[name='conjugue']").value = dados['func_conjugue'];
                document.querySelector("[name='pai']").value = dados['func_nomepai'];
                document.querySelector("[name='mae']").value = dados['func_nomemae'];

            }
        }else{
            if(pessoa == 'forjur'){
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
                document.getElementById('razaosocial').style.display = 'block';
                document.getElementById('inscest').style.display = 'block';
                document.getElementById('website').style.display = 'block';
                document.getElementById('areaatuacao').style.display = 'block';
                document.getElementById('nomerep').style.display = 'block';
                document.getElementById('emailrep').style.display = 'block';
                document.getElementById('contatorep').style.display = 'block';
                document.getElementById('obs').style.display = 'block';

                document.querySelector("[name='nome']").value = dados['forjur_nome'];
                document.querySelector("[name='cnpj']").value = dados['forjur_cnpj'];
                if(dados['forjur_cep'] != null){
                    document.querySelector("[name='cep']").value = dados['forjur_cep'];
                }
                document.querySelector("[name='logradouro']").value = dados['forjur_logradouro'];
                document.querySelector("[name='num']").value = dados['forjur_num'];
                document.querySelector("[name='uf']").value = dados['forjur_uf'];
                document.querySelector("[name='complemento']").value = dados['forjur_complemento'];
                document.querySelector("[name='bairro']").value = dados['forjur_bairro'];
                document.querySelector("[name='cidade']").value = dados['forjur_cidade'];
                document.querySelector("[name='tel1']").value = dados['forjur_tel1'];
                if(dados['forjur_celular'] != null){
                    document.querySelector("[name='celular']").value = dados['forjur_celular'];
                }
                if(dados['forjur_tel2'] != null){
                    document.querySelector("[name='tel2']").value = dados['forjur_tel2'];
                }
                document.querySelector("[name='email']").value = dados['forjur_email'];
                document.querySelector("[name='obs']").value = dados['forjur_obs'];
                document.querySelector("[name='razaosocial']").value = dados['forjur_razaosocial'];
                document.querySelector("[name='inscest']").value = dados['forjur_inscest'];
                document.querySelector("[name='website']").value = dados['forjur_website'];
                document.querySelector("[name='areaatuacao']").value = dados['forjur_areaatuacao'];
                document.querySelector("[name='nomerep']").value = dados['forjur_nomerep'];
                document.querySelector("[name='emailrep']").value = dados['forjur_emailrep'];
                if(dados['forjur_contatorep'] != null){
                    document.querySelector("[name='contatorep']").value = dados['forjur_contatorep'];
                }
                document.querySelector("[name='obs']").value = dados['forjur_obs'];
            }else{
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
                document.getElementById('razaosocial').style.display = 'block';
                document.getElementById('inscest').style.display = 'block';
                document.getElementById('website').style.display = 'block';
                document.getElementById('areaatuacao').style.display = 'block';
                document.getElementById('nomerep').style.display = 'block';
                document.getElementById('emailrep').style.display = 'block';
                document.getElementById('contatorep').style.display = 'block';
                document.getElementById('obs').style.display = 'block';

                document.querySelector("[name='nome']").value = dados['clijur_nome'];
                document.querySelector("[name='cnpj']").value = dados['clijur_cnpj'];
                if(dados['clijur_cep'] != null){
                    document.querySelector("[name='cep']").value = dados['clijur_cep'];
                }
                document.querySelector("[name='logradouro']").value = dados['clijur_logradouro'];
                document.querySelector("[name='num']").value = dados['clijur_num'];
                document.querySelector("[name='uf']").value = dados['clijur_uf'];
                document.querySelector("[name='complemento']").value = dados['clijur_complemento'];
                document.querySelector("[name='bairro']").value = dados['clijur_bairro'];
                document.querySelector("[name='cidade']").value = dados['clijur_cidade'];
                document.querySelector("[name='tel1']").value = dados['clijur_tel1'];
                if(dados['clijur_celular'] != null){
                    document.querySelector("[name='celular']").value = dados['clijur_celular'];
                }
                if(dados['clijur_tel2'] != null){
                    document.querySelector("[name='tel2']").value = dados['clijur_tel2'];
                }
                document.querySelector("[name='email']").value = dados['clijur_email'];
                document.querySelector("[name='obs']").value = dados['clijur_obs'];
                document.querySelector("[name='razaosocial']").value = dados['clijur_razaosocial'];
                document.querySelector("[name='inscest']").value = dados['clijur_inscest'];
                document.querySelector("[name='website']").value = dados['clijur_website'];
                document.querySelector("[name='areaatuacao']").value = dados['clijur_areaatuacao'];
                document.querySelector("[name='nomerep']").value = dados['clijur_nomerep'];
                document.querySelector("[name='emailrep']").value = dados['clijur_emailrep'];
                if(dados['clijur_contatorep'] != null){
                    document.querySelector("[name='contatorep']").value = dados['clijur_contatorep'];
                }
                document.querySelector("[name='obs']").value = dados['clijur_obs'];
            }
        }
    }
    

    function editarPessoa(){
        if(sessao == 'pac'){
            $.ajax({
            type: "GET",
            url: "/editar/editarpaciente",
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
                obseti:$("[name='obseti']").val(),
                nomeres:$("[name='nomeres']").val(),
                telres:$("[name='telres']").val(),
                situpac:$("[name='situpac']").val(),
                obj:$("[name='obj']").val(),
                obs:$("[name='obs']").val(),
                
            },
            dataType: "json",
            success: function(data) {
                console.log('Paciente editado com sucesso');
                }
            });
        }
        if(sessao == 'forfis'){
            $.ajax({
            type: "GET",
            url: "/editar/editarfornecedorfisico",
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
                inscest:$("[name='inscest']").val(),
                website:$("[name='website']").val(),
                areaatuacao:$("[name='areaatuacao']").val(),
                obs:$("[name='obs']").val(),
                
            },
            dataType: "json",
            success: function(data) {
                console.log('Fornecedor Físico editado com sucesso!');
                }
            });
        }
        if(sessao == 'func'){
            $.ajax({
            type: "GET",
            url: "/editar/editarfuncionario",
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
                
            },
            dataType: "json",
            success: function(data) {
                console.log('Funcionário editado com sucesso!');
                }
            });
        }
        if(sessao == 'forjur'){
            $.ajax({
            type: "GET",
            url: "/editar/editarfornecedorjuridico",
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
                website:$("[name='website']").val(),
                inscest:$("[name='inscest']").val(),
                razaosocial:$("[name='razaosocial']").val(),
                areaatuacao:$("[name='areaatuacao']").val(),
                nomerep:$("[name='nomerep']").val(),
                emailrep:$("[name='emailrep']").val(),
                contatorep:$("[name='contatorep']").val(),
                obs:$("[name='obs']").val(),
                
            },
            dataType: "json",
            success: function(data) {
                console.log('Fornecedor Jurídico editado com sucesso!');
                }
            });
        }

        if(sessao == 'clijur'){
            $.ajax({
            type: "GET",
            url: "/editar/editarclientejuridico",
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
                website:$("[name='website']").val(),
                inscest:$("[name='inscest']").val(),
                razaosocial:$("[name='razaosocial']").val(),
                areaatuacao:$("[name='areaatuacao']").val(),
                nomerep:$("[name='nomerep']").val(),
                emailrep:$("[name='emailrep']").val(),
                contatorep:$("[name='contatorep']").val(),
                obs:$("[name='obs']").val(),
                
            },
            dataType: "json",
            success: function(data) {
                console.log('Cliente editado com sucesso!');
                }
            });
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
                    document.getElementById('setnovo').style.display='none'
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
                    document.getElementById('funcnovo').style.display='none'
                    }
                });
    }
</script>
</html>