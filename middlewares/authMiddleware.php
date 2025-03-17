<?php
function verificarAutenticacao() {
    if (!isset($_SESSION['usuario_id'])) {
        header('Location: /sistema_salao/auth/index');
        exit();
    }
}