<?php

    require_once 'modeles/modele.php';

    class chapitre extends modele{

        public function recupererChapitres(){
            return $this->executer('SELECT id, nom FROM chapitres');
        }

        public function recupererChapitre($id){
            return $this->executer('SELECT id, nom, contenu FROM chapitres WHERE id = ?', array($id));
        }

        public function ajouterChapitre($titre, $contenu){
            $this->executer('INSERT INTO chapitres(nom, contenu) VALUES (:nom, :contenu)', array('nom' => $titre, 'contenu' => $contenu));
        }

        public function modifierChapitre($id, $titre, $contenu){
            $this->executer('UPDATE chapitres SET nom = :nom, contenu = :contenu WHERE id = :id', array('id' =>$id, 'nom' => $titre, 'contenu' => $contenu));
        }

        public function effacerChapitre($id){
            $this->executer('DELETE FROM chapitres WHERE id = :id', array('id' => $id));
        }
    }