<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\JsonResponse;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Index()
    {
        // if($name == '' || !is_string($name) ){
        //     return response()->json(['status' => 'failed', 'data' => 'Name cannot be empty'], 400);
        // } 
        // if(!is_string($name) ){
        //    
        // } 
        //get user details 
        $user = User::latest()->get();
        if(count($user) > 0){
            return response()->json(['status'=>'success', 'data' => $user], 200);
        }
        return response()->json(['status' => 'error', 'data' => 'This record is empty'], 400);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //create User
        $valid = Validator::make($request->all(), [
            'name' => 'string|required|unique:users'
        ]);

        if($valid->fails()){
            return response()->json(['status'=>'error', 'message' => 'Failed', 'data' => 'name is required or name already exist'], 400);
        }

        $faker = \Faker\Factory::create();

        $user = User::create([

            'name' => strtolower($request->name),
            'email' => $faker->unique()->safeEmail(),
            'phone' => $faker->phoneNumber(),
            'state' => 'Lagos',
            'country' => 'Nigeria',
            'date_of_birth' => $faker->dateTimeBetween('01-01-1991', '01-01-1999')->format('d-m-y')
        ]);

        if($user){
            $users = User::latest()->first();
            return response()->json(['status'=>'success', 'message'=>'created', 'data'=>$users],200);
        }
        return response()->json(['status' => 'error', 'message'=>'failed', 'data'=>'Request failed, something went wrong'],400);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($name)
    {
       if($name == '' || !is_string($name) ){
            return response()->json(['status' => 'failed', 'data' => 'Name must be string'], 400);
        } 
        $user = User::where('name', $name)->first();
        if($user){
            return response()->json(['status'=>'success', 'data' => $user], 200);
        }
        return response()->json(['status' => 'error', 'data' => 'No User Found witht this name'], 400);
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
    public function update(Request $request, $name)
    {
        
        $User = User::where('name', $name)->first();
        if($User){
            $User->update(['name' => strtolower($request->data['name'])]);
        return response()->json(['status'=>'success', 'message'=>'User Updated Successfully', 'data'=>$User]);
        }
        return response()->json(['status' => 'error', 'message'=> 'Failed', 'data' => 'No User found with this name']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($name)
    {
     
       $User = User::where('name', $name)->first();
        if($User){
            $User->delete();
        return response()->json(['status'=>'success', 'message'=>'User Deleted Successfully', 'data'=>null]);
        }
        return response()->json(['status' => 'error', 'message'=> 'Failed', 'data' => 'No User found with this name']);
    }
}
