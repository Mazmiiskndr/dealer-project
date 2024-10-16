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

    // Write something awesome :)
}
