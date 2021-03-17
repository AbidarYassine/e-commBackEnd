<?php


namespace App\Service;


interface ArticleService
{
    public function getAllArticles();

    public function save($article);

    public function findById($id);


    public function deleteArticle($article);

    public function updateArticle($article);
}
