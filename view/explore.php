<?php session_start() ?>
<?php if(isset($_SESSION['logged'])){
     require 'userpages/explore.php';
} else {
    require 'guestpages/explore.php';
}
?>