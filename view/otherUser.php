<?php session_start() ?>
<?php if (isset($_SESSION['logged'])) {
     require 'userpages/otherUser.php';
    } else {
        require 'guestpages/otherUser.php';
    }
