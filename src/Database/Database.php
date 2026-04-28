// ========== INICIALIZAÇÃO DO BANCO ==========
try {
    // Forçar a exibição de erros do banco
    Database::init();
    // Teste simples para ver se a conexão está viva
    \Illuminate\Support\Facades\DB::connection()->getPdo();
} catch (Exception $e) {
    header('Content-Type: application/json');
    echo json_encode([
        'success' => false, 
        'erro_tecnico' => $e->getMessage(),
        'dica' => 'Verifique se o host e a senha no .env estão corretos para a Locaweb'
    ]);
    exit;
}