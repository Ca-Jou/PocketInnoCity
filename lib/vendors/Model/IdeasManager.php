<?php
namespace Model;

use Entity\Idea;
use Framework\Manager;

abstract class IdeasManager extends Manager
{
    abstract public function getList($first = -1, $total = -1);

    abstract public function getCityList($cityID);

    abstract public function getIdea($id);

    abstract protected function add(Idea $idea);

    abstract public function delete($id);
}