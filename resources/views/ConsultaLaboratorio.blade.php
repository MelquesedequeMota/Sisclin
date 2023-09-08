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

   <title>Pesquisa Consultório</title>

</head>

<body>
    @section('Conteudo')
    <div class="container-fluid" style='margin-top:0rem;'>
        <div class="tituloprincipal">Pesquisa Consultório</div>
    </div>

    <div class="container-fluid" style='margin-top:2rem;'>
        <div class="row gx-3 gy-3">
            <div class="col-sm-3 col-md-2 col-lg-2">
                <div class="cor01">
                    <label for="pesquisarpessoanome" class="form-label">N° do Consultório</label>
                    <input
                    type="text"
                    class='form-control'
                    aria-describedby="emailHelp"
                    name='pesquisarnumerolaboratorio' 
                    id='pesquisarnumerolaboratorio'/>
                </div>
            </div>
            <div class="col-sm-3 col-md-3 col-lg-3 divexternaespec">
                <div class="cor01">
                    <label for="pesquisarpessoanome" class="form-label">Nome do Consultório</label>
                    <div class="direction">
                        <div class='mb-2'>
                            <input
                            type="text"
                            class="form-control"
                            aria-describedby="emailHelp"
                            name='pesquisarnomelaboratorio' 
                            id='pesquisarnomelaboratorio'/>
                        </div>
                        <div class='btnovaespec'>
                            <button type="submit" class="btn btamarelo" value='Pesquisar' onclick='pesquisarlaboratorio()'>
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
                        <table id='pesquisarlaboratoriotable' class="table">
                            <thead class="table-active">
                                <tr>
                                    <td scope="col">Número</td>
                                    <td scope="col">Nome</td>
                                    <td scope="col">Ações</td>
                                </tr>
                            </thead>
                            <tbody id='laboratoriotablebody'>

                            </tbody>
                        </table>
                    </div> 
                </div>
            </div>
        </div>
    </div>
        

    <div class="container-fluid" style='margin-top:1rem;'>
        <div class='input tituloeditar' id="titulo" style='margin-bottom:1rem'>Editar Dados</div>
        <br>

        <div class="row gx-3 gy-3">
            <div class="col-sm-3 col-md-2 col-lg-2 input" id='numlab'>
                <div class="cor01">
                    <label for="exampleInputEmail1" class="form-label">N° do Consultório</label>
                    <input
                    type="text"
                    class="form-control"
                    aria-describedby="emailHelp"
                    name='numlab' 
                    id='numlabinput'/>
                </div>
            </div>
            <div class="col-sm-3 col-md-3 col-lg-3 input" id='nomelab'>
                <div class="cor01">
                    <label for="exampleInputEmail1" class="form-label">Nome do Consultório</label>
                    <input
                    type="text"
                    class="form-control"
                    aria-describedby="emailHelp"
                    name='nomelab' 
                    id='nomelabinput'/>
                </div>
            </div> 
            <div class="col-sm-6 col-md-5 col-lg-4 divexternaespec input" id='espec'>
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
                            <button type="button" class="btn btn-primary" id='especnovobutton' name='especnovobutton' data-bs-toggle="modal" data-bs-target="#exampleModal" onclick='novoespec()'>
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
            <div class="col-sm-4 col-md-3 col-lg-3 input" id='editarlab'>
                <div class="cor01">
                    <button type="submit" class="btn btamarelo btcadastrarcon" value='Editar Consultório' name='editarbutton' onclick='editarlaboratorio()'>
                        <span class="selectacoes">Salvar Alterações</span>
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
                    <h5 class="modal-title" id="exampleModalLabel">Edição</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id=''>Consultório editado com sucesso</div>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Ok</button>
                </div>
            </div>
        </div>
    </div>

</body>

