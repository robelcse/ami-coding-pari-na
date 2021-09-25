<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\Userinput;
use App\Http\Resource\UserInputResource;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserinputController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
        $userInput = new Userinput();
        $userInput->user_id = $request->user_id;
        $userInput->input_values = $request->input_values;
        $userInput->timestamp = Carbon::now()->format('Y-m-d');
        $userInput->save();

       
        return response()->json([
            'status' => 'success',
            'message'   => 'Data Stored Successfully',
            'userId'=> $request->user_id
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($userId, $start_datetime, $end_datetime)
    {
        
        $user_inputs = Userinput::select('timestamp','input_values')->where('user_id',$userId)->whereBetween('timestamp', [$start_datetime, $end_datetime])->get();
        
        return response()->json([
            'status' => 'success',
            'user_id'=>$userId,
            'payload'   => $user_inputs
        ]);
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
