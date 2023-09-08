<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class MedicoController extends Controller
{
    public function MedicoMain(){
        return view('HomeMedico');
    }
    public function MedicoSolicitacaoUltrassom(Request $request){
        return view('SolicitacaoUltrassom');
    }
    public function MedicoSolicitacaoRaioX(Request $request){
        return view('SolicitacaoRaioX');
    }
    public function MedicoSolicitacaoExames(Request $request){
        return view('SolicitacaoExame');
    }
    public function MedicoReceitaMedica(Request $request){
        return view('ReceitaMedica');
    }
    public function MedicoAtestadoMedico(Request $request){
        return view('AtestadoMedico');
    }
    public function MedicoAtestadoComparecimento(Request $request){
        return view('AtestadoComparecimento');
    }
    public function MedicoReceituarioControleEspecial(Request $request){
        return view('ReceituarioControleEspecial');
    }

    public function MedicoLaboratoriosLivres(){
        $livres = DB::table('laboratorios')->where('lab_status', 'Livre')->get();
        $laboratorios = $livres->map(function($obj){
            return (array) $obj;
        })->toArray();
        return $livres;
    }

    public function cmp($a, $b) {
        return $a['age_data'] > $b['age_data'];
    }


    public function MedicoListaPac(Request $request){
        date_default_timezone_set('America/Sao_Paulo');
        $data = date('d/m/Y');
        // dd($data);
        $listapac = DB::table('agendas')
        ->where('age_status', "Pagamento Concluído")
        ->where('age_data', 'like', '%'.$data.'%')
        ->where('age_med', $request->medid)
        ->get();
        $pacientes = $listapac->map(function($obj){
            return (array) $obj;
        })->toArray();

        $deppagretorno = DB::table('agendas')
        ->where('age_status', "Retorno")
        ->get();

        for($i = 0; $i < count($deppagretorno); $i++){
            // dd($deppagretorno[$i]);
            $retorno = DB::table('agendamentocliente')
            ->where('idagenda', $deppagretorno[$i]->age_id)
            ->get();
            
            if(count($retorno) <= 1){
                $deppagretorno2 = DB::table('agendas')
                ->where('age_id', $deppagretorno[$i]->age_id)
                ->get();
                // dd($deppagretorno2);
                $deppagretorno3 = $deppagretorno2->map(function($obj){
                    return (array) $obj;
                })->toArray();
                // dd($deppagretorno3, $dependentespdv);
                $pacientes = array_merge($pacientes, $deppagretorno3);
                // dd($dependentespdv);
            }
        }

        
        
        // Ordena
        usort($pacientes, array( $this, 'sortDate' ));

        // dd($pacientes, $data);
        return $pacientes;
    }

    public function sortDate($a, $b) 
    {
        return $a['age_data'] > $b['age_data'];
    }

    public function MedicoListaPacServ(Request $request){
        $listapacserv = [];
        if($request->serv){
            for($i = 0; $i < count($request->serv); $i++){
                $listapacservs = DB::table('produtos')
                ->where('prod_id', $request->serv[$i])
                ->get();
                array_push($listapacserv, $listapacservs[0]->prod_nome);
            }
        }
        return $listapacserv;
    }

    public function MedicoRetornoAtendimento(Request $request){
        // dd($request->all());
        // $dateStart = new \DateTime('01/08/2021');
        // $dateNow   = new \DateTime(date('d/m/Y'));

        // $dateDiff = $dateStart->diff($dateNow);
        date_default_timezone_set('America/Sao_Paulo');
        $datahoje = new \DateTime(date('d-m-Y'));
        $listapacretorno = [[],[],[], []];
        $listaservicosmedico = [];
        $agenda = DB::table('agendas')
        ->where('age_id', $request->id)
        ->first();

        $medico = DB::table('medicos')
        ->where('med_id', $request->idmedico)
        ->first();

        $medicos = DB::table('medicos')
        ->where('med_espec', $medico->med_espec)
        ->get();
        
        for($i = 0; $i < count($medicos); $i++){
            $atendimentos = DB::table('agendas')
            ->where('age_pessoa', $agenda->age_pessoa)
            // ->where('age_contrato', $agenda->age_contrato)
            ->where('age_med', $medicos[$i]->med_id)
            ->where('age_status', 'Atendimento Concluído')
            ->get();
            // if($medicos[$i]->med_id != 1){
            //     dd($medicos[$i]->med_id, $atendimentos);
            // }
            if(count($atendimentos) > 0){
                
                // dd($atendimentos);
                for($o = 0; $o < count($atendimentos); $o++){
                    $dataagenda= new \DateTime(str_replace('/', '-', substr($atendimentos[$o]->age_data, 0, 10)));
                    $diferenca = $dataagenda->diff($datahoje);
                    if($diferenca->days < 45){
                        array_push($listapacretorno[0], $atendimentos[$o]->age_id);
                        array_push($listapacretorno[1], explode(' - ',$atendimentos[$o]->age_pessoa)[0]);
                        array_push($listapacretorno[2], $medicos[$i]->med_nome);
                        array_push($listapacretorno[3], substr($atendimentos[$o]->age_data, 0, 10));
                    }
                }
            }
        }
        return $listapacretorno;
    }

    public function MedicoIniciarAtendimento(Request $request){
        // dd($request->all());
        $pessoas = [];
        $idpessoa = "";
        $agenda = DB::table('agendas')
        ->where('age_id', $request->id)
        ->get();
        $pac = DB::table('pacientes')
        ->where('pac_nome', $request->nome)
        ->get();

        $forfis = DB::table('fornecedoresfis')
        ->where('forfis_nome', $request->nome)
        ->get();

        $func = DB::table('funcionarios')
        ->where('func_nome', $request->nome)
        ->get();

        $forjur = DB::table('fornecedoresjur')
        ->where('forjur_nome', $request->nome)
        ->get();

        $clijur = DB::table('clientesjur')
        ->where('clijur_nome', $request->nome)
        ->get();
        if(count($pac) > 0){
            for($i = 0; $i < count($pac); $i++){
                array_push($pessoas, $pac[$i]->pac_id.'1');
            }
        }

        if(count($forfis) > 0){
            for($i = 0; $i < count($forfis); $i++){
                array_push($pessoas, $forfis[$i]->forfis_id.'2');
            }
        }

        if(count($func) > 0){
            for($i = 0; $i < count($func); $i++){
                array_push($pessoas, $func[$i]->func_id.'3');
            }
        }

        if(count($forjur) > 0){
            for($i = 0; $i < count($forjur); $i++){
                array_push($pessoas, $forjur[$i]->forjur_id.'4');
            }
        }

        if(count($clijur) > 0){
            for($i = 0; $i < count($clijur); $i++){
                array_push($pessoas, $clijur[$i]->clijur_id.'5');
            }
        }
        // dd($pessoas);
        for($i = 0; $i < count($pessoas); $i++){
            $pessoaatual = DB::table('contratosobs')
            ->where('contobs_idpessoa', str_pad($pessoas[$i] , 9 , '0' , STR_PAD_LEFT))
            ->where('contobs_status' , 'Ativo')
            ->get();
            if(count($pessoaatual) > 0){
                $idpessoa = $pessoaatual[0]->contobs_idpessoa;
            }
        }
        return json_encode($idpessoa);
    }

    public function MedicoFinalizarAtendimento(Request $request){

        for($i = 0; $i < count($request->listexamesid); $i++){
            $attsitu = DB::table('agendamentocliente')->where('idagendamento', $request->listexamesid[$i])->update(['situacao' => 'finalizado']);
        }

        $lab = DB::table('laboratorios')->where('lab_id', $request->lab)->update(['lab_status' => 'Livre', 'lab_medatual' => null]);
        $agenda = DB::table('agendas')->where('age_id', $request->id)->update(['age_status' => 'Atendimento Concluído']);
        if($lab == 1 && $agenda == 1){
            return 1;
        }else{
            return 0;
        }
    }

    public function MedicoChamar(Request $request){
        // dd($request->all());
        $laboratorio = DB::table('laboratorios')->where('lab_id', $request->lugar)->first();
        // dd($laboratorio->lab_espec);
        $atendimento = DB::table('atendimentos')->insert([
            'aten_pessoa' => $request->pessoa,
            'aten_lugar' => $request->lugar,
            'aten_espec' => $laboratorio->lab_espec,
        ]);
        if($atendimento == 1){
            return 1;
        }else{
            return 0;
        }
    }

    public function MedicoDadosCliente(Request $request){
        // dd($request->all());
        switch (substr($request->id,-1)) {
            case 1:
                $tipocliente = "pacientes";
                $banco = "pac_id";
                break;
            case 2:
                $tipocliente = "fornecedoresfis";
                $banco = "forfis_id";
                break;
            case 3:
                $tipocliente = "funcionarios";
                $banco = "func_id";
                break;
            case 4:
                $tipocliente = "fornecedoresjur";
                $banco = "forjur_id";
                break;
            case 5:
                $tipocliente = "clientesjur";
                $banco = "clijur_id";
                break;
        }
        
        // dd($request->all());
        $idcliente = intval(substr($request->id, 0, -1));
        
        // dd($tipocliente);
        $dadoscliente = DB::table($tipocliente)
        ->where($banco, $idcliente)
        ->get();
        
        return $dadoscliente;
    }

    public function MedicoCadastrarSolicitacaoUltrassom(Request $request){
        date_default_timezone_set('America/Sao_Paulo');
        $data = date('d/m/Y');
        $opcoes = implode(",", $request->opcoes);
        $cadastrarsoliciult = DB::table('soliciult')->insert([
            "soliciult_idpessoa" => $request->idpessoa,
            "soliciult_nomepessoa" => $request->nome,
            "soliciult_opcoes" => $opcoes,
            "soliciult_data" => $data,
            "soliciult_idmedico" =>$request->idmedico,
        ]);
        if($cadastrarsoliciult == 1){
            return 1;
        }else{
            return 0;
        }
    }

    public function MedicoCadastrarSolicitacaoRaioX(Request $request){
        date_default_timezone_set('America/Sao_Paulo');
        $data = date('d/m/Y');
        $opcoes = implode(",", $request->opcoes);
        $cadastrarsoliciraiox = DB::table('soliciraiox')->insert([
            "soliciraiox_idpessoa" => $request->idpessoa,
            "soliciraiox_nomepessoa" => $request->nome,
            "soliciraiox_opcoes" => $opcoes,
            "soliciraiox_data" => $data,
            "soliciraiox_idmedico" =>$request->idmedico,
            "soliciraiox_socioirn" =>$request->socioirn,
        ]);
        if($cadastrarsoliciraiox == 1){
            return 1;
        }else{
            return 0;
        }
    }

    public function MedicoCadastrarSolicitacaoExames(Request $request){
        date_default_timezone_set('America/Sao_Paulo');
        $data = date('d/m/Y');
        $opcoes = implode(",", $request->opcoes);
        $cadastrarsoliciexlab = DB::table('soliciexlab')->insert([
            "soliciexlab_idpessoa" => $request->idpessoa,
            "soliciexlab_nomepessoa" => $request->nome,
            "soliciexlab_opcoes" => $opcoes,
            "soliciexlab_data" => $data,
            "soliciexlab_idmedico" =>$request->idmedico,
            "soliciexlab_socioirn" =>$request->socioirn,
            "soliciexlab_datanasc" =>$request->datanasc,
            "soliciexlab_telefone" =>$request->telefone,
            "soliciexlab_rg" =>$request->rg,
            "soliciexlab_datasolici" =>$request->datasolici,
            "soliciexlab_sexo" =>$request->sexo,
            "soliciexlab_valortotal" =>$request->valortotal,
        ]);
        if($cadastrarsoliciexlab == 1){
            return 1;
        }else{
            return 0;
        }
    }

    public function MedicoCadastrarReceitaMedica(Request $request){
        date_default_timezone_set('America/Sao_Paulo');
        $data = date('d/m/Y');
        $cadastrarrecmed = DB::table('receitamedica')->insert([
            "recmed_idpessoa" => $request->idpessoa,
            "recmed_texto" => $request->texto,
            "recmed_data" => $data,
            "recmed_idmedico" => $request->idmedico,
        ]);
        if($cadastrarrecmed == 1){
            return 1;
        }else{
            return 0;
        }
    }

    public function MedicoCadastrarAtestadoMedico(Request $request){
        $cadastrarattmed = DB::table('atestadomedico')->insert([
            'attmedico_idpessoa' => $request->idpessoa,
            'attmedico_idmedico' => $request->idmedico,
            'attmedico_nomedr' => $request->nomedr,
            'attmedico_nomepessoa' => $request->nomepessoa,
            'attmedico_diasnum' => $request->diasnum,
            'attmedico_diasext' => $request->diasext,
            'attmedico_motivo' => $request->motivo,
            'attmedico_coddoenca' => $request->coddoenca,
            'attmedico_data' => $request->data,
        ]);
        if($cadastrarattmed == 1){
            return 1;
        }else{
            return 0;
        }
    }

    public function MedicoCadastrarAtestadoComparecimento(Request $request){
        $cadastrarcomp = DB::table('atestadocomparecimento')->insert([
            'attcomp_idpessoa' => $request->idpessoa,
            'attcomp_idmedico' => $request->idmedico,
            'attcomp_fins' => $request->fins,
            'attcomp_nomepessoa' => $request->nomepessoa,
            'attcomp_tratamento' => $request->tratamento,
            'attcomp_horainicio' => $request->horainicio,
            'attcomp_horafim' => $request->horafim,
            'attcomp_data' => $request->data,
            'attcomp_dia' => $request->dia,
            'attcomp_mes' => $request->mes,
            'attcomp_ano' => $request->ano,
        ]);
        if($cadastrarcomp == 1){
            return 1;
        }else{
            return 0;
        }
    }

    public function MedicoCadastrarReceituarioControleEspecial(Request $request){
        // dd($request->all());
        $cadastrarreceitcontespec = DB::table('receituariocontespec')->insert([
            'receitcontespec_idpessoa' => $request->idpessoa,
            'receitcontespec_idmedico' => $request->idmedico,
            'receitcontespec_nomeemitente' => $request->nomeemitente,
            'receitcontespec_crmemitente' => $request->crmemitente,
            'receitcontespec_ufemitente' => $request->ufemitente,
            'receitcontespec_numeroemitente' => $request->numeroemitente,
            'receitcontespec_nomepaciente' => $request->nomepaciente,
            'receitcontespec_enderecopaciente' => $request->enderecopaciente,
            'receitcontespec_prescricao' => $request->prescricao,
            'receitcontespec_data' => $request->data,
            'receitcontespec_nomecomprador' => $request->nomecomprador,
            'receitcontespec_rgcomprador' => $request->rgcomprador,
            'receitcontespec_orgaoemissorcomprador' => $request->orgaoemissorcomprador,
            'receitcontespec_enderecocomprador' => $request->enderecocomprador,
            'receitcontespec_cidadecomprador' => $request->cidadecomprador,
            'receitcontespec_ufcomprador' => $request->ufcomprador,
            'receitcontespec_telefonecomprador' => $request->telefonecomprador,
        ]);
        if($cadastrarreceitcontespec == 1){
            return 1;
        }else{
            return 0;
        }
    }

    public function NovoHpp(Request $request){
        // dd($request->all());

        $novohpp = DB::table('hpps')->insert([
            'idpessoa' => $request->idpessoa,
            'nomepatologia' => $request->nomepatologia
        ]);

        if($novohpp == 1){
            return 1;
        }else{
            return 0;
        }
    }

    public function ListHpp(Request $request){
        // dd($request->all());
        $listhpp = DB::table('hpps')->where('idpessoa', $request->idpessoa)->get();

        $listhpp2 = $listhpp->map(function($obj){
            return (array) $obj;
        })->toArray();
        
        return $listhpp2;
    }

    public function ApagarHpp(Request $request){
        // dd($request->all());
        $deletaragenda = DB::table('hpps')
        ->where('idhpp', $request->idhpp)
        ->delete();
        
        if($deletaragenda){
            return 1;
        }else{
            return 0;
        }
    }

    public function SalvarHistFamilia (Request $request){
        // dd($request->all());

        $salvarhistfamilia = DB::table('histfamilias')->insert([
            'idpessoa' => $request->idpessoa,
            'deschistfamilia' => $request->deschistfamilia
        ]);

        if($salvarhistfamilia == 1){
            return 1;
        }else{
            return 0;
        }
    }

    public function HistFamilias (Request $request){
        // dd($request->all());

        $histfamilia = DB::table('histfamilias')->where('idpessoa', $request->idpessoa)->first();
        if($histfamilia){
            return json_encode($histfamilia->deschistfamilia);
        }
        
    
    }

    public function NovoTratamento(Request $request){
        // dd($request->all());

        date_default_timezone_set('America/Sao_Paulo');
        $data = date('Y-m-d');
        // dd($data);

        $novotratamentos = DB::table('tratamentos')->insert([
            'idpessoa' => $request->idpessoa,
            'nometratamento' => $request->nometratamento,
            'situacao' => 'Em Tratamento',
            'queixaprincipal' => '',
            'historiadoencaatual' => '',
            'cid' => '',
            'examefisico' => '',
            'recomendacoes' => '',
            'resultadoexames' => '',
            'evolucao' => '',
            'datafim' => '',
            'datainicio' => $data
        ]);

        if($novotratamentos == 1){
            return 1;
        }else{
            return 0;
        }
    }

    public function ListTratamento(Request $request){
        // dd($request->all());
        $listtratamento = DB::table('tratamentos')->where('idpessoa', $request->idpessoa)->get();

        $listtratamento2 = $listtratamento->map(function($obj){
            return (array) $obj;
        })->toArray();
        
        return $listtratamento2;
    }

    public function AbrirTratamento(Request $request){
        // dd($request->all());
        $listtratamento = DB::table('tratamentos')->where('idtratamento', $request->idtratamento)->first();
        
        return $listtratamento;
    }

    public function AttTratamento(Request $request){
        // dd($request->all());
        $queixaprincipal = '';
        $historiadoencaatual = '';
        $cid = '';
        $examefisico = '';
        $resultadoexames = '';
        $recomendacoes = '';
        $evolucao = '';
        if($request->queixaprincipal != null){
            $queixaprincipal = $request->queixaprincipal;
        }
        if($request->historiadoencaatual != null){
            $historiadoencaatual = $request->historiadoencaatual;
        }
        if($request->cid != null){
            $cid = $request->cid;
        }
        if($request->examefisico != null){
            $examefisico = $request->examefisico;
        }
        if($request->resultadoexames != null){
            $resultadoexames = $request->resultadoexames;
        }
        if($request->recomendacoes != null){
            $recomendacoes = $request->recomendacoes;
        }
        if($request->evolucao != null){
            $evolucao = $request->evolucao;
        }
        $atttratamento = DB::table('tratamentos')->where('idtratamento', $request->idtratamento)
        ->update([
            "queixaprincipal" => $queixaprincipal,
            "historiadoencaatual" => $historiadoencaatual,
            "cid" => $cid,
            "examefisico" => $examefisico,
            "recomendacoes" => $recomendacoes,
            "resultadoexames" => $resultadoexames,
            "evolucao" => $evolucao,
        ]);
        
        if($atttratamento == 1){
            return 1;
        }else{
            return 0;
        }
    }

    public function NovaEvolucao(Request $request){
        // dd($request->all());

        date_default_timezone_set('America/Sao_Paulo');
        $data = date('d/m/Y');
        // dd($data);

        $novaevolucaos = DB::table('evolucoes')->insert([
            'idtratamento' => $request->idtratamento,
            'medid' => $request->medid,
            'tituloevolucao' => $request->tituloevolucao,
            'descevolucao' => $request->descevolucao,
            'dataevolucao' => $data
        ]);

        if($novaevolucaos == 1){
            return 1;
        }else{
            return 0;
        }
    }

    public function ListEvolucao(Request $request){
        // dd($request->all());
        $dados = ["idevolucao"=> [], "dataevolucao"=> [], "medico" => [], "tituloevolucao" => [], "descevolucao" => [], "tratamento" => []];
        $listaevolucao = DB::table('evolucoes')->where('idtratamento', $request->idtratamento)->get();

        $listaevolucao2 = $listaevolucao->map(function($obj){
            return (array) $obj;
        })->toArray();

        for($i = 0; $i < count($listaevolucao2); $i++){
            $nomemedico = DB::table('medicos')->where('med_id', $listaevolucao2[$i]['medid'])->first()->med_nome;
            $nometratamento = DB::table('tratamentos')->where('idtratamento', $listaevolucao2[$i]['idtratamento'])->first()->nometratamento;
            array_push($dados['idevolucao'],$listaevolucao2[$i]['idevolucao']);
            array_push($dados['dataevolucao'],$listaevolucao2[$i]['dataevolucao']);
            array_push($dados['tituloevolucao'],$listaevolucao2[$i]['tituloevolucao']);
            array_push($dados['descevolucao'],$listaevolucao2[$i]['descevolucao']);
            array_push($dados['medico'],$nomemedico);
            array_push($dados['tratamento'],$nometratamento);
        }
        
        return $dados;
    }

    public function RemoverEvolucao(Request $request){
        // dd($request->all());
        $removerevolucao = DB::table('evolucoes')
        ->where('idevolucao', $request->idevolucao)
        ->delete();
        
        if($removerevolucao){
            return 1;
        }else{
            return 0;
        }
    }

    public function ListServicos(Request $request){
        // dd($request->all());
        $listservicos = DB::table('produtos')
        ->where('prod_tipo', 'Servico')
        ->get();

        $listservicos2 = $listservicos->map(function($obj){
            return (array) $obj;
        })->toArray();
        
        return $listservicos2;

    }

    public function NovoProcedimento(Request $request){
        // dd($request->all());

        date_default_timezone_set('America/Sao_Paulo');
        $data = date('d/m/Y');
        // dd($data);

        $novoprocedimentos = DB::table('procedimentostratamentos')->insert([
            'idtratamento' => $request->idtratamento,
            'situacao' => $request->situacao,
            'idproduto' => $request->idproduto,
            'datainicio' => $data,
            'datafim' => '' 
        ]);

        if($novoprocedimentos == 1){
            return 1;
        }else{
            return 0;
        }
    }

    public function ListProcedimento(Request $request){
        // dd($request->all());
        $dados = ["idprocedimento"=> [], "procedimento"=> [], "datainicio" => [], "datafim" => [], "situacao" => []];
        $listaprocedimento = DB::table('procedimentostratamentos')->where('idtratamento', $request->idtratamento)->get();

        $listaprocedimento2 = $listaprocedimento->map(function($obj){
            return (array) $obj;
        })->toArray();

        for($i = 0; $i < count($listaprocedimento2); $i++){
            $nomeprocedimento = DB::table('produtos')->where('prod_id', $listaprocedimento2[$i]['idproduto'])->first()->prod_nome;
            array_push($dados['idprocedimento'],$listaprocedimento2[$i]['idproctratamento']);
            array_push($dados['procedimento'],$nomeprocedimento);
            array_push($dados['datainicio'],$listaprocedimento2[$i]['datainicio']);
            array_push($dados['datafim'],$listaprocedimento2[$i]['datafim']);
            array_push($dados['situacao'],$listaprocedimento2[$i]['situacao']);
        }
        
        return $dados;
    }

    public function ListAtendimentoExames(Request $request){
        // dd($request->all());
        $dados = ["idagendamento"=> [], "nomeexame"=> [], "situacao" => [], "qtdexame" => []];
        $agendamento = DB::table('agendamentocliente')->where('idagenda', $request->idagenda)->get();
        // dd($agendamento);

        foreach($agendamento as $agendamento){
            if($agendamento->servico == 0){
                array_push($dados['idagendamento'],$agendamento->idagendamento);
                array_push($dados['nomeexame'],'Retorno');
                array_push($dados['qtdexame'],$agendamento->quantidade);
                array_push($dados['situacao'],$agendamento->situacao);
            }else{
                $nomeproduto = DB::table('produtos')->where('prod_id', $agendamento->servico)->first()->prod_nome;
                array_push($dados['idagendamento'],$agendamento->idagendamento);
                array_push($dados['nomeexame'],$nomeproduto);
                array_push($dados['qtdexame'],$agendamento->quantidade);
                array_push($dados['situacao'],$agendamento->situacao);
            }
        }
        
        return $dados;
    }

    public function RemoverProcedimento(Request $request){
        // dd($request->all());
        $removerprocedimento = DB::table('procedimentostratamentos')
        ->where('idproctratamento', $request->idprocedimento)
        ->delete();
        
        if($removerprocedimento){
            return 1;
        }else{
            return 0;
        }
    }

    public function EditProcedimento(Request $request){
        // dd($request->all());
        $attprocedimento = DB::table('procedimentostratamentos')->where('idproctratamento', $request->idprocedimento)
        ->update([
            "situacao" => $request->situacao,
            "datafim" => $request->datafim,
        ]);
        
        if($attprocedimento == 1){
            return 1;
        }else{
            return 0;
        }
    }

    public function FinalizarTratamento(Request $request){
        // dd($request->all());
        date_default_timezone_set('America/Sao_Paulo');
        $data = date('Y-m-d');
        $tratamento = DB::table('tratamentos')->where('idtratamento', $request->idtratamento)
        ->update([
            "datafim" => $data,
            'situacao' => 'Finalizado'
        ]);
        
        if($tratamento == 1){
            return 1;
        }else{
            return 0;
        }
    }

    public function AttDadosPac(Request $request){
        // dd($request->all());

        $tipopac = substr($request->id, -1);
        $idpac = substr($request->id, 0, -1);
        // dd($tipopac, $idpac);
        if($tipopac == '1'){
            $attdadospac = DB::table('pacientes')->where('pac_id', $idpac)
            ->update([
                "pac_altura" => $request->alturaatualinput,
                "pac_peso" => $request->pesoatualinput,
                "pac_pa" => $request->paatualinput,
                "pac_tiposangue" => $request->tiposangueatualinput,
            ]);
        }else if($tipopac == '2'){
            $attdadospac = DB::table('fornecedoresfis')->where('forfis_id', $idpac)
            ->update([
                "forfis_altura" => $request->alturaatualinput,
                "forfis_peso" => $request->pesoatualinput,
                "forfis_pa" => $request->paatualinput,
                "forfis_tiposangue" => $request->tiposangueatualinput,
            ]);
        }else{
            $attdadospac = DB::table('funcionarios')->where('func_id', $idpac)
            ->update([
                "func_altura" => $request->alturaatualinput,
                "func_peso" => $request->pesoatualinput,
                "func_pa" => $request->paatualinput,
                "func_tiposangue" => $request->tiposangueatualinput,
            ]);
        }
        
        
        if($attdadospac == 1){
            return 1;
        }else{
            return 0;
        }
    }

    
    
}
