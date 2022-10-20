<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

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

        return response()->json(['sucess' => true], 200);
    }
    
    public function index()
    {
        $users = User::all();

        return response()->json($users, 200);
    }

    public function show($id)
    {
        // $logged = Auth::user();

        $user = User::find($id);

        if (!$user) {
            return response()->json(['erro' => 'usuario inesistente'], 400);
        }

        return response()->json(['success', $user], 200);
    }

    public function store(Request $request)
    {
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ];

        $user = User::create($data);
        return response()->json(['success'=> 'true'], 201);
    }


    public function destroy($id)
    {
        // $logged = Auth::user();

        $user = User::find($id);

        if(!$user){
            return response()->json(['erro' => 'Ususario não encontrado']);
        }

        $user->delete();

        return response()->json(['success' => 'true', 200]);
    }

}
