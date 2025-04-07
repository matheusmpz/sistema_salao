<?php
class adminDashboardController extends Controller {
    public function __construct() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Verifica se o admin está logado
        if (!isset($_SESSION['admin'])) {
            header('Location: /sistema_salao/adminLogin');
            exit();
        }

        parent::__construct(); // Se precisar manter o construtor do Controller pai
    }

    public function index() {
        $dashboard = new Dashboard();
    
        $dados = [
            'totalHoje' => $dashboard->totalAgendamentosHoje(),
            'totalConfirmados' => $dashboard->totalPorStatusHoje('confirmado'),
            'totalRealizados' => $dashboard->totalPorStatusHoje('realizado'),
            'totalCancelados' => $dashboard->totalPorStatusHoje('cancelado'),
            'agendamentos' => $dashboard->listarAgendamentosHoje()
        ];
    
        $this->carregarTemplate('admin/admin_dashboard', $dados);
    }    
}
