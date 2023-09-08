@extends('layouts.Menu')
@section('atalhoSuperior')@endsection
@section('menuLateral')@endsection

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Receita Médica</title>
    <link rel="stylesheet" href="{{asset('../css/cssgeral.css')}}">
    <link rel="stylesheet" href="{{asset('../css/documentos.css')}}">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

   <script src="{{asset('jquery.min.js')}}"></script>
   <script src="{{asset('jquery-ui-1.12.1/jquery-ui.js')}}"></script>
   <script src="{{asset('inputmask/dist/jquery.inputmask.min.js')}}"></script>
   <script src="{{asset('inputmask/dist/bindings/inputmask.binding.js')}}"></script>
   <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

   <style>
        .tituloprincipal {
            margin-top: 0;
        }

        .form-control{
            font-size:1.8rem;
        }

        @media print {
            .btn,.atalhos,.navAtalhos,.botoes{
                display:none;
            }
        }
   </style>
</head>
<body>
@section('Conteudo')
    <!-- <div class="tituloprincipal" style='text-align:center'>Receita Médica</div>
    <br> -->
    <div class="form-floating">
        <textarea class="form-control" placeholder="Receita Médica" name='receita' id='receita' style="height: 100%;border: 1px solid;"></textarea>
        <label for="floatingTextarea2">Receita Médica</label>
    </div>

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

// function check(){
//     if(sessionStorage.getItem('pacatual') == null || sessionStorage.getItem('medid') == null){
//         document.location.href='/home/medico';
//     }
// }

function imprimir(){
        window.print();
    }

    function cadastrar(){
        
        $.ajax({
            type: "GET",
            url: "cadastrarreceitamedica",
            data: {idpessoa: sessionStorage.getItem('pacatual'), idmedico: sessionStorage.getItem('medid'), texto: document.getElementById('receita').value},
            dataType: "json",
            success: function(data) {
                console.log('Receita Médica Registrada com Sucesso!');
            }
        });

    }

</script>
@endsection