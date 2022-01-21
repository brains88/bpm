<?php

namespace App\Http\Controllers\User;
use App\Models\{Category, Property, Country, Promotion, Credit};
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Validator;
use \Carbon\Carbon;


class PropertiesController extends Controller
{
	/**
     * User Properties list view
     */
    public function index()
    {
        $properties = auth()->user()->properties()->orderBy('created_at', 'desc')->paginate(12);
        return view('user.properties.index')->with(['properties' => $properties, 'categories' => Category::where(['type' => 'property'])->get(), 'credits' => auth()->user()->credits()->get()]);
    }

    /**
     * User add property view
     */
    public function add()
    {
        $credits = Credit::where(['user_id' => auth()->user()->id])->get();
        return view('user.properties.add')->with(['categories' => Category::where(['type' => 'property'])->get(), 'countries' => Country::all()]);
    }

    /**
     * User edit property view
     */
    public function edit($id = 0)
    {
        $property = Property::where(['id' => $id, 'user_id' => auth()->user()->id])->first();
        return view('user.properties.edit')->with(['categories' => Category::where(['type' => 'property'])->get(), 'countries' => Country::all(), 'property' => $property]);
    }

    /**
     * Api promote property
     */
    public function promote($id = 0)
    {
        $data = request()->only(['credit', 'property']);
        $validator = Validator::make($data, [
            'credit' => ['required', 'integer'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 0, 
                'error' => $validator->errors()
            ]);
        }

        $creditid = $data['credit'];
        $credit = Credit::find($creditid);
        if (empty($credit)) {
            return response()->json([
                'status' => 0, 
                'info' => 'Invalid credits used.',
            ]);
        }

        $propertyid = $data['property'] ?? 0;
        $property = Property::find($propertyid);
        if (empty($property)) {
            return response()->json([
                'status' => 0, 
                'info' => 'Invalid property promotion.',
            ]);
        }

        $days = $credit->duration ?? 0;

        try {
            DB::beginTransaction();
            $credit->status = 'running';
            $credit->update();

            Promotion::create([
                'credit_id' => $credit->id,
                'duration' => $days,
                'started' => Carbon::today(),
                'expiry' => Carbon::today()->addDays($days),
                'status' => 'active',
                'user_id' => auth()->user()->id,
                'property_id' => $property->id,
            ]);

            DB::commit();
            return response()->json([
                'status' => 1, 
                'info' => 'Operation successful',
                'redirect' => '',
            ]);
            
        } catch (Exception $error) {
            DB::rollback();
            return response()->json([
                'status' => 0, 
                'info' => 'Operation failed',
            ]);
        }
            

            
    }

}