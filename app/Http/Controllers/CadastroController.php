<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CadastroController extends Controller
{
    public function CadastroPessoa(Request $request){
        return view('CadastroPessoa');
    }
    public function CadastrarMedico(Request $request){
        return view('CadastroMedico');
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
    public function CadastroSetor(Request $request){
        $cadastrarset = DB::table('setores')->insert([
            'set_nome' => $request->nome,
            'set_dep' => $request->dep,
        ]);
        if($cadastrarset == 1){
            return 1;
        }else{
            return 0;
        }
    }
    public function CadastroFuncao(Request $request){
        $cadastrarfunc = DB::table('funcoes')->insert([
            'func_nome' => $request->nome,
            'func_setor' => $request->set,
        ]);
        if($cadastrarfunc == 1){
            return 1;
        }else{
            return 0;
        }
    }

    public function CadastroEspecialidade(Request $request){
        $cadastrarespec = DB::table('especialidades')->insert([
            'espec_nome' => $request->nome,
        ]);
        if($cadastrarespec == 1){
            return 1;
        }else{
            return 0;
        }
    }

    public function CadastroEspecializacao(Request $request){
        $cadastrarespeci = DB::table('especializacoes')->insert([
            'espec_id'=> $request->espec,
            'especi_nome' => $request->nome,
        ]);
        if($cadastrarespeci == 1){
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
            'pac_logradouro' => $request->logradouro,
            'pac_num' => $request->num,
            'pac_complemento' => $request->complemento,
            'pac_bairro' => $request->bairro,
            'pac_cidade' => $request->cidade,
            'pac_uf' => $request->uf,
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
            'forfis_logradouro' => $request->logradouro,
            'forfis_num' => $request->num,
            'forfis_complemento' =>$request->complemento,
            'forfis_bairro' => $request->bairro,
            'forfis_cidade' => $request->cidade,
            'forfis_uf' => $request->uf,
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

    public function CadastroFornecedorJuridico(Request $request){
        $cadastrarfornecedor = DB::table('fornecedoresjur')->insert([
            'forjur_nome' => $request->nome,
            'forjur_cnpj' => $request->cnpj,
            'forjur_cep' => $request->cep,
            'forjur_logradouro' => $request->logradouro,
            'forjur_num' => $request->num,
            'forjur_complemento' =>$request->complemento,
            'forjur_bairro' => $request->bairro,
            'forjur_cidade' => $request->cidade,
            'forjur_uf' => $request->uf,
            'forjur_tel1' => $request->tel1,
            'forjur_tel2' => $request->tel2,
            'forjur_celular' => $request->celular,
            'forjur_email' => $request->email,
            'forjur_website' => $request->website,
            'forjur_inscest' => $request->inscest,
            'forjur_razaosocial' => $request->razaosocial,
            'forjur_areaatuacao' => $request->areaatuacao,
            'forjur_nomerep' => $request->nomerep,
            'forjur_emailrep' => $request->emailrep,
            'forjur_contatorep' => $request->contatorep,
            'forjur_obs' => $request->obs,
        ]);
        if($cadastrarfornecedor == 1){
            return 1;
        }else{
            return 0;
        }
    }

    public function CadastroClienteJuridico(Request $request){
        $cadastrarcliente = DB::table('clientesjur')->insert([
            'clijur_nome' => $request->nome,
            'clijur_cnpj' => $request->cnpj,
            'clijur_cep' => $request->cep,
            'clijur_logradouro' => $request->logradouro,
            'clijur_num' => $request->num,
            'clijur_complemento' =>$request->complemento,
            'clijur_bairro' => $request->bairro,
            'clijur_cidade' => $request->cidade,
            'clijur_uf' => $request->uf,
            'clijur_tel1' => $request->tel1,
            'clijur_tel2' => $request->tel2,
            'clijur_celular' => $request->celular,
            'clijur_email' => $request->email,
            'clijur_website' => $request->website,
            'clijur_inscest' => $request->inscest,
            'clijur_razaosocial' => $request->razaosocial,
            'clijur_areaatuacao' => $request->areaatuacao,
            'clijur_nomerep' => $request->nomerep,
            'clijur_emailrep' => $request->emailrep,
            'clijur_contatorep' => $request->contatorep,
            'clijur_obs' => $request->obs,
        ]);
        if($cadastrarcliente == 1){
            return 1;
        }else{
            return 0;
        }
    }

    public function CadastroFuncionario(Request $request){
        $cadastrarfuncionario = DB::table('funcionarios')->insert([
            'func_nome' => $request->nome,
            'func_cpf' => $request->cpf,
            'func_rg' => $request->rg,
            'func_estadocivil' => $request->estadocivil,
            'func_sexo' => $request->sexo,
            'func_datanasc' => $request->datanasc,
            'func_cep' => $request->cep,
            'func_logradouro' => $request->logradouro,
            'func_num' => $request->num,
            'func_complemento' =>$request->complemento,
            'func_bairro' => $request->bairro,
            'func_cidade' => $request->cidade,
            'func_uf' => $request->uf,
            'func_tel1' => $request->tel1,
            'func_tel2' => $request->tel2,
            'func_celular' => $request->celular,
            'func_email' => $request->email,
            'func_dep' => $request->dep,
            'func_setor' => $request->setor,
            'func_func' => $request->func,
            'func_ctps' => $request->ctps,
            'func_serie' => $request->serie,
            'func_pis' => $request->pis,
            'func_ufctps' => $request->ufctps,
            'func_salario' => $request->salario,
            'func_conjugue' => $request->conjugue,
            'func_nomepai' => $request->nomepai,
            'func_nomemae' => $request->nomemae,
            'func_dataadm' => date('d/m/Y'),
            'func_obs' => $request->obs,
        ]);
        if($cadastrarfuncionario == 1){
            return 1;
        }else{
            return 0;
        }
    }
    public function HoraAtendimento(){
        return view('HoraAtendimento');
    }
    public function CadastroAgenda(Request $request){
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
        $cadastraragenda = DB::table('medico_atendimento')->insert([
            'med_id' => 1,
            'medat_domingo' => $dadosdias[0],
            'medat_segunda' => $dadosdias[1],
            'medat_terca' => $dadosdias[2],
            'medat_quarta' => $dadosdias[3],
            'medat_quinta' => $dadosdias[4],
            'medat_sexta' => $dadosdias[5],
            'medat_sabado' => $dadosdias[6],
        ]);
        if($cadastraragenda == 1){
            return 1;
        }else{
            return 0;
        }
    }

    public function CadastroMedico(Request $request){
        $especi = implode(',', $request->especi);
        $cadastrarmedico = DB::table('medicos')->insert([
            'med_nome' => $request->nome,
            'med_cpf' => $request->cpf,
            'med_estadocivil' => $request->estadocivil,
            'med_sexo' => $request->sexo,
            'med_datanasc' => $request->datanasc,
            'med_cep' => $request->cep,
            'med_logradouro' => $request->logradouro,
            'med_num' => $request->num,
            'med_complemento' =>$request->complemento,
            'med_bairro' => $request->bairro,
            'med_cidade' => $request->cidade,
            'med_uf' => $request->uf,
            'med_tel1' => $request->tel1,
            'med_tel2' => $request->tel2,
            'med_celular' => $request->celular,
            'med_rg' => $request->rg,
            'med_email' => $request->email,
            'med_comissao' => $request->comissao,
            'med_espec' => $request->espec,
            'med_especi' => $especi,
            'med_diapag' => $request->pagamento,
            'med_status' => $request->status,
        ]);
        if($cadastrarmedico == 1){
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
            $cadastraragenda = DB::table('medico_atendimento')->insert([
                'med_id' => $medicoatual->med_id,
                'medat_domingo' => $dadosdias[0],
                'medat_segunda' => $dadosdias[1],
                'medat_terca' => $dadosdias[2],
                'medat_quarta' => $dadosdias[3],
                'medat_quinta' => $dadosdias[4],
                'medat_sexta' => $dadosdias[5],
                'medat_sabado' => $dadosdias[6],
            ]);
            if($cadastraragenda == 1){
                return 1;
            }else{
                return 0;
            }
        }else{
            return 0;
        }
    }
}
