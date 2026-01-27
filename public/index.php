<?php

//Carrega dependências do composer
require __DIR__ . '/../vendor/autoload.php';

//Carrega variáveis de ambiente (.env)
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();


//Inicializa o banco
use Mscirl\IncentiveSitePhp\Database\Database;
Database::init();

//Importa o model no TOPO do arquivo
use Mscirl\IncentiveSitePhp\Models\Curriculo;

//Cria a aplicação slim
use Slim\Factory\AppFactory;
$app = AppFactory::create();


//ROTAS DE TESTE

//Rota 1: Teste de funcionamento
$app->get('/', function ($request, $response) {
    $data = ['mensagem' => 'API de Currículos Lattes está no ar!'];
    $response->getBody()->write(json_encode($data));
    return $response->withHeader('Content-Type', 'application/json');
});

//Rota 2: Criar currículo
$app->get('/test/create', function ($request, $response) {
    $curriculo = new Curriculo();
    $curriculo->nome = 'Thais Maciel';
    $curriculo->cv_link = 'http://lattes.cnpq.br/test123';
    $curriculo->save();
    
    $data = [
        'mensagem' => 'Currículo criado com sucesso.',
        'id' => $curriculo->id,
        'nome' => $curriculo->nome
    ];
    
    $response->getBody()->write(json_encode($data));
    return $response->withHeader('Content-Type', 'application/json');
});

//Rota 3: Listar currículos
$app->get('/test/list', function ($request, $response) {
    $curriculos = Curriculo::all();
    
    $response->getBody()->write($curriculos->toJson());
    return $response->withHeader('Content-Type', 'application/json');
});

//Inicia aplicação
$app->run();