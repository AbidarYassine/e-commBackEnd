<?php


namespace App\Service;


interface ArticleService
{
    public function getAllArticle();

    public function save($article);

    public function findById($id);


    public function deleteArticle($article);

    public function updatArticle($article);
}
