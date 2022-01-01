<?php

namespace App\Http\Controllers\Admin;
use App\Models\{User};
use App\Http\Controllers\Controller;
use Validator;

class UsersController extends Controller
{
    /**
     * Admin users list view
     */
    public function index()
    {
        $users = User::with('properties')->get()->SortByDesc(function($user){
            return $user->properties->count();
        })->paginate(16);
        return view('admin.users.index')->with(['users' => $users, 'roles' => User::query()->distinct()->pluck('role')]);
    }

    /**
     * Companies registered users
     */
    public function companies()
    {
        $properties = User::findOrFail($id)->properties()->paginate(16);
        return view('admin.users.properties')->with(['properties' => $properties]);
    }

    /**
     * Individuals registered users
     */
    public function individuals()
    {
        $properties = User::findOrFail($id)->properties()->paginate(16);
        return view('admin.users.properties')->with(['properties' => $properties]);
    }

    /**
     * User profile (company or individual)
     */
    public function profile($id = 0)
    {
        $properties = User::findOrFail($id)->properties()->paginate(16);
        return view('admin.users.properties')->with(['properties' => $properties]);
    }

}
