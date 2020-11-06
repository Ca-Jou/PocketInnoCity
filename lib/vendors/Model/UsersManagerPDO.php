<?php
namespace Model;

use Entity\User;

class UsersManagerPDO extends UsersManager
{
    public function getList($first = -1, $total = -1)
    {
        $sql = 'SELECT * FROM users';

        if ($first != -1 || $total!= -1)
        {
            $sql .= ' LIMIT '.(int) $total.' OFFSET '.(int) $first;
        }

        $query = $this->dao->query($sql);
        $query->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\User');

        $usersList = $query->fetchAll();
        $query->closeCursor();

        return $usersList;
    }

    public function getUserByPseudo($pseudo)
    {
        $query = $this->dao->prepare('SELECT userID, pseudo, mail, city, password FROM users WHERE pseudo = :pseudo');
        $query->execute([
            'pseudo' => $pseudo
        ]);

        $query->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\User');
        $user = $query->fetch();

        if ($user === false)
        {
            return null;
        }
        return $user;
    }

    public function getUserById($id)
    {
        $query = $this->dao->prepare('SELECT userID, pseudo, mail, city, password FROM users WHERE userID = :id');
        $query->execute([
            'id' => $id
        ]);

        $query->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\User');
        $user = $query->fetch();

        if ($user === false)
        {
            return null;
        }
        return $user;
    }

    public function getUserLikes($userID)
    {
        $query = $this->dao->prepare('SELECT idea FROM likes WHERE user = :user');
        $query->execute([
            'user' => $userID
        ]);

        $userLikes = [];

        while ($ideaID = $query->fetchColumn())
        {
            $userLikes[] = $ideaID;
        }

        $query->closeCursor();

        return $userLikes;
    }

    public function add(User $user)
    {
        if (!$user->isValid())
        {
            throw new \RuntimeException('The user you are trying to add is not valid.');
        }

        $query = $this->dao->prepare('INSERT INTO users (pseudo, mail, city, password) VALUES (:pseudo, :mail, :city, :password)');

        $query->execute([
            'pseudo' => $user->pseudo(),
            'mail' => $user->mail(),
            'city' => (int) $user->city(),
            'password' => $user->password()
        ]);
    }

    public function delete($id)
    {
        $query = $this->dao->prepare('DELETE FROM users WHERE userID = :id');
        $query->execute([
            'id' => $id
        ]);
    }
}