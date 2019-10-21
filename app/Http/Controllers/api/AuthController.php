<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Http\Resources\UserResource;

class AuthController extends Controller
{
    /**
     * Login for user to get Token.
     *
     * @return \Illuminate\Http\Response
     */
    public function sigin(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        if($validation->fails()) {
            $response = [
                'status' => '400',
                'message' => 'Bad Request',
                'errorMessage' => $validation->errors(),
                'data' => [],
            ];
            return response()->json($response, 400);
        }

        $user = User::where([['email', request('email')],['password', crypt(request('password'), 'eventake2019pacegege')]])->first();
        if(!$user) {
            $response = [
                'status' => '400',
                'message' => 'Bad Request',
                'errorMessage' => 'email or password wrong',
            ];
            return response()->json($response, 400);
        } else {
            $response = [
                'status' => '200',
                'message' => 'Ok',
                'data' => new UserResource(User::find($user->id)),
                'token' => $user->createToken('token')->accessToken
            ];
            return response()->json($response, 200);
        }
    }
}
