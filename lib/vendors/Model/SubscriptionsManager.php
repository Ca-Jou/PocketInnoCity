<?php
namespace Model;

use Framework\Manager;

abstract class SubscriptionsManager extends Manager
{
    abstract public function getList($first = -1, $total = -1);

    abstract public function getUserSubscriptions($pseudo);

    abstract protected function add($userID, $cityID);

    abstract public function delete($userID, $cityID);
}