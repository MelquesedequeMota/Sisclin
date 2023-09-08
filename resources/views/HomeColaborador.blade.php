@extends('layouts.Menu')
@section('atalhoSuperior')@endsection
@section('menuLateral')@endsection

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!-- required meta tags -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- css da página -->
    <link rel="stylesheet" href="{{asset('../css/cssgeral.css')}}">
    <link rel="stylesheet" href="{{asset('../css/consultas.css')}}">
    <link rel="stylesheet" href="{{ asset('../css/HomeColab.css') }}">

    <!-- bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- icons -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    
    <!-- js -->
    <script src="{{asset('jquery.min.js')}}"></script>
    <script src="{{ asset('../shortcuts.js') }}"></script>
    
    <!-- bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
 
    <!-- pignose calendar -->
    <link rel="stylesheet" href="{{asset('pg-calendar-master/dist/css/pignose.calendar.min.css')}}">
    <script src="{{asset('pg-calendar-master/dist/js/pignose.calendar.full.min.js')}}"></script>

    <title>Tela Colaborador</title>

    <style>
        .abrirAgenda{
            margin-top: 0rem; 
            font-size: 24px;
        }

        .accordion-body {
            display:flex;
            align-items:center;
            justify-content:space-between;
            padding: 1rem 1rem!important;
        }

        .acoesaccordion{
            cursor:pointer;
        }

        .textoaccordion{
            width: 80%;
        }

        .headdatable{
            padding:1rem!important;
        }

        .inputdatable{
            background: rgb(129 129 134 / 30%);
            border: none;
            padding: 0.34rem 0.75rem;
            border-radius: 5px;
            /* width: 17rem; */
            width: 100%;
            max-width: 100%;
            text-align:center;
        }

        .inputdatable::placeholder{
            color:black!important;
        }

        .corchamado{
            border-radius: 50%;
            background: #d01e1e;
            width: 0.9rem;
            height: 0.9rem;
        }

        .corchamado2{
            border-radius: 50%;
            background: #138787;
            width: 0.9rem;
            height: 0.9rem;
        }

        .btn{
            background-color: #d1941a;
        }

        .avisosaccordion{
            display:flex;
            flex-direction:row;
            justify-content:space-between;
            width:92%;
        }

        .accordion-item {
            border: none!important;
            border-bottom: 1px solid rgba(0,0,0,.125)!important;
        }

        .btnovoaviso {
            /* padding: 0rem 0.3rem !important; */
            padding: 0.1rem 0.4rem!important;
        }

        .fontebotao{
            font-size: 14px!important;
        }

        .accordion-button::after {
            background-image: url(../imagens/seta.svg)!important;
            background-size: 0.7rem!important;
            height: 0.6rem!important;
        }

        .btdelete2{
            border: 1.5px solid #af1221;
            background-color:none!important;
            color:#af1221;
        }

        .btadicionar2{
            border: 1.5px solid #0e6969;
            background-color:none!important;
            color:#0e6969;
        }

        .fontebotao2{
            font-family: 'Source Sans Pro', sans-serif;
            font-style: normal;
            /* font-weight: 600; */
            font-size: 17px;
            line-height: 20px;
            letter-spacing: 0.5px;
            border: none;
        }

        .accordion-button:not(.collapsed) {
            color: black!important;
            background-color: transparent!important;
            box-shadow: transparent!important;
        }

        .accordion-body {
            background: #efefef;
        }

        .accordion-button:focus {
            border-color: transparent!important;
            box-shadow: 0 0 0 0!important;
        }

        .circleshortcuts{
            width: 2.3rem;
            height: 2.3rem;
            border-radius: 50%;
            padding: 0.3rem 0.6rem;
        }

        .iconsatalhos{
            margin-top:1rem;
            display: flex;
            align-items: center;
        }

        .textosatalhos{
            margin-left:1rem;
            font-size: 15px;
        }

        .widthimages{
            width: 1.2rem;
        }

        @media (max-width: 600px) {
            .transformdiv{
                display:flex;
                flex-direction:column;
            }

            .tabAvisos,.accordions,.ContainerHomeAtalhos,.menuLateral{
                width:100%;
            }

            #tabela, .tabAvisos{
                margin-left:0rem;
            }   

            .ContainerHomeAtalhos{
                display:none;
            }

            .btnOpenAgen {
                width: 50px;
                height: 50px;
            }

            .ContAgenda{
                width: 100%;
            }

            .tabEventos,.pignose-calendar {
                max-width: 88% !important;
            }

            .pignose-calendar {
                max-width: 95% !important;
            }

            .menuLateral{
                z-index: 110!important;
            }

            .abrirAgenda{
               margin-top: 0.3rem; 
               font-size: 27px;
            }
        }

    </style>
