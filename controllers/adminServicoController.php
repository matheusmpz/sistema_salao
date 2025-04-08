<?php
require_once 'middlewares/adminMiddleware.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
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
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome = $_POST['nome'] ?? null;
            $preco = $_POST['preco'] ?? null;
            $descricao = $_POST['descricao'] ?? null;
            $imagem = null;
    
            // Debug: Verificar os dados recebidos
            var_dump($nome, $preco, $descricao);
    
            // Validações
            if (empty($nome) || empty($preco) || empty($descricao)) {
                $mensagemErro = "Todos os campos são obrigatórios.";
                $this->carregarTemplate('admin/admin_adicionar_servico', [
                    'mensagemErro' => $mensagemErro
                ]);
                return;
            }
    
            // Upload da imagem
            if (!empty($_FILES['imagem']['name'])) {
                $uploadDir = __DIR__ . '/../../uploads/servicos/';
                $uploadFile = $uploadDir . basename($_FILES['imagem']['name']);
    
                // Verificar se o diretório existe
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0777, true); // Cria o diretório, se necessário
                }
    
                if (move_uploaded_file($_FILES['imagem']['tmp_name'], $uploadFile)) {
                    $imagem = 'uploads/servicos/' . basename($_FILES['imagem']['name']); // Caminho relativo para salvar no banco
                } else {
                    $mensagemErro = "Erro ao fazer upload da imagem.";
                    $this->carregarTemplate('admin/admin_adicionar_servico', [
                        'mensagemErro' => $mensagemErro
                    ]);
                    return;
                }
            }
    
            // Adicionar o serviço
            try {
                $model->adicionarServico($nome, $preco, $descricao, $imagem);
                header('Location: /sistema_salao/adminServico');
                exit;
            } catch (Exception $e) {
                $mensagemErro = "Erro ao adicionar o serviço: " . $e->getMessage();
                $this->carregarTemplate('admin/admin_adicionar_servico', [
                    'mensagemErro' => $mensagemErro
                ]);
            }
        }
    
        $this->carregarTemplate('admin/admin_adicionar_servico');
    }

    public function editar($id) {
        $model = new Servicos();
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome = $_POST['nome'] ?? null;
            $preco = $_POST['preco'] ?? null;
            $descricao = $_POST['descricao'] ?? null;
            $imagem = null;
    
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
    
            // Upload da nova imagem
            if (!empty($_FILES['imagem']['name'])) {
                $uploadDir = __DIR__ . '/../../uploads/servicos/';
                $uploadFile = $uploadDir . basename($_FILES['imagem']['name']);
    
                // Verificar se o diretório existe
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0777, true); // Cria o diretório, se necessário
                }
    
                if (move_uploaded_file($_FILES['imagem']['tmp_name'], $uploadFile)) {
                    $imagem = 'uploads/servicos/' . basename($_FILES['imagem']['name']); // Caminho relativo para salvar no banco
                } else {
                    $mensagemErro = "Erro ao fazer upload da imagem.";
                    $servico = $model->getServicoById($id);
                    $this->carregarTemplate('admin/admin_editar_servico', [
                        'servico' => $servico,
                        'mensagemErro' => $mensagemErro
                    ]);
                    return;
                }
            }
    
            // Atualizar o serviço
            try {
                $model->editarServico($id, $nome, $preco, $descricao, $imagem);
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