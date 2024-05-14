<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{

    function create()
    {

        return view('create_post');
    }

    function show($id)
    {
        $post = [
            "id" => $id,
            "name" => "Toshiba",
            "price" => "44",
            "address" => "Sohag"
        ];
        return view('post', ["post" => $post]);
    }

    function index()
    {
        $posts = [
            [
                "id" => 1,
                "name" => "Toshiba",
                "price" => "44",
                "address" => "Sohag"
            ],
            [
                "id" => 2,
                "name" => "nokia",
                "price" => "44",
                "address" => "Sohag"
            ],
            [
                "id" => 4,
                "name" => "Hawai",
                "price" => "44",
                "address" => "Sohag"
            ]
        ];
        $posts = ["posts" => $posts];

        return view('posts', $posts);
    }


    function edit($id){
        $post= 
            [
                "id" => $id,
                "name" => "Toshiba",
                "price" => "44",
                "address" => "Sohag"
            ];

            return view('editPage',['editPost'=>$post]);

    }

    function update($id){

    return " update sucessfully";
    }

    function delete($id){
        return "destore";
    }
}


