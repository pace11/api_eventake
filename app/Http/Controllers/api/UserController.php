<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $user = User::find($id);
        if($user) {
            $response = [
                'status' => '200',
                'message' => 'Ok',
                'data' => new UserResource($user)
            ];
            return response()->json($response, 200);
        }
        $response = [
            'status' => '404',
            'message' => 'Not Found',
            'data' => []
        ];
        return response()->json($response, 404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $user = User::find($id);
        if($user) {
            $validation = Validator::make($request->all(), [
                'first_name' => 'required',
                'last_name' => 'required',
                'date_of_birth' => 'required',
                'email' => 'required',
                'address' => 'required',
                'gender' => 'required',
                'phone' => 'required',
            ]);
            if($validation->fails()) {
                $response = [
                    'status' => '400',
                    'message' => 'Bad Request',
                    'errorMessage' => $validation->errors()
                ];
                return response()->json($response, 400);
            }
            $user->first_name = $request->input('first_name');
            $user->last_name = $request->input('last_name');
            $user->date_of_birth = $request->input('date_of_birth');
            $user->email = $request->input('email');
            $user->address = $request->input('address');
            $user->gender = $request->input('gender');
            $user->phone = $request->input('phone');
            if($user->save()) {
                $response = [
                    'status' => '200',
                    'message' => 'Ok',
                    'data' => new UserResource($user)
                ];
                return response()->json($response, 200);
            }
        }
    }
}
