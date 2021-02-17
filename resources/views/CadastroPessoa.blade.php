<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <script src="{{asset('jquery.min.js')}}"></script>
    <script src="{{asset('inputmask/dist/jquery.inputmask.min.js')}}"></script>
    <script src="{{asset('inputmask/dist/bindings/inputmask.binding.js')}}"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <title>Cadastro de Pessoa</title>
        Tipo de Pessoa:<select name="tipo_pessoa" id='tipo_pessoa' onchange='subTipo()'>
            <option value="n"></option>
            <option value="fis">Física</option>
            <option value="jur">Jurídica</option>
        </select><br>
        <div id='subtipo'></div>
        <div class='input' id='cpf'>*CPF:<input type='text' class='valores' name='cpf' data-inputmask="'mask': '999.999.999-99'"><br></div>
        <div class='input' id='cnpj'>*CNPJ:<input type='text' class='valores' name='cnpj' data-inputmask="'mask': '99.999.999/999-99'"><br></div>
        <div class='input' id='nome'>*Nome:<input type='text' class='valores' name='nome'><br></div>
        <div class='input' id='rg'>*RG:<input type='text' class='valores' name='rg' data-inputmask="'mask': '9999999999-9'"><br></div>
        <div class='input' id='datanasc'>*Data de Nascimento:<input type='text' class='valores' name='datanasc'><br></div>
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
        <div class='input' id='tel1'>*Telefone 1:<input type='text' class='valores' name='tel1' ><br></div>
        <div class='input' id='tel2'>Telefone 2:<input type='text' class='valores' name='tel2' ><br></div>
        <div class='input' id='celular'>Celular:<input type='text' class='valores' name='celular' ><br></div>
        <div class='input' id='inscest'>Inscrição Estadual: <input type='text' class='valores' name='inscest'><br></div>
        <div class='input' id='website'>Web Site: <input type='text' class='valores' name='website'><br></div>
        <div class='input' id='email'>E-mail:<input type='text' class='valores' name='email' ><br></div>
        <div class='input' id='prof'>Profissão:<input type='text' class='valores' name='prof' ><br></div>
        <div class='input' id='razaosocial'>Razão Social: <input type='text' class='valores' name='razaosocial'><br></div>
        <div class='input' id='areaatuacao'>Área de Atuação: <input type='text' class='valores' name='areaatuacao'><br></div>
        <div class='input' id='obseti'>Observações para etiqueta:<input type='text' class='valores' name='obseti' ><br></div>
        <div class='input' id='nomeres'></div><br>
        <div class='input' id='telres'></div><br>
        <div class='input' id='endcom'>Endereço Completo(em caso de ser diferente do pessoal):<input type='text' class='valores' name='endcom' ><br></div>
        <div class='input' id='dep'>Departamento:<select name="dep">
            <option value="ti">TI</option>
            <option value="financ">Financeiro</option>
        </select><br></div>
        <div class='input' id='setor'>Setor:<select name="setor">
            <option value="atendimento">Atendimento</option>
            <option value="triagem">Triagem</option>
        </select><br></div>
        <div class='input' id='func'>Função:<select name="func">
            <option value="masc">Caixa</option>
            <option value="fem">Atendente</option>
        </select><br></div>
        <div class='input' id='ctps'>CTPS:<input type='text' class='valores' name='ctps' ><br></div>
        <div class='input' id='serie'>Série:<input type='text' class='valores' name='serie' ><br></div>
        <div class='input' id='pis'>PIS:<input type='text' class='valores' name='pis' ><br></div>
        <div class='input' id='salario'>Salário:<input type='text' class='valores' name='salario' ><br></div>
        <div class='input' id='conjugue'>Cônjugue<input type='text' class='valores' name='conjugue'><br></div>
        <div class='input' id='pai'>Pai<input type='text' class='valores' name='pai'><br></div>
        <div class='input' id='mae'>Mãe<input type='text' class='valores' name='mae'></div>
        <div class='input' id='dataadm'> Data de Admissão:<input type='text' class='valores' name='dataadm' ><br></div>
        <div class='input' id='datadem'>Data de Demissão:<input type='text' class='valores' name='datadem' ><br></div>
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
        <div class='input' id='contatorep'>Telefone de Contato: <input type='text' class='valores' name='contatorep'><br></div>
        <div class='input' id='obs'>Observações<textarea name='obs' ></textarea></div>
        <input type='button' value='Cadastrar Pessoa' onclick='cadastrarPessoa()'><br>
