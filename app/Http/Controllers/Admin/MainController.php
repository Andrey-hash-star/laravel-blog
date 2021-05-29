<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\User;
use App\Category;
use App\Http\Controllers\Controller;
use App\Tag;

class MainController extends Controller
{
    public function index()
    {
        $params = [
            'categoriesCount' => Category::count(),
            'postsCount' => Post::count(),
            'tagsCount' => Tag::count(),
            'usersCount' => User::count(),
        ];
        return view('admin.index', compact('params'));
    }
}
