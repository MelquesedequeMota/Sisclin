<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GrupoController extends Controller
{
    public function Grupos(Request $request){
        return view('Grupos');
    }

    public function ConsultaGrupos(Request $request){
        // dd($request->all());

        $grupos = DB::table('grupos')->get();

        $grupos2 = $grupos->map(function($obj){
            return (array) $obj;
        })->toArray();
        
        return $grupos2;
    }

    public function ConsultaUserDados(Request $request){
        // dd($request->all());

        $dados = ['name' => [], 'username' => [], 'id' => [], 'nomegrupo' => []];

        $consultapacientes = DB::table('users')->where('name', 'like', '%'.$request->nome.'%')->get();

        foreach($consultapacientes as $consultapacientes){
            $grupo = DB::table('grupos')->where('idgrupo', $consultapacientes->user_tipo)->first();
            array_push($dados['name'], $consultapacientes->name);
            array_push($dados['username'], $consultapacientes->username);
            array_push($dados['id'], $consultapacientes->id);
            array_push($dados['nomegrupo'], $grupo->nomegrupo);
        }
        // dd($dados);
        
        return $dados;
    }

    public function ConsultaGruposDados(Request $request){
        // dd($request->all());

        $dados = ['name' => [], 'username' => [], 'id' => [], 'nomegrupo' => []];

        $consultapacientes = DB::table('users')->where('user_tipo', $request->grupo)->get();

        foreach($consultapacientes as $consultapacientes){
            array_push($dados['name'], $consultapacientes->name);
            array_push($dados['username'], $consultapacientes->username);
            array_push($dados['id'], $consultapacientes->id);
        }
        $grupo = DB::table('grupos')->where('idgrupo', $request->grupo)->first();
        array_push($dados['nomegrupo'], $grupo->nomegrupo);
        // dd($dados);
        
        return $dados;
    }

    public function ConsultaGruposPermissoes(Request $request){
        // dd($request->all());

        // $dados = ['name' => [], 'username' => [], 'id' => [], 'nomegrupo' => []];

        $consultapermissoes = DB::table('grupos')->where('idgrupo', $request->grupo)->first()->permissaogrupo;

        
        
        return explode(',',$consultapermissoes);
    }

    public function CadastrarGrupo(Request $request){
        // dd($request->all());
        if($request->permissoesgrupo != null){
            $permissaogrupo = implode(',', $request->permissoesgrupo);
        }else{
            $permissaogrupo = '';
        }
        
        // dd($permissaogrupo);
        $novogrupo = DB::table('grupos')->insert([
            'nomegrupo' => $request->nomegrupo,
            'permissaogrupo' => $permissaogrupo
        ]);
        if($novogrupo == 1){
            $ultimogrupo = DB::table('grupos')->where('nomegrupo', $request->nomegrupo)->first()->idgrupo;
            foreach($request->userid as $userid){
                $updateuser = DB::table('users')->where('id', $userid)->update([
                    'user_tipo' => $ultimogrupo 
                ]);
            }
            return 1;
            
        }else{
            return 0;
        }
    }

    public function EditarGrupo(Request $request){
        // dd($request->all());

        $nomegrupo = DB::table('grupos')->where('idgrupo', $request->grupoatual)
        ->update([
            "nomegrupo" => $request->nomegrupo,
        ]);

        foreach($request->userid as $userid){
            $usuario = DB::table('users')->where('id', $userid)
            ->update([
                "user_tipo" => $request->grupoatual,
            ]);
        }

        $permissoes = DB::table('grupos')->where('idgrupo', $request->grupoatual)
        ->update([
            "permissaogrupo" => implode(',',$request->permissoesgrupo),
        ]);
        
        return 1;
    }

    public function BuscarPermissoes(Request $request){
        // dd($request->all());

        $permissaogrupo = DB::table('grupos')->where('idgrupo', $request->userid)->first()->permissaogrupo;

        // dd($permissaogrupo);
        
        return json_encode($permissaogrupo);
    }
}