</head>
<body>
    
</body>
<script>
    reset();
    function reset(){
        document.getElementById('tipo_pessoa').value = '';
        $('.input').css('display', 'none');
    }
    function subTipo(){
        $('.input').css('display', 'none');
        if(document.getElementById('tipo_pessoa').value == 'fis'){
            document.getElementById('subtipo').innerHTML = "Paciente <input type='checkbox' value='Paciente' id='Paciente' onclick='esconder()'> Fornecedor <input type='checkbox' value='Fornecedor' id='Fornecedor' onclick='esconder()'> Funcionário <input type='checkbox' value='Funcionario' id='Funcionario' onclick='esconder()'>";
        }else if(document.getElementById('tipo_pessoa').value == 'jur'){
            document.getElementById('subtipo').innerHTML = "Fornecedor <input type='checkbox' value='Fornecedor' id='Fornecedor' onclick='esconder()'> Cliente <input type='checkbox' value='Cliente' id='Cliente' onclick='esconder()'>";
        }else{
            document.getElementById('subtipo').innerHTML="";
        }
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
        console.log(valor);
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

    function esconder() {
        if(document.getElementById('tipo_pessoa').value=='fis'){
            if(document.getElementById('Paciente').checked==true || document.getElementById('Funcionario').checked==true || document.getElementById('Fornecedor').checked==true){
                
                document.getElementById('cpf').style.display = 'block';
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

                if(document.getElementById('Paciente').checked==true){
                    document.getElementById('nome').style.display = 'block';
                    document.getElementById('estadocivil').style.display = 'block';
                    document.getElementById('sexo').style.display = 'block';
                    document.getElementById('datanasc').style.display = 'block';
                    document.getElementById('prof').style.display = 'block';
                    document.getElementById('obseti').style.display = 'block';
                    document.getElementById('situpac').style.display = 'block';
                    document.getElementById('obj').style.display = 'block';
                    document.getElementById('nomeres').style.display = 'block';
                    document.getElementById('telres').style.display = 'block';
                    document.getElementById('nomeres').innerHTML = "Nome da mãe ou responsável:<input type='text' class='valores' name='nomeres' id='nomeres'>";
                    document.getElementById('telres').innerHTML = "Telefone da mãe ou responsável:<input type='text' class='valores' name='telres' id='telres'>";
                }
                if(document.getElementById('Paciente').checked==false){
                    document.getElementById('obseti').style.display = 'none';
                    document.getElementById('situpac').style.display = 'none';
                    document.getElementById('prof').style.display = 'none';
                    document.getElementById('obj').style.display = 'none';
                    document.getElementById('nomeres').style.display = 'none';
                    document.getElementById('telres').style.display = 'none';
                }

                if(document.getElementById('Funcionario').checked==true){
                    document.getElementById('nome').style.display = 'block';
                    document.getElementById('estadocivil').style.display = 'block';
                    document.getElementById('sexo').style.display = 'block';
                    document.getElementById('datanasc').style.display = 'block';
                    document.getElementById('func').style.display = 'block';
                    document.getElementById('dataadm').style.display = 'block';
                    document.getElementById('datadem').style.display = 'block';
                    document.getElementById('dep').style.display = 'block';
                    document.getElementById('setor').style.display = 'block';
                    document.getElementById('ctps').style.display = 'block';
                    document.getElementById('serie').style.display = 'block';
                    document.getElementById('pis').style.display = 'block';
                    document.getElementById('salario').style.display = 'block';
                    document.getElementById('conjugue').style.display = 'block';
                    document.getElementById('pai').style.display = 'block';
                    document.getElementById('mae').style.display = 'block';
                }
                if(document.getElementById('Funcionario').checked==false){
                    document.getElementById('dataadm').style.display = 'none';
                    document.getElementById('datadem').style.display = 'none';
                    document.getElementById('dep').style.display = 'none';
                    document.getElementById('setor').style.display = 'none';
                    document.getElementById('ctps').style.display = 'none';
                    document.getElementById('serie').style.display = 'none';
                    document.getElementById('pis').style.display = 'none';
                    document.getElementById('salario').style.display = 'none';
                    document.getElementById('conjugue').style.display = 'none';
                    document.getElementById('pai').style.display = 'none';
                    document.getElementById('mae').style.display = 'none';
                } 

            }
            if(document.getElementById('Fornecedor').checked==true){
                document.getElementById('nome').style.display = 'block';
                document.getElementById('razaosocial').style.display = 'block';
                document.getElementById('datanasc').style.display = 'block';
                document.getElementById('website').style.display = 'block';
                document.getElementById('areaatuacao').style.display = 'block';
            }
            if(document.getElementById('Fornecedor').checked==false){
                document.getElementById('nome').style.display = 'none';
                document.getElementById('razaosocial').style.display = 'none';
                document.getElementById('datanasc').style.display = 'none';
                document.getElementById('website').style.display = 'none';
                document.getElementById('areaatuacao').style.display = 'none';
            }
            if(document.getElementById('Paciente').checked==false && document.getElementById('Funcionario').checked==false && document.getElementById('Fornecedor').checked==false){
                $('.input').css('display', 'none');
            }
            
        }

        if(document.getElementById('tipo_pessoa').value=='jur'){
            if(document.getElementById('Fornecedor').checked==true || document.getElementById('Cliente').checked==true){
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
                

                if(document.getElementById('Fornecedor').checked==true){
                }
                if(document.getElementById('Fornecedor').checked==false){
                }

                if(document.getElementById('Cliente').checked==true){
                }
                if(document.getElementById('Cliente').checked==false){
                }
            }else{
                $('.input').css('display', 'none');
            }
            
        }
        
        
        
    }
    

    function cadastrarPessoa(){
        if(document.getElementById('tipo_pessoa').value == 'fis'){
            if(document.getElementById('Paciente').checked==true){
                $.ajax({
                type: "GET",
                url: "/cadastro/cadastropaciente",
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
                    console.log('Paciente cadastrado com sucesso');
                    }
                });
            }
            if(document.getElementById('Fornecedor').checked==true){
                $.ajax({
                type: "GET",
                url: "/cadastro/cadastrofornecedorfisico",
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
                    console.log('Fornecedor Físico cadastrado com sucesso!');
                    }
                });
            }
            if(document.getElementById('Funcionario').checked==true){
                $.ajax({
                type: "GET",
                url: "/cadastro/cadastrofuncionario",
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
                    uf:$("[name='uf']").val(),
                    pis:$("[name='pis']").val(),
                    salario:$("[name='salario']").val(),
                    conjugue:$("[name='conjugue']").val(),
                    nomepai:$("[name='pai']").val(),
                    nomemae:$("[name='mae']").val(),
                    dataadm:$("[name='dataadm']").val(),
                    datadem:$("[name='datadem']").val(),
                    obs:$("[name='obs']").val(),
                },
                dataType: "json",
                success: function(data) {
                    console.log('Funcionário cadastrado com sucesso!');
                    }
                });
            }
        }

        if(document.getElementById('tipo_pessoa').value == 'jur'){
            if(document.getElementById('Fornecedor').checked==true){
                $.ajax({
                type: "GET",
                url: "/cadastro/cadastrofornecedorjuridico",
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
                    razaosocial:$("[name='razaosocial']").val(),
                    areaatuacao:$("[name='areaatuacao']").val(),
                    nomerep:$("[name='nomerep']").val(),
                    emailrep:$("[name='emailrep']").val(),
                    contatorep:$("[name='contatorep']").val(),
                    obs:$("[name='obs']").val(),
                },
                dataType: "json",
                success: function(data) {
                    console.log('Fornecedor Jurídico cadastrado com sucesso!');
                    }
                });
            }

            if(document.getElementById('Cliente').checked==true){
                $.ajax({
                type: "GET",
                url: "/cadastro/cadastroclientejuridico",
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
                    razaosocial:$("[name='razaosocial']").val(),
                    areaatuacao:$("[name='areaatuacao']").val(),
                    nomerep:$("[name='nomerep']").val(),
                    emailrep:$("[name='emailrep']").val(),
                    contatorep:$("[name='contatorep']").val(),
                    obs:$("[name='obs']").val(),
                },
                dataType: "json",
                success: function(data) {
                    console.log('Cliente cadastrado com sucesso!');
                    }
                });
            }
        }
        
    }
</script>
</html>