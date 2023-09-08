@if (Auth::check())
    @if (Auth::user()->user_tipo == 3)
    <script>
        window.location.href = window.location.href + 'home/medico';
    </script>
    @else
    <script>
        window.location.href = window.location.href + 'home/colaborador';
    </script>
    @endif
@endif
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- css da página  -->
    <link rel="stylesheet" href="{{asset('../css/cssgeral.css')}}">
    <link rel="stylesheet" href="{{asset('../css/consultas.css')}}">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="{{asset('jquery.min.js')}}"></script>
    <script src="{{asset('shortcut.js')}}"></script>
    <script src="{{asset('jquery-ui-1.12.1/jquery-ui.js')}}"></script>
    <script src="{{asset('inputmask/dist/jquery.inputmask.min.js')}}"></script>
    <script src="{{asset('inputmask/dist/bindings/inputmask.binding.js')}}"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</head>

<style>
    .arte{
        width:60%;
        min-height:45vh;
        background-color: lavender;
    }

    .imgmedico{
        width:135%;
        height:100%;
    }

    .responsiv{
        display: flex;
        flex-direction:row;
    }

    @media (max-width: 1200px){
        .responsiv{
            flex-direction:column;
        }

        .arte{
            width:100%;
        }
        .imgmedico{
            width:100%;
        }
    }
</style>
<body>
    <div class='responsiv externadivisaoresp'>
        <div class='arte'>
            <img src="imagens/wlogin-resize.png" alt="" class='imgmedico'>
        </div>

        <div  class='divisaoresp' style='padding:0.5rem;'>
            <div class="centralizary">
                <div class='imglogologin'>
                    <br><br><br><br><br><br><br><br><br><br><br>
                </div>
                
                <div class="callout callout-danger mx-auto" id="alertaerro" style="display: none">
                    <div style="display: flex;flex-direction:row; justify-content:space-between">
                        <h5 style="color:red">Erro</h5>
                        <img src="imagens/fechar.svg" alt="" onclick='fechar()' style='margin-top:-1rem;cursor: pointer;'>
                    </div>
                    <div id='erro'></div>
                </div>

                <div class='mx-auto divcampos'>
                    <div class="form-floating mb-3" >
                        <input type="text" class="form-control" id="floatingInput" name='user_name' placeholder="Usuário" style='border: 2px solid #787885;'>
                        <label for="floatingInput">Usuário</label>
                    </div>

                    <div class="form-floating">
                        <input type="password" class="form-control" id="floatingPassword" name='user_senha' placeholder="Senha" style='border: 2px solid #787885;'>
                        <label for="floatingPassword">Senha</label>

                        <div class="submit-line">
                            <button class="submit-lente" type="submit">
                                <img src="imagens/olhofechado3.svg" onclick='mostrar()' id='imgolho'> 
                            </button>               
                        </div>       
                    </div>
                    <br>
                    <div class="form-group">
                        <button style="cursor:pointer; height:3rem!important;background-color: #003C77;margin-bottom:0.4rem;" type="button" class="btn btn-primary btn-lg w-100" onclick='logar()'>Entrar</button>
                    </div>

                    <div data-bs-toggle="modal" data-bs-target="#exampleModal" style="float: right;margin-bottom:1.5rem;cursor:pointer">
                        Esqueceu a senha?
                    </div>
                    
                </div>
            </div>
        </div>
        
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Recuperação de senha</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Esqueceu a senha? Não se preocupe, basta solicitar para alguém<br>com acesso ao sistema consultar seu nome e escrever uma nova senha, em seguida é só clicar no botão de editar e pronto, nova senha gerada!
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Ok</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
    
</body>
</html>

<script>
    sessionStorage.clear();
    function logar(){
        $.ajax({
        type: "GET",
        url: "/logar",
        data: {user_name: $("[name='user_name']").val(), user_senha: $("[name='user_senha']").val()},
        dataType: "json",
        success: function(data) {
            if(data == 1){
                // window.location.href = window.location.href.substring(0, window.location.href.length - 5) + 'loginpass';
                window.location.href = window.location.href + 'loginpass';
            }else{
                $('#alertaerro').css('display', 'block');
                document.getElementById('erro').innerHTML='Usuário ou Senha Incorreto(s)!';
            }
        }
    });
    }

    function mostrar(){
        var senha = document.getElementById('floatingPassword');
        var imagemolho = document.getElementById('imgolho');
        
        if (senha.type === 'password') {
            senha.type = 'text';  
            imagemolho.src = 'imagens/olhoaberto.svg';
        } else {
            senha.type = 'password';
            imagemolho.src = 'imagens/olhofechado3.svg';
        }
    } 

    function fechar(){
        $('#alertaerro').css('display', 'none');
    }

    shortcut.add("Enter", function() {
        
        if(document.getElementById('floatingInput').value != '' && document.getElementById('floatingPassword').value != '' ){
            logar();
        }
    });

</script>