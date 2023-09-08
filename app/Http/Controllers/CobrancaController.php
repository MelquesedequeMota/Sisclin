<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Validator;

// Não gerar remessas e boletos de pessoas que já pagaram no cartão.

class CobrancaController extends Controller
{
    public function Cobranca(Request $request){
        return view('Cobranca');
    }
    public function Inadimplencia(Request $request){
        return view('Inadimplencia');
    }

    public function BuscarInadimplentes(Request $request){
        
        if($request->mesesfiltro){
            $filtromeses = $request->mesesfiltro;
        }else{
            $filtromeses = 1;
        }
        $inadimplentes = [[],[],[],[],[]];
        $lotes = DB::table('cobrancalote')->where('pagolote', '0')->get();
        // dd($lotes);
        $timezone = new \DateTimeZone('America/Sao_Paulo');
        $agora = new \DateTime('now', $timezone);
        foreach($lotes as $lotes){
            $cobrancasinamdimplentes = count(DB::table('cobranca')->where('idlote', $lotes->idlote)->where('data', '<=', $agora->format('Y-m-d'))->where('pago', '0')->get());
            // dd($cobrancasinamdimplentes);
            if($cobrancasinamdimplentes >= $filtromeses){
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
                    array_push($inadimplentes[0],$cliente->pac_nome . ' - ' . $cliente->pac_cpf);
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
                    array_push($inadimplentes[0],$cliente->forfis_nome . ' - ' . $cliente->forfis_cpf);
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
                    array_push($inadimplentes[0],$cliente->func_nome . ' - ' . $cliente->func_cpf);
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
                    array_push($inadimplentes[0],$cliente->clijur_nome . ' - ' . $cliente->clijur_cpf);
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
                    array_push($inadimplentes[0],$cliente->forjur_nome . ' - ' . $cliente->forjur_cpf);
                }
                $telefones = implode(',',$telefones);
                array_push($inadimplentes[1],$lotes->contratolote);
                array_push($inadimplentes[2],$telefones);
                array_push($inadimplentes[3],$cobrancasinamdimplentes);
                array_push($inadimplentes[4],$lotes->idlote);
            }
        }
        return $inadimplentes;
    }

    public function InformarPagamentoInadimplente(Request $request){
        
        // dd($request->all());
        // $caixaatual = DB::table('caixas')->where('caixa_func', Auth::user()->id)->orderBy('caixa_id', 'desc')->first();
        $caixaatual = DB::table('caixas')->orderBy('caixa_id', 'desc')->first();
        // dd($caixaatual);
        $valordinheiro = doubleval($caixaatual->caixa_valordinheiro);
        $valorcartao = doubleval($caixaatual->caixa_valorcartao);
        $valortransf = doubleval($caixaatual->caixa_valortransf);
        $pagamentocobranca = [[],[],[],[],[]];
        for($i = 0; $i < count($request->metodospagamentopagamento); $i++){
            for($o = 0; $o < $request->parcelapagamento[$i]; $o++){
                // dd($request->metodospagamentopagamento[$i], $request->parcelapagamento[$i], $request->autopagamento[$i], $request->cvpagamento[$i]);
                array_push($pagamentocobranca[0], $request->metodospagamentopagamento[$i]);
                array_push($pagamentocobranca[1], $request->parcelapagamento[$i]);
                array_push($pagamentocobranca[2], $request->autopagamento[$i]);
                array_push($pagamentocobranca[3], $request->cvpagamento[$i]);
                array_push($pagamentocobranca[4], number_format(doubleval(str_replace(",",".", $request->pagamentovalor[$i])) / $request->parcelapagamento[$i], 2, '.', ''));
            }
        }
        // dd($request->all(), $pagamentocobranca);
        $cobrancaatual = DB::table('cobranca')->where('idcobranca', $request->cobrancaatual)->first();
        $timezone = new \DateTimeZone('America/Sao_Paulo');
        $agora = new \DateTime($cobrancaatual->data, $timezone);
        $agora2 = new \DateTime('now', $timezone);
        $pagamentocartao = new \DateTime($cobrancaatual->data, $timezone);
        $pagamentoresto = new \DateTime($cobrancaatual->data, $timezone);
        $pagamentocartao->setDate($agora->format('Y'), $agora->format('m'), $agora->format('d'));

        // dd($cobrancaatual);
    
        $pagamentoresto->setDate($agora->format('Y'), $agora->format('m'), $agora->format('d'));
        $deletemensalidadeatual = DB::table('contasareceber')->where('descconta', 'like', '%'.$cobrancaatual->contrato.'%')->where('vencimentoconta', $cobrancaatual->data)->delete();
        for($o = 0; $o < count($pagamentocobranca[1]) ; $o++){
            if($pagamentocobranca[1][$o] == '3'){
                if($pagamentocartao->format('m') == '02' && intval($pagamentocartao->format('d')) > 28){

                    // $contasareceber = DB::table('contasareceber')->insert([
                    //     'datapagoconta' => $agora2->format('Y-m-').'28' ,
                    //     'vencimentoconta' => $agora2->format('Y-m-').'28' ,
                    //     'clienteconta' => $cobrancaatual->responsavel ,
                    //     'formapagamentoconta' => $pagamentocobranca[0][$o],
                    //     'valorconta' => doubleval($pagamentocobranca[4][$o]),
                    //     'descconta' => "Mensalidade 28".'/'.$pagamentocartao->format('m').'/'.$pagamentocartao->format('Y')." - ".$cobrancaatual->contrato,
                    //     'recebidoconta' => 0,
                    //     'autoconta' => $pagamentocobranca[2][$o],
                    //     'cvconta' => $pagamentocobranca[3][$o],
                    //     'caixaconta' => $caixaatual->caixa_id
                    // ]);
                        $contasareceber = DB::table('contasareceber')->insert([
                            'datapagoconta' => $agora2->format('Y-m-').'28' ,
                            'vencimentoconta' => $agora2->format('Y-m-').'28' ,
                            'clienteconta' => $cobrancaatual->responsavel ,
                            'formapagamentoconta' => $pagamentocobranca[0][$o],
                            'valorconta' => doubleval($pagamentocobranca[4][$o]),
                            'descconta' => "Informar: " . $request->informacao . " - Mensalidade 28".'/'.$pagamentocartao->format('m').'/'.$pagamentocartao->format('Y')." - ".$cobrancaatual->contrato,
                            'recebidoconta' => 0,
                            'autoconta' => $pagamentocobranca[2][$o],
                            'cvconta' => $pagamentocobranca[3][$o],
                            'caixaconta' => $caixaatual->caixa_id
                        ]);
                    
                }else{

                    // $contasareceber = DB::table('contasareceber')->insert([
                    //     'datapagoconta' => $agora2->format('Y-m-d') ,
                    //     'vencimentoconta' => $agora2->format('Y-m-d') ,
                    //     'clienteconta' => $cobrancaatual->responsavel ,
                    //     'formapagamentoconta' => $pagamentocobranca[0][$o],
                    //     'valorconta' => doubleval($pagamentocobranca[4][$o]),
                    //     'descconta' => "Mensalidade ".$pagamentocartao->format('d').'/'.$pagamentocartao->format('m').'/'.$pagamentocartao->format('Y')." - ".$cobrancaatual->contrato,
                    //     'recebidoconta' => 0,
                    //     'autoconta' => $pagamentocobranca[2][$o],
                    //     'cvconta' => $pagamentocobranca[3][$o],
                    //     'caixaconta' => $caixaatual->caixa_id
                    // ]);

                        $contasareceber = DB::table('contasareceber')->insert([
                            'datapagoconta' => $agora2->format('Y-m-d') ,
                            'vencimentoconta' => $agora2->format('Y-m-d') ,
                            'clienteconta' => $cobrancaatual->responsavel ,
                            'formapagamentoconta' => $pagamentocobranca[0][$o],
                            'valorconta' => doubleval($pagamentocobranca[4][$o]),
                            'descconta' => "Informar: " . $request->informacao . " - Mensalidade ".$pagamentocartao->format('d').'/'.$pagamentocartao->format('m').'/'.$pagamentocartao->format('Y')." - ".$cobrancaatual->contrato,
                            'recebidoconta' => 0,
                            'autoconta' => $pagamentocobranca[2][$o],
                            'cvconta' => $pagamentocobranca[3][$o],
                            'caixaconta' => $caixaatual->caixa_id
                        ]);
                    
                }
                $valorcartao += doubleval($pagamentocobranca[4][$o]);
            }else{
                if($pagamentoresto->format('m') == '02' && intval($pagamentoresto->format('d')) > 28){

                    // $contasareceber = DB::table('contasareceber')->insert([
                    //     'datapagoconta' => $agora2->format('Y-m-').'28' ,
                    //     'vencimentoconta' => $agora2->format('Y-m-').'28' ,
                    //     'clienteconta' => $cobrancaatual->responsavel ,
                    //     'formapagamentoconta' => $pagamentocobranca[0][$o],
                    //     'valorconta' => doubleval($pagamentocobranca[4][$o]),
                    //     'descconta' => "Mensalidade 28".'/'.$pagamentoresto->format('m').'/'.$pagamentoresto->format('Y')." - ".$cobrancaatual->contrato,
                    //     'recebidoconta' => 0,
                    //     'autoconta' => $pagamentocobranca[2][$o],
                    //     'cvconta' => $pagamentocobranca[3][$o],
                    //     'caixaconta' => $caixaatual->caixa_id
                    // ]);
                
                        $contasareceber = DB::table('contasareceber')->insert([
                            'datapagoconta' => $agora2->format('Y-m-').'28' ,
                            'vencimentoconta' => $agora2->format('Y-m-').'28' ,
                            'clienteconta' => $cobrancaatual->responsavel ,
                            'formapagamentoconta' => $pagamentocobranca[0][$o],
                            'valorconta' => doubleval($pagamentocobranca[4][$o]),
                            'descconta' => "Informar: " . $request->informacao . " - Mensalidade 28".'/'.$pagamentoresto->format('m').'/'.$pagamentoresto->format('Y')." - ".$cobrancaatual->contrato,
                            'recebidoconta' => 0,
                            'autoconta' => $pagamentocobranca[2][$o],
                            'cvconta' => $pagamentocobranca[3][$o],
                            'caixaconta' => $caixaatual->caixa_id
                        ]);
                    
                }else{

                    // $contasareceber = DB::table('contasareceber')->insert([
                    //     'datapagoconta' => $agora2->format('Y-m-d') ,
                    //     'vencimentoconta' => $agora2->format('Y-m-d') ,
                    //     'clienteconta' => $cobrancaatual->responsavel ,
                    //     'formapagamentoconta' => $pagamentocobranca[0][$o],
                    //     'valorconta' => doubleval($pagamentocobranca[4][$o]),
                    //     'descconta' => "Mensalidade ".$pagamentoresto->format('d').'/'.$pagamentoresto->format('m').'/'.$pagamentoresto->format('Y')." - ".$cobrancaatual->contrato,
                    //     'recebidoconta' => 0,
                    //     'autoconta' => $pagamentocobranca[2][$o],
                    //     'cvconta' => $pagamentocobranca[3][$o],
                    //     'caixaconta' => $caixaatual->caixa_id
                    // ]);

                        $contasareceber = DB::table('contasareceber')->insert([
                            'datapagoconta' => $agora2->format('Y-m-d') ,
                            'vencimentoconta' => $agora2->format('Y-m-d') ,
                            'clienteconta' => $cobrancaatual->responsavel ,
                            'formapagamentoconta' => $pagamentocobranca[0][$o],
                            'valorconta' => doubleval($pagamentocobranca[4][$o]),
                            'descconta' => "Informar: " . $request->informacao . " - Mensalidade ".$pagamentoresto->format('d').'/'.$pagamentoresto->format('m').'/'.$pagamentoresto->format('Y')." - ".$cobrancaatual->contrato,
                            'recebidoconta' => 0,
                            'autoconta' => $pagamentocobranca[2][$o],
                            'cvconta' => $pagamentocobranca[3][$o],
                            'caixaconta' => $caixaatual->caixa_id
                        ]);
                    
                }
                if($pagamentocobranca[0][$o] == 1){
                    $valordinheiro += doubleval($pagamentocobranca[4][$o]);
                }else if($pagamentocobranca[0][$o] == 2){
                    $valorcartao += doubleval($pagamentocobranca[4][$o]);
                }else if($pagamentocobranca[0][$o] == 4){
                    $valortransf += doubleval($pagamentocobranca[4][$o]);
                }
            }
            
        }
        // $caixanovosvalores = DB::table('caixas')->where('caixa_id', $caixaatual->caixa_id)
        // ->update([
        //     'caixa_valordinheiro' => $valordinheiro,
        //     'caixa_valorcartao' => $valorcartao,
        //     'caixa_valortransf' => $valortransf,
        // ]);
        // $attcobrancaatual = DB::table('cobranca')->where('idcobranca', $request->cobrancaatual)
        // ->update([
        //     'pago' => 1,
        //     'auto' => implode(',',$pagamentocobranca[2]),
        //     'cv' => implode(',',$pagamentocobranca[3]),
        //     'formapagamento' => implode(',',$pagamentocobranca[0]),
        // ]);
        return 1;
    }

    public function ReceberPagamentoInadimplente(Request $request){
        
        // dd($request->all());
        // $caixaatual = DB::table('caixas')->where('caixa_func', Auth::user()->id)->orderBy('caixa_id', 'desc')->first();
        $caixaatual = DB::table('caixas')->orderBy('caixa_id', 'desc')->first();
        // dd($caixaatual);
        $valordinheiro = doubleval($caixaatual->caixa_valordinheiro);
        $valorcartao = doubleval($caixaatual->caixa_valorcartao);
        $valortransf = doubleval($caixaatual->caixa_valortransf);
        $pagamentocobranca = [[],[],[],[],[]];
        for($i = 0; $i < count($request->metodospagamentopagamento); $i++){
            for($o = 0; $o < $request->parcelapagamento[$i]; $o++){
                // dd($request->metodospagamentopagamento[$i], $request->parcelapagamento[$i], $request->autopagamento[$i], $request->cvpagamento[$i]);
                array_push($pagamentocobranca[0], $request->metodospagamentopagamento[$i]);
                array_push($pagamentocobranca[1], $request->parcelapagamento[$i]);
                array_push($pagamentocobranca[2], $request->autopagamento[$i]);
                array_push($pagamentocobranca[3], $request->cvpagamento[$i]);
                array_push($pagamentocobranca[4], number_format(doubleval(str_replace(",",".", $request->pagamentovalor[$i])) / $request->parcelapagamento[$i], 2, '.', ''));
            }
        }
        // dd($request->all(), $pagamentocobranca);
        $cobrancaatual = DB::table('cobranca')->where('idcobranca', $request->cobrancaatual)->first();
        $timezone = new \DateTimeZone('America/Sao_Paulo');
        $agora = new \DateTime($cobrancaatual->data, $timezone);
        $agora2 = new \DateTime('now', $timezone);
        $pagamentocartao = new \DateTime($cobrancaatual->data, $timezone);
        $pagamentoresto = new \DateTime($cobrancaatual->data, $timezone);
        $pagamentocartao->setDate($agora->format('Y'), $agora->format('m'), $agora->format('d'));

        // dd($cobrancaatual);
    
        $pagamentoresto->setDate($agora->format('Y'), $agora->format('m'), $agora->format('d'));
        $deletemensalidadeatual = DB::table('contasareceber')->where('descconta', 'like', '%'.$cobrancaatual->contrato.'%')->where('vencimentoconta', $cobrancaatual->data)->delete();
        for($o = 0; $o < count($pagamentocobranca[1]) ; $o++){
            if($pagamentocobranca[1][$o] == '3'){
                if($pagamentocartao->format('m') == '02' && intval($pagamentocartao->format('d')) > 28){

                    // $contasareceber = DB::table('contasareceber')->insert([
                    //     'datapagoconta' => $agora2->format('Y-m-').'28' ,
                    //     'vencimentoconta' => $agora2->format('Y-m-').'28' ,
                    //     'clienteconta' => $cobrancaatual->responsavel ,
                    //     'formapagamentoconta' => $pagamentocobranca[0][$o],
                    //     'valorconta' => doubleval($pagamentocobranca[4][$o]),
                    //     'descconta' => "Mensalidade 28".'/'.$pagamentocartao->format('m').'/'.$pagamentocartao->format('Y')." - ".$cobrancaatual->contrato,
                    //     'recebidoconta' => 0,
                    //     'autoconta' => $pagamentocobranca[2][$o],
                    //     'cvconta' => $pagamentocobranca[3][$o],
                    //     'caixaconta' => $caixaatual->caixa_id
                    // ]);
                        $contasareceber = DB::table('contasareceber')->insert([
                            'datapagoconta' => $agora2->format('Y-m-').'28' ,
                            'vencimentoconta' => $agora2->format('Y-m-').'28' ,
                            'clienteconta' => $cobrancaatual->responsavel ,
                            'formapagamentoconta' => $pagamentocobranca[0][$o],
                            'valorconta' => doubleval($pagamentocobranca[4][$o]),
                            'descconta' => "Informar: Pagamento de Mensalidade - Mensalidade 28".'/'.$pagamentocartao->format('m').'/'.$pagamentocartao->format('Y')." - ".$cobrancaatual->contrato,
                            'recebidoconta' => 0,
                            'autoconta' => $pagamentocobranca[2][$o],
                            'cvconta' => $pagamentocobranca[3][$o],
                            'caixaconta' => $caixaatual->caixa_id
                        ]);
                    
                }else{

                    // $contasareceber = DB::table('contasareceber')->insert([
                    //     'datapagoconta' => $agora2->format('Y-m-d') ,
                    //     'vencimentoconta' => $agora2->format('Y-m-d') ,
                    //     'clienteconta' => $cobrancaatual->responsavel ,
                    //     'formapagamentoconta' => $pagamentocobranca[0][$o],
                    //     'valorconta' => doubleval($pagamentocobranca[4][$o]),
                    //     'descconta' => "Mensalidade ".$pagamentocartao->format('d').'/'.$pagamentocartao->format('m').'/'.$pagamentocartao->format('Y')." - ".$cobrancaatual->contrato,
                    //     'recebidoconta' => 0,
                    //     'autoconta' => $pagamentocobranca[2][$o],
                    //     'cvconta' => $pagamentocobranca[3][$o],
                    //     'caixaconta' => $caixaatual->caixa_id
                    // ]);

                        $contasareceber = DB::table('contasareceber')->insert([
                            'datapagoconta' => $agora2->format('Y-m-d') ,
                            'vencimentoconta' => $agora2->format('Y-m-d') ,
                            'clienteconta' => $cobrancaatual->responsavel ,
                            'formapagamentoconta' => $pagamentocobranca[0][$o],
                            'valorconta' => doubleval($pagamentocobranca[4][$o]),
                            'descconta' => "Informar: Pagamento de Mensalidade - Mensalidade ".$pagamentocartao->format('d').'/'.$pagamentocartao->format('m').'/'.$pagamentocartao->format('Y')." - ".$cobrancaatual->contrato,
                            'recebidoconta' => 0,
                            'autoconta' => $pagamentocobranca[2][$o],
                            'cvconta' => $pagamentocobranca[3][$o],
                            'caixaconta' => $caixaatual->caixa_id
                        ]);
                    
                }
                $valorcartao += doubleval($pagamentocobranca[4][$o]);
            }else{
                if($pagamentoresto->format('m') == '02' && intval($pagamentoresto->format('d')) > 28){

                    // $contasareceber = DB::table('contasareceber')->insert([
                    //     'datapagoconta' => $agora2->format('Y-m-').'28' ,
                    //     'vencimentoconta' => $agora2->format('Y-m-').'28' ,
                    //     'clienteconta' => $cobrancaatual->responsavel ,
                    //     'formapagamentoconta' => $pagamentocobranca[0][$o],
                    //     'valorconta' => doubleval($pagamentocobranca[4][$o]),
                    //     'descconta' => "Mensalidade 28".'/'.$pagamentoresto->format('m').'/'.$pagamentoresto->format('Y')." - ".$cobrancaatual->contrato,
                    //     'recebidoconta' => 0,
                    //     'autoconta' => $pagamentocobranca[2][$o],
                    //     'cvconta' => $pagamentocobranca[3][$o],
                    //     'caixaconta' => $caixaatual->caixa_id
                    // ]);
                
                        $contasareceber = DB::table('contasareceber')->insert([
                            'datapagoconta' => $agora2->format('Y-m-').'28' ,
                            'vencimentoconta' => $agora2->format('Y-m-').'28' ,
                            'clienteconta' => $cobrancaatual->responsavel ,
                            'formapagamentoconta' => $pagamentocobranca[0][$o],
                            'valorconta' => doubleval($pagamentocobranca[4][$o]),
                            'descconta' => "Informar: Pagamento de Mensalidade - Mensalidade 28".'/'.$pagamentoresto->format('m').'/'.$pagamentoresto->format('Y')." - ".$cobrancaatual->contrato,
                            'recebidoconta' => 0,
                            'autoconta' => $pagamentocobranca[2][$o],
                            'cvconta' => $pagamentocobranca[3][$o],
                            'caixaconta' => $caixaatual->caixa_id
                        ]);
                    
                }else{

                    // $contasareceber = DB::table('contasareceber')->insert([
                    //     'datapagoconta' => $agora2->format('Y-m-d') ,
                    //     'vencimentoconta' => $agora2->format('Y-m-d') ,
                    //     'clienteconta' => $cobrancaatual->responsavel ,
                    //     'formapagamentoconta' => $pagamentocobranca[0][$o],
                    //     'valorconta' => doubleval($pagamentocobranca[4][$o]),
                    //     'descconta' => "Mensalidade ".$pagamentoresto->format('d').'/'.$pagamentoresto->format('m').'/'.$pagamentoresto->format('Y')." - ".$cobrancaatual->contrato,
                    //     'recebidoconta' => 0,
                    //     'autoconta' => $pagamentocobranca[2][$o],
                    //     'cvconta' => $pagamentocobranca[3][$o],
                    //     'caixaconta' => $caixaatual->caixa_id
                    // ]);

                        $contasareceber = DB::table('contasareceber')->insert([
                            'datapagoconta' => $agora2->format('Y-m-d') ,
                            'vencimentoconta' => $agora2->format('Y-m-d') ,
                            'clienteconta' => $cobrancaatual->responsavel ,
                            'formapagamentoconta' => $pagamentocobranca[0][$o],
                            'valorconta' => doubleval($pagamentocobranca[4][$o]),
                            'descconta' => "Informar: Pagamento de Mensalidade - Mensalidade ".$pagamentoresto->format('d').'/'.$pagamentoresto->format('m').'/'.$pagamentoresto->format('Y')." - ".$cobrancaatual->contrato,
                            'recebidoconta' => 0,
                            'autoconta' => $pagamentocobranca[2][$o],
                            'cvconta' => $pagamentocobranca[3][$o],
                            'caixaconta' => $caixaatual->caixa_id
                        ]);
                    
                }
                if($pagamentocobranca[0][$o] == 1){
                    $valordinheiro += doubleval($pagamentocobranca[4][$o]);
                }else if($pagamentocobranca[0][$o] == 2){
                    $valorcartao += doubleval($pagamentocobranca[4][$o]);
                }else if($pagamentocobranca[0][$o] == 4){
                    $valortransf += doubleval($pagamentocobranca[4][$o]);
                }
            }
            
        }
        // $caixanovosvalores = DB::table('caixas')->where('caixa_id', $caixaatual->caixa_id)
        // ->update([
        //     'caixa_valordinheiro' => $valordinheiro,
        //     'caixa_valorcartao' => $valorcartao,
        //     'caixa_valortransf' => $valortransf,
        // ]);
        // $attcobrancaatual = DB::table('cobranca')->where('idcobranca', $request->cobrancaatual)
        // ->update([
        //     'pago' => 1,
        //     'auto' => implode(',',$pagamentocobranca[2]),
        //     'cv' => implode(',',$pagamentocobranca[3]),
        //     'formapagamento' => implode(',',$pagamentocobranca[0]),
        // ]);
        return 1;
    }

    public function AgendarCobranca(Request $request){
        
        $agendarcobranca = DB::table('agendacobrancas')->insert([
            'agendacobranca_data' => $request->dataatual,
            'agendacobranca_informacao' => $request->informacao,
            'agendacobranca_cobranca' => $request->cobrancaatual,
        ]);

        return 1;
        
    }

    public function ReagendarCobranca(Request $request){
        
        $agendarcobranca = DB::table('agendacobrancas')->where('agendacobranca_cobranca', $request->cobrancaatual)->update([
            'agendacobranca_data' => $request->dataatual,
            'agendacobranca_informacao' => $request->informacao,
        ]);

        return 1;
        
    }

    public function AgendamentosCobranca(Request $request){
        $cobrancas = [[],[],[],[],[],[],[],[],[]];

        $timezone = new \DateTimeZone('America/Sao_Paulo');
        $agora = new \DateTime('now', $timezone);
        $agendamentoscobrancas = DB::table('agendacobrancas')->where('agendacobranca_data', '<=', $agora->format('Y-m-d'))->get();
        
        foreach($agendamentoscobrancas as $agendamentoscobrancas){
            $cobrancaatual = DB::table('cobranca')->where('idcobranca', $agendamentoscobrancas->agendacobranca_cobranca)->first();
            // dd($cobrancaatual);
            if(substr($cobrancaatual->responsavel, -1) == 1){
                $cliente = DB::table('pacientes')->where('pac_id', substr($cobrancaatual->responsavel, 0, strlen($cobrancaatual->responsavel)-1))->first();
            }else if(substr($cobrancaatual->responsavel, -1) == 2){
                $cliente = DB::table('fornecedoresfis')->where('forfis_id', substr($cobrancaatual->responsavel, 0, strlen($cobrancaatual->responsavel)-1))->first();
            }else if(substr($cobrancaatual->responsavel, -1) == 3){
                $cliente = DB::table('funcionarios')->where('func_id', substr($cobrancaatual->responsavel, 0, strlen($cobrancaatual->responsavel)-1))->first();
            }else if(substr($cobrancaatual->responsavel, -1) == 4){
                $cliente = DB::table('clientesjur')->where('clijur_id', substr($cobrancaatual->responsavel, 0, strlen($cobrancaatual->responsavel)-1))->first();
            }else{
                $cliente = DB::table('fornecedoresjur')->where('clijur_id', substr($cobrancaatual->responsavel, 0, strlen($cobrancaatual->responsavel)-1))->first();
            }
            array_push($cobrancas[0],$cobrancaatual->idlote);
            array_push($cobrancas[1],$cobrancaatual->idcobranca);
            array_push($cobrancas[2],$cliente->pac_nome . ' - ' . $cliente->pac_cpf);
            array_push($cobrancas[3],$cobrancaatual->contrato);
            array_push($cobrancas[4],$cobrancaatual->data);
            if($cobrancaatual->fechado == '1'){
                array_push($cobrancas[5],'Sim');
            }else{
                array_push($cobrancas[5],'Não');
            }
            if($cobrancaatual->pago == '1'){
                array_push($cobrancas[6],'Sim');
            }else{
                array_push($cobrancas[6],'Não');
            }
            array_push($cobrancas[7],doubleval($cobrancaatual->valor));
            array_push($cobrancas[8],$agendamentoscobrancas->agendacobranca_informacao);
        }
        return $cobrancas;
        
    }

    // public function InformarPagamentoInadimplente(Request $request){
        
    //     dd($request->all());
        
    // }

    public function CriarCobrancaAvulsa(Request $request){

        // dd($request->all());
        
        $responsavel = explode(' - ', $request->respavulsa)[0] . ' - ' . explode(' - ', $request->respavulsa)[1];
        $contrato = explode(' - ', $request->respavulsa)[2];
        if($request->fechadoavulsa == 'true'){
            $fechado = 1;
        }else{
            $fechado = 0;
        }
        if($request->validadoavulsa == 'true'){
            $validado = 1;
        }else{
            $validado = 0;
        }

        $criarcobranca = DB::table('cobranca')->insert([
            'cobrador' => $request->cobrador,
            'contrato' => $contrato,
            'responsavel' => $responsavel,
            'fechado'  => $fechado,
            'validado'  => $validado,
            'data' => $request->dataavulsa,
            'cidade' => $request->cidadesavulsa,
            'numero' => 0,
            'valor' => floatval($request->valoravulsa),
            'pago' => 0
        ]);

        $idnovacobranca = DB::table('cobranca')->orderBy('idcobranca', 'DESC')->first()->idcobranca;

        if($criarcobranca == 1){
            return $idnovacobranca;
        }else{
            return 0;
        }

        
    }

    public function CriarCobrancaLote(Request $request){

        dd($request->all());
        
        $responsavel = explode(' - ', $request->respavulsa)[0] . ' - ' . explode(' - ', $request->respavulsa)[1];
        $contrato = explode(' - ', $request->respavulsa)[2];
        if($request->fechadoavulsa == 'true'){
            $fechado = 1;
        }else{
            $fechado = 0;
        }
        if($request->validadoavulsa == 'true'){
            $validado = 1;
        }else{
            $validado = 0;
        }

        $criarcobranca = DB::table('cobranca')->insert([
            'cobrador' => $request->cobrador,
            'contrato' => $contrato,
            'responsavel' => $responsavel,
            'fechado'  => $fechado,
            'validado'  => $validado,
            'data' => $request->dataavulsa,
            'cidade' => $request->cidadesavulsa,
            'numero' => 0,
            'valor' => floatval($request->valoravulsa),
            'pago' => 0
        ]);

        // $contasareceber = DB::table('contasareceber')->insert([
        //     'datapagoconta' => $pagamento->format('Y-m-d') ,
        //     'vencimentoconta' => $pagamento->format('Y-m-d') ,
        //     'clienteconta' => $contobs[$i] ,
        //     'formapagamentoconta' => $formapagamento,
        //     'valorconta' => doubleval($planoatual->plan_valorcartao),
        //     'descconta' => "Mensalidade ".$pagamento->format('d').'/'.$pagamento->format('m').'/'.$pagamento->format('Y')." - ".$cont_id,
        //     'recebidoconta' => 1,
        //     'autoconta' => $request->auto,
        //     'cvconta' => $request->cv
        // ]);

        $idnovacobranca = DB::table('cobranca')->orderBy('idcobranca', 'DESC')->first()->idcobranca;

        if($criarcobranca == 1){
            return $idnovacobranca;
        }else{
            return 0;
        }

        
    }
    public function UltimosLotes(Request $request){
        
        $lotes = [[],[],[],[],[],[],[],[],[],[]];
        $cobrancas = DB::table('cobrancalote')->orderBy('datalote', 'DESC')->get();
        // dd($cobrancas);
        foreach($cobrancas as $cobrancas){
            if(substr($cobrancas->responsavellote, -1) == 1){
                $cliente = DB::table('pacientes')->where('pac_id', substr($cobrancas->responsavellote, 0, strlen($cobrancas->responsavellote)-1))->first();
                // dd($cliente, $cobrancas->responsavellote);
            }else if(substr($cobrancas->responsavellote, -1) == 2){
                $cliente = DB::table('fornecedoresfis')->where('forfis_id', substr($cobrancas->responsavellote, 0, strlen($cobrancas->responsavellote)-1))->first();
            }else if(substr($cobrancas->responsavellote, -1) == 3){
                $cliente = DB::table('funcionarios')->where('func_id', substr($cobrancas->responsavellote, 0, strlen($cobrancas->responsavellote)-1))->first();
            }else if(substr($cobrancas->responsavellote, -1) == 4){
                $cliente = DB::table('clientesjur')->where('clijur_id', substr($cobrancas->responsavellote, 0, strlen($cobrancas->responsavellote)-1))->first();
            }else{
                $cliente = DB::table('fornecedoresjur')->where('fornecedoresjur_id', substr($cobrancas->responsavellote, 0, strlen($cobrancas->responsavellote)-1))->first();
            }
            $valor = 0;
            $fechados = count(DB::table('cobranca')->where('idlote', $cobrancas->idlote)->where('fechado', '1')->get());
            $validados = count(DB::table('cobranca')->where('idlote', $cobrancas->idlote)->where('pago', '1')->get());
            // dd($cobrancas->idlote);
            $valor = doubleval(DB::table('cobranca')->where('idlote', $cobrancas->idlote)->first()->valor);

            array_push($lotes[0],$cobrancas->idlote);
            array_push($lotes[1],$cliente->pac_nome . ' - ' . $cliente->pac_cpf);
            array_push($lotes[2],$cobrancas->contratolote);
            array_push($lotes[3],$cobrancas->datalote);
            // if($fechados == $cobrancas->quantidadelote){
            //     array_push($lotes[4],'Sim');
            // }else{
            //     array_push($lotes[4],'Não');
            // }
            // if($validados == $cobrancas->quantidadelote){
            //     array_push($lotes[5],'Sim');
            // }else{
            //     array_push($lotes[5],'Não');
            // }
            if($cobrancas->fechadolote == '1'){
                array_push($lotes[4],'Sim');
            }else{
                array_push($lotes[4],'Não');
            }
            if($cobrancas->pagolote == '1'){
                array_push($lotes[5],'Sim');
            }else{
                array_push($lotes[5],'Não');
            }
            array_push($lotes[6],$valor);
            array_push($lotes[7],0);
            array_push($lotes[8],'Lote');
            array_push($lotes[9],$cobrancas->formapagamentolote);
        }
        return $lotes;
    }

    public function PesquisarCobrancas(Request $request){
        // dd($request->all());
        $lotes = [[],[],[],[],[],[],[],[],[],[]];
        if($request->idlote != null){
            $cobrancas = DB::table('cobrancalote')->where('idlote', $request->idlote)->get();
        }else if($request->cobradorresp != null){
                $pessoadados = explode(' - ', $request->cobradorresp);
                $pacienteatual = DB::table('pacientes')->where('pac_nome', $pessoadados[0])->where('pac_cpf', $pessoadados[1])->first();
                // dd($pacienteatual, $pessoadados);
                if($request->fechado != null ||$request->pago != null){

                    if($request->fechado != null && $request->pago != null){
                        $cobrancas = DB::table('cobrancalote')
                        ->where('responsavellote', 'like', '%'.$pacienteatual->pac_id.'%')
                        ->where('datalote', '>=', $request->datainicio)
                        ->where('datalote', '<=', $request->datafim)
                        ->where('pagolote', $request->pago)
                        ->where('fechadolote', $request->fechado)
                        ->orderBy('datalote', 'DESC')
                        ->get();
                    }else if($request->fechado == null && $request->pago != null){
                        $cobrancas = DB::table('cobrancalote')
                        ->where('responsavellote', 'like', '%'.$pacienteatual->pac_id.'%')
                        ->where('datalote', '>=', $request->datainicio)
                        ->where('datalote', '<=', $request->datafim)
                        ->where('pagolote', $request->pago)
                        ->orderBy('datalote', 'DESC')
                        ->get();
                    }else{
                        $cobrancas = DB::table('cobrancalote')
                        ->where('responsavellote', 'like', '%'.$pacienteatual->pac_id.'%')
                        ->where('datalote', '>=', $request->datainicio)
                        ->where('datalote', '<=', $request->datafim)
                        ->where('fechadolote', $request->fechado)
                        ->orderBy('datalote', 'DESC')
                        ->get();
                    }

                }else{
                    $cobrancas = DB::table('cobrancalote')
                    ->where('responsavellote', 'like', '%'.$pacienteatual->pac_id.'%')
                    ->where('datalote', '>=', $request->datainicio)
                    ->where('datalote', '<=', $request->datafim)
                    ->orderBy('datalote', 'DESC')
                    ->get();
                    // dd($cobrancas);
                }
        }else{
            if($request->fechado != null ||$request->pago != null){
                // dd($request->all());
                if($request->fechado != null && $request->pago != null){
                    $cobrancas = DB::table('cobrancalote')
                    ->where('datalote', '>=', $request->datainicio)
                    ->where('datalote', '<=', $request->datafim)
                    ->where('pagolote', $request->pago)
                    ->where('fechadolote', $request->fechado)
                    ->orderBy('datalote', 'DESC')
                    ->get();
                }else if($request->fechado == null && $request->pago != null){
                    $cobrancas = DB::table('cobrancalote')
                    ->where('datalote', '>=', $request->datainicio)
                    ->where('datalote', '<=', $request->datafim)
                    ->where('pagolote', $request->pago)
                    ->orderBy('datalote', 'DESC')
                    ->get();
                }else{
                    // dd($request->all());
                    $cobrancas = DB::table('cobrancalote')
                    ->where('datalote', '>=', $request->datainicio)
                    ->where('datalote', '<=', $request->datafim)
                    ->where('fechadolote', $request->fechado)
                    ->orderBy('datalote', 'DESC')
                    ->get();
                    // dd($cobrancas, $request->fechado);
                }

            }else{
                $cobrancas = DB::table('cobrancalote')
                ->where('datalote', '>=', $request->datainicio)
                ->where('datalote', '<=', $request->datafim)
                ->orderBy('datalote', 'DESC')
                ->get();
                // dd($cobrancas);
            }
            // $cobrancas = DB::table('cobrancalote')->orderBy('datalote', 'DESC')->limit(10)->get();
        }
        // $cobrancas = DB::table('cobrancalote')->orderBy('datalote', 'DESC')->get();
        // dd($cobrancas);
        foreach($cobrancas as $cobrancas){
            if(substr($cobrancas->responsavellote, -1) == 1){
                $cliente = DB::table('pacientes')->where('pac_id', substr($cobrancas->responsavellote, 0, strlen($cobrancas->responsavellote)-1))->first();
                // dd($cliente, $cobrancas->responsavellote);
            }else if(substr($cobrancas->responsavellote, -1) == 2){
                $cliente = DB::table('fornecedoresfis')->where('forfis_id', substr($cobrancas->responsavellote, 0, strlen($cobrancas->responsavellote)-1))->first();
            }else if(substr($cobrancas->responsavellote, -1) == 3){
                $cliente = DB::table('funcionarios')->where('func_id', substr($cobrancas->responsavellote, 0, strlen($cobrancas->responsavellote)-1))->first();
            }else if(substr($cobrancas->responsavellote, -1) == 4){
                $cliente = DB::table('clientesjur')->where('clijur_id', substr($cobrancas->responsavellote, 0, strlen($cobrancas->responsavellote)-1))->first();
            }else{
                $cliente = DB::table('fornecedoresjur')->where('fornecedoresjur_id', substr($cobrancas->responsavellote, 0, strlen($cobrancas->responsavellote)-1))->first();
            }
            $valor = 0;
            $fechados = count(DB::table('cobranca')->where('idlote', $cobrancas->idlote)->where('fechado', '1')->get());
            $validados = count(DB::table('cobranca')->where('idlote', $cobrancas->idlote)->where('pago', '1')->get());
            // dd($cobrancas->idlote);
            $valor = doubleval(DB::table('cobranca')->where('idlote', $cobrancas->idlote)->first()->valor);

            array_push($lotes[0],$cobrancas->idlote);
            array_push($lotes[1],$cliente->pac_nome . ' - ' . $cliente->pac_cpf);
            array_push($lotes[2],$cobrancas->contratolote);
            array_push($lotes[3],$cobrancas->datalote);
            // if($fechados == $cobrancas->quantidadelote){
            //     array_push($lotes[4],'Sim');
            // }else{
            //     array_push($lotes[4],'Não');
            // }
            // if($validados == $cobrancas->quantidadelote){
            //     array_push($lotes[5],'Sim');
            // }else{
            //     array_push($lotes[5],'Não');
            // }
            if($cobrancas->fechadolote == '1'){
                array_push($lotes[4],'Sim');
            }else{
                array_push($lotes[4],'Não');
            }
            if($cobrancas->pagolote == '1'){
                array_push($lotes[5],'Sim');
            }else{
                array_push($lotes[5],'Não');
            }
            array_push($lotes[6],$valor);
            array_push($lotes[7],0);
            array_push($lotes[8],'Lote');
            array_push($lotes[9],$cobrancas->formapagamentolote);
        }
        return $lotes;
    }

    public function CobrancasDoLote(Request $request){
        // dd($request->all());
        $lotes = [[],[],[],[],[],[],[],[],[]];
        $cobrancas = DB::table('cobrancalote')->where('idlote', $request->idlote)->get();
        foreach($cobrancas as $cobrancas){
            if(substr($cobrancas->responsavellote, -1) == 1){
                $cliente = DB::table('pacientes')->where('pac_id', substr($cobrancas->responsavellote, 0, strlen($cobrancas->responsavellote)-1))->first();
            }else if(substr($cobrancas->responsavellote, -1) == 2){
                $cliente = DB::table('fornecedoresfis')->where('forfis_id', substr($cobrancas->responsavellote, 0, strlen($cobrancas->responsavellote)-1))->first();
            }else if(substr($cobrancas->responsavellote, -1) == 3){
                $cliente = DB::table('funcionarios')->where('func_id', substr($cobrancas->responsavellote, 0, strlen($cobrancas->responsavellote)-1))->first();
            }else if(substr($cobrancas->responsavellote, -1) == 4){
                $cliente = DB::table('clientesjur')->where('clijur_id', substr($cobrancas->responsavellote, 0, strlen($cobrancas->responsavellote)-1))->first();
            }else{
                $cliente = DB::table('fornecedoresjur')->where('clijur_id', substr($cobrancas->responsavellote, 0, strlen($cobrancas->responsavellote)-1))->first();
            }
            $valor = 0;
            $fechados = count(DB::table('cobranca')->where('idlote', $cobrancas->idlote)->where('fechado', '1')->get());
            $validados = count(DB::table('cobranca')->where('idlote', $cobrancas->idlote)->where('pago', '1')->get());
            $valor = doubleval(DB::table('cobranca')->where('idlote', $cobrancas->idlote)->first()->valor);

            array_push($lotes[0],$cobrancas->idlote);
            array_push($lotes[1],$cliente->pac_nome . ' - ' . $cliente->pac_cpf);
            array_push($lotes[2],$cobrancas->contratolote);
            array_push($lotes[3],$cobrancas->quantidadelote);
            if($fechados == $cobrancas->quantidadelote){
                array_push($lotes[4],'Sim');
            }else{
                array_push($lotes[4],'Não');
            }
            if($validados == $cobrancas->quantidadelote){
                array_push($lotes[5],'Sim');
            }else{
                array_push($lotes[5],'Não');
            }
            array_push($lotes[6],$valor);
            array_push($lotes[7],0);
            array_push($lotes[8],'Lote');
        }

        
        $cobrancas = DB::table('cobranca')->where('idlote', $lotes[0])->orderBy('data')->get();
        $cobrancas2 = $cobrancas->map(function($obj){
            return (array) $obj;
        })->toArray();
        // dd($cobrancas2);
        return [$lotes,$cobrancas2];
    }

    public function CobrancasContrato(Request $request){
        // dd($request->all());
        $lotes = [[],[],[],[],[],[],[],[],[]];
        $cobrancas = DB::table('cobrancalote')->where('contratolote', $request->contratoatual)->get();
        foreach($cobrancas as $cobrancas){
            if(substr($cobrancas->responsavellote, -1) == 1){
                $cliente = DB::table('pacientes')->where('pac_id', substr($cobrancas->responsavellote, 0, strlen($cobrancas->responsavellote)-1))->first();
            }else if(substr($cobrancas->responsavellote, -1) == 2){
                $cliente = DB::table('fornecedoresfis')->where('forfis_id', substr($cobrancas->responsavellote, 0, strlen($cobrancas->responsavellote)-1))->first();
            }else if(substr($cobrancas->responsavellote, -1) == 3){
                $cliente = DB::table('funcionarios')->where('func_id', substr($cobrancas->responsavellote, 0, strlen($cobrancas->responsavellote)-1))->first();
            }else if(substr($cobrancas->responsavellote, -1) == 4){
                $cliente = DB::table('clientesjur')->where('clijur_id', substr($cobrancas->responsavellote, 0, strlen($cobrancas->responsavellote)-1))->first();
            }else{
                $cliente = DB::table('fornecedoresjur')->where('clijur_id', substr($cobrancas->responsavellote, 0, strlen($cobrancas->responsavellote)-1))->first();
            }
            $valor = 0;
            $fechados = count(DB::table('cobranca')->where('idlote', $cobrancas->idlote)->where('fechado', '1')->get());
            $validados = count(DB::table('cobranca')->where('idlote', $cobrancas->idlote)->where('pago', '1')->get());
            $valor = doubleval(DB::table('cobranca')->where('idlote', $cobrancas->idlote)->first()->valor);

            array_push($lotes[0],$cobrancas->idlote);
            array_push($lotes[1],$cliente->pac_nome . ' - ' . $cliente->pac_cpf);
            array_push($lotes[2],$cobrancas->contratolote);
            array_push($lotes[3],$cobrancas->quantidadelote);
            if($fechados == $cobrancas->quantidadelote){
                array_push($lotes[4],'Sim');
            }else{
                array_push($lotes[4],'Não');
            }
            if($validados == $cobrancas->quantidadelote){
                array_push($lotes[5],'Sim');
            }else{
                array_push($lotes[5],'Não');
            }
            array_push($lotes[6],$valor);
            array_push($lotes[7],0);
            array_push($lotes[8],'Lote');
        }

        
        $cobrancas = DB::table('cobranca')->where('idlote', $lotes[0])->orderBy('data')->get();
        $cobrancas2 = $cobrancas->map(function($obj){
            return (array) $obj;
        })->toArray();
        // dd($cobrancas2);
        return [$lotes,$cobrancas2];
    }

    public function CobrancasDoLoteInadimplentes(Request $request){
        // dd($request->all());
        $lotes = [[],[],[],[],[],[],[],[],[]];
        $cobrancas = DB::table('cobrancalote')->where('idlote', $request->idlote)->get();
        foreach($cobrancas as $cobrancas){
            if(substr($cobrancas->responsavellote, -1) == 1){
                $cliente = DB::table('pacientes')->where('pac_id', substr($cobrancas->responsavellote, 0, strlen($cobrancas->responsavellote)-1))->first();
            }else if(substr($cobrancas->responsavellote, -1) == 2){
                $cliente = DB::table('fornecedoresfis')->where('forfis_id', substr($cobrancas->responsavellote, 0, strlen($cobrancas->responsavellote)-1))->first();
            }else if(substr($cobrancas->responsavellote, -1) == 3){
                $cliente = DB::table('funcionarios')->where('func_id', substr($cobrancas->responsavellote, 0, strlen($cobrancas->responsavellote)-1))->first();
            }else if(substr($cobrancas->responsavellote, -1) == 4){
                $cliente = DB::table('clientesjur')->where('clijur_id', substr($cobrancas->responsavellote, 0, strlen($cobrancas->responsavellote)-1))->first();
            }else{
                $cliente = DB::table('fornecedoresjur')->where('clijur_id', substr($cobrancas->responsavellote, 0, strlen($cobrancas->responsavellote)-1))->first();
            }
            $valor = 0;
            $fechados = count(DB::table('cobranca')->where('idlote', $cobrancas->idlote)->where('fechado', '1')->get());
            $validados = count(DB::table('cobranca')->where('idlote', $cobrancas->idlote)->where('pago', '1')->get());
            $valor = doubleval(DB::table('cobranca')->where('idlote', $cobrancas->idlote)->first()->valor);

            array_push($lotes[0],$cobrancas->idlote);
            array_push($lotes[1],$cliente->pac_nome . ' - ' . $cliente->pac_cpf);
            array_push($lotes[2],$cobrancas->contratolote);
            array_push($lotes[3],$cobrancas->quantidadelote);
            if($fechados == $cobrancas->quantidadelote){
                array_push($lotes[4],'Sim');
            }else{
                array_push($lotes[4],'Não');
            }
            if($validados == $cobrancas->quantidadelote){
                array_push($lotes[5],'Sim');
            }else{
                array_push($lotes[5],'Não');
            }
            array_push($lotes[6],$valor);
            array_push($lotes[7],0);
            array_push($lotes[8],'Lote');
        }

        $timezone = new \DateTimeZone('America/Sao_Paulo');
        $agora = new \DateTime('now', $timezone);
        $cobrancas = DB::table('cobranca')->where('idlote', $lotes[0])->where('data', '<=', $agora->format('Y-m-d'))->where('pago', '0')->get();
        $cobrancas2 = $cobrancas->map(function($obj){
            return (array) $obj;
        })->toArray();
        // dd($cobrancas2);
        return [$lotes,$cobrancas2];
    }

    public function DadosLote(Request $request){
        // dd($request->all());
        $contrato = DB::table('contratos')->select('cont_plano', 'cont_diapag')->where('cont_id', $request->contrato)->first();
        $plano = DB::table('planos')->select('plan_valor')->where('plan_id', $contrato->cont_plano)->first();
        $diapag = $contrato->cont_diapag;
        $valorplano = $plano->plan_valor;
        return array($diapag, $valorplano);
    }
    public function GerarRemessaAvulsa(Request $request){
        // dd($request->all());
        // dd(new \Carbon\Carbon());

        $cobranca = DB::table('cobranca')->select('contrato', 'data', 'valor', 'numero', 'idcobranca')->where('idcobranca', $request->cobrancaatual)->first();
        
        if(substr($cobranca->contrato, -2, 1) == '1'){
            $cliente = DB::table('pacientes')->select('pac_nome', 'pac_logradouro', 'pac_bairro', 'pac_cep', 'pac_uf', 'pac_cidade', 'pac_cpf', 'pac_num')->where('pac_id', substr($cobranca->contrato, 6, 8))->first();
            // dd($cliente);
            $pagador = new \Eduardokum\LaravelBoleto\Pessoa(
                [
                    'nome'      => $cliente->pac_nome,
                    'endereco'  => $cliente->pac_logradouro. ','. $cliente->pac_num,
                    'bairro'    => $cliente->pac_bairro,
                    'cep'       => $cliente->pac_cep,
                    'uf'        => $cliente->pac_uf,
                    'cidade'    => $cliente->pac_cidade,
                    'documento' => $cliente->pac_cpf,
                ]
            );
            
        }else if(substr($cobranca->contrato, -2, 1) == '2'){
            $cliente = DB::table('fornecedoresfis')->select('forfis_nome', 'forfis_logradouro', 'forfis_bairro', 'forfis_cep', 'forfis_uf', 'forfis_cidade', 'forfis_cpf', 'forfis_num')->where('forfis_id', substr($cobranca->contrato, 6, 8))->first();
            $pagador = new \Eduardokum\LaravelBoleto\Pessoa(
                [
                    'nome'      => $cliente->forfis_nome,
                    'endereco'  => $cliente->forfis_logradouro. ','. $cliente->forfis_num,
                    'bairro'    => $cliente->forfis_bairro,
                    'cep'       => $cliente->forfis_cep,
                    'uf'        => $cliente->forfis_uf,
                    'cidade'    => $cliente->forfis_cidade,
                    'documento' => $cliente->forfis_cpf,
                ]
            );
        }else if(substr($cobranca->contrato, -2, 1) == '3'){
            $cliente = DB::table('funcionarios')->select('func_nome', 'func_logradouro', 'func_bairro', 'func_cep', 'func_uf', 'func_cidade', 'func_cpf', 'func_num')->where('func_id', substr($cobranca->contrato, 6, 8))->first();
            $pagador = new \Eduardokum\LaravelBoleto\Pessoa(
                [
                    'nome'      => $cliente->func_nome,
                    'endereco'  => $cliente->func_logradouro . ','. $cliente->func_num,
                    'bairro'    => $cliente->func_bairro,
                    'cep'       => $cliente->func_cep,
                    'uf'        => $cliente->func_uf,
                    'cidade'    => $cliente->func_cidade,
                    'documento' => $cliente->func_cpf,
                ]
            );
        }else if(substr($cobranca->contrato, -2, 1) == '4'){
            $cliente = DB::table('clientesjur')->select('clijur_nome', 'clijur_logradouro', 'clijur_bairro', 'clijur_cep', 'clijur_uf', 'clijur_cidade', 'clijur_cpf', 'clijur_num')->where('clijur_id', substr($cobranca->contrato, 6, 8))->first();
            $pagador = new \Eduardokum\LaravelBoleto\Pessoa(
                [
                    'nome'      => $cliente->clijur_nome,
                    'endereco'  => $cliente->clijur_logradouro. ','. $cliente->clijur_num,
                    'bairro'    => $cliente->clijur_bairro,
                    'cep'       => $cliente->clijur_cep,
                    'uf'        => $cliente->clijur_uf,
                    'cidade'    => $cliente->clijur_cidade,
                    'documento' => $cliente->clijur_cpf,
                ]
            );
        }else{
            $cliente = DB::table('fornecedoresjur')->select('forjur_nome', 'forjur_logradouro', 'forjur_bairro', 'forjur_cep', 'forjur_uf', 'forjur_cidade', 'forjur_cpf', 'forjur_num')->where('forjur_id', substr($cobranca->contrato, 6, 8))->first();
            $pagador = new \Eduardokum\LaravelBoleto\Pessoa(
                [
                    'nome'      => $cliente->forjur_nome,
                    'endereco'  => $cliente->forjur_logradouro . ','. $cliente->forjur_num,
                    'bairro'    => $cliente->forjur_bairro,
                    'cep'       => $cliente->forjur_cep,
                    'uf'        => $cliente->forjur_uf,
                    'cidade'    => $cliente->forjur_cidade,
                    'documento' => $cliente->forjur_cpf,
                ]
            );
        }

        $beneficiario = new \Eduardokum\LaravelBoleto\Pessoa(
            [
                'nome'      => 'INSTITUTO RAIMUNDO NOBRE',
                'endereco'  => 'AV GAL OSORIO DE PAIVA, 205',
                'bairro'    => 'PARANGABA',
                'cep'       => '60040-080',
                'uf'        => 'CE',
                'cidade'    => 'FORTALEZA',
                'documento' => '16.644.616/0001-35',
            ]
        );

        $boleto = new \Eduardokum\LaravelBoleto\Boleto\Banco\Santander(
            [
                'codigoCliente'          => 1130110,
                'logo'                   => public_path().'/imagens/logosantander.png',
                'dataVencimento'         => Carbon::createMidnightDate(explode('-', $cobranca->data)[0], explode('-', $cobranca->data)[1], explode('-', $cobranca->data)[2], 'America/Sao_Paulo'),
                'valor'                  => $cobranca->valor,
                'multa'                  => false,
                'juros'                  => 1,
                'jurosApos'              => 1,
                'numero'                 => $cobranca->idcobranca ,
                'numeroDocumento'        => $cobranca->idcobranca ,
                'pagador'                => $pagador,
                'beneficiario'           => $beneficiario,
                'diasBaixaAutomatica'    => 15,
                'carteira'               => 101,
                'agencia'                => 3132,
                'conta'                  => 130091375,
                'descricaoDemonstrativo' => ['', '', ''],
                'instrucoes'             => ['', '', ''],
                'aceite'                 => 'S',
                'especieDoc'             => 'DM',
            ]
        );
        $remessa = new \Eduardokum\LaravelBoleto\Cnab\Remessa\Cnab400\Banco\Santander(
            [
                'agencia'       => 3132,
                'carteira'      => 101,
                'conta'         => 130091375,
                'codigoCliente' => 1130110,
                'beneficiario'  => $beneficiario,
            ]
        );

        $remessa->addBoletos([
            $boleto
        ]);

        $remessa->gerar();

        $nomeremessa = 'RemessaAvulsa' . $cobranca->contrato . '-' . explode('-', $cobranca->data)[0] . explode('-', $cobranca->data)[1] . explode('-', $cobranca->data)[2]. '.rem';

        $headers = array(
            'Content-Type: text/plain; charset=ansi',
          );

        $remessa->save(public_path() . '/remessas/' . $cobranca->contrato . '/' .$nomeremessa);
        $fechar = DB::table('cobranca')->where('idcobranca', $request->cobrancaatual)->update([
            'fechado' => 1
        ]);
        return response()->download(public_path() . '/remessas/' . $cobranca->contrato . '/' .$nomeremessa, $nomeremessa, $headers);
        // return $remessa->download($filename = $nomeremessa);
    }
    public function GerarRemessaLote(Request $request){
        // dd($request->all());
        // dd(new \Carbon\Carbon());

        $dadosboletos = [[],[],[],[],[]];

        $timezone = new \DateTimeZone('America/Sao_Paulo');
        $agora = new \DateTime('now', $timezone);
        $pagamento = new \DateTime('now', $timezone);
        $pagamento->setDate($agora->format('Y'), $agora->format('m'), $request->diapag);

        $cobranca = DB::table('cobranca')->select('contrato', 'data', 'valor', 'numero', 'idcobranca')->where('idlote', $request->cobrancaatual)->get();
        // dd($cobranca);

        foreach($cobranca as $cobranca){
            array_push($dadosboletos[0], $cobranca->contrato);
            array_push($dadosboletos[1], $cobranca->data);
            array_push($dadosboletos[2], $cobranca->valor);
            array_push($dadosboletos[3], $cobranca->numero);
            array_push($dadosboletos[4], $cobranca->idcobranca);
        }

        // dd($dadosboletos[2]);

        // dd($dadosboletos, $request->all());

        if(substr($dadosboletos[0][0], -2, 1) == '1'){
            $cliente = DB::table('pacientes')->select('pac_nome', 'pac_logradouro', 'pac_bairro', 'pac_cep', 'pac_uf', 'pac_cidade', 'pac_cpf', 'pac_num')->where('pac_id', substr($dadosboletos[0][0], 6, 8))->first();
            // dd($cliente);
            $pagador = new \Eduardokum\LaravelBoleto\Pessoa(
                [
                    'nome'      => $cliente->pac_nome,
                    'endereco'  => $cliente->pac_logradouro. ', '. $cliente->pac_num,
                    'bairro'    => $cliente->pac_bairro,
                    'cep'       => $cliente->pac_cep,
                    'uf'        => $cliente->pac_uf,
                    'cidade'    => $cliente->pac_cidade,
                    'documento' => $cliente->pac_cpf,
                ]
            );
            
        }else if(substr($dadosboletos[0][0], -2, 1) == '2'){
            $cliente = DB::table('fornecedoresfis')->select('forfis_nome', 'forfis_logradouro', 'forfis_bairro', 'forfis_cep', 'forfis_uf', 'forfis_cidade', 'forfis_cpf', 'forfis_num')->where('forfis_id', substr($dadosboletos[0][0], 6, 8))->first();
            $pagador = new \Eduardokum\LaravelBoleto\Pessoa(
                [
                    'nome'      => $cliente->forfis_nome,
                    'endereco'  => $cliente->forfis_logradouro. ', '. $cliente->forfis_num,
                    'bairro'    => $cliente->forfis_bairro,
                    'cep'       => $cliente->forfis_cep,
                    'uf'        => $cliente->forfis_uf,
                    'cidade'    => $cliente->forfis_cidade,
                    'documento' => $cliente->forfis_cpf,
                ]
            );
        }else if(substr($dadosboletos[0][0], -2, 1) == '3'){
            $cliente = DB::table('funcionarios')->select('func_nome', 'func_logradouro', 'func_bairro', 'func_cep', 'func_uf', 'func_cidade', 'func_cpf', 'func_num')->where('func_id', substr($dadosboletos[0][0], 6, 8))->first();
            $pagador = new \Eduardokum\LaravelBoleto\Pessoa(
                [
                    'nome'      => $cliente->func_nome,
                    'endereco'  => $cliente->func_logradouro . ', '. $cliente->func_num,
                    'bairro'    => $cliente->func_bairro,
                    'cep'       => $cliente->func_cep,
                    'uf'        => $cliente->func_uf,
                    'cidade'    => $cliente->func_cidade,
                    'documento' => $cliente->func_cpf,
                ]
            );
        }else if(substr($dadosboletos[0][0], -2, 1) == '4'){
            $cliente = DB::table('clientesjur')->select('clijur_nome', 'clijur_logradouro', 'clijur_bairro', 'clijur_cep', 'clijur_uf', 'clijur_cidade', 'clijur_cpf', 'clijur_num')->where('clijur_id', substr($dadosboletos[0][0], 6, 8))->first();
            $pagador = new \Eduardokum\LaravelBoleto\Pessoa(
                [
                    'nome'      => $cliente->clijur_nome,
                    'endereco'  => $cliente->clijur_logradouro. ', '. $cliente->clijur_num,
                    'bairro'    => $cliente->clijur_bairro,
                    'cep'       => $cliente->clijur_cep,
                    'uf'        => $cliente->clijur_uf,
                    'cidade'    => $cliente->clijur_cidade,
                    'documento' => $cliente->clijur_cpf,
                ]
            );
        }else{
            $cliente = DB::table('fornecedoresjur')->select('forjur_nome', 'forjur_logradouro', 'forjur_bairro', 'forjur_cep', 'forjur_uf', 'forjur_cidade', 'forjur_cpf', 'forjur_num')->where('forjur_id', substr($dadosboletos[0][0], 6, 8))->first();
            $pagador = new \Eduardokum\LaravelBoleto\Pessoa(
                [
                    'nome'      => $cliente->forjur_nome,
                    'endereco'  => $cliente->forjur_logradouro . ', '. $cliente->forjur_num,
                    'bairro'    => $cliente->forjur_bairro,
                    'cep'       => $cliente->forjur_cep,
                    'uf'        => $cliente->forjur_uf,
                    'cidade'    => $cliente->forjur_cidade,
                    'documento' => $cliente->forjur_cpf,
                ]
            );
        }

        $beneficiario = new \Eduardokum\LaravelBoleto\Pessoa(
            [
                'nome'      => 'INSTITUTO RAIMUNDO NOBRE',
                'endereco'  => 'AV GAL OSORIO DE PAIVA, 205',
                'bairro'    => 'PARANGABA',
                'cep'       => '60040-080',
                'uf'        => 'CE',
                'cidade'    => 'FORTALEZA',
                'documento' => '16.644.616/0001-35',
            ]
        );

        $boleto1 = new \Eduardokum\LaravelBoleto\Boleto\Banco\Santander(
            [
                'codigoCliente'          => 1130110,
                'logo'                   => public_path().'/imagens/logosantander.png',
                'dataVencimento'         => Carbon::createMidnightDate(explode('-', $dadosboletos[1][0])[0], explode('-', $dadosboletos[1][0])[1], explode('-', $dadosboletos[1][0])[2], 'America/Sao_Paulo'),
                'valor'                  => $dadosboletos[2][0],
                'multa'                  => false,
                'juros'                  => 1,
                'jurosApos'              => 1,
                'numero'                 => $dadosboletos[4][0] ,
                'numeroDocumento'        => $dadosboletos[4][0] ,
                'pagador'                => $pagador,
                'beneficiario'           => $beneficiario,
                'diasBaixaAutomatica'    => 15,
                'carteira'               => 101,
                'agencia'                => 3132,
                'conta'                  => 130091375,
                'descricaoDemonstrativo' => ['', '', ''],
                'instrucoes'             => ['', '', ''],
                'aceite'                 => 'S',
                'especieDoc'             => 'DM',
            ]
        );
        $boleto2 = new \Eduardokum\LaravelBoleto\Boleto\Banco\Santander(
            [
                'codigoCliente'          => 1130110,
                'logo'                   => public_path().'/imagens/logosantander.png',
                'dataVencimento'         => Carbon::createMidnightDate(explode('-', $dadosboletos[1][1])[0], explode('-', $dadosboletos[1][1])[1], explode('-', $dadosboletos[1][1])[2], 'America/Sao_Paulo'),
                'valor'                  => $dadosboletos[2][1],
                'multa'                  => false,
                'juros'                  => 1,
                'jurosApos'              => 1,
                'numero'                 => $dadosboletos[4][1] ,
                'numeroDocumento'        => $dadosboletos[4][1] ,
                'pagador'                => $pagador,
                'beneficiario'           => $beneficiario,
                'diasBaixaAutomatica'    => 15,
                'carteira'               => 101,
                'agencia'                => 3132,
                'conta'                  => 130091375,
                'descricaoDemonstrativo' => ['', '', ''],
                'instrucoes'             => ['', '', ''],
                'aceite'                 => 'S',
                'especieDoc'             => 'DM',
            ]
        );
        $boleto3 = new \Eduardokum\LaravelBoleto\Boleto\Banco\Santander(
            [
                'codigoCliente'          => 1130110,
                'logo'                   => public_path().'/imagens/logosantander.png',
                'dataVencimento'         => Carbon::createMidnightDate(explode('-', $dadosboletos[1][2])[0], explode('-', $dadosboletos[1][2])[1], explode('-', $dadosboletos[1][2])[2], 'America/Sao_Paulo'),
                'valor'                  => $dadosboletos[2][2],
                'multa'                  => false,
                'juros'                  => 1,
                'jurosApos'              => 1,
                'numero'                 => $dadosboletos[4][2] ,
                'numeroDocumento'        => $dadosboletos[4][2] ,
                'pagador'                => $pagador,
                'beneficiario'           => $beneficiario,
                'diasBaixaAutomatica'    => 15,
                'carteira'               => 101,
                'agencia'                => 3132,
                'conta'                  => 130091375,
                'descricaoDemonstrativo' => ['', '', ''],
                'instrucoes'             => ['', '', ''],
                'aceite'                 => 'S',
                'especieDoc'             => 'DM',
            ]
        );
        $boleto4 = new \Eduardokum\LaravelBoleto\Boleto\Banco\Santander(
            [
                'codigoCliente'          => 1130110,
                'logo'                   => public_path().'/imagens/logosantander.png',
                'dataVencimento'         => Carbon::createMidnightDate(explode('-', $dadosboletos[1][3])[0], explode('-', $dadosboletos[1][3])[1], explode('-', $dadosboletos[1][3])[2], 'America/Sao_Paulo'),
                'valor'                  => $dadosboletos[2][3],
                'multa'                  => false,
                'juros'                  => 1,
                'jurosApos'              => 1,
                'numero'                 => $dadosboletos[4][3] ,
                'numeroDocumento'        => $dadosboletos[4][3] ,
                'pagador'                => $pagador,
                'beneficiario'           => $beneficiario,
                'diasBaixaAutomatica'    => 15,
                'carteira'               => 101,
                'agencia'                => 3132,
                'conta'                  => 130091375,
                'descricaoDemonstrativo' => ['', '', ''],
                'instrucoes'             => ['', '', ''],
                'aceite'                 => 'S',
                'especieDoc'             => 'DM',
            ]
        );
        $boleto5 = new \Eduardokum\LaravelBoleto\Boleto\Banco\Santander(
            [
                'codigoCliente'          => 1130110,
                'logo'                   => public_path().'/imagens/logosantander.png',
                'dataVencimento'         => Carbon::createMidnightDate(explode('-', $dadosboletos[1][4])[0], explode('-', $dadosboletos[1][4])[1], explode('-', $dadosboletos[1][4])[2], 'America/Sao_Paulo'),
                'valor'                  => $dadosboletos[2][4],
                'multa'                  => false,
                'juros'                  => 1,
                'jurosApos'              => 1,
                'numero'                 => $dadosboletos[4][4] ,
                'numeroDocumento'        => $dadosboletos[4][4] ,
                'pagador'                => $pagador,
                'beneficiario'           => $beneficiario,
                'diasBaixaAutomatica'    => 15,
                'carteira'               => 101,
                'agencia'                => 3132,
                'conta'                  => 130091375,
                'descricaoDemonstrativo' => ['', '', ''],
                'instrucoes'             => ['', '', ''],
                'aceite'                 => 'S',
                'especieDoc'             => 'DM',
            ]
        );
        $boleto6 = new \Eduardokum\LaravelBoleto\Boleto\Banco\Santander(
            [
                'codigoCliente'          => 1130110,
                'logo'                   => public_path().'/imagens/logosantander.png',
                'dataVencimento'         => Carbon::createMidnightDate(explode('-', $dadosboletos[1][5])[0], explode('-', $dadosboletos[1][5])[1], explode('-', $dadosboletos[1][5])[2], 'America/Sao_Paulo'),
                'valor'                  => $dadosboletos[2][5],
                'multa'                  => false,
                'juros'                  => 1,
                'jurosApos'              => 1,
                'numero'                 => $dadosboletos[4][5] ,
                'numeroDocumento'        => $dadosboletos[4][5] ,
                'pagador'                => $pagador,
                'beneficiario'           => $beneficiario,
                'diasBaixaAutomatica'    => 15,
                'carteira'               => 101,
                'agencia'                => 3132,
                'conta'                  => 130091375,
                'descricaoDemonstrativo' => ['', '', ''],
                'instrucoes'             => ['', '', ''],
                'aceite'                 => 'S',
                'especieDoc'             => 'DM',
            ]
        );
        $boleto7 = new \Eduardokum\LaravelBoleto\Boleto\Banco\Santander(
            [
                'codigoCliente'          => 1130110,
                'logo'                   => public_path().'/imagens/logosantander.png',
                'dataVencimento'         => Carbon::createMidnightDate(explode('-', $dadosboletos[1][6])[0], explode('-', $dadosboletos[1][6])[1], explode('-', $dadosboletos[1][6])[2], 'America/Sao_Paulo'),
                'valor'                  => $dadosboletos[2][6],
                'multa'                  => false,
                'juros'                  => 1,
                'jurosApos'              => 1,
                'numero'                 => $dadosboletos[4][6] ,
                'numeroDocumento'        => $dadosboletos[4][6] ,
                'pagador'                => $pagador,
                'beneficiario'           => $beneficiario,
                'diasBaixaAutomatica'    => 15,
                'carteira'               => 101,
                'agencia'                => 3132,
                'conta'                  => 130091375,
                'descricaoDemonstrativo' => ['', '', ''],
                'instrucoes'             => ['', '', ''],
                'aceite'                 => 'S',
                'especieDoc'             => 'DM',
            ]
        );
        $boleto8 = new \Eduardokum\LaravelBoleto\Boleto\Banco\Santander(
            [
                'codigoCliente'          => 1130110,
                'logo'                   => public_path().'/imagens/logosantander.png',
                'dataVencimento'         => Carbon::createMidnightDate(explode('-', $dadosboletos[1][7])[0], explode('-', $dadosboletos[1][7])[1], explode('-', $dadosboletos[1][7])[2], 'America/Sao_Paulo'),
                'valor'                  => $dadosboletos[2][7],
                'multa'                  => false,
                'juros'                  => 1,
                'jurosApos'              => 1,
                'numero'                 => $dadosboletos[4][7] ,
                'numeroDocumento'        => $dadosboletos[4][7] ,
                'pagador'                => $pagador,
                'beneficiario'           => $beneficiario,
                'diasBaixaAutomatica'    => 15,
                'carteira'               => 101,
                'agencia'                => 3132,
                'conta'                  => 130091375,
                'descricaoDemonstrativo' => ['', '', ''],
                'instrucoes'             => ['', '', ''],
                'aceite'                 => 'S',
                'especieDoc'             => 'DM',
            ]
        );
        $boleto9 = new \Eduardokum\LaravelBoleto\Boleto\Banco\Santander(
            [
                'codigoCliente'          => 1130110,
                'logo'                   => public_path().'/imagens/logosantander.png',
                'dataVencimento'         => Carbon::createMidnightDate(explode('-', $dadosboletos[1][8])[0], explode('-', $dadosboletos[1][8])[1], explode('-', $dadosboletos[1][8])[2], 'America/Sao_Paulo'),
                'valor'                  => $dadosboletos[2][8],
                'multa'                  => false,
                'juros'                  => 1,
                'jurosApos'              => 1,
                'numero'                 => $dadosboletos[4][8] ,
                'numeroDocumento'        => $dadosboletos[4][8] ,
                'pagador'                => $pagador,
                'beneficiario'           => $beneficiario,
                'diasBaixaAutomatica'    => 15,
                'carteira'               => 101,
                'agencia'                => 3132,
                'conta'                  => 130091375,
                'descricaoDemonstrativo' => ['', '', ''],
                'instrucoes'             => ['', '', ''],
                'aceite'                 => 'S',
                'especieDoc'             => 'DM',
            ]
        );
        $boleto10 = new \Eduardokum\LaravelBoleto\Boleto\Banco\Santander(
            [
                'codigoCliente'          => 1130110,
                'logo'                   => public_path().'/imagens/logosantander.png',
                'dataVencimento'         => Carbon::createMidnightDate(explode('-', $dadosboletos[1][9])[0], explode('-', $dadosboletos[1][9])[1], explode('-', $dadosboletos[1][9])[2], 'America/Sao_Paulo'),
                'valor'                  => $dadosboletos[2][9],
                'multa'                  => false,
                'juros'                  => 1,
                'jurosApos'              => 1,
                'numero'                 => $dadosboletos[4][9] ,
                'numeroDocumento'        => $dadosboletos[4][9] ,
                'pagador'                => $pagador,
                'beneficiario'           => $beneficiario,
                'diasBaixaAutomatica'    => 15,
                'carteira'               => 101,
                'agencia'                => 3132,
                'conta'                  => 130091375,
                'descricaoDemonstrativo' => ['', '', ''],
                'instrucoes'             => ['', '', ''],
                'aceite'                 => 'S',
                'especieDoc'             => 'DM',
            ]
        );
        $boleto11 = new \Eduardokum\LaravelBoleto\Boleto\Banco\Santander(
            [
                'codigoCliente'          => 1130110,
                'logo'                   => public_path().'/imagens/logosantander.png',
                'dataVencimento'         => Carbon::createMidnightDate(explode('-', $dadosboletos[1][10])[0], explode('-', $dadosboletos[1][10])[1], explode('-', $dadosboletos[1][10])[2], 'America/Sao_Paulo'),
                'valor'                  => $dadosboletos[2][10],
                'multa'                  => false,
                'juros'                  => 1,
                'jurosApos'              => 1,
                'numero'                 => $dadosboletos[4][10] ,
                'numeroDocumento'        => $dadosboletos[4][10] ,
                'pagador'                => $pagador,
                'beneficiario'           => $beneficiario,
                'diasBaixaAutomatica'    => 15,
                'carteira'               => 101,
                'agencia'                => 3132,
                'conta'                  => 130091375,
                'descricaoDemonstrativo' => ['', '', ''],
                'instrucoes'             => ['', '', ''],
                'aceite'                 => 'S',
                'especieDoc'             => 'DM',
            ]
        );
        $boleto12 = new \Eduardokum\LaravelBoleto\Boleto\Banco\Santander(
            [
                'codigoCliente'          => 1130110,
                'logo'                   => public_path().'/imagens/logosantander.png',
                'dataVencimento'         => Carbon::createMidnightDate(explode('-', $dadosboletos[1][11])[0], explode('-', $dadosboletos[1][11])[1], explode('-', $dadosboletos[1][11])[2], 'America/Sao_Paulo'),
                'valor'                  => $dadosboletos[2][11],
                'multa'                  => false,
                'juros'                  => 1,
                'jurosApos'              => 1,
                'numero'                 => $dadosboletos[4][11] ,
                'numeroDocumento'        => $dadosboletos[4][11] ,
                'pagador'                => $pagador,
                'beneficiario'           => $beneficiario,
                'diasBaixaAutomatica'    => 15,
                'carteira'               => 101,
                'agencia'                => 3132,
                'conta'                  => 130091375,
                'descricaoDemonstrativo' => ['', '', ''],
                'instrucoes'             => ['', '', ''],
                'aceite'                 => 'S',
                'especieDoc'             => 'DM',
            ]
        );
        $remessa = new \Eduardokum\LaravelBoleto\Cnab\Remessa\Cnab400\Banco\Santander(
            [
                'agencia'       => 3132,
                'carteira'      => 101,
                'conta'         => 130091375,
                'codigoCliente' => 1130110,
                'beneficiario'  => $beneficiario,
            ]
        );

        $remessa->addBoletos([
            $boleto1,
            $boleto2,
            $boleto3,
            $boleto4,
            $boleto5,
            $boleto6,
            $boleto7,
            $boleto8,
            $boleto9,
            $boleto10,
            $boleto11,
            $boleto12,
        ]);

        $remessa->gerar();

        $nomeremessa = 'RemessaLote' . $dadosboletos[0][0] . '-' . explode('-', $dadosboletos[1][0])[0] . explode('-', $dadosboletos[1][0])[1] . explode('-', $dadosboletos[1][0])[2]. '.rem';

        $headers = array(
            'Content-Type: text/plain; charset=ansi',
          );

        $remessa->save(public_path() . '/remessas/' . $dadosboletos[0][0] . '/' .$nomeremessa);
        $fechar = DB::table('cobranca')->where('idlote', $request->cobrancaatual)->update([
            'fechado' => 1
        ]);

        $cobrancageradolote = DB::table('cobrancalote')->where('idlote', $request->cobrancaatual)->update([
            'fechadolote' => 1
        ]);
        
        return response()->download(public_path() . '/remessas/' . $cobranca->contrato . '/' .$nomeremessa, $nomeremessa, $headers);
        // return $remessa->download($filename = $nomeremessa);
    }

    public function GerarBoletoAvulso(Request $request){
        // dd($request->all());
        // dd(new \Carbon\Carbon());

        $cobranca = DB::table('cobranca')->select('contrato', 'data', 'valor', 'numero', 'idcobranca')->where('idcobranca', $request->cobrancaatual)->first();
        
        if(substr($cobranca->contrato, -2, 1) == '1'){
            $cliente = DB::table('pacientes')->select('pac_nome', 'pac_logradouro', 'pac_bairro', 'pac_cep', 'pac_uf', 'pac_cidade', 'pac_cpf', 'pac_num', 'pac_complemento')->where('pac_id', substr($cobranca->contrato, 6, 8))->first();
            // dd($cliente);
            $pagador = new \Eduardokum\LaravelBoleto\Pessoa(
                [
                    'nome'      => $cliente->pac_nome,
                    'endereco'  => $cliente->pac_logradouro. ','. $cliente->pac_num . ' - ' . $cliente->pac_bairro . ' - '. $cliente->pac_complemento,
                    'bairro'    => $cliente->pac_bairro,
                    'cep'       => $cliente->pac_cep,
                    'uf'        => $cliente->pac_uf,
                    'cidade'    => $cliente->pac_cidade,
                    'documento' => $cliente->pac_cpf,
                ]
            );
            
        }else if(substr($cobranca->contrato, -2, 1) == '2'){
            $cliente = DB::table('fornecedoresfis')->select('forfis_nome', 'forfis_logradouro', 'forfis_bairro', 'forfis_cep', 'forfis_uf', 'forfis_cidade', 'forfis_cpf', 'forfis_num', 'forfis_complemento')->where('forfis_id', substr($cobranca->contrato, 6, 8))->first();
            $pagador = new \Eduardokum\LaravelBoleto\Pessoa(
                [
                    'nome'      => $cliente->forfis_nome,
                    'endereco'  => $cliente->forfis_logradouro. ','. $cliente->forfis_num . ' - ' .$cliente->forfis_bairro . ' - '. $cliente->forfis_complemento,
                    'bairro'    => $cliente->forfis_bairro,
                    'cep'       => $cliente->forfis_cep,
                    'uf'        => $cliente->forfis_uf,
                    'cidade'    => $cliente->forfis_cidade,
                    'documento' => $cliente->forfis_cpf,
                ]
            );
        }else if(substr($cobranca->contrato, -2, 1) == '3'){
            $cliente = DB::table('funcionarios')->select('func_nome', 'func_logradouro', 'func_bairro', 'func_cep', 'func_uf', 'func_cidade', 'func_cpf', 'func_num', 'func_complemento')->where('func_id', substr($cobranca->contrato, 6, 8))->first();
            $pagador = new \Eduardokum\LaravelBoleto\Pessoa(
                [
                    'nome'      => $cliente->func_nome,
                    'endereco'  => $cliente->func_logradouro . ','. $cliente->func_num . ' - ' . $cliente->func_bairro . ' - '. $cliente->func_complemento,
                    'bairro'    => $cliente->func_bairro,
                    'cep'       => $cliente->func_cep,
                    'uf'        => $cliente->func_uf,
                    'cidade'    => $cliente->func_cidade,
                    'documento' => $cliente->func_cpf,
                ]
            );
        }else if(substr($cobranca->contrato, -2, 1) == '4'){
            $cliente = DB::table('clientesjur')->select('clijur_nome', 'clijur_logradouro', 'clijur_bairro', 'clijur_cep', 'clijur_uf', 'clijur_cidade', 'clijur_cpf', 'clijur_num', 'clijur_complemento')->where('clijur_id', substr($cobranca->contrato, 6, 8))->first();
            $pagador = new \Eduardokum\LaravelBoleto\Pessoa(
                [
                    'nome'      => $cliente->clijur_nome,
                    'endereco'  => $cliente->clijur_logradouro. ','. $cliente->clijur_num. ' - ' .$cliente->clijur_bairro . ' - '. $cliente->clijur_complemento,
                    'bairro'    => $cliente->clijur_bairro,
                    'cep'       => $cliente->clijur_cep,
                    'uf'        => $cliente->clijur_uf,
                    'cidade'    => $cliente->clijur_cidade,
                    'documento' => $cliente->clijur_cpf,
                ]
            );
        }else{
            $cliente = DB::table('fornecedoresjur')->select('forjur_nome', 'forjur_logradouro', 'forjur_bairro', 'forjur_cep', 'forjur_uf', 'forjur_cidade', 'forjur_cpf', 'forjur_num', 'forjur_complemento')->where('forjur_id', substr($cobranca->contrato, 6, 8))->first();
            $pagador = new \Eduardokum\LaravelBoleto\Pessoa(
                [
                    'nome'      => $cliente->forjur_nome,
                    'endereco'  => $cliente->forjur_logradouro . ','. $cliente->forjur_num . ' - ' . $cliente->forjur_bairro . ' - '. $cliente->forjur_complemento,
                    'bairro'    => $cliente->forjur_bairro,
                    'cep'       => $cliente->forjur_cep,
                    'uf'        => $cliente->forjur_uf,
                    'cidade'    => $cliente->forjur_cidade,
                    'documento' => $cliente->forjur_cpf,
                ]
            );
        }

        $beneficiario = new \Eduardokum\LaravelBoleto\Pessoa(
            [
                'nome'      => 'INSTITUTO RAIMUNDO NOBRE',
                'endereco'  => 'AV GAL OSORIO DE PAIVA, 205',
                'bairro'    => 'PARANGABA',
                'cep'       => '60040-080',
                'uf'        => 'CE',
                'cidade'    => 'FORTALEZA',
                'documento' => '16.644.616/0001-35',
            ]
        );

        $boleto = new \Eduardokum\LaravelBoleto\Boleto\Banco\Santander(
            [
                'codigoCliente'          => 1130110,
                'logo'                   => public_path().'/imagens/logosantander.png',
                'dataVencimento'         => Carbon::createMidnightDate(explode('-', $cobranca->data)[0], explode('-', $cobranca->data)[1], explode('-', $cobranca->data)[2], 'America/Sao_Paulo'),
                'valor'                  => $cobranca->valor,
                'multa'                  => false,
                'juros'                  => 1,
                'jurosApos'              => 1,
                'numero'                 => $cobranca->idcobranca ,
                'numeroDocumento'        => $cobranca->idcobranca ,
                'pagador'                => $pagador,
                'beneficiario'           => $beneficiario,
                'diasBaixaAutomatica'    => 15,
                'carteira'               => 101,
                'agencia'                => 3132,
                'conta'                  => 130091375,
                'descricaoDemonstrativo' => ['', '', ''],
                'instrucoes'             => ['', '', ''],
                'aceite'                 => 'S',
                'especieDoc'             => 'DM',
            ]
        );

        $pdf = new \Eduardokum\LaravelBoleto\Boleto\Render\Pdf();
        $pdf->addBoleto($boleto);

        // dd($beneficiario, $pagador, $boleto, $remessa);
        // return $boleto->renderPDF(true);
        $nomeboleto = 'Boleto' . $cobranca->contrato . '-' . explode('-', $cobranca->data)[0] . explode('-', $cobranca->data)[1] . explode('-', $cobranca->data)[2]. '.pdf';
        $pdf->gerarBoleto($pdf::OUTPUT_SAVE,storage_path('app/boletos').$nomeboleto);
        $file = storage_path('app/boletos').$nomeboleto;
        $filename = $nomeboleto; /* Note: Always use .pdf at the end. */

        header('Content-type: application/pdf');
        header('Content-Disposition: inline; filename="' . $filename . '"');
        header('Content-Transfer-Encoding: binary');
        header('Content-Length: ' . filesize($file));
        header('Accept-Ranges: bytes');

        // return $remessa->download();
        return readfile($file);
    }

    public function GerarBoletoLote(Request $request){
        // dd($request->all());
        // dd(new \Carbon\Carbon());

        $dadosboletos = [[],[],[],[],[]];

        $timezone = new \DateTimeZone('America/Sao_Paulo');
        $agora = new \DateTime('now', $timezone);
        $pagamento = new \DateTime('now', $timezone);
        $pagamento->setDate($agora->format('Y'), $agora->format('m'), $request->diapag);

        $cobranca = DB::table('cobranca')->select('contrato', 'data', 'valor', 'numero', 'idcobranca')->where('idlote', $request->cobrancaatual)->get();
        // dd($cobranca);

        foreach($cobranca as $cobranca){
            array_push($dadosboletos[0], $cobranca->contrato);
            array_push($dadosboletos[1], $cobranca->data);
            array_push($dadosboletos[2], $cobranca->valor);
            array_push($dadosboletos[3], $cobranca->numero);
            array_push($dadosboletos[4], $cobranca->idcobranca);
        }

        // dd($dadosboletos, $request->all());

        if(substr($dadosboletos[0][0], -2, 1) == '1'){
            $cliente = DB::table('pacientes')->select('pac_id','pac_nome', 'pac_logradouro', 'pac_bairro', 'pac_cep', 'pac_uf', 'pac_cidade', 'pac_cpf', 'pac_num', 'pac_complemento')->where('pac_id', substr($dadosboletos[0][0], 6, 8))->first();
            // dd($cliente);
            $pagador = new \Eduardokum\LaravelBoleto\Pessoa(
                [
                    'nome'      => $cliente->pac_nome,
                    'endereco'  => $cliente->pac_logradouro. ', '. $cliente->pac_num . ' - ' .$cliente->pac_bairro . ' - '. $cliente->pac_complemento,
                    'bairro'    => $cliente->pac_bairro,
                    'cep'       => $cliente->pac_cep,
                    'uf'        => $cliente->pac_uf,
                    'cidade'    => $cliente->pac_cidade,
                    'documento' => $cliente->pac_cpf,
                ]
            );
            
        }else if(substr($dadosboletos[0][0], -2, 1) == '2'){
            $cliente = DB::table('fornecedoresfis')->select('forfis_nome', 'forfis_logradouro', 'forfis_bairro', 'forfis_cep', 'forfis_uf', 'forfis_cidade', 'forfis_cpf', 'forfis_num', 'forfis_complemento')->where('forfis_id', substr($dadosboletos[0][0], 6, 8))->first();
            $pagador = new \Eduardokum\LaravelBoleto\Pessoa(
                [
                    'nome'      => $cliente->forfis_nome,
                    'endereco'  => $cliente->forfis_logradouro. ', '. $cliente->forfis_num . ' - ' .$cliente->forfis_bairro . ' - '. $cliente->forfis_complemento,
                    'bairro'    => $cliente->forfis_bairro,
                    'cep'       => $cliente->forfis_cep,
                    'uf'        => $cliente->forfis_uf,
                    'cidade'    => $cliente->forfis_cidade,
                    'documento' => $cliente->forfis_cpf,
                ]
            );
        }else if(substr($dadosboletos[0][0], -2, 1) == '3'){
            $cliente = DB::table('funcionarios')->select('func_nome', 'func_logradouro', 'func_bairro', 'func_cep', 'func_uf', 'func_cidade', 'func_cpf', 'func_num', 'func_complemento')->where('func_id', substr($dadosboletos[0][0], 6, 8))->first();
            $pagador = new \Eduardokum\LaravelBoleto\Pessoa(
                [
                    'nome'      => $cliente->func_nome,
                    'endereco'  => $cliente->func_logradouro . ', '. $cliente->func_num . ' - ' .$cliente->func_bairro . ' - '. $cliente->func_complemento,
                    'bairro'    => $cliente->func_bairro,
                    'cep'       => $cliente->func_cep,
                    'uf'        => $cliente->func_uf,
                    'cidade'    => $cliente->func_cidade,
                    'documento' => $cliente->func_cpf,
                ]
            );
        }else if(substr($dadosboletos[0][0], -2, 1) == '4'){
            $cliente = DB::table('clientesjur')->select('clijur_nome', 'clijur_logradouro', 'clijur_bairro', 'clijur_cep', 'clijur_uf', 'clijur_cidade', 'clijur_cpf', 'clijur_num', 'clijur_complemento')->where('clijur_id', substr($dadosboletos[0][0], 6, 8))->first();
            $pagador = new \Eduardokum\LaravelBoleto\Pessoa(
                [
                    'nome'      => $cliente->clijur_nome,
                    'endereco'  => $cliente->clijur_logradouro. ', '. $cliente->clijur_num . ' - ' .$cliente->clijur_bairro . ' - '. $cliente->clijur_complemento,
                    'bairro'    => $cliente->clijur_bairro,
                    'cep'       => $cliente->clijur_cep,
                    'uf'        => $cliente->clijur_uf,
                    'cidade'    => $cliente->clijur_cidade,
                    'documento' => $cliente->clijur_cpf,
                ]
            );
        }else{
            $cliente = DB::table('fornecedoresjur')->select('forjur_nome', 'forjur_logradouro', 'forjur_bairro', 'forjur_cep', 'forjur_uf', 'forjur_cidade', 'forjur_cpf', 'forjur_num','forjur_complemento')->where('forjur_id', substr($dadosboletos[0][0], 6, 8))->first();
            $pagador = new \Eduardokum\LaravelBoleto\Pessoa(
                [
                    'nome'      => $cliente->forjur_nome,
                    'endereco'  => $cliente->forjur_logradouro . ', '. $cliente->forjur_num . ' - ' .$cliente->forjur_bairro . ' - '. $cliente->forjur_complemento,
                    'bairro'    => $cliente->forjur_bairro,
                    'cep'       => $cliente->forjur_cep,
                    'uf'        => $cliente->forjur_uf,
                    'cidade'    => $cliente->forjur_cidade,
                    'documento' => $cliente->forjur_cpf,
                ]
            );
        }

        $beneficiario = new \Eduardokum\LaravelBoleto\Pessoa(
            [
                'nome'      => 'INSTITUTO RAIMUNDO NOBRE',
                'endereco'  => 'AV GAL OSORIO DE PAIVA, 205',
                'bairro'    => 'PARANGABA',
                'cep'       => '60040-080',
                'uf'        => 'CE',
                'cidade'    => 'FORTALEZA',
                'documento' => '16.644.616/0001-35',
            ]
        );

        $boleto1 = new \Eduardokum\LaravelBoleto\Boleto\Banco\Santander(
            [
                'codigoCliente'          => 1130110,
                'logo'                   => public_path().'/imagens/logosantander.png',
                'dataVencimento'         => Carbon::createMidnightDate(explode('-', $dadosboletos[1][0])[0], explode('-', $dadosboletos[1][0])[1], explode('-', $dadosboletos[1][0])[2], 'America/Sao_Paulo'),
                'valor'                  => $dadosboletos[2][0],
                'multa'                  => false,
                'juros'                  => 1,
                'jurosApos'              => 1,
                'numero'                 => $dadosboletos[4][0] ,
                'numeroDocumento'        => $dadosboletos[4][0] ,
                'pagador'                => $pagador,
                'beneficiario'           => $beneficiario,
                'diasBaixaAutomatica'    => 15,
                'carteira'               => 101,
                'agencia'                => 3132,
                'conta'                  => 130091375,
                'descricaoDemonstrativo' => ['', '', ''],
                'instrucoes'             => ['', '', ''],
                'aceite'                 => 'S',
                'especieDoc'             => 'DM',
            ]
        );
        $boleto2 = new \Eduardokum\LaravelBoleto\Boleto\Banco\Santander(
            [
                'codigoCliente'          => 1130110,
                'logo'                   => public_path().'/imagens/logosantander.png',
                'dataVencimento'         => Carbon::createMidnightDate(explode('-', $dadosboletos[1][1])[0], explode('-', $dadosboletos[1][1])[1], explode('-', $dadosboletos[1][1])[2], 'America/Sao_Paulo'),
                'valor'                  => $dadosboletos[2][1],
                'multa'                  => false,
                'juros'                  => 1,
                'jurosApos'              => 1,
                'numero'                 => $dadosboletos[4][1] ,
                'numeroDocumento'        => $dadosboletos[4][1] ,
                'pagador'                => $pagador,
                'beneficiario'           => $beneficiario,
                'diasBaixaAutomatica'    => 15,
                'carteira'               => 101,
                'agencia'                => 3132,
                'conta'                  => 130091375,
                'descricaoDemonstrativo' => ['', '', ''],
                'instrucoes'             => ['', '', ''],
                'aceite'                 => 'S',
                'especieDoc'             => 'DM',
            ]
        );
        $boleto3 = new \Eduardokum\LaravelBoleto\Boleto\Banco\Santander(
            [
                'codigoCliente'          => 1130110,
                'logo'                   => public_path().'/imagens/logosantander.png',
                'dataVencimento'         => Carbon::createMidnightDate(explode('-', $dadosboletos[1][2])[0], explode('-', $dadosboletos[1][2])[1], explode('-', $dadosboletos[1][2])[2], 'America/Sao_Paulo'),
                'valor'                  => $dadosboletos[2][2],
                'multa'                  => false,
                'juros'                  => 1,
                'jurosApos'              => 1,
                'numero'                 => $dadosboletos[4][2] ,
                'numeroDocumento'        => $dadosboletos[4][2] ,
                'pagador'                => $pagador,
                'beneficiario'           => $beneficiario,
                'diasBaixaAutomatica'    => 15,
                'carteira'               => 101,
                'agencia'                => 3132,
                'conta'                  => 130091375,
                'descricaoDemonstrativo' => ['', '', ''],
                'instrucoes'             => ['', '', ''],
                'aceite'                 => 'S',
                'especieDoc'             => 'DM',
            ]
        );
        $boleto4 = new \Eduardokum\LaravelBoleto\Boleto\Banco\Santander(
            [
                'codigoCliente'          => 1130110,
                'logo'                   => public_path().'/imagens/logosantander.png',
                'dataVencimento'         => Carbon::createMidnightDate(explode('-', $dadosboletos[1][3])[0], explode('-', $dadosboletos[1][3])[1], explode('-', $dadosboletos[1][3])[2], 'America/Sao_Paulo'),
                'valor'                  => $dadosboletos[2][3],
                'multa'                  => false,
                'juros'                  => 1,
                'jurosApos'              => 1,
                'numero'                 => $dadosboletos[4][3] ,
                'numeroDocumento'        => $dadosboletos[4][3] ,
                'pagador'                => $pagador,
                'beneficiario'           => $beneficiario,
                'diasBaixaAutomatica'    => 15,
                'carteira'               => 101,
                'agencia'                => 3132,
                'conta'                  => 130091375,
                'descricaoDemonstrativo' => ['', '', ''],
                'instrucoes'             => ['', '', ''],
                'aceite'                 => 'S',
                'especieDoc'             => 'DM',
            ]
        );
        $boleto5 = new \Eduardokum\LaravelBoleto\Boleto\Banco\Santander(
            [
                'codigoCliente'          => 1130110,
                'logo'                   => public_path().'/imagens/logosantander.png',
                'dataVencimento'         => Carbon::createMidnightDate(explode('-', $dadosboletos[1][4])[0], explode('-', $dadosboletos[1][4])[1], explode('-', $dadosboletos[1][4])[2], 'America/Sao_Paulo'),
                'valor'                  => $dadosboletos[2][4],
                'multa'                  => false,
                'juros'                  => 1,
                'jurosApos'              => 1,
                'numero'                 => $dadosboletos[4][4] ,
                'numeroDocumento'        => $dadosboletos[4][4] ,
                'pagador'                => $pagador,
                'beneficiario'           => $beneficiario,
                'diasBaixaAutomatica'    => 15,
                'carteira'               => 101,
                'agencia'                => 3132,
                'conta'                  => 130091375,
                'descricaoDemonstrativo' => ['', '', ''],
                'instrucoes'             => ['', '', ''],
                'aceite'                 => 'S',
                'especieDoc'             => 'DM',
            ]
        );
        $boleto6 = new \Eduardokum\LaravelBoleto\Boleto\Banco\Santander(
            [
                'codigoCliente'          => 1130110,
                'logo'                   => public_path().'/imagens/logosantander.png',
                'dataVencimento'         => Carbon::createMidnightDate(explode('-', $dadosboletos[1][5])[0], explode('-', $dadosboletos[1][5])[1], explode('-', $dadosboletos[1][5])[2], 'America/Sao_Paulo'),
                'valor'                  => $dadosboletos[2][5],
                'multa'                  => false,
                'juros'                  => 1,
                'jurosApos'              => 1,
                'numero'                 => $dadosboletos[4][5] ,
                'numeroDocumento'        => $dadosboletos[4][5] ,
                'pagador'                => $pagador,
                'beneficiario'           => $beneficiario,
                'diasBaixaAutomatica'    => 15,
                'carteira'               => 101,
                'agencia'                => 3132,
                'conta'                  => 130091375,
                'descricaoDemonstrativo' => ['', '', ''],
                'instrucoes'             => ['', '', ''],
                'aceite'                 => 'S',
                'especieDoc'             => 'DM',
            ]
        );
        $boleto7 = new \Eduardokum\LaravelBoleto\Boleto\Banco\Santander(
            [
                'codigoCliente'          => 1130110,
                'logo'                   => public_path().'/imagens/logosantander.png',
                'dataVencimento'         => Carbon::createMidnightDate(explode('-', $dadosboletos[1][6])[0], explode('-', $dadosboletos[1][6])[1], explode('-', $dadosboletos[1][6])[2], 'America/Sao_Paulo'),
                'valor'                  => $dadosboletos[2][6],
                'multa'                  => false,
                'juros'                  => 1,
                'jurosApos'              => 1,
                'numero'                 => $dadosboletos[4][6] ,
                'numeroDocumento'        => $dadosboletos[4][6] ,
                'pagador'                => $pagador,
                'beneficiario'           => $beneficiario,
                'diasBaixaAutomatica'    => 15,
                'carteira'               => 101,
                'agencia'                => 3132,
                'conta'                  => 130091375,
                'descricaoDemonstrativo' => ['', '', ''],
                'instrucoes'             => ['', '', ''],
                'aceite'                 => 'S',
                'especieDoc'             => 'DM',
            ]
        );
        $boleto8 = new \Eduardokum\LaravelBoleto\Boleto\Banco\Santander(
            [
                'codigoCliente'          => 1130110,
                'logo'                   => public_path().'/imagens/logosantander.png',
                'dataVencimento'         => Carbon::createMidnightDate(explode('-', $dadosboletos[1][7])[0], explode('-', $dadosboletos[1][7])[1], explode('-', $dadosboletos[1][7])[2], 'America/Sao_Paulo'),
                'valor'                  => $dadosboletos[2][7],
                'multa'                  => false,
                'juros'                  => 1,
                'jurosApos'              => 1,
                'numero'                 => $dadosboletos[4][7] ,
                'numeroDocumento'        => $dadosboletos[4][7] ,
                'pagador'                => $pagador,
                'beneficiario'           => $beneficiario,
                'diasBaixaAutomatica'    => 15,
                'carteira'               => 101,
                'agencia'                => 3132,
                'conta'                  => 130091375,
                'descricaoDemonstrativo' => ['', '', ''],
                'instrucoes'             => ['', '', ''],
                'aceite'                 => 'S',
                'especieDoc'             => 'DM',
            ]
        );
        $boleto9 = new \Eduardokum\LaravelBoleto\Boleto\Banco\Santander(
            [
                'codigoCliente'          => 1130110,
                'logo'                   => public_path().'/imagens/logosantander.png',
                'dataVencimento'         => Carbon::createMidnightDate(explode('-', $dadosboletos[1][8])[0], explode('-', $dadosboletos[1][8])[1], explode('-', $dadosboletos[1][8])[2], 'America/Sao_Paulo'),
                'valor'                  => $dadosboletos[2][8],
                'multa'                  => false,
                'juros'                  => 1,
                'jurosApos'              => 1,
                'numero'                 => $dadosboletos[4][8] ,
                'numeroDocumento'        => $dadosboletos[4][8] ,
                'pagador'                => $pagador,
                'beneficiario'           => $beneficiario,
                'diasBaixaAutomatica'    => 15,
                'carteira'               => 101,
                'agencia'                => 3132,
                'conta'                  => 130091375,
                'descricaoDemonstrativo' => ['', '', ''],
                'instrucoes'             => ['', '', ''],
                'aceite'                 => 'S',
                'especieDoc'             => 'DM',
            ]
        );
        $boleto10 = new \Eduardokum\LaravelBoleto\Boleto\Banco\Santander(
            [
                'codigoCliente'          => 1130110,
                'logo'                   => public_path().'/imagens/logosantander.png',
                'dataVencimento'         => Carbon::createMidnightDate(explode('-', $dadosboletos[1][9])[0], explode('-', $dadosboletos[1][9])[1], explode('-', $dadosboletos[1][9])[2], 'America/Sao_Paulo'),
                'valor'                  => $dadosboletos[2][9],
                'multa'                  => false,
                'juros'                  => 1,
                'jurosApos'              => 1,
                'numero'                 => $dadosboletos[4][9] ,
                'numeroDocumento'        => $dadosboletos[4][9] ,
                'pagador'                => $pagador,
                'beneficiario'           => $beneficiario,
                'diasBaixaAutomatica'    => 15,
                'carteira'               => 101,
                'agencia'                => 3132,
                'conta'                  => 130091375,
                'descricaoDemonstrativo' => ['', '', ''],
                'instrucoes'             => ['', '', ''],
                'aceite'                 => 'S',
                'especieDoc'             => 'DM',
            ]
        );
        $boleto11 = new \Eduardokum\LaravelBoleto\Boleto\Banco\Santander(
            [
                'codigoCliente'          => 1130110,
                'logo'                   => public_path().'/imagens/logosantander.png',
                'dataVencimento'         => Carbon::createMidnightDate(explode('-', $dadosboletos[1][10])[0], explode('-', $dadosboletos[1][10])[1], explode('-', $dadosboletos[1][10])[2], 'America/Sao_Paulo'),
                'valor'                  => $dadosboletos[2][10],
                'multa'                  => false,
                'juros'                  => 1,
                'jurosApos'              => 1,
                'numero'                 => $dadosboletos[4][10] ,
                'numeroDocumento'        => $dadosboletos[4][10] ,
                'pagador'                => $pagador,
                'beneficiario'           => $beneficiario,
                'diasBaixaAutomatica'    => 15,
                'carteira'               => 101,
                'agencia'                => 3132,
                'conta'                  => 130091375,
                'descricaoDemonstrativo' => ['', '', ''],
                'instrucoes'             => ['', '', ''],
                'aceite'                 => 'S',
                'especieDoc'             => 'DM',
            ]
        );
        $boleto12 = new \Eduardokum\LaravelBoleto\Boleto\Banco\Santander(
            [
                'codigoCliente'          => 1130110,
                'logo'                   => public_path().'/imagens/logosantander.png',
                'dataVencimento'         => Carbon::createMidnightDate(explode('-', $dadosboletos[1][11])[0], explode('-', $dadosboletos[1][11])[1], explode('-', $dadosboletos[1][11])[2], 'America/Sao_Paulo'),
                'valor'                  => $dadosboletos[2][11],
                'multa'                  => false,
                'juros'                  => 1,
                'jurosApos'              => 1,
                'numero'                 => $dadosboletos[4][11] ,
                'numeroDocumento'        => $dadosboletos[4][11] ,
                'pagador'                => $pagador,
                'beneficiario'           => $beneficiario,
                'diasBaixaAutomatica'    => 15,
                'carteira'               => 101,
                'agencia'                => 3132,
                'conta'                  => 130091375,
                'descricaoDemonstrativo' => ['', '', ''],
                'instrucoes'             => ['', '', ''],
                'aceite'                 => 'S',
                'especieDoc'             => 'DM',
            ]
        );
        // $remessa = new \Eduardokum\LaravelBoleto\Cnab\Remessa\Cnab400\Banco\Santander(
        //     [
        //         'agencia'       => 3132,
        //         'carteira'      => 101,
        //         'conta'         => 130091375,
        //         'codigoCliente' => 1130110,
        //         'beneficiario'  => $beneficiario,
        //     ]
        // );

        

        // $remessa->gerar();

        $html = new \Eduardokum\LaravelBoleto\Boleto\Render\Html();
        $html->addBoletos([
            $boleto1,
            $boleto2,
            $boleto3,
            $boleto4,
            $boleto5,
            $boleto6,
            $boleto7,
            $boleto8,
            $boleto9,
            $boleto10,
            $boleto11,
            $boleto12,
        ]);

        $nomeboleto = 'BoletoLote' . $dadosboletos[0][0] . '-' . explode('-', $dadosboletos[1][0])[2] . explode('-', $dadosboletos[1][0])[1] . explode('-', $dadosboletos[1][0])[0]. '.pdf';
        return $html->gerarCarne();
    }
    public function ProcessarRetorno(Request $request){
        // dd(public_path() . 'COBST_H6QT_02_250222P_MOV.TXT');
        $relatorio = [[],[],[],[],[]];
        $validation = Validator::make($request->all(), [
            'retornotxt' => 'required|mimes:png,jpg,jpeg,csv,txt,pdf|max:2048'
           ]);
           if($validation->passes())
           {
                $txt = $request->file('retornotxt');
                // return $txt;
                $nome = $txt->getClientOriginalName();
                // return $nome;
                $nome = str_replace(" ", "_", $nome);
                Storage::disk('retornos')->put($nome, file_get_contents($txt));
                $retorno = \Eduardokum\LaravelBoleto\Cnab\Retorno\Factory::make(storage_path() . '/app/retornos/'.$nome);
                $retorno->processar();
        
                // echo $retorno->getBancoNome();
                // dd($retorno->getDetalhes(), $retorno->getHeader(), $retorno->getTrailer());
                $cobrancas = [];
                foreach($retorno->getDetalhes() as $retorno){
                    // dd($retorno->numerodocumento);
                    $retorno = $retorno->toArray();
                    // dd($retorno);
                    // array_push($retornos, $retorno);
                    // return $retornos;

                    $cobrancaatual = DB::table('cobranca')->where('idcobranca', $retorno['numeroDocumento'])->first();
                    // return $cobrancaatual;
                    
                    // array_push($cobrancas, $cobrancaatual->idcobranca);
                    if($cobrancaatual!= ''){
                        // array_push($cobrancas, substr($cobrancaatual->responsavel, 0, strlen($cobrancaatual->responsavel)-1));
                        // array_push($cobrancas, $cobrancaatual->idcobranca);
                        // return $cobrancas;
                        $pessoaatual = DB::table('pacientes')->where('pac_id', substr($cobrancaatual->responsavel, 0, strlen($cobrancaatual->responsavel)-1))->first();
                        array_push($relatorio[0], $cobrancaatual->idlote);
                        array_push($relatorio[1], $cobrancaatual->idcobranca);
                        array_push($relatorio[2], $pessoaatual->pac_nome . ' - '. $pessoaatual->pac_cpf);
                        array_push($relatorio[3], $cobrancaatual->data);
                        array_push($relatorio[4], $retorno['ocorrencia'] . ': ' . $retorno['ocorrenciaDescricao']);
                        if($retorno['ocorrencia'] == '06'){
                            $cobrancavalidar = DB::table('cobranca')->where('idcobranca', $retorno['numeroDocumento'])->update([
                                'validado' => 1,
                                'pago' => 1
                            ]);
                        }
                    }
                    
                }
                // return $cobrancas;
                return $relatorio;
            }
    }
    public function PassarPacientes(Request $request){
        $pessoasantes = DB::table('tb_pessoas')->get();
        dd($pessoasantes);
    }

}
