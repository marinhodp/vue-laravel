<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

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
}
