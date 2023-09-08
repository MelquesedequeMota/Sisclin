<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use App\Models\Usuarios;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Validator;
use Datetime;
use Illuminate\Support\Facades\Auth;

class RelatorioController extends Controller
{
    public function RelatorioVendedores(Request $request){
        return view('RelatorioVendedores');
    }
    public function RelatorioDespesasEReceitas(Request $request){
        return view('RelatorioDespesasEReceitas');
    }
    public function RelatorioAdimplentesInadimplentes(Request $request){
        return view('RelatorioAdimplentesInadimplentes');
    }
    public function RelatorioPlanos(Request $request){
        return view('RelatorioPlanos');
    }
    public function RelatorioAtendimentos(Request $request){
        return view('RelatorioAtendimentos');
    }

    

    public function RelatorioVendedoresDados(Request $request){
        $vendedores = [[],[],[]];
        $vendasvendedores = [[],[],[],[],[]];
        
        $vendedoressql = DB::table('cobrancalote')->select('cobradorlote')->distinct()->get();
        // dd($cobrancas, $vendedoressql);
        foreach($vendedoressql as $vendedoressql){
            // dd($vendedoressql);
            $quantidadevendedor = count(DB::table('cobrancalote')->where('cobradorlote', $vendedoressql->cobradorlote)->get());
            $nomeusuario = DB::table('users')->where('id', $vendedoressql->cobradorlote)->first()->name;
            // dd($vendedoressql->cobradorlote, $nomeusuario, $quantidadevendedor);
            array_push($vendedores[0], $vendedoressql->cobradorlote);
            array_push($vendedores[1], $nomeusuario);
            array_push($vendedores[2], $quantidadevendedor);

            $vendas = DB::table('cobrancalote')->where('cobradorlote', $vendedoressql->cobradorlote)->get();
            foreach($vendas as $vendas){
                if(substr($vendas->responsavellote, -1) == 1){
                    $responsavellote = DB::table('pacientes')->where('pac_id', substr($vendas->responsavellote, 0, strlen($vendas->responsavellote)-1))->first();
                    array_push($vendasvendedores[2], $responsavellote->pac_nome . ' - ' . $responsavellote->pac_cpf);
                }else if(substr($vendas->responsavellote, -1) == 2){
                    $responsavellote = DB::table('fornecedoresfis')->where('forfis_id', substr($vendas->responsavellote, 0, strlen($vendas->responsavellote)-1))->first();
                    array_push($vendasvendedores[2], $responsavellote->forfis_nome . ' - ' . $responsavellote->forfis_cpf);
                }else if(substr($vendas->responsavellote, -1) == 3){
                    $responsavellote = DB::table('funcionarios')->where('func_id', substr($vendas->responsavellote, 0, strlen($vendas->responsavellote)-1))->first();
                    array_push($vendasvendedores[2], $responsavellote->func_nome . ' - ' . $responsavellote->func_cpf);
                }else if(substr($vendas->responsavellote, -1) == 4){
                    $responsavellote = DB::table('clientesjur')->where('clijur_id', substr($vendas->responsavellote, 0, strlen($vendas->responsavellote)-1))->first();
                    array_push($vendasvendedores[2], $responsavellote->clijur_nome . ' - ' . $responsavellote->clijur_cpf);
                }else{
                    $responsavellote = DB::table('fornecedoresjur')->where('fornecedoresjur_id', substr($vendas->responsavellote, 0, strlen($vendas->responsavellote)-1))->first();
                    array_push($vendasvendedores[2], $responsavellote->forjur_nome . ' - ' . $responsavellote->forjur_cpf);
                }

                array_push($vendasvendedores[0], $vendas->cobradorlote);
                array_push($vendasvendedores[1], $vendas->idlote);
                array_push($vendasvendedores[3], $vendas->contratolote);
                array_push($vendasvendedores[4], $vendas->datalote);
            }
        }
        
        return [$vendedores, $vendasvendedores];
    }

    

