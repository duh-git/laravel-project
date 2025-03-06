<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
  public function create()
  {
    return view("auth/signup");
  }

  public function registration(Request $request)
  {
    $request->validate([
      'username' => 'required',
      'email' => 'required|email',
      'password' => 'required|min:8',
    ]);

    return response()->json([
      'username' => request('username'),
      'email' => request('email'),
    ]);
  }
}
