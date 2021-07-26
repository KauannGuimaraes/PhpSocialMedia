<?php
    abstract class Conexao {
        public static function getInstance(){
            try {
                $pdo = new PDO("mysql:host=127.0.0.1;dbname=socialmedia","root", "heart123");
                return $pdo;
            } catch (Exception $erro) {
                echo $erro->getMessage();
            }
        }
    }
?>

