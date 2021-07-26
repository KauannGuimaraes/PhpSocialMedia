<?php require_once 'conexao.php' ?>
<?php 
    class PostDao extends Conexao{
        function insertPost($post) {
            try {
                $pdo = Conexao::getInstance();
                $sql = "call insertPost(?, ?, ?)";
                $stmt= $pdo->prepare($sql);
                $stmt->bindValue(1,$post->getTitle());
                $stmt->bindValue(2,$post->getContent());
                $stmt->bindValue(3,$post->getUserid());
                $stmt-> execute();
            } catch(PDOException $erro) {
                echo $erro;
            } 
        }
        function deletePost($post) {
            try {
                $pdo = Conexao::getInstance();
                $sql = "call deletePost(?)";
                $stmt= $pdo->prepare($sql);
                $stmt->bindValue(1,$post->getPostid());
                $stmt-> execute();
            } catch(PDOException $erro) {
                echo $erro;
            } 
        }
        function countPost($user) {
            try {
                $pdo = Conexao::getInstance();
                $sql = "call countPostUser(?)";
                $stmt= $pdo->prepare($sql);
                $stmt->bindValue(1,$user);
                $stmt-> execute();
                $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $resultado;
            } catch(PDOException $erro) {
                echo $erro;
            } 
        }
        function selectAllPosts($user) {
            try {
                $pdo = Conexao::getInstance();
                $sql = "call selectAllPosts(?)";
                $stmt= $pdo->prepare($sql);
                $stmt->bindValue(1,$user);
                $stmt-> execute();
                $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $resultado;
            } catch(PDOException $erro) {
                echo $erro;
            } 
        }
        function selectPost($post) {
            try {
                $pdo = Conexao::getInstance();
                $sql = "call selectPost(?)";
                $stmt= $pdo->prepare($sql);
                $stmt->bindValue(1,$post->getPostid());
                $stmt-> execute();
                $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $resultado;
            } catch(PDOException $erro) {
                echo $erro;
            } 
        }
        function selectRandomPosts() {
            try {
                $pdo = Conexao::getInstance();
                $sql = "call randomPost";
                $stmt= $pdo->prepare($sql);
                $stmt-> execute();
                $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $resultado;
            } catch(PDOException $erro) {
                echo $erro;
            } 
        }
    }
?>

