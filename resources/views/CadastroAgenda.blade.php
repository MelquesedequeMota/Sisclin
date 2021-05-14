<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <script src="{{asset('jquery.min.js')}}"></script>
    <script src="{{asset('jquery-ui-1.12.1/jquery-ui.js')}}"></script>
    <script src="{{asset('inputmask/dist/jquery.inputmask.min.js')}}"></script>
    <script src="{{asset('inputmask/dist/bindings/inputmask.binding.js')}}"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>
Especialidade:<select name="pesquisarespecagenda" id='pesquisarespecagenda' onchange='filtmedico()'>
        <option value=''>Selecione a especialidade</option>
        </select> 
Médico:<select name="pesquisarmedicoagenda" id='pesquisarmedicoagenda'>
        <option value=''>Selecione o médico</option>
        </select> 
Data: <input type='date' name='pesquisardataagenda' id='pesquisardataagenda' onchange='pesquisarhorarios()'>

<div id='horarios'>
    
</div>
</body>
</html>
<script>
    consespec();
    var horariosatuais = [];

    function pesquisarnome(input){
        var nome = $('#'+input.id).val();
        var nomes = [];
        if(nome.length >= 2){
            $.ajax({
                type:'GET',
                url:'../consulta/agenda/nomecontrato',
                data: {nomepessoa:nome},
                dataType: "json",
                success: function(data){
                    for(i=0; i<data.length; i++){
                        nomes.push(data[i][0] + " - " +  data[i][1]);
                    }
                    nomes = nomes.filter((este, i) => nomes.indexOf(este) === i);
                    $("#"+input.id).autocomplete({
                        source: nomes,
                        });
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
                        var select = document.getElementById('pesquisarespecagenda');
                        for(var i = 0; i<data['id'].length; i++){
                            var opt = document.createElement('option');
                            opt.appendChild(document.createTextNode(data['nome'][i]));
                            opt.value = data['id'][i];
                            select.appendChild(opt);
                        }
                    }
                });
        }
    function filtmedico(){
        var i, L = document.getElementById('pesquisarmedicoagenda').options.length - 1;
            for(i = L; i >= 0; i--) {
                document.getElementById('pesquisarmedicoagenda').remove(i);
            }
        $.ajax({
                    type: "GET",
                    url: "/consultaespecmedico",
                    data: {espec: document.getElementById('pesquisarespecagenda').value},
                    dataType: "json",
                    success: function(data) {
                        var select = document.getElementById('pesquisarmedicoagenda');
                        for(var i = 0; i<data['id'].length; i++){
                            var opt = document.createElement('option');
                            opt.appendChild(document.createTextNode(data['nome'][i]));
                            opt.value = data['id'][i];
                            select.appendChild(opt);
                        }
                    }
                });
        }
    function pesquisarhorarios(){
        $.ajax({
                    type: "GET",
                    url: "/consultaagendamedico",
                    data: {medico: document.getElementById('pesquisarmedicoagenda').value, dia: document.getElementById('pesquisardataagenda').value},
                    dataType: "json",
                    success: function(data) {
                        horariosatuais = data[2];
                        document.getElementById('horarios').innerHTML = '';
                        if(data == 2){
                            document.getElementById('horarios').innerHTML = 'Médico não disponível nesse dia';
                        }else{
                            for(var counthorarios = 0; counthorarios < data[2].length; counthorarios++){
                                document.getElementById('horarios').innerHTML += "<div id='"+data[2][counthorarios]+"'> <input type='button' value='"+data[2][counthorarios]+"' disabled><input type='text' name='pessoa"+counthorarios+"' id='pessoa"+counthorarios+"' placeholder='Selecione o Paciente' onkeypress='pesquisarnome(this)' onfocusout='salvaragenda(this)'><select name='servicoselect"+counthorarios+"' id='servicoselect"+counthorarios+"' onchange='salvaragenda(this)'><option value=''>Selecione o Serviço</option></select><select name='statusselect"+counthorarios+"' id='statusselect"+counthorarios+"' onchange='salvaragenda(this)'><option value='Livre'>Livre</option><option value='Ocupado'>Ocupado</option></select></div>";
                                var select = document.getElementById('servicoselect'+counthorarios);
                                for(var i = 0; i<data[1]['id'].length; i++){
                                    var opt = document.createElement('option');
                                    opt.appendChild(document.createTextNode(data[1]['nome'][i]));
                                    opt.value = data[1]['id'][i];
                                    select.appendChild(opt);
                                }
                            }
                            preencherhoras(data[0], document.getElementById('pesquisardataagenda').value);
                        }
                    }
                });
        }

        function preencherhoras(medico, data){
        $.ajax({
                    type: "GET",
                    url: "/consultaagendahorario",
                    data: {med_id: medico, data: data},
                    dataType: "json",
                    success: function(data) {
                        for(var i = 0; i<data.length; i++){
                            var index = horariosatuais.indexOf(data[i][3]);
                            document.getElementById('pessoa'+index).value = data[i][0];
                            document.getElementById('servicoselect'+index).value = data[i][1];
                            document.getElementById('statusselect'+index).value = data[i][2];
                        }
                    }
                });
    }

    function salvaragenda(input){
        if(input.id.substr(0,6) == 'pessoa'){
            var idinputatual = input.id.split('pessoa');
        }else if(input.id.substr(0,6) == 'servic'){
            var idinputatual = input.id.split('servicoselect');
        }else{
            var idinputatual = input.id.split('statusselect');
        }
        if(document.getElementById('pessoa'+idinputatual[1]).value != '' && document.getElementById('servicoselect'+idinputatual[1]).value != 0){
            var dados = [document.getElementById('pessoa'+idinputatual[1]).value, document.getElementById('servicoselect'+idinputatual[1]).value, document.getElementById('statusselect'+idinputatual[1]).value ,horariosatuais[idinputatual[1]], document.getElementById('pesquisardataagenda').value, document.getElementById('pesquisarmedicoagenda').value];
            $.ajax({
                    type: "GET",
                    url: "cadastroagendamedico",
                    data: {dados: dados},
                    dataType: "json",
                    success: function(data) {
                        if(data == 1){
                            console.log('Agenda Atualualizada com Sucesso!');
                        }
                    }
                });
        }
    }
</script>