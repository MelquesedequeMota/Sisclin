<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class EsvaziarAgendamentosInadimplencia extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'esvaziaragendamentosinadimplencia:esvaziar';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Apaga todos os agendamentos de datas passadas da tabela de agendamentos da inadimplencia';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $timezone = new \DateTimeZone('America/Sao_Paulo');
        $agora = new \DateTime('now', $timezone);
        // return $agora->format('Y-m-d');
        DB::table('agendacobrancas')->where('agendacobranca_data', '<' ,$agora->format('Y-m-d'))->delete();
    }
}
