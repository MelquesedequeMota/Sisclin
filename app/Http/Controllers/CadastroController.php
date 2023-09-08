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

class CadastroController extends Controller
{
    public function CadastroProntuario(Request $request){
        return view('Prontuario');
    }
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
    public function CadastrarAgenda(Request $request){
        return view('CadastroAgenda');
    }
    public function CadastrarLaboratorio(Request $request){
        return view('CadastroLaboratorio');
    }
    public function CadastrarUltrassom(Request $request){
        return view('CadastroUltrassom');
    }
    public function CadastrarRaioX(Request $request){
        return view('CadastroRaioX');
    }
    public function CadastrarExames(Request $request){
        return view('CadastroExame');
    }
    public function CadastrarEspecialidades(Request $request){
        return view('CadastroEspecialidade');
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
        // dd($request->all());
        $cadastrarespec = DB::table('especialidades')->insert([
            'espec_nome' => $request->nome,
            'espec_desc' => $request->desc,
            'espec_letraordem' => $request->letraordem,
        ]);

        $pesquisarcate = DB::table('categorias')->where('cate_nome', $request->nome)->get();
        
        if(count($pesquisarcate) == 0){
            $cadastrarcate = DB::table('categorias')->insert([
                'cate_nome' => $request->nome,
                'cate_desc' => "Categoria Criada para o(a) ".$request->nome,
                'cate_tipo' => "Exame",
            ]);
        }else{
            $cadastrarcate = 1;
        }
        
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
            'cate_tipo' => $request->tipo,
        ]);
        if($cadastrarcate == 1){
            return 1;
        }else{
            return 0;
        }
    }

    public function CadastroCategoriaExame(Request $request){
        $cadastrarcateexame = DB::table('categoriasexames')->insert([
            'cateexames_nome' => $request->nome,
        ]);
        if($cadastrarcateexame == 1){
            return 1;
        }else{
            return 0;
        }
    }

    public function CadastroPaciente(Request $request){
        // dd($request->all());
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
            'pac_status' => "Ativo",
            'pac_altura' => $request->altura,
            'pac_peso' => $request->peso,
            'pac_pa' => $request->pa,
            'pac_tiposangue' => $request->tiposangue,
        ]);
        if($cadastrarpaciente == 1){
            if($request->planoatual != null){
                $data = 1;
                $id = DB::table('pacientes')->where('pac_cpf', $request->cpf)->where('pac_nome', $request->nome)->first()->pac_id;
                $timezone = new \DateTimeZone('America/Sao_Paulo');
                $agora = new \DateTime('now', $timezone);
    
                $cont_id = date('Ym') . str_pad($id , 8 , '0' , STR_PAD_LEFT) . $data;
                $checkcont = DB::table('contratos')->where('cont_id', 'like', '%'.$cont_id.'%')->get();
                $contatual = count($checkcont) + 1;
                $cont_id = $cont_id.$contatual;
    
                $cadastrarcont = DB::table('contratos')->insert([
                    'cont_id' => $cont_id,
                    'cont_plano' => $request->planoatual,
                    'cont_diapag' => $request->diapag,
                    'cont_status' => 'Ativo',
                    'cont_vendedor' => '1',
                    'cont_datainicio' => $agora->format('Y-m-d')
                ]);
    
                $cadastrarcontobs = DB::table('contratosobs')->insert([
                    'contobs_id' => $cont_id,
                    'contobs_idpessoa' => $id.'1',
                    'contobs_tipo' => 'Titular',
                    'contobs_status' => 'Ativo'
                ]);
            }
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
            'forfis_status' => "Ativo",
            'forfis_altura' => $request->altura,
            'forfis_peso' => $request->peso,
            'forfis_pa' => $request->pa,
            'forfis_tiposangue' => $request->tiposangue,
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
            'forjur_status' => "Ativo",
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
            'clijur_status' => "Ativo",
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
            'func_status' => "Ativo",
            'func_altura' => $request->altura,
            'func_peso' => $request->peso,
            'func_pa' => $request->pa,
            'func_tiposangue' => $request->tiposangue,
        ]);
        if($cadastrarfuncionario == 1){
            return 1;
        }else{
            return 0;
        }
    }

    public function CadastroUsuario(Request $request){
        if($request->user_tipo == 1 || $request->user_tipo == 2){
            $func = strval(DB::table('funcionarios')->orderBy('func_id', 'DESC')->first()->func_id) . strval('3');

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'username' => $request->user_name,
                'password' => Hash::make($request->user_senha),
                'user_tipo' => $request->user_tipo,
                'user_id' => $func,
            ]);
        }else if($request->user_tipo == 3){
            $medico = DB::table('medicos')->orderBy('med_id', 'DESC')->first()->med_id;
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'username' => $request->user_name,
                'password' => Hash::make($request->user_senha),
                'user_tipo' => $request->user_tipo,
                'user_id' => $medico,
            ]);
        }
        
        
        return json_encode(1);
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
            'med_cpfcnpj' => $request->cpf,
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
        if($request->tipo == 'Servico' || $request->tipo == 'Exame' || $request->tipo == 'Ultrassom' || $request->tipo == 'Raiox'){
            $cadastrarproduto = DB::table('produtos')->insert([
                'prod_nome' => $request->nome,
                'prod_desc' => $request->desc,
                'prod_cate' => $request->cate,
                'prod_tipo' => $request->tipo,
                'prod_valor' => doubleval(str_replace(',', '', $request->valor)),
                'prod_valorlab' => doubleval(str_replace(',', '', $request->valorlab)),
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
                'prod_valor' => doubleval(str_replace(',', '', $request->valor)),
            ]);
        }
        if($cadastrarproduto == 1){
            return 1;
        }else{
            return 0;
        }
    }

    public function CadastroPlano(Request $request){
        
        // dd($request->all());
            $cadastrarplano = DB::table('planos')->insert([
                'plan_nome' => $request->nome,
                'plan_desc' => $request->desc,
                'plan_qtddep' => $request->qtddep,
                'plan_valorboleto' => doubleval($request->valorboleto),
                'plan_valorcartao' => doubleval($request->valorcartao),
                'plan_adesao' => doubleval($request->valoradesao),
            ]);
        if($cadastrarplano == 1){
            $idatual = DB::table('planos')->where('plan_nome',$request->nome)->first()->plan_id;
            // dd($idatual);
            if($request->itens){
                for($i = 0; $i < count($request->itens[0]); $i++){
                    if($request->itens[3][$i] == '1'){
                        $cadastrarplanoobs1 = DB::table('planoobs')->insert([
                            'planobs_plano' => $idatual,
                            'planobs_produto' => $request->itens[0][$i],
                            'planobs_quantidade' => $request->itens[1][$i],
                            'planobs_valor' => doubleval($request->itens[2][$i]),
                            'planobs_incluso' => 'Incluso',
                        ]);
                    }else{
                        $cadastrarplanoobs1 = DB::table('planoobs')->insert([
                            'planobs_plano' => $idatual,
                            'planobs_produto' => $request->itens[0][$i],
                            'planobs_quantidade' => $request->itens[1][$i],
                            'planobs_valor' => doubleval($request->itens[2][$i]),
                        ]);
                    }
                }
            }
            
            if($request->servicos){
                for($i = 0; $i < count($request->servicos[0]); $i++){
                    if($request->servicos[2][$i] == '1'){
                        $cadastrarplanoobs2 = DB::table('planoobs')->insert([
                            'planobs_plano' => $idatual,
                            'planobs_produto' => $request->servicos[0][$i],
                            'planobs_valor' => doubleval($request->servicos[1][$i]),
                            'planobs_incluso' => 'Incluso',
                        ]);
                    }else{
                        $cadastrarplanoobs2 = DB::table('planoobs')->insert([
                            'planobs_plano' => $idatual,
                            'planobs_produto' => $request->servicos[0][$i],
                            'planobs_valor' => doubleval($request->servicos[1][$i]),
                        ]);
                    }
                }
            }
            return 1;
        }else{
            return 0;
        }
    }
    public function CadastroLaboratorio(Request $request){
        $cadastrarlaboratorio = DB::table('laboratorios')->insert([
            'lab_num' => $request->numlab,
            'lab_nome' => $request->nomelab,
            'lab_espec' => $request->espec,
            'lab_status' => 'Livre',
        ]);
        if($cadastrarlaboratorio == 1){
            return 1;
        }else{
            return 0;
        }
    }
    public function CadastroEventoCalendario(Request $request){
        $cadastrarevento = DB::table('calendariocolaboradores')->insert([
            'calcol_even' => $request->evento,
            'calcol_data' => $request->data,
            'calcol_idcolaborador' => $request->idcolaborador,
        ]);
        if($cadastrarevento == 1){
            return 1;
        }else{
            return 0;
        }
    }

    public function VerificarCadastroContrato(Request $request){

        $titularatual = DB::table('pacientes')->where('pac_cpf', $request->titu)->first();

        if($titularatual->pac_num == '' || $titularatual->pac_logradouro == '' || $titularatual->pac_bairro == '' || $titularatual->pac_complemento == '' || $titularatual->pac_cep == '' || $titularatual->pac_cidade == ''){
            return 99;
        }else {
            return 1;
        }

    }

    public function CadastroContrato(Request $request){
        // dd($request->all(), Auth::user()->id);
        $anualcobranca = [[],[],[],[],[]];

        if($request->pagamentoanualcheck == 1){
            for($i = 0; $i < count($request->metodospagamentoanual); $i++){
                for($o = 0; $o < $request->parcelaanual[$i]; $o++){
                    array_push($anualcobranca[0], $request->metodospagamentoanual[$i]);
                    array_push($anualcobranca[1], $request->parcelaanual[$i]);
                    array_push($anualcobranca[2], $request->autoanual[$i]);
                    array_push($anualcobranca[3], $request->cvanual[$i]);
                    array_push($anualcobranca[4], number_format(doubleval($request->anualvalor[$i]) / $request->parcelaanual[$i], 2, '.', '') );
                }
            }
        }
        // dd($anualcobranca);
        $dep = [];
        $contobs = [];
        $contobserro = 0;
        $nome = '';
        $timezone = new \DateTimeZone('America/Sao_Paulo');
        $agora = new \DateTime('now', $timezone);
        $pagamento = new \DateTime('now', $timezone);
        if($request->pagamentoanualcheck == 1){
            $pagamento->setDate($agora->format('Y'), $agora->format('m'), $agora->format('d'));
        }else{
            $pagamento->setDate($agora->format('Y'), $agora->format('m'), $request->diapag);
        }
        $pagamento->modify('+1 month');
        // dd($agora, $pagamento->format('m'));
        $boleto_ou_cartao = 0;
        // dd($agora->format('Y-m-d'));
        if($request->dep != null){
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
                    $id = str_pad($id[0]["pac_id"] , 8 , '0' , STR_PAD_LEFT) . "1";
                }else if(count($iddepforfis) !=0 ){
                    $id = $iddepforfis->map(function($obj){
                        return (array) $obj;
                    })->toArray();
                    $id = str_pad($id[0]["forfis_id"], 8 , '0' , STR_PAD_LEFT) . "2";
                }else if(count($iddepfunc) !=0 ){
                    $id = $iddepfunc->map(function($obj){
                        return (array) $obj;
                    })->toArray();
                    $id = str_pad($id[0]["func_id"] , 8 , '0' , STR_PAD_LEFT) . "3";
                }else if(count($iddepclijur) !=0 ){
                    $id = $iddepclijur->map(function($obj){
                        return (array) $obj;
                    })->toArray();
                    $id = str_pad($id[0]["clijur_id"] , 8 , '0' , STR_PAD_LEFT) . "4";
                }else if(count($iddepforjur) !=0 ){
                    $id = $iddepforjur->map(function($obj){
                        return (array) $obj;
                    })->toArray();
                    $id = str_pad($id[0]["forjur_id"] , 8 , '0' , STR_PAD_LEFT) . "5";
                }

                array_push($dep, $id);
            }
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
            $nome = $id[0]["pac_nome"];
            $cidade = $id[0]['pac_cidade'];
            $id = $id[0]["pac_id"];
            $data = 1;
        }else if(count($idtitularforfis) !=0 ){
            $id = $idtitularforfis->map(function($obj){
                return (array) $obj;
            })->toArray();
            $nome = $id[0]["forfis_nome"];
            $cidade = $id[0]['forfis_cidade'];
            $id = $id[0]["forfis_id"];
            $data = 2;
            
        }else if(count($idtitularfunc) !=0 ){
            $id = $idtitularfunc->map(function($obj){
                return (array) $obj;
            })->toArray();
            $nome = $id[0]["func_nome"];
            $cidade = $id[0]['func_cidade'];
            $id = $id[0]["func_id"];
            $data = 3;
            
        }else if(count($idtitularclijur) !=0 ){
            $id = $idtitularclijur->map(function($obj){
                return (array) $obj;
            })->toArray();
            $nome = $id[0]["clijur_nome"];
            $cidade = $id[0]['clijur_cidade'];
            $id = $id[0]["clijur_id"];
            $data = 4;
            
        }else if(count($idtitularforjur) !=0 ){
            $id = $idtitularforjur->map(function($obj){
                return (array) $obj;
            })->toArray();
            $nome = $id[0]["forjur_nome"];
            $cidade = $id[0]['forjur_cidade'];
            $id = $id[0]["forjur_id"];
            $data = 5;
            
        }
        $cont_id = date('Ym') . str_pad($id , 8 , '0' , STR_PAD_LEFT) . $data;
        $checkcont = DB::table('contratos')->where('cont_id', 'like', '%'.$cont_id.'%')->get();
        $contatual = count($checkcont) + 1;
        $cont_id = $cont_id.$contatual;
        $cont_titu = str_pad($id , 8 , '0' , STR_PAD_LEFT) . $data;
        array_push($contobs, $cont_titu);
        for($i = 0; $i < count($dep); $i++){
            array_push($contobs, $dep[$i]);
        }
        $planoatual = DB::table('planos')->select('plan_id', 'plan_adesao', 'plan_valorboleto', 'plan_valorcartao')->where('plan_id',$request->plano)->first();
        
        $vendedoratual = DB::table('users')->select('id')->where('name', $request->vendedor)->first();
        // dd($planoatual, $vendedoratual);
        // dd($contobs);
        $cadastrarcont = DB::table('contratos')->insert([
            'cont_id' => $cont_id,
            'cont_plano' => $request->plano,
            'cont_diapag' => $agora->format('d'),
            'cont_status' => 'Ativo',
            'cont_vendedor' => $vendedoratual->id,
            'cont_datainicio' => $agora->format('Y-m-d'),
            'cont_assinatura' => $request->assinatura
        ]);
    if($cadastrarcont == 1){
        $ultimocontrato = DB::table('contratos')->orderBy('cont_id', 'desc')->first();
        for($i = 0; $i < count($contobs); $i++){
            
            if($i == 0){
                if($pagamento->format('m') == '02' && intval($pagamento->format('d')) > 28){
                    if($request->pagamentoanualcheck == 1){
                        $formapagamento = implode(',', $request->metodospagamentoanual);
                        $cobrancalote = DB::table('cobrancalote')->insert([
                            'quantidadelote' => 12 ,
                            'responsavellote' => $id.strval($data) ,
                            'datalote' => $agora->format('Y-m-').'28' ,
                            'formapagamentolote' => $formapagamento,
                            'contratolote' => $cont_id,
                            'pagolote' => 0,
                            'fechadolote' => 0,
                            'cobradorlote' => Auth::user()->id
                        ]);
                    }else {
                        $formapagamento = 6;
                        $cobrancalote = DB::table('cobrancalote')->insert([
                            'quantidadelote' => 12 ,
                            'responsavellote' => $id.strval($data) ,
                            'datalote' => $agora->format('Y-m-').'28' ,
                            'formapagamentolote' => $formapagamento,
                            'contratolote' => $cont_id,
                            'pagolote' => 0,
                            'fechadolote' => 0,
                            'cobradorlote' => Auth::user()->id
                        ]);
                    }
                    
                }else{
                    if($request->pagamentoanualcheck == 1){
                        $formapagamento = implode(',', $request->metodospagamentoanual);
                        $cobrancalote = DB::table('cobrancalote')->insert([
                            'quantidadelote' => 12 ,
                            'responsavellote' => $id.strval($data) ,
                            'datalote' => $agora->format('Y-m-d') ,
                            'formapagamentolote' => $formapagamento,
                            'contratolote' => $cont_id,
                            'pagolote' => 0,
                            'fechadolote' => 0,
                            'cobradorlote' => Auth::user()->id
                        ]);
                    }else {
                        $formapagamento = 6;
                        $cobrancalote = DB::table('cobrancalote')->insert([
                            'quantidadelote' => 12 ,
                            'responsavellote' => $id.strval($data) ,
                            'datalote' => $agora->format('Y-m-d') ,
                            'formapagamentolote' => $formapagamento,
                            'contratolote' => $cont_id,
                            'pagolote' => 0,
                            'fechadolote' => 0,
                            'cobradorlote' => Auth::user()->id
                        ]);
                    }
                    
                }
                $cobrancaloteatual = DB::table('cobrancalote')->select('idlote')->where('contratolote', $cont_id)->where('datalote', $agora->format('Y-m-d'))->first();

                if($formapagamento == 6){
                    
                    if($request->adesaocheck == 0){
                        for($o = 0; $o < count($request->metodospagamentoadesao); $o++){
                            if($request->metodospagamentoadesao[$o] == '2' || $request->metodospagamentoadesao[$o] == '3'){
                                $contasareceber = DB::table('contasareceber')->insert([
                                    'datapagoconta' => $agora->format('Y-m-d') ,
                                    'vencimentoconta' => $agora->format('Y-m-d') ,
                                    'clienteconta' => $contobs[$i] ,
                                    'formapagamentoconta' => $request->metodospagamentoadesao[$o],
                                    'valorconta' => doubleval($request->valoradesao[$o]),
                                    'descconta' => "Adesão - ".$cont_id,
                                    'recebidoconta' => 0,
                                    'autoconta' => $request->autoadesao[$o],
                                    'cvconta' => $request->cvadesao[$o]
                                ]);
                            }else{
                                $contasareceber = DB::table('contasareceber')->insert([
                                    'datapagoconta' => $agora->format('Y-m-d') ,
                                    'vencimentoconta' => $agora->format('Y-m-d') ,
                                    'clienteconta' => $contobs[$i] ,
                                    'formapagamentoconta' => $request->metodospagamentoadesao[$o],
                                    'valorconta' => doubleval($request->valoradesao[$o]),
                                    'descconta' => "Adesão - ".$cont_id,
                                    'recebidoconta' => 0
                                ]);
                            }
                        }
                    }
                    
                    
                    for($o = 0; $o <=11; $o++){
                        if($pagamento->format('m') == '02' && intval($pagamento->format('d')) > 28){
                            $criarcobranca = DB::table('cobranca')->insert([
                                'idlote' => $cobrancaloteatual->idlote,
                                'cobrador' => Auth::user()->id,
                                'contrato' => $cont_id,
                                'responsavel' => $id.strval($data),
                                'fechado'  => 0,
                                'validado'  => 0,
                                'data' => $pagamento->format('Y-m-').'28',
                                'cidade' => $cidade,
                                'numero' => 0,
                                'valor' => doubleval($planoatual->plan_valorboleto),
                                'formapagamento' => 6,
                                'pago' => 0
                            ]);
                            // $contasareceber = DB::table('contasareceber')->insert([
                            //     'datapagoconta' => $pagamento->format('Y-m-').'28' ,
                            //     'vencimentoconta' => $pagamento->format('Y-m-').'28' ,
                            //     'clienteconta' => $contobs[$i] ,
                            //     'formapagamentoconta' => $formapagamento,
                            //     'valorconta' => doubleval($planoatual->plan_valorboleto),
                            //     'descconta' => "Mensalidade 28".'/'.$pagamento->format('m').'/'.$pagamento->format('Y')." - ".$cont_id,
                            //     'recebidoconta' => 0
                            // ]);
                        }else{
                            $criarcobranca = DB::table('cobranca')->insert([
                                'idlote' => $cobrancaloteatual->idlote,
                                'cobrador' => Auth::user()->id,
                                'contrato' => $cont_id,
                                'responsavel' => $id.strval($data),
                                'fechado'  => 0,
                                'validado'  => 0,
                                'data' => $pagamento->format('Y-m-d'),
                                'cidade' => $cidade,
                                'numero' => 0,
                                'valor' => doubleval($planoatual->plan_valorboleto),
                                'formapagamento' => 6,
                                'pago' => 0
                            ]);
                            // $contasareceber = DB::table('contasareceber')->insert([
                            //     'datapagoconta' => $pagamento->format('Y-m-d') ,
                            //     'vencimentoconta' => $pagamento->format('Y-m-d') ,
                            //     'clienteconta' => $contobs[$i] ,
                            //     'formapagamentoconta' => $formapagamento,
                            //     'valorconta' => doubleval($planoatual->plan_valorboleto),
                            //     'descconta' => "Mensalidade ".$pagamento->format('d').'/'.$pagamento->format('m').'/'.$pagamento->format('Y')." - ".$cont_id,
                            //     'recebidoconta' => 0
                            // ]);
                        }
                        $pagamento->modify('+1 month');
                    }
                }else{
                    // dd($request->all());
                    if($request->adesaocheck == 0){
                        for($o = 0; $o < count($request->metodospagamentoadesao); $o++){
                            if($request->metodospagamentoadesao[$o] == '2' || $request->metodospagamentoadesao[$o] == '3'){
                                $contasareceber = DB::table('contasareceber')->insert([
                                    'datapagoconta' => $agora->format('Y-m-d') ,
                                    'vencimentoconta' => $agora->format('Y-m-d') ,
                                    'clienteconta' => $contobs[$i] ,
                                    'formapagamentoconta' => $request->metodospagamentoadesao[$o],
                                    'valorconta' => doubleval($request->valoradesao[$o]),
                                    'descconta' => "Adesão - ".$cont_id,
                                    'recebidoconta' => 0,
                                    'autoconta' => $request->autoadesao[$o],
                                    'cvconta' => $request->cvadesao[$o]
                                ]);
                            }else{
                                $contasareceber = DB::table('contasareceber')->insert([
                                    'datapagoconta' => $agora->format('Y-m-d') ,
                                    'vencimentoconta' => $agora->format('Y-m-d') ,
                                    'clienteconta' => $contobs[$i] ,
                                    'formapagamentoconta' => $request->metodospagamentoadesao[$o],
                                    'valorconta' => doubleval($request->valoradesao[$o]),
                                    'descconta' => "Adesão - ".$cont_id,
                                    'recebidoconta' => 0,
                                ]);
                            }
                        }
                    }
                    for($o = 0; $o <=11; $o++){
                        $autojunto = implode(',', $request->autoanual);
                        $cvjunto = implode(',', $request->cvanual);
                        if($pagamento->format('m') == '02' && intval($pagamento->format('d')) > 28){
                            $criarcobranca = DB::table('cobranca')->insert([
                                'idlote' => $cobrancaloteatual->idlote,
                                'cobrador' => Auth::user()->id,
                                'contrato' => $cont_id,
                                'responsavel' => $id.strval($data),
                                'fechado'  => 0,
                                'validado'  => 0,
                                'data' => $pagamento->format('Y-m-').'28',
                                'cidade' => $cidade,
                                'numero' => 0,
                                'valor' => doubleval($planoatual->plan_valorcartao),
                                'pago' => 0,
                                'auto' => $autojunto,
                                'cv' => $cvjunto,
                                'formapagamento' => $formapagamento
                            ]);
                            // $contasareceber = DB::table('contasareceber')->insert([
                            //     'datapagoconta' => $pagamento->format('Y-m-').'28' ,
                            //     'vencimentoconta' => $pagamento->format('Y-m-').'28' ,
                            //     'clienteconta' => $contobs[$i] ,
                            //     'formapagamentoconta' => $anualcobranca[0][$o],
                            //     'valorconta' => doubleval($planoatual->plan_valorcartao),
                            //     'descconta' => "Mensalidade 28".'/'.$pagamento->format('m').'/'.$pagamento->format('Y')." - ".$cont_id,
                            //     'recebidoconta' => 0,
                            //     'autoconta' => $anualcobranca[2][$o],
                            //     'cvconta' => $anualcobranca[3][$o]
                            // ]);
                        }else{
                            $criarcobranca = DB::table('cobranca')->insert([
                                'idlote' => $cobrancaloteatual->idlote,
                                'cobrador' => Auth::user()->id,
                                'contrato' => $cont_id,
                                'responsavel' => $id.strval($data),
                                'fechado'  => 0,
                                'validado'  => 0,
                                'data' => $pagamento->format('Y-m-d'),
                                'cidade' => $cidade,
                                'numero' => 0,
                                'valor' => doubleval($planoatual->plan_valorcartao),
                                'pago' => 0,
                                'auto' => $autojunto,
                                'cv' => $cvjunto,
                                'formapagamento' => $formapagamento
                            ]);
                            // $contasareceber = DB::table('contasareceber')->insert([
                            //     'datapagoconta' => $pagamento->format('Y-m-d') ,
                            //     'vencimentoconta' => $pagamento->format('Y-m-d') ,
                            //     'clienteconta' => $contobs[$i] ,
                            //     'formapagamentoconta' => $anualcobranca[0][$o],
                            //     'valorconta' => doubleval($planoatual->plan_valorcartao),
                            //     'descconta' => "Mensalidade ".$pagamento->format('d').'/'.$pagamento->format('m').'/'.$pagamento->format('Y')." - ".$cont_id,
                            //     'recebidoconta' => 0,
                            //     'autoconta' => $anualcobranca[2][$o],
                            //     'cvconta' => $anualcobranca[3][$o]
                            // ]);
                        }
                        $pagamento->modify('+1 month');
                    }
                    
                    
                }//

            $pagamentocartao = new \DateTime('now', $timezone);
            $pagamentoresto = new \DateTime('now', $timezone);
            if($request->pagamentoanualcheck == 1){
                $pagamentocartao->setDate($agora->format('Y'), $agora->format('m'), $agora->format('d'));
            }else{
                $pagamentocartao->setDate($agora->format('Y'), $agora->format('m'), $request->diapag);
            }
            if($request->pagamentoanualcheck == 1){
                $pagamentoresto->setDate($agora->format('Y'), $agora->format('m'), $agora->format('d'));
            }else{
                $pagamentoresto->setDate($agora->format('Y'), $agora->format('m'), $request->diapag);
            }
            

            if($formapagamento == 6){

                for($o = 0; $o <= 11; $o++){
                    if($pagamentoresto->format('m') == '02' && intval($pagamentoresto->format('d')) > 28){
                        $contasareceber = DB::table('contasareceber')->insert([
                            'datapagoconta' => $pagamentoresto->format('Y-m-').'28' ,
                            'vencimentoconta' => $pagamentoresto->format('Y-m-').'28' ,
                            'clienteconta' => $contobs[$i] ,
                            'formapagamentoconta' => $formapagamento,
                            'valorconta' => doubleval($planoatual->plan_valorboleto),
                            'descconta' => "Mensalidade 28".'/'.$pagamentoresto->format('m').'/'.$pagamentoresto->format('Y')." - ".$cont_id,
                            'recebidoconta' => 0
                        ]);
                    }else{
                        $contasareceber = DB::table('contasareceber')->insert([
                            'datapagoconta' => $pagamentoresto->format('Y-m-d') ,
                            'vencimentoconta' => $pagamentoresto->format('Y-m-d') ,
                            'clienteconta' => $contobs[$i] ,
                            'formapagamentoconta' => $formapagamento,
                            'valorconta' => doubleval($planoatual->plan_valorboleto),
                            'descconta' => "Mensalidade ".$pagamentoresto->format('d').'/'.$pagamentoresto->format('m').'/'.$pagamentoresto->format('Y')." - ".$cont_id,
                            'recebidoconta' => 0
                        ]);
                    }
                    $pagamentoresto->modify('+1 month');
                }
            }else{
                for($o = 0; $o < count($anualcobranca[1]) ; $o++){
                    if($anualcobranca[1][$o] == '3'){
                        if($pagamentocartao->format('m') == '02' && intval($pagamentocartao->format('d')) > 28){
                        
                            $contasareceber = DB::table('contasareceber')->insert([
                                'datapagoconta' => $pagamentocartao->format('Y-m-').'28' ,
                                'vencimentoconta' => $pagamentocartao->format('Y-m-').'28' ,
                                'clienteconta' => $contobs[$i] ,
                                'formapagamentoconta' => $anualcobranca[0][$o],
                                'valorconta' => doubleval($anualcobranca[4][$o]),
                                'descconta' => "Anual - ".$cont_id,
                                'recebidoconta' => 0,
                                'autoconta' => $anualcobranca[2][$o],
                                'cvconta' => $anualcobranca[3][$o]
                            ]);
                        }else{
                            $contasareceber = DB::table('contasareceber')->insert([
                                'datapagoconta' => $pagamentocartao->format('Y-m-d') ,
                                'vencimentoconta' => $pagamentocartao->format('Y-m-d') ,
                                'clienteconta' => $contobs[$i] ,
                                'formapagamentoconta' => $anualcobranca[0][$o],
                                'valorconta' => doubleval($anualcobranca[4][$o]),
                                'descconta' => "Anual - ".$cont_id,
                                'recebidoconta' => 0,
                                'autoconta' => $anualcobranca[2][$o],
                                'cvconta' => $anualcobranca[3][$o]
                            ]);
                        }
                        $pagamentocartao->modify('+1 month');
                    }else{
                        if($pagamentoresto->format('m') == '02' && intval($pagamentoresto->format('d')) > 28){
                        
                            $contasareceber = DB::table('contasareceber')->insert([
                                'datapagoconta' => $pagamentoresto->format('Y-m-').'28' ,
                                'vencimentoconta' => $pagamentoresto->format('Y-m-').'28' ,
                                'clienteconta' => $contobs[$i] ,
                                'formapagamentoconta' => $anualcobranca[0][$o],
                                'valorconta' => doubleval($anualcobranca[4][$o]),
                                'descconta' => "Anual - ".$cont_id,
                                'recebidoconta' => 0,
                                'autoconta' => $anualcobranca[2][$o],
                                'cvconta' => $anualcobranca[3][$o]
                            ]);
                        }else{
                            $contasareceber = DB::table('contasareceber')->insert([
                                'datapagoconta' => $pagamentoresto->format('Y-m-d') ,
                                'vencimentoconta' => $pagamentoresto->format('Y-m-d') ,
                                'clienteconta' => $contobs[$i] ,
                                'formapagamentoconta' => $anualcobranca[0][$o],
                                'valorconta' => doubleval($anualcobranca[4][$o]),
                                'descconta' => "Anual - ".$cont_id,
                                'recebidoconta' => 0,
                                'autoconta' => $anualcobranca[2][$o],
                                'cvconta' => $anualcobranca[3][$o]
                            ]);
                        }
                    }
                    
                    
                }
                
                
            }
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
    public function CadastroAgendaMedico(Request $request){
        // dd($request->all());
        $idall = [];
        $data = explode('-',$request->dados[3]);
        $data = $data[2] . "/" . $data[1] . "/" . $data[0];
        $datahora = $data . ' - ' . $request->dados[2];
        $checardatamedico = DB::table('agendas')
        ->where('age_data', $datahora)
        ->where('age_med', $request->dados[4])
        ->get();

        
        // dd($dadospessoa);

        if(count(explode(' - ', $request->dados[0])) == 1 || count(explode(' - ', $request->dados[0])) == 2){
            if(count($checardatamedico) != 0){
                $attagenda = DB::table('agendas')
                ->where('age_data', $datahora)
                ->where('age_med', $request->dados[4])
                ->update(
                    ['age_pessoa' => explode(' - ', $request->dados[0])[0],
                    'age_contrato' => 'Não Cadastrado',
                    'age_data' => $datahora,
                    'age_med' => $request->dados[4],
                    'age_status' => 'Dependente Cadastro',
                    'age_prioridade' => $request->dados[5],
                    'age_datadb' => $request->dados[3]]  
                );

                $agendaatual = DB::table('agendas')
                ->where('age_data', $datahora)
                ->where('age_med', $request->dados[4])
                ->first()->age_id;

                $atendimentosatuaisretorno = DB::table('agendamentocliente')
                ->where('idagenda', $agendaatual)
                ->where('servico', 0)
                ->get();

                // dd($request->all());

                if($request->dados[1] == 'Retorno'){
                    if(count($atendimentosatuaisretorno) == 0){
                        $inserirretorno = DB::table('agendamentocliente')
                        ->insert([
                            "idagenda" => $agendaatual,
                            "servico" => 0,
                            "situacao" => 'realizar',
                            "quantidade" => 1,
                        ]);
                    }
                }else{
                    if(count($atendimentosatuaisretorno) > 0){
                        $removerretorno = DB::table('agendamentocliente')
                        ->where('idagenda', $agendaatual)
                        ->where('servico', 0)
                        ->delete();
                    }
                }
                
            }else{
                $attagenda = DB::table('agendas')->insert([
                    'age_pessoa' => explode(' - ', $request->dados[0])[0],
                    'age_contrato' => 'Não Cadastrado',
                    'age_data' => $datahora,
                    'age_med' => $request->dados[4],
                    'age_status' => 'Dependente Cadastro',
                    'age_prioridade' => $request->dados[5],
                    'age_datadb' => $request->dados[3]
                ]);
            }
        }else if(explode(' - ',$request->dados[0])[2] == "Particular"){
            $dadospessoa = explode(' - ', $request->dados[0])[0] . ' - ' . explode(' - ', $request->dados[0])[1];
            if(count($checardatamedico) != 0){
                $attagenda = DB::table('agendas')
                ->where('age_data', $datahora)
                ->where('age_med', $request->dados[4])
                ->update(
                    ['age_pessoa' => $dadospessoa,
                    'age_contrato' => 'Particular',
                    'age_data' => $datahora,
                    'age_med' => $request->dados[4],
                    'age_status' => $request->dados[1],
                    'age_prioridade' => $request->dados[5],
                    'age_datadb' => $request->dados[3]]
                );

                $agendaatual = DB::table('agendas')
                ->where('age_data', $datahora)
                ->where('age_med', $request->dados[4])
                ->first()->age_id;

                $atendimentosatuaisretorno = DB::table('agendamentocliente')
                ->where('idagenda', $agendaatual)
                ->where('servico', 0)
                ->get();

                // dd($request->all());

                if($request->dados[1] == 'Retorno'){
                    if(count($atendimentosatuaisretorno) == 0){
                        $inserirretorno = DB::table('agendamentocliente')
                        ->insert([
                            "idagenda" => $agendaatual,
                            "servico" => 0,
                            "situacao" => 'realizar',
                            "quantidade" => 1,
                        ]);
                    }
                }else{
                    if(count($atendimentosatuaisretorno) > 0){
                        $removerretorno = DB::table('agendamentocliente')
                        ->where('idagenda', $agendaatual)
                        ->where('servico', 0)
                        ->delete();
                    }
                }

            }else{
                $attagenda = DB::table('agendas')->insert([
                    'age_pessoa' => $dadospessoa,
                    'age_contrato' => 'Particular',
                    'age_data' => $datahora,
                    'age_med' => $request->dados[4],
                    'age_status' => $request->dados[1],
                    'age_prioridade' => $request->dados[5],
                    'age_datadb' => $request->dados[3]
                ]);

                $agendaatual = DB::table('agendas')
                ->where('age_data', $datahora)
                ->where('age_med', $request->dados[4])
                ->first()->age_id;

                $atendimentosatuaisretorno = DB::table('agendamentocliente')
                ->where('idagenda', $agendaatual)
                ->where('servico', 0)
                ->get();

                // dd($request->all());

                if($request->dados[1] == 'Retorno'){
                    if(count($atendimentosatuaisretorno) == 0){
                        $inserirretorno = DB::table('agendamentocliente')
                        ->insert([
                            "idagenda" => $agendaatual,
                            "servico" => 0,
                            "situacao" => 'realizar',
                            "quantidade" => 1,
                        ]);
                    }
                }else{
                    if(count($atendimentosatuaisretorno) > 0){
                        $removerretorno = DB::table('agendamentocliente')
                        ->where('idagenda', $agendaatual)
                        ->where('servico', 0)
                        ->delete();
                    }
                }
            }
        }else{
            $dadospessoa = explode(' - ', $request->dados[0])[0] . ' - ' . explode(' - ', $request->dados[0])[1];
            $pessoadados = explode(' - ',$request->dados[0]);
            $idtitularpaciente = DB::table('pacientes')->where('pac_cpf', $pessoadados[1])->get();
            $idtitularforfis = DB::table('fornecedoresfis')->where('forfis_cpf', $pessoadados[1])->get();
            $idtitularfunc = DB::table('funcionarios')->where('func_cpf', $pessoadados[1])->get();
            if(count($idtitularpaciente) !=0 ){
                $id = $idtitularpaciente->map(function($obj){
                    return (array) $obj;
                })->toArray();
                $id = $id[0]["pac_id"];
                $data = 1;
                array_push($idall, str_pad($id , 4 , '0' , STR_PAD_LEFT) . $data);
            }if(count($idtitularforfis) !=0 ){
                $id = $idtitularforfis->map(function($obj){
                    return (array) $obj;
                })->toArray();
                $id = $id[0]["forfis_id"];
                $data = 2;
                array_push($idall, str_pad($id , 4 , '0' , STR_PAD_LEFT) . $data);
            }if(count($idtitularfunc) !=0 ){
                $id = $idtitularfunc->map(function($obj){
                    return (array) $obj;
                })->toArray();
                $id = $id[0]["func_id"];
                $data = 3;
                array_push($idall, str_pad($id , 4 , '0' , STR_PAD_LEFT) . $data);
            }


            foreach($idall as $idall){
                // dd($idall);
                $contrato = DB::table('contratosobs')
                ->where('contobs_id', $pessoadados[2])
                ->where('contobs_idpessoa', $idall)
                ->where('contobs_status', 'Ativo')
                ->get();
                if(count($contrato) > 0){
                    $idpessoa = $contrato[0]->contobs_idpessoa;
                }
            }
            // dd($idpessoa);
            $dadospessoa = $pessoadados[0]. ' - ' . $pessoadados[1];
            if(count($checardatamedico) != 0){
                if(count(explode(' - ', $request->dados[0])) == 2){
                    $attagenda = DB::table('agendas')
                    ->where('age_data', $datahora)
                    ->where('age_med', $request->dados[4])
                    ->update(
                        ['age_pessoa' => $dadospessoa,
                        'age_contrato' => 'Particular',
                        'age_data' => $datahora,
                        'age_med' => $request->dados[4],
                        'age_status' => $request->dados[1],
                        'age_prioridade' => $request->dados[5],
                        'age_datadb' => $request->dados[3]]
                    );

                    $agendaatual = DB::table('agendas')
                    ->where('age_data', $datahora)
                    ->where('age_med', $request->dados[4])
                    ->first()->age_id;

                    $atendimentosatuaisretorno = DB::table('agendamentocliente')
                    ->where('idagenda', $agendaatual)
                    ->where('servico', 0)
                    ->get();

                    // dd($request->all());

                    if($request->dados[1] == 'Retorno'){
                        if(count($atendimentosatuaisretorno) == 0){
                            $inserirretorno = DB::table('agendamentocliente')
                            ->insert([
                                "idagenda" => $agendaatual,
                                "servico" => 0,
                                "situacao" => 'realizar',
                                "quantidade" => 1,
                            ]);
                        }
                    }else{
                        if(count($atendimentosatuaisretorno) > 0){
                            $removerretorno = DB::table('agendamentocliente')
                            ->where('idagenda', $agendaatual)
                            ->where('servico', 0)
                            ->delete();
                        }
                    }
                }else{
                    $attagenda = DB::table('agendas')
                    ->where('age_data', $datahora)
                    ->where('age_med', $request->dados[4])
                    ->update(
                        ['age_pessoa' => $dadospessoa,
                        'age_contrato' => $pessoadados[2],
                        'age_data' => $datahora,
                        'age_med' => $request->dados[4],
                        'age_status' => $request->dados[1],
                        'age_prioridade' => $request->dados[5],
                        'age_datadb' => $request->dados[3]]
                    );
                    $agendaatual = DB::table('agendas')
                    ->where('age_data', $datahora)
                    ->where('age_med', $request->dados[4])
                    ->first()->age_id;

                    $atendimentosatuaisretorno = DB::table('agendamentocliente')
                    ->where('idagenda', $agendaatual)
                    ->where('servico',0)
                    ->get();

                    // dd($request->all());

                    if($request->dados[1] == 'Retorno'){
                        // dd($request->all(), count($atendimentosatuaisretorno), $agendaatual, $atendimentosatuaisretorno);
                        if(count($atendimentosatuaisretorno) == 0){
                            $inserirretorno = DB::table('agendamentocliente')
                            ->insert([
                                "idagenda" => $agendaatual,
                                "servico" => 0,
                                "situacao" => 'realizar',
                                "quantidade" => 1,
                            ]);
                        }
                    }else{
                        // dd($request->all());
                        if(count($atendimentosatuaisretorno) > 0){
                            // dd('porraaaaa');
                            $removerretorno = DB::table('agendamentocliente')
                            ->where('idagenda', $agendaatual)
                            ->where('servico', 0)
                            ->delete();
                        }
                    }
                }
                
            }else{
                $attagenda = DB::table('agendas')->insert([
                    'age_pessoa' => $dadospessoa,
                    'age_contrato' => $pessoadados[2],
                    'age_data' => $datahora,
                    'age_med' => $request->dados[4],
                    'age_status' => $request->dados[1],
                    'age_prioridade' => $request->dados[5],
                    'age_datadb' => $request->dados[3]
                ]);
                $agendaatual = DB::table('agendas')
                ->where('age_data', $datahora)
                ->where('age_med', $request->dados[4])
                ->first()->age_id;

                $atendimentosatuaisretorno = DB::table('agendamentocliente')
                ->where('idagenda', $agendaatual)
                ->where('servico', 0)
                ->get();

                if($request->dados[1] == 'Retorno'){
                    if(count($atendimentosatuaisretorno) == 0){
                        $inserirretorno = DB::table('agendamentocliente')
                        ->insert([
                            "idagenda" => $agendaatual,
                            "servico" => 0,
                            "situacao" => 'realizar',
                            "quantidade" => 1,
                        ]);
                    }
                }else{
                    if(count($atendimentosatuaisretorno) > 0){
                        $removerretorno = DB::table('agendamentocliente')
                        ->where('idagenda', $agendaatual)
                        ->where('servico', 0)
                        ->delete();
                    }
                }
            }
        }

        if($attagenda == 1){
            return 1;
        }else{
            return 0;
        }
    }

    public function CadastroAtendimento(Request $request){
        // dd($request->all());
        $atendimento = DB::table('atendimentos')->insert([
            'aten_pessoa' => $request->pessoa,
            'aten_lugar' => $request->lugar,
        ]);
        if($atendimento == 1){
            return 1;
        }else{
            return 0;
        }
    }

    public function CadastrarAviso(Request $request){
        date_default_timezone_set('America/Sao_Paulo');
        $data = date('d/m/Y');
        // dd($data);
        // dd($request->all());
        $aviso = DB::table('avisos')->insert([
            'aviso_titulo' => $request->titulo,
            'aviso_texto' => $request->texto,
            'aviso_data' => $data,
        ]);
        if($aviso == 1){
            return 1;
        }else{
            return 0;
        }
    }

    public function CadastrarProdutoImagem(Request $request){
        $idproduto = DB::table('produtos')->orderBy('prod_id', 'DESC')->first()->prod_id;
        $nomeproduto = DB::table('produtos')->orderBy('prod_id', 'DESC')->first()->prod_nome;
        $validation = Validator::make($request->all(), [
            'imagemiteminput' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
           ]);
           if($validation->passes())
           {
                $imagem = $request->file('imagemiteminput');
                $nome = $nomeproduto.'.'.$imagem->getClientOriginalExtension();
                $nome = str_replace(" ", "_", $nome);
                Storage::disk('imagens')->put($nome, file_get_contents($imagem));
                $produtoimagem = DB::table('produtos')
                ->where('prod_id', $idproduto)
                ->update(["prod_img" => $nome]);
                if($produtoimagem == 1){
                    return 1;
                }else{
                    return 0;
                }
           }
    }

    public function CadastroNovoUltrassom(Request $request){
        $ultrassom = DB::table('ultrassons')->insert([
            'ultrassons_nome' => $request->ultrassom,
        ]);
        if($ultrassom == 1){
            return 1;
        }else{
            return 0;
        }
    }

    public function CadastroRaioX(Request $request){
        $raiox = DB::table('raiox')->insert([
            'raiox_nome' => $request->raiox,
        ]);
        if($raiox == 1){
            return 1;
        }else{
            return 0;
        }
    }

    public function CadastroExame(Request $request){
        $exame = DB::table('exames')->insert([
            'exame_nome' => $request->exame,
            'exame_cate' => $request->categoria,
            'exame_valor' => $request->valor,
        ]);
        if($exame == 1){
            return 1;
        }else{
            return 0;
        }
    }

    public function CadastroNovoHorarioMedico(Request $request){
        // dd($request->all());

        $med_id = DB::table('medicos')->where('med_cpfcnpj', $request->cpfatual)->first()->med_id;

        // dd($med_id);

        $horariomedico = $request->inicioagendamedico . "-" . $request->fimagendamedico;

        $novohorariomedico = DB::table('agendamedico')->insert([
            'idmedico' => $med_id,
            'datamedico' => $request->datamedico,
            'horariosmedico' => $horariomedico,
        ]);
        if($novohorariomedico == 1){
            return 1;
        }else{
            return 0;
        }
    }

    public function CadastroSalvarListExames(Request $request){
        // dd($request->all(), count($request->exames));

        $delete = DB::table('agendamentocliente')->where('idagenda', $request->idagenda)->delete();

        for($i = 0; $i < count($request->exames); $i++){
            $novohorariocliente = DB::table('agendamentocliente')->insert([
                'idagenda' => $request->idagenda,
                'servico' => $request->exames[$i],
                'quantidade' => $request->quantidade[$i],
                'situacao' => $request->situacao[$i],
            ]);
        }
        if($novohorariocliente == 1){
            return 1;
        }else{
            return 0;
        }

        
    }

    public function PassarContratos(){
        // dd('funciona');
        $teste1 = DB::table('tb_contrato')->get();
        // dd($teste1);
        foreach($teste1 as $teste){
            // dd($teste);
            if($teste->isn_cliente != null && $teste->isn_plano != null){
                $data = explode('-', $teste->dth_data_carencia)[0] . explode('-', $teste->dth_data_carencia)[1];
                $cont_id = $data . str_pad($teste->isn_cliente , 8 , '0' , STR_PAD_LEFT) . '1';
                $checkcont = DB::table('contratos')->where('cont_id', 'like', '%'.$cont_id.'%')->get();
                $contatual = count($checkcont) + 1;
                $cont_id = $cont_id.$contatual;
                if($teste->num_vencimento != null){
                    $diapag = $teste->num_vencimento;
                }else{
                    $diapag = 1;
                }
                if($teste->flg_status == '1'){
                    $passar = DB::table('contratos')->insert([
                        'cont_id' => $cont_id,
                        'cont_plano' => $teste->isn_plano,
                        'cont_diapag' => $diapag,
                        'cont_status' => 'Ativo',
                        'cont_datainicio' => $teste->dth_data_inicio,
                        'cont_datafim' => $teste->dth_data_inativacao
                    ]);
                }else{
                    $passar = DB::table('contratos')->insert([
                        'cont_id' => $cont_id,
                        'cont_plano' => $teste->isn_plano,
                        'cont_diapag' => $diapag,
                        'cont_status' => 'Não Ativo',
                        'cont_datainicio' => $teste->dth_data_inicio,
                        'cont_datafim' => $teste->dth_data_inativacao
                    ]);
                }

                $teste2 = DB::table('tb_pessoa_contrato')->where('isn_contrato', $teste->isn_contrato)->get();
                foreach($teste2 as $teste2){
                    if(count(DB::table('pacientes')->where('pac_id', $teste2->isn_pessoa)->get()) != 0){
                        if($teste->isn_cliente == $teste2->isn_pessoa){
                            if($teste2->flg_status == 1){
                                $passar = DB::table('contratosobs')->insert([
                                    'contobs_id' => $cont_id,
                                    'contobs_idpessoa' => $teste2->isn_pessoa . '1',
                                    'contobs_tipo' => 'Titular',
                                    'contobs_status' => 'Ativo'
                                ]);
                            }else{
                                $passar = DB::table('contratosobs')->insert([
                                    'contobs_id' => $cont_id,
                                    'contobs_idpessoa' => $teste2->isn_pessoa. '1',
                                    'contobs_tipo' => 'Titular',
                                    'contobs_status' => 'Não Ativo'
                                ]);
                            }
                        }else{
                            if($teste2->flg_status == 1){
                                $passar = DB::table('contratosobs')->insert([
                                    'contobs_id' => $cont_id,
                                    'contobs_idpessoa' => $teste2->isn_pessoa. '1',
                                    'contobs_tipo' => 'Dependente',
                                    'contobs_status' => 'Ativo'
                                ]);
                            }else{
                                $passar = DB::table('contratosobs')->insert([
                                    'contobs_id' => $cont_id,
                                    'contobs_idpessoa' => $teste2->isn_pessoa. '1',
                                    'contobs_tipo' => 'Dependente',
                                    'contobs_status' => 'Não Ativo'
                                ]);
                            }
                        }
                    }
                }
            }
        }
        return 'Foi meu parceiro compatriota bixo doido doido do krl doido';
    }

    public function PassarCategorias(Request $request){
        $categorias = DB::table('tb_pessoas_categorias')->where('pac_id', '>', '242327')->orderBy('pac_id')->get();
        foreach($categorias as $categorias){
            $pessoa = DB::table('pacientes')->where('pac_id', $categorias->pac_id)->update([
                'pac_categoria' => $categorias->pac_categoria
            ]);
        }
        return 'foi';
    }

    public function PassarIRNDucash(Request $request){
        $planoducash = DB::table('planos')->where('plan_nome','Ducash')->first()->plan_id;
        // dd($planoducash);
        $planobsirn = DB::table('planoobs')->where('planobs_plano','8')->get();
        foreach($planobsirn as $planobsirn){
            // dd($planobsirn);
            $planobsducash = DB::table('planoobs')->insert([
                'planobs_plano' => $planoducash,
                'planobs_produto' => $planobsirn->planobs_produto,
                'planobs_valor' => $planobsirn->planobs_valor,
                'planobs_incluso' => $planobsirn->planobs_incluso,
                'planobs_quantidade' => $planobsirn->planobs_quantidade,
            ]);
        }
        return 'foi';
    }

    public function TransfLotes(Request $request){
        $cobrancas = DB::table('cobranca')->get();
        foreach($cobrancas as $cobrancas){
            if ($cobrancas->fechado == '1') {
                $cobrancalote = DB::table('cobrancalote')->where('idlote', $cobrancas->idlote)->update([
                    'fechadolote' => 1
                ]);
            }
            if ($cobrancas->pago == '1') {
                $cobrancalote = DB::table('cobrancalote')->where('idlote', $cobrancas->idlote)->update([
                    'pagolote' => 1
                ]);
            }
        }
        return 'foi';
    }
    
}
