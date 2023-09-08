@extends('layouts.Menu')
@section('atalhoSuperior')@endsection
@section('menuLateral')@endsection

<!DOCTYPE html>
<html lang="en">
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

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <title>Empresa</title>
</head>
<body>
    @section('Conteudo')
    <div class="container-fluid" style='margin-top:1rem;'>
            <div class='input destaquegrupos' id='destaquegrupos'>
                <div class='input nomesblocos titulogrupos' id='nomesblocos'>
                    <span>Informações Pessoais</span>
                </div>
                <div class="row gx-3 gy-3 distanciainterna">
                    <div class="col-sm-5 col-md-5 col-lg-4 input" id='nome'>
                        <div class="cor01">
                            <label for="exampleInputEmail1" class="form-label">Nome<span style="color: red;">*</span></label>
                            <input
                            type="text"
                            class="form-control"
                            aria-describedby="emailHelp"
                            name='nome'/>
                        </div>
                    </div>
                    <div class="col-sm-3 col-md-2 col-lg-2">

                        <div class="input cor01" id='cnpj'>
                            <label for="exampleInputEmail1" class="form-label">CNPJ<span style="color: red;">*</span></label>
                            <input
                            type="text"
                            class="form-control"
                            aria-describedby="emailHelp"
                            name='cnpj' 
                            data-inputmask="'mask': '99.999.999/9999-99'"/>
                        </div>
                    </div>
                    <div class="col-sm-5 col-md-4 col-lg-4 input" id='email'>
                        <div class="cor01">
                            <label for="exampleInputEmail1" class="form-label">Email</label>
                            <input
                            type="text"
                            class="form-control"
                            aria-describedby="emailHelp"
                            name='email'/>
                        </div>
                    </div>

                <div class="row gx-3 gy-3 distanciainterna">
                    <div class="col-sm-3 col-md-2 col-lg-2 input" id='contato1'>
                        <div class="cor03">
                            <label for="exampleInputEmail1" class="form-label"
                            >Contato 1<span style="color: red;">*</span></label
                            >
                            <input
                            type="text"
                            class="form-control"
                            aria-describedby="emailHelp"
                            name='contato1' 
                            id='contato1input'  
                            onkeypress='contato1()'
                            />
                        </div>
                    </div>
                    <div class="col-sm-3 col-md-2 col-lg-2 input" id='contato2'>
                        <div class="cor03">
                            <label for="exampleInputEmail1" class="form-label">Contato 2 </label>
                            <input
                            type="text"
                            class="form-control"
                            aria-describedby="emailHelp"
                            name='contato2' 
                            id='contato2input'  
                            onkeypress='contato2()'/>
                        </div>
                    </div>
                </div>
                <div class='input destaquegrupos' id='destaquegrupos2'>
                <div class='input nomesblocos2 titulogrupos' id='nomesblocos2'>
                    <span>Endereço</span>
                </div>
                <div class="row gx-3 gy-3 distanciainterna">
                    <div class="col-sm-2 col-md-2 col-lg-2 input" id='cep'>
                        <div class="cor04">
                            <label for="exampleInputEmail1" class="form-label">CEP</label>
                            <input
                            type="text"
                            class="form-control"
                            aria-describedby="emailHelp"
                            name='cep' 
                            id='cepinput' 
                            onfocusout="pesquisacep(this.value);" 
                            data-inputmask="'mask': '99999-999'"/>
                        </div>
                    </div>
                    <div class="col-sm-2 col-md-2 col-lg-2 input" id='uf'>
                        <div class="cor04">
                            <label for="exampleInputEmail1" class="form-label">UF<span style="color: red;">*</span></label>
                            <select class="form-select selectcategoria" name="uf" id='ufinput'>
                                <option value='AC'>AC</option>
                                <option value='AL'>AL</option>
                                <option value='AP'>AP</option>
                                <option value='AM'>AM</option>
                                <option value='BA'>BA</option>
                                <option value='CE'>CE</option>
                                <option value='DF'>DF</option>
                                <option value='ES'>ES</option>
                                <option value='GO'>GO</option>
                                <option value='MA'>MA</option>
                                <option value='MT'>MT</option>
                                <option value='MS'>MS</option>
                                <option value='MG'>MG</option>
                                <option value='PA'>PA</option>
                                <option value='PB'>PB</option>
                                <option value='PR'>PR</option>
                                <option value='PE'>PE</option>
                                <option value='PI'>PI</option>
                                <option value='RJ'>RJ</option>
                                <option value='RN'>RN</option>
                                <option value='RS'>RS</option>
                                <option value='RO'>RO</option>
                                <option value='RR'>RR</option>
                                <option value='SC'>SC</option>
                                <option value='SP'>SP</option>
                                <option value='SE'>SE</option>
                                <option value='TO'>TO</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="col-sm-3 col-md-2 col-lg-2 input" id='cidade'>
                        <div class="cor04">
                            <label for="exampleInputEmail1" class="form-label">Cidade</label>
                            <input
                            type="text"
                            class="form-control"
                            aria-describedby="emailHelp"
                            name='cidade' 
                            id='cidadeinput'/>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-3 col-lg-4 input" id='logradouro'>
                        <div class="cor04">
                            <label for="exampleInputEmail1" class="form-label"
                            >Logradouro</label
                            >
                            <input
                            type="text"
                            class="form-control"
                            aria-describedby="emailHelp"
                            name='logradouro' 
                            id='logradouroinput'/>
                        </div>
                    </div>
                        <div class="col-sm-2 col-md-2 col-lg-2 input" id='num'>
                        <div class="cor04" >
                            <label for="exampleInputEmail1" class="form-label">Número</label>
                            <input
                            type="text"
                            class="form-control"
                            aria-describedby="emailHelp"
                            name='num' />
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-3 col-lg-3 input" id='bairro'>
                        <div class="cor04" >
                            <label for="exampleInputEmail1" class="form-label">Bairro</label>
                            <input
                            type="text"
                            class="form-control"
                            aria-describedby="emailHelp"
                            name='bairro' 
                            id='bairroinput'/>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-3 col-lg-4 input" id='complemento'>
                        <div class="cor04">
                            <label for="exampleInputEmail1" class="form-label"
                            >Complemento</label
                            >
                            <input
                            type="text"
                            class="form-control"
                            aria-describedby="emailHelp"
                            name='complemento'/>
                        </div>
                    </div>
                </div>                          
            </div>

                    <div class="col-sm-5 col-md-4 col-lg-4 input" id='nomeres'>
                        <div class="cor01">
                            <label for="exampleInputEmail1" class="form-label">Nome do Responsável</label>
                            <input
                            type="text"
                            class="form-control"
                            aria-describedby="emailHelp"
                            name='nomeres'/>
                        </div>
                    </div>

                    <div class="col-sm-5 col-md-4 col-lg-4 input" id='emailres'>
                        <div class="cor01">
                            <label for="exampleInputEmail1" class="form-label">Email do Contato</label>
                            <input
                            type="text"
                            class="form-control"
                            aria-describedby="emailHelp"
                            name='emailres'/>
                        </div>
                    </div>

                    <div class="col-sm-3 col-md-3 col-lg-2 input" id='contatores'>
                        <div class="cor01">
                            <label for="exampleInputEmail1" class="form-label">Tel. do Responsável</label>
                            <input
                            type="text"
                            class="form-control"
                            aria-describedby="emailHelp"
                            name='contatores' 
                            id='contatoresinput' 
                            onkeypress='contatores()'/>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="input col-sm-4 col-md-3 col-lg-2"  id='editar'>
            <button type="submit" class="btn btn-success" name='editardadosempresa' value='Salvar Dados' id='editardadosempresa' onclick='atualizarEmpresa()'>
            <span class="fontebotao">Salvar Dados</span>
            </button>
        </div>

