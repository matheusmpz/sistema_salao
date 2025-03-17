<?php
    class Conexao {
        private static $pdo;

        private function __construct() {}  

        public static function getConexao(){
            if(!isset(self::$pdo)){
                $host = "localhost";
                $dbname = "salao_leila";
                $username = "root"; 
                $password = ""; 

                try {
                    self::$pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
                    self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                } catch (PDOException $e) {
                    echo "Erro na conexão: " . $e->getMessage();
                }
            }
            return self::$pdo;  
        }
    }
?>