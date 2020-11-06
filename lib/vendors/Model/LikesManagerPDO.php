<?php
namespace Model;

class LikesManagerPDO extends LikesManager
{
    public function add($userID, $ideaID)
    {
        $query = $this->dao->prepare('SELECT id FROM likes WHERE user = :user AND idea = :idea');
        $query->execute([
            'user' => $userID,
            'idea' => $ideaID
        ]);

        $exists = $query->fetchColumn();
        $query->closeCursor();

        if (!$exists)
        {
            $query = $this->dao->prepare('INSERT INTO likes (user, idea) VALUES (:user, :idea)');
            $query->execute([
                'user' => $userID,
                'city' => $ideaID
            ]);

            return true;
        }
        return false;
    }

    public function delete($userID, $ideaID)
    {
        $query = $this->dao->prepare('SELECT id FROM likes WHERE user = :user AND idea = :idea');
        $query->execute([
            'user' => $userID,
            'idea' => $ideaID
        ]);

        $exists = $query->fetchColumn();
        $query->closeCursor();

        if (!$exists)
        {
            return false;
        }

        $query = $this->dao->prepare('DELETE FROM likes WHERE id = :id');
        $query->execute([
            'id' => $exists
        ]);

        return true;
    }
}