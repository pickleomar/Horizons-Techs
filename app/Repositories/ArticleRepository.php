<?php

/**
 * Class articleRepository
 *
 * This class implements the articleRepositoryInterface and provides methods to interact with the article model.
 *
 * @package App\Repositories
 */

namespace App\Repositories;

use App\Models\Article;
use App\Repositories\ArticleRepositoryInterface;

class ArticleRepository implements ArticleRepositoryInterface
{
    /**
     * @var Article The article model instance.
     */
    protected Article $model;

    /**
     * articleRepository constructor.
     *
     * @param Article $model The article model instance.
     */
    public function __construct(article $model)
    {
        $this->model = $model;
    }

    /**
     * Retrieve all articles.
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[] All articles.
     */
    public function all()
    {
        return $this->model->all();
    }

    /**
     * Find a article by its ID.
     *
     * @param int $id The ID of the article.
     * @return Article|null The article if found, null otherwise.
     */
    public function find($id)
    {
        return $this->model->find($id);
    }

    /**
     * Create a new article.
     *
     * @param array $data The data to create the article.
     * @return Article The created article.
     */
    public function create(array $data)
    {
        return $this->model->create($data);
    }

    /**
     * Update an existing article.
     *
     * @param int $id The ID of the article to update.
     * @param array $data The data to update the article.
     * @return Article|null The updated article if found, null otherwise.
     */
    public function update($id, array $data)
    {
        $article = $this->find($id);
        if ($article) {
            $article->update($data);
            return $article;
        }
        return null;
    }

    /**
     * Delete a article by its ID.
     *
     * @param int $id The ID of the article to delete.
     * @return bool True if the article was deleted, false otherwise.
     */
    public function delete($id)
    {
        $article = $this->find($id);
        if ($article) {
            $article->delete();
            return true;
        }
        return false;
    }
}
