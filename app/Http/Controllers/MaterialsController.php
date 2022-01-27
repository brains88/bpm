<?php

namespace App\Http\Controllers;
use App\Models\Material;
use Illuminate\Http\Request;

class MaterialsController extends Controller
{
    
    /**
     * Building materials page
     */
    public function index()
    {
        return view('frontend.materials.index')->with(['materials' => Material::paginate(15)]);
    }

    /**
     * Find Single material
     */
    public function material($id = 45, $slug = '')
    {
        return view('frontend.materials.material')->with(['material' => Material::findOrFail($id)]); 
    }
}
