<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    // === Add News === ||
    public function addNews()
    {
        return view('admin.news.add-news');
    }

    // === Manage News === ||
    public function manageNews()
    {
        return view('admin.news.manage-news');
    }

    // === Manage News === ||
    public function trashedNews()
    {
        return view('admin.news.trashed-news');
    }

    // === Manage News === ||


    // === Manage News === ||


}
