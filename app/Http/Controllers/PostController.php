<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->get();
        $comments = Comment::latest()->get();
        $recentTopics = Post::latest()->take(5)->get();
        
        return view('community', compact('posts', 'comments', 'recentTopics'));
    }


    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $user = Auth::user();
        
        $post = new Post();
        $post->user_id = $user->id;
        $post->title = $request->title;
        $post->content = $request->content;
        $post->save();

        return redirect()->back()->with('success', 'Post created successfully!');
    }

    public function addComment(Request $request)
    {
        // dd($request);
        $request->validate([
            'comment' => 'required|string|max:255',
        ]);
        $user = Auth::user();

        $comment = new Comment();
        $comment->user_id = $user->id;
        $comment->post_id = $request->post_id;
        $comment->content = $request->comment;
        $comment->save();

        return redirect()->back()->with('success', 'Comment added successfully!');
    }
}
