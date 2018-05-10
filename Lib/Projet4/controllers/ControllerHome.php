<?php

    namespace Projet4\controllers;
    use Projet4\models\Chapter;
    use Projet4\views\View;

    class ControllerHome
    {

        private $chapters;

        public function __construct()
        {
            $this->chapters = new Chapter();
        }

        public function home()
        {
            $chapters = $this->chapters->getLastChapters();
            $view = new View('home');
            $view->generate(array('chapters' => $chapters));
        }

    }