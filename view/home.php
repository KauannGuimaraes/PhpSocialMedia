<?php session_start() ?>
<?php if (isset($_SESSION['logged'])) {
     require 'userpages/home.php';
    } else {
        require 'guestpages/home.php';
    }