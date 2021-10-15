<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    
    // public function __construct()
    // {
    //     $this->middleware('auth:api');
    // }

    public function index()
    {   
        
        return response()->json([
            'all' => User::with('roles')->get()
        ]);
    }
}
