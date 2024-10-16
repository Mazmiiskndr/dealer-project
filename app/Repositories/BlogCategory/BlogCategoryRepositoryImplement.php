<?php

namespace App\Repositories\BlogCategory;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\BlogCategory;

class BlogCategoryRepositoryImplement extends Eloquent implements BlogCategoryRepository
{

    /**
     * Model class to be used in this repository for the common methods inside Eloquent
     * Don't remove or change $this->model variable name
     * @property BlogCategory|mixed $blogCategoryModel;
     */
    protected $blogCategoryModel;

    public function __construct(BlogCategory $blogCategoryModel)
    {
        $this->blogCategoryModel = $blogCategoryModel;
    }

    /**
     * Get all blog categories with optional limit.
     * 
     * @param int|null $limit
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getCategories($limit = null)
    {
        // Query to retrieve all categories
        $query = BlogCategory::latest();

        // Apply limit if specified
        if ($limit !== null) {
            $query->limit($limit);
        }

        // Retrieve the categories
        $categories = $query->get();

        return $categories;
    }

    /**
     * Get a category by its ID.
     * 
     * @param int $categoryId
     * @return \Illuminate\Database\Eloquent\Model|mixed
     * @throws \InvalidArgumentException
     */
    public function getCategoryById($categoryId)
    {
        // Retrieve category by ID
        $category = $this->blogCategoryModel->find($categoryId);

        // If category is not found, throw an exception
        if (!$category) {
            throw new \InvalidArgumentException("Category with ID {$categoryId} cannot be found.");
        }

        return $category;
    }

    /**
     * Delete categories by given IDs.
     * 
     * @param array|int $categoryIds
     * @return void
     * @throws \InvalidArgumentException
     */
    public function deleteCategories($categoryIds)
    {
        // Ensure $categoryIds is an array
        $categoryIds = is_array($categoryIds) ? $categoryIds : [$categoryIds];

        // Fetch categories by IDs
        $categories = $this->blogCategoryModel->whereIn('id', $categoryIds)->get();

        if ($categories->isEmpty()) {
            throw new \InvalidArgumentException("Categories with the given IDs cannot be found.");
        }

        // Delete the categories
        $this->blogCategoryModel->whereIn('id', $categoryIds)->delete();
    }
}
