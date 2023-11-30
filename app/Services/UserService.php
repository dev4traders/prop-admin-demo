<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserService
{

    public function store(array $data) : User
    {
        return User::create([
            'domain_id' => 1,
            'username' => $data['email'],
            'name' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function login(array $credentials): array|null
    {
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $access_token = $user->createToken('authToken')->plainTextToken;
            $user_id = $user->id;

            return compact('access_token', 'user_id');
        }

        return null;
    }
    public function logout(): void
    {
        auth()->user()->tokens()->delete();
    }

}
