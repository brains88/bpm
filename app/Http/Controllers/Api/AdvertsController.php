<?php

namespace App\Http\Controllers\Api;
use App\Models\{Advert, Credit, Unit};
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use \Carbon\Carbon;
use \Exception;
use Validator;

class AdvertsController extends Controller
{
	/**
     * Post advert
     */
    public function post()
    {
        $data = request()->all();
        $validator = Validator::make($data, [
            'credit' => ['required', 'integer'],
            'description' => ['required', 'string'],
            'link' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 0, 
                'error' => $validator->errors()
            ]);
        }

        $credit = Credit::find($data['credit']);
        if (empty($credit)) {
            return response()->json([
                'status' => 0, 
                'info' => 'Invalid advert credit'
            ]);
        }

        try {
            Advert::create([
                'reference' => Str::random(64),
                'description' => $data['description'],
                'credit_id' => $credit->id,
                'link' => $data['link'],
                'user_id' => auth()->id(),
                'status' => 'initialized',
            ]);

            $credit->inuse = true;
            $credit->status = 'active';
            $credit->update();
            return response()->json([
                'status' => 1, 
                'info' => 'Operation successful.',
                'redirect' => ''
            ]);
        } catch (Exception $error) {
            return response()->json([
                'status' => 0, 
                'info' => 'Operation failed. Try again.'
            ]);
        }         
    }

    /**
     * Api [post] edit Advert
     */
    public function edit($id = 0)
    {
        $data = request()->all();
        $validator = Validator::make($data, [
            'credit' => ['required', 'integer'],
            'description' => ['required', 'string'],
            'link' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 0, 
                'error' => $validator->errors()
            ]);
        }

        $advert = Advert::where([
            'id' => $id, 
            'user_id' => auth()->id()
        ])->first();
        if (empty($advert)) {
            return response()->json([
                'status' => 0, 
                'info' => 'Invalid operation'
            ]);
        }

        try {
            $advert->description = $data['description'];
            $advert->link = $data['link'];
            $advert->credit_id = $data['credit'];

            $credit = Credit::find($data['credit']);
            $credit->inuse = true;
            $credit->update();
            return response()->json([
                'status' => 1, 
                'info' => 'Operation successful.',
                'redirect' => ''
            ]);
        } catch (Exception $error) {
            return response()->json([
                'status' => 0, 
                'info' => 'Operation failed. Try again.'
            ]);
        } 
    }

    /**
     * Advert api for image upload
     */
    public function banner($id = 0)
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
        $filename = Str::uuid().'.'.$extension;
        $path = 'images/adverts';

        $advert = Advert::find($id);
        if (!empty($advert->banner)) {
            $prevfile = explode('/', $advert->banner);
            $previmage = end($prevfile);
            $file = "{$path}/{$previmage}";
            if (file_exists($file)) {
                unlink($file);
            }
        }
            
        $advert->banner = env('APP_URL')."/images/adverts/{$filename}";
        $image->move($path, $filename);
        $advert->update();
        return response()->json([
            'status' => 1, 
            'info' => 'Advert image updated successfully'
        ]);    
    }

    /**
     * Activate advert
     */
    public function activate($id = 0)
    {
        $advert = Advert::find($id);
        if (empty($advert)) {
            return response()->json([
                'status' => 0, 
                'info' => 'Invalid operation'
            ]);
        }

        if(empty($advert->banner)) {
            return response()->json([
                'status' => 0, 
                'info' => 'Please upload advert image first by clicking the camera icon.'
            ]);
        }

        $credit = Credit::find($advert['credit_id']);
        if (empty($credit)) {
            return response()->json([
                'status' => 0, 
                'info' => 'Invalid operation'
            ]);
        }

        $advert->started = Carbon::now();
        $advert->expiry = Carbon::now()->addDays($credit->duration);
        $advert->status = 'active';
        $advert->update();

        $credit->inuse = true;
        $credit->status = 'active';
        $credit->update();
        return response()->json([
            'status' => 1, 
            'info' => 'Operation successfull',
            'redirect' => ''
        ]);
    }

    /**
     * Pause advert
     */
    public function pause($id = 0)
    {
        $advert = Advert::find($id);
        if (empty($advert)) {
            return response()->json([
                'status' => 0, 
                'info' => 'Invalid operation'
            ]);
        }

        $credit = Credit::find($advert['credit_id']);
        if (empty($credit)) {
            return response()->json([
                'status' => 0, 
                'info' => 'Invalid operation'
            ]);
        }

        $advert->paused_at = Carbon::now();
        $advert->status = 'paused';
        $advert->update();

        $credit->inuse = true;
        $credit->status = 'paused';
        $credit->update();
        return response()->json([
            'status' => 1, 
            'info' => 'Operation successfull',
            'redirect' => ''
        ]);
    }

    /**
     * Resume advert
     */
    public function resume($id = 0)
    {
        $advert = Advert::find($id);
        if (empty($advert)) {
            return response()->json([
                'status' => 0, 
                'info' => 'Invalid operation'
            ]);
        }

        $credit = Credit::find($advert['credit_id']);
        if (empty($credit)) {
            return response()->json([
                'status' => 0, 
                'info' => 'Invalid operation'
            ]);
        }

        $days = Carbon::parse($advert->paused_at)->diffInDays($advert->started);
        $expiry = Carbon::parse($advert->expiry)->addDays($days);

        //$advert->paused_at = null;
        $advert->expiry = $expiry;
        $advert->status = 'active';
        $advert->update();

        $credit->inuse = true;
        $credit->duration = $credit->duration + $days;
        $credit->status = 'active';
        $credit->update();
        return response()->json([
            'status' => 1, 
            'info' => 'Operation successfull',
            'redirect' => ''
        ]);
    }

    /**
     * Remove advert (Must not have started)
     */
    public function remove($id = 0)
    {
        $advert = Advert::find($id);
        if (empty($advert)) {
            return response()->json([
                'status' => 0, 
                'info' => 'Invalid operation'
            ]);
        }

        $credit = Credit::find($advert['credit_id']);
        if (empty($credit)) {
            return response()->json([
                'status' => 0, 
                'info' => 'Invalid operation'
            ]);
        }

        $credit->inuse = false;
        $credit->status = 'available';
        $credit->update();

        if(!empty($advert->banner)) {
            $prevfile = explode('/', $advert->banner);
            $previmage = end($prevfile);
            $file = "images/adverts/{$previmage}";
            if (file_exists($file)) {
                unlink($file);
            }
        }

        $advert->delete();
        return response()->json([
            'status' => 1, 
            'info' => 'Operation successfull',
            'redirect' => ''
        ]);
    }

    /**
     * Remove advert (Must not have started)
     */
    public function cancel($id = 0)
    {
        $advert = Advert::find($id);
        if (empty($advert)) {
            return response()->json([
                'status' => 0, 
                'info' => 'Invalid operation'
            ]);
        }

        $credit = Credit::find($advert['credit_id']);
        if (empty($credit)) {
            return response()->json([
                'status' => 0, 
                'info' => 'Invalid operation'
            ]);
        }

        $daysused = Carbon::parse($advert->started)->diffInDays(Carbon::now());
        $newunits = $daysused > 0 ? round(($daysused * $credit->units)/$credit->duration) : $credit->units;

        $credit->inuse = false;
        $credit->units = $newunits;
        $credit->duration = ($credit->duration - $daysused);
        $credit->status = 'available';
        $credit->update();

        $advert->delete();
        return response()->json([
            'status' => 1, 
            'info' => 'Operation successfull',
            'redirect' => ''
        ]);
    }

}