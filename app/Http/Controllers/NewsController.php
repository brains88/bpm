<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Exception;

class NewsController extends Controller
{
    public function index()
    {
        $newsapi = \App\Helpers\News::api($limit = 6, $page = 1);
        return view('news.index', ['newsapi' => $newsapi]);
    }

    public function search()
    {}

    public function read()
    {}
}
