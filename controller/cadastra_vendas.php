<?php
require_once('../model/bd.php');
require_once('../model/UsuarioController.php');
require_once('./verifica_login.php');

$conexao = criarConexao();
$usuarioController = new UsuarioController($conexao);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cpfCliente = $_POST['cpf_cliente'];
    $nomeCliente = $_POST['nome_cliente'];
    $valorVenda = $_POST['valor_venda'];
    $idVendedor = $_SESSION['id_usuario'];

    // Verifica se o CPF do cliente já está cadastrado na tabela de clientes
    $cliente = $usuarioController->obterClientePorCPF($cpfCliente);

    if (!$cliente) {
        // CPF não cadastrado, insere o cliente na tabela de clientes
        $usuarioController->inserirCliente($cpfCliente, $nomeCliente);
    }

    // Obtém o ID do cliente (já cadastrado ou recém-inserido)
    $idCliente = $usuarioController->obterIdClientePorCPF($cpfCliente);

    // Insere a venda na tabela de vendas
    $usuarioController->inserirVenda($idVendedor, $idCliente, $valorVenda);

    // Redireciona para a página de sucesso ou exibe uma mensagem
    header('Location:../view/painel.php');
    exit;
}
