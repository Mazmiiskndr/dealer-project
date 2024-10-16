<?php

namespace App\Services\Tag;

use App\Traits\HandleRepositoryCall;
use LaravelEasyRepository\Service;
use App\Repositories\Tag\TagRepository;

class TagServiceImplement extends Service implements TagService
{
  use HandleRepositoryCall;
  /**
   * don't change $this->mainRepository variable name
   * because used in extends service class
   */
  protected $mainRepository;

  public function __construct(TagRepository $mainRepository)
  {
    $this->mainRepository = $mainRepository;
  }

  /**
   * Get all tags with optional limit.
   * 
   * @param int|null $limit
   * @return \Illuminate\Database\Eloquent\Collection|static[]
   */
  public function getTags($limit = null)
  {
    return $this->handleRepositoryCall('handleRepositoryCall', [$limit]);
  }

  /**
   * Get a tag by its ID.
   * 
   * @param int $tagId
   * @return \Illuminate\Database\Eloquent\Model|mixed
   * @throws \InvalidArgumentException
   */
  public function getTagById($tagId)
  {
    return $this->handleRepositoryCall('getTagById', [$tagId]);
  }

  /**
   * Delete tags by given IDs.
   * 
   * @param array|int $tagIds
   * @return void
   * @throws \InvalidArgumentException
   */
  public function deleteTags($tagIds)
  {
    return $this->handleRepositoryCall('deleteTags', [$tagIds]);
  }
}
