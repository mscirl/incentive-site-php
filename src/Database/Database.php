<?php

namespace Mscirl\IncentiveSitePhp\Database;

use Illuminate\Database\Capsule\Manager as Capsule;

class Database {
    
    public static function init() {
        echo "Database::init() iniciado\n";
        
        try {
            $capsule = new Capsule;
            echo "Capsule criado\n";
        } catch (Exception $e) {
            die("Erro ao criar Capsule: " . $e->getMessage() . "\n");
        }

        // Lê as variáveis do .env
        $dbConnection = $_ENV['DB_CONNECTION'] ?? 'sqlite';
        $dbDatabase = $_ENV['DB_DATABASE'] ?? 'curriculos.db';
        
        echo "Configuração: $dbConnection | $dbDatabase\n";

        // Condição para conexão SQLite
        if ($dbConnection === 'sqlite') {
            // Define o caminho do banco na raiz do projeto
            $dbPath = dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . $dbDatabase;
            
            echo "> Caminho do banco: $dbPath\n";
            
            try {
                $capsule->addConnection([
                    'driver'   => 'sqlite',
                    'database' => $dbPath,
                    'prefix'   => '',
                ]);
                echo "> Conexão SQLite configurada\n";
            } catch (Exception $e) {
                die("> Erro na conexão SQLite: " . $e->getMessage() . "\n");
            }
        }

        // Torna o Capsule disponível globalmente
        try {
            $capsule->setAsGlobal();
            echo "Capsule global\n";
        } catch (Exception $e) {
            die("> Erro setAsGlobal: " . $e->getMessage() . "\n");
        }

        // Inicializa o Eloquent ORM
        try {
            $capsule->bootEloquent();
            echo ">Eloquent iniciado\n";
        } catch (Exception $e) {
            die("> Erro bootEloquent: " . $e->getMessage() . "\n");
        }

        // Criação de tabelas
        try {
            self::createTables();
            echo "> Tabelas criadas/verificadas\n";
        } catch (Exception $e) {
            die("> Erro createTables: " . $e->getMessage() . "\n");
        }
        
        echo "Database::init() concluído\n";
    }

private static function createTables() {
    echo "> createTables() iniciado\n";
    
    $dbPath = dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . ($_ENV['DB_DATABASE'] ?? 'curriculos.db');
    
    if (!file_exists($dbPath)) {
        echo "> Criando arquivo do banco: $dbPath\n";
        
        touch($dbPath);
        chmod($dbPath, 0664);
        
        echo "Arquivo do banco criado!\n";
    } else {
        echo "Arquivo do banco já existe\n";
    }
    // ====================================================================
    
    try {
        $capsule = Capsule::connection();
        echo "> Conexão obtida\n";
    } catch (Exception $e) {
        die("> Erro ao obter conexão: " . $e->getMessage() . "\n");
    }
    
    // Verifica se a tabela 'curriculos' já existe
    try {
        $hasTable = $capsule->getSchemaBuilder()->hasTable('curriculos');
        echo "> Tabela 'curriculos' existe? " . ($hasTable ? 'Sim' : 'Não') . "\n";
    } catch (Exception $e) {
        die("> Erro ao verificar tabela: " . $e->getMessage() . "\n");
    }

    if (!$hasTable) {
        echo "> Criando tabela 'curriculos'...\n";
        
        try {
            $capsule->getSchemaBuilder()->create('curriculos', function ($table) {
                $table->increments('id');
                $table->string('nome', 200);
                $table->string('cv_link', 300)->nullable();
                $table->timestamps();
            });
            echo "> Tabela 'curriculos' criada!\n";
        } catch (Exception $e) {
            die("> Erro ao criar tabela: " . $e->getMessage() . "\n");
        }
    }
    
    echo "createTables() concluído\n";
}
}