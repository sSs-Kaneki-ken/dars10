<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostStoreRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Models\Category;
use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function __construct()
    {
        if(Auth::check()) {
            if(Auth::user()->role == 'admin') {
                return redirect()->route('posts.index');
            }
            else {
                return redirect()->route('poster');
            }
        }
        else{
            return redirect()->route('loginPage');
        }
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::paginate(10);

        return view('Admin.Tables.posts', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();

        return view('Admin.Tables.create_post', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostStoreRequest $request)
    {
        $data = $request->all();

        if ($request->hasFile('image')) {
            $file = $request->file('image');

            $filename = date('Y-m-d') . '_' . time() . '.' . $file->getClientOriginalExtension();

            $file->move(public_path('Images'), $filename);

            $data['image'] = 'Images/' . $filename;
        }

        if(!$data['content']){
            $data['content'] = "Not Info";
        }

        Post::create($data);

        return redirect()->route('posts.index')
            ->with('active', ['Post created successfully!', 'success']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('Admin.Tables.show_post', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = Category::all();

        return view('Admin.Tables.update_post', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostUpdateRequest $request, Post $post)
    {
        $request['title'] = ($request->title) ? $request->title : $post->title;
        $request['description'] = $request->description ? $request->description : $post->description;
        $request['content'] = ($request->content) ? $request->content : $post->content;

        $data = $request->all();

        if ($request->hasFile('image'))
        {
            $file = $request->file('image');

            $filename = date('Y-m-d') . '_' . time() . '.' . $file->getClientOriginalExtension();

            $file->move(public_path('Images'), $filename);

            $data['image'] = 'Images/' . $filename;
        }

        $post->update($data);

        return redirect()->route('posts.index')
            ->with('active', ['Post updated successfully!', 'primary']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index')
            ->with('active', ['Post deleted successfully!', 'danger']);
    }
}
