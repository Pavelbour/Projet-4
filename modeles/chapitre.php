<?php

    require_once 'modeles/modele.php';

    class Chapitre extends Modele{

        public function recupererChapitres(){
            return $this->executer('SELECT id, nom FROM chapitres');
        }

        public function recupererChapitre($id){
            return $this->executer('SELECT id, nom, contenu FROM chapitres WHERE id = ?', array($id));
        }

        public function recupererDerniersChapitres(){
            return $this->executer('SELECT id, nom FROM chapitres ORDER BY ajoute DESC LIMIT 5');
        }

        public function ajouterChapitre($titre, $contenu){
            $this->executer('INSERT INTO chapitres(nom, contenu) VALUES (:nom, :contenu)', array('nom' => $titre, 'contenu' => $contenu));
            $id = $this->executer('SELECT id FROM chapitres WHERE nom = ?', array($titre));
            $resultat = $id->fetch();
            return $resultat['id'];
        }

        public function modifierChapitre($id, $titre, $contenu){
            $this->executer('UPDATE chapitres SET nom = :nom, contenu = :contenu WHERE id = :id', array('id' =>$id, 'nom' => $titre, 'contenu' => $contenu));
        }

        public function effacerChapitre($id){
            $this->executer('DELETE FROM chapitres WHERE id = :id', array('id' => $id));
        }
    }