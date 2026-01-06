<?php
namespace Mscirl\IncentiveSitePhp\Api;

try {
    set_error_handler(function ($severity, $message, $file, $line) {
        //Convertendo todos os erros em exceptions para garantir que a aplicação não quebre
        throw new \ErrorException($message, 0, $severity, $file, $line);
    });

    set_exception_handler(function ($exception) {
        //Guardando o erro em um arquivo de log
        error_log($exception->getMessage());

        //Enviando resposta json com o erro
        http_response_code(500);
        header('Content-Type: application/json');
        echo json_encode([
            'error' => 'Internal Server Error',
            'message' => $exception->getMessage(),
        ]);
    });
} catch (Throwable $e) {
    error_log('Failed to set custom error/exception handlers: ' . $e->getMessage());
}