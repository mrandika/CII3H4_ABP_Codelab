<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class LoginController extends Controller
{
    public function return_json($code = 200, $data = null, $error = null, $message = '')
    {
        return response()->json([
            'code' => $code,
            'message' => $message,
            'data' => $data,
            'error' => $error
        ], $code);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'email', 'min:10'],
            'password' => ['required', Password::min(8)->letters()->numbers()->symbols()->mixedCase()]
        ]);

        if ($validator->fails()) {
            return $this->return_json(400, null, $validator->errors(), 'Validation failed');
        }

        $email = $request->post('email');
        $password = $request->post('password');

        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            return $this->return_json(200, [
                'token_type' => 'Bearer',
                'token' => $request->user()->createToken('access_token')->plainTextToken
            ], null, 'OK');
        } else {
            return $this->return_json(404, null, null, 'Account not found');
        }
    }
}
