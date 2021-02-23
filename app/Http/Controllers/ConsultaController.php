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
}
