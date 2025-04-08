<?php

class AdminAgendamentoController extends Controller {
    public function index() {
        $model = new AdminAgendamentos();

        // Captura os filtros enviados via GET
        $data_inicio = isset($_GET['data_inicio']) && !empty($_GET['data_inicio']) ? $_GET['data_inicio'] : null;
        $data_fim = isset($_GET['data_fim']) && !empty($_GET['data_fim']) ? $_GET['data_fim'] : null;
        $servico = isset($_GET['servico']) && !empty($_GET['servico']) ? $_GET['servico'] : null;
        $status = isset($_GET['status']) && !empty($_GET['status']) ? $_GET['status'] : null;

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
}