@extends('layouts.Menu')
@section('atalhoSuperior')@endsection
@section('menuLateral')@endsection
<!DOCTYPE html>
<html lang="pt-br">
<head>
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
    <!-- <script src="{{asset('main.js')}}" type="module"></script> -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    <title>Plano de Contas</title>
    <!-- submenus -->
    <link rel="stylesheet" href="{{asset('../css/planodecontas.css')}}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
@section('Conteudo')
    <div class='tituloprincipal'>Plano de Contas</div>

    <!-- <nav id="tree"></nav> -->
    <button type='submit' name='novacategoria' class='btn btbordagreen' id='novacategoria' value='Nova Categoria' onclick='novacategoria()'>
        <span class='textobtborda'>Nova Categoria</span>
    </button>
    <br><br>

    <div id='planocontasdiv'>

    </div>

    <div class="modal fade bd-example-modal-lg" id="novacategoriaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Nova Categoria</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                <div class="modal-body">
                    Nome Categoria: <input type='text' name='novacategorianome' id='novacategorianome' placeholder='Digite aqui o Nome da Categoria'><br>
                    Aparecer dentro de: <select id='novacategoriaselect'></select><br>
                    
                    <input type='button' name='novacategoriabutton' id='novacategoriabutton' onclick='cadastrarcategoria()' value='Cadastrar Categoria'>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade bd-example-modal-lg" id="editcategoriaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Editar Categoria</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                <div class="modal-body">
                    Nome Categoria: <input type='text' name='editcategorianome' id='editcategorianome' placeholder='Digite aqui o Nome da Categoria'><br>
                    Aparecer dentro de: <select id='editcategoriaselect'></select><br>
                </div>
                <div class="modal-footer">
                    <input type='button' name='editcategoriabutton' id='editcategoriabutton' onclick='editarcategoria()' value='Editar Categoria'>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade bd-example-modal-lg" id="removercategoriaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Remover Categoria</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                <div class="modal-body">
                    Tem certeza que deseja excluir essa categoria?
                </div>
                <div class="modal-footer">
                    <input type='button' name='removercategoriabutton' id='removercategoriabutton' onclick='removercategoria()' value='Excluir'>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>

    

    