    public function RelatorioAdimplentesInadimplentesDados(Request $request){
        $resultado = [[],[],[],[],[]];
        // dd($request->all());
        if($request->filtro == ''){
            $lotes = DB::table('cobrancalote')->where('datalote','>=',$request->inicio)->where('datalote','<=',$request->fim)->get();
            foreach($lotes as $lotes){
                $cobrancasinamdimplentes = count(DB::table('cobranca')->where('idlote', $lotes->idlote)->where('data','>=',$request->inicio)->where('data','<=',$request->fim)->where('pago', '0')->get());
                    $telefones = [];
                        if(substr($lotes->responsavellote, -1) == 1){
                            $cliente = DB::table('pacientes')->where('pac_id', substr($lotes->responsavellote, 0, strlen($lotes->responsavellote)-1))->first();
                            if($cliente->pac_tel1 != 'null' && $cliente->pac_tel1 != ''){
                                array_push($telefones, $cliente->pac_tel1);
                            }
                            if($cliente->pac_tel2 != 'null' && $cliente->pac_tel2 != ''){
                                array_push($telefones, $cliente->pac_tel2);
                            }
                            if($cliente->pac_celular != 'null' && $cliente->pac_celular != ''){
                                array_push($telefones, $cliente->pac_celular);
                            }
                            array_push($resultado[0],$cliente->pac_nome . ' - ' . $cliente->pac_cpf);
                        }else if(substr($lotes->responsavellote, -1) == 2){
                            $cliente = DB::table('fornecedoresfis')->where('forfis_id', substr($lotes->responsavellote, 0, strlen($lotes->responsavellote)-1))->first();
                            if($cliente->forfis_tel1 != 'null' && $cliente->forfis_tel1 != ''){
                                array_push($telefones, $cliente->forfis_tel1);
                            }
                            if($cliente->forfis_tel2 != 'null' && $cliente->forfis_tel2 != ''){
                                array_push($telefones, $cliente->forfis_tel2);
                            }
                            if($cliente->forfis_celular != 'null' && $cliente->forfis_celular != ''){
                                array_push($telefones, $cliente->forfis_celular);
                            }
                            array_push($resultado[0],$cliente->forfis_nome . ' - ' . $cliente->forfis_cpf);
                        }else if(substr($lotes->responsavellote, -1) == 3){
                            $cliente = DB::table('funcionarios')->where('func_id', substr($lotes->responsavellote, 0, strlen($lotes->responsavellote)-1))->first();
                            if($cliente->func_tel1 != 'null' && $cliente->func_tel1 != ''){
                                array_push($telefones, $cliente->func_tel1);
                            }
                            if($cliente->func_tel2 != 'null' && $cliente->func_tel2 != ''){
                                array_push($telefones, $cliente->func_tel2);
                            }
                            if($cliente->func_celular != 'null' && $cliente->func_celular != ''){
                                array_push($telefones, $cliente->func_celular);
                            }
                            array_push($resultado[0],$cliente->func_nome . ' - ' . $cliente->func_cpf);
                        }else if(substr($lotes->responsavellote, -1) == 4){
                            $cliente = DB::table('clientesjur')->where('clijur_id', substr($lotes->responsavellote, 0, strlen($lotes->responsavellote)-1))->first();
                            if($cliente->clijur_tel1 != 'null' && $cliente->clijur_tel1 != ''){
                                array_push($telefones, $cliente->clijur_tel1);
                            }
                            if($cliente->clijur_tel2 != 'null' && $cliente->clijur_tel2 != ''){
                                array_push($telefones, $cliente->clijur_tel2);
                            }
                            if($cliente->clijur_celular != 'null' && $cliente->clijur_celular != ''){
                                array_push($telefones, $cliente->clijur_celular);
                            }
                            array_push($resultado[0],$cliente->clijur_nome . ' - ' . $cliente->clijur_cpf);
                        }else{
                            $cliente = DB::table('fornecedoresjur')->where('fornecedoresjur_id', substr($lotes->responsavellote, 0, strlen($lotes->responsavellote)-1))->first();
                            if($cliente->forjur_tel1 != 'null' && $cliente->forjur_tel1 != ''){
                                array_push($telefones, $cliente->forjur_tel1);
                            }
                            if($cliente->forjur_tel2 != 'null' && $cliente->forjur_tel2 != ''){
                                array_push($telefones, $cliente->forjur_tel2);
                            }
                            if($cliente->forjur_celular != 'null' && $cliente->forjur_celular != ''){
                                array_push($telefones, $cliente->forjur_celular);
                            }
                            array_push($resultado[0],$cliente->forjur_nome . ' - ' . $cliente->forjur_cpf);
                        }
                        $telefones = implode(',',$telefones);
                        array_push($resultado[1],$lotes->contratolote);
                        array_push($resultado[2],$telefones);
                        array_push($resultado[3],$cobrancasinamdimplentes);
                        if($cobrancasinamdimplentes == 0){
                            array_push($resultado[4],'Adimplente');
                        }else{
                            array_push($resultado[4],'Inadimplente');
                        }
                }
        }else if($request->filtro == 'adimplentes'){
            $lotes = DB::table('cobrancalote')->where('pagolote', '1')->where('datalote','>=',$request->inicio)->where('datalote','<=',$request->fim)->get();
            foreach($lotes as $lotes){
                $cobrancasinamdimplentes = count(DB::table('cobranca')->where('idlote', $lotes->idlote)->where('data','>=',$request->inicio)->where('data','<=',$request->fim)->where('pago', '0')->get());
                if ($cobrancasinamdimplentes == 0) {
                    $telefones = [];
                        if(substr($lotes->responsavellote, -1) == 1){
                            $cliente = DB::table('pacientes')->where('pac_id', substr($lotes->responsavellote, 0, strlen($lotes->responsavellote)-1))->first();
                            if($cliente->pac_tel1 != 'null' && $cliente->pac_tel1 != ''){
                                array_push($telefones, $cliente->pac_tel1);
                            }
                            if($cliente->pac_tel2 != 'null' && $cliente->pac_tel2 != ''){
                                array_push($telefones, $cliente->pac_tel2);
                            }
                            if($cliente->pac_celular != 'null' && $cliente->pac_celular != ''){
                                array_push($telefones, $cliente->pac_celular);
                            }
                            array_push($resultado[0],$cliente->pac_nome . ' - ' . $cliente->pac_cpf);
                        }else if(substr($lotes->responsavellote, -1) == 2){
                            $cliente = DB::table('fornecedoresfis')->where('forfis_id', substr($lotes->responsavellote, 0, strlen($lotes->responsavellote)-1))->first();
                            if($cliente->forfis_tel1 != 'null' && $cliente->forfis_tel1 != ''){
                                array_push($telefones, $cliente->forfis_tel1);
                            }
                            if($cliente->forfis_tel2 != 'null' && $cliente->forfis_tel2 != ''){
                                array_push($telefones, $cliente->forfis_tel2);
                            }
                            if($cliente->forfis_celular != 'null' && $cliente->forfis_celular != ''){
                                array_push($telefones, $cliente->forfis_celular);
                            }
                            array_push($resultado[0],$cliente->forfis_nome . ' - ' . $cliente->forfis_cpf);
                        }else if(substr($lotes->responsavellote, -1) == 3){
                            $cliente = DB::table('funcionarios')->where('func_id', substr($lotes->responsavellote, 0, strlen($lotes->responsavellote)-1))->first();
                            if($cliente->func_tel1 != 'null' && $cliente->func_tel1 != ''){
                                array_push($telefones, $cliente->func_tel1);
                            }
                            if($cliente->func_tel2 != 'null' && $cliente->func_tel2 != ''){
                                array_push($telefones, $cliente->func_tel2);
                            }
                            if($cliente->func_celular != 'null' && $cliente->func_celular != ''){
                                array_push($telefones, $cliente->func_celular);
                            }
                            array_push($resultado[0],$cliente->func_nome . ' - ' . $cliente->func_cpf);
                        }else if(substr($lotes->responsavellote, -1) == 4){
                            $cliente = DB::table('clientesjur')->where('clijur_id', substr($lotes->responsavellote, 0, strlen($lotes->responsavellote)-1))->first();
                            if($cliente->clijur_tel1 != 'null' && $cliente->clijur_tel1 != ''){
                                array_push($telefones, $cliente->clijur_tel1);
                            }
                            if($cliente->clijur_tel2 != 'null' && $cliente->clijur_tel2 != ''){
                                array_push($telefones, $cliente->clijur_tel2);
                            }
                            if($cliente->clijur_celular != 'null' && $cliente->clijur_celular != ''){
                                array_push($telefones, $cliente->clijur_celular);
                            }
                            array_push($resultado[0],$cliente->clijur_nome . ' - ' . $cliente->clijur_cpf);
                        }else{
                            $cliente = DB::table('fornecedoresjur')->where('fornecedoresjur_id', substr($lotes->responsavellote, 0, strlen($lotes->responsavellote)-1))->first();
                            if($cliente->forjur_tel1 != 'null' && $cliente->forjur_tel1 != ''){
                                array_push($telefones, $cliente->forjur_tel1);
                            }
                            if($cliente->forjur_tel2 != 'null' && $cliente->forjur_tel2 != ''){
                                array_push($telefones, $cliente->forjur_tel2);
                            }
                            if($cliente->forjur_celular != 'null' && $cliente->forjur_celular != ''){
                                array_push($telefones, $cliente->forjur_celular);
                            }
                            array_push($resultado[0],$cliente->forjur_nome . ' - ' . $cliente->forjur_cpf);
                        }
                        $telefones = implode(',',$telefones);
                        array_push($resultado[1],$lotes->contratolote);
                        array_push($resultado[2],$telefones);
                        array_push($resultado[3],$cobrancasinamdimplentes);
                        if($cobrancasinamdimplentes == 0){
                            array_push($resultado[4],'Adimplente');
                        }else{
                            array_push($resultado[4],'Inadimplente');
                        }
                }
            }
        }else{
            $lotes = DB::table('cobrancalote')->where('pagolote', '0')->where('datalote','>=',$request->inicio)->where('datalote','<=',$request->fim)->get();
            foreach($lotes as $lotes){
                $cobrancasinamdimplentes = count(DB::table('cobranca')->where('idlote', $lotes->idlote)->where('data','>=',$request->inicio)->where('data','<=',$request->fim)->where('pago', '0')->get());
                if ($cobrancasinamdimplentes > 0) {
                    $telefones = [];
                        if(substr($lotes->responsavellote, -1) == 1){
                            $cliente = DB::table('pacientes')->where('pac_id', substr($lotes->responsavellote, 0, strlen($lotes->responsavellote)-1))->first();
                            if($cliente->pac_tel1 != 'null' && $cliente->pac_tel1 != ''){
                                array_push($telefones, $cliente->pac_tel1);
                            }
                            if($cliente->pac_tel2 != 'null' && $cliente->pac_tel2 != ''){
                                array_push($telefones, $cliente->pac_tel2);
                            }
                            if($cliente->pac_celular != 'null' && $cliente->pac_celular != ''){
                                array_push($telefones, $cliente->pac_celular);
                            }
                            array_push($resultado[0],$cliente->pac_nome . ' - ' . $cliente->pac_cpf);
                        }else if(substr($lotes->responsavellote, -1) == 2){
                            $cliente = DB::table('fornecedoresfis')->where('forfis_id', substr($lotes->responsavellote, 0, strlen($lotes->responsavellote)-1))->first();
                            if($cliente->forfis_tel1 != 'null' && $cliente->forfis_tel1 != ''){
                                array_push($telefones, $cliente->forfis_tel1);
                            }
                            if($cliente->forfis_tel2 != 'null' && $cliente->forfis_tel2 != ''){
                                array_push($telefones, $cliente->forfis_tel2);
                            }
                            if($cliente->forfis_celular != 'null' && $cliente->forfis_celular != ''){
                                array_push($telefones, $cliente->forfis_celular);
                            }
                            array_push($resultado[0],$cliente->forfis_nome . ' - ' . $cliente->forfis_cpf);
                        }else if(substr($lotes->responsavellote, -1) == 3){
                            $cliente = DB::table('funcionarios')->where('func_id', substr($lotes->responsavellote, 0, strlen($lotes->responsavellote)-1))->first();
                            if($cliente->func_tel1 != 'null' && $cliente->func_tel1 != ''){
                                array_push($telefones, $cliente->func_tel1);
                            }
                            if($cliente->func_tel2 != 'null' && $cliente->func_tel2 != ''){
                                array_push($telefones, $cliente->func_tel2);
                            }
                            if($cliente->func_celular != 'null' && $cliente->func_celular != ''){
                                array_push($telefones, $cliente->func_celular);
                            }
                            array_push($resultado[0],$cliente->func_nome . ' - ' . $cliente->func_cpf);
                        }else if(substr($lotes->responsavellote, -1) == 4){
                            $cliente = DB::table('clientesjur')->where('clijur_id', substr($lotes->responsavellote, 0, strlen($lotes->responsavellote)-1))->first();
                            if($cliente->clijur_tel1 != 'null' && $cliente->clijur_tel1 != ''){
                                array_push($telefones, $cliente->clijur_tel1);
                            }
                            if($cliente->clijur_tel2 != 'null' && $cliente->clijur_tel2 != ''){
                                array_push($telefones, $cliente->clijur_tel2);
                            }
                            if($cliente->clijur_celular != 'null' && $cliente->clijur_celular != ''){
                                array_push($telefones, $cliente->clijur_celular);
                            }
                            array_push($resultado[0],$cliente->clijur_nome . ' - ' . $cliente->clijur_cpf);
                        }else{
                            $cliente = DB::table('fornecedoresjur')->where('fornecedoresjur_id', substr($lotes->responsavellote, 0, strlen($lotes->responsavellote)-1))->first();
                            if($cliente->forjur_tel1 != 'null' && $cliente->forjur_tel1 != ''){
                                array_push($telefones, $cliente->forjur_tel1);
                            }
                            if($cliente->forjur_tel2 != 'null' && $cliente->forjur_tel2 != ''){
                                array_push($telefones, $cliente->forjur_tel2);
                            }
                            if($cliente->forjur_celular != 'null' && $cliente->forjur_celular != ''){
                                array_push($telefones, $cliente->forjur_celular);
                            }
                            array_push($resultado[0],$cliente->forjur_nome . ' - ' . $cliente->forjur_cpf);
                        }
                        $telefones = implode(',',$telefones);
                        array_push($resultado[1],$lotes->contratolote);
                        array_push($resultado[2],$telefones);
                        array_push($resultado[3],$cobrancasinamdimplentes);
                        if($cobrancasinamdimplentes == 0){
                            array_push($resultado[4],'Adimplente');
                        }else{
                            array_push($resultado[4],'Inadimplente');
                        }
                }
            }
                    
        }

        
        return $resultado;
    }
    public function RelatorioPlanosDados(Request $request){
        $resultado = [[],[],[],[],[]];
        $fim= $request->fim;
        $contratos = DB::table('contratos')
        ->where('cont_datainicio', '>=', $request->inicio)
        ->where('cont_plano', $request->filtro)
        ->where(function ($query) use ($fim) {
            $query->where('cont_datafim', '<=', $fim)
              ->orWhere('cont_datafim', null);
          })
        ->get();
        foreach ($contratos as $contratos) {
            
            $cobrancalote = DB::table('cobrancalote')->where('contratolote', $contratos->cont_id)->first();
            $cobranca = DB::table('cobranca')->where('contrato', $contratos->cont_id)->first();
            $plano = DB::table('planos')->where('plan_id', $contratos->cont_plano)->first();
            $titular_id = substr($cobrancalote->responsavellote, 0, -1);
            $titular_tipo = substr($cobrancalote->responsavellote, -1);
            if($titular_tipo == 1){
                $titular = DB::table('pacientes')->where('pac_id', $titular_id)->first()->pac_nome;
            }else if($titular_tipo == 2){
                $titular = DB::table('fornecedoresfis')->where('forfis_id', $titular_id)->first()->forfis_nome;
            }else{
                $titular = DB::table('funcionarios')->where('func_id', $titular_id)->first()->func_nome;
            }
            array_push($resultado[0], $contratos->cont_id);
            array_push($resultado[1], $titular);
            array_push($resultado[2], $cobrancalote->formapagamentolote);
            array_push($resultado[3], $plano->plan_adesao);
            array_push($resultado[4], $cobranca->valor);
        }
        return $resultado;
    }

