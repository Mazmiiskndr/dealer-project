<?php

namespace App\Livewire\Backend\Blog;

use App\Services\Blog\BlogService;
use Livewire\Component;

class Cards extends Component
{
    public $blogs = [];

    public function mount(BlogService $blogService)
    {
        $this->blogs = $blogService->getBlogs(10);
    }

    public function render()
    {
        return view('livewire.backend.blog.cards');
    }
}
