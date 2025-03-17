<?php
require_once 'middlewares/authMiddleware.php';

class homeController extends Controller {
    public function __construct() {
        verificarAutenticacao();
    }

    public function index() {
        $s = new servicos();
        $dados = $s->getServicos();
        $this->carregarTemplate('home', array(), $dados);
    }
}