<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<link rel="stylesheet" href="{{asset('../css/menu.css')}}">
<script src="{{ asset('../shortcuts.js') }}"></script>

<style>
    @import url("https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300;400;600;700&display=swap");

    .sino {
        width: max-content;
        margin: 6px 35px 2px 0px;
        text-align: center;
        /* padding: 30px; */
        transition-duration: .3s;
        -moz-transition-duration: .3s;
        -webkit-transition-duration: .3s;
        cursor: pointer;
    }

    .sino:hover {
        animation: shake .25s linear;
        animation-iteration-count: 2;
    }
</style>

<div class="navAtalhos">
    @yield('atalhoSuperior')
    <nav id="atalhos" class="atalhos">
        <span onclick="abrirMenu()"><i class="abrirMenu far fa-bars"></i></span>
        <span style="margin-right:1.5rem;display: flex;align-items: center;font-size: 19px;font-family: 'Source Sans Pro';">
            <b style='color:white'>Olá, {{Auth::user()->name}}</b>
        </span>
        <!--
            <a href="#">Atalho 1</a>
            <a href="#">Atalho 2</a>
            <a href="#">Atalho 3</a>
            <a href="#">Atalho 4</a>
            <a href="#">Atalho 5</a>
            <a href="#">Atalho 6</a>
        -->
        
        <!-- <div class="radius transition sino" onmouseenter="shake(this)"  onClick="mostrar()">
            <img src="{{asset('imagens/sinonotificacao.svg')}}" alt="" style='width: 25px;'>
        </div> -->
    </nav>

    <a style='background-color: #a0a4ff;display:none;right: 0px;width: 20rem;overflow-y: auto;
            height: 21rem;margin-right: 2rem;z-index: 10;position: absolute;border-radius:12px' 
    id='exibirnotificacoes'>
        oi
    </a>
</div>

