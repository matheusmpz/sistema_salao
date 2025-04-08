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

    public function criarAgendamento($cliente_id, $data, $servico_id, $status) {
        try {
            $this->con->beginTransaction();

            // Inserir agendamento
            $sql = "INSERT INTO agendamentos (cliente_id, data_agendamento, status)
                    VALUES (:cliente_id, :data, :status)";
            $stmt = $this->con->prepare($sql);
            $stmt->bindValue(':cliente_id', $cliente_id);
            $stmt->bindValue(':data', $data);
            $stmt->bindValue(':status', $status);
            $stmt->execute();

            $agendamento_id = $this->con->lastInsertId();

            // Inserir serviço relacionado
            $sql = "INSERT INTO agendamento_servicos (agendamento_id, servico_id)
                    VALUES (:agendamento_id, :servico_id)";
            $stmt = $this->con->prepare($sql);
            $stmt->bindValue(':agendamento_id', $agendamento_id);
            $stmt->bindValue(':servico_id', $servico_id);
            $stmt->execute();

            $this->con->commit();
        } catch (Exception $e) {
            $this->con->rollBack();
            throw new Exception("Erro ao criar agendamento: " . $e->getMessage());
        }
    }

    public function editarAgendamento($id, $data, $servico_id, $status) {
        try {
            $this->con->beginTransaction();
    
            // Atualizar a tabela `agendamentos`
            $sql = "UPDATE agendamentos SET data_agendamento = :data, status = :status WHERE id = :id";
            $stmt = $this->con->prepare($sql);
            $stmt->bindValue(':data', $data);
            $stmt->bindValue(':status', $status);
            $stmt->bindValue(':id', $id);
            $stmt->execute();
    
            // Atualizar a tabela `agendamento_servicos`
            $sql = "UPDATE agendamento_servicos SET servico_id = :servico_id WHERE agendamento_id = :id";
            $stmt = $this->con->prepare($sql);
            $stmt->bindValue(':servico_id', $servico_id);
            $stmt->bindValue(':id', $id);
            $stmt->execute();
    
            $this->con->commit();
        } catch (Exception $e) {
            $this->con->rollBack();
            throw new Exception("Erro ao editar agendamento: " . $e->getMessage());
        }
    }
    
    public function getAgendamentoById($id) {
        $sql = "
            SELECT 
                a.id, 
                a.data_agendamento AS data, 
                a.status, 
                c.id AS cliente_id, 
                c.nome AS cliente, 
                s.id AS servico_id, 
                s.nome AS servico
            FROM 
                agendamentos a
            LEFT JOIN 
                clientes c ON a.cliente_id = c.id
            LEFT JOIN 
                agendamento_servicos ags ON a.id = ags.agendamento_id
            LEFT JOIN 
                servicos s ON ags.servico_id = s.id
            WHERE 
                a.id = :id
        ";
        $stmt = $this->con->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}