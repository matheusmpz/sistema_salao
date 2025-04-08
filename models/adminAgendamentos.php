<?php
require_once 'config/conexao.php';

class AdminAgendamentos {
    private $con;

    public function __construct() {
        $this->con = Conexao::getConexao();
    }

    public function listarTodos($data_inicio = null, $data_fim = null, $servico = null, $status = null) {
        $sql = "
            SELECT 
                a.id, 
                c.nome AS cliente, 
                a.data_agendamento AS data, 
                a.status, 
                GROUP_CONCAT(s.nome SEPARATOR ', ') AS servico
            FROM 
                agendamentos a
            LEFT JOIN 
                clientes c ON a.cliente_id = c.id
            LEFT JOIN 
                agendamento_servicos ags ON a.id = ags.agendamento_id
            LEFT JOIN 
                servicos s ON ags.servico_id = s.id
            WHERE 1=1
        ";
    
        // Adiciona os filtros dinamicamente
        if (!empty($data_inicio)) {
            $sql .= " AND a.data_agendamento >= :data_inicio";
        }
        if (!empty($data_fim)) {
            $sql .= " AND a.data_agendamento <= :data_fim";
        }
        if (!empty($servico)) {
            $sql .= " AND s.id = :servico";
        }
        if (!empty($status)) {
            $sql .= " AND a.status = :status";
        }
    
        $sql .= " GROUP BY a.id ORDER BY a.data_agendamento DESC";
    
        $cmd = $this->con->prepare($sql);
    
        // Bind dos parâmetros
        if (!empty($data_inicio)) {
            $cmd->bindValue(':data_inicio', $data_inicio);
        }
        if (!empty($data_fim)) {
            $cmd->bindValue(':data_fim', $data_fim);
        }
        if (!empty($servico)) {
            $cmd->bindValue(':servico', $servico);
        }
        if (!empty($status)) {
            $cmd->bindValue(':status', $status);
        }
    
        $cmd->execute();
        return $cmd->fetchAll(PDO::FETCH_ASSOC);
    }   
}