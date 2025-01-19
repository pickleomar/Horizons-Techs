<?php

namespace App\Services;


interface ArticleServiceInterface
{
    public function getAllArticles();
    public function getArticleById($id);
    public function createArticle(array $data);
    public function updateArticle($id, array $data);
    public function deleteArticle($id);
}
