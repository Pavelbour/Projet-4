<?php

    require_once 'modeles/chapitre.php';
    require_once 'vues/vue.php';

    class ControlleurAccueil {

        private $chapitres;

        public function __construct(){
            $this->chapitres = new Chapitre();
        }

        public function accueil(){
            $chapitres = $this->chapitres->recupererDerniersChapitres();
            $vue = new vue('accueil');
            $vue->generer(array('chapitres' => $chapitres));
        }

    }