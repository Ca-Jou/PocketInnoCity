<?php
namespace Entity;

use Framework\Entity;

class Idea extends Entity
{
    protected $id;
    protected $author;
    protected $title;
    protected $content;
    protected $location;
    protected $likes;
    protected $tag1;
    protected $tag2;
    protected $tag3;
    protected $city;
    protected $reports;
    protected $done;

    const INVALID_AUTHOR = 1;
    const INVALID_TITLE = 2;
    const INVALID_CONTENT = 3;
    const INVALID_CITY = 4;

    public function isValid()
    {
        return !(empty($this->author) || empty($this->title) || empty($this->content) || empty($this->city));
    }

    // setters
    public function setId($id)
    {
        $this->id = (int) $id;
    }

    public function setAuthor($author)
    {
        if (empty($author))
        {
            $this->errors[] = self::INVALID_AUTHOR;
        }
        $this->author = $author;
    }

    public function setTitle($title)
    {
        if (!is_string($title) || empty($title))
        {
            $this->errors[] = self::INVALID_TITLE;
        }
        $this->title = $title;
    }

    public function setContent($content)
    {
        if (!is_string($content) || empty($content))
        {
            $this->errors[] = self::INVALID_CONTENT;
        }
        $this->content = $content;
    }

    public function setLocation($location)
    {
        if (is_string($location))
        {
            $this->location = $location;
        }
    }

    public function setTag1($tag)
    {
        $this->tag1 = $tag;
    }

    public function setTag2($tag)
    {
        $this->tag2 = $tag;
    }

    public function setTag3($tag)
    {
        $this->tag3 = $tag;
    }

    public function setCity($city)
    {
        if (!is_int($city))
        {
            $this->errors[] = self::INVALID_CITY;
        }
        $this->city = $city;
    }

    // getters
    public function id()
    {
        return $this->id;
    }

    public function author()
    {
        return $this->author;
    }

    public function title()
    {
        return $this->title;
    }

    public function content()
    {
        return $this->content;
    }

    public function location()
    {
        return $this->location;
    }

    public function city()
    {
        return $this->city;
    }

    public function likes()
    {
        return $this->likes;
    }
}