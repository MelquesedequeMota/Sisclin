<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro do Médico</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <script src="{{asset('jquery.min.js')}}"></script>
    <script src="{{asset('inputmask/dist/jquery.inputmask.min.js')}}"></script>
    <script src="{{asset('inputmask/dist/bindings/inputmask.binding.js')}}"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>
        <div class='input' id='cpf'>*CPF:<input type='text' class='valores' name='cpf' data-inputmask="'mask': '999.999.999-99'"><br></div>
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
        <div class='input' id='comissao'>Comissao(%):<input type='number' class='valores' name='comissao' min='1' max='100' value='1'><br></div>
        <div class='input' id='espec'>Especialidade:<select name="espec" id='especselect' onchange='filtespeci()'>
        <option value=''>---</option>
        </select><button id='especnovobutton' onclick='novoespec()'> Nova Especialidade </button><br></div><div class='input' id='especnovo'></div>
        <div class='input' id='especicheckbox'></div><br></div><div class='input' id='especinovo'></div>
        <div class='input' id='pagamento'>Dia do Pagamento:<input type='number' class='valores' name='pagamento' value ='1' min='1' max='100' value='1'><br></div>
        <div class='input' id='status'>Status: Ativo <input type='radio' value='Ativo' id='Ativo' name='status' checked > Inativo <input type='radio' value='Inativo' id='Inativo' name='status'><br></div>
        <div class='input' id='tempoconsulta'>Tempo da mínimo da consulta:<select name="tempoconsulta" id='tempoconsultainput'>
            <option value='5'>5 min</option>
            <option value='10'>10 min</option>
            <option value='15'>15 min</option>
            <option value='20'>20 min</option>
            <option value='25'>25 min</option>
            <option value='30'>30 min</option>
            <option value='35'>35 min</option>
            <option value='40'>40 min</option>
            <option value='45'>45 min</option>
            <option value='50'>50 min</option>
            <option value='55'>55 min</option>
            <option value='60'>60 min</option>
        </select><br></div>
        <div id='tabela'><table id='horaatendimentotable'>
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
        <input type='button' name='cadastrarmedico' id='cadastrarmedico' onclick='cadastrarmedico()' value='Cadastrar Médico'>
</body>
<script>
    consespec();
    preencherSelects();
    $('#tel1input').inputmask('(99) 9999[9]-9999');
    $('#tel2input').inputmask('(99) 9999[9]-9999');
    var especiar = [];
    var especiaresc = [];

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

    function novoespec(){
            document.getElementById('especnovo').innerHTML="Nova Especialidade: <input type='text' id='especnovoinput' name='especnovoinput'> Descrição: <input type='text' id='especnovodescinput' name='especnovodescinput'><button onclick='cadastroespec()'>Cadastrar Especialidade</button>";
            document.getElementById('especnovo').style.display='block';
        }

    function novaespeci(){
        document.getElementById('especinovo').innerHTML="Nova Especialização: <input type='text' id='especinovoinput' name='especinovoinput'> Especialidade:<select name='especinovoespec' id='especinovoespec'></select><button onclick='cadastroespeci()'>Cadastrar Especialização</button>";
        document.getElementById('especinovo').style.display='block';
        $.ajax({
                type: "GET",
                url: "/consultacadastroespec",
                data: {},
                dataType: "json",
                success: function(data) {
                    var select = document.getElementById('especinovoespec');
                    for(var i = 0; i<data['id'].length; i++){
                        var opt = document.createElement('option');
                        opt.appendChild(document.createTextNode(data['nome'][i]));
                        opt.value = data['id'][i];
                        select.appendChild(opt);
                    }
                }
            });
    }

    function cadastroespec(){
        $.ajax({
                type: "GET",
                url: "/cadastro/cadastroespecialidade",
                data: {
                    nome:$("[name='especnovoinput']").val(),
                    desc:$("[name='especnovodescinput']").val(),
                },
                dataType: "json",
                success: function(data) {
                    console.log('Especialidade cadastrado com sucesso');
                    document.getElementById('especnovo').style.display='none'
                    consespec();
                    }
                });
    }
    function cadastroespeci(){
        $.ajax({
                type: "GET",
                url: "/cadastro/cadastroespecializacao",
                data: {
                    nome:$("[name='especinovoinput']").val(),
                    espec:$("[name='especinovoespec']").val(),
                },
                dataType: "json",
                success: function(data) {
                    console.log('Especialização cadastrada com sucesso');
                    document.getElementById('especinovo').style.display='none'
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

    function cadastrarmedico(){
        for(var o = 0; o<especiar.length; o++){
            var sla = 'especibox'+especiar[o];
            if($("[name='"+sla+"']").prop('checked') == true){
                especiaresc.push($("[name='"+sla+"']").val());
            }
        }
        $.ajax({
            type: "GET",
            url: "/cadastro/cadastromedico",
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
                status:$("input[name=status]:checked").val(),
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
                tempoconsulta:$("[name='tempoconsulta']").val(),
            },
            dataType: "json",
            success: function(data) {
                console.log('Médico cadastrado com sucesso');
                }
            });
    }
</script>
</html>