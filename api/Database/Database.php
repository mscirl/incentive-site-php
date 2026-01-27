<?php

namespace Mscirl\IncentiveSitePhp\Database;

//Utilizando a classe Capsule do Illuminate Database
use Illuminate\Database\Capsule\Manager as Capsule;

//Classe Database para gerenciar a conexão com o banco de dados
class Database {
    //Inicializando ORM Eloquent (transformação de objetos em sql)
    public static function init() {
        $capsule = new Capsule;

        //Lê as variáveis do .env
        $dbConnection = $_ENV['DB_CONNECTION'] ?? 'sqlite';
        $dbDatabase = $_ENV['DB_DATABASE'] ?? 'curriculos.db';

        //Condição para conexão sqlite
        if ($dbConnection === 'sqlite') {
                $dbPath = $_ENV['DB_PATH'] ?? dirname(__DIR__, 2);

                //DEBUG
                echo "Caminho do banco [class Database] " . $dbPath . "\n";
                exit;

                $capsule->addConnection([
                'driver' => 'sqlite',
                #Utilizando dirname(__DIR__, 2) para voltar dois níveis na estrutura de pastas
                'database' => $dbPath . DIRECTORY_SEPARATOR . $dbDatabase,
                'prefix'   => ''
            ]);
        }

        //Torna o Capsule disponível globalmente na aplicação utilizando o método da classe Manager do Illuminate Database
        $capsule->setAsGlobal();

        //Inicializa o Eloquent ORM
        $capsule->bootEloquent();

        //Chama o método private createTables() da própria classe, que é definido abaixo
        //No PHP: dentro das classes, a ordem não importa
        self::createTables();
    }

    //Criando a o método private createTables()
    //Utilizando método "private" porque criar tabelas é uma tarefa "interna", ninguém de fora deve criar tabelas na aplicação
    private static function createTables() {
        $capsule = Capsule::connection();
        
        //Verificando se a tabela 'curriculos' já existe
        if (!$capsule->getSchemaBuilder()->hasTable('curriculos')) {

            //Se não existir, cria a tabela usando function($table) +campos necessários
            $capsule->getSchemaBuilder()->create('curriculos', function ($table) {
                $table->increments('id'); //Incremento automático
                $table->string('nome', 200);
                $table->string('cv_link', 300)->nullable(); //Pode ser nulo/vazio (campo opcional)
                $table->timestamps(); //Registra data de criação e/ou atualização
            });
        }
    }
}
