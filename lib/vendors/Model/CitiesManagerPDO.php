<?php
namespace Model;

use Entity\City;

class CitiesManagerPDO extends CitiesManager
{
    public function getList($first = -1, $total = -1)
    {
        $sql = 'SELECT cityID, name, zip, country FROM cities';

        if ($first != -1 || $total!= -1)
        {
            $sql .= ' LIMIT '.(int) $total.' OFFSET '.(int) $first;
        }

        $query = $this->dao->query($sql);
        $query->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\City');

        $citiesList = $query->fetchAll();

        $query->closeCursor();

        return $citiesList;
    }

    public function getCity($id)
    {
        $sql = 'SELECT cityID, name, zip, country FROM cities WHERE cityID = :id';

        $query = $this->dao->prepare($sql);
        $query->execute([
            'id' => $id
        ]);
        $query->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\City');

        $city = $query->fetch();

        if ($city === false)
        {
            return null;
        }
        return $city;
    }

    public function getID($cityName)
    {
        $cityName = ucfirst($cityName);

        $sql = 'SELECT cityID FROM cities WHERE name = :name';

        $query = $this->dao->prepare($sql);
        $query->execute([
            'name' => $cityName
        ]);

        $cityID = $query->fetchColumn();

        if ($cityID === false)
        {
            return null;
        }
        return $cityID;
    }

    public function getUserCities($userID)
    {
        $sql = 'SELECT city FROM subscriptions WHERE user = :user';

        $query = $this->dao->prepare($sql);
        $query->execute([
            'user' => $userID
        ]);

        $cityIDs = [];

        while ($cityID = $query->fetchColumn())
        {
            $cityIDs[] = $cityID;
        }

        $query->closeCursor();

        $userCities = [];

        foreach ($cityIDs as $cityID)
        {
            $sql = 'SELECT cityID, name, zip, country FROM cities WHERE cityID = :id';

            $query = $this->dao->prepare($sql);
            $query->execute([
                'id' => $cityID
            ]);

            $query->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\City');
            $city = $query->fetch();

            $userCities[] = $city;
        }

        return $userCities;
    }

    public function getUserSuggestions($userID)
    {
        $sql = 'SELECT cityID, name, zip, country FROM cities WHERE cityID NOT IN (SELECT city FROM subscriptions WHERE user = :id) AND cityID NOT IN (1)';

        $query = $this->dao->prepare($sql);
        $query->execute([
            'id' => $userID
        ]);

        $query->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\City');

        $userSuggestions = $query->fetchAll();
        return $userSuggestions;
    }

    protected function add(City $city)
    {
        if (!$city->isValid())
        {
            throw new \RuntimeException('The city has to be valid to be saved.');
        }

        $query = $this->dao->prepare('INSERT INTO cities(name, zip, country) VALUES (:name, :zip, :country)');
        $query->execute([
            'name' => $city->name(),
            'zip' => $city->zip(),
            'country' => $city->country()
        ]);
    }

    public function delete($id)
    {
        $query = $this->dao->prepare('DELETE FROM cities WHERE cityID = :id');
        $query->execute([
            'id' => $id
        ]);
    }
}