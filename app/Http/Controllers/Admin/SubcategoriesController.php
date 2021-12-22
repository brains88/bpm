<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Validator;

class SubcategoriesController extends Controller
{
    public function add()
    {
        $data = request()->all();
        $validator = Validator::make($data, [
            'name' => ['required', 'string'],
            'category' => ['required', 'string'],
        ]);


        if (!$validator->passes()) {
            return response()->json([
                'status' => 0,
                'error' => $validator->errors()
            ]);
        }

        $categoryid = $data['category'];
        foreach(Subcategory::all()->toArray() as $sub) {
            if (($sub['name'] == $data['name']) && ($sub['category_id'] == $categoryid)) {
                return response()->json([
                    'status' => 0,
                    'info' => 'Subcategory name already exists for the selected category'
                ]);
            }
        }

        Subcategory::create([
            'name' => $data['name'],
            'category_id' => $categoryid,
        ]);

        return response()->json([
            'status' => 1,
            'info' => 'Operation successful',
            'redirect' => ''
        ]);
    }

    public function edit($id)
    {
        $data = request()->all();
        $validator = Validator::make($data, [
            'name' => ['required', 'string'],
            'category' => ['required', 'integer'],
        ]);


        if (!$validator->passes()) {
            return response()->json([
                'status' => 0,
                'error' => $validator->errors()
            ]);
        }

        $categoryid = $data['category'];
        foreach(Subcategory::all()->toArray() as $category) {
            if (($category['name'] == $data['name']) && ($category['id'] == $categoryid) && $category['id'] !== $id) {
                return response()->json([
                    'status' => 0,
                    'info' => 'Subcategory name already exists for the selected category'
                ]);
            }
        }

        $sub = Subcategory::find($id);
        $sub->name = $data['name'];
        $sub->category_id = $categoryid;
        $sub->update();

        return response()->json([
            'status' => 1,
            'info' => 'Operation successful',
            'redirect' => ''
        ]);
    }

    public function delete($id)
    {
        Subcategory::find($id)->delete();
        return response()->json([
            'status' => 1,
            'info' => 'Operation successful'
        ]);
    }
}
