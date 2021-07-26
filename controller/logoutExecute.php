<?php session_start() ?>
<?php
    function logout() {
        session_destroy();
    }
    logout();
    header("Location:../view/home.php");
?>

