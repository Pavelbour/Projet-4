<?php

    namespace Projet4\views;

    class View
    {

        private $file;

        public function __construct($action)
        {
            $this->file = '../Lib/Projet4/views/view' . $action . '.php';
        }

        public function generate($data)
        {
            $content = $this->generateFile($this->file, $data);
            $view = $this->generateFile('../Lib/Projet4/views/layout.php', array('chapters' => $data['chapters'], 'content' => $content));
            echo $view;
        }

        private function generateFile($file, $data)
        {
            if(file_exists($file)){
                extract($data);                
                ob_start();
                require $file;
                return ob_get_clean();
            } else {
                echo 'The file' . $file . 'not found';
            }
            
        }
    }