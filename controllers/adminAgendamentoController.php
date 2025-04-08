<?php
require_once 'middlewares/adminMiddleware.php';
class adminAgendamentoController extends Controller {
    public function __construct() {
        verificarAdministrador(); // Verifica se o usuário é um administrador
    }

    public function index() {
        $model = new AdminAgendamentos();

        // Captura os filtros enviados via GET
        $data_inicio = $_GET['data_inicio'] ?? null;
        $data_fim = $_GET['data_fim'] ?? null;
        $servico = $_GET['servico'] ?? null;
        $status = $_GET['status'] ?? null;

        // Passa os filtros para o model
        $agendamentos = $model->listarTodos($data_inicio, $data_fim, $servico, $status);

        // Busca os serviços para o filtro
        $s = new Servicos();
        $servicos = $s->getServicos();

        // Carrega a view com os dados
        $this->carregarTemplate('admin/admin_agendamentos', [
            'agendamentos' => $agendamentos,
            'servicos' => $servicos
        ]);
    }

    public function criar() {
        $usuarioModel = new Usuario();
        $servicosModel = new Servicos();
        $agendamentoModel = new AdminAgendamentos();
    
        // Se houver envio via POST, processar os dados
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $cliente_id = $_POST['cliente_id'] ?? null;
            $data = $_POST['data'] ?? null;
            $servico_id = $_POST['servico_id'] ?? null;
            $status = $_POST['status'] ?? 'Pendente';
    
            // Validações
            if (!$cliente_id || !$data || !$servico_id) {
                $mensagemErro = "Todos os campos são obrigatórios.";
                $this->carregarTemplate('admin/admin_adicionar_agendamento', [
                    'clientes' => $usuarioModel->getUsuarios(),
                    'servicos' => $servicosModel->getServicos(),
                    'mensagemErro' => $mensagemErro
                ]);
                return;
            }
    
            // Criação do agendamento
            try {
                $agendamentoModel->criarAgendamento($cliente_id, $data, $servico_id, $status);
                header('Location: /sistema_salao/adminAgendamento');
                exit;
            } catch (Exception $e) {
                $mensagemErro = $e->getMessage();
                $this->carregarTemplate('admin/admin_adicionar_agendamento', [
                    'clientes' => $usuarioModel->getUsuarios(),
                    'servicos' => $servicosModel->getServicos(),
                    'mensagemErro' => $mensagemErro
                ]);
            }
        }
    
        // Dados para montar os selects
        $clientes = $usuarioModel->getUsuarios();
        $servicos = $servicosModel->getServicos();
    
        $this->carregarTemplate('admin/admin_adicionar_agendamento', [
            'clientes' => $clientes,
            'servicos' => $servicos
        ]);
    }

    public function editar($id) {
        $usuarioModel = new Usuario();
        $servicosModel = new Servicos();
        $agendamentoModel = new AdminAgendamentos();
    
        // Se houver envio via POST, processar os dados
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = $_POST['data'] ?? null;
            $servico_id = $_POST['servico_id'] ?? null;
            $status = $_POST['status'] ?? null;
    
            // Validações
            if (!$data || !$servico_id || !$status) {
                $mensagemErro = "Todos os campos são obrigatórios.";
                $agendamento = $agendamentoModel->getAgendamentoById($id);
                $this->carregarTemplate('admin/admin_editar_agendamento', [
                    'agendamento' => $agendamento,
                    'clientes' => $usuarioModel->getUsuarios(),
                    'servicos' => $servicosModel->getServicos(),
                    'mensagemErro' => $mensagemErro
                ]);
                return;
            }
    
            // Atualizar o agendamento
            try {
                $agendamentoModel->editarAgendamento($id, $data, $servico_id, $status);
                header('Location: /sistema_salao/adminAgendamento');
                exit;
            } catch (Exception $e) {
                $mensagemErro = $e->getMessage();
                $agendamento = $agendamentoModel->getAgendamentoById($id);
                $this->carregarTemplate('admin/admin_editar_agendamento', [
                    'agendamento' => $agendamento,
                    'clientes' => $usuarioModel->getUsuarios(),
                    'servicos' => $servicosModel->getServicos(),
                    'mensagemErro' => $mensagemErro
                ]);
            }
        }
    
        // Carregar os dados do agendamento para edição
        $agendamento = $agendamentoModel->getAgendamentoById($id);
        $clientes = $usuarioModel->getUsuarios();
        $servicos = $servicosModel->getServicos();
    
        $this->carregarTemplate('admin/admin_editar_agendamento', [
            'agendamento' => $agendamento,
            'clientes' => $clientes,
            'servicos' => $servicos
        ]);
    }
}