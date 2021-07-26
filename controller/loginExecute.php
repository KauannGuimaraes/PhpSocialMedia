<?php require_once '../model/userModel.php' ?>
<?php require_once 'user.php' ?>
<?php
    session_start();
    $userDao = new UserDao();
    $user = new User();
    $user->setName($_POST["name"]);
    $user->setPassword($_POST["password"]);
    $login = $userDao->LoginSearch($user);

    if ($login == NULL){
        header("Location:../view/login.php");
    } else {
        $user = new User();
        $_SESSION['logged'] = TRUE;
        $user->setUserId($login['iduser']);
        $_SESSION['userIs'] = $login['iduser'];
        
        header("Location:../view/home.php");
    }
?>

