<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function signUp(Request $request)
    {
        $input = $request->all();
        $input['password'] = bcrypt($request->password);
        $user = User::create($input);
        $token['token'] = $user->createToken('main')->plainTextToken;
        return response()->json(data: ['success'=> true,
        'token' => $token,'Message'=>'User Register Successfully!']);
        
    }
    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'status' => false,
                'message' => 'Unauthorized: Invalid email or password.',
            ], 401);
        }

        // Clear old tokens
        DB::table('personal_access_tokens')->where('tokenable_id', $user->id)->delete();

        // Generate new token
        $token = $user->createToken('main')->plainTextToken;

        // return response()->json([
        //     'status' => true,
        //     'message' => 'Login successful.',
        //     'token' => $token,
        // ], 200);
        $response = [
            'status' => true,
            'message' => 'Login successful.',
            'token' => $token,
        ];

        // Return response based on request type
        if ($request->expectsJson()) {
            return response()->json($response, 200);
        }

        // If request from web, log in the user and redirect
        Auth::login($user);
        return redirect('/')->with('success', 'Login successful.');
    }
}
