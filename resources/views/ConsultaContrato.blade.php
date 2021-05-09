<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <script src="{{asset('jquery.min.js')}}"></script>
    <script src="{{asset('jquery-ui-1.12.1/jquery-ui.js')}}"></script>
    <script src="{{asset('inputmask/dist/jquery.inputmask.min.js')}}"></script>
    <script src="{{asset('inputmask/dist/bindings/inputmask.binding.js')}}"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <title>Consulta do Contrato</title>
</head>
<body>
    Número do contrato: <input type='text' name='pesquisarcontratonumero' id='pesquisarcontratonumero' > Nome do titular: <input type='text' name='pesquisarcontratonome' id='pesquisarcontratonome'><input type='button' value='Pesquisar' onclick='pesquisarcontrato()'>
        <div id='tabela'><table border='1px' id='pesquisarcontratotable'>
            <tr>
                <th>Número do Contrato</th>
                <th>Nome do titular</th>
                <th>Nome do Plano</th>
                <th>Editar</th>
            </tr>
        </table></div>

  <div class='input' id='selecplanobutton'><input type='button' value='Selecionar Plano' data-toggle="modal" data-target="#PlanoModal"></div>

  <div class='input' id='planoselecionadodiv'><div id='planoselecionado'></div></div>

  <div class='input' id='tabelatitulardiv'><table border='1px' id='tabelatitular'></div>
    <tbody>
      <tr>
          <th>CPF/CNPJ</th>
          <th>Nome</th>
          <th>Tipo de Pessoa</th>
          <th>Ações</th>
      </tr>
    </tbody>
    <tfoot>
      <input type='button' value='Adicionar Titular' data-toggle="modal" data-target="#TitularModal">
    </tfoot>
  </table></div>

  <div class='input' id='alertamaximodepdiv'><div id='alertamaximodep'></div></div>
  <div class='input' id='tabeladependentesdiv'><table border='1px' id='tabeladependentes'>
    <tbody>
      <tr>
          <th>CPF/CNPJ</th>
          <th>Nome</th>
          <th>Tipo de Pessoa</th>
          <th>Ações</th>
      </tr>
    </tbody>
    <tfoot>
      <input type='button' value='Adicionar Dependente' onclick='checarmaxdep()'>
    </tfoot>
    </table></div></div>


    <div class='input' id='diapag'>Dia do Pagamento: <input type='number' name='diapag'id ='diapaginput'></div>
    <div class='input' id='buttoneditardiv'><input type='button' name='editar' id='editar' onclick='editarcontrato()' value='Editar Contrato'></button>



<div class="modal fade" id="PlanoModal" tabindex="-1" role="dialog" aria-labelledby="PlanoModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="PlanoModalLabel">Selecionar Plano</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      Nome: <input type='text' name='pesquisarplannome'id ='pesquisarplannome'>
      <input type='button' value='Pesquisar' onclick='pesquisarplano()'>
      <div class='input' id='tabelaescolherplano'>
        <table border='1px' id='tabelapesquisaplanos'>
        <tr>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Quantidade de Dependentes</th>
            <th>Valor</th>
            <th>Adicionar</th>
        </tr>
        </table>
    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade modal-xl" id="DepModal" tabindex="-1" role="dialog" aria-labelledby="DepModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="DepModalLabel">Selecionar Dependentes</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class='input' id='tabelaescolherdependente'>
        CPF/CNPJ:<input type='text' name='pesquisadepcpfcnpj' id='pesquisadepcpfcnpj'>
        Nome:<input type='text' name='pesquisadepnome' id='pesquisadepnome'>
        <input type='button' value='Pesquisar' onclick='pesquisardep()'>
        <table border='1px' id='tabelapesquisadependentes'>
        <tr>
            <th>CPF/CNPJ</th>
            <th>Nome</th>
            <th>Tipo de Pessoa</th>
            <th>Adicionar</th>
        </tr>
        </table>
    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade modal-xl" id="TitularModal" tabindex="-1" role="dialog" aria-labelledby="TitularModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="TitularModalLabel">Selecionar Titular</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class='input' id='tabelaescolhertitular'>
        CPF/CNPJ:<input type='text' name='pesquisatitucpfcnpj' id='pesquisatitucpfcnpj'>
        Nome:<input type='text' name='pesquisatitunome' id='pesquisatitunome'>
        <input type='button' value='Pesquisar' onclick='pesquisartitu()'>
        <table border='1px' id='tabelapesquisatitular'>
        <tr>
            <th>CPF/CNPJ</th>
            <th>Nome</th>
            <th>Tipo de Pessoa</th>
            <th>Adicionar</th>
        </tr>
        </table>
    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade modal-xl" id="DepEditModal" tabindex="-1" role="dialog" aria-labelledby="DepEditModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="DepEditModalLabel">Selecionar Dependente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class='input' id='tabelaeditdependente'>
        CPF/CNPJ:<input type='text' name='pesquisadepeditcpfcnpj' id='pesquisadepeditcpfcnpj'>
        Nome:<input type='text' name='pesquisadepeditnome' id='pesquisadepeditnome'>
        <input type='button' value='Pesquisar' onclick='pesquisardepedit()'>
        <table border='1px' id='tabelapesquisaeditdependentes'>
        <tr>
            <th>CPF/CNPJ</th>
            <th>Nome</th>
            <th>Tipo de Pessoa</th>
            <th>Adicionar</th>
        </tr>
        </table>
    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

