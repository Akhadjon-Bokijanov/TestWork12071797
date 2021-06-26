<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return User::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        try {
            $data = $request->only(['email', 'password', 'name']);
            $data['password'] = Hash::make($data['password']);
            return User::create($data);
        }catch (\Exception $exception){
            return ["error"=>$exception->getMessage(), "success"=>false];
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return ["data"=>User::with(['blogs'])->find($id), 'success'=>true];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        try {
            $user = User::find($id);
            return $user->update($request->only('name', 'email'));
        }catch (\Exception $exception){
            return ["error"=>$exception->getMessage(), "success"=>false];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
        try {
            return $user->delete();
        }catch (\Exception $exception){
            return ["error"=>$exception->getMessage(), "success"=>false];
        }
    }
}
