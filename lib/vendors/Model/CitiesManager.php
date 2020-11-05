<?php
namespace Model;

use Entity\City;
use Framework\Manager;

abstract class CitiesManager extends Manager
{
    abstract public function getList($first = -1, $total = -1);

    abstract public function getCity($id);

    abstract public function getUserCities($userID);

    abstract protected function add(City $city);

    abstract public function delete($id);
}