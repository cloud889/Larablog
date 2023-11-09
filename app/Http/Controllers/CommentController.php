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
       
       

        
        $validated = $request->validate([
            'message' => 'required',
            'larablog_id' => 'required',
        ]);

        $larablogId = $validated['larablog_id'];

        $blog = Larablog::find($larablogId);

        if (!$blog) {
            // Handle the case where the blog post with the provided ID is not found
            return redirect()->back()->with('error', 'The specified blog post was not found.');
        }

        $comment = new Comment([
            'message'=> $validated['message'],
            'larablog_id' => $larablogId,
        ]);

        $comment->user()->associate($user);
        $comment ->save();
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
