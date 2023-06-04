<?php

require_once('../model/bd.php');
require_once('../model/UsuarioController.php');
require_once('./verifica_login.php');

$cpf = $_POST['cpf'];
$conexao = criarConexao();
$usuarioController = new UsuarioController($conexao);

$cliente = $usuarioController->obtemNome($cpf);


if ($cliente) {
    echo $cliente['nome'];
} else {
    echo '';
}
