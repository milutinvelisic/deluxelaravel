<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    private $blogModel;

    public function __construct()
    {
        $this->blogModel = new Blog();
    }

    public function index()
    {

        return view("pages.blog", [
            "allBlogs" => $this->blogModel->getAllBlogs(),
            "numberOfBlogs" => $this->blogModel->numberOfBlogs()
        ]);
    }

    public function search(Request $request)
    {

        return $this->blogModel->searchBlog($request);

    }

    public function numberOfLinks(Request $request)
    {
        return $this->blogModel->numberOfLinks($request);
    }
}