</head>

<body>
    <script> var idcolaborador = "{{Auth::user()->id}}";</script>
    @section('Conteudo')
   
    <div class="btnAbriAgenda">
        <span class="btnOpenAgen" onclick="abrirAgenda()"><i class="abrirAgenda fal fa-bell" style='display: flex;justify-content: center;'></i></span>   
    </div> 

    <div id="agendaContainer" class="ContAgenda scrollcss">
        <div class="btnsAgenda">
            <span class="btnClosAgen" onclick="fecharAgenda()"><i class="fecharAgenda fal fa-arrow-right"></i></span>
            <span class="AgendaTitulo">Agenda</span>
        </div>

        <div class="calendar"></div>

        <div id='eventos' class="tabEventos"></div>
    </div>

    <div class='transformdiv'>
        <div class="tabAvisos scrollcss">
            <div class="hAvisos">
                <label class="LabelTitu">
                    <div class='coluna' style='margin-left:0.5rem'> 
                        <div style='display:flex;margin-bottom:0.3rem'>
                            <div>
                                <span class="aviTitu">Avisos</span>
                            </div> 
                            <div style='margin-top:0.4rem;margin-left:1rem'>
                                @if(Auth::user()->user_tipo == 2)
                                    <!-- <input type='button' name='novoaviso' id='novoaviso' value='Novo Aviso' onclick='novoaviso()'> -->

                                    <button type='submit' class='btn btadicionar btnovoaviso' value='Novo Aviso' onclick='novoaviso()' name='novoaviso' id='novoaviso'><span class='fontebotao'>Novo Aviso</span></button>
                                @endif
                            </div> 
                        </div>
                        <div>
                            <span class="aviSubTitu">Novidades ou mudanças na empresa</span>
                        </div> 
                    </div>
                </label>
                <!-- <span id="mostraAviso" class="mostraAviso" data-toggle="modal" data-target="#avisosModal">Ver todos</span> -->
            </div>
            <div class="accordions scrollcss" id='avisosdiv'>
               
            </div>
        </div>


        <div class="ContainerHomeAtalhos">
            <span class="TituloAtalhos">Atalhos do Sistema</span>
            <div class="HomeAtaBody">
                <div style='display:flex;flex-direction:row;justify-content: space-around;'>
                    <div style='display:flex;flex-direction:column'>
                        <div class="iconsatalhos">
                            <div class='circleshortcuts' style='background-color: #f7cfd6;'>
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M17.2929 2H14.5C14.2239 2 14 1.77614 14 1.5C14 1.22386 14.2239 1 14.5 1H18.5C18.7761 1 19 1.22386 19 1.5V5.5C19 5.77614 18.7761 6 18.5 6C18.2239 6 18 5.77614 18 5.5V2.70711L12.8536 7.85355C12.6583 8.04882 12.3417 8.04882 12.1464 7.85355C11.9512 7.65829 11.9512 7.34171 12.1464 7.14645L17.2929 2ZM18 9.5C18 9.22386 18.2239 9 18.5 9C18.7761 9 19 9.22386 19 9.5V16.5C19 17.8807 17.8807 19 16.5 19H3.5C2.11929 19 1 17.8807 1 16.5V3.5C1 2.11929 2.11929 1 3.5 1H10.5C10.7761 1 11 1.22386 11 1.5C11 1.77614 10.7761 2 10.5 2H3.5C2.67157 2 2 2.67157 2 3.5V16.5C2 17.3284 2.67157 18 3.5 18H16.5C17.3284 18 18 17.3284 18 16.5V9.5Z" fill="#C3868F" stroke="#C3868F" stroke-width="0.6"/>
                                </svg>
                            </div>
                            <div class='textosatalhos'>F1 - Orçamentos</div>
                        </div>
                        <div class="iconsatalhos">
                            <div class='circleshortcuts' style='background-color: #c3def3;'>
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M17.2929 2H14.5C14.2239 2 14 1.77614 14 1.5C14 1.22386 14.2239 1 14.5 1H18.5C18.7761 1 19 1.22386 19 1.5V5.5C19 5.77614 18.7761 6 18.5 6C18.2239 6 18 5.77614 18 5.5V2.70711L12.8536 7.85355C12.6583 8.04882 12.3417 8.04882 12.1464 7.85355C11.9512 7.65829 11.9512 7.34171 12.1464 7.14645L17.2929 2ZM18 9.5C18 9.22386 18.2239 9 18.5 9C18.7761 9 19 9.22386 19 9.5V16.5C19 17.8807 17.8807 19 16.5 19H3.5C2.11929 19 1 17.8807 1 16.5V3.5C1 2.11929 2.11929 1 3.5 1H10.5C10.7761 1 11 1.22386 11 1.5C11 1.77614 10.7761 2 10.5 2H3.5C2.67157 2 2 2.67157 2 3.5V16.5C2 17.3284 2.67157 18 3.5 18H16.5C17.3284 18 18 17.3284 18 16.5V9.5Z" fill="#2E9DFF" stroke="#2E9DFF" stroke-width="0.6"/>
                                </svg>
                            </div>
                            <div class='textosatalhos'>F2 - Cad. Pessoa</div>
                        </div>
                        <div class="iconsatalhos">
                            <div class='circleshortcuts' style='background-color: #32dddd;'>
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M17.2929 2H14.5C14.2239 2 14 1.77614 14 1.5C14 1.22386 14.2239 1 14.5 1H18.5C18.7761 1 19 1.22386 19 1.5V5.5C19 5.77614 18.7761 6 18.5 6C18.2239 6 18 5.77614 18 5.5V2.70711L12.8536 7.85355C12.6583 8.04882 12.3417 8.04882 12.1464 7.85355C11.9512 7.65829 11.9512 7.34171 12.1464 7.14645L17.2929 2ZM18 9.5C18 9.22386 18.2239 9 18.5 9C18.7761 9 19 9.22386 19 9.5V16.5C19 17.8807 17.8807 19 16.5 19H3.5C2.11929 19 1 17.8807 1 16.5V3.5C1 2.11929 2.11929 1 3.5 1H10.5C10.7761 1 11 1.22386 11 1.5C11 1.77614 10.7761 2 10.5 2H3.5C2.67157 2 2 2.67157 2 3.5V16.5C2 17.3284 2.67157 18 3.5 18H16.5C17.3284 18 18 17.3284 18 16.5V9.5Z" fill="#DDFBFB" stroke="#DDFBFB" stroke-width="0.6"/>
                                </svg>
                            </div>
                            <div class='textosatalhos'>F3 - Contratos</div>
                        </div>
                    </div>

                    <div style='display:flex;flex-direction:column'>
                        <div class="iconsatalhos">
                            <div class='circleshortcuts' style='background-color: #b2f3d5;'>
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M17.2929 2H14.5C14.2239 2 14 1.77614 14 1.5C14 1.22386 14.2239 1 14.5 1H18.5C18.7761 1 19 1.22386 19 1.5V5.5C19 5.77614 18.7761 6 18.5 6C18.2239 6 18 5.77614 18 5.5V2.70711L12.8536 7.85355C12.6583 8.04882 12.3417 8.04882 12.1464 7.85355C11.9512 7.65829 11.9512 7.34171 12.1464 7.14645L17.2929 2ZM18 9.5C18 9.22386 18.2239 9 18.5 9C18.7761 9 19 9.22386 19 9.5V16.5C19 17.8807 17.8807 19 16.5 19H3.5C2.11929 19 1 17.8807 1 16.5V3.5C1 2.11929 2.11929 1 3.5 1H10.5C10.7761 1 11 1.22386 11 1.5C11 1.77614 10.7761 2 10.5 2H3.5C2.67157 2 2 2.67157 2 3.5V16.5C2 17.3284 2.67157 18 3.5 18H16.5C17.3284 18 18 17.3284 18 16.5V9.5Z" fill="#46BF86" stroke="#46BF86" stroke-width="0.6"/>
                                </svg>
                            </div>
                            <div class='textosatalhos'>F4 - Agenda</div>
                        </div>
                        <div class="iconsatalhos">
                            <div class='circleshortcuts' style='background-color: #dfb1ff;'>
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M17.2929 2H14.5C14.2239 2 14 1.77614 14 1.5C14 1.22386 14.2239 1 14.5 1H18.5C18.7761 1 19 1.22386 19 1.5V5.5C19 5.77614 18.7761 6 18.5 6C18.2239 6 18 5.77614 18 5.5V2.70711L12.8536 7.85355C12.6583 8.04882 12.3417 8.04882 12.1464 7.85355C11.9512 7.65829 11.9512 7.34171 12.1464 7.14645L17.2929 2ZM18 9.5C18 9.22386 18.2239 9 18.5 9C18.7761 9 19 9.22386 19 9.5V16.5C19 17.8807 17.8807 19 16.5 19H3.5C2.11929 19 1 17.8807 1 16.5V3.5C1 2.11929 2.11929 1 3.5 1H10.5C10.7761 1 11 1.22386 11 1.5C11 1.77614 10.7761 2 10.5 2H3.5C2.67157 2 2 2.67157 2 3.5V16.5C2 17.3284 2.67157 18 3.5 18H16.5C17.3284 18 18 17.3284 18 16.5V9.5Z" fill="#ac65dd" stroke="#ac65dd" stroke-width="0.6"/>
                                </svg>
                            </div>
                            <div class='textosatalhos'>F6 - Cons. Pessoa</div>
                        </div>
                        <div class="iconsatalhos">
                            <div class='circleshortcuts' style='background-color: #ffe7a0;'>
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M17.2929 2H14.5C14.2239 2 14 1.77614 14 1.5C14 1.22386 14.2239 1 14.5 1H18.5C18.7761 1 19 1.22386 19 1.5V5.5C19 5.77614 18.7761 6 18.5 6C18.2239 6 18 5.77614 18 5.5V2.70711L12.8536 7.85355C12.6583 8.04882 12.3417 8.04882 12.1464 7.85355C11.9512 7.65829 11.9512 7.34171 12.1464 7.14645L17.2929 2ZM18 9.5C18 9.22386 18.2239 9 18.5 9C18.7761 9 19 9.22386 19 9.5V16.5C19 17.8807 17.8807 19 16.5 19H3.5C2.11929 19 1 17.8807 1 16.5V3.5C1 2.11929 2.11929 1 3.5 1H10.5C10.7761 1 11 1.22386 11 1.5C11 1.77614 10.7761 2 10.5 2H3.5C2.67157 2 2 2.67157 2 3.5V16.5C2 17.3284 2.67157 18 3.5 18H16.5C17.3284 18 18 17.3284 18 16.5V9.5Z" fill="#d8990a" stroke="#d8990a" stroke-width="0.6"/>
                                </svg>
                            </div>
                            <div class='textosatalhos'>F7 - Planos</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
    </div>

    <br><br>
    <!-- <div id='tabela' class="table-responsive-sm" style='margin-bottom:2rem;width:1030px'>
        <table id='pesquisarlaboratoriotable' class="table tablepainel">
            <thead class="">
                <tr>
                    <td colspan='2' class='headdatable'>
                        <span class='listadepacientes'>Lista de Pacientes</span>
                    </td>
                    <td class='headdatable' style='position:relative'>
                        <button type="submit" class="bttabela" value='Ver todos' onclick=''>
                            <span class="selectacoes">Ver todos</span>
                        </button>
                    </td>
                    <td class='headdatable' colspan='2'>
                        <div class='lupa2'>
                            <input type="text" placeholder="Buscar por nome ou especialidade" class='inputdatable'>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td scope="col">Cor</td>
                    <td scope="col">Pessoa</td>
                    <td scope="col">Especialidade</td>
                    <td scope="col">Ordem</td>
                    <td scope="col">Sala</td>
                </tr>
            </thead>
            <tbody id='laboratoriotablebody'>
                <tr>
                    <td scope="col"><div class='corchamado'></div></td>
                    <td scope="col">Aurora Ferreira de Holanda</td>
                    <td scope="col">Dentista</td>
                    <td scope="col">D1</td>
                    <td scope="col">6</td>
                </tr>
                <tr>
                    <td scope="col"><div class='corchamado2'></div></td>
                    <td scope="col">Fernando da Silva Mendes</td>
                    <td scope="col">Dentista</td>
                    <td scope="col">D2</td>
                    <td scope="col">6</td>
                </tr>
                <tr>
                    <td scope="col"><div class='corchamado2'></div></td>
                    <td scope="col">Júlia da Silva Menezes</td>
                    <td scope="col">Dentista</td>
                    <td scope="col">D3</td>
                    <td scope="col">6</td>
                </tr>
            </tbody>
        </table>
    </div>   -->

    <!-- <select id='selectbancada' class='form-select selectcategoria' style='margin-left:0.6rem;margin-bottom:1rem'>
        <option value=''>Escolha uma bancada</option>
        <option value='b01'>Bancada 01</option>
        <option value='b02'>Bancada 02</option>
        <option value='b03'>Bancada 03</option>
    </select>

    <div id='tabela listatotem' class="table-responsive-sm listatotem">
        <table id='' class="table">
            <thead class="table-active">
                <tr>
                    <td scope="col">Totem</td>
                    <td scope="col">Tipo</td>
                    <td scope="col">Ações</td>
                </tr>
            </thead>
            <tbody id='tabelatotems'>

            </tbody>
        </table>
    </div>   -->

    <!-- ## Modal Novo Evento ## -->
    <div class="modal fade" id="novoEventoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Adicionar Evento</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">   
                    <input type='text' class='inputstexttelas' name='novoevento' placeholder='Digite o novo evento' id='novoevento'>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" name='nooveventobutton' id='novoeventobutton' onclick='novoevento()'>
                        <span class="selectacoes">Inserir Evento</span>
                    </button>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="EventoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="EventoModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id='modal-body'>
                    
                </div>
                <div class="modal-footer" id='modal-footer'>
                    <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button> -->
                </div>
            </div>
        </div>
    </div>


    <!-- ## Modal De Avisos VER TODOS##-->
    


    <!-- ## Modal Novo Aviso ## -->
    <div class="modal fade" id="novoAvisoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Novo Aviso</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Título<br> 
                <input type='text' name='tituloaviso' class='inputstexttelas inputtextmedio' id='tituloaviso' placeholder='Novo Título'><br><br>
                <!-- Texto<br> -->
                <!-- <textarea  name='textoaviso' id='textoaviso' placeholder='Novo Texto'></textarea><br> -->
                <div class="form-floating">
                    <textarea class="form-control" name='textoaviso' id='textoaviso' placeholder="Digite o aviso" style="height: 100px"></textarea>
                    <label for="floatingTextarea2">Texto do aviso</label>
                </div>
            </div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                <button type="button" class="btn" name='novoavisobutton' id='novoavisobutton' onclick='cadastraraviso()'>
                <span class='selectacoes'>Inserir aviso</span>
                </button>
            </div>
            </div>
        </div>
    </div>

    <!-- ## Modal Editar Aviso ## -->
    <div class="modal fade" id="editarAvisoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Aviso</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Título<br> 
                <input type='text' name='tituloavisoeditar' class='inputstexttelas inputtextmedio' id='tituloavisoeditar' placeholder='Título'><br><br>
                <!-- Texto<br> -->
                <!-- <textarea  name='textoaviso' id='textoaviso' placeholder='Novo Texto'></textarea><br> -->
                <div class="form-floating">
                    <textarea class="form-control" name='textoavisoeditar' id='textoavisoeditar' placeholder="Digite o aviso" style="height: 100px"></textarea>
                    <label for="floatingTextarea2">Texto do aviso</label>
                </div>
            </div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                <button type="button" class="btn" name='editaravisobutton' id='editaravisobutton' onclick='editaraviso()'>
                <span class='selectacoes'>Editar Aviso</span>
                </button>
            </div>
            </div>
        </div>
    </div>

    <!-- ## Modal Excluir Aviso ## -->
    <div class="modal fade" id="excluirAvisoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Excluir Aviso</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Tem certeza que deseja excluir esse aviso?
            </div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                <button type="button" class="btn btdelete" name='excluiravisobutton' id='excluiravisobutton' onclick='excluiraviso()'>
                    <span class='fontebotao'>Excluir Aviso</span>
                </button>
            </div>
            </div>
        </div>
    </div>

