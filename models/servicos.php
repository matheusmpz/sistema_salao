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
}
?>