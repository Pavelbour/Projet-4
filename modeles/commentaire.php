<?php

    require_once 'modeles/modele.php';

    class Commentaire extends Modele{

        public function recupererCommentaire($id){
            return $this->executer('SELECT contenu FROM commentaires WHERE id = :id', array('id' => $id));
        }

        public function recupererCommentaires($id){
            return $this->executer('SELECT commentaires.id, commentaires.utilisateur_id, commentaires.contenu, commentaires.ajoute, utilisateurs.pseudo FROM commentaires INNER JOIN utilisateurs ON commentaires.utilisateur_id = utilisateurs.id WHERE chapitre_id = ?', array($id));
        }

        public function recupererCommentairesPasSignales(){
            return $this->executer('SELECT commentaires.id, commentaires.utilisateur_id, commentaires.contenu, commentaires.ajoute, utilisateurs.pseudo FROM commentaires INNER JOIN utilisateurs ON commentaires.utilisateur_id = utilisateurs.id WHERE commentaires.signale = false');
        }

        public function recupererCommentairesSignales(){
            return $this->executer('SELECT commentaires.id, commentaires.utilisateur_id, commentaires.contenu, commentaires.ajoute, utilisateurs.pseudo FROM commentaires INNER JOIN utilisateurs ON commentaires.utilisateur_id = utilisateurs.id WHERE commentaires.signale = true');
        }

        public function ajouterCommentaires($utilisateur, $chapitre, $contenu){
            $this->executer('INSERT INTO commentaires(utilisateur_id, chapitre_id, contenu) VALUES(:utilisateur_id, :chapitre_id, :contenu)', array('utilisateur_id' => $utilisateur, 'chapitre_id' => $chapitre, 'contenu' => $contenu));
        }

        public function signalerCommentaire($id){
            $this->executer('UPDATE commentaires SET signale = true WHERE id = :id', array('id' => $id));
        }

        public function approuverCommentaire($id){
            $this->executer('UPDATE commentaires SET signale = false WHERE id = :id', array('id' => $id));
        }

        public function modifierCommentaire($id, $contenu){
            $this->executer('UPDATE commentaires SET contenu = :contenu WHERE id = :id', array('id' =>$id, 'contenu' => $contenu));
        }

        public function effacerCommentaire($id){
            $this->executer('DELETE FROM commentaires WHERE id = :id', array('id' => $id));
        }
    }