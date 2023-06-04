<?php

require_once('../model/bd.php');
require_once('../model/UsuarioController.php');
require_once('verifica_login.php');

$id = $_SESSION['id_usuario'];

$conexao = criarConexao();
$usuarioController = new UsuarioController($conexao);

$vendas = $usuarioController->pegaVendasVendedor($id);

