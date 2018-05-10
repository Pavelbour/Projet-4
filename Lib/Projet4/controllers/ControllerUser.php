<?php

    namespace Projet4\controllers;
    use Projet4\models\User;

    class ControllerUser
    {

        private $user;

        public function __construct()
        {
            $this->user = new User();
        }

        public function signIn($pseudo, $password)
        {
            $user = $this->user->signIn($pseudo);
            $data = $user->fetch();
            if (password_verify($password, $data['password'])) {
                $_SESSION['id'] = $data['id'];
            }
        }

        public function signOut()
        {
            session_destroy();
        }

        public function signUp($pseudo, $email, $password, $passwordConfirmation)
        {
            if ($password == $passwordConfirmation) {
                $user = $this->user->signIn($pseudo);
                $data = $user->fetch();
                if ($data['id'] === null) {
                    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                    $this->user->addUser($pseudo, $email, $passwordHash);
                    $this->signIn($pseudo, $password);
                } else {
                    throw new \Exception("Ce pseudo est déjà occupé. Saisissez un autre pseudo.");
                }
            } else {
                throw new \Exception("Les mots de passe ont été saisis incorectement.");
            }
        }

    }