<?php 
class authController extends Controller {
    public function index() {
        $this->carregarTemplate('login');
    }

    public function cadastrar() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nome = $_POST['nome'];
            $telefone = $_POST['telefone'];
            $email = $_POST['email'];
            $senha = $_POST['password'];
            $confirmSenha = $_POST['confirm-password'];

            // Validações
            if (empty($nome) || empty($telefone) || empty($email) || empty($senha) || empty($confirmSenha)) {
                $mensagemErro = "Todos os campos são obrigatórios.";
                $this->carregarTemplate('cadastro', ['mensagemErro' => $mensagemErro]);
                return;
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $mensagemErro = "Email inválido.";
                $this->carregarTemplate('cadastro', ['mensagemErro' => $mensagemErro]);
                return;
            }

            if ($senha !== $confirmSenha) {
                $mensagemErro = "As senhas não coincidem.";
                $this->carregarTemplate('cadastro', ['mensagemErro' => $mensagemErro]);
                return;
            }

            if (strlen($senha) < 6) {
                $mensagemErro = "A senha deve ter pelo menos 6 caracteres.";
                $this->carregarTemplate('cadastro', ['mensagemErro' => $mensagemErro]);
                return;
            }

            $u = new Usuario();
            if ($u->cadastrar($nome, $telefone, $email, $senha)) {
                header('Location: /sistema_salao/auth/index');
                exit();
            } else {
                $mensagemErro = "Erro ao cadastrar. Tente novamente.";
                $this->carregarTemplate('cadastro', ['mensagemErro' => $mensagemErro]);
            }
        } else {
            $this->carregarTemplate('cadastro');
        }
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $senha = $_POST['password'];
    
            $u = new Usuario();
            $usuario = $u->login($email, $senha);
    
            if ($usuario) {
                session_start();
                $_SESSION['usuario_id'] = $usuario['id']; // Define a sessão do usuário comum
                $_SESSION['user_name'] = $usuario['nome']; 
                header('Location: /sistema_salao/home');
                exit();
            } else {
                $mensagemErro = "Email ou senha inválidos.";
                $this->carregarTemplate('login', ['mensagemErro' => $mensagemErro]);
            }
        }
    }

    public function logout() {
        session_destroy();
        header('Location: /sistema_salao/auth/index');
        exit();
    }
}