<?php


namespace App\Service\ServiceImpl;


use App\Models\Article;

class ArticleServiceImpl implements \App\Service\ArticleService
{

    public function getAllArticle()
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

    public function deleteBoutique($articleId)
    {
        $boutique = $this->findById($articleId);
        return $boutique->delete();
    }

    public function updateArticle($article)
    {
        return Article::whereId($article->id)->update($article->all());
    }
}
