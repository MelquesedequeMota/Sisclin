<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('../css/estilo.css')}}">
  <!-- <link rel="stylesheet" href="{{asset('../css/cssgeral.css')}}"> -->
  <!-- <link rel="stylesheet" href="{{asset('../css/consultas.css')}}"> -->
  <!-- <link rel="stylesheet" href="{{asset('../css/cadastrocontrato.css')}}"> -->
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="{{asset('jquery.min.js')}}"></script>
  <script src="{{asset('jquery-ui-1.12.1/jquery-ui.js')}}"></script>
  <script src="{{asset('inputmask/dist/jquery.inputmask.min.js')}}"></script>
  <script src="{{asset('inputmask/dist/bindings/inputmask.binding.js')}}"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
  </script>
    <title>Relatório Vendedores</title>
</head>
<body>
    <div id='divs'>

    </div>
</body>
<script>
    reladoriovendedoresdados();
    function reladoriovendedoresdados(input) {
        $.ajax({
          type: 'GET',
          url: '/relatoriovendedoresdados',
          data: {
          },
          dataType: "json",
          success: function(data) {
            document.getElementById('divs').innerHTML= '';
            console.log(data);
            for(var i = 0; i < data[0][0].length; i++){
                document.getElementById('divs').innerHTML+="<div id='divvendedor"+data[0][0][i]+"'><b><font size='5'>"+data[0][1][i]+" - "+data[0][2][i]+"</font></b><div id='divvendas"+data[0][0][i]+"'><table id='divvendas"+data[0][0][i]+"table' class='table'><thead class='table-active'><tr><td scope='col'>Lote</td><td scope='col'>Cliente</td><td scope='col'>Contrato</td><td scope='col'>Data</td></tr></thead><tbody id='divvendas"+data[0][0][i]+"tbody'></tbody></table></div></div>";
            }
            for(var i = 0; i < data[1][0].length; i++){
                var tabela = document.getElementById("divvendas"+data[1][0][i]+"tbody");
                var numeroLinhas = tabela.rows.length;
                var linha = tabela.insertRow(numeroLinhas);
                var celula1 = linha.insertCell(0);
                var celula2 = linha.insertCell(1);
                var celula3 = linha.insertCell(2);
                var celula4 = linha.insertCell(3);
                celula1.innerHTML = data[1][1][i];
                celula2.innerHTML = data[1][2][i];
                celula3.innerHTML = data[1][3][i];
                celula4.innerHTML = data[1][4][i].split('-')[2] + '/' + data[1][4][i].split('-')[1] + '/' + data[1][4][i].split('-')[0];
            }
        }
    });
    }
</script>
</html>