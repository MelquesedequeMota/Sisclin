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

class EditarController extends Controller
{
    public function EditarPaciente(Request $request){
        $paciente = DB::table('pacientes')->where('pac_cpf', $request->cpf)->get()->map(function($obj){
            return (array) $obj;
        })->toArray();
        $edpaciente = Pacientes::find($paciente[0]['pac_id']);
        
        $fornecedor = DB::table('fornecedoresfis')->where('forfis_cpf', $request->cpf)->get()->map(function($obj){
            return (array) $obj;
        })->toArray();
        $edfornecedor = FornecedoresFisicos::find($fornecedor[0]['forfis_id']);

        $funcionario = DB::table('funcionarios')->where('func_cpf', $request->cpf)->get()->map(function($obj){
            return (array) $obj;
        })->toArray();
        $edfuncionario = Funcionarios::find($funcionario[0]['func_id']);

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
        $edpaciente = Pacientes::find($paciente[0]['pac_id']);
        
        $fornecedor = DB::table('fornecedoresfis')->where('forfis_cpf', $request->cpf)->get()->map(function($obj){
            return (array) $obj;
        })->toArray();
        $edfornecedor = FornecedoresFisicos::find($fornecedor[0]['forfis_id']);

        $funcionario = DB::table('funcionarios')->where('func_cpf', $request->cpf)->get()->map(function($obj){
            return (array) $obj;
        })->toArray();
        $edfuncionario = Funcionarios::find($funcionario[0]['func_id']);

        if($edpaciente){
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
            if($edpaciente->save()){

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
            if($edfuncionario->save()){

            }else{
                return 0;
            }
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
            $edfornecedor->forfis_website = $request->website;
            $edfornecedor->forfis_razaosocial = $request->razaosocial;
            $edfornecedor->forfis_areaatuacao = $request->areaatuacao;
            $edfornecedor->forfis_obs = $request->obs;
            if($edfornecedor->save()){
                return 1;
            }else{
                return 0;
            }
        }
    }

    public function EditarFuncionario(Request $request){
        $paciente = DB::table('pacientes')->where('pac_cpf', $request->cpf)->get()->map(function($obj){
            return (array) $obj;
        })->toArray();
        $edpaciente = Pacientes::find($paciente[0]['pac_id']);
        
        $fornecedor = DB::table('fornecedoresfis')->where('forfis_cpf', $request->cpf)->get()->map(function($obj){
            return (array) $obj;
        })->toArray();
        $edfornecedor = FornecedoresFisicos::find($fornecedor[0]['forfis_id']);

        $funcionario = DB::table('funcionarios')->where('func_cpf', $request->cpf)->get()->map(function($obj){
            return (array) $obj;
        })->toArray();
        $edfuncionario = Funcionarios::find($funcionario[0]['func_id']);

        if($edpaciente){
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
            if($edpaciente->save()){

            }else{
                return 0;
            }
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
            if($edfornecedor->save()){

            }else{
                return 0;
            }
        }

        if($edfuncionario){
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
            $edfuncionario->func_salario = $request->salario;
            $edfuncionario->func_conjugue = $request->conjugue;
            $edfuncionario->func_nomepai = $request->nomepai;
            $edfuncionario->func_nomemae = $request->nomemae;
            $edfuncionario->func_obs = $request->obs;
            if($edfuncionario->save()){
                return 1;
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
        $edclientejur = ClientesJuridicos::find($clientesjur[0]['clijur_id']);

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
        $edfornecedor = FornecedoresJuridicos::find($fornecedor[0]['forjur_id']);

        $clientesjur = DB::table('clientesjur')->where('clijur_cnpj', $request->cnpj)->get()->map(function($obj){
            return (array) $obj;
        })->toArray();
        $edclientejur = ClientesJuridicos::find($clientesjur[0]['clijur_id']);

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
        $medico = DB::table('medicos')->where('med_cpf', $request->cpf)->get()->map(function($obj){
            return (array) $obj;
        })->toArray();
        $especi = implode(',', $request->especi);
        $edmedico = Medicos::find($medico[0]['med_id']);
        $edmedico->med_nome = $request->nome;
        $edmedico->med_cpf = $request->cpf;
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
        $edmedico->med_especi = $especi;
        $edmedico->med_diapag = $request->pagamento;
        $edmedico->med_status = $request->status;
        if($edmedico->save()){
            $medicoatual = DB::table('medicos')->orderBy('med_id', 'DESC')->first();
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
            $medico_atendimento = DB::table('medico_atendimento')->where('med_id', $medicoatual->med_id)->get()->map(function($obj){
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
            if($edmedico_atendimento->save()){
                return 1;
            }else{
                return 0;
            }
        }else{
            return 0;
        }
    }
    
}
