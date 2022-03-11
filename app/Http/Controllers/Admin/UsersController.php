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
    public function index($designation = '')
    {
        $query = User::query();
        $users = empty($designation) ? $query->paginate(32) : $query->whereHas('profile', function($profile) use($designation) {$profile->where(['designation' => $designation]);})->latest()->paginate(24);
        return view('admin.users.index')->with(['users' => $users, 'roles' => $query->distinct()->pluck('role')]);
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
