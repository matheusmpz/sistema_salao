<?php
require_once 'middlewares/authMiddleware.php';
date_default_timezone_set('America/Sao_Paulo');

class agendamentoController extends Controller {
    public function __construct() {
        verificarAutenticacao();
    }

    public function index() {
        $s = new servicos();
        $dados['servicos'] = $s->getServicos();
        $this->carregarTemplate('agendamento', $dados);
    }

    public function historico() {
        $cliente_id = $_SESSION['usuario_id'];
        $a = new agendamentos();
        $dados = $a->getAgendamentos($cliente_id);
        $this->carregarTemplate('historico', array(), $dados);
    }

    public function agendar() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $servico = $_POST['servico'];
            $data = $_POST['data'];
            $cliente_id = $_SESSION['usuario_id'];
    
            // Validações
            if (empty($servico) || empty($data)) {
                $mensagemErro = "Todos os campos são obrigatórios.";
                $this->carregarTemplate('agendamento', ['mensagemErro' => $mensagemErro]);
                return;
            }
    
            if (new DateTime($data) <= new DateTime()) {
                $mensagemErro = "O horário do agendamento deve ser posterior ao horário atual.";
                $this->carregarTemplate('agendamento', ['mensagemErro' => $mensagemErro]);
                return;
            }
    
            // Verificar conflitos de horário
            $a = new agendamentos();
            if ($a->verificarConflitoHorario($data)) {
                $mensagemErro = "Já existe um agendamento próximo a este horário. Escolha outro horário.";
                $this->carregarTemplate('agendamento', ['mensagemErro' => $mensagemErro]);
                return;
            }
    
            // Criar o agendamento
            try {
                $a->agendar($cliente_id, $servico, $data);
                header('Location: /sistema_salao/agendamento/historico');
                exit();
            } catch (Exception $e) {
                $mensagemErro = $e->getMessage();
                $this->carregarTemplate('agendamento', ['mensagemErro' => $mensagemErro]);
            }
        }
    }

    public function cancelar($id) {
        $a = new agendamentos();
        $a->cancelar($id);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    public function editar($id) {
        $mensagemErro = '';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $servico = $_POST['servico'];
            $data = $_POST['data'];

            // Validações
            if (empty($servico) || empty($data)) {
                $mensagemErro = "Todos os campos são obrigatórios.";
            } else {
                $a = new agendamentos();
                $agendamento = $a->getAgendamentoById($id);
                $dataAgendamento = strtotime($agendamento['data_agendamento']);
                $dataLimite = strtotime('-2 days', $dataAgendamento);

                if (time() > $dataLimite) {
                    $mensagemErro = "Alterações só podem ser feitas até 2 dias antes do agendamento.";
                } elseif (strtotime($data) <= time()) {
                    $mensagemErro = "A data do agendamento deve ser uma data futura.";
                } else {
                    $s = new servicos();
                    $servicos = $s->getServicos();
                    $servicoValido = false;
                    foreach ($servicos as $s) {
                        if ($s['id'] == $servico) {
                            $servicoValido = true;
                            break;
                        }
                    }

                    if (!$servicoValido) {
                        $mensagemErro = "Serviço inválido.";
                    } else {
                        $a->editar($id, $servico, $data);
                        header('Location: /sistema_salao/agendamento/historico');
                        exit();
                    }
                }
            }
        }

        $a = new agendamentos();
        $dados['agendamento'] = $a->getAgendamentoById($id);
        $s = new servicos();
        $dados['servicos'] = $s->getServicos();
        $dados['mensagemErro'] = $mensagemErro;

        $this->carregarTemplate('editar_agendamento', $dados);
    }
}