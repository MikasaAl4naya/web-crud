<?php
class ObjectController extends TwigBaseController{
    public $template = "object.twig";
    public function getContext():array
    {
        $context = parent::getContext();

        $query = $this->pdo->prepare("SELECT title, desciption, id FROM bands WHERE id= :my_id");
        $query->bindValue("my_id", $this->params['id']);
        $query->execute(); 
        $data = $query->fetch();

        $context['title'] = $data['title'];
        $context['id'] = $data['id'];
        $context['desciption'] = $data['desciption'];


        return $context;
    }
}