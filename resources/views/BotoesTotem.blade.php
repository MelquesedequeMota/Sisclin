<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <script src="{{asset('jquery.min.js')}}"></script>
    <script src="{{asset('jquery-ui-1.12.1/jquery-ui.js')}}"></script>
    <script src="{{asset('inputmask/dist/jquery.inputmask.min.js')}}"></script>
    <script src="{{asset('inputmask/dist/bindings/inputmask.binding.js')}}"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <title>Botões Totem</title>
</head>
<body>
    <input type='button'name='normal' id='normal' value='Normal' onclick='novonormal()'> <input type='button' name='preferencial' id='preferencial' value='Preferencial' onclick='novopreferencial()'>
    
</body>
</html>
<script>
    function novonormal(){
        $.ajax({
                type:'GET',
                url:'totem/novonormal',
                data: {},
                dataType: "json",
                success: function(data){
                    console.log('Normal Gerado com Sucesso!');
                }

            });
    }

    function novopreferencial(){
        $.ajax({
                type:'GET',
                url:'totem/novopreferencial',
                data: {},
                dataType: "json",
                success: function(data){
                    console.log('Preferencial Gerado com Sucesso!');
                }

            });
    }
</script>
