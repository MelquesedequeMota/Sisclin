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

  <!-- css da página  -->
  <link rel="stylesheet" href="{{asset('../css/estilo.css')}}">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <script src="{{asset('jquery.min.js')}}"></script>
  <script src="{{asset('jquery-ui-1.12.1/jquery-ui.js')}}"></script>
  <script src="{{asset('inputmask/dist/jquery.inputmask.min.js')}}"></script>
  <script src="{{asset('inputmask/dist/bindings/inputmask.binding.js')}}"></script>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

  <title>Cadastro Prontuário</title>

  <style>
    /* input[type='file'] {
        display:none;
    }
    .labeluploadft {
        padding: 20px 10px;
        width: 200px;
        background:pink;
        color: #FFF;
        text-transform: uppercase;
        text-align: center;
        display: block;
        margin-top: 10px;
        cursor: pointer;
    } */

    .arquivo {
    display: none;
    }
    .file {
    line-height: 30px;
    height: 30px;
    border: 1px solid #A7A7A7;
    padding: 5px;
    box-sizing: border-box;
    font-size: 15px;
    vertical-align: middle;
    width: 300px;
    }
    .btnY {
    border: none;
    box-sizing: border-box;
    padding: 2px 10px;
    background-color: #4493c7;
    color: #FFF;
    height: 32px;
    font-size: 15px;
    vertical-align: middle;
    }
  </style>
</head>
<body>
    @section('Conteudo')
    <div class="container-fluid tituloprincipal" style='margin-top:0rem;'>
        Cadastro Prontuário
    </div>
    <br>
    <div class="container-fluid" style=''>
        <div class="row gx-3 gy-3">
            <div class="col-sm-5 col-md-5 col-lg-4" style='position: relative!important;'>
                <div class="cor01">
                    <form id='formteste' enctype="multipart/form-data" method='post'>
                    {{ csrf_field() }}
                    <label for="pesquisarpessoanome" class="form-label">Nome</label>
                    <input type="text" class="form-control" aria-describedby="emailHelp" name='pesquisarpessoanome' id='pesquisarpessoanome' style='width:100%;'/>
                </div>
            </div>
            <div class="col-sm-5 col-md-3 col-lg-4 divexternaespec">
                <div class="cor01">
                    <label for="pesquisarpessoacpfcnpj" class="form-label">CPF ou CNPJ</label>
                    <div class="direction">
                        <div class='mb-2'>
                        <input type="text" class="form-control" aria-describedby="emailHelp" name='pesquisarpessoacpfcnpj' id='pesquisarpessoacpfcnpj' />
                        </div>
                        <div class='btnovaespec'>
                        <button type="submit" class="btn btamarelo" value='Pesquisar' onclick='pesquisarpessoa()'>
                            <span class="selectacoes" style='font-size:17px'>Pesquisar</span>
                        </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <div class="container-fluid" style='margin-top:3.2rem;'>
            <div class="row gx-3 gy-3">
            <div class="" id=''>
                <div class="">
                    <div id='tabela' class="table-responsive-sm">
                        <table id='pessoapronturiotable' class="table">
                            <thead class="table-active">
                                <tr>
                                <td scope="col">Nome</td>
                                <td scope="col">CPF/CNPJ</td>
                                <td scope="col">Contato</td>
                                <td scope="col">Tipo de Pessoa</td>
                                <td scope="col">Ação</td>
                                </tr>
                            </thead>
                            <tbody id='pessoaprontuariotablebody'>

                            </tbody>
                        </table>
                    </div> 
                </div>
            </div>
            </div>
        </div>

        <div class="container-fluid" style=''>
            <div class="row gx-3 gy-3">
                <div class="col-sm-5 col-md-5 col-lg-4" style='position: relative!important;'>
                    <div class="cor01">
                        <!-- <span class="">Enviar a Foto</span><br><br> -->
                        <!-- <button type="submit" class="btn" value='INSERIR FOTO' onclick='' style='background:#164EA3'>
                            <span class="fontebotao" style='font-size:17px'>Inserir Foto</span>
                        </button> -->
                        
                            <div class='input' id='input'> 
                                <!-- <span>TESSTE</span>
                                <label for="ftprontuario" class='labeluploadft'>Enviar arquivo</label>
                                <input type='file' name='ftprontuario' id='ftprontuario'> -->
                                <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                                <input type="file" name="arquivo" id="arquivo" class="arquivo">
                                <input type="text" name="file" id="file" class="file" placeholder="Arquivo" readonly="readonly">
                                <input type="button" class="btnY" value="SELECIONAR">
                            </div>
                            <!-- <input type='button' id='retorno' value='Retorno' onclick='testarremessa()'> -->
                        
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid" style=''>
            <div class="row gx-3 gy-3">
                <div class="col-sm-5 col-md-3 col-lg-2" style='position: relative!important;'>
                    <div class="cor01">
                        <label for="dataprontuario" class="form-label">Data do Prontuário</label>
                        <input type="text" class="form-control" aria-describedby="Data do prontuário" name='dataprontuario' id='dataprontuario' style='width:100%;'/>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div style="margin-bottom: 1rem">
                <button type="submit" class="btn mb-5" value='Cadastrar Prontuário' id='cadastrarprontuariobutton' onclick='' style='background:#0E6969'>
                    <span class="fontebotao">Cadastrar Prontuário</span>
                </button>
            </form>
        </div>
    </div>
</body>
    <script>
        $('.btnY').on('click', function() {
            $('.arquivo').trigger('click');
        });

         $('.arquivo').on('change', function() {
            var fileName = $(this)[0].files[0].name;
            $('#file').val(fileName);
        });
    </script>
    @endsection
</html>