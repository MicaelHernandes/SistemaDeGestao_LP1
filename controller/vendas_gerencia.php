<?php

require_once('../model/bd.php');
require_once('../model/UsuarioController.php');
require_once('verifica_login.php');

if($_SESSION['cargo_usuario'] != 'GERENTE VENDAS'){
    $_SESSION['nao-autorizado'] = true;
    header('Location: ../index.php');
    exit;
}

$conexao = criarConexao();  
$vendedorController = new UsuarioController($conexao);
$vendedor = $vendedorController->obterVendedoresComTotalVendas();   
$vendas = $vendasComNomeVendedor = $vendedorController->obterVendasComNomeVendedor();
