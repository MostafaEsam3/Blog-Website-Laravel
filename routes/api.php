<?php

use App\Http\Controllers\Api\PostApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\Api\UserApiController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;



// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::get('/posts', [PostApiController::class, 'index'])->middleware('auth:sanctum');



Route::get('/posts/{id}', [PostApiController::class, 'show']); // show one doc according to id

Route::post('/posts/create', [PostApiController::class, 'store']);

Route::post('/posts/{id}', [PostApiController::class, 'update']);

Route::delete('/posts/{id}', [PostApiController::class, 'destroy']);


Route::post('/sanctum/token', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
        'device_name' => 'required',
    ]);

    $user = User::where('email', $request->email)->first();

    if (! $user || ! Hash::check($request->password, $user->password)) {
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }

    return $user->createToken($request->device_name)->plainTextToken;
});



// Route::get('/users', [UserApiController::class, 'index']);
