<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class DbBackUp extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:backup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create BackUp for DataBase';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $timestamp = Carbon::now()->format('Y-m-d_H-i-s');
        $filename = "backup_" . $timestamp . ".sql";

        $backupPath = storage_path('app/backups/' . $filename);

        // Build mysqldump command
        $command = sprintf(
            'mysqldump --user=%s --password=%s --host=%s %s > %s',
            env('DB_USERNAME'),
            env('DB_PASSWORD'),
            env('DB_HOST'),
            env('DB_DATABASE'),
            $backupPath
        );

        // Execute mysqldump command
        exec($command);

        $this->info('Database backup created successfully.');
    }
}
