<?php

namespace App\Repositories\BlogCategory;

use LaravelEasyRepository\Repository;

interface BlogCategoryRepository extends Repository
{
    /**
     * Get all blog categories with optional limit.
     * 
     * @param int|null $limit
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getCategories($limit);

    /**
     * Get a category by its ID.
     * 
     * @param int $categoryId
     * @return \Illuminate\Database\Eloquent\Model|mixed
     * @throws \InvalidArgumentException
     */
    public function getCategoryById($categoryId);

    /**
     * Delete categories by given IDs.
     * 
     * @param array|int $categoryIds
     * @return void
     * @throws \InvalidArgumentException
     */
    public function deleteCategories($categoryIds);
}
