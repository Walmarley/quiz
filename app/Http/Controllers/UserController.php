<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

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
            'admin' => $request->admin,
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ];

        $user = User::create($data);
        return response()->json(['success'=> 'true'], 201);
    }

    public function update(Request $request, $id){

        $user = User::find($id);

        $user->admin = $request->input('admin');
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));

        $user->save();
            return response()->json(['success' => true, 'message' => 'usuario ' . $user->name . ' atualizado com sucesso!'], 202);
    }


    public function destroy($id)
    {
        // $logged = Auth::user();

        $user = User::find($id);

        if(!$user){
            return response()->json(['erro' => true, 'Ususario não encontrado']);
        }

        $user->delete();

        return response()->json(['success' => 'true', 200]);
    }

}
