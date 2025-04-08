<?php
function verificarAdministrador() {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if (!isset($_SESSION['admin'])) {
        header('Location: /sistema_salao/adminLogin');
        exit();
    }
}