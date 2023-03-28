<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function index()
    {
        $posts = Post::all();
        return view("admin.posts", compact("posts"));
    }

    public function show()
    {
        return view('admin.index');
    }
}
