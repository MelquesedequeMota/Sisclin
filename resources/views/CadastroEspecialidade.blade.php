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

    <title>Cadastro Especialidade</title>
</head>

@section('Conteudo')
    <body>
        <div class="tituloprincipal">Cadastro Especialidade</div> 
        <br><br>

        <div class="container-fluid" style='margin-top:1rem;'>
            <div class="row gx-3 gy-3">
                <div class="col-sm-3 col-md-2 col-lg-2">
                    <div class="cor01">
                        <label for="exampleInputEmail1" class="form-label">Nome da Especialidade</label>
                        <input
                        type="text"
                        class="form-control"
                        aria-describedby="emailHelp"
                        name='nomeespec' 
                        id='nomeespec'/>
                    </div>
                </div>
                <div class="col-sm-3 col-md-3 col-lg-3">
                    <div class="cor01">
                        <label for="exampleInputEmail1" class="form-label">Descrição da Especialidade</label>
                        <input
                        type="text"
                        class="form-control"
                        aria-describedby="emailHelp"
                        name='descespec' 
                        id='descespec'/>
                    </div>
                </div>
                <div class="col-sm-3 col-md-3 col-lg-3">
                    <div class="cor01">
                        <label for="exampleInputEmail1" class="form-label">Letra da Ordem</label>
                        <input
                        type="text"
                        class="form-control"
                        aria-describedby="emailHelp"
                        name='letraordem' 
                        id='letraordem' onfocusout='checarletraordem()'/>
                    </div>
                </div>
                <div class="col-sm-4 col-md-3 col-lg-3">
                    <div class="cor01">
                        <button type="submit" class="btn btamarelo btcadastrarcon" value='Cadastrar' onclick='cadastrarespecialidade()'>
                            <span class="selectacoes">Cadastrar Especialidade</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Cadastro</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div id=''>Especialidade cadastrada com sucesso</div>
                    </div>
                    <div class="modal-footer">
                        <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Ok</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="falhaModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Erro</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div id=''>Nome da especialidade ou Letra da Ordem já existem!</div>
                    </div>
                    <div class="modal-footer">
                        <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
        
    </body>    
</html>

<script>
    var checkletraordem = 0;
    function checarletraordem(){
        $.ajax({
            type: "GET",
            url: "/consultaletraordem",
            data: {letraordem: document.getElementById('letraordem').value},
            dataType: "json",
            success: function(data) {
                if(data == 1){
                    checkletraordem = 1;
                }else{
                    checkletraordem = 0;
                    console.log('Letra já existe!');
                }
            }
        });
    }
    function cadastrarespecialidade(){
        if(checkletraordem == 1){
            $.ajax({
            type: "GET",
            url: "/cadastro/cadastroespecialidade",
            data: {
                nome:$("[name='nomeespec']").val(),
                desc: $("[name='descespec']").val(),
                letraordem: $("[name='letraordem']").val(),
            },
            dataType: "json",
            success: function(data) {
                $('#exampleModal1').modal('show');
                console.log('Consultório cadastrado com sucesso');
            }
            });
        }else{
            $('#falhaModal').modal('show');
        }
    }
</script>
@endsection 