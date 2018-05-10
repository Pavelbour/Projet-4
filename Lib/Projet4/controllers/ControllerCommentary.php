<?php

    namespace Projet4\controllers;
    use Projet4\models\Commentary;

    class ControllerCommentary
    {

        private $commentarys;

        public function __construct()
        {
            $this->commentarys = new Commentary();
        }

        public function getCommentarys($id)
        {
             return $this->commentarys->getCommentarys($id);
        }

        public function addCommentary($utilisateur, $chapitre, $contenu)
        {
            return $this->commentarys->addCommentary($utilisateur, $chapitre, $contenu);
        }

        public function reportCommentary($id)
        {
            $this->commentarys->reportCommentary($id);
        }

        public function approveCommentary($id)
        {
            $this->commentarys->approveCommentary($id);
        }

        public function modifyCommentary($id, $content)
        {
            $this->commentarys->modifyCommentary($id, $content);
        }

        public function deleteCommentary($id)
        {
            $this->commentarys->deleteCommentary($id);
        }
        
    }