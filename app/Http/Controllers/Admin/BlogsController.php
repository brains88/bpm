<?php

namespace App\Http\Controllers\Admin;
use App\Models\{Category, Blog, Country};
use App\Http\Controllers\Controller;
use Validator;

class BlogsController extends Controller
{
    /**
     * Admin Properties list view
     */
    public function index()
    {
        return view('admin.blogs.index')->with(['allBlogs' => Blog::cursorPaginate(22)]);
    }

    public function image($id, Request $request)
    {
        $image = $request->file('image');
        $validator = Validator::make($image, [
            'image' => ['required', 'image', 'mimes:jpg,png,jpeg,gif,svg|max:2048']
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 0, 
                'error' => $validator->errors()
            ]);
        }

        $extension = $image->getClientOriginalExtension();
        $filename = strtolower(Str::random(32)).'.'.$extension;
        $path = 'images/articles';
        $image->move($path, $filename);

        $article = Blog::find($id);
        $file = "{$path}/{$article->image}";
        if (file_exists($file)) {
            unlink($file);
        }

        $article->image = $filename;
        $article->update();
        return response()->json([
            'status' => 1, 
            'info' => 'Article image updated successfully'
        ]);

    }

    public function add()
    {
        return view('admin.blogs.add', ['latestBlogs' => Blog::orderBy('created_at', 'desc')->limit(4)->get(), 'blogCategories' => Category::where(['type' => 'blog'])->get()]);
    }

    public function status($id)
    {
        $article = Blog::find($id);
        $article->published = (boolean)$article->published ? false : true;
        $article->update();
        return response()->json([
            'status' => 1, 
            'info' => 'Article status updated successfully'
        ]);
    }

    public function store()
    {
        $data = request()->all();
        $validator = Validator::make($data, [
            'title' => ['required', 'string'],
            'description' => ['required', 'string'],
            'category' => ['required', 'integer'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 0, 
                'error' => $validator->errors()
            ]);
        }

        Blog::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'category_id' => $data['category'],
            'published' => (boolean)$data['status'] ?? false,
            'user_id' => 67
        ]);

        return response()->json([
            'status' => 1, 
            'info' => 'Operation successful',
            'redirect' => ''
        ]);

    }

    public function edit($id = 0)
    {
        return view('admin.blogs.edit', ['latestBlogs' => Blog::orderBy('created_at', 'desc')->limit(4)->get(), 'blogCategories' => Category::where(['type' => 'blog'])->get(), 'publish' => Blog::$publish, 'blogid' => (int)$id, 'singleBlog' => Blog::find($id)]);
    }

    public function update($id)
    {
        $data = request()->all();
        $validator = Validator::make($data, [
            'title' => ['required', 'string'],
            'description' => ['required', 'string'],
            'category' => ['required', 'integer'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 0, 
                'error' => $validator->errors()
            ]);
        }

        $blog = Blog::find($id);
        $blog->title = $data['title'];
        $blog->description = $data['description'];
        $blog->category_id = $data['category'];
        $blog->published = (boolean)$data['status'];

        return response()->json([
            'status' => 1, 
            'info' => 'Operation Successful',
            'redirect' => route('admin.blogs')
        ]);

    }


}
