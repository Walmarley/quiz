<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthenticateController extends Controller
{
    public function unnauthorized()
    {
        return response()->json(['success' => false, 'message' => 'Usuario deve está Logado'], 401);
    }

    public function loginUser(Request $request)
    {
        $logar = $request->only('email', 'password');

        $validator = Validator::make($logar, [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if($validator->fails())
        {
            return response()->json(['success' => false, $validator->messages()], 400);
        }

        // $logged = User::whereEmail($request->email)->wherePassword($request->password)->exists();
        $logged = Auth::attempt($logar);

        if(!$logged){
            return response()->json(['success' => false, 'Senha ou email errado'], 402);
        }

        $user = User::where('email', $logar['email'])->first();

        $randonTime = time().rand(0, 9999);
        $token = $user->createToken($randonTime)->plainTextToken;

        return response()->json(['success' => true, 'token' => $token], 200);
    }

    public function logout(Request $request)
    {
        $user = $request->user();

        if(!$user){
            return redirect()->route('loginUser');
        }

        $user->tokens()->delete();
        return response()->json(['success' => true, 'Ususário Deslogado com sucesso']);
    }

}
