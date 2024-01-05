<?php
// app/Console/Commands/LaravelStart.php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class LaravelStart extends Command
{
    protected $signature = 'laravel:start';
    protected $description = 'Start the Laravel development server with custom options';

    public function handle()
    {
        $this->call('serve', [
            '--host' => '0.0.0.0',
            '--port' => '8000',
        ]);
    }
}
