@extends('layouts.Menu')
@section('atalhoSuperior')@endsection
@section('menuLateral')@endsection

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro Exame Laboratorial</title>

    <!-- css da página -->
    <link rel="stylesheet" href="{{asset('../css/consultas.css')}}">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="{{asset('jquery.min.js')}}"></script>
    <script src="{{asset('jquery-ui-1.12.1/jquery-ui.js')}}"></script>
    <script src="{{asset('inputmask/dist/jquery.inputmask.min.js')}}"></script>
    <script src="{{asset('inputmask/dist/bindings/inputmask.binding.js')}}"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
</head>

<body>
    @section('Conteudo')
    Nome do Exame: <input type="text" name='novoexametext' id='novoexametext'>
    <select class="form-select selectcategoria" name="categoria" id='cateselect'>
        <option value=''>---</option>
    </select>
    Valor do Exame: <input type="text" name='novoexamevalor' id='novoexamevalor' value='0.00'>
    <button type="button" class="btn btn-primary" id='catenovobutton' data-bs-toggle="modal"
        data-bs-target="#exampleModal" onclick='novocate()'>
        Nova Categoria
    </button>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cadastrar Nova Categoria</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class='input' id='catenovo'></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal"
                        onclick='cadastrocate()'>Cadastrar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
    <input type="button" name='novoexamebutton' id='novoexamebutton' value='Cadastrar' onclick='novoexame()'>
</body>

</html>

<script>
    conscate();

    function novocate() {
        document.getElementById('catenovo').innerHTML =
            "<span class='nomesinputs'>Nova Categoria</span><br><input type='text' class='inputstexttelas inputtextmedio' id='catenovoinput' name='catenovoinput'><br><br><span class='nomesinputs'>";
        document.getElementById('catenovo').style.display = 'block';
    }

    function conscate() {
        var select = document.getElementById("cateselect");
        var length = select.options.length;
        for (i = length - 1; i >= 0; i--) {
            select.options[i] = null;
        }

        $.ajax({
            type: "GET",
            url: "/consultacadastrocateexame",
            data: {},
            dataType: "json",
            success: function (data) {
                var select = document.getElementById('cateselect');
                for (var i = 0; i < data['id'].length; i++) {
                    var opt = document.createElement('option');
                    opt.appendChild(document.createTextNode(data['nome'][i]));
                    opt.value = data['id'][i];
                    select.appendChild(opt);
                }
            }
        });
    }

    function cadastrocate() {
        $.ajax({
            type: "GET",
            url: "/cadastro/cadastrocategoriaexame",
            data: {
                nome: $("[name='catenovoinput']").val(),
            },
            dataType: "json",
            success: function (data) {
                console.log('Categoria Cadastrada com Sucesso');
                document.getElementById('catenovo').style.display = 'none'
                conscate();
            }
        });
    }

    function novoexame() {
        $.ajax({
            type: "GET",
            url: "/cadastro/cadastroexame",
            data: {
                exame: document.getElementById('novoexametext').value,
                categoria: $("[name='categoria']").val(),
                valor: document.getElementById('novoexamevalor').value
            },
            dataType: "json",
            success: function (data) {
                console.log('Exame Cadastrado com Sucesso!');
            }
        });
    }

</script>
@endsection
