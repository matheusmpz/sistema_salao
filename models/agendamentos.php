<?php
require_once 'config/conexao.php';

class agendamentos {
    private $con;

    public function __construct() {
        $this->con = Conexao::getConexao();
    }

    public function getAgendamentos($cliente_id, $data_inicio = null, $data_fim = null) {
    $dados = array();

    $sql = 'SELECT 
                a.id, 
                a.data_agendamento, 
                a.status,
                b.servico_id,
                s.nome AS servico_nome
            FROM agendamentos a 
            INNER JOIN agendamento_servicos b 
            ON a.id = b.agendamento_id
            INNER JOIN servicos s
            ON b.servico_id = s.id
            WHERE a.cliente_id = :cliente_id';

    if ($data_inicio && $data_fim) {
        $sql .= ' AND a.data_agendamento BETWEEN :data_inicio AND :data_fim';
    }

    $sql .= ' ORDER BY a.data_agendamento DESC';

    $cmd = $this->con->prepare($sql);
    $cmd->bindValue(':cliente_id', $cliente_id, PDO::PARAM_INT);

    if ($data_inicio && $data_fim) {
        $cmd->bindValue(':data_inicio', $data_inicio);
        $cmd->bindValue(':data_fim', $data_fim);
    }

    $cmd->execute();
    $dados = $cmd->fetchAll(PDO::FETCH_ASSOC);

    return $dados;
}

    public function agendar($cliente_id, $servico, $data) {
        if (strtotime($data) <= time()) {
            throw new Exception("A data do agendamento deve ser uma data futura.");
        }
    
        $inicioSemana = date('Y-m-d', strtotime('monday this week', strtotime($data)));
        $fimSemana = date('Y-m-d', strtotime('sunday this week', strtotime($data)));
    
        $cmd = $this->con->prepare('SELECT id, data_agendamento FROM agendamentos WHERE cliente_id = :cliente_id AND data_agendamento BETWEEN :inicioSemana AND :fimSemana');
        $cmd->bindValue(':cliente_id', $cliente_id);
        $cmd->bindValue(':inicioSemana', $inicioSemana);
        $cmd->bindValue(':fimSemana', $fimSemana);
        $cmd->execute();
    
        $agendamentoExistente = $cmd->fetch(PDO::FETCH_ASSOC);
    
        if ($agendamentoExistente) {
            $dataExistente = new DateTime($agendamentoExistente['data_agendamento']);
            $dataSugerida = $dataExistente->modify('+1 week')->format('Y-m-d');
            throw new Exception("Já existe um agendamento na mesma semana. Sugerimos reagendar para a semana seguinte, ou adicionar um serviço no mesmo agendamento!");
        } else {
            $cmd = $this->con->prepare('INSERT INTO agendamentos (cliente_id, data_agendamento, status) VALUES (:cliente_id, :data_agendamento, :status)');
            $cmd->bindValue(':cliente_id', $cliente_id);
            $cmd->bindValue(':data_agendamento', $data);
            $cmd->bindValue(':status', 'pendente');
            $cmd->execute();
    
            $agendamento_id = $this->con->lastInsertId();
    
            $cmd = $this->con->prepare('INSERT INTO agendamento_servicos (agendamento_id, servico_id) VALUES (:agendamento_id, :servico_id)');
            $cmd->bindValue(':agendamento_id', $agendamento_id, PDO::PARAM_INT);
            $cmd->bindValue(':servico_id', $servico, PDO::PARAM_INT);
            $cmd->execute();
        }
    }

    public function cancelar($id) {
        $cmd = $this->con->prepare('DELETE FROM agendamentos WHERE id = :id');
        $cmd->bindValue(':id', $id, PDO::PARAM_INT);
        $cmd->execute();
    }

    public function editar($id, $servico, $data) {
        if (strtotime($data) <= time()) {
            throw new Exception("A data do agendamento deve ser uma data futura.");
        }

        $cmd = $this->con->prepare('UPDATE agendamentos SET data_agendamento = :data_agendamento WHERE id = :id');
        $cmd->bindValue(':data_agendamento', $data);
        $cmd->bindValue(':id', $id, PDO::PARAM_INT);
        $cmd->execute();

        $cmd = $this->con->prepare('UPDATE agendamento_servicos SET servico_id = :servico_id WHERE agendamento_id = :agendamento_id');
        $cmd->bindValue(':servico_id', $servico, PDO::PARAM_INT);
        $cmd->bindValue(':agendamento_id', $id, PDO::PARAM_INT);
        $cmd->execute();
    }

    public function getAgendamentoById($id) {
        $cmd = $this->con->prepare('SELECT 
                                    a.id, 
                                    a.data_agendamento, 
                                    a.status,
                                    b.servico_id,
                                    s.nome AS servico_nome
                                  FROM agendamentos a 
                                  INNER JOIN agendamento_servicos b 
                                  ON a.id = b.agendamento_id
                                  INNER JOIN servicos s
                                  ON b.servico_id = s.id
                                  WHERE a.id = :id');
        $cmd->bindValue(':id', $id, PDO::PARAM_INT);
        $cmd->execute();
        
        return $cmd->fetch(PDO::FETCH_ASSOC);
    }
}