<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\post;

class PostApiController extends Controller
{
    public function index()
    {
        $posts = post::all();
        return $posts;
    }

    public function show(string $id)
    {
        $post = post::find($id);
        return $post;
    }

    public function store(Request $request)
    {

        try {
            request()->validate([
                'tittle' => ['required', 'string', 'min:3'],
                "name" => ["required", "string", "min:3"],
            ]);
                 post::create([
                'name' => $request->name,
                'tittle' => $request->tittle
            ]);
            return "created";
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function update(Request $request , string $id){

        $post=post::find($id);
        $post->update([
            "name"=> $request->name,
            "tittle"=> $request->tittle
        ]);
        $post->save();
        return "update sucesfullly";
    }

    public function destroy(string $id)
    {
        post::destroy($id);
        return "delete succesfully";
    }

}
