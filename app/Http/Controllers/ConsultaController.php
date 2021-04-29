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
        $cpfcnpj = [];
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
                array_push($cpfcnpj, $consultapessoa['pac_cpf']);
            }
            
        }if(count($consultafornecedoresfis) !=0 ){
            $consultapessoa = $consultafornecedoresfis->map(function($obj){
                return (array) $obj;
            })->toArray();
            foreach($consultapessoa as $consultapessoa){
                array_push($nome, $consultapessoa['forfis_nome']);
                array_push($cpfcnpj, $consultapessoa['forfis_cpf']);
            }

        }if(count($consultafuncionarios) !=0 ){
            $consultapessoa = $consultafuncionarios->map(function($obj){
                return (array) $obj;
            })->toArray();
            foreach($consultapessoa as $consultapessoa){
                array_push($nome, $consultapessoa['func_nome']);
                array_push($cpfcnpj, $consultapessoa['func_cpf']);
            }

        }if(count($consultaclientesjur) !=0 ){
            $consultapessoa = $consultaclientesjur->map(function($obj){
                return (array) $obj;
            })->toArray();
            foreach($consultapessoa as $consultapessoa){
                array_push($nome, $consultapessoa['clijur_nome']);
                array_push($cpfcnpj, $consultapessoa['clijur_cnpj']);
            }
            
        }if(count($consultafornecedoresjur) !=0 ){
            $consultapessoa = $consultafornecedoresjur->map(function($obj){
                return (array) $obj;
            })->toArray();
            foreach($consultapessoa as $consultapessoa){
                array_push($nome, $consultapessoa['forjur_nome']);
                array_push($cpfcnpj, $consultapessoa['forjur_cnpj']);
            }
            
        }
        $cpfcnpj2 = [];
        $cpfcnpj3 = [];
        $idcpfcnpj = [];
        for($i = 0; $i<count($cpfcnpj); $i++){
            $cpfcnpj3 = $cpfcnpj2;
            array_push($cpfcnpj2, $cpfcnpj[$i]);
            $cpfcnpj2 = array_unique($cpfcnpj2);
            if($cpfcnpj2 != $cpfcnpj3){
                array_push($idcpfcnpj, $i);
            }
        }
        $pessoas = [];
        for($i = 0; $i < count($cpfcnpj2); $i++){
            array_push($pessoas, [$cpfcnpj2[$i], $nome[$idcpfcnpj[$i]]]);
        }
        
        foreach($pessoas as $pessoas){
            $consultacontratos = DB::table('contratos')->where('cont_id', 'like', '%'.$request->cont_id.'%')
            ->where('cont_titu', 'like', '%'.$pessoas[0].'%')
            ->get();
            $consulta = $consultacontratos->map(function($obj){
                return (array) $obj;
            })->toArray();
            
            for($i = 0; $i<count($consulta); $i++){
                $consultaplanos = DB::table('planos')->where('plan_id', $consulta[0]['cont_plano'])->get();
                $consultaplano = $consultaplanos->map(function($obj){
                    return (array) $obj;
                })->toArray();
                array_push($consultafinal, [$consulta[$i]['cont_id'], $pessoas[1], $consultaplano[0]['plan_nome']]);
            }
            
        }
        return $consultafinal;
        
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
