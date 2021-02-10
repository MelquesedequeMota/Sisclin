<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CadastroController extends Controller
{
    public function CadastroFuncionario(Request $request){
        if($request->input('nome') != ""){
            $cadastrarfunc = DB::table('funcionarios')->insert(
                [
                 'func_nome' => $request->input('nome'),
                 'func_cpf' => $request->input('cpf'), 
                 'func_cep' => $request->input('cep'),
                 'func_endereco' => $request->input('endereco'),
                 'func_bairro' => $request->input('bairro'), 
                 'func_cidade' => $request->input('cidade'), 
                 'func_estado' => $request->input('estado'),
                 'func_pais' => $request->input('pais'),
                 'func_datanasc' => $request->input('datanasc'),
                 'func_tel1' => $request->input('tel1'),
                 'func_tel2' => $request->input('tel2'),
                 'func_celular' => $request->input('celular'),
                 'func_sexo' => $request->input('sexo'),
                 'func_nomepais' => $request->input('nomepais'),
                 'func_rg' => $request->input('rg'),
                 'func_email' => $request->input('email'),
                 ]
            );
            if($cadastrarfunc==1){
                return view('Parabens');
            }
        }
        return view('Cadastro');
    }
}
