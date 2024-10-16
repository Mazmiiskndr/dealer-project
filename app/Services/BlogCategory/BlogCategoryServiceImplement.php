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

  // Define your custom methods :)
}
