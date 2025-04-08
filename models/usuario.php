<?php
require_once 'config/conexao.php';

class Usuario {
    private $con;

    public function __construct() {
        $this->con = Conexao::getConexao();
    }

    public function login($email, $senha) {
        $cmd = $this->con->prepare('SELECT * FROM clientes WHERE email = :email AND senha = :senha');
        $cmd->bindValue(':email', $email);
        $cmd->bindValue(':senha', md5($senha));
        $cmd->execute();

        $usuario = $cmd->fetch(PDO::FETCH_ASSOC);

        if ($usuario) {
            echo "Usuário encontrado: " . print_r($usuario, true) . "<br>";
        } else {
            echo "Usuário não encontrado.<br>";
        }

        return $usuario;
    }

    public function cadastrar($nome, $telefone, $email, $senha) {
        $cmd = $this->con->prepare('INSERT INTO clientes (nome, telefone, email, senha) VALUES (:nome, :telefone, :email, :senha)');
        $cmd->bindValue(':nome', $nome);
        $cmd->bindValue(':telefone', $telefone);
        $cmd->bindValue(':email', $email);
        $cmd->bindValue(':senha', md5($senha));

        return $cmd->execute();
    }

    public function getUsuarios() {
        $sql = "SELECT id, nome FROM clientes ORDER BY nome ASC";
        $cmd = $this->con->prepare($sql);
        $cmd->execute();
        return $cmd->fetchAll(PDO::FETCH_ASSOC);
    }
}