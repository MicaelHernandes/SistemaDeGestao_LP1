<?php
require_once('../model/bd.php');
require_once('../model/UsuarioController.php');
require_once('./verifica_login.php');

// Crie a conexão com o banco de dados
$conexao = criarConexao(); // Certifique-se de que a função criarConexao() esteja definida no arquivo bd.php

$usuarioController = new UsuarioController($conexao);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    session_start();
    $cpf = $_POST['cpf'];
    $senha = $_POST['senha'];

    $colaborador = $usuarioController->verificarLogin($cpf, $senha);

    if ($colaborador) {

            $_SESSION['id_usuario'] = $colaborador['id'];
            $_SESSION['nome_usuario'] = $colaborador['nome'];
            $_SESSION['cargo_usuario'] = $colaborador['cargo'];
            $colaborador = null;
            header('Location:../view/painel.php');
            exit;
        
    } else {
        $_SESSION['erro_login'] = true;
        header('Location:../index.php');
    }
}