<script>
    var dadoslinhas = [];
    reset();
    escondertabela();
    consespec();
    var idatual = '';
    var permissaoeditarexcluir = 0;

    if({{Auth::user()->user_tipo}} != 2){
        $.ajax({
        type: "GET",
        url: "/buscarpermissoes",
        data: {userid: {{Auth::user()->user_tipo}}},
        dataType: "json",
        success: function(data) {
          if(data.indexOf('3.2') != -1){
            permissaoeditarexcluir = 1;
          }
        }
      });
    }else{
      permissaoeditarexcluir = 1;
    }

    function escondertabela(){
        $('#tabela').css('display', 'none');
    }
    

    function reset(){
        $('.input').css('display', 'none');
    }

    function acoes(select){
        var id = select.id.split('selectlab');
        if(document.getElementById('selectlab'+id[1]).value == 'editar'){
            editar(id[1]);
        }
    }

    
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

    function apagartabela(){
        var tableHeaderRowCount = 1;
        var table = document.getElementById('pesquisarlaboratoriotable');
        var rowCount = table.rows.length;
        for (var i = tableHeaderRowCount; i < rowCount; i++) {
            table.deleteRow(tableHeaderRowCount);
        }
        reset();
    }

    function pesquisarlaboratorio(){
        apagartabela();
        $.ajax({
                type: "GET",
                url: "/consulta/laboratorio/dados",
                data: {numlab: document.getElementById('pesquisarnumerolaboratorio').value, nomelab: document.getElementById('pesquisarnomelaboratorio').value},
                dataType: "json",
                success: function(data) {
                    document.getElementById('tabela').style.display = 'block';
                    for(i=0; i<data.length; i++){
                        var tabela = document.getElementById('laboratoriotablebody');
                        var numeroLinhas = tabela.rows.length;
                        var linha = tabela.insertRow(numeroLinhas);
                        var celula1 = linha.insertCell(0);
                        var celula2 = linha.insertCell(1);   
                        var celula3 = linha.insertCell(2);
                        dadoslinhas.push(data[i]['lab_id']);
                        celula1.innerHTML=data[i]['lab_num'];
                        celula2.innerHTML=data[i]['lab_nome'];
                        if(permissaoeditarexcluir == 1){
                            celula3.innerHTML="<select id='selectlab"+i+"' name='selectlab"+i+"' class='form-select selectacoes' aria-label='Default select example' onchange='acoes(this)'><option value=''>Ações</option><option value='editar'>Editar</option><option value='excluir'>Excluir</option></select>";
                        }else{
                            celula3.innerHTML="<select id='selectlab"+i+"' name='selectlab"+i+"' class='form-select selectacoes' aria-label='Default select example' onchange='acoes(this)'><option value=''>Ações</option><option value='editar'>Editar</option></select>";
                        }
                    }
                }
            });
    }

    function editar(linha){
        $.ajax({
            type:'GET',
            url:'laboratorio/dadosedit',
            data: {lab_id: dadoslinhas[linha]},
            dataType: "json",
            success: function(data){
                esconder(data[0]);
            }
        });
    }
    function esconder(dados) {
        escondertabela();
        idatual=dados['lab_id'];
        document.getElementById('editarlab').style.display = 'block';
        document.getElementById('numlab').style.display = 'block';
        document.getElementById('nomelab').style.display = 'block';
        document.getElementById('titulo').style.display = 'block';
        document.getElementById('espec').style.display = 'block';

        document.querySelector("[name='numlab']").value = dados['lab_num'];
        document.querySelector("[name='nomelab']").value = dados['lab_nome'];
        document.querySelector("[name='espec']").value = dados['lab_espec'];

        if(permissaoeditarexcluir == 1){
            $('[name="editarlab"]').prop( "disabled", false );
            $('[name="numlab"]').prop( "disabled", false );
            $('[name="nomelab"]').prop( "disabled", false );
            $('[name="titulo"]').prop( "disabled", false );
            $('[name="espec"]').prop( "disabled", false );
            $('[name="especnovobutton"]').prop( "disabled", false );
            $('[name="editarbutton"]').prop( "disabled", false );
        }else{
            $('[name="editarlab"]').prop( "disabled", true );
            $('[name="numlab"]').prop( "disabled", true );
            $('[name="nomelab"]').prop( "disabled", true );
            $('[name="titulo"]').prop( "disabled", true );
            $('[name="espec"]').prop( "disabled", true );
            $('[name="especnovobutton"]').prop( "disabled", true );
            $('[name="editarbutton"]').prop( "disabled", true );
        }
    }

    function editarlaboratorio(){
        $.ajax({
            type: "GET",
            url: "/editar/editarlaboratorio",
            data: {
                id: idatual,
                numlab:$("[name='numlab']").val(),
                nomelab: $("[name='nomelab']").val(),
                espec: $("[name='espec']").val(),
            },
            dataType: "json",
            success: function(data) {
                $('#exampleModal1').modal('show');
                console.log('Consultório editado com sucesso');
            }
            });
    }
</script>
@endsection
</html>