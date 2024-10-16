<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        return view('pages.backend.blogs.index');
    }
    public function categories()
    {
        return view('pages.backend.blogs.categories.index');
    }
    public function tags()
    {
        return view('pages.backend.blogs.tags.index');
    }
}
