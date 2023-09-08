@extends('layouts.Menu')
@section('atalhoSuperior')@endsection
@section('menuLateral')@endsection

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Solicitação de Exames Laboratoriais</title>
    <link rel="stylesheet" href="{{asset('../css/cssgeral.css')}}">
    <link rel="stylesheet" href="{{asset('../css/documentos.css')}}">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

   <script src="{{asset('jquery.min.js')}}"></script>
   <script src="{{asset('jquery-ui-1.12.1/jquery-ui.js')}}"></script>
   <script src="{{asset('inputmask/dist/jquery.inputmask.min.js')}}"></script>
   <script src="{{asset('inputmask/dist/bindings/inputmask.binding.js')}}"></script>

   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

   <style>
        .inputdivision{
           width:88%;
        }

        .divcontainer{
            width:95%;
            max-width:660px;
        }

        .inputlg {
            width: 36rem;
        }

        @media(max-width:556px){
            .totalexames{
                display:flex;
                flex-direction:column;
            }
            
        }

        @media(max-width:350px){
            .inputlg {
                width: 29rem;
            }
            .inputdivision {
                width: 94%;
            }
        }

        @media print {
            .btn,.atalhos,.navAtalhos{
                display:none;
            }
        }
   </style>
</head>
<body>
@section('Conteudo')
    <div class='divcontainer paddingprincipal'>
        <div id='geraldiv' class='divtextos'>
            <div class="tituloprincipal">Solicitação Exame</div>
            <br><br>
            <div id='pacinfodiv' class='directioncolumn'>
                <div class='margem'>
                    Paciente<br>
                    <input type='text' name='nomepaciente' id='nomepaciente' class='inputlg'> 
                </div>
                <div class='margem'>
                    Sócio IRN: 
                    &nbsp;Sim &nbsp;
                    <input type='checkbox' name='sociopacientesim' id='sociopacientesim'> 
                    &nbsp;Não &nbsp;
                    <input type='checkbox' name='sociopacientenao' id='sociopacientenao'>
                </div>
                <div class='margem'>
                    Sexo: 
                    F &nbsp;<input type='checkbox' name='sexopacientef' id='sexopacientef'> 
                    &nbsp;
                    M &nbsp;<input type='checkbox' name='sexopacientem' id='sexopacientem'>
                </div>
                <div class='margem' style='display:flex;width:100%;justify-content:space-between'>
                    <div>
                        Data de Nascimento<br> 
                        <input type='text' class='inputdivision' name='datanascpaciente' id='datanascpaciente' data-inputmask="'mask': '99/99/9999'" placeholder="__/__/____">
                    </div>
                    &nbsp;&nbsp;
                    <div>
                        Telefone<br> 
                        <input type='text' class='inputdivision' name='telefonepaciente' id='telefonepaciente' onkeypress='tel()' placeholder="(__) ____-____">
                    </div>
                </div>

                <div class='margem' style='display:flex;width:100%;justify-content:space-between'>
                    <div class=''>
                        RG<br>
                        <input type='text'  class='inputdivision' name='rgpaciente' id='rgpaciente' data-inputmask="'mask': '9999999999-9'" placeholder="__________-_">
                    </div>

                    <div>
                        Data de Solicitação<br>
                        <input type='text' class='inputdivision' name='datasolicipaciente' id='datasolicipaciente' data-inputmask="'mask': '99/99/9999'" placeholder="__/__/____">
                    </div>
                </div>

                <div id='examesdiv' class='margem'></div>

                <div id='examesimprimirdiv' class='margem'></div>

                <div class='totalexames'>
                    <span class=''>Valor Total dos Exames: </span>
                    <input type='text' class='inputS' name='valortotalexame' id='valortotalexame'placeholder='0.00'>
                </div>
            </div>
        </div>
    </div>

    <br><br>
    <div id='botoes' style='text-align:center;'>
        <button type='submit' class='btn bg-primary' value='Imprimir' onclick='imprimir()'>
            <span class='fontebotao'>Imprimir</span>
        </button>
        &nbsp;&nbsp;
        <button type='submit' class='btn bg-success' value='Cadastrar' onclick='cadastrar()'>
            <span class='fontebotao'>Cadastrar</span>
        </button>
    </div>

