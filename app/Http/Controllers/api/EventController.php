<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Event;
use App\Http\Resources\EventResource;
use Ramsey\Uuid\Uuid;

class EventController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('jwt.auth', 
    //     ['except' => ['show']]);
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all()->sortByDesc('updated_at');
        $response = [
            'status' => '200',
            'message' => 'Ok',
            'data' => EventResource::collection($events)
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
                'categories_id' => 'required',
                'event_name' => 'required',
                'event_desc' => 'required',
                'event_date_start' => 'required',
                'event_date_end' => 'required',
                'event_time_start' => 'required',
                'event_time_end' => 'required',
                'event_venue' => 'required',
                'event_address' => 'required',
                'event_latitude' => 'required',
                'event_longitude' => 'required',
                'event_organizer' => 'required',
                'event_registrant_quota' => 'required',
                'event_active' => 'required',
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
        
        $event = $request->isMethod('put') ? Event::findOrFail($request->input('id')) : new Event;
        
        $event->id = $request->isMethod('put') ? $request->input('id') : Uuid::uuid4()->getHex();
        $event->categories_id = $request->input('categories_id');
        $event->event_name = $request->input('event_name');
        $event->event_desc = $request->input('event_desc');
        $event->event_date_start = $request->input('event_date_start');
        $event->event_date_end = $request->input('event_date_end');
        $event->event_time_start = $request->input('event_time_start');
        $event->event_time_end = $request->input('event_time_end');
        $event->event_venue = $request->input('event_venue');
        $event->event_address = $request->input('event_address');
        $event->event_latitude = $request->input('event_latitude');
        $event->event_longitude = $request->input('event_longitude');
        $event->event_organizer = $request->input('event_organizer');
        $event->event_registrant_quota = $request->input('event_registrant_quota');
        $event->event_active = $request->input('event_active');

        if($event->save()) {
            $response = [
                'status' => '200',
                'message' => 'Ok',
                'data' => EventResource::collection(Event::all()->sortByDesc('updated_at')),
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
        $event = Event::find($id);
        if($event) {
            $response = [
                'status' => '200',
                'message' => 'Ok',
                'data' => [new EventResource($event)]
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
    public function edit($id, Request $request)
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
            'data' => EventResource::collection(Event::onlyTrashed()->get())
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
        $event = Event::withTrashed()->where('id', $id)->restore();
        if($event){
            $response = [
                'status' => '200',
                'message' => 'Ok',
                'data' => EventResource::collection(Event::all())
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
        $event = Event::find($id);
        if($event && $event->delete()){
            $response = [
                'status' => '200',
                'message' => 'Ok',
                'data' => EventResource::collection(Event::all()->sortByDesc('updated_at'))
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