<div class="modal fade" id="atualizarempresaModal" tabindex="-1" aria-labelledby="atualizarempresaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="atualizarempresaModalLabel">Atualização realizada com sucesso!</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            Atualização de dados da empresa realizada com sucesso!
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
          <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
        </div>
      </div>
    </div>
  </div>
</body>
<script>

    buscardadosempresa();

    function buscardadosempresa(){
        $.ajax({
            type: 'GET',
            url: '/buscardadosempresa',
            data: {},
            dataType: "json",
            success: function(data) {
                console.log(data);
                document.querySelector("[name='nome']").value = data[0]['empresa_nome'];
                document.querySelector("[name='cnpj']").value = data[0]['empresa_cnpj'];
                document.querySelector("[name='logradouro']").value = data[0]['empresa_logradouro'];
                document.querySelector("[name='num']").value = data[0]['empresa_num'];
                document.querySelector("[name='complemento']").value = data[0]['empresa_complemento'];
                document.querySelector("[name='bairro']").value = data[0]['empresa_bairro'];
                document.querySelector("[name='cidade']").value = data[0]['empresa_cidade'];
                document.querySelector("[name='uf']").value = data[0]['empresa_uf'];
                document.querySelector("[name='contato1']").value = data[0]['empresa_contato1'];
                if (data[0]['empresa_contato2'] != null) {
                document.querySelector("[name='contato2']").value = data[0]['empresa_contato2'];
                }
                document.querySelector("[name='email']").value = data[0]['empresa_email'];
                document.querySelector("[name='nomeres']").value = data[0]['empresa_nomeres'];
                document.querySelector("[name='emailres']").value = data[0]['empresa_emailres'];
                document.querySelector("[name='contatores']").value = data[0]['empresa_telres'];
            }
        });
    }
    

    $('#contato1input').inputmask('(99) 9999[9]-9999');
    $('#contato2input').inputmask('(99) 9999[9]-9999');
    $('#contatoresinput').inputmask('(99) 9999[9]-9999');

    function contato1(){
        if(document.getElementById('contato1input').value[5] != '9'){
            $('#contato1input').inputmask('(99) 9999-9999');
        }else{
            $('#contato1input').inputmask('(99) 9999[9]-9999');
        }
    }
    function contato2(){
        if(document.getElementById('contato2input').value[5] != '9'){
            $('#contato2input').inputmask('(99) 9999-9999');
        }else{
            $('#contato2input').inputmask('(99) 9999[9]-9999');
        }
    }
    function telres(){
        if(document.getElementById('telresinput').value[5] != '9'){
            $('#telresinput').inputmask('(99) 9999-9999');
        }else{
            $('#telresinput').inputmask('(99) 9999[9]-9999');
        }
    }
    function contatores(){
        if(document.getElementById('contatoresinput').value[5] != '9'){
            $('#contatoresinput').inputmask('(99) 9999-9999');
        }else{
            $('#contatoresinput').inputmask('(99) 9999[9]-9999');
        }
    }
    function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('logradouroinput').value=("");
            document.getElementById('bairroinput').value=("");
            document.getElementById('cidadeinput').value=("");
            document.getElementById('ufinput').value=("");
    }
    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('logradouroinput').value=(conteudo.logradouro);
            document.getElementById('bairroinput').value=(conteudo.bairro);
            document.getElementById('cidadeinput').value=(conteudo.localidade);
            document.getElementById('ufinput').value=(conteudo.uf);
        } //end if.
        else {
            //CEP não Encontrado.
            limpa_formulário_cep();
            alert("CEP não encontrado.");
        }
    }
        
    function pesquisacep(valor) {
            //Nova variável "cep" somente com dígitos.
            var cep = valor.replace(/\D/g, '');
            //Verifica se campo cep possui valor informado.
            if (cep != "") {
                //Expressão regular para validar o CEP.
                var validacep = /^[0-9]{8}$/;
                //Valida o formato do CEP.
                if(validacep.test(cep)) {
                    //Preenche os campos com "..." enquanto consulta webservice.
                    document.getElementById('logradouro').value="...";
                    document.getElementById('bairro').value="...";
                    document.getElementById('cidade').value="...";
                    document.getElementById('uf').value="...";
                    //Cria um elemento javascript.
                    var script = document.createElement('script');
                    //Sincroniza com o callback.
                    script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';
                    //Insere script no documento e carrega o conteúdo.
                    document.body.appendChild(script);
                } //end if.
                else {
                    //cep é inválido.
                    limpa_formulário_cep();
                    alert("Formato de CEP inválido.");
                }
            } //end if.
            else {
                //cep sem valor, limpa formulário.
                limpa_formulário_cep();
            }
        
    };

    function atualizarEmpresa(){
        $.ajax({
        type: "GET",
        url: "/atualizarempresa",
        data: {
          nome: $("[name='nome']").val(),
          cnpj: $("[name='cnpj']").val(),
          email: $("[name='email']").val(),
          cep: $("[name='cep']").val(),
          logradouro: $("[name='logradouro']").val(),
          num: $("[name='num']").val(),
          complemento: $("[name='complemento']").val(),
          bairro: $("[name='bairro']").val(),
          cidade: $("[name='cidade']").val(),
          uf: $("[name='uf']").val(),
          contato1: $("[name='contato1']").val(),
          contato2: $("[name='contato2']").val(),
          nomeres: $("[name='nomeres']").val(),
          emailres: $("[name='emailres']").val(),
          telres: $("[name='contatores']").val(),

        },
        dataType: "json",
        success: function(data) {
          $('#atualizarempresaModal').modal('show');
        }
      });
    }
</script>
@endsection
</html>
