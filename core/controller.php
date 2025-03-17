<?php
class Controller {
    public $dados;
    public $dados2;

    public function __construct(){
        $this->dados = array();
    }

    public function carregarTemplate($nomeView, $dadosModel = array(), $dados2 = array()){
        $this->dados = $dadosModel;
        $this->dados2 = $dados2;
        require 'views/template.php';
    }

    public function carregarViewNoTemplate($nomeView, $dadosModel = array()){
        extract($dadosModel); // transforma o array em variáveis
        require 'views/'.$nomeView.'.php'; //dinamico
    }
}