<?php
namespace Model;

use Entity\User;
use Framework\Manager;

abstract class UsersManager extends Manager
{
    abstract public function getList($first = -1, $total = -1);

    abstract public function getUser($pseudo);

    abstract protected function add(User $user);

    abstract public function delete($id);
}