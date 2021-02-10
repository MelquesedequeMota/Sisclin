<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <title>Cadastro de Pessoa</title>
    <form method='get' action="{{route('cadastrofunc')}}">
        Tipo de Cadastro:<select name="tipo_cad" id='tipo_cad' onchange='esconder()'>
            <option value="pac">Paciente</option>
            <option value="func">Funcionário</option>
            <option value="forn">Fornecedores</option>
            <option value="conv">Convênio</option>
            <option value="patr">Patrimônio</option>
            <option value="lab">Laboratório</option>
            <option value="plan">Planos</option>

        </select><br>
        <div class='input' id='codigo'>Código: <input type='text' name='codigo'><br></div>
        <div class='input' id='setor'>Setor: <input type='text' name='setor'><br></div>
        <div class='input' id='desc'>Descrição: <input type='text' name='desc'><br></div>
        <div class='input' id='valor'>Valor: <input type='text' name='valor'><br></div>
        <div class='input' id='dataaqui'>Data de Aquisição: <input type='text' name='dataaqui'><br></div>
        <div class='input' id='tempogar'>Tempo de Garantia: <input type='text' name='tempogar'><br></div>
        <div class='input' id='cor'>Cor: <input type='text' name='cor'><br></div>
        <div class='input' id='quantidade'>Quantidade: <input type='text' name='quantidade'><br></div>
        <div class='input' id='fornecedor'>Fornecedor: <input type='text' name='fornecedor'><br></div>
        <div class='input' id='notafiscal'>Nota Fiscal: <input type='text' name='notafiscal'><br></div>
        <div class='input' id='dimensoes'>Dimensões: <input type='text' name='dimensoes'><br></div>
        <div class='input' id='empresa'>Empresa: <input type='text' name='empresa'><br></div>
        <div class='input' id='cpfcnpj'>CPF/CNPJ: <input type='text' name='cpfcnpj'><br></div>
        <div class='input' id='razaosocial'>Razão Social: <input type='text' name='razaosocial'><br></div>
        <div class='input' id='areaatuacao'>Área de Atuação: <input type='text' name='areaatuacao'><br></div>
        <div class='input' id='ficha'>Ficha Clínica: <input type='text' name='ficha'><br></div>
        <div class='input' id='nome'>Nome:<input type='text' name='nome'><br></div>
        <div class='input' id='cpf'>CPF:<input type='text' name='cpf'><br></div>
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
        <div class='input' id='prof'>Profissão:<input type='text' name='prof'><br></div>
        <div class='input' id='rg'>RG:<input type='text' name='rg'><br></div>
        <div class='input' id='cep'>CEP:<input type='text' name='cep'><br></div>
        <div class='input' id='endereco'>Endereço:<input type='text' name='endereco'><br></div>
        <div class='input' id='bairro'>Bairro:<input type='text' name='bairro' ><br></div>
        <div class='input' id='cidade'>Cidade:<input type='text' name='cidade' ><br></div>
        <div class='input' id='estado'>Estado:<input type='text' name='estado' ><br></div>
        <div class='input' id='datanasc'>Data de Nascimento:<input type='text' name='datanasc'><br></div>
        <div class='input' id='tel1'>Telefone 1:<input type='text' name='tel1' ><br></div>
        <div class='input' id='tel2'>Telefone 2:<input type='text' name='tel2' ><br></div>
        <div class='input' id='celular'>Celular:<input type='text' name='celular' ><br></div>
        <div class='input' id='inscest'>Inscrição Estadual: <input type='text' name='inscest'><br></div>
        <div class='input' id='website'>Web Site: <input type='text' name='website'><br></div>
        <div class='input' id='email'>E-mail:<input type='text' name='email' ><br></div>
        <div class='input' id='obseti'>Observações para etiqueta:<input type='text' name='obseti' ><br></div>
        <div class='input' id='nomemae'>Nome da Mãe:<input type='text' name='nomemae' ><br></div>
        <div class='input' id='datamae'>Data de Nascimento:<input type='text' name='datamae' ><br></div>
        <div class='input' id='profmae'>Profissão da Mãe:<input type='text' name='profmae' ><br></div>
        <div class='input' id='telmae'>Telefone:<input type='text' name='telmae' ><br></div>
        <div class='input' id='nomepai'>Nome do Pai:<input type='text' name='nomepai' ><br></div>
        <div class='input' id='datapai'>Data de Nascimento:<input type='text' name='datapai' ><br></div>
        <div class='input' id='profpai'>Profissão do Pai:<input type='text' name='profpai' ><br></div>
        <div class='input' id='telpai'>Telefone:<input type='text' name='telpai' ><br></div>
        <div class='input' id='endcom'>Endereço Completo(em caso de ser diferente do pessoal):<input type='text' name='endcom' ><br></div>
        <div class='input' id='espec'>Especialização:<select name="espec" >
            <option value="dent">Dentista</option>
            <option value="gine">Ginecologista</option>
            <option value="orto">Ortopedista</option>
        </select><br></div>
        <div class='input' id='dataadm'> Data de Admissão:<input type='text' name='dataadm' ><br></div>
        <div class='input' id='datadem'>Data de Demissão:<input type='text' name='datadem' ><br></div>
        <div class='input' id='datareg'>Data do Registro:<input type='text' name='datareg' ><br></div>
        <div class='input' id='ultatt'>Última Atualização:<input type='text' name='ultatt' ><br></div>
        <div class='input' id='situpac'>Situação do Paciente:<select name="situpac" >
            <option value="ava">Avaliação</option>
            <option value="trat">Em tratamento</option>
            <option value="rev">Em revisão</option>
            <option value="conc">Concluído</option>
        </select><br></div>
        <div class='input' id='obj'>Objetivo da Consulta:<textarea name='obj' ></textarea><br></div>
        <div class='input' id='nomerep'>Nome do Representante - Pessoa de Contato: <input type='text' name='nomerep'><br></div>
        <div class='input' id='aperep'>Apelido: <input type='text' name='aperep'><br></div>
        <div class='input' id='emailrep'>E-mail: <input type='text' name='emailrep'><br></div>
        <div class='input' id='celularrep'>Celular: <input type='text' name='celularrep'><br></div>
        <div class='input' id='tel1rep'>Telefone 1: <input type='text' name='tel1rep'><br></div>
        <div class='input' id='tel2rep'>Telefone 2: <input type='text' name='tel2rep'><br></div>
        <div class='input' id='banco1'>Banco: <input type='text' name='banco1'><br></div>
        <div class='input' id='agencia1'>Agencia: <input type='text' name='agencia1'><br></div>
        <div class='input' id='conta1'>Conta: <input type='text' name='conta1'><br></div>
        <div class='input' id='titular1'>Titular: <input type='text' name='titular1'><br></div>
        <div class='input' id='banco2'>Banco: <input type='text' name='banco2'><br></div>
        <div class='input' id='agencia2'>Agencia: <input type='text' name='agencia2'><br></div>
        <div class='input' id='conta2'>Conta: <input type='text' name='conta2'><br></div>
        <div class='input' id='titular2'>Titular: <input type='text' name='titular2'><br></div>
        <div class='input' id='obs'>Observações<textarea name='obs' ></textarea></div>
        <input type='button' onclick='sla()'>
        <input type='submit' name='cadastrar' value='Cadastrar Funcionário'><br>
    </form>
