<?php
require_once('../controller/verifica_login.php');


function criarConexao()
{
    $host = "172.17.0.2";
    $port = 3306;
    $dbname = "SYSBIN";
    $usuario = "root";
    $senha = "ifsp@123";
    try {
        $conexao = new PDO("mysql:host=$host;dbname=$dbname", $usuario, $senha);
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conexao;
    } catch (PDOException $e) {
        echo 'Erro na conexão com o banco de dados: ' . $e->getMessage();
        return null;
    }
}
