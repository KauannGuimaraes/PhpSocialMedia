<?php require_once '../model/userModel.php' ?>
<?php require_once 'user.php' ?>
<?php session_start() ?>
<?php 
    $user = new User();
    $user2 = new User();
    $userDao = new UserDao();
    
    switch ($_REQUEST['tipo']) {
    case 'follow' : 
        $user->setUserId($_POST['user']);
        $user2->setUserId($_POST['user2']);
        $userDao->insertFollower($user,$user2);
        header("Location:../view/otherUser.php?user=". $_POST['user2']);
        break;
    case 'unfollow' : 
        $user->setUserId($_POST['user']);
        $user2->setUserId($_POST['user2']);
        $userDao->deleteFollow($user, $user2);
        header("Location:../view/otherUser.php?user=". $_POST['user2']);
        break;
    }
?>
