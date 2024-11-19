<?php

namespace App\Livewire\Backend\Blog;

use App\Services\BlogCategory\BlogCategoryService;
use Livewire\Attributes\On;
use Livewire\Component;

class FormSearch extends Component
{
    public $categories = [], $keyword, $category;

    public function mount(BlogCategoryService $blogCategoryService)
    {
        // Retrieve categories and convert them into key-value pairs for the select field
        $categories = $blogCategoryService->getCategories();

        // Assuming the categories are in a collection or array, map them into an associative array
        $this->categories = $categories->mapWithKeys(function ($category) {
            return [$category->id => $category->name];
        });
    }

    /**
     * Update the keyword when it is being updated.
     * @param string $keyword - The updated keyword
     * @return void
     */
    public function updatedKeyword($keyword)
    {
        // Emit 'searchBlog' event with the updated keyword
        $this->dispatch('searchBlog', $keyword);
    }

    #[On('categorySelected')]
    public function categorySelected($categoryIds)
    {
        $this->category = $categoryIds;
        $this->dispatch('searchCategory', [
            'category' => $categoryIds
        ]);
    }

    public function render()
    {
        return view('livewire.backend.blog.form-search');
    }
}
