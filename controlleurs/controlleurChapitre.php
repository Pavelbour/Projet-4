<?php

    require_once 'modeles/chapitre.php';
    require_once 'modeles/commentaire.php';
    require_once 'vues/vue.php';

    class ControlleurChapitre {

        private $chapitre;
        private $commentaire;

        public function __construct(){
            $this->chapitre = new Chapitre();
            $this->commentaires = new Commentaire();
        }

        public function idValid($id){
            $chapitre = $this->chapitre->recupererChapitre($id);
            $resultat = $chapitre->fetch();
            if($resultat == null){
                return false;
            }else{
                return true;
            }
        }

        public function afficherChapitre($id){
            $chapitres = $this->chapitre->recupererDerniersChapitres();
            $chapitre = $this->chapitre->recupererChapitre($id);
            $commentaires = $this->commentaires->recupererCommentaires($id);
            $vue = new vue('chapitre');
            $vue->generer(array('chapitres' => $chapitres, 'chapitre' => $chapitre, 'commentaires' => $commentaires, 'idChapitre' => $id));
        }

        public function ajouterChapitre($titre, $contenu){
            return $this->chapitre->ajouterChapitre($titre, $contenu);
        }

        public function enregistrerModification($id, $titre, $contenu){
            $this->chapitre->modifierChapitre($id, $titre, $contenu);
        }

        public function effacerChapitre($id){
            $this->chapitre->effacerChapitre($id);
        }

    }