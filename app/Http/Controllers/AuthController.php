<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Http\Resources\LoginResponseResource;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\UnauthorizedException;

class AuthController extends Controller
{


    public function login(LoginUserRequest $request)
    {
        return new LoginResponseResource($this->checkLogin($request->email, $request->password));
    }

    private function checkLogin(string $username, string $password)
    {
        $credentials = request(['email', 'password']);
        $token = auth()->attempt([
            "email" => $username,
            "password" => $password
        ]);
        if (!$token) {
            throw new UnauthorizedException();
        }

        return ["token" => $token];

    }

    public function register(RegisterUserRequest $request)
    {

        User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password)
        ]);
        $resp = new LoginResponseResource($this->checkLogin($request->email, $request->password));
        return $resp;
    }


}
