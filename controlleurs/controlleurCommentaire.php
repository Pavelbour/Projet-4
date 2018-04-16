<?php

    require_once 'modeles/commentaire.php';

    class controlleurCommentaire{

        private $commentaires;

        public function __construct(){
            $this->commentaires = new commentaire();
        }

        public function obtenir_commentaires($id){
             return $this->commentaires->recupererCommentaires($id);
        }

        public function ecrire_commentaire($utilisateur, $chapitre, $contenu){
            return $this->commentaires->ajouterCommentaires($utilisateur, $chapitre, $contenu);
        }

        public function signalerCommentaire($id){
            $this->commentaires->signalerCommentaire($id);
        }

        public function approuverCommentaire($id){
            $this->commentaires->approuverCommentaire($id);
        }

        public function modifierCommentaire($id, $contenu){
            $this->commentaires->modifierCommentaire($id, $contenu);
        }

        public function effacerCommentaire($id){
            $this->commentaires->effacerCommentaire($id);
        }
        
    }