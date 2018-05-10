<?php

    namespace Projet4\controllers;
    use Projet4\models\Chapter;
    use Projet4\views\View;

    class ControllerBio
    {

        private $chapters;

        public function __construct()
        {
            $this->chapters = new Chapter();
        }

        public function bio()
        {
            $chapters = $this->chapters->getLastChapters();
            $view = new View('bio');
            $view->generate(array('chapters' => $chapters));
        }

    }