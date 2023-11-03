<?php

namespace App\Http\Controllers;


use App\Models\Larablog;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;


class LarablogController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function myblogs():View
     {
        return view('larablogs.myblogs');
     }

    public function index():View
    {
        return view('larablogs.index',[
            'blogs' => Larablog::with('user')->latest()->get(),
        ]);
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
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required',
            'message' => 'required|string|max:255',
        ]);

        $request->user()->larablogs()->create($validated);

        return redirect(route('dashboard'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Larablog $larablog): View
    {

        return view('larablogs.show', [
            'blog' => $larablog,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Larablog $larablog) : View
    {
        $this->authorize('update', $larablog);

        return view('larablogs.edit',[
            'larablogs' => $larablog,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Larablog $larablog): RedirectResponse
    {
        $this->authorize('update', $larablog);

        $validated = $request->validate([
            'title' => "required",
            'message' => "required|string|max:255",
        ]);

        $larablog->update($validated);

        return redirect('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Larablog $larablog): RedirectResponse
    {
        $this->authorize('delete', $larablog );

        $larablog->delete();

        return redirect(route('dashboard'));
    }
}
