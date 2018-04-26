<?php

    require_once 'modeles/chapitre.php';
    require_once 'vues/vue.php';

    class ControlleurHistoires {

        private $chapitres;

        public function __construct(){
            $this->chapitres = new Chapitre();
        }

        public function histoires(){
            $chapitres = $this->chapitres->recupererDerniersChapitres();
            $liste = $this->chapitres->recupererChapitres();
            $vue = new vue('histoires');
            $vue->generer(array('chapitres' => $chapitres, 'liste' => $liste));
        }

    }