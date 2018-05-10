<?php

    namespace Projet4\controllers;
    use Projet4\models\Chapter;
    use Projet4\views\View;

    class ControllerHistorys
    {

        private $chapters;

        public function __construct()
        {
            $this->chapters = new Chapter();
        }

        public function historys()
        {
            $chapters = $this->chapters->getLastChapters();
            $list = $this->chapters->getChapters();
            $view = new View('historys');
            $view->generate(array('chapters' => $chapters, 'list' => $list));
        }

    }