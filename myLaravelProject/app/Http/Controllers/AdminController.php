<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    public function showMain()
    {
        return view('admin.index');
    }

    public function showPosts()
    {
        $posts = Post::all();
        return view("admin.posts", compact("posts"));
    }

    public function index()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }

    public function show($id)
    {
        $user = User::find($id);
        return view("admin.users.profile", compact('user'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view("admin.users.profile", compact('user'));
    }

    public function update($id)
    {
        $user = User::find($id);
        $user->name = request()->name;
        $user->email = request()->email;
        $user->password = Hash::make(request()->password);
        $user->update();
        session()->flash('updated', 'Profile updated successfully');
        return redirect('admin/users');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        session()->flash('deleted', 'User deleted successfully');
        return redirect('admin/users');
    }


}
