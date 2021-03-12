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
    <title>Consulta do Médico</title>
        Nome: <input type='text' name='pesquisarmediconome' id='pesquisarmediconome' > CPF/CNPJ: <input type='text' name='pesquisarmedicocpf' id='pesquisarmedicocpf'><input type='button' value='Pesquisar' onclick='pesquisarmedico()'>
        <div id='tabela'><table border='1px'id='pesquisarmedicotable'>
            <tr>
                <th>CPF</th>
                <th>Nome do Médico</th>
                <th>Telefone de Contato</th>
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
        <div class='input' id='email'>E-mail:<input type='text' class='valores' name='email' ><br></div>
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
        <div class='input' id='comissao'>Comissao(%):<input type='number' class='valores' name='comissao' min='1' max='100'><br></div>
        <div class='input' id='espec'>Especialidade:<select name="espec" id='especselect' onchange='filtespeci()'>
        <option value=''>---</option>
        </select><button id='especnovobutton' onclick='novoespec()'> Nova Especialidade </button><br></div><div class='input' id='especnovo'></div>
        <div class='input' id='especicheckbox'></div><br></div><div class='input' id='especinovo'></div>
        <div class='input' id='pagamento'>Dia do Pagamento:<input type='number' class='valores' name='pagamento' value ='1' min='1' max='100' value='1'><br></div>
        <div class='input' id='status'>Status: Ativo <input type='radio' value='Ativo' id='Ativo' name='status' checked > Inativo <input type='radio' value='Inativo' id='Inativo' name='status'><br></div>
        <div class='input' id='tabelaagenda'><table id='horaatendimentotable'>
            <tr>
                <th>Domingo</th>
                <th>Segunda</th>
                <th>Terça</th>
                <th>Quarta</th>
                <th>Quinta</th>
                <th>Sexta</th>
                <th>Sábado</th>
            </tr>
            <tr>
                <td><input type='checkbox' name='domingocheckbox' id='domingocheckbox' checked></td>
                <td><input type='checkbox' name='segundacheckbox' id='segundacheckbox'checked></td>
                <td><input type='checkbox' name='tercacheckbox' id='tercacheckbox'checked></td>
                <td><input type='checkbox' name='quartacheckbox' id='quartacheckbox'checked></td>
                <td><input type='checkbox' name='quintacheckbox' id='quintacheckbox'checked></td>
                <td><input type='checkbox' name='sextacheckbox' id='sextacheckbox'checked></td>
                <td><input type='checkbox' name='sabadocheckbox' id='sabadocheckbox'checked></td>
            </tr>
            <tr>
                <td><select name='domingoselect1' id='domingoselect1'></select></td>
                <td><select name='segundaselect1' id='segundaselect1'></select></td>
                <td><select name='tercaselect1' id='tercaselect1'></select></td>
                <td><select name='quartaselect1' id='quartaselect1'></select></td>
                <td><select name='quintaselect1' id='quintaselect1'></select></td>
                <td><select name='sextaselect1' id='sextaselect1'></select></td>
                <td><select name='sabadoselect1' id='sabadoselect1'></select></td>
            </tr>
            <tr>
                <td><select name='domingoselect2' id='domingoselect2'></select></td>
                <td><select name='segundaselect2' id='segundaselect2'></select></td>
                <td><select name='tercaselect2' id='tercaselect2'></select></td>
                <td><select name='quartaselect2' id='quartaselect2'></select></td>
                <td><select name='quintaselect2' id='quintaselect2'></select></td>
                <td><select name='sextaselect2' id='sextaselect2'></select></td>
                <td><select name='sabadoselect2' id='sabadoselect2'></select></td>
            </tr>
        </table></div>
 
        <div class='input' id='editar'><input type='button' name='editarmedico' value='Editar Médico' id='editarmedico' onclick='editarMedico()'></div>
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
    $("input[id*='pesquisarmedicocpf']").inputmask({
        mask: ['999.999.999-99', '99.999.999/9999-99'],
        keepStatic: true
    });
    
    var especiar = [];
    var especiaresc = [];

    function filtespeci(){
        document.getElementById('especicheckbox').innerHTML = '';
        if($("[name='espec']").val() != ''){
            $.ajax({
                type: "GET",
                url: "/consultacadastroespeci",
                data: {espec:$("[name='espec']").val()},
                dataType: "json",
                success: function(data) {
                    for(var i = 0; i<data['nome'].length; i++){
                        document.getElementById('especicheckbox').innerHTML += data['nome'][i] + ": <input type='checkbox' name='especibox"+data['id'][i]+"' value='"+data['id'][i]+"'> ";
                        especiar.push(data['id'][i]);
                    }
                    document.getElementById('especicheckbox').innerHTML+= "<button id='especinovobutton' onclick='novaespeci()'> Nova Especialização </button>";
                }
            });
        }
    }

    function consespec(){
        $.ajax({
                type: "GET",
                url: "/consultacadastroespec",
                data: {},
                dataType: "json",
                success: function(data) {
                    var select = document.getElementById('especselect');
                    for(var i = 0; i<data['id'].length; i++){
                        var opt = document.createElement('option');
                        opt.appendChild(document.createTextNode(data['nome'][i]));
                        opt.value = data['id'][i];
                        select.appendChild(opt);
                    }
                }
            });
    }

    function preencherSelects(){
        var dias = ['domingoselect1','segundaselect1','tercaselect1','quartaselect1','quintaselect1','sextaselect1','sabadoselect1', 'domingoselect2','segundaselect2','tercaselect2','quartaselect2','quintaselect2','sextaselect2','sabadoselect2'];
        var horas = ['07:00:00','07:15:00','07:30:00','07:45:00','08:00:00','08:15:00','08:30:00','08:45:00','09:00:00','09:15:00','09:30:00','09:45:00','10:00:00','10:15:00','10:30:00','10:45:00','11:00:00','11:15:00','11:30:00','11:45:00','12:00:00','12:15:00','12:30:00','12:45:00','13:00:00','13:15:00','13:30:00','13:45:00','14:00:00','14:15:00','14:30:00','14:45:00','15:00:00','15:15:00','15:30:00','15:45:00','16:00:00','16:15:00','16:30:00','16:45:00','17:00:00','17:15:00','17:30:00','17:45:00','18:00:00','18:15:00','18:30:00','18:45:00','19:00:00','19:15:00','19:30:00','19:45:00','20:00:00','20:15:00','20:30:00','20:45:00','21:00:00','21:15:00','21:30:00','21:45:00','22:00:00','22:15:00','22:30:00','22:45:00','23:00:00','23:15:00','23:30:00','23:45:00'];
        for(var o = 0; o<dias.length; o++){
            var select = document.getElementById(dias[o]);
            for(var i = 0; i<horas.length; i++){
                var opt = document.createElement('option');
                opt.appendChild(document.createTextNode(horas[i]));
                opt.value = horas[i];
                select.appendChild(opt);
            }
            if(o > 6){
                document.getElementById(dias[o]).value = '23:45:00';
            }else{
                document.getElementById(dias[o]).value = '07:00:00';
            }
            
        }
    
    }

    function escondertabela(){
        $('#tabela').css('display', 'none');
    }

    $('#pesquisarmediconome').keyup(function(){

        var nome = $('#pesquisarmediconome').val();
        var nomes = [];
        if(nome.length >= 2){
            $.ajax({
                type:'GET',
                url:'medico/nome',
                data: {nomemedico:nome},
                dataType: "json",
                success: function(data){
                    for(i=0; i<data.length; i++){
                        nomes.push(data[i]['med_nome']);
                    }
                    nomes = nomes.filter((este, i) => nomes.indexOf(este) === i);
                    $("#pesquisarmediconome").autocomplete({
                        source: nomes
                        });
                }

            });

        }

    });

    function buscarnome(){
        var nome = document.getElementById('pesquisarmediconome').value;
    }

    function pesquisarmedico(){
        apagartabela();
        $.ajax({
                type: "GET",
                url: "/consulta/medico/dados",
                data: {cpf: document.getElementById('pesquisarmedicocpf').value, nomemedico: document.getElementById('pesquisarmediconome').value},
                dataType: "json",
                success: function(data) {
                    document.getElementById('tabela').style.display = 'block';
                    for(i=0; i<data.length; i++){
                        var tabela = document.getElementById('pesquisarmedicotable');
                        var numeroLinhas = tabela.rows.length;
                        var linha = tabela.insertRow(numeroLinhas);
                        var celula1 = linha.insertCell(0);
                        var celula2 = linha.insertCell(1);   
                        var celula3 = linha.insertCell(2); 
                        var celula4 = linha.insertCell(3);
                        dadoslinhas.push(data[i]['med_cpf']);
                        celula1.innerHTML=data[i]['med_cpf'];
                        celula2.innerHTML=data[i]['med_nome'];
                        celula3.innerHTML=data[i]['med_tel1'];
                        celula4.innerHTML="<input type='button' name='editareste' id='"+i+"' value='Editar' onclick='editar(this)'>";
                        
                    }
                }
            });
    }

    function editar(linha){
        linha = parseInt(linha.id);
        $.ajax({
            type:'GET',
            url:'medico/dadosedit',
            data: {cpf: dadoslinhas[linha]},
            dataType: "json",
            success: function(data){
                esconder(data[0]);
            }
        });
    }

    function apagartabela(){
        var tableHeaderRowCount = 1;
        var table = document.getElementById('pesquisarmedicotable');
        var rowCount = table.rows.length;
        for (var i = tableHeaderRowCount; i < rowCount; i++) {
            table.deleteRow(tableHeaderRowCount);
        }
        reset();
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
        preencherSelects();
        consespec();
        document.getElementById('editar').style.display = 'block';

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
        document.getElementById('estadocivil').style.display = 'block';
        document.getElementById('sexo').style.display = 'block';
        document.getElementById('comissao').style.display = 'block';
        document.getElementById('pagamento').style.display = 'block';
        document.getElementById('espec').style.display = 'block';
        document.getElementById('tabelaagenda').style.display = 'block';
        document.getElementById('status').style.display = 'block';
        document.getElementById('especicheckbox').style.display = 'block';

        document.querySelector("[name='cpf']").value = dados['med_cpf'];
        document.querySelector("[name='nome']").value = dados['med_nome'];
        document.querySelector("[name='datanasc']").value = dados['med_datanasc'];
        if(dados['med_cep'] != null){
            document.querySelector("[name='cep']").value = dados['med_cep'];
        }
        if(dados['med_rg'] != null){
            document.querySelector("[name='rg']").value = dados['med_rg'];
        }
        document.querySelector("[name='logradouro']").value = dados['med_logradouro'];
        document.querySelector("[name='num']").value = dados['med_num'];
        document.querySelector("[name='complemento']").value = dados['med_complemento'];
        document.querySelector("[name='bairro']").value = dados['med_bairro'];
        document.querySelector("[name='cidade']").value = dados['med_cidade'];
        document.querySelector("[name='uf']").value = dados['med_uf'];
        if(dados['med_celular'] != null){
            document.querySelector("[name='celular']").value = dados['med_celular'];
        }
        document.querySelector("[name='tel1']").value = dados['med_tel1'];
        if(dados['med_tel2'] != null){
            document.querySelector("[name='tel2']").value = dados['med_tel2'];
        }
        document.querySelector("[name='email']").value = dados['med_email'];
        document.querySelector("[name='estadocivil']").value = dados['med_estadocivil'];
        document.querySelector("[name='sexo']").value = dados['med_sexo'];
        document.querySelector("[name='comissao']").value = dados['med_comissao'];
        document.querySelector("[name='pagamento']").value = dados['med_diapag'];
        document.querySelector("[name='status']").value = dados['med_status'];
        preencherAgenda(dados['med_id']);
        setTimeout(function(){ document.querySelector("[name='espec']").value = dados['med_espec']; filtespeci();}, 500);
        setTimeout(function(){ preencherEspeci(dados['med_especi'])}, 1000);
    }

    function preencherEspeci(dados){
        dados = dados.split(',');
        for(var i = 0; i<dados.length; i++){
            var nome = 'especibox'+dados[i];
            $("[name='"+nome+"']").attr('checked', true);
        }
    }

    function preencherAgenda(id){
        $.ajax({
            type: "GET",
            url: "/consulta/medico/agenda",
            data: {
                med_id:id,
            },
            dataType: "json",
            success: function(data) {
                    var dias = ['medat_domingo', 'medat_segunda', 'medat_terca', 'medat_quarta', 'medat_quinta', 'medat_sexta', 'medat_sabado'];
                    for(var i = 0; i<dias.length; i++){
                        if(data[0][dias[i]]){
                            var horas = data[0][dias[i]].split(' - ');
                            document.getElementById(dias[i].substr(6)+'select1').value = horas[0];
                            document.getElementById(dias[i].substr(6)+'select2').value = horas[1];
                        }else{
                            $("[name='"+dias[i].substr(6)+"checkbox']").attr('checked', false);
                        }
                    }
                }
            });
    }

    function editarMedico(){
        for(var o = 0; o<especiar.length; o++){
            var sla = 'especibox'+especiar[o];
            if($("[name='"+sla+"']").prop('checked') == true){
                especiaresc.push($("[name='"+sla+"']").val());
            }
        }
        $.ajax({
            type: "GET",
            url: "/editar/editarmedico",
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
                comissao:$("[name='comissao']").val(),
                espec:$("[name='espec']").val(),
                especi: especiaresc,
                pagamento:$("[name='pagamento']").val(),
                status:$("[name='status']").val(),
                domingocheckbox:$("[name='domingocheckbox']").prop('checked'),
                domingoselect1:$("[name='domingoselect1']").val(),
                domingoselect2:$("[name='domingoselect2']").val(),
                segundacheckbox:$("[name='segundacheckbox']").prop('checked'),
                segundaselect1:$("[name='segundaselect1']").val(),
                segundaselect2:$("[name='segundaselect2']").val(),
                tercacheckbox:$("[name='tercacheckbox']").prop('checked'),
                tercaselect1:$("[name='tercaselect1']").val(),
                tercaselect2:$("[name='tercaselect2']").val(),
                quartacheckbox:$("[name='quartacheckbox']").prop('checked'),
                quartaselect1:$("[name='quartaselect1']").val(),
                quartaselect2:$("[name='quartaselect2']").val(),
                quintacheckbox:$("[name='quintacheckbox']").prop('checked'),
                quintaselect1:$("[name='quintaselect1']").val(),
                quintaselect2:$("[name='quintaselect2']").val(),
                sextacheckbox:$("[name='sextacheckbox']").prop('checked'),
                sextaselect1:$("[name='sextaselect1']").val(),
                sextaselect2:$("[name='sextaselect2']").val(),
                sabadocheckbox:$("[name='sabadocheckbox']").prop('checked'),
                sabadoselect1:$("[name='sabadoselect1']").val(),
                sabadoselect2:$("[name='sabadoselect2']").val(),
            },
            dataType: "json",
            success: function(data) {
                console.log('Medico editado com sucesso');
                }
            });
    }
</script>
</html>