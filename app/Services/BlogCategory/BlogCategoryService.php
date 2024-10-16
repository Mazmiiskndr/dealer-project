<?php

namespace App\Services\BlogCategory;

use LaravelEasyRepository\BaseService;

interface BlogCategoryService extends BaseService
{
    /**
     * Get all blog categories with optional limit.
     * 
     * @param int|null $limit
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getCategories($limit = null);

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
