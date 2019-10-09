<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Payment;
use App\Http\Resources\PaymentResource;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payment = Payment::all()->sortByDesc('updated_at');
        $response = [
            'status' => '200',
            'message' => 'Ok',
            'data' => PaymentResource::collection($payment)
        ];
        return response()->json($response, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->isMethod('post')) {
            $validation = Validator::make($request->all(), [
                'payment_name' => 'required',
                'payment_desc' => 'required'
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
        }

        $payment = $request->isMethod('put') ? Payment::findOrFail($request->input('id')) : new Payment;
        
        if($request->isMethod('put')) {
            $payment->id = $request->input('id');
        }
        
        $payment->payment_name = $request->input('payment_name');
        $payment->payment_desc = $request->input('payment_desc');

        if($payment->save()){
            $response = [
                'status' => '200',
                'message' => 'Ok',
                'data' => PaymentResource::collection(Payment::all()->sortByDesc('updated_at'))
            ];
            return response()->json($response, 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $payment = Payment::find($id);
        if($payment) {
            $response = [
                'status' => '200',
                'message' => 'Ok',
                'data' => [new PaymentResource($payment)]
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

     /**
     * Trash the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function trash()
    {
        $response = [
            'status' => '200',
            'message' => 'Ok',
            'data' => PaymentResource::collection(Payment::onlyTrashed()->get())
        ];
        return response()->json($response, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        $payment = Payment::withTrashed()->where('id', $id)->restore();
        if($payment) {
            $response = [
                'status' => '200',
                'message' => 'Ok',
                'data' => PaymentResource::collection(Payment::all())
            ];
            return response()->json($response, 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $payment = Payment::find($id);
        if($payment && $payment->delete()){
            $response = [
                'status' => '200',
                'message' => 'Ok',
                'data' => PaymentResource::collection(Payment::all()->sortByDesc('updated_at'))
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
}
