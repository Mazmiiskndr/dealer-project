<?php

namespace App\Repositories\Blog;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\Blog;

class BlogRepositoryImplement extends Eloquent implements BlogRepository
{

    /**
     * Model class to be used in this repository for the common methods inside Eloquent
     * Don't remove or change $this->model variable name
     * @property Blog|mixed $blogModel;
     */
    protected $blogModel;

    public function __construct(Blog $blogModel)
    {
        $this->blogModel = $blogModel;
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
        // Query to retrieve blogs with their categories
        $query = Blog::with('category')->latest();

        // Filter by category_id if provided
        if ($categoryId !== null) {
            $query->where('category_id', $categoryId);
        }

        // Filter by tag if provided (tags stored as JSON)
        if ($tag !== null) {
            $query->whereJsonContains('tags', $tag);
        }

        // Limit the number of blogs if specified
        if ($limit !== null) {
            $query->limit($limit);
        }

        // Retrieve the blogs based on the query
        $blogs = $query->get();

        return $blogs;
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
        // Retrieve blog with its category by blog ID
        $blog = $this->blogModel->with('category')->find($blogId);

        // If blog is not found, throw an exception
        if (!$blog) {
            throw new \InvalidArgumentException("Blog with ID {$blogId} cannot be found.");
        }

        return $blog;
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
        // Ensure $blogIds is an array
        $blogIds = is_array($blogIds) ? $blogIds : [$blogIds];

        // Fetch blogs by IDs
        $blogs = $this->blogModel->whereIn('id', $blogIds)->get();

        if ($blogs->isEmpty()) {
            throw new \InvalidArgumentException("Blogs with the given IDs cannot be found.");
        }

        // Delete the blogs
        $this->blogModel->whereIn('id', $blogIds)->delete();
    }

}
