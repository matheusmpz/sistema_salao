<?php
require_once 'config/conexao.php';

class Administrador {
    private $con;

    public function __construct() {
        $this->con = Conexao::getConexao();
    }

    public function login($email, $senha) {
        $cmd = $this->con->prepare('SELECT * FROM administrador WHERE email = :email AND senha = :senha');
        $cmd->bindValue(':email', $email);
        $cmd->bindValue(':senha', $senha);
        $cmd->execute();

        $admin = $cmd->fetch(PDO::FETCH_ASSOC);

        if ($admin) {
            echo "Administrador encontrado: " . print_r($admin, true) . "<br>";
        } else {
            echo "Administrador não encontrado.<br>";
        }

        return $admin;
    }

    public function cadastrar($nome, $email, $senha) {
        $cmd = $this->con->prepare('INSERT INTO administradores (nome, email, senha) VALUES (:nome, :email, :senha)');
        $cmd->bindValue(':nome', $nome);
        $cmd->bindValue(':email', $email);
        $cmd->bindValue(':senha', md5($senha));

        return $cmd->execute();
    }
}
?>