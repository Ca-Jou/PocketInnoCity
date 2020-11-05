<?php
namespace Model;

use Entity\Idea;

class IdeasManagerPDO extends IdeasManager
{
    public function getList($first = -1, $total = -1)
    {
        $sql = 'SELECT ideaID, author, title, content, location, likes, tag1, tag2, tag3, city, reports, done FROM ideas ORDER BY likes DESC';

        if ($first != -1 || $total!= -1)
        {
            $sql .= ' LIMIT '.(int) $total.' OFFSET '.(int) $first;
        }

        $query = $this->dao->query($sql);
        $query->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Idea');

        $ideasList = $query->fetchAll();

        $query->closeCursor();

        return $ideasList;
    }

    public function getCityList($cityID)
    {
        $sql = 'SELECT ideaID, author, title, content, location, likes, tag1, tag2, tag3, city, reports, done FROM ideas WHERE city = :city ORDER BY likes DESC';

        $query = $this->dao->prepare($sql);
        $query->execute([
            'city' => $cityID
        ]);
        $query->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Idea');

        $cityIdeas = $query->fetchAll();

        $query->closeCursor();

        return $cityIdeas;
    }

    public function getUserList($userID)
    {
        $sql = 'SELECT ideaID, author, title, content, location, likes, tag1, tag2, tag3, city, reports, done FROM ideas WHERE author = :author ORDER BY likes DESC';

        $query = $this->dao->prepare($sql);
        $query->execute([
            'author' => $userID
        ]);
        $query->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Idea');

        $userIdeas = $query->fetchAll();

        $query->closeCursor();

        return $userIdeas;
    }

    public function getIdea($id)
    {
        $sql = 'SELECT ideaID, author, title, content, location, likes, tag1, tag2, tag3, city, reports, done FROM ideas WHERE ideaID = :id';

        $query = $this->dao->prepare($sql);
        $query->execute([
            'id' => $id
        ]);
        $query->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Idea');

        $idea = $query->fetch();

        if (isset($idea))
        {
            return $idea;
        }

        return null;
    }

    protected function add(Idea $idea)
    {
        if (!$idea->isValid())
        {
            throw new \RuntimeException('The idea has to be valid to be saved.');
        }

        $query = $this->dao->prepare('INSERT INTO ideas SET 
                      author = :author,
                      title = :title,
                      content = :content,
                      location = :location,
                      likes = 0,
                      tag1 = :tag1,
                      tag2 = :tag2,
                      tag3 = :tag3,
                      city = :city,
                      reported = F,
                      done = F');
        $query->execute([
            'author' => $idea->author(),
            'title' => $idea->title(),
            'content' => $idea->content(),
            'location' => $idea->location(),
            'tag1' => isset($idea->tags()[0])? $idea->tags()[0] : null,
            'tag2' => isset($idea->tags()[1])? $idea->tags()[1] : null,
            'tag3' => isset($idea->tags()[2])? $idea->tags()[2] : null,
            'city' => $idea->city()
        ]);
    }

    public function delete($id)
    {
        $query = $this->dao->prepare('DELETE FROM ideas WHERE ideaID = :id');
        $query->execute([
            'id' => $id
        ]);
    }
}