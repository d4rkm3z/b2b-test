<?php


namespace app;


interface IUser
{
    /**
     * Bind new article to user
     * @param IArticle $article
     */
    public function addArticle(IArticle $article): void;

    /**
     * Returns all articles of current user
     * @return array
     */
    public function getAllArticles(): array;

    /**
     * Unlink article from {@link IUser}
     * @param IArticle $article
     */
    public function removeArticle(IArticle $article): void;
}
