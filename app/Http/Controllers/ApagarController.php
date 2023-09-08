<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApagarController extends Controller
{
    public function ApagarEventoCalendario(Request $request){
        // dd($request->all());
        $conteudo = explode(' - ', $request->evento)[0];
        // dd($conteudo);
        $deletarevento = DB::table('calendariocolaboradores')
        ->where('calcol_data', $request->data)
        ->where('calcol_even', $conteudo)
        ->delete();
        if($deletarevento == 1){
            return 1;
        }else{
            return 0;
        }
    }

    public function ApagarAgendaMedico(Request $request){
        // dd($request->all());
        $data = explode('-',$request->dados[1]);
        $data = $data[2] . "/" . $data[1] . "/" . $data[0];
        $datahora = $data . ' - ' . $request->dados[0];
        // dd($datahora);
        $deletaragenda = DB::table('agendas')
        ->where('age_data', $datahora)
        ->delete();
        if($deletaragenda == 1){
            return 1;
        }else{
            return 0;
        }
    }

    public function ExcluirHorarioMedico(Request $request){
        // dd($request->all());
        for($i = 0; $i < count($request->idagendamedicoexcluir); $i++){
            $deletarhorario = DB::table('agendamedico')
            ->where('idagendamedico', $request->idagendamedicoexcluir[$i])
            ->delete();
        }
        return 1;
    }

    public function ExcluirAviso(Request $request){
        // dd($request->all());
        $deletarhorario = DB::table('avisos')
            ->where('aviso_id', $request->idaviso)
            ->delete();
        return 1;
    }

    public function ApagarExcluirAgendaCliente(Request $request){
        // dd($request->all());
        $delete = DB::table('agendamentocliente')->where('idagenda', $request->idagenda)->delete();
        $delete2 = DB::table('agendas')->where('age_id', $request->idagenda)->delete();
        return 1;
    }

    public function ChecarPessoa(Request $request){
        // dd($request->all());
        $idatual = substr($request->id, 0, -1);
        // dd($request->all(), $idatual);
        $checar = count(DB::table('contratosobs')->where('contobs_idpessoa', $request->id)->where('contobs_tipo', 'Titular')->where('contobs_status', 'Ativo')->get());
        if($checar == 0){
            return 1;
        }else{
            return 2;
        }
        
    }

    public function ExcluirPaciente(Request $request){
        // dd($request->all());
        $idatual = substr($request->id, 0, -1);
        // dd($request->all(), $idatual);
        $delete = DB::table('pacientes')->where('pac_id', $idatual)->delete();
        $deletecontratosobs = DB::table('contratosobs')->where('contobs_idpessoa', $request->id)->delete();
        return 1;
    }

    public function ExcluirContrato(Request $request){
        // dd($request->all());
        $deletecontasareceber = DB::table('contasareceber')->where('descconta', 'like', '%'.$request->id.'%')->where('recebidoconta', '0')->delete();
        $deletecobranca = DB::table('cobranca')->where('contrato', $request->id)->where('pago', '0')->delete();
        $checarcobranca = count(DB::table('cobranca')->where('contrato', $request->id)->get());
        if($checarcobranca == 0){
            $deletecobrancalote = DB::table('cobrancalote')->where('contratolote', $request->id)->delete();
        }
        $deletecontratosobs = DB::table('contratosobs')->where('contobs_id', $request->id)->delete();
        $deletecontratos = DB::table('contratos')->where('cont_id', $request->id)->delete();
        return 1;
    }

}
