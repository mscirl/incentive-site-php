<?php
require_once __DIR__ . '/vendor/autoload.php';

// Carrega o .env
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

echo "Tentando conectar ao banco da Locaweb...\n";

try {
    $host = $_ENV['DB_HOST'];
    $db   = $_ENV['DB_DATABASE'];
    $user = $_ENV['DB_USERNAME'];
    $pass = $_ENV['DB_PASSWORD'];

    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    echo "SUCESSO: O PHP conseguiu se conectar ao banco de dados da Locaweb!\n";
} catch (PDOException $e) {
    echo "ERRO: Não foi possível conectar. Verifique se os dados no .env estão corretos.\n";
    echo "Mensagem: " . $e->getMessage() . "\n";
}
