@extends('layouts.Menu')
@section('atalhoSuperior')@endsection
@section('menuLateral')@endsection

<!DOCTYPE html>
<html lang="en">

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
  <script src="{{asset('shortcut.js')}}"></script>
  <script src="{{asset('jquery-ui-1.12.1/jquery-ui.js')}}"></script>
  <script src="{{asset('inputmask/dist/jquery.inputmask.min.js')}}"></script>
  <script src="{{asset('inputmask/dist/bindings/inputmask.binding.js')}}"></script>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  <title>Cadastro Ultrassom</title>

  <style>
    @media (max-width:575px) {

      .largurainput,
      .btnovaespec {
        width: 100% !important;
      }
    }
  </style>
</head>

<body>
  @section('Conteudo')
  
	<div class="tituloprincipal container-fluid">Cadastro Ultrassom</div>

	<div class="container-fluid" style='margin-top:2.8rem;'>
	  <div class="row gx-3 gy-3">
	    <div class="col-sm-7 col-md-6 col-lg-4">
	      <div class="cor01">
	        <label for="novoultrassomtext" class="form-label">Nome do Ultrassom</label>
	        <div class="direction">
	          <div class='mb-2 largurainput' style='width:80%'>
	            <input type="text" name='novoultrassomtext' id='novoultrassomtext' class='form-control'>
	          </div>
	          <div class='btnovaespec' style='width:10%'>
	            <button type="submit" class="btn btamarelo" name='novoultrassombutton' id='novoultrassombutton' value='Cadastrar' onclick='novoultrassom()'>
	              <span class="selectacoes" style='font-size:15px'>Cadastrar</span>
	            </button>
	          </div>
	        </div>
	      </div>
	    </div>
	  </div>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="cadultrassom" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h4 class="modal-title" id="exampleModalLabel">Cadastro</h4>
	        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	      </div>
	      <div class="modal-body">
	        <div id=''>Ultrassom cadastrado com sucesso</div>
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
  function novoultrassom() {
    $.ajax({
      type: "GET",
      url: "/cadastro/cadastronovoultrassom",
      data: {
        ultrassom: document.getElementById('novoultrassomtext').value
      },
      dataType: "json",
      success: function(data) {
				$('#cadultrassom').modal('show');
        console.log('Ultrassom Cadastrado com Sucesso!');
      }
    });
  }
</script>
@endsection

</html>