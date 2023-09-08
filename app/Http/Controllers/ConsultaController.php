<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ConsultaController extends Controller
{
/**
* @OA\Get(
*      path="/consulta/produto/dados/{nomeproduto}",
*      tags={"Produtos"},
*      summary="Pega as informações de um produto",
*      description="Retorna as informações de um produto",
*      @OA\Parameter(
*          name="nomeproduto",
*          description="Nome do Produto",
*          required=true,
*          in="path",
*          @OA\Schema(
*              type="string"
*          )
*      ),
*      @OA\Response(
*          response=200,
*          description="Successful operation"
*       ),
*      @OA\Response(
*          response=400,
*          description="Bad Request"
*      ),
*      @OA\Response(
*          response=401,
*          description="Unauthenticated",
*      ),
*      @OA\Response(
*          response=403,
*          description="Forbidden"
*      )
* )
*/
    public function ConsultaPessoa(Request $request){
        return view('ConsultaPessoa');
    }

    public function ConsultaMedico(){
        return view('ConsultaMedico');
    }

    public function ConsultaProduto(){
        return view('ConsultaProduto');
    }

    public function ConsultaPlano(){
        return view('ConsultaPlano');
    }

    public function ConsultaContrato(){
        return view('ConsultaContrato');
    }
    public function ConsultaLaboratorio(){
        return view('ConsultaLaboratorio');
    }
    public function ConsultaUltrassom(){
        return view('ConsultaUltrassom');
    }
    public function ConsultaRaioX(){
        return view('ConsultaRaioX');
    }
    public function ConsultaExame(){
        return view('ConsultaExame');
    }
    public function Aniversariantes(){
        return view('Aniversariantes');
    }
    public function Telecobrancas(){
        return view('Telecobrancas');
    }

    public function ConsultaCadastroDepartamento(Request $request){
        $consultaselectdep = DB::table('departamentos')->get();
        $departamentos = ["id"=>[], "nome"=>[]];
        foreach($consultaselectdep as $consultaselectdep){
            array_push($departamentos["id"], $consultaselectdep->dep_id);
            array_push($departamentos["nome"], $consultaselectdep->dep_nome);
        }
        return $departamentos;
    }

    public function ConsultaTodosPlanos(Request $request){
        $todosplanos = DB::table('planos')->get();
        $planos = ["id"=>[], "nome"=>[]];
        foreach($todosplanos as $todosplanos){
            array_push($planos["id"], $todosplanos->plan_id);
            array_push($planos["nome"], $todosplanos->plan_nome);
        }
        return $planos;
    }

    public function ConsultarPlano(Request $request){
        $plano = DB::table('planos')->where('plan_id', $request->plano)->first();
        
        return $plano;
    }

    public function GerarSenhaHash(Request $request){
        dd(Hash::make($request->id));
    }
    public function ConsultaCadastroSetor(Request $request){
        if($request->dep == null){

            $consultaselectset = DB::table('setores')->get();
            $setores = ["id"=>[], "nome"=>[]];
            foreach($consultaselectset as $consultaselectset){

                array_push($setores["id"], $consultaselectset->set_id);
                array_push($setores["nome"], $consultaselectset->set_nome);

            }

            return $setores;

        }else{
            
            $consultaselectset = DB::table('setores')->where('set_dep', $request->dep)->get();
            $setores = ["id"=>[], "nome"=>[]];
            foreach($consultaselectset as $consultaselectset){

                array_push($setores["id"], $consultaselectset->set_id);
                array_push($setores["nome"], $consultaselectset->set_nome);

            }

            return $setores;
        }

    }
    public function ConsultaCadastroFuncao(Request $request){
        $consultaselectfunc = DB::table('funcoes')->where('func_setor', $request->set)->get();
        $funcoes = ["id"=>[], "nome"=>[]];
        foreach($consultaselectfunc as $consultaselectfunc){
            array_push($funcoes["id"], $consultaselectfunc->func_id);
            array_push($funcoes["nome"], $consultaselectfunc->func_nome);
        }
        return $funcoes;
    }

    public function ConsultaCategoria(){
        $consultacategorias = DB::table('categorias')->orderBy('cate_nome')->get();
        $categorias = ["id"=>[], "nome"=>[]];
        foreach($consultacategorias as $consultacategorias){
            array_push($categorias["id"], $consultacategorias->cate_id);
            array_push($categorias["nome"], $consultacategorias->cate_nome);
        }
        return $categorias;
    }

    public function ConsultaCadastroCategoria(Request $request){
        // dd($request->all());
        $consultaselectcate = DB::table('categorias')->where('cate_tipo', 'Exame')->get();
        
        $categorias = ["id"=>[], "nome"=>[]];
        foreach($consultaselectcate as $consultaselectcate){
            array_push($categorias["id"], $consultaselectcate->cate_id);
            array_push($categorias["nome"], $consultaselectcate->cate_nome);
        }
        return $categorias;
    }

    public function ConsultaPessoaDados(Request $request){
        // dd($request->all());
        // $paginasatuais = 50 * $request->paginaatual; 
        if(strlen($request->cpfcnpj) == 18){
            $consultafornecedoresjur = DB::table('fornecedoresjur')->select('forjur_id','forjur_cnpj', 'forjur_nome', 'forjur_tel1')->where('forjur_cnpj', $request->cpfcnpj)->orderBy('forjur_nome', 'ASC')->get();
            $consultaclientesjur = DB::table('clientesjur')->select('clijur_id','clijur_cnpj', 'clijur_nome', 'clijur_tel1')->where('clijur_cnpj', $request->cpfcnpj)->orderBy('clijur_nome', 'ASC')->get();
            $clientesjur = $consultaclientesjur->map(function($obj){
                return (array) $obj;
            })->toArray();
            $fornecedoresjur = $consultafornecedoresjur->map(function($obj){
                return (array) $obj;
            })->toArray();
            $consulta = array_merge($fornecedoresjur, $clientesjur);
            return $consulta;
        }else if(strlen($request->cpfcnpj) == 14){
            $consultapacientes = DB::table('pacientes')->select('pac_id','pac_cpf', 'pac_nome', 'pac_tel1')->where('pac_cpf', $request->cpfcnpj)->orderBy('pac_nome', 'ASC')->take(50)->get();
            $consultafornecedoresfis = DB::table('fornecedoresfis')->select('forfis_id','forfis_cpf', 'forfis_nome', 'forfis_tel1')->where('forfis_cpf', $request->cpfcnpj)->orderBy('forfis_nome', 'ASC')->get();
            $consultafuncionarios = DB::table('funcionarios')->select('func_id','func_cpf', 'func_nome', 'func_tel1')->where('func_cpf', $request->cpfcnpj)->orderBy('func_nome', 'ASC')->get();
            $pacientes = $consultapacientes->map(function($obj){
                return (array) $obj;
            })->toArray();
            $fornecedoresfis = $consultafornecedoresfis->map(function($obj){
                return (array) $obj;
            })->toArray();
            $funcionarios = $consultafuncionarios->map(function($obj){
                return (array) $obj;
            })->toArray();

            $consulta1 = array_merge($pacientes, $fornecedoresfis);
            $consulta = array_merge($consulta1, $funcionarios);
            return $consulta;
        }else{
            $consultapacientes = DB::table('pacientes')->select('pac_id','pac_cpf', 'pac_nome', 'pac_tel1')->where('pac_nome', 'like', '%'.$request->nomepessoa.'%')->orderBy('pac_nome', 'ASC')->take(50)->get();
            $consultafornecedoresfis = DB::table('fornecedoresfis')->select('forfis_id','forfis_cpf', 'forfis_nome', 'forfis_tel1')->where('forfis_nome', 'like', '%'. $request->nomepessoa.'%')->orderBy('forfis_nome', 'ASC')->get();
            $consultafuncionarios = DB::table('funcionarios')->select('func_id','func_cpf', 'func_nome', 'func_tel1')->where('func_nome', 'like', '%'. $request->nomepessoa.'%')->orderBy('func_nome', 'ASC')->get();
            $consultafornecedoresjur = DB::table('fornecedoresjur')->select('forjur_id','forjur_cnpj', 'forjur_nome', 'forjur_tel1')->where('forjur_nome', 'like', '%'. $request->nomepessoa.'%')->orderBy('forjur_nome', 'ASC')->get();
            $consultaclientesjur = DB::table('clientesjur')->select('clijur_id','clijur_cnpj', 'clijur_nome', 'clijur_tel1')->where('clijur_nome', 'like', '%'. $request->nomepessoa.'%')->orderBy('clijur_nome', 'ASC')->get();
            $pacientes = $consultapacientes->map(function($obj){
                return (array) $obj;
            })->toArray();
            $fornecedoresfis = $consultafornecedoresfis->map(function($obj){
                return (array) $obj;
            })->toArray();
            $funcionarios = $consultafuncionarios->map(function($obj){
                return (array) $obj;
            })->toArray();
            $clientesjur = $consultaclientesjur->map(function($obj){
                return (array) $obj;
            })->toArray();
            $fornecedoresjur = $consultafornecedoresjur->map(function($obj){
                return (array) $obj;
            })->toArray();
            // dd($pacientes);
            $merge1 = array_merge($pacientes, $fornecedoresfis);
            $merge2 = array_merge($merge1, $funcionarios);
            $merge3 = array_merge($merge2, $clientesjur);
            $consulta = array_merge($merge3, $fornecedoresjur);

            return array_slice($consulta, 0, 50);
            
        }
    }

    public function ConsultaPessoaDadosCount(Request $request){
        if(strlen($request->cpfcnpj) == 18){
            $consultafornecedoresjur = count(DB::table('fornecedoresjur')->select('forjur_id','forjur_cnpj', 'forjur_nome', 'forjur_tel1')->where('forjur_cnpj', $request->cpfcnpj)->orderBy('forjur_nome', 'ASC')->get());
            $consultaclientesjur = count(DB::table('clientesjur')->select('clijur_id','clijur_cnpj', 'clijur_nome', 'clijur_tel1')->where('clijur_cnpj', $request->cpfcnpj)->orderBy('clijur_nome', 'ASC')->get());
            
            $consulta = $consultafornecedoresjur + $consultaclientesjur;
            return $consulta;
        }else if(strlen($request->cpfcnpj) == 14){
            $consultapacientes = count(DB::table('pacientes')->select('pac_id','pac_cpf', 'pac_nome', 'pac_tel1')->where('pac_cpf', $request->cpfcnpj)->orderBy('pac_nome', 'ASC')->get());
            $consultafornecedoresfis = count(DB::table('fornecedoresfis')->select('forfis_id','forfis_cpf', 'forfis_nome', 'forfis_tel1')->where('forfis_cpf', $request->cpfcnpj)->orderBy('forfis_nome', 'ASC')->get());
            $consultafuncionarios = count(DB::table('funcionarios')->select('func_id','func_cpf', 'func_nome', 'func_tel1')->where('func_cpf', $request->cpfcnpj)->orderBy('func_nome', 'ASC')->get());
            
            $consulta = $consultapacientes + $consultafornecedoresfis + $consultafuncionarios;
            return $consulta;
        }else{
            $consultapacientes = count(DB::table('pacientes')->select('pac_id','pac_cpf', 'pac_nome', 'pac_tel1')->where('pac_nome', 'like', '%'.$request->nomepessoa.'%')->orderBy('pac_nome', 'ASC')->get());
            $consultafornecedoresfis = count(DB::table('fornecedoresfis')->select('forfis_id','forfis_cpf', 'forfis_nome', 'forfis_tel1')->where('forfis_nome', 'like', '%'. $request->nomepessoa.'%')->orderBy('forfis_nome', 'ASC')->get());
            $consultafuncionarios = count(DB::table('funcionarios')->select('func_id','func_cpf', 'func_nome', 'func_tel1')->where('func_nome', 'like', '%'. $request->nomepessoa.'%')->orderBy('func_nome', 'ASC')->get());
            $consultafornecedoresjur = count(DB::table('fornecedoresjur')->select('forjur_id','forjur_cnpj', 'forjur_nome', 'forjur_tel1')->where('forjur_nome', 'like', '%'. $request->nomepessoa.'%')->orderBy('forjur_nome', 'ASC')->get());
            $consultaclientesjur = count(DB::table('clientesjur')->select('clijur_id','clijur_cnpj', 'clijur_nome', 'clijur_tel1')->where('clijur_nome', 'like', '%'. $request->nomepessoa.'%')->orderBy('clijur_nome', 'ASC')->get());
            
            $consulta = $consultapacientes + $consultafornecedoresfis + $consultafuncionarios + $consultafornecedoresjur + $consultaclientesjur;
            return $consulta;
        }
    }

    public function ConsultaMedicoUsuario(Request $request){
        $user_id = $request->med;
        $medico = DB::table('medicos')->where('med_id', $request->med)->first()->med_nome;
        // dd($medico);
        $user = DB::table('users')->where('name', $medico)->first();
        $dados= [$user->username, $user->user_tipo];
        return json_encode($dados);
    }

    public function ConsultarAniversariantes(Request $request){
        // dd($request->all());
        $dados = ['nome' => [], 'datanasc' => [], 'tel' => [],'email' => []];
        $mesdia1 = explode('/',$request->inicio)[1];
        $diadia1 = explode('/',$request->inicio)[0];

        $mesdia2 = explode('/',$request->fim)[1];
        $diadia2 = explode('/',$request->fim)[0];

        $dia1 = explode('/',$request->inicio)[1] . '-' . explode('/',$request->inicio)[0];
        $dia2 = explode('/',$request->fim)[1] . '-' . explode('/',$request->fim)[0];
        // dd($dia1, $dia2);
        $consultapacientes = DB::table('pacientes')->select('pac_nome', 'pac_datanasc', 'pac_tel1', 'pac_email')->whereMonth('pac_datanasc', '>=', $mesdia1)->whereMonth('pac_datanasc', '<=', $mesdia2)->whereDay('pac_datanasc', '>=', $diadia1)->whereDay('pac_datanasc', '<=', $diadia2)->get();
        foreach($consultapacientes as $consultapacientes){
            array_push($dados['nome'], $consultapacientes->pac_nome);
            array_push($dados['datanasc'], $consultapacientes->pac_datanasc);
            array_push($dados['tel'], $consultapacientes->pac_tel1);
            if($consultapacientes->pac_email == null){
                array_push($dados['email'], '---');
            }else{
                array_push($dados['email'], $consultapacientes->pac_email);
            }
        }

        return $dados;
    }

    public function ConsultaPessoaUsuario(Request $request){
        $user_id = $request->func . '3';
        $user = DB::table('users')->where('user_id', $user_id)->first();
        $dados= [$user->username, $user->user_tipo];
        return json_encode($dados);
    }

    public function ConsultaLetraOrdem(Request $request){
        // dd($request->all());

        $letraordem = DB::table('especialidades')->where('espec_letraordem', $request->letraordem)->get();
        if(count($letraordem) > 0){
            return 0;
        }else{
            return 1;
        }
    
    }

    public function ConsultaMedicoDados(Request $request){
        $consultafinal = [];
        $consultamedicos = DB::table('medicos')->where('med_cpfcnpj', 'like', '%'.$request->cpf.'%')
        ->where('med_nome',  'like', '%'.$request->nomemedico.'%')
        // ->where('med_crn',  'like', '%'.$request->crnmedico.'%')
        ->where('med_espec',  'like', '%'.$request->especmedico.'%')
        ->orderBy('med_nome', 'ASC')
        ->get();
        // dd($consultamedicos);
        $consulta = $consultamedicos->map(function($obj){
            return (array) $obj;
        })->toArray();
        foreach($consulta as $consulta){
            $consultaespec = DB::table('especialidades')->where('espec_id', $consulta['med_espec'])->get();
            array_push($consultafinal, [$consulta['med_cpfcnpj'] , $consulta['med_crn'], $consulta['med_nome'], $consulta['med_tel1'], $consultaespec[0]->espec_nome]);
        }
        return $consultafinal;
    }

    public function ConsultaProdutoDados(Request $request){
        $consultafinal = [];
        $consultaprodutos = DB::table('produtos')->where('prod_nome', 'like', '%'.$request->nomeproduto.'%')
        ->where('prod_cate', 'like', '%'.$request->cateproduto.'%')
        ->orderBy('prod_nome')
        ->get();
        $consulta = $consultaprodutos->map(function($obj){
            return (array) $obj;
        })->toArray();
        foreach($consulta as $consulta){
            $consultacate = DB::table('categorias')->where('cate_id', $consulta['prod_cate'])->get();
            // dd($consultacate, $consulta['prod_cate'], $consulta);
            array_push($consultafinal, [$consulta['prod_nome'] ,$consulta['prod_tipo'], $consultacate[0]->cate_nome]);
        }
        return $consultafinal;
    }
    
    public function ConsultaProdutoDados2(Request $request, $nomeproduto){
        $consultafinal = [];
        $consultaprodutos = DB::table('produtos')->where('prod_nome', 'like', '%'.$nomeproduto.'%')
        ->where('prod_cate', 'like', '%'.$request->cateproduto.'%')
        ->orderBy('prod_nome')
        ->get();
        $consulta = $consultaprodutos->map(function($obj){
            return (array) $obj;
        })->toArray();
        foreach($consulta as $consulta){
            $consultacate = DB::table('categorias')->where('cate_id', $consulta['prod_cate'])->get();
            // dd($consultacate, $consulta['prod_cate'], $consulta);
            array_push($consultafinal, [$consulta['prod_nome'] ,$consulta['prod_tipo'], $consultacate[0]->cate_nome, doubleval($consulta['prod_valor']), doubleval($consulta['prod_valorlab'])]);
        }
        return $consultafinal;
    }

    public function ConsultaPlanoDados(Request $request){
        $consultaplanos = DB::table('planos')->where('plan_nome', 'like', '%'.$request->nomeplano.'%')
        ->get();
        $consulta = $consultaplanos->map(function($obj){
            return (array) $obj;
        })->toArray();
        return $consulta;
    }
    public function ConsultaLaboratorioDados(Request $request){
        $consultalaboratorios = DB::table('laboratorios')
        ->where('lab_num', 'like', '%'.$request->numlab.'%')
        ->where('lab_nome', 'like', '%'.$request->nomelab.'%')
        ->get();
        $consulta = $consultalaboratorios->map(function($obj){
            return (array) $obj;
        })->toArray();
        return $consulta;
    }

    public function ConsultaUltrassomDados(Request $request){
        $consultaultrassom = DB::table('produtos')->where('prod_cate','33')
        ->get();
        $consulta = $consultaultrassom->map(function($obj){
            return (array) $obj;
        })->toArray();
        return $consulta;
    }

    public function ConsultaRaioXDados(Request $request){
        $consultaraiox = DB::table('raiox')->where('raiox_nome', 'like', '%'.$request->nomeraiox.'%')
        ->get();
        $consulta = $consultaraiox->map(function($obj){
            return (array) $obj;
        })->toArray();
        return $consulta;
    }

    public function ConsultaCategoriasExameDados(Request $request){
        $consultacateexames = DB::table('categorias')->where('cate_nome', 'like', '%'.$request->nomecateexames.'%')
        ->where('cate_tipo', 'Exame')->get();
        $consulta = $consultacateexames->map(function($obj){
            return (array) $obj;
        })->toArray();
        return $consulta;
    }

    public function ConsultaExameDados(Request $request){
        // dd($request->all());
        $dados = ['prod_id' => [], 'prod_valor' => [], 'prod_cate' => [], 'prod_nome' => []];

        foreach($request->cateexamesid as $categorias){
            // dd($categorias);
            $consultaexame = DB::table('produtos')
            ->where('prod_cate',$categorias)
            ->get();
            foreach($consultaexame as $consultaexame){
                array_push($dados['prod_id'], $consultaexame->prod_id);
                array_push($dados['prod_valor'], $consultaexame->prod_valor);
                array_push($dados['prod_cate'], $consultaexame->prod_cate);
                array_push($dados['prod_nome'], $consultaexame->prod_nome);
            }
        }
        return $dados;
    }

    public function ConsultaPlanoContrato(Request $request){
        $consultaplano = DB::table('planos')->where('plan_id',$request->plan_id)
        ->get();
        $consulta = $consultaplano->map(function($obj){
            return (array) $obj;
        })->toArray();
        return $consulta;
    }

    

    public function ConsultaContratoDados(Request $request){
        // dd($request->all());
        $consultafinal = [];
        $nome = [];
        $idtitu = [];
        if($request->nometitular != null || $request->cpftitular != null){
            if($request->cpftitular != null){
                $consultapacientes = DB::table('pacientes')->where('pac_cpf', 'like', '%'.$request->cpftitular.'%')->get();
                $consultafornecedoresfis = DB::table('fornecedoresfis')->where('forfis_cpf', 'like', '%'. $request->cpftitular.'%')->get();
                $consultafuncionarios = DB::table('funcionarios')->where('func_cpf', 'like', '%'. $request->cpftitular.'%')->get();
                $consultafornecedoresjur = DB::table('fornecedoresjur')->where('forjur_cnpj', 'like', '%'. $request->cpftitular.'%')->get();
                $consultaclientesjur = DB::table('clientesjur')->where('clijur_cnpj', 'like', '%'. $request->cpftitular.'%')->get();
                // dd($consultapacientes);
            }else{
                $consultapacientes = DB::table('pacientes')->where('pac_nome', 'like', '%'.$request->nometitular.'%')->get();
                $consultafornecedoresfis = DB::table('fornecedoresfis')->where('forfis_nome', 'like', '%'. $request->nometitular.'%')->get();
                $consultafuncionarios = DB::table('funcionarios')->where('func_nome', 'like', '%'. $request->nometitular.'%')->get();
                $consultafornecedoresjur = DB::table('fornecedoresjur')->where('forjur_nome', 'like', '%'. $request->nometitular.'%')->get();
                $consultaclientesjur = DB::table('clientesjur')->where('clijur_nome', 'like', '%'. $request->nometitular.'%')->get();
            }
            if(count($consultapacientes) !=0 ){
                $consultapessoa = $consultapacientes->map(function($obj){
                    return (array) $obj;
                })->toArray();
                foreach($consultapessoa as $consultapessoa){
                    array_push($nome, $consultapessoa['pac_nome']);
                    array_push($idtitu, str_pad($consultapessoa['pac_id'] , 4 , '0' , STR_PAD_LEFT) . "1");
                }
                
            }if(count($consultafornecedoresfis) !=0 ){
                $consultapessoa = $consultafornecedoresfis->map(function($obj){
                    return (array) $obj;
                })->toArray();
                foreach($consultapessoa as $consultapessoa){
                    array_push($nome, $consultapessoa['forfis_nome']);
                    array_push($idtitu, str_pad($consultapessoa['forfis_id'] , 4 , '0' , STR_PAD_LEFT) . "2");
                }
    
            }if(count($consultafuncionarios) !=0 ){
                $consultapessoa = $consultafuncionarios->map(function($obj){
                    return (array) $obj;
                })->toArray();
                foreach($consultapessoa as $consultapessoa){
                    array_push($nome, $consultapessoa['func_nome']);
                    array_push($idtitu, str_pad($consultapessoa['func_id'] , 4 , '0' , STR_PAD_LEFT) . "3");
                }
    
            }if(count($consultaclientesjur) !=0 ){
                $consultapessoa = $consultaclientesjur->map(function($obj){
                    return (array) $obj;
                })->toArray();
                foreach($consultapessoa as $consultapessoa){
                    array_push($nome, $consultapessoa['clijur_nome']);
                    array_push($idtitu, str_pad($consultapessoa['clijur_id'] , 4 , '0' , STR_PAD_LEFT) . "4");
                }
                
            }if(count($consultafornecedoresjur) !=0 ){
                $consultapessoa = $consultafornecedoresjur->map(function($obj){
                    return (array) $obj;
                })->toArray();
                foreach($consultapessoa as $consultapessoa){
                    array_push($nome, $consultapessoa['forjur_nome']);
                    array_push($idtitu, str_pad($consultapessoa['forjur_id'] , 4 , '0' , STR_PAD_LEFT) . "5");
                }
                
            }
        
        $pessoas = [];
        for($i = 0; $i < count($idtitu); $i++){
            array_push($pessoas, [$idtitu[$i], $nome[$i]]);
        }
        // dd($pessoas);
        foreach($pessoas as $pessoas){
            $consultacontratos = DB::table('contratosobs')->where('contobs_id', 'like', '%'.$request->cont_id.'%')
            ->where('contobs_idpessoa', 'like', '%'.$pessoas[0].'%')
            ->where('contobs_tipo', 'Titular')
            ->where('contobs_status', 'Ativo')
            ->get();
            $consultacontratos2 = $consultacontratos->map(function($obj){
                return (array) $obj;
            })->toArray();
            $planos = [];
            for($i = 0; $i < count($consultacontratos2); $i++){
                $consultacontrato = DB::table('contratos')->where('cont_id', $consultacontratos2[$i]['contobs_id'])
                ->get();
                $consultacontrato2 = $consultacontrato->map(function($obj){
                    return (array) $obj;
                })->toArray();
                array_push($planos, $consultacontrato2[0]['cont_plano']);
            }
            for($i = 0; $i<count($planos); $i++){
                $consultaplanos = DB::table('planos')->where('plan_id', $planos[$i])->get();
                $consultaplano = $consultaplanos->map(function($obj){
                    return (array) $obj;
                })->toArray();
                array_push($consultafinal, [$consultacontratos2[$i]['contobs_id'], $pessoas[1], $consultaplano[0]['plan_nome']]);
            }
            
        }
        // dd($consultafinal);
        return $consultafinal;
    }else{
        $planos = [];
        $consultacontrato = DB::table('contratos')->where('cont_id', $request->cont_id)->get();
        $consultacontrato2 = $consultacontrato->map(function($obj){
            return (array) $obj;
        })->toArray();
        // dd($consultacontrato2[0]);
        array_push($planos, $consultacontrato2[0]['cont_plano']);
        $consultapessoacontrato = DB::table('contratosobs')->where('contobs_id', $request->cont_id)->where('contobs_tipo', 'Titular')->first();
        // dd(substr($consultapessoacontrato->contobs_id, 6, 8), substr($consultapessoacontrato->contobs_id, -2, 1));
        if(substr($consultapessoacontrato->contobs_id, -2, 1) == 1){
            $pessoa = DB::table('pacientes')->where('pac_id', substr($consultapessoacontrato->contobs_id, 6, 8))->select('pac_nome')->first();
        }else if(substr($consultapessoacontrato->contobs_id, -2, 1) == 2){
            $pessoa = DB::table('fornecedoresfis')->where('forfis_id', substr($consultapessoacontrato->contobs_id, 6, 8))->select('forfis_nome')->first();
        }else if(substr($consultapessoacontrato->contobs_id, -2, 1) == 3){
            $pessoa = DB::table('funcionarios')->where('func_id', substr($consultapessoacontrato->contobs_id, 6, 8))->select('func_nome')->first();
        }else if(substr($consultapessoacontrato->contobs_id, -2, 1) == 4){
            $pessoa = DB::table('fornecedoresjur')->where('forjur_id', substr($consultapessoacontrato->contobs_id, 6, 8))->select('forjur_nome')->first();
        }else{
            $pessoa = DB::table('clientesjur')->where('clijur_id', substr($consultapessoacontrato->contobs_id, 6, 8))->select('clijur_nome')->first();
        }
        for($i = 0; $i<count($planos); $i++){
            $consultaplanos = DB::table('planos')->where('plan_id', $planos[$i])->get();
            $consultaplano = $consultaplanos->map(function($obj){
                return (array) $obj;
            })->toArray();
            // dd($consultaplano);
            array_push($consultafinal, [$consultacontrato2[0]['cont_id'], $pessoa->pac_nome, $consultaplano[0]['plan_nome']]);
        }
        return $consultafinal;
    }    
        
    }

    public function ConsultaContratoTitularDados(Request $request){
        // dd($request->all());
        $consultacontratos = DB::table('contratosobs')->where('contobs_id', 'like', '%'.$request->cont_id.'%')
            ->where('contobs_tipo', 'Titular')
            ->get();
        $consultacontratos2 = $consultacontratos->map(function($obj){
            return (array) $obj;
        })->toArray();
        // dd($consultacontratos2);
        if(substr($consultacontratos2[0]['contobs_idpessoa'], -1) == "1"){
            $consultapessoa = DB::table('pacientes')
            ->where('pac_id', substr($consultacontratos2[0]['contobs_idpessoa'], 0, strlen($consultacontratos2[0]['contobs_idpessoa']) - 1))
            ->get();
            $consultapessoa2 = $consultapessoa->map(function($obj){
                return (array) $obj;
            })->toArray();
        }else if(substr($consultacontratos2[0]['contobs_idpessoa'], -1) == "2"){
            $consultapessoa = DB::table('fornecedoresfis')
            ->where('forfis_id', substr($consultacontratos2[0]['contobs_idpessoa'], 0, strlen($consultacontratos2[0]['contobs_idpessoa']) - 1))
            ->get();
            $consultapessoa2 = $consultapessoa->map(function($obj){
                return (array) $obj;
            })->toArray();
        }else if(substr($consultacontratos2[0]['contobs_idpessoa'], -1) == "3"){
            $consultapessoa = DB::table('funcionarios')
            ->where('func_id', substr($consultacontratos2[0]['contobs_idpessoa'], 0, strlen($consultacontratos2[0]['contobs_idpessoa']) - 1))
            ->get();
            $consultapessoa2 = $consultapessoa->map(function($obj){
                return (array) $obj;
            })->toArray();
        }else if(substr($consultacontratos2[0]['contobs_idpessoa'], -1) == "4"){
            $consultapessoa = DB::table('clientesjur')
            ->where('clijur_id', substr($consultacontratos2[0]['contobs_idpessoa'], 0, strlen($consultacontratos2[0]['contobs_idpessoa']) - 1))
            ->get();
            $consultapessoa2 = $consultapessoa->map(function($obj){
                return (array) $obj;
            })->toArray();
        }else if(substr($consultacontratos2[0]['contobs_idpessoa'], -1) == "5"){
            $consultapessoa = DB::table('fornecedoresjur')
            ->where('forjur_id', substr($consultacontratos2[0]['contobs_idpessoa'], 0, strlen($consultacontratos2[0]['contobs_idpessoa']) - 1))
            ->get();
            $consultapessoa2 = $consultapessoa->map(function($obj){
                return (array) $obj;
            })->toArray();
        }
        return $consultapessoa2;
    }

    public function ConsultaContratoDependenteDados(Request $request){
        $consultacontratos = DB::table('contratosobs')->where('contobs_id', 'like', '%'.$request->cont_id.'%')
            ->where('contobs_tipo', 'Dependente')
            ->where('contobs_status', 'Ativo')
            ->get();
        $consultacontratos2 = $consultacontratos->map(function($obj){
            return (array) $obj;
        })->toArray();
        $resultconsultas = [];
        for($i = 0; $i < count($consultacontratos2); $i++){
            if(substr($consultacontratos2[0]['contobs_idpessoa'], -1) == "1"){
                $consultapessoa = DB::table('pacientes')
                ->where('pac_id', substr($consultacontratos2[$i]['contobs_idpessoa'], 0, strlen($consultacontratos2[0]['contobs_idpessoa']) - 1))
                ->get();
                $consultapessoa2 = $consultapessoa->map(function($obj){
                    return (array) $obj;
                })->toArray();
                array_push($resultconsultas, $consultapessoa2);
            }else if(substr($consultacontratos2[0]['contobs_idpessoa'], -1) == "2"){
                $consultapessoa = DB::table('fornecedoresfis')
                ->where('forfis_id', substr($consultacontratos2[$i]['contobs_idpessoa'], 0, strlen($consultacontratos2[0]['contobs_idpessoa']) - 1))
                ->get();
                $consultapessoa2 = $consultapessoa->map(function($obj){
                    return (array) $obj;
                })->toArray();
                array_push($resultconsultas, $consultapessoa2);
            }else if(substr($consultacontratos2[0]['contobs_idpessoa'], -1) == "3"){
                $consultapessoa = DB::table('funcionarios')
                ->where('func_id', substr($consultacontratos2[$i]['contobs_idpessoa'], 0, strlen($consultacontratos2[0]['contobs_idpessoa']) - 1))
                ->get();
                $consultapessoa2 = $consultapessoa->map(function($obj){
                    return (array) $obj;
                })->toArray();
                array_push($resultconsultas, $consultapessoa2);
            }else if(substr($consultacontratos2[0]['contobs_idpessoa'], -1) == "4"){
                $consultapessoa = DB::table('clientesjur')
                ->where('clijur_id', substr($consultacontratos2[$i]['contobs_idpessoa'], 0, strlen($consultacontratos2[0]['contobs_idpessoa']) - 1))
                ->get();
                $consultapessoa2 = $consultapessoa->map(function($obj){
                    return (array) $obj;
                })->toArray();
                array_push($resultconsultas, $consultapessoa2);
            }else if(substr($consultacontratos2[0]['contobs_idpessoa'], -1) == "5"){
                $consultapessoa = DB::table('fornecedoresjur')
                ->where('forjur_id', substr($consultacontratos2[$i]['contobs_idpessoa'], 0, strlen($consultacontratos2[0]['contobs_idpessoa']) - 1))
                ->get();
                $consultapessoa2 = $consultapessoa->map(function($obj){
                    return (array) $obj;
                })->toArray();
                array_push($resultconsultas, $consultapessoa2);
            }
        }
        return $resultconsultas;
    }

    public function ConsultaPessoaNome(Request $request){
        $consultapacientes = DB::table('pacientes')->select('pac_nome')->where('pac_nome', 'like', '%'.$request->nomepessoa.'%')->limit(50)->get();
        $consultafornecedoresfis = DB::table('fornecedoresfis')->select('forfis_nome')->where('forfis_nome', 'like', '%'. $request->nomepessoa.'%')->limit(50)->get();
        $consultafuncionarios = DB::table('funcionarios')->select('func_nome')->where('func_nome', 'like', '%'. $request->nomepessoa.'%')->limit(50)->get();
        $consultafornecedoresjur = DB::table('fornecedoresjur')->select('forjur_nome')->where('forjur_nome', 'like', '%'. $request->nomepessoa.'%')->limit(50)->get();
        $consultaclientesjur = DB::table('clientesjur')->select('clijur_nome')->where('clijur_nome', 'like', '%'. $request->nomepessoa.'%')->limit(50)->get();
        $pacientes = $consultapacientes->map(function($obj){
            return (array) $obj;
        })->toArray();
        $fornecedoresfis = $consultafornecedoresfis->map(function($obj){
            return (array) $obj;
        })->toArray();
        $funcionarios = $consultafuncionarios->map(function($obj){
            return (array) $obj;
        })->toArray();
        $clientesjur = $consultaclientesjur->map(function($obj){
            return (array) $obj;
        })->toArray();
        $fornecedoresjur = $consultafornecedoresjur->map(function($obj){
            return (array) $obj;
        })->toArray();

        $merge1 = array_merge($pacientes, $fornecedoresfis);
        $merge2 = array_merge($merge1, $funcionarios);
        $merge3 = array_merge($merge2, $clientesjur);
        $consulta = array_merge($merge3, $fornecedoresjur);
        return $consulta;
        
    }

    public function ConsultaPessoaNomeCPF(Request $request){
        $consultapacientes = DB::table('pacientes')->select('pac_nome', 'pac_cpf')->where('pac_nome', 'like', '%'.$request->nomepessoa.'%')->limit(50)->get();
        $consultafornecedoresfis = DB::table('fornecedoresfis')->select('forfis_nome', 'forfis_cpf')->where('forfis_nome', 'like', '%'. $request->nomepessoa.'%')->limit(50)->get();
        $consultafuncionarios = DB::table('funcionarios')->select('func_nome', 'func_cpf')->where('func_nome', 'like', '%'. $request->nomepessoa.'%')->limit(50)->get();
        $consultafornecedoresjur = DB::table('fornecedoresjur')->select('forjur_nome', 'forjur_cnpj')->where('forjur_nome', 'like', '%'. $request->nomepessoa.'%')->limit(50)->get();
        $consultaclientesjur = DB::table('clientesjur')->select('clijur_nome', 'clijur_cnpj')->where('clijur_nome', 'like', '%'. $request->nomepessoa.'%')->limit(50)->get();
        $pacientes = $consultapacientes->map(function($obj){
            return (array) $obj;
        })->toArray();
        $fornecedoresfis = $consultafornecedoresfis->map(function($obj){
            return (array) $obj;
        })->toArray();
        $funcionarios = $consultafuncionarios->map(function($obj){
            return (array) $obj;
        })->toArray();
        $clientesjur = $consultaclientesjur->map(function($obj){
            return (array) $obj;
        })->toArray();
        $fornecedoresjur = $consultafornecedoresjur->map(function($obj){
            return (array) $obj;
        })->toArray();

        $merge1 = array_merge($pacientes, $fornecedoresfis);
        $merge2 = array_merge($merge1, $funcionarios);
        $merge3 = array_merge($merge2, $clientesjur);
        $consulta = array_merge($merge3, $fornecedoresjur);
        return $consulta;
        
    }

    public function ConsultaMedicoNome(Request $request){
        $consultamedicos = DB::table('medicos')->where('med_nome', 'like', '%'.$request->nomemedico.'%')->get();
        $consulta = $consultamedicos->map(function($obj){
            return (array) $obj;
        })->toArray();
        return $consulta;
        
    }

    public function ConsultaProdutoNome(Request $request){
        $consultaprodutos = DB::table('produtos')->where('prod_nome', 'like', '%'.$request->nomeproduto.'%')->get();
        $consulta = $consultaprodutos->map(function($obj){
            return (array) $obj;
        })->toArray();
        return $consulta;
        
    }

    public function ConsultaPlanoNome(Request $request){
        $consultaplanos = DB::table('planos')->where('plan_nome', 'like', '%'.$request->nomeproduto.'%')->get();
        $consulta = $consultaplanos->map(function($obj){
            return (array) $obj;
        })->toArray();
        return $consulta;
        
    }

    public function ConsultaPessoaEditar(Request $request){
        // dd($request->all());
        if($request->pessoa == 'forjur'){
            $consultafornecedoresjur = DB::table('fornecedoresjur')->where('forjur_id', $request->id)->get();
            $fornecedoresjur = $consultafornecedoresjur->map(function($obj){
                return (array) $obj;
            })->toArray();
            return $fornecedoresjur;
        }else if($request->pessoa == 'clijur'){
            $consultaclientesjur = DB::table('clientesjur')->where('clijur_id', $request->id)->get();
            $clientesjur = $consultaclientesjur->map(function($obj){
                return (array) $obj;
            })->toArray();  
            return $clientesjur;
        }else if($request->pessoa == 'pac'){
            $consultapacientes = DB::table('pacientes')->where('pac_id', $request->id)->get();
            $pacientes = $consultapacientes->map(function($obj){
                return (array) $obj;
            })->toArray();
            return $pacientes;
        }else if($request->pessoa == 'forfis'){
            $consultafornecedoresfis = DB::table('fornecedoresfis')->where('forfis_id', $request->id)->get();
            $fornecedoresfis = $consultafornecedoresfis->map(function($obj){
                return (array) $obj;
            })->toArray(); 
            return $fornecedoresfis;
        }else if($request->pessoa == 'func'){
            $consultafuncionarios = DB::table('funcionarios')->where('func_id', $request->id)->get();
            $funcionarios = $consultafuncionarios->map(function($obj){
                return (array) $obj;
            })->toArray();
            return $funcionarios;
        }
    }

    public function ConsultaPessoaEditar2(Request $request){
        $nome = str_replace('%20', ' ', $request->nome);
        // dd($request->all(), $nome);
        if(strlen($request->cpfcnpj) == 18){
            if($request->pessoa == 'forjur'){
                $consultafornecedoresjur = DB::table('fornecedoresjur')->where('forjur_cnpj', $request->cpfcnpj)->where('forjur_nome', 'like', '%'.$nome.'%')->get();
                $fornecedoresjur = $consultafornecedoresjur->map(function($obj){
                    return (array) $obj;
                })->toArray();
                return $fornecedoresjur;
            }else if($request->pessoa == 'clijur'){
                $consultaclientesjur = DB::table('clientesjur')->where('clijur_cnpj', $request->cpfcnpj)->where('clijurr_nome', 'like', '%'.$nome.'%')->get();
                $clientesjur = $consultaclientesjur->map(function($obj){
                    return (array) $obj;
                })->toArray();  
                return $clientesjur;
            }
        }else if(strlen($request->cpfcnpj) == 14){
            if($request->pessoa == 'pac'){
                $consultapacientes = DB::table('pacientes')->where('pac_cpf', $request->cpfcnpj)->where('pac_nome', 'like', '%'.$nome.'%')->get();
                $pacientes = $consultapacientes->map(function($obj){
                    return (array) $obj;
                })->toArray();
                return $pacientes;
            }else if($request->pessoa == 'forfis'){
                $consultafornecedoresfis = DB::table('fornecedoresfis')->where('forfis_cpf', $request->cpfcnpj)->where('forfis_nome', 'like', '%'.$nome.'%')->get();
                $fornecedoresfis = $consultafornecedoresfis->map(function($obj){
                    return (array) $obj;
                })->toArray(); 
                return $fornecedoresfis;
            }else if($request->pessoa == 'func'){
                $consultafuncionarios = DB::table('funcionarios')->where('func_cpf', $request->cpfcnpj)->where('func_nome', 'like', '%'.$nome.'%')->get();
                $funcionarios = $consultafuncionarios->map(function($obj){
                    return (array) $obj;
                })->toArray();
                return $funcionarios;
            }else{
                
                $consultapacientes = DB::table('pacientes')->where('pac_cpf', $request->cpfcnpj)->where('pac_nome', 'like', '%'.$nome.'%')->get();
                $pacientes = $consultapacientes->map(function($obj){
                    return (array) $obj;
                })->toArray();

                $consultafornecedoresfis = DB::table('fornecedoresfis')->where('forfis_cpf', $request->cpfcnpj)->where('forfis_nome', 'like', '%'.$nome.'%')->get();
                $fornecedoresfis = $consultafornecedoresfis->map(function($obj){
                    return (array) $obj;
                })->toArray(); 

                $consultafuncionarios = DB::table('funcionarios')->where('func_cpf', $request->cpfcnpj)->where('func_nome', 'like', '%'.$nome.'%')->get();
                $funcionarios = $consultafuncionarios->map(function($obj){
                    return (array) $obj;
                })->toArray();

                $pessoa = array_merge($pacientes, $fornecedoresfis, $funcionarios);
                return $pessoa;
            }
        }
    }

    public function PegarVendedores(Request $request){
        $nome = [];
        $consultavendedores = DB::table('users')->where('user_tipo', 8)->get();
        $consultapessoa = $consultavendedores->map(function($obj){
            return (array) $obj;
        })->toArray();
        foreach($consultapessoa as $consultapessoa){
            array_push($nome, $consultapessoa['name']);
        }
        return $nome;
    }

    public function ConsultaMedicoEditar(Request $request){
        $consultamedicos = DB::table('medicos')->where('med_cpfcnpj', $request->cpf)->get();
        $consulta = $consultamedicos->map(function($obj){
            return (array) $obj;
        })->toArray();
        return $consulta;
    }
    public function ConsultaProdutoEditar(Request $request){
        $consultaprodutos = DB::table('produtos')->where('prod_nome', $request->nomeproduto)->get();
        $consulta = $consultaprodutos->map(function($obj){
            return (array) $obj;
        })->toArray();
        return $consulta;
    }
    public function ConsultaPlanoEditar(Request $request){
        $produtos = [];
        $consultaplanos = DB::table('planos')->where('plan_nome', $request->nomeplano)->get();
        $consulta = $consultaplanos->map(function($obj){
            return (array) $obj;
        })->toArray();
        $consultaplanoobs = DB::table('planoobs')->where('planobs_plano', $consulta[0]['plan_id'])->get();
        $consulta2 = $consultaplanoobs->map(function($obj){
            return (array) $obj;
        })->toArray();
        for($i = 0; $i < count($consulta2); $i++){
            array_push($produtos, [$consulta2[$i]['planobs_produto'], $consulta2[$i]['planobs_valor'],$consulta2[$i]['planobs_quantidade'],$consulta2[$i]['planobs_incluso']]);
        }
        array_push($consulta, $produtos);
        return $consulta;
    }

    public function ConsultaContratoEditar(Request $request){
        $consultacontratos = DB::table('contratos')->where('cont_id', $request->cont_id)->get();
        $consulta = $consultacontratos->map(function($obj){
            return (array) $obj;
        })->toArray();
        return $consulta;
    }

    public function ConsultaUltrassomEditar(Request $request){
        $consultaultrassons = DB::table('ultrassons')->where('ultrassons_nome', $request->nomeultrassom)->get();
        $consulta = $consultaultrassons->map(function($obj){
            return (array) $obj;
        })->toArray();
        return $consulta;
    }

    public function ConsultaRaioXEditar(Request $request){
        $consultaraiox = DB::table('raiox')->where('raiox_nome', $request->nomeraiox)->get();
        $consulta = $consultaraiox->map(function($obj){
            return (array) $obj;
        })->toArray();
        return $consulta;
    }

    public function ConsultaExameEditar(Request $request){
        $consultaexame = DB::table('exames')->where('exame_nome', $request->nomeexame)->get();
        $consulta = $consultaexame->map(function($obj){
            return (array) $obj;
        })->toArray();
        return $consulta;
    }

    public function ConsultaLaboratorioDadosEditar(Request $request){
        $consultalaboratorios = DB::table('laboratorios')
        ->where('lab_id', $request->lab_id)->get();
        $consulta = $consultalaboratorios->map(function($obj){
            return (array) $obj;
        })->toArray();
        return $consulta;
    }

    public function ConsultaAgendaMedico(Request $request){
        $consultaagenda = DB::table('medico_atendimento')->where('med_id', $request->med_id)->get();
        $consulta = $consultaagenda->map(function($obj){
            return (array) $obj;
        })->toArray();
        return $consulta;
    }

    public function ConsultaPessoaFornecedores(Request $request){
        return view('ConsultaPessoaFornecedor');
    }

    public function ConsultaPessoaFornecedoresDados(Request $request){
        $consultafis = DB::table('fornecedoresfis')->get();
        $consultajur = DB::table('fornecedoresjur')->get();
        $fornecedoresfis = $consultafis->map(function($obj){
            return (array) $obj;
          })->toArray();
        $fornecedoresjur = $consultajur->map(function($obj){
        return (array) $obj;
        })->toArray();
        $fornecedores = array_merge($fornecedoresfis, $fornecedoresjur);
        return $fornecedores;
    }

    public function ConsultaCadastroEspecialidade(Request $request){
        $consultaselectespec = DB::table('especialidades')->orderBy('espec_nome')->get();
        $espec = ["id"=>[], "nome"=>[]];
        foreach($consultaselectespec as $consultaselectespec){
            array_push($espec["id"], $consultaselectespec->espec_id);
            array_push($espec["nome"], $consultaselectespec->espec_nome);
        }
        return $espec;
    }

    public function ConsultaCadastroCategoriaExame(Request $request){
        $consultaselectcateexame = DB::table('categoriasexames')->get();
        $cateexame = ["id"=>[], "nome"=>[]];
        foreach($consultaselectcateexame as $consultaselectcateexame){
            array_push($cateexame["id"], $consultaselectcateexame->cateexames_id);
            array_push($cateexame["nome"], $consultaselectcateexame->cateexames_nome);
        }
        return $cateexame;
    }

    public function ConsultaEspecialidadeMedico(Request $request){
        if($request->espec == 'todos'){
            $consultaselecmedico = DB::table('medicos')->orderBy('med_nome')->get();
        }else{
            $consultaselecmedico = DB::table('medicos')->where('med_espec', $request->espec)->orWhere('med_espec', 'like', $request->espec.',%')->orWhere('med_espec', 'like', '%,'.$request->espec)->orderBy('med_nome')->get();
        }
        $medico = ["id"=>[], "nome"=>[]];
        foreach($consultaselecmedico as $consultaselecmedico){
            array_push($medico["id"], $consultaselecmedico->med_id);
            array_push($medico["nome"], $consultaselecmedico->med_nome);
        }
        return $medico;
    }
    public function ConsultaAgendadeMedicos(Request $request){
        // dd($request->all());
        $data = explode('-', $request->data)[1] . '/' . explode('-', $request->data)[0];
        // dd($data);
        $dados = [[],[],[],[],[],[]];

        $dadosmedicos = [[],[],[],[]];

        if($request->espec == 'todos'){
            if($request->medico == 'todos'){
                $medicos = DB::table('medicos')->select('med_id')->orderBy('med_nome')->get();
                // dd($medicos);
                foreach($medicos as $medicos){
                    $consultaagendamedico = DB::table('agendamedico')
                    ->where('datamedico', 'like', $request->data.'%')
                    ->where('idmedico', $medicos->med_id)
                    ->orderBy('datamedico', 'ASC')
                    ->get();
                    foreach($consultaagendamedico as $consultaagendamedico){
                        array_push($dadosmedicos[0], $consultaagendamedico->idagendamedico);
                        array_push($dadosmedicos[1], $consultaagendamedico->datamedico);
                        array_push($dadosmedicos[2], $consultaagendamedico->horariosmedico);
                        array_push($dadosmedicos[3], $consultaagendamedico->idmedico);
                    }
                }

                // $consultaagendamedico = DB::table('agendamedico')
                // ->where('datamedico', 'like', $request->data.'%')
                // ->orderBy('datamedico', 'ASC')
                // ->get();
            }else{
                $medicos = DB::table('medicos')->select('med_id')->where('med_id', $request->medico)->orderBy('med_nome')->get();
                // dd($medicos);
                foreach($medicos as $medicos){
                    $consultaagendamedico = DB::table('agendamedico')
                    ->where('datamedico', 'like', $request->data.'%')
                    ->where('idmedico', $medicos->med_id)
                    ->orderBy('datamedico', 'ASC')
                    ->get();
                    foreach($consultaagendamedico as $consultaagendamedico){
                        array_push($dadosmedicos[0], $consultaagendamedico->idagendamedico);
                        array_push($dadosmedicos[1], $consultaagendamedico->datamedico);
                        array_push($dadosmedicos[2], $consultaagendamedico->horariosmedico);
                        array_push($dadosmedicos[3], $consultaagendamedico->idmedico);
                    }
                }

                // $consultaagendamedico = DB::table('agendamedico')
                // ->where('datamedico', 'like', $request->data.'%')
                // ->where('idmedico', $request->medico)
                // ->orderBy('datamedico')
                // ->get();
            }
        }else{
            if($request->medico == 'todos'){
                $medicos = DB::table('medicos')->select('med_id', 'med_espec')->where('med_espec', intval($request->espec))->orderBy('med_nome')->get();
                // dd($medicos);
                foreach($medicos as $medicos){
                    $consultaagendamedico = DB::table('agendamedico')
                    ->where('datamedico', 'like', $request->data.'%')
                    ->where('idmedico', $medicos->med_id)
                    ->orderBy('datamedico', 'ASC')
                    ->get();
                    foreach($consultaagendamedico as $consultaagendamedico){
                        array_push($dadosmedicos[0], $consultaagendamedico->idagendamedico);
                        array_push($dadosmedicos[1], $consultaagendamedico->datamedico);
                        array_push($dadosmedicos[2], $consultaagendamedico->horariosmedico);
                        array_push($dadosmedicos[3], $consultaagendamedico->idmedico);
                    }
                }
            }else{
                $medicos = DB::table('medicos')->select('med_id')->where('med_id', $request->medico)->orderBy('med_nome')->get();
                // dd($medicos);
                foreach($medicos as $medicos){
                    $consultaagendamedico = DB::table('agendamedico')
                    ->where('datamedico', 'like', $request->data.'%')
                    ->where('idmedico', $medicos->med_id)
                    ->orderBy('datamedico', 'ASC')
                    ->get();
                    foreach($consultaagendamedico as $consultaagendamedico){
                        array_push($dadosmedicos[0], $consultaagendamedico->idagendamedico);
                        array_push($dadosmedicos[1], $consultaagendamedico->datamedico);
                        array_push($dadosmedicos[2], $consultaagendamedico->horariosmedico);
                        array_push($dadosmedicos[3], $consultaagendamedico->idmedico);
                    }
                }

                // $consultaagendamedico = DB::table('agendamedico')
                // ->where('datamedico', 'like', $request->data.'%')
                // ->where('idmedico', $request->medico)
                // ->orderBy('datamedico')
                // ->get();

                // foreach($consultaagendamedico as $consultaagendamedico){
                //     array_push($dadosmedicos[0], $consultaagendamedico->idagendamedico);
                //     array_push($dadosmedicos[1], $consultaagendamedico->datamedico);
                //     array_push($dadosmedicos[2], $consultaagendamedico->horariosmedico);
                //     array_push($dadosmedicos[3], $consultaagendamedico->idmedico);
                // }
            }
        }
        
        // dd($dadosmedicos);
        for($i = 0; $i < count($dadosmedicos[3]); $i++){
            $medico = DB::table('medicos')->where('med_id', $dadosmedicos[3][$i])->first();
            $retornos = count(DB::table('agendas')->where('age_med', $dadosmedicos[3][$i])->where('age_data', 'like', '%'.$data.'%')->where('age_status', 'Retorno')->get());
            $atendimentos = count(DB::table('agendas')->where('age_med', $dadosmedicos[3][$i])->where('age_data', 'like', '%'.$data.'%')->get());
            array_push($dados[0], $dadosmedicos[0][$i]);
            array_push($dados[1], $medico->med_nome);
            array_push($dados[2], $dadosmedicos[1][$i]);
            array_push($dados[3], $dadosmedicos[2][$i]);
            array_push($dados[4], $medico->med_maxaten - $atendimentos);
            array_push($dados[5], $medico->med_maxret - $retornos);
        }
        // foreach ($consultaagendamedico as $consultaagendamedico) {
        //     $medico = DB::table('medicos')->where('med_id', $consultaagendamedico->idmedico)->first();
        //     $retornos = count(DB::table('agendas')->where('age_med', $consultaagendamedico->idmedico)->where('age_data', 'like', '%'.$data.'%')->where('age_status', 'Retorno')->get());
        //     $atendimentos = count(DB::table('agendas')->where('age_med', $consultaagendamedico->idmedico)->where('age_data', 'like', '%'.$data.'%')->get());
        //     array_push($dados[0], $consultaagendamedico->idagendamedico);
        //     array_push($dados[1], $medico->med_nome);
        //     array_push($dados[2], $consultaagendamedico->datamedico);
        //     array_push($dados[3], $consultaagendamedico->horariosmedico);
        //     array_push($dados[4], $medico->med_maxaten - $atendimentos);
        //     array_push($dados[5], $medico->med_maxret - $retornos);
        // }
        return $dados;
    }

    public function ConsultaAgendadeMedico(Request $request){
        // dd($request->all());
        $agenda = DB::table('agendamedico')->where('idagendamedico', $request->idagendamedico)->first();
        // dd($agenda);
        $data = explode('-',$agenda->datamedico);
        $data = $data[1] . "/" . $data[2] . "/" . $data[0];
        // $datadia = date('l', strtotime($data));
        // switch($datadia){
        //     case 'Monday':
        //         $datadia = 'medat_segunda';
        //     break;

        //     case 'Tuesday':
        //         $datadia = 'medat_terca';
        //     break;

        //     case 'Wednesday':
        //         $datadia = 'medat_quarta';
        //     break;
            
        //     case 'Thursday':
        //         $datadia = 'medat_quinta';
        //     break;
            
        //     case 'Friday':
        //         $datadia = 'medat_sexta';
        //     break;
            
        //     case 'Saturday':
        //         $datadia = 'medat_sabado';
        //     break;
            
        //     case 'Sunday':
        //         $datadia = 'medat_domingo';
        //     break;
        // }
        $consultaagendamedico = DB::table('agendamedico')
        ->where('idmedico', $agenda->idmedico)
        ->get();
        $consultaagenda = $consultaagendamedico->map(function($obj){
            return (array) $obj;
        })->toArray();

        $consultaagendamedico2 = DB::table('medico_atendimento')
        ->where('med_id', $agenda->idmedico)
        ->get();
        $consultaagenda2 = $consultaagendamedico2->map(function($obj){
            return (array) $obj;
        })->toArray();

        $horasagenda = explode('-',$agenda->horariosmedico);
        $horas = [];
        $i = 0;
        $dataagr = date('d/m/y '.$horasagenda[0]);
        $data = explode(' ', $dataagr);
        array_push($horas, $data[1]);
        $datawhile = [$data[0]];
        // dd($datawhile);
        if($horasagenda[1] == '00:00'){
            $horasagenda[1] = '24:00';
        }
        // dd($horas, $data, $data[1], $dataagr, $horasagenda);
        // dd($datawhile, $data[0], $data[1], $horasagenda);
        while($datawhile[0] == $data[0] && $data[1] < $horasagenda[1]){
            $bgl = '+ '.$consultaagenda2[0]['medat_tempoconsulta'].' minutes';
            // dd($bgl);
            $dataagr = strtotime($horas[$i] . $bgl);
            $dataagr = date('d/m/y H:i', $dataagr);
            $data = explode(' ', $dataagr);
            array_push($horas, $data[1]);
            $i++;
        }
        array_pop($horas);
        // dd($horas);
        
        $retorno = [$agenda->idmedico,$horas, $agenda->datamedico];
        return $retorno;
    }

    // public function ConsultaAgendadeMedico(Request $request){
    //     $verificador = 99999;
    //     $data = explode('-',$request->dia);
    //     $data = $data[1] . "/" . $data[2] . "/" . $data[0];
    //     // $datadia = date('l', strtotime($data));
    //     // switch($datadia){
    //     //     case 'Monday':
    //     //         $datadia = 'medat_segunda';
    //     //     break;

    //     //     case 'Tuesday':
    //     //         $datadia = 'medat_terca';
    //     //     break;

    //     //     case 'Wednesday':
    //     //         $datadia = 'medat_quarta';
    //     //     break;
            
    //     //     case 'Thursday':
    //     //         $datadia = 'medat_quinta';
    //     //     break;
            
    //     //     case 'Friday':
    //     //         $datadia = 'medat_sexta';
    //     //     break;
            
    //     //     case 'Saturday':
    //     //         $datadia = 'medat_sabado';
    //     //     break;
            
    //     //     case 'Sunday':
    //     //         $datadia = 'medat_domingo';
    //     //     break;
    //     // }
    //     $consultaagendamedico = DB::table('agendamedico')
    //     ->where('idmedico', $request->medico)
    //     ->get();
    //     $consultaagenda = $consultaagendamedico->map(function($obj){
    //         return (array) $obj;
    //     })->toArray();

    //     $consultaagendamedico2 = DB::table('medico_atendimento')
    //     ->where('med_id', $request->medico)
    //     ->get();
    //     $consultaagenda2 = $consultaagendamedico2->map(function($obj){
    //         return (array) $obj;
    //     })->toArray();
    //     // dd($consultaagenda, $request->medico);
    //     for($i = 0; $i < count($consultaagenda); $i++){
    //         if($consultaagenda[$i]['datamedico'] == $request->dia){
    //             $verificador = $i;
    //         }
    //     }
    //     // dd($consultaagenda, $request->dia, $verificador);
    //     if($verificador != 99999){
    //         $horasagenda = explode('-',$consultaagenda[$verificador]['horariosmedico']);
    //         $horas = [];
    //         $i = 0;
    //         $dataagr = date('d/m/y '.$horasagenda[0]);
    //         $data = explode(' ', $dataagr);
    //         array_push($horas, $data[1]);
    //         $datawhile = [$data[0]];
    //         // dd($datawhile);
    //         if($horasagenda[1] == '00:00'){
    //             $horasagenda[1] = '24:00';
    //         }
    //         // dd($horas, $data, $data[1], $dataagr, $horasagenda);
    //         // dd($datawhile, $data[0], $data[1], $horasagenda);
    //         while($datawhile[0] == $data[0] && $data[1] < $horasagenda[1]){
    //             $bgl = '+ '.$consultaagenda2[0]['medat_tempoconsulta'].' minutes';
    //             // dd($bgl);
    //             $dataagr = strtotime($horas[$i] . $bgl);
    //             $dataagr = date('d/m/y H:i', $dataagr);
    //             $data = explode(' ', $dataagr);
    //             array_push($horas, $data[1]);
    //             $i++;
    //         }
    //         array_pop($horas);
    //         // dd($horas);
            
    //         $consultaselecmedico = DB::table('medicos')->where('med_id', $request->medico)->get();
    //         $consulta = $consultaselecmedico->map(function($obj){
    //             return (array) $obj;
    //         })->toArray();
    //         // dd($consulta);
    //         $servicos = $consulta[0]['med_servi'];
    //         $servicos = explode(',', $servicos);
    //         $servi = ["id"=>[], "nome"=>[]];
    //         for($i = 0; $i < count($servicos); $i++){
    //             $consultaselectservi = DB::table('produtos')->where('prod_id', $servicos[$i])->get();
            
    //             foreach($consultaselectservi as $consultaselectservi){
    //                 array_push($servi["id"], $consultaselectservi->prod_id);
    //                 array_push($servi["nome"], $consultaselectservi->prod_nome);
    //             }

    //         }
            
    //         $retorno = [$consulta[0]['med_id'], $servi, $horas, $consulta[0]['med_maxaten'], $consulta[0]['med_maxret']];
    //         return $retorno;
    //     }else{
    //         return 2;
    //     }
    // }

    public function ConsultaAgendaHorario(Request $request){
        $horas = [];
        $data = explode('-',$request->data);
        $data = $data[2] . "/" . $data[1] . "/" . $data[0];
        $horadia = DB::table('agendas')
        ->where('age_data', 'like', $data.'%')
        ->where('age_med', $request->med_id)
        ->get();
        // dd($horadia);
        foreach($horadia as $horadia){
            array_push($horas, [$horadia->age_pessoa . ' - ' . $horadia->age_contrato, $horadia->age_status , explode(' - ',$horadia->age_data)[1], $horadia->age_prioridade]);
        }
        // dd($horas);
        return $horas;
        
    }

    public function ConsultaAgendaNomeContrato(Request $request){
        $nome = [];
        $cpf = [];
        $idtitu = [];
        $consultapacientes = DB::table('pacientes')->where('pac_nome', 'like', '%'.$request->nomepessoa.'%')->orWhere('pac_cpf', 'like', '%'.$request->nomepessoa.'%')->limit(50)->get();
        // dd($consultapacientes);
        $consultafornecedoresfis = DB::table('fornecedoresfis')->where('forfis_nome', 'like', '%'. $request->nomepessoa.'%')->orWhere('forfis_cpf', 'like', '%'.$request->nomepessoa.'%')->get();
        $consultafuncionarios = DB::table('funcionarios')->where('func_nome', 'like', '%'. $request->nomepessoa.'%')->orWhere('func_cpf', 'like', '%'.$request->nomepessoa.'%')->get();
        $consultafornecedoresjur = DB::table('fornecedoresjur')->where('forjur_nome', 'like', '%'. $request->nomepessoa.'%')->orWhere('forjur_cnpj', 'like', '%'.$request->nomepessoa.'%')->get();
        $consultaclientesjur = DB::table('clientesjur')->where('clijur_nome', 'like', '%'. $request->nomepessoa.'%')->orWhere('clijur_cnpj', 'like', '%'.$request->nomepessoa.'%')->get();
        if(count($consultapacientes) !=0 ){
            $consultapessoa = $consultapacientes->map(function($obj){
                return (array) $obj;
            })->toArray();
            foreach($consultapessoa as $consultapessoa){
                array_push($nome, $consultapessoa['pac_nome']);
                array_push($cpf, $consultapessoa['pac_cpf']);
                array_push($idtitu, str_pad($consultapessoa['pac_id'] , 4 , '0' , STR_PAD_LEFT) . "1");
            }
            
        }if(count($consultafornecedoresfis) !=0 ){
            $consultapessoa = $consultafornecedoresfis->map(function($obj){
                return (array) $obj;
            })->toArray();
            foreach($consultapessoa as $consultapessoa){
                array_push($nome, $consultapessoa['forfis_nome']);
                array_push($cpf, $consultapessoa['forfis_cpf']);
                array_push($idtitu, str_pad($consultapessoa['forfis_id'] , 4 , '0' , STR_PAD_LEFT) . "2");
            }

        }if(count($consultafuncionarios) !=0 ){
            $consultapessoa = $consultafuncionarios->map(function($obj){
                return (array) $obj;
            })->toArray();
            foreach($consultapessoa as $consultapessoa){
                array_push($nome, $consultapessoa['func_nome']);
                array_push($cpf, $consultapessoa['func_cpf']);
                array_push($idtitu, str_pad($consultapessoa['func_id'] , 4 , '0' , STR_PAD_LEFT) . "3");
            }

        }if(count($consultaclientesjur) !=0 ){
            $consultapessoa = $consultaclientesjur->map(function($obj){
                return (array) $obj;
            })->toArray();
            foreach($consultapessoa as $consultapessoa){
                array_push($nome, $consultapessoa['clijur_nome']);
                array_push($cpf, $consultapessoa['clijur_cnpj']);
                array_push($idtitu, str_pad($consultapessoa['clijur_id'] , 4 , '0' , STR_PAD_LEFT) . "4");
            }
            
        }if(count($consultafornecedoresjur) !=0 ){
            $consultapessoa = $consultafornecedoresjur->map(function($obj){
                return (array) $obj;
            })->toArray();
            foreach($consultapessoa as $consultapessoa){
                array_push($nome, $consultapessoa['forjur_nome']);
                array_push($cpf, $consultapessoa['forjur_cnpj']);
                array_push($idtitu, str_pad($consultapessoa['forjur_id'] , 4 , '0' , STR_PAD_LEFT) . "5");
            }
            
        }
        $pessoas = [];
        for($i = 0; $i < count($idtitu); $i++){
            array_push($pessoas, [$idtitu[$i], $nome[$i], $cpf[$i]]);
        }
        // dd($pessoas);
        $result = [];
        
        foreach($pessoas as $pessoas){
            $consultacontratos = DB::table('contratosobs')
            ->where('contobs_idpessoa', 'like', '%'.$pessoas[0].'%')
            ->where('contobs_status', 'Ativo')
            ->get();
            
            $consultacontratos2 = $consultacontratos->map(function($obj){
                return (array) $obj;
            })->toArray();
            array_push($result, [$pessoas[1],$pessoas[2], 'Particular']);
            if(count($consultacontratos2) > 0){
                for($i = 0; $i < count($consultacontratos2); $i++){
                    $planocontratoatual = DB::table('contratos')->where('cont_id', $consultacontratos2[$i]['contobs_id'])->first()->cont_plano;
                    $planocontratoatual1 = DB::table('planos')->where('plan_id', $planocontratoatual)->first()->plan_nome;
                    // dd();
                    array_push($result, [$pessoas[1],$pessoas[2], $consultacontratos2[$i]['contobs_id'], $planocontratoatual1]);
                }
            }
        }
        return $result;
    }

    public function ConsultaNomeCPF(Request $request){
        $nome = [];
        $cpf = [];
        $consultapacientes = DB::table('pacientes')->select('pac_nome', 'pac_cpf')->where('pac_nome', 'like', '%'.$request->nomepessoa.'%')->orWhere('pac_cpf', 'like', '%'.$request->nomepessoa.'%')->orderBy('pac_nome', 'ASC')->get();
        $consultafornecedoresfis = DB::table('fornecedoresfis')->select('forfis_nome', 'forfis_cpf')->where('forfis_nome', 'like', '%'. $request->nomepessoa.'%')->orWhere('forfis_cpf', 'like', '%'.$request->nomepessoa.'%')->orderBy('forfis_nome', 'ASC')->get();
        $consultafuncionarios = DB::table('funcionarios')->select('func_nome', 'func_cpf')->where('func_nome', 'like', '%'. $request->nomepessoa.'%')->orWhere('func_cpf', 'like', '%'.$request->nomepessoa.'%')->orderBy('func_nome', 'ASC')->get();
        $consultafornecedoresjur = DB::table('fornecedoresjur')->select('forjur_nome', 'forjur_cnpj')->where('forjur_nome', 'like', '%'. $request->nomepessoa.'%')->orWhere('forjur_cnpj', 'like', '%'.$request->nomepessoa.'%')->orderBy('forjur_nome', 'ASC')->get();
        $consultaclientesjur = DB::table('clientesjur')->select('clijur_nome', 'clijur_cnpj')->where('clijur_nome', 'like', '%'. $request->nomepessoa.'%')->orWhere('clijur_cnpj', 'like', '%'.$request->nomepessoa.'%')->orderBy('clijur_nome', 'ASC')->get();
        if(count($consultapacientes) !=0 ){
            $consultapessoa = $consultapacientes->map(function($obj){
                return (array) $obj;
            })->toArray();
            foreach($consultapessoa as $consultapessoa){
                array_push($nome, $consultapessoa['pac_nome']);
                array_push($cpf, $consultapessoa['pac_cpf']);
            }
            
        }if(count($consultafornecedoresfis) !=0 ){
            $consultapessoa = $consultafornecedoresfis->map(function($obj){
                return (array) $obj;
            })->toArray();
            foreach($consultapessoa as $consultapessoa){
                array_push($nome, $consultapessoa['forfis_nome']);
                array_push($cpf, $consultapessoa['forfis_cpf']);
            }

        }if(count($consultafuncionarios) !=0 ){
            $consultapessoa = $consultafuncionarios->map(function($obj){
                return (array) $obj;
            })->toArray();
            foreach($consultapessoa as $consultapessoa){
                array_push($nome, $consultapessoa['func_nome']);
                array_push($cpf, $consultapessoa['func_cpf']);
            }

        }if(count($consultaclientesjur) !=0 ){
            $consultapessoa = $consultaclientesjur->map(function($obj){
                return (array) $obj;
            })->toArray();
            foreach($consultapessoa as $consultapessoa){
                array_push($nome, $consultapessoa['clijur_nome']);
                array_push($cpf, $consultapessoa['clijur_cnpj']);
            }
            
        }if(count($consultafornecedoresjur) !=0 ){
            $consultapessoa = $consultafornecedoresjur->map(function($obj){
                return (array) $obj;
            })->toArray();
            foreach($consultapessoa as $consultapessoa){
                array_push($nome, $consultapessoa['forjur_nome']);
                array_push($cpf, $consultapessoa['forjur_cnpj']);
            }
            
        }
        $pessoas = [];
        for($i = 0; $i < count($nome); $i++){
            array_push($pessoas, [$nome[$i], $cpf[$i]]);
        }
        return $pessoas;
    }

    public function ConsultaNomeFornecedores(Request $request){
        $nome = [];
        $cpfcnpj = [];
        $consultafornecedoresfis = DB::table('fornecedoresfis')->select('forfis_nome', 'forfis_cpf')->where('forfis_nome', 'like', '%'. $request->nomepessoa.'%')->orWhere('forfis_cpf', 'like', '%'.$request->nomepessoa.'%')->orderBy('forfis_nome', 'ASC')->get();
        $consultafornecedoresjur = DB::table('fornecedoresjur')->select('forjur_nome', 'forjur_cnpj')->where('forjur_nome', 'like', '%'. $request->nomepessoa.'%')->orWhere('forjur_cnpj', 'like', '%'.$request->nomepessoa.'%')->orderBy('forjur_nome', 'ASC')->get();
        
        if(count($consultafornecedoresfis) !=0 ){
            $consultapessoa = $consultafornecedoresfis->map(function($obj){
                return (array) $obj;
            })->toArray();
            foreach($consultapessoa as $consultapessoa){
                array_push($nome, $consultapessoa['forfis_nome']);
                array_push($cpfcnpj, $consultapessoa['forfis_cpf']);
            }

        }if(count($consultafornecedoresjur) !=0 ){
            $consultapessoa = $consultafornecedoresjur->map(function($obj){
                return (array) $obj;
            })->toArray();
            foreach($consultapessoa as $consultapessoa){
                array_push($nome, $consultapessoa['forjur_nome']);
                array_push($cpfcnpj, $consultapessoa['forjur_cnpj']);
            }
            
        }
        $pessoas = [];
        for($i = 0; $i < count($nome); $i++){
            array_push($pessoas, [$nome[$i], $cpfcnpj[$i]]);
        }
        return $pessoas;
    }

    public function ConsultaAgendaNomeVendedor(Request $request){
        // dd($request->all());
        $nome = [];
        $consultavendedores = DB::table('users')->where('name', 'like', '%'.$request->nomepessoa.'%')->where('user_tipo', 8)->get();
        if(count($consultavendedores) !=0 ){
            $consultapessoa = $consultavendedores->map(function($obj){
                return (array) $obj;
            })->toArray();
            foreach($consultapessoa as $consultapessoa){
                array_push($nome, $consultapessoa['name']);
            }
            
        }
        return $nome;
    }

    public function ConsultaAgendaChegarAgenda(Request $request){
        $agendadados = ["id"=> [], "med" => []];
        $agenda = DB::table('agendas')->get();
        $consultaagenda = $agenda->map(function($obj){
            return (array) $obj;
        })->toArray();
        for($i = 0; $i < count($consultaagenda); $i++){
            array_push($agendadados['id'], $consultaagenda[$i]['age_id']);
            array_push($agendadados['med'], $consultaagenda[$i]['age_med']);

        }
        return $agendadados;
    }

    public function ConsultaCadastroServicoMedico(Request $request){
        // dd($request->all());
        $consultaselectespec = DB::table('especialidades')->where('espec_id', $request->espec)->get();
        $consultaselectcate = DB::table('categorias')->where('cate_nome', $consultaselectespec[0]->espec_nome)->get();
        $consultaselectservi = DB::table('produtos')->where('prod_cate', strval($consultaselectcate[0]->cate_id))->where('prod_tipo', 'Servico')->get();
        // dd($consultaselectservi, strval($consultaselectcate[0]->cate_id));
        $servi = ["id"=>[], "nome"=>[]];
        foreach($consultaselectservi as $consultaselectservi){
            array_push($servi["id"], $consultaselectservi->prod_id);
            array_push($servi["nome"], $consultaselectservi->prod_nome);
        }
        if($request->espec2 != null){
            $consultaselectespec = DB::table('especialidades')->where('espec_id', $request->espec2)->get();
            $consultaselectcate = DB::table('categorias')->where('cate_nome', $consultaselectespec[0]->espec_nome)->get();
            $consultaselectservi = DB::table('produtos')->where('prod_cate', strval($consultaselectcate[0]->cate_id))->where('prod_tipo', 'Servico')->get();
            // dd($consultaselectservi, strval($consultaselectcate[0]->cate_id));
            foreach($consultaselectservi as $consultaselectservi){
                array_push($servi["id"], $consultaselectservi->prod_id);
                array_push($servi["nome"], $consultaselectservi->prod_nome);
            }
        }
        
        return $servi;
    }

    public function ConsultaCadastroItem(Request $request){
        $consultaselectprod = DB::table('produtos')->where('prod_tipo','Item')->get();
        $prod = ["id"=>[], "nome"=>[], "valor"=>[]];
        // dd($consultaselectprod);
        foreach($consultaselectprod as $consultaselectprod){
            array_push($prod["id"], $consultaselectprod->prod_id);
            array_push($prod["nome"], $consultaselectprod->prod_nome);
            array_push($prod["valor"], $consultaselectprod->prod_valor);
        }
        return $prod;
    }

    public function CPFChecar(Request $request){
        // dd($request->all());
        $bloco_1 = substr($request->cpf,0,3);
        $bloco_2 = substr($request->cpf,3,3);
        $bloco_3 = substr($request->cpf,6,3);
        $dig_verificador = substr($request->cpf,-2);
        $cpf_formatado = $bloco_1.".".$bloco_2.".".$bloco_3."-".$dig_verificador;
        // dd($cpf_formatado);
        if($cpf_formatado != '000.000.000-00'){
            $consultacpf = DB::table('pacientes')->select('pac_id')->where('pac_cpf', $cpf_formatado)->get();
            if(count($consultacpf) > 0){
                return 1;
            }else{
                return 0;
            }
        }else{
            return 0;
        }
        
    }

    public function ConsultaDadosContrato(Request $request){
        // dd($request->all());
        $consultacontratos = DB::table('contratosobs')->where('contobs_idpessoa',intval($request->idpessoa))->where('contobs_status', 'Ativo')->get();
        // dd($consultacontratos, $request->all());
        $prod = ["contratosid"=>[], "contratoplano" => [], "contratosdados"=>["contratopessoa" => [], "contratotipo" => []]];
        // dd($consultacontratos);
        foreach($consultacontratos as $consultacontratos){
            $contratoatual = DB::table('contratos')->where('cont_id', $consultacontratos->contobs_id)->first();
            $planoatual = DB::table('planos')->where('plan_id', $contratoatual->cont_plano)->first();
            $contobsatualtitular = DB::table('contratosobs')->where('contobs_id', $consultacontratos->contobs_id)->where('contobs_tipo', 'Titular')->first();
            $contobsatualdependentes = DB::table('contratosobs')->where('contobs_id', $consultacontratos->contobs_id)->where('contobs_tipo', 'Dependente')->get();
            if($contobsatualtitular){
                if($contobsatualtitular->contobs_idpessoa[strlen($contobsatualtitular->contobs_idpessoa)- 1]  == 1 && $contobsatualtitular->contobs_status == "Ativo"){
                    // dd(intval(substr($contobsatualtitular->contobs_idpessoa, 0, -1)));
                    $nomepessoa = DB::table('pacientes')->select('pac_nome')->where('pac_id', intval(substr($contobsatualtitular->contobs_idpessoa, 0, -1)))->first();
                    // $nomepessoa = $nomepessoa->pac_nome;
                    // dd($nomepessoa);
                    array_push($prod["contratosid"], $consultacontratos->contobs_id);
                    array_push($prod["contratoplano"], $planoatual->plan_nome);
                    array_push($prod["contratosdados"]["contratopessoa"], $nomepessoa);
                    array_push($prod["contratosdados"]["contratotipo"], $contobsatualtitular->contobs_tipo);
                }else if($contobsatualtitular->contobs_idpessoa[strlen($contobsatualtitular->contobs_idpessoa)- 1]  == 2 && $contobsatualtitular->contobs_status == "Ativo"){
                    // dd(substr($contobsatualtitular->contobs_idpessoa, 0, -1));
                    $nomepessoa = DB::table('fornecedoresfis')->where('forfis_id', intval(substr($contobsatualtitular->contobs_idpessoa, 0, -1)))->first()->forfis_nome;
                    array_push($prod["contratosid"], $consultacontratos->contobs_id);
                    array_push($prod["contratoplano"], $planoatual->plan_nome);
                    array_push($prod["contratosdados"]["contratopessoa"], $nomepessoa);
                    array_push($prod["contratosdados"]["contratotipo"], $contobsatualtitular->contobs_tipo);
                }else if($contobsatualtitular->contobs_idpessoa[strlen($contobsatualtitular->contobs_idpessoa)- 1]  == 3 && $contobsatualtitular->contobs_status == "Ativo"){
                    // dd(substr($contobsatualtitular->contobs_idpessoa, 0, -1));
                    $nomepessoa = DB::table('funcionarios')->where('func_id', intval(substr($contobsatualtitular->contobs_idpessoa, 0, -1)))->first()->func_nome;
                    array_push($prod["contratosid"], $consultacontratos->contobs_id);
                    array_push($prod["contratoplano"], $planoatual->plan_nome);
                    array_push($prod["contratosdados"]["contratopessoa"], $nomepessoa);
                    array_push($prod["contratosdados"]["contratotipo"], $contobsatualtitular->contobs_tipo);
                }
            }
            // dd($contratoatual, $planoatual, $contobsatual);
            foreach ($contobsatualdependentes as $contobsatualdependentes) {
                if($contobsatualdependentes->contobs_idpessoa[strlen($contobsatualdependentes->contobs_idpessoa)- 1]  == 1 && $contobsatualdependentes->contobs_status == "Ativo"){
                    // dd(intval(substr($contobsatualdependentes->contobs_idpessoa, 0, -1)));
                    $nomepessoa = DB::table('pacientes')->select('pac_nome')->where('pac_id', intval(substr($contobsatualdependentes->contobs_idpessoa, 0, -1)))->first();
                    // $nomepessoa = $nomepessoa->pac_nome;
                    // dd($nomepessoa);
                    array_push($prod["contratosid"], $consultacontratos->contobs_id);
                    array_push($prod["contratoplano"], $planoatual->plan_nome);
                    array_push($prod["contratosdados"]["contratopessoa"], $nomepessoa);
                    array_push($prod["contratosdados"]["contratotipo"], $contobsatualdependentes->contobs_tipo);
                }else if($contobsatualdependentes->contobs_idpessoa[strlen($contobsatualdependentes->contobs_idpessoa)- 1]  == 2 && $contobsatualdependentes->contobs_status == "Ativo"){
                    // dd(substr($contobsatualdependentes->contobs_idpessoa, 0, -1));
                    $nomepessoa = DB::table('fornecedoresfis')->where('forfis_id', intval(substr($contobsatualdependentes->contobs_idpessoa, 0, -1)))->first()->forfis_nome;
                    array_push($prod["contratosid"], $consultacontratos->contobs_id);
                    array_push($prod["contratoplano"], $planoatual->plan_nome);
                    array_push($prod["contratosdados"]["contratopessoa"], $nomepessoa);
                    array_push($prod["contratosdados"]["contratotipo"], $contobsatualdependentes->contobs_tipo);
                }else if($contobsatualdependentes->contobs_idpessoa[strlen($contobsatualdependentes->contobs_idpessoa)- 1]  == 3 && $contobsatualdependentes->contobs_status == "Ativo"){
                    // dd(substr($contobsatualdependentes->contobs_idpessoa, 0, -1));
                    $nomepessoa = DB::table('funcionarios')->where('func_id', intval(substr($contobsatualdependentes->contobs_idpessoa, 0, -1)))->first()->func_nome;
                    array_push($prod["contratosid"], $consultacontratos->contobs_id);
                    array_push($prod["contratoplano"], $planoatual->plan_nome);
                    array_push($prod["contratosdados"]["contratopessoa"], $nomepessoa);
                    array_push($prod["contratosdados"]["contratotipo"], $contobsatualdependentes->contobs_tipo);
                }
                // dd($prod);
            }
            // array_push($prod["id"], $consultacontratos->prod_id);
            // array_push($prod["nome"], $consultacontratos->prod_nome);
            // array_push($prod["valor"], $consultacontratos->prod_valor);
        }
        return $prod;
    }

    public function ConsultaCadastroServico(Request $request){
        $consultaselectprod = DB::table('produtos')->where('prod_tipo','Exame')->orWhere('prod_tipo','Servico')->orderBy('prod_nome')->get();
        $prod = ["id"=>[], "nome"=>[], "valor"=>[]];
        foreach($consultaselectprod as $consultaselectprod){
            array_push($prod["id"], $consultaselectprod->prod_id);
            array_push($prod["nome"], $consultaselectprod->prod_nome);
            array_push($prod["valor"], $consultaselectprod->prod_valor);
        }
        return $prod;
    }

    public function ConsultaAgendaColaborador(Request $request){
        $consultaagendacolab = DB::table('calendariocolaboradores')->where('calcol_idcolaborador', $request->idcolaborador)->orderBy('calcol_data')->get();
        $calcol = ["evento"=>[], "data"=>[]];
        foreach($consultaagendacolab as $consultaagendacolab){
            array_push($calcol["evento"], $consultaagendacolab->calcol_even);
            array_push($calcol["data"], $consultaagendacolab->calcol_data);
        }
        return $calcol;
    }

    public function ConsultaAgendaAtendimentos(Request $request){
        // dd($request->all());
        $dataatual = explode('-',$request->data);
        // dd($dataatual);
        $dataatual = $dataatual[2] . '/' . $dataatual[1] . '/' .$dataatual[0];
        // dd($dataatual);
        $medico = DB::table('medicos')->select('med_maxaten', 'med_maxret')->where('med_id', $request->med_id)->first();
        $retornos = $medico->med_maxret - count(DB::table('agendas')->where('age_med', $request->med_id)->where('age_data','like', '%'.$dataatual.'%')->where('age_prioridade','Retorno')->get());
        $normais = $medico->med_maxaten - count(DB::table('agendas')->where('age_med', $request->med_id)->where('age_data','like', '%'.$dataatual.'%')->where('age_prioridade', '!=', 'Retorno')->get()) - count(DB::table('agendas')->where('age_med', $request->med_id)->where('age_data','like', '%'.$dataatual.'%')->where('age_prioridade','Retorno')->get());
        // dd($retornos, $normais);
        $calcol = [$normais,$retornos];
        
        return $calcol;
    }

    public function ConsultarAviso(Request $request){
        $consultaavisos = DB::table('avisos')->orderBy('aviso_id', 'DESC')->take(10)->get();
        // dd($consultaavisos);
        $avisos = ["id" => [], "titulo"=>[], "texto"=>[], "data"=>[]];
        foreach($consultaavisos as $consultaavisos){
            array_push($avisos["id"], $consultaavisos->aviso_id);
            array_push($avisos["titulo"], $consultaavisos->aviso_titulo);
            array_push($avisos["texto"], $consultaavisos->aviso_texto);
            array_push($avisos["data"], $consultaavisos->aviso_data);
        }
        return $avisos;
    }

    public function ConsultaAtendimento(Request $request){
        // dd($request->all());
        $consultaatendimento = DB::table('atendimentos')->orderBy('aten_id', 'DESC')->first();
        // dd($consultaatendimento);

        $atendimento = ["id"=>[], "pessoa"=>[], "sala"=>[], "espec"=>[]];
        array_push($atendimento["id"], $consultaatendimento->aten_id);
        array_push($atendimento["pessoa"], $consultaatendimento->aten_pessoa);
        if($consultaatendimento->aten_lugar == "Caixa"){
            array_push($atendimento["sala"], 'Caixa');
            array_push($atendimento["espec"], '');
        }else if($consultaatendimento->aten_lugar[0] == 'b'){
            array_push($atendimento["sala"], $consultaatendimento->aten_lugar);
            array_push($atendimento["espec"], '');
        }else{
            $laboratorio = DB::table('laboratorios')->where('lab_id', $consultaatendimento->aten_lugar)->first();
            // dd($laboratorio->lab_espec, $laboratorio->lab_num);
            
            array_push($atendimento["sala"], $laboratorio->lab_nome);
            array_push($atendimento["espec"], $laboratorio->lab_espec);
        }
        
        
        
        return $atendimento;
    }

    public function ConsultaListAgendaMedico(Request $request){

        // dd($request->all());

        $med_id = DB::table('medicos')->where('med_cpfcnpj', $request->cpfatual)->first()->med_id;

        $agendamedico = DB::table('agendamedico')->where('idmedico', $med_id)->where('datamedico', '>=', $request->datainicio)->where('datamedico', '<=', $request->datafim)->orderBy('datamedico')->get();

        $agendamedico2 = $agendamedico->map(function($obj){
        return (array) $obj;
        })->toArray();
        return $agendamedico2;
    }

    public function ConsultaListAgendaCliente(Request $request){

        $dados = ["idagenda"=>[], "data"=>[], "hora"=>[], "idmedico"=>[], "nomemedico" => [], "contrato" => [], "status" => []];

        // dd($request->all());

        $agenda = DB::table('agendas')->where('age_pessoa', 'like', '% - '.$request->cpfatual)->get();

        // $datainicio0 = explode('-', $request->datainicio);
        // $datafim0 = explode('-', $request->datafim);
        // // dd($datainicio0, $datafim0);
        // $datainicio = $datainicio0[2] . '/' . $datainicio0[1] . '/' . $datainicio0[0];
        // $datafim = $datafim0[2] . '/' . $datafim0[1] . '/' . $datafim0[0];
        // dd($datainicio, $datafim);
        // dd($agenda);
        foreach($agenda as $agenda){
            $medicoatual = DB::table('medicos')->where('med_id', $agenda->age_med)->first();
            $data = explode(' - ',$agenda->age_data);
            // dd($data);
            $dataatual = explode('/', $data[0]);
            $dataatual = $dataatual[2] . '-' . $dataatual[1] . '-' . $dataatual[0];
            // dd(strtotime($dataatual), strtotime($request->datafim), strtotime($request->datainicio));
            if(strtotime($dataatual) <= strtotime($request->datafim) && strtotime($dataatual) >= strtotime($request->datainicio)){
                array_push($dados['idagenda'], $agenda->age_id);
                array_push($dados['data'], $data[0]);
                array_push($dados['hora'], $data[1]);
                array_push($dados['idmedico'], $medicoatual->med_id);
                array_push($dados['nomemedico'], $medicoatual->med_nome);
                array_push($dados['contrato'], $agenda->age_contrato);
                array_push($dados['status'], $agenda->age_status);
            }
            
            // dd($medicoatual->med_id);
        }
        return $dados;
    }

    public function ConsultaListExamesCliente(Request $request){
        // dd($request->all());

        $dados = ["agenda" => [], "examespossiveis" => []];

        $agenda = DB::table('agendamentocliente')->where('idagenda',$request->idagenda)->get();

        $agenda2 = $agenda->map(function($obj){
            return (array) $obj;
        })->toArray();

        if(count($agenda2) > 0){
            $agendaatual = DB::table('agendas')->where('age_id',$agenda2[0]['idagenda'])->first();

            $especatualid = DB::table('medicos')->where('med_id', $agendaatual->age_med)->first()->med_espec;
            
            $especatualnome = DB::table('especialidades')->where('espec_id', $especatualid)->first()->espec_nome;
            
            $categoriaatualid = DB::table('categorias')->where('cate_nome', $especatualnome)->first()->cate_id;
    
            $examespossiveis = DB::table('produtos')->where('prod_cate', $categoriaatualid)->get();
    
            $examespossiveis2 = $examespossiveis->map(function($obj){
                return (array) $obj;
            })->toArray();
        
            array_push($dados['agenda'], $agenda2);
            array_push($dados['examespossiveis'], $examespossiveis2);
            return $dados;
        }else{
         return 1;   
        }
        
    }

    public function ConsultaListExamesPossiveis(Request $request){
        // dd($request->all());

        $exames = DB::table('produtos')->select('prod_id', 'prod_nome', 'prod_valor')->where('prod_tipo','Exame')->orWhere('prod_tipo', 'Servico')->orderBy('prod_nome', 'ASC')->get();
        // $agenda = DB::table('agendas')->where('age_id', $request->idagenda)->first();
        // $medico = DB::table('medicos')->select('med_servi')->where('med_id', $agenda->age_med)->first();
        // dd($medico);
        // $servimedico = explode(',', $medico->med_servi);
        
        $exames2 = $exames->map(function($obj){
            return (array) $obj;
        })->toArray();

        // foreach($servimedico as $servimedico){
        //     // dd($servimedico);
        //     $serviatual = DB::table('produtos')->select('prod_id', 'prod_nome', 'prod_valor')->where('prod_id', $servimedico)->get();
        //     $serviatual2 = $serviatual->map(function($obj){
        //         return (array) $obj;
        //     })->toArray();
        //     // dd($serviatual2, $exames2);
        //     $exames2 = array_merge($exames2, $serviatual2);
        //     // dd($exames2);
        // }
        // sort($exames2);
        return $exames2;
    }

    public function ConsultaGrupos(Request $request){
        // dd($request->all());

        $grupos = DB::table('grupos')->get();

        $grupos2 = $grupos->map(function($obj){
            return (array) $obj;
        })->toArray();
        
        return $grupos2;
    }
    
}
