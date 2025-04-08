<?php
require_once 'middlewares/adminMiddleware.php';

class adminLoginController extends Controller {
    public function __construct() {
        // Não é necessário verificar o administrador aqui, pois este é o controller de login
        parent::__construct(); // Caso o Controller pai tenha lógica no construtor
    }

    public function index() {
        $this->carregarTemplate('admin/admin_login');
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'] ?? "";
            $senha = $_POST['password'] ?? "";

            $a = new Administrador(); 
            $admin = $a->login($email, $senha);

            if ($admin) {
                session_start();
                $_SESSION['admin'] = $admin; // Define a sessão do administrador
                header('Location: /sistema_salao/adminDashboard');
                exit();
            } else {
                $mensagemErro = "Email ou senha inválidos.";
                $this->carregarTemplate('admin/admin_login', ['mensagemErro' => $mensagemErro]);
            }
        } else {
            $this->carregarTemplate('admin/admin_login');
        }
    }

    public function logout() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    
        session_destroy();
        header('Location: /sistema_salao/adminLogin');
        exit();
    }
}