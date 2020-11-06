<?php
namespace Model;

use Framework\Manager;

abstract class LikesManager extends Manager
{
    abstract protected function add($userID, $ideaID);

    abstract public function delete($userID, $ideaID);
}