</body>
</html>
<script>
    reset();
    escondertabela();
    var contratoatual = 0;
    var dadoslinhas = [];
    var qtddepplano = 0;
    var idplanoselec = 0;
    var dadoslinhasdep = [];
    var dadoslinhastitu = [];
    var dadoslinhasplan = [];
    var contlinhas = 0;
    var contlinhas1 = 0;
    var dadosdep = [];
    var dadosdep2 = [];
    var dadostitu = [];
    var dadostitu2 = [];
    var selectitu = [];
    var selecdep = [];
    var dadoslinhaseditdep = [];
    var linhaeditdep = 0;
    var dadoseditdep = [];
    var dadoseditdep2 = [];

    $("input[id*='pesquisadepcpfcnpj']").inputmask({
        mask: ['999.999.999-99', '99.999.999/9999-99'],
        keepStatic: true
    });
    $("input[id*='pesquisatitucpfcnpj']").inputmask({
        mask: ['999.999.999-99', '99.999.999/9999-99'],
        keepStatic: true
    });

    function reset(){
        $('.input').css('display', 'none');
    }

    function escondertabela(){
        $('#tabela').css('display', 'none');
    }

    $('#pesquisarcontratonome').keyup(function(){

    var nome = $('#pesquisarcontratonome').val();
    var nomes = [];
    if(nome.length >= 2){
        $.ajax({
            type:'GET',
            url:'pessoa/nome',
            data: {nomepessoa:nome},
            dataType: "json",
            success: function(data){
                for(i=0; i<data.length; i++){
                    if(data[i]['pac_nome']){
                        nomes.push(data[i]['pac_nome']);
                    }else if(data[i]['forfis_nome']){
                        nomes.push(data[i]['forfis_nome']);
                    }else if(data[i]['func_nome']){
                        nomes.push(data[i]['func_nome']);
                    }else if(data[i]['forjur_nome']){
                        nomes.push(data[i]['forjur_nome']);
                    }else if(data[i]['clijur_nome']){
                        nomes.push(data[i]['clijur_nome']);
                    }
                }
                nomes = nomes.filter((este, i) => nomes.indexOf(este) === i);
                $("#pesquisarcontratonome").autocomplete({
                    source: nomes
                    });
            }

        });

    }

    });

    function pesquisarcontrato(){
        apagartabela();
        $.ajax({
                type: "GET",
                url: "/consulta/contrato/dados",
                data: {nometitular: document.getElementById('pesquisarcontratonome').value, cont_id: document.getElementById('pesquisarcontratonumero').value},
                dataType: "json",
                success: function(data) {
                    document.getElementById('tabela').style.display = 'block';
                    for(i=0; i<data.length; i++){
                        var tabela = document.getElementById('pesquisarcontratotable');
                        var numeroLinhas = tabela.rows.length;
                        var linha = tabela.insertRow(numeroLinhas);
                        var celula1 = linha.insertCell(0);
                        var celula2 = linha.insertCell(1);   
                        var celula3 = linha.insertCell(2); 
                        var celula4 = linha.insertCell(3);
                        dadoslinhas.push(data[i][0]);
                        celula1.innerHTML=data[i][0];
                        celula2.innerHTML=data[i][1];
                        celula3.innerHTML=data[i][2];
                        celula4.innerHTML="<input type='button' name='editareste' id='"+i+"' value='Editar' onclick='editar(this)'>";
                        
                    }
                }
            });
    }

    function editar(linha){
        linha = parseInt(linha.id);
        $.ajax({
            type:'GET',
            url:'contrato/dadosedit',
            data: {cont_id: dadoslinhas[linha]},
            dataType: "json",
            success: function(data){
                esconder(data[0]);
            }
        });
    }

    function esconder(dados) {
        escondertabela();
        contratoatual = dados['cont_id'];
        document.getElementById('selecplanobutton').style.display = 'block';
        document.getElementById('tabelaescolherplano').style.display = 'block';
        document.getElementById('tabelaescolherdependente').style.display = 'block';
        document.getElementById('tabelaeditdependente').style.display = 'block';
        document.getElementById('tabelaescolhertitular').style.display = 'block';
        document.getElementById('planoselecionadodiv').style.display = 'block';
        document.getElementById('tabelatitulardiv').style.display = 'block';
        document.getElementById('alertamaximodepdiv').style.display = 'block';
        document.getElementById('tabeladependentesdiv').style.display = 'block';
        document.getElementById('diapag').style.display = 'block';
        document.getElementById('buttoneditardiv').style.display = 'block';

        document.querySelector("[name='diapag']").value = dados['cont_diapag'];
        $.ajax({
                type: "GET",
                url: "/consulta/contrato/plano",
                data: {plan_id: dados['cont_plano']},
                dataType: "json",
                success: function(data) {
                  document.getElementById("planoselecionado").innerHTML = "O plano selecionado foi: <b>" +data[0]['plan_nome']+"</b><br>A quantidade máxima de dependentes é: <b>"+data[0]['plan_qtddep']+"</b>.";
                  qtddepplano = data[0]['plan_qtddep'];
                  idplanoselec = data[0]['plan_id'];
                  $('#PlanoModal').modal('hide');
                  apagartabelaplano();
                  document.getElementById('alertamaximodep').innerHTML = "";
                }
          });

          $.ajax({
              type: "GET",
              url: "/consulta/contratotitu/dados",
              data: {cont_id: dados['cont_id']},
              dataType: "json",
              success: function(data) {
                if(data[0]['pac_nome']){
                  var nomepessoadados = data[0]['pac_nome'];
                  var cpfcnpjpessoadados = data[0]['pac_cpf'];
                  var tipopessoadados = 'Física';
                }else if(data[0]['forfis_nome']){
                  var nomepessoadados = data[0]['forfis_nome'];
                  var cpfcnpjpessoadados = data[0]['forfis_cpf'];
                  var tipopessoadados = 'Física';
                }else if(data[0]['func_nome']){
                  var nomepessoadados = data[0]['func_nome'];
                  var cpfcnpjpessoadados = data[0]['func_cpf'];
                  var tipopessoadados = 'Física';
                }else if(data[0]['forjur_nome']){
                  var nomepessoadados = data[0]['forjur_nome'];
                  var cpfcnpjpessoadados = data[0]['forjur_cnpj'];
                  var tipopessoadados = 'Jurídica';
                }else if(data[0]['clijur_nome']){
                  var nomepessoadados = data[0]['clijur_nome'];
                  var cpfcnpjpessoadados = data[0]['clijur_cnpj'];
                  var tipopessoadados = 'Jurídica';
                }

                var tableHeaderRowCount = 1;
                var table = document.getElementById('tabelatitular');
                var rowCount = table.rows.length;
                for (var i = tableHeaderRowCount; i < rowCount; i++) {
                    table.deleteRow(tableHeaderRowCount);
                }
                
                var tabela = document.getElementById('tabelatitular');
                var numeroLinhas = tabela.rows.length;
                var linha = tabela.insertRow(numeroLinhas);
                var celula1 = linha.insertCell(0);
                var celula2 = linha.insertCell(1);   
                var celula3 = linha.insertCell(2); 
                var celula4 = linha.insertCell(3);
                celula1.innerHTML=cpfcnpjpessoadados;
                celula2.innerHTML=nomepessoadados;
                celula3.innerHTML=tipopessoadados;
                celula4.innerHTML="<input type='button' name='selecionareste' id='"+i+"' value='Editar' onclick='editartitu()'>";
                $('#TitularModal').modal('hide');
                apagartabelatitu();
                selectitu = [cpfcnpjpessoadados, nomepessoadados, tipopessoadados];

              }
          });
          apagartabeladepdados();
              $.ajax({
                type: "GET",
                url: "/consulta/contratodep/dados",
                data: {cont_id: dados['cont_id']},
                dataType: "json",
                success: function(data) {
                  for(var i = 0; i<data.length; i++){
                    if(data[i][0]['pac_nome']){
                    var nomepessoadados = data[i][0]['pac_nome'];
                    var cpfcnpjpessoadados = data[i][0]['pac_cpf'];
                    var tipopessoadados = 'Física';
                    }else if(data[i][0]['forfis_nome']){
                      var nomepessoadados = data[i][0]['forfis_nome'];
                      var cpfcnpjpessoadados = data[i][0]['forfis_cpf'];
                      var tipopessoadados = 'Física';
                    }else if(data[i][0]['func_nome']){
                      var nomepessoadados = data[i][0]['func_nome'];
                      var cpfcnpjpessoadados = data[i][0]['func_cpf'];
                      var tipopessoadados = 'Física';
                    }else if(data[i][0]['forjur_nome']){
                      var nomepessoadados = data[i][0]['forjur_nome'];
                      var cpfcnpjpessoadados = data[i][0]['forjur_cnpj'];
                      var tipopessoadados = 'Jurídica';
                    }else if(data[i][0]['clijur_nome']){
                      var nomepessoadados = data[i][0]['clijur_nome'];
                      var cpfcnpjpessoadados = data[i][0]['clijur_cnpj'];
                      var tipopessoadados = 'Jurídica';
                    }
                    var tabela = document.getElementById('tabeladependentes');
                    var numeroLinhas = tabela.rows.length;
                    var linha = tabela.insertRow(numeroLinhas);
                    var celula1 = linha.insertCell(0);
                    var celula2 = linha.insertCell(1);   
                    var celula3 = linha.insertCell(2); 
                    var celula4 = linha.insertCell(3);
                    celula1.innerHTML=cpfcnpjpessoadados;
                    celula2.innerHTML=nomepessoadados;
                    celula3.innerHTML=tipopessoadados;
                    celula4.innerHTML="<input type='button' name='selecionareste' id='"+numeroLinhas+"' value='Editar' onclick='editardep(this)'><input type='button' name='remover' id='"+numeroLinhas+"' value='Remover' onclick='deletarlinhadep(this)'>";
                    selecdep.push([cpfcnpjpessoadados, nomepessoadados, tipopessoadados]);
                  }
                  
                  $('#DepModal').modal('hide');
                  apagartabeladep();

                }
            });
          
        
        
    }

    function apagartabela(){
        var tableHeaderRowCount = 1;
        var table = document.getElementById('pesquisarcontratotable');
        var rowCount = table.rows.length;
        for (var i = tableHeaderRowCount; i < rowCount; i++) {
            table.deleteRow(tableHeaderRowCount);
        }
        reset();
    }
    

    function apagartabeladep(){
        var tableHeaderRowCount = 1;
        var table = document.getElementById('tabelapesquisadependentes');
        var rowCount = table.rows.length;
        for (var i = tableHeaderRowCount; i < rowCount; i++) {
            table.deleteRow(tableHeaderRowCount);
        }
    }

    function apagartabeladepdados(){
        var tableHeaderRowCount = 1;
        var table = document.getElementById('tabeladependentes');
        var rowCount = table.rows.length;
        for (var i = tableHeaderRowCount; i < rowCount; i++) {
            table.deleteRow(tableHeaderRowCount);
        }
        selecdep = [];
    }

    function apagartabeladependentes(){
        var tableHeaderRowCount = 1;
        var table = document.getElementById('tabeladependentes');
        var rowCount = table.rows.length;
        for (var i = tableHeaderRowCount; i < rowCount; i++) {
            table.deleteRow(tableHeaderRowCount);
        }
    }

    function apagartabeladepedit(){
        var tableHeaderRowCount = 1;
        var table = document.getElementById('tabelapesquisaeditdependentes');
        var rowCount = table.rows.length;
        for (var i = tableHeaderRowCount; i < rowCount; i++) {
            table.deleteRow(tableHeaderRowCount);
        }
    }

    function apagartabelatitu(){
        var tableHeaderRowCount = 1;
        var table = document.getElementById('tabelapesquisatitular');
        var rowCount = table.rows.length;
        for (var i = tableHeaderRowCount; i < rowCount; i++) {
            table.deleteRow(tableHeaderRowCount);
        }
    }

    function apagartabelaplano(){
        var tableHeaderRowCount = 1;
        var table = document.getElementById('tabelapesquisaplanos');
        var rowCount = table.rows.length;
        for (var i = tableHeaderRowCount; i < rowCount; i++) {
            table.deleteRow(tableHeaderRowCount);
        }
    }

    function pesquisarplano(){
        apagartabelaplano();
        $.ajax({
                type: "GET",
                url: "/consulta/plano/dados",
                data: {nomeplano: document.getElementById('pesquisarplannome').value},
                dataType: "json",
                success: function(data) {
                    for(i=0; i<data.length; i++){
                        var tabela = document.getElementById('tabelapesquisaplanos');
                        var numeroLinhas = tabela.rows.length;
                        var linha = tabela.insertRow(numeroLinhas);
                        var celula1 = linha.insertCell(0);
                        var celula2 = linha.insertCell(1);   
                        var celula3 = linha.insertCell(2);
                        var celula4 = linha.insertCell(3);
                        var celula5 = linha.insertCell(4);
                        dadoslinhasplan.push([data[i]['plan_id'], data[i]['plan_nome'], data[i]['plan_qtddep']]);
                        celula1.innerHTML=data[i]['plan_nome'];
                        celula2.innerHTML=data[i]['plan_desc'];
                        celula3.innerHTML=data[i]['plan_qtddep'];
                        celula4.innerHTML=data[i]['plan_valor'];
                        celula5.innerHTML="<input type='button' name='selecionareste' id='"+i+"' value='Add' onclick='selecionarplan(this)'>";
                        
                    }
                }
            });
    }

    function pesquisardep(){
        apagartabeladep();
        dadosdep = [];
        $.ajax({
                type: "GET",
                url: "/consulta/pessoa/dados",
                data: {cpfcnpj: document.getElementById('pesquisadepcpfcnpj').value, nomepessoa: document.getElementById('pesquisadepnome').value},
                dataType: "json",
                success: function(data) {
                    for(o=0; o<data.length; o++){
                        if(data[o]['pac_cpf']){
                            dadosdep.push([data[o]['pac_cpf'], data[o]['pac_nome'], "Física"]);
                        }else if(data[o]['forfis_cpf']){
                            dadosdep.push([data[o]['forfis_cpf'], data[o]['forfis_nome'], "Física"]);
                        }else if(data[o]['func_cpf']){
                            dadosdep.push([data[o]['func_cpf'], data[o]['func_nome'], "Física"]);
                        }else if(data[o]['forjur_cnpj']){
                            dadosdep.push([data[o]['forjur_cnpj'], data[o]['forjur_nome'], "Jurídica"]);
                        }else if(data[o]['clijur_cnpj']){
                            dadosdep.push([data[o]['clijur_cnpj'], data[o]['clijur_nome'], "Jurídica"]);
                        }
                    }
                    dadosdep2 = dadosdep.filter(([cpfcnpj, nome, tipopessoa], i) => {
                    return !dadosdep.some(
                            ([_cpfcnpj, _nome, _tipopessoa], j) => j > i && nome === _nome && cpfcnpj === _cpfcnpj
                        );
                    });
                    for(i=0; i<dadosdep2.length; i++){
                        var tabela = document.getElementById('tabelapesquisadependentes');
                        var numeroLinhas = tabela.rows.length;
                        var linha = tabela.insertRow(numeroLinhas);
                        var celula1 = linha.insertCell(0);
                        var celula2 = linha.insertCell(1);   
                        var celula3 = linha.insertCell(2); 
                        var celula4 = linha.insertCell(3);
                        dadoslinhasdep.push([dadosdep2[i][0], dadosdep2[i][1], dadosdep2[i][2]]);
                        celula1.innerHTML=dadosdep2[i][0];
                        celula2.innerHTML=dadosdep2[i][1];
                        celula3.innerHTML=dadosdep2[i][2];
                        celula4.innerHTML="<input type='button' name='selecionareste' id='"+i+"' value='Add' onclick='selecionardep(this)'>";
                        
                    }
                }
            });
    }

    function pesquisardepedit(){
        apagartabeladepedit();
        dadoseditdep = [];
        $.ajax({
                type: "GET",
                url: "/consulta/pessoa/dados",
                data: {cpfcnpj: document.getElementById('pesquisadepeditcpfcnpj').value, nomepessoa: document.getElementById('pesquisadepeditnome').value},
                dataType: "json",
                success: function(data) {
                    for(o=0; o<data.length; o++){
                        if(data[o]['pac_cpf']){
                            dadoseditdep.push([data[o]['pac_cpf'], data[o]['pac_nome'], "Física"]);
                        }else if(data[o]['forfis_cpf']){
                            dadoseditdep.push([data[o]['forfis_cpf'], data[o]['forfis_nome'], "Física"]);
                        }else if(data[o]['func_cpf']){
                            dadoseditdep.push([data[o]['func_cpf'], data[o]['func_nome'], "Física"]);
                        }else if(data[o]['forjur_cnpj']){
                            dadoseditdep.push([data[o]['forjur_cnpj'], data[o]['forjur_nome'], "Jurídica"]);
                        }else if(data[o]['clijur_cnpj']){
                            dadoseditdep.push([data[o]['clijur_cnpj'], data[o]['clijur_nome'], "Jurídica"]);
                        }
                    }
                    dadoseditdep2 = dadoseditdep.filter(([cpfcnpj, nome, tipopessoa], i) => {
                    return !dadoseditdep.some(
                            ([_cpfcnpj, _nome, _tipopessoa], j) => j > i && nome === _nome && cpfcnpj === _cpfcnpj
                        );
                    });
                    for(i=0; i<dadoseditdep2.length; i++){
                        var tabela = document.getElementById('tabelapesquisaeditdependentes');
                        var numeroLinhas = tabela.rows.length;
                        var linha = tabela.insertRow(numeroLinhas);
                        var celula1 = linha.insertCell(0);
                        var celula2 = linha.insertCell(1);   
                        var celula3 = linha.insertCell(2); 
                        var celula4 = linha.insertCell(3);
                        dadoslinhaseditdep.push([dadoseditdep2[i][0], dadoseditdep2[i][1], dadoseditdep2[i][2]]);
                        celula1.innerHTML=dadoseditdep2[i][0];
                        celula2.innerHTML=dadoseditdep2[i][1];
                        celula3.innerHTML=dadoseditdep2[i][2];
                        celula4.innerHTML="<input type='button' name='selecionaresteedit' id='"+i+"' value='Editar' onclick='selecionareditdep(this)'>";
                        
                    }
                }
            });
      
    }

    function pesquisartitu(){
        apagartabelatitu();
        dadostitu = [];
        $.ajax({
                type: "GET",
                url: "/consulta/pessoa/dados",
                data: {cpfcnpj: document.getElementById('pesquisatitucpfcnpj').value, nomepessoa: document.getElementById('pesquisatitunome').value},
                dataType: "json",
                success: function(data) {
                    for(o=0; o<data.length; o++){
                        if(data[o]['pac_cpf']){
                            dadostitu.push([data[o]['pac_cpf'], data[o]['pac_nome'], "Física"]);
                        }else if(data[o]['forfis_cpf']){
                            dadostitu.push([data[o]['forfis_cpf'], data[o]['forfis_nome'], "Física"]);
                        }else if(data[o]['func_cpf']){
                            dadostitu.push([data[o]['func_cpf'], data[o]['func_nome'], "Física"]);
                        }else if(data[o]['forjur_cnpj']){
                            dadostitu.push([data[o]['forjur_cnpj'], data[o]['forjur_nome'], "Jurídica"]);
                        }else if(data[o]['clijur_cnpj']){
                            dadostitu.push([data[o]['clijur_cnpj'], data[o]['clijur_nome'], "Jurídica"]);
                        }
                    }
                    dadostitu2 = dadostitu.filter(([cpfcnpj, nome, tipopessoa], i) => {
                    return !dadostitu.some(
                            ([_cpfcnpj, _nome, _tipopessoa], j) => j > i && nome === _nome && cpfcnpj === _cpfcnpj
                        );
                    });
                    for(i=0; i<dadostitu2.length; i++){
                        var tabela = document.getElementById('tabelapesquisatitular');
                        var numeroLinhas = tabela.rows.length;
                        var linha = tabela.insertRow(numeroLinhas);
                        var celula1 = linha.insertCell(0);
                        var celula2 = linha.insertCell(1);   
                        var celula3 = linha.insertCell(2); 
                        var celula4 = linha.insertCell(3);
                        dadoslinhastitu.push([dadostitu2[i][0], dadostitu2[i][1], dadostitu2[i][2]]);
                        celula1.innerHTML=dadostitu2[i][0];
                        celula2.innerHTML=dadostitu2[i][1];
                        celula3.innerHTML=dadostitu2[i][2];
                        celula4.innerHTML="<input type='button' name='selecionareste' id='"+i+"' value='Add' onclick='selecionartitu(this)'>";
                        
                    }
                }
            });
    }
    function selecionarplan(dado){
      document.getElementById("planoselecionado").innerHTML = "O plano selecionado foi: <b>" +dadoslinhasplan[dado.id][1]+"</b><br>A quantidade máxima de dependentes é: <b>"+dadoslinhasplan[dado.id][2]+"</b>.";
      qtddepplano = dadoslinhasplan[dado.id][2];
      idplanoselec = dadoslinhasplan[dado.id][0];
      $('#PlanoModal').modal('hide');
      apagartabelaplano();
      document.getElementById('alertamaximodep').innerHTML = "";
    }
    function selecionartitu(dado){

      var tableHeaderRowCount = 1;
      var table = document.getElementById('tabelatitular');
      var rowCount = table.rows.length;
      for (var i = tableHeaderRowCount; i < rowCount; i++) {
          table.deleteRow(tableHeaderRowCount);
      }
      
      var tabela = document.getElementById('tabelatitular');
      var numeroLinhas = tabela.rows.length;
      var linha = tabela.insertRow(numeroLinhas);
      var celula1 = linha.insertCell(0);
      var celula2 = linha.insertCell(1);   
      var celula3 = linha.insertCell(2); 
      var celula4 = linha.insertCell(3);
      celula1.innerHTML=dadoslinhastitu[dado.id][0];
      celula2.innerHTML=dadoslinhastitu[dado.id][1];
      celula3.innerHTML=dadoslinhastitu[dado.id][2];
      celula4.innerHTML="<input type='button' name='selecionareste' id='"+i+"' value='Editar' onclick='editartitu()'>";
      $('#TitularModal').modal('hide');
      apagartabelatitu();
      selectitu = [dadoslinhastitu[dado.id][0], dadoslinhastitu[dado.id][2], dadoslinhastitu[dado.id][2]];
      dadoslinhastitu = [];

    }

    function selecionardep(dado){
      
      var tabela = document.getElementById('tabeladependentes');
      var numeroLinhas = tabela.rows.length;
      var linha = tabela.insertRow(numeroLinhas);
      var celula1 = linha.insertCell(0);
      var celula2 = linha.insertCell(1);   
      var celula3 = linha.insertCell(2); 
      var celula4 = linha.insertCell(3);
      celula1.innerHTML=dadoslinhasdep[dado.id][0];
      celula2.innerHTML=dadoslinhasdep[dado.id][1];
      celula3.innerHTML=dadoslinhasdep[dado.id][2];
      celula4.innerHTML="<input type='button' name='selecionareste' id='"+numeroLinhas+"' value='Editar' onclick='editardep(this)'><input type='button' name='remover' id='"+numeroLinhas+"' value='Remover' onclick='deletarlinhadep(this)'>";
      selecdep.push([dadoslinhasdep[dado.id][0], dadoslinhasdep[dado.id][1], dadoslinhasdep[dado.id][2]]);
      $('#DepModal').modal('hide');
      apagartabeladep();
      
    }

    function selecionareditdep(dado){
      apagartabeladependentes();
      apagartabeladepedit();
      selecdep[linhaeditdep-1][0] = dadoslinhaseditdep[dado.id][0];
      selecdep[linhaeditdep-1][1] = dadoslinhaseditdep[dado.id][1];
      selecdep[linhaeditdep-1][2] = dadoslinhaseditdep[dado.id][2];
      dadoslinhaseditdep = [];
      for( var i  = 0; i < selecdep.length; i++){
        var tabela = document.getElementById('tabeladependentes');
        var numeroLinhas = tabela.rows.length;
        var linha = tabela.insertRow(numeroLinhas);
        var celula1 = linha.insertCell(0);
        var celula2 = linha.insertCell(1);   
        var celula3 = linha.insertCell(2); 
        var celula4 = linha.insertCell(3);
        celula1.innerHTML=selecdep[i][0];
        celula2.innerHTML=selecdep[i][1];
        celula3.innerHTML=selecdep[i][2];
        celula4.innerHTML="<input type='button' name='selecionareste' id='"+ numeroLinhas +"' value='Editar' onclick='editardep(this)'><input type='button' name='remover' id='"+numeroLinhas+"' value='Remover' onclick='deletarlinhadep(this)'>";
      }
      $('#DepEditModal').modal('hide');
    }

    function editartitu(){
      apagartabelatitu();
      $('#TitularModal').modal('show');
    }
    function editardep(linha){
      linhaeditdep = linha.id;
      $('#DepEditModal').modal('show');
    }

    function deletarlinhadep(linha){
      selecdep.splice(linha.id-1, 1);
      apagartabeladependentes();
      for( var i  = 0; i < selecdep.length; i++){
        var tabela = document.getElementById('tabeladependentes');
        var numeroLinhas = tabela.rows.length;
        var linha = tabela.insertRow(numeroLinhas);
        var celula1 = linha.insertCell(0);
        var celula2 = linha.insertCell(1);   
        var celula3 = linha.insertCell(2); 
        var celula4 = linha.insertCell(3);
        celula1.innerHTML=selecdep[i][0];
        celula2.innerHTML=selecdep[i][1];
        celula3.innerHTML=selecdep[i][2];
        celula4.innerHTML="<input type='button' name='selecionareste' id='"+ numeroLinhas +"' value='Editar' onclick='editardep(this)'><input type='button' name='remover' id='"+numeroLinhas+"' value='Remover' onclick='deletarlinhadep(this)'>";
      }
    }

    function checarmaxdep(){
      if(idplanoselec != 0){
        var tabela = document.getElementById('tabeladependentes');
        var numeroLinhas = tabela.rows.length - 1;
        if(numeroLinhas < qtddepplano){
          $('#DepModal').modal('show');
        }else{
          document.getElementById('alertamaximodep').innerHTML = "<b>O número máximo de dependentes já foi atingido.</b>";
        }
      }else{
        document.getElementById('alertamaximodep').innerHTML = "<b>Selecione um plano primeiro.</b>";
      }
      
    }

    function adicionaLinhaServico(idTabela) {
        contlinhas1++;
        linhas.push(contlinhas1);
        var tabela = document.getElementById(idTabela);
        var numeroLinhas = tabela.rows.length;
        var linha = tabela.insertRow(numeroLinhas);
        var celula1 = linha.insertCell(0);
        var celula2 = linha.insertCell(1);  
        celula1.innerHTML = "<select name='produtoservico"+contlinhas1+"' id='selectservico"+contlinhas1+"' onchange='calcularvalor()'><option value=''>Selecione um Dependente</option></select>"; 
        celula2.innerHTML =  "<button onclick='removeLinhaServico(this)' id='"+contlinhas1+"'>Remover</button>";
    }

    function editarcontrato(){
      $.ajax({
            type: "GET",
            url: "/editar/editarcontrato",
            data: {
                contratoatual: contratoatual,
                plano:idplanoselec,
                titu:selectitu[0],
                dep:selecdep,
                diapag:$("[name='diapag']").val(),
            },
            dataType: "json",
            success: function(data) {
                console.log('Contrato editado com sucesso');
                }
            });
    }
</script>