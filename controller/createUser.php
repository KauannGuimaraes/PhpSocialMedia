<?php require_once '../model/userModel.php' ?>
<?php require_once 'user.php' ?>
<?php
    $userDao = new UserDao();
    $user = new User();
    $user->setName($_POST['name']);
    $user->setPassword($_POST['password']);
    $user->setEmail($_POST['email']);
    $userDao->InsertUser($user);
    header("Location:../view/login.php");
?>
