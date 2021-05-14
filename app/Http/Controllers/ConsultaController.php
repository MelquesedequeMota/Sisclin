<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConsultaController extends Controller
{
    public function ConsultaCadastroDepartamento(Request $request){
        $consultaselectdep = DB::table('departamentos')->get();
        $departamentos = ["id"=>[], "nome"=>[]];
        foreach($consultaselectdep as $consultaselectdep){
            array_push($departamentos["id"], $consultaselectdep->dep_id);
            array_push($departamentos["nome"], $consultaselectdep->dep_nome);
        }
        return $departamentos;
    }
    public function ConsultaCadastroSetor(Request $request){
        if($request->dep == null){

            $consultaselectset = DB::table('setores')->get();
            $setores = ["id"=>[], "nome"=>[]];
            foreach($consultaselectset as $consultaselectset){

                array_push($setores["id"], $consultaselectset->set_id);
                array_push($setores["nome"], $consultaselectset->set_nome);

            }

            return $setores;

        }else{
            
            $consultaselectset = DB::table('setores')->where('set_dep', $request->dep)->get();
            $setores = ["id"=>[], "nome"=>[]];
            foreach($consultaselectset as $consultaselectset){

                array_push($setores["id"], $consultaselectset->set_id);
                array_push($setores["nome"], $consultaselectset->set_nome);

            }

            return $setores;
        }

    }
    public function ConsultaCadastroFuncao(Request $request){
        $consultaselectfunc = DB::table('funcoes')->where('func_setor', $request->set)->get();
        $funcoes = ["id"=>[], "nome"=>[]];
        foreach($consultaselectfunc as $consultaselectfunc){
            array_push($funcoes["id"], $consultaselectfunc->func_id);
            array_push($funcoes["nome"], $consultaselectfunc->func_nome);
        }
        return $funcoes;
    }

    public function ConsultaCadastroCategoria(Request $request){
        $consultaselectcate = DB::table('categorias')->get();
        $categorias = ["id"=>[], "nome"=>[]];
        foreach($consultaselectcate as $consultaselectcate){
            array_push($categorias["id"], $consultaselectcate->cate_id);
            array_push($categorias["nome"], $consultaselectcate->cate_nome);
        }
        return $categorias;
    }

    public function ConsultaPessoa(Request $request){
        return view('ConsultaPessoa');
    }

    public function ConsultaMedico(){
        return view('ConsultaMedico');
    }

    public function ConsultaProduto(){
        return view('ConsultaProduto');
    }

    public function ConsultaPlano(){
        return view('ConsultaPlano');
    }

    public function ConsultaContrato(){
        return view('ConsultaContrato');
    }

    public function ConsultaPessoaDados(Request $request){
        if(strlen($request->cpfcnpj) == 18){
            $consultafornecedoresjur = DB::table('fornecedoresjur')->where('forjur_cnpj', $request->cpfcnpj)->get();
            $consultaclientesjur = DB::table('clientesjur')->where('clijur_cnpj', $request->cpfcnpj)->get();
            $clientesjur = $consultaclientesjur->map(function($obj){
                return (array) $obj;
            })->toArray();
            $fornecedoresjur = $consultafornecedoresjur->map(function($obj){
                return (array) $obj;
            })->toArray();
            $consulta = array_merge($fornecedoresjur, $clientesjur);
            return $consulta;
        }else if(strlen($request->cpfcnpj) == 14){
            $consultapacientes = DB::table('pacientes')->where('pac_cpf', $request->cpfcnpj)->get();
            $consultafornecedoresfis = DB::table('fornecedoresfis')->where('forfis_cpf', $request->cpfcnpj)->get();
            $consultafuncionarios = DB::table('funcionarios')->where('func_cpf', $request->cpfcnpj)->get();
            $pacientes = $consultapacientes->map(function($obj){
                return (array) $obj;
            })->toArray();
            $fornecedoresfis = $consultafornecedoresfis->map(function($obj){
                return (array) $obj;
            })->toArray();
            $funcionarios = $consultafuncionarios->map(function($obj){
                return (array) $obj;
            })->toArray();

            $consulta1 = array_merge($pacientes, $fornecedoresfis);
            $consulta = array_merge($consulta1, $funcionarios);
            return $consulta;
        }else{
            $consultapacientes = DB::table('pacientes')->where('pac_nome', 'like', '%'.$request->nomepessoa.'%')->get();
            $consultafornecedoresfis = DB::table('fornecedoresfis')->where('forfis_nome', 'like', '%'. $request->nomepessoa.'%')->get();
            $consultafuncionarios = DB::table('funcionarios')->where('func_nome', 'like', '%'. $request->nomepessoa.'%')->get();
            $consultafornecedoresjur = DB::table('fornecedoresjur')->where('forjur_nome', 'like', '%'. $request->nomepessoa.'%')->get();
            $consultaclientesjur = DB::table('clientesjur')->where('clijur_nome', 'like', '%'. $request->nomepessoa.'%')->get();
            $pacientes = $consultapacientes->map(function($obj){
                return (array) $obj;
            })->toArray();
            $fornecedoresfis = $consultafornecedoresfis->map(function($obj){
                return (array) $obj;
            })->toArray();
            $funcionarios = $consultafuncionarios->map(function($obj){
                return (array) $obj;
            })->toArray();
            $clientesjur = $consultaclientesjur->map(function($obj){
                return (array) $obj;
            })->toArray();
            $fornecedoresjur = $consultafornecedoresjur->map(function($obj){
                return (array) $obj;
            })->toArray();

            $merge1 = array_merge($pacientes, $fornecedoresfis);
            $merge2 = array_merge($merge1, $funcionarios);
            $merge3 = array_merge($merge2, $clientesjur);
            $consulta = array_merge($merge3, $fornecedoresjur);
            return $consulta;
        }
    }

    public function ConsultaMedicoDados(Request $request){
        $consultafinal = [];
        $consultamedicos = DB::table('medicos')->where('med_cpf', 'like', '%'.$request->cpf.'%')
        ->where('med_nome',  'like', '%'.$request->nomemedico.'%')
        ->where('med_crn',  'like', '%'.$request->crnmedico.'%')
        ->where('med_espec',  'like', '%'.$request->especmedico.'%')
        ->get();
        $consulta = $consultamedicos->map(function($obj){
            return (array) $obj;
        })->toArray();
        foreach($consulta as $consulta){
            $consultaespec = DB::table('especialidades')->where('espec_id', $consulta['med_espec'])->get();
            array_push($consultafinal, [$consulta['med_cpf'] , $consulta['med_crn'], $consulta['med_nome'], $consulta['med_tel1'], $consultaespec[0]->espec_nome]);
        }
        return $consultafinal;
    }

    public function ConsultaProdutoDados(Request $request){
        $consultafinal = [];
        $consultaprodutos = DB::table('produtos')->where('prod_nome', 'like', '%'.$request->nomeproduto.'%')
        ->where('prod_cate',  'like', '%'.$request->especmedico.'%')
        ->get();
        $consulta = $consultaprodutos->map(function($obj){
            return (array) $obj;
        })->toArray();
        foreach($consulta as $consulta){
            $consultacate = DB::table('categorias')->where('cate_id', $consulta['prod_cate'])->get();
            array_push($consultafinal, [$consulta['prod_nome'] ,$consulta['prod_tipo'], $consultacate[0]->cate_nome]);
        }
        return $consultafinal;
    }

    public function ConsultaPlanoDados(Request $request){
        $consultaplanos = DB::table('planos')->where('plan_nome', 'like', '%'.$request->nomeplano.'%')
        ->get();
        $consulta = $consultaplanos->map(function($obj){
            return (array) $obj;
        })->toArray();
        return $consulta;
    }

    public function ConsultaPlanoContrato(Request $request){
        $consultaplano = DB::table('planos')->where('plan_id',$request->plan_id)
        ->get();
        $consulta = $consultaplano->map(function($obj){
            return (array) $obj;
        })->toArray();
        return $consulta;
    }

    public function ConsultaContratoDados(Request $request){
        $consultafinal = [];
        $nome = [];
        $idtitu = [];
        $consultapacientes = DB::table('pacientes')->where('pac_nome', 'like', '%'.$request->nometitular.'%')->get();
        $consultafornecedoresfis = DB::table('fornecedoresfis')->where('forfis_nome', 'like', '%'. $request->nometitular.'%')->get();
        $consultafuncionarios = DB::table('funcionarios')->where('func_nome', 'like', '%'. $request->nometitular.'%')->get();
        $consultafornecedoresjur = DB::table('fornecedoresjur')->where('forjur_nome', 'like', '%'. $request->nometitular.'%')->get();
        $consultaclientesjur = DB::table('clientesjur')->where('clijur_nome', 'like', '%'. $request->nometitular.'%')->get();
        if(count($consultapacientes) !=0 ){
            $consultapessoa = $consultapacientes->map(function($obj){
                return (array) $obj;
            })->toArray();
            foreach($consultapessoa as $consultapessoa){
                array_push($nome, $consultapessoa['pac_nome']);
                array_push($idtitu, str_pad($consultapessoa['pac_id'] , 4 , '0' , STR_PAD_LEFT) . "1");
            }
            
        }if(count($consultafornecedoresfis) !=0 ){
            $consultapessoa = $consultafornecedoresfis->map(function($obj){
                return (array) $obj;
            })->toArray();
            foreach($consultapessoa as $consultapessoa){
                array_push($nome, $consultapessoa['forfis_nome']);
                array_push($idtitu, str_pad($consultapessoa['forfis_id'] , 4 , '0' , STR_PAD_LEFT) . "2");
            }

        }if(count($consultafuncionarios) !=0 ){
            $consultapessoa = $consultafuncionarios->map(function($obj){
                return (array) $obj;
            })->toArray();
            foreach($consultapessoa as $consultapessoa){
                array_push($nome, $consultapessoa['func_nome']);
                array_push($idtitu, str_pad($consultapessoa['func_id'] , 4 , '0' , STR_PAD_LEFT) . "3");
            }

        }if(count($consultaclientesjur) !=0 ){
            $consultapessoa = $consultaclientesjur->map(function($obj){
                return (array) $obj;
            })->toArray();
            foreach($consultapessoa as $consultapessoa){
                array_push($nome, $consultapessoa['clijur_nome']);
                array_push($idtitu, str_pad($consultapessoa['clijur_id'] , 4 , '0' , STR_PAD_LEFT) . "4");
            }
            
        }if(count($consultafornecedoresjur) !=0 ){
            $consultapessoa = $consultafornecedoresjur->map(function($obj){
                return (array) $obj;
            })->toArray();
            foreach($consultapessoa as $consultapessoa){
                array_push($nome, $consultapessoa['forjur_nome']);
                array_push($idtitu, str_pad($consultapessoa['forjur_id'] , 4 , '0' , STR_PAD_LEFT) . "5");
            }
            
        }
        
        $pessoas = [];
        for($i = 0; $i < count($idtitu); $i++){
            array_push($pessoas, [$idtitu[$i], $nome[$i]]);
        }
        foreach($pessoas as $pessoas){
            $consultacontratos = DB::table('contratosobs')->where('contobs_id', 'like', '%'.$request->cont_id.'%')
            ->where('contobs_idpessoa', 'like', '%'.$pessoas[0].'%')
            ->where('contobs_tipo', 'Titular')
            ->where('contobs_status', 'Ativo')
            ->get();
            $consultacontratos2 = $consultacontratos->map(function($obj){
                return (array) $obj;
            })->toArray();
            $planos = [];
            for($i = 0; $i < count($consultacontratos2); $i++){
                $consultacontrato = DB::table('contratos')->where('cont_id', $consultacontratos2[0]['contobs_id'])
                ->get();
                $consultacontrato2 = $consultacontrato->map(function($obj){
                    return (array) $obj;
                })->toArray();
                array_push($planos, $consultacontrato2[0]['cont_plano']);
            }

            for($i = 0; $i<count($planos); $i++){
                $consultaplanos = DB::table('planos')->where('plan_id', $planos[$i])->get();
                $consultaplano = $consultaplanos->map(function($obj){
                    return (array) $obj;
                })->toArray();
                array_push($consultafinal, [$consultacontratos2[$i]['contobs_id'], $pessoas[1], $consultaplano[0]['plan_nome']]);
            }
            
        }
        return $consultafinal;
        
    }

    public function ConsultaContratoTitularDados(Request $request){
        $consultacontratos = DB::table('contratosobs')->where('contobs_id', 'like', '%'.$request->cont_id.'%')
            ->where('contobs_tipo', 'Titular')
            ->where('contobs_status', 'Ativo')
            ->get();
        $consultacontratos2 = $consultacontratos->map(function($obj){
            return (array) $obj;
        })->toArray();
        if($consultacontratos2[0]['contobs_idpessoa'][4] == "1"){
            $consultapessoa = DB::table('pacientes')
            ->where('pac_id', substr($consultacontratos2[0]['contobs_idpessoa'], 0, 4))
            ->get();
            $consultapessoa2 = $consultapessoa->map(function($obj){
                return (array) $obj;
            })->toArray();
        }else if($consultacontratos2[0]['contobs_idpessoa'][4] == "2"){
            $consultapessoa = DB::table('fornecedoresfis')
            ->where('forfis_id', substr($consultacontratos2[0]['contobs_idpessoa'], 0, 4))
            ->get();
            $consultapessoa2 = $consultapessoa->map(function($obj){
                return (array) $obj;
            })->toArray();
        }else if($consultacontratos2[0]['contobs_idpessoa'][4] == "3"){
            $consultapessoa = DB::table('funcionarios')
            ->where('func_id', substr($consultacontratos2[0]['contobs_idpessoa'], 0, 4))
            ->get();
            $consultapessoa2 = $consultapessoa->map(function($obj){
                return (array) $obj;
            })->toArray();
        }else if($consultacontratos2[0]['contobs_idpessoa'][4] == "4"){
            $consultapessoa = DB::table('clientesjur')
            ->where('clijur_id', substr($consultacontratos2[0]['contobs_idpessoa'], 0, 4))
            ->get();
            $consultapessoa2 = $consultapessoa->map(function($obj){
                return (array) $obj;
            })->toArray();
        }else if($consultacontratos2[0]['contobs_idpessoa'][4] == "5"){
            $consultapessoa = DB::table('fornecedoresjur')
            ->where('forjur_id', substr($consultacontratos2[0]['contobs_idpessoa'], 0, 4))
            ->get();
            $consultapessoa2 = $consultapessoa->map(function($obj){
                return (array) $obj;
            })->toArray();
        }
        return $consultapessoa2;
    }

    public function ConsultaContratoDependenteDados(Request $request){
        $consultacontratos = DB::table('contratosobs')->where('contobs_id', 'like', '%'.$request->cont_id.'%')
            ->where('contobs_tipo', 'Dependente')
            ->where('contobs_status', 'Ativo')
            ->get();
        $consultacontratos2 = $consultacontratos->map(function($obj){
            return (array) $obj;
        })->toArray();
        $resultconsultas = [];
        for($i = 0; $i < count($consultacontratos2); $i++){
            if($consultacontratos2[$i]['contobs_idpessoa'][4] == "1"){
                $consultapessoa = DB::table('pacientes')
                ->where('pac_id', substr($consultacontratos2[$i]['contobs_idpessoa'], 0, 4))
                ->get();
                $consultapessoa2 = $consultapessoa->map(function($obj){
                    return (array) $obj;
                })->toArray();
                array_push($resultconsultas, $consultapessoa2);
            }else if($consultacontratos2[$i]['contobs_idpessoa'][4] == "2"){
                $consultapessoa = DB::table('fornecedoresfis')
                ->where('forfis_id', substr($consultacontratos2[$i]['contobs_idpessoa'], 0, 4))
                ->get();
                $consultapessoa2 = $consultapessoa->map(function($obj){
                    return (array) $obj;
                })->toArray();
                array_push($resultconsultas, $consultapessoa2);
            }else if($consultacontratos2[$i]['contobs_idpessoa'][4] == "3"){
                $consultapessoa = DB::table('funcionarios')
                ->where('func_id', substr($consultacontratos2[$i]['contobs_idpessoa'], 0, 4))
                ->get();
                $consultapessoa2 = $consultapessoa->map(function($obj){
                    return (array) $obj;
                })->toArray();
                array_push($resultconsultas, $consultapessoa2);
            }else if($consultacontratos2[$i]['contobs_idpessoa'][4] == "4"){
                $consultapessoa = DB::table('clientesjur')
                ->where('clijur_id', substr($consultacontratos2[$i]['contobs_idpessoa'], 0, 4))
                ->get();
                $consultapessoa2 = $consultapessoa->map(function($obj){
                    return (array) $obj;
                })->toArray();
                array_push($resultconsultas, $consultapessoa2);
            }else if($consultacontratos2[$i]['contobs_idpessoa'][4] == "5"){
                $consultapessoa = DB::table('fornecedoresjur')
                ->where('forjur_id', substr($consultacontratos2[$i]['contobs_idpessoa'], 0, 4))
                ->get();
                $consultapessoa2 = $consultapessoa->map(function($obj){
                    return (array) $obj;
                })->toArray();
                array_push($resultconsultas, $consultapessoa2);
            }
        }
        return $resultconsultas;
    }

    public function ConsultaPessoaNome(Request $request){
        $consultapacientes = DB::table('pacientes')->where('pac_nome', 'like', '%'.$request->nomepessoa.'%')->get();
        $consultafornecedoresfis = DB::table('fornecedoresfis')->where('forfis_nome', 'like', '%'. $request->nomepessoa.'%')->get();
        $consultafuncionarios = DB::table('funcionarios')->where('func_nome', 'like', '%'. $request->nomepessoa.'%')->get();
        $consultafornecedoresjur = DB::table('fornecedoresjur')->where('forjur_nome', 'like', '%'. $request->nomepessoa.'%')->get();
        $consultaclientesjur = DB::table('clientesjur')->where('clijur_nome', 'like', '%'. $request->nomepessoa.'%')->get();
        $pacientes = $consultapacientes->map(function($obj){
            return (array) $obj;
        })->toArray();
        $fornecedoresfis = $consultafornecedoresfis->map(function($obj){
            return (array) $obj;
        })->toArray();
        $funcionarios = $consultafuncionarios->map(function($obj){
            return (array) $obj;
        })->toArray();
        $clientesjur = $consultaclientesjur->map(function($obj){
            return (array) $obj;
        })->toArray();
        $fornecedoresjur = $consultafornecedoresjur->map(function($obj){
            return (array) $obj;
        })->toArray();

        $merge1 = array_merge($pacientes, $fornecedoresfis);
        $merge2 = array_merge($merge1, $funcionarios);
        $merge3 = array_merge($merge2, $clientesjur);
        $consulta = array_merge($merge3, $fornecedoresjur);
        return $consulta;
        
    }

    public function ConsultaMedicoNome(Request $request){
        $consultamedicos = DB::table('medicos')->where('med_nome', 'like', '%'.$request->nomemedico.'%')->get();
        $consulta = $consultamedicos->map(function($obj){
            return (array) $obj;
        })->toArray();
        return $consulta;
        
    }

    public function ConsultaProdutoNome(Request $request){
        $consultaprodutos = DB::table('produtos')->where('prod_nome', 'like', '%'.$request->nomeproduto.'%')->get();
        $consulta = $consultaprodutos->map(function($obj){
            return (array) $obj;
        })->toArray();
        return $consulta;
        
    }

    public function ConsultaPlanoNome(Request $request){
        $consultaplanos = DB::table('planos')->where('plan_nome', 'like', '%'.$request->nomeproduto.'%')->get();
        $consulta = $consultaplanos->map(function($obj){
            return (array) $obj;
        })->toArray();
        return $consulta;
        
    }

    public function ConsultaPessoaEditar(Request $request){
        if(strlen($request->cpfcnpj) == 18){
            if($request->pessoa == 'forjur'){
                $consultafornecedoresjur = DB::table('fornecedoresjur')->where('forjur_cnpj', $request->cpfcnpj)->get();
                $fornecedoresjur = $consultafornecedoresjur->map(function($obj){
                    return (array) $obj;
                })->toArray();
                return $fornecedoresjur;
            }else if($request->pessoa == 'clijur'){
                $consultaclientesjur = DB::table('clientesjur')->where('clijur_cnpj', $request->cpfcnpj)->get();
                $clientesjur = $consultaclientesjur->map(function($obj){
                    return (array) $obj;
                })->toArray();  
                return $clientesjur;
            }
        }else if(strlen($request->cpfcnpj) == 14){
            if($request->pessoa == 'pac'){
                $consultapacientes = DB::table('pacientes')->where('pac_cpf', $request->cpfcnpj)->get();
                $pacientes = $consultapacientes->map(function($obj){
                    return (array) $obj;
                })->toArray();
                return $pacientes;
            }else if($request->pessoa == 'forfis'){
                $consultafornecedoresfis = DB::table('fornecedoresfis')->where('forfis_cpf', $request->cpfcnpj)->get();
                $fornecedoresfis = $consultafornecedoresfis->map(function($obj){
                    return (array) $obj;
                })->toArray(); 
                return $fornecedoresfis;
            }else{
                $consultafuncionarios = DB::table('funcionarios')->where('func_cpf', $request->cpfcnpj)->get();
                $funcionarios = $consultafuncionarios->map(function($obj){
                    return (array) $obj;
                })->toArray();
                return $funcionarios;
            }
        }
    }

    public function ConsultaMedicoEditar(Request $request){
        $consultamedicos = DB::table('medicos')->where('med_cpf', $request->cpf)->get();
        $consulta = $consultamedicos->map(function($obj){
            return (array) $obj;
        })->toArray();
        return $consulta;
    }
    public function ConsultaProdutoEditar(Request $request){
        $consultaprodutos = DB::table('produtos')->where('prod_nome', $request->nomeproduto)->get();
        $consulta = $consultaprodutos->map(function($obj){
            return (array) $obj;
        })->toArray();
        return $consulta;
    }
    public function ConsultaPlanoEditar(Request $request){
        $consultaplanos = DB::table('planos')->where('plan_nome', $request->nomeplano)->get();
        $consulta = $consultaplanos->map(function($obj){
            return (array) $obj;
        })->toArray();
        return $consulta;
    }

    public function ConsultaContratoEditar(Request $request){
        $consultacontratos = DB::table('contratos')->where('cont_id', $request->cont_id)->get();
        $consulta = $consultacontratos->map(function($obj){
            return (array) $obj;
        })->toArray();
        return $consulta;
    }

    public function ConsultaAgendaMedico(Request $request){
        $consultaagenda = DB::table('medico_atendimento')->where('med_id', $request->med_id)->get();
        $consulta = $consultaagenda->map(function($obj){
            return (array) $obj;
        })->toArray();
        return $consulta;
    }

    public function ConsultaPessoaFornecedores(Request $request){
        return view('ConsultaPessoaFornecedor');
    }

    public function ConsultaPessoaFornecedoresDados(Request $request){
        $consultafis = DB::table('fornecedoresfis')->get();
        $consultajur = DB::table('fornecedoresjur')->get();
        $fornecedoresfis = $consultafis->map(function($obj){
            return (array) $obj;
          })->toArray();
        $fornecedoresjur = $consultajur->map(function($obj){
        return (array) $obj;
        })->toArray();
        $fornecedores = array_merge($fornecedoresfis, $fornecedoresjur);
        return $fornecedores;
    }

    public function ConsultaCadastroEspecialidade(Request $request){
        $consultaselectespec = DB::table('especialidades')->get();
        $espec = ["id"=>[], "nome"=>[]];
        foreach($consultaselectespec as $consultaselectespec){
            array_push($espec["id"], $consultaselectespec->espec_id);
            array_push($espec["nome"], $consultaselectespec->espec_nome);
        }
        return $espec;
    }

    public function ConsultaEspecialidadeMedico(Request $request){
        $consultaselecmedico = DB::table('medicos')->where('med_espec', $request->espec)->get();
        $medico = ["id"=>[], "nome"=>[]];
        foreach($consultaselecmedico as $consultaselecmedico){
            array_push($medico["id"], $consultaselecmedico->med_id);
            array_push($medico["nome"], $consultaselecmedico->med_nome);
        }
        return $medico;
    }
    public function ConsultaAgendadeMedico(Request $request){
        $data = explode('-',$request->dia);
        $data = $data[1] . "/" . $data[2] . "/" . $data[0];
        $datadia = date('l', strtotime($data));
        switch($datadia){
            case 'Monday':
                $datadia = 'medat_segunda';
            break;

            case 'Tuesday':
                $datadia = 'medat_terca';
            break;

            case 'Wednesday':
                $datadia = 'medat_quarta';
            break;
            
            case 'Thursday':
                $datadia = 'medat_quinta';
            break;
            
            case 'Friday':
                $datadia = 'medat_sexta';
            break;
            
            case 'Saturday':
                $datadia = 'medat_sabado';
            break;
            
            case 'Sunday':
                $datadia = 'medat_domingo';
            break;
        }
        $consultaagendamedico = DB::table('medico_atendimento')
        ->where('med_id', $request->medico)
        ->get();
        $consultaagenda = $consultaagendamedico->map(function($obj){
            return (array) $obj;
        })->toArray();
        if($consultaagenda[0][$datadia] != ""){
            $horasagenda = explode(' - ',$consultaagenda[0][$datadia]);
            $horas = [];
            $i = 0;
            $dataagr = date('d/m/y '.$horasagenda[0]);
            $data = explode(' ', $dataagr);
            array_push($horas, $data[1]);
            $datawhile = [$data[0]];
            while($datawhile[0] == $data[0] && $data[1] < $horasagenda[1]){
                $bgl = '+ '.$consultaagenda[0]['medat_tempoconsulta'].' minutes';
                $dataagr = strtotime($horas[$i] . $bgl);
                $dataagr = date('d/m/y H:i:s', $dataagr);
                $data = explode(' ', $dataagr);
                array_push($horas, $data[1]);
                $i++;
            }
            array_pop($horas);
            $consultaselecmedico = DB::table('medicos')->where('med_id', $request->medico)->get();
            $consulta = $consultaselecmedico->map(function($obj){
                return (array) $obj;
            })->toArray();
            $servicos = $consulta[0]['med_servi'];
            $servicos = explode(',', $servicos);
            $servi = ["id"=>[], "nome"=>[]];
            for($i = 0; $i < count($servicos); $i++){
                $consultaselectservi = DB::table('produtos')->where('prod_id', $servicos[$i])->get();
            
                foreach($consultaselectservi as $consultaselectservi){
                    array_push($servi["id"], $consultaselectservi->prod_id);
                    array_push($servi["nome"], $consultaselectservi->prod_nome);
                }

            }
            
            $retorno = [$consulta[0]['med_id'], $servi, $horas];
            return $retorno;
        }else{
            return 2;
        }
    }

    public function ConsultaAgendaHorario(Request $request){
        $horas = [];
        $data = explode('-',$request->data);
        $data = $data[2] . "/" . $data[1] . "/" . $data[0];
        $horadia = DB::table('agendas')
        ->where('age_data', 'like', $data.'%')
        ->where('age_med', $request->med_id)
        ->get();
        foreach($horadia as $horadia){
            if($horadia->age_idpessoa[4] == "1"){
                $consultapessoa = DB::table('pacientes')
                ->where('pac_id', substr($horadia->age_idpessoa, 0, 4))
                ->get();
                $consultapessoa2 = $consultapessoa->map(function($obj){
                    return (array) $obj;
                })->toArray();
            }else if($horadia->age_idpessoa[4] == "2"){
                $consultapessoa = DB::table('fornecedoresfis')
                ->where('forfis_id', substr($horadia->age_idpessoa, 0, 4))
                ->get();
                $consultapessoa2 = $consultapessoa->map(function($obj){
                    return (array) $obj;
                })->toArray();
            }else if($horadia->age_idpessoa[4] == "3"){
                $consultapessoa = DB::table('funcionarios')
                ->where('func_id', substr($horadia->age_idpessoa, 0, 4))
                ->get();
                $consultapessoa2 = $consultapessoa->map(function($obj){
                    return (array) $obj;
                })->toArray();
            }else if($horadia->age_idpessoa[4] == "4"){
                $consultapessoa = DB::table('clientesjur')
                ->where('clijur_id', substr($horadia->age_idpessoa, 0, 4))
                ->get();
                $consultapessoa2 = $consultapessoa->map(function($obj){
                    return (array) $obj;
                })->toArray();
            }else if($horadia->age_idpessoa[4] == "5"){
                $consultapessoa = DB::table('fornecedoresjur')
                ->where('forjur_id', substr($horadia->age_idpessoa, 0, 4))
                ->get();
                $consultapessoa2 = $consultapessoa->map(function($obj){
                    return (array) $obj;
                })->toArray();
            }
            array_push($horas, [$consultapessoa2[0]['clijur_nome'] . ' - ' . $horadia->age_contrato, $horadia->age_serv, $horadia->age_status , explode(' - ',$horadia->age_data)[1]]);
            
        }
        return $horas;
        
    }

    public function ConsultaAgendaNomeContrato(Request $request){
        $nome = [];
        $idtitu = [];
        $consultapacientes = DB::table('pacientes')->where('pac_nome', 'like', '%'.$request->nomepessoa.'%')->get();
        $consultafornecedoresfis = DB::table('fornecedoresfis')->where('forfis_nome', 'like', '%'. $request->nomepessoa.'%')->get();
        $consultafuncionarios = DB::table('funcionarios')->where('func_nome', 'like', '%'. $request->nomepessoa.'%')->get();
        $consultafornecedoresjur = DB::table('fornecedoresjur')->where('forjur_nome', 'like', '%'. $request->nomepessoa.'%')->get();
        $consultaclientesjur = DB::table('clientesjur')->where('clijur_nome', 'like', '%'. $request->nomepessoa.'%')->get();
        if(count($consultapacientes) !=0 ){
            $consultapessoa = $consultapacientes->map(function($obj){
                return (array) $obj;
            })->toArray();
            foreach($consultapessoa as $consultapessoa){
                array_push($nome, $consultapessoa['pac_nome']);
                array_push($idtitu, str_pad($consultapessoa['pac_id'] , 4 , '0' , STR_PAD_LEFT) . "1");
            }
            
        }if(count($consultafornecedoresfis) !=0 ){
            $consultapessoa = $consultafornecedoresfis->map(function($obj){
                return (array) $obj;
            })->toArray();
            foreach($consultapessoa as $consultapessoa){
                array_push($nome, $consultapessoa['forfis_nome']);
                array_push($idtitu, str_pad($consultapessoa['forfis_id'] , 4 , '0' , STR_PAD_LEFT) . "2");
            }

        }if(count($consultafuncionarios) !=0 ){
            $consultapessoa = $consultafuncionarios->map(function($obj){
                return (array) $obj;
            })->toArray();
            foreach($consultapessoa as $consultapessoa){
                array_push($nome, $consultapessoa['func_nome']);
                array_push($idtitu, str_pad($consultapessoa['func_id'] , 4 , '0' , STR_PAD_LEFT) . "3");
            }

        }if(count($consultaclientesjur) !=0 ){
            $consultapessoa = $consultaclientesjur->map(function($obj){
                return (array) $obj;
            })->toArray();
            foreach($consultapessoa as $consultapessoa){
                array_push($nome, $consultapessoa['clijur_nome']);
                array_push($idtitu, str_pad($consultapessoa['clijur_id'] , 4 , '0' , STR_PAD_LEFT) . "4");
            }
            
        }if(count($consultafornecedoresjur) !=0 ){
            $consultapessoa = $consultafornecedoresjur->map(function($obj){
                return (array) $obj;
            })->toArray();
            foreach($consultapessoa as $consultapessoa){
                array_push($nome, $consultapessoa['forjur_nome']);
                array_push($idtitu, str_pad($consultapessoa['forjur_id'] , 4 , '0' , STR_PAD_LEFT) . "5");
            }
            
        }
        $pessoas = [];
        for($i = 0; $i < count($idtitu); $i++){
            array_push($pessoas, [$idtitu[$i], $nome[$i]]);
        }
        $result = [];
        foreach($pessoas as $pessoas){
            $consultacontratos = DB::table('contratosobs')
            ->where('contobs_idpessoa', 'like', '%'.$pessoas[0].'%')
            ->where('contobs_status', 'Ativo')
            ->get();
            $consultacontratos2 = $consultacontratos->map(function($obj){
                return (array) $obj;
            })->toArray();
            if(count($consultacontratos2) > 0){
                for($i = 0; $i < count($consultacontratos2); $i++){
                    array_push($result, [$pessoas[1], $consultacontratos2[$i]['contobs_id']]);
                }
            }
        }
        return $result;
    }

    public function ConsultaCadastroServicoMedico(Request $request){
        $consultaselectespec = DB::table('especialidades')->where('espec_id', $request->espec)->get();
        $consultaselectcate = DB::table('categorias')->where('cate_nome', $consultaselectespec[0]->espec_nome)->get();
        $consultaselectservi = DB::table('produtos')->where('prod_cate', $consultaselectcate[0]->cate_id)->where('prod_tipo', 'Servico')->get();
        $servi = ["id"=>[], "nome"=>[]];
        foreach($consultaselectservi as $consultaselectservi){
            array_push($servi["id"], $consultaselectservi->prod_id);
            array_push($servi["nome"], $consultaselectservi->prod_nome);
        }
        return $servi;
    }

    public function ConsultaCadastroItem(Request $request){
        $consultaselectprod = DB::table('produtos')->where('prod_tipo','Item')->get();
        $prod = ["id"=>[], "nome"=>[], "valor"=>[]];
        foreach($consultaselectprod as $consultaselectprod){
            array_push($prod["id"], $consultaselectprod->prod_id);
            array_push($prod["nome"], $consultaselectprod->prod_nome);
            array_push($prod["valor"], $consultaselectprod->prod_valor);
        }
        return $prod;
    }

    public function ConsultaCadastroServico(Request $request){
        $consultaselectprod = DB::table('produtos')->where('prod_tipo','Servico')->get();
        $prod = ["id"=>[], "nome"=>[], "valor"=>[]];
        foreach($consultaselectprod as $consultaselectprod){
            array_push($prod["id"], $consultaselectprod->prod_id);
            array_push($prod["nome"], $consultaselectprod->prod_nome);
            array_push($prod["valor"], $consultaselectprod->prod_valor);
        }
        return $prod;
    }

    
}
