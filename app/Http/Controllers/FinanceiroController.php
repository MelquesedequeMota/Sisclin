<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class FinanceiroController extends Controller
{
    public function PlanoDeContas(){
        return view('PlanoContas');
    }

    public function FluxoDeCaixa(){
        return view('FluxoDeCaixa');
    }

    public function Reajuste(){
        return view('Reajuste');
    }

    public function CadastrarPlanoContas(Request $request){
        // dd($request->all());
        $countpontos = 0;
        $countpontosatual = 0;
        $listacorretos = [];

        if($request->numeroplanocontas == null){
            $numeroplanocontas = DB::table('planocontas')->where('numeroplanocontas', 'not like', '%.%')->max('numeroplanocontas') + 1;
        }else{
            for($i = 0; $i < strlen($request->numeroplanocontas); $i++){
                if($request->numeroplanocontas[$i] == '.'){
                    $countpontos++;
                }
            }
            $numeroprocura = $request->numeroplanocontas . '.';

            $numeroplanocontas = DB::table('planocontas')->where('numeroplanocontas', 'like', $numeroprocura.'%')->get();

            $numeroplanocontas2 = $numeroplanocontas->map(function($obj){
                return (array) $obj;
            })->toArray();

            $countpontos++;

            foreach($numeroplanocontas2 as $numeroplanocontas){
                $countpontosatual = 0;
                for($i = 0; $i < strlen($numeroplanocontas['numeroplanocontas']); $i++){
                    if($numeroplanocontas['numeroplanocontas'][$i] == '.'){
                        $countpontosatual++;
                    }
                }
                if($countpontos == $countpontosatual){
                    array_push($listacorretos, $numeroplanocontas['numeroplanocontas']);
                }
            }

            if(count($listacorretos) != 0){
                $quebranumero = explode('.',max($listacorretos));

                $quebranumero[count($quebranumero)-1] =  $quebranumero[count($quebranumero)-1] + 1;
    
                $numeroplanocontas = implode('.', $quebranumero);
            }else{
                $numeroplanocontas = $request->numeroplanocontas . '.1';
            }

            
        }

        // dd('não entrou');

        $CadastrarPlanoContas = DB::table('planocontas')->insert([
            'nomeplanocontas' => $request->nomeplanocontas,
            'numeroplanocontas' => $numeroplanocontas,
        ]);

        if($CadastrarPlanoContas == 1){
            return 1;
        }else{
            return 0;
        }
    }

    public function ListPlanoContasCategoria(Request $request){
        // dd($request->all());

        $listplanocontas = DB::table('planocontas')->OrderBy('nomeplanocontas')->get();

        $listplanocontas2 = $listplanocontas->map(function($obj){
            return (array) $obj;
        })->toArray();

        return $listplanocontas2;
    }

    public function ListPlanoContas(Request $request){
        // dd($request->all());

        $listplanocontas = DB::table('planocontas')->OrderBy('numeroplanocontas')->get();

        $listplanocontas2 = $listplanocontas->map(function($obj){
            return (array) $obj;
        })->toArray();

        return $listplanocontas2;
    }

    public function RemoverPlanoContas(Request $request){
        // dd($request->all());
        $removerplanocontas = DB::table('planocontas')
        ->where('numeroplanocontas', $request->numeroplanocontas)
        ->delete();
        
        if($removerplanocontas){
            return 1;
        }else{
            return 0;
        }
    }

    public function EditarPlanoContas(Request $request){
        // dd($request->all());

        $countpontos = 0;
        $countpontosatual = 0;
        $listacorretos = [];

        if($request->numeroplanocontasnovo == null){
            $numeroplanocontas = DB::table('planocontas')->where('numeroplanocontas', 'not like', '%.%')->max('numeroplanocontas') + 1;
        }else{
            for($i = 0; $i < strlen($request->numeroplanocontasnovo); $i++){
                if($request->numeroplanocontas[$i] == '.'){
                    $countpontos++;
                }
            }
            $numeroprocura = $request->numeroplanocontasnovo . '.';

            $numeroplanocontas = DB::table('planocontas')->where('numeroplanocontas', 'like', $numeroprocura.'%')->get();

            $numeroplanocontas2 = $numeroplanocontas->map(function($obj){
                return (array) $obj;
            })->toArray();

            $countpontos++;

            foreach($numeroplanocontas2 as $numeroplanocontas){
                $countpontosatual = 0;
                for($i = 0; $i < strlen($numeroplanocontas['numeroplanocontas']); $i++){
                    if($numeroplanocontas['numeroplanocontas'][$i] == '.'){
                        $countpontosatual++;
                    }
                }
                if($countpontos == $countpontosatual){
                    array_push($listacorretos, $numeroplanocontas['numeroplanocontas']);
                }
            }

            if(count($listacorretos) != 0){
                $quebranumero = explode('.',max($listacorretos));

                $quebranumero[count($quebranumero)-1] =  $quebranumero[count($quebranumero)-1] + 1;
    
                $numeroplanocontas = implode('.', $quebranumero);
            }else{
                $numeroplanocontas = $request->numeroplanocontas . '.1';
            }

            
        }

        $attplanocontas = DB::table('planocontas')->where('numeroplanocontas', $request->numeroplanocontas)
        ->update([
            "nomeplanocontas" => $request->nomeplanocontas,
            "numeroplanocontas" => $numeroplanocontas,
        ]);
        
        if($attplanocontas == 1){
            return 1;
        }else{
            return 0;
        }
    }

    public function ConsultaDespesasPagas(Request $request){
        // dd($request->all());

        // $datainicio0 = explode('-', $request->inicio);
        // $datafim0 = explode('-', $request->fim);
        // // dd($datainicio0, $datafim0);
        // $datainicio = $datainicio0[2] . '/' . $datainicio0[1] . '/' . $datainicio0[0];
        // $datafim = $datafim0[2] . '/' . $datafim0[1] . '/' . $datafim0[0];

        $prod = ['idcontapagar' => [],'datapagoconta' => [],'categoriaconta' => [],'formapagamentoconta' => [],'valortotalconta' => [],'descconta' => [], 'autoconta' => [],'cvconta' => []];
        $contasapagar = DB::table('contasapagar')->where('datapagoconta', '>=', $request->inicio)->where('datapagoconta', '<=', $request->fim)->where('pagoconta', '1')->get();

        // dd($contasapagar);

        foreach($contasapagar as $contasapagar){
            $data0 = explode('-', $contasapagar->datapagoconta);
            array_push($prod['idcontapagar'], $contasapagar->idcontapagar);
            array_push($prod['datapagoconta'], $data0[2] . '/' . $data0[1] . '/' . $data0[0]);
            array_push($prod['categoriaconta'], $contasapagar->categoriaconta);
            array_push($prod['formapagamentoconta'], $contasapagar->formapagamentoconta);
            array_push($prod['valortotalconta'], $contasapagar->valortotalconta);
            array_push($prod['descconta'], $contasapagar->descconta);
            array_push($prod['autoconta'], $contasapagar->autoconta);
            array_push($prod['cvconta'], $contasapagar->cvconta);
        }

        return $prod;
    }

    public function ConsultaDespesasaPagar(Request $request){
        // dd($request->all());

        // $datainicio0 = explode('-', $request->inicio);
        // $datafim0 = explode('-', $request->fim);
        // // dd($datainicio0, $datafim0);
        // $datainicio = $datainicio0[2] . '/' . $datainicio0[1] . '/' . $datainicio0[0];
        // $datafim = $datafim0[2] . '/' . $datafim0[1] . '/' . $datafim0[0];
        $prod = ['idcontapagar' => [],'vencimentoconta' => [],'categoriaconta' => [],'valortotalconta' => [],'descconta' => []];

        $contasapagar = DB::table('contasapagar')->where('pagoconta', '0')->where('vencimentoconta', '>=', $request->inicio)->get();

        // dd($contasapagar);

        foreach($contasapagar as $contasapagar){
            $data0 = explode('-', $contasapagar->vencimentoconta);
            array_push($prod['idcontapagar'], $contasapagar->idcontapagar);
            array_push($prod['vencimentoconta'], $data0[2] . '/' . $data0[1] . '/' . $data0[0]);
            array_push($prod['categoriaconta'], $contasapagar->categoriaconta);
            array_push($prod['valortotalconta'], $contasapagar->valortotalconta);
            array_push($prod['descconta'], $contasapagar->descconta);
        }

        return $prod;
    }

    public function ConsultaFluxoCaixa(Request $request){
        // dd($request->all());

        // $datainicio0 = explode('-', $request->inicio);
        // $datafim0 = explode('-', $request->fim);
        // // dd($datainicio0, $datafim0);
        // $datainicio = $datainicio0[2] . '/' . $datainicio0[1] . '/' . $datainicio0[0];
        // $datafim = $datafim0[2] . '/' . $datafim0[1] . '/' . $datafim0[0];
        $indexofdatas = [];
        $prod = ['datapagoconta' => [],'descconta' => [],'formapagamentoconta' => [],'valorconta' => [],'tipoconta' => []];

        // $contasapagar = DB::table('contasapagar')->where('datapagoconta', '>=', $request->inicio)->where('datapagoconta', '<=', $request->fim)->where('pagoconta', '1')->orderBy('datapagoconta')->get();
        // $contasareceber = DB::table('contasareceber')->where('datapagoconta', '>=', $request->inicio)->where('datapagoconta', '<=', $request->fim)->where('recebidoconta', '1')->orderBy('datapagoconta')->get();


        // // dd($contasapagar);

        // foreach($contasapagar as $contasapagar){
        //     array_push($prod['datapagoconta'], $contasapagar->datapagoconta);
        //     array_push($prod['descconta'], $contasapagar->descconta);
        //     array_push($prod['formapagamentoconta'], $contasapagar->formapagamentoconta);
        //     array_push($prod['valorconta'], $contasapagar->valortotalconta);
        //     array_push($prod['tipoconta'], 'Despesa');
        // }

        // foreach($contasareceber as $contasareceber){
        //     array_push($prod['datapagoconta'], $contasareceber->datapagoconta);
        //     array_push($prod['descconta'], $contasareceber->descconta);
        //     array_push($prod['formapagamentoconta'], $contasareceber->formapagamentoconta);
        //     array_push($prod['valorconta'], $contasareceber->valorconta);
        //     array_push($prod['tipoconta'], 'Receita');
        // }

        $contasapagar = DB::table('contasapagar')->select('idcontapagar','datapagoconta', 'descconta', 'formapagamentoconta', 'valortotalconta')->where('datapagoconta', '>=', $request->inicio)->where('datapagoconta', '<=', $request->fim)->where('pagoconta', '1')->orderByDesc('datapagoconta');
        $contasareceber = DB::table('contasareceber')->select('idcontareceber','datapagoconta', 'descconta', 'formapagamentoconta', 'valorconta')->where('datapagoconta', '>=', $request->inicio)->where('datapagoconta', '<=', $request->fim)->where('recebidoconta', '1')->orderByDesc('datapagoconta');
        
        $query = $contasareceber->union($contasapagar);
        $querySql = $query->toSql();
        $query = DB::table(DB::raw("($querySql order by datapagoconta desc) as a"))->mergeBindings($query)->get();

        foreach($query as $query){
            $contasareceber = DB::table('contasareceber')->where('idcontareceber', $query->idcontareceber)->where('formapagamentoconta', $query->formapagamentoconta)->where('datapagoconta', $query->datapagoconta)->where('descconta', $query->descconta)->where('valorconta', $query->valorconta)->first();
            $contasapagar = DB::table('contasapagar')->where('idcontapagar', $query->idcontareceber)->where('formapagamentoconta', $query->formapagamentoconta)->where('datapagoconta', $query->datapagoconta)->where('descconta', $query->descconta)->where('valortotalconta', $query->valorconta)->first();
            // dd($contasareceber);
            if($contasareceber){
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

        return $prod;
    }

    public function ConsultaDespesasEReceitas(Request $request){
        // dd($request->all());

        $indexofdatas = [];
        $prod = ['datapagoconta' => [],'descconta' => [],'formapagamentoconta' => [],'valorconta' => [],'tipoconta' => []];

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

        return $prod;
    }

    public function ConsultaReceitasPagas(Request $request){
        // dd($request->all());

        $prod = ['idcontareceber' => [],'datapagoconta' => [],'clienteconta' => [],'formapagamento' => [],'valorconta' => [],'descconta' => [],'autoconta' => [],'cvconta' => []];

        // $datainicio0 = explode('-', $request->inicio);
        // $datafim0 = explode('-', $request->fim);
        // // dd($datainicio0, $datafim0);
        // $datainicio = $datainicio0[2] . '/' . $datainicio0[1] . '/' . $datainicio0[0];
        // $datafim = $datafim0[2] . '/' . $datafim0[1] . '/' . $datafim0[0];

        $contasareceber = DB::table('contasareceber')->where('datapagoconta', '>=', $request->inicio)->where('datapagoconta', '<=', $request->fim)->where('recebidoconta', '1')->get();

        // dd($contasareceber);

        foreach($contasareceber as $contasareceber){
            // dd($contasareceber);
            if(substr($contasareceber->clienteconta, -1) == 1){
                $nome = DB::table('pacientes')->where('pac_id', substr_replace($contasareceber->clienteconta ,"",-1))->first()->pac_nome;
                $cpf = DB::table('pacientes')->where('pac_id', substr_replace($contasareceber->clienteconta ,"",-1))->first()->pac_cpf;
            }else if(substr($contasareceber->clienteconta, -1) == 2){
                $nome = DB::table('fornecedoresfis')->where('forfis_id', substr_replace($contasareceber->clienteconta ,"",-1))->first()->forfis_nome;
                $cpf = DB::table('fornecedoresfis')->where('forfis_id', substr_replace($contasareceber->clienteconta ,"",-1))->first()->forfis_cpf;
            }else if(substr($contasareceber->clienteconta, -1) == 3){
                $nome = DB::table('funcionarios')->where('func_id', substr_replace($contasareceber->clienteconta ,"",-1))->first()->func_nome;
                $cpf = DB::table('funcionarios')->where('func_id', substr_replace($contasareceber->clienteconta ,"",-1))->first()->func_cpf;
            }else if($contasareceber->clienteconta == 0){
                $nome = 'Sistema';
            }
            $data0 = explode('-', $contasareceber->datapagoconta);
            array_push($prod['idcontareceber'], $contasareceber->idcontareceber);
            array_push($prod['datapagoconta'], $data0[2] . '/' . $data0[1] . '/' . $data0[0]);
            if($contasareceber->clienteconta == 0){
                array_push($prod['clienteconta'], $nome);
            }else{
                array_push($prod['clienteconta'], $nome . '(' . $cpf . ')');
            }
            array_push($prod['formapagamento'], $contasareceber->formapagamentoconta);
            array_push($prod['valorconta'], $contasareceber->valorconta);
            array_push($prod['descconta'], $contasareceber->descconta);
            array_push($prod['autoconta'], $contasareceber->autoconta);
            array_push($prod['cvconta'], $contasareceber->cvconta);
        }

        return $prod;
    }

    public function ConsultaReceitasaPagar(Request $request){
        // dd($request->all());

        // $data0 = explode('-', $request->inicio);
        // // dd($data0, $datafim0);
        // $datainicio = $data0[2] . '/' . $data0[1] . '/' . $data0[0];

        $prod = ['idcontareceber' => [],'vencimentoconta' => [],'clienteconta' => [],'formapagamento' => [],'valorconta' => [],'descconta' => []];

        $contasareceber = DB::table('contasareceber')->where('recebidoconta', '0')->where('vencimentoconta', '>=', $request->inicio)->where('vencimentoconta', '<=', $request->fim)->get();
        // dd($contasareceber, $request->all());
        foreach($contasareceber as $contasareceber){
            // dd($contasareceber);
            if(substr($contasareceber->clienteconta, -1) == 1){
                $nome = DB::table('pacientes')->where('pac_id', substr_replace($contasareceber->clienteconta ,"",-1))->first()->pac_nome;
                $cpf = DB::table('pacientes')->where('pac_id', substr_replace($contasareceber->clienteconta ,"",-1))->first()->pac_cpf;
            }else if(substr($contasareceber->clienteconta, -1) == 2){
                $nome = DB::table('fornecedoresfis')->where('forfis_id', substr_replace($contasareceber->clienteconta ,"",-1))->first()->forfis_nome;
                $cpf = DB::table('fornecedoresfis')->where('forfis_id', substr_replace($contasareceber->clienteconta ,"",-1))->first()->forfis_cpf;
            }else if(substr($contasareceber->clienteconta, -1) == 3){
                $nome = DB::table('funcionarios')->where('func_id', substr_replace($contasareceber->clienteconta ,"",-1))->first()->func_nome;
                $cpf = DB::table('funcionarios')->where('func_id', substr_replace($contasareceber->clienteconta ,"",-1))->first()->func_cpf;
            }else if($contasareceber->clienteconta == 0){
                $nome = 'Sistema';
            }
            $data0 = explode('-', $contasareceber->vencimentoconta);
            array_push($prod['idcontareceber'], $contasareceber->idcontareceber);
            array_push($prod['vencimentoconta'], $data0[2] . '/' . $data0[1] . '/' . $data0[0]);
            if($contasareceber->clienteconta == 0){
                array_push($prod['clienteconta'], $nome);
            }else{
                array_push($prod['clienteconta'], $nome . '(' . $cpf . ')');
            }
            
            array_push($prod['formapagamento'], $contasareceber->formapagamentoconta);
            array_push($prod['valorconta'], $contasareceber->valorconta);
            array_push($prod['descconta'], $contasareceber->descconta);
        }

        return $prod;
    }

    public function ConsultaPlanoContas(Request $request){
        // dd($request->all());
        $prod = ["numeroplano"=>[], "nomeplano"=>[]];

        $planocontas = DB::table('planocontas')->orderBy('nomeplanocontas')->get();

        foreach($planocontas as $planocontas){
            array_push($prod["numeroplano"], $planocontas->numeroplanocontas);
            array_push($prod["nomeplano"], $planocontas->nomeplanocontas);
        }

        return $prod;
    }

    public function BuscarFornecedores(Request $request){
        // dd($request->all());
        $fornecedores = ["idfornecedor"=>[], "nomefornecedor"=>[], 'cpfcnpjfornecedor' => []];

        $fornecedoresfis = DB::table('fornecedoresfis')->select('forfis_nome', 'forfis_id', 'forfis_cpf')->orderBy('forfis_nome')->get();
        $fornecedoresjur = DB::table('fornecedoresjur')->select('forjur_nome', 'forjur_id', 'forjur_cnpj')->orderBy('forjur_nome')->get();

        // dd($fornecedoresfis, $fornecedoresjur);

        foreach($fornecedoresfis as $fornecedoresfis){
            array_push($fornecedores["idfornecedor"], strval($fornecedoresfis->forfis_id) . '2');
            array_push($fornecedores["cpfcnpjfornecedor"], $fornecedoresfis->forfis_cpf);
            array_push($fornecedores["nomefornecedor"], $fornecedoresfis->forfis_nome);
        }

        foreach($fornecedoresjur as $fornecedoresjur){
            array_push($fornecedores["idfornecedor"], strval($fornecedoresjur->forjur_id) . '5');
            array_push($fornecedores["cpfcnpjfornecedor"], $fornecedoresjur->forjur_cnpj);
            array_push($fornecedores["nomefornecedor"], $fornecedoresjur->forjur_nome);
        }

        return $fornecedores;
    }

    public function BuscarPlanoContas(Request $request){
        // dd($request->all());
        $prod = ["numeroplano"=>[], "nomeplano"=>[], 'idplano' => []];

        $planocontas = DB::table('planocontas')->orderBy('nomeplanocontas')->get();

        foreach($planocontas as $planocontas){
            array_push($prod["numeroplano"], $planocontas->numeroplanocontas);
            array_push($prod["nomeplano"], $planocontas->nomeplanocontas);
            array_push($prod["idplano"], $planocontas->idplanocontas);
        }

        return $prod;
    }

    public function NovaContaPagar(Request $request){
        // dd($request->all());

        if($request->pagoconta == "true"){
            $datapagoconta = $request->datapagoconta;
            $pagoconta = 1;
            $formapagoconta = $request->formapagamento;
        }else{
            $datapagoconta = null;
            $pagoconta = 0;
            $formapagoconta = null;
        }
        // dd($datapagoconta);

        $novaconta = DB::table('contasapagar')->insert([
            'descconta' => $request->descconta,
            'vencimentoconta' => $request->vencimentoconta,
            'categoriaconta' => $request->categoriaconta,
            'valortotalconta' => doubleval($request->valortotalconta),
            'quantidadeconta' => $request->quantidadeconta,
            'periodoconta' => $request->periodoconta,
            'fornecedorconta' => $request->fornecedorconta,
            'pagoconta' => $pagoconta,
            'datapagoconta' => $datapagoconta,
            'formapagamentoconta' => $formapagoconta,
        ]);

        if($novaconta == 1){
            return 1;
        }else{
            return 0;
        }
    }

    public function EditContaPagar(Request $request){
        // dd($request->all());

        if($request->pagoconta == "true"){
            $datapagoconta = $request->datapagoconta;
            $pagoconta = 1;
            $formapagoconta = $request->formapagamento;
        }else{
            $datapagoconta = null;
            $pagoconta = 0;
            $formapagoconta = null;
        }
        // dd($datapagoconta);

        $editconta = DB::table('contasapagar')->where('idcontapagar', $request->idcontapagar)->update([
            'descconta' => $request->descconta,
            'vencimentoconta' => $request->vencimentoconta,
            'categoriaconta' => $request->categoriaconta,
            'valortotalconta' => doubleval($request->valortotalconta),
            'quantidadeconta' => $request->quantidadeconta,
            'periodoconta' => $request->periodoconta,
            'fornecedorconta' => $request->fornecedorconta,
            'pagoconta' => $pagoconta,
            'datapagoconta' => $datapagoconta,
            'formapagamentoconta' => $formapagoconta,
        ]);

        if($editconta == 1){
            return 1;
        }else{
            return 0;
        }
    }

    public function EstornarContaReceber(Request $request){
        // dd($request->all());

        $editconta = DB::table('contasareceber')->where('idcontareceber', $request->idcontareceber)->update([
            'recebidoconta' => '0',
        ]);

        if($editconta == 1){
            return 1;
        }else{
            return 0;
        }
    }

    public function PagarContaReceber(Request $request){
        // dd($request->all());

        $editconta = DB::table('contasareceber')->where('idcontareceber', $request->idcontareceber)->update([
            'recebidoconta' => '1',
            'datapagoconta' => $request->datapagoconta,
            'formapagamentoconta' => $request->formapagamento,
        ]);

        if($editconta == 1){
            return 1;
        }else{
            return 0;
        }
    }

    public function ExcluirDespesas(Request $request){
        // dd($request->all());
        foreach($request->despesasexcluir as $excluir){
            $excluirdespesas = DB::table('contasapagar')
            ->where('idcontapagar', $excluir)
            ->delete();
        }
        
        return 1;
    }

    public function ExcluirReceitas(Request $request){
        // dd($request->all());
        foreach($request->receitasexcluir as $excluir){
            $excluirreceitas = DB::table('contasareceber')
            ->where('idcontareceber', $excluir)
            ->delete();
        }
        
        return 1;
    }


    public function EditarDespesas(Request $request){
        // dd($request->all());
        $dados = DB::table('contasapagar')->where('idcontapagar', $request->idcontapagar)->first();
        return $dados;
    }

    public function RemessaTeste(Request $request){
        // dd($request->all());
        // dd(phpinfo());

        $cliente = DB::table('pacientes')->where('pac_id', 1)->first();
        $cliente2 = DB::table('clientesjur')->where('clijur_id', 1)->first();
        // dd($cliente, $cliente2);
        // $beneficiario = new \Eduardokum\LaravelBoleto\Pessoa(
        //     [
        //         'nome'      => $cliente2->clijur_nome,
        //         'endereco'  => $cliente2->clijur_logradouro,
        //         'bairro'    => $cliente2->clijur_bairro,
        //         'cep'       => $cliente2->clijur_cep,
        //         'uf'        => $cliente2->clijur_uf,
        //         'cidade'    => $cliente2->clijur_cidade,
        //         'documento' => $cliente2->clijur_cnpj,
        //     ]
        // );

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
        $pagador = new \Eduardokum\LaravelBoleto\Pessoa(
            [
                'nome'      => $cliente->pac_nome,
                'endereco'  => $cliente->pac_logradouro,
                'bairro'    => $cliente->pac_bairro,
                'cep'       => $cliente->pac_cep,
                'uf'        => $cliente->pac_uf,
                'cidade'    => $cliente->pac_cidade,
                'documento' => $cliente->pac_cpf,
            ]
        );
        $pagador2 = new \Eduardokum\LaravelBoleto\Pessoa(
            [
                'nome'      => 'Edna Pinto Leiteiro',
                'endereco'  => 'Onde Judas Perdeu as Cuecas',
                'bairro'    => 'Fim do Mundo',
                'cep'       => '45678-898',
                'uf'        => 'PU',
                'cidade'    => 'Quebrada',
                'documento' => '123.456.789-10',
            ]
        );
        $boleto = new \Eduardokum\LaravelBoleto\Boleto\Banco\Santander(
            [
                'codigoCliente'          => 113011-0,
                'logo'                   => public_path().'/imagens/logosantander.png',
                'dataVencimento'         => new \Carbon\Carbon(),
                'valor'                  => 100,
                'multa'                  => false,
                'juros'                  => false,
                'numero'                 => '0',
                'numeroDocumento'        => '0',
                'pagador'                => $pagador,
                'beneficiario'           => $beneficiario,
                'diasBaixaAutomatica'    => 15,
                'carteira'               => 101,
                'agencia'                => 3132,
                'conta'                  => 130091375,
                'descricaoDemonstrativo' => ['Por obséquio pagar este documento', 'Não, não temos outro método de pagamento, somente em dinheiro', 'Não adianta tacar fogo no boleto e fingir que ele não existe'],
                'instrucoes'             => ['Pegue o dinheiro na carteira', 'Dê para o funcionário', 'Espere ele fingir que vai processar o pagamento e falar que o sistema caiu e fazer tu ir embora mesmo estando na fila 2 horas pra pagar uma unica conta e o sistema que sempre tá offline ainda tá offline, ao invés de só botar a porra de um papel na frente da loterica filha da puta que o sistema ainda ta off e não fazer a gente perder tempo a que odio da porraaaaa'],
                'aceite'                 => 'S',
                'especieDoc'             => 'DM',
            ]
        );

        $boleto2 = new \Eduardokum\LaravelBoleto\Boleto\Banco\Santander(
            [
                'codigoCliente'          => 113011-0,
                'logo'                   => public_path().'/imagens/logosantander.png',
                'dataVencimento'         => new \Carbon\Carbon(),
                'valor'                  => 100,
                'multa'                  => false,
                'juros'                  => false,
                'numero'                 => '0',
                'numeroDocumento'        => '0',
                'pagador'                => $pagador2,
                'beneficiario'           => $beneficiario,
                'diasBaixaAutomatica'    => 15,
                'carteira'               => 101,
                'agencia'                => 3132,
                'conta'                  => 130091375,
                'descricaoDemonstrativo' => ['Por obséquio pagar este documento', 'Não, não temos outro método de pagamento, somente em dinheiro', 'Não adianta tacar fogo no boleto e fingir que ele não existe'],
                'instrucoes'             => ['Pegue o dinheiro na carteira', 'Dê para o funcionário', 'Espere ele fingir que vai processar o pagamento e falar que o sistema caiu e fazer tu ir embora mesmo estando na fila 2 horas pra pagar uma unica conta e o sistema que sempre tá offline ainda tá offline, ao invés de só botar a porra de um papel na frente da loterica filha da puta que o sistema ainda ta off e não fazer a gente perder tempo a que odio da porraaaaa'],
                'aceite'                 => 'S',
                'especieDoc'             => 'DM',
            ]
        );

        $remessa = new \Eduardokum\LaravelBoleto\Cnab\Remessa\Cnab400\Banco\Santander(
            [
                'agencia'       => 3132.1,
                'carteira'      => 101,
                'conta'         => 130091375,
                'codigoCliente' => 113011-0,
                'beneficiario'  => $beneficiario,
            ]
        );

        $remessa->addBoletos([
            $boleto,
            $boleto2
        ]);

        $remessa->gerar();

        $pdf = new \Eduardokum\LaravelBoleto\Boleto\Render\Pdf();
        $pdf->addBoleto($boleto);

        // dd($beneficiario, $pagador, $boleto, $remessa);
        
        // return $boleto->renderPDF(true);
        $pdf->gerarBoleto($pdf::OUTPUT_SAVE,public_path().'/santander.pdf');
        $file = public_path().'/santander.pdf';
        $filename = 'santander.pdf'; /* Note: Always use .pdf at the end. */

        header('Content-type: application/pdf');
        header('Content-Disposition: inline; filename="' . $filename . '"');
        header('Content-Transfer-Encoding: binary');
        header('Content-Length: ' . filesize($file));
        header('Accept-Ranges: bytes');

        // return $remessa->download();
        return readfile($file);
        
    }

    
}
