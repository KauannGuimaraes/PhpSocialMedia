<?php require_once 'conexao.php'; ?>
<?php
    class UserDao extends Conexao{

        function InsertUser($user) {
            try {
                $pdo = Conexao::getInstance();
                $sql = "call insertUser(?, ?, ?)";
                $stmt= $pdo->prepare($sql);
                $stmt->bindValue(1,$user->getName());
                $stmt->bindValue(2,$user->getPassword());
                $stmt->bindValue(3,$user->getEmail());
                $stmt-> execute();
            } catch(PDOException $erro) {
                echo $erro;
            } 
        }
        
        function InsertUserDescription($user) {
            try {
                $pdo = Conexao::getInstance();
                $sql = "call insertUserDescription(?, ?)";
                $stmt= $pdo->prepare($sql);
                $stmt->bindValue(1,$user->getDescription());
                $stmt->bindValue(2,$user->getUserId());
                $stmt-> execute();
            } catch(PDOException $erro) {
                echo $erro;
            } 
        }  
        function LoginSearch($user) {
            try {
                $pdo = Conexao::getInstance();
                $sql = "call loginSearch(?, ?)";
                $stmt= $pdo->prepare($sql);
                $stmt->bindValue(1,$user->getName());
                $stmt->bindValue(2,$user->getPassword());
                $stmt-> execute();
                $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
                return $resultado;
            } catch(PDOException $erro) {
                echo $erro;
            }
        }
        function userData($user) {
            try {
                $pdo = Conexao::getInstance();
                $sql = "call userData(?)";
                $stmt= $pdo->prepare($sql);
                $stmt->bindValue(1,$user->getUserId());
                $stmt-> execute();
                $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $resultado;
            } catch(PDOException $erro) {
                echo $erro;
            }
        }
        function insertFollower($user, $user2) {
            try {
                $pdo = Conexao::getInstance();
                $sql = "call insertFollow(?, ?)";
                $stmt= $pdo->prepare($sql);
                $stmt->bindValue(1,$user->getUserId());
                $stmt->bindValue(2,$user2->getUserId());
                $stmt-> execute();
            } catch(PDOException $erro) {
                echo $erro;
            }
        }
        function deleteFollow($user, $user2) {
            try {
                $pdo = Conexao::getInstance();
                $sql = "call deleteFollow(?, ?)";
                $stmt= $pdo->prepare($sql);
                $stmt->bindValue(1,$user->getUserId());
                $stmt->bindValue(2,$user2->getUserId());
                $stmt-> execute();
            } catch(PDOException $erro) {
                echo $erro;
            }
        }
        function searchFollower($user) {
            try {
                $pdo = Conexao::getInstance();
                $sql = "call searchFollower(?)";
                $stmt= $pdo->prepare($sql);
                $stmt->bindValue(1,$user->getUserId());
                $stmt-> execute();
                $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $resultado;
            } catch(PDOException $erro) {
                echo $erro;
            }
        }
        function searchFollowedContent($user) {
            try {
                $pdo = Conexao::getInstance();
                $sql = "call searchFollowedContent(?)";
                $stmt= $pdo->prepare($sql);
                $stmt->bindValue(1,$user->getUserId());
                $stmt-> execute();
                $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $resultado;
            } catch(PDOException $erro) {
                echo $erro;
            }
        }
    }
?>