</head>
<body>
    
</body>
<script>
    esconder();
    function esconder() {
        $('.input').css('display', 'none');
        if(document.getElementById('tipo_cad').value=='pac'){
            document.getElementById('ficha').style.display = 'block';
            document.getElementById('nome').style.display = 'block';
            document.getElementById('cpf').style.display = 'block';
            document.getElementById('cep').style.display = 'block';
            document.getElementById('estadocivil').style.display = 'block';
            document.getElementById('sexo').style.display = 'block';
            document.getElementById('prof').style.display = 'block';
            document.getElementById('datanasc').style.display = 'block';
            document.getElementById('endereco').style.display = 'block';
            document.getElementById('bairro').style.display = 'block';
            document.getElementById('cidade').style.display = 'block';
            document.getElementById('estado').style.display = 'block';
            document.getElementById('celular').style.display = 'block';
            document.getElementById('tel1').style.display = 'block';
            document.getElementById('tel2').style.display = 'block';
            document.getElementById('email').style.display = 'block';
            document.getElementById('nomemae').style.display = 'block';
            document.getElementById('datamae').style.display = 'block';
            document.getElementById('profmae').style.display = 'block';
            document.getElementById('telmae').style.display = 'block';
            document.getElementById('nomepai').style.display = 'block';
            document.getElementById('datapai').style.display = 'block';
            document.getElementById('profpai').style.display = 'block';
            document.getElementById('telpai').style.display = 'block';
            document.getElementById('endcom').style.display = 'block';
            document.getElementById('datareg').style.display = 'block';
            document.getElementById('ultatt').style.display = 'block';
            document.getElementById('situpac').style.display = 'block';
            document.getElementById('obj').style.display = 'block';
            document.getElementById('obs').style.display = 'block';
        }
        else if(document.getElementById('tipo_cad').value=='func'){
            document.getElementById('nome').style.display = 'block';
            document.getElementById('cpf').style.display = 'block';
            document.getElementById('cep').style.display = 'block';
            document.getElementById('estadocivil').style.display = 'block';
            document.getElementById('sexo').style.display = 'block';
            document.getElementById('datanasc').style.display = 'block';
            document.getElementById('endereco').style.display = 'block';
            document.getElementById('bairro').style.display = 'block';
            document.getElementById('cidade').style.display = 'block';
            document.getElementById('estado').style.display = 'block';
            document.getElementById('celular').style.display = 'block';
            document.getElementById('tel1').style.display = 'block';
            document.getElementById('tel2').style.display = 'block';
            document.getElementById('email').style.display = 'block';
            document.getElementById('nomemae').style.display = 'block';
            document.getElementById('datamae').style.display = 'block';
            document.getElementById('nomepai').style.display = 'block';
            document.getElementById('datapai').style.display = 'block';
            document.getElementById('endcom').style.display = 'block';
            document.getElementById('espec').style.display = 'block';
            document.getElementById('dataadm').style.display = 'block';
            document.getElementById('datadem').style.display = 'block';
            document.getElementById('obs').style.display = 'block';
        }
        else if(document.getElementById('tipo_cad').value=='forn'|| document.getElementById('tipo_cad').value=='plan' || document.getElementById('tipo_cad').value=='conv' || document.getElementById('tipo_cad').value=='lab'){
            document.getElementById('empresa').style.display = 'block';
            document.getElementById('razaosocial').style.display = 'block';
            document.getElementById('areaatuacao').style.display = 'block';
            document.getElementById('cpfcnpj').style.display = 'block';
            document.getElementById('cep').style.display = 'block';
            document.getElementById('endereco').style.display = 'block';
            document.getElementById('bairro').style.display = 'block';
            document.getElementById('cidade').style.display = 'block';
            document.getElementById('estado').style.display = 'block';
            document.getElementById('celular').style.display = 'block';
            document.getElementById('tel1').style.display = 'block';
            document.getElementById('tel2').style.display = 'block';
            document.getElementById('obs').style.display = 'block';
            document.getElementById('email').style.display = 'block';
            document.getElementById('nomerep').style.display = 'block';
            document.getElementById('aperep').style.display = 'block';
            document.getElementById('emailrep').style.display = 'block';
            document.getElementById('celularrep').style.display = 'block';
            document.getElementById('tel1rep').style.display = 'block';
            document.getElementById('tel2rep').style.display = 'block';
            document.getElementById('banco1').style.display = 'block';
            document.getElementById('agencia1').style.display = 'block';
            document.getElementById('conta1').style.display = 'block';
            document.getElementById('titular1').style.display = 'block';
            document.getElementById('banco2').style.display = 'block';
            document.getElementById('agencia2').style.display = 'block';
            document.getElementById('conta2').style.display = 'block';
            document.getElementById('titular2').style.display = 'block';

        }else if(document.getElementById('tipo_cad').value=='patr'){
            document.getElementById('codigo').style.display ='block';
            document.getElementById('setor').style.display ='block';
            document.getElementById('desc').style.display ='block';
            document.getElementById('valor').style.display ='block';
            document.getElementById('dataaqui').style.display ='block';
            document.getElementById('tempogar').style.display ='block';
            document.getElementById('cor').style.display ='block';
            document.getElementById('quantidade').style.display ='block';
            document.getElementById('fornecedor').style.display ='block';
            document.getElementById('notafiscal').style.display ='block';
            document.getElementById('dimensoes').style.display ='block';
            document.getElementById('obs').style.display ='block';
        }
    }
</script>
</html>