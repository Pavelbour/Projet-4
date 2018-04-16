<?php

    require_once 'modeles/utilisateur.php';

    class controlleurUtilisateur{

        private $utilisateur;

        public function __construct(){
            $this->utilisateur = new utilisateur();
        }

        public function connexion($pseudo, $mot_de_passe){
            $utilisateur = $this->utilisateur->connexion($pseudo);
            $donnes = $utilisateur->fetch();
            if(password_verify($mot_de_passe, $donnes['mot_de_passe'])){
                $_SESSION['id'] = $donnes['id'];
            }
        }

        public function inscription($pseudo, $email, $mot_de_passe, $mot_de_passe_confirmation){
            if($mot_de_passe == $mot_de_passe_confirmation){
                $mot_de_passe_hash = password_hash($mot_de_passe, PASSWORD_DEFAULT);
                $this->utilisateur->ajouterUtilisateur($pseudo, $email, $mot_de_passe_hash);
                $this->connexion($pseudo, $mot_de_passe);
            }
        }

    }