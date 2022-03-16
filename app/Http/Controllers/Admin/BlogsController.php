<?php

namespace App\Http\Controllers\Admin;
use App\Models\{Category, Blog, Country};
use App\Http\Controllers\Controller;
use Validator;

class BlogsController extends Controller
{
    /**
     * Admin Bogs list view
     */
    public function index($limit = 12)
    {
        return view('admin.blogs.index')->with(['blogs' => Blog::paginate(8), 'categories' => Category::where(['type' => 'blog'])->get()]);
    }

    /**
     * Admin Blog add
     */
    public function add()
    {
        return view('admin.blogs.add')->with(['categories' => Category::where(['type' => 'blog'])->get(), 'blogs' => Blog::paginate(4)]);
    }

    /**
     * Admin Blog edit
     */
    public function edit($id = 0)
    {
        return view('admin.blogs.edit')->with(['categories' => Category::where(['type' => 'blog'])->get(), 'blog' => Blog::find($id), 'blogs' => Blog::paginate(4)]);
    }

    /**
     * Admin view Blog bg category
     */
    public function category($categoryid = 0)
    {
        return view('admin.blogs.category')->with(['categories' => Category::where(['type' => 'blog'])->get(), 'blogs' => Blog::where(['category_id' => $categoryid])->paginate(15)]);
    }

}
