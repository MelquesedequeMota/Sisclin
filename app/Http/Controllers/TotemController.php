<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TotemController extends Controller
{
    public function Totem(){
        return view('BotoesTotem');
    }

    public function TotemNovoNormal(){
        $consultatotem = DB::table('totems')
        ->where('tot_tipo', 'Normal')
        ->orderBy('tot_id', 'DESC')
        ->first();
        if($consultatotem == null){
            $novototem = DB::table('totems')->insert([
                'tot_nome' => "N001",
                'tot_tipo' => 'Normal',
                'tot_status' => 'Ativo'
            ]);
        }else{
            $nometotem = explode('N', $consultatotem->tot_nome);
            $nometotem = "N".str_pad(intval($nometotem[1])+1, 3, "0", STR_PAD_LEFT);
            $novototem = DB::table('totems')->insert([
                'tot_nome' => $nometotem,
                'tot_tipo' => 'Normal',
                'tot_status' => 'Ativo'
            ]);
        }

        if($novototem == 1){
            return 1;
        }else{
            return 0;
        }
    }

    public function TotemNovoPreferencial(){
        $consultatotem = DB::table('totems')
        ->where('tot_tipo', 'Preferencial')
        ->orderBy('tot_id', 'DESC')
        ->first();
        if($consultatotem == null){
            $novototem = DB::table('totems')->insert([
                'tot_nome' => "P001",
                'tot_tipo' => 'Preferencial',
                'tot_status' => 'Ativo'
            ]);
        }else{
            $nometotem = explode('P', $consultatotem->tot_nome);
            $nometotem = "P".str_pad(intval($nometotem[1])+1, 3, "0", STR_PAD_LEFT);
            $novototem = DB::table('totems')->insert([
                'tot_nome' => $nometotem,
                'tot_tipo' => 'Preferencial',
                'tot_status' => 'Ativo'
            ]);
        }

        if($novototem == 1){
            return 1;
        }else{
            return 0;
        }
    }

    public function PegarTotems(){
        $totems = ["id"=>[], "nome"=>[], "tipo"=>[], "status"=>[]];
        $consultatotem = DB::table('totems')->where('tot_status', '!=', 'Fechado')->get();
        $consultatotems = $consultatotem->map(function($obj){
            return (array) $obj;
        })->toArray();
        for($i = 0; $i < count($consultatotems); $i++){
            array_push($totems['id'], $consultatotems[$i]['tot_id']);
            array_push($totems['nome'], $consultatotems[$i]['tot_nome']);
            array_push($totems['tipo'], $consultatotems[$i]['tot_tipo']);
            array_push($totems['status'], $consultatotems[$i]['tot_status']);
        }
        return $totems;
    }

    public function FecharTotem(Request $request){
        $fechartotem = DB::table('totems')
                    ->where('tot_id', $request->totem)
                    ->update(["tot_status" => 'Fechado']);
        if($fechartotem == 1){
            return 1;
        }else{
            return 0;
        }
    }

}