<script>
    // shortcut.add("F1",function(e) {
    //     window.location.href='../cadastro/agenda';
    // });

    function mostrar() {
      if (document.getElementById("exibirnotificacoes").style.display == 'inline-block') {
        document.getElementById("exibirnotificacoes").style.display = 'none';
      } else {
        document.getElementById("exibirnotificacoes").style.display = 'inline-block'; 
      }        
    }
    

    //EFEITO SHAKE
    function shake(el) {
        var ang = -25;
        var prefix = (function () {
            var styles = window.getComputedStyle(document.documentElement, ''),
            pre = (Array.prototype.slice.call(styles).join('').match(/-(moz|webkit|ms)-/) || (styles.OLink === '' && ['', 'o']))[1];
            if (pre == 'moz')
            return '';
            return '-' + pre + '-';
        })();
        var qtd = 0;
        var shakeInterval = setInterval(function () {
            ang = -ang;
            el.style[prefix + 'transform'] = 'rotate(' + ang + 'deg)';
            qtd++;
            if (qtd > 5) {
                el.style[prefix + 'transform'] = 'rotate(0deg)';
                clearInterval(shakeInterval);
            }
        }, 100);
    }

    shortcut.add("F2",function(e) {
        window.location.href='../cadastro/pessoa';
    });

    shortcut.add("F3",function(e) {
        e.preventDefault();
        window.location.href='../consulta/contrato';
    });

    shortcut.add("F4",function(e) {
        e.preventDefault();
        window.location.href='../cadastro/agenda';
    });

    shortcut.add("F6",function(e) {
        window.location.href='../consulta/pessoa';
    });

    shortcut.add("F7",function(e) {
        e.preventDefault();
        window.location.href='../consulta/plano';
    });

 var permissoes = '';
    if({{Auth::user()->user_tipo}} != 2){
        $.ajax({
        type: "GET",
        url: "/buscarpermissoes",
        data: {userid: {{Auth::user()->user_tipo}}},
        dataType: "json",
        success: function(data) {
            // console.log(data);
            permissoes = data.split(',');
            document.getElementById('homecolaborador').style.display='none';
            document.getElementById('homemedico').style.display='none';
            document.getElementById('agenda').style.display='none';
            document.getElementById('cadastros').style.display='none';
            document.getElementById('cadastropessoa').style.display='none';
            document.getElementById('cadastromedico').style.display='none';
            document.getElementById('cadastrolaboratorio').style.display='none';
            document.getElementById('cadastroplano').style.display='none';
            document.getElementById('cadastroproduto').style.display='none';
            document.getElementById('cadastrocontrato').style.display='none';
            document.getElementById('consultas').style.display='none';
            document.getElementById('consultapessoa').style.display='none';
            document.getElementById('consultamedico').style.display='none';
            document.getElementById('consultalaboratorio').style.display='none';
            document.getElementById('consultaplano').style.display='none';
            document.getElementById('consultaproduto').style.display='none';
            document.getElementById('consultacontrato').style.display='none';
            document.getElementById('medico').style.display='none';
            document.getElementById('financeiro').style.display='none';
            document.getElementById('Caixa').style.display='none';
            document.getElementById('aniversariantes').style.display='none';
            document.getElementById('grupos').style.display='none';
            document.getElementById('painel').style.display='none';
            document.getElementById('relatorios').style.display='none';
            document.getElementById('configuracoes').style.display='none';
            // document.getElementById('cobranca').style.display='none';
            document.getElementById('indices').style.display='none';
            for(var i = 0; i < permissoes.length; i++){
                if(permissoes[i] == '1'){
                    document.getElementById('cadastros').style.display='block';
                    document.getElementById('cadastropessoa').style.display='block';
                }
                if(permissoes[i] == '1.1'){
                    document.getElementById('consultas').style.display='block';
                    document.getElementById('consultapessoa').style.display='block';
                }
                if(permissoes[i] == '2'){
                    document.getElementById('cadastros').style.display='block';
                    document.getElementById('cadastromedico').style.display='block';
                }
                if(permissoes[i] == '2.1'){
                    document.getElementById('consultas').style.display='block';
                    document.getElementById('consultamedico').style.display='block';
                }
                if(permissoes[i] == '3'){
                    document.getElementById('cadastros').style.display='block';
                    document.getElementById('cadastrolaboratorio').style.display='block';
                }
                if(permissoes[i] == '3.1'){
                    document.getElementById('consultas').style.display='block';
                    document.getElementById('consultalaboratorio').style.display='block';
                }
                if(permissoes[i] == '4'){
                    document.getElementById('cadastros').style.display='block';
                    document.getElementById('cadastroplano').style.display='block';
                }
                if(permissoes[i] == '4.1'){
                    document.getElementById('consultas').style.display='block';
                    document.getElementById('consultaplano').style.display='block';
                }
                if(permissoes[i] == '5'){
                    document.getElementById('cadastros').style.display='block';
                    document.getElementById('cadastrocontrato').style.display='block';
                }
                if(permissoes[i] == '5.1'){
                    document.getElementById('consultas').style.display='block';
                    document.getElementById('consultacontrato').style.display='block';
                }
                if(permissoes[i] == '6'){
                    document.getElementById('cadastros').style.display='block';
                    document.getElementById('cadastroproduto').style.display='block';
                }
                if(permissoes[i] == '6.1'){
                    document.getElementById('consultas').style.display='block';
                    document.getElementById('consultaproduto').style.display='block';
                }
                if(permissoes[i] == '7'){
                    document.getElementById('cadastros').style.display='block';
                }
                if(permissoes[i] == '7.1'){
                    document.getElementById('consultas').style.display='block';
                }
                if(permissoes[i] == '8'){
                    document.getElementById('cadastros').style.display='block';
                }
                if(permissoes[i] == '8.1'){
                    document.getElementById('consultas').style.display='block';
                }
                if(permissoes[i] == '9'){
                    document.getElementById('homecolaborador').style.display='block';
                }
                if(permissoes[i] == '10'){
                    document.getElementById('homemedico').style.display='block';
                }
                if(permissoes[i] == '11'){
                    document.getElementById('agenda').style.display='block';
                }
                if(permissoes[i] == '12'){
                    document.getElementById('Caixa').style.display='block';
                }
                if(permissoes[i] == '13'){
                    document.getElementById('medico').style.display='block';
                }
                if(permissoes[i] == '14'){
                    document.getElementById('financeiro').style.display='block';
                }
                if(permissoes[i] == '15'){
                    document.getElementById('aniversariantes').style.display='block';
                }
                if(permissoes[i] == '16'){
                    document.getElementById('grupos').style.display='block';
                }
                if(permissoes[i] == '17'){
                    document.getElementById('painel').style.display='block';
                }
                // if(permissoes[i] == '18'){
                //     document.getElementById('cobranca').style.display='block';
                // }
                // if(permissoes[i] == '19'){
                //     document.getElementById('indice').style.display='block';
                // }
            }
        }
    });
    }
    
</script>

