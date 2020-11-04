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

    public function getUser($pseudo)
    {
        $query = $this->dao->prepare('SELECT * FROM users WHERE pseudo = :pseudo');
        $query->execute([
            'pseudo' => $pseudo
        ]);
        $query->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\User');
        $user = $query->fetch();

        if (isset($user))
        {
            return $user;
        }
        return null;
    }

    protected function add(User $user)
    {
        if (!$user->isValid())
        {
            throw new \RuntimeException('The user you are trying to add is not valid.');
        }

        $query = $this->dao->prepare('INSERT INTO users VALUES (
                      pseudo = :pseudo,
                      mail = :mail,
                      city = :city,
                      password = :password
                      )');
        $query->execute([
            'pseudo' => $user->pseudo(),
            'mail' => $user->mail(),
            'city' => $user->city(),
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