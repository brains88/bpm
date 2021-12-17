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
     * Admin see user properties
     */
    public function properties($id = 0)
    {
        $properties = User::findOrFail($id)->properties()->paginate(16);
        return view('admin.users.properties')->with(['properties' => $properties]);
    }

    /**
     * Admin filter users by role list view
     */
    public function role($role = 'user')
    {
        $users = User::where(['role' => $role])->paginate(16);
        return view('admin.users.role')->with(['users' => $users, 'roles' => User::query()->distinct()->pluck('role')]);
    }

}
