<?php
require_once "BaseController.php";

class TwigBaseController extends BaseController {
    public $title = ""; // название страницы
    public $template = ""; // шаблон страницы
    protected \Twig\Environment $twig;
    public $url ="";
    public $menu = [];
    public function setTwig($twig) {
        $this->twig = $twig;
    }

    
    
    public function getContext() : array
    {
        $context = parent::getContext(); // вызываем родительский метод
        $context['title'] = $this->title; // добавляем title в контекст
        $context['menu'] = $this->menu;
        $context['url'] = $this->url;

        return $context;
    }
    
    
    public function get(array $context) { // добавил аргумент в get
        echo $this->twig->render($this->template, $context); // а тут поменяем getContext на просто $context
    }
}
