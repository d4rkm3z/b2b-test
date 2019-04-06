<?php


namespace app;


interface IArticle
{
    /**
     * Returns current author of article
     * @return IUser
     */
    public function getAuthor(): IUser;

    /**
     * Change author of article
     * @param IUser $author
     */
    public function setAuthor(IUser $author): void;
}
