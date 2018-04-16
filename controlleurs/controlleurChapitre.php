<?php

    require_once 'modeles/chapitre.php';
    require_once 'modeles/commentaire.php';
    require_once 'vues/vue.php';

    class controlleurChapitre {

        private $chapitre;
        private $commentaire;

        public function __construct(){
            $this->chapitre = new chapitre();
            $this->commentaires = new commentaire();
        }

        public function afficherChapitre($id){
            $chapitres = $this->chapitre->recupererChapitres();
            $chapitre = $this->chapitre->recupererChapitre($id);
            $commentaires = $this->commentaires->recupererCommentaires($id);
            $vue = new vue('chapitre');
            $vue->generer(array('chapitres' => $chapitres, 'chapitre' => $chapitre, 'commentaires' => $commentaires));
        }

        public function ajouterChapitre($titre, $contenu){
            $this->chapitre->ajouterChapitre($titre, $contenu);
        }

        public function enregistrerModification($id, $titre, $contenu){
            $this->chapitre->modifierChapitre($id, $titre, $contenu);
        }

        public function effacerChapitre($id){
            $this->chapitre->effacerChapitre($id);
        }

    }