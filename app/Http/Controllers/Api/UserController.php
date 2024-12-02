<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getUserDetails(Request $request)
    {
        return response()->json(['user' => $request->user()]);
    }
}

