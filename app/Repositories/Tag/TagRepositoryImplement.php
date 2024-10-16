<?php

namespace App\Repositories\Tag;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\Tag;

class TagRepositoryImplement extends Eloquent implements TagRepository
{

    /**
     * Model class to be used in this repository for the common methods inside Eloquent
     * Don't remove or change $this->model variable name
     * @property Tag|mixed $tagModel;
     */
    protected $tagModel;

    public function __construct(Tag $tagModel)
    {
        $this->tagModel = $tagModel;
    }

    /**
     * Get all tags with optional limit.
     * 
     * @param int|null $limit
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getTags($limit = null)
    {
        $query = Tag::latest(); // Query to retrieve all tags

        if ($limit !== null) {
            $query->limit($limit); // Apply limit if provided
        }

        return $query->get(); // Retrieve the tags
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
        $tag = $this->tagModel->find($tagId); // Retrieve tag by ID

        if (!$tag) {
            throw new \InvalidArgumentException("Tag with ID {$tagId} cannot be found.");
        }

        return $tag;
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
        $tagIds = is_array($tagIds) ? $tagIds : [$tagIds]; // Ensure $tagIds is an array

        $tags = $this->tagModel->whereIn('id', $tagIds)->get(); // Fetch tags by IDs

        if ($tags->isEmpty()) {
            throw new \InvalidArgumentException("Tags with the given IDs cannot be found.");
        }

        $this->tagModel->whereIn('id', $tagIds)->delete(); // Delete the tags
    }

}
