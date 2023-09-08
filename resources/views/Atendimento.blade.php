<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Atendimento</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <script src="{{asset('jquery.min.js')}}"></script>
    <script src="{{asset('jquery-ui-1.12.1/jquery-ui.js')}}"></script>
    <script src="{{asset('inputmask/dist/jquery.inputmask.min.js')}}"></script>
    <script src="{{asset('inputmask/dist/bindings/inputmask.binding.js')}}"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>
    <input type='text' name='msg' id='msg'><input type='button' value='Chamar' onclick='realizaratendimento()'>
</body>
</html>
<script>
    function realizaratendimento(){
        $.ajax({
            type: "GET",
            url: "/cadastro/cadastroatendimento",
            data: {
                mensagem: document.getElementById('msg').value,
            },
            dataType: "json",
            success: function(data) {
                    if(data == 1){
                        console.log('Mensagem enviada com sucesso!');
                    }
                }
            });
        
    }

</script>