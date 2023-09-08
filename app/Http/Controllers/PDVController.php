<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Datetime;
use DateInterval;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class PDVController extends Controller
{
    public function PDVMain(Request $request){
        return view('PDV');
    }
    public function FluxoDeCaixa(Request $request){
        return view('FluxodeCaixaCaixa');
    }
    public function Tesouraria(Request $request){
        return view('Tesouraria');
    }
    public function Recibo(Request $request){
        $lista  = [[],[],[],[]];
        $contcompra = 1;
        $compra = DB::table('compras')->orderBy('comp_id', 'desc')->first();
        $compraobs = DB::table('compraobs')->where('comp_id', $compra->comp_id)->get();
        
        // dd($compra, $compraobs);
        $pessoa = '';
        if($compra->comp_deppag != 0){
            $pessoa = explode(' - ', DB::table('agendas')->where('age_id', $compra->comp_deppag)->first()->age_pessoa)[0];
        }else{
            $cobrancaatual = DB::table('cobranca')->where('idcobranca', substr($compraobs[0]->compobs_prod, 1))->first();
            $pessoa = DB::table('pacientes')->where('pac_id', substr($cobrancaatual->responsavel, 0, -1))->first()->pac_nome;
        }
        
        foreach ($compraobs as $compraobs) {
            array_push($lista[0],$contcompra);
            if($compraobs->compobs_prod[0] == 'm'){
                $cobrancaatual = DB::table('cobranca')->where('idcobranca', substr($compraobs->compobs_prod, 1))->first();
                $produtoatual = 'Mensalidade '. explode('-',$cobrancaatual->data)[2] . '/' . explode('-',$cobrancaatual->data)[1] . '/' . explode('-',$cobrancaatual->data)[0] . ' - ' . $cobrancaatual->contrato ;
            }else{
                $produtoatual = DB::table('produtos')->where('prod_id', $compraobs->compobs_prod)->first()->prod_nome;
            }
            array_push($lista[1],$produtoatual);
            array_push($lista[2],$compraobs->compobs_qtd);
            array_push($lista[3],$compraobs->compobs_val);
            $contcompra++;
        }
        // dd($compra, $pessoa, $lista);
        $dados = [[$compra],[$compraobs],[$pessoa],[$lista]];
        // return PDF::loadView('Recibo', [
        //     'compra_id' => $compra->comp_id,
        //     'compra_data' => $compra->comp_data,
        //     'pessoa' => $pessoa,
        //     'lista' => $lista,
        // ])
        //        ->stream('reciboteste.pdf');
        return view('Recibo', [
            'compra_id' => $compra->comp_id,
            'compra_data_dia' => strval(explode('-',$compra->comp_data)[2]),
            'compra_data_mes' => strval(explode('-',$compra->comp_data)[1]-1),
            'compra_data_ano' => strval(explode('-',$compra->comp_data)[0]),
            'compra_valor_total' => 'R$'.number_format($compra->comp_valor,2,",","."),
            'pessoa' => $pessoa,
            'lista' => $lista,
        ]);
    }

    public function PDVCaixas(Request $request){
        $caixas = DB::table('caixas')->orderBy('caixa_data')->get();
        $consultacaixas = $caixas->map(function($obj){
            return (array) $obj;
        })->toArray();
        return $consultacaixas;
    }

    public function PDVCaixaNovo(Request $request){
        // dd($request->all(), Auth::user()->id);
        $func = Auth::user()->id;
        $DT = new DateTime( 'now', new \DateTimeZone( 'America/Sao_Paulo') );
        $caixas = DB::table('caixas')->get();
        $nome = "Caixa " . $DT->format('d/m/Y');
        if(count($caixas) == 0){
            $cadastrarcaixa = DB::table('caixas')->insert([
                'caixa_func' => $func,
                'caixa_nome' => $nome,
                'caixa_status' => "Fechado",
                'caixa_data' => $DT->format('Y-m-d'),
                'caixa_valordinheiro' => doubleval($request->valorinicial),
            ]);
        }else{
            $cadastrarcaixa = DB::table('caixas')->insert([
                'caixa_func' => $func,
                'caixa_nome' => $nome,
                'caixa_status' => "Fechado",
                'caixa_data' => $DT->format('Y-m-d'),
                'caixa_valordinheiro' => doubleval($request->valorinicial),
            ]);
        }
        if($cadastrarcaixa == 1){
            return 1;
        }else{
            return 0;
        }
    }

    public function PDVAbrirCaixa(Request $request){
        // dd($request->all());
        $DT = new DateTime( 'now', new \DateTimeZone( 'America/Sao_Paulo') );
        $checarcaixa = DB::table('caixas')->where('caixa_nome', $request->caixa)->get();
        if(count($checarcaixa) == 0){
            return 1;
        }else{
            $abrircaixa = DB::table('caixas')
            ->where('caixa_nome', $request->caixa)
            ->update([
                "caixa_abriu" => $DT->format('Y-m-d H:i'),
                'caixa_status' => 'Aberto'
            ]);
            if($abrircaixa == 1){
                return 1;
            }else{
                return 0;
            }
        }
    }

    public function PDVFecharCaixa(Request $request){
        date_default_timezone_set('America/Sao_Paulo');
        $DT = new DateTime( 'now', new \DateTimeZone( 'America/Sao_Paulo') );
        $fecharcaixa = DB::table('caixas')
                    ->where('caixa_nome', $request->caixa)
                    ->update([
                        "caixa_fechou" => $DT->format('Y-m-d H:i'),
                        'caixa_status' => 'Fechado'
                    ]);
        if($fecharcaixa == 1){
            return 1;
        }else{
            return 0;
        }
    }

    public function PDVDepPag(){
        $deppag = DB::table('agendas')
        ->where('age_status', "Dependente Pagamento")
        ->get();
        $dependentespdv = $deppag->map(function($obj){
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
            
            if(count($retorno) > 1){
                $deppagretorno2 = DB::table('agendas')
                ->where('age_id', $deppagretorno[$i]->age_id)
                ->get();
                // dd($deppagretorno2);
                $deppagretorno3 = $deppagretorno2->map(function($obj){
                    return (array) $obj;
                })->toArray();
                // dd($deppagretorno3, $dependentespdv);
                $dependentespdv = array_merge($dependentespdv, $deppagretorno3);
                // dd($dependentespdv);
            }
        }
        return $dependentespdv;
    }

    public function PDVAdesao(){
        $dados = [[],[],[],[],[],[],[]];
        $adesao = DB::table('contasareceber')
        ->where('descconta', 'like', 'Adesão%')
        ->where('recebidoconta', 0)
        ->get();
        foreach ($adesao as $adesao) {
            // dd($adesao);
            if(substr($adesao->clienteconta, -1) == '1'){
                $pessoa = DB::table('pacientes')->select('pac_nome', 'pac_cpf')->where('pac_id', substr($adesao->clienteconta, 0, -1))->first();
                $nome = $pessoa->pac_nome . ' - ' . $pessoa->pac_cpf;
            }else if(substr($adesao->clienteconta, -1) == '2'){
                $pessoa = DB::table('fornecedoresfis')->select('forfis_nome', 'forfis_cpf')->where('forfis_id', substr($adesao->clienteconta, 0, -1))->first();
                $nome = $pessoa->forfis_nome . ' - ' . $pessoa->forfis_cpf;
            }else if(substr($adesao->clienteconta, -1) == '3'){
                $pessoa = DB::table('funcionarios')->select('func_nome', 'func_cpf')->where('func_id', substr($adesao->clienteconta, 0, -1))->first();
                $nome = $pessoa->func_nome . ' - ' . $pessoa->func_cpf;
            }else if(substr($adesao->clienteconta, -1) == '4'){
                $pessoa = DB::table('clientesjur')->select('clijur_nome', 'clijur_cnpj')->where('clijur_id', substr($adesao->clienteconta, 0, -1))->first();
                $nome = $pessoa->clijur_nome . ' - ' . $pessoa->clijur_cnpj;
            }else{
                $pessoa = DB::table('fornecedoresjur')->select('forjur_nome', 'forjur_cnpj')->where('forjur_id', substr($adesao->clienteconta, 0, -1))->first();
                $nome = $pessoa->forjur_nome . ' - ' . $pessoa->forjur_cnpj;
            }
            array_push($dados[0], $adesao->idcontareceber);
            array_push($dados[1], $nome);
            array_push($dados[2], $adesao->descconta);
            array_push($dados[3], $adesao->valorconta);
            if($adesao->formapagamentoconta == 1){
                array_push($dados[4], 'Dinheiro');
            }else if($adesao->formapagamentoconta == 2 || $adesao->formapagamentoconta == 3){
                array_push($dados[4], 'Cartão( Auto: '. $adesao->autoconta .', CV: ' . $adesao->cvconta . ' )');
            }else if($adesao->formapagamentoconta == 4){
                array_push($dados[4], 'Pix');
            }else{
                array_push($dados[4], 'Transferência');
            }
            array_push($dados[5], $adesao->datapagoconta);
            array_push($dados[6], 'Adesão');
        }

        // $arrayfiltro = [];
        // $anuais = DB::table('contasareceber')
        // ->where('descconta', 'like', '%Mensalidade%')
        // ->where('recebidoconta', 0)
        // ->where('formapagamentoconta', '!=', 6)
        // ->get();
        // foreach($anuais as $anuais){
        //     $contratoatual = explode(' - ', $anuais->descconta)[1];
        //     array_push($arrayfiltro, $anuais->clienteconta.','.$anuais->formapagamentoconta.','.$contratoatual);
        // }
        
        // $arrayfiltro = array_unique($arrayfiltro);
        
        // foreach($arrayfiltro as $arrayfiltro){
        //     $dadosatuais = explode(',',$arrayfiltro);
        //     $anualatual = DB::table('contasareceber')
        //     ->where('descconta', 'like', '%'.$dadosatuais[2].'%')
        //     ->where('descconta', 'like', '%Mensalidade%')
        //     ->where('formapagamentoconta',$dadosatuais[1])
        //     ->where('recebidoconta', 0)
        //     ->get();

        //     $primeiroanualatual = DB::table('contasareceber')
        //     ->where('descconta', 'like', '%'.$dadosatuais[2].'%')
        //     ->where('descconta', 'like', '%Mensalidade%')
        //     ->where('formapagamentoconta',$dadosatuais[1])
        //     ->where('recebidoconta', 0)
        //     ->orderBy('datapagoconta')
        //     ->first()
        //     ->datapagoconta;

        //     $ultimoanualatual = DB::table('contasareceber')
        //     ->where('descconta', 'like', '%'.$dadosatuais[2].'%')
        //     ->where('descconta', 'like', '%Mensalidade%')
        //     ->where('formapagamentoconta',$dadosatuais[1])
        //     ->where('recebidoconta', 0)
        //     ->orderBy('datapagoconta', 'DESC')
        //     ->first()
        //     ->datapagoconta;

        //     if(substr($anualatual[0]->clienteconta, -1) == '1'){
        //         $pessoa = DB::table('pacientes')->select('pac_nome', 'pac_cpf')->where('pac_id', substr($anualatual[0]->clienteconta, 0, -1))->first();
        //         $nome = $pessoa->pac_nome . ' - ' . $pessoa->pac_cpf;
        //     }else if(substr($anualatual[0]->clienteconta, -1) == '2'){
        //         $pessoa = DB::table('fornecedoresfis')->select('forfis_nome', 'forfis_cpf')->where('forfis_id', substr($anualatual[0]->clienteconta, 0, -1))->first();
        //         $nome = $pessoa->forfis_nome . ' - ' . $pessoa->forfis_cpf;
        //     }else if(substr($anualatual[0]->clienteconta, -1) == '3'){
        //         $pessoa = DB::table('funcionarios')->select('func_nome', 'func_cpf')->where('func_id', substr($anualatual[0]->clienteconta, 0, -1))->first();
        //         $nome = $pessoa->func_nome . ' - ' . $pessoa->func_cpf;
        //     }else if(substr($anualatual[0]->clienteconta, -1) == '4'){
        //         $pessoa = DB::table('clientesjur')->select('clijur_nome', 'clijur_cnpj')->where('clijur_id', substr($anualatual[0]->clienteconta, 0, -1))->first();
        //         $nome = $pessoa->clijur_nome . ' - ' . $pessoa->clijur_cnpj;
        //     }else{
        //         $pessoa = DB::table('fornecedoresjur')->select('forjur_nome', 'forjur_cnpj')->where('forjur_id', substr($anualatual[0]->clienteconta, 0, -1))->first();
        //         $nome = $pessoa->forjur_nome . ' - ' . $pessoa->forjur_cnpj;
        //     }
        //     array_push($dados[0], $anualatual[0]->idcontareceber);
        //     array_push($dados[1], $nome);
        //     $desccontaatual = explode(' ', $anualatual[0]->descconta);
        //     // dd($desccontaatual);
        //     array_push($dados[2], $desccontaatual[0].' '.$desccontaatual[1].' - '.$desccontaatual[3]);
        //     $valortotalatual = 0;
        //     for($o = 0; $o < count($anualatual); $o++){
        //         $valortotalatual += $anualatual[$o]->valorconta;
        //     }
        //     if(substr($valortotalatual, -1) == '9'){
        //         array_push($dados[3], ceil($valortotalatual));
        //     }else{
        //         array_push($dados[3], $valortotalatual);
        //     }
            
        //     if($anualatual[0]->formapagamentoconta == 1){
        //         array_push($dados[4], 'Dinheiro');
        //     }else if($anualatual[0]->formapagamentoconta == 2 || $anualatual[0]->formapagamentoconta == 3){
        //         array_push($dados[4], 'Cartão( Auto: '. $anualatual[0]->autoconta .', CV: ' . $anualatual[0]->cvconta . ' )');
        //     }else if($anualatual[0]->formapagamentoconta == 4){
        //         array_push($dados[4], 'Pix');
        //     }else{
        //         array_push($dados[4], 'Transferência');
        //     }
        //     array_push($dados[5], $primeiroanualatual.' - '.$ultimoanualatual);
        //     array_push($dados[6], 'Anual');
        //     // dd($anualatual, $primeiroanualatual, $ultimoanualatual);
        // }

        $arrayfiltro = [];
        $anuais = DB::table('contasareceber')
        ->where('descconta', 'like', '%Anual%')
        ->where('recebidoconta', 0)
        ->where('formapagamentoconta', '!=', 6)
        ->get();
        foreach($anuais as $anuais){
            $contratoatual = explode(' - ', $anuais->descconta)[1];
            array_push($arrayfiltro, $anuais->clienteconta.','.$anuais->formapagamentoconta.','.$contratoatual);
        }
        
        $arrayfiltro = array_unique($arrayfiltro);
        
        foreach($arrayfiltro as $arrayfiltro){
            $dadosatuais = explode(',',$arrayfiltro);
            $anualatual = DB::table('contasareceber')
            ->where('descconta', 'like', '%'.$dadosatuais[2].'%')
            ->where('descconta', 'like', '%Anual%')
            ->where('formapagamentoconta',$dadosatuais[1])
            ->where('recebidoconta', 0)
            ->get();

            if(substr($anualatual[0]->clienteconta, -1) == '1'){
                $pessoa = DB::table('pacientes')->select('pac_nome', 'pac_cpf')->where('pac_id', substr($anualatual[0]->clienteconta, 0, -1))->first();
                $nome = $pessoa->pac_nome . ' - ' . $pessoa->pac_cpf;
            }else if(substr($anualatual[0]->clienteconta, -1) == '2'){
                $pessoa = DB::table('fornecedoresfis')->select('forfis_nome', 'forfis_cpf')->where('forfis_id', substr($anualatual[0]->clienteconta, 0, -1))->first();
                $nome = $pessoa->forfis_nome . ' - ' . $pessoa->forfis_cpf;
            }else if(substr($anualatual[0]->clienteconta, -1) == '3'){
                $pessoa = DB::table('funcionarios')->select('func_nome', 'func_cpf')->where('func_id', substr($anualatual[0]->clienteconta, 0, -1))->first();
                $nome = $pessoa->func_nome . ' - ' . $pessoa->func_cpf;
            }else if(substr($anualatual[0]->clienteconta, -1) == '4'){
                $pessoa = DB::table('clientesjur')->select('clijur_nome', 'clijur_cnpj')->where('clijur_id', substr($anualatual[0]->clienteconta, 0, -1))->first();
                $nome = $pessoa->clijur_nome . ' - ' . $pessoa->clijur_cnpj;
            }else{
                $pessoa = DB::table('fornecedoresjur')->select('forjur_nome', 'forjur_cnpj')->where('forjur_id', substr($anualatual[0]->clienteconta, 0, -1))->first();
                $nome = $pessoa->forjur_nome . ' - ' . $pessoa->forjur_cnpj;
            }
            array_push($dados[0], $anualatual[0]->idcontareceber);
            array_push($dados[1], $nome);
            // dd($desccontaatual);
            array_push($dados[2], $anualatual[0]->descconta);
            $valortotalatual = 0;
            for($o = 0; $o < count($anualatual); $o++){
                $valortotalatual += $anualatual[$o]->valorconta;
            }
            if(substr($valortotalatual, -1) == '9'){
                array_push($dados[3], ceil($valortotalatual));
            }else{
                array_push($dados[3], $valortotalatual);
            }
            
            if($anualatual[0]->formapagamentoconta == 1){
                array_push($dados[4], 'Dinheiro');
            }else if($anualatual[0]->formapagamentoconta == 2 || $anualatual[0]->formapagamentoconta == 3){
                array_push($dados[4], 'Cartão( Auto: '. $anualatual[0]->autoconta .', CV: ' . $anualatual[0]->cvconta . ' )');
            }else if($anualatual[0]->formapagamentoconta == 4){
                array_push($dados[4], 'Pix');
            }else{
                array_push($dados[4], 'Transferência');
            }
            array_push($dados[5], $anualatual[0]->datapagoconta);
            array_push($dados[6], 'Anual');
            // dd($anualatual, $primeiroanualatual, $ultimoanualatual);
        }

        $arrayfiltro = [];
        $mensalidades = DB::table('contasareceber')
        ->where('descconta', 'like', '%Informar%')
        ->where('recebidoconta', 0)
        ->where('formapagamentoconta', '!=', 6)
        ->get();
        foreach($mensalidades as $mensalidades){
            // $contratoatual = explode(' - ', $mensalidades->descconta)[1];
            array_push($arrayfiltro, $mensalidades->clienteconta.','.$mensalidades->formapagamentoconta.','.$mensalidades->descconta);
        }
        
        $arrayfiltro = array_unique($arrayfiltro);
        // dd($arrayfiltro);
        foreach($arrayfiltro as $arrayfiltro){
            $dadosatuais = explode(',',$arrayfiltro);
            $mensalidadeatual = DB::table('contasareceber')
            ->where('descconta', 'like', '%'.$dadosatuais[2].'%')
            ->where('descconta', 'like', '%Informar%')
            ->where('formapagamentoconta',$dadosatuais[1])
            ->where('recebidoconta', 0)
            ->get();

            if(substr($mensalidadeatual[0]->clienteconta, -1) == '1'){
                $pessoa = DB::table('pacientes')->select('pac_nome', 'pac_cpf')->where('pac_id', substr($mensalidadeatual[0]->clienteconta, 0, -1))->first();
                $nome = $pessoa->pac_nome . ' - ' . $pessoa->pac_cpf;
            }else if(substr($mensalidadeatual[0]->clienteconta, -1) == '2'){
                $pessoa = DB::table('fornecedoresfis')->select('forfis_nome', 'forfis_cpf')->where('forfis_id', substr($mensalidadeatual[0]->clienteconta, 0, -1))->first();
                $nome = $pessoa->forfis_nome . ' - ' . $pessoa->forfis_cpf;
            }else if(substr($mensalidadeatual[0]->clienteconta, -1) == '3'){
                $pessoa = DB::table('funcionarios')->select('func_nome', 'func_cpf')->where('func_id', substr($mensalidadeatual[0]->clienteconta, 0, -1))->first();
                $nome = $pessoa->func_nome . ' - ' . $pessoa->func_cpf;
            }else if(substr($mensalidadeatual[0]->clienteconta, -1) == '4'){
                $pessoa = DB::table('clientesjur')->select('clijur_nome', 'clijur_cnpj')->where('clijur_id', substr($mensalidadeatual[0]->clienteconta, 0, -1))->first();
                $nome = $pessoa->clijur_nome . ' - ' . $pessoa->clijur_cnpj;
            }else{
                $pessoa = DB::table('fornecedoresjur')->select('forjur_nome', 'forjur_cnpj')->where('forjur_id', substr($mensalidadeatual[0]->clienteconta, 0, -1))->first();
                $nome = $pessoa->forjur_nome . ' - ' . $pessoa->forjur_cnpj;
            }
            array_push($dados[0], $mensalidadeatual[0]->idcontareceber);
            array_push($dados[1], $nome);
            // $desccontaatual = explode(' ', $mensalidadeatual[0]->descconta);
            $desccontaatual = $mensalidadeatual[0]->descconta;
            // dd($desccontaatual);
            array_push($dados[2], $desccontaatual);
            $valortotalatual = 0;
            for($o = 0; $o < count($mensalidadeatual); $o++){
                $valortotalatual += $mensalidadeatual[$o]->valorconta;
            }
            if(substr($valortotalatual, -1) == '9'){
                array_push($dados[3], ceil($valortotalatual));
            }else{
                array_push($dados[3], $valortotalatual);
            }
            
            if($mensalidadeatual[0]->formapagamentoconta == 1){
                array_push($dados[4], 'Dinheiro');
            }else if($mensalidadeatual[0]->formapagamentoconta == 2 || $mensalidadeatual[0]->formapagamentoconta == 3){
                array_push($dados[4], 'Cartão( Auto: '. $mensalidadeatual[0]->autoconta .', CV: ' . $mensalidadeatual[0]->cvconta . ' )');
            }else if($mensalidadeatual[0]->formapagamentoconta == 4){
                array_push($dados[4], 'Pix');
            }else if($mensalidadeatual[0]->formapagamentoconta == 7){
                array_push($dados[4], 'Boleto Bancário');
            }else{
                array_push($dados[4], 'Transferência');
            }
            array_push($dados[5], $mensalidadeatual[0]->datapagoconta);
            array_push($dados[6], 'Informar');
            // dd($mensalidadeatual, $primeiromensalidadeatual, $ultimomensalidadeatual);
        }
        // dd($dados);
        // dd($arrayfiltro);
        return $dados;
    }

    public function ConfirmarPagamentoAdesao(Request $request){
        // dd($request->all());
        if(substr($request->id, 0, 5) == 'mensa'){
            $mensalidadeatual = DB::table('contasareceber')
            ->where('idcontareceber', substr($request->id, 5))
            ->first();

            // dd(explode(' ', explode(' - ',$mensalidadeatual->descconta)[1])[1]);
            // dd($mensalidadeatual);
            $datacontaatual = explode('/',explode(' ', explode(' - ',$mensalidadeatual->descconta)[1])[1])[2] . '-' . explode('/',explode(' ', explode(' - ',$mensalidadeatual->descconta)[1])[1])[1] . '-' . explode('/',explode(' ', explode(' - ',$mensalidadeatual->descconta)[1])[1])[0];
            // dd($mensalidadeatual, $datacontaatual);
            $contratoatual = explode(' - ',$mensalidadeatual->descconta)[2];
            $caixaatualid = DB::table('caixas')->where('caixa_nome', $request->caixaatual)->first()->caixa_id;
            $attcontasreceber = DB::table('contasareceber')
            ->where('idcontareceber', substr($request->id, 5))
            ->update([
                'recebidoconta' => 1,
                'caixaconta' => $caixaatualid
            ]);

            // Mensalidade 03/04/2022 - 2022020054986115
            $dataatualformatada = explode('-',$datacontaatual)[2].'/'.explode('-',$datacontaatual)[1].'/'. explode('-',$datacontaatual)[0];
            // $totalmensalidade = count(DB::table('contasareceber')->where('descconta', 'like', '%Mensalidade '.$dataatualformatada.' - '.$contratoatual.'%')->get());
            // $totalmensalidadepaga = count(DB::table('contasareceber')->where('descconta', 'like', '%Mensalidade '.$dataatualformatada.' - '.$contratoatual.'%')->where('recebidoconta', '1')->get());
            // dd($totalmensalidade, $totalmensalidadepaga);
            // if($totalmensalidadepaga == $totalmensalidade){
                $attcobrancalote = DB::table('cobranca')
                ->where('contrato', $contratoatual)
                ->where('data', $datacontaatual)
                ->update([
                    'pago' => 1
                ]);
            // }
            // dd($totalmensalidade, $totalmensalidadepaga, '%Mensalidade '.$dataatualformatada.' - '.$contratoatual.'%');

            // dd('parou');

            $totalparcelaslote = count(DB::table('contasareceber')->where('descconta', 'like', '%'.$contratoatual.'%')->where('descconta', 'like', '%Mensalidade%')->get());
            $totalparcelaspagaslote = count(DB::table('contasareceber')->where('descconta', 'like', '%'.$contratoatual.'%')->where('descconta', 'like', '%Mensalidade%')->where('recebidoconta', '1')->get());
            if($totalparcelaspagaslote == $totalparcelaslote){
                $attcobrancalote = DB::table('cobrancalote')
                ->where('contratolote', $contratoatual)
                ->update([
                    'pagolote' => 1
                ]);
                $attcobrancalote = DB::table('cobranca')
                ->where('contrato', $contratoatual)
                ->update([
                    'pago' => 1
                ]);
            }
            
            // dd($anualatual, $contratoatual);
        }else if(substr($request->id, 0, 5) == 'anual'){
            $caixaatualid = DB::table('caixas')->where('caixa_nome', $request->caixaatual)->first()->caixa_id;
            $mensalidadeatual = DB::table('contasareceber')
            ->where('idcontareceber', substr($request->id, 5))
            ->first();
            $contratoatual = explode(' - ',$mensalidadeatual->descconta)[1];
            $attcontasreceber = DB::table('contasareceber')
            ->where('descconta', 'like', '%'.$contratoatual.'%')
            ->where('descconta', 'like', '%Anual%')
            ->where('formapagamentoconta',$mensalidadeatual->formapagamentoconta)
            ->where('recebidoconta', 0)
            ->update([
                'recebidoconta' => 1,
                'caixaconta' => $caixaatualid
            ]);

            $totalparcelaslote = count(DB::table('contasareceber')->where('descconta', 'like', '%'.$contratoatual.'%')->where('descconta', 'like', '%Anual%')->get());
            $totalparcelaspagaslote = count(DB::table('contasareceber')->where('descconta', 'like', '%'.$contratoatual.'%')->where('descconta', 'like', '%Anual%')->where('recebidoconta', '1')->get());
            
            if($totalparcelaspagaslote == $totalparcelaslote){
                // dd($totalparcelaslote, $totalparcelaspagaslote);
                $attcobrancalote = DB::table('cobrancalote')
                ->where('contratolote', $contratoatual)
                ->update([
                    'pagolote' => 1
                ]);
                $attcobrancalote = DB::table('cobranca')
                ->where('contrato', $contratoatual)
                ->update([
                    'pago' => 1
                ]);
            }
        }else {
            $caixaatualid = DB::table('caixas')->where('caixa_nome', $request->caixaatual)->first()->caixa_id;
            $attadesao = DB::table('contasareceber')->where('idcontareceber', $request->id)->update([
                'recebidoconta' => 1,
                'caixaconta' => $caixaatualid
            ]);
        }
        if($mensalidadeatual->formapagamentoconta == '1'){
            $valorcaixaatual = DB::table('caixas')->where('caixa_id', $caixaatualid)->first()->caixa_valordinheiro;
            $valorcaixanovo = DB::table('caixas')->where('caixa_id', $caixaatualid)->update([
                'caixa_valordinheiro' => ($valorcaixaatual + $mensalidadeatual->valorconta)
            ]);
        }else if($mensalidadeatual->formapagamentoconta == '2' || $mensalidadeatual->formapagamentoconta == '3'){
            $valorcaixaatual = DB::table('caixas')->where('caixa_id', $caixaatualid)->first()->caixa_valorcartao;
            $valorcaixanovo = DB::table('caixas')->where('caixa_id', $caixaatualid)->update([
                'caixa_valorcartao' => ($valorcaixaatual + $mensalidadeatual->valorconta)
            ]);
        }else{
            $valorcaixaatual = DB::table('caixas')->where('caixa_id', $caixaatualid)->first()->caixa_valortransf;
            $valorcaixanovo = DB::table('caixas')->where('caixa_id', $caixaatualid)->update([
                'caixa_valortransf' => ($valorcaixaatual + $mensalidadeatual->valorconta)
            ]);
        }
        return 1;
    }

    public function PDVDepPagPreencher(Request $request){
        // dd($request->all());
        $verificador = 0;
        $produtoinfo = ['id'=>[], 'nome'=>[], 'preco'=>[], 'quantidade'=>[]];
        // dd($request->all());
        $deppagagenda = DB::table('agendas')
            ->where('age_id', $request->idagenda)
            ->get();
        // dd($deppagagenda);
        $deppagagendamento = DB::table('agendamentocliente')
            ->where('idagenda', $request->idagenda)
            ->get();
        $deppagagendamentos = $deppagagendamento->map(function($obj){
            return (array) $obj;
        })->toArray();
        if($deppagagenda[0]->age_contrato != "Particular"){
            $deppagcontrato = DB::table('contratos')
            ->where('cont_id', $deppagagenda[0]->age_contrato)
            ->get();
            $deppagplano = DB::table('planoobs')
            ->where('planobs_plano', $deppagcontrato[0]->cont_plano)
            ->get();
            $deppagplanos = $deppagplano->map(function($obj){
                return (array) $obj;
            })->toArray();
            
            for($i = 0; $i < count($deppagagendamentos); $i++){
                // dd($deppagagendamentos);
                $verificador = 0;
                
                if($deppagagendamentos[$i]['servico'] == 0){
                    // dd($deppagagendamentos[$i]);
                    array_push($produtoinfo['id'], $deppagagendamentos[$i]['servico']);
                    array_push($produtoinfo['nome'], 'Retorno');
                    array_push($produtoinfo['quantidade'], $deppagagendamentos[$i]['quantidade']);
                }else{
                    $produtoatual = DB::table('produtos')->where('prod_id', $deppagagendamentos[$i]['servico'])->first();
                    array_push($produtoinfo['id'], $produtoatual->prod_id);
                    array_push($produtoinfo['nome'], $produtoatual->prod_nome);
                    array_push($produtoinfo['quantidade'], $deppagagendamentos[$i]['quantidade']);
                }

                // dd($produtoatual);
                for($o = 0; $o < count($deppagplanos); $o++){
                    if($deppagagendamentos[$i]['servico'] == $deppagplanos[$o]['planobs_produto']){
                        $verificador = 1;
                        if($deppagplanos[$o]['planobs_incluso'] == "Incluso"){
                            array_push($produtoinfo['preco'], 0);
                        }else{
                            array_push($produtoinfo['preco'], $deppagplanos[$o]['planobs_valor']);
                        }
                    }
                    // dd($deppagagendamentos[$i]['servico'], $deppagplanos[$o]['planobs_produto']);
                }
                if($verificador == 0){
                    if($deppagagendamentos[$i]['servico'] == 0){
                        array_push($produtoinfo['preco'], 0);
                    }else{
                        array_push($produtoinfo['preco'], $produtoatual->prod_valor);
                    }
                }
                
            }
        }else{
            for($i = 0; $i < count($deppagagendamentos); $i++){
                $produtoatual = DB::table('produtos')->where('prod_id', $deppagagendamentos[$i]['servico'])->first();
                array_push($produtoinfo['id'], $produtoatual->prod_id);
                array_push($produtoinfo['nome'], $produtoatual->prod_nome);
                array_push($produtoinfo['quantidade'], $deppagagendamentos[$i]['quantidade']);
                array_push($produtoinfo['preco'], $produtoatual->prod_valor);
            }
        }
        // dd($produtoincluso, $precoproduto);
        return $produtoinfo;
    }

    public function PDVDepPagServMed(Request $request){
        // dd($request->all());
        $depservmed = ["med"=>[]];
        if($request->med){
            for($i = 0; $i < count($request->med); $i++){
                $deppagmed = DB::table('medicos')
                ->where('med_id', $request->med[$i])
                ->get();
                array_push($depservmed['med'], $deppagmed[0]->med_nome);
            }
        }
        return $depservmed;
    }

    

    public function PDVAddProduto(Request $request){
        $verificador = 0;
        $precoproduto = 0;
        $produtoincluso = 0;
        $produtoinfo = [];
        $deppagagenda = DB::table('agendas')
            ->where('age_id', $request->idatual)
            ->get();
        if($deppagagenda[0]->age_contrato != "Particular"){
            $deppagcontrato = DB::table('contratos')
            ->where('cont_id', $deppagagenda[0]->age_contrato)
            ->get();
            $deppagplano = DB::table('planoobs')
            ->where('planobs_plano', $deppagcontrato[0]->cont_plano)
            ->get();
            $deppagplanos = $deppagplano->map(function($obj){
                return (array) $obj;
            })->toArray();
            for($i = 0; $i<count($deppagplanos); $i++){
                if($deppagplanos[$i]['planobs_produto'] == $request->cod){
                    $verificador++;
                    $precoproduto = $deppagplanos[$i]['planobs_valor'];
                    if($deppagplanos[$i]['planobs_incluso'] == 'Incluso'){
                        $produtoincluso = 1;
                    }
                }
            }
        }
        $deppagprodutos = DB::table('produtos')
        ->where('prod_id', $request->cod)
        ->get();
        $deppagproduto = $deppagprodutos->map(function($obj){
            return (array) $obj;
        })->toArray();

        array_push($produtoinfo, $deppagproduto[0]['prod_id']);
        array_push($produtoinfo, $deppagproduto[0]['prod_nome']);
        if($verificador != 0){
            array_push($produtoinfo, $precoproduto);
        }else{
            array_push($produtoinfo, $deppagproduto[0]['prod_valor']);
        }
        array_push($produtoinfo, $deppagproduto[0]['prod_tipo']);
        array_push($produtoinfo, $produtoincluso);
        return $produtoinfo;
    }

    public function PDVConsultaProduto(Request $request){
        $precoproduto = 0;
        $produtoincluso = 0;
        $produtos = ["id"=>[], "nome"=>[], "cate"=>[], "tipo" => [], "incluso"=>[], "valor" => []];

        if($request->tipo == 'Todos'){
            $produtosconsulta = DB::table('produtos')
            ->where('prod_nome', 'like', '%'.$request->nome.'%')
            ->get();
        }else{
            $produtosconsulta = DB::table('produtos')
            ->where('prod_nome', 'like', '%'.$request->nome.'%')
            ->where('prod_tipo', $request->tipo)
            ->get();
        }
        $produtosconsultaarray = $produtosconsulta->map(function($obj){
            return (array) $obj;
        })->toArray();
        $deppagagenda = DB::table('agendas')
            ->where('age_id', $request->idatual)
            ->get();
        if($deppagagenda[0]->age_contrato != "Particular"){
            $deppagcontrato = DB::table('contratos')
            ->where('cont_id', $deppagagenda[0]->age_contrato)
            ->get();
            $deppagplano = DB::table('planoobs')
            ->where('planobs_plano', $deppagcontrato[0]->cont_plano)
            ->get();
            $deppagplanos = $deppagplano->map(function($obj){
                return (array) $obj;
            })->toArray();
            for($i = 0; $i<count($produtosconsultaarray); $i++){
                $verificador = 0;
                $produtoincluso = 0;
                $produtoatual = $produtosconsultaarray[$i]['prod_id'];
                for($o = 0; $o < count($deppagplanos); $o++){
                    if($deppagplanos[$o]['planobs_produto'] == $produtoatual){
                        $verificador++;
                        $precoproduto = $deppagplanos[$o]['planobs_valor'];
                        if($deppagplanos[$o]['planobs_incluso'] == "Incluso"){
                            $produtoincluso = 1;
                        }
                    }
                }
                if($verificador != 0){
                    array_push($produtos['valor'], $precoproduto);
                }else{
                    array_push($produtos['valor'], $produtosconsultaarray[$i]['prod_valor']);
                }
                $categoria = DB::table('categorias')->where('cate_id', $produtosconsultaarray[$i]['prod_cate'])->get();
                array_push($produtos['id'], $produtosconsultaarray[$i]['prod_id']);
                array_push($produtos['nome'], $produtosconsultaarray[$i]['prod_nome']);
                array_push($produtos['cate'], $categoria[0]->cate_nome);
                array_push($produtos['tipo'], $produtosconsultaarray[$i]['prod_tipo']);
                array_push($produtos['incluso'], $produtoincluso);      
            }
        }else{
            for($i = 0; $i < count($produtosconsultaarray); $i++){
                $categoria = DB::table('categorias')->where('cate_id', $produtosconsultaarray[$i]['prod_cate'])->get();
                array_push($produtos['id'], $produtosconsultaarray[$i]['prod_id']);
                array_push($produtos['nome'], $produtosconsultaarray[$i]['prod_nome']);
                array_push($produtos['cate'], $categoria[0]->cate_nome);
                array_push($produtos['tipo'], $produtosconsultaarray[$i]['prod_tipo']);
                array_push($produtos['valor'], $produtosconsultaarray[$i]['prod_valor']);
            }
            
        }
        
        return $produtos;
    }
    
    public function PDVChamar(Request $request){
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

    public function PdvDepPagExcluir(Request $request){
        // dd($request->all());
        $agendas = DB::table('agendas')->where('age_id', $request->idagenda)->update([
            'age_status' => 'Cancelado',
        ]);
        return 1;
    }
    public function PDVConcluirPagamento(Request $request){
        $checkcompobs = 0;
        $checkestoquefalha = 0;
        date_default_timezone_set('America/Sao_Paulo');
        $date = date('Y-m-d H:i');
        $data = explode(' ', $date)[0];
        $hora = explode(' ', $date)[1];
        $clienteatual = '';
        $cpfclienteatual = '';
        $listamensalidades = [];
        $listaservicosprodutos = [];

        if($request->deppagid != 0){
            $clienteatual = DB::table('agendas')->where('age_id',$request->deppagid)->first()->age_pessoa;
            $cpfclienteatual = explode(' - ', $clienteatual)[1];
        }
        
        $vencimento = DateTime::createFromFormat('Y-m-d', $data);
        $vencimento->add(new DateInterval('P30D')); // 2 dias
        // dd($vencimento->format('d/m/Y'));

        $metodos = '';
        $qtdparcelas = '';
        $valormetodos = '';
        $autometodos = '';
        $cvmetodos = '';

        for($i = 0; $i < count($request->metodospagamento); $i++){
            $metodos .= $request->metodospagamento[$i] . ',';
            $qtdparcelas .= $request->qtdmetodospagamento[$i] . ',';
            $valormetodos .= $request->valormetodospagamento[$i] . '/';
            $autometodos .= $request->autometodospagamento[$i] . ',';
            $cvmetodos .= $request->cvmetodospagamento[$i] . ',';
        }

        $metodos = substr($metodos, 0, -1);
        $qtdparcelas = substr($qtdparcelas, 0, -1);
        $valormetodos = substr($valormetodos, 0, -1);
        $autometodos = substr($autometodos, 0, -1);
        $cvmetodos = substr($cvmetodos, 0, -1);

        // dd(explode(',',$metodos), $qtdparcelas, $valormetodos, $autometodos, explode(',',$cvmetodos));

        $idclienteatual = '';
        $nomeclientatual = '';

        if($cpfclienteatual != ''){
            $pacientes = DB::table('pacientes')->where('pac_cpf', $cpfclienteatual)->first();
            $funcionarios = DB::table('funcionarios')->where('func_cpf', $cpfclienteatual)->first();
            $fornecedoresfis = DB::table('fornecedoresfis')->where('forfis_cpf', $cpfclienteatual)->first();

            if($pacientes != null){
                $idclienteatual = $pacientes->pac_id . '1';
                $nomeclientatual = $pacientes->pac_nome;
            }else if($funcionarios != null){
                $idclienteatual = $pacientes->func_id . '3';
                $nomeclientatual = $pacientes->func_nome;
            }else if ($fornecedoresfis != null){
                $idclienteatual = $pacientes->forfis_id . '2';
                $nomeclientatual = $pacientes->forfis_nome;
            }
        }

        for($i = 0; $i < count($request->iditems); $i++){
            if($request->iditems[$i] != 0){
                $checarprodutoatual = DB::table('produtos')->where('prod_id', $request->iditems[$i])->first();
                if($checarprodutoatual->prod_tipo == 'Exame'){
                    $attexames = DB::table('agendamentocliente')->where('idagenda', $request->deppagid)->where('servico', $request->iditems[$i])
                    ->update([
                        'quantidade' => $request->qtd[$i],
                    ]);
                }
            }
        }
        // dd($request->all());
        // dd($request->all(), $pacientes, $cpfclienteatual);
        // dd($pacientes, $funcionarios, $fornecedoresfis, $idclienteatual);

        // dd($request->caixaatual);
        

        $compras = DB::table('compras')->insert([
            'comp_deppag' => $request->deppagid,
            'comp_data' => $data,
            'comp_hora' => $hora,
            'comp_valor' => $request->valortotal,
            'comp_caixa' => $request->caixaatual,
            'comp_auto' => $autometodos,
            'comp_cv' => $cvmetodos,
            'comp_parcelas' => $qtdparcelas,
            'comp_valordividido' => $valormetodos,
            'comp_metodopagamento' => $metodos,
        ]);

        if($compras == 1){
            $comp_id = DB::table('compras')->orderBy('comp_id', 'DESC')->first()->comp_id;
            for($i = 0; $i < count($request->qtd); $i++){
                $compobs = DB::table('compraobs')->insert([
                    'comp_id' => $comp_id ,
                    'compobs_qtd' => intval($request->qtd[$i]) ,
                    'compobs_prod' => $request->iditems[$i],
                    'compobs_val' => doubleval($request->valoresunicos[$i])
                ]);
                if($compobs != 1){
                    $checkcompobs = 1;
                }
            }
            //
            for ($i=0; $i < count($request->qtd); $i++) { 
                if($request->iditems[$i][0] == 'm'){
                    array_push($listamensalidades, substr($request->iditems[$i], 1));
                }else{
                    array_push($listaservicosprodutos, $request->iditems[$i]);
                }
            }

            if(count($listamensalidades) > 0 && count($listaservicosprodutos) == 0){
                for($o = 0; $o < count($listamensalidades); $o++){
                    $mensalidadeatual = DB::table('cobranca')
                    ->where('idcobranca', $listamensalidades[$o])
                    ->first();

                    // dd($mensalidadeatual);
                    
                    $datacontaatual = explode('-', $mensalidadeatual->data)[2] . '/' . explode('-', $mensalidadeatual->data)[1] . '/' . explode('-', $mensalidadeatual->data)[0] ;
                    // dd($mensalidadeatual, $datacontaatual);
                    $contratoatual = $mensalidadeatual->contrato;
                    $caixaatualid = DB::table('caixas')->where('caixa_nome', $request->caixaatual)->first()->caixa_id;
                    $contasreceber = DB::table('contasareceber')
                    ->where('descconta', 'Mensalidade ' . $datacontaatual . ' - ' . $contratoatual)
                    ->delete();
                    $metodosatuais = [];
                    $autoatuais = [];
                    $cvatuais = [];
                    for($i = 0; $i < count($request->metodospagamento); $i++){

                        if($request->metodospagamento[$i] <=2){
                            $metodospagamentoconta = 1;
                            if($request->metodospagamento[$i] > 1){
                                $metodospagamentoconta = $request->metodospagamento[$i];
                            }
                            array_push($metodosatuais,$metodospagamentoconta);
                            array_push($autoatuais,$request->autometodospagamento[$i]);
                            array_push($cvatuais,$request->cvmetodospagamento[$i]);

                            $contasreceber = DB::table('contasareceber')
                            ->where('descconta', 'Mensalidade ' . $datacontaatual . ' - ' . $contratoatual)
                            ->insert([
                                'datapagoconta' => $mensalidadeatual->data,
                                'vencimentoconta' => $mensalidadeatual->data,
                                'clienteconta' => $mensalidadeatual->responsavel,
                                'valorconta' => $mensalidadeatual->valor,
                                'descconta' => 'Mensalidade ' . $datacontaatual . ' - ' . $contratoatual,
                                'recebidoconta' => 1,
                                'caixaconta' => $caixaatualid,
                                'formapagamentoconta' => $metodospagamentoconta,
                                'autoconta' => $request->autometodospagamento[$i],
                                'cvconta' => $request->cvmetodospagamento[$i]
                            ]);

                        }else{
                            if($request->metodospagamento[$i] == 3){
                                $valordividido = doubleval($request->valormetodospagamento[$i]) / $request->qtdmetodospagamento[$i];
                                // dd($valordividido);
                                for($o = 0; $o < $request->qtdmetodospagamento[$i]; $o++){
                                    $metodospagamentoconta = 1;
                                    if($request->metodospagamento[$i] > 1){
                                        $metodospagamentoconta = $request->metodospagamento[$i];
                                    }
                                    array_push($metodosatuais,$metodospagamentoconta);

                                    $contasreceber = DB::table('contasareceber')
                                    ->where('descconta', 'Mensalidade ' . $datacontaatual . ' - ' . $contratoatual)
                                    ->insert([
                                        'datapagoconta' => $mensalidadeatual->data,
                                        'vencimentopagoconta' => $mensalidadeatual->data,
                                        'clientepagoconta' => $mensalidadeatual->responsavel,
                                        'valorpagoconta' => $mensalidadeatual->valor,
                                        'descconta' => 'Mensalidade ' . $datacontaatual . ' - ' . $contratoatual,
                                        'recebidoconta' => 1,
                                        'caixaconta' => $caixaatualid,
                                        'formapagamentoconta' => $metodospagamentoconta,
                                        'autoconta' => $request->autometodospagamento[$i],
                                        'cvconta' => $request->cvmetodospagamento[$i]
                                    ]);
                                }
                            }else{
                                $metodospagamentoconta = 1;
                                if($request->metodospagamento[$i] > 1){
                                    $metodospagamentoconta = $request->metodospagamento[$i];
                                }
                                array_push($metodosatuais,$metodospagamentoconta);

                                $contasreceber = DB::table('contasareceber')
                                ->where('descconta', 'Mensalidade ' . $datacontaatual . ' - ' . $contratoatual)
                                ->insert([
                                    'datapagoconta' => $mensalidadeatual->data,
                                    'vencimentopagoconta' => $mensalidadeatual->data,
                                    'clientepagoconta' => $mensalidadeatual->responsavel,
                                    'valorpagoconta' => $mensalidadeatual->valor,
                                    'descconta' => 'Mensalidade ' . $datacontaatual . ' - ' . $contratoatual,
                                    'recebidoconta' => 1,
                                    'caixaconta' => $caixaatualid,
                                    'formapagamentoconta' => $metodospagamentoconta,
                                    'autoconta' => $request->autometodospagamento[$i],
                                    'cvconta' => $request->cvmetodospagamento[$i]
                                ]);
                            }
                            
                        }
                    }

                    $valorcaixaatual = DB::table('caixas')->where('caixa_nome', $request->caixaatual)->first()->caixa_valordinheiro;
                    $caixaatualid = DB::table('caixas')->where('caixa_nome', $request->caixaatual)->first()->caixa_id;
                    if($valorcaixaatual == null or $valorcaixaatual == 'null' or $valorcaixaatual == 0){
                        $attvalorcaixaatual =  DB::table('caixas')->where('caixa_nome', $request->caixaatual)->update([
                            'caixa_valordinheiro' => doubleval($request->valortotal),
                        ]);
                    }else{
                        $attvalorcaixaatual =  DB::table('caixas')->where('caixa_nome', $request->caixaatual)->update([
                            'caixa_valordinheiro' => doubleval($valorcaixaatual) + doubleval($request->valortotal),
                        ]);
                    }
                    $cobranca = DB::table('cobranca')
                    ->where('idcobranca', $listamensalidades[$o])
                    ->update([
                        'pago' => 1,
                        'formapagamento' => implode(',',$metodosatuais),
                        'auto' => $autoatuais,
                        'cv' => $cvatuais
                    ]);
                }

                

            }else if (count($listamensalidades) > 0 && count($listaservicosprodutos) > 0) {
                
            }else {
                for($i = 0; $i < count($request->metodospagamento); $i++){
                    if($request->metodospagamento[$i] <=2){
                        $metodospagamentoconta = 1;
                        if($request->metodospagamento[$i] > 1){
                            $metodospagamentoconta = $request->metodospagamento[$i];
                        }
                        
                            $valorcaixaatual = DB::table('caixas')->where('caixa_nome', $request->caixaatual)->first()->caixa_valorcartao;
                            $caixaatualid = DB::table('caixas')->where('caixa_nome', $request->caixaatual)->first()->caixa_id;
                    
                            if($valorcaixaatual == null or $valorcaixaatual == 'null' or $valorcaixaatual == 0){
                                $attvalorcaixaatual =  DB::table('caixas')->where('caixa_nome', $request->caixaatual)->update([
                                    'caixa_valorcartao' => doubleval($request->valortotal),
                                ]);
                            }else{
                                $attvalorcaixaatual =  DB::table('caixas')->where('caixa_nome', $request->caixaatual)->update([
                                    'caixa_valorcartao' => doubleval($valorcaixaatual) + doubleval($request->valortotal),
                                ]);
                            }
                    }else{
                        if($request->metodospagamento[$i] == 3){
                            $valordividido = doubleval($request->valormetodospagamento[$i]) / $request->qtdmetodospagamento[$i];
                            // dd($valordividido);
                            for($o = 0; $o < $request->qtdmetodospagamento[$i]; $o++){
                                $metodospagamentoconta = 1;
                                if($request->metodospagamento[$i] > 1){
                                    $metodospagamentoconta = $request->metodospagamento[$i];
                                }
                                $contasareceber = DB::table('contasareceber')->insert([
                                    'datapagoconta' => $data ,
                                    'vencimentoconta' => $vencimento->format('Y-m-d') ,
                                    'clienteconta' => $idclienteatual ,
                                    'formapagamentoconta' => $metodospagamentoconta,
                                    'valorconta' => $valordividido,
                                    'descconta' => "Compra no PDV - ".$nomeclientatual.'('.$cpfclienteatual.')',
                                    'recebidoconta' => 0,
                                    'autoconta' => $request->autometodospagamento[$i],
                                    'cvconta' => $request->cvmetodospagamento[$i]
                                ]);
                            }
                        }else{
                            $metodospagamentoconta = 1;
                            if($request->metodospagamento[$i] > 1){
                                $metodospagamentoconta = $request->metodospagamento[$i];
                            }
                            $contasareceber = DB::table('contasareceber')->insert([
                                'datapagoconta' => $data ,
                                'vencimentoconta' => $vencimento->format('Y-m-d') ,
                                'clienteconta' => $idclienteatual ,
                                'formapagamentoconta' => $metodospagamentoconta,
                                'valorconta' => doubleval($request->valormetodospagamento[$i]),
                                'descconta' => "Compra no PDV - ".$nomeclientatual.'('.$cpfclienteatual.')',
                                'recebidoconta' => 1
                            ]);
                            $valorcaixaatual = DB::table('caixas')->where('caixa_nome', $request->caixaatual)->first()->caixa_valordinheiro;
                            $caixaatualid = DB::table('caixas')->where('caixa_nome', $request->caixaatual)->first()->caixa_id;
                            if($valorcaixaatual == null or $valorcaixaatual == 'null' or $valorcaixaatual == 0){
                                $attvalorcaixaatual =  DB::table('caixas')->where('caixa_nome', $request->caixaatual)->update([
                                    'caixa_valordinheiro' => doubleval($request->valortotal),
                                ]);
                            }else{
                                $attvalorcaixaatual =  DB::table('caixas')->where('caixa_nome', $request->caixaatual)->update([
                                    'caixa_valordinheiro' => doubleval($valorcaixaatual) + doubleval($request->valortotal),
                                ]);
                            }
                        }
                        
                    }
                }
            }
            
            //
            if($checkcompobs != 1){
                for($i = 0; $i < count($request->qtd); $i++){
                    if($request->iditems[$i] != 0){
                    if(DB::table('produtos')->where('prod_id' ,$request->iditems[$i])->first()->prod_tipo == "Item"){
                        $prod_quant_atual = DB::table('produtos')->where('prod_id' ,$request->iditems[$i])->first()->prod_quant;
                        $novaquantidade = intval($prod_quant_atual) - intval($request->qtd[$i]);
                        $fluxoestoque = DB::table('fluxoestoque')->insert([
                            'idproduto' => $request->iditems[$i],
                            'datafluxoestoque' => $data,
                            'descfluxoestoque' => "Compra no PDV - ".$nomeclientatual.'('.$cpfclienteatual.')',
                            'qtdantesfluxoestoque' => $prod_quant_atual,
                            'qtdatualfluxoestoque' => $novaquantidade
                        ]);
                        $prod_quant_novo = DB::table('produtos')->where('prod_id' ,$request->iditems[$i])->update(["prod_quant" => $novaquantidade]);
                        if($prod_quant_novo != 1){
                            $checkestoquefalha = 1;
                        }
                    }else{
                        $serviitensprodutoatual = DB::table('produtos')->where('prod_id' ,$request->iditems[$i])->first()->prod_serviitens;
                        $serviitens = explode(',', $serviitensprodutoatual);
                        if($serviitens[0] != '' && $serviitens[0] != 'undefinedxundefined'){
                            for($o = 0; $o < count($serviitens); $o++){
                                $produtoatual = explode('x', $serviitens[$o])[0];
                                $quantidadeatual = explode('x', $serviitens[$o])[1];
                                $prod_quant_atual = DB::table('produtos')->where('prod_id' ,$produtoatual)->first()->prod_quant;
                                $novaquantidade = intval($prod_quant_atual) - intval($quantidadeatual);
                                $fluxoestoque = DB::table('fluxoestoque')->insert([
                                    'idproduto' => $produtoatual,
                                    'datafluxoestoque' => $data,
                                    'descfluxoestoque' => "Compra no PDV - ".$nomeclientatual.'('.$cpfclienteatual.')',
                                    'qtdantesfluxoestoque' => $prod_quant_atual,
                                    'qtdatualfluxoestoque' => $novaquantidade
                                ]);
                                $prod_quant_novo = DB::table('produtos')->where('prod_id' ,$produtoatual)->update(["prod_quant" => $novaquantidade]);
                                if($prod_quant_novo != 1){
                                    $checkestoquefalha = 1;
                                }
                            }
                        }
                        
                    }
                }
                }
                if($checkestoquefalha != 1){
                    $attstatusagenda = DB::table('agendas')->where('age_id', $request->deppagid)->update(["age_status" => "Pagamento Concluído"]);
                    return json_encode(1);
                }else{
                    return 0;
                }
            }else{
                return 0;
            }
        }else{
            return 0;
        }
    }

    public function FluxoCaixas(Request $request){
        $caixasinfo = [[],[],[],[],[],[],[], [], []];
        $caixas = DB::table('caixas')->orderBy('caixa_data')->get();
        // dd($caixas);
        foreach($caixas as $caixa){
            $nomefunc = DB::table('users')->where('id', $caixa->caixa_func)->first()->name;
            array_push($caixasinfo[0], $caixa->caixa_nome);
            array_push($caixasinfo[1], $nomefunc);
            array_push($caixasinfo[2], $caixa->caixa_abriu);
            array_push($caixasinfo[3], $caixa->caixa_fechou);
            array_push($caixasinfo[4], $caixa->caixa_valordinheiro);
            array_push($caixasinfo[5], $caixa->caixa_status);
            array_push($caixasinfo[6], $caixa->caixa_id);
            array_push($caixasinfo[7], $caixa->caixa_valorcartao);
            array_push($caixasinfo[8], $caixa->caixa_valortransf);
        }
        return $caixasinfo;
    }

    public function BuscarDadosCaixa(Request $request){
        $caixasinfo = [];
        $comprasinfo = [[],[],[],[],[],[],[],[],[],[],[], []];
        $comprasobsinfo = [[], [], [], []];
        $caixas = DB::table('caixas')->where('caixa_id', $request->caixa_id)->get();
        // dd($caixas);
        foreach($caixas as $caixa){
            $nomefunc = DB::table('users')->where('id', $caixa->caixa_func)->first()->name;
            array_push($caixasinfo, $caixa->caixa_nome);
            array_push($caixasinfo, $nomefunc);
            array_push($caixasinfo, $caixa->caixa_abriu);
            array_push($caixasinfo, $caixa->caixa_fechou);
            array_push($caixasinfo, $caixa->caixa_valordinheiro);
            array_push($caixasinfo, $caixa->caixa_status);
            array_push($caixasinfo, $caixa->caixa_id);
            array_push($caixasinfo, $caixa->caixa_valorcartao);
            array_push($caixasinfo, $caixa->caixa_valortransf);
        }
        $compras = DB::table('compras')->where('comp_caixa', $request->caixa_id)->get();
        foreach($compras as $compra){
            $agenda = DB::table('agendas')->where('age_id', $compra->comp_deppag)->first();

            array_push($comprasinfo[0], $compra->comp_id);
            array_push($comprasinfo[1], $agenda->age_pessoa);
            array_push($comprasinfo[2], $compra->comp_data);
            array_push($comprasinfo[3], $compra->comp_hora);
            array_push($comprasinfo[4], doubleval($compra->comp_valor));
            array_push($comprasinfo[5], $compra->comp_auto);
            array_push($comprasinfo[6], $compra->comp_cv);
            array_push($comprasinfo[7], $compra->comp_parcelas);
            array_push($comprasinfo[8], $compra->comp_valordividido);
            array_push($comprasinfo[9], $compra->comp_metodopagamento);
        }
        return [$caixasinfo, $comprasinfo];
    }

    public function BuscarDadosCaixaPDV(Request $request){
        $caixasinfo = [];
        $caixas = DB::table('caixas')->where('caixa_nome', $request->caixa_nome)->get();
        // dd($caixas);
        foreach($caixas as $caixa){
            array_push($caixasinfo, $caixa->caixa_valordinheiro);
            array_push($caixasinfo, $caixa->caixa_valorcartao);
            array_push($caixasinfo, $caixa->caixa_valortransf);
        }
        return $caixasinfo;
    }

    public function NovaEntrada(Request $request){
        // dd($request->all());
        $DT = new DateTime( 'now', new \DateTimeZone( 'America/Sao_Paulo') );
        $caixa = DB::table('caixas')->where('caixa_id', $request->entrada_caixa)->first();
        $novaentrada = DB::table('entradas')->insert([
            'entrada_caixa' => $request->entrada_caixa,
            'entrada_motivo' => $request->entrada_motivo,
            'entrada_valor' => doubleval(str_replace('', '.', str_replace('.', '', $request->entrada_valor))),
            'entrada_formapagamento' => $request->entrada_formapagamento,
            'entrada_auto' => $request->entrada_auto,
            'entrada_cv' => $request->entrada_cv,
            'entrada_data' => $DT->format('Y-m-d H:i'),
            'entrada_datacompetencia' => $request->entrada_datacompetencia,
            'entrada_pagador' => $request->entrada_pagador,
            'entrada_funcionario' => $request->entrada_funcionario,
        ]);
        $novacontaareceber = DB::table('contasareceber')->insert([
            'clienteconta' => 0,
            'recebidoconta' => 1,
            'descconta' => 'Entrada no '.$caixa->caixa_nome.' -> R$'.number_format(doubleval(str_replace('', '.', str_replace('.', '', $request->entrada_valor))),2,",","."),
            'valorconta' => doubleval(str_replace('', '.', str_replace('.', '', $request->entrada_valor))),
            'formapagamentoconta' => $request->entrada_formapagamento,
            'autoconta' => $request->entrada_auto,
            'cvconta' => $request->entrada_cv,
            'datapagoconta' => $request->entrada_datacompetencia,
        ]);
        if($request->entrada_formapagamento == 1){
            $attvalor = DB::table('caixas')->where('caixa_id', $caixa->caixa_id)->update([
                'caixa_valordinheiro' => doubleval(str_replace('', '.', str_replace('.', '', $request->entrada_valor))) + $caixa->caixa_valordinheiro
            ]);
        }else if($request->entrada_formapagamento == 2 || $request->entrada_formapagamento == 3){
            $attvalor = DB::table('caixas')->where('caixa_id', $caixa->caixa_id)->update([
                'caixa_valorcartao' => doubleval(str_replace('', '.', str_replace('.', '', $request->entrada_valor))) + $caixa->caixa_valorcartao
            ]);
        }else{
            $attvalor = DB::table('caixas')->where('caixa_id', $caixa->caixa_id)->update([
                'caixa_valortransf' => doubleval(str_replace('', '.', str_replace('.', '', $request->entrada_valor))) + $caixa->caixa_valortransf
            ]);
        }
        if($novaentrada == 1 && $novacontaareceber == 1){
            return 1;
        }else{
            return 0;
        }
        // doubleval(str_replace(',', '', $request->entrada_valor)) $DT->format('Y-m-d H:i')

    }

    public function NovaEntradaPDV(Request $request){
        // dd($request->all());
        $DT = new DateTime( 'now', new \DateTimeZone( 'America/Sao_Paulo') );
        $caixa = DB::table('caixas')->where('caixa_nome', $request->entrada_caixa)->first();
        $novaentrada = DB::table('entradas')->insert([
            'entrada_caixa' => $caixa->caixa_id,
            'entrada_motivo' => $request->entrada_motivo,
            'entrada_valor' => doubleval(str_replace(',', '', $request->entrada_valor)),
            'entrada_formapagamento' => $request->entrada_formapagamento,
            'entrada_auto' => $request->entrada_auto,
            'entrada_cv' => $request->entrada_cv,
            'entrada_data' => $DT->format('Y-m-d H:i'),
            'entrada_datacompetencia' => $request->entrada_datacompetencia,
            'entrada_pagador' => $request->entrada_pagador,
            'entrada_funcionario' => $request->entrada_funcionario,
        ]);
        $novacontaareceber = DB::table('contasareceber')->insert([
            'clienteconta' => 0,
            'recebidoconta' => 1,
            'descconta' => 'Entrada no '.$caixa->caixa_nome.' -> R$'.number_format(doubleval(str_replace(',', '', $request->entrada_valor)),2,",","."),
            'valorconta' => doubleval(str_replace(',', '', $request->entrada_valor)),
            'formapagamentoconta' => $request->entrada_formapagamento,
            'autoconta' => $request->entrada_auto,
            'cvconta' => $request->entrada_cv,
            'datapagoconta' => $request->entrada_datacompetencia,
        ]);
        if($request->entrada_formapagamento == 1){
            $attvalor = DB::table('caixas')->where('caixa_id', $caixa->caixa_id)->update([
                'caixa_valordinheiro' => doubleval(str_replace(',', '', $request->entrada_valor)) + $caixa->caixa_valordinheiro
            ]);
        }else if($request->entrada_formapagamento == 2 || $request->entrada_formapagamento == 3){
            $attvalor = DB::table('caixas')->where('caixa_id', $caixa->caixa_id)->update([
                'caixa_valorcartao' => doubleval(str_replace(',', '', $request->entrada_valor)) + $caixa->caixa_valorcartao
            ]);
        }else{
            $attvalor = DB::table('caixas')->where('caixa_id', $caixa->caixa_id)->update([
                'caixa_valortransf' => doubleval(str_replace(',', '', $request->entrada_valor)) + $caixa->caixa_valortransf
            ]);
        }
        if($novaentrada == 1 && $novacontaareceber == 1){
            return 1;
        }else{
            return 0;
        }
        // doubleval(str_replace(',', '', $request->entrada_valor)) $DT->format('Y-m-d H:i')

    }

    public function NovaSaida(Request $request){
        // dd($request->all());
        $DT = new DateTime( 'now', new \DateTimeZone( 'America/Sao_Paulo') );
        $caixa = DB::table('caixas')->where('caixa_id', $request->saida_caixa)->first();
        $novasaida = DB::table('saidas')->insert([
            'saida_caixa' => $request->saida_caixa,
            'saida_motivo' => $request->saida_motivo,
            'saida_valor' => doubleval(str_replace('', '.', str_replace('.', '', $request->saida_valor))),
            'saida_formapagamento' => $request->saida_formapagamento,
            'saida_auto' => $request->saida_auto,
            'saida_cv' => $request->saida_cv,
            'saida_datacompetencia' => $request->saida_datacompetencia,
            'saida_pagador' => $request->saida_pagador,
            'saida_data' => $DT->format('Y-m-d H:i'),
            'saida_funcionario' => $request->saida_funcionario,
        ]);
        $novacontaapagar = DB::table('contasapagar')->insert([
            'fornecedorconta' => 0,
            'categoriaconta' => 0,
            'pagoconta' => 1,
            'periodoconta' => 1,
            'descconta' => 'Saída no '.$caixa->caixa_nome.' -> R$'.number_format(doubleval(str_replace('', '.', str_replace('.', '', $request->saida_valor))),2,",","."),
            'valortotalconta' => doubleval(str_replace('', '.', str_replace('.', '', $request->saida_valor))),
            'formapagamentoconta' => $request->saida_formapagamento,
            'autoconta' => $request->saida_auto,
            'cvconta' => $request->saida_cv,
            'datapagoconta' => $request->saida_datacompetencia,
            'vencimentoconta' => $request->saida_datacompetencia,
            'quantidadeconta' => 1,
        ]);

        if($request->saida_formapagamento == 1){
            $attvalor = DB::table('caixas')->where('caixa_id', $caixa->caixa_id)->update([
                'caixa_valordinheiro' => $caixa->caixa_valordinheiro - doubleval(str_replace('', '.', str_replace('.', '', $request->saida_valor)))
            ]);
        }else if($request->saida_formapagamento == 2 || $request->saida_formapagamento == 3){
            $attvalor = DB::table('caixas')->where('caixa_id', $caixa->caixa_id)->update([
                'caixa_valorcartao' => $caixa->caixa_valorcartao - doubleval(str_replace('', '.', str_replace('.', '', $request->saida_valor)))
            ]);
        }else{
            $attvalor = DB::table('caixas')->where('caixa_id', $caixa->caixa_id)->update([
                'caixa_valortransf' => $caixa->caixa_valortransf - doubleval(str_replace('', '.', str_replace('.', '', $request->saida_valor)))
            ]);
        }
        if($novasaida == 1 && $novacontaapagar == 1){
            return 1;
        }else{
            return 0;
        }
        // doubleval(str_replace(',', '', $request->entrada_valor)) $DT->format('Y-m-d H:i')

    }

    public function NovaSangria(Request $request){
        // dd($request->all());
        // dd(doubleval(str_replace('', '.', str_replace('.', '', $request->sangria_valor))), $request->sangria_valor);
        // dd(number_format(doubleval(str_replace('', '.', str_replace('.', '', $request->sangria_valor))),2,",","."));
        $DT = new DateTime( 'now', new \DateTimeZone( 'America/Sao_Paulo') );
        $caixa = DB::table('caixas')->where('caixa_id', $request->sangria_caixa)->first();
        $novasangria = DB::table('sangrias')->insert([
            'sangria_caixa' => $request->sangria_caixa,
            'sangria_valor' => doubleval(str_replace('', '.', str_replace('.', '', $request->sangria_valor))),
            'sangria_data' => $DT->format('Y-m-d H:i'),
            'sangria_funcionario' => $request->sangria_funcionario,
        ]);
        $novacontaapagar = DB::table('contasapagar')->insert([
            'fornecedorconta' => 0,
            'categoriaconta' => 0,
            'pagoconta' => 1,
            'periodoconta' => 1,
            'descconta' => 'Sangria no '.$caixa->caixa_nome.' -> R$'.number_format(doubleval(str_replace('', '.', str_replace('.', '', $request->sangria_valor))),2,",","."),
            'valortotalconta' => doubleval(str_replace('', '.', str_replace('.', '', $request->sangria_valor))),
            'formapagamentoconta' => 1,
            'datapagoconta' => $DT->format('Y-m-d'),
            'vencimentoconta' => $DT->format('Y-m-d'),
            'quantidadeconta' => 1,
        ]);

        $attvalor = DB::table('caixas')->where('caixa_id', $caixa->caixa_id)->update([
            'caixa_valordinheiro' => $caixa->caixa_valordinheiro - doubleval(str_replace('', '.', str_replace('.', '', $request->sangria_valor)))
        ]);

        return 1;
        // doubleval(str_replace(',', '', $request->entrada_valor)) $DT->format('Y-m-d H:i')

    }

    public function NovaSaidaPDV(Request $request){
        // dd($request->all());
        $DT = new DateTime( 'now', new \DateTimeZone( 'America/Sao_Paulo') );
        $caixa = DB::table('caixas')->where('caixa_nome', $request->saida_caixa)->first();
        $novasaida = DB::table('saidas')->insert([
            'saida_caixa' => $caixa->caixa_id,
            'saida_motivo' => $request->saida_motivo,
            'saida_valor' => doubleval(str_replace(',', '', $request->saida_valor)),
            'saida_formapagamento' => $request->saida_formapagamento,
            'saida_auto' => $request->saida_auto,
            'saida_cv' => $request->saida_cv,
            'saida_datacompetencia' => $request->saida_datacompetencia,
            'saida_pagador' => $request->saida_pagador,
            'saida_data' => $DT->format('Y-m-d H:i'),
            'saida_funcionario' => $request->saida_funcionario,
        ]);
        $novacontaapagar = DB::table('contasapagar')->insert([
            'fornecedorconta' => 0,
            'categoriaconta' => 0,
            'pagoconta' => 1,
            'periodoconta' => 1,
            'descconta' => 'Saída no '.$caixa->caixa_nome.' -> R$'.number_format(doubleval(str_replace(',', '', $request->saida_valor)),2,",","."),
            'valortotalconta' => doubleval(str_replace(',', '', $request->saida_valor)),
            'formapagamentoconta' => $request->saida_formapagamento,
            'autoconta' => $request->saida_auto,
            'cvconta' => $request->saida_cv,
            'datapagoconta' => $request->saida_datacompetencia,
            'vencimentoconta' => $request->saida_datacompetencia,
            'quantidadeconta' => 1,
        ]);

        if($request->saida_formapagamento == 1){
            $attvalor = DB::table('caixas')->where('caixa_id', $caixa->caixa_id)->update([
                'caixa_valordinheiro' => $caixa->caixa_valordinheiro - doubleval(str_replace(',', '', $request->saida_valor))
            ]);
        }else if($request->saida_formapagamento == 2 || $request->saida_formapagamento == 3){
            $attvalor = DB::table('caixas')->where('caixa_id', $caixa->caixa_id)->update([
                'caixa_valorcartao' => $caixa->caixa_valorcartao - doubleval(str_replace(',', '', $request->saida_valor))
            ]);
        }else{
            $attvalor = DB::table('caixas')->where('caixa_id', $caixa->caixa_id)->update([
                'caixa_valortransf' => $caixa->caixa_valortransf - doubleval(str_replace(',', '', $request->saida_valor))
            ]);
        }
        if($novasaida == 1 && $novacontaapagar == 1){
            return 1;
        }else{
            return 0;
        }
        // doubleval(str_replace(',', '', $request->entrada_valor)) $DT->format('Y-m-d H:i')

    }

    public function BuscarEntradasCaixa(Request $request){
        $entradasinfo = [[],[],[],[],[],[],[],[],[]];
        $entradas = DB::table('entradas')->where('entrada_caixa', $request->caixa_id)->get();
        foreach($entradas as $entrada){
            $user = DB::table('users')->where('id', $entrada->entrada_funcionario)->first();

            array_push($entradasinfo[0], $entrada->entrada_id);
            array_push($entradasinfo[1], $entrada->entrada_motivo);
            array_push($entradasinfo[2], doubleval($entrada->entrada_valor));
            array_push($entradasinfo[3], $entrada->entrada_formapagamento);
            array_push($entradasinfo[4], $entrada->entrada_auto);
            array_push($entradasinfo[5], $entrada->entrada_cv);
            array_push($entradasinfo[6], $entrada->entrada_datacompetencia);
            array_push($entradasinfo[7], $user->name);
            array_push($entradasinfo[8], $entrada->entrada_pagador);
        }

        $mensalidades = DB::table('contasareceber')->where('caixaconta', $request->caixa_id)->where('descconta', 'like', '%Mensalidade%')->get();
        $caixaatual = DB::table('caixas')->where('caixa_id', $request->caixa_id)->first();
        foreach($mensalidades as $mensalidade){
            
            $user = DB::table('users')->where('id', $caixaatual->caixa_func)->first();
            $cliente_atual = DB::table('pacientes')->where('pac_id', substr($mensalidade->clienteconta, 0, -1))->first();

            array_push($entradasinfo[0], $mensalidade->idcontareceber);
            array_push($entradasinfo[1], $mensalidade->descconta);
            array_push($entradasinfo[2], doubleval($mensalidade->valorconta));
            array_push($entradasinfo[3], $mensalidade->formapagamentoconta);
            array_push($entradasinfo[4], $mensalidade->autoconta);
            array_push($entradasinfo[5], $mensalidade->cvconta);
            array_push($entradasinfo[6], $mensalidade->datapagoconta);
            array_push($entradasinfo[7], $user->name);
            array_push($entradasinfo[8], $cliente_atual->pac_nome . ' - ' . $cliente_atual->pac_cpf);

        }
        return $entradasinfo;
    }

    public function BuscarSaidasCaixa(Request $request){
        $saidasinfo = [[],[],[],[],[],[],[],[],[]];
        $saidas = DB::table('saidas')->where('saida_caixa', $request->caixa_id)->get();
        foreach($saidas as $saida){
            $user = DB::table('users')->where('id', $saida->saida_funcionario)->first();

            array_push($saidasinfo[0], $saida->saida_id);
            array_push($saidasinfo[1], $saida->saida_motivo);
            array_push($saidasinfo[2], doubleval($saida->saida_valor));
            array_push($saidasinfo[3], $saida->saida_formapagamento);
            array_push($saidasinfo[4], $saida->saida_auto);
            array_push($saidasinfo[5], $saida->saida_cv);
            array_push($saidasinfo[6], $saida->saida_datacompetencia);
            array_push($saidasinfo[7], $user->name);
            array_push($saidasinfo[8], $saida->saida_pagador);
        }
        return $saidasinfo;
    }

    public function BuscarSangriasCaixa(Request $request){
        $sangriasinfo = [[],[],[],[]];
        $sangrias = DB::table('sangrias')->where('sangria_caixa', $request->caixa_id)->get();
        foreach($sangrias as $sangria){
            $user = DB::table('users')->where('id', $sangria->sangria_funcionario)->first();

            array_push($sangriasinfo[0], $sangria->sangria_id);
            array_push($sangriasinfo[1], $sangria->sangria_data);
            array_push($sangriasinfo[2], doubleval($sangria->sangria_valor));
            array_push($sangriasinfo[3], $user->name);
        }
        return $sangriasinfo;
    }

    public function BuscarAdesoesCaixa(Request $request){
        $adesoesinfo = [[],[],[],[],[],[],[],[]];
        $adesoes = DB::table('contasareceber')->where('caixaconta', $request->caixa_id)->where('descconta', 'like', '%Adesão%')->get();
        // dd($adesoes);
        foreach($adesoes as $adesoes){
            $pessoa = DB::table('pacientes')->where('pac_id', substr($adesoes->clienteconta, 0, -1))->first();
            // dd($pessoa);
            array_push($adesoesinfo[0], $adesoes->idcontareceber);
            array_push($adesoesinfo[1], $pessoa->pac_nome . ' - '. $pessoa->pac_cpf);
            array_push($adesoesinfo[2], $adesoes->datapagoconta);
            array_push($adesoesinfo[3], doubleval($adesoes->valorconta));
            array_push($adesoesinfo[4], $adesoes->formapagamentoconta);
            array_push($adesoesinfo[5], $adesoes->autoconta);
            array_push($adesoesinfo[6], $adesoes->cvconta);
            array_push($adesoesinfo[7], $adesoes->recebidoconta);
        }
        return $adesoesinfo;
    }

    public function ValoresCaixa(Request $request){
        return DB::table('caixas')->select('caixa_valordinheiro', 'caixa_valorcartao', 'caixa_valortransf')->where('caixa_id', $request->caixa_id)->first();
    }

    public function ReceberCaixaConfirm(Request $request){
        // dd($request->all(), doubleval(str_replace(',','.',str_replace('.','',$request->caixa_valorrecebido))));
        
        $attrecebido = DB::table('caixas')->where('caixa_id', $request->caixa_id)->update([
            'caixa_status' => 'Recebido',
            'caixa_valorrecebido' => doubleval(str_replace(',','.',str_replace('.','',$request->caixa_valorrecebido)))
        ]);
        return 1;
    }

}