</body>

<script>
    // console.log(idcolaborador);
    var arraydatas = [];
    var arrayeventos = [];
    var arraydatasselect = [];
    var eventoantigo = '';
    var diaevento = '';
    var mesesextenso = ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'];
    
    var idtotems = [];
    var nometotems = [];
    var tipototems = [];
    var statustotems = [];

    var listaid = [];
    var listatitulo = [];
    var listatexto = [];
    var listadata = [];

    var checklista = 0;
    var editatual = 0;

    var idavisoatual = 0;

    calendario();

    setInterval(pesquisar,1000);

    $('#novoEventoModal').on('hidden.bs.modal', function () {
        calendario();
    });

    function pesquisar(){
        $.ajax({
            type:'get',		
            dataType: 'json',	
            url: '/consultaraviso',
            success: function(dados){
                checklista = 0;
                // if(listaid.length < 4){
                    if(dados['titulo'][0] == listatitulo[0] && dados['texto'][0] == listatexto[0] && dados['data'][0] == listadata[0]){
                        checklista = 1;
                        
                    }
                    
                    if(checklista == 0){
                        listaid = [];
                        listatitulo = [];
                        listatexto = [];
                        listadata = [];
                        for(var i = 0; i<dados['id'].length; i++){
                            listaid.push(dados['id'][i]);
                            listatitulo.push(dados['titulo'][i]);
                            listatexto.push(dados['texto'][i]);
                            listadata.push(dados['data'][i]);
                        }
                        
                        document.getElementById('avisosdiv').innerHTML = "";
                        for(var i = 0; i<listaid.length; i++){
                            document.getElementById('avisosdiv').innerHTML+="<div class='accordion' id='accordion-"+i+"'><div class='accordion-item'><h2 class='accordion-header' id='heading-"+i+"'><button class='accordion-button collapsed' type='button' data-bs-toggle='collapse' data-bs-target='#collapse-"+i+"' aria-expanded='false' aria-controls='collapse-"+i+"'><div class='avisosaccordion'><div id='accordion-"+i+"-titulo' class='tituloaviso'>"+listatitulo[i]+"</div><div><span id='dataAviso-"+i+"' class='dataviso'>"+listadata[i]+"</span></div></div></button></h2><div id='collapse-"+i+"' class='accordion-collapse collapse' aria-labelledby='headingOne' data-bs-parent='#accordion-"+i+"'><div class='accordion-body'><span id='accordion-"+i+"-texto' class='textoaccordion'>"+listatexto[i]+"</span><img src='../imagens/editaravisos.svg' onclick='editarviso("+i+")' class='acoesaccordion'><img src='../imagens/lixoavisos.svg' onclick='excluirviso("+i+")' class='acoesaccordion'></div></div></div></div>";
                        }
                    }
            }
        });
    }

    // setInterval(pegartotems,1000);
    function abrirAgenda() {
        $('#agendaContainer').css('display', 'block');
        // document.getElementById('agendaContainer').style.width="260px";
        // document.getElementById('agendaContainer').style.transition = "0.4s";
        // document.getElementById('principal').style.marginLeft="250px";
    }

    function fecharAgenda() {
        $('#agendaContainer').css('display', 'none');
        // document.getElementById('agendaContainer').style.width = "0px";
        // document.getElementById('agendaContainer').style.transition = "0.4s";
        // document.getElementById('principal').style.marginLeft="0";
    }

    function abrirCate(evt, tipCate) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(tipCate).style.display = "block";
        evt.currentTarget.className += " active";
    }

    // function pegartotems(){
    //     $.ajax({
    //             type: "GET",
    //             url: "pegartotems",
    //             data: {},
    //             dataType: "json",
    //             success: function(data) {
    //                 if(idtotems.length != data['id'].length){
    //                     dadoslinhastotem = [];
    //                     idtotems = data['id'];
    //                     nometotems = data['nome'];
    //                     tipototems = data['tipo'];
    //                     statustotems = data['status'];
    //                     apagartabelatotems();
    //                     for(var i = 0; i < idtotems.length; i++){
    //                             var tabela = document.getElementById('tabelatotems');
    //                             var numeroLinhas = tabela.rows.length;
    //                             var linha = tabela.insertRow(numeroLinhas);
    //                             var celula1 = linha.insertCell(0);
    //                             var celula2 = linha.insertCell(1);   
    //                             var celula3 = linha.insertCell(2);
    //                             dadoslinhastotem.push(idtotems[i]);
    //                             celula1.innerHTML=nometotems[i];
    //                             celula2.innerHTML=tipototems[i];
    //                             celula3.innerHTML="<button type='submit' class='btn btadicionar2' name='chamartotem"+(numeroLinhas)+"' id='chamartotem"+(numeroLinhas)+"' value='Chamar' onclick='chamartotem(this)' style='background:none!important'><span class='fontebotao2'>Chamar</span></button>&nbsp;&nbsp;<button type='submit' class='btn btdelete2' name='removertotem"+(numeroLinhas)+"' id='removertotem"+(numeroLinhas)+"' onclick='removertotem(this)' value='Remover' style='background:none!important'><span class='fontebotao2'>Remover</span></button>";
    //                     }
    //                 }
    //             }
    //         });
    // }

    // function chamartotem(cedula){
        
    //     if(document.getElementById('selectbancada').value != ''){
    //         // console.log(nometotems[cedula.id.split('chamartotem')[1]]);
    //         $.ajax({
    //         type: "GET",
    //         url: "/cadastro/cadastroatendimento",
    //         data: {
    //             pessoa: nometotems[cedula.id.split('chamartotem')[1]], lugar:document.getElementById('selectbancada').value,
    //         },
    //         dataType: "json",
    //         success: function(data) {
    //                 if(data == 1){
    //                     console.log('Mensagem enviada com sucesso!');
    //                 }
    //             }
    //         });
    //     }
        
    // }

    // function removertotem(cedula){
    //     // console.log(idtotems[cedula.id.split('removertotem')[1]]);
    //     $.ajax({
    //         type: "GET",
    //         url: "fechartotem",
    //         data: {
    //             totem: idtotems[cedula.id.split('removertotem')[1]],
    //         },
    //         dataType: "json",
    //         success: function(data) {
    //                 if(data == 1){
    //                     console.log('Totem fechado com sucesso!');
    //                     pegartotems();
    //                 }
    //             }
    //         });
    // }

    // function apagartabelatotems(){
    //     var tableHeaderRowCount = 0;
    //     var table = document.getElementById('tabelatotems');
    //     var rowCount = table.rows.length;
    //     for (var i = tableHeaderRowCount; i < rowCount; i++) {
    //         table.deleteRow(tableHeaderRowCount);
    //     }
    // }

    function novoaviso(){
        $('#novoAvisoModal').modal('show');
    }

    function editarviso(i){
        $('#editarAvisoModal').modal('show');
        idavisoatual = listaid[i];
        document.getElementById('tituloavisoeditar').value = listatitulo[i];
        document.getElementById('textoavisoeditar').value = listatexto[i];
    }

    function excluirviso(i){
        idavisoatual = listaid[i];
        $('#excluirAvisoModal').modal('show');
    }

    function cadastraraviso(){
            $.ajax({
            type: "GET",
            url: "/cadastraraviso",
            data: {
                titulo: document.getElementById('tituloaviso').value, texto:document.getElementById('textoaviso').value,
            },
            dataType: "json",
            success: function(data) {
                    if(data == 1){
                        console.log('Aviso cadastrado com sucesso!');
                    }
                }
            });
    }

    function editaraviso(){
            $.ajax({
            type: "GET",
            url: "/editaraviso",
            data: {
                titulo: document.getElementById('tituloavisoeditar').value, texto:document.getElementById('textoavisoeditar').value, idaviso: idavisoatual
            },
            dataType: "json",
            success: function(data) {
                    if(data == 1){
                        console.log('Aviso editado com sucesso!');
                        $('#editarAvisoModal').modal('hide');
                        listaid = [];
                        listatitulo = [];
                        listatexto = [];
                        listadata = [];
                    }
                }
            });
    }

    function excluiraviso(){
            $.ajax({
            type: "GET",
            url: "/excluiraviso",
            data: {
                idaviso: idavisoatual
            },
            dataType: "json",
            success: function(data) {
                    if(data == 1){
                        console.log('Aviso excluido com sucesso!');
                        $('#excluirAvisoModal').modal('hide');
                        listaid = [];
                        listatitulo = [];
                        listatexto = [];
                        listadata = [];
                    }
                }
            });
    }

    function calendario(){
        arraydatas = [];
        arrayeventos = [];

            $.ajax({
                type: "GET",
                url: "/consultaagendacolaborador",
                data: { idcolaborador:idcolaborador },
                dataType: "json",
                success: function(data) {
                    document.getElementById('eventos').innerHTML = '';
                    $('.calendar').pignoseCalendar({
                        lang: 'pt',
                        init: function(context){
                            for(var i = 0; i < data['data'].length; i++){
                                arraydatas.push(data['data'][i]);
                                arrayeventos.push(data['evento'][i]);
                            }

                            document.getElementById('eventos').innerHTML = '';
                            var month = context.dateManager['month'].toString().padStart(2,'0');
                                for(var i = 0; i<arraydatas.length; i++){
                                    if(arraydatas[i].substr(5, 2) == month){
                                        document.getElementById('eventos').innerHTML += "<div id='div"+i+"' class='diaEvent' onclick='modal(this)'><span class='labelEventos' id='idevento"+i+"'>"+arrayeventos[i] + " - " +  mesesextenso[month-1] +  " , "+ arraydatas[i].substr(8,2) +  " <i class='fal fa-calendar'></i></span></div>";
                                    }
                                }
                        },
                        select: function(date, context) {
                            arraydatasselect = [];
                            document.getElementById('eventos').innerHTML = '';
                            var month = context.dateManager['month'].toString().padStart(2,'0');
                            if(date[0] != null){
                                for(var i = 0; i<arraydatas.length; i++){
                                    if(arraydatas[i] == date[0]['_i']){
                                        arraydatasselect.push(i);
                                    }
                                }
                                if(arraydatasselect.length > 0){
                                    for(var i = 0; i < arraydatasselect.length; i++){
                                        document.getElementById('eventos').innerHTML += "<div id='div"+i+"' class='diaEvent' onclick='modal(this)'><span class='labelEventos' id='idevento"+i+"'>" + arrayeventos[arraydatasselect[i]] + " - " +  mesesextenso[month-1] +  " , "  + arraydatas[arraydatasselect[i]].substr(8,2) + " <i class='fal fa-calendar'></i></span></div>";
                                    }
                                }
                                diaevento = (context['current'][0]['_i'].substr(0,4)+ "-" +context['current'][0]['_i'].substr(5,2)+ "-"+context['current'][0]['_i'].substr(8,2) );
                                $('#novoEventoModal').modal('show');
                                
                            }else{
                                var month = context.dateManager['month'].toString().padStart(2,'0');
                                for(var i = 0; i<arraydatas.length; i++){
                                    if(arraydatas[i].substr(5, 2) == month){
                                        document.getElementById('eventos').innerHTML += "<div id='div"+i+"' class='diaEvent' onclick='modal(this)'><span class='labelEventos' id='idevento"+i+"'>" + arrayeventos[i] + " - " +  mesesextenso[month-1] + " , "+ arraydatas[i].substr(8,2) +  " <i class='fal fa-calendar'></i></span></div>";
                                    }
                                }
                            }
                            
                        },

                        next: function(date, context){
                            document.getElementById('eventos').innerHTML = '';
                            var month = context.dateManager['month'].toString().padStart(2,'0');
                                for(var i = 0; i<arraydatas.length; i++){
                                    if(arraydatas[i].substr(5, 2) == month){
                                        document.getElementById('eventos').innerHTML += "<div id='div"+i+"' class='diaEvent' onclick='modal(this)'><span class='labelEventos' id='idevento"+i+"'>" + arrayeventos[i] + " - " +  mesesextenso[month-1] + " , " + arraydatas[i].substr(8,2) +  " <i class='fal fa-calendar'></i></span></div>";
                                    }
                                }
                        },
                        prev: function(date, context){
                            document.getElementById('eventos').innerHTML = '';
                            var month = context.dateManager['month'].toString().padStart(2,'0');
                                for(var i = 0; i<arraydatas.length; i++){
                                    if(arraydatas[i].substr(5, 2) == month){
                                        document.getElementById('eventos').innerHTML += "<div id='div"+i+"' class='diaEvent' onclick='modal(this)'><span class='labelEventos' id='idevento"+i+"'>" + arrayeventos[i] + " - " +  mesesextenso[month-1] + " , " + arraydatas[i].substr(8,2) + " <i class='fal fa-calendar'></i></span></div>";
                                    }
                                }
                        }
                    });
                },
        });
    }

    function modal(div){
        console.log(div);
        editatual = div.id.substr(3);
        // console.log(document.getElementById('idevento'+editatual).innerHTML.split(' - ')[0]);
        var string = div.innerHTML.split(' - ');
        var string2 = string[1].split(' ');
        document.getElementById('EventoModalLabel').innerHTML = string2[2] + ' de ' + string2[0];
        document.getElementById('modal-body').innerHTML = string[0];
        document.getElementById('modal-footer').innerHTML = "<button type='submit' class='btn btamarelo' value='Editar' onclick='editevento()' id='btnEv'><span class='fontebotao'>Editar</span></button><button type='submit' class='btn btdelete' value='Apagar' onclick='apagarevento()'><span class='fontebotao'>Deletar</span></button>";
        $('#EventoModal').modal('show');
        // <button type='button' class='btn btn-secondary btnCancEvento' data-bs-dismiss='modal'>Cancelar</button>
    }
    function editevento(){
        document.getElementById('btnEv').style.display="none";
        eventoantigo = document.getElementById('idevento'+editatual).innerHTML.split(' - ')[0];
        console.log(eventoantigo); 
        document.getElementById('modal-body').innerHTML = "<input type='text' name='eventoinput' class='inputstexttelas' id='eventoinput' value='"+eventoantigo+"'><br><br><button type='submit' class='btn btadicionar' value='Atualizar Evento' onclick='editarevento()' name='eventoinputbutton'><span class='fontebotao'>Atualizar Evento</span></button>";
    }

    function editarevento(){
        var d = new Date();
        var data = document.getElementById('EventoModalLabel').innerHTML.split(' de ');
        $.ajax({
                type: "GET",
                url: "../editar/editareventocalendario",
                data: {data: d.getFullYear()+'-'+(mesesextenso.indexOf(data[1])+1).toString().padStart(2,'0')+'-'+data[0], eventonovo: document.getElementById('eventoinput').value, eventoantigo: eventoantigo},
                dataType: "json",
                success: function(data) {
                    if(data == 1){
                        console.log('Evento Atualizado com Sucesso!');
                        document.getElementById('eventos').innerHTML = '';
                        $('#EventoModal').modal('hide');
                        calendario();
                    }
                    document.getElementById('btnEv').style.display="initial";
                }
            });
    }

    function apagarevento(){
        var d = new Date();
        var data = document.getElementById('EventoModalLabel').innerHTML.split(' de ');
        $.ajax({
                type: "GET",
                url: "../apagar/apagareventocalendario",
                data: {data: d.getFullYear()+'-'+(mesesextenso.indexOf(data[1])+1).toString().padStart(2,'0')+'-'+data[0], evento: document.getElementById('idevento'+editatual).innerHTML},
                dataType: "json",
                success: function(data) {
                    if(data == 1){
                        console.log('Evento Apagado com Sucesso!');
                        document.getElementById('eventos').innerHTML = '';
                        $('#EventoModal').modal('hide');
                        calendario();
                    }
                }
            }); 
    }

    function novoevento(){
        
        $.ajax({
                type: "GET",
                url: "../cadastro/cadastroeventocalendario",
                data: {data: diaevento, evento: document.getElementById('novoevento').value, idcolaborador: idcolaborador},
                dataType: "json",
                success: function(data) {
                    if(data == 1){
                        console.log('Evento Registrado com Sucesso!');
                        // calendario();
                        $('#novoEventoModal').modal('hide');
                    }
                }
            });
    }
</script>
@endsection
</html>