</body>
</html>
<script>
    // check();
    conscateexame();

    var cateexamesid = [];
    var cateexamesnomes = [];
    var examesvalores = [];

    var contopt = 0;
    var optid = [];
    var socioescolha = '';
    var valortotal = 0;

    $('#telefonepaciente').inputmask('(99) 9999[9]-9999');

    function tel(){
        if(document.getElementById('telefonepaciente').value[5] != '9'){
            $('#telefonepaciente').inputmask('(99) 9999-9999');
        }else{
            $('#telefonepaciente').inputmask('(99) 9999[9]-9999');
        }
    }

    function escondediv(){
        document.getElementById('examesdiv').style.display = 'block';
        document.getElementById('examesimprimirdiv').style.display = 'none';
    }

    function check(){
        if(sessionStorage.getItem('pacatual') == null || sessionStorage.getItem('medid') == null){
            document.location.href='/home/medico';
        }
    }

    function conscateexame(){
        $.ajax({
            type: "GET",
            url: "/consulta/cateexame/dados",
            data: {},
            dataType: "json",
            success: function(data) {
                for(i=0; i<data.length; i++){
                    cateexamesid.push(data[i]['cate_id']);
                    cateexamesnomes.push(data[i]['cate_nome']);
                    document.getElementById('examesdiv').innerHTML +="<div id='"+data[i]['cate_nome']+"div' name='"+data[i]['cate_nome']+"div'><b>"+data[i]['cate_nome']+"</b></div>";
                }
                consexame();
            }
        });
    }

    function consexame(){
        $.ajax({
            type: "GET",
            url: "/consulta/exame/dados",
            data: {cateexamesid:cateexamesid},
            dataType: "json",
            success: function(data) {
                for(i=0; i<data['prod_id'].length; i++){
                    // console.log(cateexamesnomes, cateexamesid, cateexamesid.indexOf(parseInt(data['prod_cate'][i])));
                    examesvalores.push(data['prod_valor'][i]);
                    document.getElementById(cateexamesnomes[cateexamesid.indexOf(parseInt(data['prod_cate'][i]))] + 'div').innerHTML+="<br><input type='checkbox' id='checkbox"+contopt+"' name='checkbox"+contopt+"' value='"+data['prod_id'][i]+"' onclick='calcularvalor()'> "+data['prod_nome'][i];
                    contopt++;
                }
            }
        });
    }

    function calcularvalor(){
        valortotal = 0;
        for(var i = 0; i < contopt; i++){
            if(document.getElementById('checkbox' + i).checked == true){
                if(examesvalores[document.getElementById('checkbox' + i).id.substr('8')] == null){
                    valortotal += 0;
                }else{
                    valortotal += parseFloat(examesvalores[document.getElementById('checkbox' + i).id.substr('8')]);
                }
                
            }
        }
        document.getElementById('valortotalexame').value = valortotal.toLocaleString('pt-BR', {
                            minimumFractionDigits: 2,
                            style: 'currency',
                            currency: 'BRL'
                          });
    }

    function imprimir(){
        document.getElementById('examesdiv').style.display = 'none';
        document.getElementById('examesimprimirdiv').style.display = 'block';
        for(var i = 0; i <= contopt; i++){
            if($("[name='checkbox"+i+"']").prop('checked')){
                document.getElementById
            }else{

            }
        }
        window.print();
    }

    function cadastrar(){
        optid = [];
        for(var i = 0; i <= contopt; i++){
            if($("[name='checkbox"+i+"']").prop('checked')){
                optid.push(document.getElementById('checkbox'+i).value);
            }
        }

        if(document.getElementById('sociopacientesim').checked == true){
            socioescolha = 'Sim'
        }else{
            socioescolha = 'Não'
        }

        if(document.getElementById('sexopacientef').checked == true){
            sexoescolha = 'f';
        }else{
            sexoescolha = 'm';
        }

        $.ajax({
            type: "GET",
            url: "cadastrarsoliciexame",
            data: {idpessoa: sessionStorage.getItem('pacatual'), nome: document.getElementById('nomepaciente').value, idmedico: sessionStorage.getItem('medid'), opcoes: optid, socioirn: socioescolha, datanasc: document.getElementById('datanascpaciente').value, telefone:document.getElementById('telefonepaciente').value, rg:document.getElementById('rgpaciente').value, datasolici:document.getElementById('datasolicipaciente').value, valortotal: valortotal, sexo: sexoescolha},
            dataType: "json",
            success: function(data) {
                console.log('Solicitação de Exame Laboratorial Realizada com Sucesso!');
            }
        });

    }
</script>
@endsection