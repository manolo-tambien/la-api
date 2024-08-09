<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;
use PDOException;

class CreateDatabase extends Command
{
    protected $signature = 'db:create';
    protected $description = 'Create the database if it does not exist';

    public function handle()
    {
        $config = Config::get('database.connections.mysql');
        $dbName = $config['database'];
        $charset = $config['charset'];
        $collation = $config['collation'];

        try {
            // Create a connection to the MySQL server without selecting a database
            $pdo = new \PDO("mysql:host={$config['host']};port={$config['port']}", $config['username'], $config['password']);
            $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

            // Create the database if it does not exist
            $pdo->exec("CREATE DATABASE IF NOT EXISTS `$dbName` CHARACTER SET $charset COLLATE $collation;");
            $this->info("Database '$dbName' has been created or already exists.");

        } catch (PDOException $e) {
            $this->error("Could not connect to the database. Error: " . $e->getMessage());
            return 1;
        }

        return 0;
    }
}
