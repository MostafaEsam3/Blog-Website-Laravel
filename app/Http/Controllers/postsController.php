<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\post;


class postsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $posts = post::paginate(10);
        return view('posts', ["posts" => $posts]);
    }
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create_post');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        request()->validate([
            'tittle' => ['required', 'string', 'min:3'],
            "name" => ["required", "string", "min:3"],

        ]);



        post::create([
            "name" => $request->name,
            "tittle" => $request->tittle,
        ]);
        return redirect("/posts");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = post::find($id);
        return view("post", ["post" => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = post::find($id);
        return view("editPage", ["editPost" => $post]);
    }
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        request()->validate([
            'tittle' => ['required', 'string', 'min:3'],
            "name" => ["required", "string", "min:3"],

        ]);

        $post = post::find($id);
        $post->tittle = $request->tittle;
        $post->name = $request->name;
        $post->save();
        return redirect("/posts");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        post::destroy($id);
        return redirect("/posts");
    }
}



