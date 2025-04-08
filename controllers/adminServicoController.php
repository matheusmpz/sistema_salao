<?php

class adminServicoController extends Controller {
    public function __construct() {
        verificarAdministrador(); // Verifica se o usuário é um administrador
    }
    
    public function index() {
        $model = new servicos();
        $servicos = $model->listar();

        $this->carregarTemplate('admin/admin_servicos', [
            'servicos' => $servicos
        ]);
    }

    public function adicionar() {
    $model = new Servicos();

    // Se houver envio via POST, processar os dados
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nome = $_POST['nome'] ?? null;
        $preco = $_POST['preco'] ?? null;
        $descricao = $_POST['descricao'] ?? null;

        // Validações
        if (empty($nome) || empty($preco) || empty($descricao)) {
            $mensagemErro = "Todos os campos são obrigatórios.";
            $this->carregarTemplate('admin/admin_adicionar_servico', [
                'mensagemErro' => $mensagemErro
            ]);
            return;
        }

        // Adicionar o serviço
        try {
            $model->adicionarServico($nome, $preco, $descricao);
            header('Location: /sistema_salao/adminServico');
            exit;
        } catch (Exception $e) {
            $mensagemErro = "Erro ao adicionar o serviço: " . $e->getMessage();
            $this->carregarTemplate('admin/admin_adicionar_servico', [
                'mensagemErro' => $mensagemErro
            ]);
        }
    }

    // Carregar a view de adicionar serviço
    $this->carregarTemplate('admin/admin_adicionar_servico');
    }

    public function editar($id) {
        $model = new Servicos();
    
        // Se houver envio via POST, processar os dados
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome = $_POST['nome'] ?? null;
            $preco = $_POST['preco'] ?? null;
            $descricao = $_POST['descricao'] ?? null;
    
            // Validações
            if (empty($nome) || empty($preco) || empty($descricao)) {
                $mensagemErro = "Todos os campos são obrigatórios.";
                $servico = $model->getServicoById($id);
                $this->carregarTemplate('admin/admin_editar_servico', [
                    'servico' => $servico,
                    'mensagemErro' => $mensagemErro
                ]);
                return;
            }
    
            // Atualizar o serviço
            try {
                $model->editarServico($id, $nome, $preco, $descricao);
                header('Location: /sistema_salao/adminServico');
                exit;
            } catch (Exception $e) {
                $mensagemErro = "Erro ao atualizar o serviço: " . $e->getMessage();
                $servico = $model->getServicoById($id);
                $this->carregarTemplate('admin/admin_editar_servico', [
                    'servico' => $servico,
                    'mensagemErro' => $mensagemErro
                ]);
            }
        }

    
        // Carregar os dados do serviço para edição
        $servico = $model->getServicoById($id);
        $this->carregarTemplate('admin/admin_editar_servico', [
            'servico' => $servico
        ]);
    }

    public function excluir($id) {
        $model = new Servicos();
    
        try {
            $model->excluirServico($id);
            header('Location: /sistema_salao/adminServico');
            exit;
        } catch (Exception $e) {
            $mensagemErro = "Erro ao excluir o serviço: " . $e->getMessage();
            $servicos = $model->listar();
            $this->carregarTemplate('admin/admin_servicos', [
                'servicos' => $servicos,
                'mensagemErro' => $mensagemErro
            ]);
        }
    }
}