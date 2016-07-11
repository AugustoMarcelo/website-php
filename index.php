<?php
    class User {
        public function __construct() {
            //echo 'Construtor chamado';
        }

        public function __destruct() {
            //echo 'Destrutor chamado';
        }

        public function register() {
            echo 'Usuário registrado';
        }

        public function login($username, $password) {
            $this->auth_user($username, $password);
        }

        public function auth_user($username, $password) {
            echo $username . ' está logado.';
        }
    }

    $User = new User;
    //$User->register();
    $User->login('Marcelo', '12344');
?>