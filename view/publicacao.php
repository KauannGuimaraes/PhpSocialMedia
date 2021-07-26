<?php session_start() ?>
<?php if (isset($_SESSION['logged'])) {
     require 'userpages/publicacao.php';
} else {    header("Location:login.php"); }?>