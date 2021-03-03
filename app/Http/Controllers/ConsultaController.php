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

    public function ConsultaPessoa(Request $request){
        return view('ConsultaPessoa');
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
}