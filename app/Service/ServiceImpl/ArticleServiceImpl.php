<?php


namespace App\Service\ServiceImpl;


use App\Models\Article;

class ArticleServiceImpl implements \App\Service\ArticleService
{

    public function getAllArticles()
    {
        return Article::all();
    }

    public function save($article)
    {
        return Article::create($article);
    }

    public function findById($id)
    {
        return Article::findOrFail($id);
    }

    public function deleteArticle($article)
    {
        $article = $this->findById($article);
        return $article->delete();
    }

    public function updateArticle($article)
    {
        return Article::whereId($article->id)->update($article->all());
    }
}