<div class="navMenu">
    @yield('menuLateral')
    <nav id="menuLateral" class="menuLateral scrollcss">
        <span  onclick="fecharMenu()"><i class="btnFechar far fa-bars"></i></span>
        <!-- <section id="search" class="ContPesquisa">
            <div class='lupa'><input type="text" id="pesquisa" onkeyup="pesquisar()" placeholder="Pesquisar opção" title="Digite uma opção de menu"></div>
        </section> -->
        <ul id="menuPesquisa">
            <li id='homecolaborador'><a href="{{ url('home/colaborador') }}"><img src="../imagens/home2.svg" alt=""><span class='dist1'>Colaborador</span></a></li>
            <li id='homemedico'><a href="{{ url('home/medico') }}"><img src="../imagens/home2.svg" alt=""><span class='dist1'>Médico</span></a></li>
            <li id='agenda'><a href="{{ url('cadastro/agenda') }}"><img src="../imagens/agenda2.svg" alt=""><span class='dist1'>Agenda</span></a></li>
            <li id='aniversariantes'><a href="{{ url('aniversariantes') }}"><img src="../imagens/aniversariantes.svg" alt=""><span class='dist1'>Aniversários</span></a></li>
            <li id='cadastros'>
                <div class="item">
                <input type="checkbox" id="check1">
                <label for="check1"><img src="../imagens/cadastros2.svg" alt=""><span class='dist'>Cadastros</span><i class="setaItem fas fa-chevron-down"></i></label>
                <ul>
                    <li id='cadastrolaboratorio'><a href="{{ url('cadastro/laboratorio') }}">Consultório</a></li>
                    <li id='cadastrocontrato'><a href="{{ url('cadastro/contrato') }}">Contrato</a></li>
                    <li id='cadastromedico'><a href="{{ url('cadastro/medico') }}">Médico</a></li>
                    <li id='cadastropessoa'><a href="{{ url('cadastro/pessoa') }}">Pessoa</a></li>
                    <li id='cadastroplano'><a href="{{ url('cadastro/plano') }}">Plano</a></li>
                    <li id='cadastroproduto'><a href="{{ url('cadastro/produto') }}">Produto</a></li>
                    
                </ul>
                </div>
            </li>
            <li id='consultas'>
                <div class="item">
                <input type="checkbox" id="check2">
                <label for="check2"><img src="../imagens/consultas.svg" alt=""><span class='dist'>Pesquisa</span><i class="setaItem fas fa-chevron-down"></i></label>
                <ul>
                    <li id='consultalaboratorio'><a href="{{ url('consulta/laboratorio') }}">Consultório</a></li>
                    <li id='consultacontrato'><a href="{{ url('consulta/contrato') }}">Contrato</a></li>
                    <li id='consultamedico'><a href="{{ url('consulta/medico') }}">Médico</a></li>
                    <li id='consultapessoa'><a href="{{ url('consulta/pessoa') }}">Pessoa</a></li>
                    <li id='consultaplano'><a href="{{ url('consulta/plano') }}">Plano</a></li>
                    <li id='consultaproduto'><a href="{{ url('consulta/produto') }}">Produto</a></li>
                    
                </ul>
                </div>
            </li>
            <li id='medico'>
                <div class="item">
                <input type="checkbox" id="check3">
                <label for="check3"><img src="../imagens/exames2.svg" alt=""><span class='dist'>Exames</span><i class="setaItem fas fa-chevron-down"></i></label>
                <ul>
                    <li><a href="{{ url('/atestadocomparecimento') }}">Atestado Comparecimento</a></li>
                    <li><a href="{{ url('/atestadomedico') }}">Atestado Médico</a></li>
                    <li><a href="{{ url('/solicitacaoexame') }}">Exame</a></li>
                    <li><a href="{{ url('/solicitacaoraiox') }}">Raio X</a></li>
                    <li><a href="{{ url('/receitcontespec') }}">Receita Controle Especial</a></li>
                    <li><a href="{{ url('/receitamedica') }}">Receita Médica</a></li>
                    <li><a href="{{ url('/solicitacaoultrassom') }}">Ultrassom</a></li>
                </ul>
                </div>
            </li>

            <li id='Caixa'>
                <div class="item">
                <input type="checkbox" id="check5">
                <label for="check5"><img src="../imagens/caixa.svg" alt=""><span class='dist'>Caixa</span><i class="setaItem fas fa-chevron-down"></i></label>
                <ul>
                    <li><a href="{{ url('/fluxodecaixa') }}">Entradas e Saídas</a></li>
                    <li><a href="{{ url('/pdv') }}">PDV</a></li>
                </ul>
                </div>
            </li>

            <li id='financeiro'>
                <div class="item">
                <input type="checkbox" id="check6">
                <label for="check6"><img src="../imagens/financeiro2.svg" alt=""><span class='dist'>Financeiro</span><i class="setaItem fas fa-chevron-down"></i></label>
                <ul>
                    <li><a href="{{ url('/cobranca') }}">Cobrança</a></li>
                    <li><a href="{{ url('/financeiro/fluxodecaixa') }}">Fluxo de Caixa</a></li>
                    <li><a href="{{ url('/inadimplencia') }}">Inadimplentes</a></li>
                    <li><a href="{{ url('/financeiro/planodecontas') }}">Plano de Contas</a></li>
                    <li><a href="{{ url('/financeiro/reajuste') }}">Reajuste</a></li>
                </ul>
                </div>
            </li>

            <li id='relatorios'>
                <div class="item">
                <input type="checkbox" id="check7">
                <label for="check7"><img src="../imagens/financeiro2.svg" alt=""><span class='dist'>Relatorios</span><i class="setaItem fas fa-chevron-down"></i></label>
                <ul>
                    <li id='adimplenciainadimplencia'><a href="{{ url('/relatorio/adimplentesinadimplentes') }}">Adimplendia e Inadimplencia</a></li>
                    <li id='atendimentos'><a href="{{ url('/relatorio/atendimentos') }}">Atendimentos</a></li>
                    <li id='planos'><a href="{{ url('/relatorio/planos') }}">Planos</a></li>
                    <li id='despesasereceitas'><a href="{{ url('/relatorio/despesasereceitas') }}">Despesas e Receitas</a></li>
                </ul>
                </div>
            </li>

            <li id='configuracoes'>
                <div class="item">
                <input type="checkbox" id="check8">
                <label for="check8"><img src="../imagens/financeiro2.svg" alt=""><span class='dist'>Configurações</span><i class="setaItem fas fa-chevron-down"></i></label>
                <ul>
                    <li id='empresa'><a href="{{ url('/empresa') }}">Empresa</a></li>
                </ul>
                </div>
            </li>

            
            {{-- <li id='cobranca'><a href="/cobranca"><img src="../imagens/pdvmenu.svg" alt=""><span class='dist1'>Cobrança</span></a></li> --}}
            <li id='grupos'><a href="/grupos"><img src="../imagens/grupos.svg" alt=""><span class='dist1'>Grupos</span></a></li>
            <li id='painel'><a href="/painelatendimento"><img src="../imagens/painel2.svg" alt="" ><span class='dist1'>Painel</span></a></li>
            <li id='indices'><a href="/indices"><img src="../imagens/painel2.svg" alt="" ><span class='dist1'>Índices</span></a></li>
            <li><a href="/logout"><img src="../imagens/sair2.svg" alt="" ><span class='dist1'>Sair</span></a></li>
        </ul>
    </nav>
