<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function get($id)
    {
        $to_validate = array(
            'id' => $id
        );

        $validation = Validator::make($to_validate, [
            'id' => 'required|numeric|exists:users,id'
        ]);

        if ($validation->fails()) {
            return response()->json([
                'message' => 'Erros de validação',
                'errors' => $validation->errors()
                ],
                400
            );
        } else {
            $user = User::find($id);
            return response()->json(
                $user,
                200
            );
        }
    }

    public function list()
    {
        $users = User::get();
        return response()->json(
            $users,
            200
        );
    }

    public function add(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email|max:100',
            'password' => 'required|string|min:6|max:100',
            'phone' => 'required|numeric|digits_between:10,11'
        ]);

        if ($validation->fails()) {
            return response()->json([
                'message' => 'Erros de validação',
                'errors' => $validation->errors()
                ],
                400
            );
        } else {
            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = password_hash($request->password, PASSWORD_BCRYPT);
            $user->phone = $request->phone;

            $user->save();

            return response()->json(
                $user,
                200
            );
        }
    }
}