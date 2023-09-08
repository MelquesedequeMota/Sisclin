@extends('layouts.Menu')
@section('atalhoSuperior')@endsection
@section('menuLateral')@endsection

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Atestado Médico</title>
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
        .divtextos{
            margin-top:2rem;
        }
        @media print {
            .btn,.atalhos,.navAtalhos,.botoes{
                display:none;
            }

            .tituloprincipal{
                font-size:17px;
            }

            .divcontainer {
                max-width: 100%!important;
            }

            .divtextos{
                margin-top:0rem;
            }

            .impressaodist{
                margin-bottom:2rem;
            }

            @media (max-width: 556px){

                .paddingprincipal {
                    padding: 0rem!important;
                }

            }
                
        }
    </style>
</head>

<body>
@section('Conteudo')
    <div class='divcontainer paddingprincipal'>

        <div class="tituloprincipal">Atestado Médico</div>
        

        <div id='atestadomedico' class='divtextos'>
            <div class='directioncolumn'>
                <div class='directionrowexterno'>
                    <div class='direction impressao'>
                        <span>Dr(a).</span>
                        <input type='text' class='inputlg' name='nomedr' id='nomedr'>
                    </div>
                    <div class='direction impressao'>
                        <span>atesto que</span>
                        <input type='text' class='inputlg' name='nomepessoa' id='nomepessoa'>
                    </div>
                </div>

                <div class='directionrowexterno directionExternoBloco2'>
                    <div class='bloco2 direction bloco2_div1'>
                        <span>deverá se ausentar de suas respectivas atividades por </span>
                        <input type='text' class='inputS' name='diasnum' id='diasnum'>
                    </div>
                    
                    <div class='bloco2 bloco2_input2'>
                        ,(<input type='text' class='inputm2' name='diasext' id='diasext'>) dias.
                    </div>
                </div>

                <div class='directionrowexterno'>
                    <span>por motivo de </span>
                    <div class='display:flex'>
                       <input type='text' class='inputxxl2' name='motivo' id='motivo'>
                       <span>.</span> 
                    </div>
                    
                </div>
            </div>

            <br>

            <div class='directionrowexterno impressaodist'>
                <div class='direction'>
                    <span>Código da Doença:</span>
                    <input type='text' class='inputm' name='coddoenca' id='coddoenca'>
                </div>
                
                <div class='direction'>
                    <span>Fortaleza, </span>
                    <input type='text' class='inputm' name='data' id='data' data-inputmask="'mask': '99/99/9999'" placeholder="__/__/____">
                </div>
            </div>
        
        </div>

        
        <div id='botoes' class='botoes' style='text-align:center;margin-top:5rem'>
            <button type='submit' class='btn bg-primary' value='Imprimir' onclick='imprimir()'>
                <span class='fontebotao'>Imprimir</span>
            </button>
            &nbsp;&nbsp;
            <button type='submit' class='btn bg-success' value='Cadastrar' onclick='cadastrar()'>
                <span class='fontebotao'>Cadastrar</span>
            </button>
        </div>
    </div>
    
    <br><br>
    <div class='divcontainer paddingprincipal'>

        <div class="tituloprincipal">Atestado Médico</div>
        

        <div id='atestadomedico' class='divtextos'>
            <div class='directioncolumn'>
                <div class='directionrowexterno'>
                    <div class='direction impressao'>
                        <span>Dr(a).</span>
                        <input type='text' class='inputlg' name='nomedr' id='nomedr'>
                    </div>
                    <div class='direction impressao'>
                        <span>atesto que</span>
                        <input type='text' class='inputlg' name='nomepessoa' id='nomepessoa'>
                    </div>
                </div>

                <div class='directionrowexterno directionExternoBloco2'>
                    <div class='bloco2 direction bloco2_div1'>
                        <span>deverá se ausentar de suas respectivas atividades por </span>
                        <input type='text' class='inputS' name='diasnum' id='diasnum'>
                    </div>
                    
                    <div class='bloco2 bloco2_input2'>
                        ,(<input type='text' class='inputm2' name='diasext' id='diasext'>) dias.
                    </div>
                </div>

                <div class='directionrowexterno'>
                    <span>por motivo de </span>
                    <div class='display:flex'>
                       <input type='text' class='inputxxl2' name='motivo' id='motivo'>
                       <span>.</span> 
                    </div>
                    
                </div>
            </div>

            <br>

            <div class='directionrowexterno impressaodist'>
                <div class='direction'>
                    <span>Código da Doença:</span>
                    <input type='text' class='inputm' name='coddoenca' id='coddoenca'>
                </div>
                
                <div class='direction'>
                    <span>Fortaleza, </span>
                    <input type='text' class='inputm' name='data' id='data' data-inputmask="'mask': '99/99/9999'" placeholder="__/__/____">
                </div>
            </div>
        
        </div>

        
        <div id='botoes' class='botoes' style='text-align:center;margin-top:5rem'>
            <button type='submit' class='btn bg-primary' value='Imprimir' onclick='imprimir()'>
                <span class='fontebotao'>Imprimir</span>
            </button>
            &nbsp;&nbsp;
            <button type='submit' class='btn bg-success' value='Cadastrar' onclick='cadastrar()'>
                <span class='fontebotao'>Cadastrar</span>
            </button>
        </div>
    </div>
    <br><br>
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

        $.ajax({
            type: "GET",
            url: "cadastraratestadomedico",
            data: {
                idpessoa: sessionStorage.getItem('pacatual'),
                idmedico: sessionStorage.getItem('medid'),
                nomedr: document.getElementById('nomedr').value,
                nomepessoa: document.getElementById('nomepessoa').value,
                diasnum: document.getElementById('diasnum').value,
                diasext: document.getElementById('diasext').value,
                motivo: document.getElementById('motivo').value,
                coddoenca: document.getElementById('coddoenca').value,
                data: data,
            },
            dataType: "json",
            success: function(data) {
                console.log('Atestado Médico Registrado com Sucesso!');
            }
        });

    }
</script>
@endsection