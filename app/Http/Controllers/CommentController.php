<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Larablog;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {  
       $user = auth()->user();
       
       $blog = Larablog::find($request);

       
        
        $validated = $request->validate([
            'message' => 'required',
            'larablog_id' => 'required',
        ]);

        $comment = new Comment([
            'message'=> $validated['message'],
            'larablog_id' => $validated['larablog_id']
        ]);

        $comment->user()->associate($user);
        Comment::create($comment);
        return redirect()->back()->with('success', 'Your data has been saved successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
