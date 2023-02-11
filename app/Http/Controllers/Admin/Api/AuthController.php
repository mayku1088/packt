<?php

namespace App\Http\Controllers\Admin\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();

            $response = [
                'success' => true,
                'data' => ['token' => $user->createToken('admin')->plainTextToken, 'redirect_url' => url('/books')],
                'message' => 'You are logged in'
            ];

            return response()->json($response);
        } else {
            $response = [
                'success' => false,

                'message' => 'Invalid credentials'
            ];

            return response()->json($response, 400);
        }
    }
}
