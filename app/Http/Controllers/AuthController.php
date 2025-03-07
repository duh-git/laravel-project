<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
  public function registration()
  {
    return view("auth/registration");
  }

  public function registrationHandler(Request $request)
  {
    $request->validate([
      'name' => 'required',
      'email' => 'required|email|unique:users,email',
      'password' => 'required|min:8',
    ]);

    $user = User::create($request->all());
    $token = $user->createToken('myAppToken');
    return redirect()->route('login');

    // $response = [
    //   'user' => $user,
    //   'token' => $token,
    // ];
    // return response()->json($response, 201);
  }

  public function login()
  {
    return view('auth/login');
  }

  public function loginHandler(Request $request)
  {
    $request->validate([
      'email' => 'required|email',
      'password' => 'required|min:8'
    ]);

    $credentials = [
      'email' => $request->email,
      'password' => $request->password,
    ];

    if (!Auth::attempt($credentials)) {
      return response('Bad login or password', 401);
    }
    // $user = User::where('email', request('email'))->first();
    // $token = $user->createToken('myAppToken');
    // $response = [
    //   'user' => $user,
    //   'token' => $token,
    // ];
    // return response()->json($response, 201);

    $request->session()->regenerate();
    return redirect()->route('article.index');
    // return back()->withErrors([
    //   'email' => 'The provided credentials do not match out records.'
    // ]);
  }

  public function logout(Request $request)
  {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('login');
    // return response(['message' => 'Log Out Succeed'], 201);
  }
}
