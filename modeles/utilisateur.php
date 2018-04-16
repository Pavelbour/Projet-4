<?php

    require_once 'modeles/modele.php';

    class utilisateur extends modele{

        public function ajouterUtilisateur($pseudo, $email, $mot_de_passe){
            $this->executer('INSERT INTO utilisateurs(pseudo, email, mot_de_passe) VALUES(:pseudo, :email, :mot_de_passe)', array('pseudo' => $pseudo, 'email' => $email, 'mot_de_passe' => $mot_de_passe));
        }

        public function connexion($pseudo){
            return $this->executer('SELECT id, mot_de_passe  FROM utilisateurs WHERE pseudo = ?', array($pseudo));
        }
    }