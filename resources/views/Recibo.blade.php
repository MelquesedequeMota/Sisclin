<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('../css/estilo.css')}}">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="{{asset('jquery.min.js')}}"></script>
    <script src="{{asset('jquery-ui-1.12.1/jquery-ui.js')}}"></script>
    <script src="{{asset('inputmask/dist/jquery.inputmask.min.js')}}"></script>
    <script src="{{asset('inputmask/dist/bindings/inputmask.binding.js')}}"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <title>Recibo</title>
    <style>
        .fontdosistema{
            font-size: 19px;
        }
    </style>
</head>
<body style='padding:2.5rem 4rem'>
<div align='center'><img src="/imagens/logoirn2.svg" alt="Logo" style='' class='imglogo'><br><br>RECIBO</div>
<span class='fontdosistema'>Venda: {{$compra_id}}<br></span>
<span class='fontdosistema'>Recebemos de {{$pessoa}} a quantia de {{$compra_valor_total}} referente aos serviços discriminados abaixo:</span>
<br><br>
<div id='tabela' class="table-responsive-sm" style='width: 100%;'>
    <table id='' class="table">
        <thead class="table-active">
        <tr>
            <td scope="col">Nº</td>
            <td scope="col">SERVICO</td>
            <td scope="col">QTD</td>
            <td scope="col">VALOR</td>
        </tr>
        </thead>
        <tbody id='recibotable'>
            @for ($i = 0; $i < count($lista[0]); $i++)
            <tr>
                <td>{{$lista[0][$i]}}</td>
                <td>{{$lista[1][$i]}}</td>
                <td>{{$lista[2][$i]}}</td>
                <td>{{doubleval($lista[3][$i])}}</td>
            </tr>
            @endfor
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3"><b>Total</b></td>
                <td><b>{{$compra_valor_total}}</b></td>
            </tr>
        </tfoot>
    </table>
</div>
<br>
<div class='fontdosistema'>
    <div>Observações:</div>
    <div>- Não é válido como documento fiscal</div>
    <div>- Atendente: {{Auth::user()->name}}</div>
    <div id='dataobs'>- </div>
</div>
    
</body>
</html>
<script>
    data();
    valortotal();

    function data(){
        meses = ['Janeiro', 'Fevereiro', 'Março', 'Abril' , 'Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'];
        document.getElementById('dataobs').innerHTML += {{$compra_data_dia}} + ' de ' + meses[{{$compra_data_mes}}] + ' de ' + {{$compra_data_ano}};
    }
    function valortotal(){
        
    }
</script>