<?php

namespace App\Livewire\Backend\Blog;

use App\Services\Blog\BlogService;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Cards extends Component
{
    use WithPagination;
    public $perPage = 9;
    public $paginationTheme = 'bootstrap';
    public $search = '';
    public $showing = '';
    public $blog_id;
    public $categoryFilters = [];

    /**
     * Mount the component.
     * @return void
     */
    public function mount()
    {
        $this->categoryFilters = request()->input('categoryFilters', []) ?? [];
    }

    public function render(BlogService $blogService)
    {
        // Retrieve paginated data based on search, showing, and category filters
        $blogs = $blogService->getPaginatedBlogs($this->perPage, $this->search, $this->showing, $this->categoryFilters) ?? [];
        // Pass the paginated blogs to the view
        return view('livewire.backend.blog.cards', ['blogs' => $blogs]);
    }

    /**
     * Update the showing option.
     * @param string $showing - The showing option
     * @return void
     */
    public function updateShowing($showing)
    {
        $this->showing = $showing;
    }

    /**
     * Update the search keyword.
     * @param string $keyword - The search keyword
     * @return void
     */
    #[On('searchBlog')]

    public function updateSearch($keyword)
    {
        $this->search = $keyword;
    }

    /**
     * Handle updating the search keyword.
     * @return void
     */
    public function updatingSearch()
    {
        $this->resetPage();
    }

    /**
     * Update the selected category filters.
     * @param int $categoryId - The ID of the category
     * @param bool $isChecked - Indicates whether the category is checked or not
     * @return void
     */
    #[On('searchCategory')]
    public function updateCategorySelected($categoryIds)
    {
        $this->categoryFilters = is_array($categoryIds) ? array_filter($categoryIds) : [];
        // Reset pagination
        $this->resetPage();
    }

}
