<?php

namespace App\Services\Blog;

use App\Traits\HandleRepositoryCall;
use LaravelEasyRepository\Service;
use App\Repositories\Blog\BlogRepository;

class BlogServiceImplement extends Service implements BlogService
{
  use HandleRepositoryCall;
  /**
   * don't change $this->mainRepository variable name
   * because used in extends service class
   */
  protected $mainRepository;

  public function __construct(BlogRepository $mainRepository)
  {
    $this->mainRepository = $mainRepository;
  }

  /**
   * Get all blogs with optional limit, category ID, and tag filters
   * 
   * @param int|null $limit
   * @param int|null $categoryId
   * @param string|null $tag
   * @return \Illuminate\Database\Eloquent\Collection|static[]
   */
  public function getBlogs($limit = null, $categoryId = null, $tag = null)
  {
    return $this->handleRepositoryCall('getBlogs', [$limit, $categoryId, $tag]);
  }

  /**
   * Get a blog by its ID along with its category.
   * 
   * @param int $blogId
   * @return \Illuminate\Database\Eloquent\Model|mixed
   * @throws \InvalidArgumentException
   */
  public function getBlogById($blogId)
  {
    return $this->handleRepositoryCall('getBlogById', [$blogId]);
  }

  /**
   * Delete blogs by given IDs.
   * 
   * @param array|int $blogIds
   * @return void
   * @throws \InvalidArgumentException
   */
  public function deleteBlogs($blogIds)
  {
    return $this->handleRepositoryCall('deleteBlogs', [$blogIds]);
  }

  /**
   * Get paginated blogs with search, filters, and sorting options.
   *
   * @param int $perPage - Number of items per page
   * @param string $search - Search keyword
   * @param string $showing - Sorting option
   * @param array $categoryFilters - Array of category filters
   * @return \Illuminate\Pagination\LengthAwarePaginator
   */
  public function getPaginatedBlogs($perPage, $search, $showing, $categoryFilters)
  {
    return $this->handleRepositoryCall('getPaginatedBlogs', [$perPage, $search, $showing, $categoryFilters]);
  }
}