</body>
</html>
<script>

    var numeroentrar = 0;
    var categoriaremoveratual = 0;
    var numeroplanocontasedit = '';

    listplanocontas();

    function listplanocontas(){
        document.getElementById('planocontasdiv').innerHTML = '';
        $.ajax({
            type: "GET",
            url: "/listplanocontas",
            data: {},
            dataType: "json",
            success: function(data) {
                for(var i = 0; i < data.length; i++){
                    
                    if(data[i]['numeroplanocontas'].length > 1){
                        numeroentrar = data[i]['numeroplanocontas'].slice(0,-2).replace(/[^\w\s]/gi, '-');
                        console.log(data[i]['numeroplanocontas'].replace(/[^\w\s]/gi, '-'), numeroentrar);
                        document.getElementById('collapse-'+numeroentrar).innerHTML += "<div name='numeroplanocontas"+data[i]['numeroplanocontas']+"' id='numeroplanocontas"+data[i]['numeroplanocontas']+"' data-bs-toggle='collapse' data-bs-target='#collapse-"+data[i]['numeroplanocontas'].replace(/[^\w\s]/gi, '-')+"')'><h3><span class='textobtborda'>"+data[i]['numeroplanocontas']+" - "+data[i]['nomeplanocontas']+"</span></h3> </div><input type='button' id='editbutton"+data[i]['numeroplanocontas'].replace(/[^\w\s]/gi, '-')+"' value='Editar' onclick='editar("+data[i]['numeroplanocontas'].replace(/[^\w\s]/gi, '')+")'> <input type='button' id='removerbutton"+data[i]['numeroplanocontas'].replace(/[^\w\s]/gi, '-')+"' value='Remover' onclick='remover("+data[i]['numeroplanocontas'].replace(/[^\w\s]/gi, '')+")'> <div class='collapse' id='collapse-"+data[i]['numeroplanocontas'].replace(/[^\w\s]/gi, '-')+"'></div>";
                    }else{
                        document.getElementById('planocontasdiv').innerHTML += "<div name='numeroplanocontas"+data[i]['numeroplanocontas']+"' id='numeroplanocontas"+data[i]['numeroplanocontas']+"' data-bs-toggle='collapse' data-bs-target='#collapse-"+data[i]['numeroplanocontas'].replace(/[^\w\s]/gi, '-')+"')'><h3><span class='textobtborda'>"+data[i]['numeroplanocontas']+" - "+data[i]['nomeplanocontas']+"</span></h3> </div><input type='button' id='editbutton"+data[i]['numeroplanocontas'].replace(/[^\w\s]/gi, '-')+"' value='Editar' onclick='editar("+data[i]['numeroplanocontas'].replace(/[^\w\s]/gi, '-')+")'> <input type='button' id='removerbutton"+data[i]['numeroplanocontas'].replace(/[^\w\s]/gi, '-')+"' value='Remover' onclick='remover("+data[i]['numeroplanocontas'].replace(/[^\w\s]/gi, '')+")'> <div class='collapse' id='collapse-"+data[i]['numeroplanocontas'].replace(/[^\w\s]/gi, '-')+"'></div>";
                    }
                }
                // "<div class='collapse' id='collapse-"+data['numeroplanocontas']['i']+"'></div>"
            }
        }); 
    }

    function novacategoria(){
        $.ajax({
            type: "GET",
            url: "/listplanocontascategoria",
            data: {},
            dataType: "json",
            success: function(data) {

                var sel = document.getElementById('novacategoriaselect');
                    for (i = sel.length - 1; i >= 0; i--) {
                        sel.remove(i);
                    }

                var select = document.getElementById('novacategoriaselect');
                var opt = document.createElement('option');
                    opt.appendChild(document.createTextNode('Geral'));
                    opt.value = '';
                    select.appendChild(opt);
                for(var i = 0; i<data.length; i++){
                    var opt = document.createElement('option');
                    opt.appendChild(document.createTextNode(data[i]['nomeplanocontas']));
                    opt.value = data[i]['numeroplanocontas'];
                    select.appendChild(opt);
                }
            }
        }); 
        document.getElementById('novacategorianome').value = '';
        $('#novacategoriaModal').modal('show');
    }

    function editar(numerocategoria){
        // console.log(numerocategoria.toString().length);
        numeroplanocontasedit = '';
        for(var i = 0; i < numerocategoria.toString().length; i++){
            numeroplanocontasedit += numerocategoria.toString()[i] + '.';
        }
        numeroplanocontasedit = numeroplanocontasedit.slice(0,-1);

        $.ajax({
            type: "GET",
            url: "/listplanocontascategoria",
            data: {},
            dataType: "json",
            success: function(data) {

                var sel = document.getElementById('editcategoriaselect');
                    for (i = sel.length - 1; i >= 0; i--) {
                        sel.remove(i);
                    }

                var select = document.getElementById('editcategoriaselect');
                var opt = document.createElement('option');
                    opt.appendChild(document.createTextNode('Geral'));
                    opt.value = '';
                    select.appendChild(opt);
                for(var i = 0; i<data.length; i++){
                    var opt = document.createElement('option');
                    opt.appendChild(document.createTextNode(data[i]['nomeplanocontas']));
                    opt.value = data[i]['numeroplanocontas'];
                    select.appendChild(opt);
                    if(data[i]['numeroplanocontas'] == numeroplanocontasedit){
                        document.getElementById('editcategorianome').value = data[i]['nomeplanocontas'];
                    }
                }
            }
        }); 
        setTimeout(function(){ document.getElementById('editcategoriaselect').value = numeroplanocontasedit.slice(0,-2);}, 500);
        
        $('#editcategoriaModal').modal('show');
    }

    function remover(numerocategoria){
        // console.log(numerocategoria.toString().length);
        categoriaremoveratual = '';
        for(var i = 0; i < numerocategoria.toString().length; i++){
            categoriaremoveratual += numerocategoria.toString()[i] + '.';
        }
        categoriaremoveratual = categoriaremoveratual.slice(0,-1);

        $('#removercategoriaModal').modal('show');
    }

    function cadastrarcategoria(){
        $.ajax({
            type: "GET",
            url: "/cadastrarplanocontas",
            data: {nomeplanocontas: document.getElementById('novacategorianome').value, numeroplanocontas: document.getElementById('novacategoriaselect').value},
            dataType: "json",
            success: function(data) {
                $('#novacategoriaModal').modal('hide');
                listplanocontas();
            }
        }); 
    }
    function editarcategoria(){
        $.ajax({
            type: "GET",
            url: "/editarplanocontas",
            data: {nomeplanocontas: document.getElementById('editcategorianome').value, numeroplanocontasnovo: document.getElementById('editcategoriaselect').value, numeroplanocontas: numeroplanocontasedit },
            dataType: "json",
            success: function(data) {
                $('#editcategoriaModal').modal('hide');
                listplanocontas();
            }
        }); 
    }

    function removercategoria(){
        $.ajax({
            type: "GET",
            url: "/removerplanocontas",
            data: {numeroplanocontas: categoriaremoveratual },
            dataType: "json",
            success: function(data) {
                $('#removercategoriaModal').modal('hide');
                listplanocontas();
            }
        }); 
    }

</script>
@endsection