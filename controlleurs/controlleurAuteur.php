<?php

    require_once 'modeles/chapitre.php';
    require_once 'modeles/commentaire.php';
    require_once 'vues/vue.php';

    class ControlleurAuteur{

        private $chapitres;
        private $commentaires;

        public function __construct(){
            $this->chapitres = new Chapitre();
            $this->commentaires = new Commentaire();
        }

        public function afficherEspaceAuteur(){
            $chapitres = $this->chapitres->recupererDerniersChapitres();
            $liste = $this->chapitres->recupererChapitres();
            $commentaires = $this->commentaires->recupererCommentairesSignales();
            $commentairesPasSignales = $this->commentaires->recupererCommentairesPasSignales();
            $vue = new vue('auteur');
            $vue->generer(array('chapitres' => $chapitres, 'liste' => $liste, 'commentaires' => $commentaires, 'commentairesPasSignales' => $commentairesPasSignales));
        }

        public function modifierChapitre($id){
            $chapitres = $this->chapitres->recupererDerniersChapitres();
            $chapitre = $this->chapitres->recupererChapitre($id);
            $vue = new vue('modifierchapitre');
            $vue->generer(array('chapitres' => $chapitres, 'chapitre' => $chapitre));
        }

        public function modifierCommentaire($id){
            $commentaire = $this->commentaires->recupererCommentaire($id);
            $chapitres = $this->chapitres->recupererDerniersChapitres();
            $vue = new vue('modifiercommentaire');
            $vue->generer(array('commentaire' => $commentaire, 'chapitres' => $chapitres));
        }
    }