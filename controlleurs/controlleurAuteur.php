<?php

    require_once 'modeles/chapitre.php';
    require_once 'modeles/commentaire.php';
    require_once 'vues/vue.php';

    class controlleurAuteur{

        private $chapitres;
        private $commentaires;

        public function __construct(){
            $this->chapitres = new chapitre();
            $this->commentaires = new commentaire();
        }

        public function afficherEspaceAuteur(){
            $chapitres = $this->chapitres->recupererChapitres();
            $commentaires = $this->commentaires->recupererCommentairesSignales();
            $commentairesPasSignales = $this->commentaires->recupererCommentairesPasSignales();
            $vue = new vue('auteur');
            $vue->generer(array('chapitres' => $chapitres, 'commentaires' => $commentaires, 'commentairesPasSignales' => $commentairesPasSignales));
        }

        public function modifierChapitre($id){
            $chapitres = $this->chapitres->recupererChapitres();
            $chapitre = $this->chapitres->recupererChapitre($id);
            $vue = new vue('modifierchapitre');
            $vue->generer(array('chapitres' => $chapitres, 'chapitre' => $chapitre));
        }

        public function modifierCommentaire($id){
            $commentaire = $this->commentaires->recupererCommentaire($id);
            $chapitres = $this->chapitres->recupererChapitres();
            $vue = new vue('modifiercommentaire');
            $vue->generer(array('commentaire' => $commentaire, 'chapitres' => $chapitres));
        }
    }