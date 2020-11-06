<?php
namespace Model;

class SubscriptionsManagerPDO extends SubscriptionsManager
{
    public function getList($first = -1, $total = -1)
    {
        // TODO: Implement getList() method.
    }

    public function getUserSubscriptions($pseudo)
    {
        // TODO: Implement getUserSubscriptions() method.
    }

    public function add($userID, $cityID)
    {
        $query = $this->dao->prepare('SELECT subID FROM subscriptions WHERE user = :user AND city = :city');
        $query->execute([
            'user' => $userID,
            'city' => $cityID
        ]);

        $exists = $query->fetchColumn();
        $query->closeCursor();

        if (!$exists)
        {
            $query = $this->dao->prepare('INSERT INTO subscriptions (user, city) VALUES (:user, :city)');
            $query->execute([
                'user' => $userID,
                'city' => $cityID
            ]);

            return true;
        }
        return false;
    }

    public function delete($userID, $cityID)
    {
        $query = $this->dao->prepare('SELECT subID FROM subscriptions WHERE user = :user AND city = :city');
        $query->execute([
            'user' => $userID,
            'city' => $cityID
        ]);

        $exists = $query->fetchColumn();
        $query->closeCursor();

        if (!$exists)
        {
            return false;
        }

        $query = $this->dao->prepare('DELETE FROM subscriptions WHERE subID = :id');
        $query->execute([
            'id' => $exists
        ]);

        return true;
    }
}