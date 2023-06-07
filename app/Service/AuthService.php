<?php

namespace App\Service;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthService
{
    public function login(Request $request)
    {
        if(Auth::attempt([$request])){
            return true;
        }

        return false;
    }
}
