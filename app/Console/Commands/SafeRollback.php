<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class SafeRollback extends Command
{
    protected $signature = 'migrate:safe-rollback {--step= : Number of batches to rollback}';
    protected $description = 'Safely rollback migrations with foreign key handling';

    public function handle()
    {
        // Отключаем проверку внешних ключей
        Schema::disableForeignKeyConstraints();

        $step = $this->option('step');

        if ($step) {
            $this->call('migrate:rollback', ['--step' => $step]);
        } else {
            $this->call('migrate:rollback');
        }

        // Включаем обратно
        Schema::enableForeignKeyConstraints();

        $this->info('Migrations rolled back safely with foreign key constraints disabled.');
    }
}
