@extends('layouts.Menu')
@section('atalhoSuperior')@endsection
@section('menuLateral')@endsection

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!-- Required meta tags -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
    <title>Cadastro Produto</title>

</head>
<body>
    @section('Conteudo')
    <div class="tituloprincipal">Cadastro Produto</div>
    <br><br>

    <div class="container-fluid" style='margin-top:1rem;'>
        <div class="row gx-3 gy-3">
            <div class="col-sm-7 col-md-5 col-lg-3 input" id='nome'>
                <div class="cor01">
                    <label for="exampleInputEmail1" class="form-label">Nome do Produto</label>
                    <input
                    type="text"
                    class="form-control"
                    aria-describedby="emailHelp"
                    name='nome'
                    id ='nomeinput'/>
                </div>
            </div>
        </div>
        <div class="row gx-3 gy-3">
            <div class="col-sm-7 col-md-5 col-lg-3 input" id='desc'>
                <div class="cor01">
                    <label for="descinput" class="form-label">Descrição do Produto</label>
                    <textarea class="form-control" rows="3" name='desc' id='descinput' style='height:8rem'></textarea>
                </div>
            </div>
        </div>
        
        <div class="row gx-3 gy-3">
            <div class="col-sm-7 col-md-5 col-lg-4 input" id='tipo'>
                <div class="cor01">
                    <label for="descinput" class="form-label">Tipo do Produto</label>
                    <div style='display:flex'>
                        <div style='display:flex;align-items:center;'>
                            <input type='radio' value='Item' id='Item' name='tipo' onclick='tabelaserviitens()'>&nbsp;
                            <span>Item</span>
                        </div>
                        <div style='display:flex;align-items:center;margin-left:1.5rem'>
                            <input type='radio' value='Servico' id='Servico' name='tipo' onclick='tabelaserviitens()'>&nbsp;
                            <span>Serviço</span>
                        </div>

                        <div style='display:flex;align-items:center;margin-left:1.5rem'>
                            <input type='radio' value='Exame' id='Exame' name='tipo' onclick='tabelaserviitens()'>&nbsp;
                            <span>Exame</span>
                        </div>
                        <div style='display:flex;align-items:center;margin-left:1.5rem'>
                            <input type='radio' value='Ultrassom' id='Ultrassom' name='tipo' onclick='tabelaserviitens()'>&nbsp;
                            <span>Ultrassom</span>
                        </div>
                        <div style='display:flex;align-items:center;margin-left:1.5rem'>
                            <input type='radio' value='Raiox' id='Raiox' name='tipo' onclick='tabelaserviitens()'>&nbsp;
                            <span>RaioX</span>
                        </div>
                    </div>     
                </div>
            </div>
        </div>

        <div class="row gx-3 gy-3">
            <div class="col-sm-9 col-md-6 col-lg-5 input" id='cate'>
                <div class="cor01">
                    <label for="cateselect" class="form-label">Categoria do Produto</label>
                    <div class='direction'>
                        <select class="form-select" aria-label="Default select example" name="cate" id='cateselect'>
                            <option value=''>Selecione a categoria</option>
                        </select>
                        <button type="submit" class="btn btcategoria btamarelo" value='Pesquisar' id='catenovobutton' onclick='novocate()' style='width: 48%;'>
                            <span class="selectacoes">Nova Categoria</span>
                        </button>
                    </div>
                    <div class='input responselect' id='catenovo'></div>
                </div>
            </div>
        </div>

        <div class="row gx-3 gy-3">
            <div class="col-sm-7 col-md-5 col-lg-3 input" id='quant'>
                <div class="cor01">
                    <label for="exampleInputEmail1" class="form-label">Quantidade Inicial</label>
                    <input
                    type="text"
                    class="form-control"
                    aria-describedby="emailHelp"
                    name='quant' 
                    id='quantinput'/>
                </div>
            </div>
        </div>
        <div class="row gx-3 gy-3">
            <div class="col-sm-7 col-md-5 col-lg-3 input" id='estqmin'>
                <div class="cor01">
                    <label for="exampleInputEmail1" class="form-label">Estoque Mínimo</label>
                    <input
                    type="number"
                    class="form-control"
                    aria-describedby="emailHelp"
                    name='estqmin' 
                    id='estqmininput' 
                    min='1'/>
                </div>
            </div>
        </div>
        <div class="row gx-3 gy-3">
            <div class="col-sm-7 col-md-5 col-lg-3 input" id='valor' style='margin-top:4rem'>
                <div class="cor01">
                    <label for="exampleInputEmail1" class="form-label">Valor do Produto</label>
                    <input
                    type="text"
                    class="form-control"
                    aria-describedby="emailHelp"
                    name='valor' 
                    id='valorinput' />
                </div>
            </div>
        </div>
        <div class="row gx-3 gy-3">
            <div class="col-sm-7 col-md-5 col-lg-3 input" id='valor' style='margin-top:4rem'>
                <div class="cor01">
                    <label for="exampleInputEmail1" class="form-label">Valor do Laboratório</label>
                    <input
                    type="text"
                    class="form-control"
                    aria-describedby="emailHelp"
                    name='valorlab' 
                    id='valorlabinput' />
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid" style='margin-top:2.5rem;margin-bottom:2rem;'>
        <div class="row gx-3 gy-3">
            <div class="">
                <div class="cor01">
                    <div id='tabelaitens' class="input table-responsive-sm">
                        <table id='serviitens' class="table">
                            <thead class="table-active">
                                <tr>
                                    <td scope="col">Selecionar Item</td>
                                    <td scope="col">Quantidade</td>
                                    <td scope="col">Remover Item</td>
                                </tr>
                            </thead>
                            <tbody id='produtotablebodycad'>
                    
                            </tbody>
                        </table>
                        <button type="submit" class="btn btadd btadicionar" value='Adicionar' onclick="adicionaLinha('produtotablebodycad')">
                            <span class="fontebotao">Adicionar</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid" style='margin-top:2rem;'>
        <div class="row gx-3 gy-3">
            <div class="">
                <div class="cor01">
                    <button type="submit" class="btn btamarelo" name='cadastrarproduto' value='Cadastrar Produto' id='cadastrarproduto' onclick='cadastrarproduto()' style="margin-bottom: 3.5rem">
                        <span class="selectacoes">Cadastrar Produto</span>
                    </button>
                </div>
            </div>
        </div> 
    </div>

    <!-- <form id='formteste' enctype="multipart/form-data" method='post'>
        {{ csrf_field() }}
        <div class='input' id='input'> Imagem do Item: <input type='file' name='imagemiteminput' id='imagemiteminput'></div>
    </form>  -->

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cadastro</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id=''>Produto cadastrado com sucesso</div>
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
    $('#valorinput').inputmask('decimal', {
        radixPoint: ".",
        groupSeparator: ".",
        autoGroup: true,
        digits: 2,
        digitsOptional: false,
        placeholder: '0',
        rightAlign: false,
        onBeforeMask: function(value, opts) {
        return value;
        }
    });

    $('#valorlabinput').inputmask('decimal', {
        radixPoint: ".",
        groupSeparator: ".",
        autoGroup: true,
        digits: 2,
        digitsOptional: false,
        placeholder: '0',
        rightAlign: false,
        onBeforeMask: function(value, opts) {
        return value;
        }
    });
    $('.input').css('display', 'block');
    // conscate();
    tabelaserviitens();
    pesquisarprodutos();
    var contlinhas = 0;
    var todosprodutos = [[],[],[]];
    var itens = [[],[]];
    var linhas = [];
    var serviitens = "";
    var serviitensval = [];
    var valor = 0;
    function adicionaLinha(idTabela) {
        contlinhas++;
        linhas.push(contlinhas);
        var tabela = document.getElementById(idTabela);
        var numeroLinhas = tabela.rows.length;
        var linha = tabela.insertRow(numeroLinhas);
        var celula1 = linha.insertCell(0);
        var celula2 = linha.insertCell(1);   
        var celula3 = linha.insertCell(2); 
        celula1.innerHTML = "<select name='produto"+contlinhas+"' id='select"+contlinhas+"' class='form-select selectcategoria' onchange='attprodid(this)'><option value=''>Selecione um Produto</option></select>"; 
        celula2.innerHTML =  "<input type='number' name='quantidade"+contlinhas+"' class='inputstexttelas02 inputtextcc' id='quantidade"+contlinhas+"' min = '1' value = '1' onchange='attprodquant(this)'>"; 
        celula3.innerHTML =  "<button type='submit' class='btn btdelete' value='Excluir' onclick='removeLinha(this)' id='"+contlinhas+"'><span class='fontebotao'>Excluir</span></button>";
        itens[0][contlinhas-1] = "";
        itens[1][contlinhas-1] = 1;
        pegarprodutos(contlinhas);
    }
    
    // funcao remove uma linha da tabela
    function removeLinha(linha) {
        var i=linha.parentNode.parentNode.rowIndex;
        document.getElementById('produtotablebodycad').deleteRow(i-1);
        linhas.splice(linha.id -1, 1);
        itens[0].splice(linha.id -1, 1);
        itens[1].splice(linha.id -1, 1);
        contlinhas--;
        refazertabela();
    }
    function refazertabela(){
        apagartabela();
        for(var i = 1; i<=contlinhas; i++){
            var tabela = document.getElementById('produtotablebodycad');
            var numeroLinhas = tabela.rows.length;
            var linha = tabela.insertRow(numeroLinhas);
            var celula1 = linha.insertCell(0);
            var celula2 = linha.insertCell(1);   
            var celula3 = linha.insertCell(2); 
            celula1.innerHTML = "<select name='produto"+i+"' id='select"+i+"' class='form-select selectcategoria' onchange='attprodid(this)'><option value=''>Selecione um Produto</option></select>"; 
            celula2.innerHTML =  "<input type='number' name='quantidade"+i+"' class='inputstexttelas02 inputtextcc' id='quantidade"+i+"' min = '1' value = '1' onchange='attprodquant(this)'>"; 
            celula3.innerHTML =  "<button type='submit' class='btn btdelete' value='Excluir' onclick='removeLinha(this)' id='"+i+"'><span class='fontebotao'>Excluir</span></button>";
            pegarprodutos(i);
            setTimeout(function(){ preenchervalores(); }, 700);
            
        }
    }

    function preenchervalores(){
        for(var i = 1; i<=contlinhas; i++){
            document.getElementById('select' + i).value = itens[0][i-1];
            document.getElementById('quantidade' + i).value = itens[1][i-1];
        }
    }

    function attprodid(celula){
        itens[0][celula.id.substr(6) - 1] = celula.value;
        calcularvalor();
    }

    function attprodquant(celula){
        itens[1][celula.id.substr(10) - 1] = celula.value;
        calcularvalor();
    }

    function apagartabela(){
        var tableHeaderRowCount = 1;
        var table = document.getElementById('serviitens');
        var rowCount = table.rows.length;
        for (var i = tableHeaderRowCount; i < rowCount; i++) {
            table.deleteRow(tableHeaderRowCount);
        }
    }

    function pegarprodutos(linha){
        serviitensval = [];
        var select = document.getElementById('select'+linha);
        for(var i = 0; i<todosprodutos[0].length; i++){
            var opt = document.createElement('option');
            opt.appendChild(document.createTextNode(todosprodutos[1][i]));
            opt.value = todosprodutos[0][i];
            select.appendChild(opt);
            serviitensval[todosprodutos[0][i]] = todosprodutos[2][i];
        }
    }

    function calcularvalor(){
        valor = 0;
        for(var i = 1; i<=contlinhas; i++){
            valor += serviitensval[$("[name='produto"+i+"']").val()] * $("[name='quantidade"+i+"']").val();
        }
        document.getElementById('valorinput').value = valor;
    }

    function tabelaserviitens(){
        if($("input[name=tipo]:checked").val() == 'Servico' || $("input[name=tipo]:checked").val() == 'Exame' || $("input[name=tipo]:checked").val() == 'Ultrassom' || $("input[name=tipo]:checked").val() == 'Raiox'){
            $('#tabelaitens').css('display', 'block');
            $('#quant').css('display', 'none');
            $('#estqmin').css('display', 'none');
            $('#cate').css('display', 'block');
            $('#valorlabinput').css('display', 'block');
            pesquisarprodutos();
            // setTimeout(function(){ adicionaLinha('produtotablebodycad'); }, 500);
            conscate($("input[name=tipo]:checked").val());
        }else if($("input[name=tipo]:checked").val() == 'Item'){
            $('#tabelaitens').css('display', 'none');
            $('#quant').css('display', 'block');
            $('#estqmin').css('display', 'block');
            $('#cate').css('display', 'block');
            $('#valorlabinput').css('display', 'none');
            conscate($("input[name=tipo]:checked").val());
        }else{
            $('#tabelaitens').css('display', 'none');
            $('#quant').css('display', 'none');
            $('#estqmin').css('display', 'none');
            $('#cate').css('display', 'none');
        }
        if($("input[name=tipo]:checked").val() == 'Item'){
            $('#imagemiteminput').css('display', 'block'); 
        }else{
            $('#imagemiteminput').css('display', 'none');
        }
    }

    function pesquisarprodutos(){
        todosprodutos = [[],[],[]];
        
        $.ajax({
            type: "GET",
            url: "/consultacadastroitem",
            data: {},
            dataType: "json",
            success: function(data) {
                for(var i = 0; i<data['id'].length; i++){
                    todosprodutos[0][i] = data['id'][i];
                    todosprodutos[1][i] = data['nome'][i];
                    todosprodutos[2][i] = data['valor'][i];
                }
            }
        });
    }

    function checar(){
        serviitens = "";
        for(var i = 1; i<=contlinhas; i++){
            serviitens += $("[name='produto"+i+"']").val() +"x" + $("[name='quantidade"+i+"']").val() + ",";
        }
        serviitens = serviitens.slice(0,serviitens.length-1);
    }

    function conscate(tipo){
            resetcate();
            $.ajax({
                    type: "GET",
                    url: "/consultacadastrocate",
                    data: {
                        tipo:tipo
                    },
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
            document.getElementById('catenovo').innerHTML="<div class='novacategoria'><div><span class='nomesinputs'>Nova Categoria</span><br><input type='text' id='catenovoinput' name='catenovoinput' class='inputstexttelas02'></div><br><div><span class='nomesinputs'>Descrição</span><br><input type='text' id='catenovodescinput' name='catenovodescinput' class='catendescinput inputstexttelas02'></div> <div style='margin-bottom:1rem'><button class='btn btamarelo' onclick='cadastrocate()'><span class='selectacoes'>Cadastrar Categoria</span></button></div></div><br>";
            document.getElementById('catenovo').style.display='block';
    }

    function resetcate(){
        var sel = document.getElementById('cateselect');
        for (i = sel.length - 1; i >= 0; i--) {
            sel.remove(i);
        }
        var opt = document.createElement('option');
        opt.appendChild(document.createTextNode('--'));
        opt.value = '';
        sel.appendChild(opt);
    }

    function cadastrocate(){
        $.ajax({
                type: "GET",
                url: "/cadastro/cadastrocategoria",
                data: {
                    nome:$("[name='catenovoinput']").val(),
                    desc:$("[name='catenovodescinput']").val(),
                    tipo:$("input[name=tipo]:checked").val(),
                },
                dataType: "json",
                success: function(data) {
                    console.log('Categoria cadastrada com sucesso');
                    document.getElementById('catenovo').style.display='none'
                    conscate($("input[name=tipo]:checked").val());
                }
                });
    }

    function cadastrarproduto(){
        serviitens = "";
        for(var i = 1; i<=contlinhas; i++){
            serviitens += $("[name='produto"+i+"']").val() +"x" + $("[name='quantidade"+i+"']").val() + ",";
        }
        serviitens = serviitens.slice(0,serviitens.length-1);
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
                valor:$("[name='valor']").val(),
                valorlab:$("[name='valorlab']").val(),
                serviitens:serviitens,
            },
            dataType: "json",
            success: function(data) {
                $('#exampleModal').modal('show');
                console.log('Cadastro do Produto realizado com Sucesso!');
            }
            
        });
            
    }

    // function cadastrarimagem(){
    //     var fd = new FormData(document.getElementById('formteste'));
    //     fd.append('file', $('#imagemiteminput'));
    //     $.ajax({
    //         headers: {
    //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         },
    //        url: "/cadastro/produto/imagem",
    //        type: "POST",
    //        data: fd,
    //        contentType: false,
    //        cache: false,
    //        processData: false,
    //        success: function(retorno){
    //            if(retorno == 1){
    //                console.log('Cadastro do Produto realizado com Sucesso!');
    //            }
    //           }
    //     });
    // }

</script>
</html>
@endsection
