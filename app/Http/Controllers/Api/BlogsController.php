<?php

namespace App\Http\Controllers\Api;
use App\Models\Blog;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use \Carbon\Carbon;
use \Exception;
use Validator;

class BlogsController extends Controller
{
    /**
     * Upload blog image
     */
    public function image($id = 0)
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
        $filename = \Str::uuid().'.'.$extension;
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

    public function status($id)
    {
        $blog = Blog::find($id);
        $blog->published = (boolean)request()->post('status');
        $blog->update();
        return response()->json([
            'status' => 1, 
            'info' => 'Article status updated successfully',
            'redirect' => ''
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

        $published = (boolean)$data['status'] ?? false;
        if($published === true) {
            return response()->json([
                'status' => 0, 
                'info' => 'You can publish the post only after uploading an image. Select No.',
            ]);
        }

        Blog::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'category_id' => $data['category'],
            'published' => $published,
            'user_id' => auth()->id(),
            'reference' => Str::random(64),
        ]);

        return response()->json([
            'status' => 1, 
            'info' => 'Operation successful',
            'redirect' => route(request()->subdomain().'.blogs')
        ]);

    }

    public function edit($id = 0)
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
        $blog->update();

        return response()->json([
            'status' => 1, 
            'info' => 'Operation Successful',
            'redirect' => route(request()->subdomain().'.blogs')
        ]);

    }

}