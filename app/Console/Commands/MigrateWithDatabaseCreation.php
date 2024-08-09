<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MigrateWithDatabaseCreation extends Command
{
    protected $signature = 'migrate:with-db-creation';
    protected $description = 'Create the database if it does not exist and run migrations';

    public function handle()
    {
        // Create the database if it does not exist
        $this->call('db:create');

        // Run the migrations
        $this->call('migrate');

        $this->info('Migrations completed successfully.');
    }
}