    public function RelatorioPlanosTodos(Request $request){

        $resultado = [[],[]];
        $planos = DB::table('planos')->get();

        foreach($planos as $planos){

            array_push($resultado[0], $planos->plan_id);
            array_push($resultado[1], $planos->plan_nome);

        }
        
        return $resultado;
    }

    public function RelatorioEspecialidadesTodos(Request $request){

        $resultado = [[],[]];
        $especialidades = DB::table('especialidades')->get();
    
        foreach($especialidades as $especialidades){
    
            array_push($resultado[0], $especialidades->espec_id);
            array_push($resultado[1], $especialidades->espec_nome);
    
        }
        
        return $resultado;
        
    }
    
    public function RelatorioExamesTodos(Request $request){
    
        $resultado = [[],[]];
        $condicao = 'Exame';
        $exames = DB::table('produtos')
                    ->where(function ($query) use ($condicao) {
                    $query->where('prod_tipo', $condicao)
                    ->orWhere('prod_tipo', 'Servico');
                })
                ->get();
        
        foreach($exames as $exames){
        
            array_push($resultado[0], $exames->prod_id);
            array_push($resultado[1], $exames->prod_nome);
        
        }
    
        return $resultado;
    
    }

    public function RelatorioAtendimentosDados(Request $request){
        // dd($request->all());
        $resultado = [[],[],[],[],[],[]];
        $agendamentos = DB::table('agendas')->where('age_datadb', '>=', $request->inicio)->where('age_datadb', '<=', $request->fim)->where('age_status', 'Pagamento Concluido')->get();
        // dd($agendamentos);
        foreach ($agendamentos as $agendamentos) {
            $data = explode(' - ' , $agendamentos->age_data)[0];
            $titular = explode(' - ' , $agendamentos->age_pessoa)[0];
            if($agendamentos->age_contrato != 'Particular'){
                $contrato = DB::table('contratos')->where('cont_id',$agendamentos->age_contrato)->first();
                $plano = DB::table('planos')->where('plan_id', $contrato->cont_plano)->first()->plan_nome;
            }else{
                $plano = 'Particular';
            }
            // $agendamentocliente = DB::table('agendamentocliente')->where('idagenda', $agendamento->idagenda)->get();
            $compras = DB::table('compras')->where('comp_deppag',$agendamentos->age_id)->first();
            $compraobs = DB::table('compraobs')->where('comp_id', $compras->comp_id)->get();
            foreach ($compraobs as $compraobs) {
                $exame = DB::table('produtos')->where('prod_id',$compraobs->compobs_prod)->first();
                $categoria = DB::table('categorias')->where('cate_id',$exame->prod_cate)->first();
                array_push($resultado[0],$data);
                array_push($resultado[1],$titular);
                array_push($resultado[2],$plano);
                array_push($resultado[3],$categoria->cate_nome);
                array_push($resultado[4],$exame->prod_nome);
                array_push($resultado[5],$compraobs->compobs_val);
            }
        }

        return $resultado;
        
    }

