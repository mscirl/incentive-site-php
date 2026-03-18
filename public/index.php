<?php

require_once __DIR__ . '/../vendor/autoload.php';


// ========== FUNÇÃO ILLUMINATE ==========
if (!function_exists('base_path')) {
    function base_path($path = '') {
        return __DIR__ . '/../' . ltrim($path, '/');
    }
}

// ========== IMPORTS ==========
use Mscirl\IncentiveSitePhp\Database\Database;
use Mscirl\IncentiveSitePhp\Models\Curriculo;
use Slim\Factory\AppFactory;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

echo "> Imports carregados\n\n";
// ============================================

try {
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
    $dotenv->load();
    echo "> .env carregado\n\n";
} catch (Exception $e) {
    echo "> Aviso .env: " . $e->getMessage() . "\n\n";
}

try {
    Database::init();
    echo "> Database inicializado\n";
} catch (Exception $e) {
    die("> Erro ao inicializar Database: " . $e->getMessage() . "\n\n");
}

try {
    $app = AppFactory::create();
    echo "> Slim criado\n\n";
} catch (Exception $e) {
    die("> Erro ao criar Slim: " . $e->getMessage() . "\n\n");
}

// ========== ROTAS DA API==========

$app->get('/', function (Request $request, Response $response) {
    $data = ['mensagem' => 'API de Currículos Lattes no ar.'];
    $response->getBody()->write(json_encode($data, JSON_PRETTY_PRINT));
    return $response->withHeader('Content-Type', 'application/json');
});

$app->get('/test/create', function (Request $request, Response $response) {
    try {
        $curriculo = new Curriculo();
        $curriculo->nome = 'Thais Maciel - Teste ' . date('H:i:s');
        $curriculo->cv_link = 'http://lattes.cnpq.br/test' . rand(1000, 9999);
        $curriculo->save();
        
        $data = [
            'mensagem' => 'Currículo criado com sucesso!',
            'id' => $curriculo->id,
            'nome' => $curriculo->nome,
            'cv_link' => $curriculo->cv_link
        ];
        
        $response->getBody()->write(json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
        return $response->withHeader('Content-Type', 'application/json');
    } catch (Exception $e) {
        $error = ['erro' => $e->getMessage(), 'trace' => $e->getTraceAsString()];
        $response->getBody()->write(json_encode($error, JSON_PRETTY_PRINT));
        return $response->withStatus(500)->withHeader('Content-Type', 'application/json');
    }
});

$app->get('/test/list', function (Request $request, Response $response) {
    try {
        $curriculos = Curriculo::all();
        $response->getBody()->write($curriculos->toJson(JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
        return $response->withHeader('Content-Type', 'application/json');
    } catch (Exception $e) {
        $error = ['erro' => $e->getMessage()];
        $response->getBody()->write(json_encode($error, JSON_PRETTY_PRINT));
        return $response->withStatus(500)->withHeader('Content-Type', 'application/json');
    }
});

echo "Rotas definidas\n";

try {
    $app->run();
} catch (Exception $e) {
    die("> Erro ao rodar app: " . $e->getMessage() . "\n\n");
}