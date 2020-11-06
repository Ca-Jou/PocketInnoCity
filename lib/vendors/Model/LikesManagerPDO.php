<?php
namespace Model;

class LikesManagerPDO extends LikesManager
{
    public function add($userID, $ideaID)
    {
        $exists = $this->exists($userID, $ideaID);

        if (!$exists)
        {
            $query = $this->dao->prepare('INSERT INTO likes (user, idea) VALUES (:user, :idea)');
            $query->execute([
                'user' => $userID,
                'idea' => $ideaID
            ]);
        }
    }

    public function delete($userID, $ideaID)
    {
        $exists = $this->exists($userID, $ideaID);

        if ($exists !== false)
        {
            $query = $this->dao->prepare('DELETE FROM likes WHERE id = :id');
            $query->execute([
                'id' => $exists
            ]);
        }
    }

    public function exists($userID, $ideaID)
    {
        $query = $this->dao->prepare('SELECT id FROM likes WHERE user = :user AND idea = :idea');
        $query->execute([
            'user' => $userID,
            'idea' => $ideaID
        ]);

        return $query->fetchColumn();
    }
}