</div>

<div id="principal">
    @yield('Conteudo')
</div>

<script>
    // if('{{Route::getCurrentRoute()->getName()}}' == 'homecolaborador' || '{{Route::getCurrentRoute()->getName()}}' == 'homemedico'){
    //     document.getElementById('menuLateral').style.width="0px";
    //     document.getElementById('principal').style.marginLeft="0px";
    // }else{
    //     document.getElementById('menuLateral').style.width="250px";
    //     document.getElementById('principal').style.marginLeft="250px";
    // }
function abrirMenu() {
    document.getElementById('menuLateral').style.width="250px";
    document.getElementById('principal').style.marginLeft="250px";
}

function fecharMenu() {
    document.getElementById('menuLateral').style.width="0";
    document.getElementById('principal').style.marginLeft="0";
}

function pesquisar() {
    var input,filtro,menu,menuItens,links;
    input = document.getElementById("pesquisa");
    filtro = input.value.toUpperCase();
    menu = document.getElementById("menuPesquisa");
    menuItens = menu.getElementsByTagName("li");
    for(var i=0; i<menuItens.length;i++){
        links = menuItens[i].getElementsByTagName("a")[0];
        if(links.innerHTML.toUpperCase().indexOf(filtro)>-1){
            menuItens[i].style.display="";
        }else{
            menuItens[i].style.display="none";
        }
    }
}
</script>
