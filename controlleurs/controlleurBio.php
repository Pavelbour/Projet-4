<?php

    require_once 'modeles/chapitre.php';
    require_once 'vues/vue.php';

    class ControlleurBio {

        private $chapitres;

        public function __construct(){
            $this->chapitres = new Chapitre();
        }

        public function bio(){
            $chapitres = $this->chapitres->recupererDerniersChapitres();
            $vue = new vue('bio');
            $vue->generer(array('chapitres' => $chapitres));
        }

    }