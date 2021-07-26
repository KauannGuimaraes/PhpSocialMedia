<?php session_start() ?>
<?php if(isset($_SESSION['logged'])) {
    require 'userpages/user.php';
} else {
    require 'guestpages/home.php';
}
?>