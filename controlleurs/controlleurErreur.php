<?php

    require_once 'modeles/chapitre.php';
    require_once 'vues/vue.php';

    class ControlleurErreur {

        private $chapitres;

        public function __construct(){
            $this->chapitres = new Chapitre();
        }

        public function erreur($msgErreur){
            $vue = new vue('erreur');
            $vue->generer(array('msgErreur' => $msgErreur, 'chapitres' => $this->chapitres->recupererChapitres()));
        }

    }