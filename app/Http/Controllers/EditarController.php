<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Pacientes;
use App\Models\FornecedoresFisicos;
use App\Models\Funcionarios;
use App\Models\FornecedoresJuridicos;
use App\Models\ClientesJuridicos;
use App\Models\Medicos;
use App\Models\Medico_Atendimento;
use App\Models\Produtos;
use App\Models\Planos;
use App\Models\Contratos;
use App\Models\ContratosObs;
use App\Models\Laboratorios;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class EditarController extends Controller
{
    public function EditarPaciente(Request $request){
        // dd($request->all());
        $idatual = substr($request->id, 0, -1);
        
        // dd($idatual, $request->id, substr($request->id, 0, -1));
        // $paciente = DB::table('pacientes')->where('pac_cpf', $request->cpf)->get()->map(function($obj){
        //     return (array) $obj;
        // })->toArray();

        // if(count($paciente) > 0){
        if($idatual != ''){
            $edpaciente = Pacientes::find($idatual);
        }else{
            $edpaciente = '';
        }

        // dd($edpaciente);
        
        $fornecedor = DB::table('fornecedoresfis')->where('forfis_cpf', $request->cpf)->get()->map(function($obj){
            return (array) $obj;
        })->toArray();

        if(count($fornecedor) > 0){
            $edfornecedor = FornecedoresFisicos::find($fornecedor[0]['forfis_id']);
        }else{
            $edfornecedor = '';
        }

        $funcionario = DB::table('funcionarios')->where('func_cpf', $request->cpf)->get()->map(function($obj){
            return (array) $obj;
        })->toArray();

        if(count($funcionario) > 0){
            $edfuncionario = Funcionarios::find($funcionario[0]['func_id']);
        }else{
            $edfuncionario = '';
        }

        if($edfornecedor){
            $edfornecedor->forfis_nome = $request->nome;
            $edfornecedor->forfis_cpf = $request->cpf;
            $edfornecedor->forfis_estadocivil = $request->estadocivil;
            $edfornecedor->forfis_sexo = $request->sexo;
            $edfornecedor->forfis_datanasc = $request->datanasc;
            $edfornecedor->forfis_cep = $request->cep;
            $edfornecedor->forfis_logradouro = $request->logradouro;
            $edfornecedor->forfis_num = $request->num;
            $edfornecedor->forfis_complemento = $request->complemento;
            $edfornecedor->forfis_bairro = $request->bairro;
            $edfornecedor->forfis_cidade = $request->cidade;
            $edfornecedor->forfis_uf = $request->uf;
            $edfornecedor->forfis_tel1 = $request->tel1;
            $edfornecedor->forfis_tel2 = $request->tel2;
            $edfornecedor->forfis_celular = $request->celular;
            $edfornecedor->forfis_rg = $request->rg;
            $edfornecedor->forfis_email = $request->email;
            $edfornecedor->forfis_altura = $request->altura;
            $edfornecedor->forfis_peso = $request->peso;
            $edfornecedor->forfis_pa = $request->pa;
            $edfornecedor->forfis_tiposangue = $request->tiposangue;
            if($edfornecedor->save()){

            }else{
                return 0;
            }
        }
        if($edfuncionario){
            $edfuncionario->func_nome = $request->nome;
            $edfuncionario->func_cpf = $request->cpf;
            $edfuncionario->func_estadocivil = $request->estadocivil;
            $edfuncionario->func_sexo = $request->sexo;
            $edfuncionario->func_datanasc = $request->datanasc;
            $edfuncionario->func_cep = $request->cep;
            $edfuncionario->func_logradouro = $request->logradouro;
            $edfuncionario->func_num = $request->num;
            $edfuncionario->func_complemento = $request->complemento;
            $edfuncionario->func_bairro = $request->bairro;
            $edfuncionario->func_cidade = $request->cidade;
            $edfuncionario->func_uf = $request->uf;
            $edfuncionario->func_tel1 = $request->tel1;
            $edfuncionario->func_tel2 = $request->tel2;
            $edfuncionario->func_celular = $request->celular;
            $edfuncionario->func_rg = $request->rg;
            $edfuncionario->func_email = $request->email;
            $edfuncionario->func_altura = $request->altura;
            $edfuncionario->func_peso = $request->peso;
            $edfuncionario->func_pa = $request->pa;
            $edfuncionario->func_tiposangue = $request->tiposangue;
            if($edfuncionario->save()){

            }else{
                return 0;
            }
        }

        if($edpaciente){
            $edpaciente->pac_nome = $request->nome;
            $edpaciente->pac_cpf = $request->cpf;
            $edpaciente->pac_estadocivil = $request->estadocivil;
            $edpaciente->pac_sexo = $request->sexo;
            $edpaciente->pac_datanasc = $request->datanasc;
            $edpaciente->pac_profissao = $request->prof;
            $edpaciente->pac_cep = $request->cep;
            $edpaciente->pac_logradouro = $request->logradouro;
            $edpaciente->pac_num = $request->num;
            $edpaciente->pac_complemento = $request->complemento;
            $edpaciente->pac_bairro = $request->bairro;
            $edpaciente->pac_cidade = $request->cidade;
            $edpaciente->pac_uf = $request->uf;
            $edpaciente->pac_tel1 = $request->tel1;
            $edpaciente->pac_tel2 = $request->tel2;
            $edpaciente->pac_celular = $request->celular;
            $edpaciente->pac_rg = $request->rg;
            $edpaciente->pac_email = $request->email;
            $edpaciente->pac_nomeres = $request->nomeres;
            $edpaciente->pac_telres = $request->telres;
            $edpaciente->pac_obseti = $request->obseti;
            $edpaciente->pac_situ = $request->situpac;
            $edpaciente->pac_obj = $request->obj;
            $edpaciente->pac_obs = $request->obs;
            $edpaciente->pac_altura = $request->altura;
            $edpaciente->pac_peso = $request->peso;
            $edpaciente->pac_pa = $request->pa;
            $edpaciente->pac_tiposangue = $request->tiposangue;
            if($edpaciente->save()){
                return 1;
            }else{
                return 0;
            }
        }
    }

    public function EditarFornecedorFisico(Request $request){
        $paciente = DB::table('pacientes')->where('pac_cpf', $request->cpf)->get()->map(function($obj){
            return (array) $obj;
        })->toArray();

        if(count($paciente) > 0){
            $edpaciente = Pacientes::find($paciente[0]['pac_id']);
        }else{
            $edpaciente = '';
        }
        
        $fornecedor = DB::table('fornecedoresfis')->where('forfis_cpf', $request->cpf)->get()->map(function($obj){
            return (array) $obj;
        })->toArray();

        if(count($fornecedor) > 0){
            $edfornecedor = FornecedoresFisicos::find($fornecedor[0]['forfis_id']);
        }else{
            $edfornecedor = '';
        }

        $funcionario = DB::table('funcionarios')->where('func_cpf', $request->cpf)->get()->map(function($obj){
            return (array) $obj;
        })->toArray();

        if(count($funcionario) > 0){
            $edfuncionario = Funcionarios::find($funcionario[0]['func_id']);
        }else{
            $edfuncionario = '';
        }

        if($edpaciente != ''){
            $edpaciente->pac_nome = $request->nome;
            $edpaciente->pac_cpf = $request->cpf;
            $edpaciente->pac_estadocivil = $request->estadocivil;
            $edpaciente->pac_sexo = $request->sexo;
            $edpaciente->pac_datanasc = $request->datanasc;
            $edpaciente->pac_cep = $request->cep;
            $edpaciente->pac_logradouro = $request->logradouro;
            $edpaciente->pac_num = $request->num;
            $edpaciente->pac_complemento = $request->complemento;
            $edpaciente->pac_bairro = $request->bairro;
            $edpaciente->pac_cidade = $request->cidade;
            $edpaciente->pac_uf = $request->uf;
            $edpaciente->pac_tel1 = $request->tel1;
            $edpaciente->pac_tel2 = $request->tel2;
            $edpaciente->pac_celular = $request->celular;
            $edpaciente->pac_rg = $request->rg;
            $edpaciente->pac_email = $request->email;
            $edpaciente->pac_altura = $request->altura;
            $edpaciente->pac_peso = $request->peso;
            $edpaciente->pac_pa = $request->pa;
            $edpaciente->pac_tiposangue = $request->tiposangue;
            if($edpaciente->save()){

            }else{
                return 0;
            }
        }
        if($edfuncionario != ''){
            $edfuncionario->func_nome = $request->nome;
            $edfuncionario->func_cpf = $request->cpf;
            $edfuncionario->func_estadocivil = $request->estadocivil;
            $edfuncionario->func_sexo = $request->sexo;
            $edfuncionario->func_datanasc = $request->datanasc;
            $edfuncionario->func_cep = $request->cep;
            $edfuncionario->func_logradouro = $request->logradouro;
            $edfuncionario->func_num = $request->num;
            $edfuncionario->func_complemento = $request->complemento;
            $edfuncionario->func_bairro = $request->bairro;
            $edfuncionario->func_cidade = $request->cidade;
            $edfuncionario->func_uf = $request->uf;
            $edfuncionario->func_tel1 = $request->tel1;
            $edfuncionario->func_tel2 = $request->tel2;
            $edfuncionario->func_celular = $request->celular;
            $edfuncionario->func_rg = $request->rg;
            $edfuncionario->func_email = $request->email;
            $edfuncionario->func_altura = $request->altura;
            $edfuncionario->func_peso = $request->peso;
            $edfuncionario->func_pa = $request->pa;
            $edfuncionario->func_tiposangue = $request->tiposangue;
            if($edfuncionario->save()){

            }else{
                return 0;
            }
        }

        if($edfornecedor != ''){
            $edfornecedor->forfis_nome = $request->nome;
            $edfornecedor->forfis_cpf = $request->cpf;
            $edfornecedor->forfis_estadocivil = $request->estadocivil;
            $edfornecedor->forfis_sexo = $request->sexo;
            $edfornecedor->forfis_datanasc = $request->datanasc;
            $edfornecedor->forfis_cep = $request->cep;
            $edfornecedor->forfis_logradouro = $request->logradouro;
            $edfornecedor->forfis_num = $request->num;
            $edfornecedor->forfis_complemento = $request->complemento;
            $edfornecedor->forfis_bairro = $request->bairro;
            $edfornecedor->forfis_cidade = $request->cidade;
            $edfornecedor->forfis_uf = $request->uf;
            $edfornecedor->forfis_tel1 = $request->tel1;
            $edfornecedor->forfis_tel2 = $request->tel2;
            $edfornecedor->forfis_celular = $request->celular;
            $edfornecedor->forfis_rg = $request->rg;
            $edfornecedor->forfis_email = $request->email;
            $edfornecedor->forfis_website = $request->website;
            $edfornecedor->forfis_razaosocial = $request->razaosocial;
            $edfornecedor->forfis_areaatuacao = $request->areaatuacao;
            $edfornecedor->forfis_obs = $request->obs;
            $edfornecedor->forfis_altura = $request->altura;
            $edfornecedor->forfis_peso = $request->peso;
            $edfornecedor->forfis_pa = $request->pa;
            $edfornecedor->forfis_tiposangue = $request->tiposangue;
            if($edfornecedor->save()){
                return 1;
            }else{
                return 0;
            }
        }
    }

    public function EditarFuncionario(Request $request){
        // dd($request->all());
        $paciente = DB::table('pacientes')->where('pac_cpf', $request->cpf)->get()->map(function($obj){
            return (array) $obj;
        })->toArray();

        if(count($paciente) > 0){
            $edpaciente = Pacientes::find($paciente[0]['pac_id']);
        }else{
            $edpaciente = '';
        }
        
        $fornecedor = DB::table('fornecedoresfis')->where('forfis_cpf', $request->cpf)->get()->map(function($obj){
            return (array) $obj;
        })->toArray();

        if(count($fornecedor) > 0){
            $edfornecedor = FornecedoresFisicos::find($fornecedor[0]['forfis_id']);
        }else{
            $edfornecedor = '';
        }

        $funcionario = DB::table('funcionarios')->where('func_cpf', $request->cpf)->get()->map(function($obj){
            return (array) $obj;
        })->toArray();

        if(count($funcionario) > 0){
            $edfuncionario = Funcionarios::find($funcionario[0]['func_id']);
        }else{
            $edfuncionario = '';
        }

        if($edpaciente != ''){
            $edpaciente->pac_nome = $request->nome;
            $edpaciente->pac_cpf = $request->cpf;
            $edpaciente->pac_estadocivil = $request->estadocivil;
            $edpaciente->pac_sexo = $request->sexo;
            $edpaciente->pac_datanasc = $request->datanasc;
            $edpaciente->pac_cep = $request->cep;
            $edpaciente->pac_logradouro = $request->logradouro;
            $edpaciente->pac_num = $request->num;
            $edpaciente->pac_complemento = $request->complemento;
            $edpaciente->pac_bairro = $request->bairro;
            $edpaciente->pac_cidade = $request->cidade;
            $edpaciente->pac_uf = $request->uf;
            $edpaciente->pac_tel1 = $request->tel1;
            $edpaciente->pac_tel2 = $request->tel2;
            $edpaciente->pac_celular = $request->celular;
            $edpaciente->pac_rg = $request->rg;
            $edpaciente->pac_email = $request->email;
            $edpaciente->pac_altura = $request->altura;
            $edpaciente->pac_peso = $request->peso;
            $edpaciente->pac_pa = $request->pa;
            $edpaciente->pac_tiposangue = $request->tiposangue;
            if($edpaciente->save()){

            }else{
                return 0;
            }
        }
        if($edfornecedor != ''){
            $edfornecedor->forfis_nome = $request->nome;
            $edfornecedor->forfis_cpf = $request->cpf;
            $edfornecedor->forfis_estadocivil = $request->estadocivil;
            $edfornecedor->forfis_sexo = $request->sexo;
            $edfornecedor->forfis_datanasc = $request->datanasc;
            $edfornecedor->forfis_cep = $request->cep;
            $edfornecedor->forfis_logradouro = $request->logradouro;
            $edfornecedor->forfis_num = $request->num;
            $edfornecedor->forfis_complemento = $request->complemento;
            $edfornecedor->forfis_bairro = $request->bairro;
            $edfornecedor->forfis_cidade = $request->cidade;
            $edfornecedor->forfis_uf = $request->uf;
            $edfornecedor->forfis_tel1 = $request->tel1;
            $edfornecedor->forfis_tel2 = $request->tel2;
            $edfornecedor->forfis_celular = $request->celular;
            $edfornecedor->forfis_rg = $request->rg;
            $edfornecedor->forfis_email = $request->email;
            $edfornecedor->forfis_altura = $request->altura;
            $edfornecedor->forfis_peso = $request->peso;
            $edfornecedor->forfis_pa = $request->pa;
            $edfornecedor->forfis_tiposangue = $request->tiposangue;
            if($edfornecedor->save()){

            }else{
                return 0;
            }
        }

        if($edfuncionario != ''){
            $edfuncionario->func_nome = $request->nome;
            $edfuncionario->func_cpf = $request->cpf;
            $edfuncionario->func_rg = $request->rg;
            $edfuncionario->func_estadocivil = $request->estadocivil;
            $edfuncionario->func_sexo = $request->sexo;
            $edfuncionario->func_datanasc = $request->datanasc;
            $edfuncionario->func_cep = $request->cep;
            $edfuncionario->func_logradouro = $request->logradouro;
            $edfuncionario->func_num = $request->num;
            $edfuncionario->func_complemento = $request->complemento;
            $edfuncionario->func_bairro = $request->bairro;
            $edfuncionario->func_cidade = $request->cidade;
            $edfuncionario->func_uf = $request->uf;
            $edfuncionario->func_tel1 = $request->tel1;
            $edfuncionario->func_tel2 = $request->tel2;
            $edfuncionario->func_celular = $request->celular;
            $edfuncionario->func_email = $request->email;
            $edfuncionario->func_dep = $request->dep;
            $edfuncionario->func_setor = $request->setor;
            $edfuncionario->func_func = $request->func;
            $edfuncionario->func_ctps = $request->ctps;
            $edfuncionario->func_serie = $request->serie;
            $edfuncionario->func_pis = $request->pis;
            $edfuncionario->func_ufctps = $request->ufctps;
            $edfuncionario->func_salario = doubleval($request->salario);
            $edfuncionario->func_conjugue = $request->conjugue;
            $edfuncionario->func_nomepai = $request->nomepai;
            $edfuncionario->func_nomemae = $request->nomemae;
            $edfuncionario->func_obs = $request->obs;
            $edfuncionario->func_altura = $request->altura;
            $edfuncionario->func_peso = $request->peso;
            $edfuncionario->func_pa = $request->pa;
            $edfuncionario->func_tiposangue = $request->tiposangue;
            if($edfuncionario->save()){
                if($request->user_senha == null){
                    return 1;
                }else{
                    $eduser = User::where('user_id', strval($funcionario[0]['func_id']) . '3')->first();
                    // dd($eduser, strval($funcionario[0]['func_id']) . '3');
                    $eduser->username = $request->user_name;
                    $eduser->password = Hash::make($request->user_senha);
                    if($request->user_tipo){
                        $eduser->user_tipo = $request->user_tipo;
                    }
                    if($eduser->save()){
                        return 1;
                    }
                }
            }else{
                return 0;
            }
        }
    }

    public function EditarFornecedorJuridico(Request $request){
        $fornecedor = DB::table('fornecedoresjur')->where('forjur_cnpj', $request->cnpj)->get()->map(function($obj){
            return (array) $obj;
        })->toArray();
        $edfornecedor = FornecedoresJuridicos::find($fornecedor[0]['forjur_id']);

        $clientesjur = DB::table('clientesjur')->where('clijur_cnpj', $request->cnpj)->get()->map(function($obj){
            return (array) $obj;
        })->toArray();

        if(count($clientesjur) > 0){
            $edclientejur = ClientesJuridicos::find($clientesjur[0]['clijur_id']);
        }else{
            $edclientejur = '';
        }

        if($edclientejur != ''){
            $edclientejur->clijur_nome = $request->nome;
            $edclientejur->clijur_cnpj = $request->cnpj;
            $edclientejur->clijur_cep = $request->cep;
            $edclientejur->clijur_logradouro = $request->logradouro;
            $edclientejur->clijur_num = $request->num;
            $edclientejur->clijur_complemento = $request->complemento;
            $edclientejur->clijur_bairro = $request->bairro;
            $edclientejur->clijur_cidade = $request->cidade;
            $edclientejur->clijur_uf = $request->uf;
            $edclientejur->clijur_tel1 = $request->tel1;
            $edclientejur->clijur_tel2 = $request->tel2;
            $edclientejur->clijur_celular = $request->celular;
            $edclientejur->clijur_email = $request->email;
            $edclientejur->clijur_website = $request->website;
            $edclientejur->clijur_inscest = $request->inscest;
            $edclientejur->clijur_razaosocial = $request->razaosocial;
            $edclientejur->clijur_areaatuacao = $request->areaatuacao;
            $edclientejur->clijur_nomerep = $request->nomerep;
            $edclientejur->clijur_emailrep = $request->emailrep;
            $edclientejur->clijur_contatorep = $request->contatorep;
            $edclientejur->clijur_obs = $request->obs;
            if($edclientejur->save()){
            }else{
                return 0;
            }
        }

        if($edfornecedor){
            $edfornecedor->forjur_nome = $request->nome;
            $edfornecedor->forjur_cnpj = $request->cnpj;
            $edfornecedor->forjur_cep = $request->cep;
            $edfornecedor->forjur_logradouro = $request->logradouro;
            $edfornecedor->forjur_num = $request->num;
            $edfornecedor->forjur_complemento = $request->complemento;
            $edfornecedor->forjur_bairro = $request->bairro;
            $edfornecedor->forjur_cidade = $request->cidade;
            $edfornecedor->forjur_uf = $request->uf;
            $edfornecedor->forjur_tel1 = $request->tel1;
            $edfornecedor->forjur_tel2 = $request->tel2;
            $edfornecedor->forjur_celular = $request->celular;
            $edfornecedor->forjur_email = $request->email;
            $edfornecedor->forjur_website = $request->website;
            $edfornecedor->forjur_inscest = $request->inscest;
            $edfornecedor->forjur_razaosocial = $request->razaosocial;
            $edfornecedor->forjur_areaatuacao = $request->areaatuacao;
            $edfornecedor->forjur_nomerep = $request->nomerep;
            $edfornecedor->forjur_emailrep = $request->emailrep;
            $edfornecedor->forjur_contatorep = $request->contatorep;
            $edfornecedor->forjur_obs = $request->obs;
            if($edfornecedor->save()){
                return 1;
            }else{
                return 0;
            }
        }
    }

    public function EditarClienteJuridico(Request $request){
        $fornecedor = DB::table('fornecedoresjur')->where('forjur_cnpj', $request->cnpj)->get()->map(function($obj){
            return (array) $obj;
        })->toArray();
        if(count($fornecedor) > 0){
            $edfornecedor = FornecedoresJuridicos::find($fornecedor[0]['forjur_id']);
        }else{
            $edfornecedor = '';
        }

        $clientesjur = DB::table('clientesjur')->where('clijur_cnpj', $request->cnpj)->get()->map(function($obj){
            return (array) $obj;
        })->toArray();
        $edclientejur = ClientesJuridicos::find($clientesjur[0]['clijur_id']);

        if($edfornecedor != ''){
            $edfornecedor->forjur_nome = $request->nome;
            $edfornecedor->forjur_cnpj = $request->cnpj;
            $edfornecedor->forjur_cep = $request->cep;
            $edfornecedor->forjur_logradouro = $request->logradouro;
            $edfornecedor->forjur_num = $request->num;
            $edfornecedor->forjur_complemento = $request->complemento;
            $edfornecedor->forjur_bairro = $request->bairro;
            $edfornecedor->forjur_cidade = $request->cidade;
            $edfornecedor->forjur_uf = $request->uf;
            $edfornecedor->forjur_tel1 = $request->tel1;
            $edfornecedor->forjur_tel2 = $request->tel2;
            $edfornecedor->forjur_celular = $request->celular;
            $edfornecedor->forjur_email = $request->email;
            $edfornecedor->forjur_website = $request->website;
            $edfornecedor->forjur_inscest = $request->inscest;
            $edfornecedor->forjur_razaosocial = $request->razaosocial;
            $edfornecedor->forjur_areaatuacao = $request->areaatuacao;
            $edfornecedor->forjur_nomerep = $request->nomerep;
            $edfornecedor->forjur_emailrep = $request->emailrep;
            $edfornecedor->forjur_contatorep = $request->contatorep;
            $edfornecedor->forjur_obs = $request->obs;
            if($edfornecedor->save()){
                
            }else{
                return 0;
            }
        }

        if($edclientejur){
            $edclientejur->clijur_nome = $request->nome;
            $edclientejur->clijur_cnpj = $request->cnpj;
            $edclientejur->clijur_cep = $request->cep;
            $edclientejur->clijur_logradouro = $request->logradouro;
            $edclientejur->clijur_num = $request->num;
            $edclientejur->clijur_complemento = $request->complemento;
            $edclientejur->clijur_bairro = $request->bairro;
            $edclientejur->clijur_cidade = $request->cidade;
            $edclientejur->clijur_uf = $request->uf;
            $edclientejur->clijur_tel1 = $request->tel1;
            $edclientejur->clijur_tel2 = $request->tel2;
            $edclientejur->clijur_celular = $request->celular;
            $edclientejur->clijur_email = $request->email;
            $edclientejur->clijur_website = $request->website;
            $edclientejur->clijur_inscest = $request->inscest;
            $edclientejur->clijur_razaosocial = $request->razaosocial;
            $edclientejur->clijur_areaatuacao = $request->areaatuacao;
            $edclientejur->clijur_nomerep = $request->nomerep;
            $edclientejur->clijur_emailrep = $request->emailrep;
            $edclientejur->clijur_contatorep = $request->contatorep;
            $edclientejur->clijur_obs = $request->obs;
            if($edclientejur->save()){
                return 1;
            }else{
                return 0;
            }
        }
    }

    public function EditarMedico(Request $request){
        // dd($request->all());
        $medico = DB::table('medicos')->where('med_cpfcnpj', $request->cpf)->get()->map(function($obj){
            return (array) $obj;
        })->toArray();
        $servi = implode(',', $request->servi);
        $edmedico = Medicos::find($medico[0]['med_id']);
        $edmedico->med_nome = $request->nome;
        $edmedico->med_crn = $request->crn;
        $edmedico->med_cpfcnpj = $request->cpf;
        $edmedico->med_estadocivil = $request->estadocivil;
        $edmedico->med_sexo = $request->sexo;
        $edmedico->med_datanasc = $request->datanasc;
        $edmedico->med_cep = $request->cep;
        $edmedico->med_logradouro = $request->logradouro;
        $edmedico->med_num = $request->num;
        $edmedico->med_complemento = $request->complemento;
        $edmedico->med_bairro = $request->bairro;
        $edmedico->med_cidade = $request->cidade;
        $edmedico->med_uf = $request->uf;
        $edmedico->med_tel1 = $request->tel1;
        $edmedico->med_tel2 = $request->tel2;
        $edmedico->med_celular = $request->celular;
        $edmedico->med_rg = $request->rg;
        $edmedico->med_email = $request->email;
        $edmedico->med_comissao = $request->comissao;
        $edmedico->med_espec = $request->espec;
        $edmedico->med_servi = $servi;
        $edmedico->med_diapag = $request->pagamento;
        $edmedico->med_maxaten = $request->maximoatendimento;
        $edmedico->med_maxret = $request->maximoretorno;
        $edmedico->med_status = $request->status;
        if($edmedico->save()){
            $medicoatual = $medico[0]['med_id'];
            $dias = ['domingo','segunda','terca','quarta','quinta','sexta','sabado'];
            $dadosdias = [];
            for($i = 0; $i<count($dias); $i++){
                $atualcheckbox = $dias[$i].'checkbox';
                $atualselect1 = $dias[$i].'select1';
                $atualselect2 = $dias[$i].'select2';
                if($request->$atualcheckbox == 'true'){
                    array_push($dadosdias, $request->$atualselect1.' - '.$request->$atualselect2);
                }else{
                    array_push($dadosdias,'');
                }
            }
            $medico_atendimento = DB::table('medico_atendimento')->where('med_id', $medicoatual)->get()->map(function($obj){
                return (array) $obj;
            })->toArray();
            $edmedico_atendimento = Medico_Atendimento::find($medico_atendimento[0]['medat_id']);
            $edmedico_atendimento->medat_domingo = $dadosdias[0];
            $edmedico_atendimento->medat_segunda = $dadosdias[1];
            $edmedico_atendimento->medat_terca = $dadosdias[2];
            $edmedico_atendimento->medat_quarta = $dadosdias[3];
            $edmedico_atendimento->medat_quinta = $dadosdias[4];
            $edmedico_atendimento->medat_sexta = $dadosdias[5];
            $edmedico_atendimento->medat_sabado = $dadosdias[6];
            $edmedico_atendimento->medat_tempoconsulta = $request->tempoconsulta;
            if($edmedico_atendimento->save()){
                if($request->user_senha == null){
                    return 1;
                }else{
                    $eduser = User::where('user_id', $medicoatual)->where('user_tipo', 3)->first();
                    $eduser->username = $request->user_name;
                    $eduser->password = Hash::make($request->user_senha);
                    if($eduser->save()){
                        return 1;
                    }
                }
            }else{
                return 0;
            }
        }else{
            return 0;
        }
    }

    public function EditarProduto(Request $request){
        // dd($request->all());
        
        $produto = DB::table('produtos')->where('prod_nome', $request->nomeantigo)->get()->map(function($obj){
            return (array) $obj;
        })->toArray();
        // dd($produto);
        $edproduto = Produtos::find($produto[0]['prod_id']);

        if($request->quant == null){
            $quant = 0;
        }else{
            $quant = $request->quant;
        }
        
        // dd($request->all(), $request->valor,  doubleval(str_replace(',', '', $request->valor)));
        if($request->tipo == 'Servico' || $request->tipo == 'Exame' || $request->tipo == 'Ultrassom' || $request->tipo == 'Raiox'){
                $edproduto->prod_nome = $request->nome;
                $edproduto->prod_desc = $request->desc;
                $edproduto->prod_cate = $request->cate;
                $edproduto->prod_tipo = $request->tipo;
                $edproduto->prod_quant = null;
                $edproduto->prod_valor = doubleval(str_replace(',', '', $request->valor));
                $edproduto->prod_valorlab = doubleval(str_replace(',', '', $request->valorlab));
                $edproduto->prod_estqmin = null;
                $edproduto->prod_serviitens = $request->serviitens;
        }else{
            $edproduto->prod_nome = $request->nome;
            $edproduto->prod_desc = $request->desc;
            $edproduto->prod_cate = $request->cate;
            $edproduto->prod_tipo = $request->tipo;
            $edproduto->prod_quant = $quant;
            $edproduto->prod_valor = doubleval(str_replace(',', '', $request->valor));
            $edproduto->prod_estqmin = $request->estqmin;
            $edproduto->prod_serviitens = null;
        }
        if($edproduto->save()){
            return 1;
        }else{
            return 0;
        }
        
        
    }

    public function EditarPlano(Request $request){
        // dd($request->all());
        // dd(doubleval($request->valorcartao));
        $edplano = Planos::find($request->id);
        $edplano->plan_nome = $request->nome;
        $edplano->plan_desc = $request->desc;
        $edplano->plan_qtddep = $request->qtddep;
        $edplano->plan_valorboleto = doubleval(str_replace(',','.',$request->valorboleto));
        $edplano->plan_valorcartao = doubleval(str_replace(',','.',$request->valorcartao));
        $edplano->plan_adesao = doubleval(str_replace(',','.',$request->adesao));
        if($edplano->save()){
            $planoobs = DB::table('planoobs')->where('planobs_plano', $request->id)->delete();
            if($request->itens != null){
                for($i = 0; $i < count($request->itens[0]); $i++){
                    if($request->itens[3][$i] == '1'){
                        $cadastrarplanoobs1 = DB::table('planoobs')->insert([
                            'planobs_plano' => $request->id,
                            'planobs_produto' => $request->itens[0][$i],
                            'planobs_quantidade' => $request->itens[1][$i],
                            'planobs_valor' => doubleval(str_replace(',','.',$request->itens[2][$i])),
                            'planobs_incluso' => 'Incluso',
                        ]);
                    }else{
                        $cadastrarplanoobs1 = DB::table('planoobs')->insert([
                            'planobs_plano' => $request->id,
                            'planobs_produto' => $request->itens[0][$i],
                            'planobs_quantidade' => $request->itens[1][$i],
                            'planobs_valor' => doubleval(str_replace(',','.',$request->itens[2][$i])),
                        ]);
                    }
                }
            }else{
                $cadastrarplanoobs1 = 1;
            }

            if($request->servicos != null){

                for($i = 0; $i < count($request->servicos[0]); $i++){
                    if($request->servicos[2][$i] == '1'){
                        $cadastrarplanoobs2 = DB::table('planoobs')->insert([
                            'planobs_plano' => $request->id,
                            'planobs_produto' => $request->servicos[0][$i],
                            'planobs_valor' => doubleval(str_replace(',','.',$request->servicos[1][$i])),
                            'planobs_incluso' => 'Incluso',
                        ]);
                    }else{
                        $cadastrarplanoobs2 = DB::table('planoobs')->insert([
                            'planobs_plano' => $request->id,
                            'planobs_produto' => $request->servicos[0][$i],
                            'planobs_valor' => doubleval(str_replace(',','.',$request->servicos[1][$i])),
                        ]);
                    }
                }
                
            }else{
                $cadastrarplanoobs2 = 1;
            }
            if($cadastrarplanoobs1 == 1 && $cadastrarplanoobs2 == 1){
                return 1;
            }else{
                return 0;
            }
        }else{
            return 0;
        }
    }

    public function EditarLaboratorio(Request $request){
        $edlaboratorio = Laboratorios::find($request->id);
        $edlaboratorio->lab_num = $request->numlab;
        $edlaboratorio->lab_nome = $request->nomelab;
        $edlaboratorio->lab_espec = $request->espec;
        if($edlaboratorio->save()){
            return 1;
        }else{
            return 0;
        }
    }

    public function EditarAviso(Request $request){
        // dd($request->all());
        $edaviso = DB::table('avisos')
                    ->where('aviso_id', $request->idaviso)
                    ->update([
                        "aviso_titulo" => $request->titulo,
                        "aviso_texto" => $request->texto,
                    ]);
        if($edaviso == 1){
            return 1;
        }else{
            return 0;
        }
    }

    public function EditarEventoCalendario(Request $request){
        $edevento = DB::table('calendariocolaboradores')
                    ->where('calcol_data', $request->data)
                    ->where('calcol_even', $request->eventoantigo)
                    ->update(["calcol_even" => $request->eventonovo]);
        if($edevento == 1){
            return 1;
        }else{
            return 0;
        }
    }

    public function EditarUltrassom(Request $request){
        $edultrassom = DB::table('ultrassons')
                    ->where('ultrassons_id', $request->id)
                    ->update(["ultrassons_nome" => $request->nome]);
        if($edultrassom == 1){
            return 1;
        }else{
            return 0;
        }
    }

    public function EditarRaioX(Request $request){
        $edraiox = DB::table('raiox')
                    ->where('raiox_id', $request->id)
                    ->update(["raiox_nome" => $request->nome]);
        if($edraiox == 1){
            return 1;
        }else{
            return 0;
        }
    }

    public function EditarExame(Request $request){
        $edexame1 = DB::table('exames')
        ->where('exame_id', $request->id)
        ->update(
                ["exame_nome" => $request->nome]
            );

        $edexame2 = DB::table('exames')
        ->where('exame_id', $request->id)
        ->update(
                ["exame_cate" => $request->cate],
            );
        $edexame3 = DB::table('exames')
        ->where('exame_id', $request->id)
        ->update(
                ["exame_valor" => $request->valor],
            );
        if($edexame1 == 1 && $edexame2 == 1 && $edexame3 == 1){
            return 1;
        }else{
            return 0;
        }
    }

    public function EditarContrato(Request $request){
        $operacaoatualcount = 0;
        $edcont = Contratos::find($request->contratoatual);
        $edcont->cont_plano = $request->plano;
        $edcont->cont_diapag = $request->diapag;
        $edcont->cont_status = "Ativo";
        if($edcont->save()){
            $consultaobs = DB::table('contratosobs')->where('contobs_id',$edcont->cont_id)->get();
            $consulta = $consultaobs->map(function($obj){
                return (array) $obj;
            })->toArray();
            for($i = 0; $i < count($consulta); $i++){
                DB::table('contratosobs')
                ->where('contobs_id', $edcont->cont_id)
                ->where('contobs_idpessoa', $consulta[$i]['contobs_idpessoa'])
                ->update(["contobs_status" => "Não Ativo"]);
            }

        $idtitularpaciente = DB::table('pacientes')->where('pac_cpf', $request->titu)->get();
        $idtitularforfis = DB::table('fornecedoresfis')->where('forfis_cpf', $request->titu)->get();
        $idtitularfunc = DB::table('funcionarios')->where('func_cpf', $request->titu)->get();
        $idtitularclijur = DB::table('clientesjur')->where('clijur_cnpj', $request->titu)->get();
        $idtitularforjur = DB::table('fornecedoresjur')->where('forjur_cnpj', $request->titu)->get();
        if(count($idtitularpaciente) !=0 ){
            $id = $idtitularpaciente->map(function($obj){
                return (array) $obj;
            })->toArray();
            $id = $id[0]["pac_id"];
            $data = 1;
        }else if(count($idtitularforfis) !=0 ){
            $id = $idtitularforfis->map(function($obj){
                return (array) $obj;
            })->toArray();
            $id = $id[0]["forfis_id"];
            $data = 2;
        }else if(count($idtitularfunc) !=0 ){
            $id = $idtitularfunc->map(function($obj){
                return (array) $obj;
            })->toArray();
            $id = $id[0]["func_id"];
            $data = 3;
        }else if(count($idtitularclijur) !=0 ){
            $id = $idtitularclijur->map(function($obj){
                return (array) $obj;
            })->toArray();
            $id = $id[0]["clijur_id"];
            $data = 4;
        }else if(count($idtitularforjur) !=0 ){
            $id = $idtitularforjur->map(function($obj){
                return (array) $obj;
            })->toArray();
            $id = $id[0]["forjur_id"];
            $data = 5;
        }
        $cont_titu = str_pad($id , 4 , '0' , STR_PAD_LEFT) . $data;
        $consultatitu = DB::table('contratosobs')
            ->where('contobs_id', $edcont->cont_id)
            ->where('contobs_idpessoa', $cont_titu)
            ->where('contobs_tipo', 'Titular')
            ->get();
        if(count($consultatitu) > 0){
            DB::table('contratosobs')
            ->where('contobs_id', $edcont->cont_id)
            ->where('contobs_idpessoa', $cont_titu)
            ->where('contobs_tipo', 'Titular')
            ->update(["contobs_status" => "Ativo"]);
        }else{
            DB::table('contratosobs')->insert([
                'contobs_id' => $edcont->cont_id,
                'contobs_idpessoa' => $cont_titu,
                'contobs_tipo' => 'Titular',
                'contobs_status' => 'Ativo'
            ]);
        }

            for($i = 0; $i < count($request->dep); $i++){
                $depatual = $request->dep[$i][0];
    
                $iddeppaciente = DB::table('pacientes')->where('pac_cpf', $depatual)->get();
                $iddepforfis = DB::table('fornecedoresfis')->where('forfis_cpf', $depatual)->get();
                $iddepfunc = DB::table('funcionarios')->where('func_cpf', $depatual)->get();
                $iddepclijur = DB::table('clientesjur')->where('clijur_cnpj', $depatual)->get();
                $iddepforjur = DB::table('fornecedoresjur')->where('forjur_cnpj', $depatual)->get();
                if(count($iddeppaciente) !=0 ){
                    $id = $iddeppaciente->map(function($obj){
                        return (array) $obj;
                    })->toArray();
                    $id = str_pad($id[0]["pac_id"] , 4 , '0' , STR_PAD_LEFT) . "1";
                }else if(count($iddepforfis) !=0 ){
                    $id = $iddepforfis->map(function($obj){
                        return (array) $obj;
                    })->toArray();
                    $id = str_pad($id[0]["forfis_id"], 4 , '0' , STR_PAD_LEFT) . "2";
                }else if(count($iddepfunc) !=0 ){
                    $id = $iddepfunc->map(function($obj){
                        return (array) $obj;
                    })->toArray();
                    $id = str_pad($id[0]["func_id"] , 4 , '0' , STR_PAD_LEFT) . "3";
                }else if(count($iddepclijur) !=0 ){
                    $id = $iddepclijur->map(function($obj){
                        return (array) $obj;
                    })->toArray();
                    $id = str_pad($id[0]["clijur_id"] , 4 , '0' , STR_PAD_LEFT) . "4";
                }else if(count($iddepforjur) !=0 ){
                    $id = $iddepforjur->map(function($obj){
                        return (array) $obj;
                    })->toArray();
                    $id = str_pad($id[0]["forjur_id"] , 4 , '0' , STR_PAD_LEFT) . "5";
                }
                $consultadep = DB::table('contratosobs')
                ->where('contobs_id', $edcont->cont_id)
                ->where('contobs_idpessoa', $id)
                ->where('contobs_tipo', 'Dependente')
                ->get();
                if(count($consultadep) > 0){
                    $operacaoatual = DB::table('contratosobs')
                    ->where('contobs_id', $edcont->cont_id)
                    ->where('contobs_idpessoa', $id)
                    ->where('contobs_tipo', 'Dependente')
                    ->update(["contobs_status" => 'Ativo']);
                }else{
                    $operacaoatual = DB::table('contratosobs')->insert([
                        'contobs_id' => $edcont->cont_id,
                        'contobs_idpessoa' => $id,
                        'contobs_tipo' => 'Dependente',
                        'contobs_status' => 'Ativo'
                    ]);
                }
                $operacaoatualcount++;
            }
            if($operacaoatualcount == count($request->dep)){
                return 1;
            }else{
                return 0;
            }
        }else{
            return 0;
        }
    }

    public function EditHorarioMedico(Request $request){
        // dd($request->all());

        $horariomedico = $request->inicioagendamedico . "-" . $request->fimagendamedico;

        // dd($request->datamedico, $horariomedico, $request->idagendamedicoatual);

        $edithorariomedico = DB::table('agendamedico')->where('idagendamedico',$request->idagendamedicoatual)->update([
            "datamedico" => $request->datamedico,
            "horariosmedico" => $horariomedico,
        ]);

        if($edithorariomedico == 1){
            return 1;
        }else{
            return 0;
        }
    }
    
}
