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

    <!-- css da página -->
    <link rel="stylesheet" href="{{asset('../css/estilo.css')}}">

    <!-- Bootstrap CSS --> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="{{asset('jquery.min.js')}}"></script>
    <script src="{{asset('jquery-ui-1.12.1/jquery-ui.js')}}"></script>
    <script src="{{asset('inputmask/dist/jquery.inputmask.min.js')}}"></script>
    <script src="{{asset('inputmask/dist/bindings/inputmask.binding.js')}}"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    <title>Cadastro Consultório</title>
</head>

@section('Conteudo')
    <body>
        <div class="tituloprincipal">Cadastro Consultório</div> 
        <br><br>

        <div class="container-fluid" style='margin-top:1rem;'>
            <div class="row gx-3 gy-3">
                <div class="col-sm-3 col-md-3 col-lg-3">
                    <div class="cor01">
                        <label for="exampleInputEmail1" class="form-label">Nome do Consultório</label>
                        <input
                        type="text"
                        class="form-control"
                        aria-describedby="emailHelp"
                        name='nomelab' 
                        id='nomelab'/>
                    </div>
                </div>
                <div class="col-sm-3 col-md-2 col-lg-2">
                    <div class="cor01">
                        <label for="exampleInputEmail1" class="form-label">N° do Consultório</label>
                        <input
                        type="text"
                        class="form-control"
                        aria-describedby="emailHelp"
                        name='numlab' 
                        id='numlab'/>
                    </div>
                </div>
                <div class="col-sm-6 col-md-5 col-lg-4 divexternaespec">
                    <div class='cor02'>
                        <label for="exampleInputEmail1" class="form-label"
                        >Especialidade</label
                        >
                        <div class='direction'>
                            <div class='mb-2'>
                                <select class="form-select" name="espec" id='especselect' onchange='filtservi()'>
                                    <option value=''>---</option>
                                </select>
                            </div>
                            <div class='btnovaespec'>
                                <button type="button" class="btn btn-primary" id='especnovobutton' data-bs-toggle="modal" data-bs-target="#exampleModal" onclick='novoespec()'>
                                    Nova especialidade
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Cadastrar Nova Especialidade</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class='input' id='especnovo'></div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal"onclick='cadastroespec()'>Cadastrar</button>
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>      
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-3 col-lg-3">
                    <div class="cor01">
                        <button type="submit" class="btn btamarelo btcadastrarcon" value='Cadastrar' onclick='cadastrarlaboratorio()'>
                            <span class="selectacoes">Cadastrar Consultório</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    

        <!-- Modal -->
        <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Cadastro</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div id=''>Consultório cadastrado com sucesso</div>
                    </div>
                    <div class="modal-footer">
                        <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Ok</button>
                    </div>
                </div>
            </div>
        </div>
        
    </body>    
</html>

<script>
    $('.input').css('display', 'block');
    consespec();
    function consespec(){
        var select = document.getElementById("especselect");
            var length = select.options.length;
            for (i = length-1; i >= 0; i--) {
                select.options[i] = null;
        }

        $.ajax({
                type: "GET",
                url: "/consultacadastroespec",
                data: {},
                dataType: "json",
                success: function(data) {
                    var select = document.getElementById('especselect');
                    for(var i = 0; i<data['id'].length; i++){
                        var opt = document.createElement('option');
                        opt.appendChild(document.createTextNode(data['nome'][i]));
                        opt.value = data['nome'][i];
                        select.appendChild(opt);
                    }
                }
            });
    }

    function novoespec(){
            document.getElementById('especnovo').innerHTML="<span class='nomesinputs'>Nova Especialidade</span><br><input type='text' class='inputstexttelas inputtextmedio' id='especnovoinput' name='especnovoinput'><br><br><span class='nomesinputs'>Descrição</span><br><input type='text' class='inputstexttelas inputtextmedio' id='especnovodescinput' name='especnovodescinput'>";
            document.getElementById('especnovo').style.display='block';
            $('#exampleModal').modal('show');
        }

    function cancelarespec(){
        document.getElementById('especnovo').style.display='none'
    }

    function cadastroespec(){
        $.ajax({
                type: "GET",
                url: "/cadastro/cadastroespecialidade",
                data: {
                    nome:$("[name='especnovoinput']").val(),
                    desc:$("[name='especnovodescinput']").val(),
                },
                dataType: "json",
                success: function(data) {
                    console.log('Especialidade cadastrado com sucesso');
                    document.getElementById('especnovo').style.display='none'
                    consespec();
                    $('#exampleModal').modal('hide');
                    }
                });
    }

    function cadastrarlaboratorio(){
        $.ajax({
            type: "GET",
            url: "/cadastro/cadastrolaboratorio",
            data: {
                numlab:$("[name='numlab']").val(),
                nomelab: $("[name='nomelab']").val(),
                espec: $("[name='espec']").val(),
            },
            dataType: "json",
            success: function(data) {
                $('#exampleModal1').modal('show');
                console.log('Consultório cadastrado com sucesso');
            }
            });
    }
</script>
@endsection 