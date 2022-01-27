<?php

namespace App\Http\Controllers;
use App\Models\{Category, Blog};
use Illuminate\Http\Request;

class BlogController extends Controller
{
    //
    public function index()
    {
        return view('frontend.blog.index')->with(['title' => 'Our Blog', 'blogs' => Blog::paginate(26)]);
    }

    //
    public function read($id = 0, $slug = '')
    {
        $blog = Blog::findOrFail($id);
        return view('frontend.blog.read')->with(['title' => $blog->title ?? '', 'blog' => $blog, 'blogs' => Blog::paginate(26)]);
    }

}
