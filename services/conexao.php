<?php
    // Configuração do banco de dados
    $servidor = "roundhouse.proxy.rlwy.net";
    $db = "railway";
    $usuario = "root";
    $senha = "EaTPXTrsgvyOLhwvSLLCybxNSnJqvOlb";
    $porta = "21342";

    // Tentar estabelecer a conexão PDO
    try {
        // Cria uma nova conexão PDO
        $pdo = new PDO("mysql:host=$servidor;port=$porta;dbname=$db", $usuario, $senha);

        // Define o modo de erro do PDO para exceções
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $pdo->setAttribute(PDO::ATTR_TIMEOUT, 300); 
    } catch (PDOException $e) {
        // Em caso de falha na conexão, exibe uma mensagem de erro
        die("Falha na conexão: " . $e->getMessage());
    }
?>