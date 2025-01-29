<?php

namespace App\Services;

use App\Repositories\ArticleRepository;

class ArticleService
{
    protected $articleRepository;
    public function __construct(ArticleRepository $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }

    public function getAllArticles()
    {
        return $this->articleRepository->all();
    }
    public function getArticleById($id)
    {
        return $this->articleRepository->find($id);
    }


    public function getArticleByUser($user_id)
    {
        return $this->articleRepository->all()->where("author_id", $user_id);
    }

    public function createArticle(array $data)
    {
        return $this->articleRepository->create($data);
    }
    public function updateArticle($id, array $data)
    {
        return $this->articleRepository->update($id, $data);
    }
    public function deleteArticle($id)
    {
        return $this->articleRepository->delete($id);
    }


    public function approveArticle($article_id)
    {
        $article = $this->articleRepository->find($article_id)->first();
        if (!$article) {
            return false;
        }
        return $this->articleRepository->update($article_id, ["status" => "Approved"]);
    }
    public function rejectArticle($article_id)
    {
        $article = $this->articleRepository->find($article_id)->first();
        if (!$article) {
            return false;
        }
        return $this->articleRepository->update($article_id, ["status" => "Rejected"]);
    }


    public function publishArticle($article_id, $issue_id)
    {
        $article = $this->articleRepository->find($article_id)->first();
        if (!$article) {
            return false;
        }
        return $this->articleRepository->update($article_id, ["status" => "Published", "issue_id" => $issue_id]);
    }

    public function proposeArticle($article_id)
    {
        $article = $this->articleRepository->find($article_id)->first();
        if (!$article) {
            return false;
        }
        return $this->articleRepository->update($article_id, ["status" => "Proposed"]);
    }

    public function publicArticle($article_id)
    {
        $article = $this->articleRepository->find($article_id)->first();
        if (!$article) {
            return false;
        }
        return $this->articleRepository->update($article_id, ["public" => 1]);
    }



    public function getRandomArticles($number = 3)
    {
        return $this->articleRepository->random($number);
    }


    public function getPublicArticles()
    {
        return $this->getAllArticles()->where("public", 1)->all();
    }
}
