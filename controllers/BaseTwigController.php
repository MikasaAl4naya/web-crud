<?php

class BaseTwigController extends TwigBaseController{
    public function getContext():array
    {
        $context = parent::getContext();

        // создаем запрос к БД
        $query = $this->pdo->query("SELECT DISTINCT title FROM bands_type ORDER BY 1");
        $types = $query->fetchAll();
        $context['new_types'] = $types;

        return $context;
    }
}