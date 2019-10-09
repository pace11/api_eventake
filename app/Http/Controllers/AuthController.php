<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Users;
use Ramsey\Uuid\Uuid;
use JWTAuth;
use JWTAuthException;

class AuthController extends Controller
{
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $validation = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'date_of_birth' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'address' => 'required',
            'gender' => 'required',
            'phone' => 'required',
        ]);

        if($validation->fails()){
            $response = [
                'errorMessage' => $validation->errors(),
                'result' => [],
                'status' => 'BAD_REQUEST'
            ];
            return response()->json($response, 400);
        }

        $firstName = $request->input('first_name');
        $lastName = $request->input('last_name');
        $dateOfBirth = $request->input('date_of_birth');
        $email = $request->input('email');
        $password = $request->input('password');
        $address = $request->input('address');
        $gender = $request->input('gender');
        $phone = $request->input('phone');
        
        $user = new Users([
            'id' => Uuid::uuid4()->getHex(),
            'first_name' => $firstName,
            'last_name' => $lastName,
            'date_of_birth' => $dateOfBirth,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'address' => $address,
            'gender' => $gender,
            'phone' => $phone,
        ]);

        if($user->save()) {
            $user->sigin = [
                'href' => 'api/vi/user/sigin',
                'method' => 'POST',
                'params' => 'email, password'
            ];
            $response = [
                'msg' => 'User created',
                'user' => $user
            ];
            return response()->json($response, 201);
        }

        $response = [
            'msg' => 'An error occured'
        ];
        return response()->json($response, 404);
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function sigin(Request $request)
    {   
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $email = $request->input('email');
        $password = $request->input('password'); 

        if($user = Users::where('email', $email)->first()) {
            $credentials = [
                'email' => $email,
                'password' => $password 
            ];
            $token = null;
            try {
                if (!$token = JWTAuth::attempt($credentials)) {
                    return response()->json([
                        'msg' => 'Email or Password are incorrect',
                    ], 404);
                }
            }catch(JWTAuthException $e) {
                return response()->json([
                    'msg' => 'failed to create token',
                ], 404);
            }

            $response = [
                'msg' => 'User success signin',
                'user' => $user,
                'token' => $token,
            ];
            return response()->json($response, 201);
        }

        $response = [
            'msg' => 'An error occured'
        ];
        return response()->json($response, 404);
    }
}
