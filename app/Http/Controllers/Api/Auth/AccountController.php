<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function account(Request $request)
    {
        return response()->json([
            'code' => 200,
            'message' => 'Success',
            'data' => $request->user()
        ]);
    }
}
