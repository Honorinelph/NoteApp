<?php

namespace App\Http\Controllers\Admin\v1;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\University;
use App\Models\User;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = Comment::all();
        return view('admin.comments.index',compact('comments')) ;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        $universities = University::all();
        return view('admin.comments.create',compact('users','universities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Comment $comment)
    {
        $request->validate([
            'content' => 'required',

        ]);

        Comment::create($request->all());

        return to_route('admin.comments.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($universityId)
    {
        $university = University::findOrFail($universityId);

        return view('university.show', compact('university'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        $users = User::all();
        $universities = University::all();
        return view('admin.comments.edit',compact('comment','users','universities')) ;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        $request->validate([
            'user_id'=>'required|exists:users,id',
            'university_id' => 'required',
            'content' => 'required',

        ]);

        $comment->update($request->all());

        return to_route('admin.comments.index');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();
        return to_route('admin.comments.index');


    }
}
