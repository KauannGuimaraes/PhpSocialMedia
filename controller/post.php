<?php
    class Post {
        private $title;
        private $content;
        private $postid;
        private $userid;
        
        function getTitle() {
            return $this->title;
        }

        function getContent() {
            return $this->content;
        }

        function getPostid() {
            return $this->postid;
        }

        function getUserid() {
            return $this->userid;
        }

        function setTitle($title) {
            $this->title = $title;
        }

        function setContent($content) {
            $this->content = $content;
        }

        function setPostid($postid) {
            $this->postid = $postid;
        }

        function setUserid($userid) {
            $this->userid = $userid;
        }
}
?>

