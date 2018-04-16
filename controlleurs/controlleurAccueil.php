<?php

    require_once 'modeles/chapitre.php';
    require_once 'vues/vue.php';

    class controlleurAccueil {

        private $chapitres;

        public function __construct(){
            $this->chapitres = new chapitre();
        }

        public function accueil(){
            $chapitres = $this->chapitres->recupererChapitres();
            $vue = new vue('accueil');
            $vue->generer(array('chapitres' => $chapitres));
        }

    }