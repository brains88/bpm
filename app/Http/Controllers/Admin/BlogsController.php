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
    public function index($limit = 12)
    {
        return view('admin.blogs.index')->with(['allBlogs' => Blog::cursorPaginate(8), 'blogCategories' => Category::where(['type' => 'blog'])->get()]);
    }

    public function image($id)
    {
        $image = request()->file('image');
        $validator = Validator::make(['image' => $image], [
            'image' => ['required', 'image', 'mimes:jpg,png,jpeg,gif,svg|max:10240']
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 0, 
                'error' => $validator->errors()
            ]);
        }

        $extension = $image->getClientOriginalExtension();
        $filename = md5($image.time()).'.'.$extension;
        $path = 'images/blogs';
        $image->move($path, $filename);

        $blog = Blog::find($id);
        if (!empty($blog->image)) {
            $prevfile = explode('/', $blog->image);
            $previmage = end($prevfile);
            $file = "{$path}/{$previmage}";
            if (file_exists($file)) {
                unlink($file);
            }
        }
            
        $blog->image = env('APP_URL')."/images/blogs/{$filename}";
        $blog->update();
        return response()->json([
            'status' => 1, 
            'info' => 'Blog image updated successfully'
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
