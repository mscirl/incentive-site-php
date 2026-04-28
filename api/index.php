<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

/**
 * API de Currículos Lattes - Versão Produção (LIMPA)
 */

require_once __DIR__ . '/../vendor/autoload.php';


use Mscirl\IncentiveSitePhp\Database\Database;
use Mscirl\IncentiveSitePhp\Models\Curriculo;
use Slim\Factory\AppFactory;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

// ========== INICIALIZAÇÃO ==========
try {
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
    $dotenv->load();
} catch (Exception $e) { }

//try {
//    Database::init();
//} catch (Exception $e) {
//    header('Content-Type: application/json');
//    echo json_encode(['success' => false, 'erro' => 'Erro de banco de dados.']);
//    exit;
//}

$app = AppFactory::create();

$app->setBasePath('');

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
    $data = ['success' => true, 'status' => 'healthy'];
    $response->getBody()->write(json_encode($data));
    return $response;
});

$app->get('/', function (Request $request, Response $response) {
    $data = ['success' => true, 'mensagem' => 'API ativa.'];
    $response->getBody()->write(json_encode($data));
    return $response;
});

$app->get('/curriculos', function (Request $request, Response $response) {
    $curriculos = Curriculo::all();
    $response->getBody()->write(json_encode(['success' => true, 'data' => $curriculos]));
    return $response;
});

$app->run();

