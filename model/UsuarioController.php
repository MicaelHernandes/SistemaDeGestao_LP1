<?php
require_once('../controller/verifica_login.php');
class UsuarioController
{
    private $conexao;

    public function __construct($conexao)
    {
        $this->conexao = $conexao;
    }

    public function consultarUsuarios()
    {
        $consulta = "SELECT * FROM usuarios";
        $stmt = $this->conexao->prepare($consulta);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function verificarLogin($cpf, $senha)
    {
        try {
            $consulta = "SELECT * FROM colaboradores WHERE cpf = :cpf AND senha = :senha";
            $stmt = $this->conexao->prepare($consulta);
            $stmt->bindParam(':cpf', $cpf);
            $stmt->bindParam(':senha', $senha);
            $stmt->execute();
            $colaborador = $stmt->fetch(PDO::FETCH_ASSOC);

            return $colaborador;
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
            return false;
        }
    }
    public function obtemNome($cpf)
    {
        $consulta = "SELECT nome FROM clientes WHERE cpf = :cpf";
        $stmt = $this->conexao->prepare($consulta);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->execute();
        $cliente = $stmt->fetch(PDO::FETCH_ASSOC);

        return $cliente;
    }
    public function pegaVendasVendedor($idVendedor)
    {
        $consulta = "SELECT v.*, c.nome AS nome_cliente FROM vendas v 
        JOIN clientes c ON v.usuario_id = c.id 
        WHERE v.vendedor_id = :idVendedor";
        $stmt = $this->conexao->prepare($consulta);
        $stmt->bindParam(':idVendedor', $idVendedor);
        $stmt->execute();
        $vendas = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $vendas;
    }
    public function obterClientePorCPF($cpf)
    {
        $consulta = "SELECT * FROM clientes WHERE cpf = :cpf";
        $stmt = $this->conexao->prepare($consulta);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->execute();
        $cliente = $stmt->fetch(PDO::FETCH_ASSOC);

        return $cliente;
    }

    public function inserirCliente($cpf, $nome)
    {
        $insercao = "INSERT INTO clientes (cpf, nome) VALUES (:cpf, :nome)";
        $stmt = $this->conexao->prepare($insercao);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->bindParam(':nome', $nome);
        $stmt->execute();
    }

    public function obterIdClientePorCPF($cpf)
    {
        $consulta = "SELECT id FROM clientes WHERE cpf = :cpf";
        $stmt = $this->conexao->prepare($consulta);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->execute();
        $idCliente = $stmt->fetchColumn();

        return $idCliente;
    }

    public function inserirVenda($idVendedor, $idUsuario, $valorVenda)
    {
        $insercao = "INSERT INTO vendas (vendedor_id, valor ,usuario_id) VALUES (:vendedor_id,:valor,:usuario_id) ";
        $stmt = $this->conexao->prepare($insercao);
        $stmt->bindParam(':vendedor_id', $idVendedor);
        $stmt->bindParam(':usuario_id', $idUsuario);
        $stmt->bindParam(':valor', $valorVenda);
        $stmt->execute();
    }
    public function obterVendedoresComTotalVendas()
    {
        $consulta = "SELECT c.id, c.nome, SUM(v.valor) AS total_vendido, COUNT(v.id) AS quantidade_vendas 
        FROM colaboradores c
        LEFT JOIN vendas v ON c.id = v.vendedor_id
        WHERE c.cargo = 'VENDEDOR'
        GROUP BY c.id, c.nome";
        $stmt = $this->conexao->prepare($consulta);
        $stmt->execute();
        $vendedores = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $vendedores;
    }
    public function obterVendasComNomeVendedor()
    {
        $consulta = "SELECT v.*, c.nome AS nome_vendedor, cl.nome AS nome_cliente
                     FROM vendas v
                     JOIN colaboradores c ON v.vendedor_id = c.id
                     JOIN clientes cl ON v.usuario_id = cl.id";

        $stmt = $this->conexao->prepare($consulta);
        $stmt->execute();
        $vendas = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $vendas;
    }
}
