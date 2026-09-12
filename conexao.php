<?php

$host = "IP-DO-BANCO-AQUI";
$usuario = "SEU-USUARIO-DO-BANCO";
$banco = "NOME-DO-SEU-BANCO";
$senha = "SUA-SENHA-AQUI";

$pdo = new PDO (
    "pgsql:host=$host;port=5432;dbname=$banco",
    $usuario,
    $senha
);