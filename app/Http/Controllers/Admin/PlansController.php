<?php

namespace App\Http\Controllers\Admin;
use App\Models\{Plan};
use App\Http\Controllers\Controller;
use \Exception;
use Validator;

class PlansController extends Controller
{
	/**
     * Admin membership plans list view
     */
    public function index()
    {
        return view('admin.plans.index')->with(['plans' => Plan::paginate(16)]);
    }

    public function add()
    {
        $data = request()->all();
        $validator = Validator::make($data, [
            'details' => ['required', 'string'],
            'name' => ['required', 'string'],
            'price' => ['required', 'integer'],
            'listing' => ['required', 'integer'],
            'duration' => ['required', 'string'],
        ]);

        if (!$validator->passes()) {
            return response()->json([
                'status' => 0,
                'error' => $validator->errors()
            ]);
        }

        foreach(Plan::all()->toArray() as $plan) {
            if (($plan['name'] == $data['name']) && ($plan['duration'] == $data['duration'])) {
                return response()->json([
                    'status' => 0,
                    'info' => 'Plan already exists for the selected duration'
                ]);
            }
        }

        $plan = Plan::create([
            'details' => $data['details'],
            'name' => $data['name'],
            'price' => $data['price'],
            'listing' => $data['listing'],
            'duration' => $data['duration'],
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
            'type' => ['required', 'string'],
        ]);

        if (!$validator->passes()) {
            return response()->json([
                'status' => 0,
                'error' => $validator->errors()
            ]);
        }

        foreach(Plan::all()->toArray() as $Plan) {
            if (($Plan['name'] == $data['name']) && ($Plan['type'] == $data['type']) && $Plan['id'] !== $id) {
                return response()->json([
                    'status' => 0,
                    'info' => 'Plan name already exists for the selected type'
                ]);
            }
        }

        $Plan = Plan::find($id);
        $Plan->name = $data['name'];
        $Plan->type = $data['type'];
        $Plan->update();

        return response()->json([
            'status' => 1,
            'info' => 'Operation successful',
            'redirect' => ''
        ]);
    }

    public function delete($id)
    {
        Plan::find($id)->delete();
        return response()->json([
            'status' => 1,
            'info' => 'Operation successful'
        ]);
    }

}