<?php

namespace app;

class Article implements IArticle
{
    /**
     * @var User
     */
    private $author;

    /**
     * @param IUser $author
     */
    public function __construct(IUser $author)
    {
        $this->author = $author;
    }

    public function getAuthor(): IUser
    {
        return $this->author;
    }

    public function setAuthor(IUser $author): void
    {
        $this->author->removeArticle($this);
        $this->author = $author;
    }
}
