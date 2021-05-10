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
    public function CadastrarProduto(Request $request){
        return view('CadastroProduto');
    }
    public function CadastrarPlano(Request $request){
        return view('CadastroPlano');
    }
    public function CadastrarContrato(Request $request){
        return view('CadastroContrato');
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
            'espec_desc' => $request->desc,
        ]);
        $cadastrarcate = DB::table('categorias')->insert([
            'cate_nome' => $request->nome,
            'cate_desc' => "Categoria Criada para o(a) ".$request->nome,
        ]);
        if($cadastrarespec == 1 && $cadastrarcate == 1){
            return 1;
        }else{
            return 0;
        }
    }

    public function CadastroServico(Request $request){
        $consultaselectespec = DB::table('especialidades')->where('espec_id', $request->espec)->get();
        $consultaselectcate = DB::table('categorias')->where('cate_nome', $consultaselectespec[0]->espec_nome)->get();
        $cadastrarservi = DB::table('produtos')->insert([
            'prod_nome' => $request->nome,
            'prod_cate' => $consultaselectcate[0]->cate_id,
            'prod_tipo' => 'Servico',
        ]);
        if($cadastrarservi == 1){
            return 1;
        }else{
            return 0;
        }
    }

    public function CadastroCategoria(Request $request){
        $cadastrarcate = DB::table('categorias')->insert([
            'cate_nome' => $request->nome,
            'cate_desc' => $request->desc,
        ]);
        if($cadastrarcate == 1){
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
                array_push($dadosdias, null);
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
        $servi = implode(',', $request->servi);
        $cadastrarmedico = DB::table('medicos')->insert([
            'med_nome' => $request->nome,
            'med_crn' => $request->crn,
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
            'med_servi' => $servi,
            'med_maxaten' => $request->maximoatendimento,
            'med_maxret' => $request->maximoretorno,
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
                'medat_tempoconsulta' => $request->tempoconsulta,
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
    public function CadastroProduto(Request $request){
        if($request->quant == null){
            $quant = 0;
        }else{
            $quant = $request->quant;
        }
        if($request->tipo == 'Servico'){
            $cadastrarproduto = DB::table('produtos')->insert([
                'prod_nome' => $request->nome,
                'prod_desc' => $request->desc,
                'prod_cate' => $request->cate,
                'prod_tipo' => $request->tipo,
                'prod_valor' => $request->valor,
                'prod_serviitens' => $request->serviitens,
            ]);
        }else{
            $cadastrarproduto = DB::table('produtos')->insert([
                'prod_nome' => $request->nome,
                'prod_desc' => $request->desc,
                'prod_cate' => $request->cate,
                'prod_tipo' => $request->tipo,
                'prod_quant' => $quant,
                'prod_estqmin' => $request->estqmin,
                'prod_valor' => $request->valor,
            ]);
        }
        if($cadastrarproduto == 1){
            return 1;
        }else{
            return 0;
        }
    }

    public function CadastroPlano(Request $request){
            $cadastrarplano = DB::table('planos')->insert([
                'plan_nome' => $request->nome,
                'plan_desc' => $request->desc,
                'plan_qtddep' => $request->qtddep,
                'plan_valor' => $request->valor,
                'plan_servicos' => $request->servicos,
                'plan_itens' => $request->itens,
            ]);
        if($cadastrarplano == 1){
            return 1;
        }else{
            return 0;
        }
    }

    public function CadastroContrato(Request $request){
        $dep = [];
        $contobs = [];
        $contobserro = 0;
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

            array_push($dep, $id);
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
        $cont_id = date('Ym') . str_pad($id , 4 , '0' , STR_PAD_LEFT) . $data;
        $checkcont = DB::table('contratos')->where('cont_id', 'like', '%'.$cont_id.'%')->get();
        $contatual = count($checkcont) + 1;
        $cont_id = $cont_id.$contatual;
        $cont_titu = str_pad($id , 4 , '0' , STR_PAD_LEFT) . $data;
        array_push($contobs, $cont_titu);
        for($i = 0; $i < count($dep); $i++){
            array_push($contobs, $dep[$i]);
        }
        $cadastrarcont = DB::table('contratos')->insert([
            'cont_id' => $cont_id,
            'cont_plano' => $request->plano,
            'cont_diapag' => $request->diapag,
            'cont_status' => 'Ativo',
        ]);
    if($cadastrarcont == 1){
        $ultimocontrato = DB::table('contratos')->orderBy('cont_id', 'desc')->first();
        for($i = 0; $i < count($contobs); $i++){
            if($i == 0){
                $cadastrarcontobs = DB::table('contratosobs')->insert([
                    'contobs_id' => $cont_id,
                    'contobs_idpessoa' => $contobs[$i],
                    'contobs_tipo' => 'Titular',
                    'contobs_status' => 'Ativo'
                ]);
            }else{
                $cadastrarcontobs = DB::table('contratosobs')->insert([
                    'contobs_id' => $cont_id,
                    'contobs_idpessoa' => $contobs[$i],
                    'contobs_tipo' => 'Dependente',
                    'contobs_status' => 'Ativo'
                ]);
            }

            if($cadastrarcont != 1){
                $contobserro = 1;
            }
        }

        if($contobserro == 0){
            return 1;
        }else{
            return 0;
        }
    }else{
        return 0;
    }
}
}
