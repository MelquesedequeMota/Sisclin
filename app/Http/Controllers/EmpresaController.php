<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use App\Models\Usuarios;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Validator;
use Datetime;
use Illuminate\Support\Facades\Auth;

class EmpresaController extends Controller
{
    public function Empresa(Request $request){
        return view('Empresa');
    }

    public function BuscarDadosEmpresa(Request $request){
        $consultaempresa = DB::table('empresas')->where('empresa_id', '1')->get();
        $consulta = $consultaempresa->map(function($obj){
            return (array) $obj;
        })->toArray();
        return $consulta;
    }

    public function AtualizarEmpresa(Request $request){
        // dd($request->all());
            
        $edempresa = DB::table('empresas')
            ->where('empresa_id', '1')
            ->update([
                "empresa_nome" => $request->nome,
                "empresa_cnpj" => $request->cnpj,
                "empresa_cep" => $request->cep,
                "empresa_logradouro" => $request->logradouro,
                "empresa_num" => $request->num,
                "empresa_complemento" => $request->complemento,
                "empresa_bairro" => $request->bairro,
                "empresa_cidade" => $request->cidade,
                "empresa_uf" => $request->uf,
                "empresa_contato1" => $request->contato1,
                "empresa_contato2" => $request->contato2,
                "empresa_email" => $request->email,
                "empresa_nomeres" => $request->nomeres,
                "empresa_emailres" => $request->emailres,
                "empresa_telres" => $request->telres,
            ]);
        if($edempresa == 1){
            return 1;
        }else{
            return 0;
        }
    }
}
