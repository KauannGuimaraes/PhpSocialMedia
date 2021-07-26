<?php
    class User {
        private $userid;
        private $name;
        private $password;
        private $email;
        private $description;
        
        function getUserId(){
            return $this->userid;
        }
        function getName() {
            return $this->name;
        }

        function getPassword() {
            return $this->password;
        }

        function getEmail() {
            return $this->email;
        }

        function getDescription() {
            return $this->description;
        }
        
        function setUserId($userid) {
            $this->userid = $userid;
        }
        function setName($name) {
            $this->name = $name;
        }

        function setPassword($password) {
            $this->password = $password;
        }

        function setEmail($email) {
            $this->email = $email;
        }

        function setDescription($description) {
            $this->description = $description;
        }
}
?>