    public function RelatorioDespesasEReceitasPDF(Request $request){

        // dd($request->all());

        $prod = ['datapagoconta' => [],'descconta' => [],'formapagamentoconta' => [],'valorconta' => [],'tipoconta' => []];

        $timezone = new \DateTimeZone('America/Sao_Paulo');
        $agora = new \DateTime('now', $timezone);
        $operador = Auth::user()->name;

        $empresa = DB::table('empresas')->where('empresa_id', '1')->first();
        // dd($empresa);
        
        if($request->filtro == 'receitas'){
            $query = DB::table('contasareceber')->select('idcontareceber','datapagoconta', 'descconta', 'formapagamentoconta', 'valorconta')->where('datapagoconta', '>=', $request->inicio)->where('datapagoconta', '<=', $request->fim)->where('recebidoconta', '1')->orderByDesc('datapagoconta');
        }else if($request->filtro == 'despesas'){
            $query = DB::table('contasapagar')->select('idcontapagar','datapagoconta', 'descconta', 'formapagamentoconta', 'valortotalconta')->where('datapagoconta', '>=', $request->inicio)->where('datapagoconta', '<=', $request->fim)->where('pagoconta', '1')->orderByDesc('datapagoconta');
        }else{
            $contasapagar = DB::table('contasapagar')->select('idcontapagar','datapagoconta', 'descconta', 'formapagamentoconta', 'valortotalconta')->where('datapagoconta', '>=', $request->inicio)->where('datapagoconta', '<=', $request->fim)->where('pagoconta', '1')->orderByDesc('datapagoconta');
            $contasareceber = DB::table('contasareceber')->select('idcontareceber','datapagoconta', 'descconta', 'formapagamentoconta', 'valorconta')->where('datapagoconta', '>=', $request->inicio)->where('datapagoconta', '<=', $request->fim)->where('recebidoconta', '1')->orderByDesc('datapagoconta');
            $query = $contasareceber->union($contasapagar);
        }

        $contasapagar = DB::table('contasapagar')->select('idcontapagar','datapagoconta', 'descconta', 'formapagamentoconta', 'valortotalconta')->where('datapagoconta', '>=', $request->inicio)->where('datapagoconta', '<=', $request->fim)->where('pagoconta', '1')->orderByDesc('datapagoconta');
        $contasareceber = DB::table('contasareceber')->select('idcontareceber','datapagoconta', 'descconta', 'formapagamentoconta', 'valorconta')->where('datapagoconta', '>=', $request->inicio)->where('datapagoconta', '<=', $request->fim)->where('recebidoconta', '1')->orderByDesc('datapagoconta');
        
        // $query = $contasareceber->union($contasapagar);
        $querySql = $query->toSql();
        // dd($querySql);
        $query = DB::table(DB::raw("($querySql order by datapagoconta desc) as a"))->mergeBindings($query)->get();

        foreach($query as $query){
            // dd($query);
            $contasareceber = '';
            if($request->filtro == 'receitas'){
                $contasareceber = DB::table('contasareceber')->where('idcontareceber', $query->idcontareceber)->where('formapagamentoconta', $query->formapagamentoconta)->where('datapagoconta', $query->datapagoconta)->where('descconta', $query->descconta)->where('valorconta', $query->valorconta)->first();
            }else if($request->filtro == 'despesas'){
                $contasapagar = DB::table('contasapagar')->where('idcontapagar', $query->idcontapagar)->where('formapagamentoconta', $query->formapagamentoconta)->where('datapagoconta', $query->datapagoconta)->where('descconta', $query->descconta)->where('valortotalconta', $query->valortotalconta)->first();
            }else{
                $contasareceber = DB::table('contasareceber')->where('idcontareceber', $query->idcontareceber)->where('formapagamentoconta', $query->formapagamentoconta)->where('datapagoconta', $query->datapagoconta)->where('descconta', $query->descconta)->where('valorconta', $query->valorconta)->first();
                $contasapagar = DB::table('contasapagar')->where('idcontapagar', $query->idcontareceber)->where('formapagamentoconta', $query->formapagamentoconta)->where('datapagoconta', $query->datapagoconta)->where('descconta', $query->descconta)->where('valortotalconta', $query->valorconta)->first();
            }
            if($contasareceber != ''){
                array_push($prod['datapagoconta'], $contasareceber->datapagoconta);
                array_push($prod['descconta'], $contasareceber->descconta);
                array_push($prod['formapagamentoconta'], $contasareceber->formapagamentoconta);
                array_push($prod['valorconta'], $contasareceber->valorconta);
                array_push($prod['tipoconta'], 'Receita');
            }else{
                array_push($prod['datapagoconta'], $contasapagar->datapagoconta);
                array_push($prod['descconta'], $contasapagar->descconta);
                array_push($prod['formapagamentoconta'], $contasapagar->formapagamentoconta);
                array_push($prod['valorconta'], $contasapagar->valortotalconta);
                array_push($prod['tipoconta'], 'Despesa');
            }
        }

        $style='<html><head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <style type="text/css">
        *{
            margin:9px 28px 14px 12px;
        }
        @page {
            
        }
        .oi{
            margin-top:-20px;
        }
        .ak{
            margin-top:-10px;
        }
        body{
            margin-bottom:50px;
        }
        
        #corpo{
        }
        table{
            border-collapse: collapse;
            width: 100%;
        }
        td{
            padding: 3px;
        }
        #footer {
            position: fixed;
            height: 90px;
            bottom: 0px;
            right: 0px;
            margin-bottom: 0px;
            text-align: right;
            font-size:1.2rem;
        }
        #footer .page:after{ 
            content: counter(page); 
        }
        .quebrar{
            display:flex!important;
            flex-direction:row!important;
        }
        .divisao{
            text-align:center;
            display:flex!important;
            flex-direction:row!important;
        }
        </style></head><body>';

        $path = 'imagens/logoirn2.png';
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
        // dd($base64);
        $head='
            <b>
                <div id="head">
                    <div style="text-align:center"><img src="'.$base64.'" alt="Logo" style="width:17rem" class="imglogo"></div>
                    <div class="divisao">
                        <div class="quebrar">
                            <div>
                                Relatório de Receita e Despesa
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Gerado dia: '.$agora->format('d/m/Y').'
                            </div>
                            <div></div>
                        </div>
                        <div class="quebrar">
                            <div>
                                Operador: '.$operador.'
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sistema: Sisclin
                            </div>
                            <div></div>
                        </div>
                    </div>
                </div>
            </b>
            <div id="corpo">';

        //define o corpo do documento
        // $body='
        //     <table border="1px">
        //         <thead>
        //         <tr bgcolor="#ccc">
        //             <td>Quantidade</td>
        //             <td>Tipo</td>
        //             <td>Produto</td>
        //             <td>Obs.</td>
        //         </tr></thead><tbody>';

        $body = '
            <table id="fluxorecebidastable" class="table" border="1px">
            <thead class="table-active">
              <tr>
                <!-- <td scope="col"><input type="checkbox" disabled></td> -->
                <td scope="col">Data</td>
                <td scope="col">Descrição</td>
                <td scope="col">Pagamento</td>
                <td scope="col">Valor</td>
                <td scope="col">Tipo</td>
              </tr>
            </thead>
            <tbody id="fluxorecebidastablebody">
        ';

        for ($i = 0; $i < count($prod['datapagoconta']); $i++) {
            $data = explode('-',$prod['datapagoconta'][$i]);
            $data = $data[2] . "/" . $data[1] . "/" . $data[0];
            if($prod['formapagamentoconta'][$i] == 1){
                $formapagamento = 'Dinheiro';
            }else if($prod['formapagamentoconta'][$i] == 2){
                $formapagamento = 'Débito';
            }else if($prod['formapagamentoconta'][$i] == 3){
                $formapagamento = 'Crédito';
            }else if($prod['formapagamentoconta'][$i] == 4){
                $formapagamento = 'Pix';
            }else if($prod['formapagamentoconta'][$i] == 5){
                $formapagamento = 'Cheque';
            }else if($prod['formapagamentoconta'][$i] == 6){
                $formapagamento = 'Boleto';
            }
            $tmp='<tr>
                <td width="12%">'.$data.'</td>
                <td width="50%">'.$prod['descconta'][$i].'</td>
                <td width="12%">'.$formapagamento.'</td>
                <td width="12%">R$ '.number_format($prod['valorconta'][$i],2,",",".").'</td>
                <td width="14%"> '.$prod['tipoconta'][$i].'</td>';   
            $body = $body.$tmp;
        }


        //define o rodapé da página
        $footer='</tbody>
            </table>
            </div>
            <div id="footer">
                <div class="oi">
                <div class="ak">Endereço: '.$empresa->empresa_logradouro.', '.$empresa->empresa_num.' - '.$empresa->empresa_bairro.' CEP:'.$empresa->empresa_cep.' '.$empresa->empresa_cidade.' - '.$empresa->empresa_uf.'</div>
                <div class="ak">Telefone(s): ';
        if($empresa->empresa_contato2 != null){
            $footer.= $empresa->empresa_contato1.', '. $empresa->empresa_contato2 .'
                </div>
                <div class="ak">
                    <div>
                        Operador: '.$operador.'
                        &nbsp;&nbsp;&nbsp;&nbsp;CNPJ: '.$empresa->empresa_cnpj.'
                    </div>
                    
                </div>
                <p class="page ak" >Página </p>
            </div></body></html>
            ';
        }else{
            $footer.= $empresa->empresa_contato1.'
                </div>
                <p class="page">Página </p>
            </div></div></body></html>';
        }

        //concatenando as variáveis
        $html=$head.$style.$body.$footer;

        //gerando o pdf
        // $html = utf8_decode($html);
        // $dompdf = new DOMPDF();
        $dompdf = App::make('dompdf.wrapper');
        $dompdf->loadHTML($html);
        $dompdf->setPaper('a4', 'landscape');
        $dompdf->render();
        
        
        return $dompdf->stream();
    }

}
