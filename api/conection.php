<?php
// Ativar erros máximos
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Dados do seu print da Locaweb
$host = "incentive.mysql.dbaas.com.br";
$db   = "incentive";
$user = "incentive";
$pass = "a@x4Gr7Rsys"; // Coloque a senha que você conferiu no painel

echo "<h3>Testando Conexão com o Banco:</h3>";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    echo "<p style='color:green'>Sucesso! O PHP conseguiu conectar ao banco.</p>";
    
    // Teste de tabela
    $query = $pdo->query("SHOW TABLES LIKE 'curriculos'");
    if ($query->rowCount() > 0) {
        echo "<p style='color:green'>Tabela 'curriculos' encontrada!</p>";
    } else {
        echo "<p style='color:orange'>Conectou, mas a tabela 'curriculos' NÃO existe no banco.</p>";
    }
    
} catch (PDOException $e) {
    echo "<p style='color:red'>Falha na conexão:</p>";
    echo "<pre>" . $e->getMessage() . "</pre>";
}