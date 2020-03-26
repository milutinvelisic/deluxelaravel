<?php

namespace App\Models;

class Blog
{
    public function getAllBlogs()
    {
        // return \DB::table("blog")->paginate(8);

        return \DB::table('blog')
            ->offset(0)
            ->limit(8)
            ->get();
    }

    public function numberOfBlogs()
    {
        return \DB::table("blog")
            ->selectRaw("COUNT(*) as numberOfBlogs")->first();
    }

    public function filteredBlogs($keyword)
    {
        return \DB::table("blog")
            ->where("textBlog", "like", "%" . $keyword . "%")
            ->get();
    }

    public function searchBlog($request)
    {
        $query = \DB::table("blog");

        if ($request->has("keyword")) {
            $query = $query->where("textBlog", "like", "%" . $request->input("keyword") . "%");
        }

        if ($request->has("page")) {
            $query = $query->offset($request->input("page") * 8 - 8)->limit(8);
        }

        return $query->get();
    }

    public function numberOfLinks($request)
    {
        $query = \DB::table("blog");

        if ($request->has("keyword")) {
            $query = $query->where("textBlog", "like", "%" . $request->input("keyword") . "%");
        }

        $query = $query->selectRaw("COUNT(*) as nmberOfBlogs");

        return $query->get();
    }
}
