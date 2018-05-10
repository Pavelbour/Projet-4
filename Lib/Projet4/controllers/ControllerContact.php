<?php

    namespace Projet4\controllers;
    use Projet4\models\Chapter;
    use Projet4\views\View;

    class ControllerContact
    {

        private $chapters;

        public function __construct()
        {
            $this->chapters = new Chapter();
        }

        public function contact()
        {
            $chapters = $this->chapters->getLastChapters();
            $view = new View('contact');
            $view->generate(array('chapters' => $chapters));
        }

    }