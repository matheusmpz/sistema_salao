<?php
require_once 'config/conexao.php';

class Dashboard {
    private $con;

    public function __construct() {
        $this->con = Conexao::getConexao();
    }

    public function totalAgendamentosHoje() {
        $hoje = date('Y-m-d');
        $cmd = $this->con->prepare("SELECT COUNT(*) as total FROM agendamentos WHERE DATE(data_agendamento) = :hoje");
        $cmd->bindValue(':hoje', $hoje);
        $cmd->execute();
        $res = $cmd->fetch(PDO::FETCH_ASSOC);
        return $res['total'] ?? 0;
    }

    public function totalPorStatusHoje($status) {
        $hoje = date('Y-m-d');
        $cmd = $this->con->prepare("SELECT COUNT(*) as total FROM agendamentos WHERE DATE(data_agendamento) = :hoje AND status = :status");
        $cmd->bindValue(':hoje', $hoje);
        $cmd->bindValue(':status', $status);
        $cmd->execute();
        $res = $cmd->fetch(PDO::FETCH_ASSOC);
        return $res['total'] ?? 0;
    }

    public function listarAgendamentosHoje() {
        $sql = "SELECT 
                    a.id,
                    a.data_agendamento,
                    a.status,
                    c.nome AS nome_cliente,
                    GROUP_CONCAT(s.nome SEPARATOR ', ') AS servicos
                FROM agendamentos a
                JOIN clientes c ON a.cliente_id = c.id
                LEFT JOIN agendamento_servicos ags ON a.id = ags.agendamento_id
                LEFT JOIN servicos s ON ags.servico_id = s.id
                WHERE DATE(a.data_agendamento) = CURDATE()
                GROUP BY a.id
                ORDER BY a.data_agendamento ASC";

        $cmd = $this->con->prepare($sql);
        $cmd->execute();
        return $cmd->fetchAll(PDO::FETCH_ASSOC);
    }
}
