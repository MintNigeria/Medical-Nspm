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
         // Generate timestamp for filename
         $timestamp = Carbon::now()->format('Y-m-d_H-i-s');
        
         // Generate filename
         $filename = "backup_" . $timestamp . ".sql";
 
         // Set the backup directory path
         $backupPath = storage_path('app/backups/' . $filename);
 
         // Full path to mysqldump executable
         $mysqldumpPath = "\"C:\\Program Files\\MySQL\\MySQL Server 8.0\\bin\\mysqldump\"";
 
         // Build mysqldump command
         $command = sprintf(
             '%s --user=%s --password=%s --host=%s %s > %s',
             $mysqldumpPath,
             env('DB_USERNAME'),
             env('DB_PASSWORD'),
             env('DB_HOST'),
             env('DB_DATABASE'),
             $backupPath
         );
 
         // Execute mysqldump command
         exec($command, $output, $return_var);
 
         // Check if the command executed successfully
         if ($return_var === 0) {
             $this->info('Database backup created successfully.');
         } else {
             $this->error('Database backup failed.');
         }
    }
}
