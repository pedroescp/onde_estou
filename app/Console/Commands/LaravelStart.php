<?php
// app/Console/Commands/LaravelStart.php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Process\Process;

class LaravelStart extends Command
{
    protected $signature = 'laravel:start';
    protected $description = 'Start the Laravel development server with custom options';

    public function handle()
    {
        // Inicia o servidor Laravel
        $this->call('serve', [
            '--host' => '0.0.0.0',
            '--port' => '8000',
        ]);

        // Aguarda o servidor Laravel iniciar antes de executar o npm run dev
        $this->info('Waiting for Laravel server to start...');
        sleep(5); // Aguarde 5 segundos para garantir que o servidor Laravel tenha iniciado

        // Executa o comando npm run dev para compilar os ativos
        $this->info('Running npm run dev to compile assets...');
        $process = new Process(['npm', 'run', 'dev']);
        $process->run();

        // Exibe a saída do processo npm run dev
        $this->info($process->getOutput());

        // Exibe mensagem indicando que o ambiente está pronto
        $this->info('Laravel development server is now running with compiled assets.');
    }
}
