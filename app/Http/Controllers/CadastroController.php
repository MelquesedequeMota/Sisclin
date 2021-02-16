<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CadastroController extends Controller
{
    public function CadastroPessoa(Request $request){
        return view('CadastroPessoa');
    }
    public function CadastroDepartamento(Request $request){
        $cadastrardep = DB::table('departamentos')->insert([
            'dep_nome' => $request->nome,
        ]);
        if($cadastrardep == 1){
            return 1;
        }else{
            return 0;
        }
    }

    public function CadastroEspecialidade(Request $request){
        $cadastrarespec = DB::table('especialidades')->insert([
            'espec_nome' => $request->novaespec,
        ]);
        if($cadastrarespec == 1){
            return 1;
        }else{
            return 0;
        }
    }

    public function CadastroPaciente(Request $request){
        $cadastrarpaciente = DB::table('pacientes')->insert([
            'pac_nome' => $request->nome,
            'pac_cpf' => $request->cpf,
            'pac_estadocivil' => $request->estadocivil,
            'pac_sexo' => $request->sexo,
            'pac_datanasc' => $request->datanasc,
            'pac_profissao' => $request->prof,
            'pac_cep' => $request->cep,
            'pac_endereco' => $request->endereco,
            'pac_bairro' => $request->bairro,
            'pac_cidade' => $request->cidade,
            'pac_estado' => $request->estado,
            'pac_tel1' => $request->tel1,
            'pac_tel2' => $request->tel2,
            'pac_celular' => $request->celular,
            'pac_rg' => $request->rg,
            'pac_email' => $request->email,
            'pac_nomeres' => $request->nomeres,
            'pac_telres' => $request->telres,
            'pac_obseti' => $request->obseti,
            'pac_situ' => $request->situpac,
            'pac_obj' => $request->obj,
            'pac_obs' => $request->obs,
        ]);
        if($cadastrarpaciente == 1){
            return 1;
        }else{
            return 0;
        }
    }

    public function CadastroFornecedorFisico(Request $request){
        $cadastrarfornecedor = DB::table('fornecedoresfis')->insert([
            'forfis_nome' => $request->nome,
            'forfis_cpf' => $request->cpf,
            'forfis_estadocivil' => $request->estadocivil,
            'forfis_sexo' => $request->sexo,
            'forfis_datanasc' => $request->datanasc,
            'forfis_cep' => $request->cep,
            'forfis_endereco' => $request->endereco,
            'forfis_bairro' => $request->bairro,
            'forfis_cidade' => $request->cidade,
            'forfis_estado' => $request->estado,
            'forfis_tel1' => $request->tel1,
            'forfis_tel2' => $request->tel2,
            'forfis_celular' => $request->celular,
            'forfis_rg' => $request->rg,
            'forfis_email' => $request->email,
            'forfis_website' => $request->website,
            'forfis_razaosocial' => $request->razaosocial,
            'forfis_areaatuacao' => $request->areaatuacao,
            'forfis_obs' => $request->obs,
        ]);
        if($cadastrarfornecedor == 1){
            return 1;
        }else{
            return 0;
        }
    }
}
