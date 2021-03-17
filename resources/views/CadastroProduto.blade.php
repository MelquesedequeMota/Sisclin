<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produto</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <script src="{{asset('jquery.min.js')}}"></script>
    <script src="{{asset('inputmask/dist/jquery.inputmask.min.js')}}"></script>
    <script src="{{asset('inputmask/dist/bindings/inputmask.binding.js')}}"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>
    <div class='input' id='nome'>Nome do Produto: <input type='text' name='nome'id ='nomeinput'><br>
    <div class='input' id='desc'>Descrição do Produto: <textarea name='desc' id='descinput'></textarea><br>
    <div class='input' id='cate'>Categoria do Produto: <select name="cate" id='cateselect'>
        <option value=''>---</option>
    </select><button id='catenovobutton' onclick='novocate()'> Nova Categoria </button><br></div><div class='input' id='catenovo'></div>
    <div class='input' id='tipo'>Tipo de Produto: Item <input type='radio' value='Item' id='Item' name='tipo'> Serviço <input type='radio' value='Servico' id='Servico' name='tipo'><br>
    <div class='input' id='quant'>Quantidade Inicial: <input type='number' name='quant' id='quantinput'><br>
    <div class='input' id='estqmin'>Estoque Mínimo: <input type='number' name='estqmin' id='estqmininput' min='1'><br>
    <input type='button' name='cadastrarproduto' id='cadastrarproduto' onclick='cadastrarproduto()' value='Cadastrar Produto'>
</body>
</html>

<script>
conscate();

    function conscate(){
            $.ajax({
                    type: "GET",
                    url: "/consultacadastrocate",
                    data: {},
                    dataType: "json",
                    success: function(data) {
                        var select = document.getElementById('cateselect');
                        for(var i = 0; i<data['id'].length; i++){
                            var opt = document.createElement('option');
                            opt.appendChild(document.createTextNode(data['nome'][i]));
                            opt.value = data['id'][i];
                            select.appendChild(opt);
                        }
                    }
                });
        }

    function novocate(){
            document.getElementById('catenovo').innerHTML="Nova Categoria: <input type='text' id='catenovoinput' name='catenovoinput'> Descrição: <input type='text' id='catenovodescinput' name='catenovodescinput'><button onclick='cadastrocate()'>Cadastrar Categoria</button>";
            document.getElementById('catenovo').style.display='block';
    }

    function cadastrocate(){
        $.ajax({
                type: "GET",
                url: "/cadastro/cadastrocategoria",
                data: {
                    nome:$("[name='catenovoinput']").val(),
                    desc:$("[name='catenovodescinput']").val(),
                },
                dataType: "json",
                success: function(data) {
                    console.log('Categoria cadastrada com sucesso');
                    document.getElementById('catenovo').style.display='none'
                    conscate();
                    }
                });
    }

    function cadastrarproduto(){
    $.ajax({
        type: "GET",
        url: "/cadastro/cadastroproduto",
        data: {
            nome:$("[name='nome']").val(),
            desc:$("[name='desc']").val(),
            cate:$("[name='cate']").val(),
            tipo:$("input[name=tipo]:checked").val(),
            quant:$("[name='quant']").val(),
            estqmin:$("[name='estqmin']").val(),
        },
        dataType: "json",
        success: function(data) {
            console.log('Produto cadastrado com sucesso');
            }
        });
}
</script>