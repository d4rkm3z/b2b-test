<?php

namespace app;

class User implements IUser
{

    /**
     * @var Article[]
     */
    private $articles = [];
    /**
     * @var string
     */
    private $name;

    /**
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function addArticle(IArticle $article): void
    {
        array_push($this->articles, $article);
    }

    public function getAllArticles(): array
    {
        return $this->articles;
    }

    public function removeArticle(IArticle $article): void
    {
        $id = array_search($article, $this->articles);
        array_splice($arr, $id, 1);
    }
}
