<?php

use App\Http\Controllers\Api\PropertyController;
use App\Http\Controllers\Api\UsersController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;

Route::post('/login', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    $user = User::where('email', $request->email)->first();

    if (!$user || !Hash::check($request->password, $user->password)) {
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }

    $token = $user->createToken($request->email)->plainTextToken;
    return response()->json([
        'token' => $token
    ]);
});
Route::name('api.')->middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::apiResource('users', UsersController::class, ['except' => ['destroy']]);
});
Route::get('/properties', [PropertyController::class, 'index']);
