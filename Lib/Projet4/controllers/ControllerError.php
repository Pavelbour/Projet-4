<?php

    namespace Projet4\controllers;
    use Projet4\models\Chapter;
    use Projet4\views\View;

    class ControllerError
    {

        private $chapters;

        public function __construct()
        {
            $this->chapters = new Chapter();
        }

        public function error($msgError)
        {
            $view = new View('error');
            $view->generate(array('msgError' => $msgError, 'chapters' => $this->chapters->getLastChapters()));
        }

    }