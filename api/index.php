<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

/**
 * API de Currículos Lattes - Versão Produção
 */

require_once __DIR__ . '/../vendor/autoload.php';

use Mscirl\IncentiveSitePhp\Database\Database;
use Mscirl\IncentiveSitePhp\Models\Curriculo;
use Slim\Factory\AppFactory;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

// ========== CARREGAMENTO DO .ENV ==========
try {
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
    $dotenv->load();
} catch (Exception $e) {
    header('Content-Type: application/json');
    echo json_encode([
        'success' => false, 
        'erro' => 'Arquivo .env não encontrado',
        'caminho_procurado' => realpath(__DIR__ . '/..'),
        'detalhe' => $e->getMessage()
    ]);
    exit;
}

// ========== INICIALIZAÇÃO DO BANCO ==========
try {
    Database::init();
} catch (Exception $e) {
    header('Content-Type: application/json');
    echo json_encode([
        'success' => false, 
        'erro' => 'Erro ao conectar com banco de dados',
        'detalhe' => $e->getMessage(),
        'config' => [
            'host' => $_ENV['DB_HOST'] ?? 'não definido',
            'database' => $_ENV['DB_DATABASE'] ?? 'não definido',
            'username' => $_ENV['DB_USERNAME'] ?? 'não definido'
        ]
    ]);
    exit;
}

$app = AppFactory::create();
$app->setBasePath('/api');

// ========== MIDDLEWARE DE CORS ==========
$app->add(function (Request $request, $handler) {
    $response = $handler->handle($request);
    return $response
        ->withHeader('Access-Control-Allow-Origin', '*')
        ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
        ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
        ->withHeader('Content-Type', 'application/json');
});

// ========== ROTAS ==========
$app->get('/health', function (Request $request, Response $response) {
    $data = [
        'success' => true, 
        'status' => 'healthy',
        'database' => 'connected'
    ];
    $response->getBody()->write(json_encode($data));
    return $response;
});

$app->get('/', function (Request $request, Response $response) {
    $data = ['success' => true, 'mensagem' => 'API de Currículos Lattes ativa.'];
    $response->getBody()->write(json_encode($data));
    return $response;
});

$app->get('/curriculos', function (Request $request, Response $response) {
    try {
        $curriculos = Curriculo::all();
        $response->getBody()->write(json_encode([
            'success' => true, 
            'data' => $curriculos,
            'total' => count($curriculos)
        ]));
        return $response;
    } catch (Exception $e) {
        $response->getBody()->write(json_encode([
            'success' => false,
            'erro' => 'Erro ao buscar currículos',
            'detalhe' => $e->getMessage()
        ]));
        return $response->withStatus(500);
    }
});

$app->run();