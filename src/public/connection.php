<?php

// src/database/connection.php

// Define o fuso horário (Configuração global)
date_default_timezone_set('America/Sao_Paulo');

$host = 'db';
$db   = 'greenblog';
$user = 'user';
$pass = '5A328WH9C';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // Mostra erros de banco
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,       // Traz arrays associativos
    PDO::ATTR_EMULATE_PREPARES   => false,                  // Segurança real
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    // Em produção, não mostre a mensagem real do erro (vaza senha)
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

return $pdo;
