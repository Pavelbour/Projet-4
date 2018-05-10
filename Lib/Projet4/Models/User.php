<?php

    namespace Projet4\models;

    class User extends Model
    {

        public function addUser($pseudo, $email, $password)
        {
            $this->execute('INSERT INTO utilisateurs(pseudo, email, password) VALUES(:pseudo, :email, :password)', array('pseudo' => $pseudo, 'email' => $email, 'password' => $password));
        }

        public function SignIn($pseudo)
        {
            return $this->execute('SELECT id, password  FROM utilisateurs WHERE pseudo = ?', array($pseudo));
        }
    }