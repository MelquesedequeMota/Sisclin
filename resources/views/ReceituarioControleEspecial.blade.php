@extends('layouts.Menu')
@section('atalhoSuperior')@endsection
@section('menuLateral')@endsection

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!-- Required meta tags -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- css da página  -->
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
    <title>Receituário Especial</title>

    <style>
        .divcontainer{
            width:100%;
            max-width:680px;
        }

        input,textarea{
            margin:1rem 0rem;
        }

        .form-control{
            border:1px solid black;
        }

        .divisaodiv{
            display:flex;
            flex-direction:row;
            width:100%;
            justify-content:space-between;
        }

        .divdata{
            width:40%;
        }

        @media(max-width:556px){
            .inputm{
                width:12rem;
            }

            .inputm2{
                width: 100%;
            }

            .tituloprincipal {
                font-size: 22px;
            }

            .paddingprincipal {
                padding: 0.5rem 0.5rem 2rem !important;
            }
        }

        @media(max-width:410px){

            .directioncolumn{
                flex-direction:column;
            }

            .divisaodiv{
                flex-direction:column;
            }

            input,
            .inputm,
            textarea,
            .divdata{
                width: 100%;
            }
        }

        @media(max-width:370px){
            .inputxxl {
                width: 32rem;
            }

             .tituloprincipal {
                font-size: 18px;
            }
        }

        @media print {
            .btn,.atalhos,.navAtalhos,.botoes{
                display:none;
            }

            .tituloprincipal{
                font-size:22px;
            }

            body{
                font-size:10px;
            }

            .paddingprincipal {
                padding: 0rem 0rem 0rem!important;
            }

            .categorias{
                font-size:12px;
            }

            input, textarea {
                margin: 0.5rem 0rem;
            }
        }
    </style>
</head>
<body>
@section('Conteudo')
    <div class='divcontainer paddingprincipal'>
        <div class='divtextos'>
            <div class="tituloprincipal">Receituário de Controle Especial</div> 
            <!-- <br><br> -->
            <div class='directioncolumn' style='margin-top:3rem'>
                <div class='categorias'>
                    <b>IDENTIFICAÇÃO DO EMITENTE</b>
                </div>
                <br>
                <div>
                    <span>Nome Completo</span><br>
                    <input type='text' name='nomeemitente' id='nomeemitente' class="inputxxl">
                </div>
                <div class='divisaodiv'>
                    <div>
                        CRM<br>
                        <input type='text' name='crmemitente' id='crmemitente' class="inputm">
                    </div>
                    <div>
                        UF<br>
                        <input type='text' name='ufemitente' id='ufemitente' class="inputm">
                    </div>
                    <div>
                        Nº<br>
                        <input type='text' name='numeroemitente' id='numeroemitente' class="inputm"> 
                    </div>
                </div>
                <div>
                    Paciente<br>
                    <input type='text' name='nomepaciente' id='nomepaciente' class="inputxxl">
                </div>
                <div>
                    Endereço<br>
                    <input type='text' name='enderecopaciente' id='enderecopaciente' class="inputxxl">
                </div>
                <div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Prescrição</label>
                        <textarea class="form-control" name='prescricao' id='prescricao' rows="2" style="height: 100px;font-size:15px"></textarea>
                    </div>
                </div>
                <div class='divisaodiv'>
                    <div class='divdata'>
                        Data<br>
                        <input type='text' class='inputm' name='data' id='data' data-inputmask="'mask': '99/99/9999'" placeholder="__/__/____">
                    </div>
                    <div>
                        Carimbo ou assinatura do médico<br>
                        <input type='text' class='inputm2'> 
                    </div>
                </div>

                <div>
                    <br>
                    <div class='categorias'>
                        <b>IDENTIFICAÇÃO DO COMPRADOR</b>
                    </div>
                    <br>
                    <div class='directioncolumn'>
                        <span>Nome</span>
                        <input type='text' name='nomecomprador' id='nomecomprador'>
                    </div>
                    <div class='divisaodiv'>
                        <div class='directioncolumn'>
                            <span>RG</span> 
                            <input type='text' name='rgcomprador' id='rgcomprador'>
                        </div>
                        <div class='directioncolumn'>
                            <span>Órgão Emissor </span>
                            <input type='text' name='orgaoemissorcomprador' id='orgaoemissorcomprador'>
                        </div>
                    </div>
                    <div class='directioncolumn'>
                        <span>Endereço </span>
                        <input type='text' name='enderecocomprador' id='enderecocomprador'>
                    </div>
                    <div class='directioncolumn'>
                        <span>Cidade</span>
                        <input type='text' name='cidadecomprador' id='cidadecomprador'>
                    </div>
                    <div class='divisaodiv'>
                        <div class='directioncolumn'>
                            <span>UF</span> 
                            <input type='text' name='ufcomprador' id='ufcomprador'>
                        </div>
                        <div class='directioncolumn'>
                            <span>Telefone</span> 
                            <input type='text' name='telefonecomprador' id='telefonecomprador' onkeypress='tel()' placeholder="(__) ____-____">
                        </div>
                    </div>
                </div>

                <div>
                    <br>
                    <div class='categorias'>
                        <b>IDENTIFICAÇÃO DO FORNECEDOR</b>
                    </div>
                    <br>
                    <div class=''>
                        <div class='directioncolumn'>
                            <span>Ass. do Farmacêutico</span> 
                            <input type='text'>
                        </div>
                        <div class='directioncolumn'>
                            <span>Data</span>
                            <input type='text' data-inputmask="'mask': '99/99/9999'" placeholder="__/__/____">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- <br><br> -->
        <div id='botoes' style='text-align:center;margin-top:5rem'>
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

<script>
    $('#telefonecomprador').inputmask('(99) 9999[9]-9999');

    function imprimir(){
        window.print();
    }

    function tel(){
        if(document.getElementById('telefonecomprador').value[5] != '9'){
            $('#telefonecomprador').inputmask('(99) 9999-9999');
        }else{
            $('#telefonecomprador').inputmask('(99) 9999[9]-9999');
        }
    }

    function cadastrar(){

        var data =  document.getElementById('data').value;

        $.ajax({
            type: "GET",
            url: "cadastrarreceitcontespec",
            data: {idpessoa: sessionStorage.getItem('pacatual'), idmedico: sessionStorage.getItem('medid'),nomeemitente: document.getElementById('nomeemitente').value,crmemitente: document.getElementById('crmemitente').value,ufemitente: document.getElementById('ufemitente').value,numeroemitente: document.getElementById('numeroemitente').value,nomepaciente: document.getElementById('nomepaciente').value,enderecopaciente: document.getElementById('enderecopaciente').value,prescricao: document.getElementById('prescricao').value,data: data,nomecomprador: document.getElementById('nomecomprador').value,rgcomprador: document.getElementById('rgcomprador').value,orgaoemissorcomprador: document.getElementById('orgaoemissorcomprador').value,enderecocomprador: document.getElementById('enderecocomprador').value,cidadecomprador: document.getElementById('cidadecomprador').value,ufcomprador: document.getElementById('ufcomprador').value,telefonecomprador: document.getElementById('telefonecomprador').value,},
            dataType: "json",
            success: function(data) {
                console.log('Receituário de Controle Especial Registrado com Sucesso!');
            }
        });

    }
</script>
</html>
@endsection