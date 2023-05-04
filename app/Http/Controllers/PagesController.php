<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Session;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->filter(request(['category']))->paginate();
        $firstPost = Post::first();
        $secondPost = Post::where('id', 1)->first();
        $categories = Category::all();
        $dates = Post::orderBy('created_at', 'desc')
            ->pluck('created_at')
            ->map(function ($date) {
                return $date->format('F Y');
            })
            ->unique();
        return view("welcome", compact("posts", "categories", "dates", "firstPost", "secondPost"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view("pages.create", compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $request->validated();
        $input = $request->all();
        $input['user_id'] = auth()->user()->id;
        $input['category_id'] = intval($request->input('category'));
        if ($file = $request->file('file')) {
            $fileName = $file->getClientOriginalName();
            $file->move('images', $fileName);
            $input['path'] = $fileName;
        }
        Post::create($input);
        // $category_id = $request->input('category');
        // $post->category()->attach(intval($category_id));
        session()->flash('created', 'Post was created');
        return redirect('/admin/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view("pages.show", compact("post"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view("pages.edit", compact("post"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
        $request->validated();
        $post = Post::find($id);
        $post->update($request->all());
        session()->flash('updated', 'Post was updated');
        return redirect('/admin/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        session()->flash('deleted', 'Post was deleted');
        return back();
    }
}
