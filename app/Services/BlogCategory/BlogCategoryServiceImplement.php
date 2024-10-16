<?php

namespace App\Services\BlogCategory;

use App\Traits\HandleRepositoryCall;
use LaravelEasyRepository\Service;
use App\Repositories\BlogCategory\BlogCategoryRepository;

class BlogCategoryServiceImplement extends Service implements BlogCategoryService
{
  use HandleRepositoryCall;
  /**
   * don't change $this->mainRepository variable name
   * because used in extends service class
   */
  protected $mainRepository;

  public function __construct(BlogCategoryRepository $mainRepository)
  {
    $this->mainRepository = $mainRepository;
  }

  /**
   * Get all blog categories with optional limit.
   * 
   * @param int|null $limit
   * @return \Illuminate\Database\Eloquent\Collection|static[]
   */
  public function getCategories($limit = null)
  {
    return $this->handleRepositoryCall('getCategories', [$limit]);
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
    return $this->handleRepositoryCall('getCategoryById', [$categoryId]);
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
    return $this->handleRepositoryCall('deleteCategories', [$categoryIds]);
  }
}
