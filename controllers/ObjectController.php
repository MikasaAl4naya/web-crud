<?php
class ObjectController extends BaseTwigController{
    public $template = "object.twig";
    public function getContext():array
    {
        $context = parent::getContext();

        $query = $this->pdo->prepare("SELECT image, info, title, desciption, id FROM bands WHERE id= :id");
        $query->bindValue("id", $this->params['id']);
        $query->execute(); 
        $data = $query->fetch();
        $context['image'] = $data['image'];
        $context['info'] = $data['info'];
        $context['title'] = $data['title'];
        $context['id'] = $data['id'];
        $context['desciption'] = $data['desciption'];


        return $context;
    }
}