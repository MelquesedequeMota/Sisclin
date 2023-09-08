@extends('layouts.Menu')
@section('atalhoSuperior')@endsection
@section('menuLateral')@endsection

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Solicitação de Ultrassonografia</title>
    
     <!-- css da página -->
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
        .divcontainer{
            max-width: 700px;
        }

        @media(max-width:380px){
            .inputxxl{
                width: 33rem;
            }

            .tituloprincipal{
                font-size:22px;
            }  
        }

        @media print {
            .btn,.atalhos,.navAtalhos.menuLateral,.navMenu{
                display:none;
            }
        }
    </style>
</head>
<body>
@section('Conteudo')
    <div class='divcontainer paddingprincipal'>
         <div class='divtextos'>
            <div class="tituloprincipal">Solicitação de Ultrassom</div>
            <br><br>
            <div class='directioncolumn'>
                <div class='directioncolumn'>
                    <span>Paciente</span>
                    <input type='text' class='inputxxl' name='nomepaciente' id='nomepaciente'>
                </div>
                <br>
                <div id='listaexamesultrassom'></div>
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
    consulta();

    var contopt = 0;
    var optid = [];

    function check(){
        if(sessionStorage.getItem('pacatual') == null || sessionStorage.getItem('medid') == null){
            document.location.href='/home/medico';
        }
    }

    function consulta(){
        $.ajax({
            type: "GET",
            url: "/consulta/ultrassom/dados",
            data: {},
            dataType: "json",
            success: function(data) {
                for(i=0; i<data.length; i++){
                    document.getElementById('listaexamesultrassom').innerHTML+="<input type='checkbox' id='checkbox"+contopt+"' name='checkbox"+contopt+"' value='"+data[i]['prod_id']+"'> "+data[i]['prod_nome']+" <br>";
                    contopt++;
                }
            }
        });
    }

    function imprimir(){
        window.print();
    }

    function cadastrar(){
        optid = [];
        for(var i = 0; i <= contopt; i++){
            if($("[name='checkbox"+i+"']").prop('checked')){
                optid.push(document.getElementById('checkbox'+i).value);
            }
        }

        $.ajax({
            type: "GET",
            url: "cadastrarsoliciult",
            data: {idpessoa: sessionStorage.getItem('pacatual'), nome: document.getElementById('nomepaciente').value, idmedico: sessionStorage.getItem('medid'), opcoes: optid},
            dataType: "json",
            success: function(data) {
                console.log('Solicitação de Ultrassom Realizada com Sucesso!');
            }
        });

    }
</script>
@endsection