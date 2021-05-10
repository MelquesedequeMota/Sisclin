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
Data: <input type='date' name='pesquisardataagenda' id='pesquisardataagenda'>
</body>
</html>
<script>
consespec();

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
        $.ajax({
                    type: "GET",
                    url: "/consultaespecmedico",
                    data: {espec: document.getElementById('pesquisarespecagenda').value},
                    dataType: "json",
                    success: function(data) {
                        console.log(data);
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
    
</script>