<?php

namespace App\Repositories\Tag;

use LaravelEasyRepository\Repository;

interface TagRepository extends Repository
{
    /**
     * Get all tags with optional limit.
     * 
     * @param int|null $limit
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getTags($limit);

    /**
     * Get a tag by its ID.
     * 
     * @param int $tagId
     * @return \Illuminate\Database\Eloquent\Model|mixed
     * @throws \InvalidArgumentException
     */
    public function getTagById($tagId);

    /**
     * Delete tags by given IDs.
     * 
     * @param array|int $tagIds
     * @return void
     * @throws \InvalidArgumentException
     */
    public function deleteTags($tagIds);
}
