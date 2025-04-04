<?php

declare(strict_types=1);

$dominio = 'mysql:host=mysql:3306;dbname=dblp';
$usuario = 'root';
$senha = 'password';

try {

    $pdo = new PDO($dominio, $usuario, $senha);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erro de conexão: " . $e->getMessage();
}
