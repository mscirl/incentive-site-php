<?php

namespace Mscirl\IncentiveSitePhp\Database;

use Illuminate\Database\Capsule\Manager as Capsule;

class Database
{
    public static function init()
    {
        $capsule = new Capsule;

        // Verifica qual driver usar do .env (padrão sqlite se não definido)
        $driver = $_ENV['DB_DRIVER'] ?? 'sqlite';

        if ($driver === 'sqlite') {
            $databasePath = $_ENV['DB_DATABASE'] ?? __DIR__ . '/../../database.sqlite';
            
            // Garante que o caminho seja absoluto para o SQLite
            if (!str_starts_with($databasePath, '/')) {
                $databasePath = realpath(__DIR__ . '/../../') . '/' . $databasePath;
            }

            $capsule->addConnection([
                'driver'   => 'sqlite',
                'database' => $databasePath,
                'prefix'   => '',
            ]);
        } else {
            // Configuração para MySQL (Recomendado para Locaweb)
            $capsule->addConnection([
                'driver'    => 'mysql',
                'host'      => $_ENV['DB_HOST'] ?? 'localhost',
                'database'  => $_ENV['DB_DATABASE'] ?? '',
                'username'  => $_ENV['DB_USERNAME'] ?? '',
                'password'  => $_ENV['DB_PASSWORD'] ?? '',
                'charset'   => 'utf8',
                'collation' => 'utf8_unicode_ci',
                'prefix'    => '',
            ]);
        }

        $capsule->setAsGlobal();
        $capsule->bootEloquent();
    }
}
