<?php session_start() ?>
<?php if(isset($_SESSION['logged'])) {
        require 'userpages/post.php';
    } else {
        require 'guestpages/post.php';
    }