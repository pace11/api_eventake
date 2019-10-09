<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Categories;
use App\Http\Resources\CategoriesResource;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Categories::all()->sortByDesc('updated_at');
        $response = [
            'status' => '200',
            'message' => 'Ok',
            'result' => CategoriesResource::collection($categories)
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
                'categories_name' => 'required'
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

        $categories = $request->isMethod('put') ? Categories::findOrFail($request->input('id')) : new Categories;
        
        if($request->isMethod('put')) {
            $categories->id = $request->input('id');
        }
        
        $categories->categories_name = $request->input('categories_name');

        if($categories->save()){
            $response = [
                'status' => '200',
                'message' => 'Ok',
                'data' => CategoriesResource::collection(Categories::all()->sortByDesc('updated_at'))
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
        $category = Categories::find($id);
        if($category) {
            $response = [
                'status' => '200',
                'message' => 'Ok',
                'data' => [new CategoriesResource($category)]
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
            'data' => CategoriesResource::collection(Categories::onlyTrashed()->get())
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
        $category = Categories::withTrashed()->where('id', $id)->restore();
        if($category) {
            $response = [
                'status' => '200',
                'message' => 'Ok',
                'data' => CategoriesResource::collection(Categories::all())
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
        $category = Categories::find($id);
        if($category && $category->delete()){
            $response = [
                'status' => '200',
                'message' => 'Ok',
                'data' => CategoriesResource::collection(Categories::all()->sortByDesc('updated_at'))
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
