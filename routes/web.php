<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\postsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

Route::get('/', function () {
    return view('welcome');
});


// Route::get("/posts/create", [PostController::class , "create"]);

// //getting one post 
// // i used wherenumber becouse i need to make id number 
// // i can make it string by (whereAlpha)
// Route::get("/posts/{id}",[PostController::class ,"show"])->whereNumber('id');

// // i get all posts 
// Route::get("/posts",[PostController::class ,"index"]);


// Route::get('/posts/{id}/edit',[PostController::class,'edit']);

// Route::put('/posts/{id}',[PostController::class ,'update']);
// // why i should send id i can use any value from any input 


// Route::delete('/posts/{id}',[PostController::class,'delete']);


// // when i make post in form /// and get in rourt it make erorr conflict 



Route::resource('/posts', postsController::class)->middleware('auth');


Route::get('/try', function () {
    return view('layout.lay');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
