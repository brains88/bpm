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
        $users = User::query();
        return view('admin.users.index')->with(['users' => $users->paginate(32), 'roles' => $users->distinct()->pluck('role')]);
    }

    /**
     * get users by designation
     */
    public function designation($designation = '')
    {
        $users = User::whereHas('profile', function($query) use($designation) {
            $query->where(['designation' => $designation]);
        })->latest()->paginate(24);
        return view('admin.users.designation')->with(['users' => $users, 'designation' => $designation]);
    }

    /**
     * User profile
     */
    public function profile($id = 0)
    {
        return view('admin.users.profile')->with(['user' => User::find($id)]);
    }

    /**
     * Search Users
     */
    public function search()
    {
        $users = User::query();
        $query = request()->get('query');
        $users = empty($query) ? $users->latest()->paginate(24) : $users->where('name', 'Like', '%'.$query.'%')->latest()->paginate(24);
        return view('admin.users.search')->with(['users' => $users, 'query' => $query]);
    }

}
