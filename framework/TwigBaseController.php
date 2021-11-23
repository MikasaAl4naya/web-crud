<?php
require_once "BaseController.php";

class TwigBaseController extends BaseController {
    public $title = ""; 
    public $template = "";
    public $info = "";
    public $description = "";
    public $objectID = "";
    public $menu = [];
    protected \Twig\Environment $twig; 
    
      public function setTwig($twig) {
        $this->twig = $twig;
    }

    
    public function getContext() : array
    {
        $context = parent::getContext();
        $context['title'] = $this->title; 
        $query = $this->pdo->prepare("SELECT title, id FROM bands");
        $query->execute(); 
        $data = $query->fetchAll();
        $context['menu'] = [];
        for ($i = 0; $i <= count($data) - 1; $i++){

            array_push( $context['menu'], [
                    "title" => $data[$i]['title'],
                    "url" => "/bands/".$data[$i]['id'],
            ]);

        }
        $url = $_SERVER["REQUEST_URI"];
        $context['url'] = $url;

        return $context;
    }
    
    public function get() {
        echo $this->twig->render($this->template, $this->getContext());
    }
}