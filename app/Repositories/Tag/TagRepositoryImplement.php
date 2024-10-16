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

    // Write something awesome :)
}
