<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <script src="{{asset('jquery.min.js')}}"></script>
    <script src="{{asset('inputmask/dist/jquery.inputmask.min.js')}}"></script>
    <script src="{{asset('inputmask/dist/bindings/inputmask.binding.js')}}"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <title>Consulta de Fornecedores</title>
</head>
<body>
    <div id='fornecedoresdiv'>
        <table border='1px' id='fornecedorestable'>
            <tr>
                <th>Nome</th>
                <th>CPF/CNPJ</th>
                <th>Estado Civil</th>
                <th>Sexo</th>
                <th>Data de Nascimento</th>
                <th>CEP</th>
                <th>Logradouro</th>
                <th>Número</th>
                <th>Complemento</th>
                <th>Bairro</th>
                <th>Cidade</th>
                <th>UF</th>
                <th>Telefone 1</th>
                <th>Telefone 2</th>
                <th>Celular</th>
                <th>RG</th>
                <th>E-mail</th>
                <th>Razão Social</th>
                <th>Web Site</th>
                <th>Área de Atuação</th>
                <th>Nome do Representante</th>
                <th>Email do Representante</th>
                <th>Contato do Representante</th>
                <th>Observações</th>
            </tr>
        </table>

    </div>
</body>
</html>

<script>
    consultafornecedoresfis();
    var filtro = '';
 function consultafornecedoresfis(){
    $.ajax({
                type: "GET",
                url: "/consulta/fornecedores/dados",
                data: {filtro:filtro},
                dataType: "json",
                success: function(data) {
                    console.log(data[5]);
                    
                    for(i=0; i<data.length; i++){
                        var tabela = document.getElementById('fornecedorestable');
                        var numeroLinhas = tabela.rows.length;
                        var linha = tabela.insertRow(numeroLinhas);
                        var celula1 = linha.insertCell(0);
                        var celula2 = linha.insertCell(1);   
                        var celula3 = linha.insertCell(2); 
                        var celula4 = linha.insertCell(3);
                        var celula5 = linha.insertCell(4);
                        var celula6 = linha.insertCell(5);
                        var celula7 = linha.insertCell(6); 
                        var celula8 = linha.insertCell(7);
                        var celula9 = linha.insertCell(8);
                        var celula10 = linha.insertCell(9);
                        var celula11 = linha.insertCell(10);
                        var celula12 = linha.insertCell(11);
                        var celula13 = linha.insertCell(12);
                        var celula14 = linha.insertCell(13);
                        var celula15 = linha.insertCell(14);
                        var celula16 = linha.insertCell(15);
                        var celula17 = linha.insertCell(16);
                        var celula18 = linha.insertCell(17);
                        var celula19 = linha.insertCell(18);
                        var celula20 = linha.insertCell(19);
                        var celula21 = linha.insertCell(20);
                        var celula22 = linha.insertCell(21);
                        var celula23 = linha.insertCell(22);
                        var celula24 = linha.insertCell(23);
                        if(data[i]['forfis_cpf'] != undefined){
                            celula1.innerHTML=data[i]['forfis_nome'];
                            celula2.innerHTML=data[i]['forfis_cpf'];
                            if(data[i]['forfis_estadocivil'] == 'solt'){
                                celula3.innerHTML='Solteiro'; 
                            }else if(data[i]['forfis_estadocivil'] == 'cas'){
                                celula3.innerHTML='Casado';
                            }else if(data[i]['forfis_estadocivil'] == 'outro'){
                                celula3.innerHTML='Outro';
                            }
                            if(data[i]['forfis_sexo'] == 'masc'){
                                celula4.innerHTML='Masculino'; 
                            }else if(data[i]['forfis_sexo'] == 'fem'){
                                celula4.innerHTML='Feminino';
                            }else if(data[i]['forfis_sexo'] == 'outro'){
                                celula4.innerHTML='Outro';
                            }
                            celula5.innerHTML=data[i]['forfis_datanasc'];
                            celula6.innerHTML=data[i]['forfis_cep'];
                            celula7.innerHTML=data[i]['forfis_logradouro']; 
                            celula8.innerHTML=data[i]['forfis_num'];
                            celula9.innerHTML=data[i]['forfis_complemento'];
                            celula10.innerHTML=data[i]['forfis_bairro'];
                            celula11.innerHTML=data[i]['forfis_cidade'];
                            celula12.innerHTML=data[i]['forfis_uf'];
                            celula13.innerHTML=data[i]['forfis_tel1'];
                            celula14.innerHTML=data[i]['forfis_tel2'];
                            celula15.innerHTML=data[i]['forfis_celular'];
                            celula16.innerHTML=data[i]['forfis_rg'];
                            celula17.innerHTML=data[i]['forfis_email'];
                            celula18.innerHTML=data[i]['forfis_razaosocial'];
                            celula19.innerHTML=data[i]['forfis_website'];
                            celula20.innerHTML=data[i]['forfis_areaatuacao'];
                            celula21.innerHTML='';
                            celula22.innerHTML='';
                            celula23.innerHTML='';
                            celula24.innerHTML=data[i]['forfis_obs'];;
                        }else{

                            celula1.innerHTML=data[i]['forjur_nome'];
                            celula2.innerHTML=data[i]['forjur_cnpj'];
                            celula3.innerHTML='';
                            celula4.innerHTML='';
                            celula5.innerHTML='';
                            celula6.innerHTML=data[i]['forjur_cep'];
                            celula7.innerHTML=data[i]['forjur_logradouro']; 
                            celula8.innerHTML=data[i]['forjur_num'];
                            celula9.innerHTML=data[i]['forjur_complemento'];
                            celula10.innerHTML=data[i]['forjur_bairro'];
                            celula11.innerHTML=data[i]['forjur_cidade'];
                            celula12.innerHTML=data[i]['forjur_uf'];
                            celula13.innerHTML=data[i]['forjur_tel1'];
                            celula14.innerHTML=data[i]['forjur_tel2'];
                            celula15.innerHTML=data[i]['forjur_celular'];
                            celula16.innerHTML='';
                            celula17.innerHTML=data[i]['forjur_email'];
                            celula18.innerHTML=data[i]['forjur_razaosocial'];
                            celula19.innerHTML=data[i]['forjur_website'];
                            celula20.innerHTML=data[i]['forjur_areaatuacao'];
                            celula21.innerHTML=data[i]['forjur_nomerep'];
                            celula22.innerHTML=data[i]['forjur_emailrep'];
                            celula23.innerHTML=data[i]['forjur_contatorep'];
                            celula24.innerHTML=data[i]['forjur_obs'];
                        }
                        
                    }
                }
            });
 }
</script>