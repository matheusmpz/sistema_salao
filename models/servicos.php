<?php
require_once 'config/conexao.php';

class servicos {
    private $con;

    public function __construct()
    {
        $this->con = Conexao::getConexao();
    }

    public function getServicos(){

        $dados = array();

        $cmd = $this->con->query('SELECT id, nome, preco, descricao FROM servicos');
        
        $dados = $cmd->fetchAll(PDO::FETCH_ASSOC);
        return $dados;
    }

    public function listar() {
        $array = [];
    
        $sql = "SELECT * FROM servicos";
        $sql = $this->con->query($sql);
    
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
    
        return $array;
    }

    public function adicionarServico($nome, $preco, $descricao, $imagem) {
        $sql = "INSERT INTO servicos (nome, preco, descricao, imagem) VALUES (:nome, :preco, :descricao, :imagem)";
        $cmd = $this->con->prepare($sql);
        $cmd->bindValue(':nome', $nome);
        $cmd->bindValue(':preco', $preco);
        $cmd->bindValue(':descricao', $descricao);
        $cmd->bindValue(':imagem', $imagem);
        $cmd->execute();
    }

    public function editarServico($id, $nome, $preco, $descricao, $imagem = null) {
        if ($imagem) {
            $sql = "UPDATE servicos SET nome = :nome, preco = :preco, descricao = :descricao, imagem = :imagem WHERE id = :id";
        } else {
            $sql = "UPDATE servicos SET nome = :nome, preco = :preco, descricao = :descricao WHERE id = :id";
        }
    
        $cmd = $this->con->prepare($sql);
        $cmd->bindValue(':nome', $nome);
        $cmd->bindValue(':preco', $preco);
        $cmd->bindValue(':descricao', $descricao);
        if ($imagem) {
            $cmd->bindValue(':imagem', $imagem);
        }
        $cmd->bindValue(':id', $id);
        $cmd->execute();
    }
    
    public function getServicoById($id) {
        $sql = "SELECT * FROM servicos WHERE id = :id";
        $cmd = $this->con->prepare($sql);
        $cmd->bindValue(':id', $id);
        $cmd->execute();
        return $cmd->fetch(PDO::FETCH_ASSOC);
    }

    public function excluirServico($id) {
        $sql = "DELETE FROM servicos WHERE id = :id";
        $cmd = $this->con->prepare($sql);
        $cmd->bindValue(':id', $id, PDO::PARAM_INT);
        $cmd->execute();
    }
}
