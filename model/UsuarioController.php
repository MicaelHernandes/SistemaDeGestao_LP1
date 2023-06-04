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
}
