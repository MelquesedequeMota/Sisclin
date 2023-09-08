@extends('layouts.Menu')
@section('atalhoSuperior')@endsection
@section('menuLateral')@endsection

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Atestado de Comparecimento</title>
   
    <link rel="stylesheet" href="{{asset('../css/documentos.css')}}">
    <link rel="stylesheet" href="{{asset('../css/cssgeral.css')}}">
    <link rel="stylesheet" href="{{asset('../css/atestadocomp.css')}}">
    <!-- <link rel="stylesheet" href="{{asset('../css/print.css')}}" media="print" /> -->

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

   <script src="{{asset('jquery.min.js')}}"></script>
   <script src="{{asset('jquery-ui-1.12.1/jquery-ui.js')}}"></script>
   <script src="{{asset('inputmask/dist/jquery.inputmask.min.js')}}"></script>
   <script src="{{asset('inputmask/dist/bindings/inputmask.binding.js')}}"></script>

   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    <style>
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
        <div class="tituloprincipal">Atestado de Comparecimento</div>
        <br><br>
        <!-- style='padding:0.5rem 5rem 4rem' -->
        <div class='divtextos'>
            <div class='directioncolumn'>
                <div class='directionrowexterno'>
                    <div class='direction'>
                        <span>Atestamos para fins</span>
                        <input type='text' class='inputt' name='fins' id='fins'>
                    </div>
                    <div class='direction'>
                        <span>que o(a) Sr.(a)</span>
                        <input type='text' class='inputlg2' name='nomepessoa' id='nomepessoa'>
                    </div>      
                </div>

                <div class='directionrowexterno'>
                    <div class='direction'>
                        <span>compareceu a esta clínica no dia</span> 
                        <input type='text' class='inputm3' name='data' id='data' data-inputmask="'mask': '99/99/9999'" placeholder="">
                    </div>
                    
                    <div class='direction'>
                        <span>às</span>
                        <input type='text' class='inputm3' name='horainicio' id='horainicio'data-inputmask="'mask': '99:99'" placeholder=""> 
                        <span>horas,&nbsp;para submeter-se a tratamento</span>
                    </div> 
                </div>

                <div class='directionrowexterno'>
                    <div class='direction'>
                        <!-- <span>tratamento</span>  -->
                        <input type='text' class='inputlg2' name='tratamento' id='tratamento'>
                    </div>
                    
                    <div class='direction'>
                        <span>, permanecento até as</span> 
                        <input type='text' class='inputSs' name='horafim' id='horafim' data-inputmask="'mask': '99:99'" placeholder="">
                        <span>horas.</span>  
                    </div>
                </div> 
            </div>     
            
            <br><br>

            <div class='directioncolumn'>
                <div class='direction mudar' style='margin: auto;'>
                    <div class='mudar2'>
                        <span>Fortaleza, </span>
                        <input type='text' class='inputxs' name='dia' id='dia'>  
                    </div>
                    <div class='mudar2'>
                       <span>de</span> 
                        <input type='text' name='mes' id='mes' class='inputSt'> 
                    </div>
                    <div class='mudar2'>
                        <span>de</span>
                        <input type='text' class='inputxs' name='ano' id='ano'>
                    </div>
                </div>
                <br>
                <div class='direction' style='text-align:center;display:flex;flex-direction:column'>
                    <input class='gigante' type='text'>
                    <span>Assinatura</span>
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
    </div>
    
</body>
</html>
<script>
    // check();

    function check(){
        if(sessionStorage.getItem('pacatual') == null || sessionStorage.getItem('medid') == null){
            document.location.href='homemedico';
        }
    }

    function imprimir(){
        window.print();
    }

    function cadastrar(){

        var data =  document.getElementById('data').value;
        var horainicio = document.getElementById('horainicio').value;
        var horafim = document.getElementById('horafim').value;

        $.ajax({
            type: "GET",
            url: "cadastraratestadocomparecimento",
            data: {
                idpessoa: sessionStorage.getItem('pacatual'),
                idmedico: sessionStorage.getItem('medid'),
                fins: document.getElementById('fins').value,
                nomepessoa: document.getElementById('nomepessoa').value,
                tratamento: document.getElementById('tratamento').value,
                horainicio: horainicio,
                horafim: horafim,
                data: data,
                dia: document.getElementById('dia').value,
                mes: document.getElementById('mes').value,
                ano: document.getElementById('ano').value,
            },
            dataType: "json",
            success: function(data) {
                console.log('Atestado de Comparecimento Registrado com Sucesso!');
            }
        });

    }
</script>
@endsection