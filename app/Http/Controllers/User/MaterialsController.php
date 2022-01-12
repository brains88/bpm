<?php

namespace App\Http\Controllers\User;
use App\Models\{Category, Material, Country};
use App\Http\Controllers\Controller;


class MaterialsController extends Controller
{
	/**
     * User materials list view
     */
    public function index()
    {
        $materials = Material::latest('created_at')->paginate(12);
        return view('user.materials.index')->with(['materials' => $materials]);
    }

    /**
     * User add material view
     */
    public function add()
    {
        $materials = Material::latest('created_at')->limit(4)->get();
        return view('user.materials.add')->with(['materials' => $materials, 'categories' => Category::where(['type' => 'material'])->get(), 'countries' => Country::all()]);
    }

    /**
     * User edit material view
     */
    public function edit($id = 0)
    {
        $material = Material::findOrFail($id);
        return view('user.materials.edit')->with(['material' => $material, 'countries' => Country::all()]);
    }

}