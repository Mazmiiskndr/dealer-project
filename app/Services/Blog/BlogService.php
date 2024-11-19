<?php

namespace App\Services\Blog;

use LaravelEasyRepository\BaseService;

interface BlogService extends BaseService
{
    /**
     * Get all blogs with optional limit, category ID, and tag filters
     * 
     * @param int|null $limit
     * @param int|null $categoryId
     * @param string|null $tag
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getBlogs($limit = null, $categoryId = null, $tag = null);

    /**
     * Get a blog by its ID along with its category.
     * 
     * @param int $blogId
     * @return \Illuminate\Database\Eloquent\Model|mixed
     * @throws \InvalidArgumentException
     */
    public function getBlogById($blogId);

    /**
     * Delete blogs by given IDs.
     * 
     * @param array|int $blogIds
     * @return void
     * @throws \InvalidArgumentException
     */
    public function deleteBlogs($blogIds);

    /**
     * Get paginated blogs with search, filters, and sorting options.
     *
     * @param int $perPage - Number of items per page
     * @param string $search - Search keyword
     * @param string $showing - Sorting option
     * @param array $categoryFilters - Array of category filters
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function getPaginatedBlogs($perPage, $search, $showing, $categoryFilters);
}
